var contador=0;
var conArray=0;
var cont=0;
var idElement=0;

$(document).ready(function (){
    $(".hidden_images").each(function (){
        let id= $(this).attr("id");
        //idElement=id;
        let imagenes = $("#"+ id).val().split(",");
        //conArray=imagenes;
        //cont=imagenes.length;
        let imagen="<img src='/uploads/" + imagenes[0] +
             "' alt='imagen' width='200' height='200' id='imagen_"+id+"'>";
        //$("#divImages_" + id).append(document.getElementById('imagen_'+id).src = '/uploads/' + imagenes[0]);  
        $("#divImages_" + id).append(imagen);
        //var div=document.getElementById("divImages_"+id);     
        //alert(div);
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
var contCart=0;
let arrayID=[];
let contId=0;
function shoppingCart(product, idP, precio){
    
    var cart=document.getElementById("button-cart");   
    

    for (let index = 0; index < arrayID.length; index++) {
       //if(){

       //}
        
    }
    //cart.nodeValue("Carrito 0");

    if(contCart==0){
        $("#button-cart").val('Carrito '+'('+0+')'); 
        contCart++;
    }
    $("#button-cart").val('Carrito '+'('+contCart+')'); 
    contCart++;

    idP=arrayID=[contId];
    contId++;
}