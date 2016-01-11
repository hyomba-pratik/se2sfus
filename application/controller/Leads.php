<?php

class Leads extends Controller
{
    function add_leads(){

        if (!isset($_SESSION["loggedin_user"])) {
            $_SESSION["flash-msg"] = "Can't access that. Nice try!";
            $_SESSION["flash-type"] = "error";

            return header('location: ' . URL);
        }

        $active = "skin-green sidebar-mini";
        $active_menu = "add_leads";
        $loggedin_user = $_SESSION["loggedin_user"];
        $countTodayLeads = $this->model->countAllFollowupForCounsellor($loggedin_user["user_id"]);
        $countLead = $this->model->countAllLeadsForCounsellor($loggedin_user["user_id"]);
        $leads_detail_today = $this->model->getAllFollowUpForCounsellor($loggedin_user["user_id"]);

        require APP . 'view/_templates/header.php';
        require APP . 'view/_templates/top_menu.php';
        require APP . 'view/_templates/side_menu.php';
        require APP . 'view/leads/add_leads.php';
        require APP . 'view/_templates/footer.php';
    }

    function do_add_lead(){
        //print_r($_POST);
        $loggedin_user = $_SESSION["loggedin_user"];
        $counsellor_id = $loggedin_user["user_id"];

        $next_follow_date = date('Y-m-d', strtotime("+".$_POST["next_follow"]." days"));
        //echo $followupdate;
        $insert_student = $this->model->addLead(
                                            $counsellor_id,
                                            $_POST['first_name'], 
                                            $_POST['last_name'],
                                            $_POST['contact'],
                                            $_POST['email'],
                                            $_POST['address'],
                                            $_POST['district'],
                                            $next_follow_date,
                                            $_POST['interested_level'],
                                            $_POST['interested_faculty'],
                                            $_POST['interested_semester'],
                                            $_POST['comments']
                                        );

        if($insert_student){
            $_SESSION["flash-msg"] = "Lead added successfully!";
            $_SESSION["flash-type"] = "success";
            
        }else{
            $_SESSION["flash-msg"] = "Can't perform the requested action right now. Please try again later.";
            $_SESSION["flash-type"] = "error";
        }

        return header('location: ' . URL .'leads/list_leads' );
    }

    function edit_leads($lead_id){

    }

    function change_status($action, $lead_id){
        if ($action=="delete") {
            $resp = $this->model->deleteLead($action, $lead_id);
            $msg = "Lead deleted successfully.";
        }else if($action=="student"){
            $resp = $this->model->changeType($action, $lead_id);    
            $msg = "Lead converted to student successfully.";
        }else if($action=="lead"){
            $resp = $this->model->changeType2Lead($action, $lead_id);    
            $msg = "Student converted to lead successfully.";
        }
        
        if ($resp) {
            $_SESSION["flash-msg"] = $msg;
            $_SESSION["flash-type"] = "success";
        }else{
            $_SESSION["flash-msg"] = "Can't perform the requested action right now. Please try again later.";
            $_SESSION["flash-type"] = "error";
        }

        return header('location: ' . URL .'leads/list_leads' );
    }

    function update_follow_up_date($lead_id){

    }

    function list_leads(){
        if (!isset($_SESSION["loggedin_user"])) {
            $_SESSION["flash-msg"] = "Can't access that. Nice try!";
            $_SESSION["flash-type"] = "error";

            return header('location: ' . URL);
        }

        
        $active = "skin-green sidebar-mini";
        $active_menu = "list_leads";
        $loggedin_user = $_SESSION["loggedin_user"];

        if ($loggedin_user["user_role"]=="Counsellor") {
            $leads_detail = $this->model->getAllLeadsForCounsellor($loggedin_user["user_id"]);
            $countTodayLeads = $this->model->countAllFollowupForCounsellor($loggedin_user["user_id"]);
            $countLead = $this->model->countAllLeadsForCounsellor($loggedin_user["user_id"]);       
            $leads_detail_today = $this->model->getAllFollowUpForCounsellor($loggedin_user["user_id"]);
        }else{
            $leads_detail = $this->model->getAllLeads();
            $countTodayLeads = $this->model->countAllFollowupForCounsellor($loggedin_user["user_id"]);
            $countLead = sizeof($leads_detail);
            $leads_detail_today = $this->model->getAllFollowUpForCounsellor($loggedin_user["user_id"]);
        }
        
        
        
        //print_r($leads_detail);
        
        foreach ($leads_detail as $key => $lead) {
            $leads_detail[$key]["counsellor_detail"] = $this->model->getCounsellor($lead["counsellor_id"]);
        }

        /*print_r($leads_detail);
        die();*/

        require APP . 'view/_templates/header.php';
        require APP . 'view/_templates/top_menu.php';
        require APP . 'view/_templates/side_menu.php';
        require APP . 'view/leads/list_leads.php';
        require APP . 'view/_templates/footer.php';
    }

    function todays_followup(){
        if (!isset($_SESSION["loggedin_user"])) {
            $_SESSION["flash-msg"] = "Can't access that. Nice try!";
            $_SESSION["flash-type"] = "error";

            return header('location: ' . URL);
        }

        
        $active = "skin-green sidebar-mini";
        $active_menu = "followups";
        $loggedin_user = $_SESSION["loggedin_user"];
        $leads_detail_today = $this->model->getAllFollowUpForCounsellor($loggedin_user["user_id"]);
        $countTodayLeads = $this->model->countAllFollowupForCounsellor($loggedin_user["user_id"]);
        $countLead = $this->model->countAllLeadsForCounsellor($loggedin_user["user_id"]);
        //print_r($leads_detail);
        
        foreach ($leads_detail_today as $key => $lead) {
            $leads_detail[$key]["counsellor_detail"] = $this->model->getCounsellor($lead["counsellor_id"]);
        }

        /*print_r($leads_detail);
        die();*/

        require APP . 'view/_templates/header.php';
        require APP . 'view/_templates/top_menu.php';
        require APP . 'view/_templates/side_menu.php';
        require APP . 'view/leads/todays_followup.php';
        require APP . 'view/_templates/footer.php';
    }

    function list_leads_by_counsellor(){
        
    }
}
