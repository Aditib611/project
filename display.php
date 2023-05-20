<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://unpkg.com/konva@8.4.2/konva.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>Graph Visualizer</title>
    <link href="style.css" rel="stylesheet" />
</head>
<body>
  <div class="bg">
<h1> <center>Graph Visualizer</center></h1>
  <nav >
  <div class="dropdown">
  
    <button onclick="myFunction()" class="dropbtn">Databases</button>
    <div id="myDropdown" class="dropdown-content">
      <a href="wsngraph2.php" target="_parent">cfm_sensors_configuration_01</a>
      <a href="wsngraph3.php" target="_parent">cfm_sensors_configuration_03</a>
      <a href="config4.php" target="_parent">cfm_sensors_configuration_04</a>
      <a href="config5.php" target="_parent">cfm_sensors_configuration_05</a>
      <a href="nagpur2.php" target="_parent">cfm_sensors_configuration_ceat_nagpur</a>
      <a href="wsngraph1.php" target="_parent">wireless_sensors_network</a>
  
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
</div>
</body>
</html>