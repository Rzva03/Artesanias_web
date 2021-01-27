$(document).ready(function (){
    $(".hidden_images").each(function (){
        let id= $(this).attr("id");
        let imagenes = $("#"+ id).val().split(",");
        for (let index = 0; index < imagenes.length; index++) {
            let imagen="<a href='/uploads/" + imagenes[index] +
            "' data-lightbox='/uploads/" + imagenes[index] +
            "'><img class='card-image columna' src='/uploads/" + imagenes[index] +
            "' alt='imagen' width='170' height='170' id='imagen'> </a>";
       $("#divImages_" + id).append(imagen);  
            
        }

    });
    
}
)