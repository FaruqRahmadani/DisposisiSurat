<template>
  <li>
    <a href="#" @click="logout()">
      <em class="fa fa-power-off">&nbsp;</em> Logout
    </a>
  </li>
</template>

<script>
export default {
  methods: {
    logout(){
      swal({
        title   : "Logout",
        text    : "Yakin Ingin Keluar?",
        icon    : "warning",
        buttons : [
          "Batal",
          "Logout",
        ],
      })
      .then((logout) => {
        if (logout) {
          swal({
            title  : "Logout",
            text   : "Anda Telah Logout",
            icon   : "success",
            timer  : 2500,
          });
          window.location = "/logout";
        } else {
          swal({
            title  : "Batal Logout",
            text   : "Anda Batal Logout",
            icon   : "info",
            timer  : 2500,
          })
        }
      });
    }
  }
}
</script>
