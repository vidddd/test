	<footer>
		<span class="section-position" id="section-termsandconditions"></span>
		<div class="footer-container">
			<div class="left">
				<ul>
					<li><a href="<?php echo $site->rrss_ig;?>" target="_blank" onclick="gtag('event', 'Footer_Instagram')"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
					<li><a href="<?php echo $site->rrss_fb;?>" target="_blank" onclick="gtag('event', 'Footer_Facebook')"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
				</ul>
			</div>
			<div class="right">

				<div class="logo">
					<a href="http://www.americantourister.com" target="_blank" onclick="gtag('event', 'Footer_American_Tourister')"><img src="<?php echo base_url('resources/web/images/logo.png') ?>"></a>
				</div>
			</div>
			<div class="footer-menu">
				<ul>
					<li><a href="http://bringbackmore.americantourister.com/test/TOU_BringBackMore.pdf" target="_blank" onclick="gtag('event', 'Footer_Terms')"><?php echo $site->translations['TERMS OF USE'];?></a></li>
					<li><a href="https://www.americantourister.co.uk/privacy-and-security.html" target="_blank" onclick="gtag('event', 'Footer_Privacy')"><?php echo $site->translations['PRIVACY POLICY'];?></a></li>
					<li><a href="https://www.americantourister.co.uk/cookies-policy.html" target="_blank" onclick="gtag('event', 'Footer_Cookies')"><?php echo $site->translations['COOKIES POLICY'];?></a></li>
				</ul>
				<p>Copyright ©2018 American Tourister</p>
			</div>
		</div>
	</footer>
	<div class="cookies">
		<div class="inner">
			<div class="left">
				<h3><?php echo $site->translations['USE OF COOKIES'];?></h3>
				<p><?php echo $site->translations['We use our own and third-party cookies to improve our services, to obtain statistical data on user navigation. If you go on surfing, we will consider you accepting its use. For more information you can consult our Cookies Policy.'];?></p>
			</div>
			<div class="right">
				<button><?php echo $site->translations['YES, I AGREE'];?></button>
				<p><?php echo $site->translations['Learn more about'];?> <a href="https://www.americantourister.co.uk/cookies-policy.html"><?php echo $site->translations['cookies policy'];?></a></p>
			</div>
		</div>

	</div>
	<!-- </div> -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.touchswipe/1.6.18/jquery.touchSwipe.min.js"></script>
	<script src="<?php echo base_url('resources/web/js/jquery.waypoints.min.js');?>"></script>
	<script src="<?php echo base_url('resources/web/js/skrollr.min.js');?>"></script>
	<script src="<?php echo base_url('resources/web/js/jquery.magnific-popup.min.js');?>"></script>
	<script src="<?php echo base_url('resources/web/js/iphone-inline-video.min.js');?>"></script>

	<script src="<?php echo base_url('resources/web/js/functions.js');?>"></script>

</body>
</html>
