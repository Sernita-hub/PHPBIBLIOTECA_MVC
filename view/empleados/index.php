<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biblioteca - Empleados</title>
    <link rel="stylesheet" href="asses/stilos.css">
</head>
<body>
    <?php
    $_GET['controlador'] = 'empleados';
    include_once 'view/layout/menu.php';
    ?>

    <main class="main-wrapper">
        <div class="page-header reveal">
            <h1 class="page-title">👤 Gestión de Empleados</h1>
            <p class="page-subtitle">Administra el personal de la biblioteca</p>
        </div>

        <div class="card reveal">
            <div class="card-header">
                <h2>➕ Agregar Empleado</h2>
            </div>
            <div class="card-body">
                <form action="index.php?controlador=empleados&accion=guardar" method="POST" class="form-inline">
                    <div class="form-group">
                        <label>Nombre</label>
                        <input type="text" name="nombre" placeholder="Nombre completo" required>
                    </div>
                    <div class="form-group">
                        <label>Cargo</label>
                        <input type="text" name="cargo" placeholder="Ej: Bibliotecario, Auxiliar...">
                    </div>
                    <button type="submit" class="btn-primary">Guardar Empleado</button>
                </form>
            </div>
        </div>

        <div class="card reveal">
            <div class="card-header">
                <h2>👤 Lista de Empleados</h2>
                <span class="badge"><?= count($empleados) ?> empleados</span>
            </div>
            <div class="table-wrapper">
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Cargo</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($empleados)): ?>
                            <?php foreach ($empleados as $r): ?>
                            <tr class="table-row-reveal">
                                <td><span class="id-badge"><?= htmlspecialchars($r['id_empleados']) ?></span></td>
                                <td><strong><?= htmlspecialchars($r['nombre']) ?></strong></td>
                                <td><?= htmlspecialchars($r['cargo'] ?? '—') ?></td>
                                <td>
                                    <a href="index.php?controlador=empleados&accion=eliminar&id=<?= $r['id_empleados'] ?>"
                                       class="btn-action btn-delete"
                                       onclick="return confirm('¿Seguro que deseas eliminar este empleado?')">
                                        🗑 Eliminar
                                    </a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr><td colspan="4" class="empty-row">No hay empleados registrados aún.</td></tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>

    <script src="asses/animations.js"></script>
</body>
</html>
