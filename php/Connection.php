<?php 
class Connection{
    private $server = "localhost";
    private $user = "tu_usuario_bbdd";
    private $password = "tu_contrasena_bbdd";
    private $db = "nombre_bbdd";

    public function getConnection(){
        return $conexion = new mysqli(
            $this->server,
            $this->user,
            $this->password,
            $this->db);
    }



    
}

?>