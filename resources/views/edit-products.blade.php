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
        integrity="sha512-pVCM5+SN2+qwj36KonHTDNEpUTHQoQUJMHLrErGJyHg89uy71MyuHDjKvvetKhXGc/ZG5REYTT6ltKfExEei/Q=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="/js/canvasjs.min.js"></script>
    <link rel="stylesheet" href="/css/edit-products_css.css">
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
                        <span class="bx bxs-edit-alt"></span>
                        <span>Edit&nbsp;Items</span>
                    </a>
                </div>
                <div class="form">
                    <form action="/updateprod" method="POST">
                        @csrf
                        <div class="prod-data">
                            <input type="hidden" name="id" value="{{ $data['id'] }}">
                            <div class="name editing-value">
                                <label for="" class="heading">Name:</label>
                                <input type="text" name="itemname" value="{{ $data['Item_name'] }}">
                            </div>
                            <div class="price editing-value">
                                <label for="" class="heading">Price:</label>
                                <input pattern="[0-9]*" type="text" name="price" value="{{ $data['Price'] }}">
                            </div>
                            <div class="stock editing-value">
                                <label for="" class="heading">Stock:</label>
                                <input pattern="[0-9]*" type="text" name="stock" value="{{ $data['In_stock'] }}">
                            </div>
                            <div class="company editing-value">
                                <label for="" class="heading">Company:</label>
                                <input type="text" name="company" value="{{ $data['Company_name'] }}">
                            </div>
                            <br>
                            <button type="submit" class="submit">Update</button>
                        </div>
                    </form>

                </div>

            </div>
            {{-- --------Other Content---------- --}}

        </section>

        {{-- ------------------------section End------------------------------- --}}
    </div>
    <script src="/js/toggle.js"></script>

</body>

</html>
