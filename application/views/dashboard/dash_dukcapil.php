<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?php echo $title; ?> DISDUKCAPIL</h1>

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
            <h6 class="m-0 font-weight-bold text-primary">PERKARA PERCERAIAN <a href="<?php echo base_url('Dashboard/capil_ditangani');?>"><button class="btn btn-primary pull-right">Pihak Ditangani</button></a></h6>

        </div>
        <div class="card-body">
            <!--<div><button class='btn text-primary  border border-primary' onclick="tambah_pengguna()"><i class='fa fa-plus'></i> Tambah Pengguna</button></div>-->
            <div class="table-responsive" id="div_pengguna">
                <table class="table table-bordered table-sm table-hover" id="tbl_data"  cellspacing="0">
                    <thead>
                        <tr class="bg-primary text-light">
                            <th style="text-align: center;">No</th>
                            <th style="text-align: center;">Nama<br />NIK</th>
                            <th style="text-align: center;">Alamat</th>
                            <th style="text-align: center;">No. Perkara<br />Tgl. Putusan</th>
                            <th style="text-align: center;">No. Akta Cerai<br />Tgl. Akta Cerai</th>
                            <th style="text-align: center;">Jenis Perkara<br />Jenis Pihak</th>
                            <th style="text-align: center;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                       
      </tbody>
  </table>
</div>
</div>
</div>
</div>
<div class="row">

</div>
<!-- /.container-fluid -->

</div>

<div id="mdl_umum" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="vcenter" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="mdl_umum_title">Update Data</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body" id="mdl_umum_isi">
               
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-info waves-effect" data-dismiss="modal">Close</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- End of Main Content --> 
<!-- The Modal -->

<!-- The Modal -->

<!-- Page level custom scripts -->
<link href="<?php echo base_url('assets/'); ?>vanilla-dataTables/vanilla-dataTables.min.css" rel="stylesheet" type="text/css">
<script src="<?php echo base_url('assets/'); ?>vanilla-dataTables/vanilla-dataTables.min.js" type="text/javascript"></script>
<link href="<?php echo base_url('assets/'); ?>slim_select/slimselect.min.css" rel="stylesheet" />
<script src="<?php echo base_url('assets/'); ?>slim_select/slimselect.min.js"></script>




 <script type="text/javascript">

  $(document).ready(function() {
    tampil_data();
  } );
  var url = "<?php echo base_url(); ?>Dashboard/load_capil";
  function tampil_data(){
    $('#tbl_data').DataTable({
            "processing": true, //Feature control the processing indicator. 
            "serverSide": true, //Feature control DataTables' server-side processing mode.   
            "order": [], //Initial no order.
            rowCallback: function( row, data, index ) {
              if ( data[9] === null )
              {
               $('td', row).css('background-color', 'Yellow');
             }


        },

        paging: true,
        searching: true,
        ordering: true,
        bLengthChange: true,
        pageLength:50,
        bDestroy: true,
        ajax: {
          url: url,
          type: "POST",
          error: function (xhr, error, code)
          {
            console.log(xhr);
            console.log(code);
          }
        }
      });
  }

       function update(id,jenis_pihak){
        var url = '<?php echo base_url()?>Dashboard/load_form_tanggal';

       $('#mdl_umum').modal('show');
        console.log(id);
            $.ajax({
                url: url,
                type: "POST",
                dataType: "html",   
                data: {id,jenis_pihak},
                success: function(data)
                {
                    $("#mdl_umum_isi").html(data);
                    
                },
                error: function (jqXHR, textStatus, errorThrown)
                {
                    $("#mdl_umum_isi").html('Gagal Load Data');
                }
            }); 
       
      }

</script>
