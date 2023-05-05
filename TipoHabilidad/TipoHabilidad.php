<?php
include_once $_SERVER['DOCUMENT_ROOT'].'\M7_Robert_UF1\DB\ModelDatosDB.php';

class TipoHabilidad extends ModelDatosDB {
    
    protected $table = "tipo_habilidad";
    
    public function insert($tipo) 
    {

        $sql = "insert into tipo_habilidad(tipo) values(:tipo)";;

        $ordre = $this->bd->prepare($sql);  
        $ordre->bindValue(':tipo',$tipo); 
        $res = $ordre->execute();
        return $res;

    }

    public function update($id,$tipo)
    {
        $sql = "update tipo_habilidad set tipo = :tipo where id=:id";

        $ordre = $this->bd->prepare($sql);  
        $ordre->bindValue(':tipo',$tipo); 
        $ordre->bindValue(':id',$id);
        $res = $ordre->execute();
    }
}