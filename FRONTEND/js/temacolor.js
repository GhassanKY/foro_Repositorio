
	load();
	
function load(){

	let bod = document.querySelector("body");
	const modeNoche = localStorage.getItem("clave");

		bod.classList.add(modeNoche);
        console.log(modeNoche)
}
