
        
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
</body>
</html>