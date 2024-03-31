<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sidebar</title>
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/boxicons/2.1.0/css/boxicons.min.css"
        integrity="sha512-pVCM5+SN2+qwj36KonHToF2p1oIvoU3bsqxphdOIWMYmgr4ZqD3t5DjKvvetKhXGc/ZG5REYTT6ltKfExEei/Q=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="/css/sidebar_css.css" />
</head>

<body>

    <div class="sidebar" id="sidebar">
        <div class="logo_name">
            <div class="image">
                <img src="/image/loho.png" alt="" />
                <span class="mobiles">Mobiles</span>
                {{-- <span class="uil uil-angle-left toggle" id="tog1" onclick="toggledash();" style="display:flex;" ></span>
                <span class="uil uil-angle-right toggle" id="tog2" style="display:none;" onclick="toggledash2();"></span> --}}
            </div>
        </div>
        <div class="nav_links">
            <div class="nav_menus">
                <ul>
                    <li>
                        <a href="/dash" class="menu1"><span class="uil uil-estate"></span>
                            <span class="respon_dash">Dashboard</span></a>
                    </li>
                    <li>
                        <a href="/analytics" class="menu2"><span class="uil uil-graph-bar"></span>
                            <span class="respon_dash">Analytics</span></a>
                    </li>
                    <li>
                        <a href="/additems" class="menu3"><span class="bx bx-cart"></span>
                            <span class="respon_dash">Add&nbsp;Items</span></a>
                    </li>
                    <li>
                        <a href="/orderplace" class="menu4"><span class="bx bx-receipt"></span>
                            <span class="respon_dash">Place Order</span></a>
                    </li>
                </ul>
            </div>
            <div class="users">
                <ul>
                    <li>
                        <a href="/logout" onclick="confirm('Are you sure you want to logout?')"><span
                                class="uil uil-signout"></span>
                            <span class="respon_dash">LogOut</span></a>
                    </li>
                    <li>
                        <a href="" title="{{ $username }}"><span class="uil uil-user"></span>
                            <span class="respon_dash">{{ $username }}</span></a>
                    </li>
                </ul>
                <!-- <div onclick="func();" id="">dark</div> -->
            </div>
        </div>
    </div>
    <!-- <script>
        function func() {
            var element = document.getElementById("active");
            element.classList.toggle("active");
        }
    </script> -->
</body>

</html>
