<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\TransactionDetail;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function product_list()
    {
        $list = Product::all();
        $data = TransactionDetail::whereNull('document_code')
                                ->join('products','transaction_details.product_code','products.product_code')
                                ->select('transaction_details.id',
                                        'products.product_name',
                                        'transaction_details.product_code',
                                        'transaction_details.price',
                                        'transaction_details.quantity',
                                        'transaction_details.unit',
                                        'transaction_details.subtotal',
                                        'transaction_details.currency')
                                ->get();
        $total = TransactionDetail::whereNull('document_code')->sum('subtotal');
        $num  = 1;
        $kode =  sprintf("%03s", $num);
        $cek = TransactionDetail::where('document_number',$kode)->count();
        if($cek){
            $code =  sprintf("%03s", $num);
        }else{
            $code =  sprintf("%03s", $num);
        }
        $not =TransactionDetail::whereNull('document_code')->count();
        // dd($update);
        return view('product.list',compact('list','data','total','num','kode','code','not'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $code_product = $request->code_product;
        $product_name = $request->product_name;
        $price        = $request->price;
        $currency     = $request->currency;
        $discount     = $request->discount;
        $dimension    = $request->dimension;
        $unit         = $request->unit;

        $input = Product::create(['product_code'=> $code_product,
                                'product_name' => $product_name,
                                'price' => $price,
                                'currency' => $currency,
                                'discount' => $discount,
                                'dimension' => $dimension,
                                'unit' => $unit]);
        return back();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
