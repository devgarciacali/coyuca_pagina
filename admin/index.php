<?php

/**
 * CONTROLADORES
 */
require_once "controladores/usuarios.controlador.php";
require_once "controladores/plantilla.controlador.php";
require_once "controladores/cabezera.controlador.php";
require_once "controladores/noticias.controlador.php";
require_once "controladores/interes.controlador.php";
require_once "controladores/autores.controlador.php";
require_once "controladores/links.controlador.php";
require_once "controladores/iconos.controlador.php";
require_once "controladores/quejas.controlador.php";
require_once "controladores/sociales.controlador.php";

/**
 * MODELOS
 */

require_once "modelos/usuarios.modelo.php";
require_once "modelos/cabezera.modelo.php";
require_once "modelos/noticias.modelo.php";
require_once "modelos/interes.modelo.php";
require_once "modelos/autores.modelo.php";
require_once "modelos/links.modelo.php";
require_once "modelos/iconos.modelo.php";
require_once "modelos/quejas.modelo.php";
require_once "modelos/sociales.modelo.php";





$plantilla = new ControladorPlantilla();

$plantilla -> ctrPlantilla();