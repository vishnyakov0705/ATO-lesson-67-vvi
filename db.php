<?php
    
const DB_USER='root';
const DB_PASS='';
const DB_NAME='ato_php_test';
const DB_HOST='localhost';

$db=mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
if(!$db){
    echo 'возникла проблема при подключении: '. mysqli_connect_errno().' '. mysqli_connect_error();
} else {
   //echo 'подключении к СУБД успешное';
   //mysql_select_db ($db, 'ato_php_test');
   $query='SELECT * FROM students';//запрос к БД
   $result=mysqli_query($db, $query);//выполняем запрос при помощи функции
   if(!$result){
       echo 'результат не был получен' . mysqli_errno($db).' '. mysqli_error($db);
   }else{
        while($row= mysqli_fetch_assoc($result)){
        var_dump($row);//выводим содержание таблицы
        } 
   }
   //mysqli_close($db);      
}
?> 

