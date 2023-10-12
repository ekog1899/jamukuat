<table id="example" class="table table-striped" style="width:100%">
        <thead>
            <tr> <th>No</th> <th>PA</th> <th>Diterima</th><th>Dicabut</th> <th>Diputus</th> <th>Dikabulkan</th>  <th>Ditolak</th> <th>NO</th> <th>Gugur</th> <th>Dicoret</th> </tr>
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
        		$sql="	SELECT data_dispensasi_kawin.*
        				,REPLACE(pengadilan_agama.nama,'PENGADILAN AGAMA ','') AS pa
    					FROM pengadilan_agama
    					RIGHT JOIN data_dispensasi_kawin ON data_dispensasi_kawin.pn_id=pengadilan_agama.id
    					WHERE jenis_pengadilan =4 AND data_dispensasi_kawin.tahun=$tahun";
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

						echo "<tr><td>$no</td><td><a onclick='data_tahun(".$row->tahun.")'>".$row->pa."</a></td> <td>".$row->diterima."</td> <td>".$row->dicabut."</td> <td>".$row->diputus."</td> <td>".$row->dikabulkan."</td> <td>".$row->ditolak."</td> <td>".$row->gugur."</td> <td>".$row->tidak_diterima."</td> <td>".$row->dicoret."</td> </tr>";
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