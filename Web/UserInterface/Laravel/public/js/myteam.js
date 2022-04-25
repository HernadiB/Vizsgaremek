function CsapatomShow()
{
    let team = document.querySelector('div.team');
    let addTeammate = document.querySelector('div.addTeammate');
    team.classList.remove('d-none');
    addTeammate.classList.add('d-none')
}
function CsapattagFelvetelShow()
{
    let team = document.querySelector('div.team');
    let addTeammate = document.querySelector('div.addTeammate');
    team.classList.add('d-none');
    addTeammate.classList.remove('d-none')
}