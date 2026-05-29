<?php
session_start();
include 'db.php';

$message = "";

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

if (isset($_POST['donate'])) {
    $user_id = $_SESSION['user_id'];
    $name = $_POST['name'];
    $blood_group = $_POST['blood_group'];
    $phone = $_POST['phone'];
    $city = $_POST['city'];

    $sql = "INSERT INTO donors (user_id, name, blood_group, phone, city)
            VALUES ('$user_id', '$name', '$blood_group', '$phone', '$city')";

    if (mysqli_query($conn, $sql)) {
        $message = "Donation details submitted successfully.";
    } else {
        $message = "Something went wrong.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Donate Blood</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<nav>
    <h2>Blood Bank</h2>
    <div>
        <a href="index.php">Home</a>
        <a href="request.php">Request Blood</a>
        <a href="logout.php">Logout</a>
    </div>
</nav>

<div class="form-container">
    <h2>Donate Blood</h2>

    <p class="success"><?php echo $message; ?></p>

    <form method="POST">
        <input type="text" name="name" placeholder="Enter donor name" required>

        <select name="blood_group" required>
            <option value="">Select Blood Group</option>
            <option>A+</option>
            <option>A-</option>
            <option>B+</option>
            <option>B-</option>
            <option>O+</option>
            <option>O-</option>
            <option>AB+</option>
            <option>AB-</option>
        </select>

        <input type="text" name="phone" placeholder="Enter phone number" required>
        <input type="text" name="city" placeholder="Enter city" required>

        <button type="submit" name="donate">Submit</button>
    </form>
</div>

</body>
</html>