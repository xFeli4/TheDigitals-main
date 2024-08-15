<?php

require_once "../conexion/Conexion.php";
require_once "res/Respuesta.php";

class Usuario{

    function obtener(){
        try{
            $connection = conection();
            $sql = "SELECT * FROM usuario;";
            $respuesta = $connection->query($sql);
            $personas = $respuesta->fetch_all(MYSQLI_ASSOC);
            
            $msj = "Usuarios obtenidos correctamente";
            return new Respuesta(true, $msj, $personas);
        }catch(Exception $e){
            $msj = $e->getMessage();
            return new Respuesta(false, $msj, []);
        }
    }

    function insertar($nombre, $apellido, $tel, $apodo, $calle, $numero, $pass, $mail, $admin){
        try{
            $connection = conection();
            $sql = "INSERT FROM usuario VALUES (0, $nombre, $apellido, $tel, $apodo, $calle, $numero, $pass, $mail, $admin)";
            $respuesta = $connection->query($sql);

            $msj = "Se ingresó correctamente el Usuario";
            return new Respuesta(true, $msj, $respuesta);
        }catch(Exception $e){
            $msj = "Error al ingresar el Usuario:". $e->getMessage();
            return new Respuesta(false, $msj, []);
        }
    }

    function modificar($id, $nombre, $apellido, $tel, $apodo, $calle, $numero, $pass, $mail){
        $connection = conection();
        $sql = "UPDATE usuario SET nombre = $nombre, apellido = $apellido, tel = $tel, apodo = $apodo, calle = $calle, numero = $numero, mail = $mail =  WHERE id_Usuario = $id";
        $respuesta = $connection->query($sql);
        return $respuesta;
    }

    function eliminar($id){
        try{
            $connection = conection();
            $sql = "DELETE FROM usuario WHERE id_Usuario  = $id";
            $respuesta = $connection->query($sql);
            
            $msj = "Usuario eliminado correctamente";
            return new Respuesta(true, $msj, $respuesta);
    
        }catch(Exception $e){
            $msj = "Error al eliminar el Usuario:". $e->getMessage();
            return new Respuesta(false, $msj, []);
        }
    }
    

}

?>