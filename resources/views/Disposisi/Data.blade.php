@extends('Layouts.Master')
@section('content')
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading">
          <a href="{{Route('Tambah-Disposisi')}}" class="btn btn-sm btn-info">Tambah Data</a>
					@if (!isset($Tahun))
						<a href="{{Route('Cetak-Disposisi')}}" class="btn btn-sm btn-success" target="_blank">Cetak</a>
					@else
						<a href="{{Route('Cetak-Disposisi-Filter', ['Bulan' => $Bulan, 'Tahun' => $Tahun])}}" class="btn btn-sm btn-success" target="_blank">Cetak</a>
					@endif
				</div>
				<div class="panel-body">
					<table id="table_id" width="100%" class="table table-striped table-advance table-bordered">
						<thead>
							<tr>
								<th class="text-center"> #</th>
								<th class="text-center"> Nomor Agenda</th>
								<th class="text-center"> Jenis Surat</th>
                <th class="text-center"> Dari</th>
                <th class="text-center"> Tanggal Surat</th>
                <th class="text-center"> Sifat</th>
								<th class="text-center"> Perihal</th>
                <th class="text-center"> Status</th>
								<th class="text-center"> Action</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($Disposisi as $Index=>$DataDisposisi)
								<tr>
									<td>{{$Index+=1}}</td>
									<td>{{$DataDisposisi->nomor_agenda}}</td>
									<td>{{$DataDisposisi->JenisSurat}}</td>
									<td>{{$DataDisposisi->dari}}</td>
									<td>{{$DataDisposisi->tanggal_surat}}</td>
									<td>{{$DataDisposisi->SifatText}}</td>
									<td>{{$DataDisposisi->perihal}}</td>
									<td class="text-center">
										<span class="label label-info">
											{{$DataDisposisi->StatusText}}
										</span>
									</td>
									<td class="text-center" style="white-space: nowrap;">
                    <a href="{{Route('Info-Disposisi', ['id' => HCrypt::Encrypt($DataDisposisi->id)])}}" class="btn btn-xs btn-primary">Info</a>
										<a href="{{Route('Edit-Disposisi', ['id' => HCrypt::Encrypt($DataDisposisi->id)])}}" class="btn btn-xs btn-info">Edit</a>
                    <button class="btn btn-xs btn-danger" onclick="hapus('{{Route('Hapus-Disposisi', ['id' => HCrypt::Encrypt($DataDisposisi->id)])}}')">Hapus</button>
										@if ($DataDisposisi->status == 127)
											<a href="{{Route('Cetak-Disposisi', ['id' => HCrypt::Encrypt($DataDisposisi->id)])}}" class="btn btn-xs btn-success" target="_blank">Cetak</a>
										@endif
                  </td>
								</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
@endsection
