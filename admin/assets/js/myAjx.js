
$(".alert_button").on("click", function(){
    var id = $(this).attr('id');

    $.ajax({
        url: '../ajax/d3Details.php',
        type: 'POST',
        data: {id:id},
        success: function(data){
            $('#d3ModalBody').html(data);
            $('#d3Modal').modal('show');

            console.log(data);

        }
    });
  
});


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



$(".alert_button2").on("click", function(){
    var id = $(this).attr('id');

    $.ajax({
        url: '../ajax/d3Details2.php',
        type: 'POST',
        data: {id:id},
        success: function(data){
            $('#d3ModalBody2').html(data);
            $('#d3Modal2').modal('show');

            console.log(data);

        }
    });
  
});



$(document).ready(function(){
  $(".cancel-booking").click(function(){
    var c = confirm("Are You sure?");
    if (c==true) {
        var bid = $(this).attr('id');

        $.ajax({
            url: '../ajax/cancelBooking.php',
            type: 'POST',
            data: {bid:bid},
            success: function(data){
                $('#showBook').html(data);
            }
        });
    };
        
  });
});




$(document).ready(function(){
  $(".recordCheck").click(function(){
        var cid = $(this).attr('id');
        
        $.ajax({
            url: '../ajax/allPaymentRecords.php',
            type: 'POST',
            data: {cid:cid},
            success: function(data){
                $('#showBook').html(data);
            }
        });
        
  });
});




$(document).ready(function(){
    
    $('input[name="filterRadioButton"]').on('change', function() {
        
        var radioValue = $('input[name="filterRadioButton"]:checked').val();
        
        switch (radioValue) {
            case 'paid':
                $.ajax({
                    url: '../ajax/allRequestFilterOnChecked.php',
                    type:'POST',
                    data:{checkValue:3},
                    success:function(data){
                        $('#searchResultForBooklist').html(data);
                        console.log(data);
                    }
                });
                break;
            case 'unpaid':
                $.ajax({
                    url: '../ajax/allRequestFilterOnChecked.php',
                    type:'POST',
                    data:{checkValue:0},
                    success:function(data){
                        $('#searchResultForBooklist').html(data);
                        console.log(data);
                    }
                });
                break;
            case 'canceled':
                $.ajax({
                    url: '../ajax/allRequestFilterOnChecked.php',
                    type:'POST',
                    data:{checkValue:2},
                    success:function(data){
                        $('#searchResultForBooklist').html(data);
                        console.log(data);
                    }
                });
                break;
        }    
      
    });


    $('#adminBookingSearch').keyup(function(){
        var searchRes = $('#adminBookingSearch').val();
        if (searchRes != '' && searchRes!=null) {
            // console.log(typeof(searchRes));
            $("input[name='filterRadioButton']").each(function(i) {
                $(this).attr('disabled', 'disabled');
                $(this).removeAttr('checked');

                $.ajax({
                    url: '../ajax/allRequestFilterOnChecked.php',
                    type:'POST',
                    data:{checkValue:searchRes},
                    success:function(data){
                        $('#searchResultForBooklist').html(data);
                        console.log(data);
                    }
                });
            });
        }else{
                 
            $("input[name='filterRadioButton']").each(function(i) {
                $(this).prop('disabled',false);
            });
        }
    });


});