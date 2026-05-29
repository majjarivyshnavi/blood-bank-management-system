<?php
session_start();
include 'db.php';

$message = "";

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

if (isset($_POST['request'])) {
    $user_id = $_SESSION['user_id'];
    $patient_name = $_POST['patient_name'];
    $blood_group = $_POST['blood_group'];
    $phone = $_POST['phone'];
    $city = $_POST['city'];

    $sql = "INSERT INTO blood_requests (user_id, patient_name, blood_group, phone, city)
            VALUES ('$user_id', '$patient_name', '$blood_group', '$phone', '$city')";

    if (mysqli_query($conn, $sql)) {
        $message = "Blood request submitted successfully.";
    } else {
        $message = "Something went wrong.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Request Blood</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<nav>
    <h2>Blood Bank</h2>
    <div>
        <a href="index.php">Home</a>
        <a href="donate.php">Donate Blood</a>
        <a href="logout.php">Logout</a>
    </div>
</nav>

<div class="form-container">
    <h2>Request Blood</h2>

    <p class="success"><?php echo $message; ?></p>

    <form method="POST">
        <input type="text" name="patient_name" placeholder="Enter patient name" required>

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

        <button type="submit" name="request">Submit Request</button>
    </form>
</div>

</body>
</html>