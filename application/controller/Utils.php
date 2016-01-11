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
            header('location: ' . URL);
        }
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



        /*$active = "skin-blue sidebar-mini";

        require APP . 'view/_templates/header.php';
        require APP . 'view/_templates/top_menu.php';
        require APP . 'view/_templates/side_menu.php';
        require APP . 'view/utils/dashboard.php';
        require APP . 'view/_templates/footer.php';*/
    }

    function do_logout(){
        session_unset();

        $_SESSION["flash-msg"] = "Logout Successful";
        $_SESSION["flash-type"] = "success";

        header('location: ' . URL);
        
    }

    function get_user_data(){

    }

    function get_user_privileges(){

    }
}
