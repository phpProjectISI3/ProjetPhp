@extends('BackOfficeAdmin.AdminLayout')

@section('title','Statistiques')
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}" />
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
<script src="/js/modernizr-2.6.2.min.js"></script>
<style>
    /* canvas {
        background: #161619;
    } */

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

    .grid-container {
        display: grid;
        grid-template-columns: auto auto;
        /* background-color: #2196F3; */
        padding: 10px;
    }

    .grid-itemm {
        background-color: rgba(255, 255, 255, 0.8);
        border: 1px solid rgba(0, 0, 0, 0.8);
        /* padding: 20px; */
        /* font-size: 30px; */
        /* text-align: center; */
    }

    #containerChart2,
    #containerStats {
        width: 100%;
        border-radius: 20px;
        margin: 3%;
        margin-top: 0%;
        border-radius: 20px;
    }

    #containerStats {
        margin: 0px 0px 0px 3px;
    }

    .tableCell {
        width: 400px;
        padding-top: 20px;
        padding-bottom: 20px;
    }
</style>

@section('content')
<div class='' style="margin-top: 3%;">
    <div class="grid-container">
        <div class="card shadow-lg p-3 mb-5 bg-white grid-itemm" style="border-radius: 20px;">
            <header style="text-align: center">Demandes logements</header>
            <canvas width="330" height="400" id="myChart"></canvas>
        </div>


        <div class="card shadow-lg p-3 mb-5 bg-white grid-itemm" id="containerChart2">
            <canvas width="800" height="450" id="line-chart"> </canvas>
        </div>
    </div>

    <div class="shadow-lg p-3 mb-5 bg-white" id="containerStats">
        <table>
            <tr>
                <td class="tableCell">
                    Annulée aprées accordation : <span style="text-decoration: underline; font-weight: 900;font-style: italic;">13</span>
                </td>
                <td class="tableCell">
                    Clients en total : <span style="text-decoration: underline; font-weight: 900;font-style: italic;">15</span>
                </td>
                <td class="tableCell">
                    Demandes en total : <span style="text-decoration: underline; font-weight: 900;font-style: italic;">21</span>
                </td>
            </tr>
            <tr>
                <td class="tableCell">
                    Derniére accordation : <span style="text-decoration: underline; font-weight: 900;font-style: italic;">26 Mai 2020</span>
                </td>
                <td class="tableCell">
                    Logements en total : <span style="text-decoration: underline; font-weight: 900;font-style: italic;">10</span>
                </td>
                <td class="tableCell">
                    Paiyements : <span style="text-decoration: underline; font-weight: 900;font-style: italic;"> 1</span>
                </td>
            </tr>
            <tr>
                <td class="tableCell">
                    Derniére annulation : <span style="text-decoration: underline; font-weight: 900;font-style: italic;">10 Mai 2020</span>
                </td>
                <td class="tableCell">
                    Logement en VRAC : <span style="text-decoration: underline; font-weight: 900;font-style: italic;">Studio charifa <br>double vue mer</span>
                </td>
                <td class="tableCell">
                    Admin : <span style="text-decoration: underline; font-weight: 900;font-style: italic;"> 4</span>
                </td>
            </tr>
            <tr>
                <td class="tableCell">
                    Derniére demande : <span style="text-decoration: underline; font-weight: 900;font-style: italic;"> 14 Mai 2020</span>
                </td>
                <td class="tableCell">
                </td>
                <td class="tableCell">
                </td>
            </tr>
        </table>
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
        new Chart(document.getElementById("line-chart"), {
            type: 'line',
            data: {
                labels: [0, "Janvier", "Février", "Mars", "Avril", "Mai", "Juin", "Juillet", "Aout", "Septembre", "Oktober", "November", "Décembre"],
                datasets: [{
                    data: [0, 1000, 800, 760, 870, 900, 950, 1000, 900, 532, 1100, 1250, 1400],
                    label: "en Dirhams",
                    borderColor: "#3e95cd",
                    fill: false
                }]
            },
            options: {
                title: {
                    display: true,
                    text: "Gains d'argent (par mois)",
                    fontSize: 15,
                }
            }
        });
    </script>
    <script>
        let ctx = document.getElementById("myChart").getContext("2d");

        Chart.defaults.global.defaultFontColor = "#888";
        Chart.defaults.global.maintainAspectRatio = true;

        let t = "0.8";

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
                labels: ["En attente", "Accordées", "Refusées", "Annulées", "Payées"],
                datasets: [{
                    label: "Demandes",
                    backgroundColor: [
                        `rgba(241, 224, 90, ${t})`,
                        `rgb(227, 76, 38, ${t})`,
                        "#F57C70",
                        "#FF0000",
                        "#803CBE"
                    ],
                    borderColor: [
                        "#f1e05a",
                        "#e34c26",
                        "#F57C70",
                        "#FF0000",
                        "#803CBE"
                    ],
                    borderWidth: 2.4,
                    data: [20, 10, 50, 5, 5],
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
                    position: "bottom",
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