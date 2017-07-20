<!DOCTYPE html>
<html>
    <head>
	<meta charset="UTF-8">
    </head>
</html>   
<?php // построчное извлечение результатов
require_once 'login.php';//подключение к серверу MySQL с помощью mysqli
$conn=new mysqli($hn, $un, $pw, $db);
if($conn->connect_error) die($conn->connect_error);// выводим ошибку при подключении к БД
$query="SELECT * FROM students";
$result=$conn->query($query);

if(!$result) die ($conn->error);
$rows=$result->num_rows;
for($j=0; $j<$rows; ++$j)
{
    $result->data_seek($j);
    $row=$result->fetch_array(MYSQLI_ASSOC);
    echo 'id: ' .$row['id']. '<br>';
    echo 'name: ' .$row['name']. '<br>';
    echo 'email: ' .$row['email']. '<br><br>';
}

$result->close();
$conn->close();

?>
