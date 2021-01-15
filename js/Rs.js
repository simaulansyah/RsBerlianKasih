//datatabel
$(document).ready(function() {
    $('#datatabel').DataTable();
} );
//selectIDruangan
$(document).ready(function(){
    $(document).on('click', '#selectidRuangan', function (){
  
      var id_ruangan = $(this).data('id_ruangan');
      var nama_ruangan = $(this).data('nama_ruangan')
      var kelas = $(this).data('kelas');
      $('#id_ruangan').val(id_ruangan);
      $('#nama_ruangan').val(nama_ruangan);
      $('#kelas').val(kelas);
      $('#idRuangan').modal('hide');
    })
  })
//datepickerlahir 
  $(function(){
    $("#datepickerlahir").datepicker({
      format : 'dd-mm-yyyy',
      autoclose: true,
      todayHighlight : true,
    });
    });
    // editdatepickerlahir
    $(function(){
      $("#editdatepickerlahir").datepicker({
        format : 'dd-mm-yyyy',
        autoclose: true,
        todayHighlight : true,
      });
      });
// datepickermasukkerja
    $(function(){
      $("#datepickermasukkerja").datepicker({
        format : 'dd-mm-yyyy',
        autoclose: true,
        todayHighlight : true,
      });
      });
//generateslipgaji
$(document).ready(function(){
  $(document).on('click', '#select', function (){
    var today = new Date();
    var dd = String(today.getDate()).padStart(2, '0');
    var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
    var yyyy = today.getFullYear();
    today = mm + '/' + dd + '/' + yyyy;
    var no_slip = 'sl_' + Math.random().toString(36).substr(2, 4)+ '/' + mm;
    var nip = $(this).data('nip');
    var nama_pegawai = $(this).data('nama_pegawai')
    var tgl = today;
    var nama_jabatan = $(this).data('nama_jabatan');
    var gaji_pokok = $(this).data('gaji_pokok');
    var tunj_jabatan = $(this).data('tunj_jabatan');
    var potongan = document.getElementById("potongan").value;
    var total = (gaji_pokok + tunj_jabatan) - potongan ;
    $('#no_slip').val(no_slip);
    $('#nip').val(nip);
    $('#nama_pegawai').val(nama_pegawai);
    $('#tgl').val(tgl);
    $('#nama_jabatan').val(nama_jabatan);
    $('#gaji_pokok').val(gaji_pokok);
    $('#tunj_jabatan').val(tunj_jabatan);
    $('#myModal').modal('hide');
  })
})