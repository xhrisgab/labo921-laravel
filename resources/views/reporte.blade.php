@extends('base');

@section('content')
    <div class="container">
        <br>
        <a href="index.php" class="btn btn-primary">Volver...</a>
        <br>
        <canvas id="myChart" width="100wv" height="20%" style="background: whitesmoke"></canvas>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctx = document.getElementById('myChart');
        const host1 = "<?php echo $host ?>"
        new Chart(ctx, {
            type: 'line',
            data: {
                labels: <?php echo $fechas ?>, //['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
                datasets: [{
                    label: 'Reporte del Host: '+ host1,
                    data: <?php echo $ping ?>, //[12, 19, 3, 5, 2, 3],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
@endsection
