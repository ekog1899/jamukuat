<!doctype html>
<html>
    <head>
        <title>detil</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body>
        <h2 style="margin-top:0px">Perkara_eksekusi Read</h2>
        <table class="table">
	    <tr><td>Alur Perkara Id</td><td><?php echo $alur_perkara_id; ?></td></tr>
	    <tr><td>Nomor Perkara Pn</td><td><?php echo $nomor_perkara_pn; ?></td></tr>
	    <tr><td>Putusan Pn</td><td><?php echo $putusan_pn; ?></td></tr>
	    <tr><td>Nomor Perkara Banding</td><td><?php echo $nomor_perkara_banding; ?></td></tr>
	    <tr><td>Putusan Banding</td><td><?php echo $putusan_banding; ?></td></tr>
	    <tr><td>Nomor Perkara Kasasi</td><td><?php echo $nomor_perkara_kasasi; ?></td></tr>
	    <tr><td>Putusan Kasasi</td><td><?php echo $putusan_kasasi; ?></td></tr>
	    <tr><td>Nomor Perkara Pk</td><td><?php echo $nomor_perkara_pk; ?></td></tr>
	    <tr><td>Putusan Pk</td><td><?php echo $putusan_pk; ?></td></tr>
	    <tr><td>Eksekusi Putusan</td><td><?php echo $eksekusi_putusan; ?></td></tr>
	    <tr><td>Eksekusi Nomor Perkara</td><td><?php echo $eksekusi_nomor_perkara; ?></td></tr>
	    <tr><td>Nomor Urut Perkara Eksekusi</td><td><?php echo $nomor_urut_perkara_eksekusi; ?></td></tr>
	    <tr><td>Nomor Register Eksekusi</td><td><?php echo $nomor_register_eksekusi; ?></td></tr>
	    <tr><td>Eksekusi Amar Putusan</td><td><?php echo $eksekusi_amar_putusan; ?></td></tr>
	    <tr><td>Pihak Pemohon Eksekusi</td><td><?php echo $pihak_pemohon_eksekusi; ?></td></tr>
	    <tr><td>Permohonan Eksekusi</td><td><?php echo $permohonan_eksekusi; ?></td></tr>
	    <tr><td>Pemohon Eksekusi</td><td><?php echo $pemohon_eksekusi; ?></td></tr>
	    <tr><td>Para Pihak</td><td><?php echo $para_pihak; ?></td></tr>
	    <tr><td>Penetapan Teguran Eksekusi</td><td><?php echo $penetapan_teguran_eksekusi; ?></td></tr>
	    <tr><td>Nomor Penetapan Teguran Eksekusi</td><td><?php echo $nomor_penetapan_teguran_eksekusi; ?></td></tr>
	    <tr><td>Pelaksanaan Teguran Eksekusi</td><td><?php echo $pelaksanaan_teguran_eksekusi; ?></td></tr>
	    <tr><td>Penetapan Sita Eksekusi</td><td><?php echo $penetapan_sita_eksekusi; ?></td></tr>
	    <tr><td>Nomor Penetapan Sita Eksekusi</td><td><?php echo $nomor_penetapan_sita_eksekusi; ?></td></tr>
	    <tr><td>Pelaksanaan Sita Eksekusi</td><td><?php echo $pelaksanaan_sita_eksekusi; ?></td></tr>
	    <tr><td>Jurusita Id</td><td><?php echo $jurusita_id; ?></td></tr>
	    <tr><td>Jurusita Nama</td><td><?php echo $jurusita_nama; ?></td></tr>
	    <tr><td>Penetapan Perintah Eksekusi Lelang</td><td><?php echo $penetapan_perintah_eksekusi_lelang; ?></td></tr>
	    <tr><td>Pelaksanaan Eksekusi Lelang</td><td><?php echo $pelaksanaan_eksekusi_lelang; ?></td></tr>
	    <tr><td>Penyerahan Hasil Lelang</td><td><?php echo $penyerahan_hasil_lelang; ?></td></tr>
	    <tr><td>Penetapan Perintah Eksekusi Rill</td><td><?php echo $penetapan_perintah_eksekusi_rill; ?></td></tr>
	    <tr><td>Pelaksanaan Eksekusi Rill</td><td><?php echo $pelaksanaan_eksekusi_rill; ?></td></tr>
	    <tr><td>Penetapan Noneksekusi</td><td><?php echo $penetapan_noneksekusi; ?></td></tr>
	    <tr><td>Alasan Eksekusi</td><td><?php echo $alasan_eksekusi; ?></td></tr>
	    <tr><td>Catatan Eksekusi</td><td><?php echo $catatan_eksekusi; ?></td></tr>
	    <tr><td>Prodeo Eksekusi</td><td><?php echo $prodeo_eksekusi; ?></td></tr>
	    <tr><td>Status Eksekusi Id</td><td><?php echo $status_eksekusi_id; ?></td></tr>
	    <tr><td>Status Eksekusi Text</td><td><?php echo $status_eksekusi_text; ?></td></tr>
	    <tr><td>Diterima Permohonan</td><td><?php echo $diterima_permohonan; ?></td></tr>
	    <tr><td>Panggilan Parapihak</td><td><?php echo $panggilan_parapihak; ?></td></tr>
	    <tr><td>Penetapan Ketua</td><td><?php echo $penetapan_ketua; ?></td></tr>
	    <tr><td>Sk Objek Tidak Punya Kekuatan Hukum</td><td><?php echo $sk_objek_tidak_punya_kekuatan_hukum; ?></td></tr>
	    <tr><td>Surat Tergugat Objek Non Executable</td><td><?php echo $surat_tergugat_objek_non_executable; ?></td></tr>
	    <tr><td>Panggilan Pihak Non Executable</td><td><?php echo $panggilan_pihak_non_executable; ?></td></tr>
	    <tr><td>Upaya Kesepakatan Kompensasi</td><td><?php echo $upaya_kesepakatan_kompensasi; ?></td></tr>
	    <tr><td>Penetapan Ketua Kompensasi</td><td><?php echo $penetapan_ketua_kompensasi; ?></td></tr>
	    <tr><td>Upaya Hukum Kma</td><td><?php echo $upaya_hukum_kma; ?></td></tr>
	    <tr><td>Penetapan Kma Kompensasi</td><td><?php echo $penetapan_kma_kompensasi; ?></td></tr>
	    <tr><td>Uangpaksa Putusan Hakim</td><td><?php echo $uangpaksa_putusan_hakim; ?></td></tr>
	    <tr><td>Uangpaksa Penetapan Ketua</td><td><?php echo $uangpaksa_penetapan_ketua; ?></td></tr>
	    <tr><td>Surat Ketua Tergugat Uangpaksa</td><td><?php echo $surat_ketua_tergugat_uangpaksa; ?></td></tr>
	    <tr><td>Surat Peringatan Uangpaksa</td><td><?php echo $surat_peringatan_uangpaksa; ?></td></tr>
	    <tr><td>Perintah Ketua Saksi Administratif</td><td><?php echo $perintah_ketua_saksi_administratif; ?></td></tr>
	    <tr><td>Sanksi Administratif Dari Pejabat</td><td><?php echo $sanksi_administratif_dari_pejabat; ?></td></tr>
	    <tr><td>Pengumuman Ketua Panitera Js</td><td><?php echo $pengumuman_ketua_panitera_js; ?></td></tr>
	    <tr><td>Pengumuman Media</td><td><?php echo $pengumuman_media; ?></td></tr>
	    <tr><td>Surat Presiden</td><td><?php echo $surat_presiden; ?></td></tr>
	    <tr><td>Surat Lembaga Perwakilan Rakyat</td><td><?php echo $surat_lembaga_perwakilan_rakyat; ?></td></tr>
	    <tr><td>Tanggal Cabut Eks</td><td><?php echo $tanggal_cabut_eks; ?></td></tr>
	    <tr><td>Diedit Oleh</td><td><?php echo $diedit_oleh; ?></td></tr>
	    <tr><td>Diedit Tanggal</td><td><?php echo $diedit_tanggal; ?></td></tr>
	    <tr><td>Diinput Oleh</td><td><?php echo $diinput_oleh; ?></td></tr>
	    <tr><td>Diinput Tanggal</td><td><?php echo $diinput_tanggal; ?></td></tr>
	    <tr><td>Diperbaharui Oleh</td><td><?php echo $diperbaharui_oleh; ?></td></tr>
	    <tr><td>Diperbaharui Tanggal</td><td><?php echo $diperbaharui_tanggal; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('perkaraeksekusi') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>