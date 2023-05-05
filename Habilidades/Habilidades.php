<?php
include_once $_SERVER['DOCUMENT_ROOT'].'\M7_Robert_UF1\DB\ModelDatosDB.php';

class Habilidades extends ModelDatosDB {
    
    protected $table = "habilidades";
    
    public function insert($nombre,$descripcion,$idTipoHabilidad) 
    {

        $sql = "insert into habilidades(nombre,descripcion,id_tipo_habilidad) values(:nombre,:descripcion,:idTipoHabilidad)";

        $ordre = $this->bd->prepare($sql);  
        $ordre->bindValue(':nombre',$nombre); 
        $ordre->bindValue(':descripcion',$descripcion); 
        $ordre->bindValue(':idTipoHabilidad',$idTipoHabilidad); 
        $res = $ordre->execute();
        return $res;

    }

    public function update($id,$nombre,$descripcion,$idTipoHabilidad)
    {
        $sql = "update habilidades set nombre = :nombre, descripcion=:descripcion, id_tipo_habilidad = :idTipoHabilidad where id=:id";

        $ordre = $this->bd->prepare($sql);  
        $ordre->bindValue(':nombre',$nombre); 
        $ordre->bindValue(':descripcion',$descripcion); 
        $ordre->bindValue(':idTipoHabilidad',$idTipoHabilidad);
        $ordre->bindValue(':id',$id);
        $res = $ordre->execute();
    }
}