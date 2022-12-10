@extends('layouts.app', ['activePage' => 'users', 'titlePage' => __('Data User')])

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title ">List Product</h4>
                        <p class="card-category"> Silahkan Pilih Product yang Anda Suka</p>
                    </div>
                    <div class="card-body">
                        <div class="btn-group">
                            <a href="" style="width : 100%; font-family: hi" class="btn btn-success" data-toggle="modal"
                                data-target="#exampleModal">New</a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead class=" text-primary">
                                            <th>
                                                Code
                                            </th>
                                            <th>
                                                Product
                                            </th>
                                            <th> </th>
                                        </thead>
                                        <tbody>
                                            @foreach($list as $lists)
                                            <tr>
                                                <td>{{$lists->product_code}}</td>
                                                <td>{{$lists->product_name}}<br>{{$lists->currency}}
                                                    {{ number_format($lists->price) }}</td>
                                                <td>
                                                    <div class="btn-group">
                                                        <a href="" style="width : 100%; font-family: hi"
                                                            class="btn btn-success" data-toggle="modal"
                                                            data-target="#exampleModal1<?php echo $lists->id?>">Buy</a>
                                                    </div>
                                                </td>
                                                <div class="modal fade" id="exampleModal1<?php echo $lists->id?>"
                                                    tabindex="-1" aria-labelledby="exampleModalLabel"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content"
                                                            style="background-color: rgba(202, 150, 202, 0.719);">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title text-white"
                                                                    style="width : 100%; font-family: hi"
                                                                    id="exampleModalLabel">
                                                                    Masukan Keranjang</h5>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form action="{{route('buy')}}" method="post">
                                                                    @csrf
                                                                    <input type="hidden" name="id"
                                                                        value="{{$lists->id}}">
                                                                        <div class="form-group">
                                                                        <input type="text" name="product_code" class="form-control" value="{{$lists->product_code}}" readonly>
                                                                        </div>
                                                                        <div class="form-group">
                                                                        <input type="hidden" name="price" class="form-control" value="{{$lists->price}}" readonly>
                                                                        <input type="text"  class="form-control" value="{{ number_format($lists->price) }}" readonly>
                                                                        </div>
                                                                        <div class="form-group">
                                                                        <input type="hidden" name="discount" class="form-control" value="{{$lists->discount}}" readonly>
                                                                        <input type="text"  class="form-control" value="{{$lists->discount}}%" readonly>
                                                                        </div>
                                                                        <div class="form-group">
                                                                        <input type="text" name="unit" class="form-control" value="{{$lists->unit}}" readonly>
                                                                        </div>
                                                                        <div class="form-group">
                                                                        <input type="text" name="currency" class="form-control" value="{{$lists->currency}}" readonly>
                                                                        </div>
                                                                        <div class="form-group">
                                                                        <input type="text"  class="form-control" value="{{$lists->dimension}}" readonly>
                                                                        </div>
                                                                        
                                                                    <div class="form-group">
                                                                        <label for="">Masukan Quantity Product</label>
                                                                        <input type="text" class="form-control"
                                                                            name="qty" value=""
                                                                            placeholder="Masukan  Qty">
                                                                    </div>

                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="submit"
                                                                    style="width : 50%; font-family: hi"
                                                                    class="btn btn-danger">Buy</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                            </tr>

                                            @endforeach
                                        </tbody>
                                    </table>
                                    <div class="modal fade" id="exampleModal" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content"
                                                style="background-color: rgba(43, 15, 71, 0.94);">
                                                <div class="modal-header">
                                                    <h3 class="modal-title text-white"
                                                        style="width : 100%; font-family: hi" id="exampleModalLabel">
                                                        Input Product Baru</h3>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{route('createproduct')}}" method="post">
                                                        @csrf
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" name="code_product"
                                                                value="" placeholder="Masukan Kode Product">
                                                        </div>
                                                        <div class="form-group">
                                                            <input type="text" class="form-control"
                                                                style="color:whitesmoke;" name="product_name" value=""
                                                                placeholder="Masukan Nama Product">
                                                        </div>
                                                        <div class="form-group">
                                                            <input type="number" class="form-control"
                                                                style="color:whitesmoke;" name="price" value=""
                                                                placeholder="Masukan Price">
                                                        </div>
                                                        <div class="form-group">
                                                            <input type="text" class="form-control"
                                                                style="color:whitesmoke;" name="currency" value=""
                                                                placeholder="Masukan Currency">
                                                        </div>
                                                        <div class="form-group">
                                                            <input type="text" class="form-control"
                                                                style="color:whitesmoke;" name="discount" value=""
                                                                placeholder="Masukan Discount">%
                                                        </div>
                                                        <div class="form-group">
                                                            <input type="text" class="form-control"
                                                                style="color:whitesmoke;" name="dimension" value=""
                                                                placeholder="Masukan Dimensi Product">
                                                        </div>
                                                        <div class="form-group">
                                                            <input type="text" class="form-control"
                                                                style="color:whitesmoke;" name="unit" value=""
                                                                placeholder="Masukan Unit Product">
                                                        </div>

                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" style="width : 100%; font-family: hi"
                                                        class="btn btn-success">Input</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead class=" text-primary">
                                        <th>
                                            Code
                                        </th>
                                        <th>
                                            Product
                                        </th>
                                        <th>
                                         </th>
                                    </thead>
                                    <tbody>
                                        @foreach($data as $datas)
                                        <tr>
                                            <td>{{$datas->product_code}}</td>
                                            <td>{{$datas->product_name}}<br>
                                                {{$datas->quantity}} {{$datas->unit}}<br>
                                                Subtotal : {{$datas->currency}} {{ number_format($datas->subtotal) }}
                                                
                                            </td>
                                            <td>
                                            <div class="btn-group">
                                                        <a href="" style="width : 100%; font-family: hi"
                                                            class="btn btn-success" data-toggle="modal"
                                                            data-target="#exampleModal4<?php echo $datas->id?>">Edit</a>
                                                    </div>
                                                    <div class="btn-group">
                                                        <a href="" style="width : 100%; font-family: hi"
                                                            class="btn btn-danger" data-toggle="modal"
                                                            data-target="#exampleModal8<?php echo $datas->id?>">Delete</a>
                                                    </div>
                                            </td>
                                            <div class="modal fade" id="exampleModal4<?php echo $datas->id?>"
                                                    tabindex="-1" aria-labelledby="exampleModalLabel"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content"
                                                            style="background-color: rgba(202, 150, 202, 0.719);">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title text-white"
                                                                    style="width : 100%; font-family: hi"
                                                                    id="exampleModalLabel">
                                                                    Edit Quantity from {{$datas->quantity}} {{$datas->unit}}</h5>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form action="{{route('edit_qty')}}" method="post">
                                                                    @csrf
                                                                    <input type="hidden" name="product_code"
                                                                        value="{{$datas->product_code}}">
                                                                    <div class="form-group">
                                                                        <label for="">Masukan Quantity Terbaru</label>
                                                                        <input type="number" class="form-control" name="qty"  placeholder="Masukan  Qty">
                                                                    </div>

                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="submit"
                                                                    style="width : 50%; font-family: hi"
                                                                    class="btn btn-danger">Checkout</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                        </tr>
                                        <div class="modal fade" id="exampleModal8<?php echo $datas->id?>"
                                                    tabindex="-1" aria-labelledby="exampleModalLabel"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content"
                                                            style="background-color: rgba(202, 150, 202, 0.719);">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title text-white"
                                                                    style="width : 100%; font-family: hi"
                                                                    id="exampleModalLabel">
                                                                    Edit Quantity</h5>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form action="{{route('delete_')}}" method="post">
                                                                    @csrf
                                                                    <input type="hidden" name="product_code"
                                                                        value="{{$datas->product_code}}">
                                                                    <div class="form-group">
                                                                        <label for="">Anda Yakin Akan Delete {{$datas->product_name}}</label>
                                                                        
                                                                    </div>

                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="submit"
                                                                    style="width : 50%; font-family: hi"
                                                                    class="btn btn-danger">Delete</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <th>TOtal</th>
                                        <th>IDR {{ number_format($total) }}</th>
                                        <th>@if($not)
                                            <div class="btn-group">
                                                        <form action="{{route('confirm')}}" method="post">
                                                        @csrf
                                                        <input type="hidden" name="document_number"
                                                                        value="{{$code}}">
                                                        <input type="hidden" name="document_code"
                                                                        value="TRX">
                                                        
                                                        <button type="submit" style="width : 100%; font-family: hi"
                                                        class="btn btn-success">Confirm</button>
                                                        </form> 
                                                    </div>
                                            @endif
                                        </th>
                                    </tfoot>
                                </table>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection