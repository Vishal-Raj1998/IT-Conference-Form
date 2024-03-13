<?php 

    require_once "includes/db/conn.php";
    

    if(!isset($_GET['id'])){
        echo 'error';
        
    }else{
        $id=$_GET['id'];
        $result=$crud -> deleteAttendee($id);
        if($result){
            header('Location: viewRecords.php');
        }else{
            echo '';
        }
    }

?>