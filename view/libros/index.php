<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biblioteca - Libros</title>
    <!-- BUG FIX: ruta correcta del CSS (era assets/css/stilos.css) -->
    <link rel="stylesheet" href="asses/stilos.css">
</head>
<body>
    <!-- BUG FIX: menú ahora incluido en todas las vistas -->
    <?php
    $_GET['controlador'] = 'libros';
    include_once 'view/layout/menu.php';
    ?>

    <main class="main-wrapper">
        <div class="page-header reveal">
            <h1 class="page-title">📖 Gestión de Libros</h1>
            <p class="page-subtitle">Administra el catálogo de libros de la biblioteca</p>
        </div>

        <div class="card reveal">
            <div class="card-header">
                <h2>➕ Agregar Libro</h2>
            </div>
            <div class="card-body">
                <form action="index.php?controlador=libros&accion=guardar" method="POST" class="form-inline">
                    <div class="form-group">
                        <label>Título</label>
                        <input type="text" name="titulo" placeholder="Título del libro" required>
                    </div>
                    <div class="form-group">
                        <label>Autor</label>
                        <input type="text" name="autor" placeholder="Nombre del autor">
                    </div>
                    <div class="form-group">
                        <label>Género</label>
                        <input type="text" name="genero" placeholder="Ej: Novela, Ciencia...">
                    </div>
                    <div class="form-group">
                        <label>Disponible</label>
                        <select name="disponible">
                            <option value="1">Sí</option>
                            <option value="0">No</option>
                        </select>
                    </div>
                    <button type="submit" class="btn-primary">Guardar Libro</button>
                </form>
            </div>
        </div>

        <div class="card reveal">
            <div class="card-header">
                <h2>📚 Catálogo de Libros</h2>
                <span class="badge"><?= count($libros) ?> libros</span>
            </div>
            <div class="table-wrapper">
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Título</th>
                            <th>Autor</th>
                            <th>Género</th>
                            <th>Disponible</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($libros)): ?>
                            <?php foreach ($libros as $row): ?>
                            <tr class="table-row-reveal">
                                <td><span class="id-badge"><?= htmlspecialchars($row['id_libro']) ?></span></td>
                                <td><strong><?= htmlspecialchars($row['titulo']) ?></strong></td>
                                <td><?= htmlspecialchars($row['autor'] ?? '—') ?></td>
                                <td><?= htmlspecialchars($row['genero'] ?? '—') ?></td>
                                <td>
                                    <span class="status-badge <?= $row['disponible'] ? 'status-ok' : 'status-no' ?>">
                                        <?= $row['disponible'] ? '✔ Disponible' : '✘ No disponible' ?>
                                    </span>
                                </td>
                                <td>
                                    <a href="index.php?controlador=libros&accion=eliminar&id=<?= $row['id_libro'] ?>"
                                       class="btn-action btn-delete"
                                       onclick="return confirm('¿Seguro que deseas eliminar este libro?')">
                                        🗑 Eliminar
                                    </a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr><td colspan="6" class="empty-row">No hay libros registrados aún.</td></tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>

    <script src="asses/animations.js"></script>
</body>
</html>
