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
                <th class="text-center"> Dari</th>
                <th class="text-center"> Nomor</th>
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
									<td>{{$DataDisposisi->dari}}</td>
									<td>{{$DataDisposisi->nomor}}</td>
									<td>{{$DataDisposisi->tanggal_surat}}</td>
									<td>{{$DataDisposisi->SifatText}}</td>
									<td>{{$DataDisposisi->perihal}}</td>
									<td>{{$DataDisposisi->StatusText}}</td>
									<td class="text-center">
                    @if ($DataDisposisi->status == 2)
                    	<a href="{{Route('Update-Disposisi-Kepala-Bidang', ['id' => HCrypt::Encrypt($DataDisposisi->id)])}}" class="btn btn-xs btn-primary">Update</a>
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
