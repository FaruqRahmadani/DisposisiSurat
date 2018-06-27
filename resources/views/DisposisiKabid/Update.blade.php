@extends('Layouts.Master')
@section('content')
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<a href="{{ Route('Data-Disposisi-Kepala-Bidang') }}" class="btn btn-sm btn-info">Kembali</a>
				</div>
				<div class="panel-body">
					<div class="row">
						<div class="col-md-6">
							<table class="table table-striped table-advance table-bordered">
								<tbody>
									<tr>
										<th>Surat Dari</th>
										<th>{{$Disposisi->dari}}</th>
									</tr>
									<tr>
										<th>Nomor Surat</th>
										<th>{{$Disposisi->nomor}}</th>
									</tr>
									<tr>
										<th>Tanggal Surat</th>
										<th>{{HTanggal::Format($Disposisi->tanggal_surat)}}</th>
									</tr>
								</tbody>
							</table>
						</div>
						<div class="col-md-6">
							<table class="table table-striped table-advance table-bordered">
								<tbody>
									<tr>
										<th>Diterima Tanggal</th>
										<th>{{HTanggal::Format($Disposisi->tanggal_terima)}}</th>
									</tr>
									<tr>
										<th>Nomor Agenda</th>
										<th>{{$Disposisi->nomor_agenda}}</th>
									</tr>
									<tr>
										<th>Sifat</th>
										<th>{{$Disposisi->SifatText}}</th>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
					<h4>Perihal</h4>
					<table class="table table-striped table-advance table-bordered">
						<tbody>
							<tr>
								<th>{{$Disposisi->perihal}}</th>
							</tr>
						</tbody>
					</table>
					<hr>
					<div class="row">
						<div class="col-md-6">
							<table class="table table-advance table-bordered col-info-disposisi">
								<tbody>
									<tr>
										<th>Diteruskan Kepada Kepala</th>
										<th>{{$Disposisi->DisposisiKadin->Bidang->nama}}</th>
									</tr>
								</tbody>
							</table>
						</div>
						<div class="col-md-6">
							<table class="table table-advance table-bordered col-info-disposisi">
								<tbody>
									<tr>
										<th>Dengan Hormat Harap</th>
										<th>{{$Disposisi->DisposisiKadin->status}}</th>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
					<h4>Catatan Kepala Dinas</h4>
					<table class="table table-advance table-bordered">
						<tbody>
							<tr>
								<th>{{$Disposisi->DisposisiKadin->catatan}}</th>
							</tr>
						</tbody>
					</table>
					<hr>
					<form class="form-horizontal row-border" action="{{ Route('submit-Update-Disposisi-Kepala-Bidang', ['Id' => HCrypt::Encrypt($Disposisi->id)]) }}" method="POST">
						{{csrf_field()}}
						<div class="form-group">
							<label class="col-md-2 control-label">Catatan Kepala Bidang</label>
							<div class="col-md-10">
								<input type="text" name="catatan" class="form-control" required>
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
