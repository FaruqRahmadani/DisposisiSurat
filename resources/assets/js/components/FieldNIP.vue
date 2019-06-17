<template>
  <div>
    <div class="form-group">
      <label class="col-md-2 control-label">NIP</label>
      <div class="col-md-10">
        <input id="nip" type="text" name="nip" class="form-control" minlength="18" maxlength="18" v-model="nip" @keyup="cekNIP" required pattern="[0-9\s]{18,18}">
        <label id="label_nip" class="control-label hidden" style="color:red">NIP Sudah Ada</label>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: ['value'],
  data: function(){
    return {
      nip : this.value,
    }
  },
  methods: {
    cekNIP(){
      var tahunNIP = this.nip.slice(0,4);

      console.log(tahunNIP);
      if ((this.nip.length == 18) && ((this.nip != this.value))) {
        if (tahunNIP >= 2000) {
          $("#label_nip").text("Tahun Lahir NIP Salah");
          $( "#label_nip" ).removeClass( "hidden" );
        }else{
          axios({
            method: 'get',
            url: '/api/nip/'+this.nip,
          }).then((response) => {
            console.log(response.data)
            if (response.data) {
              $("#label_nip").text("NIP Sudah Ada");
              $( "#nip" ).addClass( "has-error" );
              $( "#submit" ).prop('disabled', true);
            }else{
              $( "#nip" ).removeClass( "has-error" );
              $( "#label_nip" ).addClass( "hidden" );
              $( "#submit" ).prop('disabled', false);
            }
          })
        }
      }
    }
  }
}
</script>
