<?php

class Model
{
    /**
     * @param object $db A PDO database connection
     */
    function __construct($db)
    {
        try {
            $this->db = $db;
        } catch (PDOException $e) {
            exit('Database connection could not be established.');
        }
    }

    function checkUserLogin($email, $password){
        $password = sha1($password);
        $sql = "SELECT * FROM user where email='$email' and password='$password'";
        $query = $this->db->prepare($sql);
        $query->execute();
        return ($query->fetchAll());
    }

    function addLead($counsellor_id, $first_name, $last_name, $contact, $email, $address, $district, $next_follow, $interested_level, $interested_faculty, $interested_semester, $comments){
        $date = date('Y-m-d');
        $sql = "INSERT INTO leads(counsellor_id, first_name, last_name, contact_no, email, address, district, follow_up_date, interested_level, interested_semester, interested_faculty, comments, type, status, date) VALUES ($counsellor_id, '$first_name', '$last_name', '$contact', '$email', '$address', '$district', '$next_follow', '$interested_level', '$interested_semester', '$interested_faculty', '$comments','lead','active','$date')";
       
        $query = $this->db->prepare($sql);

        // useful for debugging: you can see the SQL behind above construction by using:
        // echo '[ PDO DEBUG ]: ' . Helper::debugPDO($sql, $parameters);  exit();

        

        if($query->execute()){
            $last_insert_id = $this->db->lastInsertId();

            $sql = "INSERT INTO leads_feedback(Leadsid) VALUES ('$last_insert_id')";       
            $query = $this->db->prepare($sql);
            $query->execute();
            
            return true;
        }else{
            return false;
        }
    }

    function getLeadFeedBackData($lead_id){
        $sql = "SELECT * FROM leads_feedback where Leadsid = $lead_id";
       
        $query = $this->db->prepare($sql);

        // useful for debugging: you can see the SQL behind above construction by using:
        // echo '[ PDO DEBUG ]: ' . Helper::debugPDO($sql, $parameters);  exit();

        if($query->execute()){
            return $query->fetch(PDO::FETCH_ASSOC);
        }else{
            return false;
        }
    }

    function getAllLeads(){
        $sql = "SELECT * FROM leads";
        $query = $this->db->prepare($sql);
        $query->execute();

        // fetchAll() is the PDO method that gets all result rows, here in object-style because we defined this in
        // core/controller.php! If you prefer to get an associative array as the result, then do
        // $query->fetchAll(PDO::FETCH_ASSOC); or change core/controller.php's PDO options to
        // $options = array(PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC ...
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    function getLeadByID($lead_id){
        $sql = "SELECT * FROM leads where id = $lead_id";
        $query = $this->db->prepare($sql);
        $query->execute();

        // fetchAll() is the PDO method that gets all result rows, here in object-style because we defined this in
        // core/controller.php! If you prefer to get an associative array as the result, then do
        // $query->fetchAll(PDO::FETCH_ASSOC); or change core/controller.php's PDO options to
        // $options = array(PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC ...
        return $query->fetch(PDO::FETCH_ASSOC);
    }

    function getLeadByIDAndCounsellor($counsellor_id, $lead_id){
        //die($lead_id);
        $sql = "SELECT * FROM leads where id = $lead_id and counsellor_id=$counsellor_id";
        $query = $this->db->prepare($sql);
        if($query->execute()){
            return $query->fetch(PDO::FETCH_ASSOC);
        }else{
            return false;
        }

        // fetchAll() is the PDO method that gets all result rows, here in object-style because we defined this in
        // core/controller.php! If you prefer to get an associative array as the result, then do
        // $query->fetchAll(PDO::FETCH_ASSOC); or change core/controller.php's PDO options to
        // $options = array(PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC ...
    }

    function getAllLeadsForCounsellor($counsellor_id){
       

        $sql = "SELECT * FROM leads where status!='deleted' and counsellor_id=$counsellor_id";
        $query = $this->db->prepare($sql);
        $query->execute();

        // fetchAll() is the PDO method that gets all result rows, here in object-style because we defined this in
        // core/controller.php! If you prefer to get an associative array as the result, then do
        // $query->fetchAll(PDO::FETCH_ASSOC); or change core/controller.php's PDO options to
        // $options = array(PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC ...
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    function getAllFollowUpForCounsellor($counsellor_id){
        $date = date('Y-m-d');
        $sql = "SELECT * FROM leads where status!='deleted' and counsellor_id=$counsellor_id and follow_up_date='".$date."'";
        $query = $this->db->prepare($sql);
        $query->execute();

        // fetchAll() is the PDO method that gets all result rows, here in object-style because we defined this in
        // core/controller.php! If you prefer to get an associative array as the result, then do
        // $query->fetchAll(PDO::FETCH_ASSOC); or change core/controller.php's PDO options to
        // $options = array(PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC ...
        return $query->fetchAll(PDO::FETCH_ASSOC);
    } 

    function getActiveFollowUpForCounsellor($counsellor_id){
        $date = date('Y-m-d');
        $sql = "SELECT * FROM leads where status!='deleted' and counsellor_id=$counsellor_id and status='active' and follow_up_date='".$date."' ";
        $query = $this->db->prepare($sql);
        $query->execute();

        // fetchAll() is the PDO method that gets all result rows, here in object-style because we defined this in
        // core/controller.php! If you prefer to get an associative array as the result, then do
        // $query->fetchAll(PDO::FETCH_ASSOC); or change core/controller.php's PDO options to
        // $options = array(PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC ...
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    function countAllFollowupForCounsellor($counsellor_id)
    {
        $date = date('Y-m-d');
        $sql = "SELECT COUNT(id) AS countLeads FROM leads where status!='deleted' and counsellor_id=$counsellor_id and follow_up_date='".$date."'";
        $query = $this->db->prepare($sql);
        $query->execute();

        // fetch() is the PDO method that get exactly one result
        return $query->fetch()->countLeads;
    }

    function countAllLeadsForCounsellor($counsellor_id)
    {
        $sql = "SELECT COUNT(id) AS countLeads FROM leads where status!='deleted' and counsellor_id=$counsellor_id";
        $query = $this->db->prepare($sql);
        $query->execute();

        // fetch() is the PDO method that get exactly one result
        return $query->fetch()->countLeads;
    }

    function getCounsellor($counsellor_id){
        $sql = "SELECT * FROM user WHERE id = $counsellor_id";
        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetch(PDO::FETCH_ASSOC);
    }

    function updateLead($lead_id, $first_name, $last_name, $contact, $email, $address, $district, $follow_up_date, $interested_level, $interested_semester, $interested_faculty, $comments){
        $sql = "UPDATE leads SET first_name='$first_name',last_name='$last_name',contact_no='$contact',email='$email',address='$address',district='$district',follow_up_date='$follow_up_date',interested_level='$interested_level',interested_semester='$interested_semester',interested_faculty='$interested_faculty',comments='$comments' WHERE id = $lead_id";
        $query = $this->db->prepare($sql);
        /*echo $sql;
        die();*/
        if($query->execute()){
            return true;
        }else{
            return false;
        }

    }
    function updateUser($user_id, $name, $contact, $email, $address, $role, $password){
        $password = sha1($password);
        $sql = "UPDATE user SET name='$name',contact_no='$contact',email='$email',address='$address', role='$role', password='$password' WHERE id = $user_id";
        $query = $this->db->prepare($sql);
        /*echo $sql;
        die();*/
        if($query->execute()){
            return true;
        }else{
            return false;
        }

    }

    function updateStatus($action, $lead_id){
        $sql = "UPDATE leads SET status = '$action' WHERE id = $lead_id";
        //die($sql);
        $query = $this->db->prepare($sql);
        if($query->execute()){
            return true;
        }else{
            return false;
        }
    }

    function change_Userstatus($action, $user_id){
        $sql = "UPDATE user SET status = '$action' WHERE id = $user_id";
        //die($sql);
        $query = $this->db->prepare($sql);
        if($query->execute()){
            return true;
        }else{
            return false;
        }
    }

    function updateFollowUpDate($lead_id,$next_follow_date){
        $sql = "UPDATE leads SET follow_up_date = '$next_follow_date' WHERE id = $lead_id";
        $query = $this->db->prepare($sql);
        if($query->execute()){
            return true;
        }else{
            return false;
        }
    }

    function updateFollowUpCountAndFeedback($followup_id, $feedback){
        $sql = "UPDATE leads_feedback SET  feedback_message= '$feedback', follow_up_count = follow_up_count+1 WHERE id = $followup_id";
        $query = $this->db->prepare($sql);
        if($query->execute()){
            return true;
        }else{
            return false;
        }
    }

    function changeType($action, $lead_id){
        $sql = "UPDATE leads SET type = 'Student' WHERE id = $lead_id";
        $query = $this->db->prepare($sql);
        if($query->execute()){
            return true;
        }else{
            return false;
        }
    }

    function changeType2Lead($action, $lead_id){
        $sql = "UPDATE leads SET type = 'Lead' WHERE id = $lead_id";
        $query = $this->db->prepare($sql);
        if($query->execute()){
            return true;
        }else{
            return false;
        }
    }

    function checkPasswordForProfile($user_id, $password){
        //die($user_id.$password);
        $password = sha1($password);
        $sql = "SELECT * FROM user where id='$user_id' and password='$password'";
        $query = $this->db->prepare($sql);
        $query->execute();
        if (sizeof($query->fetchAll())) {
            return true;
        }else{
            return false;
        }        
    }

    function checkEmail($email){
        $sql = "SELECT * FROM user where email='$email'";
        $query = $this->db->prepare($sql);
        $query->execute();
        if (sizeof($query->fetchAll())) {
            return true;
        }else{
            return false;
        }        
    }

    function update_profile($user_id, $name, $address, $contact, $email){
        $sql = "UPDATE user SET name='$name',address='$address',contact_no='$contact',email='$email' WHERE id = $user_id";
        $query = $this->db->prepare($sql);
        if($query->execute()){
            return true;
        }else{
            return false;
        }
    }

    function update_password($user_id, $password){
        $password = sha1($password);
        $sql = "UPDATE user SET password='$password' WHERE id = $user_id";
        $query = $this->db->prepare($sql);
        if($query->execute()){
            return true;
        }else{
            return false;
        }
    }

    function addUser($name, $contact, $email, $address, $role, $password){
        $password = sha1($password);
        $sql = "INSERT INTO user(name, contact_no, email, address, role, password, status) VALUES ('$name', '$contact', '$email', '$address', '$role', '$password', 'active')";
       
        $query = $this->db->prepare($sql);

        // useful for debugging: you can see the SQL behind above construction by using:
        // echo '[ PDO DEBUG ]: ' . Helper::debugPDO($sql, $parameters);  exit();

        if($query->execute()){
            return true;
        }else{
            return false;
        }
    }

    function getAllUsers(){
        $sql = "SELECT * FROM user";
        $query = $this->db->prepare($sql);
        $query->execute();

        // fetchAll() is the PDO method that gets all result rows, here in object-style because we defined this in
        // core/controller.php! If you prefer to get an associative array as the result, then do
        // $query->fetchAll(PDO::FETCH_ASSOC); or change core/controller.php's PDO options to
        // $options = array(PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC ...
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
}
