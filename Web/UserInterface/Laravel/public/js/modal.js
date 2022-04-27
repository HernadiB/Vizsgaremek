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