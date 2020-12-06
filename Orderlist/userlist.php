<!DOCTYPE html>
<html>

<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>

  <!--link rel="stylesheet" type="text/css" href="css/loginCSS2.css">
  <link rel="stylesheet" href="css/styles.css" /-->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

<title>UserOrder List</title>
<h4>UserOrder history List</h4>

</head>
<style>

table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
}
tr:nth-child(even) {
  background-color: #eee;
}
tr:nth-child(odd) {
 background-color: #fff;
}
th {
  background-color: black;
  color: white;
}
</style>
<body>


 <form action="getOrderlist.php" method="post">

   
      <label for="uname">Username</label>
      <input id="uname" type="text" placeholder="Enter Username" name="uname" required>
    
     <!--button-->
      <button id="rbtn" type="button">User List</button>
      <table id="list"> </table> 

 </form>

</body>


<script>

$(document).ready(function() {
    $('#rbtn').click(function() {

     var username = $('input[name="uname"]').val();
     

      $.ajax({
        url: 'getOrderlist.php',
        method: 'POST',
        dataType: 'JSON',
        data: {
          uname: username
        	
        },
        success:  function(response){
        	
        	console.log(response);
            var len = response.length;
            //$("#avalibility").html(len);
            var tr_str="<tr><th> Id </th><th> CrderId </th><th> CookieID </th><th> Amount </th></tr>";
            for(var i=0; i<len; i++){
                var id = response[i].id;
                var OrderId = response[i].orderId;
                var CookieID = response[i].cookieID;
                var Amount = response[i].amount;

               
                	tr_str += "<tr>" +
                    "<td align='center'>" + (i+1) + "</td>" +
                    "<td align='center'>" + OrderId + "</td>" +
                    "<td align='center'>" + CookieID + "</td>" +
                    "<td align='center'>" + Amount + "</td>" +
                    "</tr>";
                $("#list").html(tr_str);
                
            }
        }
      })
   });
});

</script>

</html>