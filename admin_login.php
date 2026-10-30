<?php
session_start();
$error = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user = $_POST['username'] ?? '';
    $pass = $_POST['password'] ?? '';

    if ($user === 'admin' && $pass === 'admin123') {
        $_SESSION['admin'] = true;
        header("Location: admin.php");
        exit();
    }
    $error = "Invalid admin credentials";
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Admin Login</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
<h2 class="page-title">Admin Login</h2>
<?php if ($error) echo "<p style='text-align:center;color:red;'>" . htmlspecialchars($error) . "</p>"; ?>
<form method="POST" style="text-align:center;">
    <input type="text" name="username" placeholder="Username" required><br><br>
    <input type="password" name="password" placeholder="Password" required><br><br>
    <button type="submit">Login</button>
</form>
</body>
</html>