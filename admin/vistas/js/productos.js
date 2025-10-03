

/**==================================================================
 * EDITAR PRODUCTO
 ===================================================================*/

 $(document).on("click", ".btnEditarProducto", function(){
    let idProducto = $(this).attr("idProducto");
   // console.log(idProducto);
    let datos = new FormData();
    //le estoy pasando un identificador y un valor
    datos.append("idProducto", idProducto);

    $.ajax({
      url:"ajax/productos.ajax.php", 
      method: "POST",
      data: datos,
      cache: false,
      contentType: false,
      processData: false,
      dataType: "json",
      success: function(respuesta){
         //console.log(respuesta);
         //let tu= document.getElementById("editarusuario");
        // tu.textContent= respuesta['usuario'];
        $("#editarnombre").val(respuesta['nombre']);
        $("#editardescripcion").val(respuesta['descripcion']);
        $("#editarprecio").val(respuesta['precio']);
        $("#editarstock").val(respuesta['stock']);
        $("#editarcategoria").val(respuesta['categoria']);

        $("#editarestado").val(respuesta['estado']);
        respuesta['estado']=='1'? $("#editarestado").html("Activo"): $("#editarestado").html("Inactivo");

   
        $('#editarid').val(respuesta['id']);
        
      }
    });
 });

 /**==================================================================
 * ELIMINAR USUARIO
 ===================================================================*/
 $(document).on("click", ".btnEliminarProducto", function(){
   let idProducto = $(this).attr("idProducto");
   console.log(idProducto);
   swal({
      title: "¿Estas seguro de borrar el producto?",
      text: "Si no lo está, puede cancelar la acción",
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6', 
      cancelButtonColor: '#d33',
      cancelButtonText:'Cancelar',
      confirmButtonText: 'Si, borrar producto'
   }).then(function(result){
      if(result.value){
         let datos = new FormData();
         //le estoy pasando un identificador y un valor
         datos.append("eliminarProducto", idProducto);
     
         $.ajax({
           url:"ajax/productos.ajax.php", 
           method: "POST",
           data: datos,
           cache: false,
           contentType: false,
           processData: false,
           success: function(respuesta){
            window.location = '?ruta=productos'; 
           }
         });

      }
   })
 });


 