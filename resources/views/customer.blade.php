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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <div class="active">
        {{-- ----------------------------sidebar section------------------------ --}}
        <x-sidebar :message="$username->name" />


        {{-- ------------------------------Section Container----------------------- --}}
        <section class="main_container" id="container">
            <div class="section_container">
                <div class="section_content">
                    <a href="/trashdata">
                        <span class="uil uil-user"></span>
                        <span>Customers Details</span>
                    </a>
                </div>
            </div>
            <div class="trashdata">
                <button>
                    <a href="/trash-custdata" title="View deleted data">
                        <span class="bx bx-recycle"></span>
                        <span>Trash&nbsp;Bin</span>
                    </a>
                </button>
            </div>
            <form action="/multi-trash-cust" method="POST">
                @csrf
                <div class="multi-delete">
                    <button type="submit" title="Move to trash Selected">Move&nbsp;To&nbsp;Bin</button>
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
                <?php $count = 0; ?>
                @if ($customer->count() < 1)
                    <div class="activity">Nothing to show here.</div>
                @else
                    <div class="search_data">
                        <span style="font-family: sans-serif;padding-right:2px;cursor:pointer;">Search</span>
                        <input type="text" placeholder="Search here..." id="search">
                    </div>
                    <div class="tabledata">
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
                                        <td>{{ $cust->Total_after_discount }} /-</td>
                                        <td class="actions">
                                            <a class="delete" href={{ 'trashcust/' . $cust['id'] }}
                                                title="Move to trash">
                                                <span class='bx bxs-trash'>Trash</span>
                                            </a>
                                            <a class="edit" href={{ 'downloadcust/' . $cust['Bill_num'] }}
                                                title="Download Data">
                                                <span class='bx bxs-download'></span>
                                            </a>
                                            <a class="view" href={{ 'viewcust/' . $cust['Bill_num'] }}
                                                title="View data">
                                                <span class='uil uil-eye'></span>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tbody id="content">

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
    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'csrftoken': '{{ csrf_token() }}'
            }
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#search').on('keyup', function() {
                var value = $(this).val();
                if (value) {
                    $('#allcontent').hide();
                    $('#content').show();
                } else {
                    $('#allcontent').show();
                    $('#content').hide();
                }
                $.ajax({
                    type: "get",
                    url: "/searchcust",
                    data: {
                        'search': value
                    },
                    success: function(data) {
                        $('#content').html(data);
                    }
                });
            });
        });
    </script>
    <script>
        $(function(e) {
            $("#checkall").click(function() {
                $(".checkbox").prop('checked', $(this).prop('checked'));
            });
        });
    </script>
</body>

</html>
