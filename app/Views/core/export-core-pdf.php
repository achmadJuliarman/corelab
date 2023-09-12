<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Data Core</title>
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

    .header-font{
      font-size: 16px;
    }
	</style>
</head>
<body>
  <img src="https://i.ibb.co/3yRgLHv/esdm.png" alt="esdm" border="0" style="position: absolute; width: 75px; height: auto; margin-top: 5px;">
  <!-- <img src="https://i.ibb.co/5B9Twbt/logo.png" alt="logo" border="0" style="position: absolute; width: 56px; height: auto; margin-left: 65px; margin-top: 50;"> -->
  <table style="width: 100%;" class="header-font">
    <tr>
     <td align="center">
			<span style="line-height: 1	.6; font-weight: bolder;">
				KEMENTRIAN ENERGI DAN SUMBER DAYA MINERAL <br>
        BADAN GEOLOGI <br>
				BALAI BESAR SURVEI DAN PEMETAAN GEOLOGI KELAUTAN </h3>
			</span>
      </td>
    </tr>
  </table>

  <hr class="line-title"> 
  <p align="center">
    LAPORAN DATA CORE <br>
    Tanggal  <?php echo DATE("d-m-Y"); ?> 
  </p>

  <table align="center" class="border-table">
                <thead>
                <tr>
                    <th>No.</th>
                    <th>Ship</th>
                    <th>Cruise</th>
                    <th>Sample Number</th>
                    <th>Sum</th>
                    <th>Date</th>
                    <th>Depth</th>
                    <th>Length</th>
                    <th>Location</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach($core as $c) : ?>
                <tr>
                    <td><?= $c->No ?></td>
                    <td><?= $c->SHIP ?></td>
                    <td><?= $c->CRUISE_ ?></td>
                    <td><?= $c->SAMPEL_NUM ?></td>
                    <td><?= $c->SUM ?></td>
                    <td><?= $c->DATE ?></td>
                    <td><?= $c->DEPTH ?></td>   
                    <td><?= $c->LENGTH ?></td>
                    <td><?= $c->LOCATION ?></td>
                </tr>
                <?php endforeach; ?>
                </tbody>
            </table>

</body>