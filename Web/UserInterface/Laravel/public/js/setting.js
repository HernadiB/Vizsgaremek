// document.getElementById('darkBackground').addEventListener('change', function(event){
//     (event.target.checked) ? document.body.setAttribute('data-theme', 'dark') : document.body.removeAttribute('data-theme');
// });

function darkMode(){
    let element = document.body;
    element.classList.toggle("dark");
}