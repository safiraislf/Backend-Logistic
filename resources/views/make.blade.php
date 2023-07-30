@extends('layouts.main')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Data User</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Tambah Data</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <section class="content">
        <div class="container-fluid">
            <form action=" {{ route('admin.user.fund')}}" method="POST">
                @csrf
            <div class="row">
              <!-- left column -->
              <div class="col-md-5 offset-md-4 mt-2">
                <!-- general form elements -->
                <div class="card card-primary">
                  <div class="card-header">
                    <h3 class="card-title">Form Tambah Data</h3>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->
                  <form>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputName">Nama</label>
                            <input name="name" type="name" class="form-control" id="exampleInputName"  placeholder="Enter Nama">
                            @error('name')
                            <small>{{ $message }}</small>
                          @enderror
                          </div>
                      <div class="form-group">
                        <label for="exampleInputEmail">Email</label>
                        <input name="email" type="email" class="form-control" id="exampleInputEmail" placeholder="Enter email">
                        @error('email')
                        <small>{{ $message }}</small>
                      @enderror
                      </div>
                      <div class="form-group">
                          <label for="exampleInputPassword">Password</label>
                          <input name="password" type="password" class="form-control" id="exampleInputPassword"  placeholder="Masukkan Password">
                          @error('password')
                          <small>{{ $message }}</small>
                        @enderror
                      </div>
                      <div class="card-footer">
                          <button type="submit" class="btn btn-primary">Submit</button>
                      </div>
                  </div>
                  </div>
                    </div>
                  </div>
                  </div>
                    <!-- /.card-body -->

                  </form>
                </div>
                <!-- /.card -->

              </div>
              <!--/.col (left) -->
            </div>
          </form>
          <!-- /.row -->
        </div><!-- /.container-fluid -->
      </section>
  </div>

@endsection
