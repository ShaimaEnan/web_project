<?php  
include 'config.php' ;       
$department_id=(isset($_GET['dept_id']))?$_GET['dept_id']:0;
try{
    if($department_id>0){
        $sql="SELECT * FROM doctors WHERE department_id= :id";
        $prepare=$pdo->prepare($sql);
        $prepare->execute(['id' => $department_id]);

    }else{
        $all_doc="SELECT *  FROM doctors ";
        $prepare=$pdo->prepare($all_doc);
        $prepare->execute();
    }
    $doctors=$prepare->fetchAll(PDO::FETCH_ASSOC);}
    catch(PDOException $e){
        $doctors=[];
        
    }



?>
