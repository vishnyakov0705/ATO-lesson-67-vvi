<!DOCTYPE html>
<html>
    <head>
	<meta charset="UTF-8">
    </head>
</html>    

<?php //вставка и удаление данных спомощью программы sqltest.php

require_once 'login.php';//подключение к серверу MySQL с помощью mysqli
$conn=new mysqli($hn, $un, $pw, $db);//подключение к серверу MYSQL с помощью mysqli
if($conn->connect_error) die($conn->connect_error);// выводим ошибку при подключении к БД
if(isset($_POST['delete']) && isset($_POST['id']))
{
    $id=get_post($conn, 'id');
    $query="delete from students where id='$id'";
    $result=$conn->query($query);
    if(!$result) echo "Сбой при удалении данных: $query<br>" .
	    $conn->error . "<br><br>";
}
if(isset($_POST['id']) && isset($_POST['name']) && isset($_POST['email']))
{
   $id=get_post('id');
   $name=get_post($conn, 'name');
   $email=get_post($conn, 'email');
   
   $query="INSERT INTO students VALUES" . "('$id', '$name', '$email')";
   $result=$conn->query($query);
   if(!$result) echo "Сбой при вставке данных: $query<br>" . $conn->error . "<br><br>";
}
echo 
<<<_END
<form action="sqltest.php" method="post">
    <pre>
	name <input type="text" name="name">
	email <input type="email" name="email">
	<input type="submit" value="ADD RECORD">
    </pre>
</form>
_END;

$query="SELECT * FROM students";
$result=$conn->query($query);
if(!$result) die ("Сбой при доступе к базе данных: " . $conn->error);
$rows=$result->num_rows;
for($j=0; $j<$rows; ++$j)
{
    $result->data_seek($j);
   // $row=$result->fetch_arrow(MYSQLI_NUM);
    $row=$result->fetch_array(MYSQLI_ASSOC);
    echo 'id: ' .$row['id']. '<br>';
    echo 'name: ' .$row['name']. '<br>';
    echo 'email: ' .$row['email']. '<br><br>';
echo 
<<<_END
<form action="sqltest.php" method="post">
    <input type="hidden" name="delete" value="yes">
    <input type="hidden" name="id" value="$row[0]">
    <input type="submit" value="DELETE RECORD">
</form>
_END;
}

$result->close();
$conn->close();

function get_post($conn, $var)
{
    return $conn->real_escape_string($_POST[$var]);
}
?>