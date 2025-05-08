<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SkillForge</title>
    <link rel="stylesheet" href="styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <header class="bg-light py-3">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center">
                <h1 class="h3 mb-0"><a href="index.php" class="text-decoration-none text-dark">SkillForge</a></h1>
                <nav>
                    <a href="index.php" class="btn btn-light me-2"><u>Início</u></a>
                    <a href="filter.php" class="btn btn-light me-2"><u>Filtrar</u></a>
                    <a href="login.php" class="btn btn-light me-2"><u>Login</u></a>

                </nav>
                <div class="d-flex align-items-center">
                    <?php if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] && $_SESSION['username']): ?>
                        <div class="font-weight-light me-2">Olá, <?= $_SESSION['username'] ?></div>
                        <form method="POST" class="d-inline-flex align-items-center">
                            <button type="submit" name="logout" class="btn text-danger">Logout</button>
                        </form>
                    <?php endif; ?>

                    <a href="<?php echo isset($_SESSION['logged_in']) && $_SESSION['logged_in'] ? 'protected.php' : 'login.php'; ?>"
                        class="btn btn-warning">
                        Registre o seu curso
                    </a>
                </div>
            </div>
        </div>
    </header>
    <?php
    if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] && $_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['logout'])) {
        session_destroy();
        header('Location: index.php');
        exit;
    }
    ?>
</body>

</html>