function CsapatomShow()
{
    let csapat = document.querySelector('div#csapat');
    let csapatFelvetel = document.querySelector('div#csapatfelvetel');
    csapat.classList.remove('d-none');
    csapatFelvetel.classList.add('d-none')
}
function CsapattagFelvetelShow()
{
    let csapat = document.querySelector('div#csapat');
    let csapatFelvetel = document.querySelector('div#csapatfelvetel');
    csapat.classList.add('d-none');
    csapatFelvetel.classList.remove('d-none')
}