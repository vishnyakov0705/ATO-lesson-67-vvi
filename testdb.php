<?php
//ini_set('display_errors', false);//выключаем отображение ошибки
const DB_USER='root';
const DB_PASS='';
const DB_NAME='ato_php_test';
const DB_HOST='localhost';

$db=mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
//var_dump($db);
if(!$db){
    echo 'возникла проблема при подключении: '. mysqli_connect_errno().' '. mysqli_connect_error();
} else {
   //echo 'подключении к СУБД успешное'; 
   $query='SELECT * FROM students';
   $result=mysqli_query($db, $query);
   //var_dump($result);
   if(!$result){
       echo 'результат не был получен' . mysqli_errno($db).' '. mysqli_error($db);
   }else{
        while($row= mysqli_fetch_assoc($result)){
        var_dump($row);
        } 
   }
   mysqli_close($db);      
}
?>

