let url = "http://localhost:8881";

function GetCountryLeaderboard()
{
    fetch(`${url}/api/users/country`)
        .then(response => response.json())
        .then(result => LoadCountryTop10(result))
        .catch(error => console.log('error', error));
}
// function GetTasks()
// {
//     fetch(`${url}/api/tasks`)
//         .then(response => response.json())
//         .then(result => LoadAllTasks(result.data))
//         .catch(error => console.log('error', error));
// }
function GetUserByID(user_id)
{
    LoadingImage();
    fetch(`${url}/api/users/${user_id}`)
        .then(response => response.json())
        .then(result => {hideLoading();ShowProfile(result.data)})
        .catch(error => console.log('error', error));
}

// function GetTaskImageByID(task_id)
// {
//     LoadingImage();
//     fetch(`${url}/api/tasks/${task_id}`)
//         .then(response => response.json())
//         .then(result => {hideLoading();ShowTaskImage(result.data.Image)})
//         .catch(error => console.log('error', error));
// }

function LoadingImage()
{
    let modalBody = document.querySelector('div#exampleModal').querySelector('div.modal-body');
    modalBody.innerHTML = "";
    let loadingDiv = document.createElement('div');
    loadingDiv.id = 'loading';
    modalBody.append(loadingDiv);
    displayLoading();
}

function displayLoading() {
    let loadingDiv = document.querySelector("#loading");
    loadingDiv.classList.add("display");
    setTimeout(() => {
        loadingDiv.classList.remove("display");
    }, 100000);
}

function hideLoading() {
    let loadingDiv = document.querySelector("#loading");
    loadingDiv.classList.remove("display");
}