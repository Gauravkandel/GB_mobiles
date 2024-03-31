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
                    <a href="/products" title="Go back to Product list">
                        <span class="uil uil-step-backward"></span>
                        <span>Products&nbsp;list</span>
                    </a>
                </button>
            </div>

            <?php $count = 0; ?>
            <form action="/forcedelete" method="POST">
                @csrf
                <div class="multi-delete">
                    <button type="submit" title="Delete Selected">Delete&nbsp;Multiple</button>
                    <button type="submit" formaction="/restorestock"
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
                    @if ($product->count() < 1)
                        <div class="activity">Nothing to show here.</div>
                    @else
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
                                        <td>{{ $prod->Price }}</td>
                                        <td>{{ $prod->RAM_HDD }} </td>
                                        <td>{{ $prod->Company_name }} </td>
                                        <td class="actions">

                                            <a class="delete" href={{ 'delete/' . $prod['id'] }}
                                                title="Permanently Delete"><span class='bx bxs-trash'>Delete</span></a>
                                            <a class="restore" href={{ 'restore/' . $prod['id'] }}
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
