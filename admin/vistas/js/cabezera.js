$(".nuevoLogo").change(function(){
    let imagen = this.files[0];
    /**========================
     * validamos el formato en jpg, png
     ========================*/
     if(imagen["type"] != "image/jpeg" && imagen["type"] != "image/png"){
        $(".nuevoLogo").val("");
        swal({
            title: "Error al subir la imagen",
            text: "La imagen debe estar en formato JPG o PNG",
            type: "error",
            confirmButtonText: "Cerrar"
        })
     }else if(imagen["size"]>2000000){
        $(".nuevoLogo").val("");
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

 $(document).on("click", ".btnEditarCabezera", function(){
    let idCabezera = $(this).attr("idCabezera");
    console.log(idCabezera);
    let datos = new FormData();
    //le estoy pasando un identificador y un valor
    datos.append("idCabezera", idCabezera);

    $.ajax({
      url:"ajax/cabezera.ajax.php", 
      method: "POST",
      data: datos,
      cache: false,
      contentType: false,
      processData: false,
      dataType: "json",
      success: function(respuesta){
      
        $("#editartitulo").val(respuesta['titulo']);
        $("#editarlink").val(respuesta['link']);        
        $('#fotoactual').val(respuesta['logo']);
        $('.previsualizar').attr('src', respuesta['logo']);
        $('#editarid').val(respuesta['id']);
        $("#editartexto").val(respuesta['texto']); 
        
      }
    });
 });

 /**==================================================================
 * ELIMINAR USUARIO
 ===================================================================*/
 $(document).on("click", ".btnEliminarCabezera", function(){
   let idCabezera = $(this).attr("idCabezera");
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
         datos.append("eliminarCabezera", idCabezera);
     
         $.ajax({
           url:"ajax/cabezera.ajax.php", 
           method: "POST",
           data: datos,
           cache: false,
           contentType: false,
           processData: false,
           success: function(respuesta){
            window.location = 'header'; 
           }
         });

      }
   })
 });


 