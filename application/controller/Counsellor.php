<?php

class Counsellor extends Controller
{

    function index(){
        if (!isset($_SESSION["loggedin_user"])) {
            $_SESSION["flash-msg"] = "Can't access that. Nice try!";
            $_SESSION["flash-type"] = "error";

            header('location: ' . URL);
        }

        
        $active = "skin-green sidebar-mini";
        $active_menu = "dashboard";
        $loggedin_user = $_SESSION["loggedin_user"];

        $countLead = $this->model->countAllLeadsForCounsellor($loggedin_user["user_id"]);
        $countTodayLeads = $this->model->countAllFollowupForCounsellor($loggedin_user["user_id"]);
        $leads_detail_today = $this->model->getAllFollowUpForCounsellor($loggedin_user["user_id"]);
        require APP . 'view/_templates/header.php';
        require APP . 'view/_templates/top_menu.php';
        require APP . 'view/_templates/side_menu.php';
        require APP . 'view/counsellor/dashboard.php';
        require APP . 'view/_templates/footer.php';
    }

    function profile(){
        if (!isset($_SESSION["loggedin_user"])) {
            $_SESSION["flash-msg"] = "Can't access that. Nice try!";
            $_SESSION["flash-type"] = "error";

            header('location: ' . URL);
        }

        
        $active = "skin-green sidebar-mini";
        $active_menu = "profile";
        $loggedin_user = $_SESSION["loggedin_user"];

        $countLead = $this->model->countAllLeadsForCounsellor($loggedin_user["user_id"]);
        $countTodayLeads = $this->model->countAllFollowupForCounsellor($loggedin_user["user_id"]);
        $leads_detail_today = $this->model->getAllFollowUpForCounsellor($loggedin_user["user_id"]);
        $profile_detail = $this->model->getCounsellor($loggedin_user["user_id"]);
        //print_r($loggedin_user);
        //die();
        require APP . 'view/_templates/header.php';
        require APP . 'view/_templates/top_menu.php';
        require APP . 'view/_templates/side_menu.php';
        require APP . 'view/counsellor/profile.php';
        require APP . 'view/_templates/footer.php';

    }

    function update_profile(){
        if ($_POST["password"]=="") {
            $_SESSION["flash-msg"] = "Please enter your current password.";
            $_SESSION["flash-type"] = "error";

            return header('location: ' . URL."counsellor/profile");
        }

        $loggedin_user = $_SESSION["loggedin_user"];
        $checkpassword = $this->model->checkPasswordForProfile($loggedin_user["user_id"], $_POST["password"]);
        if (!$checkpassword) {
            $_SESSION["flash-msg"] = "Please enter correct password to save the changes.";
            $_SESSION["flash-type"] = "error";

            return header('location: ' . URL."counsellor/profile");
        }

        if ($loggedin_user["user_email"]!=$_POST["email"]) {
            $checkEmail = $this->model->checkEmail($_POST["email"]);
            if ($checkEmail) {
                $_SESSION["flash-msg"] = "This email is already taken. Please try another email.";
                $_SESSION["flash-type"] = "error";

                return header('location: ' . URL."counsellor/profile");
            }
        }

        $savechanges = $this->model->update_profile($loggedin_user["user_id"], $_POST["name"], $_POST["address"], $_POST["contact_no"], $_POST["email"]);
        if ($savechanges) {
            $_SESSION["flash-msg"] = "Profile updated succesfully.";
            $_SESSION["flash-type"] = "success";
            $loggedin_user_update = array(
                    'user_id' => $loggedin_user["user_id"], 
                    'user_email' => $_POST["email"], 
                    'user_name' => $_POST["name"], 
                    'user_role' => $loggedin_user["user_role"], 
                );

            $_SESSION["loggedin_user"] = $loggedin_user_update;

        }else{
            $_SESSION["flash-msg"] = "Can't perform the requested action right now. Please try again later.";
            $_SESSION["flash-type"] = "error";
        }
        return header('location: ' . URL."counsellor/profile");

    }

    function update_password(){
        if ($_POST["new_password"]=="") {
            $_SESSION["flash-msg"] = "Please enter your new password.";
            $_SESSION["flash-type"] = "error";

            return header('location: ' . URL."counsellor/profile");
        }

        if ($_POST["cur_password"]=="") {
            $_SESSION["flash-msg"] = "Please enter your current password.";
            $_SESSION["flash-type"] = "error";

            return header('location: ' . URL."counsellor/profile");
        }

        if ($_POST["new_password"]!=$_POST["re_new_password"]) {
            $_SESSION["flash-msg"] = "New password and re enter new password is not matched.";
            $_SESSION["flash-type"] = "error";

            return header('location: ' . URL."counsellor/profile");
        }

        $loggedin_user = $_SESSION["loggedin_user"];
        $checkpassword = $this->model->checkPasswordForProfile($loggedin_user["user_id"], $_POST["cur_password"]);
        if (!$checkpassword) {
            $_SESSION["flash-msg"] = "Please enter correct password to change the password.";
            $_SESSION["flash-type"] = "error";

            return header('location: ' . URL."counsellor/profile");
        }


        $savechanges = $this->model->update_password($loggedin_user["user_id"], $_POST["new_password"]);
        if ($savechanges) {
            $_SESSION["flash-msg"] = "Password updated succesfully.";
            $_SESSION["flash-type"] = "success";
        }else{
            $_SESSION["flash-msg"] = "Can't perform the requested action right now. Please try again later.";
            $_SESSION["flash-type"] = "error";
        }
        return header('location: ' . URL."counsellor/profile");

    }

    function add_counsellor(){


    }

    function list_counsellor(){

    }

    function edit_counsellor($counsellor_id){

    }

    function change_status(){

    }

    function delete_counsellor($counsellor_id){

    }

    
}
