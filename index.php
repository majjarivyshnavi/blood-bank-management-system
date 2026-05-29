<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Blood Bank Management System</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<nav>
    <h2>Blood Bank</h2>
    <div>
        <a href="index.php">Home</a>
        <a href="register.php">Register</a>
        <a href="login.php">Login</a>
        <a href="donate.php">Donate Blood</a>
        <a href="request.php">Request Blood</a>
        <a href="admin.php">Admin</a>

        <?php if(isset($_SESSION['user_id'])) { ?>
            <a href="logout.php">Logout</a>
        <?php } ?>
    </div>
</nav>

<section class="hero">
    <h1>Blood Bank Management System</h1>
    <p>Donate blood, save lives. Find and request blood easily.</p>

    <?php if(isset($_SESSION['name'])) { ?>
        <h3>Welcome, <?php echo $_SESSION['name']; ?>!</h3>
    <?php } ?>

    <a class="btn" href="register.php">Get Started</a>
</section>

</body>
</html>