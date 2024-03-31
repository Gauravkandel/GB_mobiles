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
    <link rel="stylesheet" href="/css/insert-products_css.css">
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
                        <span class="bx bxs-layer-plus"></span>
                        <span>Add&nbsp;Items</span>
                    </a>
                </div>
                @if (Session::get('fails'))
                    <div class="fails">{{ Session::get('fails') }}</div>
                @endif
                @if (Session::get('success'))
                    <div class="success">{{ Session::get('success') }}</div>
                @endif
                <div class="form">
                    <form action="/insertprod" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="prod-data">
                            <div class="part1">
                                <div class="name inserting-value">
                                    <label for="">Name:</label>
                                    <input type="text" name="itemname" placeholder="Enter Item name"
                                        value="{{ old('itemname') }}">
                                    <span class="error">
                                        @error('itemname')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                                <div class="price inserting-value">
                                    <label for="">Price:</label>
                                    <input pattern="[0-9]*" type="text" name="price" placeholder="Enter Price"
                                        value="{{ old('price') }}">
                                    <span class="error">
                                        @error('price')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                                <div class="ram inserting-value">
                                    <label for="">RAM/HDD:</label>
                                    <input type="text" name="ram" placeholder="Enter RAM and HDD capacity"
                                        value="{{ old('ram') }}">
                                    <span class="error">
                                        @error('ram')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                                <div class="stock inserting-value">
                                    <label for="">Stock:</label>
                                    <input pattern="[0-9]*" type="text" name="stock"
                                        placeholder="Enter no.of items to add" value="{{ old('stock') }}">
                                    <span class="error">
                                        @error('stock')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>
                            <div class="part2">
                                <div class="design inserting-value">
                                    <label for="">Design:</label>
                                    <input type="text" name="design" placeholder="Design details"
                                        value="{{ old('design') }}">
                                    <span class="error">
                                        @error('design')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                                <div class="display inserting-value">
                                    <label for="">Display:</label>
                                    <input type="text" name="display" placeholder="Display details"
                                        value="{{ old('display') }}">
                                    <span class="error">
                                        @error('display')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                                <div class="connectivity inserting-value">
                                    <label for="">Connectivity:</label>
                                    <input type="text" name="connect" placeholder="Connectivity details"
                                        value="{{ old('connect') }}">
                                    <span class="error">
                                        @error('connect')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                                <div class="company inserting-value">
                                    <label for="">Company:</label>
                                    <input type="text" name="company" placeholder="Enter Company name"
                                        value="{{ old('company') }}">
                                    <span class="error">
                                        @error('company')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                                <br>
                            </div>
                        </div>
                        <div class="images inserting-value">
                            <label for="">Image:</label>
                            <input type="file" name="image" placeholder="Insert image">
                            <span class="error">
                                @error('image')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <button type="submit" class="submit">Insert</button>
                    </form>

                </div>

            </div>
            {{-- --------Other Content---------- --}}
            <div class="scroll">Scroll down <i class='bx bx-down-arrow-alt'></i></div>
        </section>

        {{-- ------------------------section End------------------------------- --}}
    </div>
    <script src="/js/toggle.js"></script>

</body>

</html>
