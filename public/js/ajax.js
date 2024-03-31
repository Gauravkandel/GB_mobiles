$.ajaxSetup({
    headers: {
        'csrftoken': '{{ csrf_token() }}'
    }
});
$(document).ready(function () {
    $('#select1').on('change', function () {
        // console.log(`.select${i}`);
        var value = $(this).val();
        // console.log(value);
        $.ajax({
            type: "get",
            url: "/selectprice",
            data: {
                'name': value
            },
            success: function (data) {
                // console.log(data);
                $('#price1').val(data.price);
                $('#quant1').val(data.quant);
            }
        });
    });
});
$(document).ready(function () {
    $('#select2').on('change', function () {
        // console.log(`.select${i}`);
        var value = $(this).val();
        // console.log(value);
        $.ajax({
            type: "get",
            url: "/selectprice",
            data: {
                'name': value
            },
            success: function (data) {
                // console.log(data);
                $('#price2').val(data.price);
                $('#quant2').val(data.quant);
            }
        });
    });
});
$(document).ready(function () {
    $('#select3').on('change', function () {
        // console.log(`.select${i}`);
        var value = $(this).val();
        // console.log(value);
        $.ajax({
            type: "get",
            url: "/selectprice",
            data: {
                'name': value
            },
            success: function (data) {
                // console.log(data);
                $('#price3').val(data.price);
                $('#quant3').val(data.quant);
            }
        });
    });
});
$(document).ready(function () {
    $('#select4').on('change', function () {
        // console.log(`.select${i}`);
        var value = $(this).val();
        // console.log(value);
        $.ajax({
            type: "get",
            url: "/selectprice",
            data: {
                'name': value
            },
            success: function (data) {
                // console.log(data);
                $('#price4').val(data.price);
                $('#quant4').val(data.quant);
            }
        });
    });
});
$(document).ready(function () {
    $('#select5').on('change', function () {
        // console.log(`.select${i}`);
        var value = $(this).val();
        // console.log(value);
        $.ajax({
            type: "get",
            url: "/selectprice",
            data: {
                'name': value
            },
            success: function (data) {
                // console.log(data);
                $('#price5').val(data.price);
                $('#quant5').val(data.quant);
            }
        });
    });
});
$(document).ready(function () {
    $('#quantity1').on('keyup', function () {
        var quant = $(this).val();
        var name = $('#select1').val();
        $.ajax({
            type: "get",
            url: "/changequant",
            data: {
                'quant': quant,
                'name': name
            },
            success: function (data) {
                // console.log(data);
                $('#price1').val(data);
            }
        });
    });
});
$(document).ready(function () {
    $('#quantity2').on('keyup', function () {
        var quant = $(this).val();
        var name = $('#select2').val();
        $.ajax({
            type: "get",
            url: "/changequant",
            data: {
                'quant': quant,
                'name': name
            },
            success: function (data) {
                // console.log(data);
                $('#price2').val(data);
            }
        });
    });
});
$(document).ready(function () {
    $('#quantity3').on('keyup', function () {
        var quant = $(this).val();
        var name = $('#select3').val();
        $.ajax({
            type: "get",
            url: "/changequant",
            data: {
                'quant': quant,
                'name': name
            },
            success: function (data) {
                // console.log(data);
                $('#price3').val(data);
            }
        });
    });
    $(document).ready(function () {
        $('#quantity4').on('keyup', function () {
            var quant = $(this).val();
            var name = $('#select4').val();
            $.ajax({
                type: "get",
                url: "/changequant",
                data: {
                    'quant': quant,
                    'name': name
                },
                success: function (data) {
                    // console.log(data);
                    $('#price4').val(data);
                }
            });
        });
    });
});
$(document).ready(function () {
    $('#quantity5').on('keyup', function () {
        var quant = $(this).val();
        var name = $('#select5').val();
        $.ajax({
            type: "get",
            url: "/changequant",
            data: {
                'quant': quant,
                'name': name
            },
            success: function (data) {
                // console.log(data);
                $('#price5').val(data);
            }
        });
    });
});
$(document).ready(function () {
    $('#total').on('click', function () {
        var pr1 = parseInt($('#price1').val() ?? 0);
        var pr2 = parseInt($('#price2').val() ?? 0);
        var pr3 = parseInt($('#price3').val() ?? 0);
        var pr4 = parseInt($('#price4').val() ?? 0);
        var pr5 = parseInt($('#price5').val() ?? 0);
        var disc = parseInt($('#disc').val() ?? 0);
        if(isNaN(disc)){
            disc=0;
        }
        var tot = pr1+pr2+pr3+pr4+pr5-disc;
        $('#span').html(' Rs.'+ tot);
    });
});