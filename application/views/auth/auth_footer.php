  </div>
    </div>
<!-- Bootstrap core JavaScript-->
<script src="<?= base_url('assets/'); ?>vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url('assets/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?= base_url('assets/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?= base_url('assets/'); ?>js/sb-admin-2.min.js"></script>

</body>
<script src="<?= base_url('assets/');?>/sweetalert2/sweetalert2.min.js"></script>


<?php $toast= $this->session->flashdata('toastmsg');?>
<script>
  $(function() {
    var Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 4000
    });

    $(document)
      Toast.fire({
        icon: '<?=$toast['a']?>',
        title: '<?=$toast['b']?>'
      })
    ;
     });
</script>

</html> 