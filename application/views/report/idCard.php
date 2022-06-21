<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>ID Card</title>
</head>
<style>
		@import url(https://fonts.googleapis.com/css?family=Mrs+Sheppards);
	body {
		font-size: 12px;
		text-align: center;
	}

	table {
		white-space: nowrap;
		border-spacing: 1;
		border-collapse: collapse;
	}

	td {
		padding: 5px;
		border: 1px solid rgb(0, 0, 0);
		vertical-align: middle;
	}

	.noline {
		padding: 5px;
		border: 0px solid rgb(0, 0, 0);
		vertical-align: middle;
	}

	.title-table td {
		text-align: center;
		font-weight: bold;
	}

	.foto-mitra {
		width: 30mm;
		height: 40mm;
		border-radius: 50%;
		border: 1px solid rgb(0, 0, 0);
	}
	.alamat{
		font-size: 8px;
	}
	.nama-mitra{
		font-family: 'Mrs Sheppards', cursive;
	}
</style>

<body>
	<center>

		<div style="text-align:center">
			<table style="width: 100%;border: 1px solid rgb(0, 0, 0);">
				<tr>
					<td style="text-align: center;" class="noline">
						<table>
							<tr>
								<td style="background-image: url('<?=base_url();?>assets/images/logo.svg');background-position: center;background-size: cover; background-repeat: no-repeat;">
									<table style="width:53.98mm;height: 85.60mm;text-align: center;" border="1">
										<tr>
											<td class="noline">
												<img style="width: 10mm" src="<?=base_url();?>assets/images/logo.svg">
											</td>
										</tr>
										<tr>
											<td class="noline">
												<img class="foto-mitra" src="<?=base_url('uploads/' . $user->foto)?>"
													alt="">
											</td>
										</tr>
										<tr>
											<td class="noline">Badan Pusat Statistik Kota Bukit Tinggi</td>
										</tr>
										<tr>
											<td class="noline">Nama</td>
										</tr>
										<tr>
											<td class="noline nama-mitra"><?=$user->nama?></td>
										</tr>
										<tr>
											<td class="noline">Mitra</td>
										</tr>
										<tr>
											<td class="noline alamat">Jl. Perwira No.58, Belakang Balok, Kec. Aur Birugo Tigo
												Baleh, Kota
												Bukittinggi,
												Sumatera Barat 26181</td>
										</tr>
									</table>
								</td>
							</tr>
						</table>
					</td>
				</tr>
			</table>

		</div>
	</center>
</body>

</html>
