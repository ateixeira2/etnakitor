<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>Etnakitor</title>
  <link rel="stylesheet" href="css.css">
  <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
</head>

<body>
  <p style="display: none;" id="api_id">Test</p>
  <div id="title">
  	<h1>Etnakitor</h1>
  </div>
  <div id="content">
  	<div id="question">La question sera ecrite ici</div>
  </div>
  
  <div class="reponse">
  	<div class="wrapper">
  		<input type="radio" name="choice" id="yes">
  		<label for="yes">Oui</label>
  		<input type="radio" name="choice" id="no">
  		<label for="no">Non</label>
  		<div class="main">
  			<div class="inner"></div>
 		</div>
 	</div>
 </div>
</div>
<script type="text/javascript" >

window.onload = function showquestion(str){
  var texte;
  var custom_url = "API/question.php";

  $.ajax({
    type: "GET",
    dataType: "json",
    url: custom_url,

    error:function(msg, string){
      alert( "Error !: " + string );
    },

    success:function(data){
      $.each(data, function(key, value){
          console.log("each: " + key + ":" + value);
      })
      $( "#api_id" ).text(function() {
        data["id"];
      })
    }
  }
);}

var texte;
var test =0;
var custom_url = "API/question.php";

$(function () {
    $('#yes').on('click', function () {
        var Status = $(this).val();
        $.ajax({
          type: "GET",
          dataType: "json",
          url: custom_url,

          error:function(msg, string){
            alert( "Error !: " + string );
          },

          success:function(data){
            $( "#api_id" ).text(function() {
              data["id"];
            })
            if(test == 0){
              custom_url = custom_url + "?";
              test++;
            }
            else
              custom_url = custom_url + "&";
            
            custom_url = custom_url + "ok[]="+data["id"];
            console.log(custom_url);
          }
        });
    });
});

</script>

<script type="text/javascript">


</script>

</body>
</html>