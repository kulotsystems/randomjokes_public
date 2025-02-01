<?php
/**
 * jokes: Jokes page
 */

// configuration
require_once __DIR__ . '/config/database.php';
if(!isset($conn)) exit();

// initialize global data
$joke = '';

// query a random joke
$stmt = $conn->prepare("SELECT `joke` FROM `jokes` ORDER BY RAND() LIMIT 1");
$stmt->execute();
$result = $stmt->get_result();
if($result->num_rows > 0) {
    $row2 = $result->fetch_assoc();
    $joke = $row2['joke'];
}
?>

<!-- html top -->
<?php require_once __DIR__ . '/partials/html-1-top.php'; ?>

<!-- main content -->
<main class="card shadow-sm" style="width: 100%; max-width: 500px;">
    <div class="card-header d-flex justify-content-between align-items-center">
        <span class="opacity-50"><?= $_SERVER['SERVER_NAME'] ?></span>
    </div>
    <div class="card-body">
        <div class="mb-3 text-center">
            <h2 class="card-title"><span class="text-info opacity-75">RandomJokes</span></h2>
        </div>
        <p class="display-6" style="font-size: 1.6rem;"><?= htmlspecialchars($joke) ?></p>
    </div>
    <div class="card-footer d-flex justify-content-end align-items-center">
        <a class="btn btn-outline-info opacity-75" href="index.php">More Jokes</a>
    </div>
</main>

<!-- html bottom -->
<?php require_once __DIR__ . '/partials/html-2-bot.php'; ?>