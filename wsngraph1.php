<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<script src="https://unpkg.com/konva@8.4.2/konva.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
  integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <link href="style.css" rel="stylesheet" />
<title>wsn config 1</title>
<style>
   #my-canvas { border: 1px solid gray; }
   .context-font{
    color: black;
   }
   .right{
      position:absolute;
      left:800px;
      top:80px;
      text-align:justify ;
      width:500px;
      height:430px;
   }
   .h1{
background-color: yellow;
width:fit-content;
padding: 3px;
}
body, html {
  height: 100%;
  margin: 0;
}

.bg {
  /* The image used */
  background-image: url("img_girl.jpg");

  /* Full height */
  height: 100%; 

  /* Center and scale the image nicely */
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
}

</style>
</head>
<body> <div class="bg">

<h1><center>Graph Visualizer</center></h1>
<button onclick="downloadCurrentPage()">Download Data</button>

    <!-- JavaScript function to handle the download button click -->
    <script>
        function downloadCurrentPage() {
            var htmlContent = document.documentElement.outerHTML;
            var blob = new Blob([htmlContent], { type: 'text/html' });
            var anchor = document.createElement('a');
            anchor.href = URL.createObjectURL(blob);
            anchor.download = 'wsngraph1.html';
            anchor.click();
        }
    </script>
  
<nav >
  <div class="dropdown">
  
    <button onclick="myFunction()" class="dropbtn">Databases</button>
    <div id="myDropdown" class="dropdown-content">
      <a href="wsngraph2.php" target="_self">cfm_sensors_configuration_01</a>
      <a href="wsngraph3.php" target="_self">cfm_sensors_configuration_03</a>
      <a href="config4.php" target="_self">cfm_sensors_configuration_04</a>
      <a href="config5.php" target="_self">cfm_sensors_configuration_05</a>
      <a href="nagpur2.php" target="_self">cfm_sensors_configuration_ceat_nagpur</a>
      <a href="wsngraph1.php" target="_self">wireless_sensors_network</a>
  
    </div>
 
  </div>
</nav>
  <script>
  /* When the user clicks on the button, 
  toggle between hiding and showing the dropdown content */
  function myFunction() {
    document.getElementById("myDropdown").classList.toggle("show");
  }
  
  // Close the dropdown if the user clicks outside of it
  window.onclick = function(event) {
    if (!event.target.matches('.dropbtn')) {
      var dropdowns = document.getElementsByClassName("dropdown-content");
      var i;
      for (i = 0; i < dropdowns.length; i++) {
        var openDropdown = dropdowns[i];
        if (openDropdown.classList.contains('show')) {
          openDropdown.classList.remove('show');
        }
      }
    }
  }
  
  </script>
  
<canvas id="my-canvas" width="700" height="700"></canvas>
<div class="right">
    <h2>Data</h2>
   <table border="2"  cellborder="2" style="width:600px; ">
      <tr>
        <th>ID</th><th>DEVICE TYPE</th><th>MAC ADDRESS</th><th>REGTIME</th><th>NAME</th><th>LOCATION</th><th>CONFIG TIME</th><th>UPDATE TIME</th>
      
      </tr>

<?php
$con = mysqli_connect("localhost:3307","root'","Aditi@6112","wsn_proj");
//echo"connected successfully!<br><hr><br>";
if (mysqli_connect_errno()) {
echo "Failed to connect to MySQL: " . mysqli_connect_error();
exit();
}

//$sql = "SELECT * FROM wireless_sensors_network";

$query=mysqli_query($con ,"SELECT * FROM wireless_sensors_network");
while($row=mysqli_fetch_assoc($query)){
//print_r($row);
print"<tr> <td>";
echo $row["id"];
print"</td> <td>";
echo $row["devicetype"];
print"</td> <td>";
echo $row["macaddress"];
print"</td> <td>";
echo $row["regtime"];
print"</td> <td>";
echo $row["name"];
print"</td> <td>";
echo $row["location"];
print"</td> <td>";
echo $row["configtime"];
print"</td> <td>";
echo $row["updatetime"];
}

?>
</div >
</table>
  <?php echo"<script>
  var canvas = document.querySelector('#my-canvas');
  var context = canvas.getContext('2d');
    context.font = '15px Arial white';
   
    context.fillText('Sensor node', 540, 580);
    context.fillText('Repeater node', 540, 620);
    context.fillText('Cordinator node', 540, 660);

    context.beginPath();
    context.rect(480, 560, 50, 30);
    context.fillStyle = 'yellow';
    context.fill();


    context.beginPath();
    context.rect(480, 600, 50, 30);
    context.fillStyle = 'pink';
    context.fill();
    

    context.beginPath();
    context.rect(480, 640, 50, 30);
    context.fillStyle = 'blue';
    context.fill();
   
    function fillCircle(x, y, color) {

        context.fillStyle = color;

        context.beginPath();
        context.arc(x, y,50, 0, 2 * Math.PI);//x=width,y=height
      
        context.fill();
        //context.stroke();
    }

   fillCircle(100, 75,  'yellow');
   fillCircle(450, 75,  'yellow');
   fillCircle(100, 300,  'pink');
   fillCircle(450, 300,  'pink');
   fillCircle(275, 525,  'blue');
  
//-------------------------------ARROW------------------------------------
   var canvas = document.querySelector('#my-canvas');
    var context = canvas.getContext('2d');
    context.beginPath();

function canvas_arrow(context, fromx, fromy, tox, toy) {
  var headlen = 20; // length of head in pixels
  var dx = tox - fromx;
  var dy = toy - fromy;
  var angle = Math.atan2(dy, dx);
  context.moveTo(fromx, fromy);
  context.lineTo(tox, toy);
  context.lineTo(tox - headlen * Math.cos(angle - Math.PI / 6), toy - headlen * Math.sin(angle - Math.PI / 6));
  context.moveTo(tox, toy);
  context.lineTo(tox - headlen * Math.cos(angle + Math.PI / 6), toy - headlen * Math.sin(angle + Math.PI / 6));
}           
canvas_arrow(context, 102, 125, 102, 250);
canvas_arrow(context, 452, 125, 452, 250);
canvas_arrow(context, 102, 350, 275, 475);
canvas_arrow(context, 452, 350, 275, 475);
context.stroke();

//------------------------------NUMBERING CIRCLE-----------------------------------
var canvas = document.querySelector('#my-canvas');
    var context = canvas.getContext('2d');
   
function fillText(num,x,y) {
    context.beginPath();
 
    context.textAlign = 'center';
    context.stroke();

}
context.fillText('3', 450, 80);
context.fillText('4', 90, 80);
context.fillText('1', 100,310);
context.fillText('2', 450,310);
context.fillText('5', 275,525);
context.stroke();

</script>";
?>
</div>
</body>
</html>