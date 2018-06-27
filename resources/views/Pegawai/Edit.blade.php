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
								<input type="text" name="nip" class="form-control" required value="{{$Pegawai->nip}}">
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
								<input type="text" name="golongan" class="form-control" required value="{{$Pegawai->golongan}}">
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
