$(document).ready(function (){
    $(".hidden_images").each(function (){
        let id= $(this).attr("id");
        let imagenes = $("#"+ id).val().split(",");
        let carrousel=`<div id="carouselControls_`+id+`" class="carousel slide images" data-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                            <img class="d-block w-100 card-image" src="/uploads/`+imagenes[0]+`" 
                            alt="First slide" id='imagen' width='270' height='270'>
                            </div>`;
                    for (let index = 1; index < imagenes.length; index++) {
                        carrousel+=`<div class="carousel-item">
                                        <img class="d-block w-100" src="/uploads/`+imagenes[index]+`" 
                                        alt="Second slide" width='270' height='270'>
                                    </div>`;                                         
                    }
                carrousel+=`</div>
                            <a class="carousel-control-prev" href="#carouselControls_`+id+`" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselControls_`+id+`" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                      </div>`;

       $("#divImages_" + id).append(carrousel);  
      // console.log(carrousel);
    });
    
}
)






