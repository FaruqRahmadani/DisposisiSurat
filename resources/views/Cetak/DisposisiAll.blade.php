<html lang="en" dir="ltr">
<head>
	<meta charset="utf-8">
	<title>Disposisi</title>
	<style>
	.title{
		font-size: 10pt;
		font-weight: bold;
	}
	.content{
		margin-left: 15px;
		margin-right: 15px;
	}
	th, td {
		vertical-align:top;
	}
	.tabel-isi{
		border-collapse: collapse;
	}

	.tabel-isi > thead > tr > th{
		text-align: center;
		padding-top: 10px;
		padding-bottom: 10px;
	}

	.tabel-isi > thead > tr > th, .tabel-isi > tbody > tr > td {
		border: solid 1px black;
	}
	.tabel-isi > tbody > tr > td {
		padding-left: 6px;
		padding-right: 6px;
		padding-top: 5px;
		padding-bottom: 5px;
	}

	</style>
</head>
<body>
	<table width="100%" align="center">
		<tr>
			<td width="15%" align="center">
				<img height="70px" src="../public/img/logo/Banjarbaru.png" alt="Banjarbaru">
			</td>
			<td align="center">
				<b class="title">
				PEMERINTAH KOTA BANJARBARU
				</b>
				<br>
				<b style="font-size: 13pt">
					DINAS KOPERASI, USAHA KECIL MENEGAH DAN TENAGA KERJA
				</b>
				<br>
				Alamat : Jl. Soekarno-Hatta (Samping AKR) Trikora - Kota Banjarbaru
			</td>
		</tr>
	</table>
	<hr>
	<br>
	<table width="100%" align="center">
		<tr>
			<td align="center">
				<u><b>
					LAPORAN SURAT MASUK PADA BULAN (XXXX) TAHUN (XXXX)
				</b></u>
			</td>
		</tr>
	</table>
	<br>
	<table class="tabel-isi" style="width:100%">
		<thead>
			<tr>
				<th> #</th>
				<th> Nomor Agenda</th>
				<th> Jenis Surat</th>
				<th> Dari</th>
				<th> Tanggal Surat</th>
				<th> Sifat</th>
				{{-- <th> Perihal</th> --}}
			</tr>
		</thead>
		<tbody>
			@foreach ($Disposisi as $Index=>$DataDisposisi)
				<tr>
					<td align="center">{{$Index+=1}}</td>
					<td>{{$DataDisposisi->nomor_agenda}}</td>
					<td align="center">{{$DataDisposisi->JenisSurat}}</td>
					<td>{{$DataDisposisi->dari}}</td>
					<td align="center">{{$DataDisposisi->tanggal_surat}}</td>
					<td align="center">{{$DataDisposisi->SifatText}}</td>
					{{-- <td>{{$DataDisposisi->perihal}}</td> --}}
				</tr>
			@endforeach
		</tbody>
	</table>
</body>
</html>
