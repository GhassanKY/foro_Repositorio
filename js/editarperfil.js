let boton = document.querySelector(".searchbutton");
let item = document.querySelector(".form-control");
let lupa = document.querySelector(".searchbutton");
const search = document.querySelector(".form-control");
let pfHeader = document.querySelector(".pfHeader");
const PopLR = document.querySelector(".PopLR");
let desplegable = document.querySelector(".list");
let menu = document.querySelector(".imgMenu");


menu.addEventListener('click', () => {
    desplegable.classList.toggle("list-v")
})

pfHeader.addEventListener('click', () => {

	PopLR.classList.toggle("PopLR-v");
    
})

//funcion para previsualizar la foto de perfil
let vista_preliminar = (event)=>{
    let leer_img = new FileReader();
    let id_img = document.getElementById("file");
leer_img.onload = ()=>{
    if(leer_img.readyState == 2){
     id_img.src = leer_img.result;
    }
}
leer_img.readAsDataURL(event.target.files[0]);
}