$(document).on("click", ".eliminarHilo", function(){
    let element = $(this)[0].parentElement
    let id = $(element).attr("idhilo")
    $.post("../BACKEND/eliminarHilo.php", {id}, function (response){
        console.log(id)
    })


});