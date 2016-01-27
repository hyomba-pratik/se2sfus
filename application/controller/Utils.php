<?php
class Utils extends Controller
{

	function index(){

        if (isset($_SESSION["loggedin_user"])) {
            
            header('location: ' . URL . 'utils/dashboard');
        }
        
        $active = "login-page";

        require APP . 'view/_templates/header.php';
        require APP . 'view/utils/login.php';
        require APP . 'view/_templates/footer.php';
	}

    function do_login(){
        $checkuser = $this->model->checkUserLogin($_POST['email'], $_POST['password']);
       /* print_r($checkuser[0]->status);
        die();*/
        if (isset($checkuser[0]->id) && sizeof($checkuser)>0 ) {

            if ($checkuser[0]->status!="active") {
                $_SESSION["flash-msg"] = "Your profile is deactivated. Please contact admin.";
                $_SESSION["flash-type"] = "warning";
                return header('location: ' . URL);
            }

            $loggedin_user = array(
                                'user_id' => $checkuser[0]->id, 
                                'user_email' => $checkuser[0]->email, 
                                'user_name' => $checkuser[0]->name, 
                                'user_role' => $checkuser[0]->role, 
                            );

            $_SESSION["loggedin_user"] = $loggedin_user;
            $_SESSION["flash-msg"] = "Login Successful";
            $_SESSION["flash-type"] = "success";


            
            if ($checkuser[0]->role=="Counsellor") {
                return header('location: ' . URL . 'counsellor');
            }else if($checkuser[0]->role=="Manager"){
                return header('location: ' . URL . 'manager');
            }else{
                $_SESSION["flash-msg"] = "No role defined for you. Please contact admin.";
                $_SESSION["flash-type"] = "warning";
                return header('location: ' . URL);
            }
            
        }else{
            $_SESSION["flash-msg"] = "Invalid email or password. Please enter correct email and password!";
            $_SESSION["flash-type"] = "error";
            return header('location: ' . URL);
        }

        /*//To check all the defined vars.
        print_r($_POST);
        print_r((get_defined_vars()));
        die();*/
    }

    function dashboard(){
        /*print_r($_SESSION["loggedin_user"]);
        echo isset($_SESSION["loggedin_user"]);
        die();*/
        if (!isset($_SESSION["loggedin_user"])) {
            $_SESSION["flash-msg"] = "Can't access that. Nice try!";
            $_SESSION["flash-type"] = "error";

            header('location: ' . URL);
        }

        $loggedin_user = $_SESSION["loggedin_user"];

        if ($loggedin_user["user_role"]=="Counsellor") {
            return header('location: ' . URL . 'counsellor');
        }else if($loggedin_user["user_role"]=="Manager"){
            return header('location: ' . URL . 'manager');
        }else{
            $_SESSION["flash-msg"] = "No role defined for you. Please contact admin.";
            $_SESSION["flash-type"] = "warning";
            return header('location: ' . URL);
        }

    }

    function do_logout(){
        session_unset();

        $_SESSION["flash-msg"] = "Logout Successful";
        $_SESSION["flash-type"] = "success";

        header('location: ' . URL);
        
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
        $countUsers = sizeof($this->model->getAllUsers());
        $countLead = $this->model->countAllLeadsForCounsellor($loggedin_user["user_id"]);
        $leads_detail_today = $this->model->getActiveFollowUpForCounsellor($loggedin_user["user_id"]);
        $countTodayLeads = sizeof($leads_detail_today);
        $profile_detail = $this->model->getCounsellor($loggedin_user["user_id"]);
        //print_r($loggedin_user);
        //die();
        require APP . 'view/_templates/header.php';
        require APP . 'view/_templates/top_menu.php';
        require APP . 'view/_templates/side_menu.php';
        require APP . 'view/utils/profile.php';
        require APP . 'view/_templates/footer.php';

    }

    function update_profile(){
        if ($_POST["password"]=="") {
            $_SESSION["flash-msg"] = "Please enter your current password.";
            $_SESSION["flash-type"] = "error";

            return header('location: ' . URL."utils/profile");
        }

        $loggedin_user = $_SESSION["loggedin_user"];
        $checkpassword = $this->model->checkPasswordForProfile($loggedin_user["user_id"], $_POST["password"]);
        if (!$checkpassword) {
            $_SESSION["flash-msg"] = "Please enter correct password to save the changes.";
            $_SESSION["flash-type"] = "error";

            return header('location: ' . URL."utils/profile");
        }

        if ($loggedin_user["user_email"]!=$_POST["email"]) {
            $checkEmail = $this->model->checkEmail($_POST["email"]);
            if ($checkEmail) {
                $_SESSION["flash-msg"] = "This email is already taken. Please try another email.";
                $_SESSION["flash-type"] = "error";

                return header('location: ' . URL."utils/profile");
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

        /*//To check all the defined vars.
        print_r($_POST);
        print_r((get_defined_vars()));
        die();*/
        return header('location: ' . URL."utils/profile");

    }

    function update_password(){
        if ($_POST["new_password"]=="") {
            $_SESSION["flash-msg"] = "Please enter your new password.";
            $_SESSION["flash-type"] = "error";

            return header('location: ' . URL."utils/profile");
        }

        if ($_POST["cur_password"]=="") {
            $_SESSION["flash-msg"] = "Please enter your current password.";
            $_SESSION["flash-type"] = "error";

            return header('location: ' . URL."utils/profile");
        }

        if ($_POST["new_password"]!=$_POST["re_new_password"]) {
            $_SESSION["flash-msg"] = "New password and re enter new password is not matched.";
            $_SESSION["flash-type"] = "error";

            return header('location: ' . URL."utils/profile");
        }

        $loggedin_user = $_SESSION["loggedin_user"];
        $checkpassword = $this->model->checkPasswordForProfile($loggedin_user["user_id"], $_POST["cur_password"]);
        if (!$checkpassword) {
            $_SESSION["flash-msg"] = "Please enter correct password to change the password.";
            $_SESSION["flash-type"] = "error";

            return header('location: ' . URL."utils/profile");
        }


        $savechanges = $this->model->update_password($loggedin_user["user_id"], $_POST["new_password"]);
        if ($savechanges) {
            $_SESSION["flash-msg"] = "Password updated succesfully.";
            $_SESSION["flash-type"] = "success";
        }else{
            $_SESSION["flash-msg"] = "Can't perform the requested action right now. Please try again later.";
            $_SESSION["flash-type"] = "error";
        }

         /*//To check all the defined vars.
        print_r($_POST);
        print_r((get_defined_vars()));
        die();*/

        return header('location: ' . URL."utils/profile");

    }

   
}
