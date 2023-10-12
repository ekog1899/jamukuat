
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Data Perkara Dispensasi Kawin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>
  <div class="position-absolute top-50 start-50 translate-middle" id="loader" style="display: none">
    <div class="spinner-grow text-primary" role="status">
  <span class="visually-hidden">Loading...</span>
</div>
  </div>

  <div class="container-fluid">
  	<nav class="navbar navbar-light">
    <a href="<?php echo base_url('dispensasi/ambil_data')?>" target="_blank" class="btn btn-sm btn-primary right" type="button">Singkron Data</a>
</nav> 
	<center>
  	<h5>REKAPITULASI JENIS PUTUSAN PERKARA DISPENSASI KAWIN</h5>
  	<h5>PENGADILAN AGAMA SE WILAYAH PENGADILAN TINGGI AGAMA SEMARANG</h5>
  	</center>
	<div class="mb-3 row">
		<table id="example" class="table table-striped">
        <thead>
            <tr> <th>No</th> <th>Tahun</th> <th>Diterima</th><th>Dicabut</th> <th>Diputus</th> <th>Dikabulkan</th>  <th>Ditolak</th> <th>NO</th> <th>Gugur</th> <th>Dicoret</th> </tr>
        </thead>
        <tbody>
        	<?php
        		$no=0;
        		$diterima=0;
        		$dicabut=0;
        		$diputus=0;
        		$dikabulkan=0;
        		$ditolak=0;
        		$gugur=0;
        		$tidak_diterima=0;
        		$dicoret=0;
        		$sql="	SELECT 
            tahun
            ,sum(diterima) AS diterima
,sum(dicabut) AS dicabut
,sum(diputus) AS diputus
,sum(dikabulkan) AS dikabulkan
,sum(ditolak) AS ditolak
,sum(gugur) AS gugur
,sum(tidak_diterima) AS tidak_diterima
,sum(dicoret) AS dicoret

        				,REPLACE(pengadilan_agama.nama,'PENGADILAN AGAMA ','') AS pa
    					FROM data_dispensasi_kawin
    					LEFT JOIN pengadilan_agama ON pengadilan_agama.id=data_dispensasi_kawin.pn_id
    					GROUP BY tahun";
        		$query = $this->db->query($sql);
				if($query->num_rows() > 0){
  					foreach ($query->result() as $row) {
  						$no++;
  						$diterima=$row->diterima+$diterima;
						$dicabut=$row->dicabut+$dicabut;
						$diputus=$row->diputus+$diputus;
						$dikabulkan=$row->dikabulkan+$dikabulkan;
						$ditolak=$row->ditolak+$ditolak;
						$gugur=$row->gugur+$gugur;
						$tidak_diterima=$row->tidak_diterima+$tidak_diterima;
						$dicoret=$row->dicoret+$dicoret;

						echo "<tr><td>$no</td><td><span style='cursor:pointer' onclick='data_tahun(".$row->tahun.")'>".$row->tahun."</span></td> <td>".number_format($row->diterima,0,",",".")."</td> <td>".$row->dicabut."</td> <td>".number_format($row->diputus,0,",",".")."</td> <td>".number_format($row->dikabulkan,0,",",".")."</td> <td>".number_format($row->ditolak,0,",",".")."</td> <td>".number_format($row->gugur,0,",",".")."</td> <td>".$row->tidak_diterima."</td> <td>".$row->dicoret."</td> </tr>";
					}
				}

        	?>
          </tbody>
        <tfoot>
            <tr>
               <?php echo "<tr><th></th><th>Jumlah</th> <th>".number_format($diterima,0,",",".")."</th> <th>".number_format($dicabut,0,",",".")."</th> <th>".number_format($diputus,0,",",".")."</th> <th>".number_format($dikabulkan,0,",",".")."</th> <th>".number_format($ditolak,0,",",".")."</th> <th>".number_format($gugur,0,",",".")."</th> <th>".number_format($tidak_diterima,0,",",".")."</th> <th>".number_format($dicoret,0,",",".")."</th> </tr>";?>
            </tr>
        </tfoot>
    </table>
    <br>
    Untuk Detail Pertahun, silahkan klik pada Tahun
    </div>
  </div> 
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-fullscreen">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Data Perkara Dispensasi Kawin <span id="tahune"></span></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" id="isi">
        ...
      </div>
    </div>
  </div>
</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script type="text/javascript">
    	var myModal = new bootstrap.Modal(document.getElementById('myModal'), {
		  keyboard: false
		})
    	function data_tahun(tahun){
    		__("loader").style="display:block";
    		var b = new XMLHttpRequest();
	        b.open("POST", "<?php echo base_url()?>dispensasi/data_tahun", true);
	        b.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	        b.onreadystatechange = function () {
	            if (b.readyState == XMLHttpRequest.DONE && b.status == 200){
	                var c = b.responseText;
	                __("isi").innerHTML = c;
                  __("tahune").innerHTML = tahun;
    				__("loader").style="display:none";
	                myModal.show();
	            }
	        }
	        b.send("tahun="+tahun);
    	}
    	function __(elemen){
    		return document.getElementById(elemen);
    	}
    </script>
</body>
</html>