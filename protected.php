<?php
session_start();

include 'data/items.php';
include 'functions/helpers.php';

if (!isset($_SESSION['logged_in']) || !$_SESSION['logged_in']) {
    header('Location: login.php');
    exit;
}

if (!isset($_SESSION['items'])) {
    include 'data/items.php';
    $_SESSION['items'] = $items;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $newItem = [
        'id' => count($_SESSION['items']) + 1,
        'title' => $_POST['title'] ?? '',
        'image' => $_POST['image'] ?? '',
        'category' => $_POST['category'] ?? '',
        'description' => $_POST['description'] ?? '',
    ];

    $_SESSION['items'][] = $newItem;
    header('Location: protected.php');
    exit;
}

$items = $_SESSION['items'];

include 'includes/header.php';
?>

<div class="container mt-4">
    <a href="index.php" class="btn btn-secondary mb-3">Voltar ao Catálogo</a>
    <h1 class="text-center">Página Protegida</h1>
    <p class="text-center">Bem-vindo, <?php echo htmlspecialchars($_SESSION['username']); ?>!</p>
    <h2 class="mt-4">Cadastrar Novo Curso</h2>
    <form method="POST" action="protected.php" class="mt-3">
        <div class="mb-3">
            <label for="title" class="form-label">Título:</label>
            <input type="text" id="title" name="title" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">URL da Imagem:</label>
            <input type="text" id="image" name="image" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="category" class="form-label">Categoria:</label>
            <input type="text" id="category" name="category" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Descrição:</label>
            <textarea id="description" name="description" class="form-control" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Cadastrar</button>
    </form>

    <h2 class="mt-4">Itens Cadastrados</h2>
    <div class="row">
        <?php foreach ($items as $item): ?>
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="<?php echo escape($item['image']); ?>" class="card-img-top object-fit-cover"
                        alt="<?php echo escape($item['title']); ?>" width="100%" height="200px">

                    <div class="card-body">
                        <h5 class="card-title"><?php echo $item['title']; ?></h5>
                        <p class="card-text">Categoria: <?php echo $item['category']; ?></p>
                        <p class="card-text">Descrição: <?php echo $item['description']; ?></p>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<?php include 'includes/footer.php'; ?>