<div class="container">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">PENCARIAN DATA PERNIKAHAN</h6>
        </div>
       
        <div class="card-body">
            <div class="card-body table-responsive p-0">

            <div class="alert alert-danger" role="alert">
              Silahkan isikan data sesuai dokumen Buku Nikah
            </div>
                <form>
                      <div class="form-group">
                        <label for="exampleFormControlSelect1">Provinsi</label>
                        <select id="provinsi" onchange="pilih_provinsi(this.value)">
                          <option value=""></option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="exampleFormControlSelect1">Kabupaten/ Kota</label>
                        <select id="kabupaten_kota" onchange="pilih_kabupaten_kota(this.value)">
                          <option value=""></option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="exampleFormControlSelect1">KUA</label>
                        <select id="kua">
                          <option value=""></option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="exampleFormControlInput1">Nomor Akta Nikah</label>
                        <input type="text" class="form-control" id="nomor_akta_nikah">
                      </div>
                    <span class="btn btn-primary mb-2" onclick="cari_data()">Cari Data</span>
                    <br>
                    <span class="text-danger">Data diambil dari aplikasi "SIMKAH" Kemenag RI</span>
                    <br>
                    <br>
                    <br>
                    <br>
                    </form>
            </div>
        </div>
    </div>
</div>
<!-- Loading -->
    <div class="modal" id="ModalLoading">
        <div class="modal-dialog modal-xl" style="width: 100%; max-width: none; height: 100%; margin: 0;"> 
            <div class="modal-content" style="height: 100%; border: 0; border-radius: 0;">
                <div class="modal-body" style="overflow-y: auto;"><h1 class="text-center text-danger"><span class="icon text-info text-danger mr-3"><i class="fas fa-spinner"></i></span> Silahkan Tunggu ....</h1></div>
            </div>
        </div>
    </div>
<!-- The Loading -->

<!-- The Modal -->
    <div class="modal fade" id="Modal_Hasil">
    <div class="modal-dialog"> 
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header"><span class="text-primary">HASIL PENCARIAN</span>
              <button type="button" class="close " data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body" id="Modal_Hasil_Isi" style="overflow-y: auto;">
            </div>
      </div>
    </div>
    </div>
<!-- The Modal -->
<!-- The Modal -->
    <div class="modal fade" id="Modal_Disclaimer">
    <div class="modal-dialog"> 
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header  bg-danger text-white"><span>DISCLAIMER</span>
              <button type="button" class="close " data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body" style="overflow-y: auto;">
                
<p>Fitur ini hanya digunakan sebagai alat pemeriksaan data buku nikah untuk keperluan berperkara.</p>
<p>Setiap pencarian data pernikahan akan dicatat sebagai bentuk akuntabilitas dan pertanggungjawaban penggunaan data.</p>
<p>
Penyalahgunaan pemanfaatan fitur ini akan diproses sesuai dengan aturan yang berlaku.</p>
<center> <span class="btn btn-danger mb-2" onclick="tutup()">Saya Setuju</span></center>
            </div>
      </div>
    </div>
    </div>
<!-- The Modal -->
<script src="<?php echo base_url('assets/slim_select/slimselect.min.js') ?>"></script>
<link href="<?php echo base_url('assets/slim_select/slimselect.min.css') ?>" rel="stylesheet"></link>
<script type="text/javascript">
    document.addEventListener("DOMContentLoaded", function(){
        $("#Modal_Disclaimer").modal("show");
        propinsi();
        pilih_provinsi("JAWA TENGAH");
    });
    setTimeout(function(){new SlimSelect({select: '#provinsi'}) }, 300);
    setTimeout(function(){new SlimSelect({select: '#kabupaten_kota'}) }, 300);
    setTimeout(function(){new SlimSelect({select: '#kua'}) }, 300);
    function propinsi(){
        var xhr = new XMLHttpRequest();
        xhr.open("POST","<?php echo base_url("data_pernikahan/daftar_provinsi")?>", true); 
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function() {
            if(xhr.readyState == XMLHttpRequest.DONE && xhr.status == 200) {
                var pesan=xhr.responseText; 
                document.getElementById("provinsi").innerHTML=pesan;
            }
        }
        xhr.send(); 
    }
    function pilih_provinsi(provinsi){
        var xhr = new XMLHttpRequest();
        xhr.open("POST","<?php echo base_url("data_pernikahan/daftar_kabupaten_kota")?>", true); 
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function() {
            if(xhr.readyState == XMLHttpRequest.DONE && xhr.status == 200) {
                var pesan=xhr.responseText; 
                document.getElementById("kabupaten_kota").innerHTML=pesan;
            }
        }
        xhr.send("provinsi="+provinsi); 
    }
    function pilih_kabupaten_kota(kabupaten_kota){
        var xhr = new XMLHttpRequest();
        xhr.open("POST","<?php echo base_url("data_pernikahan/daftar_kua")?>", true); 
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function() {
            if(xhr.readyState == XMLHttpRequest.DONE && xhr.status == 200) {
                var pesan=xhr.responseText; 
                document.getElementById("kua").innerHTML=pesan;
            }
        }
        xhr.send("kabupaten_kota="+kabupaten_kota); 
    }
    function cari_data(){
        if(document.getElementById("kua").value=="" || document.getElementById("kua").value==0 ){
            Swal.fire({
              icon: 'warning',
              title: 'Oops...',
              text: 'Silahkan Pilih KUA tempat menikah!'
            })
            return false;
        }
        if(document.getElementById("nomor_akta_nikah").value=="" || document.getElementById("nomor_akta_nikah").value==0 ){
            Swal.fire({
              icon: 'warning',
              title: 'Oops...',
              text: 'Silahkan Nomor Akta Nikah !'
            })
            return false;
        }
        $("#ModalLoading").modal("show");
        var kua = document.getElementById("kua").value;
        var nomor_akta_nikah = document.getElementById("nomor_akta_nikah").value;
        var xhr = new XMLHttpRequest();
        xhr.open("POST","<?php echo base_url("data_pernikahan/cari_data")?>", true); 
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function() {
            if(xhr.readyState == XMLHttpRequest.DONE && xhr.status == 200) {
                var pesan=xhr.responseText; 
                document.getElementById("Modal_Hasil_Isi").innerHTML=pesan;
                $("#Modal_Hasil").modal("show");
                $("#ModalLoading").modal("hide");
            }
        }
        xhr.send("kua="+kua+"&nomor_akta_nikah="+nomor_akta_nikah); 
    }
    function tutup(){
        $("#Modal_Disclaimer").modal("hide");
    }
</script>