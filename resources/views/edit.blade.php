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
              <li class="breadcrumb-item active">Edit Data</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <section class="content">
        <div class="container-fluid">
          <form action=" {{ route('admin.data.update',['id' => $data->id]) }}" method="POST">
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
                        <label for="exampleInputName">Nama Peminjam</label>
                        <input name="name" type="name" class="form-control" id="exampleInputName" value="{{ $data->name }}" placeholder="Enter nama peminjam">
                        @error('name')
                            <small>{{ $message }}</small>
                        @enderror
                      </div>
                      <div class="form-group">
                        <label for="exampleInputUnit">Unit Peminjam</label>
                        <select class="form-control select2" style="width: 100%;" name="unit" type="unit" class="form-control" id="exampleInputUnit" value="{{ $data->unit }}">
                            <option selected="selected">Mahasiswa</option>
                            <option>Dosen</option>
                          </select>
                        @error('unit')
                            <small>{{ $message }}</small>
                        @enderror
                      </div>
                      <div class="form-group">
                        <label for="exampleInputItem">Barang</label>
                        <input name="item" type="item" class="form-control" id="exampleInputItem"value="{{ $data->item }}"  placeholder="Input Barang">
                        @error('item')
                            <small>{{ $message }}</small>
                        @enderror
                      </div>
                      <div class="form-group">
                          <label for="exampleInputEvent">Event</label>
                          <input name="event" type="event" class="form-control" id="exampleInputEvent" value="{{ $data->event }}" placeholder="Masukkan Nama Event">
                        @error('event')
                          <small>{{ $message }}</small>
                        @enderror
                      </div>
                      <div class="form-group">
                          <label for="exampleInputTglPinjam">Tanggal Pinjam</label>
                          <input name="pinjam" type="pinjam" class="form-control" id="exampleInputTglPinjam" value="{{ $data->pinjam }}" placeholder="Pilih Tanggal Pinjam">
                          <div class="input-group date" id="reservationdate" data-target-input="nearest">
                            <input type="text" class="form-control datetimepicker-input" data-target="#reservationdate"/>
                            <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                            </div>
                        </div>
                          @error('pinjam')
                          <small>{{ $message }}</small>
                        @enderror
                      </div>
                      <div class="form-group">
                          <label for="exampleInputTglKembali">Tanggal Kembali</label>
                          <input name="kembali" type="kembali" class="form-control" id="exampleInputTglKembali" value="{{ $data->kembali }}" placeholder="Pilih Tanggal Kembali">
                          @error('kembali')
                          <small>{{ $message }}</small>
                        @enderror
                      </div>
                      <div class="form-group">
                          <label for="exampleInputStatus">Status</label>
                          <select class="form-control select2" style="width: 100%;" name="status" type="status" class="form-control" id="exampleInputStatus" value="{{ $data->status }}">
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
