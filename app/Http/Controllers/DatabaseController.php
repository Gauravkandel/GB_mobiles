<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\customer;
use App\Models\order;
use App\Models\stock;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;


class DatabaseController extends Controller
{
    //
    public function welcome()
    {
        return view("welcome");
    }

    function count_data()
    {
        $data1 = stock::all()->count();
        $data2 = customer::all()->count();
        $date = Carbon::now()->format('Y-m-d');
        $recent = customer::withTrashed(false)->where('Time_Date', $date)->get();
        return view("dashboard", ['data1' => $data1, "data2" => $data2, 'recent' => $recent, 'username' => auth()->user()]);
    }


    function analytics()
    {
        // $post = DB::table('customer_bill')->orderBy("Time_Date", "asc")->get('*')->toArray();
        $month = 1;
        $latestmonth = Carbon::now()->format('m');
        $latestyear = Carbon::now()->format('Y');
        // $latestyear = Carbon::now();

        $previous = 0;
        while ($month <= $latestmonth) {
            $date = Carbon::createFromDate($latestyear, $month, 30)->format('Y-m-d');
            $realdate = customer::whereMonth('Time_Date', $month)->whereYear('Time_Date', $latestyear);
            $remoney = $realdate->sum('Total_after_discount');
            $data[] = array(
                'label' => $date,
                'y' => $remoney
            );
            $month = $month + 1;
        }
        return view('analytics', ['data' => $data, 'username' => auth()->user()]);
    }
    function productdata()
    {
        $product = stock::all();
        return view("product", ['product' => $product, 'username' => auth()->user()]);
    }
    function search(Request $req)
    {

        $count = 0;
        if ($req->ajax()) {

            $output = "";
            $stock = stock::where('Item_name', 'LIKE', '%' . $req->search  . '%')
                ->orWhere('Company_name', 'LIKE', '%' . $req->search . '%')
                ->get();

            foreach ($stock as $sto) {
                $output .= '
            <tr>
            <td>
            <input type="checkbox" class="checkbox" name="id[' . $sto->id . ']" value=' . $sto->id . '>
            </td>
            <td>' . ++$count . '</td>
            <td>' . $sto->Item_name . '</td>
            <td>' . $sto->Price . '/-' . '</td>
            <td>' . $sto->RAM_HDD . '</td>
            <td>' . $sto->In_stock . '</td>
            <td>' . $sto->Company_name . '</td>
            <td class="actions">
            ' . '
            
            ' . '<a class="delete"  href="trash/' . $sto->id . '" title="Move to trash"><span  class="bx bxs-trash" >Trash</span></a>
            ' . '
           
         
            ' . '<a class="edit"  href="edit/' . $sto->id . '" title="Edit data"><span class="bx bxs-edit-alt"></span></a>
            ' . ' 
           
            ' . '<a class="view"  href="view/' . $sto->id . '" title="View data"><span  class="uil uil-eye"></span></a>
            ' . ' 

        </td>
            </tr>
            ';
            }
            return response()->json($output);
        }
    }
    public function additems()
    {
        return view("additems", ['username' => auth()->user()]);
    }
    function trashdata($id)
    {
        $delete = stock::find($id);
        $delete->delete();
        return redirect()->back();
    }
    function trashlist()
    {
        $products = stock::onlyTrashed()->get();
        return view("trash", ['product' => $products, 'username' => auth()->user()]);
    }
    function delete($id)
    {
        $delete = stock::withTrashed()->find($id);
        $delete->forcedelete();
        return redirect()->back();
    }
    function restore($id)
    {
        $delete = stock::withTrashed()->find($id);
        $delete->restore();
        return redirect()->back();
    }
    function multidelete(Request $req)
    {
        $deletedata = $req->id;
        if (is_null($deletedata)) {
            return redirect()->back()->with('retry', 'Select data first !!!');
        }
        foreach ($deletedata as $deleted) {
            $delete = stock::withTrashed()->find($deleted);
            $delete->forcedelete();
        }
        if ($delete) {
            return redirect()->back()->with('success', 'Records permanently Deleted !!!');
        } else {
            return redirect()->back()->with('fail', 'Record Not Deleted !!!');
        }
    }
    function multitrash(Request $req)
    {
        $trashdata = $req->id;
        if (is_null($trashdata)) {
            return redirect()->back()->with('retry', 'Select data first !!!');
        }
        foreach ($trashdata as $trashed) {
            $trash = stock::find($trashed);
            $trash->delete();
        }
        if ($trash) {
            return redirect()->back()->with('success', 'Record moved to trash bin !!!');
        } else {
            return redirect()->back()->with('fail', 'Record Not Moved !!!');
        }
    }
    // --------------customers--------------
    function customerdata()
    {
        $customer = customer::all();
        return view("customer", ['customer' => $customer, 'username' => auth()->user()]);
    }
    function searchcustomer(Request $req)
    {
        $count = 0;
        if ($req->ajax()) {

            $output = "";
            $customer = customer::where('Name', 'LIKE', '%' . $req->search  . '%')
                ->orWhere('Bill_num', 'LIKE', '%' . $req->search . '%')
                ->orWhere('Time_Date', 'LIKE', '%' . $req->search . '%')
                ->get();

            foreach ($customer as $sto) {
                $output .= '
            <tr>
            <td>
            <input type="checkbox" class="checkbox" name="id[' . $sto->id . ']" value=' . $sto->id . '>
            </td>
            <td>' . ++$count . '</td>
            <td>' . $sto->Bill_num . '</td>
            <td>' . $sto->Name . '</td>
            <td>' . $sto->Time_Date . '</td>
            <td>' . $sto->Total . '/-' . '</td>
            <td class="actions">
            ' . '
            
            ' . '<a class="delete"  href="trashcust/' . $sto->id . '" title="Move to trash"><span  class="bx bxs-trash" >Trash</span></a>
            ' . '
            ' . '<a class="edit"  href="downloadcust/' . $sto->Bill_num . '" title="Download data"><span class="bx bxs-download"></span></a>
            ' . ' 
           
            ' . '<a class="view"  href="viewcust/' . $sto->Bill_num . '" title="View data"><span  class="uil uil-eye"></span></a>
            ' . ' 

            </td>
            </tr>
            ';
            }
            return response()->json($output);
        }
    }
    function trashcustdata($id)
    {
        $deletecust = customer::find($id);
        $deletecust->delete();
        if ($deletecust) {
            return redirect()->back()->with('success', 'Records Moved to Trash Bin.');
        } else {
            return redirect()->back()->with('fail', 'Record Not Moved !!!');
        }
    }
    function trashcustlist()
    {
        $data = customer::onlyTrashed()->get();
        return view("trashcust", ['customer' => $data, 'username' => auth()->user()]);
    }
    function deletecust($id)
    {
        $deletecust = customer::withTrashed()->find($id);
        $deletecust->forcedelete();
        if ($deletecust) {
            return redirect()->back()->with('success', 'Records Successfully Deleted.');
        } else {
            return redirect()->back()->with('fail', 'Record Not Deleted !!!');
        }
    }
    function restorecust($id)
    {
        $restore = customer::onlyTrashed()->find($id);
        $restore->restore();
        if ($restore) {
            return redirect()->back()->with('success', "Record restored");
        } else {
            return redirect()->back()->with('fail', "Record failed to restore");
        }
    }
    function multideletecust(Request $req)
    {
        $deletedata = $req->id;
        if (is_null($deletedata)) {
            return redirect()->back()->with('retry', 'Select data first !!!');
        }
        foreach ($deletedata as $deleted) {
            $delete = customer::withTrashed()->find($deleted);
            $delete->forcedelete();
        }
        if ($delete) {
            return redirect()->back()->with('success', 'Records permanently Deleted !!!');
        } else {
            return redirect()->back()->with('fail', 'Record Not Deleted !!!');
        }
    }
    function multitrashcust(Request $req)
    {
        $trashdata = $req->id;
        if (is_null($trashdata)) {
            return redirect()->back()->with('retry', 'Select data first !!!');
        }
        foreach ($trashdata as $trashed) {
            $trash = customer::find($trashed);
            $trash->delete();
        }
        if ($trash) {
            return redirect()->back()->with('success', 'Record moved to trash bin !!!');
        } else {
            return redirect()->back()->with('fail', 'Record Not Moved !!!');
        }
    }
    function restorestock(Request $req)
    {
        $trashdata = $req->id;
        if (is_null($trashdata)) {
            return redirect()->back()->with('retry', 'Select data first !!!');
        }
        foreach ($trashdata as $trashed) {
            $trash = stock::withTrashed()->find($trashed);
            $trash->restore();
        }
        if ($trash) {
            return redirect()->back()->with('success', 'Records successfully restored !!!');
        } else {
            return redirect()->back()->with('fail', 'Record restoring unsuccessful !!!');
        }
    }
    function restorecustomer(Request $req)
    {
        $trashdata = $req->id;
        if (is_null($trashdata)) {
            return redirect()->back()->with('retry', 'Select data first !!!');
        }
        foreach ($trashdata as $trashed) {
            $trash = customer::withTrashed()->find($trashed);
            $trash->restore();
        }
        if ($trash) {
            return redirect()->back()->with('success', 'Records successfully restored !!!');
        } else {
            return redirect()->back()->with('fail', 'Record restoring unsuccessful !!!');
        }
    }
    function editprod($id)
    {
        $data = stock::find($id);
        return view("edit-products", ["data" => $data, 'username' => auth()->user()]);
    }
    function updateprod(Request $req)
    {
        $data = stock::find($req->id);
        $data->Item_name = $req->itemname;
        $data->Price = $req->price;
        $data->In_stock = $req->stock;
        $data->Company_name = $req->company;
        $data->save();
        return redirect("products");
    }
    public function insertprod(Request $req)
    {
        $req->validate([
            'itemname' => 'required',
            'price' => 'required',
            'ram' => 'required',
            'stock' => 'required',
            'company' => 'required',
            'design' => 'required',
            'display' => 'required',
            'connect' => 'required',
            'image' => 'required'
        ]);
        $stock = new stock;
        $stock->Item_name = $req->itemname;
        $name = $req->itemname;
        $found = stock::where("Item_name", $name)->first();
        if ($found) {
            return redirect()->back()->with("fails", "Item already present in database.!!!");
        }
        $stock->Price = $req->price;
        $stock->RAM_HDD = $req->ram;
        $stock->In_stock = $req->stock;
        $stock->Company_name = $req->company;
        $stock->Design = $req->design;
        $stock->Display = $req->display;
        $stock->Connectivity = $req->connect;
        $file = $req->file('image');
        $ext = $file->getClientOriginalExtension();
        if ($ext != 'PNG' && $ext != 'png' && $ext != 'jpg' && $ext != 'jpeg') {
            return redirect()->back()->with("fails", "Invalid file format!!!");
        }
        $pics = time() . $file->getClientOriginalName();
        $file->storeAs('images', $pics);
        $stock->Img_phone = "images/" . $pics;
        $stock->save();
        return redirect()->back()->with("success", "Successfully Inserted!!!");
    }
    public function addOrder(Request $req)
    {
        $req->validate([
            'add' => 'required|numeric|min:1|max:5'
        ]);
        $add = $req->add;
        return redirect()->back()->with('data', $add);
    }
    public function orderplace()
    {
        $data = stock::orderBy('Item_name', 'asc')->get();
        return view("/placeorder", ['data' => $data, 'username' => auth()->user()]);
    }
    public function selectprice(Request $req)
    {
        if ($req->ajax()) {
            $name = $req->name;
            $data = stock::where('Item_name', $name)->first();
            $price = $data->Price;
            $quantity = $data->In_stock;
            return response()->json(array('price' => $price, 'quant' => $quantity));
        }
    }
    public function changequant(Request $req)
    {
        if ($req->ajax()) {
            $data = stock::where("Item_name", $req->name)->first();
            $quantity = $req->quant;
            $total = $data->Price * $quantity;
            return response()->json($total);
        }
    }
    public function takeorder(Request $req)
    {
        $req->validate([
            'bill' => 'required',
            'date' => 'required',
            'custname' => 'required'
        ]);
        $itemname = $req->itemname;

        $discount = $req->discount;
        $qty = $req->quantity;
        $total_price = 0;
        $quantity = 0;
        $num = 0;
        foreach ($itemname as $items => $values) {
            if (is_null($itemname[$items])) {
                return redirect()->back()->with('error', 'We couldnot fulfill the request');
            }
            $data = stock::where('Item_name', $itemname[$items])->first();
            // $stock += $data->In_stock;
            $stoc = $data->In_stock;
            $quantity = $qty[$items];
            if ($stoc < $quantity) {
                return redirect()->back()->with('error', 'We couldnot fulfill the request');
            }
            $total_price += $quantity * $data->Price;
            $order = new order();
            $order->Bill_no = $req->bill;
            $order->Name = $req->custname;
            $order->Item_name = $itemname[$items];
            $order->Quantity = $quantity;
            $order->Price = $data->Price;
            $order->Total = $quantity * $data->Price;
            $order->save();
            $data->In_stock = $stoc - $quantity;
            $data->save();
            $num = $num + 1;
        }
        $totalafterdisc = $total_price - $discount;
        $customer = new customer();
        $customer->Bill_num = $req->bill;
        $customer->Name = $req->custname;
        $customer->Time_Date = $req->date;
        $customer->Numbers_bought = $num;
        $customer->Total = $total_price;
        $customer->Discount = $req->discount;
        $customer->Total_after_discount = $total_price - $discount;
        $result = $customer->save();
        $invoice = order::where('Bill_no', $req->bill)->get();
        $cust = customer::where('Bill_num', $req->bill)->first();
        if ($result) {
            $pdf = Pdf::loadView('/invoice', ['invoice' => $invoice, "customer" => $cust, 'username' => auth()->user()])->setPaper('a5', 'portrait');
            return $pdf->stream($req->bill . '.pdf');
        }
    }
    public function viewcust($bill)
    {
        $invoice = order::where('Bill_no', $bill)->get();
        $cust = customer::where('Bill_num', $bill)->first();
        $pdf = Pdf::loadView('/invoice', ['invoice' => $invoice, "customer" => $cust, 'username' => auth()->user()])->setPaper('a5', 'portrait');
        return $pdf->stream($bill . '.pdf');
    }
    public function downloadcust($bill)
    {
        $invoice = order::where('Bill_no', $bill)->get();
        $cust = customer::where('Bill_num', $bill)->first();
        $pdf = Pdf::loadView('/invoice', ['invoice' => $invoice, "customer" => $cust, 'username' => auth()->user()])->setPaper('a5', 'portrait');
        return $pdf->download($bill . '.pdf');
    }
    public function viewitem($id)
    {
        $items = stock::find($id);
        return view("/viewitem", ['data' => $items, 'username' => auth()->user()]);
    }
}
