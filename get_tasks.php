<?php
include 'db.php';

// Запрос на выборку данных из ДБ
// ORDER BY - сортировка по указанному полю
// ASC - сортировка по возрастанию (по умолчанию)
$query = "SELECT * FROM tasks ORDER BY task_date ASC, task_time ASC";
 
// mysqli_query($connection, $query) - при успешном выполнении запроса SELECT получим ссылку 
$result = mysqli_query($connection, $query);


// mysqli_fetch_assoc() - Выбирает одну строку данных из набора результатов и возвращает её в виде ассоциативного массива
// при каждом вызове этой функции - будет возвращать следующую строкув наборе результатов или null, если сторок больше нет
$tasks = [];
while($row = mysqli_fetch_assoc($result)) {
    // Добавление каждой выбранной задачи в массив tasks
    $tasks[] = $row;
}
// Преобразование массива в формат json и вывод на экран
echo json_encode($tasks);
// Закрыть соединение с БД
mysqli_close($connection);