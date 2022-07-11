   <!--**********************************
            Sidebar start
        ***********************************-->
   <div class="deznav">
   	<div class="deznav-scroll">
   		<ul class="metismenu" id="menu">
   			<?php if ($this->session->userdata('role') == 'admin'): ?>
   			<li><a class="" href="<?=base_url('Admin')?>">
   					<i class="flaticon-381-networking"></i>
   					<span class="nav-text">Dashboard</span>
   				</a>
   			</li>
   			<li><a class="" href="<?=base_url('admin/pegawai')?>">
   					<i class="flaticon-381-user"></i>
   					<span class="nav-text">Pegawai</span>
   				</a>
   			</li>
   			<li><a class="" href="<?=base_url('admin/jabatan')?>">
   					<i class="flaticon-381-book"></i>
   					<span class="nav-text">Jabatan</span>
   				</a>
   			</li>
   			<?php endif;?>
   		</ul>

   	</div>
   </div>
   <!--**********************************
            Sidebar end
        ***********************************-->
