<?php

class Manager extends Controller
{

    function index(){
        if (!isset($_SESSION["loggedin_user"])) {
            $_SESSION["flash-msg"] = "Can't access that. Nice try!";
            $_SESSION["flash-type"] = "error";

            header('location: ' . URL);
        }

        
        $active = "skin-red sidebar-mini";
        $active_menu = "dashboard";
        $loggedin_user = $_SESSION["loggedin_user"];

        $countLead = sizeof($this->model->getAllLeads());
        $countUsers = sizeof($this->model->getAllUsers());
        
        require APP . 'view/_templates/header.php';
        require APP . 'view/_templates/top_menu.php';
        require APP . 'view/_templates/side_menu.php';
        require APP . 'view/manager/dashboard.php';
        require APP . 'view/_templates/footer.php';
    }

    function add_user(){
        if (!isset($_SESSION["loggedin_user"]) ) {
            $_SESSION["flash-msg"] = "Can't access that. Nice try!";
            $_SESSION["flash-type"] = "error";

            return header('location: ' . URL);
        }

        if ($_SESSION["loggedin_user"]["user_role"]!="Manager") {
            $_SESSION["flash-msg"] = "Can't access that. Nice try!";
            $_SESSION["flash-type"] = "error";

            return header('location: ' . URL);
        }

        $edit_user = false;
        
        $active_menu = "add_counsellor";
        $loggedin_user = $_SESSION["loggedin_user"];

        $countLead = sizeof($this->model->getAllLeads());

        $countUsers = sizeof($this->model->getAllUsers());
        require APP . 'view/_templates/header.php';
        require APP . 'view/_templates/top_menu.php';
        require APP . 'view/_templates/side_menu.php';
        require APP . 'view/manager/add_user.php';
        require APP . 'view/_templates/footer.php';

    }

    function do_add_user(){
        if (!isset($_SESSION["loggedin_user"]) ) {
            $_SESSION["flash-msg"] = "Can't access that. Nice try!";
            $_SESSION["flash-type"] = "error";

            return header('location: ' . URL);
        }

        if ($_SESSION["loggedin_user"]["user_role"]!="Manager") {
            $_SESSION["flash-msg"] = "Can't access that. Nice try!";
            $_SESSION["flash-type"] = "error";

            return header('location: ' . URL);
        }

        if ($_POST["password"]=="") {
            $_SESSION["flash-msg"] = "Please enter your new password.";
            $_SESSION["flash-type"] = "error";

            return header('location: ' . URL."manager/add_user");
        }

        if ($_POST["password"]!=$_POST["re_password"]) {
            $_SESSION["flash-msg"] = "Password and re enter password is not matched.";
            $_SESSION["flash-type"] = "error";

            return header('location: ' . URL."manager/add_user");
        }

        $insert_user = $this->model->addUser(
                                            $_POST['name'], 
                                            $_POST['contact'],
                                            $_POST['email'],
                                            $_POST['address'],
                                            $_POST['role'],
                                            $_POST['password']
                                        );

        if($insert_user){
            $_SESSION["flash-msg"] = "User added successfully!";
            $_SESSION["flash-type"] = "success";
            
        }else{
            $_SESSION["flash-msg"] = "Can't perform the requested action right now. Please try again later.";
            $_SESSION["flash-type"] = "error";
        }
            

        return header('location: ' . URL."manager/add_user");

    }

    function list_users(){
        if (!isset($_SESSION["loggedin_user"]) ) {
            $_SESSION["flash-msg"] = "Can't access that. Nice try!";
            $_SESSION["flash-type"] = "error";

            return header('location: ' . URL);
        }

        if ($_SESSION["loggedin_user"]["user_role"]!="Manager") {
            $_SESSION["flash-msg"] = "Can't access that. Nice try!";
            $_SESSION["flash-type"] = "error";

            return header('location: ' . URL);
        }

        $active_menu = "list_counsellor";
        $loggedin_user = $_SESSION["loggedin_user"];


        $countLead = sizeof($this->model->getAllLeads());


        $users_detail = $this->model->getAllUsers();
        $countUsers = sizeof($users_detail);

        foreach ($users_detail as $key => $users) {
            $users_detail[$key]["no_of_leads"] =  sizeof($this->model->getAllLeadsForCounsellor($users["id"]));
        }

        /*print_r($users_detail);*/

        require APP . 'view/_templates/header.php';
        require APP . 'view/_templates/top_menu.php';
        require APP . 'view/_templates/side_menu.php';
        require APP . 'view/manager/list_users.php';
        require APP . 'view/_templates/footer.php';
    }


    function edit_user($user_id){

        if (!isset($_SESSION["loggedin_user"])) {
            $_SESSION["flash-msg"] = "Can't access that. Nice try!";
            $_SESSION["flash-type"] = "error";

            return header('location: ' . URL);
        }

        if ($_SESSION["loggedin_user"]["user_role"]!="Manager") {
            $_SESSION["flash-msg"] = "Can't access that. Nice try!";
            $_SESSION["flash-type"] = "error";

            return header('location: ' . URL);
        }

        $active = "skin-green sidebar-mini";
        $active_menu = "add_user";
        $loggedin_user = $_SESSION["loggedin_user"];
        $countLead = sizeof($this->model->getAllLeads());
        $countUsers = sizeof($this->model->getAllUsers());

        $user_detail = $this->model->getCounsellor($user_id);

        //print_r($user_detail);
        $edit_user = true;
        require APP . 'view/_templates/header.php';
        require APP . 'view/_templates/top_menu.php';
        require APP . 'view/_templates/side_menu.php';
        require APP . 'view/manager/add_user.php';
        require APP . 'view/_templates/footer.php';
    }


    function update_user($user_id){
        /*echo $user_id;
        print_r($_POST);
        die();*/

        if ($_SESSION["loggedin_user"]["user_role"]!="Manager") {
            $_SESSION["flash-msg"] = "Can't access that. Nice try!";
            $_SESSION["flash-type"] = "error";

            return header('location: ' . URL);
        }

         if ($_POST["password"]=="") {
            $_SESSION["flash-msg"] = "Please enter the password.";
            $_SESSION["flash-type"] = "error";

            return header('location: ' . URL .'manager/edit_user/'.$user_id );
        }

        if ($_POST["password"]!=$_POST["re_password"]) {
            $_SESSION["flash-msg"] = "Password and re enter password is not matched.";
            $_SESSION["flash-type"] = "error";

            return header('location: ' . URL .'manager/edit_user/'.$user_id );
        }


        $update_user = $this->model->updateUser($user_id, 
                                            $_POST['name'], 
                                            $_POST['contact'],
                                            $_POST['email'],
                                            $_POST['address'],
                                            $_POST['role'],
                                            $_POST['password']);

        if($update_user){
            $_SESSION["flash-msg"] = "Changes saved successfully!";
            $_SESSION["flash-type"] = "success";
            
        }else{
            $_SESSION["flash-msg"] = "Can't perform the requested action right now. Please try again later.";
            $_SESSION["flash-type"] = "error";
        }

        return header('location: ' . URL .'manager/edit_user/'.$user_id );
    }


    function change_status($action, $user_id){
        //die($action);
        $resp = $this->model->change_Userstatus($action, $user_id);
            
        
        if ($resp) {
            $_SESSION["flash-msg"] = "Status updated successfully.";
            $_SESSION["flash-type"] = "success";
        }else{
            $_SESSION["flash-msg"] = "Can't perform the requested action right now. Please try again later.";
            $_SESSION["flash-type"] = "error";
        }

        return header('location: ' . URL .'manager/list_users' );
    }
    
}
