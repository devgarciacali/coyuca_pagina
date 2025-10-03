$(".nuevaFoto").change(function(){
    let imagen = this.files[0];
    /**========================
     * validamos el formato en jpg, png
     ========================*/
     if(imagen["type"] != "image/jpeg" && imagen["type"] != "image/png"){
        $(".nuevaFoto").val("");
        swal({
            title: "Error al subir la imagen",
            text: "La imagen debe estar en formato JPG o PNG",
            type: "error",
            confirmButtonText: "Cerrar"
        })
     }else if(imagen["size"]>2000000){
        $(".nuevaFoto").val("");
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

 $(document).on("click", ".btnEditarUsuario", function(){
    let idUsuario = $(this).attr("idUsuario");
    console.log(idUsuario);
    let datos = new FormData();
    //le estoy pasando un identificador y un valor
    datos.append("idUsuario", idUsuario);

    $.ajax({
      url:"ajax/usuarios.ajax.php", 
      method: "POST",
      data: datos,
      cache: false,
      contentType: false,
      processData: false,
      dataType: "json",
      success: function(respuesta){
        /// console.log(respuesta);
         //let tu= document.getElementById("editarusuario");
        // tu.textContent= respuesta['usuario'];
        $("#editarusuario").val(respuesta['usuario']);
        $("#passwordActual").val(respuesta['password']);

        $("#editarestado").val(respuesta['estado']);
        respuesta['estado']=='1'? $("#editarestado").html("Activo"): $("#editarestado").html("Inactivo");

        $("#editartipo").val(respuesta['tipo']);
        respuesta['tipo']=='admin'? $("#editartipo").html("admin"): $("#editartipo").html("Usuario");

        $('#fotoactual').val(respuesta['ruta']);
        $('.previsualizar').attr('src', respuesta['ruta']);
        $('#editarid').val(respuesta['id']);
        
      }
    });
 });

 /**==================================================================
 * ELIMINAR USUARIO
 ===================================================================*/
 $(document).on("click", ".btnEliminarUsuario", function(){
   let idUsuario = $(this).attr("idUsuario");
   swal({
      title: "¿Estas seguro de borrar el usuario?",
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
         datos.append("eliminarUsuario", idUsuario);
     
         $.ajax({
           url:"ajax/usuarios.ajax.php", 
           method: "POST",
           data: datos,
           cache: false,
           contentType: false,
           processData: false,
           success: function(respuesta){
            window.location = 'usuarios'; 
           }
         });

      }
   })
 });


 