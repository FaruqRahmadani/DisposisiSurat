@extends('Layouts.Master')
@section('content')
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<a href="{{Route('Data-Kegiatan')}}" class="btn btn-sm btn-info">Kembali</a>
				</div>
				<div class="panel-body">
					<form class="form-horizontal row-border" action="{{ Route('submit-Tambah-Kegiatan') }}" method="POST" enctype="multipart/form-data">
						{{csrf_field()}}
						<div class="form-group">
							<label class="col-md-2 control-label">Tanggal Kegiatan</label>
							<div class="col-md-10">
								<input type="date" name="tanggal" class="form-control" required value="{{old('tanggal')}}">
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label">Uraian</label>
							<div class="col-md-10">
								<textarea name="uraian" rows="4" cols="80" class="form-control" required></textarea>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label">Tempat</label>
							<div class="col-md-10">
								<input type="text" name="tempat" class="form-control" required value="{{old('tempat')}}">
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label">Keterangan</label>
							<div class="col-md-10">
								<textarea name="keterangan" rows="4" cols="80" class="form-control" required></textarea>
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
