<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: admin_login.php");
    exit();
}

include 'db.php';
if (isset($_GET['approve_donor'])) {
    $id = $_GET['approve_donor'];
    mysqli_query($conn, "UPDATE donors SET status='Approved' WHERE id=$id");
}

if (isset($_GET['reject_donor'])) {
    $id = $_GET['reject_donor'];
    mysqli_query($conn, "UPDATE donors SET status='Rejected' WHERE id=$id");
}

if (isset($_GET['approve_request'])) {
    $id = $_GET['approve_request'];
    mysqli_query($conn, "UPDATE blood_requests SET status='Approved' WHERE id=$id");
}

if (isset($_GET['reject_request'])) {
    $id = $_GET['reject_request'];
    mysqli_query($conn, "UPDATE blood_requests SET status='Rejected' WHERE id=$id");
}

$donors = mysqli_query($conn, "SELECT * FROM donors");
$requests = mysqli_query($conn, "SELECT * FROM blood_requests");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Panel</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<nav>
    <h2>Admin Panel</h2>
    <div>
        <a href="index.php">Home</a>
    </div>
</nav>

<h2 class="page-title">Donor Details</h2>

<table>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Blood Group</th>
        <th>Phone</th>
        <th>City</th>
        <th>Status</th>
        <th>Action</th>
    </tr>

    <?php while ($row = mysqli_fetch_assoc($donors)) { ?>
    <tr>
        <td><?php echo $row['id']; ?></td>
        <td><?php echo $row['name']; ?></td>
        <td><?php echo $row['blood_group']; ?></td>
        <td><?php echo $row['phone']; ?></td>
        <td><?php echo $row['city']; ?></td>
        <td><?php echo $row['status']; ?></td>
        <td>
            <a href="admin.php?approve_donor=<?php echo $row['id']; ?>">Approve</a> |
            <a href="admin.php?reject_donor=<?php echo $row['id']; ?>">Reject</a>
        </td>
    </tr>
    <?php } ?>
</table>

<h2 class="page-title">Blood Requests</h2>

<table>
    <tr>
        <th>ID</th>
        <th>Patient Name</th>
        <th>Blood Group</th>
        <th>Phone</th>
        <th>City</th>
        <th>Status</th>
        <th>Action</th>
    </tr>

    <?php while ($row = mysqli_fetch_assoc($requests)) { ?>
    <tr>
        <td><?php echo $row['id']; ?></td>
        <td><?php echo $row['patient_name']; ?></td>
        <td><?php echo $row['blood_group']; ?></td>
        <td><?php echo $row['phone']; ?></td>
        <td><?php echo $row['city']; ?></td>
        <td><?php echo $row['status']; ?></td>
        <td>
            <a href="admin.php?approve_request=<?php echo $row['id']; ?>">Approve</a> |
            <a href="admin.php?reject_request=<?php echo $row['id']; ?>">Reject</a>
        </td>
    </tr>
    <?php } ?>
</table>

</body>
</html>