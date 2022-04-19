function ShowProfile(user)
{
    console.log(user);
    let modalbody = document.querySelector('div.modal-body');
    modalbody.innerHTML = "";
    let template = document.getElementsByTagName('template')[0].content;

    template.querySelector('h2#name').innerHTML = user.username + " (" + user.full_name + ")";
    template.querySelector('h5#team_role').innerHTML = user.team_name + " (" + ((user.role == "user") ? "Csapattag" : "Vezető") + ")";
    template.querySelector('h4#birthdate').innerHTML = 'Szültetett: ' + user.birthdate;
    template.querySelector('h4#email').innerHTML = 'E-mail: ' + user.email;
    template.querySelector('h4#level').innerHTML = 'Szint: ' + user.level_name;
    template.querySelector('h4#score').innerHTML = 'Pontszám: ' + (user.score ?? "-");

    modalbody.append(template);
}