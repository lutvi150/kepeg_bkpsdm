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
                                                <label>Nama</label>
                                                <input type="text" name="nama" required class="form-control" value="<?=$pegawai['nama']?>" placeholder="Isi Nama Lengkap">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Email</label>
                                                <input type="email" value="<?=$pegawai['email']?>" required name="email" class="form-control" placeholder="Email">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Password</label>
                                                <input type="password" required name="password" class="form-control" placeholder="Password">
                                            </div>
                                            <div class="formp-group col-md-6">
                                                <label>Nomor Kontak</label>
                                                <input type="text" required name="nomor_kontak" value="<?=$pegawai['nomor_kontak']?>" class="form-control">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Alamat</label>
                                                <textarea name="alamat" class="form-control" id="" cols="30" rows="3"><?=$pegawai['alamat']?></textarea>
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
