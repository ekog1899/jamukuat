<div class="w3-row"><h3>Managemen Blangko HT</h3></div>
<div class="w3-row"><a onclick="tambah_blangko()" href="#" class="w3-btn w3-dark-grey w3-padding-small">+ Tambah Blangko</a></div>
<hr> <div class="w3-row" id="tampilan"></div>
</div>
<link href="<?php echo base_url()?>assets/dropzone/dropzone.min.css" type="text/css" rel="stylesheet" />
<script src="<?php echo base_url()?>assets/dropzone/dropzone.min.js"></script>
<!-- Modal --> 
  <div id="modal_detail" class="w3-modal" style="padding-top: 0px">
    <div class="w3-modal-content" style="width: 100%;min-height: 90vh;">
      <div class="w3-container">
      	<div class="w3-half">
	      	<p>
	      		Jenis Blangko<br>
	      		<select class="w3-input w3-border w3-white" onchange="pilih_jenis_blangko(this.value)" id="jenis_blangkoid">
	      			<option value=""></option>
	      			<?php
	      				for ($i = 0; $i < count($jenis_blangko); ++$i){
	      					echo '<option value="'.$jenis_blangko[$i]->jenis_blangko_id.'">'.$jenis_blangko[$i]->jenis_blangko_nama.'</option>';
	      				}
	      			?>
	      			
	      		</select>
	      	</p>
      	</div>
      	<div class="w3-half"><span class="w3-right w3-btn w3-round w3-red w3-small" onclick="tutup_modal_detil()">X</span></div>
      </div>
      <div class="w3-row">
        <div class="w3-container" id="div_modal_detail">
        	<div class="w3-row" id="inputan_tambah">
        		<form id="myDropzoneDokumen" action="<?php echo base_url()?>blangko/tambah" class="dropzone">
                 <input id="jenis_blangko_id" name="jenis_blangko_id" type="hidden">
          		</form>
          </div>
        </div>
      </div>
    </div>
  </div>
<!-- Modal -->
<!-- ModalEdit --> 
  <div id="modal_detail_edit" class="w3-modal" style="padding-top: 0px">
    <div class="w3-modal-content" style="width: 100%;min-height: 90vh;">
      <div class="w3-container">
      	<div class="w3-half">
	      	<p>
	      		Jenis Blangko <br>
	      		<select class="w3-input w3-border w3-white" onchange="ubah_jenis(this.value)" id="jenis_blangkoid_edit">
	      			<?php
	      				for ($i = 0; $i < count($jenis_blangko); ++$i){
	      					echo '<option value="'.$jenis_blangko[$i]->jenis_blangko_id.'">'.$jenis_blangko[$i]->jenis_blangko_nama.'</option>';
	      				}
	      			?>
	      			
	      		</select>
	      	</p>
	      	<p>Nama Dokumen<br>
	      		<input id="nama_edit" class="w3-input w3-border" onchange="ubah_nama(this.value)">
	      	</p>
	      	<p>Template<br>
	      		<a href="" id="url_template" class="w3-btn w3-round w3-green" target="_blank">Unduh</a>
	      	</p>
	      	<p>
	      		<span onclick="ganti_blanko()" class="w3-btn w3-round w3-green" style="cursor:pointer;">Ganti Blangko</a>
	      	</p>
      	</div>
      	<div class="w3-half"><span class="w3-right w3-btn w3-round w3-red w3-small" onclick="tutup_modal_detil_edit()">X</span></div>
      </div>
      <div class="w3-row">
        <div class="w3-container" id="div_modal_detail_edit">
        	<div class="w3-row" id="inputan_edit">
        		<form id="myDropzoneDokumen_edit" action="<?php echo base_url()?>blangko/edit" class="dropzone">
                 <input id="template_id" name="template_id" type="hidden">
          		</form>
          </div>
        </div>
      </div>
      <div class="w3-row">
        <div class="w3-container">
        	<p><span class="w3-right w3-btn w3-round w3-red w3-small" onclick="hapus_blangko()">Hapus Blangko</span></p>
        </div>
      </div>
    </div>
  </div>
<!-- ModalEdit -->
<script type="text/javascript">
	Dropzone.autoDiscover = false;
	var errors = false;
	new Dropzone("#myDropzoneDokumen",{ 
		acceptedFiles: ".rtf",
		init: function(){
			this.on("success", function(file, responseText){
			 	obj = JSON.parse(responseText);
				tampilan();
				edit_blangko(obj.id);
				
	    	}
	    );
	  }
	});
</script>
<script type="text/javascript">
	Dropzone.autoDiscover = false;
	var errors = false;
	new Dropzone("#myDropzoneDokumen_edit",{ 
		acceptedFiles: ".rtf",
		init: function(){
			this.on("success", function(file, responseText){
					tampilan();
			 		tutup_modal_detil_edit();
	    	}
	    );
	  }
	});
</script>
<script type="text/javascript">
function buka_daftar(id){
    var x = document.getElementById(id);
    if (x.classList) { 
        x.classList.toggle("w3-show");
    } else {
    if (x.className.indexOf("w3-show") == -1) 
        x.className = x.className + " w3-show";
    else 
        x.className = x.className.replace("w3-show", "");
    }
}

function tambah_blangko(){
	document.getElementById("jenis_blangkoid").value='';
	document.getElementById("jenis_blangko_id").value='';
	document.getElementById("modal_detail").style.display = "block";
	document.getElementById("inputan_tambah").style.display = "none";
}
function tutup_modal_detil(){
	document.getElementById("jenis_blangkoid").value='';
	document.getElementById("modal_detail").style.display = "none";
}
function tutup_modal_detil_edit(){
	document.getElementById("jenis_blangkoid_edit").value='';
	document.getElementById("modal_detail_edit").style.display = "none";
}

function pilih_jenis_blangko(isi){
	if(isi==""){
		return false;
	}else{
		document.getElementById("jenis_blangko_id").value=isi;
	document.getElementById("inputan_tambah").style.display = "block";
	}
}
function ubah_kode_edit(isi){
	document.getElementById("nama_edit").value=isi;
	
}
function ganti_blanko(isi){
	document.getElementById("inputan_edit").style.display="block";
	
}
function edit_blangko(id){
	document.getElementById("modal_detail").style.display="none";
        var xhr = new XMLHttpRequest();
        xhr.open("POST","<?php echo base_url('blangko/get_data_blangko')?>", true);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function () {
            if (xhr.readyState == XMLHttpRequest.DONE && xhr.status == 200){
            	var obj = JSON.parse(xhr.responseText);
							document.getElementById("url_template").href = "template/"+obj[0].kode+".rtf";
							document.getElementById("jenis_blangkoid_edit").value =obj[0].jenis_blangko_id;
							document.getElementById("template_id").value =obj[0].id;
							document.getElementById("nama_edit").value =obj[0].nama;
							document.getElementById("modal_detail_edit").style.display = "block";
							document.getElementById("inputan_edit").style.display = "none";
            }
        }
        xhr.send("id=" + btoa(id));
}

function hapus_blangko(){
	var id=document.getElementById("template_id").value;
  var conf = confirm("Apakah anda yakin akan menghapus data ini?");
  if (conf == true) {
    var xhr = new XMLHttpRequest();
    xhr.open("POST","<?php echo base_url('blangko/hapus_blangko')?>", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function () {
      if (xhr.readyState == XMLHttpRequest.DONE && xhr.status == 200){
      	document.getElementById("modal_detail_edit").style.display="none";
      	tampilan();
      }
    }
    xhr.send("id=" + btoa(id));

  }
}
function tampilan(){
    var xhr = new XMLHttpRequest();
    xhr.open("POST","<?php echo base_url('blangko/list_kategori')?>", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function () {
      if (xhr.readyState == XMLHttpRequest.DONE && xhr.status == 200){
      	document.getElementById("tampilan").innerHTML=xhr.responseText;
      }
    }
    xhr.send();
}
function ubah_nama(isi){
		var id=document.getElementById("template_id").value;
    var xhr = new XMLHttpRequest();
    xhr.open("POST","<?php echo base_url('blangko/ubah')?>", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function () {
      if (xhr.readyState == XMLHttpRequest.DONE && xhr.status == 200){
      	tampilan();
      }
    }
    xhr.send("id=" + btoa(id)+"&isi=" + btoa(isi)+"&tabel=" + btoa("template_dokumen")+"&field=" + btoa("nama"));
}
function ubah_jenis(isi){
		var id=document.getElementById("template_id").value;
    var xhr = new XMLHttpRequest();
    xhr.open("POST","<?php echo base_url('blangko/ubah')?>", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function () {
      if (xhr.readyState == XMLHttpRequest.DONE && xhr.status == 200){
      	tampilan();
      }
    }
    xhr.send("id=" + btoa(id)+"&isi=" + btoa(isi)+"&tabel=" + btoa("template_dokumen")+"&field=" + btoa("jenis_blangko_id"));
}
</script>

<script type="text/javascript">
	document.addEventListener("DOMContentLoaded", function() {
		tampilan();
	});
</script>