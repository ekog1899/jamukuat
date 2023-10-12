<!-- Begin Page Content -->
<div class="container-fluid">
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
            <h6 class="m-0 font-weight-bold text-primary">PROFIL </h6>
		</div>
        <div class="card-body">
            <div class="table-responsive" id="div_pengguna">
                <table class="table">
                    <tbody>
                        <tr>
                            <td style="width:200px">Nama Satker</td>
                            <td><?php echo $fullname?></td>
                        </tr>
                        <tr>
                            <td>Username</td>
                            <td><?php echo $username?></td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td><?php echo $email?></td>
                        </tr>
                        <tr>
                            <td colspan="2"><button class="btn text-primary  border border-primary" onclick="edit_profil('<?php echo $userid?>')"><i class="fa fa-edit"></i> Edit Profil</button></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!--
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DATA INSTANSI </h6>
        </div>
        <div class="card-body">
            <div class="table-responsive" id="div_pengguna">
                <table class="table">
                    <tbody>
                        <tr>
                            <td style="width:200px">Nama Satker</td>
                            <td><?php echo $fullname?></td>
                        </tr>
                        <tr>
                            <td>Username</td>
                            <td><?php echo $username?></td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td><?php echo $email?></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><?php echo $email?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>-->
</div>

<!-- The Modal -->
  <div class="modal" id="Modal">
    <div class="modal-dialog ">
        <div class="modal-content">
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
    //data_pengguna();
});
</script>
<script type="text/javascript">
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
    function edit_profil(id) {
        var xhr = new XMLHttpRequest();
        xhr.open("POST","<?php echo base_url('profil/edit_profil')?>", true);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function () {
            if (xhr.readyState == XMLHttpRequest.DONE && xhr.status == 200){
                 document.getElementById("isi_modal").innerHTML = xhr.responseText;
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
    function simpan_profil(){
        if(document.getElementById("username").value==null || document.getElementById("username").value.length==1){
            document.getElementById("error").innerHTML="Silahkan isikan Username";
            document.getElementById("username").focus();
            return false;
        }
        if(document.getElementById("password").value==null || document.getElementById("password1").value=="" || document.getElementById("password").value.length==1){
            document.getElementById("error").innerHTML="Password dan Ulangi Password harus sama";
            document.getElementById("password").focus();
            return false;
        }
        if(document.getElementById("email").value==null  || document.getElementById("email").value.length==1){
            document.getElementById("error").innerHTML="Email harus diisi";
            document.getElementById("email").focus();
            return false;
        }
        if (! validateEmail(document.getElementById("email").value)){
            document.getElementById("error").innerHTML="Email harus valid";
            document.getElementById("email").focus();
            return false;
        }
        var xhr = new XMLHttpRequest();
        var data=serialize(form_pengguna);  
        xhr.open("POST","<?php echo base_url('profil/simpan_profil')?>", true); 
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function() {
            if(xhr.readyState == XMLHttpRequest.DONE && xhr.status == 200) {
              location.reload();
            }
        }
        xhr.send(data); 
    }


      function validateEmail(email) {
        const re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        return re.test(email);
      }
</script>
<link rel="stylesheet" href="<?php echo base_url()?>assets/notifier/css/notifier.min.css">  
<script src="<?php echo base_url()?>assets/notifier/js/notifier.min.js" type="text/javascript"></script> 