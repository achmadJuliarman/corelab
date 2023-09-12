<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Data Pegawai</title>
  <style>
		.border-table{
			font-family: Arial, Helvetica, sans-serif;
			width: 100%;
			border-collapse: collapse;
			text-align: center;
			font-size: 12px;
		}

		.border-table th{
			border: 1 solid #000;
			font-weight: bold;

		}

		.border-table td{
			border: 1 solid #000; 
		}
	</style>
</head>
<body>
   <img src="https://i.ibb.co/3yRgLHv/esdm.png" alt="esdm" border="0" style="position: absolute; width: 60px; height: auto;">
  <table style="width: 100%;">
    <tr>
     <td align="center">
			<span style="line-height: 1	.6; font-weight: bolder;">
				BADAN GEOLOGI <br>
				BALAI BESAR SURVEI DAN PEMETAAN GEOLOGI KELAUTAN
			</span>
      </td>
    </tr>
  </table>

  <hr class="line-title"> 
  <p align="center">
    LAPORAN DATA PEGAWAI <br>
  </p>

  <table align="center" class="border-table">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>NIP</th>
                        <th>No Telp</th>
                        <th>ID Lever User</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($pegawai as $p) : ?>
                        <tr>
                            <td><?= $p->NAMA ?></td>
                            <td><?= $p->NIP ?></td>
                            <td><?= $p->TELP ?></td>
                            <td><?= $p->USERLEVELID ?></td>
                        
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

</body>