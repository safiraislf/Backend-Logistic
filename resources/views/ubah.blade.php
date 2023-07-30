@extends('layouts.main')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Data Asset</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Edit Data</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <section class="content">
        <div class="container-fluid">
            <form action=" {{ route('admin.asset.upgrade',['id' => $data->id]) }}" method="POST">
                @csrf
                @method('PUT')
            <div class="row">
              <!-- left column -->
              <div class="col-md-5 offset-md-4 mt-2">
                <!-- general form elements -->
                <div class="card card-primary">
                  <div class="card-header">
                    <h3 class="card-title">Form Edit Data</h3>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->
                  <form>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputName">ID Asset</label>
                            <input name="code" type="name" class="form-control" id="exampleInputID" value="{{ $data->code }}" placeholder="Enter ID Asset">
                            @error('code')
                            <small>{{ $message }}</small>
                          @enderror
                          </div>
                      <div class="form-group">
                        <label for="exampleInputName">Nama Asset</label>
                        <input name="name" type="name" class="form-control" id="exampleInputName" value="{{ $data->name }}" placeholder="Enter nama asset">
                        @error('name')
                        <small>{{ $message }}</small>
                      @enderror
                      </div>
                      <div class="form-group">
                          <label for="exampleInputStatus">Status</label>
                          <select class="form-control select2" style="width: 100%;" name="status" type="status" class="form-control" id="exampleInputStatus" >
                            <option selected="selected">Ready</option>
                            <option>Maintenance</option>
                          </select>
                          @error('status')
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
