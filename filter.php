<?php
session_start();

include 'data/items.php';
include 'functions/helpers.php';

$items = $_SESSION['items'] ?? $items;

$category = isset($_GET['category']) ? $_GET['category'] : '';
$search = isset($_GET['search']) ? $_GET['search'] : '';
$filteredItems = [];

if ($category || $search) {
    foreach ($items as $item) {
        $matchesCategory = !$category || strtolower($item['category']) === strtolower($category);
        $matchesSearch = !$search || stripos($item['title'], $search) !== false;

        if ($matchesCategory && $matchesSearch) {
            $filteredItems[] = $item;
        }
    }
} else {
    $filteredItems = $items;
}

include 'includes/header.php';
?>

<div class="container mt-4">
    <h1 class="text-center">Filtrar Cursos</h1>
    <form method="GET" action="filter.php" class="mt-4 row g-3">
        <div class="col-md-8">
            <label for="search" class="form-label">Pesquisar por Nome:</label>
            <input type="text" name="search" id="search" class="form-control"
                value="<?php echo htmlspecialchars($search); ?>" placeholder="Digite o nome do curso">
        </div>
        <div class="col-md-2">
            <label for="category" class="form-label">Categoria:</label>
            <select name="category" id="category" class="form-select">
                <option value="">Todas</option>
                <?php
                $categories = array_unique(array_column($items, 'category'));
                foreach ($categories as $cat): ?>
                    <option value="<?php echo $cat; ?>" <?php echo $cat === $category ? 'selected' : ''; ?>>
                        <?php echo $cat; ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="col-md-2 d-flex align-items-end">
            <button type="submit" class="btn btn-primary w-100">Filtrar</button>
        </div>
    </form>

    <div class="row mt-4">
        <?php if (empty($filteredItems)): ?>
            <p class="text-center">Nenhum curso encontrado para os critérios selecionados.</p>
        <?php else: ?>
            <?php foreach ($filteredItems as $item): ?>
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="<?php echo escape($item['image']); ?>" class="card-img-top object-fit-cover"
                            alt="<?php echo escape($item['title']); ?>" width="100%" height="200px">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $item['title']; ?></h5>
                            <p class="card-text">Categoria: <?php echo $item['category']; ?></p>
                            <a href="details.php?id=<?php echo $item['id']; ?>" class="btn btn-primary">Ver mais</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</div>
</body>

</html>

<?php include 'includes/footer.php'; ?>