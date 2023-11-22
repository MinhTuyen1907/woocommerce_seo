<?php
/**
 * template name: home
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package TuyenMinh
 */

get_header();
?>

<main id="primary" class="site-main">
	<div class="conten-top">
		<div class="conten-imgg" >
			<div class ="slide">
			<?php echo do_shortcode('[masterslider id="1"]');
			?>
			</div>
			<div class = "img" >
				<div class="imgt" >
					<?php 
					  	$image = get_field('imgt');
						$size = 'full';
						if ( $image ) { echo wp_get_attachment_image( $image, $size );
						}
					?>
					<div class="typrogam">
							<p>GIAO HÀNG MIỄN PHÍ</p>
					</div>
				</div>
				<div   class="imgb">
					<?php 
							$image = get_field('imgb');
							$size = 'full';
							if ( $image ) { echo wp_get_attachment_image( $image, $size );
							}
					?>
					<div class="typrogamm">
					<p>ĐẶT HÀNG COMBO</p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div   class ="flashsale" >
		<div  class=" sale-pro" >
			<div class ="s1" >
				<div class ="s2" >F</div>
				<div class="l1" >
				<svg xmlns="http://www.w3.org/2000/svg" width="19" height="30" viewBox="0 0 19 30" fill="none" padding-top ="10px">
						<path d="M18.6732 11.0507C18.5846 10.8723 18.3937 10.7579 18.1835 10.7579H11.7787L18.0997 1.40271C18.2051 1.24668 18.2116 1.04909 18.1165 0.887484C18.0214 0.725339 17.8397 0.625 17.643 0.625H8.9952C8.79036 0.625 8.60332 0.733413 8.51148 0.905177L0.40416 16.1044C0.320364 16.261 0.329548 16.4474 0.427912 16.5969C0.526847 16.7463 0.700331 16.8375 0.887876 16.8375H6.4457L0.389529 30.3202C0.286287 30.5508 0.378192 30.8183 0.605703 30.949C0.693237 30.9992 0.790525 31.0234 0.887306 31.0234C1.04242 31.0234 1.19538 30.9611 1.30135 30.8436L18.597 11.5912C18.7326 11.4403 18.7618 11.2295 18.6732 11.0507Z" fill="#33B44A"/>
				</svg>  
				</div>
			
				<div class="flash">ASH SALE</div>
				
			</div>
			<div class="f1" >
				<div class="f2" >Kết thúc sau:</div>
				<div class ="f3">
				<div  class ="f4">24</div>
				</div>
				<div class="f5" >:</div>
				<div  class ="f3">
				<div class ="f4" >24</div>
				</div>
				<div class="f5" >:</div>
				<div class ="f3" >
				<div class ="f4" >24</div>
				</div>
			</div>
		</div>
	</div>
	<div class="conten-cente"  >
		<div class="center-top filtering"  >
		
		
		<?php 
		$args = array(
			'post_type'      => 'product',
			'post_status'    => 'publish',
			'posts_per_page' => 10,
			'post__in'=> wc_get_product_ids_on_sale(),
			
		);
		
		$hot_products = new WP_Query( $args );
		if ( $hot_products->have_posts() ) : 
			while ( $hot_products->have_posts() ) :
				$hot_products->the_post();
		 ?> 
		 <li class="li" >
		 <div class= "conten" >
			<div class="anh" >
				 <?php echo $product->get_image(); ?> 
			</div>
			<div class="p">
			<div class="name" ><a  href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div>
			<div class="name" ><?php echo $product->get_price_html(); ?></div>	
			<div>
		</div>
		</li>
	<?php endwhile;
	endif;	wp_reset_query();
	 ?>
		
		</div>
		
	</div>
	<div class="conten-product" >
		<div class="produc" >
			<div class="top" >
				<div class="danhmuc">DANH MỤC SẢN PHẨM</div>
				<a href="#">xem tất cả</a>

			</div>
			<div class="bot" >
			<?php
					$product_categories = get_product_categories();

					// Hiển thị danh mục sản phẩm
						if ( ! empty( $product_categories ) ) :
				
					foreach ( $product_categories as $category ) :
			?>

						<li >
						
							<div class="conten-bot" >
								<div class="conten-bott"  >
									<div class="conten-img"  >
										<?php 
                                        $thumbnail_id = get_woocommerce_term_meta( $category->term_id, 'thumbnail_id', true );
                                       echo wp_get_attachment_image( $thumbnail_id , 'thumbnail');
										
										?>
									</div>
									
									<div class="a" ><a  href="<?php echo  get_term_link( $category ) ?>"><?php echo $category->name?></a></div>
									<div  class="asl"><a   href="<?php echo  get_term_link( $category ) ?>"> số lượng: <?php echo $category->count?></a></div>

								
			
								</div>
						</li>
						
						
			<?php
					endforeach;
					endif;
			?>
			
			</div>
		</div>
	
	</div>
	
	<div class="conten-product-bot" >
		<div class="product-hot" >
			<div class="danhmuc-hot" >CLOTHINGS</div>
				<?php $category_id = get_field('category_product'); ?>
			<div class="filtering">
			<?php
			

				$args = array(
					'post_type' => 'product',
					'tax_query' => array(
						array(
							'taxonomy' => 'product_cat',
							'field' => 'term_id',
							'terms' => $category_id,
						),
					),
				);
				
				$products = new WP_Query($args);
				
				while ($products->have_posts()) : $products->the_post();?>
				<div class="hot-conten" >
					<div class="anh" >
						<?php the_post_thumbnail('medium'); ?> 
					</div>
					<div class="p">
						<div class="name" >
							<a  href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
						</div>
						<div class="name" >
						<?php echo $product->get_price_html(); ?>
						</div>
					</div>
				</div>
				
				<?php endwhile;
				
				wp_reset_postdata();
				?>
			</div>

			<div class="danhmuc-hot" >MUSIC</div>
			<div class="filtering">
			<?php $category_id = get_field('category_music'); ?>
			<?php
				// $category_slug = 'music'; // Slug của danh mục sản phẩm

				$args = array(
					'post_type' => 'product',
					'tax_query' => array(
						array(
							'taxonomy' => 'product_cat',
							'field' => 'terrm_id',
							'terms' => $category_id,
						),
					),
				);
				
				$products = new WP_Query($args);
				
				while ($products->have_posts()) : $products->the_post();?>
				<div class="hot-conten" >
					<div class="anh" >
						<?php the_post_thumbnail('medium'); ?> 
					</div>
					<div class="p">
						<div class="name" >
							<a  href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
						</div>
						<div class="name" >
						<?php echo $product->get_price_html(); ?>
						</div>
					</div>
				</div>
				
				<?php endwhile;
				
				wp_reset_postdata();
				?>
			</div>
			<div class="danhmuc-hot" >POSTERS</div>
			<div class="filtering">
			<?php $category_id = get_field('categoey_poster'); ?>
			<?php
				// $category_slug = 'posters'; // Slug của danh mục sản phẩm

				$args = array(
					'post_type' => 'product',
					'tax_query' => array(
						array(
							'taxonomy' => 'product_cat',
							'field' => 'term_id',
							'terms' => $category_id,
						),
					),
				);
				
				$products = new WP_Query($args);
				
				while ($products->have_posts()) : $products->the_post();?>
				<div class="hot-conten" >
					<div class="anh" >
						<?php the_post_thumbnail('medium'); ?> 
					</div>
					<div class="p">
						<div class="name" >
							<a  href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
						</div>
						<div class="name" >
						<?php echo $product->get_price_html(); ?>
						</div>
					</div>
				</div>
				
				<?php endwhile;
				
				wp_reset_postdata();
				?>
			</div>
		</div>
	</div>
	<div class="about-us">
			<div class="about" >
			<div class="top" >
				<div class="danhmuc"> KHÁCH HÀNG NÓI GÌ VỀ CHÚNG TÔI</div>
				<div class="i"  >
					<div class="us_c"><a href="#"><i class="fa-solid fa-chevron-left"></i></a></div>
					<div class="us_c"><a href="#"><i class="fa-solid fa-chevron-right"></i></a></div>
				</div>
			</div>
			<div class="us " >
				<div class="u_b ">
				<?php  dynamic_sidebar('footer5');?>
				</div>
				 <div class="u_b"><?php  dynamic_sidebar('footer5');?>
				</div>
			</div>	
		</div>
	</div>


	<div class="conten-produce  carousel" >
		
		<?php dynamic_sidebar('sidebarbot'); ?>	
	</div>

	</main><!-- #main -->

<?php
//get_sidebar();
get_footer();
