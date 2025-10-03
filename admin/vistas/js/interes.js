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
previsualizarImagenes(".nuevointeres", ".previsualizar");

/**==================================================================
 * EDITAR USUARIO
 ===================================================================*/

$(document).on("click", ".btnEditarInteres", function () {
   let idInteres = $(this).attr("idInteres");
   console.log(idInteres);
   let datos = new FormData();
   //le estoy pasando un identificador y un valor
   datos.append("idInteres", idInteres);

   $.ajax({
      url: "ajax/interes.ajax.php",
      method: "POST",
      data: datos,
      cache: false,
      contentType: false,
      processData: false,
      dataType: "json",
      success: function (respuesta) {

         $("#editarut").val(respuesta['rut']);
         $('#fotoactual').val(respuesta['fotosit']);
         $('.previsualizar').attr('src', respuesta['fotosit']);
         $('#editarid').val(respuesta['id']);
      }
   });
});

/**==================================================================
* ELIMINAR USUARIO
===================================================================*/
$(document).on("click", ".btnEliminarCabezera", function () {
   let idCabezera = $(this).attr("idCabezera");
   swal({
      title: "¿Estas seguro de borrar la Cabezera?",
      text: "Si no lo está, puede cancelar la acción",
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      cancelButtonText: 'Cancelar',
      confirmButtonText: 'Si, borrar usuario'
   }).then(function (result) {
      if (result.value) {
         let datos = new FormData();
         //le estoy pasando un identificador y un valor
         datos.append("eliminarCabezera", idCabezera);

         $.ajax({
            url: "ajax/cabezera.ajax.php",
            method: "POST",
            data: datos,
            cache: false,
            contentType: false,
            processData: false,
            success: function (respuesta) {
               window.location = 'header';
            }
         });

      }
   })
});


