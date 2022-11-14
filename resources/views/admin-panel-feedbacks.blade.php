@extends('layouts.admin-header')
@include('layouts.admin-nav')
@section('content')
@section('title','ARKA-Admin') 
<div class="antialiased">

    <div id="linechart" style="width: 1000px; height: 500px"></div>

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        var feedbacks = <?php echo $feedbacks; ?>;
        console.log(feedbacks);
        google.charts.load('current', {
            'packages': ['corechart']
        });
        google.charts.setOnLoadCallback(lineChart);
        function lineChart() {
            var data = google.visualization.arrayToDataTable(feedbacks);
            var options = {
                title: 'Average Rating in Monthly Feedbacks',
                curveType: 'function',
                legend: {
                    position: 'bottom'
                },
                vAxis: {
                  title : 'Rating',
                  gridlines: {count: 7},
                  ticks: [0, 1,2,3,4,5, 6]
                },
                hAxis: {
                  title: 'Month',
                  gridlines: {count: 12},
                  ticks: [1,2,3,4,5,6,7,8,9,10,11,12]
                }
            };
            var chart = new google.visualization.LineChart(document.getElementById('linechart'));
            chart.draw(data, options);
        }        
    </script>
</div>

 @endsection