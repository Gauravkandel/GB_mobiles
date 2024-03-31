<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    .body {
        width: 100%;
        height: 100%;
        background-color: orange;
    }

    h2 {
        font-family: Verdana, Geneva, Tahoma, sans-serif;
        text-align: center;
        margin: 0;
        padding-bottom: 8px;

    }

    h5 {
        margin: 0;
        padding-bottom: 8px;
        font-family: Verdana, Geneva, Tahoma, sans-serif;
        text-align: center;
    }

    table {
        font-family: Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    td,
    th {
        border: 1px solid #444;
        padding: 8px;
        text-align: left;
    }

    .table_bottom {
        text-align: right;

    }

    #signature {
        padding-top: 50px;
        text-align: right;
        border: none;
    }

    .cname {
        font-family: Arial, Helvetica, sans-serif;
        padding: 10 10px 10px 0px;
    }

    .date {
        position: fixed;
        font-family: Arial, Helvetica, sans-serif;
        top: 94px;
        right: 10px;
    }
    .extro{
        text-align: center;
        font-size: 0.8em;
        color: #444;
        font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
    }
</style>

<body>
    <h2>GB Mobile House</h2>

    <h5>Gaindakot-5,Nawalpur</h5>
    <div class="Bill">
        <b>Bill no.:</b>{{$customer->Bill_num}}
    </div>
    <div class="cname">
        <b>Customer Name: </b>{{$customer->Name}}
    </div>
    <div class="date">
        <b>Date: </b>{{$customer->Time_Date}}
    </div>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Device Name</th>
                <th>Qantity</th>
                <th>Price</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            <?php $i=1 ?>
            @foreach ($invoice as $item)
            <tr>
                <td>{{$i++}}</td>
                <td>{{$item->Item_name}}</td>
                <td>{{$item->Quantity}}</td>
                <td>{{$item->Price}}</td>
                <td>{{$item->Total}}</td>
            </tr>     
            @endforeach
        </tbody>
        <tr>
            <th colspan="4" class="table_bottom">Total</th>
            <th>{{$customer->Total}}</th>
        </tr>
        <tr>
            <th colspan="4" class="table_bottom">Discount</th>
            <th>{{$customer->Discount}}</th>
        </tr>
        <tr>
            <th colspan="4" class="table_bottom">Grand Total</th>
            <th>{{$customer->Total_after_discount}}</th>
        </tr>
        <tr>
            <td colspan="5" id="signature">Signature</td>
        </tr>
    </table>
<div class="extro"><i>Thank you for visiting GB Mobiles.</i></div>
</body>

</html>