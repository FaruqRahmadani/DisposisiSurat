@extends('Layouts.Master')
@section('content')
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading">
          <a href="{{Route('Tambah-Pegawai')}}" class="btn btn-sm btn-info">Tambah Data</a>
				</div>
				<div class="panel-body">
					<table class="table table-striped table-advance table-bordered">
						<thead>
							<tr>
								<th class="text-center"> #</th>
                <th class="text-center"> NIP</th>
                <th class="text-center"> Nama</th>
                <th class="text-center"> Golongan</th>
                <th class="text-center"> Bidang</th>
                <th class="text-center"> Jabatan</th>
								<th class="text-center"> Action</th>
							</tr>
						</thead>
						<tbody>
              @foreach ($Pegawai as $Index=>$DataPegawai)
                <tr>
                  <td>{{$Index+=1}}</td>
                  <td>{{$DataPegawai->nip}}</td>
                  <td>{{$DataPegawai->nama}}</td>
                  <td>{{$DataPegawai->golongan}}</td>
                  <td>{{$DataPegawai->Bidang->nama}}</td>
                  <td>{{$DataPegawai->JabatanText}}</td>
                  <td class="text-center">
                    <a href="{{Route('Edit-Pegawai', ['id' => HCrypt::Encrypt($DataPegawai->id)])}}" class="btn btn-xs btn-info">Edit</a>
                    <button class="btn btn-xs btn-danger" onclick="hapus('{{Route('Hapus-Pegawai', ['id' => HCrypt::Encrypt($DataPegawai->id)])}}')">Hapus</button>
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
