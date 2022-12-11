@extends('layouts.app', ['activePage' => 'users', 'titlePage' => __('Data User')])

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title ">Data Pengguna</h4>
            <p class="card-category"> Berikut Adalah Data Pengguna</p>
            <div class="btn-group">
                        <a href="" style="width : 100%; font-family: hi" class="btn btn-success" data-toggle="modal"
                          data-target="#addnew">New</a>
                      </div>
          </div>
          
          <div class="card-body">
            <div class="table-responsive">
              <table class="table">
                <thead class=" text-primary">
                  <th>
                    ID
                  </th>
                  <th>
                    Name
                  </th>
                  <th>Edit</th>
                </thead>
                <tbody>
                  @foreach($user as $datas)
                  <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$datas->name}}</td>
                    <td>
                      <div class="btn-group">
                        <a href="" style="width : 100%; font-family: hi" class="btn btn-warning" data-toggle="modal"
                          data-target="#exampleModal<?php echo $datas->id?>">Edit</a>
                      </div>
                      <div class="btn-group">
                        <a href="" style="width : 100%; font-family: hi" class="btn btn-danger" data-toggle="modal"
                          data-target="#exampleModal1<?php echo $datas->id?>">Hapus</a>
                      </div>
                    </td>
                    <div class="modal fade" id="exampleModal1<?php echo $datas->id?>" tabindex="-1"
                      aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content" style="background-color: rgba(218, 84, 84, 0.719);">
                          <div class="modal-header">
                            <h5 class="modal-title text-white" style="width : 100%; font-family: hi" id="exampleModalLabel">Hapus User</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <form action="{{route('userdelete')}}" method="post">
                              @csrf
                                <input type="hidden" name="id" value="{{$datas->id}}">
                              <div class="form-group">
                                <p style="width : 100%; font-family: hi">Anda yakin Akan Menghapus <b>{{$datas->name}}</b>?</p>
                              </div>
                              
                              
  
                          </div>
                          <div class="modal-footer">
                            <button type="submit" style="width : 100%; font-family: hi"
                              class="btn btn-danger">Yes</button>
                            </form>
                          </div>
                        </div>
                      </div>
                  </tr>
                  <div class="modal fade" id="exampleModal<?php echo $datas->id?>" tabindex="-1"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content" style="background-color: rgba(81, 160, 122, 0.719);">
                        <div class="modal-header">
                          <h5 class="modal-title text-white" style="width : 100%; font-family: hi" id="exampleModalLabel">Edit User</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <form action="{{route('useredit')}}" method="post">
                            @csrf
                              <input type="hidden" name="id" value="{{$datas->id}}">
                            <div class="form-group">
                              <input type="text" class="form-control" name="name" value="{{$datas->name}}" id="">
                            </div>
                            <div class="form-group">
                              <input type="text" class="form-control" name="email" value="{{$datas->email}}" id="">
                            </div>
                            <div class="form-group">
                              <input type="password" class="form-control" name="password" value="{{$datas->password}}" id="">
                            </div>
                            

                        </div>
                        <div class="modal-footer">
                          <button type="submit" style="width : 100%; font-family: hi"
                            class="btn btn-danger">Yes</button>
                          </form>
                        </div>
                      </div>
                    </div>
                    @endforeach
                </tbody>
              </table>
              <div class="modal fade" id="addnew" tabindex="-1"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content" style="background-color: rgba(4, 206, 252, 0.719);">
                        <div class="modal-header">
                          <h5 class="modal-title text-white" style="width : 100%; font-family: hi" id="exampleModalLabel">Edit User</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <form action="{{route('adduser')}}" method="post">
                            @csrf
                            <div class="form-group">
                              <input type="text" class="form-control" name="name" value="" id="" placeholder="name">
                            </div>
                            <div class="form-group">
                              <input type="text" class="form-control" name="email" value="" id="" placeholder="email">
                            </div>
                            <div class="form-group">
                              <input type="password" class="form-control" name="password" value="" id="" placeholder="password">
                            </div>
                        </div>
                        <div class="modal-footer">
                          <button type="submit" style="width : 100%; font-family: hi"
                            class="btn btn-success">Add</button>
                          </form>
                        </div>
                      </div>
                    </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection