<footer class="footer">
        <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2017 <a href="https://www.bootstrapdash.com/" target="_blank">BootstrapDash</a>. All rights reserved.</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="mdi mdi-heart text-danger"></i></span>
        </div>
    </footer>

    <!-- Your customer chat code -->
<div class="fb-customerchat"
  attribution=setup_tool
  page_id="{your-page-id}"
  theme_color="#BE59B9">
</div>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.perfect-scrollbar/1.5.0/perfect-scrollbar.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="assets/js/dashboard.js"></script>
    <script src="assets/js/vendor.bundle.base.js"></script>
    <script src="assets/js/misc.js"></script>
    <script src="assets/js/hoverable-collapse.js"></script>
    <script  type="text/javascript" src="assets/js/myscript.js"></script>
    <script  type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.2/jspdf.debug.js"></script>
    <script  type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.min.js"></script>
    <script type="text/javascript">
    <?php
        $id = Session::get('branchUid');
        $cid = Session::get('companyUid');
        $getMonthTotal = $aoc->getMonthlyTotalOrderCount($id,$cid);


        
    ?>
    var js_array =<?php echo json_encode($getMonthTotal );?>;
    console.log(js_array);
      var chart = new Chart(ctx, {
   type: 'line',
   data: {
      labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'],
      datasets: [{
         label: 'Order',
         data: js_array,
         backgroundColor: 'rgba(0, 119, 290, 0.2)',
         borderColor: 'rgba(0, 119, 290, 0.6)',
         fill: false
      }]
   },
   options: {
      scales: {
         yAxes: [{
            ticks: {
               beginAtZero: true,
               stepSize: 1
            }
         }]
      }
   }
});

    </script>

<script>

<?php
    $id = Session::get('branchUid');
    $cid = Session::get('companyUid');
    $getTotal = $aoc->getTotalOrderCount($id,$cid);
    if ($getTotal != false && isset($getTotal)) {
      echo "var od='".$getTotal."';";
    }else{
      echo "var od=0;";
    }
?>

var left = 100-(parseInt(od)+parseInt(od));
var ctx = document.getElementById("myChart");
var myChart = new Chart(ctx, {
    type: 'pie',
    data: {
        labels: ["Order", "Customer","Target"],
        datasets: [{
            label: '%',
            data: [od, od,left],
            backgroundColor: [
                'rgba(120, 155, 139, 1)',
                'rgba(83, 114, 89, 1)',
                'rgba(175, 219, 121, 1)',
                'rgba(112, 175, 204, 1)',
                'rgba(111, 159, 188, 1)',
                'rgba(13, 60, 89, 1)',
                'rgba(101, 195, 14, 1)'
            ],
            borderColor: [
                'rgba(120, 155, 139, .2)',
                'rgba(83, 114, 89, .2)',
                'rgba(175, 219, 121, .2)',
                'rgba(112, 175, 204, .2)',
                'rgba(111, 159, 188, .2)',
                'rgba(13, 60, 89, .2)',
                'rgba(101, 195, 14, .2)'
            ],
              borderWidth: 1,
          hoverBorderWidth: 10
        }]
    },
    options: {
      legend: {
        display: true,
        position: 'bottom'
      },
      tooltips: {
            mode: 'nearest'
        }
    }
});

</script>

<script>
    function saveAsPDF(x){

        if (x==1) {
            
            var divHeight = $('#monthlyReport').height();
        var divWidth = $('#monthlyReport').width();

         html2canvas(document.getElementById("monthlyReport"), {

                    
                    onrendered: function(canvas) {

                        var imgData = canvas.toDataURL('image/png');
                        console.log('Report Image URL: '+imgData);
                        var doc = new jsPDF('p', 'mm', [divWidth, divHeight]); //210mm wide and 297mm high
                        
                        doc.addImage(imgData, 'PNG', 10, 10);
                        doc.save('monthlyReport.pdf');
                    }
                });
        }
    if (x==2) {
        var divHeight = $('#weeklyReport').height();
        var divWidth = $('#weeklyReport').width();

         html2canvas(document.getElementById("weeklyReport"), {

                    
                    onrendered: function(canvas) {

                        var imgData = canvas.toDataURL('image/png');
                        console.log('Report Image URL: '+imgData);
                        var doc = new jsPDF('p', 'mm', [divWidth, divHeight]); //210mm wide and 297mm high
                        
                        doc.addImage(imgData, 'PNG', 10, 10);
                        doc.save('weeklyReport.pdf');
                    }
                });
    };
    }
</script>











    <script>
         
        (function($) {
                $(document).ready(function(){
                    
                  showTickets();
            });
        })(jQuery);       
    </script>

    <script type="text/javascript">
        (function($) {
                $(document).ready(function(){
                    
                  allNotification();
            });
        })(jQuery);
</script>
<script>
    $('#cmd').click(function() {
  var options = {
  };
  var pdf = new jsPDF('p', 'pt', 'a4');
  pdf.addHTML($("#content"), 15, 15, options, function() {
    pdf.save('pageContent.pdf');
  });
});
</script>

<script>
  window.fbAsyncInit = function() {
    FB.init({
      appId            : '1175565702494581',
      autoLogAppEvents : true,
      xfbml            : true,
      version          : 'v2.11'
    });
  };
(function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
</script>



</body>

</html>