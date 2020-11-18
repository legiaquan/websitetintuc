<?php 
function get_firstimage( $contents ){
   if( preg_match('/< *img[^>]*src *= *["\']?([^"\']*)/i', $contents, $img) ){
	  return $img[1];
   }else{
	  return base_url('public/upload/no-thumbnail.jpg');
   }
}
?>
<style type="text/css">
img {
  width: 100%;
  max-width: 700px;
  height: auto;
}
</style>
<div class="site-main-container">
			<!-- Start top-post Area -->
			
	<section class="top-post-area pt-10">
		<div class="container no-padding">
			<div class="row">
				<div class="col-lg-12">
					<div class="hero-nav-area">
						<?php
						foreach($baiviet as $rows){
							?>
							<p class="text-white link-nav"><a href="<?php echo base_url(); ?>">Trang chủ </a>  <span class="lnr lnr-arrow-right"></span><a href="<?php echo base_url(); ?>loai-tin/<?php echo $rows->id_loaitin; ?>"><?php echo $rows->ten_loaitin; ?></a><span class="lnr lnr-arrow-right"></span><a href=""><?php echo $rows->tieude; ?></a></p>
							<?php

							}
							?>
					</div>
				</div>
			</div>
		</div>
	</section>
			<!-- End top-post Area -->
			<!-- Start latest-post Area -->
			<section class="latest-post-area pb-120">
				<div class="container no-padding">
					<div class="row">
						<div class="col-lg-8 post-list">
							<!-- Start single-post Area -->
							<div class="single-post-wrap">
								<?php
								foreach($baiviet as $rows){
									$numbl = $this->M_tin_tuc->count_binhluan($rows->id_tin);
									?>
									<div class="content-wrap">
										<ul class="tags">
											<li><a href="#"><?php echo $rows->ten_loaitin; ?></a></li>
										</ul>
										<a href="#">
											<h3><?php echo $rows->tieude; ?></h3>
										</a>
										<ul class="meta pb-20">
											<li><a href="#"><span class="lnr lnr-user"></span><?php echo $rows->tacgia; ?></a></li>
											<li><a href="#"><span class="lnr lnr-calendar-full"></span><?php echo $rows->ngaydangtin; ?></a></li>
											<li><a href="#"><span class="lnr lnr-bubble"></span>
												<?php
												foreach($numbl as $rowsbl){
													echo $rowsbl->numbinhluan;
												}
												?>
												</a></li>
										</ul>
										<?php echo $rows->noidung; ?>
										

									<div class="navigation-wrap justify-content-between d-flex border-bottom">
									</div>

									<div class="comment-sec-area">
										<div class="container">
											<div class="row flex-column">
												<h6><?php foreach($numbl as $rowsbl){
															echo $rowsbl->numbinhluan;
													} ?> Comments</h6>
												<?php
													if($ds_binhluan){
														foreach($ds_binhluan as $dsbl){
														?>
														<div class="comment-list">
															<div class="single-comment justify-content-between d-flex">
																<div class="user justify-content-between d-flex">
																	<div class="thumb">
																		<img src="<?php echo base_url(); ?>assets/img/blog/c2" alt="">
																	</div>
																	<div class="desc">
																		<h5><a href="#"><?php echo $dsbl->last_name; ?></a></h5>
																		<p class="date"><?php echo $dsbl->thoigian; ?> </p>
																		<p class="comment">
																			<?php echo $dsbl->noidung; ?>
																		</p>
																	</div>
																</div>
															</div>
														</div>
														<?php
													}
												}
													
												?>
												
												
											</div>
										</div>
									</div>
								</div>
								<?php
								}
								?>
							<div class="comment-form">
								<h4>Đăng bình luận</h4>
								<?php echo form_open('Home/post_comment?id='.$id); ?>
									<div class="form-group">
										<input name="email" type="email" class="form-control" id="email" placeholder="Nhập địa chỉ email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Nhập địa chỉ email'">
									</div>
									<div class="form-group">
										<textarea class="form-control mb-10" rows="5" name="message" placeholder="Nội dung" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Nội dung'" required=""></textarea>
									</div>
									<?php
									if(isset($_SESSION['is_authenticated']) and $_SESSION['is_authenticated'] == 1){
										echo '<button type="submit" name="submit" class="primary-btn text-uppercase">Bình luận</button>';
									}else echo '<button href="#" class="primary-btn text-uppercase" data-toggle="tooltip" title="Bạn phải đăng nhập để có thể bình luận" disabled>Bình luận</button>';
									?>
									
								<?php form_close(); ?>
								<script>
								$(document).ready(function(){
								  $('[data-toggle="tooltip"]').tooltip(); 
								});
								</script>
							</div>
						</div>
						<!-- End single-post Area -->
						</div>
						<div class="col-lg-4">
							<div class="sidebars-area">
								<div class="single-sidebar-widget most-popular-widget">
									<h6 class="title">Xem nhiều</h6>
									<?php
										if($ttxemnhieu){
											foreach($ttxemnhieu as $rows_dsbv){
											$numbl = $this->M_tin_tuc->count_binhluan($rows_dsbv->id_tin);
										
										
										?>
									<div class="single-list flex-row d-flex">
										<div class="thumb">
											<img class="img-fluid" style="max-width: 100px" src="<?php echo get_firstimage($rows_dsbv->noidung); ?>" alt="">
										</div>
										<div class="details">
											<a href="<?php base_url(); echo m_cut_space($rows_dsbv->tieude).'-post'.$rows_dsbv->id_tin.'.html'; ?>">
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
									}}else echo "Chưa có tin tức nào được xem nhiều";			
									?>
								</div>
								<div class="single-sidebar-widget most-popular-widget">
									<h6 class="title">Tin tức Hot</h6>
									<?php
										if($dstt_hot){
										foreach($dstt_hot as $rows_dsbv){
											$numbl = $this->M_tin_tuc->count_binhluan($rows_dsbv->id_tin);
										?>
									<div class="single-list flex-row d-flex">
										<div class="thumb">
											<img class="img-fluid" style="max-width: 100px" src="<?php echo get_firstimage($rows_dsbv->noidung); ?>" alt="">
										</div>
										<div class="details">
											<a href="<?php base_url(); echo m_cut_space($rows_dsbv->tieude).'-post'.$rows_dsbv->id_tin.'.html'; ?>">
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
									}}else echo "Chưa có tin tức nào hot";			
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
			<!-- End latest-post Area -->
		</div>