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
        $leads_detail_today = $this->model->getActiveFollowUpForCounsellor($loggedin_user["user_id"]);
        //print_r($leads_detail_today);

        $countTodayLeads = sizeof($leads_detail_today);

        
        /*
        To check all the defined vars.
        print_r((get_defined_vars()));
        die();
        */

        require APP . 'view/_templates/header.php';
        require APP . 'view/_templates/top_menu.php';
        require APP . 'view/_templates/side_menu.php';
        require APP . 'view/counsellor/dashboard.php';
        require APP . 'view/_templates/footer.php';
    }
    
}
