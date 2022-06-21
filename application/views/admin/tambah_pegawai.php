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

									<!-- end error -->
                                    <form action="<?=base_url('admin/simpan_pegawai')?>" method="post">

                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label>Nama Pegawai</label>
                                                <input type="text" name="nama_pegawai" required class="form-control" value="" placeholder="Isi Nama Lengkap">
												<span class="text-error enama_pegawai"></span>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>NIP</label>
                                                <input type="text" value="" required name="nip" class="form-control" placeholder="NIP">
												<span class="text-error enip"></span>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Golongan</label>
                                                <input type="text" required name="gol" class="form-control" placeholder="Golongan">
												<span class="text-error egol" ></span>
                                            </div>
                                            <div class="formp-group col-md-6">
                                                <label>TMT Golongan</label>
                                                <input type="text" required name="tmt_gol" value="" class="form-control" placeholder="TMT Golongan">
												<span class="text-error etmt_gol" ></span>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>KGB TMT</label>
												<input type="text" class="form-control" value="" name="kgb_tmt" >
												<span class="text-error ekgb_tmt"></span>
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
											  <input type="text" name="tmt" id="tmt" class="form-control" placeholder="TMT Jabatan" aria-describedby="helpId">
											  <small id="helpId" class="text-error etmt"></small>
											</div>
											<div class="form-group col-md-6">
											  <label for="">Jenjang Pendidikan</label>
											  <input type="text" name="jenjang_pendidikan" id="jenjang_pendidikan" class="form-control" placeholder="Jenjang Pendidikan" aria-describedby="helpId">
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
											  <select name="eselon_non_eselon"  class="form-control" id="">

											  </select>
											  <small id="helpId" class="text-error eeselon_non_eselon"></small>
											</div>
											<div class="form-group col-md-6">
											  <label for="">Perangkat Daerah</label>
											  <select name="perangkat_daerah"  class="form-control" id="perangkat_daerah">
											  </select>
											  <small id="helpId" class="text-error eeselon_non_eselon"></small>
											</div>
											<div class="form-group col-md-6">
											  <label for="">Unit Kerja</label>
											  <select name="unit_kerja"  class="form-control" id="unit_kerja">
											  </select>
											  <small id="helpId" class="text-error eeselon_non_eselon"></small>
											</div>
                                        </div>

                                        <button type="submit" class="btn btn-primary">Simpan</button>
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
<script>

</script>
