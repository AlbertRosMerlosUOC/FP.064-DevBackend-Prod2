<!-- 
<header>
    <a href="/">LoginAPP</a>
</header>
-->

<header class="p-3 mb-3 border-bottom">
    <div class="container">
    <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
            <li><a href="#" class="nav-link px-2 link-secondary">Producto 2</a></li>
            <!-- <li><a href="#" class="nav-link px-2 link-dark">Otro menú</a></li> -->
        </ul>
        <div class="dropdown text-end">
            <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                <?= $user->getNombre() . ' ' . $user->getApellido1() . ' ' . $user->getApellido2() ?>
            </a>
            <ul class="dropdown-menu text-small">
                <li><a class="dropdown-item" href="/php/logout.php">Cerrar sesión</a></li>
            </ul>
        </div>
    </div>
    </div>
</header>