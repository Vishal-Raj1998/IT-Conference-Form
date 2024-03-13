<?php 
$title='Index';
require_once "includes/header.php";
require_once "includes/db/conn.php";

$result=$crud->getSpecialities();
?>

<div class="container main-container" style="margin-top: 80px;">
    <h1 class="text-center text-wrap registration-heading">Registration for IT conference</h1>
    <form method="post" action="success.php" id="registrationForm" >
        
        <div class="mb-3">
            <label for="name" class="form-label">Full Name</label>
            <input required type="text" class="form-control" id="name" name="name">
            <div id="name" class="form-text">We'll never share your name with anyone else.</div>
        </div>

        <div class="mb-3">
            <label for="designation" class="form-label">Area of expertise</label>
            <select required class="form-select" aria-label="Default select example" id="designation" name="designation">
                <!-- <option selected>Select Designation</option>
                <option value="1">Admin</option>
                <option value="2">Developer</option>
                <option value="3">Network Engineer</option>
                <option value="4">Others</option> -->
                <option selected>Select Designation</option>
                <?php while($r=$result->fetch(PDO::FETCH_ASSOC)){ ?>

                    <option value=<?php echo $r['speciality_id']?>><?php echo $r['name']?></option>
                <?php }?>
            </select>
        </div>
        
        <div class="mb-3">
            <label for="dob" class="form-label">Date of Birth</label>
            <input required type="date" class="form-control" id="dob" name="dob">
            <div id="dob" class="form-text">We'll never share your date of birth with anyone else.</div>
        </div>
        
        <div class="mb-3">
            <label for="phone" class="form-label">Contact Number</label>
            <input required type="text" class="form-control" id="phone" aria-describedby="phoneHelp" name="phone">
            <div id="phoneHelp" class="form-text">We'll never share your contact number with anyone else.</div>
        </div>
        
        <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input required type="email" class="form-control" id="email" aria-describedby="emailHelp" name="email">
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
        </div>
        
        <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1" name="exampleCheck1">
            <label  class="form-check-label" for="exampleCheck1">Check me out</label>
        </div>
        
        <div class="d-grid gap-2">
            <button type="submit" name="submit" value="submit" class="btn btn-primary btn-block">Submit</button>
        </div>

    </form> 
</div>
<?php require_once "includes/footer.php"?>
