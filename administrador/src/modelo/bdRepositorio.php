<?php

class Repositorio{

    public function autentificarUsuario($usuario){
        try {
            include '../config/bd.php';
            $conectar= new Conexion();
            $consulta=$conectar->prepare("SELECT * FROM usuarios WHERE 
            nombre=:nombre");
            $consulta->bindValue(":nombre",$usuario->getNombre()); 
            $consulta->execute();
            $consulta->setFetchMode(PDO::FETCH_ASSOC);
            return $consulta->fetchAll();         
        } catch (Exception $e) {
            return 0;
        }
    }

    public function validarCorreo($validUsuario){
        try {
            include '../config/bd.php';
            $conectar= new Conexion();
            $consulta=$conectar->prepare("SELECT * FROM usuarios WHERE 
            nombre=:nombre");
            $consulta->bindValue(":nombre",$validUsuario->getNombre()); 
            $consulta->execute();
            $consulta->setFetchMode(PDO::FETCH_ASSOC);
            return $consulta->fetchAll();         
        } catch (Exception $e) {
            return 0;
        }
    }

    public function cambiarClave($nuevoUsuario){
        include '../config/bd.php';
        $conectar=new Conexion();
        $consulta=$conectar->prepare("UPDATE usuarios SET clave=:clave WHERE id=:id");          
        $consulta ->bindValue(":clave",$nuevoUsuario->getClave());   
        $consulta ->bindValue(":id",$nuevoUsuario->getId());                           
        $consulta->execute();
        return true;
    }

    public function registrarUsuarios($usuarios){
        try {
            include '../config/bd.php';
            $conectar=new Conexion();
            $consulta=$conectar->prepare("INSERT INTO usuarios(nombre,clave)
            VALUES(:nombre,:clave)");
            $consulta->bindValue(":nombre",$usuarios->getNombre());
            $consulta->bindValue(":clave",$usuarios->getClave()); 
            $consulta->execute();
            return true;
        } catch (Exception $e) {
            return false;
        }
    }

    public function guardarRepositorios($repoDoc,$idUsuario){
        try {
            include '../config/bd.php';
            $conectar=new Conexion();
            $consulta=$conectar->prepare("INSERT INTO repositorios(titulo,descripcion,autor,categoria,fecha,archivo,idUsuario)
            VALUES(:titulo,:descripcion,:autor,:categoria,:fecha,:archivo,:idUsuario)");
            $consulta->bindValue(":titulo",$repoDoc->getTitulo());
            $consulta->bindValue(":descripcion",$repoDoc->getDescripcion());
            $consulta->bindValue(":autor",$repoDoc->getAutor());
            $consulta->bindValue(":categoria",$repoDoc->getCategoria());
            $consulta->bindValue(":fecha",$repoDoc->getFecha());
            $consulta->bindValue(":archivo",$repoDoc->getArchivo());
            $consulta->bindValue(":idUsuario",$idUsuario);
            $consulta->execute();
            return true;
        } catch (Exception $e) {
            return false;
        }
    }

    public function obtenerRepositorios(){
        try {
            include '../config/bd.php';
            $conectar= new Conexion();
            $consulta=$conectar->prepare("SELECT id,titulo,fecha,descripcion FROM repositorios");
            $consulta->execute();
            $consulta->setFetchMode(PDO::FETCH_ASSOC);
            return $consulta->fetchAll();         
        } catch (Exception $e) {
            return 0;
        }
    }

    public function obtenerRepositoriosId($repoDoc){
        try {
            include '../config/bd.php';
            $conectar= new Conexion();
            $consulta=$conectar->prepare("SELECT titulo,descripcion,autor,categoria,fecha,archivo FROM repositorios WHERE id=:id");
            $consulta->bindValue(":id",$repoDoc->getId());
            $consulta->execute();
            $consulta->setFetchMode(PDO::FETCH_ASSOC);
            return $consulta->fetchAll();         
        } catch (Exception $e) {
            return 0;
        }
    }

    public function editarRepositoriosNoArchivo($conectar,$repoDoc,$idUsuario){
        $consulta=$conectar->prepare("UPDATE repositorios SET titulo=:titulo,descripcion=:descripcion,autor=:autor,categoria=:categoria,fecha=:fecha,idUsuario=:idUsuario WHERE id=:id");          
        $consulta->bindValue(":titulo",$repoDoc->getTitulo());   
        $consulta->bindValue(":descripcion",$repoDoc->getDescripcion());
        $consulta->bindValue(":autor",$repoDoc->getAutor());
        $consulta->bindValue(":categoria",$repoDoc->getCategoria());
        $consulta->bindValue(":fecha",$repoDoc->getFecha());
        $consulta->bindValue(":idUsuario",$idUsuario);
        $consulta->bindValue(":id",$repoDoc->getId());
        $consulta->execute();
        return true;
    }

    public function editarRepositoriosArchivo($conectar,$repoDoc){
        $consulta=$conectar->prepare("UPDATE repositorios SET archivo=:archivo WHERE id=:id");     
        $consulta->bindValue(":archivo",$repoDoc->getArchivo());     
        $consulta->bindValue(":id",$repoDoc->getId());                           
        $consulta->execute();
        return true;
    }

    public function obtenerRepositoriosArchivo($conectar,$repoDoc){
        try {
            $consulta=$conectar->prepare("SELECT archivo FROM repositorios WHERE id=:id");
            $consulta->bindValue(":id",$repoDoc->getId());
            $consulta->execute();
            $consulta->setFetchMode(PDO::FETCH_ASSOC);
            return $consulta->fetchAll();         
        } catch (Exception $e) {
            return 0;
        }
    }

    public function eliminarRepositorio($conectar,$repoDoc){
        $consulta=$conectar->prepare("DELETE FROM repositorios WHERE id=:id");  
        $consulta->bindValue(":id",$repoDoc->getId());        
        $consulta->execute();
        return true;
    }
}

?>