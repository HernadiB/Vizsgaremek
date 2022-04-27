let url = "http://localhost:8881";

function GetCountryLeaderboard()
{
    fetch(`${url}/api/users/country`)
        .then(response => response.json())
        .then(result => LoadCountryTop10(result))
        .catch(error => console.log('error', error));
}
function GetTasks()
{
    fetch(`${url}/api/tasks`)
        .then(response => response.json())
        .then(result => LoadAllTasks(result.data))
        .catch(error => console.log('error', error));
}
function GetUserByID(user_id)
{
    LoadingImage();
    fetch(`${url}/api/users/${user_id}`)
        .then(response => response.json())
        .then(result => {hideLoading();ShowProfile(result.data)})
        .catch(error => console.log('error', error));
}
function NonFriendsFiltered()
{
    let gender = document.querySelector('select#gender').value;
    let role = document.querySelector('select#role').value;
    let team = document.querySelector('select#team').value;
    let level = document.querySelector('select#level').value;
    GetNonFriends(gender, role, team, level);
}
function GetNonFriends(gender = '', role = '', team = '', level = '')
{
    let csrfToken = document.head.querySelector("[name~=csrf-token][content]").content;
    let header = new Headers();

    header.append("Accept", "application/json");
    header.append("Content-Type", "application/json");
    header.append("X-CSRF-Token", csrfToken);

    let body = JSON.stringify({
        "gender": gender,
        "role": role,
        "team": team,
        "level": level
    });

    let options = {
        method: 'POST',
        headers: header,
        body: body
    };

    fetch(`${url}/users/nonfriends`, options)
        .then(response => response.json())
        .then(result => LoadNonFriends(result))
        .catch(error => console.log('error', error));
}
function InviteFriend(id)
{
    let csrfToken = document.head.querySelector("[name~=csrf-token][content]").content;
    let header = new Headers();

    header.append("Accept", "application/json");
    header.append("Content-Type", "application/json");
    header.append("X-CSRF-Token", csrfToken);

    let options = {
        method: 'POST',
        headers: header
    };

    fetch(`${url}/friend/invite/${id}`, options)
        .then(response => response.json())
        .then(result => {
            alert(result.message);
            window.location.reload();
        })
        .catch(error => console.log('error', error));
}

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