 
 <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                     
<?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>

            <?= $this->session->flashdata('message'); ?>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">DAFTAR PERKARA EKSEKUSI  </h6>
							
                        </div>


                        <div class="card-body">
	


<div class="form-group">
 
    <div class="col-lg-3" >
      <select name="tahun" id="tahun" class="form-control">
    <option value="0">TAMPIL SEMUA TAHUN</option>

	 <?php foreach($tahun as $tahun1): ?>
            <option value="<?php echo $tahun1->tahun; ?>"><?php echo $tahun1->tahun; ?></option>
            <?php endforeach; ?>
  </select>
    </div>
</div>

                            <div class="table-responsive">
                              <table class="table table-bordered table-sm table-hover" id="example"  cellspacing="0">
                                    <thead>
                                        <tr class="bg-primary text-light">
                                          
                                            <th style="width: 3%">No</th>
                                            <th style="width: 40%">Satker</th>
                                            <th style="width: 15%">Jumlah</th>
                                            <th style="width: 20%">Selesai / Pencabutan Permohonan Eksekusi</th>
                                            <th style="width: 15%">Dalam Proses</th>
                                            
                                            
                                        </tr>
                                    </thead>
                                  
                                    <tbody> 
									
									</tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->
				
				
				
				
				
				

<!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script> -->
<script>

$(document).ready(function(){
	daftarpa();
	$("#tahun").change(function(){
	//let a =$(this).val();
	//console.log(a);
		daftarpa();
	});
});

function daftarpa(){
	var tahun=$("#tahun").val();
	var BASE_URL = "<?php echo base_url();?>";
	var csrfName = '<?php echo $this->security->get_csrf_token_name(); ?>',csrfHash = '<?php echo $this->security->get_csrf_hash(); ?>';
        // console.log(csrfName+'   '+csrfHash)
    var dataJson = { [csrfName]: csrfHash, tahun: tahun };
	
	$.ajax({
		url	: "<?=base_url('Data_eksekusi/ambil_data')?>",
        type: "get",
		// data : "tahun="+tahun,
		data: dataJson,
		success:function(data2){
		console.log(data2);
	var t =		$("#example").DataTable( {"columnDefs": [ {
            "searchable": false,
            "orderable": false,
            "targets": 0
        } ],
        "order": [[ 1, 'asc' ]],
				destroy: true,
        "aaData": data2,
        "columns": [
         
            { "data": "id" },
            { "data": "nama" },
            { "data": "jml",
			"render": function(data, type, row, meta){
					
		var text = '101/'+row.id + '/'+tahun+'/M@gelang';		
		var encode = btoa(text);
		//console.log(encodedStringBtoA);
            if(type === 'display'){
				
				
                data = '<a href=" ' +BASE_URL+ 'data_eksekusi/daftarperkara_list/'+encode+'">' + data + '</a>';
            }

            return data;
			}},
            {"data":"selesai"},
            {"data":"dalam_proses"}
			
			
        ]
    });
	 t.on( 'order.dt search.dt', function () {
        t.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
            cell.innerHTML = i+1;
			t.cell(cell).invalidate('dom');
        } );
    } ).draw();
	
		}
	});
}
	
 $('select').select2();
 </script>