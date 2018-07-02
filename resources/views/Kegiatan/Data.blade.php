@extends('Layouts.Master')
@section('content')
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading">
          <a href="{{Route('Tambah-Kegiatan')}}" class="btn btn-sm btn-info">Tambah Data</a>
				</div>
				<div class="panel-body">
					<table id="table_id" width="100%" class="table table-striped table-advance table-bordered">
						<thead>
							<tr>
								<th class="text-center"> #</th>
                <th class="text-center"> Tanggal</th>
                <th class="text-center"> Uraian Kegiatan</th>
                <th class="text-center"> Tempat</th>
                <th class="text-center"> Keterangan</th>
								<th class="text-center"> Action</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($Kegiatan as $Index=>$DataKegiatan)
								<tr>
									<td>{{$Index+=1}}</td>
									<td>{{HTanggal::Format($DataKegiatan->tanggal)}}</td>
									<td>{!!nl2br($DataKegiatan->uraian)!!}</td>
									<td>{{$DataKegiatan->tempat}}</td>
									<td>{!!nl2br($DataKegiatan->keterangan)!!}</td>
									<td class="text-center">
										<a href="{{Route('Edit-Kegiatan', ['id' => HCrypt::Encrypt($DataKegiatan->id)])}}" class="btn btn-xs btn-info">Edit</a>
                    <button class="btn btn-xs btn-danger" onclick="hapus('{{Route('Hapus-Kegiatan', ['id' => HCrypt::Encrypt($DataKegiatan->id)])}}')">Hapus</button>
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
