@extends('Layouts.Master')
@section('content')
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<a href="{{ Route('Data-Disposisi-Kepala-Dinas') }}" class="btn btn-sm btn-info">Kembali</a>
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
					<h4>Lampiran</h4>
					<table class="table table-advance table-bordered">
						<tbody>
							<tr>
								<th class="text-center">
									<img src="{{asset('img/lampiran/'.$Disposisi->foto)}}">
								</th>
							</tr>
						</tbody>
					</table>
					<hr>
					<form class="form-horizontal row-border" action="{{ Route('submit-Update-Disposisi-Kepala-Dinas', ['Id' => HCrypt::Encrypt($Disposisi->id)]) }}" method="POST">
						{{csrf_field()}}
						<div class="form-group">
							<label class="col-md-2 control-label">Aksi Lanjutan</label>
							<div class="col-md-10">
								<select name="bidang_id" class="form-control input-lg" required>
									<option value="" selected hidden>Aksi Lanjutan</option>
									<option value="127">Terima</option>
									@foreach ($Bidang as $DataBidang)
										<option value="{{$DataBidang->id}}" {{old('bidang_id') == $DataBidang->id ? 'selected' : ''}}>Teruskan Ke Bidang {{$DataBidang->nama}}</option>
									@endforeach
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label">Dengan Hormat Harap</label>
							<div class="col-md-10">
								<label class="radio-inline">
									<input type="radio" name="status" value="Tanggapan dan Saran">Tanggapan dan Saran
								</label>
								<label class="radio-inline">
									<input type="radio" name="status" value="Proses Lebih Lanjut">Proses Lebih Lanjut
								</label>
								<label class="radio-inline">
									<input type="radio" name="status" value="Koordinasi/Konfirmasi">Koordinasi/Konfirmasi
								</label>
								<label class="radio-inline">
									<input type="radio" name="status" value="custom">
									<input type="text" name="status_custom" class="input-sm">
								</label>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-2 control-label">Catatan</label>
						<div class="col-md-10">
							<textarea name="catatan" rows="8" cols="80" class="form-control"></textarea>
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
