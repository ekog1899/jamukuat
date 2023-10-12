<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">KUA</h1>
    <div class="row" style="margin-bottom: 10px">       
        <div class="col-md-4 text-center">
            <div style="margin-top: 8px" id="message">
                <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
            </div>
        </div>
        
    </div>
    <!-- DataTales Example -->
    <?php echo validation_errors(); ?>

    <?php echo form_open('kua/rentang_data'); ?>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Cari Rentang Data Perceraian</h6>
        </div>
        <div class="card-body">
            <div class="form-group">
                <div class="mb-3">
                    <label><i class="fa fa-calendar"></i> Dari Tanggal :</label>
                    <input type="date" class="form-control" id="dari" name="dari">
                </div>
                <div class="mb-3">
                    <label><i class="fa fa-calendar"></i> Sampai Tanggal :</label>
                    <input type="date" class="form-control" id="sampai" name="sampai">
                </div>
                <input type="submit" value="Proses" class="btn btn-primary pull-left" />
            </div>
            </div>
        </div>
    </div>
    <div class="row">

    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content --> 
<!-- .modal -->
<div class="modal fade" id="Mymodal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Silahkan Tunggu</h4>                                                             
            </div> 
            <div class="modal-body">
                Proses sedang dilakukan
            </div>   
            <div class="modal-footer">
            </div>
        </div>                                                                       
    </div>                                          
</div>
<!-- .modal -->
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
        perPageSelect: [25, 50, 75, 100, 250, 1000],
        buttons: [ 'copy', 'excel', 'pdf', 'colvis' ]
    });
</script>