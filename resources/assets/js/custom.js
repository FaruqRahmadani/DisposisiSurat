import swal from 'sweetalert';

Vue.component('button-logout', require('./components/ButtonLogout.vue'));

var vm = new Vue({
  el: '#app',
});

$('#nip').on('keypress', function(e) {
  var charCode = (e.which) ? e.which : event.keyCode
  if (charCode > 31 && (charCode < 48 || charCode > 57))

  return false;
  return true;
});

window.notif = function (tipe, judul, pesan){
  swal({
    title: judul,
    text: pesan,
    icon: tipe,
    button: "OK",
  });
}

window.hapus = function(link, relasi=0){
  if (!relasi) {
  swal({
    title   : "Hapus",
    text    : "Yakin Ingin Hapus Data?",
    icon    : "warning",
    buttons : [
      "Batal",
      "Hapus",
    ],
  })
  .then((hapus) => {
    if (hapus) {
      swal({
        title  : "Berhasil",
        text   : "Data Akan dihapus",
        icon   : "success",
        timer  : 2500,
      });
      window.location = link;
    } else {
      swal({
        title  : "Batal",
        text   : "Data Batal dihapus",
        icon   : "info",
        timer  : 2500,
      })
    }
  });
  }else{
    swal({
      title   : "Hapus",
      text    : "Data tidak bisa dihapus karena ada data relasi",
      icon    : "warning",
      buttons : "OK",
    })
  }
}
