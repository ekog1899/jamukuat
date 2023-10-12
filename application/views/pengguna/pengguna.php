<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="row" style="margin-bottom: 10px">       
        <div class="col-md-12 text-center">
            <div style="margin-top: 8px" id="message">
                <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                <p style="background-color: red; color: white"><?php echo $this->session->flashdata('msg'); ?></p>
            </div>
        </div>
        
    </div>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DAFTAR PENGGUNA </h6>
        </div>
        <div class="card-body">
            <div><button class='btn text-primary  border border-primary' onclick="tambah_pengguna()"><i class='fa fa-plus'></i> Tambah Pengguna</button></div>
            <div class="table-responsive" id="div_pengguna">
            </div>
        </div>
    </div>
</div>
<!-- The Modal -->
  <div class="modal" id="Modal">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
        <p id="tampil_error"></p>
        <!-- Modal Header -->
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body" id="isi_modal">
        
        </div> 
      </div>
    </div> 
    </div> 
   <!-- The Modal -->
<link href="<?php echo base_url('assets/'); ?>vanilla-dataTables/vanilla-dataTables.min.css" rel="stylesheet" type="text/css">
<script src="<?php echo base_url('assets/'); ?>vanilla-dataTables/vanilla-dataTables.min.js" type="text/javascript"></script>
<link href="<?php echo base_url('assets/'); ?>slim_select/slimselect.min.css" rel="stylesheet" />
  <script src="<?php echo base_url('assets/'); ?>slim_select/slimselect.min.js"></script>

<script type="text/javascript">
document.addEventListener("DOMContentLoaded", function(){
    data_pengguna();
});
</script>
<script type="text/javascript">
    function data_pengguna(){
        var b = new XMLHttpRequest();
        b.open("POST", "<?php echo base_url()?>pengguna/pengguna_list2", true);
        b.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        b.onreadystatechange = function () {
            if (b.readyState == XMLHttpRequest.DONE && b.status == 200) {
                var c = b.responseText;
                document.getElementById("div_pengguna").innerHTML = c;
                var table1 = new DataTable('#datauser', {
                  perPage: 25,
                  perPageSelect: [25, 50, 75, 100, 250, 1000]
                });
            }
        }
        b.send();
    }
    function hapus_pengguna(id) {
        var conf = confirm("Apakah anda yakin akan menghapus Pengguna ini?");
        if (conf == true) {
            var xhr = new XMLHttpRequest();
            xhr.open("POST","<?php echo base_url('pengguna/hapus_pengguna')?>", true);
            xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function () {
                if (xhr.readyState == XMLHttpRequest.DONE && xhr.status == 200) {
                    data_pengguna();
                }
            }
            xhr.send("id=" + id);
        }
    }
    function edit_pengguna(id) {
        var xhr = new XMLHttpRequest();
        xhr.open("POST","<?php echo base_url('pengguna/edit_pengguna')?>", true);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function () {
            if (xhr.readyState == XMLHttpRequest.DONE && xhr.status == 200){
                 document.getElementById("isi_modal").innerHTML = xhr.responseText;
                 setTimeout(function(){
                    new SlimSelect({
                      select: '#mitra_id'
                    })
                    new SlimSelect({
                      select: '#group'
                    })
                  }, 300)
                $("#Modal").modal("show");
            }
        }
        xhr.send("id=" + id);
    }

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
                                s[s.length] = encodeURIComponent(field.name) + "=" + encodeURIComponent(btoa(field.options[j].value));
                        }
                    } else if ((field.type != 'checkbox' && field.type != 'radio') || field.checked) {
                        s[s.length] = encodeURIComponent(field.name) + "=" + encodeURIComponent(btoa(field.value));
                    }
                }
            }
        }
        return s.join('&').replace(/%20/g, '+');
    }
    function simpan_pengguna(){ 
        var xhr = new XMLHttpRequest();
        var data=serialize(form_pengguna);  
        xhr.open("POST","<?php echo base_url('pengguna/simpan_pengguna')?>", true); 
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function() {
            if(xhr.readyState == XMLHttpRequest.DONE && xhr.status == 200) {
                data_pengguna();
            }else{
                error = "Username sudah ada ganti yang lain Bos.";
                document.getElementById( "tampil_error" ).innerHTML = error;
                return false;
            }
        }
        xhr.send(data); 
    }
        function tambah_pengguna(){ 
        var xhr = new XMLHttpRequest();
        xhr.open("POST","<?php echo base_url('pengguna/tambah_pengguna')?>", true);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function () {
            if (xhr.readyState == XMLHttpRequest.DONE && xhr.status == 200){
                 document.getElementById("isi_modal").innerHTML = xhr.responseText;
                 setTimeout(function(){
                    new SlimSelect({
                      select: '#mitra_id'
                    })
                    new SlimSelect({
                      select: '#group'
                    })
                  }, 300)
                $("#Modal").modal("show");
            }
        }
        xhr.send(); 
    }
    
    
</script>