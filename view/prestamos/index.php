<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biblioteca - Préstamos</title>
    <link rel="stylesheet" href="asses/stilos.css">
</head>
<body>
    <?php
    $_GET['controlador'] = 'prestamos';
    include_once 'view/layout/menu.php';
    ?>

    <main class="main-wrapper">
        <div class="page-header reveal">
            <h1 class="page-title">🔄 Gestión de Préstamos</h1>
            <p class="page-subtitle">Registra y controla los préstamos de libros</p>
        </div>

        <div class="card reveal">
            <div class="card-header">
                <h2>➕ Registrar Préstamo</h2>
            </div>
            <div class="card-body">
                <form action="index.php?controlador=prestamos&accion=guardar" method="POST" class="form-inline">
                    <div class="form-group">
                        <label>ID Libro</label>
                        <input type="number" name="id_libro" placeholder="ID del libro" required min="1">
                    </div>
                    <div class="form-group">
                        <label>ID Socio</label>
                        <input type="number" name="id_socio" placeholder="ID del socio" required min="1">
                    </div>
                    <div class="form-group">
                        <label>ID Empleado</label>
                        <input type="number" name="id_empleado" placeholder="ID del empleado" required min="1">
                    </div>
                    <div class="form-group">
                        <label>Fecha de Préstamo</label>
                        <input type="date" name="fecha_prestamo" required>
                    </div>
                    <div class="form-group">
                        <label>Fecha de Devolución</label>
                        <input type="date" name="fecha_devolucion" required>
                    </div>
                    <button type="submit" class="btn-primary">Registrar Préstamo</button>
                </form>
            </div>
        </div>

        <div class="card reveal">
            <div class="card-header">
                <h2>🔄 Préstamos Activos</h2>
                <span class="badge"><?= count($prestamos) ?> registros</span>
            </div>
            <div class="table-wrapper">
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Libro</th>
                            <th>Socio</th>
                            <th>Empleado</th>
                            <th>F. Préstamo</th>
                            <th>F. Devolución</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($prestamos)): ?>
                            <?php foreach ($prestamos as $r): ?>
                            <tr class="table-row-reveal">
                                <td><span class="id-badge"><?= htmlspecialchars($r['id_prestamo']) ?></span></td>
                                <td><?= htmlspecialchars($r['titulo_libro'] ?? $r['id_libro']) ?></td>
                                <td><?= htmlspecialchars($r['nombre_socio'] ?? $r['id_socio']) ?></td>
                                <td><?= htmlspecialchars($r['nombre_empleado'] ?? $r['id_empleado']) ?></td>
                                <td><?= htmlspecialchars($r['fecha_prestamo']) ?></td>
                                <td>
                                    <?php
                                    $hoy = new DateTime();
                                    $dev = new DateTime($r['fecha_devolucion']);
                                    $vencido = $dev < $hoy;
                                    ?>
                                    <span class="<?= $vencido ? 'text-danger' : '' ?>">
                                        <?= htmlspecialchars($r['fecha_devolucion']) ?>
                                        <?= $vencido ? ' ⚠️' : '' ?>
                                    </span>
                                </td>
                                <td>
                                    <a href="index.php?controlador=prestamos&accion=eliminar&id=<?= $r['id_prestamo'] ?>"
                                       class="btn-action btn-delete"
                                       onclick="return confirm('¿Eliminar este registro de préstamo?')">
                                        🗑 Eliminar
                                    </a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr><td colspan="7" class="empty-row">No hay préstamos registrados actualmente.</td></tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>

    <script src="asses/animations.js"></script>
</body>
</html>
