<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To Do List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url('css/style.css') ?>" rel="stylesheet">
</head>
<body>
    <div class="background">
        <nav class="navbar navbar-expand-sm">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-auto">
                        <img src="<?= base_url('images/Profile M.jpg') ?>" alt="Avatar Logo" style="width:80px;" class="navbar-brand">
                    </div>
                    <div class="col-auto text-white h3 align-self-center">
                        <span class="navbar-text">Marcell Pratama Evli <br> 225314053</span>
                    </div>
                </div>
            </div>
        </nav>
        <div class="container mt-3 col-8">
            <div class="card">
                <div class="card-header text-white bg-primary">
                    To Do List
                </div>
                <div class="card-body">
                    <form action="/todolist" method="post" class="d-flex mb-3">
                        <input type="text" class="form-control me-3" 
                        id="kegiatan" name="kegiatan" placeholder="<Teks to do>" required>
                        <button type="submit" class="btn btn-primary ms-2">Tambah</button>
                    </form>
                    <ul class="list-group">
                        <?php foreach ($tasks as $task):?>
                            <li class="list-group-item d-flex justify-content-between align-items-center task-row">
                                <span class="<?= $task['status'] == 'Selesai' ? 'completed' : '' ?>">
                                    <?= esc($task['kegiatan']) ?>
                                </span>
                                <div class="task-actions">
                                <?php if ($task['status'] == 'Aktif'): ?>
                                        <form action="/todolist/<?= $task['idkegiatan'] ?>" method="post" class="d-inline">
                                            <input type="hidden" name="_method" value="PUT">
                                            <input type="hidden" name="kegiatan" value="<?= esc($task['kegiatan']) ?>">
                                            <input type="hidden" name="status" value="Selesai">
                                            <button type="submit" class="btn btn-success btn-sm me-2">Selesai</button>
                                        </form>
                                        <form action="/todolist/<?= $task['idkegiatan'] ?>" method="post" class="d-inline">
                                            <input type="hidden" name="_method" value="DELETE">
                                            <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                        </form>
                                    <?php else: ?>
                                        <button class="btn btn-secondary btn-sm disabled me-2">Selesai</button>
                                        <form action="/todolist/<?= $task['idkegiatan'] ?>" method="post" class="d-inline">
                                            <input type="hidden" name="_method" value="DELETE">
                                            <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                        </form>
                                    <?php endif; ?>
                                </div>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                    <a href="/logout" class="btn btn-danger mt-3">Logout</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
