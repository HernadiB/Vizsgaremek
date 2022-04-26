// const toggle = document.querySelector("#darkBackground");
// const theme = window.localStorage.getItem("theme");
//
// if(theme === "dark") document.body.classList.add("dark");
//
// toggle.addEventListener("click", () => {
//    document.body.classList.toggle("dark");
//    if (theme === "dark"){
//        window.localStorage.setItem("theme", "light");
//    } else window.localStorage.setItem("theme", "dark");
// });

// document.querySelector('.darkBackground').addEventListener('click', function (event){
//     (event.target.checked) ? document.body.setAttribute('data-theme', 'dark'): document.body.removeAttribute('data-theme');
// });


// function simpleBg(){
//     var element = document.body;
//     element.classList.toggle("darkSimpleBg");
// }

const theme = window.localStorage.getItem("theme");
function changeMode(){
    var element = document.body;
    element.classList.toggle("darkMode");
}