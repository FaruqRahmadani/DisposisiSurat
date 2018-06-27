<?php
Route::GET('logout', 'Auth\LoginController@logout')->name('logout');
Route::GET('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::POST('login', 'Auth\LoginController@login');

Route::group(['middleware' => ['AuthMiddleware']], function () {
  Route::GET('', 'UserController@Dashboard')->name('Dashboard');
  Route::GET('info/{id}', 'DisposisiController@Info')->name('Info-Disposisi');

  Route::group(['middleware' => ['AdminMiddleware']], function () {
    Route::prefix('bidang')->group(function () {
      Route::GET('', 'BidangController@Data')->name('Data-Bidang');
      Route::GET('tambah', 'BidangController@Tambah')->name('Tambah-Bidang');
      Route::POST('tambah', 'BidangController@submitTambah')->name('submit-Tambah-Bidang');
      Route::GET('edit/{id}', 'BidangController@Edit')->name('Edit-Bidang');
      Route::POST('edit/{id}', 'BidangController@submitEdit')->name('submit-Edit-Bidang');
      Route::GET('hapus/{id}', 'BidangController@Hapus')->name('Hapus-Bidang');
    });

    Route::prefix('pegawai')->group(function () {
      Route::GET('', 'PegawaiController@Data')->name('Data-Pegawai');
      Route::GET('tambah', 'PegawaiController@Tambah')->name('Tambah-Pegawai');
      Route::POST('tambah', 'PegawaiController@submitTambah')->name('submit-Tambah-Pegawai');
      Route::GET('edit/{id}', 'PegawaiController@Edit')->name('Edit-Pegawai');
      Route::POST('edit/{id}', 'PegawaiController@submitEdit')->name('submit-Edit-Pegawai');
      Route::GET('hapus/{id}', 'PegawaiController@Hapus')->name('Hapus-Pegawai');
    });

    Route::prefix('disposisi')->group(function () {
      Route::GET('', 'DisposisiController@Data')->name('Data-Disposisi');
      Route::GET('tambah', 'DisposisiController@Tambah')->name('Tambah-Disposisi');
      Route::POST('tambah', 'DisposisiController@submitTambah')->name('submit-Tambah-Disposisi');
      Route::GET('edit/{id}', 'DisposisiController@Edit')->name('Edit-Disposisi');
      Route::POST('edit/{id}', 'DisposisiController@submitEdit')->name('submit-Edit-Disposisi');
      Route::GET('hapus/{id}', 'DisposisiController@Hapus')->name('Hapus-Disposisi');
    });
  });

  Route::prefix('disposisi/kadin')->group(function () {
    Route::GET('', 'DisposisiKadinController@Data')->name('Data-Disposisi-Kepala-Dinas');
    Route::GET('update/{id}', 'DisposisiKadinController@Update')->name('Update-Disposisi-Kepala-Dinas');
    Route::POST('update/{id}', 'DisposisiKadinController@submitUpdate')->name('submit-Update-Disposisi-Kepala-Dinas');
  });

  Route::prefix('disposisi/kabid')->group(function () {
    Route::GET('', 'DisposisiKabidController@Data')->name('Data-Disposisi-Kepala-Bidang');
    Route::GET('update/{id}', 'DisposisiKabidController@Update')->name('Update-Disposisi-Kepala-Bidang');
    Route::POST('update/{id}', 'DisposisiKabidController@submitUpdate')->name('submit-Update-Disposisi-Kepala-Bidang');
  });

  Route::prefix('disposisi/staff')->group(function () {
    Route::GET('', 'DisposisiStaffController@Data')->name('Data-Disposisi-Staff');
  });
});
