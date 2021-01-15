<div>
</div>
</div>
</div>
<footer class="sticky-footer bg-white">
  <div class="container my-auto">
    <div class="copyright text-center my-auto">
      <span>copyright &copy; <script>
          document.write(new Date().getFullYear());
        </script> - developed by
        <b><a href="" target="_blank">Microbyte.id</a></b>
      </span>
    </div>
  </div>
</footer>
<!-- Footer -->
</div>
</div>

<!-- Scroll to top -->
<a class="scroll-to-top rounded" href="#page-top">
  <i class="fas fa-angle-up"></i>
</a>

<script src="<?= base_url('vendor/jquery/jquery-3.5.1.js'); ?>"> </script>

<script src="<?= base_url('vendor/jquery/jquery.min.js'); ?>"></script>
<script src="<?= base_url('vendor/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
<script src="<?= base_url('vendor/jquery-easing/jquery.easing.min.js'); ?>"></script>
<script type="text/html"  src="<?= base_url('vendor/js/ruang-admin.min.js'); ?>"></script>
<script src="<?= base_url('vendor/js/jquery.dataTables.min.js');?>"></script>
<script src="<?= base_url('vendor/js/dataTables.bootstrap4.min.js')?>" ></script>
<script src="<?= base_url('vendor/bootstrap-datepicker/js/bootstrap-datepicker.js')?>" ></script>
<script src="<?= base_url('vendor/mylibrary/datatable.js')?>" ></script>

<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script> -->


<script>
$('.custom-file-input').on('change',function(){
  let fileName = $(this).val().split('\\').pop();
  $(this).next('.custom-file-label').addClass("selected").html(fileName);
})

</script>


        <!-- datepicker 1 -->

        <script type="text/javascript">
$(function(){
$("#datepickerlahir").datepicker({
  format : 'dd-mm-yyyy',
  autoclose: true,
  todayHighlight : true,
});
});

</script>


        <!-- datepicker 2 -->

        <script type="text/javascript">
$(function(){
$("#datepickermasuk").datepicker({
  format : 'dd-mm-yyyy',
  autoclose: true,
  todayHighlight : true,
});
});

</script>



<script>
$(document).ready(function(){
  $(document).on('click', '#select', function (){
    var today = new Date();
    var dd = String(today.getDate()).padStart(2, '0');
    var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
    var yyyy = today.getFullYear();

    today = mm + '/' + dd + '/' + yyyy;
    //document.write(today);

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


$(document).ready(function(){
  $(document).on('click', '#saveAsset', function (){
    var today = new Date();
    var dd = String(today.getDate()).padStart(2, '0');
    var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
    var yyyy = today.getFullYear();

    var kategori = document.getElementById("kategori").value;
    var tahun = document.getElementById("tahun").value;
    var lastid = document.getElementById("lastvalueid").value;

    var id_asset = 'aset_' + lastid +'/'+ mm + tahun;

    console.log(id_asset);

    $('#idasset').val(id_asset);


  })
})






</script>
</body>
</html>