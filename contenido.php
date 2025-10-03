<div class="container py-5">
    <div class="row">
        <main class="col-md-8">
            <h4 class="bloc-title"><span class="span-title">Noticias</span></h4>
            <?php
            include_once "admin/controladores/noticias.controlador.php";
            include_once 'admin/modelos/noticias.modelo.php';
            $item = null;
            $campo = null;

            $noticias = ControladorNoticias::ctrMostrarNoticias($item, $campo);
            foreach ($noticias as $noticia):
                ?>

                <article>
                    <div class="borde">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <br>
                                <img src="admin/<?= $noticia->foto ?>" class="img-fluid rounded-start" alt="...">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title"><?= $noticia->titulo ?></h5>
                                    <p class="card-text"><?= substr(($noticia->descripcion), 0, 250) ?>...</p>
                                    <a href="post.php?id=<?= $noticia->id ?>" class="boton">Leer Más</a>
                                    <p class="card-text"><small class="text-muted"><?= $noticia->fecha ?></small></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                </article>
                
            <?php endforeach ?>
            <h4 class="bloc-title"><span class="span-title">Localizacion</span></h4>
            <div class="container py-3">
                <div class="row">
                    <div class="col-12">
                        <div class="ratio ratio-16x9">
                            <iframe
                            target="_blank"
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d60518.36657102866!2d-100.7013332!3d18.3301952!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x84332de73cf33ac5:0x112adf8e0a928a0c!2sCoyuca%20de%20Catal%C3%A1n%2C%20Gro.!5e0!3m2!1ses!2smx!4v1664977546355!5m2!1ses!2smx"
                                style="border:0;" allowfullscreen="" loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </main>

        <div class="col-md-1"></div>