let pfHeader = document.querySelector(".pfHeader");
const PopLR = document.querySelector(".PopLR");
let botoninfo = document.querySelector(".informacion1");
let botoninfo2 = document.querySelector(".info2");
let datos = document.querySelector(".datos");
let datos2 = document.querySelector(".datos2");
let desplegable = document.querySelector(".list");
let menu = document.querySelector(".imgMenu");

pfHeader.addEventListener('click', () => {

	PopLR.classList.toggle("PopLR-v");t
    
})

botoninfo.addEventListener('click', () => {
   
	datos.classList.toggle("datos-v");
    
})

botoninfo2.addEventListener('click', () => {
   document.querySelector(".datos").style.display = "none";
	datos2.classList.toggle("datos2-v");
    
})

menu.addEventListener('click', () => {
    desplegable.classList.toggle("list-v")
})



//modo noche

load();

function load(){

	let body = document.querySelector("body");
	const modeNoche = localStorage.getItem("modonoche");

    if(!modeNoche){
        store(false)
    } else if(modeNoche == "true"){
		body.classList.toggle("oscuro");
		prueba.classList.toggle("prueba")
    }
}

	