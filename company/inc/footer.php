
        
        <!--**********************************
            Footer start
        ***********************************-->
        <div class="footer">
            <div class="copyright">
                <p>Copyright &copy; Developed by Tapos 2020</p>
            </div>
        </div>
        <!--**********************************
            Footer end
        ***********************************-->
    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    <script src="plugins/common/common.min.js"></script>
    <script src="js/custom.min.js"></script>
    <script src="js/settings.js"></script>
    <script src="js/gleek.js"></script>
    <script src="js/calender.js"></script>
    <script  type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.debug.js"></script>
    <script  type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.min.js"></script>
    <script type="text/javascript" src="js/weather.js"></script>
    <script type="text/javascript">
    <?php
        $cid = Session::get('companyUid');
        $getMonthTotal = $aoc->getCompanyMonthlyTotalOrderCount($cid);


        
        ?>
        var js_array =<?php echo json_encode(array_values($getMonthTotal));?>;
        var js_array2 =<?php echo json_encode(array_keys($getMonthTotal));?>;
        // console.log(js_array);
          var chart = new Chart(ctx, {
       type: 'line',
       data: {
          labels: js_array2,
          datasets: [{
             label: 'orders',
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
    $cid = Session::get('companyUid');
    $getTotal = $aoc->getCompanyTotalOrderCount($cid);
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

<script type="text/javascript">
    <?php
        $companyUid = Session::get('companyUid');
        $getMonthTotald3 = $bc->getYearTotalAccountOrderForD3($companyUid);

        // print_r($getMonthTotald3);


        
    ?>
    var js_arrayd3 =<?php echo json_encode(array_values($getMonthTotald3));?>;
    // console.log(js_arrayd3);
      var chart = new Chart(ctxt, {
   type: 'line',
   data: {
      labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July ', 'August', 'September', 'October', 'November', 'December'],
      datasets: [{
         label: 'Orders',
         data: js_arrayd3,
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
    function saveAsPDF(x){

        if (x==1) {

        var divHeight = $('#monthlyReport').height();
        var divWidth = $('#monthlyReport').width();

         html2canvas(document.getElementById("monthlyReport"), {

                    
                    onrendered: function(canvas) {

                        var imgData = canvas.toDataURL('image/png');
                        // console.log('Report Image URL: '+imgData);
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
                        // console.log('Report Image URL: '+imgData);
                        var doc = new jsPDF('p', 'mm', [divWidth, divHeight]); //210mm wide and 297mm high
                        
                        doc.addImage(imgData, 'PNG', 10, 10);
                        doc.save('weeklyReport.pdf');
                    }
                });
      };

    if (x==3) {


        var divHeight = $('#d3monthlyReport').height();
        var divWidth = $('#d3monthlyReport').width();

         html2canvas(document.getElementById("d3monthlyReport"), {

                    
                    onrendered: function(canvas) {

                        var imgData = canvas.toDataURL('image/png');
                        // console.log('Report Image URL: '+imgData);
                        var doc = new jsPDF('p', 'mm', [divWidth, divHeight]); //210mm wide and 297mm high
                        
                        doc.addImage(imgData, 'PNG', 10, 10);
                        doc.save('d3YearlyReport.pdf');
                    }
                });
      };
    }
</script>
    <script>
             $('.offerDateForm').hide();

            function SetOfferTime(id){
                if (id==0) {
                    $('.offerDateForm').show('slow');
                }else{
                    $('.offerDateForm').hide();
                }
            }
    </script>

    <script>
            $("#BranchImage").on("change", function() {
                if ($("#BranchImage")[0].files.length > 3) {
                    $('#addBranch').attr("disabled", 'disabled');
                    $('#imageResult').html('<b style="color:red;">Select Only 3 Files</b>');
                }else if($("#BranchImage")[0].files.length == 3){
                    $('#imageResult').html('<b style="color:green;">Image ok</b>');
                    $('#addBranch').attr("disabled", false);
                }else{

                }
            });
    </script>


    <script>
            $("#searchBooking").keyup(function(){
              var result = $("#searchBooking").val();
                  if (result != '') {

                  $.ajax({

                  url: "../ajax/searchBookingOrders.php",
                  type:"POST",
                  data: {searchKey:result},
                  success:function(data){
                      $('#bookingResults').html(data);
                  }
              });
              }              
            });

            $.ajax({

                  url: "../ajax/bookingOrders.php",
                  type:"POST",
                  success:function(data){
                      $('#bookingResults').html(data);
                  }
              });
    </script>

    <script>
            
      $( document ).ready(function() {

        function getd3Notification(){
          $.ajax({

              url: "../ajax/d3Notification.php",
              type:"POST",
              dataType:"json",
              success:function(data){
                  $('#d3Notification').html(data.notification);
                  $('#d3numNotification').html(data.unseen_notification);
                  
              }
          });
        }

          window.setInterval(function(){
              getd3Notification();
          }, 1000);
      });

          
            
    </script>

    <script>
            
      $( document ).ready(function() {

        function getd3PayCofirmation(){
          $.ajax({

              url: "../ajax/d3PayConfirm.php",
              type:"POST",
              dataType:"json",
              success:function(data){
                  $('#d3Notification2').html(data.notification);
                  $('#d3numNotification2').html(data.unseen_notification);
                  
              }
          });
        }

          window.setInterval(function(){
              getd3PayCofirmation();
          }, 1000);
      });

          
            
    </script>

    <script>
            
      $( document ).ready(function() {
          
          $('.monthVendorPayConfirm').on('click',function(){
              var cid = $(this).attr('id');

              $.ajax({
                  url: '../ajax/confirmVendorSidePayment.php',
                  type:'POST',
                  data: {cid:cid},
                  success:function(data){
                    
                  }
              });
          });
      });

          
            
    </script>

    <script>
        function notificationSeen(){
          $.ajax({

              url: "../ajax/d3NotificationSeen.php",
              type:"POST",
              success:function(data){

                  $('#d3Notification').html(data.notification);
                  $('#d3numNotification').html(data.unseen_notification);
                  
              }
          });
        }
    </script>
</body>
</html>