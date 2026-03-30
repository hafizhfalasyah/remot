@extends('admin.layouts.master')

@section('content')
<!-- MAIN -->
<main>
  <div class="head-title">
    <div class="left">
      <h1>Sepeda Motor</h1>
      <ul class="breadcrumb">
        <li>
          <a href="#">Sepeda Motor</a>
        </li>
        <li><i class='bx bx-chevron-right'></i></li>
        <li>
          <a class="active" href="{{ url('/motor-list') }}">Daftar Data Sepeda Motor</a>
        </li>
      </ul>
    </div>
  </div>

  <style>
    #content main .table-data {
        text-align: center;
    }

    #content main .table-data .order table th {
        text-align: center;
    }
    .btn {
        display: inline-block;
        padding: 5px 15px;
        background-color: #00345b;
        color: #fff;
        font-size: 12px;
        line-height: 1.5;
        text-align: center;
        text-decoration: none;
        border-radius: 20px;
        transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
    }

    .btn:hover {
        background-color: #6CA6CD;
        color: #fff;
        text-decoration: none;
    }

    .btn-del {
        display: inline-block;
        padding: 5px 15px;
        background-color: #c9302c;
        color: #fff;
        font-size: 12px;
        line-height: 1.5;
        text-align: center;
        text-decoration: none;
        border-radius: 20px;
        transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
    }

    .btn-del:hover {
        background-color: #d9534f;
        color: #fff;
        text-decoration: none;
    }

    .btn:focus,
    .btn.focus {
        outline: 0;
        box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
    }
  </style>

  <div class="table-data">
    <div class="order">
        <div class="head">
            <h3>Daftar Data Sepeda Motor</h3>
            <a href="{{ url('add-motor') }}" class="btn">Tambah Sepeda Motor</a>
        </div>
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Gambar</th>
                    <th>Tahun</th>
                    <th>Merk</th>
                    <th>Harga</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
            @php
            $i = 1;
            @endphp
            @foreach($data as $motor)
                <tr>
                    <td>{{ $i++ }}.</td>
                    <td><img src="/img/{{ $motor->image }}" width="100%"></td>
                    <td>{{ $motor->year }}</td>
                    <td>{{ $motor->merk }}</td>
                    <td>{{ $motor->price }}</td>
                    <td>
                        <center>
                            <a href="{{ url('edit-motor/'.$motor->id) }}" class="btn">Edit</a>
                            <a href="{{ url('delete-motor/'.$motor->id) }}" class="btn-del">Hapus</a>
                        </center>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
</main>


@endsection
