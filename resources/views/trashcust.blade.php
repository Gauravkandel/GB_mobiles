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
    <link rel="stylesheet" href="/css/product_css.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/
font-awesome/6.2.0/css/all.min.css" />
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
                        <span class="fa-solid fa-trash"></span>
                        <span>Deleted Data</span>
                    </a>
                </div>
            </div>
            <div class="trashdata">
                <button>
                    <a href="/customers" title="Go back to Product list">
                        <span class="uil uil-user"></span>
                        <span>Customers&nbsp;list</span>
                    </a>
                </button>
            </div>
            <?php $count = 0; ?>
            <form action="/forcedeletecust" method="POST">
                @csrf
                <div class="multi-delete">
                    <button type="submit" title="Delete Selected">Delete&nbsp;Multiple</button>
                    <button type="submit" formaction="/restorecustomer"
                        style="background-color: rgb(97, 223, 219)">Restore&nbsp;Multiple</button>
                </div>
                @if (Session::get('success'))
                    <div class="success">
                        {{ Session::get('success') }}
                    </div>
                @endif

                @if (Session::get('fail'))
                    <div class="fail">
                        {{ Session::get('fail') }}
                    </div>
                @endif
                @if (Session::get('retry'))
                    <div class="fail">
                        {{ Session::get('retry') }}
                    </div>
                @endif
                <div class="tabledata">
                    @if ($customer->count() < 1)
                        <div class="activity">Nothing to show here.</div>
                    @else
                        <table class="input_data">
                            <thead>
                                <tr>
                                    <th>
                                        <input type="checkbox" id="checkall">
                                    </th>
                                    <th>ID</th>
                                    <th>Bill&nbsp;no.</th>
                                    <th>Name</th>
                                    <th>Date</th>
                                    <th>Total</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody id="allcontent">
                                @foreach ($customer as $cust)
                                    <tr>
                                        <td>
                                            <input type="checkbox" class="checkbox" name="id[{{ $cust->id }}]"
                                                value={{ $cust->id }}>
                                        </td>
                                        <td>{{ ++$count }}</td>
                                        <td>{{ $cust->Bill_num }}</td>
                                        <td>{{ $cust->Name }}</td>
                                        <td>{{ $cust->Time_Date }} </td>
                                        <td>{{ $cust->Total_after_discount }} </td>
                                        <td class="actions">
                                            <a class="delete" href={{ 'deletecust/' . $cust['id'] }}
                                                title="Permanently Delete"><span class='bx bxs-trash'>Delete</span></a>
                                            <a class="restore" href={{ 'restorecust/' . $cust['id'] }}
                                                title="Restore record"><span class='uis uis-history'>Restore</span></a>

                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                </div>
                @endif

            </form>
        </section>
        {{-- ------------------------section End------------------------------- --}}
    </div>
    <script src="/js/toggle.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $(function(e) {
            $("#checkall").click(function() {
                $(".checkbox").prop('checked', $(this).prop('checked'));
            });
        });
    </script>
</body>

</html>
