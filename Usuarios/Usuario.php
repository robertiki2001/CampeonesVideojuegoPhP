<?php
include_once $_SERVER['DOCUMENT_ROOT'].'\M7_Robert_UF1\DB\ModelDatosDB.php';

class Usuario extends ModelDatosDB {
    
    protected $table = "usuario";

    public function insert($nombre_cuenta,$password,$region,$pais) 
    {

        $sql = "insert into usuario(nombre_cuenta,password,region,pais) values(:nombre_cuenta,:password,:region,:pais)";;

        $ordre = $this->bd->prepare($sql);  
        $ordre->bindValue(':nombre_cuenta',$nombre_cuenta); 
        $ordre->bindValue(':password',md5($password));
        $ordre->bindValue(':region',$region); 
        $ordre->bindValue(':pais',$pais);   
        $res = $ordre->execute();
        return $res;

    }

    public function update($id,$nombre_cuenta,$password,$region,$pais)
    {
        $sql = "update usuario set nombre_cuenta = :nombre_cuenta, password=:password, region=:region, pais=:pais where id=:id";

        $ordre = $this->bd->prepare($sql);  
        $ordre->bindValue(':nombre_cuenta',$nombre_cuenta); 
        $ordre->bindValue(':password',md5($password)); 
        $ordre->bindValue(':region',$region); 
        $ordre->bindValue(':pais',$pais);
        $ordre->bindValue(':id',$id);
        $res = $ordre->execute();
    }
    

	public function valida ($username,$password)
    {
        //$password sense encriptar
        $sql = "select * from usuario where nombre_cuenta= :username AND password=:password";
        
        $ordre = $this->bd->prepare($sql);  
        $ordre->bindValue(':username',$username); 
        $ordre->bindValue(':password',md5($password));   
        $ordre->execute(); 
        $res = $ordre->fetch(PDO::FETCH_ASSOC);  

        return $res;    
    }
}