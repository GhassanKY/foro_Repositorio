let x = document.querySelector(".x");
let form = document.querySelector(".cajaPublicarNuevo")
let boton1 = document.querySelector(".buttonCreate")
let botontema = document.querySelector(".botonTemas")
let divtema = document.querySelector(".divTema");
let item = document.querySelector(".form-control");
let lupa = document.querySelector(".searchbutton");
const search = document.querySelector(".form-control");
let pfHeader = document.querySelector(".pfHeader");
const PopLR = document.querySelector(".PopLR");
let menu = document.querySelector(".imgMenu");
let desplegable = document.querySelector(".list");
let configButton = document.querySelector(".configButton")
let noche = document.querySelector("#noche");



lupa.addEventListener('click', () => {
    item.classList.toggle("feature-v");
});


pfHeader.addEventListener('click', () => {

	PopLR.classList.toggle("PopLR-v");
    
})
menu.addEventListener('click', () => {
    desplegable.classList.toggle("list-v")
})



botontema.addEventListener("click", ()=>{
     divtema.classList.toggle("temas-v");
})



x.addEventListener("click", ()=>{
    form.classList.toggle("form-v");
})

boton1.addEventListener("click", ()=>{
    form.classList.toggle("form-v");
})
    
