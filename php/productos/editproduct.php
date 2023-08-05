<?php
include('../Connection.php');
include('../Crud.php');
session_start();



$nombre = $_POST["nombre"];
$descripcion = $_POST["descripcion"];
$precio = $_POST["precio"];
$cantidad = $_POST["cantidad"];
$tipo = $_POST["tipo"];
$id = $_GET['id'];
$imagenant = $_POST["imagenant"];
$archivoant = $_POST['archivoant'];
if (isset($nombre) && isset($descripcion)) {
    if (!empty($nombre) && !empty($descripcion)) {
        if (strlen($nombre) > 0 && strlen(trim($nombre)) == 0 || strlen($descripcion) > 0 && strlen(trim($descripcion)) == 0 || $nombre == "" || $descripcion == "") {
            echo "error1";
        } else {
            if (strlen($nombre) < 30 && strlen($descripcion) < 244) {
                if($precio >= 0 && $cantidad >= 0){
                    $database = new Crud();
                    $sqlConnection = new Connection();
                    if (0 < $_FILES['imagen1']['error'][0]) {
                        echo 'Error: ' . $_FILES['imagen1']['error'][0] . '<br>';
                    } else {
    
                        $usuario = $_SESSION['user'];
    
                        $result = $database->getinfo("SELECT * FROM usuarios WHERE usuario='$usuario'");
    
                        while ($row = $result->fetch_assoc()) {
                            $id_user = $row['id'];
                            $id_tipo = $row['id_tipo'];
                        }
    
    
                        $result = $database->getinfo("SELECT * FROM productos WHERE id='$id'");
    
                        while ($row = $result->fetch_assoc()) {
                            $imagen = $row['imagen'];
                            $archivos_producto = $row['archivos'];
                        }
    
                        
    
    
    
                        if ($_FILES['archivoedit']['name'][0] != "") {
                            $result = $database->getinfo("SELECT COUNT(*) as totalarch FROM productos WHERE archivos='$archivos_producto'");
    
                            // Obtener el número de usuarios con ese nombre de usuario
                            $countarch = $result->fetch_assoc()["totalarch"];
                            $archivospartes = explode("/", $archivos_producto);
    
                            if ($countarch == 0) {
                                unlink("../../archivos/" . $archivospartes[1]);
                            }
                        }
    
    
                        if ($tipo == 1) {
                            if ($id_tipo != 1) {
                                if ($_FILES['imagen1']['name'][0] != "") {
                                    $allowed_types = array('image/jpeg', 'image/png');
                                    $file_type = mime_content_type($_FILES['imagen1']['tmp_name'][0]);
    
                                    if (!in_array($file_type, $allowed_types)) {
                                        echo "error3";
                                    } else {
                                        $max_file_size = 2 * 1024 * 1024; // 2MB en bytes
                                        if ($_FILES["imagen1"]["size"][0] > $max_file_size) {
                                            echo "error7";
                                        } else {
                                            $nombre_archivo = $_FILES['imagen1']['name'][0];
                                            $temp_archivo = $_FILES['imagen1']['tmp_name'][0];
                                            $carpeta_destino = '../../img/';
    
                                            $partes_nombre_archivo = explode(".", $nombre_archivo);
                                            $extension = end($partes_nombre_archivo); // Obtener la extensión del archivo de imagen
    
                                            $hash = hash_file('md5', $temp_archivo); // Generar un hash único para el archivo de imagen
                                            $nuevo_nombre = $hash . "." . $extension; // Concatenar el hash y la extensión para crear un nombre de archivo único
    
                                            $destino = $carpeta_destino . $nuevo_nombre;
                                            move_uploaded_file($temp_archivo, $destino); // Mover la imagen al destino con el nuevo nombre único
    
                                            $data = array($nombre, $descripcion, $precio, $cantidad, "img/" . $nuevo_nombre, $tipo, $id_user, "Sin archivos");
    
                                            $database->editProduct($id, $data);
                                            EliminarImagenes($database, $imagen,$id);
    
                                            Marcadeagua($nuevo_nombre);
    
    
                                            echo "added";
                                        }
                                    }
                                } else if ($_FILES['imagen1']['name'][0] == "") {
                                    $data = array($nombre, $descripcion, $precio, $cantidad, $imagenant, $tipo, $id_user, "Sin archivos");
    
                                    $database->editProduct($id, $data);
    
                                    EliminarImagenes($database, $imagen,$id);
                                    echo "added";
                                } else {
                                    echo "error1";
                                }
                            } else {
                                $id_usuario = $_POST['id_usuario'];
                                if ($_FILES['imagen1']['name'][0] != "") {
                                    $allowed_types = array('image/jpeg', 'image/png');
                                    $file_type = mime_content_type($_FILES['imagen1']['tmp_name'][0]);
    
                                    if (!in_array($file_type, $allowed_types)) {
                                        echo "error3";
                                    } else {
                                        $max_file_size = 2 * 1024 * 1024; // 2MB en bytes
                                        if ($_FILES["imagen1"]["size"][0] > $max_file_size) {
                                            echo "error7";
                                        } else {
                                            $nombre_archivo = $_FILES['imagen1']['name'][0];
                                            $temp_archivo = $_FILES['imagen1']['tmp_name'][0];
                                            $carpeta_destino = '../../img/';
    
                                            $partes_nombre_archivo = explode(".", $nombre_archivo);
                                            $extension = end($partes_nombre_archivo); // Obtener la extensión del archivo de imagen
    
                                            $hash = hash_file('md5', $temp_archivo); // Generar un hash único para el archivo de imagen
                                            $nuevo_nombre = $hash . "." . $extension; // Concatenar el hash y la extensión para crear un nombre de archivo único
    
                                            $destino = $carpeta_destino . $nuevo_nombre;
                                            move_uploaded_file($temp_archivo, $destino); // Mover la imagen al destino con el nuevo nombre único
    
                                            $data = array($nombre, $descripcion, $precio, $cantidad, "img/" . $nuevo_nombre, $tipo, $id_usuario, "Sin archivos");
    
                                            $database->editProduct($id, $data);
    
                                            Marcadeagua($nuevo_nombre);
                                            EliminarImagenes($database, $imagen,$id);
                                            echo "added";
                                        }
                                    }
                                } else if ($_FILES['imagen1']['name'][0] == "") {
                                    $data = array($nombre, $descripcion, $precio, $cantidad, $imagenant, $tipo, $id_usuario, "Sin archivos");
    
                                    $database->editProduct($id, $data);
                                    EliminarImagenes($database, $imagen,$id);
                                    echo "added";
                                } else {
                                    echo "error1";
                                }
                            }
                        } else {
    
                            $result = $database->getinfo("SELECT * FROM productos WHERE id='$id'");
    
                            while ($row = $result->fetch_assoc()) {
                                $archivos_prod = $row['archivos'];
                            }
    
    
    
    
                            if ($id_tipo != 1) {
                                if ($archivos_prod == "Sin archivos") {
                                    if ($_FILES['imagen1']['name'][0] != "" && $_FILES['archivoedit']['name'][0] != "") {
                                        $allowed_types = array('image/jpeg', 'image/png');
                                        $file_type = mime_content_type($_FILES['imagen1']['tmp_name'][0]);
    
                                        if (!in_array($file_type, $allowed_types)) {
                                            echo "error3";
                                        } else {
                                            $max_file_size = 2 * 1024 * 1024; // 2MB en bytes
                                            if ($_FILES["imagen1"]["size"][0] > $max_file_size) {
                                                echo "error7";
                                            } else {
                                                $nombre_archivo = $_FILES['imagen1']['name'][0];
                                                $temp_archivo = $_FILES['imagen1']['tmp_name'][0];
                                                $carpeta_destino = '../../img/';
    
                                                $partes_nombre_archivo = explode(".", $nombre_archivo);
                                                $extension = end($partes_nombre_archivo); // Obtener la extensión del archivo de imagen
    
                                                $hash = hash_file('md5', $temp_archivo); // Generar un hash único para el archivo de imagen
                                                $nuevo_nombre = $hash . "." . $extension; // Concatenar el hash y la extensión para crear un nombre de archivo único
    
                                                $destino = $carpeta_destino . $nuevo_nombre;
                                                move_uploaded_file($temp_archivo, $destino); // Mover la imagen al destino con el nuevo nombre único
    
    
                                                $nombre_archivo1 = $_FILES['archivoedit']['name'][0];
                                                $temp_archivo1 = $_FILES['archivoedit']['tmp_name'][0];
                                                $carpeta_destino1 = '../../archivos/';
    
                                                $partes_nombre_archivo1 = explode(".", $nombre_archivo1);
                                                $extension1 = end($partes_nombre_archivo1); // Obtener la extensión del archivo de imagen
    
                                                $hash1 = hash_file('md5', $temp_archivo1); // Generar un hash único para el archivo de imagen
                                                $nuevo_nombre1 = $hash1 . "." . $extension1; // Concatenar el hash y la extensión para crear un nombre de archivo único
    
                                                $destino1 = $carpeta_destino1 . $nuevo_nombre1;
                                                move_uploaded_file($temp_archivo1, $destino1); // Mover la imagen al destino con el nuevo nombre único
    
    
                                                $data = array($nombre, $descripcion, $precio, $cantidad, "img/" . $nuevo_nombre, $tipo, $id_user, 'archivos/' . $nuevo_nombre1);
    
                                                $database->editProduct($id, $data);
                                                EliminarImagenes($database, $imagen,$id);
                                                EliminarArchivos($database, $archivos_producto, $id);
                                                Marcadeagua($nuevo_nombre);
                                                echo "added";
                                            }
                                        }
                                    } else if ($_FILES['imagen1']['name'][0] == "" && $_FILES['archivoedit']['name'][0] != "") {
    
    
                                        $nombre_archivo1 = $_FILES['archivoedit']['name'][0];
                                        $temp_archivo1 = $_FILES['archivoedit']['tmp_name'][0];
                                        $carpeta_destino1 = '../../archivos/';
    
                                        $partes_nombre_archivo1 = explode(".", $nombre_archivo1);
                                        $extension1 = end($partes_nombre_archivo1); // Obtener la extensión del archivo de imagen
    
                                        $hash1 = hash_file('md5', $temp_archivo1); // Generar un hash único para el archivo de imagen
                                        $nuevo_nombre1 = $hash1 . "." . $extension1; // Concatenar el hash y la extensión para crear un nombre de archivo único
    
                                        $destino1 = $carpeta_destino1 . $nuevo_nombre1;
                                        move_uploaded_file($temp_archivo1, $destino1); // Mover la imagen al destino con el nuevo nombre único
    
    
                                        $data = array($nombre, $descripcion, $precio, $cantidad, $imagenant, $tipo, $id_user, 'archivos/' . $nuevo_nombre1);
    
                                        $database->editProduct($id, $data);
                                        EliminarImagenes($database, $imagen,$id);
                                        EliminarArchivos($database, $archivos_producto, $id);
                                        Marcadeagua($nuevo_nombre);
                                        echo "added";
                                    } else {
                                        echo "error1";
                                    }
                                } else {
                                    if ($_FILES['imagen1']['name'][0] != "" && $_FILES['archivoedit']['name'][0] != "") {
                                        $allowed_types = array('image/jpeg', 'image/png');
                                        $file_type = mime_content_type($_FILES['imagen1']['tmp_name'][0]);
    
                                        if (!in_array($file_type, $allowed_types)) {
                                            echo "error3";
                                        } else {
                                            $max_file_size = 2 * 1024 * 1024; // 2MB en bytes
                                            if ($_FILES["imagen1"]["size"][0] > $max_file_size) {
                                                echo "error7";
                                            }
                                            else{
                                                $nombre_archivo = $_FILES['imagen1']['name'][0];
                                                $temp_archivo = $_FILES['imagen1']['tmp_name'][0];
                                                $carpeta_destino = '../../img/';
        
                                                $partes_nombre_archivo = explode(".", $nombre_archivo);
                                                $extension = end($partes_nombre_archivo); // Obtener la extensión del archivo de imagen
        
                                                $hash = hash_file('md5', $temp_archivo); // Generar un hash único para el archivo de imagen
                                                $nuevo_nombre = $hash . "." . $extension; // Concatenar el hash y la extensión para crear un nombre de archivo único
        
                                                $destino = $carpeta_destino . $nuevo_nombre;
                                                move_uploaded_file($temp_archivo, $destino); // Mover la imagen al destino con el nuevo nombre único
        
        
                                                $nombre_archivo1 = $_FILES['archivoedit']['name'][0];
                                                $temp_archivo1 = $_FILES['archivoedit']['tmp_name'][0];
                                                $carpeta_destino1 = '../../archivos/';
        
                                                $partes_nombre_archivo1 = explode(".", $nombre_archivo1);
                                                $extension1 = end($partes_nombre_archivo1); // Obtener la extensión del archivo de imagen
        
                                                $hash1 = hash_file('md5', $temp_archivo1); // Generar un hash único para el archivo de imagen
                                                $nuevo_nombre1 = $hash1 . "." . $extension1; // Concatenar el hash y la extensión para crear un nombre de archivo único
        
                                                $destino1 = $carpeta_destino1 . $nuevo_nombre1;
                                                move_uploaded_file($temp_archivo1, $destino1); // Mover la imagen al destino con el nuevo nombre único
        
        
                                                $data = array($nombre, $descripcion, $precio, $cantidad, "img/" . $nuevo_nombre, $tipo, $id_user, 'archivos/' . $nuevo_nombre1);
        
                                                $database->editProduct($id, $data);
                                                EliminarImagenes($database, $imagen,$id);
                                                EliminarArchivos($database, $archivos_producto, $id);
                                                Marcadeagua($nuevo_nombre);
                                                echo "added";
                                            }
                                            
                                        }
                                    } else if ($_FILES['imagen1']['name'][0] == "" && $_FILES['archivoedit']['name'][0] != "") {
    
    
                                        $nombre_archivo1 = $_FILES['archivoedit']['name'][0];
                                        $temp_archivo1 = $_FILES['archivoedit']['tmp_name'][0];
                                        $carpeta_destino1 = '../../archivos/';
    
                                        $partes_nombre_archivo1 = explode(".", $nombre_archivo1);
                                        $extension1 = end($partes_nombre_archivo1); // Obtener la extensión del archivo de imagen
    
                                        $hash1 = hash_file('md5', $temp_archivo1); // Generar un hash único para el archivo de imagen
                                        $nuevo_nombre1 = $hash1 . "." . $extension1; // Concatenar el hash y la extensión para crear un nombre de archivo único
    
                                        $destino1 = $carpeta_destino1 . $nuevo_nombre1;
                                        move_uploaded_file($temp_archivo1, $destino1); // Mover la imagen al destino con el nuevo nombre único
    
    
                                        $data = array($nombre, $descripcion, $precio, $cantidad, $imagenant, $tipo, $id_user, 'archivos/' . $nuevo_nombre1);
    
                                        $database->editProduct($id, $data);
                                        EliminarImagenes($database, $imagen,$id);
                                        EliminarArchivos($database, $archivos_producto, $id);
                                        Marcadeagua($nuevo_nombre);
                                        echo "added";
                                    } else if ($_FILES['imagen1']['name'][0] != "" && $_FILES['archivoedit']['name'][0] == "") {
                                        $allowed_types = array('image/jpeg', 'image/png');
                                        $file_type = mime_content_type($_FILES['imagen1']['tmp_name'][0]);
    
                                        if (!in_array($file_type, $allowed_types)) {
                                            echo "error3";
                                        } else {
                                            $max_file_size = 2 * 1024 * 1024; // 2MB en bytes
                                            if ($_FILES["imagen1"]["size"][0] > $max_file_size) {
                                                echo "error7";
                                            }
                                            else{
                                                $nombre_archivo = $_FILES['imagen1']['name'][0];
                                                $temp_archivo = $_FILES['imagen1']['tmp_name'][0];
                                                $carpeta_destino = '../../img/';
        
                                                $partes_nombre_archivo = explode(".", $nombre_archivo);
                                                $extension = end($partes_nombre_archivo); // Obtener la extensión del archivo de imagen
        
                                                $hash = hash_file('md5', $temp_archivo); // Generar un hash único para el archivo de imagen
                                                $nuevo_nombre = $hash . "." . $extension; // Concatenar el hash y la extensión para crear un nombre de archivo único
        
                                                $destino = $carpeta_destino . $nuevo_nombre;
                                                move_uploaded_file($temp_archivo, $destino); // Mover la imagen al destino con el nuevo nombre único
        
        
                                                $data = array($nombre, $descripcion, $precio, $cantidad, 'img/' . $nuevo_nombre, $tipo, $id_user, $archivoant);
        
                                                $database->editProduct($id, $data);
                                                EliminarImagenes($database, $imagen,$id);
                                                EliminarArchivos($database, $archivos_producto, $id);
                                                Marcadeagua($nuevo_nombre);
                                                echo "added";
                                            }
                                            
                                        }
                                    } else if ($_FILES['imagen1']['name'][0] == "" && $_FILES['archivoedit']['name'][0] == "") {
                                        $data = array($nombre, $descripcion, $precio, $cantidad, $imagenant, $tipo, $id_user, $archivoant);
    
                                        $database->editProduct($id, $data);
                                        EliminarImagenes($database, $imagen,$id);
                                        EliminarArchivos($database, $archivos_producto, $id);
                                        echo "added";
                                    } else {
                                        echo "error1";
                                    }
                                }
                            } else {
                                $id_usuario = $_POST['id_usuario'];
                                if ($archivos_prod == "Sin archivos") {
                                    if ($_FILES['imagen1']['name'][0] != "" && $_FILES['archivoedit']['name'][0] != "") {
                                        $allowed_types = array('image/jpeg', 'image/png');
                                        $file_type = mime_content_type($_FILES['imagen1']['tmp_name'][0]);
    
                                        if (!in_array($file_type, $allowed_types)) {
                                            echo "error3";
                                        } else {
                                            $max_file_size = 2 * 1024 * 1024; // 2MB en bytes
                                            if ($_FILES["imagen1"]["size"][0] > $max_file_size) {
                                                echo "error7";
                                            }
                                            else{
                                                $nombre_archivo = $_FILES['imagen1']['name'][0];
                                                $temp_archivo = $_FILES['imagen1']['tmp_name'][0];
                                                $carpeta_destino = '../../img/';
        
                                                $partes_nombre_archivo = explode(".", $nombre_archivo);
                                                $extension = end($partes_nombre_archivo); // Obtener la extensión del archivo de imagen
        
                                                $hash = hash_file('md5', $temp_archivo); // Generar un hash único para el archivo de imagen
                                                $nuevo_nombre = $hash . "." . $extension; // Concatenar el hash y la extensión para crear un nombre de archivo único
        
                                                $destino = $carpeta_destino . $nuevo_nombre;
                                                move_uploaded_file($temp_archivo, $destino); // Mover la imagen al destino con el nuevo nombre único
        
        
                                                $nombre_archivo1 = $_FILES['archivoedit']['name'][0];
                                                $temp_archivo1 = $_FILES['archivoedit']['tmp_name'][0];
                                                $carpeta_destino1 = '../../archivos/';
        
                                                $partes_nombre_archivo1 = explode(".", $nombre_archivo1);
                                                $extension1 = end($partes_nombre_archivo1); // Obtener la extensión del archivo de imagen
        
                                                $hash1 = hash_file('md5', $temp_archivo1); // Generar un hash único para el archivo de imagen
                                                $nuevo_nombre1 = $hash1 . "." . $extension1; // Concatenar el hash y la extensión para crear un nombre de archivo único
        
                                                $destino1 = $carpeta_destino1 . $nuevo_nombre1;
                                                move_uploaded_file($temp_archivo1, $destino1); // Mover la imagen al destino con el nuevo nombre único
        
        
                                                $data = array($nombre, $descripcion, $precio, $cantidad, "img/" . $nuevo_nombre, $tipo, $id_usuario, 'archivos/' . $nuevo_nombre1);
        
                                                $database->editProduct($id, $data);
                                                EliminarImagenes($database, $imagen,$id);
                                                EliminarArchivos($database, $archivos_producto, $id);
                                                Marcadeagua($nuevo_nombre);
                                                echo "added";
                                            }
                                           
                                        }
                                    } else if ($_FILES['imagen1']['name'][0] == "" && $_FILES['archivoedit']['name'][0] != "") {
    
                                        $nombre_archivo1 = $_FILES['archivoedit']['name'][0];
                                        $temp_archivo1 = $_FILES['archivoedit']['tmp_name'][0];
                                        $carpeta_destino1 = '../../archivos/';
    
                                        $partes_nombre_archivo1 = explode(".", $nombre_archivo1);
                                        $extension1 = end($partes_nombre_archivo1); // Obtener la extensión del archivo de imagen
    
                                        $hash1 = hash_file('md5', $temp_archivo1); // Generar un hash único para el archivo de imagen
                                        $nuevo_nombre1 = $hash1 . "." . $extension1; // Concatenar el hash y la extensión para crear un nombre de archivo único
    
                                        $destino1 = $carpeta_destino1 . $nuevo_nombre1;
                                        move_uploaded_file($temp_archivo1, $destino1); // Mover la imagen al destino con el nuevo nombre único
    
    
                                        $data = array($nombre, $descripcion, $precio, $cantidad, $imagenant, $tipo, $id_usuario, 'archivos/' . $nuevo_nombre1);
    
                                        $database->editProduct($id, $data);
                                        EliminarImagenes($database, $imagen,$id);
                                        EliminarArchivos($database, $archivos_producto, $id);
                                        Marcadeagua($nuevo_nombre);
                                        echo "added";
                                    } else {
                                        echo "error1";
                                    }
                                } else {
                                    if ($_FILES['imagen1']['name'][0] != "" && $_FILES['archivoedit']['name'][0] != "") {
                                        $allowed_types = array('image/jpeg', 'image/png');
                                        $file_type = mime_content_type($_FILES['imagen1']['tmp_name'][0]);
    
                                        if (!in_array($file_type, $allowed_types)) {
                                            echo "error3";
                                        } else {
                                            $max_file_size = 2 * 1024 * 1024; // 2MB en bytes
                                            if ($_FILES["imagen1"]["size"][0] > $max_file_size) {
                                                echo "error7";
                                            }
                                            else{
                                                $nombre_archivo = $_FILES['imagen1']['name'][0];
                                                $temp_archivo = $_FILES['imagen1']['tmp_name'][0];
                                                $carpeta_destino = '../../img/';
        
                                                $partes_nombre_archivo = explode(".", $nombre_archivo);
                                                $extension = end($partes_nombre_archivo); // Obtener la extensión del archivo de imagen
        
                                                $hash = hash_file('md5', $temp_archivo); // Generar un hash único para el archivo de imagen
                                                $nuevo_nombre = $hash . "." . $extension; // Concatenar el hash y la extensión para crear un nombre de archivo único
        
                                                $destino = $carpeta_destino . $nuevo_nombre;
                                                move_uploaded_file($temp_archivo, $destino); // Mover la imagen al destino con el nuevo nombre único
        
        
                                                $nombre_archivo1 = $_FILES['archivoedit']['name'][0];
                                                $temp_archivo1 = $_FILES['archivoedit']['tmp_name'][0];
                                                $carpeta_destino1 = '../../archivos/';
        
                                                $partes_nombre_archivo1 = explode(".", $nombre_archivo1);
                                                $extension1 = end($partes_nombre_archivo1); // Obtener la extensión del archivo de imagen
        
                                                $hash1 = hash_file('md5', $temp_archivo1); // Generar un hash único para el archivo de imagen
                                                $nuevo_nombre1 = $hash1 . "." . $extension1; // Concatenar el hash y la extensión para crear un nombre de archivo único
        
                                                $destino1 = $carpeta_destino1 . $nuevo_nombre1;
                                                move_uploaded_file($temp_archivo1, $destino1); // Mover la imagen al destino con el nuevo nombre único
        
        
                                                $data = array($nombre, $descripcion, $precio, $cantidad, "img/" . $nuevo_nombre, $tipo, $id_usuario, 'archivos/' . $nuevo_nombre1);
        
                                                $database->editProduct($id, $data);
                                                EliminarImagenes($database, $imagen,$id);
                                                EliminarArchivos($database, $archivos_producto, $id);
                                                Marcadeagua($nuevo_nombre);
                                                echo "added";
                                            }
                                            
                                        }
                                    } else if ($_FILES['imagen1']['name'][0] == "" && $_FILES['archivoedit']['name'][0] != "") {
    
                                        $nombre_archivo1 = $_FILES['archivoedit']['name'][0];
                                        $temp_archivo1 = $_FILES['archivoedit']['tmp_name'][0];
                                        $carpeta_destino1 = '../../archivos/';
    
                                        $partes_nombre_archivo1 = explode(".", $nombre_archivo1);
                                        $extension1 = end($partes_nombre_archivo1); // Obtener la extensión del archivo de imagen
    
                                        $hash1 = hash_file('md5', $temp_archivo1); // Generar un hash único para el archivo de imagen
                                        $nuevo_nombre1 = $hash1 . "." . $extension1; // Concatenar el hash y la extensión para crear un nombre de archivo único
    
                                        $destino1 = $carpeta_destino1 . $nuevo_nombre1;
                                        move_uploaded_file($temp_archivo1, $destino1); // Mover la imagen al destino con el nuevo nombre único
    
    
                                        $data = array($nombre, $descripcion, $precio, $cantidad, $imagenant, $tipo, $id_usuario, 'archivos/' . $nuevo_nombre1);
    
                                        $database->editProduct($id, $data);
                                        EliminarImagenes($database, $imagen, $id);
                                        EliminarArchivos($database, $archivos_producto, $id);
                                        Marcadeagua($nuevo_nombre);
                                        echo "added";
                                    } else if ($_FILES['imagen1']['name'][0] != "" && $_FILES['archivoedit']['name'][0] == "") {
                                        $allowed_types = array('image/jpeg', 'image/png');
                                        $file_type = mime_content_type($_FILES['imagen1']['tmp_name'][0]);
    
                                        if (!in_array($file_type, $allowed_types)) {
                                            echo "error3";
                                        } else {
                                            $max_file_size = 2 * 1024 * 1024; // 2MB en bytes
                                            if ($_FILES["imagen1"]["size"][0] > $max_file_size) {
                                                echo "error7";
                                            }
                                            else{
                                                $nombre_archivo = $_FILES['imagen1']['name'][0];
                                                $temp_archivo = $_FILES['imagen1']['tmp_name'][0];
                                                $carpeta_destino = '../../img/';
        
                                                $partes_nombre_archivo = explode(".", $nombre_archivo);
                                                $extension = end($partes_nombre_archivo); // Obtener la extensión del archivo de imagen
        
                                                $hash = hash_file('md5', $temp_archivo); // Generar un hash único para el archivo de imagen
                                                $nuevo_nombre = $hash . "." . $extension; // Concatenar el hash y la extensión para crear un nombre de archivo único
        
                                                $destino = $carpeta_destino . $nuevo_nombre;
                                                move_uploaded_file($temp_archivo, $destino); // Mover la imagen al destino con el nuevo nombre único
        
        
                                                $data = array($nombre, $descripcion, $precio, $cantidad, 'img/' . $nuevo_nombre, $tipo, $id_usuario, $archivoant);
        
                                                $database->editProduct($id, $data);
                                                EliminarImagenes($database, $imagen, $id);
                                                EliminarArchivos($database, $archivos_producto, $id);
                                                Marcadeagua($nuevo_nombre);
                                                echo "added";
                                            }
                                            
                                        }
                                    } else if ($_FILES['imagen1']['name'][0] == "" && $_FILES['archivoedit']['name'][0] == "") {
                                        $data = array($nombre, $descripcion, $precio, $cantidad, $imagenant, $tipo, $id_usuario, $archivoant);
    
                                        $database->editProduct($id, $data);
                                        EliminarImagenes($database, $imagen, $id);
                                        EliminarArchivos($database, $archivos_producto, $id);
                                        echo "added";
                                    } else {
                                        echo "error1";
                                    }
                                }
                            }
                        }
                    }
                }
                else{
                    echo "error9";
                }
                
            } else {
                echo "error4";
            }
        }
    }
}

function EliminarImagenes($database, $imagen, $id)
{
    if ($_FILES['imagen1']['name'][0] != "") {
        if ($imagen != "media/no-item.png") {
            $result = $database->getinfo("SELECT COUNT(*) as total FROM productos WHERE imagen='$imagen'");
            $count = $result->fetch_assoc()["total"];

            $imagenpartes = explode("/", $imagen);

            if ($count == 0) {
                $img_path = "../../img/" . $imagenpartes[1];
                $lowres_path = "../../imglowres/low" . $imagenpartes[1];
                if (file_exists($img_path)) {
                    unlink($img_path);
                }
                if (file_exists($lowres_path)) {
                    unlink($lowres_path);
                }
            } else {
            }
        }
    }
}



function EliminarArchivos($database, $archivos, $id)
{
    if ($_FILES['archivoedit']['name'][0] != "") {
        if ($archivos != "Sin archivos") {
            $result = $database->getinfo("SELECT COUNT(*) as total FROM productos WHERE archivos='$archivos'");
            $count = $result->fetch_assoc()["total"];

            $imagenpartes = explode("/", $archivos);

            if ($count == 0) {
                $img_path = "../../archivos/" . $imagenpartes[1];
                if (file_exists($img_path)) {
                    unlink($img_path);
                }
            } else {
            }
        }
    }
}

function Marcadeagua($archivo)
{
    if ($_FILES['imagen1']['type'][0] == "image/png") {

        // Cargar la imagen original
        $imagen_original = imagecreatefrompng('../../img/' . $archivo);

        // Obtener las dimensiones de la imagen original
        $ancho_original = imagesx($imagen_original);
        $alto_original = imagesy($imagen_original);

        // Crear una imagen en blanco para la redimensionada
        $nueva_anchura = 300;
        $nuevo_alto = round($alto_original * ($nueva_anchura / $ancho_original));
        $imagen_redimensionada = imagecreatetruecolor($nueva_anchura, $nuevo_alto);

        // Redimensionar la imagen original y copiarla en la imagen en blanco creada
        imagecopyresampled($imagen_redimensionada, $imagen_original, 0, 0, 0, 0, $nueva_anchura, $nuevo_alto, $ancho_original, $alto_original);

        // Cargar la imagen de la marca de agua
        $marca_de_agua = imagecreatefrompng('../../media/marcadeagua.png');

        // Establecer la transparencia de la marca de agua
        imagealphablending($marca_de_agua, true);
        imagesavealpha($marca_de_agua, true);

        // Redimensionar la marca de agua para que tenga las mismas dimensiones que la imagen original
        $marca_de_agua_redimensionada = imagecreatetruecolor($nueva_anchura, $nuevo_alto);
        imagecopyresampled($marca_de_agua_redimensionada, $marca_de_agua, 0, 0, 0, 0, $nueva_anchura, $nuevo_alto, imagesx($marca_de_agua), imagesy($marca_de_agua));

        // Fusionar la imagen original redimensionada con la marca de agua en la posición (0, 0)
        $opacidad = 25; // 50% de opacidad
        imagecopymerge($imagen_redimensionada, $marca_de_agua_redimensionada, 0, 0, 0, 0, $nueva_anchura, $nuevo_alto, $opacidad);

        // Guardar la imagen resultante
        $ruta_imagen_resultante = '../../imglowres/low' . $archivo;
        imagepng($imagen_redimensionada, $ruta_imagen_resultante, 9);

        // Liberar memoria
        imagedestroy($imagen_original);
        imagedestroy($marca_de_agua);
        imagedestroy($marca_de_agua_redimensionada);
        imagedestroy($imagen_redimensionada);
        unlink("../../img/" . $archivo);
    } else {
        $imagen_original = imagecreatefromjpeg('../../img/' . $archivo);

        // Obtener las dimensiones de la imagen original
        $ancho_original = imagesx($imagen_original);
        $alto_original = imagesy($imagen_original);

        // Crear una imagen en blanco para la redimensionada
        $nueva_anchura = 300;
        $nuevo_alto = round($alto_original * ($nueva_anchura / $ancho_original));
        $imagen_redimensionada = imagecreatetruecolor($nueva_anchura, $nuevo_alto);

        // Redimensionar la imagen original y copiarla en la imagen en blanco creada
        imagecopyresampled($imagen_redimensionada, $imagen_original, 0, 0, 0, 0, $nueva_anchura, $nuevo_alto, $ancho_original, $alto_original);

        // Cargar la imagen de la marca de agua
        $marca_de_agua = imagecreatefrompng('../../media/marcadeagua.png');

        // Establecer la transparencia de la marca de agua
        imagealphablending($marca_de_agua, true);
        imagesavealpha($marca_de_agua, true);

        // Redimensionar la marca de agua para que tenga las mismas dimensiones que la imagen original
        $marca_de_agua_redimensionada = imagecreatetruecolor($nueva_anchura, $nuevo_alto);
        imagecopyresampled($marca_de_agua_redimensionada, $marca_de_agua, 0, 0, 0, 0, $nueva_anchura, $nuevo_alto, imagesx($marca_de_agua), imagesy($marca_de_agua));

        // Fusionar la imagen original redimensionada con la marca de agua en la posición (0, 0)
        $opacidad = 26; // 25% de opacidad
        imagecopymerge($imagen_redimensionada, $marca_de_agua_redimensionada, 0, 0, 0, 0, $nueva_anchura, $nuevo_alto, $opacidad);

        // Guardar la imagen resultante
        $ruta_imagen_resultante = '../../imglowres/low' . $archivo;
        imagejpeg($imagen_redimensionada, $ruta_imagen_resultante, 90);

        // Liberar memoria
        imagedestroy($imagen_original);
        imagedestroy($marca_de_agua);
        imagedestroy($marca_de_agua_redimensionada);
        imagedestroy($imagen_redimensionada);
        unlink("../../img/" . $archivo);
    }
}
