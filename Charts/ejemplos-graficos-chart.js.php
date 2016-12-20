<?php
	try{
      $conn = new PDO('pgsql:host=localhost;port=5432;dbname=suapi;user=postgres;password=');
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }catch(PDOException $e){
        echo "Error: ".$e->getMessage();
    }
  $st = $conn->prepare("SELECT a.nombre,count(*) from ciencias c join area_conocimiento a on (a.id = c.id_area) group by a.nombre order by count asc");
  $st->execute();
  $data = $st->fetchAll(); 
  $label=[];
  $datos=[];
  //var_dump($data[0]['count']);
  $i=0;
  foreach ($data as $dato) {
   $label[$i]=$dato['nombre'];
   $datos[$i]=$dato['count'];
   $i++;
  }
  var_dump($datos);
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>Ejemplos de gr&#225;ficos usando Chart.js</title>
<meta name ="author" content ="Norfi Carrodeguas">
</head>
<body>  	  
<h1>Ejemplos de gr&#225;ficos usando Chart.js</h1><br>

<script src="Chart.js"></script>
<div id="canvas-holder">
<canvas id="chart-area3" width="10" height="10">
</canvas>
</div>
<script>
var label=<?php echo json_encode($label);?>;
var datos=<?php echo json_encode($datos);?>;
	var barChartData = {
		labels : label,
		datasets : [
			{
				fillColor : "#6b9dfa",
				strokeColor : "#ffffff",
				highlightFill: "#1864f2",
				highlightStroke: "#ffffff",
				data : datos
			}
		]
	}	
		

var ctx3 = document.getElementById("chart-area3").getContext("2d");

			
window.myPie = new Chart(ctx3).Bar(barChartData, {responsive:true});
	
</script>
</body>
</html>
