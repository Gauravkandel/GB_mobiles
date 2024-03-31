<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>View item</title>
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css" />
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/solid.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/boxicons/2.1.0/css/boxicons.min.css"
        integrity="sha512-pVCM5+SN2+qwj36KonHTDNEpUTHQoQUJMHLrErGJyHg89uy71MyuHDjKvvetKhXGc/ZG5REYTT6ltKfExEei/Q=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="/js/canvasjs.min.js"></script>
    <link rel="stylesheet" href="/css/viewitem_css.css">
</head>

<body>
    <div class="active">
        {{-- ----------------------------sidebar section------------------------ --}}
        <x-sidebar :message="$username->name" />



        {{-- ------------------------------Section Container----------------------- --}}
        <section class="main_container" id="container">
            <div class="section_container">
                <div class="section_content">
                    <a href="">
                        <span class="bx bxs-store"></span>
                        <span>Product Details</span>
                    </a>
                </div>
                <div class="individual">
                    <div class="view_data">
                        <div class="data">
                            <h2 style="padding-bottom:20px ;"><u>Specifications</u></h2>
                            <div class="specs"><b>Device Name: </b>{{ $data->Item_name }}</div><br>
                            <div class="specs"><b>Price: </b>{{ $data->Price }}</div><br>
                            <div class="specs"><b>RAM/HDD: </b>{{ $data->RAM_HDD }}</div><br>
                            <div class="specs"><b>Company: </b>{{ $data->Company_name }}</div><br>
                            <div class="specs"><b>Design: </b>{{ $data->Design }}</div><br>
                            <div class="specs"><b>Display: </b>{{ $data->Display }}</div><br>
                            <div class="specs"><b>Connectivity: </b>{{ $data->Connectivity }}</div><br>
                        </div>
                        <div class="item-image">
                            <img class="imageitem" src="/{{ $data->Img_phone }}" alt="" srcset="">
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <script src="/js/toggle.js"></script>
</body>

</html>
