<table class="table table-bordered table-sm table-hover" id="datauser"  cellspacing="0">
    <thead>
        <tr class="bg-primary text-light">
            <th style="text-align: center;">No</th>
            <th style="text-align: center;">Username</th>
            <th style="text-align: center;">Satker</th>
            <th style="width: 115px; text-align: center;">Action</th>
        </tr>
    </thead>
  
        <tbody>
        <?php

                    $no=1;
        foreach ($pengguna2->result_array() as $key) {
        
                    echo "<tr>";
                    echo "<td>$no</td>";
                    echo "<td>".$key['username']."</td>";
                    echo "<td>".$key['fullname']."</td>";
                    echo "<td class='text-center'><button class='btn btn-danger btn-sm' onclick=hapus_pengguna('".base64_encode($key['userid'])."')><i class='fa fa-trash-alt' title='Hapus Pengguna'></i></button>";
                    echo "<button class='btn btn-primary ml-3 btn-sm' onclick=edit_pengguna('".base64_encode($key['userid'])."')><i class='fa fa-edit' title='Edit Pengguna'></i></button>";
                    if($key['group']==5){
                        ?>
                        <a class='btn btn-warning ml-3 btn-sm' href="<?php echo base_url('Pengguna/kua_list/'.base64_encode($key['mitra_id']));?>"><i class='fa fa-edit' title='Manage KUA' ></i></a>

                        <?php
                     
                    }
                    echo "</td>";
                    echo "</tr>";
                    $no++;
            }
        ?>
    </tbody>
</table>