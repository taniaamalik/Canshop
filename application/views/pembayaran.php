<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <title>Metode Pembayaran</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="styleshe<!DOCTYPE html>
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
                    <img class="gambarDua" src="<?php echo base_url('/assets/about-01.jpg');?>"></img>
              
                    <div class="kotakNama">
                        <h1>Pilih Metode Pembayaran</h1>
                    </div>
                    <?php foreach ($pembayaran as $data) { ?>
    <table width="800px" style="margin-left: 9%">
      <tr>
        <td>
                
                  <table width="300px" border="1" cellpadding="10" style="margin-left: 30.5%">
                    <?php $ongkir = 0;
                           
                          if($data['provinsi'] == "DKI Jakarta"){
                              $ongkir = 20000;
                          } elseif ($data['provinsi'] == "Jawa Timur") {
                              $ongkir = 10000;
                          } elseif ($data['provinsi'] == "Jawa Barat") {
                              $ongkir = 15000;
                          }?>
                    <tr>
                      <th colspan="2" bgcolor="pink">Rincian Pembayaran</th>
                    </tr>
                    <tr>
                      <td>Harga Barang</td>
                      <td>Rp. <?php echo ($data['total_pembayaran'] - $ongkir);?></td>
                  </tr>
                    <tr>
                        <td>Ongkos Kirim</td>
                        <td>Rp. <?php echo $ongkir;?></td>
                    </tr>
                    <tr>
                      <td>Total</td>
                      <td>Rp. <?php echo $data['total_pembayaran'];?></td>
                    </tr>
                    
                </table>
        </td>
        <td>
            <center><h4 style="margin-left:-21%">Lakukan pembayaran via:</h4></center>
              <center>
                <form action="<?php echo base_url('home/addMetode/');?><?php echo $data['id_pembayaran'];?>" method="post">
                <p><input type='radio' name='atm_card' style="margin-left:-22%" value='Mandiri' />Mandiri                   1440012341234</p>
                <p><input type='radio' style="margin-left:-39%" name='atm_card' value='BCA' />BCA                                550400400</p>
                <p><input type='radio' style="margin-left:-26%" name='atm_card' value='BRI' />BRI                                318912345678900</p>
                
                    </td>
                  </tr>
                </table>
                <br><br>
                <center><button class="button2" type="submit" style="display: inline-block;
                  padding: 10px 20px;
                  font-size: 20px;
                  cursor: pointer;
                 text-decoration: none;
                  outline: none;
                  color: #fff;
                  background-color: pink;
                  border: none;
                  border-radius: 15px;
                  box-shadow: 0 9px #999;">NEXT</button></center>
                </form>
                <?php } ?>
      </body>
    </html>
