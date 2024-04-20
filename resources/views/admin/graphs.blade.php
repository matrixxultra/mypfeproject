@extends('admin.master')
@section('object')
Statistiques
@endsection
@section("main")

<div class="chart-container">
    <canvas id="stagiairesChart" ></canvas>
</div>

<style>
    .chart-container {
    width: 600px; /* Adjust the width as needed */
    height: 400px; /* Adjust the height as needed */
    margin: 0 auto; /* Center the container horizontally */
}

#stagiairesChart {
    width: 100%;
    height: 100%;
}

</style>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    var ctx = document.getElementById('stagiairesChart').getContext('2d');
    var stagiairesChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: [
                @foreach($stagiairesByFiliere as $stagiaire)
                    '{{ $stagiaire->filiere }}',
                @endforeach
            ],
            datasets: [{
                label: 'Total Stagiaires by Filiere',
                data: [
                    @foreach($stagiairesByFiliere as $stagiaire)
                        {{ $stagiaire->total }},
                    @endforeach
                ],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                    // Add more colors as needed
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                    // Add more colors as needed
                ],
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

@endsection('main')
