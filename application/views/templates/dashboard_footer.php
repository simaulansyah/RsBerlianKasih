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

</body>
<script src="<?= base_url('vendor/jquery/jquery.min.js'); ?>"></script>
<script src="<?= base_url('vendor/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
<script src="<?= base_url('vendor/jquery-easing/jquery.easing.min.js'); ?>"></script>
<script type="text/html"  src="<?= base_url('vendor/js/ruang-admin.min.js'); ?>"></script>
<script src="<?= base_url('vendor/jquery/jquery-3.5.1.js'); ?>"> </script>
<script src="<?= base_url('vendor/js/jquery.dataTables.min.js');?>"></script>
<script src="<?= base_url('vendor/js/dataTables.bootstrap4.min.js')?>" ></script>
<script src="<?= base_url('vendor/bootstrap-datepicker/js/bootstrap-datepicker.js')?>" ></script>



<script>
$('.custom-file-input').on('change',function(){
  let fileName = $(this).val().split('\\').pop();
  $(this).next('.custom-file-label').addClass("selected").html(fileName);
})

</script>


<script>
    $(document).ready(function() {
    $('#example').DataTable();
} );
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
</html>