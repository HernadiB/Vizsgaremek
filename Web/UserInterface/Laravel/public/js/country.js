function LoadCountryTop10(users)
{
    let template = document.getElementsByTagName('template')[0];
    let tbody = document.body.querySelector("tbody");
    tbody.innerHTML = "";
    let i = 1;
    users.forEach(user => {
        let row = document.importNode(template, true).content;
        row.querySelector('td#rank').innerHTML = '#' + i;
        row.querySelector('td#name').innerHTML = user.Username;
        row.querySelector('td#score').innerHTML = user.Score;
        i++;
        tbody.append(row);
    })
}