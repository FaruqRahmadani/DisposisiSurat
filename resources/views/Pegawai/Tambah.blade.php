@extends('Layouts.Master')
@section('content')
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<a href="{{Route('Data-Pegawai')}}" class="btn btn-sm btn-info">Kembali</a>
				</div>
				<div class="panel-body">
					<form class="form-horizontal row-border" action="{{ Route('submit-Tambah-Pegawai') }}" method="POST">
						{{csrf_field()}}
						<div class="form-group">
							<label class="col-md-2 control-label">NIP</label>
							<div class="col-md-10">
								<input type="text" name="nip" class="form-control" required value="{{old('nip')}}">
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label">Nama</label>
							<div class="col-md-10">
								<input type="text" name="nama" class="form-control" required value="{{old('nama')}}">
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label">Golongan</label>
							<div class="col-md-10">
								<select name="golongan" class="form-control input-lg" required>
									<option value="" selected hidden>Golongan</option>
									<option value="IA">IA</option>
									<option value="IB">IB</option>
									<option value="IC">IC</option>
									<option value="ID">ID</option>
									<option value="IIA">IIA</option>
									<option value="IIB">IIB</option>
									<option value="IIC">IIC</option>
									<option value="IID">IID</option>
									<option value="IIIA">IIIA</option>
									<option value="IIIB">IIIB</option>
									<option value="IIIC">IIIC</option>
									<option value="IIID">IIID</option>
									<option value="IVA">IVA</option>
									<option value="IVB">IVB</option>
									<option value="IVC">IVC</option>
									<option value="IVD">IVD</option>
									<option value="IVE">IVE</option>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label">Bidang</label>
							<div class="col-md-10">
								<select name="bidang_id" class="form-control input-lg" required>
									<option value="" selected hidden>Bidang</option>
									@foreach ($Bidang as $DataBidang)
										<option value="{{$DataBidang->id}}" {{old('bidang_id') == $DataBidang->id ? 'selected' : ''}}>{{$DataBidang->nama}}</option>
									@endforeach
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label">Jabatan</label>
							<div class="col-md-10">
								<label class="radio-inline">
									<input type="radio" name="jabatan" value="1" {{old('jabatan') == 1 ? 'checked' : ''}}>Kepala Bidang
								</label>
								<label class="radio-inline">
									<input type="radio" name="jabatan" value="2" {{old('jabatan') == 2 ? 'checked' : ''}}>Staf Bidang
								</label>
							</div>
						</div>
						<hr>
						<div class="form-group">
							<label class="col-md-2 control-label">Username</label>
							<div class="col-md-10">
								<input type="text" name="username" class="form-control" required value="{{old('username')}}">
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label">Password</label>
							<div class="col-md-10">
								<input type="password" name="password" class="form-control" required>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label">Hak Akses</label>
							<div class="col-md-10">
								<label class="radio-inline">
									<input type="radio" name="tipe" value="0" {{old('tipe') == 0 ? 'checked' : ''}}>Non-Admin
								</label>
								<label class="radio-inline">
									<input type="radio" name="tipe" value="1" {{old('tipe') == 1 ? 'checked' : ''}}>Admin
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
