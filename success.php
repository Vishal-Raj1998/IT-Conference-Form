<?php 
$title = 'success';
require_once "includes/header.php";
require_once "includes/db/conn.php";

// $result = $crud->getSpecialities();

if(isset($_POST['submit'])){
    $name = $_POST['name']; // Assuming 'name' is the name of the input field for name
    $expertise = $_POST['designation']; // Assuming 'designation' is the name of the input field for designation or speciality
    $email = $_POST['email']; // Assuming 'email' is the name of the input field for email
    $phone=$_POST['phone'];
    $dob=$_POST['dob'];
    $isSuccess= $crud ->insert($name,$expertise,$dob,$phone,$email);
    echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>";
    if($isSuccess){
        $single_speciality=$crud ->getSpeciality($expertise);
        echo "<script>";
        echo "Swal.fire({
                title: 'Success!',
                text: 'Details Submitted Successfully',
                icon: 'success'
            });";
        echo "</script>";
        
    }
    else{
        echo "<script>";
        echo "Swal.fire({
                title: 'Error!',
                text: 'Failed to Submit',
                icon: 'error'
            });";
        echo "</script>";
    }
}

// Assuming you have received some data from the form
// For demonstration, let's assume you have received 'name' and 'email'
// $name = $_POST['name']; // Assuming 'name' is the name of the input field for name
// $email = $_POST['email']; // Assuming 'email' is the name of the input field for email
// $phone=$_POST['phone'];
// $dob=$_POST['dob'];
?>

<div class="container mt-5">
    <div class="card">
        <div class="card-header">
            Submitted Details
        </div>
        <div class="card-body">
           
            <h5 class="card-title">Name: <?php echo $name; ?></h5>
            <p class="card-text">Email: <?php echo $email; ?></p>
            <p class="card-text">Contact: <?php echo $phone; ?> </p>
            <p class="card-text">Date of Birth: <?php echo $dob; ?> </p>
            <p class="card-text">Designation: <?php echo $single_speciality['name']; ?> </p>
            <!-- You can display more details here if needed -->
            <a href="index.php" class="btn btn-primary">Go to Index</a>
        </div>
    </div>
</div>

<?php require_once "includes/footer.php"; ?>
