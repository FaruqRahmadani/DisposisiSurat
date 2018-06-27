@extends('Layouts.Master')
@section('content')
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<a href="{{ Route('Data-Disposisi-Kepala-Dinas') }}" class="btn btn-sm btn-info">Kembali</a>
				</div>
				<div class="panel-body">
					<h4>Status</h4>
					<table class="table table-advance table-bordered">
						<tbody class="status-disposisi">
							<tr>
								<th>{{$Disposisi->StatusText}}</th>
							</tr>
						</tbody>
					</table>
					<div class="row">
						<div class="col-md-6">
							<table class="table table-advance table-bordered col-info-disposisi">
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
							<table class="table table-advance table-bordered col-info-disposisi">
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
					<table class="table table-advance table-bordered">
						<tbody>
							<tr>
								<th>{{$Disposisi->perihal}}</th>
							</tr>
						</tbody>
					</table>
					@if ($Disposisi->DisposisiKadin)
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
					@endif
				</div>
			</div>
		</div>
	</div>
@endsection
