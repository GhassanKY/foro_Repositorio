
//FUNCION PARA CAMBIAR DE COLORE DEL TEMA
let body = document.querySelector("body");

function colores(boton,color,body){

    load1();
    let boto = document.querySelector(boton);
    
        boto.addEventListener("click", () =>{
            localStorage.setItem("clave", color) //guardar
        })
        
        function load1(){
            const  colorGuardado = localStorage.getItem("clave") //obtener
            
           if (color == colorGuardado){
                body.classList.add(colorGuardado);
            }
            
        }
       
       
}
//MODO NOCHE
let botonnoche = "#noche";
let colorOscuro = "oscuro";
let modoOscuro = "modonoche";
colores(botonnoche,colorOscuro,body);

//Verde
let botonVerde = "#verde";
let modoVerde = "modoverde";
let colorVerde = "verde";
colores(botonVerde,colorVerde,body);
//AZUL
let botonazul = "#azul";
let modoAzul = "modoazul";
let colorAzul = "azul";
colores(botonazul,colorAzul,body);
// NARANJA
let botonnaranja = "#naranja";
let modonaranja = "modonaranja";
let colornaranja = "naranja";
colores(botonnaranja,colornaranja,body);

// ROJO
let botonrojo = "#rojo";
let modorojo = "modorojo";
let colorrojo = "rojo";
colores(botonrojo,colorrojo,body);

// amarillo
let botonamarillo = "#amarillo";
let modoamarillo = "modoamarillo";
let coloramarillo = "amarillo";
colores(botonamarillo,coloramarillo,body);

// rosado
let botonrosado = "#rosado";
let modorosado = "modorosado";
let colorrosado = "rosado";
colores(botonrosado,colorrosado,body);

// morado
let botonmorado = "#morado";
let modomorado = "modomorado";
let colormorado = "morado";
colores(botonmorado,colormorado,body);

//TURQUESA
let botonturquesa = "#turquesa";
let modoturquesa = "modoturquesa";
let colorturquesa = "turquesa";
colores(botonturquesa,colorturquesa,body);

let boton1 = "#porDefecto";
let modo = "ninguno";
let color = "ninguno";
colores(boton1,color,body);










































































// let body = document.querySelector("body");

// function colores(boton,color,body){

//     load1();

//         let botonazul = document.querySelector(boton);

//         botonazul.addEventListener("click", () =>{
//             body.classList.toggle(color)
//             storeAzul(color)
            
            
//         })

//         function load1(){
//             const colorGuardado = localStorage.getItem("clave")
//                 if(!colorGuardado){
//                     storeAzul(false)
//                 } else if(colorGuardado == color){
//                     body.classList.toggle(colorGuardado);
                    
                    
//                 } 

//         }

//         function storeAzul(value){
//             localStorage.setItem("clave", value);
//         }
// }