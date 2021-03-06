@extends('Layouts.Master')
@section('content')
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<a href="{{ Route('Data-Disposisi') }}" class="btn btn-sm btn-info">Kembali</a>
				</div>
				<div class="panel-body">
					<form class="form-horizontal row-border" action="{{Route('submit-Edit-Disposisi', ['Id' => HCrypt::Encrypt($Disposisi->id)])}}" method="POST" enctype="multipart/form-data">
						{{csrf_field()}}
						<div class="form-group">
							<label class="col-md-2 control-label">Jenis Surat</label>
							<div class="col-md-10">
								<label class="radio-inline">
									<input type="radio" name="tipe" value="1" {{$Disposisi->tipe == 1 ? 'checked' : ''}} required>Surat Masuk
								</label>
								<label class="radio-inline">
									<input type="radio" name="tipe" value="2" {{$Disposisi->tipe == 2 ? 'checked' : ''}} required>Surat Undangan
								</label>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label">Surat Dari</label>
							<div class="col-md-10">
								<input type="text" name="dari" class="form-control" required value="{{$Disposisi->dari}}">
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label">Nomor Surat</label>
							<div class="col-md-10">
								<input type="text" name="nomor" class="form-control" required value="{{$Disposisi->nomor}}">
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label">Tanggal Surat</label>
							<div class="col-md-10">
								<input type="date" name="tanggal_surat" class="form-control" required value="{{$Disposisi->tanggal_surat}}">
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label">Tanggal Terima</label>
							<div class="col-md-10">
								<input type="date" name="tanggal_terima" class="form-control" required value="{{$Disposisi->tanggal_terima}}">
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label">Nomor Agenda</label>
							<div class="col-md-10">
								<input type="text" name="nomor_agenda" class="form-control" required value="{{$Disposisi->nomor_agenda}}">
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label">Sifat</label>
							<div class="col-md-10">
								<label class="radio-inline">
									<input type="radio" name="sifat" value="1" {{$Disposisi->sifat == 1 ? 'checked' : ''}} required>Sangat Segera
								</label>
								<label class="radio-inline">
									<input type="radio" name="sifat" value="2" {{$Disposisi->sifat == 2 ? 'checked' : ''}} required>Segera
								</label>
								<label class="radio-inline">
									<input type="radio" name="sifat" value="3" {{$Disposisi->sifat == 3 ? 'checked' : ''}} required>Rahasia
								</label>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label">Perihal</label>
							<div class="col-md-10">
								<input type="text" name="perihal" class="form-control" required value="{{$Disposisi->perihal}}">
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label">Lampirkan Foto</label>
							<div class="col-md-10">
								<input type="file" name="foto" class="form-control" value="{{old('foto')}}" accept="image/*">
								<small>Isi hanya jika merubah lampiran</small>
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
