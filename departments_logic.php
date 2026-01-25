<?php
require_once 'config.php';
try{
$sql="SELECT id,name ,description,icon FROM departments";
$prepare=$pdo->prepare($sql);
$prepare->execute();
$all_departments=$prepare->fetchAll(PDO::FETCH_ASSOC);



}catch(PDOException $e){
    error_log("حدث خطا في جلب  الاقسام".$e->getMessage());
    $all_departments=[];

}





    
