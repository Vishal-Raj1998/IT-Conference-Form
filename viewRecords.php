<?php 
$title='Records';
require_once "includes/header.php";
require_once "includes/db/conn.php";

    $result=$crud->getAttendees();
?>

<table class="table view-table">
  <thead>
    <tr>
      
      <th scope="col">ID</th>
      <th scope="col">Name</th>
      <th scope="col">Designation</th>
      <th scope="col">Date of Birth</th>
      <th scope="col">Contact</th>
      <th scope="col">Email</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <!-- <tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>Admin</td>
      <td>10-3-2004</td>
      <td>754298568</td>
      <td>xyz@gmail.com</td>
      
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Zukerbarg</td>
      <td>Developer</td>
      <td>11-7-2001</td>
      <td>754298768</td>
      <td>trz@gmail.com</td>
      
    </tr> -->

    <?php 
        while($r=$result->fetch(PDO::FETCH_ASSOC)) { ?>
            <tr>
                <th><?php echo $r['attendee_id'] ?></th>
                <td><?php echo $r['attendee_name'] ?></td>
                <td><?php echo $r['name'] ?></td>
                <td><?php echo $r['attendee_dob'] ?></td>
                <td><?php echo $r['attendee_contact'] ?></td>
                <td><?php echo $r['attendee_email'] ?></td>   
                <td> 
                  
                <a class="btn" style="background-color: #d46d19; color:white" href="view.php?id=<?php echo $r['attendee_id'] ?>">View</a>
                <a class="btn btn-warning" style="color:white" href="edit.php?id=<?php echo $r['attendee_id'] ?>">Edit</a>
                <a onclick="return confirm('Do you want to delete the Record!')" class="btn btn-danger" style="color:white" href="delete.php?id=<?php echo $r['attendee_id'] ?>">Delete</a>
              </td>
            </tr>
        <?php }?>
  </tbody>
</table>

<?php require_once "includes/footer.php"?>