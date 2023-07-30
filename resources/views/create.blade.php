@extends('layouts.main')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Peminjaman Asset</h1>
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
          <form action=" {{ route('admin.data.store')}}" method="POST">
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
                        <label for="exampleInputName">Nama Peminjam</label>
                        <input name="name" type="name" class="form-control" id="exampleInputName" placeholder="Enter nama peminjam">
                        @error('name')
                            <small>{{ $message }}</small>
                        @enderror
                      </div>
                      <div class="form-group">
                        <label for="exampleInputUnit">Unit Peminjam</label>
                        <select class="form-control select2" style="width: 100%;" name="unit" type="unit" class="form-control" id="exampleInputUnit">
                            <option selected="selected">Mahasiswa</option>
                            <option>Dosen</option>
                          </select>
                        @error('unit')
                            <small>{{ $message }}</small>
                        @enderror
                      </div>
                      <div class="form-group">
                        <label for="exampleInputItem">Barang</label>
                        <input name="item" type="item" class="form-control" id="exampleInputItem" placeholder="Input Barang">
                        @error('item')
                            <small>{{ $message }}</small>
                        @enderror
                      </div>
                      <div class="form-group">
                          <label for="exampleInputEvent">Event</label>
                          <input name="event" type="event" class="form-control" id="exampleInputEvent" placeholder="Masukkan Nama Event">
                        @error('event')
                          <small>{{ $message }}</small>
                        @enderror
                      </div>
                      <div class="form-group">
                          <label for="exampleInputTglPinjam">Tanggal Pinjam</label>
                          <input name="pinjam" type="pinjam" class="form-control" id="exampleInputTglPinjam" placeholder="Input Tanggal Pinjam">
                          @error('pinjam')
                          <small>{{ $message }}</small>
                        @enderror
                      </div>
                      <div class="form-group">
                          <label for="exampleInputTglKembali">Tanggal Kembali</label>
                          <input name="kembali" type="kembali" class="form-control" id="exampleInputTglKembali" placeholder="Input Tanggal Kembali">
                          @error('kembali')
                          <small>{{ $message }}</small>
                        @enderror
                      </div>
                      <div class="form-group">
                          <label for="exampleInputStatus">Status</label>
                          <select class="form-control select2" style="width: 100%;" name="status" type="status" class="form-control" id="exampleInputStatus">
                            <option selected="selected">Dipinjam</option>
                            <option>Dikembalikan</option>
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
