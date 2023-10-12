<div class="w3-row">Daftar Variabel</div>
<div class="w3-row"><a onclick="tambah_variabel()" href="#" class="w3-btn w3-dark-grey w3-padding-small">+ Tambah Variabel</a></div>
<hr>
<div class="w3-row" id="data_variabel">
</div>

<!-- Modal --> 
  <div id="modal_detail" class="w3-modal" style="padding-top: 0px">
    <div class="w3-modal-content" style="width: 100%;min-height: 90vh;">
      <div class="w3-row">
        <div class="w3-container" id="div_modal_detail"></div>
      </div>
    </div>
  </div>
<!-- Modal -->
<link href="<?php echo base_url('assets/'); ?>vanilla-dataTables/vanilla-dataTables.min.css" rel="stylesheet" type="text/css">
<script src="<?php echo base_url('assets/'); ?>vanilla-dataTables/vanilla-dataTables.min.js" type="text/javascript"></script>

<link rel="stylesheet" href="<?php echo base_url()?>assets/notifier/css/notifier.min.css">  
<script src="<?php echo base_url()?>assets/notifier/js/notifier.min.js" type="text/javascript"></script> 
<script type="text/javascript">
document.addEventListener("DOMContentLoaded", function(){
	data_variabel();
});

function tutup_modal(){
	document.getElementById("modal_detail").style.display="none"; 
}
function data_variabel(){
    var xhr = new XMLHttpRequest();
    xhr.open("POST","<?php echo base_url('variabel/list_variabel')?>", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function () {
      if (xhr.readyState == XMLHttpRequest.DONE && xhr.status == 200){
      	document.getElementById("data_variabel").innerHTML=xhr.responseText;
      	var table = new DataTable("#tabel_variabel");
      }
    }
    xhr.send();
}
function tambah_variabel(){
    var xhr = new XMLHttpRequest();
    xhr.open("POST","<?php echo base_url('variabel/tambah')?>", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function () {
      if (xhr.readyState == XMLHttpRequest.DONE && xhr.status == 200){
      	document.getElementById("div_modal_detail").innerHTML=xhr.responseText; 
      	document.getElementById("modal_detail").style.display="block"; 
      }
    }
    xhr.send();
}
function edit_variabel(id){
    var xhr = new XMLHttpRequest();
    xhr.open("POST","<?php echo base_url('variabel/edit')?>", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function () {
      if (xhr.readyState == XMLHttpRequest.DONE && xhr.status == 200){
      	document.getElementById("div_modal_detail").innerHTML=xhr.responseText; 
      	document.getElementById("modal_detail").style.display="block"; 
      }
    }
    xhr.send("id=" + btoa(id));
}
function hapus_variabel(id){
  var conf = confirm("Apakah anda yakin akan menghapus data ini?");
  if (conf == true) {
    var xhr = new XMLHttpRequest();
    xhr.open("POST","<?php echo base_url('variabel/hapus')?>", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function () {
      if (xhr.readyState == XMLHttpRequest.DONE && xhr.status == 200){
      	data_variabel();
      	document.getElementById("modal_detail").style.display="none";
      	tutup_modal();
      }
    }
    xhr.send("id=" + btoa(id));
  }
}
function serialize(form){ 
    var field, l, s = [];
    if (typeof form == 'object' && form.nodeName == "FORM") {
        var len = form.elements.length;
        for (var i=0; i<len; i++) {
            field = form.elements[i];
            if (field.name && !field.disabled && field.type != 'file' && field.type != 'reset' && field.type != 'submit' && field.type != 'button') {
                if (field.type == 'select-multiple') {
                    l = form.elements[i].options.length; 
                    for (var j=0; j<l; j++) {
                        if(field.options[j].selected)
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
function kirim_post(url){
	var var_nomor =document.getElementById("var_nomor").value;
	var var_keterangan =document.getElementById("var_keterangan").value;
	if(var_nomor==""){
		document.getElementById("var_nomor").focus();
		notifier.show('Pesan!', '<h6 class="w3-text-red">Nomor Tidak Boleh Kosong</h6>', '', '', 5000);

		return false;
	}else
	if(var_keterangan==""){
		document.getElementById("var_keterangan").focus();
		notifier.show('Pesan!', '<h6 class="w3-text-red">Nama Tidak Boleh Kosong</h6>', '', '', 5000);
		return false;
	}
	var xhr = new XMLHttpRequest();
	var data=serialize(f_variabel);  
	xhr.open("POST",url, true); 
	xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhr.onreadystatechange = function(){
		if(xhr.readyState == XMLHttpRequest.DONE && xhr.status == 200){
			var data=xhr.responseText;  
			data=data.replace(/\r?\n|\r/g, "");
			if(data==""){
				notifier.show('Pesan!',"<h6 class='w3-text-green'>Penyimpanan Berhasil</h6>", '', '', 4000);
			}else{
				notifier.show('Pesan!', data, '', '', 4000);
			}
			data_variabel();
			tutup_modal()
		}else		
		if(xhr.readyState == XMLHttpRequest.DONE && xhr.status == 500){
			notifier.show('Pesan!', '<h6 class="w3-text-red">Silahkan Cek Nomor atau Nama, dikarenakan tidak boleh ada Nomor atau Nama yang sama</h6>', '', '', 5000);
		}
	}
	xhr.send(data); 
}
function pilih_model_variabel(isi){
	if(isi=="text"){
		return true;
	}else{
		document.getElementById("var_tabel").value='';
	}
	if(isi=="SQL"){
		return true;
	}else{
		document.getElementById("var_sql_data").value='';
		document.getElementById("var_field").value='';
	}
}
</script>