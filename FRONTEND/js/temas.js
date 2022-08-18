let boton = document.querySelector(".searchbutton");
let item = document.querySelector(".form-control");
const search = document.querySelector(".form-control");
let pfHeader = document.querySelector(".pfHeader");
const PopLR = document.querySelector(".PopLR");
let menu = document.querySelector(".imgMenu");
let desplegable = document.querySelector(".list");
let configButton = document.querySelector(".configButton")
let x = document.querySelector(".x");
let form = document.querySelector(".cajaPublicarNuevo")
let boton1 = document.querySelector(".buttonCreate")
let botontema = document.querySelector(".botonTemas")
let divtema = document.querySelector(".divTema");


boton.addEventListener('click', () => {
    item.classList.toggle("feature-v");
});

menu.addEventListener('click', () => {
    desplegable.classList.toggle("list-v")
})
botontema.addEventListener("click", ()=>{
    divtema.classList.toggle("temas-v");
});

pfHeader.addEventListener('click', () => {
    PopLR.classList.toggle("PopLR-v");
})

//funcion para cambiar color del tema
function color(body,claveLocalStorage,color){
	load();
	
function load(){

	let bod = document.querySelector(body);
	const modeNoche = localStorage.getItem(claveLocalStorage);

    if(!modeNoche){
        store(false)
    } else if(modeNoche == "true"){
		bod.classList.toggle(color);
    }
}
}
// OSCURO
let body = "body";
let modo = "modonoche";
let colorOscuro = "oscuro";
color(body,modo,colorOscuro);

// AZUL
let body1 = "body"
let modoAzul = "modoazul";
let colorAzul = "azul";
color(body1,modoAzul,colorAzul);

//VERDE



