  var url = 'http://api.openweathermap.org/data/2.5/forecast?id=1185241&appid=f64cc053e96a84d6c65793af719db0ac&units=metric';
  $.ajax({
    dataType: "jsonp",
    url: url,
    jsonCallback: 'jsonp',
    // data: { q: city },
    cache: false,
    success: function (data) {
        $('#cityName').text(data.city['name']+' Forecast');

        var i=0;

        while(i< data.list.length) {

            var str = data.list[i]['dt_txt'];
            var str2 = data.list[i+1]['dt_txt'];
            var res = str.split(" ");
            var res2 = str2.split(" ");

            if ( res[0]== res2[0]) {
              // console.log('catn\'t Count');
            }else{
              console.log("mmmm"+i);
              var htmls = '<div class="col-5 m-2 border p-2">'
              +
              '<p><i class="fa fa-thermometer-half mr-3" aria-hidden="true"></i>'+data.list[i]['main']['temp']+'\'C</p>'
              +
              '<p class="badge badge-pill badge-info"><i class="fa fa-cloud mr-3" aria-hidden="true"></i>'+data.list[i]['weather'][0]['description']+'</p><br>'
              +
              '<b>'+res[0]+'</b>'
              +
              '</div>';

              $('#day5Weather').append(htmls);
              console.log(data.list[i]['dt_txt']);
              console.log(data.list[i]['main']['temp']);
              console.log(data.list[i]['weather'][0]['description']);
            }


            i++;

            

        }
    }
  });