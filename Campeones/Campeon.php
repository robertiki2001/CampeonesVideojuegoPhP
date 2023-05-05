<?php
include_once $_SERVER['DOCUMENT_ROOT'].'\M7_Robert_UF1\DB\ModelDatosDB.php';

class Campeon extends ModelDatosDB {
    
    protected $table = "campeon";
    
    public function insert($nombre,$nivel,$ataque,$armadura,$vida,$idUsuario) 
    {

        $sql = "insert into campeon(nombre,nivel,ataque,armadura,vida,id_usuario) values(:nombre,:nivel,:ataque,:armadura,:vida,:idUsuario)";

        $ordre = $this->bd->prepare($sql);  
        $ordre->bindValue(':nombre',$nombre); 
        $ordre->bindValue(':nivel',$nivel); 
        $ordre->bindValue(':ataque',$ataque);
        $ordre->bindValue(':armadura',$armadura); 
        $ordre->bindValue(':vida',$vida); 
        $ordre->bindValue(':idUsuario',$idUsuario); 
        $res = $ordre->execute();
        return $res;

    }

    public function update($id,$nombre,$nivel,$ataque,$armadura,$vida,$idUsuario)
    {
        $sql = "update campeon set nombre = :nombre, nivel=:nivel, ataque = :ataque, armadura = :armadura, vida = :vida, id_usuario = :idUsuario where id=:id";

        $ordre = $this->bd->prepare($sql);  
        $ordre->bindValue(':nombre',$nombre); 
        $ordre->bindValue(':nivel',$nivel); 
        $ordre->bindValue(':ataque',$ataque);
        $ordre->bindValue(':armadura',$armadura); 
        $ordre->bindValue(':vida',$vida); 
        $ordre->bindValue(':idUsuario',$idUsuario); 
        $ordre->bindValue(':id',$id);
        $res = $ordre->execute();
    }
}