<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css" />
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/solid.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/boxicons/2.1.0/css/boxicons.min.css"
        integrity="sha512-pVCM5+SN2+qwj36KonHToF2p1oIvoU3bsqxphdOIWMYmgr4ZqD3t5DjKvvetKhXGc/ZG5REYTT6ltKfExEei/Q=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="/js/canvasjs.min.js"></script>
    <link rel="stylesheet" href="/css/analytics_css.css">
</head>

<body>
    <div class="active">
        {{-- ----------------------------sidebar section------------------------ --}}
        <x-sidebar componentName="{{ $username->name }}" />

        {{-- ------------------------------Section Container----------------------- --}}
        <section class="main_container" id="container">
            <div class="section_container">
                <div class="section_content">
                    <a href="">
                        <span class="uis uis-chart"></span>
                        <span>Analytics</span>
                    </a>
                </div>
            </div>
            <div class="chartcontainer">
                <div id="chartContainer1" class="chart_data"></div>
                <br>
                <div id="chartContainer2" class="chart_data"></div>
                <br>
            </div>
        </section>

        {{-- ------------------------section End------------------------------- --}}
    </div>
    <script src="/js/toggle.js"></script>
    <script>
        window.onload = function() {

            var chart1 = new CanvasJS.Chart("chartContainer1", {
                theme: "light2", // "light2", "dark1", "dark2"
                animationEnabled: true,
                zoomEnabled: true, // change to true		
                title: {
                    text: "Monthly Revenue Model"
                },
                data: [{
                    // Change type to "bar", "area", "spline", "pie",etc.
                    type: "spline",
                    indexlabel: '{label} ({y})',
                    dataPoints: <?php echo json_encode($data, JSON_NUMERIC_CHECK); ?>
                }]
            });
            chart1.render();
            var chart2 = new CanvasJS.Chart("chartContainer2", {
                theme: "light2", // "light2", "dark1", "dark2"
                animationEnabled: true,
                zoomEnabled: true, // change to true		
                title: {
                    text: "Monthly Revenue Model (Bar Diagram)"
                },
                data: [{
                    // Change type to "bar", "area", "spline", "pie",etc.
                    type: "bar",
                    indexlabel: '{label} ({y})',
                    dataPoints: <?php echo json_encode($data, JSON_NUMERIC_CHECK); ?>
                }]
            });
            chart2.render();
        }
    </script>
</body>

</html>
