<!doctype html>
<html>
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://unpkg.com/konva@8.4.2/konva.min.js"></script>
    <script src="https://unpkg.com/konva@8.4.2/konva.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <meta charset="utf-8" />  
        <link href="style.css" rel="stylesheet" />
      <title>WSN Graph config 3</title>
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

  </style>
</head>
<body >
<h1> <center>Graph Visualizer</center></h1>
<button onclick="downloadCurrentPage()">Download Data</button>

    <!-- JavaScript function to handle the download button click -->
    <script>
        function downloadCurrentPage() {
            var htmlContent = document.documentElement.outerHTML;
            var blob = new Blob([htmlContent], { type: 'text/html' });
            var anchor = document.createElement('a');
            anchor.href = URL.createObjectURL(blob);
            anchor.download = 'wsngraph3.html';
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
  
  <canvas id="my-canvas" width="730" height="1000"></canvas>
  <div class="right">
    
    <h2>Data</h2>
   <table border="2"  cellborder="2" style="width:600px; ">
      <tr>
        <th>ID</th><th>DEVICE TYPE</th><th>MAC ADDRESS</th><th>REGTIME</th><th>NAME</th><th>LOCATION</th><th>CONFIG TIME</th><th>UPDATE TIME</th>
      
      </tr>
  <?php
   $con = mysqli_connect("localhost:3307","root","Aditi@6112","wsn_proj");
   //echo"connected successfully!<br><hr><br>";
   if (mysqli_connect_errno()) {
     echo "Failed to connect to MySQL: " . mysqli_connect_error();
     exit();
   }
   
   $query=mysqli_query($con ,"SELECT * FROM cfm_sensors_configuration_03");
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
   </div>
   </table>
  <?php echo"<script>

     var canvas = document.querySelector('#my-canvas');
    var context = canvas.getContext('2d');
    
    context.font = '18px Arial white';
   
    context.fillText('Sensor node', 520, 780);
    context.fillText('Repeater node', 520, 830);
    context.fillText('Cordinator node', 520, 880);
  

    context.beginPath();
    context.rect(460, 760, 50, 30);
    context.fillStyle = 'yellow';
    context.fill();
    //context.stroke();

    context.beginPath();
    context.rect(460, 810, 50, 30);
    context.fillStyle = 'pink';
    context.fill();
    //context.stroke();

    context.beginPath();
    context.rect(460, 860, 50, 30);
    context.fillStyle = 'blue';
    context.fill();
    //context.stroke();

    

    function fillCircle(x, y, color) {

context.fillStyle = color;

context.beginPath();
context.arc(x, y,50, 0, 2 * Math.PI);

context.fill();
//context.stroke();
}

fillCircle(200, 85,  'yellow');
fillCircle(450, 85,  'yellow');
fillCircle(130, 380,  'pink');
fillCircle(520, 380,  'pink');
fillCircle(200, 675,  'blue');
fillCircle(450, 675,  'blue');

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
canvas_arrow(context, 200, 135, 135, 330);
canvas_arrow(context,450, 135, 520, 330);
canvas_arrow(context, 135, 430, 200, 625);
canvas_arrow(context, 520,430 , 450, 625);
context.stroke();

//------------------------------NUMBERING CIRCLE-----------------------------------
function fillText(num,x,y) {
    context.beginPath();

    context.textAlign = 'center';
    context.stroke();

}
context.fillText('86',195 , 90);
context.fillText('87', 445, 90);
context.fillText('85', 120,385);
context.fillText('88', 515,385);
context.fillText('89', 195,680);
context.fillText('90', 445,680);
context.stroke();
</script>";
?>


</body>
</html>