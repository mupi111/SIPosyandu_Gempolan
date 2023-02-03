          <?php if (in_groups('admin')) : ?>
            <!-- sidebar menu admin-->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                  <li><a><i class="fa fa-home"></i> Beranda <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="/dashboard"> Dashboard </a></li>
                    </ul>
                  </li>
                  <li><a href="index.html"><i class="fa fa-user"></i> Profil </a></li>
                </ul>
              </div>
              <div class="menu_section">
                <h3>Menu Data</h3>
                <ul class="nav side-menu">
                  <li><a><i class="fa fa-cogs"></i> Master Data <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="/datauser">Data User</a></li>
                      <li><a href="/databidan">Data Bidan</a></li>
                      <li><a href="/datakader">Data Kader</a></li>
                      <li><a href="/datapuskesmas">Data Puskesmas</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-folder"></i> Posyandu <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="/posyandudata">Data Posyandu</a></li>
                      <li><a href="/keluargadata">Data Keluarga</a></li>
                      <li><a href="/bumildata">Data Ibu Hamil</a></li>
                      <li><a href="/anakdata">Data Anak</a></li>
                      <li><a href="/kbdata">Data KB</a></li>
                    </ul>
                  </li>
                </ul>
              </div>
            </div>
            <?php endif; ?>
             <!-- /sidebar menu admin-->
            <?php if (in_groups('kader')) : ?>
             <!-- sidebar menu kader-->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                  <li><a><i class="fa fa-home"></i>Beranda<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?php base_url('kader') ?>">Dashboard</a></li>
                    </ul>
                  </li>
                  <li><a href="<?php base_url('kader') ?>"><i class="fa fa-user"></i>Profil</a></li>
                </ul>
              </div>
              <div class="menu_section">
                <h3>Menu Data</h3>
                <ul class="nav side-menu">
                  <li><a><i class="fa fa-cogs"></i>Master Data<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="/dataposyandu">Data Posyandu</a></li>
                      <li><a href="/datakeluarga">Data Keluarga</a></li>
                      <li><a href="/databumil">Data Ibu Hamil</a></li>
                      <li><a href="/dataanak">Data Anak</a></li>
                      <li><a href="/datakb">Data KB</a></li>
                    </ul>
                  </li>
                </ul>
              </div>
            </div>
              <?php endif; ?>
               <!-- /sidebar menu kader-->
            <!-- <?php if (in_groups('bidan')) : ?>
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                  <li><a><i class="fa fa-home"></i>Beranda<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?php base_url('bidan') ?>">Dashboard</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-cogs"></i>Master Data<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="index.html">Data Posyandu</a></li>
                      <li><a href="index.html">Data Kes Bumil</a></li>
                      <li><a href="index.html">Data Perkembangan Anak</a></li>
                    </ul>
                  </li>
                  <li><a href="<?php base_url('bidan') ?>"><i class="fa fa-user"></i>Profil</a></li>
                </ul>
              </div>
            </div>
              <?php endif; ?> -->
               <!-- /sidebar menu bidan-->  
               <?php if (in_groups('masyarakat')) : ?>
                <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                  <li><a href="<?php base_url('masyarakat') ?>">Dashboard</a></li>
                  <li><a><i class="fa fa-cogs"></i>Catatan Posyandu<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="index.html">Catatan Kes Bumil</a></li>
                      <li><a href="index.html">Catatan Kes Anak</a></li>
                      <li><a href="index.html">Catatan Kes KB</a></li>
                    </ul>
                  </li>
                  <li><a href="<?php base_url('masyarakat') ?>"><i class="fa fa-user"></i>Profil</a></li>
                </ul>
              </div>
            </div>
                <?php base_url('masyarakat') ?>
                <?php endif; ?> 