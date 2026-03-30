@extends('admin.layouts.master')

@section('content')
		<!-- MAIN -->
		<main>
			<div class="head-title">
				<div class="left">
					<h1>Halaman Utama</h1>
					<ul class="breadcrumb">
						<li>
							<a href="#">Halaman Utama</a>
						</li>
						<li><i class='bx bx-chevron-right' ></i></li>
						<li>
							<a class="active" href="#">Beranda</a>
						</li>
					</ul>
				</div>
			</div>

			<ul class="box-info">
				<li>
					<i class='bx bxs-calendar-event' ></i>
					<span class="text">
						<h3>{{ DB::table('rents')->count() }}</h3>
						<p>Sewa</p>
					</span>
				</li>
				<li>
					<i class='bx bxs-group' ></i>
					<span class="text">
						<h3>{{ DB::table('users')->count() }}</h3>
						<p>Pengguna</p>
					</span>
				</li>
				<li>
					<i class='bx bxs-package' ></i>
					<span class="text">
						<h3>{{ DB::table('motors')->count() }}</h3>
						<p>Sepeda Motor</p>
					</span>
				</li>
			</ul>

            <style>
                #content main .table-data {
                    text-align: center;
                }
                #content main .table-data .order table th,td {
                    text-align: center;
                }
            </style>
			<div class="table-data">
				<div class="order">
					<div class="head">
						<h3>Penyewaan Terbaru</h3>
					</div>
					<table>
						<thead>
							<tr>
								<th>No</th>
								<th>Pengguna</th>
								<th>Merk Motor</th>
								<th>Tahun Motor</th>
								<th>Tanggal Order</th>
                                <th>Status</th>
							</tr>
						</thead>
						<tbody>
                            @php
                                $i = 1;
                            @endphp
                            @foreach(DB::table('rents')->get() as $rent)
                                <tr>
                                    <td>{{ $i++ }}.</td>
                                    <td>{{ $rent->name }}</td>
                                    <td>{{ $rent->merk }}</td>
                                    <td>{{ $rent->year }}</td>
                                    <td>{{ $rent->pick }}</td>
                                    <td>
                                        <span class="status <?php echo ($rent->status === 'Unpaid') ? 'pending' : 'completed'; ?>">
                                            <?php echo $rent->status; ?>
                                        </span>
                                    </td>
                                </tr>
                            @endforeach
						</tbody>
					</table>
				</div>
				<div class="todo">
					<div class="head">
						<h3>Daftar Penyewaan Terbayar</h3>
					</div>
                    <ul class="todo-list">
						@foreach(DB::table('rents')->where('status', 'Paid')->get() as $rent)
						<li class="completed">
							<p>{{ $rent->id }} | {{ $rent->name }} | {{ $rent->phone }}</p>
						</li>
						@endforeach
					</ul>

				</div>
			</div>
		</main>
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->

    @endsection
</body>
</html>
