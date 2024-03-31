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
    <link rel="stylesheet" href="/css/placeorder_css.css">
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
                        <span class="bx bxs-receipt"></span>
                        <span>Place&nbsp;Orders</span>
                    </a>
                </div>
                <div class="sucerror" id="sucerror">
                    <div id="errormsg"></div>
                    @if (Session::get('success'))
                        <div class="success">{{ Session::get('success') }}</div>
                    @endif
                </div>
                <br>
                <div class="order-container">
                    <div class="add-container">
                        <form action="/addorder" method="POST" class="form_add">
                            @csrf
                            <input type="number" pattern='[0-9]*' name="add" class="adddata">
                            <button type="submit" class="add">Add</button>
                            <span class="error">
                                @error('add')
                                    {{ '*' . $message }}
                                @enderror
                            </span>
                        </form>
                        <form action="/takeorder" method="POST" class="formfield" onsubmit="return validate();">
                            @csrf
                            <div class="billno">
                                <input type="number" pattern="[0-9]*" id="bill" name="bill" class="billdata">
                                <span><b>Bill&nbsp;no.</b></span><br>
                                <span id="billerr"></span>
                            </div>
                            <div class="tabledata">
                                <table>
                                    <thead>
                                        <tr>
                                            <th>Item</th>
                                            <th>Quantity</th>
                                            <th>Price</th>
                                            <th>Stock</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @for ($i = Session::get('data') ?? 1; $i > 0; $i--)
                                            <tr>
                                                <td>
                                                    <select name="itemname[]" class="forall"
                                                        id="select{{ $i }}">
                                                        <option></option>
                                                        @foreach ($data as $item)
                                                            @if ($item->In_stock == 0)
                                                                <option style="background-color: red; color:white;">
                                                                    {{ $item->Item_name }}</option>
                                                            @else
                                                                <option>{{ $item->Item_name }}</option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                    <span class="error">
                                                        @error('Itemname')
                                                            {{ $message }}
                                                        @enderror
                                                    </span>
                                                </td>
                                                <td>
                                                    <input type="number" class="quant"
                                                        id="quantity{{ $i }}" name="quantity[]">
                                                    <span class="error">
                                                        @error('quantity')
                                                            {{ $message }}
                                                        @enderror
                                                    </span>
                                                </td>
                                                <td>

                                                    <input type="number" class="price" id="price{{ $i }}"
                                                        disabled>
                                                </td>
                                                <td>
                                                    <input type="number" class="stock" id="quant{{ $i }}"
                                                        disabled>
                                                </td>
                                            </tr>
                                        @endfor
                                    </tbody>
                                </table>
                            </div>
                            <div class="disc all">
                                <label for="date">Discount:</label>
                                <input type="number" name="discount" class="discdata" id="disc">
                            </div>
                            <div class="total">
                                <span class="add" id="total">Total:</span><b id="span"></b>
                            </div>
                            <div class="flexitems">
                                <div class="datetime all">
                                    <label for="date">Date of Order:</label>
                                    <input type="date" name="date" class="date" id="date"
                                        style="cursor: pointer">
                                    <span id="dateerror">
                                    </span>
                                </div>
                                <div class="custname all">
                                    <label for="name">Customer Name:</label>
                                    <input type="text" name="custname" id="custname">
                                    <span id="nameerror">
                                    </span>
                                </div>
                            </div>
                            <div class="flexbutton">
                                <a href="#" target="_blank"><button type="submit"
                                        class="submitorder">Submit</button></a>&nbsp;
                                <button type="reset" class="submitorder"
                                    style="background-color: red">Reset</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        {{-- ------------------------section End------------------------------- --}}
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="/js/toggle.js"></script>
    <script src="/js/validate.js"></script>
    <script src="/js/ajax.js"></script>
</body>

</html>
