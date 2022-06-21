   <!--**********************************
            Content body start
        ***********************************-->
   <div class="content-body">
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
								   .text-error{
									   color: red;
								   }
							   </style>
   							<!-- end error -->
   							<form action="#" method="post">

   								<div class="form-row">

   									<div class="formp-group col-md-6">
   										<label>Nomor Kontak</label>
   										<input type="number" id="nomor_kontak" required name="nomor_kontak"
   											value="" class="form-control">
											   <span class=" text-error enomorkontrak"></span>
   									</div>
   									<div class="form-group col-md-6">
   										<label>Nama</label>
   										<input type="text" name="nama" id="nama" required class="form-control"
   											value="" placeholder="Isi Nama Lengkap">
											   <span class=" text-error enama"></span>
   									</div>

   								</div>

   								<button onclick="saveSurvei()" type="button" class="btn btn-primary">Simpan</button>
   								<a href="<?=base_url('user/surveiStart/' . $id_surat)?>" class="btn btn-info"><i
   										class="fa fa-reply"></i> Kembali</a>
   							</form>
   						</div>
   					</div>
   				</div>
   			</div>
   		</div>
   	</div>
   </div>
   <!-- Modal success -->
   <div class="modal fade" id="modal-success" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
	   <div class="modal-dialog modal-sm" role="document">
		   <div class="modal-content">
			   <div class="modal-header">
				   <h5 class="modal-title">Success</h5>
			   </div>
			   <div class="modal-body">
				   Success, data survei berhasil di simpan, dan notifikasi penilaian telah di kirim ke nomor kontak yang anda masukkan.
				   <div class="text-center demo-mode" style="display: none;">
					   <h2>Demo Mode</h2>
					   <div class="link-demo"></div>
				   </div>
			   </div>
			   <div class="modal-footer">
				   <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			   </div>
		   </div>
	   </div>
   </div>
   <!-- Modal danger -->
   <div class="modal fade" id="modal-failed" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
	   <div class="modal-dialog modal-sm" role="document">
		   <div class="modal-content">
			   <div class="modal-header">
				   <h5 class="modal-title">Gagal</h5>
					   <button type="button" class="close" data-dismiss="modal" aria-label="Close">
						   <span aria-hidden="true">&times;</span>
					   </button>
			   </div>
			   <div class="modal-body">
				   Gagal, nomor yang anda masukkan sudah terdaftar !
			   </div>
			   <div class="modal-footer">
				   <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button></div>
		   </div>
	   </div>
   </div>
   <!--**********************************
            Content body end
        ***********************************-->
		<script>
			function saveSurvei() {
				$(".text-error").text("");
				let phoneNumber=$("#nomor_kontak").val();
				let name=$("#nama").val();
				$.ajax({
					type: "POST",
					url: "<?=base_url('ApiData/storeSurvei')?>",
					data:{
						phoneNumber:phoneNumber,
						name:name,
						id_surat_tugas:"<?=$id_surat?>"
					},
					dataType: "JSON",
					success: function (response) {
						if (response.status == 'success') {
							$("input").val("");
							if (response.sms==0) {
								$(".demo-mode").removeAttr('style');
								$(".link-demo").html(`<a target="_blank" href="${response.link}" class="btn btn-success btn-success">Link Penilaian</a>`)
							} else{
								$(".demo-mode").attr('style','display:none')
							}
							$("#modal-success").modal('show');
						} else if(response.status == 'validation_failed') {
							$(".enomorkontrak").text(response.message.phoneNumber);
							$(".enama").text(response.message.name);
						} else if (response.status == 'error') {
							$("#modal-failed").modal('show');
						}
					}
				});
			}
		</script>
