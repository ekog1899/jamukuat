<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->

  <div class="row" style="margin-bottom: 10px">       
    <div class="col-md-4 text-center">
      <div style="margin-top: 8px" id="message">
        <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
      </div>
    </div>

  </div>
  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary"><a href="<?php echo base_url('Dashboard/dashboard_dukcapil');?>"><button class="btn btn-primary pull-right">Kembali</button></a></h6>

    </div>

    <div class="card-body">
      <!--<div><button class='btn text-primary  border border-primary' onclick="tambah_pengguna()"><i class='fa fa-plus'></i> Tambah Pengguna</button></div>-->
      <form method="POST" action="<?php echo base_url('Dashboard/dashboard_dukcapil_hasil');?>">
         <div class="form-group">
            <label for="varchar">Cari Berdasarkan Nama atau NIK  (harus lengkap dan sesuai dengan data/formulir yang dikirimkan) </label>
            <input type="text" class="form-control" name="cari" placeholder="Nama atau NIK" required="" />
        </div>
        <button class="btn btn-danger pull-right" type="submit">Cari</button>
      </form>
    </div>
  </div>
</div>
<div class="row">

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content --> 
<!-- The Modal -->

<!-- The Modal -->

<!-- Page level custom scripts -->
<link href="<?php echo base_url('assets/'); ?>vanilla-dataTables/vanilla-dataTables.min.css" rel="stylesheet" type="text/css">
<script src="<?php echo base_url('assets/'); ?>vanilla-dataTables/vanilla-dataTables.min.js" type="text/javascript"></script>
<link href="<?php echo base_url('assets/'); ?>slim_select/slimselect.min.css" rel="stylesheet" />
<script src="<?php echo base_url('assets/'); ?>slim_select/slimselect.min.js"></script>

<script>

</script>
<script type="text/javascript">
  var dataTable = new DataTable("#datauser", {
    searchable: true,
    perPage: 25,
    perPageSelect: [25, 50, 75, 100, 250, 1000]
  });
</script>