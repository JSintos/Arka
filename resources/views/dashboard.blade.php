@extends('layouts.header')
@section('content')
@section('title','ARKA')

</div>
</nav>

<div class="admin">
    <div class="side-bar">
            <div class="menu">
                <div class="item">
                    <a class="sub-btn"><i class="fas fa-chart-simple"></i>Charts<i class="fas fa-angle-right dropdown"></i></a>
                    <div class="sub-menu">
                        <a href="#feedback" class="sub-item">Feedback</a>
                        <a href="#badges" class="sub-item">Badges</a>
                    </div>
                </div>
                <div class="item"><a href="#communities"><i class="fas fa-people-group"></i>Communities</a></div>
                <div class="item"><a href="#reports"><i class="fas fa-exclamation"></i>Reports</a></div>
                <div class="item"><a href="index.php"><i class="fas fa-arrow-right-from-bracket"></i>Logout</a></div>
            </div>
    </div>
    <div class="acontainer">
    <h2>Dashboard</h2>
        <section class = "acontent" id = "feedback"> 
          <h3>Feedback Chart</h3>
            <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
            <script type="text/javascript">
              google.charts.load('current', {'packages':['bar']});
              google.charts.setOnLoadCallback(drawStuff);

              function drawStuff() {
                var data = new google.visualization.arrayToDataTable([
                  ['Move', 'Percentage'],
                  ["Academic Motivation", 44],
                  ["Social Support", 31],
                  ["Call quality", 12],
                  ["Overall quality", 10],
                  ['Other', 3]
                ]);

                var options = {
                  width: 800,
                  legend: { position: 'none' },
                  chart: {
                    title: 'Sample Graph',
                    subtitle: 'sample graph for feedback' },
                  axes: {
                    x: {
                      0: { side: 'top', label: 'Feedback'} // Top x-axis.
                    }
                  },
                  bar: { groupWidth: "90%" }
                };

                var chart = new google.charts.Bar(document.getElementById('top_x_div'));
                // Convert the Classic options to Material options.
                chart.draw(data, google.charts.Bar.convertOptions(options));
              };
            </script>
          <div id="top_x_div" style="width: 800px; height: 600px;"></div> </section>

        <section class="acontent" id="badges">
          <h3>Badges Chart</h3>
        </section>
          
          <section class= "acontent" id="communities">
          <h3>Add a new Arka community</h3>
          <form>
            <div class="mb-3">
              <label for="communityId" class="form-label">Community ID</label>
              <input type="communityId" class="form-control" id="communityId" aria-describedby="communityId">
              <div id="communityId" class="form-text"></div>
            </div>
            <div class="mb-3">
              <label for="communityName" class="form-label">Community Name</label>
              <input type="communityName" class="form-control" id="communityName">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
        </section>
        <section class="acontent" id="reports">
          <h3>Review report</h3>
        </section>

  @endsection
