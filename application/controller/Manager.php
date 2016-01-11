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

        $countLead = $this->model->countAllLeadsForCounsellor($loggedin_user["user_id"]);
        $countTodayLeads = $this->model->countAllFollowupForCounsellor($loggedin_user["user_id"]);
        $leads_detail_today = $this->model->getAllFollowUpForCounsellor($loggedin_user["user_id"]);
        require APP . 'view/_templates/header.php';
        require APP . 'view/_templates/top_menu.php';
        require APP . 'view/_templates/side_menu.php';
        require APP . 'view/manager/dashboard.php';
        require APP . 'view/_templates/footer.php';
    }

    
}
