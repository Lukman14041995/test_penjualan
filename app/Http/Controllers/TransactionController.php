<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\TransactionDetail;
use App\Models\TransactionHeader;
use DB;
use Auth;
use DateTime;
class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function buy(Request $request)
    {
        $id = $request->id;
        $pc = $request->product_code;
        $pn = $request->product_name;
        $pr = $request->price;
        $cr = $request->currency;
        $dc = $request->discount;
        $pr2 = ($pr*($dc/100));
        $pr3 = $pr -$pr2;
        // dd($pr3);
        $dm = $request->dimension;
        $un = $request->unit;
        $qt = $request->qty;
        $cek = TransactionDetail::wherenull('document_code')->where('product_code',$pc)->count();
        if($cek){
            $update = TransactionDetail::where('product_code',$pc)->update(['quantity'=> DB::raw("quantity + $qt"),'subtotal' => DB::raw("quantity * $pr3")]);
        }
        else{
            $input = TransactionDetail::create(['product_code' => $pc,
                                                'price'        => $pr3,
                                                'quantity'     => $qt,
                                                'unit'         => $un,
                                                'subtotal'     => $pr3 * $qt,
                                                'currency'     => $cr]);
        }
        return back();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit_qty(Request $request)
    {
        $product_code = $request->product_code;
        $qt = $request->qty;
        // dd($product_code);
        $update = TransactionDetail::where('product_code',$product_code)->update(['quantity'=>  $qt,'subtotal' => DB::raw("price * quantity")]);

        
        return back();
                                    
    }

    public function delete(Request $request)
    {
        $product_code = $request->product_code;
        $delete = TransactionDetail::where('product_code',$product_code)->delete();

        
        return back();
                                    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function confirm(Request $request)
    {
        $dc = $request->document_code;
        $dn = $request->document_number;
        $user = Auth::user()->name;
        $date = new DateTime();
        $update =TransactionDetail::whereNull('document_code')->update(['document_code'=>$dc,'document_number'=>$dn]);
        $total =TransactionDetail::where('document_code',$dc)->where('document_number',$dn)->sum('subtotal');
        $update = TransactionHeader::create(['document_code'=>$dc,'document_number'=>$dn,'user'=>$user,'total'=>$total,'date'=>$date->format('Ymd')]);
        
        return back();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function report()
    {
        $report = TransactionHeader::join('transaction_details','transaction_headers.document_code','transaction_details.document_code')
                                    ->join('products','transaction_details.product_code','products.product_code')
                                    ->select('transaction_headers.document_code','transaction_headers.document_number','transaction_headers.total','transaction_headers.date','transaction_headers.user', DB::raw('group_concat(products.product_name) as names,(transaction_details.quantity)as qty'))
                                    ->groupBy('transaction_headers.document_code','transaction_headers.document_number','transaction_headers.total','transaction_headers.date','transaction_headers.user','transaction_details.quantity')
                                    ->get();
                                    // dd($report);
        return view('report.penjualan',compact('report'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
