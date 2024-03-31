<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/boxicons/2.1.0/css/boxicons.min.css"
        integrity="sha512-pVCM5+SN2+qwj36KonHToF2p1oIvoU3bsqxphdOIWMYmgr4ZqD3t5DjKvvetKhXGc/ZG5REYTT6ltKfExEei/Q=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="/css/dashboard_css.css">
    <script type="text/javascript" src="/js/vanilla-tilt.js"></script>

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
                        <span class="bx bxs-tachometer"></span>
                        <span>Dashboard</span>
                    </a>
                </div>
                <div class="grid_container">
                    <div class="grid_card card1" id="cards">
                        <a href="/products" class="card-content">
                            <h3>Total Stocks:</h3>
                            <span class="data">{{ $data1 }}</span>
                            <div class="content">
                                <span>Stocks</span>
                                <p>view Details</p>
                            </div>
                        </a>
                    </div>
                    <div class="grid_card card2" id="cards">
                        <a href="/customers" class="card-content">
                            <h3>Total&nbspCustomers:</h3>
                            <span class="data">{{ $data2 }}</span>
                            <div class="content">
                                <span>Customers</span>
                                <p>view Details</p>
                            </div>
                        </a>
                    </div>
                    <div class="grid_card card3" id="cards">
                        <a href="" class="card-content">
                            <h3>Total Orders:</h3>
                            <span class="data">10</span>
                            <div class="content">
                                <span>Orders</span>
                                <p>view Details</p>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="recent">
                <span class='bx bxs-time-five'></span>
                <h1>Recent&nbsp;Activities</h1>
            </div>
            <?php $count = 0; ?>

            <div class="tabledata">
                @if ($recent->count() < 1)
                    <div class="activity">There is no recent activities.</div>
                @else
                    <table class="input_data">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Bill&nbsp;Number</th>
                                <th>Name</th>
                                <th>Total(Rs.)</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($recent as $recentdata)
                                <tr>
                                    <td>{{ ++$count }}</td>
                                    <td>{{ $recentdata->Bill_num }}</td>
                                    <td>{{ $recentdata->Name }}</td>
                                    <td>{{ $recentdata->Total_after_discount }} /-</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

            </div>
            @endif

            {{-- --------Other Content---------- --}}

        </section>

        {{-- ------------------------section End------------------------------- --}}
    </div>
    <script src="/js/toggle.js"></script>

    <script>
        VanillaTilt.init(document.querySelectorAll("#cards"), {
            max: 25,
            speed: 400,
            glare: true,
            "max-glare": 1
        });
    </script>
</body>

</html>
