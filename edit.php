<?php
$title = 'Edit Records';
require_once "includes/header.php";
require_once "includes/db/conn.php";

$result = $crud->getSpecialities();

if (!isset($_GET['id'])) {
    echo 'error';
} else {
    $id = $_GET['id'];
    $attendee_detail = $crud->getAttendeeDetails($id);



?>

<div class="container main-container" style="margin-top: 80px;">
    <h1 class="text-center text-wrap registration-heading">Edit Details</h1>
    <form method="post" action="editUpdate.php" id="registrationForm">
        <input type="hidden" id="id" name="id" value= "<?php echo $attendee_detail['attendee_id']?>" /> 

        <div class="mb-3">
            <label for="name" class="form-label">Full Name</label>
            <input type="text" class="form-control" id="name" name="name" value="<?php echo $attendee_detail['attendee_name'] ?>">

        </div>

        <div class="mb-3">
            <label for="designation" class="form-label">Area of expertise</label>
            <select class="form-select" aria-label="Default select example" id="designation" name="designation">
                <!-- <option selected>Select Designation</option>
                <option value="1">Admin</option>
                <option value="2">Developer</option>
                <option value="3">Network Engineer</option>
                <option value="4">Others</option> -->
                <option selected>Select Designation</option>
                <?php while ($r = $result->fetch(PDO::FETCH_ASSOC)) { ?>

                    <option value=<?php echo $r['speciality_id'] ?> <?php
                                                                    if ($attendee_detail['attendee_speciality'] == $r['speciality_id']) {
                                                                        echo 'selected';
                                                                    }
                                                                    ?>>
                        <?php echo $r['name'] ?>
                    </option>
                <?php } ?>
            </select>
        </div>

        <div class="mb-3">
            <label for="dob" class="form-label">Date of Birth</label>
            <input type="date" class="form-control" id="dob" name="dob" value="<?php echo $attendee_detail['attendee_dob'] ?>">

        </div>

        <div class="mb-3">
            <label for="phone" class="form-label">Contact Number</label>
            <input type="text" class="form-control" id="phone" aria-describedby="phoneHelp" name="phone" value="<?php echo $attendee_detail['attendee_contact'] ?>">

        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input type="email" class="form-control" id="email" aria-describedby="emailHelp" name="email" value="<?php echo $attendee_detail['attendee_email'] ?>">

        </div>

        <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1" name="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Check me out</label>
        </div>

        <div class="d-grid gap-2">
            <button type="submit" name="submit" value="submit" class="btn btn-success btn-block">Save Changes</button>
        </div>

    </form>

</div>
<?php }?>
<?php require_once "includes/footer.php" ?>