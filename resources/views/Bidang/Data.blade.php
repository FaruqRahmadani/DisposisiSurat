@extends('Layouts.Master')
@section('content')
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading">
          <a href="{{Route('Tambah-Bidang')}}" class="btn btn-sm btn-info">Tambah Data</a>
				</div>
				<div class="panel-body">
					<table class="table table-striped table-advance table-bordered">
						<thead>
							<tr>
								<th class="text-center"> #</th>
                <th class="text-center"> Nama</th>
								<th class="text-center"> Jumlah Pegawai</th>
								<th class="text-center"> Action</th>
							</tr>
						</thead>
						<tbody>
              @foreach ($Bidang as $Index=>$DataBidang)
                <tr>
                  <td>{{$Index+=1}}</td>
                  <td>{{$DataBidang->nama}}</td>
                  <td>{{$DataBidang->Pegawai->count()}}</td>
                  <td class="text-center">
                    <a href="{{Route('Edit-Bidang', ['id' => HCrypt::Encrypt($DataBidang->id)])}}" class="btn btn-xs btn-info">Edit</a>
                    <button class="btn btn-xs btn-danger" onclick="hapus('{{Route('Hapus-Bidang', ['id' => HCrypt::Encrypt($DataBidang->id)])}}')">Hapus</button>
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
