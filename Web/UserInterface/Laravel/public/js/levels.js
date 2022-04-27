function LoadAllTasks(tasks)
{
    let template = document.getElementsByTagName('template')[0];
    let tbody = document.body.querySelector("tbody");
    tbody.innerHTML = "";
    tasks.forEach(task => {
        let row = document.importNode(template, true).content.querySelector('tr');
        row.id = task.ID;
        row.querySelector('td#levelname').innerHTML = task.Level;
        row.querySelector('td#taskname').innerHTML = task.Name;
        row.querySelector('button#btn_viewTask').onclick = function(){
            let modalBody = document.querySelector('div#exampleModal').querySelector('div.modal-body');
            modalBody.innerHTML = "";

            let taskPicture = document.createElement('img');
            let taskDescription = document.createElement('h4');
            let taskScore = document.createElement('h4');

            taskDescription.innerText = 'Feladat leírása: ' + task.Description;
            taskScore.innerText = 'Feladat pontszáma: ' + task.Score;

            taskPicture.classList.add('img-fluid', 'mx-auto', 'd-block');
            taskPicture.style.width = "400px";
            taskPicture.src = "./../" + task.Image;
            taskDescription.classList.add('text-dark');
            taskScore.classList.add('text-dark');

            modalBody.append(taskPicture, taskDescription, taskScore);
        }
        tbody.append(row);
    })
}

function ScrollToTask(taskID)
{
    fetch(`${url}/api/tasks`)
        .then(response => response.json())
        .then(result => {
            LoadAllTasks(result.data);
            let element = document.getElementById(`${taskID}`);
                element.style.background = "grey";
                element.scrollIntoView({
                    behavior: 'auto',
                    block: 'center',
                    inline: 'center'
                })
        })
        .catch(error => console.log('error', error));
}