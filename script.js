const formAddTask = document.querySelector('#formAddTask');

const tableTasks = document.querySelector('.table');
const inputTaskName = document.querySelector('#inputTaskname');
const checkboxes = document.querySelectorAll('.form-check-input');

const updateTask = async function (e) {


    await fetch(URL_ACTIONS, {
        method: 'PUT',
        body: JSON.stringify({
            action: 'update_task',
            done: e.target.checked,
            taskId:this.dataset.id
        })
    })
}

checkboxes.forEach(checkbox => {
    checkbox.addEventListener('change', updateTask);
})
 
const URL_ACTIONS = 'actions.php';
formAddTask.addEventListener('submit', async (e) => {
    e.preventDefault();

    const formData = new FormData(e.target);

    await fetch(URL_ACTIONS, {
        method: 'POST',
        body: formData
    }).then(data => data.json())
        .then(json => {
            if (json.code !== 'ADD_TASK_OK') {

                const row = tableTasks.insertRow();
                const firstCell = row.insertCell();
                const secondCell = row.insertCell();

                firstCell.classList.add('text-center');
 

                const checkbox = document.createElement('input');
                const taskName = document.createTextNode(json.taskName);
                checkbox.addEventListener('change', updateTask);
                checkbox.type = 'checkbox';
                checkbox.classList.add('form-check-input');
                checkbox.dataset.id = json.taskId;

                firstCell.appendChild(checkbox);
                secondCell.appendChild(taskName);


                inputTaskName.value = '';   
        }
    })
})