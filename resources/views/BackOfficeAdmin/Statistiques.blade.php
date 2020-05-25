@extends('BackOfficeAdmin.AdminLayout')

@section('title','Statistiques')
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}" />
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
<script src="/js/modernizr-2.6.2.min.js"></script>
<style>
    canvas {
        background: #161619;
    }

    .card {
        width: 350px;
        background: #161619;
        /* position: absolute; */
        /* margin-top: 0%; */
    }

    /* .container {
        margin: auto;
        width: 330px;
        min-height: 500px;
    } */

    header {
        font-family: 'Arial';
        font-size: 1.8rem;
        padding: 10px 0;
    }
</style>

@section('content')
<div class='' style="margin-top: 5%;">
    <div class="card">
        <!-- <header style="text-align: center">Top Languages</header> -->
        <!-- <div class="container"> -->
        <canvas width="330" height="500" id="myChart"></canvas>
        <!-- </div> -->
        </>
    </div>



    <script src="{{ url('../js/jquery.js')}}">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.3/dist/Chart.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            $("#sidebar ul li.active").removeClass();
            $("#StatistiqueLink").addClass('active');
        });
    </script>
    <script>
        let ctx = document.getElementById("myChart").getContext("2d");

        Chart.defaults.global.defaultFontColor = "#888";
        Chart.defaults.global.maintainAspectRatio = true;

        let t = "0.55";

        let myChart = new Chart(ctx, {
            plugins: [{
                beforeInit: function(chart) {
                    chart.legend.afterFit = function() {
                        this.height = this.height + 20;
                    };
                }
            }],
            type: "pie",

            data: {
                labels: ["Python", "C#", "Objective-C", "Java", "Others", "CSS"],
                datasets: [{
                    label: "languages",
                    backgroundColor: [
                        `rgba(241, 224, 90, ${t})`,
                        `rgb(86, 61, 124, ${t})`,
                        `rgb(227, 76, 38, ${t})`,
                        `rgb(44, 62, 80, ${t})`,
                        `rgb(43, 116, 137, ${t})`,
                        `rgb(86, 61, 124, ${t})`
                    ],
                    borderColor: [
                        "#f1e05a",
                        "#563d7c",
                        "#e34c26",
                        "#2c3e50",
                        "#2b7489",
                        "#563d7c"
                    ],
                    borderWidth: 2.4,
                    data: [6, 6, 4, 3, 3, 2],
                    barThickness: 30
                }]
            },
            options: {
                cutoutPercentage: 65,
                // responsive: false,
                // scales: {
                //   yAxes: [
                //     {
                //       ticks: {
                //         beginAtZero: true
                //       }
                //     }
                //   ]
                // },
                legend: {
                    display: true,
                    position: "top",
                    align: "center",
                    labels: {
                        boxWidth: 7,
                        padding: 14,
                        usePointStyle: true
                    }
                },
                tooltips: {
                    mode: "point",
                    titleFontColor: "black",
                    bodyFontColor: "black",
                    backgroundColor: "#eee"
                }
            }
        });
    </script>
    @endsection