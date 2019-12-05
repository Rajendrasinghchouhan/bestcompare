<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Admin Template
 */
?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" type="image/x-icon" href="/favicon.ico?v=<?php echo $this->settings->site_version; ?>">
	<link rel="icon" type="image/x-icon" href="/favicon.ico?v=<?php echo $this->settings->site_version; ?>">
    <title><?php echo $page_title; ?> - <?php echo $this->settings->site_name; ?></title>

    <?php // CSS files ?>
    <?php if (isset($css_files) && is_array($css_files)) : ?>
        <?php foreach ($css_files as $css) : ?>
            <?php if ( ! is_null($css)) : ?>
                <?php $separator = (strstr($css, '?')) ? '&' : '?'; ?>
                <link rel="stylesheet" href="<?php echo $css; ?><?php echo $separator; ?>v=<?php echo $this->settings->site_version; ?>"><?php echo "\n"; ?>
            <?php endif; ?>
        <?php endforeach; ?>
    <?php endif; ?>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
    <div id="app">
    <div class="main-wrapper main-wrapper-1">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar">
        <form class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
            <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
          </ul>
          <!---<div class="search-element">
            <input class="form-control" type="search" placeholder="Search" aria-label="Search" data-width="250">
            <button class="btn" type="submit"><i class="fas fa-search"></i></button>
            <div class="search-backdrop"></div>
          </div> -->
        </form>
        <ul class="navbar-nav navbar-right">
          <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown" class="nav-link nav-link-lg message-toggle beep"><i class="far fa-envelope"></i></a>
          </li>
          <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown" class="nav-link notification-toggle nav-link-lg beep"><i class="far fa-bell"></i></a>
          </li>
          <li class="dropdown dropdown-list-toggle">
              <span>
                <button id="session-language" type="is_null" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-language"></i>
                    <span class="caret"></span>
                </button>
                <ul id="session-language-dropdown" class="dropdown-menu" role="menu" aria-labelledby="session-language">
                    <?php foreach ($this->languages as $key=>$name) : ?>
                        <li>
                            <a href="#" rel="<?php echo $key; ?>">
                                <?php if ($key == $this->session->language) : ?>
                                    <i class="fa fa-check selected-session-language"></i>
                                <?php endif; ?>
                                <?php echo $name; ?>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </span>
          </li>
          <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
            <img alt="" src="<?php echo base_url("assets/images/avatar-1.png");?>" class="rounded-circle mr-1">
            <div class="d-sm-none d-lg-inline-block">Hi, Ujang Maman</div></a>
            <div class="dropdown-menu dropdown-menu-right">
              <a href="<?php echo base_url(); ?>dist/features_profile" class="dropdown-item has-icon">
                <i class="far fa-user"></i> Profile
              </a>
              <a href="<?php echo base_url(); ?>dist/features_activities" class="dropdown-item has-icon">
                <i class="fas fa-bolt"></i> Activities
              </a>
              <a href="<?php echo base_url(); ?>dist/features_settings" class="dropdown-item has-icon">
                <i class="fas fa-cog"></i> Settings
              </a>
              <div class="dropdown-divider"></div>
              <a href="<?php echo base_url('logout'); ?>" class="dropdown-item has-icon"><i class="fas fa-sign-out-alt"></i><?php echo lang('core button logout'); ?>
                
              </a>
            </div>
          </li>
        </ul>
      </nav>
    <?php // Fixed navbar ?>
    <div class="main-sidebar sidebar-style-2" tabindex="1" style="overflow: hidden;outline: none;">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="<?php echo base_url(); ?>dist/index">COMPARISION</a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="<?php echo base_url(); ?>dist/index">CMP</a>
          </div>
          <ul class="sidebar-menu">
            <li class="dropdown <?php echo $this->uri->segment(2) == '' || $this->uri->segment(2) == 'index' || $this->uri->segment(2) == 'index_0' ? 'active' : ''; ?>">
              <a href="<?php echo base_url('admin/dashboard'); ?>" class="nav-link"><i class="fas fa-fire"></i><span>Dashboard</span></a>
            </li>

            <li class="dropdown<?php echo (strstr(uri_string(), 'admin/users')) ? ' active' : ''; ?>">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i><?php echo lang('admin button users'); ?></a>
                <ul class="dropdown-menu">
                    <li class="<?php echo (uri_string() == 'admin/users') ? 'active' : ''; ?>"><a href="<?php echo base_url('/admin/users'); ?>" class="nav-link"><?php echo lang('admin button users_list'); ?></a></li>
                    <li class="<?php echo (uri_string() == 'admin/users/add') ? 'active' : ''; ?>"><a href="<?php echo base_url('/admin/users/add'); ?>" class="nav-link"><?php echo lang('admin button users_add'); ?></a></li>
                </ul>
            </li>
            <li class="<?php echo (uri_string() == 'admin/contact') ? 'active' : ''; ?>"><a href="<?php echo base_url('/admin/contact'); ?>" class="nav-link"><i class="fas fa-envelope"></i><?php echo lang('admin button messages'); ?></a></li>
            <li class="<?php echo (uri_string() == 'admin/settings') ? 'active' : ''; ?>"><a href="<?php echo base_url('/admin/settings'); ?>" class="nav-link"><i class="fas fa-cog"></i><?php echo lang('admin button settings'); ?></a></li>
            <li class="dropdown<?php echo (strstr(uri_string(), 'admin/category')) ? ' active' : ''; ?>">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fa fa-list-alt" aria-hidden="true"></i><?php echo lang('admin button category'); ?></a>
                <ul class="dropdown-menu">
                    <li class="<?php echo (uri_string() == 'admin/category') ? 'active' : ''; ?>"><a href="<?php echo base_url('admin/category'); ?>" class="nav-link"><?php echo lang('admin button category_list'); ?></a></li>
                    <li class="<?php echo (uri_string() == 'admin/category/form') ? 'active' : ''; ?>"><a href="<?php echo base_url('admin/category/form'); ?>" class="nav-link"><?php echo lang('admin button category_add'); ?></a></li>
                </ul>
            </li>
          </ul>
        </aside>
      </div>
    <?php // Main body ?>
    <div class="main-content">
        <section class="section">  
            <?php // Page title ?>
            <div class="section-header">
                <h1><?php echo $page_header; ?></h1>
            </div>
            <div class="section-body"></div>
            <?php // System messages ?>
            <?php if ($this->session->flashdata('message')) : ?>
                <div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <?php echo $this->session->flashdata('message'); ?>
                </div>
            <?php elseif ($this->session->flashdata('error')) : ?>
                <div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <?php echo $this->session->flashdata('error'); ?>
                </div>
            <?php elseif (validation_errors()) : ?>
                <div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <?php echo validation_errors(); ?>
                </div>
            <?php elseif ($this->error) : ?>
                <div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <?php echo $this->error; ?>
                </div>
            <?php endif; ?>

            <?php // Main content ?>
            <?php echo $content; ?>
        </section>
    </div>

    <?php // Footer ?>
    <footer class="main-footer">
        <div class="footer-left">
            <p class="text-muted">
                <?php echo lang('core text page_rendered'); ?>
                | PHP v<?php echo phpversion(); ?>
                | MySQL v<?php echo mysqli_get_client_version(); ?>
                | CodeIgniter v<?php echo CI_VERSION; ?>
                | <?php echo $this->settings->site_name; ?> v<?php echo $this->settings->site_version; ?>
                | <a href="http://jasonbaier.github.io/ci3-fire-starter/" target="_blank">Github.com</a>
            </p>
        </div>
        <div class="footer-right">
          
        </div>
    </footer>

    <?php // Javascript files ?>
    <?php if (isset($js_files) && is_array($js_files)) : ?>
        <?php foreach ($js_files as $js) : ?>
            <?php if ( ! is_null($js)) : ?>
                <?php $separator = (strstr($js, '?')) ? '&' : '?'; ?>
                <?php echo "\n"; ?><script type="text/javascript" src="<?php echo $js; ?><?php echo $separator; ?>v=<?php echo $this->settings->site_version; ?>"></script><?php echo "\n"; ?>
            <?php endif; ?>
        <?php endforeach; ?>
    <?php endif; ?>
    <?php if (isset($js_files_i18n) && is_array($js_files_i18n)) : ?>
        <?php foreach ($js_files_i18n as $js) : ?>
            <?php if ( ! is_null($js)) : ?>
                <?php echo "\n"; ?><script type="text/javascript"><?php echo "\n" . $js . "\n"; ?></script><?php echo "\n"; ?>
            <?php endif; ?>
        <?php endforeach; ?>
    <?php endif; ?>
    </div>
    </div>
</body>
</html>
