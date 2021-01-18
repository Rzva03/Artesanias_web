var contador=0;
var conArray=0;
var cont=0;
var idElement=0;

$(document).ready(function (){
    $(".hidden_images").each(function (){
        let id= $(this).attr("id");
        let imagenes = $("#"+ id).val().split(",");
        let imagen="<img class='card-image' src='/uploads/" + imagenes[0] +
             "' alt='imagen' width='200' height='200' id='imagen_"+id+"'>";
        $("#divImages_" + id).append(imagen);
    });
    
}
)

function allImages(imgAll, idProduct){
    let idAux;
    let imagenes = imgAll.split(",");
    conArray=imagenes;
    cont=imagenes.length;
    contador--;
    if(contador==-1){
        contador=cont-1;
        var img=document.getElementById("imagen_"+idProduct);
        img.src="/uploads/"+conArray[contador];
    }else{
    var img=document.getElementById("imagen_"+idProduct);
    img.src="/uploads/"+conArray[0];
    contador=0;
    }
    

    
}

