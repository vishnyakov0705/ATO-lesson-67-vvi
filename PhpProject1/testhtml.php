<?php
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Table</title>
    </head>
    <body>
        <table border="1">
            <tr><th><?= foreach($row as  ):?></th>
                <th>Второй заголовок</th>
                <th>Третий заголовок</th>
            </tr>
            <tr><td>строка 1, ячейка 1</td><td>строка 1, ячейка 2</td><td>строка 1, ячейка 3</td></tr>
            <tr><td>строка 2, ячейка 1</td><td>строка 2, ячейка 2</td><td>строка 2, ячейка 3</td></tr>
            <tr><td>строка 3, ячейка 1</td><td>строка 3, ячейка 2</td><td>строка 3, ячейка 3</td></tr>
            <tr><td>строка 4, ячейка 1</td><td>строка 4, ячейка 2</td><td>строка 4, ячейка 3</td></tr>
        </table>
    </body>
</html>
//https://ru.stackoverflow.com/questions/220603/%D0%94%D0%BE%D0%B1%D0%B0%D0%B2%D0%BB%D0%B5%D0%BD%D0%B8%D0%B5-%D0%B4%D0%B0%D0%BD%D0%BD%D1%8B%D1%85-%D0%B2-%D0%91%D0%94-%D1%87%D0%B5%D1%80%D0%B5%D0%B7-%D1%84%D0%BE%D1%80%D0%BC%D1%83