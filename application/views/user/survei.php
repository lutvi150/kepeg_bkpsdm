
     <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
     	<div class="container-fluid">
     		<div class="page-titles">
     			<ol class="breadcrumb">
     				<li class="breadcrumb-item"><a href="javascript:void(0)">Survei </a></li>
     				<li class="breadcrumb-item active"><a href="javascript:void(0)">Hasil Survei</a></li>
     			</ol>
     		</div>
     		<!-- row -->


     		<div class="row">

     			<div class="col-12">
     				<div class="card">
     					<div class="card-header">
     						<h4 class="card-title">Data hasil Survei</h4>
     					</div>
                         <?php if ($this->session->flashdata('success')): ?>
     					<div class="alert alert-success" role="alert">
     						<strong>Success</strong>
                             <p><?=$this->session->userdata('success')?></p>
     					</div>
                         <?php endif;?>
     					<div class="card-body">
                             <div class="col-md-12">
                                 <a href="<?=base_url('user/suratTugas')?>" class="btn btn-info btn-xs"><i class="fa fa-reply"></i> Kembali</a>
                                 <a href="<?=base_url('user/isiSurvei/' . $id_surat)?>" class="btn btn-success btn-xs"><i class="fa fa-plus"></i> Tambah Survei</a>
                             </div>
     						<div class="table-responsive">
     							<table id="example3" class="display min-w850">
     								<thead>

     									<th>No</th>
     									<th>Nama</th>
     									<th>Nomor Kontak</th>
										 <th style="width: 10px;">Status</th>

     								</thead>
     								<tbody>
										 <?php $no = 1;foreach ($survei as $key => $value): ?>
										 <tr>
											 <td><?=$no++?></td>
											 <td><?=$value->nama?></td>
											 <td><?=$value->nomor_kontak?></td>
											 <td></td>
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

	 </div>
     <script>


     </script>
