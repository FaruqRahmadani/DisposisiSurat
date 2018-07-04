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
			td, th {
				vertical-align:top;
			}
		</style>
	</head>
	<body>
		<table border="1" cellspacing="0" width="100%">
			<tr>
				<td colspan="2" align="center" style="line-height: 20pt; padding-bottom: 10px;">
					<b>
						LEMBAR DISPOSISI
					</b>
				</td>
			</tr>
			<tr>
				<td width="50%">
					<br>
					<table width="100%">
						<tr>
							<td class="title" width="45%" align="right">SURAT DARI</td>
							<td width="5%"> : </td>
							<td align="left">{{$Disposisi->dari}}</td>
						</tr>
						<tr>
							<td class="title" width="45%" align="right">NOMOR SURAT</td>
							<td width="5%"> : </td>
							<td align="left">{{$Disposisi->nomor}}</td>
						</tr>
						<tr>
							<td class="title" width="45%" align="right">TANGGAL SURAT</td>
							<td width="5%"> : </td>
							<td align="left">{{HTanggal::Format($Disposisi->tanggal_surat)}}</td>
						</tr>
					</table>
					<br>
				</td>
				<td>
					<br>
					<table width="100%">
						<tr>
							<td class="title" width="45%" align="right">DITERIMA TANGGAL</td>
							<td width="5%"> : </td>
							<td align="left">{{HTanggal::Format($Disposisi->tanggal_terima)}}</td>
						</tr>
						<tr>
							<td class="title" width="45%" align="right">NOMOR AGENDA</td>
							<td width="5%"> : </td>
							<td align="left">{{$Disposisi->nomor_agenda}}</td>
						</tr>
						<tr>
							<td class="title" width="45%" align="right">SIFAT</td>
							<td width="5%"> : </td>
							<td align="left">{{$Disposisi->SifatText}}</td>
						</tr>
					</table>
					<br>
				</td>
			</tr>
			<tr>
				<td colspan="2">
					<p class="title content">
						PERIHAL :
					</p>
					<p class="content">
						{{$Disposisi->perihal}}
					</p>
				</td>
			</tr>
			<tr>
				<td>
					<p class="title content">
						Diteruskan Kepada Saudara  :
					</p>
					<p class="content">
						<ul>
							@if ($Disposisi->DisposisiKabid)
								<li>Kepala Bidang {{$Disposisi->DisposisiKadin->Bidang->nama}}</li>
								@if ($Disposisi->DisposisiKabid->pegawai_id != 127)
									<li>Staff {{$Disposisi->DisposisiKabid->Pegawai->nama}}</li>
								@endif
							@endif
						</ul>
					</p>
				</td>
				<td>
					<p class="title content">
						Dengan Hormat Harap  :
					</p>
					<p class="content">
						{{$Disposisi->DisposisiKadin->status}}
					</p>
				</td>
			</tr>
			<tr>
				<td colspan="2">
					<p class="title content" >
						Catatan Kepala Dinas :
					</p>
					<p class="content">
						{{$Disposisi->DisposisiKadin->catatan}}
					</p>
				</td>
			</tr>
			<tr>
				<td colspan="2">
					<p class="title content" >
						Catatan Kabid. XXXXX :
					</p>
					<p class="content">
						{{$Disposisi->DisposisiKabid->catatan}}
					</p>
				</td>
			</tr>
			<tr>
				<td width="100%" colspan="2">
					<table width="100%">
						<tr>
				<td width="50%">
					<br>
					<table class="content" width="100%">
						{{-- di isi oleh staff --}}
						<tr>
							<td class="title" colspan="3" align="center">
								Tanda Terima
								<br>
								<br>
							</td>
						</tr>
						<tr>
							<td class="title" width="45%" align="left">JABATAN</td>
							<td width="5%"> : </td>
							<td align="left">{{HPenerima::Pegawai($Disposisi)->JabatanText}} {{HPenerima::Pegawai($Disposisi)->Bidang->nama}}</td>
						</tr>
						<tr>
							<td class="title" width="45%" align="left">TANGGAL</td>
							<td width="5%"> : </td>
							<td align="left">{{HTanggal::Format($Disposisi->updated_at)}}</td>
						</tr>
						<tr>
							<td class="title" width="45%" align="left">NAMA</td>
							<td width="5%"> : </td>
							<td align="left">{{HPenerima::Pegawai($Disposisi)->nama}}</td>
						</tr>
					</table>
					<br>
				</td>
				<td>
					<br>
					<table class="content" width="100%">
						<tr>
							<td class="title" colspan="3" align="center">
								Kepala Dinas Koperasi, UKM dan Tenaga Kerja
								<br>
								Kota Banjarbaru
								<br>
								<br>
							</td>
						</tr>
						<tr>
							<td class="title" width="45%" align="left">TANGGAL</td>
							<td width="5%"> : </td>
							<td align="left">{{HTanggal::Format(Carbon\Carbon::Now())}}</td>
						</tr>
						<tr>
							<td class="title" width="45%" align="left">NAMA</td>
							<td width="5%"> : </td>
							<td align="left">{{HPenerima::KepalaDinas()->nama}}</td>
						</tr>
					</table>
					<br>
				</td>
			</tr>
					</table>
				</td>
			</tr>
		</table>
	</body>
</html>
