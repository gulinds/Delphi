var temp = 0;
var ewt = 1;
var temp_time= new Date().getMinutes();
$(document).ready(function(){
  lookup();
  countdown();

  function lookup(){

    var dataString = {
      u_id : u_id
    };

    $.ajax({
      url:    "in_line.php",
      data :  dataString,
      cache:  false,
      success:function(result){
        $("#in_queue").html(result.content);
      }
    });
  }
  setInterval(lookup,1000);

  function pad(d) {
    return (d < 10) ? '0' + d.toString() : d.toString();
  }
  function countdown(){

    var dataString = {
      u_id : u_id
    };

        $.ajax({
        url: 'ewt.php',
        data:  dataString,
        cache: false,
        success:function(result){
          var current_time = new Date().getMinutes();
//          $("#ewt_user").html(result.flag);
          if(result.flag ==1){
            $("#display_minute").hide();
            $("#display_ewt").hide();
            $("#clock_icon").hide();
            $("p").css({"font-weight":"bold", "font-size":"25px"});
            $("#ewt_user").html("It will soon be your turn </br>please return to the store");
          }
          else if(ewt>0){
            if(result.content == temp ){
              if(current_time!=temp_time)
              {
                ewt = ewt-(current_time - temp_time);
                temp_time = current_time;
              }
            //  $("#ewt_user").html(current_time+" "+ temp_time);
            }
            else{
              ewt = result.content;
              temp = result.content;
            //  $("#ewt_user").html("second");
            }
            var display = pad(Math.floor(ewt/60))+':'+pad(ewt%60);
            $("#ewt_user").html(display);
          }

        }
    });
  }
  setInterval(countdown,1000);

  function blink() {
      $("#ewt").fadeTo(100, 0.1).fadeTo(200, 1.0);
    }









})
