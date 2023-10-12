<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
   <!--  <h1 class="h3 mb-4 text-gray-800">KEMENAG</h1> -->
    <div class="row" style="margin-bottom: 10px">       


    </div>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Daftar KUA</h6>
        </div>
        <div class="card-body">
            <!--<div><button class='btn text-primary  border border-primary' onclick="tambah_pengguna()"><i class='fa fa-plus'></i> Tambah Pengguna</button></div>-->
            <div class="table-responsive" id="div_pengguna">
                <table class="table table-bordered table-sm table-hover" id="datauser"  cellspacing="0">
                    <thead>
                        <tr class="bg-primary text-light">
                            <th style="text-align: center;">No</th>
                            <th style="text-align: center;">Nama KUA</th>
                            <th style="text-align: center;">Jumlah Data</th>
                            <th style="text-align: center;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no=1;
                        foreach($kua->result_array() as $row){
                            ?>
                            <tr>
                                <td><center><?php echo $no++; ?></center></td>
                                <td><?php echo $row['nama_satker']; ?></td>
                                <td>
                                    <center>
                                        <?php
                                        $ci=& get_instance();
                                        $ci->load->model('Api_m');
                                        $result = $ci->Api_m->get_kua($row['mitra_id'],$pengadilan_id);
                                         echo $result->num_rows();
                                        ?>
                                         </center>
                                </td>
                                <td>
                                    <center>
                                     <a href="<?php echo base_url() ."Kua/kua_kemenag/".$row['mitra_id'].'/'.$pengadilan_id?>"><button type="button" class="btn btn-primary">Detail</button></a> 
                                </center>
                                </td>

                            </tr>
                            <?php 

                        }?>
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
        perPageSelect: [25, 50, 75, 100, 250, 1000]
    });
</script>