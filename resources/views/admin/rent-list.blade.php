@extends('admin.layouts.master')

@section('content')
<!-- MAIN -->
<main>
  <div class="head-title">
    <div class="left">
      <h1>Sewa</h1>
      <ul class="breadcrumb">
        <li>
          <a href="#">Sewa</a>
        </li>
        <li><i class='bx bx-chevron-right'></i></li>
        <li>
          <a class="active" href="{{ url('/rent-list') }}">Daftar Data Sewa</a>
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
            <h3>Daftar Data Sewa</h3>
            {{-- <a href="{{ url('add-rent') }}" class="btn">Tambah Sewa</a> --}}
        </div>
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>ID Sewa</th>
                    <th>Nama</th>
                    <th>No Hp</th>
                    <th>Merk Motor</th>
                    <th>Tahun Motor</th>
                    <th>Tanggal Pengambilan</th>
                    <th>Tanggal Pengembalian</th>
                    <th>Jumlah Hari</th>
                    <th>Total Harga</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
            @php
            $i = 1;
            @endphp
            @foreach($data as $rent)
                <tr>
                    <td>{{ $i++ }}.</td>
                    <td>{{ $rent->id }}</td>
                    <td>{{ $rent->name }}</td>
                    <td>{{ $rent->phone }}</td>
                    <td>{{ $rent->merk }}</td>
                    <td>{{ $rent->year }}</td>
                    <td>{{ $rent->pick }}</td>
                    <td>{{ $rent->return }}</td>
                    <td>{{ $rent->qty }}</td>
                    <td>{{ $rent->total_price }}</td>
                    <td>{{ $rent->status }}</td>
                    <td>
                        <center>
                            {{-- <a href="{{ url('edit-rent/'.$rent->id) }}" class="btn">Edit</a> --}}
                            <a href="{{ url('delete-rent/'.$rent->id) }}" class="btn-del">Hapus</a>
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
