<div class="container">
	<div class="row top">
		<center>
			<a href="#"><img src="<?php echo base_url() ?>assets/img/ads-satu.png" class="ads"></a>
		</center>
	</div>
	<div class="row" style="margin-top: 30px">
		<!-- LEFT -->
		<div class="col-md-9 col-xs-12 pad-mob-15" style="padding-left: 0;padding-right: 30px">
			<div class="header-news">
				<p class="upper title-detail"><b><?php echo $article_res->title ?></b></p>
				<div class="main-author">
					<span class="label <?php echo 'bg-'.$rubcolor[$article_res->rubric_name] ?> category"><?php echo $article_res->rubric_name ?></span>
					<span class="label <?php echo 'bg-'.$rubcolor[$article_res->rubric_name] ?> category"><?php echo $article_res->category_name ?></span>
				</div>
				<span class="main-author">
					<span class="label bg-grey clr-black"><?php echo $article_res->full_name ?></span>
					<span class="label bg-grey clr-black"><?php echo format($article_res->date_created) ?></span>
				</span>
			</div>
			<div class="body-news">
				<div class="news">
					<?php echo str_replace("http://pojokmedia.id/", base_url(), $article_res->content)  ?>
				</div>
			</div>
			<div class="share-news">
				<span>
					<p class="hm upper clr-black">Bagikan artikel</p>
					<div class="col-md-2 col-xs-6 bg-black"></div>
				</span>
				<span class="col-md-12 col-xs-12 main-share" style="padding-left: 0">
					<div class="font-white" id="share"></div><br>
				</span>
				<span class="main-tag">
					<span class="label <?php echo 'bg-'.$rubcolor[$article_res->rubric_name] ?> category">tags</span>
					<?php foreach ($tags as $tag) { ?>
						<span class="label bg-grey clr-black"><?php echo $tag ?></span>
					<?php } ?>
				</span>
			</div>
			<div class="main">
				<span>
					<p class="hm upper clr-black">profil penulis</p>
					<div class="col-md-2 col-xs-6 bg-black"></div>
				</span>
				<div>
					<div class="box-profile col-md-12 col-xs-12 bg-grey">
						<div class="col-md-4 col-xs-12" style="padding: 0 !important">
							<center>
								<div class="img-profile">
									<img src="<?php echo base_url() ?>assets/img/user/<?php echo 'u'.$article_res->id_user ?>.jpg" class="col-md-12 col-xs-12">
								</div>
							</center>
						</div>
						<div class="col-md-8 col-xs-12 profile">
							<p class="col-md-12 col-xs-12 clr-black writer"><?php echo $article_res->full_name ?></p>
							<div class="col-md-12 col-xs-12 clr-black"><?php echo $article_res->about ?></div>
						</div>
					</div>
				</div>
			</div>
			<div class="main col-md-12 col-xs-12">
				<span class="col-md-12 col-xs-12" style="padding-left: 0">
					<p class="hm upper clr-black">artikel terkait</p>
					<div class="col-md-2 col-xs-6 bg-black"></div>
				</span>
				<?php foreach ($related_res as $rel) { ?>
					<div class="main-box-more col-md-4 col-xs-12">
						<div class="col-md-12 col-xs-12 card-more" style="background: url(<?php echo base_url() ?>assets/img/news/<?php echo $rel->image ?>);">
							<a href="<?php echo base_url('read/'.$rel->permalink) ?>" class="col-md-12 col-xs-12 bg-tp clr-white">
								<?php echo $rel->title ?>
							</a>
						</div>
					</div>
				<?php } ?>
			</div>
			<div class="main col-md-12 col-xs-12">
				<span>
					<p class="hm upper clr-black">komentar</p>
					<div class="col-md-2 col-xs-6 bg-black"></div>
				</span>
				<!-- disqus here -->
				<div id="disqus_thread"></div>
				<script>

			        /**
			        *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
			        *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/
			        var disqus_config = function () {
			        this.page.url = "<?php echo base_url('read/'.$article_res->permalink) ?>";  // Replace PAGE_URL with your page's canonical URL variable
			        this.page.identifier = "<?php echo $article_res->permalink ?>"; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
			    };
			        (function() { // DON'T EDIT BELOW THIS LINE
			        	var d = document, s = d.createElement('script');
			        	s.src = 'https://pojokmedia.disqus.com/embed.js';
			        	s.setAttribute('data-timestamp', +new Date());
			        	(d.head || d.body).appendChild(s);
			        })();
			    </script>
			</div>
		</div>
		<!-- END LEFT -->
