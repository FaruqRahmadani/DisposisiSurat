@extends('Layouts.Master')
@section('content')
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<a href="{{Route('Data-Pegawai')}}" class="btn btn-sm btn-info">Kembali</a>
				</div>
				<div class="panel-body">
					<form class="form-horizontal row-border" action="{{ Route('submit-Edit-Pegawai', ['Id' => HCrypt::Encrypt($Pegawai->id)]) }}" method="POST">
						{{csrf_field()}}
						<div class="form-group">
							<label class="col-md-2 control-label">NIP</label>
							<div class="col-md-10">
								<input type="text" name="nip" class="form-control" required pattern="[0-9\s]{19,19}" value="{{$Pegawai->nip}}">
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label">Nama</label>
							<div class="col-md-10">
								<input type="text" name="nama" class="form-control" required value="{{$Pegawai->nama}}">
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label">Golongan</label>
							<div class="col-md-10">
								<select name="golongan" class="form-control input-lg" required>
									<option value="" selected hidden>Golongan</option>
									<option value="IA" {{$Pegawai->golongan == 'IA' ? 'selected' : ''}}>IA</option>
									<option value="IB" {{$Pegawai->golongan == 'IB' ? 'selected' : ''}}>IB</option>
									<option value="IC" {{$Pegawai->golongan == 'IC' ? 'selected' : ''}}>IC</option>
									<option value="ID" {{$Pegawai->golongan == 'ID' ? 'selected' : ''}}>ID</option>
									<option value="IIA" {{$Pegawai->golongan == 'IIA' ? 'selected' : ''}}>IIA</option>
									<option value="IIB" {{$Pegawai->golongan == 'IIB' ? 'selected' : ''}}>IIB</option>
									<option value="IIC" {{$Pegawai->golongan == 'IIC' ? 'selected' : ''}}>IIC</option>
									<option value="IID" {{$Pegawai->golongan == 'IID' ? 'selected' : ''}}>IID</option>
									<option value="IIIA" {{$Pegawai->golongan == 'IIIA' ? 'selected' : ''}}>IIIA</option>
									<option value="IIIB" {{$Pegawai->golongan == 'IIIB' ? 'selected' : ''}}>IIIB</option>
									<option value="IIIC" {{$Pegawai->golongan == 'IIIC' ? 'selected' : ''}}>IIIC</option>
									<option value="IIID" {{$Pegawai->golongan == 'IIID' ? 'selected' : ''}}>IIID</option>
									<option value="IVA" {{$Pegawai->golongan == 'IVA' ? 'selected' : ''}}>IVA</option>
									<option value="IVB" {{$Pegawai->golongan == 'IVB' ? 'selected' : ''}}>IVB</option>
									<option value="IVC" {{$Pegawai->golongan == 'IVC' ? 'selected' : ''}}>IVC</option>
									<option value="IVD" {{$Pegawai->golongan == 'IVD' ? 'selected' : ''}}>IVD</option>
									<option value="IVE" {{$Pegawai->golongan == 'IVE' ? 'selected' : ''}}>IVE</option>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label">Bidang</label>
							<div class="col-md-10">
								<select name="bidang_id" class="form-control input-lg" required>
									@if ($Pegawai->bidang_id == 1)
										<option value="1" selected>Kepala Bidang</option>
									@else
										<option value="" selected hidden>Bidang</option>
										@foreach ($Bidang as $DataBidang)
											<option value="{{$DataBidang->id}}" {{$Pegawai->Bidang->id == $DataBidang->id ? 'selected' : ''}}>{{$DataBidang->nama}}</option>
										@endforeach
									@endif
								</select>
							</div>
						</div>
						@if ($Pegawai->bidang_id != 1)
							<div class="form-group">
								<label class="col-md-2 control-label">Jabatan</label>
								<div class="col-md-10">
									<label class="radio-inline">
										<input type="radio" name="jabatan" value="1" {{$Pegawai->jabatan == 1 ? 'checked' : ''}}>Kepala Bidang
									</label>
									<label class="radio-inline">
										<input type="radio" name="jabatan" value="2" {{$Pegawai->jabatan == 2 ? 'checked' : ''}}>Staf Bidang
									</label>
								</div>
							</div>
						@endif
						<hr>
						<div class="form-group">
							<label class="col-md-2 control-label">Username</label>
							<div class="col-md-10">
								<input type="text" name="username" class="form-control" required value="{{$Pegawai->User->username}}">
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label">Password</label>
							<div class="col-md-10">
								<input type="password" name="password" class="form-control">
								<small>Isi Hanya Jika Ingin Ganti Password</small>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label">Hak Akses</label>
							<div class="col-md-10">
								<label class="radio-inline">
									<input type="radio" name="tipe" value="0" {{$Pegawai->User->tipe == 0 ? 'checked' : ''}}>Non-Admin
								</label>
								<label class="radio-inline">
									<input type="radio" name="tipe" value="1" {{$Pegawai->User->tipe == 1 ? 'checked' : ''}}>Admin
								</label>
							</div>
						</div>
						<div class="row">
							<div class="text-center">
								<div class="col-md-12">
									<button type="submit" class="btn btn-info btn-fill">Simpan</button>
									<button type="reset" class="btn btn-warning btn-fill">Batal</button>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
@endsection
