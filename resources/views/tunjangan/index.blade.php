@extends('layouts.app')

@section('content')

<div class="container">
	<div class="panel panel-info">
		<div class="panel-heading">Tunjangan</div>
		<div class="panel-body">
		<center><a class="btn btn-primary" href="{{url('tunjangan/create')}}">Tambah Data</a></center><br>
			<table class="table table-striped table-bordered table-hover">
				<thead>
					<tr bgcolor="pink">
						<th>No</th>
						<th>Kode Tunjangan</th>
						<th>Jabatan ID</th>
						<th>Golongan ID</th>
						<th>Status</th>
						<th>Jumlah Anak</th>
						<th>Besaran Uang</th>
						<th colspan="3">Pilihan</th>
					</tr>
				</thead>

				<?php $no=1; ?>
				@foreach ($tunjangan as $tunjangans)
				<tbody>
					<tr> 
						<td> {{$no++}} </td>
						<td> {{$tunjangans->kode_tunjangan}} </td>
						<td> {{$tunjangans->Jabatan->kode_jabatan}} </td>
						<td> {{$tunjangans->Golongan->kode_golongan}} </td>
						<td> {{$tunjangans->status}} </td>
						<td> {{$tunjangans->jumlah_anak}} </td>
						<td> {{$tunjangans->besaran_uang}} </td>					
						<td>
							<a class="btn btn-xs btn-warning" href=" {{route('tunjangan.edit', $tunjangans->id)}} ">Ubah</a>
						</td>
						<td>
							<form method="POST" action=" {{route('tunjangan.destroy', $tunjangans->id)}} ">
								{{csrf_field()}}
								<input type="hidden" name="_method" value="DELETE">
								<input class="btn btn-xs btn-danger" onclick="return confirm('Apakah yakin ingin menghapus data ?');" type="submit" value="Hapus">
							</form>
						</td>
					</tr>
				</tbody>
				@endforeach
			</table>
		</div>
	</div>
</div>

@endsection