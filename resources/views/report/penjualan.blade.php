@extends('layouts.app', ['activePage' => 'users', 'titlePage' => __('Data User')])

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title ">Report</h4>
            <p class="card-category"> Berikut Adalah Report Penjualan</p>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table">
                <thead class=" text-primary">
                  <th>Transaction</th>
                  <th>User</th>
                  <th>Total</th>
                  <th>Date</th>
                  <th>Item</th>
                </thead>
                <tbody>
                  @foreach($report as $reports)
                  <tr>
                    <td>{{$reports->document_code}}-{{$reports->document_number}}</td>
                    <td>{{$reports->user}}</td>
                    <td>{{number_format($reports->total)}}</td>
                    <td>{{ \Carbon\Carbon::parse($reports->date)->isoFormat('dddd, D MMMM Y')}}</td>
                    <td>
                      @foreach($item as $items)
                      @if($items->document_code == $reports->document_code && $items->document_number == $reports->document_number )
                      <ul>
                        <li>{{$items->product_name}}</li>
                      </ul>
                      @endif
                      @endforeach
                    </td>
                  </tr>
                  @endforeach
                 
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection