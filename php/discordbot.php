
<?php
session_start();
date_default_timezone_set('Europe/Madrid');

$token = "NzYzMDA4NDgwNTA0MTg0ODcy.GW97sQ.Sb9wTxfh_BIwDArEbHViVDd47iXMzBiQmcAopk";


$rolId = "1109180749724254278"; // ID del rol que deseas mencionar
$comando = $_GET['estado'];

// Verificar el comando recibido y establecer el estado correspondiente
if ($comando === "agregar") {
    $id_usuarioref = $_GET["usuariotarget"];
    $informe = $_GET["informe"];
    $usuario = $_SESSION['user'];

    $channelId = "1109161306633809973";

    $mensaje = "<@&{$rolId}> ".date("d/m/y H:i:s")." Nuevo informe de " . $usuario . " dice lo siguiente: \n". $informe;
    
} elseif ($comando === "eliminar") {

   
    $usuario = $_SESSION['user'];

    $channelId = "1109161306633809973";

    $mensaje = "<@&{$rolId}> ".date("d/m/y H:i:s")." Se ha cancelado o eliminado el informe de $usuario";

} elseif ($comando === "resolver") {
    $usuario = $_SESSION['user'];

    $channelId = "1109161306633809973";

    $mensaje = "<@&{$rolId}> ".date("d/m/y H:i:s")." Se ha resuelto el informe de $usuario";

}

elseif ($comando === "pendiente") {
    $usuario = $_SESSION['user'];

    $channelId = "1109161306633809973";

    $mensaje = "<@&{$rolId}> ".date("d/m/y H:i:s")." Se ha quedado en pendiente el informe de $usuario";

}

elseif ($comando === "logusuario") {
    $usuario = $_GET['nombreusuario'];

    $channelId = "1109410803389567066";

    $mensaje = "<@&{$rolId}> ".date("d/m/y H:i:s")." Se ha creado un nuevo usuario: $usuario";

}

elseif($comando === "loginuser"){
    $usuario = $_GET['nombreusuario'];

    $channelId = "1109202636533682296";
    

    $mensaje = "<@&{$rolId}> ".date("d/m/y H:i:s")." Ha iniciado sesión en la pagina web el siguiente usuario: $usuario";
}




// URL de la API de Discord
$url = "https://discord.com/api/v10/channels/{$channelId}/messages";

// Encabezados de la solicitud HTTP
$headers = [
    'Authorization: Bot ' . $token,
    'Content-Type: application/json'
];

// Datos del mensaje
$data = [
    'content' => $mensaje
];

// Codificar los datos como JSON
$jsonData = json_encode($data);

// Configurar la solicitud HTTP
$options = [
    CURLOPT_URL => $url,
    CURLOPT_HTTPHEADER => $headers,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_POST => true,
    CURLOPT_POSTFIELDS => $jsonData,
    CURLOPT_SSL_VERIFYPEER => false // Deshabilitar la verificación del certificado SSL (solo para pruebas, no recomendado en producción)
];

// Iniciar la solicitud HTTP con cURL
$ch = curl_init();
curl_setopt_array($ch, $options);

// Ejecutar la solicitud y obtener la respuesta
$response = curl_exec($ch);

// Verificar si ocurrió algún error
if ($response === false) {
    echo 'Error en la solicitud: ' . curl_error($ch);
}

// Obtener el código de respuesta HTTP
$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

// Cerrar la conexión cURL
curl_close($ch);

// Verificar el código de respuesta HTTP
if ($httpCode === 200) {
    echo 'Notificación enviada exitosamente.';
} else {
    echo 'Error al enviar la notificación. Código de respuesta: ' . $httpCode;
}


?>