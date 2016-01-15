<footer class="main-footer <?php echo ($active=='login-page')?"hide":""; ?>">
    <div class="pull-right hidden-xs">
        <b>Islington College</b> <?php echo date("Y"); ?>
    </div>
    <strong><a href="<?php echo URL; ?>">Student Follow up System</a></strong>
</footer>



<script type="text/javascript" src="<?php echo URL; ?>assets/js/jQuery-2.1.4.min.js"></script>
<script type="text/javascript" src="<?php echo URL; ?>assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo URL; ?>assets/js/app.min.js"></script>
<script type="text/javascript" src="<?php echo URL; ?>assets/js/sweetalert.min.js"></script>
<script type="text/javascript" src="<?php echo URL; ?>assets/js/Chart.min.js"></script>
<script type="text/javascript" src="<?php echo URL; ?>assets/js/footable.js"></script>
<script type="text/javascript" src="<?php echo URL; ?>assets/js/jquery.validate.min.js"></script>

<script>
    var URL = "<?php echo URL; ?>";
</script>

<script type="text/javascript">

    $('[data-rel="tooltip"]').tooltip();

    $("[data-table='footable']").footable({
        breakpoints: {
            phone: 480,
            tablet: 1024
        },
        "paging": {
            "enabled": true
        },
        "filtering": {
            "enabled": true
        },
        "sorting": {
            "enabled": true
        }
    });

    $("[data-action='delete']").click(function(e){
        e.preventDefault();
        var url = $(this).attr("href");

        swal({
            title: "SFuS",
            text: "Are you sure you want to delete?",
            type: "warning",
            showCancelButton: true,
            confirmButtonText: "Yes, delete it!",
            closeOnConfirm: false
        },
        function(){
            window.location.href = url;
        });
    });

    $("[data-action='make_student']").click(function(e){
        e.preventDefault();
        var url = $(this).attr("href");

        swal({
            title: "SFuS",
            text: "Are you sure you want to change this lead into student?",
            type: "warning",
            showCancelButton: true,
            confirmButtonText: "Yes, change it!",
            closeOnConfirm: false
        },
        function(){
            window.location.href = url;
        });
    });

    $("[data-action='change_status']").click(function(e){
        e.preventDefault();
        var url = $(this).attr("href");

        swal({
            title: "SFuS",
            text: "Are you sure you want to change this user status?",
            type: "warning",
            showCancelButton: true,
            confirmButtonText: "Yes, change it!",
            closeOnConfirm: false
        },
        function(){
            window.location.href = url;
        });
    })
</script>



<?php 
//this is for flash alert messages.
if (isset($_SESSION['flash-msg']) && $_SESSION['flash-msg']!="") {

    ?>
    <script type="text/javascript">
        swal("SFuS", "<?php echo $_SESSION['flash-msg']; ?>", "<?php echo $_SESSION['flash-type']; ?>")
    </script>
    <?php		

    $_SESSION["flash-msg"] = "";
    $_SESSION["flash-type"] = "";

}
?>

<?php 
    if(isset($active_menu)){
        if($active_menu=="dashboard" && $loggedin_user["user_role"]=="Manager"){
?>

<script type="text/javascript">
    var areaChartData = {
        labels: ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"],
            datasets: [
                {
                    label: "Digital Goods",
                    fillColor: "rgba(60,141,188,0.9)",
                    strokeColor: "rgba(60,141,188,0.8)",
                    pointColor: "#3b8bba",
                    pointStrokeColor: "rgba(60,141,188,1)",
                    pointHighlightFill: "#fff",
                    pointHighlightStroke: "rgba(60,141,188,1)",
                    data: [<?php foreach ($dataset as $key => $value) {
                            echo $value.',';
                            } ?>]
                }
            ]
        };
  
    var lineChartCanvas = $("#lineChart").get(0).getContext("2d");
    var lineChart = new Chart(lineChartCanvas);
    lineChart.Line(areaChartData, "");

    var pieChartCanvas = $("#pieChart").get(0).getContext("2d");
        var pieChart = new Chart(pieChartCanvas);
        var PieData = [
          {
            value: <?php echo $countDismissed; ?>,
            color: "#f56954",
            highlight: "#f56954",
            label: "Dismissed"
          },
          {
            value: <?php echo $countPostPoned; ?>,
            color: "#00a65a",
            highlight: "#00a65a",
            label: "Postponed"
          },
          {
            value: <?php echo $countExpired; ?>,
            color: "#f39c12",
            highlight: "#f39c12",
            label: "Expired"
          },
          {
            value: <?php echo $countActive; ?>,
            color: "#00c0ef",
            highlight: "#00c0ef",
            label: "Active"
          }
        ];
       
        pieChart.Doughnut(PieData, "");

</script>
<?php        
        }
    }
?>

<?php 
    if (isset($edit_lead)) {
    if ($edit_lead) {
?>  
    <script type="text/javascript">
        var checked_level = "<?php echo $lead_detail['interested_level']?>";
        $.each($('[name="interested_level"]'), function(index, data){
            if ($(this).val()==checked_level) {
                $(this).click();
            };
        });
    </script>

<?php } }
?>

<script type="text/javascript">
    var addleadForm = $('[name="add_lead"]');
    addleadForm.validate();

    var updateProfileForm = $('[name="update_profile"]');
    updateProfileForm.validate();

    var updatePasswordForm = $('[name="update_password"]');
    updatePasswordForm.validate();

    var addUserForm = $('[name="add_user"]');
    addUserForm.validate();
</script>

</body>
</html>
