<?php
class crud{
    public static function conect(){
       try {
        $con=new PDO('mysql:localhost=host; dbname=crud', 'root', '');
        return $con;
       } catch (PDOException $error1) {
       echo 'Error al conectarse :('.$error1->getMessage();
       }catch(Exception $error2){
        echo 'Error al generar'.$error2->getMessage();
       }
    }
    public static function Selectdata ()
    {
        $data=array();
        $p=crud::conect()->prepare('SELECT * FROM crudtabla');
        $p->execute();
        $data=$p->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }
    public static function delete ($id)
    {
       $p=crud::conect()->prepare('DELETE FROM crudtabla WHERE id=:id');
       $p->bindValue(':id',$id);
       $p->execute();
       
    }
}
?>