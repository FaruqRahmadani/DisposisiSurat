@extends('Layouts.Master')
@section('content')
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
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
							@foreach ($Disposisi as $Index=>$DataDisposisi)
								<tr>
									<td>{{$Index+=1}}</td>
									<td>{{$DataDisposisi->dari}}</td>
									<td>{{$DataDisposisi->nomor}}</td>
									<td>{{$DataDisposisi->tanggal_surat}}</td>
									<td>{{$DataDisposisi->SifatText}}</td>
									<td>{{$DataDisposisi->perihal}}</td>
									<td>{{$DataDisposisi->StatusText}}</td>
									<td class="text-center">
										@if ($DataDisposisi->status != 127)
											<a href="{{Route('Terima-Data-Disposisi-Staff', ['id' => HCrypt::Encrypt($DataDisposisi->id)])}}" class="btn btn-xs btn-primary">Terima</a>
										@else
											<a href="{{Route('Info-Disposisi', ['id' => HCrypt::Encrypt($DataDisposisi->id)])}}" class="btn btn-xs btn-info">Info</a>
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
