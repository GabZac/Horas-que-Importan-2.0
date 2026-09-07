<?php
/*
 * Encabezado compartido. Cada página define antes $paginaActiva y $rutaBase.
 * $rutaBase es "" en index.php y "../" dentro de HTML/.
 */
$paginaActiva = $paginaActiva ?? '';
$rutaBase = $rutaBase ?? '';
$destinoPerfil = isset($_SESSION['id_usuario'])
    ? $rutaBase . 'HTML/Perfil.php'
    : $rutaBase . 'HTML/Login.php';

/* Las páginas dentro de HTML/ no deben volver a añadir HTML/ a su enlace. */
if ($rutaBase === '../') {
    $destinoPerfil = isset($_SESSION['id_usuario']) ? 'Perfil.php' : 'Login.php';
}
?>
<header class="menu-header">
    <nav class="navbar" aria-label="Navegación principal">
        <button class="menu-toggle" id="menuToggle" type="button"
                aria-label="Abrir menú" aria-controls="menuLinks" aria-expanded="false">
            <span aria-hidden="true">☰</span>
        </button>

        <a class="logo" href="<?= $rutaBase ?>index.php">Horas que importan</a>

        <ul class="menu-links" id="menuLinks">
            <li><a href="<?= $rutaBase ?>index.php" <?= $paginaActiva === 'inicio' ? 'class="active" aria-current="page"' : '' ?>>Inicio</a></li>
            <li><a href="<?= $rutaBase ?>HTML/Producto.php" <?= $paginaActiva === 'productos' ? 'class="active" aria-current="page"' : '' ?>>Productos</a></li>
            <li><a href="<?= $rutaBase ?>HTML/Mistemas.php" <?= $paginaActiva === 'temas' ? 'class="active" aria-current="page"' : '' ?>>Mis temas</a></li>
            <li><a href="<?= $rutaBase ?>HTML/Asistente.php" <?= $paginaActiva === 'chat' ? 'class="active" aria-current="page"' : '' ?>>Chat IA</a></li>
        </ul>

        <a href="<?= $destinoPerfil ?>" class="user-avatar" aria-label="Ir a mi perfil o iniciar sesión">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" aria-hidden="true">
                <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 4 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/>
            </svg>
        </a>
    </nav>
</header>
