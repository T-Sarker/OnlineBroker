   
    
    <script type="text/javascript" src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap/tether.min.js"></script>
    <script src="assets/js/bootstrap/bootstrap.min.js"></script>
    <script type="text/javascript" src="assets/js/plugins.js"></script>
    <script type="text/javascript" src="assets/js/metismenu/metisMenu.min.js"></script>
    <script type="text/javascript" src="assets/js/counterup/jquery.waypoints.min.js"></script>
    <script type="text/javascript" src="assets/js/counterup/jquery.counterup.min.js"></script>

    <script>
    		function searchingValue(){
    			 var searchVal = document.getElementById("companySearch").value;
    			 console.log(typeof(searchVal));
    			 if (searchVal == '') {
    			 	
    			 	document.getElementById("searchSuggestion").style.display = "none";
    			 }else{

    			 	document.getElementById("searchSuggestion").style.display = "block";

    			 	$.ajax({
                        url: "../ajax/companyList.php",
                        type: "POST",
                        data: {name:searchVal},
                        success: function (data) {
                            $('.showSuggestion').html(data);
                        },
                    });

    			 }
    		}
    </script>
</body>

</html>