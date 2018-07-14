<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Disposisi Surat</title>
  <link rel="shortcut icon" type="image/png" href="{{ asset('img/logo/Banjarbaru-icon.png') }}"/>
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <style>
  .dataTables_paginate{
    text-align: right;
  }
  body {
    background-image: url("/img/back.jpg");
    background-repeat: repeat;
  }
  </style>
</head>
<body>
  <nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
    <div class="container-fluid">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand">
          <span>
            <img src="{{ asset('img/logo/Banjarbaru.png') }}" alt="Banjarbaru">
          </span>
          &nbsp; Manajemen Disposisi Surat
        </a>
      </div>
    </nav>
    <div id="app">
      <div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
        <div class="profile-sidebar">
          @if (Auth::User())
            <div class="profile-usertitle">
              <div class="profile-usertitle-name">{{Auth::User()->username}}</div>
              <div class="profile-usertitle-status">
                {{HAuth::Data()->nama}}
              </div>
            </div>
            <div class="clear"></div>
          @endif
        </div>
        <div class="divider"></div>
        <ul class="nav menu">
          @if (!Auth::User())
            <li {{HRoute::ActiveRoute('login')}}>
              <a href="{{ Route('login') }}">
                <em class="fa fa-dashboard">&nbsp;</em> Login
              </a>
            </li>
          @else
            <li {{HRoute::ActiveRoute('Dashboard')}}>
              <a href="{{ Route('Dashboard') }}">
                <em class="fa fa-dashboard">&nbsp;</em> Dashboard
              </a>
            </li>
            @if (Auth::User()->tipe)
              <li {{HRoute::ActiveRoute('Data-Bidang')}}>
                <a href="{{ Route('Data-Bidang') }}">
                  <em class="fa fa-dashboard">&nbsp;</em> Bidang
                </a>
              </li>
              <li {{HRoute::ActiveRoute('Data-Pegawai')}}>
                <a href="{{ Route('Data-Pegawai') }}">
                  <em class="fa fa-dashboard">&nbsp;</em> Pegawai
                </a>
              </li>
              <li {{HRoute::ActiveRoute('Data-Disposisi')}}>
                <a href="{{ Route('Data-Disposisi') }}">
                  <em class="fa fa-dashboard">&nbsp;</em> Disposisi
                </a>
              </li>
              <li {{HRoute::ActiveRoute('Data-Kegiatan')}}>
                <a href="{{ Route('Data-Kegiatan') }}">
                  <em class="fa fa-dashboard">&nbsp;</em> Kegiatan
                </a>
              </li>
              <li {{HRoute::ActiveRoute('Laporan-Disposisi')}}>
                <a href="{{ Route('Laporan-Disposisi') }}">
                  <em class="fa fa-dashboard">&nbsp;</em> Laporan Disposisi
                </a>
              </li>
            @elseif (HAuth::Data()->bidang_id == 1)
              <li {{HRoute::ActiveRoute('Data-Disposisi-Kepala-Dinas')}}>
                <a href="{{ Route('Data-Disposisi-Kepala-Dinas') }}">
                  <em class="fa fa-dashboard">&nbsp;</em> Disposisi
                </a>
              </li>
            @else
              @if (HAuth::Data()->jabatan == 1)
                <li {{HRoute::ActiveRoute('Data-Disposisi-Kepala-Bidang')}}>
                  <a href="{{ Route('Data-Disposisi-Kepala-Bidang') }}">
                    <em class="fa fa-dashboard">&nbsp;</em> Disposisi
                  </a>
                </li>
              @endif
              @if (HAuth::Data()->jabatan == 2)
                <li {{HRoute::ActiveRoute('Data-Disposisi-Staff')}}>
                  <a href="{{ Route('Data-Disposisi-Staff') }}">
                    <em class="fa fa-dashboard">&nbsp;</em> Disposisi
                  </a>
                </li>
              @endif
            @endif
            <button-logout></button-logout>
          @endif
        </ul>
      </div>
      <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        @if (Auth::User())
          <div class="row row-header">
            <div class="col-lg-12">
              <h3 class="page-header">{{HRoute::JudulRoute()}}</h3>
            </div>
          </div>
        @endif
        @yield('content')
      </div>
    </div>
    {{-- footer --}}
    <nav class="navbar navbar-custom navbar-fixed-bottom">
      <div class="container-fluid" style="line-height: 31px; font-size: 11pt; color: white; padding-top: 17;">
        <center>
          Dinas Koperasi, UKM & Tenaga Kerja, Jl. Soekarno-Hatta (Samping AKR) Trikora - Kota Banjarbaru
        </center>
      </nav>
      {{-- <footer class="footer">
      <div class="container-fluid">
      <nav class="pull-left">
      <ul>
    </ul>
  </nav>
  <p class="copyright pull-right"> Dinas Koperasi, UKM & Tenaga Kerja, Jl. Soekarno-Hatta (Samping AKR) Trikora - Kota Banjarbaru</p>
</div>
</footer> --}}
<script src="{{ asset('js/app.js') }}"></script>
@if (session('alert'))
  <script type="text/javascript">
  notif('{{session('tipe')}}', '{{session('judul')}}', '{{session('pesan')}}');
  </script>
@endif
@if ($errors->any())
  <script type="text/javascript">
  notif('error', 'Terjadi Kesalahan', '{{ $errors->first() }}');
  </script>
@endif

</body>
<script>
  function hanyaAngka(evt) {
    var charCode = (evt.which) ? evt.which : event.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57))

    return false;
    return true;
}
</script>
</html>
