let url = "http://localhost:8881";

function GetCountryLeaderboard()
{
    fetch(`${url}/api/users/country`)
        .then(response => response.json())
        .then(result => LoadCountryTop10(result.data))
        .catch(error => console.log('error', error));
}
function GetTasks()
{
    fetch(`${url}/api/tasks`)
        .then(response => response.json())
        .then(result => LoadAllTasks(result.data))
        .catch(error => console.log('error', error));
}