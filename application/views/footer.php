<!-- Footer -->
<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>© 2021 Pengadilan Tinggi Agama Semarang<br>Direktorat Jenderal Badan Peradilan Agama<br>Mahkamah Agung Republik Indonesia</span>
        </div>
    </div>
</footer>
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Yakin anda akan keluar dari Sistem?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Pilih "Keluar" jika yakin akan keluar dari Sistem dan mengakhiri sesi.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                <a class="btn btn-primary" href="<?= base_url('login/logout'); ?>">Keluar</a>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="infomase" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
   <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"  > <b>Informasi </b></h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Mohon Maaf atas ketidaknyamanan, demi kelancaran, mohon berkenan melengkapi data user serta data mitra <br>
			data User dan mitra  dilengkapi dengan email dan nomor hp</div>
            
        </div>
    </div>
</div>

<!-- Core plugin JavaScript-->
<script src="<?= base_url('assets/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>
<!-- Custom scripts for all pages-->
<script src="<?= base_url('assets/'); ?>js/sb-admin-2.min.js"></script>
<script src="<?= base_url('assets/'); ?>js/bootstrap-datepicker.js"></script>
<!-- Page level plugins -->
<script src="<?= base_url('assets/'); ?>vendor/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url('assets/'); ?>vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->


<script src="<?= base_url('assets/'); ?>js/datepickercustom.js"></script> 
<script src="<?= base_url('assets/');?>/sweetalert2/sweetalert2.min.js"></script>


<?php $toast= $this->session->flashdata('toastmsg');?>
<script>
  $(function() {
    var Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 6000
    });

    $(document)
      Toast.fire({
        icon: '<?=$toast['a']?>',
        title: '<?=$toast['b']?>'
      })
    ;
     });
</script>

<script>
   $(document).ready(function() {
        $('#showmenu').load('<?php echo base_url()."menu/listmenu" ?>');
        // $('select').select2();
   }); 
   
   
   
   
  // $('#infomase').modal('show');

//setTimeout(function() {
 //   $('#infomase').modal('hide');
//}, 6000);
</script>	

		
</body>
</html> 