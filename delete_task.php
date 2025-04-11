<?php
include 'db.php';

if(isset($_GET['id'])){
    // Экранируем id
    $id = mysqli_real_escape_string($connection, $_GET['id']);
    // Запрос к бд на удаление
    $query = "DELETE FROM tasks WHERE id = '$id'";
    // Выполнение запроса 
    $result = mysqli_query($connection, $query);
    if($result) {
// Успешное удалени
    }else{
    // Ошибка при удалении задачи
}    
}
mysqli_close($connection);