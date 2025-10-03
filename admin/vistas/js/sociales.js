// $(".nuevafotonota").change(function(){
//    let imagen = this.files[0];
//    /**========================
//     * validamos el formato en jpg, png
//     ========================*/
//    if(imagen["type"] != "image/jpeg" && imagen["type"] != "image/png"){
//       $(".nuevafotonota").val("");
//       swal({
//             title: "Error al subir la imagen",
//             text: "La imagen debe estar en formato JPG o PNG",
//             type: "error",
//             confirmButtonText: "Cerrar"
//       })
//    }else if(imagen["size"]>2000000){
//       $(".nuevafotonota").val("");
//       swal({
//             title: "Error al subir la imagen",
//             text: "La imagen no debe pesar mas de 2MB",
//             type: "error",
//             confirmButtonText: "Cerrar"
//       });
//    }else{
//       let datosImagen = new FileReader;
//       datosImagen.readAsDataURL(imagen);

//       $(datosImagen).on("load", function(event){
//             let rutaImagen = event.target.result;
//             $(".previsualizar").attr("src", rutaImagen);
//       });
//    }
// });

/**==================================================================
 * EDITAR LINKS   
 ===================================================================*/

$(document).on("click", ".btnEditarSocial", function () {
   let idSocial = $(this).attr("idSocial");
   console.log(idSocial + 'archivo noticias');
   let datos = new FormData();
   //le estoy pasando un identificador y un valor
   datos.append("idSocial", idSocial);

   $.ajax({
      url: "ajax/sociales.ajax.php",
      method: "POST",
      data: datos,
      cache: false,
      contentType: false,
      processData: false,
      dataType: "json",
      success: function (respuesta) {

         $("#editarface").val(respuesta['lface']);
         $("#editarinsta").val(respuesta['linsta']);
         $("#editarlex").val(respuesta['lex']);
         $('#editarid').val(respuesta['id']);
      }
   });
});


