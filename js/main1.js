// Функция удаления задачи принимает индентификатор задачи для удаления
function deleteTask(taskId){
    if(confirm("Удалить задачу?")){
        fetch(`delete_task.php?id=${taskId}`)
            .then(()=> {
                // Перезагрузка страницы после успешного удаления 
                window.location.reload();
            })
            .catch((error) => {
                alert("Произошла ошибка");
            })
    };
}

// Функция загрузки задач из сервера и отображение их на странице

function loadTasks() {
    // Отправляем GET-запрос на сервер для получения задач
    // Асинхронная функция fetch возвращает promise, к которому применяется метод then
    // При его выполнении в переменной response будет ответ сервера
    fetch('get_tasks.php')
        // Метод then используют, чтобы выполнить код после успешного выполнения асинхронной операции 
        .then((response) => {
            // Преобразовываем ответ в формат json
            return response.json();
        })
        // Метод then вернет промис результатом которого уже будет массив объектов (строк в БД)
        .then((data) => {
            const taskList = document.getElementById('taskList');
            // отчистка списка задач перед обновлением
            taskList.innerHTML = '';

            console.log(data)

            data.forEach((task) => {
                // создание нового элемента списка
                const listItem = document.createElement('li')
                // Записываю в элемент списка задачу
                listItem.innerHTML = `
                Дата: ${task.task_date}<br>
                Время: ${task.task_time}<br>
                Задача: ${task.task}<br>
                Важность: ${task.priority}`

                // Добавление кнопки удаления задачи
                listItem.innerHTML += `<button onclick='deleteTask(${task.id})'>Удалить</button>`
                
                // добавляю элемент списка в список задач
                taskList.appendChild(listItem)                
            })
        })
}

// Загрузка задач при загрузке страницы
loadTasks();
