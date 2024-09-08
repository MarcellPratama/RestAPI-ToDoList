<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
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
        <div class="container mt-3 col-5">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    LOGIN
                </div>
                <div class="card-body">
                    <form action="/loginSubmit" method="post">
                        <?php if(session()->getFlashdata('error')): ?>
                            <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
                        <?php endif; ?>
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" name="username" class="form-control" 
                            id="username" placeholder="Masukkan Username..." required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">
                                Password
                            </label>
                            <input type="password" name="password" class="form-control" 
                            id="password" placeholder="Masukkan Password..." required>
                        </div>
                        <div class="mb-3">
                            <input type="submit" name="login" class="btn btn-primary" value="LOGIN">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
