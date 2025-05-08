<?php
session_start();

include 'data/items.php';
include 'functions/helpers.php';

$items = $_SESSION['items'] ?? $items;

$itemId = isset($_GET['id']) ? (int) $_GET['id'] : 0;

$item = null;
foreach ($items as $i) {
    if ($i['id'] === $itemId) {
        $item = $i;
        break;
    }
}

if (!$item) {
    redirect('index.php');
}

include 'includes/header.php';
?>

<div class="container mt-4">
    <div class="card">
        <img src="<?php echo escape($item['image']); ?>" class="card-img-top"
            style="max-height: 330px; object-fit: cover;" alt="<?php echo escape($item['title']); ?>">
        <div class="card-body">
            <h5 class="card-title"><?php echo escape($item['title']); ?></h5>
            <p class="card-text">Categoria: <?php echo escape($item['category']); ?></p>
            <p class="card-text">Descrição: <?php echo escape($item['description']); ?></p>
            <a href="index.php" class="btn btn-secondary">Voltar</a>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>