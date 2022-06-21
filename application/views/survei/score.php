<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<title>BPS - <?=$title?></title>
	<!-- Favicon icon -->
	<link rel="icon" type="image/png" sizes="16x16" href="<?=base_url()?>assets/images/logo.svg">
	<link rel="stylesheet" href="<?=base_url()?>assets/vendor/chartist/css/chartist.min.css">
	<link href="<?=base_url()?>assets/vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
	<link href="<?=base_url()?>assets/vendor/owl-carousel/owl.carousel.css" rel="stylesheet">
	<!-- Datatable -->
	<link href="<?=base_url()?>assets/vendor/datatables/css/jquery.dataTables.min.css" rel="stylesheet">
	<link href="<?=base_url()?>assets/css/style.css" rel="stylesheet">
	<link
		href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&family=Roboto:wght@100;300;400;500;700;900&display=swap"
		rel="stylesheet">
	<script src="<?=base_url();?>assets/vendor/jquery/jquery.min.js"></script>
</head>

<body>

	<!--*******************
        Preloader start
    ********************-->
	<div id="preloader">
		<div class="sk-three-bounce">
			<div class="sk-child sk-bounce1"></div>
			<div class="sk-child sk-bounce2"></div>
			<div class="sk-child sk-bounce3"></div>
		</div>
	</div>
	<!--*******************
        Preloader end
    ********************-->

	<!--**********************************
        Main wrapper start
    ***********************************-->
	<div id="main-wrapper">

		<!--**********************************
            Content body start
        ***********************************-->
		<div class="">
			<div class="container-fluid">
				<div class="page-titles">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="javascript:void(0)">Form</a></li>
						<li class="breadcrumb-item active"><a href="javascript:void(0)">Isi Survei</a></li>
					</ol>
				</div>
				<!-- row -->
				<div class="row">

					<div class="col-xl-12 col-lg-12">
						<div class="card">
							<div class="card-header">
								<h4 class="card-title">Data Survei</h4>
							</div>
							<div class="card-body">
								<div class="basic-form">
									<!-- success page -->
									<?php if ($this->session->flashdata('success')): ?>
									<div class="alert alert-success alert-dismissible fade show">
										<svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor"
											stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round"
											class="mr-2">
											<polyline points="9 11 12 14 22 4"></polyline>
											<path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path>
										</svg>
										<strong>Success!</strong> <?=$this->session->userdata('success')?>
										<button type="button" class="close h-100" data-dismiss="alert"
											aria-label="Close"><span><i class="mdi mdi-close"></i></span>
										</button>
									</div>
									<?php elseif ($this->session->userdata('error')): ?>
									<!-- error page -->
									<div class="alert alert-danger alert-dismissible fade show">
										<svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor"
											stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round"
											class="mr-2">
											<polygon
												points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2">
											</polygon>
											<line x1="15" y1="9" x2="9" y2="15"></line>
											<line x1="9" y1="9" x2="15" y2="15"></line>
										</svg>
										<strong>Maaf!</strong> <?=$this->session->flashdata('error')?>
										<button type="button" class="close h-100" data-dismiss="alert"
											aria-label="Close"><span><i class="mdi mdi-close"></i></span>
										</button>
									</div>
									<?php endif;?>
									<style>
										.text-error {
											color: red;
										}

										@import url(//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css);

										fieldset,
										label {
											margin: 0;
											padding: 0;
										}

										body {
											margin: 20px;
										}

										h1 {
											font-size: 1.5em;
											margin: 10px;
										}

										/****** Style Star Rating Widget *****/

										.rating {
											border: none;
											float: left;
										}

										.rating>input {
											display: none;
										}

										.rating>label:before {
											margin: 5px;
											font-size: 1.25em;
											font-family: FontAwesome;
											display: inline-block;
											content: "\f005";
										}

										.rating>.half:before {
											content: "\f089";
											position: absolute;
										}

										.rating>label {
											color: #ddd;
											float: right;
										}

										/***** CSS Magic to Highlight Stars on Hover *****/

										.rating>input:checked~label,
										/* show gold star when clicked */
										.rating:not(:checked)>label:hover,
										/* hover current star */
										.rating:not(:checked)>label:hover~label {
											color: #FFD700;
										}

										/* hover previous stars in list */

										.rating>input:checked+label:hover,
										/* hover current star when changing rating */
										.rating>input:checked~label:hover,
										.rating>label:hover~input:checked~label,
										/* lighten current selection */
										.rating>input:checked~label:hover~label {
											color: #FFED85;
										}

									</style>
									<!-- end error -->
									<form action="<?=base_url('score/simpanScore')?>" method="post">

										<div class="form-row">
											<table class="table">
												<tr>
													<td rowspan="2" colspan="">
														<input type="text" hidden name="id_mitra"
															value="<?=$mitra->id_user?>">
														<input type="text" hidden value="<?=$id_score?>"
															name="id_score">
														<?php if ($mitra->foto == null): ?>
														<img style="border-radius: 50%;height: 200px;width: 200px;"
															src="<?=base_url()?>assets/images/admin.png" alt="">
														<?php else: ?>

														<img style="border-radius: 50%;height: 200px;width: 200px;"
															src="<?=base_url("uploads/" . $mitra->foto)?>" alt="">
														<?php endif;?>
													</td>
													<td>Nama</td>
													<td><?=$mitra->nama?></td>
												</tr>
												<tr>
													<td>Nomor Kontak</td>
													<td><?=substr($mitra->nomor_kontak, 0, 4)?>-xxxx-xxxx</td>
												</tr>
												<tr>
													<td colspan="3">
														<div class="alert alert-danger" role="alert">
															<strong>Pemberitahuan</strong>
															<p>Silahkan Berikan penilaian anda terhada mitra Kami</p>
														</div>
													</td>
												</tr>
												<tr>
													<td colspan="5">
													<table>
																<thead>
																	<th>Bintang</th>
																	<th>Score</th>
																</thead>
																<tbody>
																	<?php foreach ($star as $key => $value): ?>
																	<tr>
																		<td style="height: 1px;">
																		<fieldset class="rating">
																				<input type="radio"  required disabled  id="<?=$key + 1?>_star5"
																					name="<?=$key + 1?>_rating" value="5" <?=$value->star == 5 ? "checked" : ""?>  /><label
																					class="full" for="<?=$key + 1?>_star5"
																					title="Awesome - 5 stars"></label>
																				<input type="radio" required disabled <?=$value->star == 4.5 ? "checked" : ""?>
																					id="<?=$key + 1?>_star4half" name="<?=$key + 1?>_rating"
																					value="4 and a half" /><label
																					class="half" for="<?=$key + 1?>_star4half"
																					title="Pretty good - 4.5 stars"></label>
																				<input type="radio" required disabled <?=$value->star == 4 ? "checked" : ""?> id="<?=$key + 1?>_star4"
																					name="<?=$key + 1?>_rating" value="4" /><label
																					class="full" for="<?=$key + 1?>_star4"
																					title="Pretty good - 4 stars"></label>
																				<input type="radio" required disabled <?=$value->star == 3.5 ? "checked" : ""?>
																					id="<?=$key + 1?>_star3half" name="<?=$key + 1?>_rating"
																					value="3 and a half" /><label
																					class="half" for="<?=$key + 1?>_star3half"
																					title="Meh - 3.5 stars"></label>
																				<input type="radio" required disabled <?=$value->star == 3 ? "checked" : ""?> id="<?=$key + 1?>_star3"
																					name="<?=$key + 1?>_rating" value="3" /><label
																					class="full" for="<?=$key + 1?>_star3"
																					title="Meh - 3 stars"></label>
																				<input type="radio" required disabled <?=$value->star == 2.5 ? "checked" : ""?>
																					id="<?=$key + 1?>_star2half" name="<?=$key + 1?>_rating"
																					value="2 and a half" /><label
																					class="half" for="<?=$key + 1?>_star2half"
																					title="Kinda bad - 2.5 stars"></label>
																				<input type="radio" required disabled <?=$value->star == 2 ? "checked" : ""?> id="<?=$key + 1?>_star2"
																					name="<?=$key + 1?>_rating" value="2" /><label
																					class="full" for="<?=$key + 1?>_star2"
																					title="Kinda bad - 2 stars"></label>
																				<input type="radio" required disabled
																					id="<?=$key + 1?>_star1half" name="<?=$key + 1?>_rating" <?=$value->star == 1.5 ? "checked" : ""?>
																					value="1 and a half" /><label
																					class="half" for="<?=$key + 1?>_star1half"
																					title="Meh - 1.5 stars"></label>
																				<input type="radio" required disabled <?=$value->star == 1 ? "checked" : ""?> id="<?=$key + 1?>_star1"
																					name="<?=$key + 1?>_rating" value="1" /><label
																					class="full" for="<?=$key + 1?>_star1"
																					title="Sucks big time - 1 star"></label>
																				<input type="radio" required disabled <?=$value->star == 0.5 ? "checked" : ""?>
																					id="<?=$key + 1?>_starhalf" name="<?=$key + 1?>_rating"
																					value="half" /><label class="half"
																					for="<?=$key + 1?>_starhalf"
																					title="Sucks big time - 0.5 stars"></label>
																			</fieldset>
																		</td>
																		<td>
																			<span
																				class="badge badge-success"><?=$value->score?></span>
																		</td>
																	</tr>
																	<?php endforeach;?>
																</tbody>
															</table>
													</td>
												</tr>
												<tr>
													<td colspan="6">Berikan Penilaian</td>
												</tr>
												<?php foreach ($kriteria as $key => $value): ?>
												<tr>
													<td style="width: 1px;"><?=$key + 1?></td>
													<td><?=$value->kriteria?></td>
													<td style="">
														<fieldset class="rating">
															<input type="radio" required
																id="star5_<?=$value->id_kriteria?>"
																name="rating_<?=$value->id_kriteria?>"
																value="5" /><label class="full"
																for="star5_<?=$value->id_kriteria?>"
																title="Awesome - 5 stars"></label>
															<input type="radio" required
																id="star4half_<?=$value->id_kriteria?>"
																name="rating_<?=$value->id_kriteria?>"
																value="4 and a half" /><label class="half"
																for="star4half_<?=$value->id_kriteria?>"
																title="Pretty good - 4.5 stars"></label>
															<input type="radio" required
																id="star4_<?=$value->id_kriteria?>"
																name="rating_<?=$value->id_kriteria?>"
																value="4" /><label class="full"
																for="star4_<?=$value->id_kriteria?>"
																title="Pretty good - 4 stars"></label>
															<input type="radio" required
																id="star3half_<?=$value->id_kriteria?>"
																name="rating_<?=$value->id_kriteria?>"
																value="3 and a half" /><label class="half"
																for="star3half_<?=$value->id_kriteria?>"
																title="Meh - 3.5 stars"></label>
															<input type="radio" required
																id="star3_<?=$value->id_kriteria?>"
																name="rating_<?=$value->id_kriteria?>"
																value="3" /><label class="full"
																for="star3_<?=$value->id_kriteria?>"
																title="Meh - 3 stars"></label>
															<input type="radio" required
																id="star2half_<?=$value->id_kriteria?>"
																name="rating_<?=$value->id_kriteria?>"
																value="2 and a half" /><label class="half"
																for="star2half_<?=$value->id_kriteria?>"
																title="Kinda bad - 2.5 stars"></label>
															<input type="radio" required
																id="star2_<?=$value->id_kriteria?>"
																name="rating_<?=$value->id_kriteria?>"
																value="2" /><label class="full"
																for="star2_<?=$value->id_kriteria?>"
																title="Kinda bad - 2 stars"></label>
															<input type="radio" required
																id="star1half_<?=$value->id_kriteria?>"
																name="rating_<?=$value->id_kriteria?>"
																value="1 and a half" /><label class="half"
																for="star1half_<?=$value->id_kriteria?>"
																title="Meh - 1.5 stars"></label>
															<input type="radio" required
																id="star1_<?=$value->id_kriteria?>"
																name="rating_<?=$value->id_kriteria?>"
																value="1" /><label class="full"
																for="star1_<?=$value->id_kriteria?>"
																title="Sucks big time - 1 star"></label>
															<input type="radio" required
																id="starhalf_<?=$value->id_kriteria?>"
																name="rating_<?=$value->id_kriteria?>"
																value="half" /><label class="half"
																for="starhalf_<?=$value->id_kriteria?>"
																title="Sucks big time - 0.5 stars"></label>
														</fieldset>
													</td>
												</tr>
												<?php endforeach;?>

												<tr>
													<td colspan="3">
														<textarea name="kritik_dan_saran" class="form-control" id=""
															cols="30" rows="10"> </textarea>
														<span style="color: red;">Kritik dan saran</span>
													</td>
												</tr>
												<tr>
													<td colspan="3">
														<button type="submit""
															class=" btn btn-primary">Simpan</button></td>
												</tr>
											</table>

										</div>

									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--**********************************
            Content body end
        ***********************************-->

		<div class="footer">
			<div class="copyright">
				<p>Copyright © Designed &amp; Developed by <a href="#" target="_blank">BPS</a> 2021</p>
			</div>
		</div>
		<!--**********************************
            Footer end
        ***********************************-->

		<!--**********************************
           Support ticket button start
        ***********************************-->

		<!--**********************************
           Support ticket button end
        ***********************************-->


	</div>
	<!--**********************************
        Main wrapper end
    ***********************************-->

	<!--**********************************
        Scripts
    ***********************************-->
	<!-- Required vendors -->
	<script src="<?=base_url()?>assets/vendor/global/global.min.js"></script>
	<script src="<?=base_url()?>assets/vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
	<script src="<?=base_url()?>assets/vendor/chart.js/Chart.bundle.min.js"></script>
	<script src="<?=base_url()?>assets/js/custom.min.js"></script>
	<script src="<?=base_url()?>assets/js/deznav-init.js"></script>
	<script src="<?=base_url()?>assets/vendor/owl-carousel/owl.carousel.js"></script>

	<!-- Chart piety plugin files -->
	<script src="<?=base_url()?>assets/vendor/peity/jquery.peity.min.js"></script>

	<!-- Apex Chart -->
	<script src="<?=base_url()?>assets/vendor/apexchart/apexchart.js"></script>

	<!-- Dashboard 1 -->
	<script src="<?=base_url()?>assets/js/dashboard/dashboard-1.js"></script>

	<!-- Datatable -->
	<script src="<?=base_url()?>assets/vendor/datatables/js/jquery.dataTables.min.js"></script>
	<script src="<?=base_url()?>assets/js/plugins-init/datatables.init.js"></script>
</body>

</html>
