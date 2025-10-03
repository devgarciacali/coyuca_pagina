/**==================================================================
 * INICIA PREVISUALIZAR 1
 ===================================================================*/
function previsualizarImagenes(selectInput, selectPrevizualizar) {
   $(selectInput).change(function () {
      let imagen = this.files[0];
      /**========================
       * validamos el formato en jpg, png
       ========================*/
      if (imagen["type"] != "image/jpeg" && imagen["type"] != "image/png") {
         $(selectInput).val("");
         swal({
            title: "Error al subir la imagen",
            text: "La imagen debe estar en formato JPG o PNG",
            type: "error",
            confirmButtonText: "Cerrar"
         })
      } else if (imagen["size"] > 2000000) {
         $(selectInput).val("");
         swal({
            title: "Error al subir la imagen",
            text: "La imagen no debe pesar mas de 2MB",
            type: "error",
            confirmButtonText: "Cerrar"
         });
      } else {
         let datosImagen = new FileReader;
         datosImagen.readAsDataURL(imagen);

         $(datosImagen).on("load", function (event) {
            let rutaImagen = event.target.result;
            $(selectPrevizualizar).attr("src", rutaImagen);
         });
      }
   });
}
previsualizarImagenes(".iconoft", ".previsualizar");



/**==================================================================
 * EDITAR SLIDER
 ===================================================================*/

$(document).on("click", ".btnEditarIcono", function () {
   let idIcono = $(this).attr("idIcono");
   let datos = new FormData();
   //le estoy pasando un identificador y un valor
   datos.append("idIcono", idIcono);

   $.ajax({
      url: "ajax/iconos.ajax.php",
      method: "POST",
      data: datos,
      cache: false,
      contentType: false,
      processData: false,
      dataType: "json",
      success: function (respuesta) {
         $('#editarid').val(respuesta['id']);
         $('#fotoactual').val(respuesta['icono']);
         $('.previsualizar').attr('src', respuesta['icono']);
      }
   });
});