<nav class="navbar">
    <div class="navbar-brand">
        <span class="navbar-icon">📚</span>
        <span>Biblioteca</span>
    </div>
    <ul class="nav-links">
        <li><a href="index.php?controlador=libros&accion=inicio" class="nav-link <?= (($_GET['controlador'] ?? '') === 'libros') ? 'active' : '' ?>">
            <span class="nav-icon">📖</span> Libros
        </a></li>
        <li><a href="index.php?controlador=socios&accion=inicio" class="nav-link <?= (($_GET['controlador'] ?? '') === 'socios') ? 'active' : '' ?>">
            <span class="nav-icon">👥</span> Socios
        </a></li>
        <li><a href="index.php?controlador=empleados&accion=inicio" class="nav-link <?= (($_GET['controlador'] ?? '') === 'empleados') ? 'active' : '' ?>">
            <span class="nav-icon">👤</span> Empleados
        </a></li>
        <li><a href="index.php?controlador=prestamos&accion=inicio" class="nav-link <?= (($_GET['controlador'] ?? '') === 'prestamos') ? 'active' : '' ?>">
            <span class="nav-icon">🔄</span> Préstamos
        </a></li>
    </ul>
    <div class="nav-user">
        <?php if (!empty($_SESSION['nombre_usuario'])): ?>
            <span class="user-badge">👋 <?= htmlspecialchars($_SESSION['nombre_usuario']) ?></span>
        <?php endif; ?>
        <a href="index.php?controlador=auth&accion=logout" class="btn-logout">Salir</a>
    </div>
</nav>
