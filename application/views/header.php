<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>American Tourister</title>

	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, shrink-to-fit=no" />
	<!-- <link href="<?php echo base_url('images/hpi-favicon.ico');?>" type="image/ico" rel="shortcut icon"> -->
	<link href="https://fonts.googleapis.com/css?family=PT+Sans:400,700" rel="stylesheet">
	<link rel="stylesheet" href="<?php echo base_url('resources/web/css/font-awesome.min.css');?>">
	<link rel="stylesheet" href="<?php echo base_url('resources/web/css/magnific-popup.css');?>">
	<link rel="stylesheet" href="<?php echo base_url('resources/web/css/style.css');?>">
	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-111431639-1"></script>
	<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());

		gtag('config', 'UA-111431639-1');
	</script>
	<?php
	if($lang->font != '' && $lang->font_id != 1){
	?>
	<style>
		@import url('<?php echo $lang->googlefonts;?>');
		*{
			font-family: <?php echo $lang->fontname;?>!important;
		}
	</style>
	<?php
	}
	?>



</head>
<body class="<?php echo ($lang->rtl == 1)?'rtl':'';?> <?php echo (isset($lang->short))?$lang->short:'';?>">
	<div id="video-full-version" class="mfp-hide">
		<video preload="auto">
			<source src="<?php echo base_url('resources/web/video/video-full.mp4') ?>" type="video/mp4">
		</video>
	</div>
	<input type="hidden" value="<?php echo base_url()?>" id="base_url" />
	<?php
	if($semantic_segment == 2){
	?>
	<input type="hidden" value="<?php echo base_url($this->uri->segment(1))?>" id="base_nosemantic" />
	<?php
	}
	?>
	<?php
	if($semantic_segment == 3){
	?>
	<input type="hidden" value="<?php echo base_url($this->uri->segment(1)."/".$this->uri->segment(2))?>" id="base_nosemantic" />
	<?php
	}
	?>

	<header>
		<div class="header-container">
			<a href="http://www.americantourister.com" target="_blank" class="logo" onclick="gtag('event', 'Menu_American_Tourister')">
				<img src="<?php echo base_url('resources/web/images/logo.png') ?>">
			</a>
			<div class="social-link-header">
				<ul>
					<li><a href="<?php echo $site->rrss_ig;?>" target="_blank" onclick="gtag('event', 'Menu_Instagram')" ><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
					<li><a href="<?php echo $site->rrss_fb;?>" target="_blank" onclick="gtag('event', 'Menu_Facebook')" ><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
				</ul>
			</div>
		</div>
	</header>
	<aside>
		<div class="aside-container">
			<div class="languages-container">
				<div class="languages-content">
					<span class="country">
						<img src="<?php echo base_url('uploads/flags/'.$site->flag) ?>">
						<span class="country-name"><?php echo $site->short;?></span>
					</span>
					<?php
					if(count($site->languages) > 1){
					?>
					<div class="languages-selector">
						<ul>
							<?php
							foreach ($site->languages as $lang) {
								$link=base_url($this->uri->segment(1));
								if($site->lang != $lang->id){
									$link=base_url($this->uri->segment(1)."/".$lang->short);
								}
							?>
								<li>
									<a href="<?php echo $link;?>" <?php echo ($lang->id == $current_lang)?'class="active" onclick="gtag("event", "Language_sa_ar");"
':' onclick="gtag("event", "Language_sa_es");"';?>><?php echo $lang->short;?></a>
								</li>
							<?php
							}
							?>

						</ul>
					</div>
					<?php
					}
					?>

				</div>
			</div>
			<div class="pager-container" id="aside-pager">
				<ul>
					<li>
						<a href="#js-area-home" class="pager-item active" onclick="gtag('event', 'Leftnav_Home');">
						</a>
						<div><span><?php echo $site->translations['HOME'] ?></span></div>
					</li>
					<li>
						<a href="#js-area-participation" class="pager-item" onclick="gtag('event', 'Leftnav_Participacion');">
						</a>
						<div><span><?php echo $site->translations['PARTICIPATION'] ?></span></div>
					</li>
					<li>
						<a href="#js-area-suitcases" class="pager-item" onclick="gtag('event', 'Leftnav_Suitcases');">
						</a>
						<div><span><?php echo $site->translations['CURIO'] ?></span></div>
					</li>
					<li>
						<a href="#js-area-cr7" class="pager-item" onclick="gtag('event', 'Leftnav_CR7');">
						</a>
						<div><span><?php echo $site->translations['CRISTIANO RONALDO'] ?></span></div>
					</li>
					<li>
						<a href="#js-area-newsletter" class="pager-item" onclick="gtag('event', 'Leftnav_Newsletter');">
						</a>
						<div><span><?php echo $site->translations['SUBSCRIBE'] ?></span></div>
					</li>
				</ul>
			</div>
		</div>

	</aside>
	<div class="container-bag">
		<div class="content-bag">
			<img id="bag" src="<?php echo base_url('resources/web/images/bag.png') ?>">
		</div>
	</div>
	<!-- <div id="skrollr-body"> -->
