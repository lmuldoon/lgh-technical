<!DOCTYPE html>
<html>
<head>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <script src="//cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css" />
</head>
<body>
<div>
  <canvas id="myChart"></canvas>
</div>
<table id="dataTable">
    <thead>
        <tr>
            <th>Dates</th>
            <th>Contracts</th>
            <th>Quotes</th>
            <th>Weekly Value</th>
        </tr>
    </thead>
    <tbody>
    <?php 
        foreach ($chartData as $c) {
            echo '<tr>';
            echo '<td>',$c->label,'</td>';
            echo '<td>',$c->bar1,'</td>';
            echo '<td>',$c->bar2,'</td>';
            echo '<td>',$c->line,'</td>';
            echo '</tr>';
        }
    ?>
    </tbody>
</table>

    <?php 
    $labels = array();
    $bar1 = array();
    $bar2 = array();
    $line = array();
    foreach ($chartData as $c) {
        array_push($labels,$c->label);
        array_push($bar1,$c->bar1);
        array_push($bar2,$c->bar2);
        array_push($line,$c->line);
    }
    

    ?>



    <script>
        $('#dataTable').DataTable( {

        });
        const ctx = document.getElementById('myChart');
        
        const mixedChart = new Chart(ctx, {
            data: {
                datasets: [{
                    type: 'bar',
                    label: 'Bar Dataset',
                    data: 
                    <?php 
                echo '[';
                $comma='';
                foreach ($bar1 as $a) {
                    echo $comma,"'",$a,"'";
                    $comma=',';
                }
                echo ']';
                ?>
                },{
                    type: 'bar',
                    label: 'Bar Dataset2',
                    data: 
                    <?php 
                echo '[';
                $comma='';
                foreach ($bar2 as $a) {
                    echo $comma,"'",$a,"'";
                    $comma=',';
                }
                echo ']';
                ?>
                },{
                    type: 'line',
                    label: 'Line Dataset',
                    data: <?php 
                echo '[';
                $comma='';
                foreach ($line as $a) {
                    echo $comma,"'",$a,"'";
                    $comma=',';
                }
                echo ']';
                ?>
                }],
                labels: 
                <?php 
                echo '[';
                $comma='';
                foreach ($labels as $a) {
                    echo $comma,"'",$a,"'";
                    $comma=',';
                }
                echo ']';
                ?>
                
                /*['January', 'February', 'March', 'April']*/
            },
            options: {
    scales: {
      myScale: {
        type: 'logarithmic',
        position: 'right', // `axis` is determined by the position as `'y'`
      }
    }
  }
        });
    </script>
</body>
</html>
