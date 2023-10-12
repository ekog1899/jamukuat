<!doctype html>
<html>
    <head>
        <title>Daftar Perkara </title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            body{
                padding: 15px;
            }
        </style>
        
    </head>
    <body>
        <h2 style="margin-top:0px">Daftar Perkara Eksekusi  </h2>
        <div class="row" style="margin-bottom: 10px">
		

            <div class="col-md-4">
                <?php echo anchor(site_url('perkaraeksekusi/index'),'kembali', 'class="btn btn-primary"'); ?>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('perkaraeksekusi2/perkara/'.$satker.'/'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('perkaraeksekusi'); ?>" class="btn btn-default">Reset</a>
                                    <?php
                                }
                            ?>
                          <button class="btn btn-primary" type="submit">Search</button>
                        </span>
                    </div>
                </form>
            </div>
        </div>
        <table class="table table-bordered" style="margin-bottom: 10px">
            <tr>
                <th>Nomo</th>

		<th>Nomor Perkara</th>
		<th>Eksekusi Nomor Perkara</th>
		<th> Nomor Eksekusi </th>
		<th> Tanggal </th>
		<th> Pemohon  </th>
		<th> aksi  </th>

            </tr><?php
            foreach ($perkaraeksekusi_data as $perkaraeksekusi)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>

			<td><?php echo $perkaraeksekusi->nomor_perkara_pn ?></td>
			
			
			
			
	
			<td><?php echo $perkaraeksekusi->eksekusi_nomor_perkara ?></td>

			<td><?php echo $perkaraeksekusi->nomor_register_eksekusi ?></td>


			<td><?php echo $perkaraeksekusi->permohonan_eksekusi ?></td>
			<td><?php echo $perkaraeksekusi->pemohon_eksekusi ?></td>

			

			<td style="text-align:center" width="200px">
				<?php 
				echo anchor(site_url('perkaraeksekusi2/read/'.$perkaraeksekusi->pa_id),'Read'); 
				
				?>
			</td>
		</tr>
                <?php
            }
            ?>
        </table>
        <div class="row">
            <div class="col-md-6">
                <a href="#" class="btn btn-primary">Total Record : <?php echo $total_rows ?></a>
		<?php echo anchor(site_url('perkaraeksekusi2/excel'), 'Excel', 'class="btn btn-primary"'); ?>
	    </div>
            <div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div>
        </div>
        <script type="text/javascript">
            function serialize(form) {
              var field, l, s = [];
              if (typeof form == 'object' && form.nodeName == "FORM") {
                var len = form.elements.length;
                for (var i = 0; i < len; i++) {
                  field = form.elements[i];
                  if (field.name && !field.disabled && field.type != 'file' && field.type != 'reset' && field.type !=
                    'submit' && field.type != 'button') {
                    if (field.type == 'select-multiple') {
                      l = form.elements[i].options.length;
                      for (var j = 0; j < l; j++) {
                        if (field.options[j].selected)
                          s[s.length] = encodeURIComponent(field.name) + "=" + encodeURIComponent(field.options[j].value);
                      }
                    } else if ((field.type != 'checkbox' && field.type != 'radio') || field.checked) {
                      s[s.length] = encodeURIComponent(field.name) + "=" + encodeURIComponent(field.value);
                    }
                  }
                }
              }
              return s.join('&').replace(/%20/g, '+');
            }

            function aanmaning_simpan() {
              //document.getElementById("loader").style = 'display:block';
              var xhr = new XMLHttpRequest();
              var data = serialize(aanmaning);
              var url = 'api';
              xhr.open("POST", url, true);
              xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
              xhr.onreadystatechange = function () {
                if (xhr.readyState == XMLHttpRequest.DONE && xhr.status == 200){
                    //document.getElementById("div_modal_detail").innerHTML =xhr.responseText;
                    //document.getElementById("modal_detail").style.display = "block";
                    ////document.getElementById("nama_terlapor").focus();
                    //document.getElementById("loader").style.display = "none";
                    location.reload();
                }
              }
              xhr.send(data);
            }
        </script>
    </body>
</html>




