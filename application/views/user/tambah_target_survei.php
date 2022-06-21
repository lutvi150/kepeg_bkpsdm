
   <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <div class="container-fluid">
                <div class="page-titles">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="javascript:void(0)">Form</a></li>
						<li class="breadcrumb-item active"><a href="javascript:void(0)">Tambah Target Survei</a></li>
					</ol>
                </div>
                <!-- row -->
                <div class="row">

					<div class="col-xl-12 col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Data Diri Pegawai</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
									 <!-- success page -->
									 <?php if ($this->session->flashdata('success')): ?>
                                    <div class="alert alert-success alert-dismissible fade show">
									<svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="mr-2"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path></svg>
									<strong>Success!</strong> <?=$this->session->userdata('success')?>
									<button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
                                    </button>
								</div>
                                <?php elseif ($this->session->userdata('error')): ?>
                                    	<!-- error page -->
									<div class="alert alert-danger alert-dismissible fade show">
									<svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="mr-2"><polygon points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2"></polygon><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg>
									<strong>Maaf!</strong> <?=$this->session->flashdata('error')?>
									<button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
                                    </button>
								</div>
                                <?php endif;?>
                                    <form action="<?=base_url('admin/simpan_survei')?>" method="post">

                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label>Nama</label>
                                                <input type="text" name="nama" required class="form-control" placeholder="Isi Nama Lengkap">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Provinsi</label>
                                                <select class="form-control" required name="province" id="province" >
                                                    <option selected>Pilih Provinsi</option>
                                                    <option value="1">One</option>
                                                    <option value="2">Two</option>
                                                    <option value="3">Three</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Kabupaten</label>
                                                <select class="form-control" required name="kabupaten" id="kabupaten">
                                                    <option selected>Pilih Kabupaten</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Kecamatan</label>
                                                <select class="form-control" name="kecamatan" required id="kecamatan">
                                                    <option selected>Pilih Kecamatan</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Desa</label>
                                                <select class="form-control" name="desa" required id="desa">
                                                    <option selected>Pilih Desa</option>
                                                </select>
                                            </div>

                                            <div class="form-group col-md-6">
                                                <label>Alamat</label>
												<textarea name="alamat" class="form-control" required id="" cols="30" rows="2"></textarea>
                                            </div>
                                        </div>

                                        <button type="submit" class="btn btn-primary">Simpan</button>
										<a href="<?=base_url('admin/target_survei')?>" class="btn btn-info "><i class="fa fa-reply"></i> Kembali</a>
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
		<script>
			$(document).ready(function () {
				province();
			});
			let url="<?=base_url()?>";
			function province() {
				$.ajax({
					type: "POST",
					url: url+"ApiData/getProvinceData",
					data: "data",
					dataType: "JSON",
					success: function (response) {
						let option="";
						response.forEach(element => {
							option+=`<option value="${element.id}" >${element.name}</option>`;
						});
						$("#province").html(`<option selected>Pilih Provinsi</option>${option}`)
					}
				});
			 }
			 $("#province").change(function (e) {
				 e.preventDefault();
				 kabupaten();
			 });
			 function kabupaten() {
				 let id=$("#province").children("option:selected").val();
				$.ajax({
					type: "POST",
					url: url+"ApiData/getRegencies",
					data: {id:id},
					dataType: "JSON",
					success: function (response) {
						let option="";
						response.forEach(element => {
							option+=`<option value="${element.id}" >${element.name}</option>`;
						});
						$("#kabupaten").html(`<option selected>Pilih Kabupaten</option>${option}`)
					}
				});
			 }
			 $("#kabupaten").change(function (e) {
				 e.preventDefault();
				 kecamatan()
			 });
			 function kecamatan() {
				let id=$("#kabupaten").children("option:selected").val();
				$.ajax({
					type: "POST",
					url: url+"ApiData/getDistrict",
					data: {id:id},
					dataType: "JSON",
					success: function (response) {
						let option="";
						response.forEach(element => {
							option+=`<option value="${element.id}" >${element.name}</option>`;
						});
						$("#kecamatan").html(`<option selected>Pilih Kabupaten</option>${option}`)
					}
				});
			  }
			  $("#kecamatan").change(function (e) {
				  e.preventDefault();
				  desa();
			  });
			  function desa() {
				let id=$("#kecamatan").children("option:selected").val();
				$.ajax({
					type: "POST",
					url: url+"ApiData/getVillages",
					data: {id:id},
					dataType: "JSON",
					success: function (response) {
						let option="";
						response.forEach(element => {
							option+=`<option value="${element.id}" >${element.name}</option>`;
						});
						$("#desa").html(`<option selected>Pilih Kabupaten</option>${option}`)
					}
				});
			    }
		</script>
