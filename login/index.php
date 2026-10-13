<?php $activePage = 'login';
$pageTitle = 'Giriş Yap'; ?>
<!DOCTYPE html>
<html lang="tr">

<head>
    <?php include __DIR__ . '/../head.php'; ?>
</head>

<body>
    <?php include __DIR__ . '/../header.php'; ?>

    <div class="container" style="max-width: 400px; margin-top: 50px;">
        <h2 class="mb-4">Giriş Yap</h2>
        <form method="post" action="">
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Şifre</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <button type="submit" class="btn btn-primary">Giriş Yap</button>
        </form>
    </div>
</body>

</html>