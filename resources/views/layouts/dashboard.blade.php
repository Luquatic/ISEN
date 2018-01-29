<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="/images/apple-icon.png" />
    <link rel="icon" type="image/png" href="/images/favicon.ico" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Project Kempenaer</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    <!-- Bootstrap core CSS     -->
    <link href="/css/bootstrap.min.css" rel="stylesheet" />
    <!--  Material Dashboard CSS    -->
    <link href="/css/material-dashboard.css" rel="stylesheet" />
    {{--<!--  CSS for Demo Purpose, don't include it in your project     -->--}}
    {{--<link href="/css/demo.css" rel="stylesheet" />--}}

    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href="http://fonts.googleapis.com/css?family=Roboto:400,700,300|Material+Icons" rel='stylesheet' type='text/css'>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <!-- Google bar chart -->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {'packages':['bar']});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['Dag', 'Vrachtwagens', 'Autos'],
                ['Maandag', 3, 20],
                ['Dinsdag', 2, 26],
                ['Woensdag', 2, 35],
                ['Donderdag', 3, 20],
                ['Vrijdag', 0, 30],
                ['Zaterdag', 2, 60],
                ['Zondag', 0, 10]
            ]);

            var options = {
                chart: {
                    title: 'Verkeer Kempenaerstraat',
                    subtitle: '',
                },
                bars: 'vertical' // Required for Material Bar Charts.
            };

            var chart = new google.charts.Bar(document.getElementById('barchart_material'));

            chart.draw(data, google.charts.Bar.convertOptions(options));
        }
    </script>
</head>
</head>

<body>
<div class="wrapper">
    <div class="sidebar" data-color="purple" data-image="/images/sidebar-1.jpg">
        <!--
    Tip 1: You can change the color of the sidebar using: data-color="purple | blue | green | orange | red"

    Tip 2: you can also add an image using data-image tag
-->
        <div class="logo">
            <a href="" class="simple-text">
                Project Kempenaer
            </a>
        </div>
        <div class="sidebar-wrapper"></div>
    </div>
    <div class="main-panel">
        <nav class="navbar navbar-transparent navbar-absolute">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#"> Material Dashboard </a>
                </div>
            </div>
        </nav>
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="card card-stats">
                            <div class="card-header" data-background-color="green">
                                <i class="material-icons">Totale verkeer</i>
                            </div>
                            <div class="card-content">
                                <p class="category">Vandaag gezien</p>
                                <h3 class="title">{{ $inout->count() }}</h3>
                            </div>
                            <div class="card-footer">
                                <div class="stats">
                                    Laatste 24 uur
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="card card-stats">
                            <div class="card-header" data-background-color="orange">
                                <i class="material-icons">Kentekens</i>
                            </div>
                            <div class="card-content">
                                <p class="category">Vandaag gezien</p>
                                <h3 class="title">{{ $kentekens->count() }}</h3>
                            </div>
                            <div class="card-footer">
                                <div class="stats">
                                    Laatste 24 uur
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="card card-stats">
                            <div class="card-header" data-background-color="blue">
                                <i class="material-icons">Vrachtwagens</i>
                            </div>
                            <div class="card-content">
                                <p class="category">Vandaag gezien</p>
                                <h3 class="title">{{ $vrachtwagens->where('created_at', '>=', Carbon::today())->count() }}</h3>
                            </div>
                            <div class="card-footer">
                                <div class="stats">
                                    Laatste 24 uur
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="card card-stats">
                            <div class="card-header" data-background-color="red">
                                <i class="material-icons">Langer als 2 uur</i>
                            </div>
                            <div class="card-content">
                                <p class="category">Alle voertuigen</p>
                                <h3 class="title">{{ $teLang->where('created_at', '>=', Carbon::today())->count() }}</h3>
                            </div>
                            <div class="card-footer">
                                <div class="stats">
                                    Laatste 24 uur
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="card card-stats">
                            <div class="card-header" data-background-color="red">
                                <i class="material-icons">Langer als 2 uur</i>
                            </div>
                            <div class="card-content">
                                <p class="category">Alleen vrachtwagens</p>
                                <h3 class="title">{{ $teLangVrachtwagens->where('created_at', '>=', Carbon::today())->count() }}</h3>
                            </div>
                            <div class="card-footer">
                                <div class="stats">
                                    Laatste 24 uur
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-content">
                                <div id="barchart_material" style="width: 900px; height: 500px;"></div>
                        </div>
                    </div>
                    {{--<div class="col-md-4">--}}
                        {{--<div class="card">--}}
                            {{--<div class="card-header card-chart" data-background-color="orange">--}}
                                {{--<div class="ct-chart" id="emailsSubscriptionChart"></div>--}}
                            {{--</div>--}}
                            {{--<div class="card-content">--}}
                                {{--<h4 class="title">Email Subscriptions</h4>--}}
                                {{--<p class="category">Last Campaign Performance</p>--}}
                            {{--</div>--}}
                            {{--<div class="card-footer">--}}
                                {{--<div class="stats">--}}
                                    {{--<i class="material-icons">access_time</i> campaign sent 2 days ago--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="col-md-4">--}}
                        {{--<div class="card">--}}
                            {{--<div class="card-header card-chart" data-background-color="red">--}}
                                {{--<div class="ct-chart" id="completedTasksChart"></div>--}}
                            {{--</div>--}}
                            {{--<div class="card-content">--}}
                                {{--<h4 class="title">Completed Tasks</h4>--}}
                                {{--<p class="category">Last Campaign Performance</p>--}}
                            {{--</div>--}}
                            {{--<div class="card-footer">--}}
                                {{--<div class="stats">--}}
                                    {{--<i class="material-icons">access_time</i> campaign sent 2 days ago--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-12">
                        <div class="card card-nav-tabs">
                            <div class="card-header" data-background-color="purple">
                                <div class="nav-tabs-navigation">
                                    <div class="nav-tabs-wrapper">
                                        <span class="nav-tabs-title">Tasks:</span>
                                        <ul class="nav nav-tabs" data-tabs="tabs">
                                            <li class="active">
                                                <a href="#profile" data-toggle="tab">
                                                    Code
                                                    <div class="ripple-container"></div>
                                                </a>
                                            </li>
                                            <li class="">
                                                <a href="#messages" data-toggle="tab">
                                                    Website
                                                    <div class="ripple-container"></div>
                                                </a>
                                            </li>
                                            <li class="">
                                                <a href="#settings" data-toggle="tab">
                                                    Database
                                                    <div class="ripple-container"></div>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="card-content">
                                <div class="tab-content">
                                    <div class="tab-pane active" id="profile">
                                        <table class="table">
                                            <tbody>
                                            <tr>
                                                <td>
                                                    <div class="checkbox">
                                                        <label>
                                                            <input type="checkbox" name="optionsCheckboxes" checked>
                                                        </label>
                                                    </div>
                                                </td>
                                                <td>Website maken</td>
                                                <td class="td-actions text-right">
                                                    <button type="button" rel="tooltip" title="Edit Task" class="btn btn-primary btn-simple btn-xs">
                                                        <i class="material-icons">edit</i>
                                                    </button>
                                                    <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-simple btn-xs">
                                                        <i class="material-icons">close</i>
                                                    </button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="checkbox">
                                                        <label>
                                                            <input type="checkbox" name="optionsCheckboxes" checked>
                                                        </label>
                                                    </div>
                                                </td>
                                                <td>Raspberry Pi gereed maken</td>
                                                <td class="td-actions text-right">
                                                    <button type="button" rel="tooltip" title="Edit Task" class="btn btn-primary btn-simple btn-xs">
                                                        <i class="material-icons">edit</i>
                                                    </button>
                                                    <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-simple btn-xs">
                                                        <i class="material-icons">close</i>
                                                    </button>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="tab-pane" id="messages">
                                        <table class="table">
                                            <tbody>
                                            <tr>
                                                <td>
                                                    <div class="checkbox">
                                                        <label>
                                                            <input type="checkbox" name="optionsCheckboxes" checked>
                                                        </label>
                                                    </div>
                                                </td>
                                                <td>Dashboard maken
                                                </td>
                                                <td class="td-actions text-right">
                                                    <button type="button" rel="tooltip" title="Edit Task" class="btn btn-primary btn-simple btn-xs">
                                                        <i class="material-icons">edit</i>
                                                    </button>
                                                    <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-simple btn-xs">
                                                        <i class="material-icons">close</i>
                                                    </button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="checkbox">
                                                        <label>
                                                            <input type="checkbox" name="optionsCheckboxes">
                                                        </label>
                                                    </div>
                                                </td>
                                                <td>Material design icons werkend maken</td>
                                                <td class="td-actions text-right">
                                                    <button type="button" rel="tooltip" title="Edit Task" class="btn btn-primary btn-simple btn-xs">
                                                        <i class="material-icons">edit</i>
                                                    </button>
                                                    <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-simple btn-xs">
                                                        <i class="material-icons">close</i>
                                                    </button>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="tab-pane" id="settings">
                                        <table class="table">
                                            <tbody>
                                            <tr>
                                                <td>
                                                    <div class="checkbox">
                                                        <label>
                                                            <input type="checkbox" name="optionsCheckboxes">
                                                        </label>
                                                    </div>
                                                </td>
                                                <td>Data verzamelen: week</td>
                                                <td class="td-actions text-right">
                                                    <button type="button" rel="tooltip" title="Edit Task" class="btn btn-primary btn-simple btn-xs">
                                                        <i class="material-icons">edit</i>
                                                    </button>
                                                    <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-simple btn-xs">
                                                        <i class="material-icons">close</i>
                                                    </button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="checkbox">
                                                        <label>
                                                            <input type="checkbox" name="optionsCheckboxes" checked>
                                                        </label>
                                                    </div>
                                                </td>
                                                <td>Data verzamelen: dag</td>
                                                <td class="td-actions text-right">
                                                    <button type="button" rel="tooltip" title="Edit Task" class="btn btn-primary btn-simple btn-xs">
                                                        <i class="material-icons">edit</i>
                                                    </button>
                                                    <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-simple btn-xs">
                                                        <i class="material-icons">close</i>
                                                    </button>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <div class="card">
                            <div class="card-header" data-background-color="orange">
                                <h4 class="title">Project leden</h4>
                                <p class="category">Hogeschool Leiden, minor sensortechnologie</p>
                            </div>
                            <div class="card-content table-responsive">
                                <table class="table table-hover">
                                    <thead class="text-warning">
                                    <th>ID</th>
                                    <th>Naam</th>
                                    <th>Email</th>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Bram Valstar</td>
                                        <td>s1092875@student.hsleiden.nl</td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Mathijs Uijtenbogaart</td>
                                        <td>s1089187@student.hsleiden.nl</td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>Jessey Fransen</td>
                                        <td>s1094286@student.hsleiden.nl</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <footer class="footer">
            <div class="container-fluid">
                <nav class="pull-left">
                    <ul>
                        <li>
                            <a href="#">
                                Home
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                Company
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                Portfolio
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                Blog
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </footer>
    </div>
</div>
</body>
<!--   Core JS Files   -->
<script src="/js/jquery-3.2.1.min.js" type="text/javascript"></script>
<script src="/js/bootstrap.min.js" type="text/javascript"></script>
<script src="/js/material.min.js" type="text/javascript"></script>
<!--  Charts Plugin -->
<script src="/js/chartist.min.js"></script>
<!--  Dynamic Elements plugin -->
<script src="/js/arrive.min.js"></script>
<!--  PerfectScrollbar Library -->
<script src="/js/perfect-scrollbar.jquery.min.js"></script>
<!--  Notifications Plugin    -->
<script src="/js/bootstrap-notify.js"></script>
<!--  Google Maps Plugin    -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
<!-- Material Dashboard javascript methods -->
<script src="/js/material-dashboard.js"></script>

</html>