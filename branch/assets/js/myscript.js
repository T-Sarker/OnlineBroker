// (function($) {

// 	alert(myId);
// 	function myfunctionxx(id){

// 		return id;
// 		// $.ajax({
//   //                   url: "../ajax/confirmOrderData.php",
//   //                   type:'POST',
//   //                   data:{'id':id},
//   //                   success:function(data){

//   //                       $('.confirmOrder').html();

//   //                   }
//   //               });
// 	}

// })(jQuery);

function confirmTicket(id){

        event.preventDefault();

    var myId = id;

    $.ajax({
        url: '../ajax/confirmOrderData.php',
        type: 'POST',
        data: {id: myId},
        success:function(response){

            $('.confirmOrder').html(response);
            $('#resaultToast').html('<b class="alert alert-success">Order Confirmed</b>');
        }
    });

}




function callme(){
	
            
            $.ajax({
                url: "../ajax/orderListFetch.php",
                type: "POST",
                success: function (data) {
                    $('.showOrderTickets').html(data);
                },
            });
        
}



function getNotification(){

    $.ajax({ 
       type:"POST",
        url:"../ajax/showNotificaton.php",
        success:function(html){
            
            $('#ShowNotification').html(html);
        }   
    });
}
	


function getNumberOfNotification(){

    $.ajax({ 
       type:"POST",
        url:"../ajax/showNotificatonNumber.php",
        success:function(html){
            
            $('#notifyNumber').html(html);
        }   
    });
}


function allNotification(){
	        window.setInterval(function(){
	            getNotification();
	            getNumberOfNotification();
	        }, 1000);
	}

function showTickets(){
	        window.setInterval(function(){
	            callme();
	        }, 1000);
	}
    
// function getmyData(){

//     var result = document.getElementById('ticketSearch').value;
//     $.ajax({

//         url: "../ajax/searchTokenSuggestion.php",
//         type:"POST",
//         data: {searchKey:result},
//         success:function(data){
//             $('#tokenSuggestion').html(data);
//             $('#tokenSuggestion').show();
//         }
//     });


// }

// function getmyData(){

//     var result = document.getElementById('ticketSearch').value;
//     // console.log(result);


// }

$("#ticketSearch").keyup(function(){
    var result = $("#ticketSearch").val();
        if (result != '') {

        $.ajax({

        url: "../ajax/searchTokenSuggestion.php",
        type:"POST",
        data: {searchKey:result},
        success:function(data){
            $('#tokenSuggestion').html(data);
        }
    });
    }else{

        $.ajax({

        url: "../ajax/showAccepetedToken.php",
        type:"POST",
        success:function(data){
            $('#tokenSuggestion').html(data);
        }
    });
    }
    
  });

$("#ticketSearch2").keyup(function(){
    var result = $("#ticketSearch2").val();
    console.log(result);
        if (result != '') {

        $.ajax({

        url: "../ajax/searchTokenSuggestion2.php",
        type:"POST",
        data: {searchKey:result},
        success:function(data){
            $('#tokenSuggestion2').html(data);
        }
    });
    }
    
  });


