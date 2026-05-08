<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biblioteca - Iniciar Sesión</title>
    <link rel="stylesheet" href="asses/stilos.css">
</head>
<body class="auth-body">
    <div class="auth-bg">
        <div class="auth-shape shape-1"></div>
        <div class="auth-shape shape-2"></div>
        <div class="auth-shape shape-3"></div>
    </div>

    <div class="auth-wrapper">
        <div class="auth-card reveal">
            <div class="auth-logo">
                <span class="auth-logo-icon">📚</span>
                <h1>Biblioteca</h1>
                <p>Sistema de Gestión</p>
            </div>

            <?php if (!empty($error)): ?>
                <div class="alert alert-error"><?= htmlspecialchars($error) ?></div>
            <?php endif; ?>
            <?php if (!empty($exito)): ?>
                <div class="alert alert-success"><?= htmlspecialchars($exito) ?></div>
            <?php endif; ?>

            <form action="index.php?controlador=auth&accion=login" method="POST" class="auth-form">
                <div class="form-group">
                    <label for="usuario">Usuario</label>
                    <input type="text" id="usuario" name="usuario" placeholder="Tu nombre de usuario" required autocomplete="username">
                </div>
                <div class="form-group">
                    <label for="password">Contraseña</label>
                    <input type="password" id="password" name="password" placeholder="Tu contraseña" required autocomplete="current-password">
                </div>
                <button type="submit" class="btn-primary btn-full">Ingresar</button>
            </form>

            <div class="auth-footer">
                <p>¿No tienes cuenta? <a href="index.php?controlador=auth&accion=registro">Regístrate aquí</a></p>
            </div>
        </div>
    </div>

    <script src="asses/animations.js"></script>
</body>
</html>
