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
previsualizarImagenes(".fotoSlider1", ".previsualizar1");
previsualizarImagenes(".fotoSlider2", ".previsualizar2");
previsualizarImagenes(".fotoSlider3", ".previsualizar3");
previsualizarImagenes(".fotoSlider4", ".previsualizar4");

// TERMINA PREVISULIZAR 1
/**==================================================================
 * INICIA PREVISUALIZAR 2
 ===================================================================*/
$(".fotoSlider2").change(function () {
   let imagen = this.files[0];
   /**========================
    * validamos el formato en jpg, png
    ========================*/
   if (imagen["type"] != "image/jpeg" && imagen["type"] != "image/png") {
      $(".fotoSlider2").val("");
      swal({
         title: "Error al subir la imagen",
         text: "La imagen debe estar en formato JPG o PNG",
         type: "error",
         confirmButtonText: "Cerrar"
      })
   } else if (imagen["size"] > 2000000) {
      $(".fotoSlider2").val("");
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
         $(".previsualizar2").attr("src", rutaImagen);
      });
   }
});
// TERMINA PREVISULIZAR 2
/**==================================================================
 * INICIA PREVISUALIZAR 3
 ===================================================================*/
$(".fotoSlider3").change(function () {
   let imagen = this.files[0];
   /**========================
    * validamos el formato en jpg, png
    ========================*/
   if (imagen["type"] != "image/jpeg" && imagen["type"] != "image/png") {
      $(".fotoSlider3").val("");
      swal({
         title: "Error al subir la imagen",
         text: "La imagen debe estar en formato JPG o PNG",
         type: "error",
         confirmButtonText: "Cerrar"
      })
   } else if (imagen["size"] > 2000000) {
      $(".fotoSlider3").val("");
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
         $(".previsualizar3").attr("src", rutaImagen);
      });
   }
});
// TERMINA PREVISULIZAR 3
/**==================================================================
 * INICIA PREVISUALIZAR 4
 ===================================================================*/
$(".fotoSlider4").change(function () {
   let imagen = this.files[0];
   /**========================
    * validamos el formato en jpg, png
    ========================*/
   if (imagen["type"] != "image/jpeg" && imagen["type"] != "image/png") {
      $(".fotoSlider4").val("");
      swal({
         title: "Error al subir la imagen",
         text: "La imagen debe estar en formato JPG o PNG",
         type: "error",
         confirmButtonText: "Cerrar"
      })
   } else if (imagen["size"] > 2000000) {
      $(".fotoSlider4").val("");
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
         $(".previsualizar4").attr("src", rutaImagen);
      });
   }
});
// TERMINA PREVISULIZAR 4






/**==================================================================
 * EDITAR USUARIO
 ===================================================================*/

$(document).on("click", ".btnEditarSlider", function () {
   let idNoticia = $(this).attr("idSlider");
   let datos = new FormData();
   //le estoy pasando un identificador y un valor
   datos.append("idNoticia", idSlider);

   $.ajax({
      url: "ajax/sliders.ajax.php",
      method: "POST",
      data: datos,
      cache: false,
      contentType: false,
      processData: false,
      dataType: "json",
      success: function (respuesta) {
         $('#editarid').val(respuesta['id']);
         $('#slider1').val(respuesta['slider1']);
         $('.previsualizar1').attr('src', respuesta['slider1']);
         $('#slider2').val(respuesta['slider2']);
         $('.previsualizar2').attr('src', respuesta['slider2']);
         $('#slider3').val(respuesta['slider3']);
         $('.previsualizar3').attr('src', respuesta['slider3']);
         $('#slider4').val(respuesta['slider4']);
         $('.previsualizar4').attr('src', respuesta['slider4']);
      }
   });
});

/**==================================================================
* ELIMINAR USUARIO
===================================================================*/
$(document).on("click", ".btnSlider", function () {
   let idNoticia = $(this).attr("idSlider");
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


