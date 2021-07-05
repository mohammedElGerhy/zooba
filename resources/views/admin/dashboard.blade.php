<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
    <meta name="author" content="GeeksLabs">
    <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
    <link rel="shortcut icon" href="{{asset('NiceAdmin/img/favicon.png')}}">
  <!--
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    -->
    <title>@yield('title')</title>

    <!-- Bootstrap CSS -->
    <link href="{{asset('NiceAdmin/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- bootstrap theme -->
    <link href="{{URL::asset('NiceAdmin/css/bootstrap-theme.css')}}" rel="stylesheet">
    <!--external css-->
    <link href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
    <link href="//cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="/DataTables/datatables.css">
    <!-- font icon -->
    <link href="{{asset('NiceAdmin/css/elegant-icons-style.css')}}" rel="stylesheet" />
    <link href="{{asset('NiceAdmin/css/font-awesome.min.css')}}" rel="stylesheet" />
    <!-- full calendar css-->
    <link href="{{asset('NiceAdmin/assets/fullcalendar/fullcalendar/bootstrap-fullcalendar.css')}}" rel="stylesheet" />
    <link href="{{asset('NiceAdmin/assets/fullcalendar/fullcalendar/fullcalendar.css')}}" rel="stylesheet" />
    <!-- easy pie chart-->
    <link href="{{asset('NiceAdmin/assets/jquery-easy-pie-chart/jquery.easy-pie-chart.css')}}" rel="stylesheet" type="text/css" media="screen" />
    <!-- owl carousel -->
    <link rel="stylesheet" href="{{asset('NiceAdmin/css/owl.carousel.css')}}" type="text/css">
    <link href="{{asset('NiceAdmin/css/jquery-jvectormap-1.2.2.css')}}" rel="stylesheet">
    <!-- Custom styles -->
    <link rel="stylesheet" href="{{asset('NiceAdmin/css/fullcalendar.css')}}">
    <link href="{{asset('NiceAdmin/css/widgets.css')}}" rel="stylesheet">
    <link href="{{asset('NiceAdmin/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('NiceAdmin/css/style-responsive.css')}}" rel="stylesheet" />
    <link href="{{asset('NiceAdmin/css/xcharts.min.css')}}" rel=" stylesheet">
    <link href="{{asset('NiceAdmin/css/jquery-ui-1.10.4.min.css')}}" rel="stylesheet">
    <!-- =======================================================
      Theme Name: NiceAdmin
      Theme URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
      Author: BootstrapMade
      Author URL: https://bootstrapmade.com
    ======================================================= -->
</head>

<body>
<!-- container section start -->
<section id="container" class="">


@include('admin.layouts.header')

<!--sidebar start-->
@include('admin.layouts.sidebar')
<!--sidebar end-->

    <!--main content start-->
@include('admin.layouts.footer')
@yield('content')

<!-- javascripts -->
    <script src="{{asset('NiceAdmin/js/jquery.js')}}"></script>
    <script src="{{asset('NiceAdmin/js/jquery-ui-1.10.4.min.js')}}"></script>
    <script src="{{asset('NiceAdmin/js/jquery-1.8.3.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('NiceAdmin/js/jquery-ui-1.9.2.custom.min.js')}}"></script>
    <!-- bootstrap -->
    <script src="{{asset('NiceAdmin/js/bootstrap.min.js')}}"></script>
    <!-- nice scroll -->
    <script src="{{asset('NiceAdmin/js/jquery.scrollTo.min.js')}}"></script>
    <script src="{{asset('NiceAdmin/js/jquery.nicescroll.js')}}" type="text/javascript"></script>
    <!-- charts scripts -->
    <script src="{{asset('NiceAdmin/assets/jquery-knob/js/jquery.knob.js')}}"></script>
    <script src="{{asset('NiceAdmin/js/jquery.sparkline.js')}}" type="text/javascript"></script>
    <script src="{{asset('NiceAdmin/assets/jquery-easy-pie-chart/jquery.easy-pie-chart.js')}}"></script>
    <script src="{{asset('NiceAdmin/js/owl.carousel.js')}}"></script>
    <!-- jQuery full calendar -->
    <<script src="{{asset('NiceAdmin/js/fullcalendar.min.js')}}"></script>
    <!-- Full Google Calendar - Calendar -->
    <script src="{{asset('NiceAdmin/assets/fullcalendar/fullcalendar/fullcalendar.js')}}"></script>
    <!--script for this page only-->
    <script src="{{asset('NiceAdmin/js/calendar-custom.js')}}"></script>
    <script src="{{asset('NiceAdmin/js/jquery.rateit.min.js')}}"></script>
    <!-- custom select -->
    <script src="{{asset('NiceAdmin/js/jquery.customSelect.min.js')}}"></script>
    <script src="{{asset('NiceAdmin/assets/chart-master/Chart.js')}}"></script>

    <!--custome script for all page-->
    <script src="{{asset('NiceAdmin/js/scripts.js')}}"></script>
    <!-- custom script for this page-->
    <script src="{{asset('NiceAdmin/js/sparkline-chart.js')}}"></script>
    <script src="{{asset('NiceAdmin/js/easy-pie-chart.js')}}"></script>
    <script src="{{asset('NiceAdmin/js/jquery-jvectormap-1.2.2.min.js')}}"></script>
    <script src="{{asset('NiceAdmin/js/jquery-jvectormap-world-mill-en.js')}}"></script>
    <script src="{{asset('NiceAdmin/js/xcharts.min.js')}}"></script>
    <script src="{{asset('NiceAdmin/js/jquery.autosize.min.js')}}"></script>
    <script src="{{asset('NiceAdmin/js/jquery.placeholder.min.js')}}"></script>
    <script src="{{asset('NiceAdmin/js/gdp-data.js')}}"></script>
    <script src="{{asset('NiceAdmin/js/morris.min.js')}}"></script>
    <script src="{{asset('NiceAdmin/js/sparklines.js')}}"></script>
    <script src="{{asset('NiceAdmin/js/charts.js')}}"></script>
    <script src="{{asset('NiceAdmin/js/jquery.slimscroll.min.js')}}"></script>
    <script src="//cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.js"></script>
    <script type="text/javascript" charset="utf8" src="/DataTables/datatables.js"></script>

    <!--
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
-->

    <script>
        $(document).ready( function () {
            $('#myTable').DataTable();
        } );
        $(document).ready( function () {
            $('#table_id').DataTable();
        } );
    </script>
    <script>
        //knob
        $(function() {
            $(".knob").knob({
                'draw': function() {
                    $(this.i).val(this.cv + '%')
                }
            })
        });

        //carousel
        $(document).ready(function() {
            $("#owl-slider").owlCarousel({
                navigation: true,
                slideSpeed: 300,
                paginationSpeed: 400,
                singleItem: true

            });
        });

        //custom select box

        $(function() {
            $('select.styled').customSelect();
        });

        /* ---------- Map ---------- */
        $(function() {
            $('#map').vectorMap({
                map: 'world_mill_en',
                series: {
                    regions: [{
                        values: gdpData,
                        scale: ['#000', '#000'],
                        normalizeFunction: 'polynomial'
                    }]
                },
                backgroundColor: '#eef3f7',
                onLabelShow: function(e, el, code) {
                    el.html(el.html() + ' (GDP - ' + gdpData[code] + ')');
                }
            });
        });
    </script>

    <script>
        $(document).ready(function () {

            $('select[name="citie_id"]').on('change', function () {

                var citie = $(this).val();
                if (citie){
                    $.ajax({
                        url: "{{ URL::to('admin/artists/create/Get_area/') }}/" + citie,
                        type: "GET",
                        dataType: "json",
                        success: function (data) {
                            $('select[name="area_id"]').empty();
                            $.each(data, function (key, value) {
                                $('select[name="area_id"]').append('<option value="' + key + '">' + value + '</option>');
                            });
                        },
                    });
                }else {
                    console.log('AJAX load did not work');
                }
            });
        });
    </script>

</body>

</html>
