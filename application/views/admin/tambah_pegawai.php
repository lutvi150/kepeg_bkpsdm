<link rel="stylesheet"
     	href="<?=base_url();?>assets/vendor/bootstrap-datetimepicker/css/bootstrap-datetimepicker.css">
   <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <div class="container-fluid">
                <div class="page-titles">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="javascript:void(0)">Form</a></li>
						<li class="breadcrumb-item active"><a href="javascript:void(0)">Tambah Pegawai</a></li>
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

									<!-- end error -->
                                    <form action="<?=base_url('admin/store_data_pegawai')?>" id="form-input" method="post">

                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label>Nama Pegawai</label>
                                                <input type="text" name="nama_pegawai" required class="form-control" value="" placeholder="Isi Nama Lengkap">
												<small class="text-error enama_pegawai"></small>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>NIP</label>
                                                <input type="text" value="" required name="nip" class="form-control" placeholder="NIP">
												<small class="text-error enip"></small>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Golongan</label>
												<select name="golongan" class="form-control" id="golongan"></select>
												<small class="text-error egol" ></small>
                                            </div>
                                            <div class="formp-group col-md-6">
                                                <label>TMT Golongan</label>
                                                <input type="text"  required name="tmt_gol" value="" id="tmt_gol" class="form-control" placeholder="TMT Golongan">
												<small class="text-error etmt_gol" ></small>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>KGB TMT</label>
												<input type="text" id="kgb_tmt" class="form-control" value="" name="kgb_tmt" >
												<small class="text-error ekgb_tmt"></small>
                                            </div>
											<div class="form-group col-md-6">
											  <label for="">Nama Jabatan</label>
											  <select name="jabatan" class="form-control"  id="jabatan">
												<option value="">Pilih Jabatan</option>
											  </select>
											  <small id="helpId" class="text-error ejabatan"></small>
											</div>
											<div class="form-group col-md-6">
											  <label for="">TMT Jabatan</label>
											  <input type="text" name="tmt_jabatan" id="tmt_jabatan" class="form-control" placeholder="TMT Jabatan" aria-describedby="helpId">
											  <small id="helpId" class="text-error etmt_jabatan"></small>
											</div>
											<div class="form-group col-md-6">
											  <label for="">Jenjang Pendidikan</label>
											 <select name="jenjang_pendidikan" class="form-control" id="jenjang_pendidikan"></select>
											  <small id="helpId" class="text-error ejenjang_pendidikan"></small>
											</div>
											<div class="form-group col-md-6">
											  <label for="">Jenis Kelamin</label>
											  <select name="jenis_kelamin" class="form-control" id="jenis_kelamin">
												<option value="">Pilih Jenis Kelamin</option>
											  </select>
											  <small id="helpId" class="text-error ejenis_kelamin"></small>
											</div>
											<div class="form-group col-md-6">
											  <label for="">Agama</label>
											  <select name="agama" class="form-control" id="agama">
												<option value="">Pilih Jenis Agama</option>
											  </select>
											  <small id="helpId" class="text-error eagama"></small>
											</div>
											<div class="form-group col-md-6">
											  <label for="">Eselon & Non Eselon</label>
											  <select name="eselon_non_eselon" id="eselon_non_eselon"  class="form-control" id="">

											  </select>
											  <small id="helpId" class="text-error eeselon_non_eselon"></small>
											</div>
											<div class="form-group col-md-6">
											  <label for="">Perangkat Daerah</label>
											  <select name="perangkat_daerah"  class="form-control" id="perangkat_daerah">
											  </select>
											  <small id="helpId" class="text-error eperangkat_daerah"></small>
											</div>
											<div class="form-group col-md-6">
											  <label for="">Unit Kerja</label>
											  <select name="unit_kerja"  class="form-control" id="unit_kerja">
											  </select>
											  <small id="helpId" class="text-error eunit_kerja"></small>
											</div>
                                        </div>

                                        <button type="button"  class="btn btn-primary btn-simpan " onclick="storeData()">Simpan</button>
										<a href="<?=base_url('admin/pegawai')?>" class="btn btn-info" ><i class="fa fa-reply"></i> Kembali</a>
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
		<script src="<?=base_url();?>assets/vendor/bootstrap-datetimepicker/js/moment.js"></script>
     <script src="<?=base_url();?>assets/vendor/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js"></script>
<script>
	let url="<?=base_url()?>";
	$('#kgb_tmt').datetimepicker({
			format: 'YYYY-MM-DD',
			useCurrent: false,
		});
	$('#tmt_gol').datetimepicker({
			format: 'YYYY-MM-DD',
			useCurrent: false,
		});
	$('#tmt_jabatan').datetimepicker({
			format: 'YYYY-MM-DD',
			useCurrent: false,
		});

		$(document).ready(function () {
			getSuppot();
		});
	function storeData() {
		$(".text-error").text();
		$(".btn-simpan").text('Sedang Menyimpan...');
		$(".btn-simpan").attr('disabled',true);
		$("#form-input").ajaxForm({
			type: "POST",
			url: url+"Admin/store_data_pegawai",
			dataType: "JSON",
			success: function (response) {
				$(".btn-simpan").text('Simpan');
				$(".btn-simpan").attr('disabled',false);
				if (response.status == 'success') {
					swal({
						title: "Berhasil",
						text: "Data Berhasil Disimpan",
						type: "success",
						confirmButtonText: "OK"
					}).then(
						function () {
							window.location.href = url+"Admin/pegawai";
						}
					);
				} else if (response.status=='failed') {
					swal({
						title: "Gagal",
						text: `${response.msg}`,
						type: "error",
						confirmButtonText: "OK"
					});
				} else if (response.status=='validation_failed'){
					$.each(response.msg, function(key, value) {
						$(`.e${key}`).text(value);
					});
				}


			},error:function(){
				$(".btn-simpan").text('Simpan');
				$(".btn-simpan").attr('disabled',false);
				swal(
					'Gagal',
					'Terjadi Kesalahan',
					'error'
				)
			}
		}).submit();
	 }
	 function getSuppot() {
		$.ajax({
			type: "POST",
			url: url+"Admin/supportData",
			dataType: "JSON",
			success: function (response) {
				let jenis_kelamin="";
				let agama="";
				let golongan="";
				let eselon_non_eselon="";
				let perangkat_daerah="";
				let unit_kerja="";
				let jabatan="";
				let jenjang_pendidikan="";
				$.each(response.jenis_kelamin, function (indexInArray, valueOfElement) {
					 jenis_kelamin+=`<option value="${valueOfElement.id}">${valueOfElement.name}</option>`;
				});
				$.each(response.agama, function (indexInArray, valueOfElement) {
					 agama+=`<option value="${valueOfElement.id}">${valueOfElement.name}</option>`;
				});
				$.each(response.golongan, function (indexInArray, valueOfElement) {
					 golongan+=`<option value="${valueOfElement.id}">${valueOfElement.name}</option>`;
				});
				$.each(response.eselon, function (indexInArray, valueOfElement) {
					 eselon_non_eselon+=`<option value="${valueOfElement.id}">${valueOfElement.name}</option>`;
				});
				$.each(response.perangkat_daerah, function (indexInArray, valueOfElement) {
					 perangkat_daerah+=`<option value="${valueOfElement.id}">${valueOfElement.name}</option>`;
				});
				$.each(response.unit_kerja, function (indexInArray, valueOfElement) {
					 unit_kerja+=`<option value="${valueOfElement.id}">${valueOfElement.name}</option>`;
				});
				$.each(response.jabatan, function (indexInArray, valueOfElement) {
					 jabatan+=`<option value="${valueOfElement.id}">${valueOfElement.name}</option>`;
				});
				$.each(response.jenjang_pendidikan, function (indexInArray, valueOfElement) {
					 jenjang_pendidikan+=`<option value="${valueOfElement.id}">${valueOfElement.name}</option>`;
				});
				$("#jenis_kelamin").html(jenis_kelamin);
				$("#agama").html(agama);
				$("#golongan").html(golongan);
				$("#eselon_non_eselon").html(eselon_non_eselon);
				$("#perangkat_daerah").html(perangkat_daerah);
				$("#unit_kerja").html(unit_kerja);
				$("#jabatan").html(jabatan);
				$("#jenjang_pendidikan").html(jenjang_pendidikan);

			},error:function(){
				swal(
					'Gagal',
					'Terjadi Kesalahan',
					'error'
				)
			}
		});
	  }
</script>
