<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Dashboard KUA</h1>
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
            <h6 class="m-0 font-weight-bold text-primary">DATA PERCERAIAN</h6>
        </div>

        <div class="card-body">
            <div class="form-group">
                <div class="mb-3">
                    <label><i class="fa fa-calendar"></i> Tahun :</label>
                    <form method="post" action="<?php echo base_url('Kua') ?>">
                    <select name="tahun" onchange="doSelect(this)" class="form-control">
                        <?php 
                        $long=date('Y');
                        for ($i=2016; $i<=$long; $long--){
                            $selected = "";
                            if ($long == $tahun){
                                $selected = "selected='selected'";
                            } 
                            echo "<option ".$selected.">".$long."</option>";
                        }
                        ?>
                    </select>
                </form>
                </div>
            </div>
        </div>

        <div class="card-body">
            <!--<div><button class='btn text-primary  border border-primary' onclick="tambah_pengguna()"><i class='fa fa-plus'></i> Tambah Pengguna</button></div>-->
            <div class="table-responsive" id="div_pengguna">
                <table class="table table-bordered table-sm table-hover" id="datauser"  cellspacing="0">
                    <thead>
                        <tr class="bg-primary text-light">
                            <th style="text-align: center;">No</th>
                            <th style="text-align: center;">Bulan</th>
                            <th style="text-align: center;">Jumlah</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no=1;
                        foreach($kua->result_array() as $row){


                            ?>
                            <tr>
                                <td><center><?php echo $no++; ?></center></td>
                                <td><?php echo $row['namabulan']; ?></td>
                                <td>
                                    <center><a target="_blank" href="<?php echo base_url('Kua/detail_perkara/'.$tahun.'/'.$row['bulan']);?>"><?php echo $row['jum']; ?></a></center>
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

         <script type="text/javascript">
            function doSelect(el){
                sel = el.options[el.selectedIndex].value;
                if(sel == "-"){
                    alert("Please choose an option");
                }
                else{
                    el.form.submit();
                }
            }
         </script>