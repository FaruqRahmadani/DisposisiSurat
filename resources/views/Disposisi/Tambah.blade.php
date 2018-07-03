@extends('Layouts.Master')
@section('content')
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<a href="{{Route('Data-Disposisi')}}" class="btn btn-sm btn-info">Kembali</a>
				</div>
				<div class="panel-body">
					<form class="form-horizontal row-border" action="{{ Route('submit-Tambah-Disposisi') }}" method="POST" enctype="multipart/form-data">
						{{csrf_field()}}
						<div class="form-group">
							<label class="col-md-2 control-label">Jenis Surat</label>
							<div class="col-md-10">
								<label class="radio-inline">
									<input type="radio" name="tipe" value="1" {{old('tipe') == 1 ? 'checked' : ''}}>Surat Masuk
								</label>
								<label class="radio-inline">
									<input type="radio" name="tipe" value="2" {{old('tipe') == 2 ? 'checked' : ''}}>Surat Undangan
								</label>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label">Surat Dari</label>
							<div class="col-md-10">
								<input type="text" name="dari" class="form-control" required value="{{old('dari')}}">
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label">Nomor Surat</label>
							<div class="col-md-10">
								<input type="text" name="nomor" class="form-control" required value="{{old('nomor')}}">
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label">Tanggal Surat</label>
							<div class="col-md-10">
								<input type="date" name="tanggal_surat" class="form-control" required value="{{old('tanggal_surat')}}">
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label">Tanggal Terima</label>
							<div class="col-md-10">
								<input type="date" name="tanggal_terima" class="form-control" required value="{{old('tanggal_terima')}}">
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label">Nomor Agenda</label>
							<div class="col-md-10">
								<input type="text" name="nomor_agenda" class="form-control" required value="{{sprintf("%04s", $DisposisiId)}}" readonly>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label">Sifat</label>
							<div class="col-md-10">
								<label class="radio-inline">
									<input type="radio" name="sifat" value="1" {{old('sifat') == 1 ? 'checked' : ''}}>Sangat Segera
								</label>
								<label class="radio-inline">
									<input type="radio" name="sifat" value="2" {{old('sifat') == 2 ? 'checked' : ''}}>Segera
								</label>
								<label class="radio-inline">
									<input type="radio" name="sifat" value="3" {{old('sifat') == 3 ? 'checked' : ''}}>Rahasia
								</label>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label">Perihal</label>
							<div class="col-md-10">
								<input type="text" name="perihal" class="form-control" required value="{{old('perihal')}}">
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label">Lampirkan Foto</label>
							<div class="col-md-10">
								<input type="file" name="foto" class="form-control" required value="{{old('foto')}}" accept="image/*">
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
