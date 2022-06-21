	<!--**********************************
            Content body start
        ***********************************-->
		<div class="content-body">
			<div class="container-fluid">
				<div class="page-titles">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="javascript:void(0)">Profil</a></li>
						<li class="breadcrumb-item active"><a href="javascript:void(0)">Profil Mitra</a></li>
					</ol>
				</div>
				<!-- row -->
				<div class="row">

					<div class="col-xl-12 col-lg-12">
						<div class="card">
							<div class="card-header">
								<h4 class="card-title">Profil</h4>
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

									<!-- end error -->
									<form action="#" method="post">

										<div class="form-row">
											<table class="table">
												<tr>
													<td rowspan="4" style="width: 10px;">
														<?php if ($user->foto == null): ?>
														<img style="border-radius: 50%;height: 200px;width: 200px;"
															src="<?=base_url()?>assets/images/admin.png" alt="">
															<?php else: ?>
																<img style="border-radius: 50%;height: 200px;width: 200px;"
															src="<?=base_url('uploads/' . $user->foto)?>" alt="">
															<?php endif;?>
													</td>
													<td>Nama</td>
													<td><?=$user->nama?></td>
												</tr>
												<tr>
													<td>Email</td>
													<td><?=$user->email?></td>
												</tr>
												<tr>
													<td>Alamat</td>
													<td><?=$user->alamat?></td>
												</tr>
												<tr>
													<td>Nomor Kontak</td>
													<td><?=($user->nomor_kontak)?></td>
												</tr>
												<tr style="text-align: center;">
													<td><button type="button" onclick="gantiFoto()" class="btn btn-success btn-sm"><i class="fa fa-refresh"></i> Ganti Foto</button></td>
													<td colspan="2">
														<a href="<?=base_url('MakeCard/index')?>" target="_blank" class="btn btn-info btn-sm"><i class="fa fa-file"></i> ID Card</a>
													</td>
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
		>

		<!-- Modal -->
		<div class="modal fade" id="ganti-foto-profil" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<form action="<?=base_url('user/gantiFotoProfil')?>" enctype="multipart/form-data" method="post">
					<div class="modal-header">
						<h5 class="modal-title">Ganti Foto Profil</h5>
					</div>
					<div class="modal-body">
						<input type="file" name="foto_profil" class="
						form-control">
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-primary">Simpan</button>
					</div>
					</form>
				</div>
			</div>
		</div>
		<script>
			function gantiFoto() {
				$('#ganti-foto-profil').modal('show');
			 }
		</script>
