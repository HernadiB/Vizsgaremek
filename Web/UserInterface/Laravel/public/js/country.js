function LoadCountryTop10(users)
{
    let template = document.getElementsByTagName('template')[0];
    let tbody = document.body.querySelector("tbody");
    tbody.innerHTML = "";
    for (let [key, value] of Object.entries(users)) {
        let row = document.importNode(template, true).content;
        row.querySelector('td#rank').innerHTML = key;
        row.querySelector('td#name').innerHTML = value.username;
        row.querySelector('td#score').innerHTML = value.score;
        tbody.append(row);
    }
}