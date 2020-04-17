<?php 
	if ($this->session->userdata('status') != "login") {
		redirect(base_url('login/unlogged/'));
	}
 ?>
 <body>
		<section class="body">

			<!-- start: header -->
			<header class="header">
				<div class="logo-container">
					<a href="<?php echo base_url() ?>" class="logo">
						<img src="<?php echo base_url('assets/images/logo.png') ?>" height="35" alt="Porto Admin" />
					</a>
					<div class="visible-xs toggle-sidebar-left" data-toggle-class="sidebar-left-opened" data-target="html" data-fire-event="sidebar-left-opened">
						<i class="fa fa-bars" aria-label="Toggle sidebar"></i>
					</div>
				</div>
			
				<!-- start: search & user box -->
				<div class="header-right">
			
					<span class="separator"></span>
			
					<div id="userbox" class="userbox">
						<a href="#" data-toggle="dropdown">
							<figure class="profile-picture">
								<img src="<?php echo base_url('assets/images/admin/'.$this->session->userdata('id_user').'.jpg') ?>" class="img-circle"/>
							</figure>
							<div class="profile-info">
								<span class="name"><?php echo $this->session->userdata('name') ?></span>
								<span class="role"><?php echo "@".$this->session->userdata('username') ?></span>
							</div>
			
							<i class="fa custom-caret"></i>
						</a>
			
						<div class="dropdown-menu">
							<ul class="list-unstyled">
								<li class="divider"></li>
								<li>
									<a role="menuitem" tabindex="-1" href="<?php echo $main_site ?>" target="_blank"><i class="fa fa-globe"></i> Main Site</a>
								</li>
								<li>
									<a role="menuitem" tabindex="-1" href="<?php echo base_url('profile_settings') ?>"><i class="fa fa-user"></i> Profile Settings</a>
								</li>
								<li class="divider"></li>
								<li>
									<a role="menuitem" tabindex="-1" href="<?php echo base_url('logout') ?>"><i class="fa fa-power-off"></i> Logout</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
				<!-- end: search & user box -->
			</header>
			<!-- end: header -->

			<div class="inner-wrapper">
				<!-- start: sidebar -->
				<aside id="sidebar-left" class="sidebar-left">
				
					<div class="sidebar-header">
						<div class="sidebar-title">
							Navigation
						</div>
						<div class="sidebar-toggle hidden-xs" data-toggle-class="sidebar-left-collapsed" data-target="html" data-fire-event="sidebar-left-toggle">
							<i class="fa fa-bars" aria-label="Toggle sidebar"></i>
						</div>
					</div>
				
					<div class="nano">
						<div class="nano-content">
							<nav id="menu" class="nav-main" role="navigation">
								<ul class="nav nav-main">
									<li class="<?php echo ($title=='dashboard'?'nav-active':''); ?>">
										<a href="<?php echo base_url() ?>">
											<i class="fa fa-home" aria-hidden="true"></i>
											<span>Dashboard</span>
										</a>
									</li>
									<?php if ($this->session->userdata('admin') == 1) {?>
									<li class="<?php echo ($title=='rubric'?'nav-active':''); ?>">
										<a href="<?php echo base_url('rubric') ?>">
											<i class="fa fa-tags" aria-hidden="true"></i>
											<span>Rubrik</span>
										</a>
									</li>
									<?php } ?>
									<li class="nav-parent">
										<a>
											<i class="fa fa-newspaper-o" aria-hidden="true"></i>
											<span>Artikel</span>
										</a>
										<ul class="nav nav-children">
											<li class="<?php echo ($title=='article'?'nav-active':''); ?>">
												<a href="<?php echo base_url('article') ?>">
													<span>List Artikel</span>
												</a>
											</li>
											<li class="<?php echo ($title=='article_category'?'nav-active':''); ?>">
												<a href="<?php echo base_url('article_category') ?>">
													<span>Kategori Artikel</span>
												</a>
											</li>
										</ul>
									</li>
									<?php if ($this->session->userdata('admin') == 1) {?>
									<li class="nav-parent">
										<a>
											<i class="fa fa-calendar" aria-hidden="true"></i>
											<span>Event</span>
										</a>
										<ul class="nav nav-children">
											<li class="<?php echo ($title=='event'?'nav-active':''); ?>">
												<a href="<?php echo base_url('event') ?>">
													<span>List Event</span>
												</a>
											</li>
											<li class="<?php echo ($title=='event_category'?'nav-active':''); ?>">
												<a href="<?php echo base_url('event_category') ?>">
													<span>Kategori Event</span>
												</a>
											</li>
											<li class="<?php echo ($title=='category_sub'?'nav-active':''); ?>">
												<a href="<?php echo base_url('category_sub') ?>">
													<span>Sub-Kategori Jasa</span>
												</a>
											</li>
										</ul>
									</li>
									<li class="nav-parent">
										<a>
											<i class="fa fa-info-circle" aria-hidden="true"></i>
											<span>Tentang Kami</span>
										</a>
										<ul class="nav nav-children">
											<li class="<?php echo ($title=='contact'?'nav-active':''); ?>">
												<a href="<?php echo base_url('about/contact') ?>">
													<span>Kontak</span>
												</a>
											</li>
											<li class="<?php echo ($title=='tentang kami'?'nav-active':''); ?>">
												<a href="<?php echo base_url('about/tentang_kami') ?>">
													<span>Tentang Kami</span>
												</a>
											</li>
											<li class="<?php echo ($title=='pedoman media siber'?'nav-active':''); ?>">
												<a href="<?php echo base_url('about/pedoman_media_siber') ?>">
													<span>Pedoman Media Siber</span>
												</a>
											</li>
											<li class="<?php echo ($title=='kode etik'?'nav-active':''); ?>">
												<a href="<?php echo base_url('about/kode_etik') ?>">
													<span>Kode Etik Jurnalistik</span>
												</a>
											</li>
											<li class="<?php echo ($title=='media partner'?'nav-active':''); ?>">
												<a href="<?php echo base_url('about/media_partner') ?>">
													<span>Media Partner</span>
												</a>
											</li>
											<li class="<?php echo ($title=='pasang iklan'?'nav-active':''); ?>">
												<a href="<?php echo base_url('about/pasang_iklan') ?>">
													<span>Pasang Iklan</span>
												</a>
											</li>
										</ul>
									</li>
									<li class="<?php echo ($title=='user'?'nav-active':''); ?>">
										<a href="<?php echo base_url('user') ?>">
											<i class="fa fa-users" aria-hidden="true"></i>
											<span>User</span>
										</a>
									</li>
								<?php } ?>
									<li class="<?php echo ($title=='statistic'?'nav-active':''); ?>">
										<a href="<?php echo base_url('statistic') ?>">
											<i class="fa fa-bar-chart" aria-hidden="true"></i>
											<span>Statistik</span>
										</a>
									</li>
								</ul>
							</nav>
							<hr class="separator" />
						</div>
				
					</div>
				
				</aside>
				<!-- end: sidebar -->

				<section role="main" class="content-body">
					<header class="page-header">
						<h2><?php echo strtoupper($title) ?></h2>
					
						<div class="right-wrapper pull-right" style="margin-right: 40px;">
							<ol class="breadcrumbs">
								<li><i class="fa fa-home"></i></li>
								<li><span>Dashboard</span></li>
								<li><span><?php ucfirst($title) ?></span></li>
							</ol>
						</div>
					</header>