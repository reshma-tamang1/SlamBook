 <?php  
 include("include/header.php");
    include("include/js.php");
    include("include/side_bar.php");
 $connect = mysqli_connect("localhost", "root", "", "social");  
 $query = "SELECT faculty, count(*) as number FROM users GROUP BY faculty";  
 $result = mysqli_query($connect, $query);  
 ?>  
 <!DOCTYPE html>  
 <html>  
      <head>  
           <title>Charts</title>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
           <link href="style/css/bootstrap.min.css" rel="stylesheet">
            <link href="style/css/k.css" rel="stylesheet">
              <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
           <script type="text/javascript" src="gstatic/loader.js"></script>
           <script type="text/javascript">  

           google.charts.load('current', {'packages':['corechart']});  
           google.charts.setOnLoadCallback(drawChart);  
           function drawChart()  
           {  
                var data = google.visualization.arrayToDataTable([  
                          ['faculty', 'Number'],  
                          <?php  
                          while($row = mysqli_fetch_array($result))  
                          {  
                               echo "['".$row["faculty"]."', ".$row["number"]."],";  
                          }  
                          ?>  
                     ]);  
                var options = {  
                      title: 'Percentage of Users From Different Faculty',  
                      is3D:true,  
                      pieHole: 0.4  
                     };  
                var chart = new google.visualization.PieChart(document.getElementById('piechart'));  
                chart.draw(data, options);  
           }  
           </script>  
           
      </head>  
      <body>  
           <br /><br />  
           <div style="width:700px;" align="center" class="pie_chart">
            <table cellspacing="10">
            <td><i class="fa fa-pie-chart" aria-hidden="true"><b><a href="designation.php">Designation Chart</a></b> </td>
            <td><i class="fa fa-pie-chart" aria-hidden="true"><b><a href="genderchart.php">Gender Chart</a></b></td> </table>
                <h3 align="center"><b>Pie Chart of Users of Different Faculty</b></h3>  
                <br />  
                <div id="piechart" style="width: 700px; height: 500px;"></div>  
                
           </div>  
          
      </body>  
 </html>  