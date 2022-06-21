     <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <div class="container-fluid">
                <div class="page-titles">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="javascript:void(0)">Target</a></li>
						<li class="breadcrumb-item active"><a href="javascript:void(0)">Target Survei</a></li>
					</ol>
                </div>
                <!-- row -->


                <div class="row">

					<div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Data Target Survei</h4>
                            </div>
                            <div class="card-body">
                                <div class="col-md-12 row">
                            <a href="<?=base_url('admin/tambah_target')?>"class="btn btn-success shadow btn-xs " ><i class="fa fa-plus" ></i> Tambah Data</a>
                                </div>
                                <div class="table-responsive">
                                    <table id="example3" class="display min-w850">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama</th>
                                                <th>Alamat</th>
                                                <th>Nomor Kontak</th>
                                                <th>Lokasi</th>
												<th>Status Survei</th>
												<th>Surveyor</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
											<?php $no = 1;foreach ($target as $key => $value): ?>
												<tr>
													<td><?=$no++?></td>
													<td><?=$value->nama?></td>
													<td><?=$value->nomor_kontak?></td>
													<td><?=$value->alamat?></td>
													<td>Provinsi: <?=$value->provinsi?> <br> Kabupaten: <?=$value->kabupaten?> <br>Kecamatan: <?=$value->kecamatan?> <br>Desa: <?=$value->desa?> </td>
													<td>
														<?php if ($value->penilaian == null): ?>
														<label for="" class="label label-danger">Belum</label>
														<?php else: ?>
														<label for="" class="label label-success">Sudah</label>
														<?php endif;?>
													</td>
													<td>
														<?php if ($value->id_pegawai == null): ?>
															<label for="" class="label label-danger ">Belum Ada</label>
															<?php else: ?>
																<a href="#" class="btn btn-success btn-xs">survei</a>
																<?php endif;?>
													</td>
													<td>
														<a href="" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a>
														<a href="#" class="btn btn-success btn-xs"><i class="fa fa-plus"></i> Edit Surveyor</a>
													</td>
												</tr>
												<?php endforeach;?>
                                        </tbody>
                                    </table>
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
