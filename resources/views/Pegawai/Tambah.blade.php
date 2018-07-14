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
								<input id="nip" type="text" name="nip" class="form-control" minlength="18" maxlength="18" required pattern="[0-9\s]{18,18}" value="{{old('nip')}}">
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
									<option value="IA" {{old('golongan') == 'IA' ? 'selected' : ''}}>IA</option>
									<option value="IB" {{old('golongan') == 'IB' ? 'selected' : ''}}>IB</option>
									<option value="IC" {{old('golongan') == 'IC' ? 'selected' : ''}}>IC</option>
									<option value="ID" {{old('golongan') == 'ID' ? 'selected' : ''}}>ID</option>
									<option value="IIA"{{old('golongan') == 'IIA' ? 'selected' : ''}}>IIA</option>
									<option value="IIB"{{old('golongan') == 'IIB' ? 'selected' : ''}}>IIB</option>
									<option value="IIC"{{old('golongan') == 'IIC' ? 'selected' : ''}}>IIC</option>
									<option value="IID"{{old('golongan') == 'IID' ? 'selected' : ''}}>IID</option>
									<option value="IIIA" {{old('golongan') == 'IIIA' ? 'selected' : ''}}>IIIA</option>
									<option value="IIIB" {{old('golongan') == 'IIIB' ? 'selected' : ''}}>IIIB</option>
									<option value="IIIC" {{old('golongan') == 'IIIC' ? 'selected' : ''}}>IIIC</option>
									<option value="IIID" {{old('golongan') == 'IIID' ? 'selected' : ''}}>IIID</option>
									<option value="IVA" {{old('golongan') == 'IVA' ? 'selected' : ''}}>IVA</option>
									<option value="IVB" {{old('golongan') == 'IVB' ? 'selected' : ''}}>IVB</option>
									<option value="IVC" {{old('golongan') == 'IVC' ? 'selected' : ''}}>IVC</option>
									<option value="IVD" {{old('golongan') == 'IVD' ? 'selected' : ''}}>IVD</option>
									<option value="IVE" {{old('golongan') == 'IVE' ? 'selected' : ''}}>IVE</option>
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
									<input type="radio" name="jabatan" value="1" {{old('jabatan') == 1 ? 'checked' : ''}} required>Kepala Bidang
								</label>
								<label class="radio-inline">
									<input type="radio" name="jabatan" value="2" {{old('jabatan') == 2 ? 'checked' : ''}} required>Staf Bidang
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
									<input type="radio" name="tipe" value="0" {{old('tipe') == 0 ? 'checked' : ''}} required>Non-Admin
								</label>
								<label class="radio-inline">
									<input type="radio" name="tipe" value="1" {{old('tipe') == 1 ? 'checked' : ''}} required>Admin
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
