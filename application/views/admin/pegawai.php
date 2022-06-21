     <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <div class="container-fluid">
                <div class="page-titles">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="javascript:void(0)">Mitra</a></li>
						<li class="breadcrumb-item active"><a href="javascript:void(0)">Data Mitra</a></li>
					</ol>
                </div>
                <!-- row -->


                <div class="row">

					<div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Profile Mitra</h4>
                            </div>
                            <div class="card-body">
                                <div class="col-md-12 row">
                            <a href="<?=base_url('admin/tambah_pegawai')?>"class="btn btn-success shadow btn-xs " ><i class="fa fa-plus" ></i> Tambah Data</a>
							<a href="#" onclick="showReport()" class="btn btn-info shadow btn-xs"><i class="fa fa-print"></i> Cetak Laporan Mitra</a>
                                </div>
                                <div class="table-responsive">
                                    <table id="example3" class="display min-w850">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama</th>
                                                <th>Alamat</th>
												<th>Email</th>
                                                <th>Nomor Kontak</th>
                                                <th>Foto</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
											<?php $no = 1;foreach ($pegawai as $key => $value): ?>
											<tr>
												<td><?=$no++?></td>
												<td><?=$value->nama?></td>
												<td><?=$value->alamat?></td>
												<td><?=$value->email?></td>
												<td><?=$value->nomor_kontak?></td>
												<td><?php if ($value->foto == null): ?>
													<img style="height: 100px;border-radius: 50%;" src="<?=base_url();?>assets/images/admin.png" alt="">
													<?php else: ?>
														<img style="height: 100px;border-radius: 50%;" src="<?=base_url()?>uploads/<?=$value->foto?>" alt="">
														<?php endif;?>
												</td>
												<td>
													<a href="" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a>
                                                    <a href="<?=base_url('admin/suratTugas/' . $value->id_user)?>" class="btn btn-success btn-xs"><i class="flaticon-381-notepad"></i> Surat Tugas</a>
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
        <div class="modal fade" id="select-report" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form action="<?=base_url('MakeReport/performaMitra')?>" target="_blank" method="post">
                    <div class="modal-header">
                        <h5 class="modal-title">Pilih Jenis Laporan</h5>

                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                          <label for="">Pilih Jenis Laporan</label>
                          <select name="jenis_laporan" id="jenis_laporan" class="form-control" onchange="showKriteria()" id="">
                              <option value="">Pilih Jenis Laporan</option>
                              <option value="1">Semua Laporan</option>
                              <option value="2">Berdasarkan Kriteria</option>
                          </select>

                        </div>
                        <div class="form-group show-keriteria" style="display: none;">
                          <label for="">Kriteria</label>
                          <select name="keriteria" id="" class="form-control">
                              <?php foreach ($keriteria as $key => $value): ?>
                              <option value="<?=$value['id_kriteria']?>"><?=$value['kriteria']?></option>
                              <?php endforeach;?>
                          </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <div class="btn-cetak" style="display: none;">
                        <button type="submit" class="btn btn-primary">Cetak</button>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        <script>
            function showReport() {
                $("#select-report").modal('show');
             }
             function showKriteria() {
                 let jenis_laporan=$("#jenis_laporan").children("option:selected").val();
                 if (jenis_laporan == 2) {
                     $(".show-keriteria").removeAttr('style');
                        $(".btn-cetak").removeAttr('style');
                 } else if(jenis_laporan == 1) {
                        $(".show-keriteria").attr('style','display:none');
                        $(".btn-cetak").removeAttr('style');
                 } else if(jenis_laporan==''){
                     $(".btn-cetak").attr('style','display:none');
                     $(".show-keriteria").attr('style','display:none');
                 }
                 console.log(jenis_laporan);
              }
        </script>