function ShowProfile(user)
{
    // let modalHeader = document.querySelector('div.modal-header');
    // let modalTitle = modalHeader.querySelector('h5.modal-title');
    let modalBody = document.querySelector('div#exampleModal').querySelector('div.modal-body');
    let profilePicture = document.createElement('img');
    profilePicture.classList.add('profImg');
    let name = document.createElement('h2');
    name.classList.add('text-center');
    let teamRole = document.createElement('h5');
    teamRole.classList.add('text-center', 'teamRole');
    let hr = document.createElement('hr');
    let birthdate = document.createElement('h4');
    let gender = document.createElement('h4');
    let email = document.createElement('h4');
    let level = document.createElement('h4');
    let score = document.createElement('h4');
    profilePicture.src = "./../" + user.ProfilePicture ;

    // modalTitle.innerHTML = user.FullName + " adatai";
    name.innerText = user.FullName + "\n" + "  (" +  user.Username + ")";
    teamRole.innerText = user.Team + " (" + ((user.Role == "Felhasználó") ? "Csapattag" : "Vezető") + ")";
    birthdate.innerText = 'Született: ' + user.Birthdate;
    gender.innerText = 'Neme: ' + user.Gender;
    email.innerText = 'E-mail: ' + user.Email;
    level.innerText = 'Szint: ' + (user.Level ?? "-");
    score.innerText = 'Pontszám: ' + (user.Score ?? "-");
    // modalHeader.append(modalTitle);
    modalBody.append(profilePicture, name, teamRole, hr, birthdate, gender, email, level, score);

    if (user.Team == null)
    {
        teamRole.innerText = 'Még egyetlen csapatnak sem tagja';
    }
}