let boton = document.querySelector(".searchbutton");
let item = document.querySelector(".form-control");
let lupa = document.querySelector(".searchbutton");
const search = document.querySelector(".form-control");
let pfHeader = document.querySelector(".pfHeader");
const PopLR = document.querySelector(".PopLR");

lupa.addEventListener('click', () => {
	item.classList.toggle("feature-v");
});


// lupa.addEventListener('click', () => {
// 	search.classList.toggle("search-v");
    
// });

pfHeader.addEventListener('click', () => {

    // alert("hola");
	PopLR.classList.toggle("PopLR-v");t
    
});