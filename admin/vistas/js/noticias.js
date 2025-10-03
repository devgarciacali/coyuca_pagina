$(".nuevafotonota").change(function(){
    let imagen = this.files[0];
    /**========================
     * validamos el formato en jpg, png
     ========================*/
     if(imagen["type"] != "image/jpeg" && imagen["type"] != "image/png"){
        $(".nuevafotonota").val("");
        swal({
            title: "Error al subir la imagen",
            text: "La imagen debe estar en formato JPG o PNG",
            type: "error",
            confirmButtonText: "Cerrar"
        })
     }else if(imagen["size"]>2000000){
        $(".nuevafotonota").val("");
        swal({
            title: "Error al subir la imagen",
            text: "La imagen no debe pesar mas de 2MB",
            type: "error",
            confirmButtonText: "Cerrar"
        });
     }else{
        let datosImagen = new FileReader;
        datosImagen.readAsDataURL(imagen);

        $(datosImagen).on("load", function(event){
            let rutaImagen = event.target.result;
            $(".previsualizar").attr("src", rutaImagen);
        });
     }
});

/**==================================================================
 * EDITAR USUARIO
 ===================================================================*/

 $(document).on("click", ".btnEditarNoticia", function(){
    let idNoticia = $(this).attr("idNoticia");
    console.log(idNoticia +'archivo noticias');
    let datos = new FormData();
    //le estoy pasando un identificador y un valor
    datos.append("idNoticia", idNoticia);

    $.ajax({
      url:"ajax/noticias.ajax.php", 
      method: "POST",
      data: datos,
      cache: false,
      contentType: false,
      processData: false,
      dataType: "json",
      success: function(respuesta){
      
        $("#editartitulo").val(respuesta['titulo']);
        $("#editardescripcion").val(respuesta['descripcion']);        
        $('#fotoactual').val(respuesta['foto']);
        $('.previsualizar').attr('src', respuesta['foto']);
        $('#editarid').val(respuesta['id']);
        $("#editarfecha").val(respuesta['fecha']); 
        
      }
    });
 });

 /**==================================================================
 * ELIMINAR USUARIO
 ===================================================================*/
 $(document).on("click", ".btnEliminarNoticia", function(){
   let idNoticia = $(this).attr("idNoticia");
   swal({
      title: "¿Estas seguro de borrar la Cabezera?",
      text: "Si no lo está, puede cancelar la acción",
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6', 
      cancelButtonColor: '#d33',
      cancelButtonText:'Cancelar',
      confirmButtonText: 'Si, borrar usuario'
   }).then(function(result){
      if(result.value){
         let datos = new FormData();
         //le estoy pasando un identificador y un valor
         datos.append("eliminarNoticia", idNoticia);
     
         $.ajax({
           url:"ajax/noticias.ajax.php", 
           method: "POST",
           data: datos,
           cache: false,
           contentType: false,
           processData: false,
           success: function(respuesta){
            window.location = 'noticias'; 
           }
         });

      }
   })
 });


 