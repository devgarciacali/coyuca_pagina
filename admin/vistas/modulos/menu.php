<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="inicio">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Admin<sup>1</sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="inicio">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Menu</span></a>
    </li>


    <!-- Nav Item - Charts -->
    <?php
    if (isset($_SESSION['tipo'])) {
        if ($_SESSION['tipo'] == 'admin') { ?>
            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Adminin
            </div>

            <li class="nav-item">
                <a class="nav-link" href="usuarios">
                    <i class="fas fa-solid fa-address-book"></i>
                    <span>Mostrar Usuarios</span></a>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider">
            <li class="nav-item">
                <a class="nav-link" href="quejas">
                    <i class="fas fa-solid fa-envelope"></i>
                    <span>Mostrar Buzon</span></a>
            </li>

            <?php
        }
    }
    ?>
    <!-- Divider -->
    <hr class="sidebar-divider">

    <li class="nav-item">
        <a class="nav-link" href="iconos">
            <i class="fas fa-solid fa-camera"></i>
            <span>Mostrar Iconos</span></a>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider">
    <!-- Nav Item - Charts -->
    <li class="nav-item">
        <a class="nav-link" href="header">
            <i class="fas fa-solid fa-bars"></i>
            <span>Mostrar Cabezera</span></a>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Nav Item - Charts -->
    <li class="nav-item">
        <a class="nav-link" href="noticias">
            <i class="fas fa-solid fa-passport"></i>
            <span>Mostrar Noticias</span></a>
    </li>
    <!--   -->
    <!--   -->

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Nav Item - Charts -->
    <li class="nav-item">
        <a class="nav-link" href="interes">
            <i class="fas fa-solid fa-paperclip"></i>
            <span>Mostrar sitios interes</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Nav Item - Charts -->
    <li class="nav-item">
        <a class="nav-link" href="sociales">
            <i class="fas fa-solid fa-paper-plane"></i>
            <span>Redes Sociales</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Nav Item - Charts -->
    <li class="nav-item">
        <a class="nav-link" href="autor">
            <i class="fas fa-solid fa-camera"></i>
            <span> Foto del presidente</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Nav Item - Charts -->
    <li class="nav-item">
        <a class="nav-link" href="links">
            <i class="fas fa-solid fa-paperclip"></i>
            <span>Mostrar Links</span></a>
    </li>


    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->