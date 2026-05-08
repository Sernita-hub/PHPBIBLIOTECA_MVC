<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biblioteca - Registro</title>
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
                <h1>Registro</h1>
                <p>Crear nueva cuenta</p>
            </div>

            <?php if (!empty($error)): ?>
                <div class="alert alert-error"><?= htmlspecialchars($error) ?></div>
            <?php endif; ?>

            <form action="index.php?controlador=auth&accion=procesarRegistro" method="POST" class="auth-form">
                <div class="form-group">
                    <label for="usuario">Usuario</label>
                    <input type="text" id="usuario" name="usuario" placeholder="Elige un nombre de usuario" required>
                </div>
                <div class="form-group">
                    <label for="clave">Contraseña</label>
                    <input type="password" id="clave" name="clave" placeholder="Crea una contraseña segura" required>
                </div>
                <button type="submit" class="btn-primary btn-full">Crear Cuenta</button>
            </form>

            <div class="auth-footer">
                <p>¿Ya tienes cuenta? <a href="index.php?controlador=auth&accion=login">Iniciar sesión</a></p>
            </div>
        </div>
    </div>

    <script src="asses/animations.js"></script>
</body>
</html>
