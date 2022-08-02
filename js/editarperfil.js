let boton = document.querySelector(".searchbutton");
let item = document.querySelector(".form-control");
let lupa = document.querySelector(".searchbutton");
const search = document.querySelector(".form-control");
let pfHeader = document.querySelector(".pfHeader2");
const PopLR = document.querySelector(".PopLR");

lupa.addEventListener('click', () => {
	item.classList.toggle("feature-v");
});


pfHeader.addEventListener('click', () => {

    // alert("hola");
	PopLR.classList.toggle("PopLR-v");t
    
});

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