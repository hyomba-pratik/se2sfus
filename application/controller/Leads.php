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
        $leads_detail_today = $this->model->getActiveFollowUpForCounsellor($loggedin_user["user_id"]);
        $countTodayLeads = sizeof($leads_detail_today);
        $countLead = $this->model->countAllLeadsForCounsellor($loggedin_user["user_id"]);
        $edit_lead = false;
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

    
    function change_status($action, $lead_id){
        //die($action);
        if ($action=="delete") {
            $resp = $this->model->updateStatus("deleted", $lead_id);
            $msg = "Lead deleted successfully.";
        }else if($action=="postpone"){
            $resp = $this->model->updateStatus("postponed", $lead_id);
            $msg = "Lead postponed for next semester successfully.";
        }else if($action=="dismiss"){
            $resp = $this->model->updateStatus("dismissed", $lead_id);
            $msg = "Lead dismissed successfully.";
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

    

    function list_leads(){
        if (!isset($_SESSION["loggedin_user"])) {
            $_SESSION["flash-msg"] = "Can't access that. Nice try!";
            $_SESSION["flash-type"] = "error";

            return header('location: ' . URL);
        }

        
        $active = "skin-green sidebar-mini";
        $active_menu = "list_leads";
        $loggedin_user = $_SESSION["loggedin_user"];
        $countUsers = sizeof($this->model->getAllUsers());

        if ($loggedin_user["user_role"]=="Counsellor") {
            $leads_detail = $this->model->getAllLeadsForCounsellor($loggedin_user["user_id"]);
            $leads_detail_today = $this->model->getActiveFollowUpForCounsellor($loggedin_user["user_id"]);
            $countTodayLeads = sizeof($leads_detail_today);
            $countLead = $this->model->countAllLeadsForCounsellor($loggedin_user["user_id"]);       
        }else{
            $leads_detail = $this->model->getAllLeads();
            $leads_detail_today = $this->model->getActiveFollowUpForCounsellor($loggedin_user["user_id"]);
            $countTodayLeads = sizeof($leads_detail_today);
            $countLead = sizeof($leads_detail);
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
        $leads_detail_today = $this->model->getActiveFollowUpForCounsellor($loggedin_user["user_id"]);
        $countTodayLeads = sizeof($leads_detail_today);
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

    function edit_lead($lead_id){

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
        //$leads_detail_today = $this->model->getAllFollowUpForCounsellor($loggedin_user["user_id"]);
        $lead_detail = $this->model->getLeadByIDAndCounsellor($loggedin_user["user_id"], $lead_id);
        if (!$lead_detail) {
            $_SESSION["flash-msg"] = "Can't access that. Nice try!";
            $_SESSION["flash-type"] = "error";

            return header('location: ' . URL.$loggedin_user["user_role"]);
        }
        $edit_lead = true;
        require APP . 'view/_templates/header.php';
        require APP . 'view/_templates/top_menu.php';
        require APP . 'view/_templates/side_menu.php';
        require APP . 'view/leads/add_leads.php';
        require APP . 'view/_templates/footer.php';
    }


    function update_lead($lead_id){
       /* echo $lead_id;
        print_r($_POST);*/

        $next_follow_date = date('Y-m-d', strtotime("+".$_POST["next_follow"]." days"));

        $update_lead = $this->model->updateLead($lead_id, 
                                            $_POST['first_name'], 
                                            $_POST['last_name'],
                                            $_POST['contact'],
                                            $_POST['email'],
                                            $_POST['address'],
                                            $_POST['district'],
                                            $next_follow_date,
                                            $_POST['interested_level'],
                                            $_POST['interested_semester'],
                                            $_POST['interested_faculty'],
                                            $_POST['comments']);

        if($update_lead){
            $_SESSION["flash-msg"] = "Changes saved successfully!";
            $_SESSION["flash-type"] = "success";
            
        }else{
            $_SESSION["flash-msg"] = "Can't perform the requested action right now. Please try again later.";
            $_SESSION["flash-type"] = "error";
        }

        return header('location: ' . URL .'leads/edit_lead/'.$lead_id );
    }


    function followup($lead_id){
        if (!isset($_SESSION["loggedin_user"])) {
            $_SESSION["flash-msg"] = "Can't access that. Nice try!";
            $_SESSION["flash-type"] = "error";

            return header('location: ' . URL);
        }

        $active = "skin-green sidebar-mini";
        $active_menu = "list_leads";
        $loggedin_user = $_SESSION["loggedin_user"];
        $leads_detail_today = $this->model->getActiveFollowUpForCounsellor($loggedin_user["user_id"]);
        $countTodayLeads = sizeof($leads_detail_today);
        $countLead = $this->model->countAllLeadsForCounsellor($loggedin_user["user_id"]);
        //$leads_detail_today = $this->model->getAllFollowUpForCounsellor($loggedin_user["user_id"]);
        $lead_detail = $this->model->getLeadByIDAndCounsellor($loggedin_user["user_id"], $lead_id);
        if (!$lead_detail) {
            $_SESSION["flash-msg"] = "Can't access that. Nice try!";
            $_SESSION["flash-type"] = "error";

            return header('location: ' . URL.$loggedin_user["user_role"]);
        }

        $followup_detail = $this->model->getLeadFeedBackData($lead_id);

        require APP . 'view/_templates/header.php';
        require APP . 'view/_templates/top_menu.php';
        require APP . 'view/_templates/side_menu.php';
        require APP . 'view/leads/followup_form.php';
        require APP . 'view/_templates/footer.php';
    }

    function do_followup($lead_id, $followup_id){
        $next_follow_date = date('Y-m-d', strtotime("+".$_POST["next_follow"]." days"));
        $this->model->updateFollowUpDate($lead_id,$next_follow_date);

        $this->model->updateFollowUpCountAndFeedback($followup_id, $_POST["comments"]);

        $_SESSION["flash-msg"] = "Follow up updated successfully.";
        $_SESSION["flash-type"] = "success";
        return header('location: ' . URL. "leads/followup/".$lead_id);
    }
}
