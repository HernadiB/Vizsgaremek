function ShowProfile(user)
{
    let modalBody = document.querySelector('div#exampleModal').querySelector('div.modal-body');
    let profilePicture = document.createElement('img');
    profilePicture.classList.add('profImg');
    let name = document.createElement('h2');
    name.classList.add('text-center');
    let teamRole = document.createElement('h5');
    teamRole.classList.add('text-center', 'text-dark', 'teamRole');
    let hr = document.createElement('hr');
    let birthdate = document.createElement('h4');
    birthdate.classList.add('text-dark');
    let gender = document.createElement('h4');
    gender.classList.add('text-dark');
    let email = document.createElement('h4');
    email.classList.add('text-dark');
    let level = document.createElement('h4');
    level.classList.add('text-dark');
    let score = document.createElement('h4');
    score.classList.add('text-dark');
    profilePicture.src = "./../" + user.ProfilePicture ;

    name.innerText = user.FullName + "\n" + "  (" +  user.Username + ")";
    teamRole.innerText = user.Team + " (" + ((user.Role == "Felhasználó") ? "Csapattag" : "Vezető") + ")";
    birthdate.innerText = 'Született: ' + user.Birthdate;
    gender.innerText = 'Neme: ' + user.Gender;
    email.innerText = 'E-mail: ' + user.Email;
    level.innerText = 'Szint: ' + (user.Level ?? "-");
    score.innerText = 'Pontszám: ' + (user.Score ?? "-");
    modalBody.append(profilePicture, name, teamRole, hr, birthdate, gender, email, level, score);

    if (user.Team == null)
    {
        teamRole.innerText = 'Még egyetlen csapatnak sem tagja';
    }

}

function ShowTask(task)
{
    console.log(task)
    let modalBody = document.querySelector('div#exampleModal').querySelector('div.modal-body');
    let taskPicture = document.createElement('img');
    modalBody.innerHTML = "";
    let taskDescription = document.createElement('h4');
    taskDescription.innerText = 'Feladat leírása: ' + task.description;
    let taskScore = document.createElement('h4');
    taskScore.innerText = 'Feladat pontszáma: ' + task.score;

    taskDescription.classList.add('text-dark');
    taskScore.classList.add('text-dark');

    taskPicture.classList.add('img-fluid', 'mx-auto', 'd-block');
    taskPicture.style.width = "400px";
    taskPicture.src = "./../" + task.image;
    modalBody.append(taskPicture, taskDescription, taskScore);


}