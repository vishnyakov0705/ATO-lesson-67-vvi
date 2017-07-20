<!DOCTYPE html>
<html>
    <head>
	<meta charset="UTF-8">
	<title>Регистрация</title>
    </head>
    <body>
	<h2>Регистрация</h2>
	<form action="save_user.php" method="post">
<!--**** save_user.php - это адрес обработчика.  То есть, после нажатия на кнопку "Зарегистрироваться", данные из полей  отправятся на страничку save_user.php методом "post" ***** -->
	    <p>
		<label>Ваше имя:<br></label>
		<input name="name" type="text" size="50" maxlength="50">
	    </p>
<!--**** В текстовое поле (name="name" type="text") пользователь вводит свё имя ***** -->
	    <p>
		<label>Ваш email:<br></label>
		<input name="email" type="email" size="50" maxlength="50">
	    </p>
<!--**** В поле для email (name="email" type="email") пользователь вводит свой email ***** --> 
	    <p>
		<input type="submit" name="submit" value="Зарегистрироваться">
<!--**** Кнопочка (type="submit") отправляет данные на страничку save_user.php ***** --> 
	    </p>
	</form>
    </body>
</html>
