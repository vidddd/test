	<main>
		<section class="header-video" id="js-area-home">
			<span class="section-position" id="section-home"></span>
			<div class="video-container">
				<video playsinline autoplay muted loop id="js-video-1">
					<source src="<?php echo base_url('resources/web/video/video.webm') ?>" type="video/webm">
					<source src="<?php echo base_url('resources/web/video/video.mp4') ?>" type="video/mp4">
				</video>
				<video playsinline autoplay muted loop id="js-video-2">
					<!-- <source src="<?php echo base_url('resources/web/video/video.webm') ?>" type="video/webm"> -->
					<source src="<?php echo base_url('resources/web/video/video-mobile.mp4') ?>" type="video/mp4">
				</video>
				<div class="layer"></div>
			</div>
			<a href="https://www.youtube.com/watch?v=HexWcNhLQ94" target="_blank" class="full-version" onclick="gtag('event', 'Full_Version')">
				<?php echo $site->translations['full version'] ?>
			</a>
			<span class="play" id="js-play-video-header"></span>
			<div class="scroll">
				<span class="icon"></span>
				<span class="text"><?php echo $site->translations['SCROLL'] ?></span>
			</div>
		</section>
		<section class="section russia" id="js-russia">
			<h1 data--100-bottom="opacity:0;top:-20%;" data-center-bottom="opacity:1;top:0%;" style="position: relative;" id="h1-russia"><?php echo $site->translations['#BRINGBACKMORE'] ?></h1>
			<div class="title" id="title-russia" style="position: relative;" data-bottom="opacity:0;top:20%;" data-center-center="opacity:1;top:0%;">
				<h3><?php echo $site->translations['WIN A TRIP TO RUSSIA'] ?></h3>
				<h3 class="mobile"><?php echo $site->translations['WIN A TRIP TO RUSSIA'] ?></h3>
			</div>
			<div class="circle circle_1" id="circle_1">
				<img class="ball ball_1" id="ball_1" src="<?php echo base_url('resources/web/images/ball_1.png') ?>"/>
			</div>
			 <div class="circle circle_2" id="circle_2">
				<img class="ball ball_2" id="ball_2" src="<?php echo base_url('resources/web/images/ball_1.png') ?>" />
			</div>

			<div class="circle circle_3" id="circle_3">
				<img class="ball ball_3" id="ball_3" src="<?php echo base_url('resources/web/images/ball_1.png') ?>" />
			</div>

			<div class="circle circle_4" id="circle_4">
				<img class="ball ball_4" id="ball_4" src="<?php echo base_url('resources/web/images/ball_1.png') ?>" />
			</div>
			<img class="catedral" data-1400-bottom="bottom:-100%;" data-100-bottom="bottom:0;" src="<?php echo base_url('resources/web/images/catedral.png') ?>" />
		</section>
		<section class="section info" id="js-area-participation">
			<span class="section-position" id="section-participation"></span>
			<div class="container-info">
				<div class="right">
					<h3><?php echo $site->translations['RONALDO´S CURIO BAG'];?></h3>
					<p><?php echo $site->translations['After traveling all around the world I collected hundreds of memories. Now I propose you the challenge of guessing what I have brought this time in my Curio bag.'];?>
					</p>
					<span class="hashtag"><?php echo $site->translations['#AMERICANTOURISTER'];?></span>
					<span class="hashtag"><?php echo $site->translations['#BRINGBACKMORE'];?></span>
				</div>
				<div class="left">
					<div class="container-gif">
						<!-- <img src="<?php echo base_url('resources/web/images/gif_cr1.gif') ?>" alt=""> -->
						<video id="videoloop" src="<?php echo base_url('resources/web/video/bucle_home.mp4') ?>" onplaying="disableVideoControls();"  autoplay muted loop playsinline></video>

					</div>
				</div>
			</div>
		</section>
		<section class="section feed">
			<div class="feed-container">
				<div class="feed-header">
					<span class="icon-instagram"></span>
					<span class="icon-facebook"></span>
					<h1 class="title"><?php echo $site->translations['GUESS WHAT IS IN MY AMERICAN TOURISTER'];?></h1>

					<div class="info-prizes">
						<span class="close" id="close-info-prizes"></span>
						<div class="init-prize">
							<?php echo $site->translations['Win this incredibles prizes with'];?><br/> <span><?php echo $site->translations['#BringBackMore'];?></span> <br>
						</div>
						<div class="sub-text">
							<?php echo $site->translations['Join the challenge and send us your most original proposals and '];?> <br>
							<?php echo $site->translations['trust your creativity to catch the best prizes!'];?>
						</div>
						<div class="overflow-inner">
							<div class="diagonal"></div>
							<div class="inner">
								<div class="list-prizes">
									<div class="prize">
										<div class="week"><?php echo $site->translations['1st February - 8th February'];?></div>

										<div class="text-prize">
											<p><?php echo $site->translations['A round trip package for Russia with a surprise gift.'];?></p>
											<p><?php echo $site->translations['Two American Tourister suitcases signed by Cristiano Ronaldo.'];?></p>
											<p><?php echo $site->translations['Two American Tourister Curio Bags.'];?></p>
											<p><?php echo $site->translations['Five American Tourister Backpacks.'];?></p>
											<p class="info"><?php echo $site->translations['10 winners each week.'];?></p>
										</div>
									</div>
								</div>
								<div class="list-prizes">
									<div class="prize">
										<div class="week"><?php echo $site->translations['8th March - 15th March'];?></div>
										<div class="text-prize">
											<p><?php echo $site->translations['Two round trip package for Russia with a surprise gift.'];?></p>
											<p><?php echo $site->translations['Two American Tourister suitcases signed by Cristiano Ronaldo.'];?></p>
											<p><?php echo $site->translations['Two American Tourister Curio Bags.'];?></p>
											<p><?php echo $site->translations['Four American Tourister Backpacks.'];?></p>
											<p class="info"><?php echo $site->translations['10 winners each week.'];?></p>
										</div>
									</div>
								</div>
							</div>
						</div>




					</div>
					<p>
						<?php echo $site->translations['How to participate'];?>:
					</p>
					<ul>
						<li><?php echo $site->translations['1. Log in with your Instagram/Facebook account.'];?></li>
						<li><?php echo $site->translations['2. Take a picture of your idea of what Cristiano is carrying on his suitcase.'];?></li>
						<li><?php echo $site->translations['3. FACEBOOK: Upload your photo to Facebook using the hashtag #BringBackMore and tag the @AmericanTourister fan page. Set your post as public.'];?><br><?php echo $site->translations['INSTAGRAM: Upload your photo to Instagram using both hashtags #BringBackMore and @AmericanTourister. Set your profile as public.'];?></li>
						<li><?php echo $site->translations['4. Stay tuned to our Instagram and Facebook channels in case you are the winner.'];?></li>
					</ul>
					<div class="block-prizes">
						<a href="#" class="btn-prizes" onclick="gtag('event', 'Participacion_Prizes');"><?php echo $site->translations['PRIZES'];?></a>
						<?php /*if(!$this->session->userdata('user_ig')){?>
                            <a href="<?php echo base_url('actions/login-ig');?>" class="btn-prizes">LOGIN INSTAGRAM</a>
                        <?php } else {?>
                            <a href="http://www.instagram.com" class="btn-prizes">POST WITH #AmericanTourister #Bringbackmore</a>
                        <?php }*/?>
					</div>
				</div>
				<div class="feed-pagination">
					<span class="page" id="html_cur_page">1</span>/<span class="total-pages"><?php echo $total;?></span>
				</div>
				<div class="feed-gallery">
					<div class="feed-gallery-wrapper">
						<div class="selected-image-wrapper">
							<div class="selected-image" style="background-image: url('<?php echo $social_networks[0]->image;?>');">
								<p class="discription" id="main-text">
									<?php echo substr($social_networks[0]->text,0,300);?>
								</p>
							</div>
						</div>
						<input type="hidden" id="csrf_hash" value="<?php echo $csrf_hash; ?>">
						<input type="hidden" id="csrf_name" value="<?php echo $csrf_name; ?>">
						<input type="hidden" id="page-gallery" value="1">
						<input type="hidden" id="total_pages" value="<?php echo $total;?>">
						<div class="gallery-images-wrapper">
							<img src="<?php echo base_url('resources/web/images/loading.gif') ?>" style="display: none;" alt="" id="loading-social">
							<?php
							if(count($social_networks) > 0){
								foreach ($social_networks as $social) {
								?>
								<a href="<?php echo $social->image; ?>" class="image-gallery" data-id="<?php echo $social->id; ?>">
									<div class="wrap-image" style="background-image: url('<?php echo $social->image; ?>');"></div>
								</a>
								<?php
								}
							}

							?>
							<div class="arrows">
								<span class="arrow arrow-left" onclick="gtag('event', 'Participation_Nav_Left');"></span>
								<span class="arrow arrow-right" onclick="gtag('event', 'Participation_Nav_right');"></span>
							</div>
						</div>
					</div>
				</div>
				<div class="feed-pager">
					<span class="feed-pager-item"></span>
					<span class="feed-pager-item active"></span>
					<span class="feed-pager-item"></span>
					<span class="feed-pager-item"></span>
					<span class="feed-pager-item last"></span>
				</div>
				<div class="participations">
					<div class="btn-particioations">
						<button class="btn btn-instagram" data-link="https://www.instagram.com/" onclick="gtag('event', 'Participation_Instagram');"><?php echo $site->translations['PARTICIPATE'];?> <span class="ico-insta"></span>
							<div class="info-instagram">
								<span class="close" id="close-info-insta"></span>
								<div class="header">
									<p class="text"><?php echo $site->translations['How to participate in'];?></p>
									 <span>Instagram</span>
								</div>
								<!-- <div class="content-info">
									<ul>
										<li><?php echo $site->translations['1. Go to your Instagram mobile/tablet app.'];?></li>
										<li><?php echo $site->translations['2. Take a picture with your idea of what Cristiano is carrying in his suitcase.'];?></li>
										<li><?php echo $site->translations['3. Upload it to Instagram using the hashtags #AmericanTourister #BringBackMore'];?></li>
										<li><?php echo $site->translations['4. Stay tuned to our social media channels in case you are the winner.'];?></li>
									</ul>
								</div> -->
							</div>
						</button>
						<button class="btn btn-facebook" data-link="https://www.facebook.com/" onclick="gtag('event', 'Participation_Facebook');" ><?php echo $site->translations['PARTICIPATE'];?> <span class="ico-fb"></span></button>
					</div>
					<div class="total">
						<p><span class="count"><?php echo $items_totales;?></span><span class="text-participation"><?php echo $site->translations['PARTICIPATIONS'];?></span></p>
					</div>
				</div>
				<?php
				if(count($winners) > 0){
				?>
				<div class="winners">
					<h4 class="title">
						<?php echo $site->translations['WINNERS OF THE WEEK'];?>
					</h4>
					<div class="winners-wrap">
						<?php
						foreach ($winners as $winner) {
						?>
						<div class="single-winner-wrap">
							<a href="<?php echo $winner->image;?>" class="winner-image" style="background-image: url('<?php echo $winner->image;?>');">
								<p class="discription" >
									<?php echo substr($winner->text,0,50);?>
								</p>
								<div class="likes" ><?php echo $winner->fav;?> likes</div>
								<p class="winner-name"><?php echo $winner->user;?></p>
							</a>
						</div>
						<?php
						}
						?>
						<?php
						foreach ($winners_fb as $winner) {
						?>
						<div class="single-winner-wrap">
							<a href="<?php echo base_url('uploads/facebook/').$winner->image;?>" class="winner-image" style="background-image: url('<?php echo base_url('uploads/facebook/').$winner->image;?>');">
								<p class="discription" >
									<?php echo substr($winner->text,0,50);?>
								</p>
								<div class="likes" ><?php echo $winner->likes;?> likes</div>
								<p class="winner-name"><?php echo $winner->user;?></p>
							</a>
						</div>
						<?php
						}
						?>
					</div>
				</div>
				<?php
				}
				?>

			</div>
		</section>
		<section class="section shop" id="js-area-suitcases">
			<span class="section-position" id="section-suitcases"></span>
			<div class="shop-container">
				<!-- <div class="case-img" data-350p="transform:rotate(0deg);" data-450p="transform:rotate(200deg);">
					<img id="bag2" src="<?php echo base_url('images/bag_1.png') ?>" ></img>
				</div> -->
				 <!-- <div class="case-img" data-bottom-top="transform:rotate(0deg);" data-top="transform:rotate(180deg);">
					<img id="bag2" src="<?php echo base_url('resources/web/images/bag_1.png') ?>" ></img>
				</div> -->

				<!--<div class="case-img case-img-1 visible" id="case-img-1">
					<img id="bag2" src="<?php echo base_url('resources/web/images/bag_pinkv3.png') ?>" ></img>
				</div>
				<div class="case-img case-img-2"  data--40p-bottom="opacity: 0;" data--41p-bottom="opacity: 1">
					<img id="bag2" src="<?php echo base_url('resources/web/images/bag_bluev3.png') ?>" ></img>
				</div>
				<div class="case-img case-img-3"  data--80p-bottom="opacity: 0;" data--81p-bottom="opacity: 1;">
					<img id="bag2" src="<?php echo base_url('resources/web/images/bag_yellowv3.png') ?>" ></img>
				</div>-->
				<div class="case-img case-img-1 visible" id="case-img-1">
					<img id="bag2" src="<?php echo base_url('resources/web/images/bag_pinkv3.png') ?>" ></img>
				</div>
				<div class="case-img case-img-2" >
					<img id="bag2" src="<?php echo base_url('resources/web/images/bag_bluev3.png') ?>" ></img>
				</div>
				<div class="case-img case-img-3" >
					<img id="bag2" src="<?php echo base_url('resources/web/images/bag_yellowv3.png') ?>" ></img>
				</div>
				<h1 class="title">
					<?php echo $site->translations['CURIO'];?>
				</h1>
				<p>
					<?php echo $site->translations['Discover our Curio line of bags and the different colors'];?><br class="no-thai"> <?php echo $site->translations['and features. Choose your American Tourister.'];?>
				</p>
				<a href="<?php echo $site->link_shop; ?>" onclick="gtag('event', 'Shop_Online')"><?php echo $site->translations['SHOP ONLINE'];?></a>
			</div>
		</section>
		<section class="section promotion">

			<a class="link-banner" target="_blank" href="<?php echo $site->link_banner; ?>" onclick="gtag('event', 'American_Tourister')">
				<?php
				if($site->banner !== ''){
				?>
				<img src="<?php echo base_url('uploads/banners/'.$site->banner) ?>" class="img-promo-desktop">
				<?php
				}
				?>
				<?php
				if($site->banner_mobile !== ''){
				?>
				<img src="<?php echo base_url('uploads/banners/'.$site->banner_mobile) ?>" class="img-promo-mobile">
				<?php
				}
				?>

			</a>

		</section>
		<section class="section ronaldo-feeds" id="js-area-cr7">
			<span class="section-position" id="section-cr7"></span>
			<div class="feeds-container">
				<div class="row">
					<h1 class="title">
						<?php echo $site->translations['@CRISTIANORONALDO WITH AMERICAN TOURISTER'];?>
					</h1>

					<div class="feeds-wrap">
						<?php foreach ($feeds as $feed) {  ?>
						<div class="feed-container">
							<div class="feed-content">
								<?php echo $feed->iframe; ?>
							</div>
						</div>
						<?php }

						 ?>
					</div>
				</div>
			</div>
		</section>
		<section class="section subscription" id="js-area-newsletter">
			<span class="section-position" id="section-newsletter"></span>
			<div class="subscription-container">
				<div class="row">
					<div class="right">
						<div class="inner">
							<h4><?php echo $site->translations['BE PART OF THIS JOURNEY!'];?></h4>
							<p><?php echo $site->translations['Bring back more news of American Tourister and Cristiano Ronaldo.'];?></p>
							<!-- <form  method="post" action="<?php echo base_url('addSubscription') ?>" id="form-subscription" novalidate> -->
								<div class="response"><?php echo $site->translations['Your subscription has been successfully registered.'];?></div>
								<?php
								$attributes = array('method' => 'post', 'id' => 'form-subscription', 'novalidate' => TRUE);
								echo form_open('actions/addSubscription',$attributes);
								?>
								<input type="hidden" name="site" id="site-form" value="<?php echo $site->id; ?>">
								<div id="wrap-email-subscription">
									<input type="email" name="email" id="email-subscription" placeholder="<?php echo $site->translations['WRITE YOUR EMAIL HERE'];?>">
									<div class="error-mail">
										<?php echo $site->translations['Please provide valid e-mail address (i.e: name@domain.com)'];?>
									</div>
									<div class="error-exist">
										<?php echo $site->translations['This email is already registered!'];?>
									</div>
								</div>
								<div id="wrap-check-condition">
									<input type="checkbox" name="check-condition" id="check-condition" value="">
									<label for="check-condition">
										<?php echo $site->translations['I agree to receive news from American Tourister'];?>
									</label>
									<div class="error-check-condition">

									</div>
								</div>
								<button type="submit" onclick="gtag('event', 'Subscribe')"><?php echo $site->translations['SUBSCRIBE'];?></button>
							</form>
						</div>
					</div>
					<div class="left">
						<div class="wrap-image">
							<img src="<?php echo base_url('resources/web/images/cristiano_subscription.png') ?>" alt="">
							<div class="text" id="wrap-txt-subscription">
								<span id="txt-subscription"><?php echo $site->translations['SUBSCRIBE'];?></span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
	</main>
	<?php
	if($section != false){
	?>
	<input type="hidden" value="<?php echo $section;?>" id="hasSection" />
	<?php
	}
	?>
