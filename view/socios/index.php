<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biblioteca - Socios</title>
    <link rel="stylesheet" href="asses/stilos.css">
</head>
<body>
    <?php
    $_GET['controlador'] = 'socios';
    include_once 'view/layout/menu.php';
    ?>

    <main class="main-wrapper">
        <div class="page-header reveal">
            <h1 class="page-title">👥 Gestión de Socios</h1>
            <p class="page-subtitle">Administra los socios registrados en la biblioteca</p>
        </div>

        <div class="card reveal">
            <div class="card-header">
                <h2>➕ Agregar Socio</h2>
            </div>
            <div class="card-body">
                <form action="index.php?controlador=socios&accion=guardar" method="POST" class="form-inline">
                    <div class="form-group">
                        <label>Nombre</label>
                        <input type="text" name="nombre" placeholder="Nombre completo" required>
                    </div>
                    <div class="form-group">
                        <label>Correo</label>
                        <input type="email" name="correo" placeholder="correo@ejemplo.com">
                    </div>
                    <div class="form-group">
                        <label>Teléfono</label>
                        <input type="text" name="telefono" placeholder="Número de teléfono">
                    </div>
                    <button type="submit" class="btn-primary">Guardar Socio</button>
                </form>
            </div>
        </div>

        <div class="card reveal">
            <div class="card-header">
                <h2>👥 Lista de Socios</h2>
                <span class="badge"><?= count($socios) ?> socios</span>
            </div>
            <div class="table-wrapper">
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Correo</th>
                            <th>Teléfono</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($socios)): ?>
                            <?php foreach ($socios as $r): ?>
                            <tr class="table-row-reveal">
                                <td><span class="id-badge"><?= htmlspecialchars($r['id_socio']) ?></span></td>
                                <td><strong><?= htmlspecialchars($r['nombre']) ?></strong></td>
                                <td><?= htmlspecialchars($r['correo'] ?? '—') ?></td>
                                <td><?= htmlspecialchars($r['telefono'] ?? '—') ?></td>
                                <td>
                                    <a href="index.php?controlador=socios&accion=eliminar&id=<?= $r['id_socio'] ?>"
                                       class="btn-action btn-delete"
                                       onclick="return confirm('¿Seguro que deseas eliminar este socio?')">
                                        🗑 Eliminar
                                    </a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr><td colspan="5" class="empty-row">No hay socios registrados aún.</td></tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>

    <script src="asses/animations.js"></script>
</body>
</html>
