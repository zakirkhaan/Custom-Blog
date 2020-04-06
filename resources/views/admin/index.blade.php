@extends('layouts.admin')


@section('content')

    <h1>Admin</h1>


    <canvas id="myChart"></canvas>

    <hr>

@stop

@section('scripts')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>

    <script>
        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Posts', 'Categories', 'Comments', 'Users'],
                datasets: [{
                    label: 'Data Analytics',
                    data: [ {{$postsCount}}, {{$categoriesCount}}, {{$commentsCount}}, {{$usersCount}}],
                    backgroundColor: [
                        'rgba(0,84,255,0.73)',
                        'rgb(30,235,0)',
                        'rgba(251,255,20,0.6)',
                        'rgba(192,13,38,0.85)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgb(0,69,255)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 2
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
    </script>

@stop