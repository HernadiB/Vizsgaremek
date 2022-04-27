function LoadNonFriends(users)
{
    let template = document.getElementsByTagName('template')[0].content;
    let tbody = document.body.querySelector("tbody#nonFriendsTable");
    tbody.innerHTML = "";
    nonFriends = users.data.map(user => {
        let row = template.cloneNode( true).children[0];
        row.querySelector('td#userName').innerHTML = user.Username;
        row.querySelector('button#btn_userInvite').onclick = function(){ InviteFriend(user.ID)}
        row.querySelector('button#btn_userProfile').onclick = function(){ GetUserByID(user.ID)}
        tbody.append(row);
        return {fullName: user.FullName, userName: user.Username, element: row}
    })
}

let nonFriends = [];
let searchbar = document.querySelector('#searchbar');
searchbar.addEventListener("input", e => {
    let value = e.target.value.toLowerCase();
    nonFriends.forEach(user => {
        let isVisible = user.fullName.toLowerCase().includes(value) || user.userName.toLowerCase().includes(value)
        user.element.classList.toggle("d-none", !isVisible)
    })
})