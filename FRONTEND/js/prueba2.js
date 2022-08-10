//     hilo();
//     function hilo(){
        
        
    
    
//     $.ajax({
//         url: "../BACKEND/CONSULTA-HILO.php",
//         type: "GET",
//         success: function (response){
//            let datos = JSON.parse(response);

//         let hilo = "";
//          datos.forEach(element => {
         
//             hilo += `

//             <div class="hiloForUsers" idhilo="${element.idhilo}">    
//             <div class="dpContInfo">                               
//                     <div class="dataUsers">
//                         <h1>${element.titulo}</h1>
//                         <p>${element.descripcion}</p>
//                         <p class="fecha">${element.fecha}fecha</p>  
//                     </div>
//             </div>
//                 <div class="commentsAndPhoto">
//                         <div class="imgFriends">
//                         </div>
//                         <a style="color:black;" href="conversacion.php?id=${element.idhilo}">43 comentarios</a>
//                 </div>
//                 <img src="image/mas (1).png" alt="more" class="configButton puntos ">
//             </a>
//             <button type="submit" class="eliminarHilo">eliminar</button>
//             </div>`
//          });
//         let partecentral = document.querySelector(".parteCentral");
//         partecentral.innerHTML = hilo;
//         }
//     });




// }




// $.ajax({
//     url: "../BACKEND/CONSULTA-NUM-COMENTARIOS-HILO.php",
//     type: "GET",
//     success: function (response){
//        let datos = JSON.parse(response);
//        console.log(datos);
//     }
// });