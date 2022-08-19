


  $(document).ready(function (){
 hilo();   
function hilo(){

    let id;
    const valores = window.location.search;
    //obtengo el id de la url
    const urlParams = new URLSearchParams(valores);
    
    const
      keys = urlParams.keys(),
      values = urlParams.values(),
      entries = urlParams.entries();
      
      for (const value of values){

          id = value;
      }
  
    console.log(id);
    $.post("../BACKEND/CONSULTA-HILO.php", {id}, function (response){
        let data = JSON.parse(response);
        console.log(data);


        let hilo = "";
        data["hilo"].forEach(element => {

            //consulta numero de comentarios
            $id3 = element.idhil
            $.post("../BACKEND/numComentarios.php", {$id3}, function (response){
                let dataComentarios = JSON.parse(response);
                console.log(dataComentarios);
            });





            hilo += `

            <div class="hiloForUsers" idhilo="${element.idhilo}">    
            <div class="dpContInfo">                               
                    <div class="dataUsers">
                        <h1>${element.titulo}</h1>
                        <p>${element.descripcion}</p>
                        <p class="fecha">${element.fecha}</p>  
                    </div>
            </div>
                <div class="commentsAndPhoto">
                        <div class="imgFriends">
                        </div>
                        <a class="date" href="conversacion.php?id=${element.idhilo}">43 comentarios</a>
                </div>
                <img src="image/mas (1).png" alt="more" class="configButton puntos ">
            </a>
            <button class="eliminarHiloo"></button>
            <button class="editarHilo"></button>
            </div>`
        })
        let partecentral = document.querySelector(".parteCentral");
        partecentral.innerHTML = hilo;
       


        let idsesion1;
        data["id"].forEach(element1 => {
        idsesion1 = element1.idsesion;
        });
        let delet = document.getElementsByClassName("eliminarHiloo");
        let editar = document.getElementsByClassName("editarHilo");
        for (let i = 0; i < delet.length; i++) {
            if(id != idsesion1){
            delet[i].style.display = "none";
            editar[i].style.display = "none";
            }
        }
       

        });

}





    // eliminar
    $(document).on("click", ".eliminarHiloo", function(){
        let element = $(this)[0].parentElement
        let id = $(element).attr("idhilo")
        if(confirm("Seguro que desea eliminar el hilo") == true){
                $.post("../BACKEND/eliminarHilo.php", {id}, function (response){
                    hilo();
                })
        }

    });

  
    //editar
    $(document).on("click", ".editarHilo", function(){
    let element = $(this)[0].parentElement
    let id = $(element).attr("idhilo")

        let form2 = document.querySelector("#form1");
        form2.setAttribute("idhilo1",id);
        let caja = document.querySelector(".caja")
        caja.classList.toggle("caja-v");

            $(document).on("click", ".guardar", function(){
               
                let element = $(this)[0].parentElement
                let id = $(element).attr("idhilo1")
                // console.log(id)


                        $("#form1").submit(function (e){
                        
                            const data = {
                                id: id,
                                titulo: $("#titulohilo").val(),
                                descripcion: $("#descripcionhilo").val(),
                            }
                        // console.log(data)
                                $.post("../BACKEND/editarHilo.php", data, function (response){
                                    hilo()
                                })
                        e.preventDefault();
                        });
            });


    });


});



//ocultar cuadro de editar hilo...
let x = document.querySelector(".x")
let cuadroEditarHilo = document.querySelector(".caja")
x.addEventListener("click", () => {
    cuadroEditarHilo.classList.toggle("caja-v");
})


let guardar = document.querySelector(".guardar");

guardar.addEventListener("click", () => {
    cuadroEditarHilo.classList.toggle("caja-v");
})

