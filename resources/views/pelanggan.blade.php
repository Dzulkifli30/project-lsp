@extends('dashboard')

@section('content')
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Data Pelanggan</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Pelanggan</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>

<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <div class="row">
              <div class="col-6">
                <a href="{{ route('addtarif') }}"><button class="btn btn-primary">Tambahkan Pelanggan</button></a>
              </div>
              <!-- <div class="col-6">
                <a href="{{ route('addtarif') }}" class="float-right"><button class="btn btn-danger">Selesai</button></a>
              </div> -->
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>username</th>
                  <th>nomor kwh</th>
                  <th>nama pelanggan</th>
                  <th>alamat</th>
                  <th>tarif perkwh</th>
                </tr>
              </thead>
              <tbody>
              @foreach ($data as $item)
                <tr>
                  <td>{{ $item->username }}</td>
                  <td>{{ $item->nomor_kwh }}</td>
                  <td>{{ $item->nama_pelanggan }}</td>
                  <td>{{ $item->alamat }}</td>
                  <td>{{ $item->tarifperkwh }}</td>
                  <td>
                  <a href="#"><button class="btn btn-warning">Update</button></a>
                  <a href="#"><button class="btn btn-danger">Delete</button></a>
                  </td>
                </tr>
                @endforeach
              </tobody>
            </table>
          </div>
          <!-- /.card-body -->
        </div>
      </div>
    </div>
  </div>
</section>
@endsection