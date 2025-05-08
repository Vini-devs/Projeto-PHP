<?php
session_start();

include 'data/items.php';
include 'functions/helpers.php';

$items = $_SESSION['items'] ?? $items;

include 'includes/header.php';
?>

<div class="container mt-4">
    <div class="hero text-center p-5 rounded">
        <h1 class="display-4">Bem-vindo ao SkillForge</h1>
        <p class="lead">Explore os melhores cursos de tecnologia e design, criados para elevar suas habilidades ao
            próximo nível.</p>
    </div>

    <div class="row">
        <?php foreach ($items as $item): ?>
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <img src="<?php echo escape($item['image']); ?>" class="card-img-top object-fit-cover"
                        alt="<?php echo escape($item['title']); ?>" width="100%" height="200px">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo escape($item['title']); ?></h5>
                        <p class="card-text">Categoria: <?php echo escape($item['category']); ?></p>
                        <a href="details.php?id=<?php echo $item['id']; ?>" class="btn btn-primary">Ver mais</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<?php include 'includes/footer.php'; ?>