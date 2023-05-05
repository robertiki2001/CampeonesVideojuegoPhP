<?php
include_once 'C:\xampp\htdocs\M7_Robert_UF1\DB\conectar.php';

class ModelDatosDB {

    protected $bd;

    protected $table = "";

    public function __construct() 
    {
        try 
        {
            
            $this->bd = conectar();
        } 
        catch(PDOException $e) 
        {
            echo "Error de connexió";
            exit;
        }    

    }

    //CRUD: create, read, update, delete

    public function getAll() 
    {
        $sql = "Select * from ".$this->table;
        $query = $this->bd->query($sql);
        $resultat = $query->fetchAll(PDO::FETCH_ASSOC);
        //print_r($resultat);
        return $resultat;
    }

    public function get($id) 
    {
        $sql = "Select * from ".$this->table." where id=:id";
        $ordre = $this->bd->prepare($sql);  
        $ordre->bindValue(':id',$id);   
        $ordre->execute(); 
        $resultat = $ordre->fetch(PDO::FETCH_ASSOC);  
        return $resultat;
    }

    public function delete($id) 
    {
        $sql = "Delete from ".$this->table." where id=:id";

        $ordre = $this->bd->prepare($sql);  
        $ordre->bindValue(':id',$id);   
        $res = $ordre->execute();
        return $res;
    }

    public function numPages($num_regs) 
    {
        $sql = "select count(*),count(*) from ".$this->table;
        //echo "<br>".$sql."<br>";
        $resultat = $this->bd->prepare($sql);
        $resultat->execute();
        $reg = $resultat->fetch(PDO::FETCH_NUM); // recuperem el registre
        //print_r($reg);
        $total_regs = $reg[0]; // la informaciÃ³ estarÃ  
        // en la primera posiciÃ³ del array
        $total_pags = ceil($total_regs / $num_regs);
        return $total_pags;
    }

    public function getPage($pagina, $numRegs) 
    {
        $inici = ($pagina - 1) * $numRegs;
        $sentencia = $this->bd->prepare("SELECT * from ".$this->table." LIMIT :ini, :numr");
        // El bindValue porta un segon paràmetre per especificar el tipus de la variable que es vol enllaçar.
        // S'ha de fer així per a que ens funcionni correctament!
        $sentencia->bindValue(':ini', $inici, PDO::PARAM_INT);
        $sentencia->bindValue(':numr', $numRegs, PDO::PARAM_INT);
        $sentencia->execute();
        $resultat = $sentencia->fetchAll(PDO::FETCH_ASSOC);
        return $resultat;
    }

}




































