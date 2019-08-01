<nav class="col-md-2 d-none d-md-block bg-gradient-green sidebar">
      <div class="sidebar-sticky">
        
        <h6 class="sidebar-heading font-bold d-flex justify-content-between align-items-center px-3 mt-4 mb-3 text-muted">
          <span>Menu Utama</span>
          <a class="d-flex align-items-center text-muted" href="#">
            <!-- <i class="fa fa-square text-success"></i> -->
          </a>
        </h6>
        <ul class="nav flex-column">
        <?php if($this->session->userdata('level')==='1'):?>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url(); ?>page">
              <i class="fa fa-gg mr-1"></i>
              Dashboard <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
          <a class="nav-link" href="<?php echo base_url(); ?>page/pasien">
              <i class="fa fa-user-circle mr-1"></i>
              Data Pasien
            </a>
          </li>
          <li class="nav-item">
          <a class="nav-link" href="<?php echo base_url(); ?>page/pasien_list">
              <i class="fa fa-list mr-1"></i>
              List Panggilan
            </a>
          </li>
          <?php elseif($this->session->userdata('level')==='2'):?>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url(); ?>page/dokter">
              <i class="fa fa-gg mr-1"></i>
              Dashboard <span class="sr-only">(current)</span>
            </a>
          </li>
          
          <?php else:?>
          <?php endif;?>
        </ul>

        <h6 class="sidebar-heading font-bold d-flex justify-content-between align-items-center px-3 mt-4 mb-3 text-muted">
          <span>Menu Lainnya</span>
          <a class="d-flex align-items-center text-muted" href="#">
            <!-- <i class="fa fa-square text-success"></i> -->
          </a>
        </h6>
        <ul class="nav flex-column mb-2">
          <li class="nav-item">
            <a class="nav-link" href="#">
              <i class="fa fa-file-pdf-o mr-1"></i>
              Download laporan
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo site_url('login/logout');?>">
              <i class="fa fa-power-off mr-1"></i>
              Sign Out
            </a>
          </li>
        </ul>
      </div>
    </nav>