<?php

class Categoria extends Conectar{

   public function get_categoria(){
        $conectar =parent::Conexion();
        parent::set_name();

        $sql="SELECT * FROM categoria WHERE est=1";
        $sql=$conectar->prepare($sql);
        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
   }

   public function get_categoria_id($cat_id){
        $conectar =parent::Conexion();
        parent::set_name();

        $sql="SELECT * FROM categoria WHERE est=1  AND cat_id= ?";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1,$cat_id);
        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    } 
    
    public function insert_categoria($cat_nom,$cat_obs){
        $conectar =parent::Conexion();
        parent::set_name();

        $sql="INSERT INTO categoria (cat_id,cat_nom,cat_obs,est) VALUES (null,?,?,1)";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1,$cat_nom);
        $sql->bindValue(2,$cat_obs);
        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    } 

    public function update_categoria($cat_id,$cat_nom,$cat_obs){
        $conectar =parent::Conexion();
        parent::set_name();

        $sql="UPDATE categoria  SET
            cat_nom = ?,
            cat_obs = ?
            WHERE
            cat_id = ?;
            ";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1,$cat_nom);
        $sql->bindValue(2,$cat_obs);
        $sql->bindValue(3,$cat_id);
        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    } 

    public function delete_categoria($cat_id){
        $conectar =parent::Conexion();
        parent::set_name();

        $sql="UPDATE categoria  SET
            est = 0
            WHERE
            cat_id = ?; ";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1,$cat_id);
        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    } 
}


?>