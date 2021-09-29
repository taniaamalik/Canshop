<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <title>Profile</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('/assets/css/main.css');?>">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('/assets/profile.css');?>">
      <!--===============================================================================================-->
      </head>
      <body>
         <div class="tombolLogin">
                  <a href="<?php echo base_url();?>"><button class="buttonA">Home</button></a>
                </div>

    <div class="kotakSatu">
      <h2 align=center style="font">Riwayat Pemesanan</h2>

      <table width="800px" border="1" cellpadding=3 cellspacing=3 align=center>
    <th colspan="5" bgcolor="pink" style="width:800px">Status Belanja</th>
        <tr>
            <th>Foto Barang</th>
                <th style="width:200px">Nama Barang</th>
                <th style="width:150px">Harga</th>
                <th  style="width:150px">Status</th>
                <th  style="width:150px">No. Resi</th>
        </tr>
    </table>
    <table width="800px" border="1" cellpadding=3 cellspacing=3 align=center>
        <?php foreach ($history as $data) { ?>
            
            <tr>
            <td rowspan="" width=100px>
                <img src="<?php echo base_url('/assets/images/');?><?php echo $data['foto'];?>" width="90">
                    </td>
            <td style="width:200px"><?php echo $data['namaProduct'];?></td>
            <td style="width:150px"><?php echo $data['harga'];?></td>
            <?php foreach ($pembayaran as $data2) { ?>
            <td style="width:150px"><?php if ($data2['status_pembayaran'] == 0) {
                                            echo "Belum Verifikasi";
                                        } else {
                                            echo "Terverifikasi";
                                        }?>
            </td>
            <td style="width:150px"><?php echo $data2['resi'];?></td>
        </tr>
        <?php } ?>
    <?php } ?>
    </table>
  </body>
</html>
