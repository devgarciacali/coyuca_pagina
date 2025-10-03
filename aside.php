<?php
require_once 'admin/controladores/autores.controlador.php';
require_once 'admin/modelos/autores.modelo.php';
require_once 'admin/controladores/interes.controlador.php';
require_once 'admin/modelos/interes.modelo.php';
require_once 'admin/controladores/links.controlador.php';
require_once 'admin/modelos/links.modelo.php';
require_once 'admin/controladores/sociales.controlador.php';
require_once 'admin/modelos/sociales.modelo.php';

//PARA LLAMAR EN EL ASIDE LOS CAMPOS DEL AUTOR
$campo_autor = 'id';
$item_autor = 1;
$respuesta_autor = ControladorAutores::ctrMostrarAutor($item_autor, $campo_autor);


//PARA LLAMAR EN EL ASIDE LOS CAMPOS DEL SITIO DE INTERES
$campo_interes = 'id';
$item_interes = 1;
$respuesta_interes = ControladorInteresantes::ctrMostrarInteres($item_interes, $campo_interes);

//PARA LLAMAR EN EL ASIDE LOS CAMPOS DE LOS LINKS (RED SOCIAL Y EL VIDEO)
$campo_link = 'id';
$item_link = 1;
$respuesta_link = ControladorLinks::ctrMostrarlink($item_link, $campo_link);

//PARA LLAMAR EN EL ASIDE LOS CAMPOS DE LAS REDES SOCIALES
$campo_social = 'id';
$item_social = 1;
$respuesta_social = ControladorSociales::ctrMostrarSocial($item_social, $campo_social);
?>
<aside class="col-md-3">
    <div class="vc">
        <span class="aside-line"></span>
        <h4 class="vc-h2">Presidente actual</h4>
        <span class="aside-line"></span>
    </div>
    <div>
        <img src="admin/<?= $respuesta_autor['fotoautor'] ?>" class="img-fluid rounded-start">
    </div>
    <div class="vc">
        <span class="aside-line"></span>
        <h4 class="vc-h2">Sitios de Interés</h4>
        <span class="aside-line"></span>
    </div>
    <div class="container-fluid">
        <a target="_blank" href="<?= $respuesta_interes['rut'] ?>">
            <img src="admin/<?= $respuesta_interes['fotosit'] ?>" class="rounded mx-auto d-block">
        </a>
    </div>

    <div class="vc">
        <span class="aside-line"></span>
        <h4 class="vc-h2">Facebook</h4>
        <span class="aside-line"></span>
    </div>
    <div class="container-fluid py-3 d-flex justify-content-center">
        <div id="fb-root"></div>
        <script async defer crossorigin="anonymous"
            src="https://connect.facebook.net/es_ES/sdk.js#xfbml=1&version=v11.0&appId=226593770685261&autoLogAppEvents=1"
            nonce="CT16xwrc"></script>
        <div class="row">
            <div class="col-12">
                <div target="_blank" class="fb-page" data-href="<?= $respuesta_link['rsocial'] ?>" data-tabs="timeline" data-width="500"
                    data-height="" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false"
                    data-show-facepile="true" style="width: 250px;">
                    <blockquote cite="<?= $respuesta_link['rsocial'] ?>" class="fb-xfbml-parse-ignore">
                        <a href="<?= $respuesta_link['rsocial'] ?>">Coyuca De Catalán</a>
                    </blockquote>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="vc">
        <span class="aside-line"></span>
        <h4 class="vc-h2">Redes Sociales</h4>
        <span class="aside-line"></span>
    </div>
    <div class="py-3 d-flex justify-content-center align-items-center">
        <a target="_blank" href="<?= $respuesta_social['lface'] ?>" class="mx-2 social-icon"><img src="img/facebook.png" alt="" class="img-fluid tm-img"></a>
        <a target="_blank" href="<?= $respuesta_social['linsta'] ?>" class="mx-2 social-icon"><img src="img/instagram.png" alt="" class="img-fluid tm-img"></a>
        <a target="_blank" href="<?= $respuesta_social['lex'] ?>" class="mx-2 social-icon"><img src="img/x.png" alt="" class="img-fluid tm-img"></a>
    </div>
    <div class="vc">
        <span class="aside-line"></span>
        <h4 class="vc-h2">Buzon</h4>
        <span class="aside-line"></span>
    </div>
    <div class="d-flex justify-content-center mb-3">
        <button class="social-icon btn btn-primary" data-toggle="modal" data-target="#modalAgregarQueja">
            Buzón De Quejas 📩
        </button>
    </div>


    <div class="modal fade" id="modalAgregarQueja" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form class="user" method="post" enctype="multipart/form-data">
                    <!-- CABEZA MODAL -->
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Quejas y Recomendaciones</h5>
                        <button class="close" type="btn btn-danger" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">❌</span>
                        </button>
                    </div>
                    <!-- TERMINA CABEZA MODAL -->

                    <!-- CUERPO MODAL -->
                    <div class="modal-body">
                        <div class="form-group row">
                            <!-- ENTRADA DEL TITULO -->
                            <div class="col-sm-12 mb-3 mb-sm-0">
                                <label class="py-3" for="">Escribe Tu Nombre</label>
                                
                                <input type="text" class="form-control form-control-user" name="nombre"
                                    placeholder="Escribe tu nombre completo">
                            </div>
                            <label class="py-3" for="">Escribe Tu Queja o Sugerencia</label>
                            <!-- ENTRADA LINK -->
                            <div class="col-sm-12 ">
                                <textarea name="queja" id="" class="form-control form-control-user">

                                </textarea>
                            </div>
                            <!-- ENTRADA DEL TITULO -->
                            <label class="py-3" for="">Escribe Tu Correo</label>
                            <div class="col-sm-12 mb-3 mb-sm-0">
                                <input type="email" class="form-control form-control-user" name="correo"
                                    placeholder="abcdefgh1234@gmail.com">
                            </div>

                        </div>
                    </div>
                    <!-- TERMINA CUERPO DEL MODAL -->

                    <!-- PIE DEL MODAL -->
                    <div class="modal-footer">
                        <button class="btn btn-danger" type="button" data-dismiss="modal">Salir</button>
                        <button class="btn btn-success" type="submit">Enviar</button>
                    </div>
                    <!-- TERMINA PIE DEL MODAL -->
                </form>
                <?php
                $crearQueja = new ControladorQuejas();
                $crearQueja->ctrCrearQuejas();
                ?>
            </div>
        </div>
    </div>
</aside>