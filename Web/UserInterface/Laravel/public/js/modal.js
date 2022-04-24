function ShowProfile(user)
{
    let modalBody = document.querySelector('div#exampleModal').querySelector('div.modal-body');
    let profilePicture = document.createElement('img');
    profilePicture.classList.add('img-fluid', 'mx-auto', 'd-block', 'mb-4');
    profilePicture.style.width = "300px";
    let name = document.createElement('h2');
    name.classList.add('text-center');
    let teamRole = document.createElement('h5');
    teamRole.classList.add('text-center', 'text-dark');
    let birthdate = document.createElement('h4');
    birthdate.classList.add('text-dark');
    let email = document.createElement('h4');
    email.classList.add('text-dark');
    let level = document.createElement('h4');
    level.classList.add('text-dark');
    let score = document.createElement('h4');
    score.classList.add('text-dark');
    profilePicture.src = "./../" + user.ProfilePicture;
    name.innerText = user.Username + " (" + user.FullName + ")";
    teamRole.innerText = user.Team + " (" + ((user.Role == "Felhasználó") ? "Csapattag" : "Vezető") + ")";
    birthdate.innerText = 'Született: ' + user.Birthdate;
    email.innerText = 'E-mail: ' + user.Email;
    level.innerText = 'Szint: ' + (user.Level ?? "-");
    score.innerText = 'Pontszám: ' + (user.Score ?? "-");
    modalBody.append(profilePicture, name, teamRole, birthdate, email, level, score);
}

function ShowTaskImage(image)
{
    let modalBody = document.querySelector('div#exampleModal').querySelector('div.modal-body');
    modalBody.innerHTML = "";
    let taskPicture = document.createElement('img');
    taskPicture.classList.add('img-fluid', 'mx-auto', 'd-block');
    taskPicture.style.width = "400px";
    taskPicture.src = "./../" + image;
    modalBody.append(taskPicture);
}