<?php 
function get_firstimage( $contents ){
   if( preg_match('/< *img[^>]*src *= *["\']?([^"\']*)/i', $contents, $img) ){
	  return $img[1];
   }else{
	  return base_url('public/upload/no-thumbnail.jpg');
   }
}
?>
<div class="site-main-container">
	
	<section class="latest-post-area pb-120">
		<div class="container no-padding">
			<div class="row">
				<div class="col-lg-8 post-list">
					<!-- Start latest-post Area -->
					<div class="latest-post-wrap">
						<h4 class="cat-title">Từ khóa "<?php echo $key; ?>"</h4>
						<?php 
								foreach($category as $rows_dsbv){
						?>
						<div class="single-latest-post row align-items-center">
							<div class="col-lg-5 post-left">
								<div class="feature-img relative">
									<div class="overlay overlay-bg"></div>
									<img class="img-fluid" src="<?php echo get_firstimage($rows_dsbv->noidung); ?>" alt="">
								</div>
								<ul class="tags">
									<li><a href="#"><?php echo $rows_dsbv->ten_loaitin; ?></a></li>
								</ul>
							</div>
							<div class="col-lg-7 post-right">
								<a href="<?php echo base_url(); ?><?php echo m_cut_space($rows_dsbv->tieude).'-post'.$rows_dsbv->id_tin.'.html'; ?>">
									<h4><?php echo $rows_dsbv->tieude; ?></h4>
								</a>
								<ul class="meta">
									<li><a href="#"><span class="lnr lnr-user"></span><?php echo $rows_dsbv->tacgia; ?></a></li>
									<li><a href="#"><span class="lnr lnr-calendar-full"></span><?php echo $rows_dsbv->ngaydangtin; ?></a></li>
								</ul>
								<p class="excert">
									<?php echo substr( $rows_dsbv->mota, 0, 200).'...'; ?>
								</p>
							</div>
						</div>
						<?php
							}				
							?>
					</div>
					<!-- End latest-post Area -->
				</div>
				<div class="col-lg-4">
					<div class="sidebars-area">
						<div class="single-sidebar-widget most-popular-widget">
							<h6 class="title">Xem nhiều</h6>
							<?php 
								foreach($ttxemnhieu as $rows_dsbv){
									$numbl = $this->M_tin_tuc->count_binhluan($rows_dsbv->id_tin);
								?>
							<div class="single-list flex-row d-flex">
								<div class="thumb">
									<img class="img-fluid" style="max-width: 100px" src="<?php echo get_firstimage($rows_dsbv->noidung); ?>" alt="">
								</div>
								<div class="details">
									<a href="<?php echo m_cut_space($rows_dsbv->tieude).'-post'.$rows_dsbv->id_tin.'.html'; ?>">
										<h6><?php echo $rows_dsbv->tieude; ?></h6>
									</a>
									<ul class="meta">
										<li><a href="#"><span class="lnr lnr-calendar-full"></span><?php echo $rows_dsbv->ngaydangtin; ?></a></li>
										<li><a href="#"><span class="lnr lnr-bubble"></span>
										<?php
										foreach($numbl as $rowsbl){
											echo $rowsbl->numbinhluan;
										}
										?>
										</a></li>
									</ul>
								</div>

							</div>
							<?php
							}				
							?>
						</div>
						<div class="single-sidebar-widget social-network-widget">
							<h6 class="title">Mạng xã hội</h6>
							<ul class="social-list">
								<li class="d-flex justify-content-between align-items-center fb">
									<div class="icons d-flex flex-row align-items-center">
										<i class="fa fa-facebook" aria-hidden="true"></i>
										<p>983 Lượt thích</p>
									</div>
									<a href="#">Thích trang</a>
								</li>
								<li class="d-flex justify-content-between align-items-center tw">
									<div class="icons d-flex flex-row align-items-center">
										<i class="fa fa-twitter" aria-hidden="true"></i>
										<p>983 Theo dõi</p>
									</div>
									<a href="#">Theo dõi</a>
								</li>
								<li class="d-flex justify-content-between align-items-center yt">
									<div class="icons d-flex flex-row align-items-center">
										<i class="fa fa-youtube-play" aria-hidden="true"></i>
										<p>983 Đăng kí</p>
									</div>
									<a href="#">Đăng kí</a>
								</li>
								<li class="d-flex justify-content-between align-items-center rs">
									<div class="icons d-flex flex-row align-items-center">
										<i class="fa fa-rss" aria-hidden="true"></i>
										<p>983 Đăng kí</p>
									</div>
									<a href="#">Đăng kí</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>