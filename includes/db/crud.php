<?php

class crud
{

    private $db;
    function __construct($conn)
    {
        $this->db = $conn;
    }

    public function insert($name, $expertise, $dob, $phone, $email)
    {

        try {
            //Sql insert query
            $sql = "INSERT INTO `attendee`(attendee_name,attendee_dob,attendee_contact,attendee_email,attendee_speciality) VALUES(:name,:dob,:phone,:email,:expertise)";
            $stmt = $this->db->prepare($sql);
            //bind all placeholder to actual values
            $stmt->bindparam(':name', $name);
            $stmt->bindparam(':dob', $dob);
            $stmt->bindparam(':phone', $phone);
            $stmt->bindparam(':email', $email);
            $stmt->bindparam(':expertise', $expertise);
            //execute the statement
            $stmt->execute();
            //return the values
            return true;
        } catch (PDOException $e) {
            $e->getMessage();
            return false;
        }
    }

    //edit or update the details
    public function editUpdate($id, $name, $dob, $phone, $email, $expertise)
    {

        $sql = "UPDATE `attendee` SET `attendee_name`=:name,`attendee_dob`=:dob,`attendee_contact`=:phone,`attendee_email`=:email,`attendee_speciality`=:expertise WHERE `attendee_id`=:id";
        $stmt = $this->db->prepare($sql);
        //bind all placeholder to actual values
        try {
            $stmt->bindparam(':id', $id);
            $stmt->bindparam(':name', $name);
            $stmt->bindparam(':dob', $dob);
            $stmt->bindparam(':phone', $phone);
            $stmt->bindparam(':email', $email);
            $stmt->bindparam(':expertise', $expertise);
            //execute the statement
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            $e->getMessage();

            return false;
        }
    }

    //it will show the list of attendees
    public function getAttendees()
    {
        try {
            $sql = "select * from attendee a inner join specilities s on a.attendee_speciality=s.speciality_id ";
            $result = $this->db->query($sql);
            return $result;
        } catch (PDOException $e) {
            $e->getMessage();

            return false;
        }
    }
    //it will show the specialities 
    public function getSpecialities()
    {
        try {
            $sql = "select * from specilities";
            $result = $this->db->query($sql);
            return $result;
        } catch (PDOException $e) {
            $e->getMessage();

            return false;
        }
    }
    //it will show the single speciality
    public function getSpeciality($speciality_id)
    {
        try {
            $sql = "select * from specilities where speciality_id=:speciality_id";
            $stmt = $this->db->prepare($sql);
            $stmt->bindparam(':speciality_id', $speciality_id);
            $stmt->execute();
            $result = $stmt->fetch();
            return $result;
        } catch (PDOException $e) {
            $e->getMessage();

            return false;
        }
    }

    //it will list the attendees
    public function getAttendeeDetails($id)
    {

        try {
            $sql = "select * from attendee a inner join specilities s on a.attendee_speciality=s.speciality_id where a.attendee_id=:id";
            $stmt = $this->db->prepare($sql);
            $stmt->bindparam(':id', $id);
            $stmt->execute();
            $result = $stmt->fetch();
            return $result;
        } catch (PDOException $e) {
            $e->getMessage();

            return false;
        }
    }

    public function deleteAttendee($id)
    {
        try {
            $sql = "delete from attendee where attendee_id=:id";
            $stmt = $this->db->prepare($sql);
            $stmt->bindparam(':id', $id);
            $result = $stmt->execute();
            $result = $stmt->fetch();
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
}
