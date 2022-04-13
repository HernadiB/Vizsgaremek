function LoadAllTasks(tasks)
{
    let template = document.getElementsByTagName('template')[0];
    let tbody = document.body.querySelector("tbody");
    tbody.innerHTML = "";
    tasks.forEach(task => {
        let row = document.importNode(template, true).content;
        row.querySelector('td#levelname').innerHTML = task.Level;
        row.querySelector('td#taskname').innerHTML = task.Name;
        row.querySelector('td#description').innerHTML = task.Description;
        row.querySelector('td#score').innerHTML = task.Score;
        tbody.append(row);
    })
}