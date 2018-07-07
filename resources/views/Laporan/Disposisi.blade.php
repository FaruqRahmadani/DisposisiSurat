{{-- {{dd(HTanggal::DataBulan())}} --}}
@extends('Layouts.Master')
@section('content')
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-body">
					<form class="form-horizontal row-border" action="{{ Route('Data-Laporan-Disposisi') }}" method="POST" enctype="multipart/form-data">
						{{csrf_field()}}
						<div class="form-group">
							<div class="col-md-12">
								<div class="col-md-5 text-center">
									<span>Bulan</span>
									<select class="form-control" name="bulan" required>
										<option value="" selected hidden>Bulan</option>
										@foreach (HTanggal::DataBulan() as $DataBulan)
											<option value="{{$DataBulan['id']}}">{{$DataBulan['nama']}}</option>
										@endforeach
									</select>
								</div>
								<div class="col-md-5 text-center">
									<span>Tahun</span>
									<select class="form-control" name="tahun" required>
										<option value="" selected hidden>Tahun</option>
										@for ($i=$DateMax->format('Y'); $i <= Carbon\Carbon::now()->format('Y'); $i++)
											<option value="{{$i}}">{{$i}}</option>
										@endfor
									</select>
								</div>
								<div class="col-md-2" style="padding-top:20px">
									<button type="submit" class="form-control btn btn-info btn-fill">Lihat Data</button>
								</div>
							</div>
						</div
					</form>
				</div>
			</div>
		</div>
	</div>
@endsection
