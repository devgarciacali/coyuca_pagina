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
previsualizarImagenes(".autorFt", ".previsualizar");



/**==================================================================
 * EDITAR SLIDER
 ===================================================================*/

$(document).on("click", ".btnEditarAutor", function () {
   let idAutor = $(this).attr("idAutor");
   let datos = new FormData();
   //le estoy pasando un identificador y un valor
   datos.append("idAutor", idAutor);

   $.ajax({
      url: "ajax/autores.ajax.php",
      method: "POST",
      data: datos,
      cache: false,
      contentType: false,
      processData: false,
      dataType: "json",
      success: function (respuesta) {
         $('#editarid').val(respuesta['id']);
         $('#fotoactual').val(respuesta['fotoautor']);
         $('.previsualizar').attr('src', respuesta['fotoautor']);
      }
   });
});
// btnpendiente
/**==================================================================
* ELIMINAR USUARIO
===================================================================*/
$(document).on("click", ".btnEliminarSlider", function () {
   let idSlider = $(this).attr("idSlider");
   swal({
      title: "¿Estas seguro de borrar la Slider?",
      text: "Si no lo está, puede cancelar la acción",
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      cancelButtonText: 'Cancelar',
      confirmButtonText: 'Si, borrar Slider'
   }).then(function (result) {
      if (result.value) {
         let datos = new FormData();
         //le estoy pasando un identificador y un valor
         datos.append("eliminarSlider", idSlider);

         $.ajax({
            url: "ajax/sliders.ajax.php",
            method: "POST",
            data: datos,
            cache: false,
            contentType: false,
            processData: false,
            success: function (respuesta) {
               window.location = 'sliders';
            }
         });

      }
   })
});


