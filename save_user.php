<!DOCTYPE html>
<html>
    <head>
	<meta charset="UTF-8">
    </head>
</html>   
<?php
    if (isset($_POST['name'])) 
    { 
	$name = $_POST['name']; 
	if ($name == '') 
	{ 
	    unset($name);
	} 
    } //заносим введенный пользователем name в переменную $name, если он пустой, то уничтожаем переменную
    if (isset($_POST['email'])) //определяет, установлена ли переменная.
    { 
	$email=$_POST['email']; 
	if ($email =='') 
	{ 
	    unset($email);	       
	} 	       
    }//заносим введенный пользователем email в переменную $email, если он пустой, то уничтожаем переменную
    if (empty($name) or empty($email)) //если пользователь не ввел name или email, то выдаем ошибку и останавливаем скрипт
    {
	exit ("Вы ввели не всю информацию, вернитесь назад и заполните все поля.");
    }
//если name и email введены, то обрабатываем их, чтобы теги и скрипты не работали, мало ли что люди могут ввести
    $name = stripslashes($name);
    $name = htmlspecialchars($name);
    $email = stripslashes($email);
    $email = htmlspecialchars($email);
//удаляем лишние пробелы
    $name = trim($name);
    $email = trim($email);
// подключаемся к базе
    include('db.php');// файл db.php должен быть в той же папке, что и все остальные, если это не так, то просто нееобходимо изменить путь 
// проверка на существование пользователя с таким же name
    $result = mysqli_query($db, "SELECT id FROM students WHERE name='$name'");
    $myrow = mysqli_fetch_array($result);//Выбирает одну строку из результирующего набора и помещает ее в ассоциативный массив, обычный массив или в оба
    if (!empty($myrow['id'])) 
    {
	exit ("Извините, введённый вами name уже зарегистрирован. Введите другой name.");
    }
// если такого нет, то сохраняем данные
    $result2 = mysqli_query ($db, "INSERT INTO students (name, email) VALUES('$name','$email')");
// Проверяем, есть ли ошибки
    if ($result2=='TRUE')
    {
	echo "Вы успешно зарегистрированы! Теперь вы можете зайти на сайт. <a href='index.php'>Главная страница</a>";
    }
 else 
    {
	echo "Ошибка! Вы не зарегистрированы.";
    }
?>