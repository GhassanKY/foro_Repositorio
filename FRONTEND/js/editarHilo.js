$(document).on("click", ".eliminarHilo", function(){
    let element = $(this)[0].parentElement
    let id = $(element).attr("idhilo")
    $.post("eliminarHilo.php", {id}, function (response){
        console.log(id)
    })


});