<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body>
        <h2 style="margin-top:0px">Perkara_eksekusi <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="int">Alur Perkara Id <?php echo form_error('alur_perkara_id') ?></label>
            <input type="text" class="form-control" name="alur_perkara_id" id="alur_perkara_id" placeholder="Alur Perkara Id" value="<?php echo $alur_perkara_id; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Nomor Perkara Pn <?php echo form_error('nomor_perkara_pn') ?></label>
            <input type="text" class="form-control" name="nomor_perkara_pn" id="nomor_perkara_pn" placeholder="Nomor Perkara Pn" value="<?php echo $nomor_perkara_pn; ?>" />
        </div>
	    <div class="form-group">
            <label for="date">Putusan Pn <?php echo form_error('putusan_pn') ?></label>
            <input type="text" class="form-control" name="putusan_pn" id="putusan_pn" placeholder="Putusan Pn" value="<?php echo $putusan_pn; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Nomor Perkara Banding <?php echo form_error('nomor_perkara_banding') ?></label>
            <input type="text" class="form-control" name="nomor_perkara_banding" id="nomor_perkara_banding" placeholder="Nomor Perkara Banding" value="<?php echo $nomor_perkara_banding; ?>" />
        </div>
	    <div class="form-group">
            <label for="date">Putusan Banding <?php echo form_error('putusan_banding') ?></label>
            <input type="text" class="form-control" name="putusan_banding" id="putusan_banding" placeholder="Putusan Banding" value="<?php echo $putusan_banding; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Nomor Perkara Kasasi <?php echo form_error('nomor_perkara_kasasi') ?></label>
            <input type="text" class="form-control" name="nomor_perkara_kasasi" id="nomor_perkara_kasasi" placeholder="Nomor Perkara Kasasi" value="<?php echo $nomor_perkara_kasasi; ?>" />
        </div>
	    <div class="form-group">
            <label for="date">Putusan Kasasi <?php echo form_error('putusan_kasasi') ?></label>
            <input type="text" class="form-control" name="putusan_kasasi" id="putusan_kasasi" placeholder="Putusan Kasasi" value="<?php echo $putusan_kasasi; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Nomor Perkara Pk <?php echo form_error('nomor_perkara_pk') ?></label>
            <input type="text" class="form-control" name="nomor_perkara_pk" id="nomor_perkara_pk" placeholder="Nomor Perkara Pk" value="<?php echo $nomor_perkara_pk; ?>" />
        </div>
	    <div class="form-group">
            <label for="date">Putusan Pk <?php echo form_error('putusan_pk') ?></label>
            <input type="text" class="form-control" name="putusan_pk" id="putusan_pk" placeholder="Putusan Pk" value="<?php echo $putusan_pk; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Eksekusi Putusan <?php echo form_error('eksekusi_putusan') ?></label>
            <input type="text" class="form-control" name="eksekusi_putusan" id="eksekusi_putusan" placeholder="Eksekusi Putusan" value="<?php echo $eksekusi_putusan; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Eksekusi Nomor Perkara <?php echo form_error('eksekusi_nomor_perkara') ?></label>
            <input type="text" class="form-control" name="eksekusi_nomor_perkara" id="eksekusi_nomor_perkara" placeholder="Eksekusi Nomor Perkara" value="<?php echo $eksekusi_nomor_perkara; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Nomor Urut Perkara Eksekusi <?php echo form_error('nomor_urut_perkara_eksekusi') ?></label>
            <input type="text" class="form-control" name="nomor_urut_perkara_eksekusi" id="nomor_urut_perkara_eksekusi" placeholder="Nomor Urut Perkara Eksekusi" value="<?php echo $nomor_urut_perkara_eksekusi; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Nomor Register Eksekusi <?php echo form_error('nomor_register_eksekusi') ?></label>
            <input type="text" class="form-control" name="nomor_register_eksekusi" id="nomor_register_eksekusi" placeholder="Nomor Register Eksekusi" value="<?php echo $nomor_register_eksekusi; ?>" />
        </div>
	    <div class="form-group">
            <label for="eksekusi_amar_putusan">Eksekusi Amar Putusan <?php echo form_error('eksekusi_amar_putusan') ?></label>
            <textarea class="form-control" rows="3" name="eksekusi_amar_putusan" id="eksekusi_amar_putusan" placeholder="Eksekusi Amar Putusan"><?php echo $eksekusi_amar_putusan; ?></textarea>
        </div>
	    <div class="form-group">
            <label for="int">Pihak Pemohon Eksekusi <?php echo form_error('pihak_pemohon_eksekusi') ?></label>
            <input type="text" class="form-control" name="pihak_pemohon_eksekusi" id="pihak_pemohon_eksekusi" placeholder="Pihak Pemohon Eksekusi" value="<?php echo $pihak_pemohon_eksekusi; ?>" />
        </div>
	    <div class="form-group">
            <label for="date">Permohonan Eksekusi <?php echo form_error('permohonan_eksekusi') ?></label>
            <input type="text" class="form-control" name="permohonan_eksekusi" id="permohonan_eksekusi" placeholder="Permohonan Eksekusi" value="<?php echo $permohonan_eksekusi; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Pemohon Eksekusi <?php echo form_error('pemohon_eksekusi') ?></label>
            <input type="text" class="form-control" name="pemohon_eksekusi" id="pemohon_eksekusi" placeholder="Pemohon Eksekusi" value="<?php echo $pemohon_eksekusi; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Para Pihak <?php echo form_error('para_pihak') ?></label>
            <input type="text" class="form-control" name="para_pihak" id="para_pihak" placeholder="Para Pihak" value="<?php echo $para_pihak; ?>" />
        </div>
	    <div class="form-group">
            <label for="date">Penetapan Teguran Eksekusi <?php echo form_error('penetapan_teguran_eksekusi') ?></label>
            <input type="text" class="form-control" name="penetapan_teguran_eksekusi" id="penetapan_teguran_eksekusi" placeholder="Penetapan Teguran Eksekusi" value="<?php echo $penetapan_teguran_eksekusi; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Nomor Penetapan Teguran Eksekusi <?php echo form_error('nomor_penetapan_teguran_eksekusi') ?></label>
            <input type="text" class="form-control" name="nomor_penetapan_teguran_eksekusi" id="nomor_penetapan_teguran_eksekusi" placeholder="Nomor Penetapan Teguran Eksekusi" value="<?php echo $nomor_penetapan_teguran_eksekusi; ?>" />
        </div>
	    <div class="form-group">
            <label for="date">Pelaksanaan Teguran Eksekusi <?php echo form_error('pelaksanaan_teguran_eksekusi') ?></label>
            <input type="text" class="form-control" name="pelaksanaan_teguran_eksekusi" id="pelaksanaan_teguran_eksekusi" placeholder="Pelaksanaan Teguran Eksekusi" value="<?php echo $pelaksanaan_teguran_eksekusi; ?>" />
        </div>
	    <div class="form-group">
            <label for="date">Penetapan Sita Eksekusi <?php echo form_error('penetapan_sita_eksekusi') ?></label>
            <input type="text" class="form-control" name="penetapan_sita_eksekusi" id="penetapan_sita_eksekusi" placeholder="Penetapan Sita Eksekusi" value="<?php echo $penetapan_sita_eksekusi; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Nomor Penetapan Sita Eksekusi <?php echo form_error('nomor_penetapan_sita_eksekusi') ?></label>
            <input type="text" class="form-control" name="nomor_penetapan_sita_eksekusi" id="nomor_penetapan_sita_eksekusi" placeholder="Nomor Penetapan Sita Eksekusi" value="<?php echo $nomor_penetapan_sita_eksekusi; ?>" />
        </div>
	    <div class="form-group">
            <label for="date">Pelaksanaan Sita Eksekusi <?php echo form_error('pelaksanaan_sita_eksekusi') ?></label>
            <input type="text" class="form-control" name="pelaksanaan_sita_eksekusi" id="pelaksanaan_sita_eksekusi" placeholder="Pelaksanaan Sita Eksekusi" value="<?php echo $pelaksanaan_sita_eksekusi; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Jurusita Id <?php echo form_error('jurusita_id') ?></label>
            <input type="text" class="form-control" name="jurusita_id" id="jurusita_id" placeholder="Jurusita Id" value="<?php echo $jurusita_id; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Jurusita Nama <?php echo form_error('jurusita_nama') ?></label>
            <input type="text" class="form-control" name="jurusita_nama" id="jurusita_nama" placeholder="Jurusita Nama" value="<?php echo $jurusita_nama; ?>" />
        </div>
	    <div class="form-group">
            <label for="date">Penetapan Perintah Eksekusi Lelang <?php echo form_error('penetapan_perintah_eksekusi_lelang') ?></label>
            <input type="text" class="form-control" name="penetapan_perintah_eksekusi_lelang" id="penetapan_perintah_eksekusi_lelang" placeholder="Penetapan Perintah Eksekusi Lelang" value="<?php echo $penetapan_perintah_eksekusi_lelang; ?>" />
        </div>
	    <div class="form-group">
            <label for="date">Pelaksanaan Eksekusi Lelang <?php echo form_error('pelaksanaan_eksekusi_lelang') ?></label>
            <input type="text" class="form-control" name="pelaksanaan_eksekusi_lelang" id="pelaksanaan_eksekusi_lelang" placeholder="Pelaksanaan Eksekusi Lelang" value="<?php echo $pelaksanaan_eksekusi_lelang; ?>" />
        </div>
	    <div class="form-group">
            <label for="date">Penyerahan Hasil Lelang <?php echo form_error('penyerahan_hasil_lelang') ?></label>
            <input type="text" class="form-control" name="penyerahan_hasil_lelang" id="penyerahan_hasil_lelang" placeholder="Penyerahan Hasil Lelang" value="<?php echo $penyerahan_hasil_lelang; ?>" />
        </div>
	    <div class="form-group">
            <label for="date">Penetapan Perintah Eksekusi Rill <?php echo form_error('penetapan_perintah_eksekusi_rill') ?></label>
            <input type="text" class="form-control" name="penetapan_perintah_eksekusi_rill" id="penetapan_perintah_eksekusi_rill" placeholder="Penetapan Perintah Eksekusi Rill" value="<?php echo $penetapan_perintah_eksekusi_rill; ?>" />
        </div>
	    <div class="form-group">
            <label for="date">Pelaksanaan Eksekusi Rill <?php echo form_error('pelaksanaan_eksekusi_rill') ?></label>
            <input type="text" class="form-control" name="pelaksanaan_eksekusi_rill" id="pelaksanaan_eksekusi_rill" placeholder="Pelaksanaan Eksekusi Rill" value="<?php echo $pelaksanaan_eksekusi_rill; ?>" />
        </div>
	    <div class="form-group">
            <label for="date">Penetapan Noneksekusi <?php echo form_error('penetapan_noneksekusi') ?></label>
            <input type="text" class="form-control" name="penetapan_noneksekusi" id="penetapan_noneksekusi" placeholder="Penetapan Noneksekusi" value="<?php echo $penetapan_noneksekusi; ?>" />
        </div>
	    <div class="form-group">
            <label for="alasan_eksekusi">Alasan Eksekusi <?php echo form_error('alasan_eksekusi') ?></label>
            <textarea class="form-control" rows="3" name="alasan_eksekusi" id="alasan_eksekusi" placeholder="Alasan Eksekusi"><?php echo $alasan_eksekusi; ?></textarea>
        </div>
	    <div class="form-group">
            <label for="catatan_eksekusi">Catatan Eksekusi <?php echo form_error('catatan_eksekusi') ?></label>
            <textarea class="form-control" rows="3" name="catatan_eksekusi" id="catatan_eksekusi" placeholder="Catatan Eksekusi"><?php echo $catatan_eksekusi; ?></textarea>
        </div>
	    <div class="form-group">
            <label for="tinyint">Prodeo Eksekusi <?php echo form_error('prodeo_eksekusi') ?></label>
            <input type="text" class="form-control" name="prodeo_eksekusi" id="prodeo_eksekusi" placeholder="Prodeo Eksekusi" value="<?php echo $prodeo_eksekusi; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Status Eksekusi Id <?php echo form_error('status_eksekusi_id') ?></label>
            <input type="text" class="form-control" name="status_eksekusi_id" id="status_eksekusi_id" placeholder="Status Eksekusi Id" value="<?php echo $status_eksekusi_id; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Status Eksekusi Text <?php echo form_error('status_eksekusi_text') ?></label>
            <input type="text" class="form-control" name="status_eksekusi_text" id="status_eksekusi_text" placeholder="Status Eksekusi Text" value="<?php echo $status_eksekusi_text; ?>" />
        </div>
	    <div class="form-group">
            <label for="date">Diterima Permohonan <?php echo form_error('diterima_permohonan') ?></label>
            <input type="text" class="form-control" name="diterima_permohonan" id="diterima_permohonan" placeholder="Diterima Permohonan" value="<?php echo $diterima_permohonan; ?>" />
        </div>
	    <div class="form-group">
            <label for="date">Panggilan Parapihak <?php echo form_error('panggilan_parapihak') ?></label>
            <input type="text" class="form-control" name="panggilan_parapihak" id="panggilan_parapihak" placeholder="Panggilan Parapihak" value="<?php echo $panggilan_parapihak; ?>" />
        </div>
	    <div class="form-group">
            <label for="date">Penetapan Ketua <?php echo form_error('penetapan_ketua') ?></label>
            <input type="text" class="form-control" name="penetapan_ketua" id="penetapan_ketua" placeholder="Penetapan Ketua" value="<?php echo $penetapan_ketua; ?>" />
        </div>
	    <div class="form-group">
            <label for="date">Sk Objek Tidak Punya Kekuatan Hukum <?php echo form_error('sk_objek_tidak_punya_kekuatan_hukum') ?></label>
            <input type="text" class="form-control" name="sk_objek_tidak_punya_kekuatan_hukum" id="sk_objek_tidak_punya_kekuatan_hukum" placeholder="Sk Objek Tidak Punya Kekuatan Hukum" value="<?php echo $sk_objek_tidak_punya_kekuatan_hukum; ?>" />
        </div>
	    <div class="form-group">
            <label for="date">Surat Tergugat Objek Non Executable <?php echo form_error('surat_tergugat_objek_non_executable') ?></label>
            <input type="text" class="form-control" name="surat_tergugat_objek_non_executable" id="surat_tergugat_objek_non_executable" placeholder="Surat Tergugat Objek Non Executable" value="<?php echo $surat_tergugat_objek_non_executable; ?>" />
        </div>
	    <div class="form-group">
            <label for="date">Panggilan Pihak Non Executable <?php echo form_error('panggilan_pihak_non_executable') ?></label>
            <input type="text" class="form-control" name="panggilan_pihak_non_executable" id="panggilan_pihak_non_executable" placeholder="Panggilan Pihak Non Executable" value="<?php echo $panggilan_pihak_non_executable; ?>" />
        </div>
	    <div class="form-group">
            <label for="date">Upaya Kesepakatan Kompensasi <?php echo form_error('upaya_kesepakatan_kompensasi') ?></label>
            <input type="text" class="form-control" name="upaya_kesepakatan_kompensasi" id="upaya_kesepakatan_kompensasi" placeholder="Upaya Kesepakatan Kompensasi" value="<?php echo $upaya_kesepakatan_kompensasi; ?>" />
        </div>
	    <div class="form-group">
            <label for="date">Penetapan Ketua Kompensasi <?php echo form_error('penetapan_ketua_kompensasi') ?></label>
            <input type="text" class="form-control" name="penetapan_ketua_kompensasi" id="penetapan_ketua_kompensasi" placeholder="Penetapan Ketua Kompensasi" value="<?php echo $penetapan_ketua_kompensasi; ?>" />
        </div>
	    <div class="form-group">
            <label for="date">Upaya Hukum Kma <?php echo form_error('upaya_hukum_kma') ?></label>
            <input type="text" class="form-control" name="upaya_hukum_kma" id="upaya_hukum_kma" placeholder="Upaya Hukum Kma" value="<?php echo $upaya_hukum_kma; ?>" />
        </div>
	    <div class="form-group">
            <label for="date">Penetapan Kma Kompensasi <?php echo form_error('penetapan_kma_kompensasi') ?></label>
            <input type="text" class="form-control" name="penetapan_kma_kompensasi" id="penetapan_kma_kompensasi" placeholder="Penetapan Kma Kompensasi" value="<?php echo $penetapan_kma_kompensasi; ?>" />
        </div>
	    <div class="form-group">
            <label for="bigint">Uangpaksa Putusan Hakim <?php echo form_error('uangpaksa_putusan_hakim') ?></label>
            <input type="text" class="form-control" name="uangpaksa_putusan_hakim" id="uangpaksa_putusan_hakim" placeholder="Uangpaksa Putusan Hakim" value="<?php echo $uangpaksa_putusan_hakim; ?>" />
        </div>
	    <div class="form-group">
            <label for="bigint">Uangpaksa Penetapan Ketua <?php echo form_error('uangpaksa_penetapan_ketua') ?></label>
            <input type="text" class="form-control" name="uangpaksa_penetapan_ketua" id="uangpaksa_penetapan_ketua" placeholder="Uangpaksa Penetapan Ketua" value="<?php echo $uangpaksa_penetapan_ketua; ?>" />
        </div>
	    <div class="form-group">
            <label for="date">Surat Ketua Tergugat Uangpaksa <?php echo form_error('surat_ketua_tergugat_uangpaksa') ?></label>
            <input type="text" class="form-control" name="surat_ketua_tergugat_uangpaksa" id="surat_ketua_tergugat_uangpaksa" placeholder="Surat Ketua Tergugat Uangpaksa" value="<?php echo $surat_ketua_tergugat_uangpaksa; ?>" />
        </div>
	    <div class="form-group">
            <label for="date">Surat Peringatan Uangpaksa <?php echo form_error('surat_peringatan_uangpaksa') ?></label>
            <input type="text" class="form-control" name="surat_peringatan_uangpaksa" id="surat_peringatan_uangpaksa" placeholder="Surat Peringatan Uangpaksa" value="<?php echo $surat_peringatan_uangpaksa; ?>" />
        </div>
	    <div class="form-group">
            <label for="date">Perintah Ketua Saksi Administratif <?php echo form_error('perintah_ketua_saksi_administratif') ?></label>
            <input type="text" class="form-control" name="perintah_ketua_saksi_administratif" id="perintah_ketua_saksi_administratif" placeholder="Perintah Ketua Saksi Administratif" value="<?php echo $perintah_ketua_saksi_administratif; ?>" />
        </div>
	    <div class="form-group">
            <label for="date">Sanksi Administratif Dari Pejabat <?php echo form_error('sanksi_administratif_dari_pejabat') ?></label>
            <input type="text" class="form-control" name="sanksi_administratif_dari_pejabat" id="sanksi_administratif_dari_pejabat" placeholder="Sanksi Administratif Dari Pejabat" value="<?php echo $sanksi_administratif_dari_pejabat; ?>" />
        </div>
	    <div class="form-group">
            <label for="date">Pengumuman Ketua Panitera Js <?php echo form_error('pengumuman_ketua_panitera_js') ?></label>
            <input type="text" class="form-control" name="pengumuman_ketua_panitera_js" id="pengumuman_ketua_panitera_js" placeholder="Pengumuman Ketua Panitera Js" value="<?php echo $pengumuman_ketua_panitera_js; ?>" />
        </div>
	    <div class="form-group">
            <label for="date">Pengumuman Media <?php echo form_error('pengumuman_media') ?></label>
            <input type="text" class="form-control" name="pengumuman_media" id="pengumuman_media" placeholder="Pengumuman Media" value="<?php echo $pengumuman_media; ?>" />
        </div>
	    <div class="form-group">
            <label for="date">Surat Presiden <?php echo form_error('surat_presiden') ?></label>
            <input type="text" class="form-control" name="surat_presiden" id="surat_presiden" placeholder="Surat Presiden" value="<?php echo $surat_presiden; ?>" />
        </div>
	    <div class="form-group">
            <label for="date">Surat Lembaga Perwakilan Rakyat <?php echo form_error('surat_lembaga_perwakilan_rakyat') ?></label>
            <input type="text" class="form-control" name="surat_lembaga_perwakilan_rakyat" id="surat_lembaga_perwakilan_rakyat" placeholder="Surat Lembaga Perwakilan Rakyat" value="<?php echo $surat_lembaga_perwakilan_rakyat; ?>" />
        </div>
	    <div class="form-group">
            <label for="date">Tanggal Cabut Eks <?php echo form_error('tanggal_cabut_eks') ?></label>
            <input type="text" class="form-control" name="tanggal_cabut_eks" id="tanggal_cabut_eks" placeholder="Tanggal Cabut Eks" value="<?php echo $tanggal_cabut_eks; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Diedit Oleh <?php echo form_error('diedit_oleh') ?></label>
            <input type="text" class="form-control" name="diedit_oleh" id="diedit_oleh" placeholder="Diedit Oleh" value="<?php echo $diedit_oleh; ?>" />
        </div>
	    <div class="form-group">
            <label for="datetime">Diedit Tanggal <?php echo form_error('diedit_tanggal') ?></label>
            <input type="text" class="form-control" name="diedit_tanggal" id="diedit_tanggal" placeholder="Diedit Tanggal" value="<?php echo $diedit_tanggal; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Diinput Oleh <?php echo form_error('diinput_oleh') ?></label>
            <input type="text" class="form-control" name="diinput_oleh" id="diinput_oleh" placeholder="Diinput Oleh" value="<?php echo $diinput_oleh; ?>" />
        </div>
	    <div class="form-group">
            <label for="datetime">Diinput Tanggal <?php echo form_error('diinput_tanggal') ?></label>
            <input type="text" class="form-control" name="diinput_tanggal" id="diinput_tanggal" placeholder="Diinput Tanggal" value="<?php echo $diinput_tanggal; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Diperbaharui Oleh <?php echo form_error('diperbaharui_oleh') ?></label>
            <input type="text" class="form-control" name="diperbaharui_oleh" id="diperbaharui_oleh" placeholder="Diperbaharui Oleh" value="<?php echo $diperbaharui_oleh; ?>" />
        </div>
	    <div class="form-group">
            <label for="datetime">Diperbaharui Tanggal <?php echo form_error('diperbaharui_tanggal') ?></label>
            <input type="text" class="form-control" name="diperbaharui_tanggal" id="diperbaharui_tanggal" placeholder="Diperbaharui Tanggal" value="<?php echo $diperbaharui_tanggal; ?>" />
        </div>
	    <input type="hidden" name="pa_id" value="<?php echo $pa_id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('perkaraeksekusi') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>