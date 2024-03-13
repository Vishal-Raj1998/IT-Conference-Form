<?php
$title = 'View Details';
require_once "includes/header.php";
require_once "includes/db/conn.php";


if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $result = $crud->getAttendeeDetails($id);
} else {
    echo "<div class='container mt-5'>";
    echo "<h1>Please Check the details; <span style='color:red;'>Something went wrong</span></h1>";
    echo "<a class='btn btn-primary' href='viewRecords.php'>Go Back to View Records<a>";
    echo "</div>";
    // Exit the script or handle the error as needed
    exit;
}
?>

<div class="container mt-5 m-main-container">
    <div class="card" style="margin-top:80px;">
        <div class="card-header">
            Details
        </div>
        <div class="card-body">

            <h5 class="card-title">Name: <?php echo $result['attendee_name']; ?></h5>
            <p class="card-text">Email: <?php echo $result['attendee_email']; ?></p>
            <p class="card-text">Contact: <?php echo $result['attendee_contact']; ?> </p>
            <p class="card-text">Date of Birth: <?php echo $result['attendee_dob']; ?> </p>
            <p class="card-text">Designation <?php echo $result['name']; ?> </p>
            <!-- You can display more details here if needed -->
            <a href="viewRecords.php" class="btn btn-primary">Go to Records</a>
        </div>
    </div>
    <br>
    <br>
    <a class="btn" style="background-color: #d46d19; color:white" href="viewRecords.php">Go Back</a>
    <a class="btn btn-warning" style="color:white" href="edit.php?id=<?php echo $result['attendee_id'] ?>">Edit</a>
    <a onclick="return confirm('Do you want to delete the Record!')" class="btn btn-danger" style="color:white" href="delete.php?id=<?php echo $result['attendee_id'] ?>">Delete</a>
</div>


<?php require_once "includes/footer.php" ?>