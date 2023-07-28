<?php 

class conexion{
    private $servidor="localhost";
    private $usuario ="root";
    private $contraseña="";
    private $conexion;

    public function __construct()
    {
        try{
            $this->conexion=new PDO("mysql:host=$this->servidor;dbname=almacen",$this->usuario,$this->contraseña);
            $this->conexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        }
        catch(PDOException $e){
            return "Falla de conexion " .$e;
        }
    }
    public function ejecutar($sql){//insertar/delete/actualizar
        $this ->conexion->exec($sql);
        return $this->conexion->lastInsertId();
    }
    public function consultar($sql){
        $sentencia=$this->conexion->prepare($sql);
        $sentencia->execute();
        //retorna todos los elementos que tu puedas consultar con la sentencia sql
        return $sentencia->fetchAll();
    }
}
?>