<?php include '../templates/header.php'; ?>

<div id="login-wrapper">
    <form class="login-form" method="POST" action="verify_accounting.php">
        <h2>Login Template</h2>

        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>

        <input type="submit" value="Sign In">
    </form>
</div>

<?php include '../templates/footer.php'; ?>
