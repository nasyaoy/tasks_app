<?php
include 'db.php';
// isset() - проверяет инициализирована ли переменная (то есть объявлена и не равна NULL)
if (
    isset($_POST['task']) && !empty($_POST['task']) &&
    isset($_POST['task_date']) && !empty($_POST['task_date']) &&
    isset($_POST['task_time']) && !empty($_POST['task_time']) &&
    isset($_POST['priority']) && !empty($_POST['priority'])
);

// mysqli_real_escape_string -  экранирует специальные символы в строке для использования в SQL-выражении
$task = mysqli_real_escape_string($connection, $_POST['task']);
$task_date = mysqli_real_escape_string($connection, $_POST['task_date']);
$task_time = mysqli_real_escape_string($connection, $_POST['task_time']);
$priority = mysqli_real_escape_string($connection, $_POST['priority']);

// Создаем SQL-запрос для добавления новой задачи в БД
$query = "INSERT INTO tasks(task, task_date, task_time, priority) VALUES ('$task', '$task_date', '$task_time', '$priority')";
// Выполнение SQL-запроса
$result = mysqli_query($connection, $query);
if($result) {
    // Если запрос выполниться успешно
    // Перенаправляем польщователя на главную страницу
    header("Location: index.php");
    // Иначе
} else{
    echo mysqli_error($connection);
}

// Закрытие соединения с базой данных
mysqli_close($connection);