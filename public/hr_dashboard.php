<?php
session_start();

if (!isset($_SESSION['username']) || $_SESSION['department'] !== 'accounting') {
    header("Location: login_accounting.php");
    exit();
}
?>

<?php include '../templates/header.php'; ?>

<div class="card">
    <h2>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h2>
    <p>This is your Human Resources Department workspace.</p>
</div>

<?php include '../templates/footer.php'; ?>
