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
                        <span class="bx bxs-store"></span>
                        <span>Product Details</span>
                    </a>
                </div>
            </div>
            <div class="trashdata">
                <button>
                    <a href="/trashdata" title="View deleted data">
                        <span class="bx bx-recycle"></span>
                        <span>Trash&nbsp;Bin</span>
                    </a>
                </button>
            </div>
            <form action="/multi-trash" method="POST">
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
                @if ($product->count() < 1)
                    <div class="activity">Nothing to show here.</div>
                @else
                    <div class="search_data">
                        <span style="font-family: sans-serif;padding-right:2px;cursor:alias">Search</span>
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
                                    <th>Item&nbsp;Name</th>
                                    <th>Price</th>
                                    <th>RAM/HDD</th>
                                    <th>Stock</th>
                                    <th>Company</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody id="allcontent">
                                @foreach ($product as $prod)
                                    <tr>
                                        <td>
                                            <input type="checkbox" class="checkbox" name="id[{{ $prod->id }}]"
                                                value={{ $prod->id }}>
                                        </td>
                                        <td>{{ ++$count }}</td>
                                        <td>{{ $prod->Item_name }}</td>
                                        <td>{{ $prod->Price }}/-</td>
                                        <td>{{ $prod->RAM_HDD }} </td>
                                        <td>{{ $prod->In_stock }} </td>
                                        <td>{{ $prod->Company_name }} </td>
                                        <td class="actions">
                                            <a class="delete" href={{ 'trash/' . $prod['id'] }} title="Move to trash">
                                                <span class='bx bxs-trash'>Trash</span>
                                            </a>
                                            <a class="edit" href={{ 'edit/' . $prod['id'] }} title="Edit data">
                                                <span class='bx bxs-edit-alt'></span>
                                            </a>
                                            <a class="view" href={{ 'viewitem/' . $prod['id'] }} title="View data">
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
                    url: "/search",
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
