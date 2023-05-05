<?php
include_once $_SERVER['DOCUMENT_ROOT'].'\M7_Robert_UF1\DB\ModelDatosDB.php';

class HabilidadesCampeones extends ModelDatosDB {
    
    protected $table = "habilidades_campeones";
    
    public function insert($idCampeon,$idHabilidad) 
    {

        $sql = "insert into habilidades_campeones(id_campeon,id_habilidad) values(:idCampeon,:idHabilidad)";

        $ordre = $this->bd->prepare($sql);  
        $ordre->bindValue(':idCampeon',$idCampeon); 
        $ordre->bindValue(':idHabilidad',$idHabilidad); 
        $res = $ordre->execute();
        return $res;

    }

    public function update($id,$idCampeon,$idHabilidad)
    {
        $sql = "update habilidades_campeones set id_campeon = :idCampeon, id_habilidad = :idHabilidad where id=:id";

        $ordre = $this->bd->prepare($sql);  
        $ordre->bindValue(':idCampeon',$idCampeon);
        $ordre->bindValue(':idHabilidad',$idHabilidad); 
        $ordre->bindValue(':id',$id);
        $res = $ordre->execute();
    }
}