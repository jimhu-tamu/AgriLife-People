<?php
/**
 * The Template for displaying all staff single posts.
 */

get_header(); ?>

		<div id="wrap">
			<div id="content" role="main">
			<p><span class="read-more"><a href="../">&larr; All Employees</a><span></p>

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
			
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>		
					<section class="entry-content">
						<div class="staff-single-image">
							<?php if ( has_post_thumbnail() ) {
	  							the_post_thumbnail('staff_single'); 
							} else  { 
								echo '<img src="'.STAFF_PLUGIN_DIR_URL.'img/agrilife-default-staff-image-single.png" alt="AgriLife Logo" title="AgriLife" width="175" height="175" />';
							}
							?>
						</div>
						<div class="staff-person-details">
							<dl>	
							<dt><?php echo rwmb_meta( 'als_first-name' ).' '.rwmb_meta( 'als_last-name' ); ?></dt>
							
								<dd class="role"><?php echo rwmb_meta( 'als_position' );?></dd>
							
								<dd><?php echo rwmb_meta( 'als_building-room' );?></dd> 
							
								<dd class="email"><a href="mailto:<?php echo rwmb_meta( 'als_email' );?>"><?php echo rwmb_meta( 'als_email' );?></a></dd>
							
								<dd><?php echo rwmb_meta( 'als_phone' );?></dd> 
								
								<dd class="website"><a href="<?php echo rwmb_meta( 'als_website' );?>"><?php echo rwmb_meta( 'als_website' );?></a></dd> 
								<dt class="specialty-title">
									<?php

									if ( rwmb_meta( 'als_specialty' ) ) {
										if (  ! rwmb_meta('als_specialty-label') ) {
											echo 'Specialty: ' . rwmb_meta( 'als_specialty' );
										} else {
											echo rwmb_meta( 'als_specialty-label' ) . ': ' . rwmb_meta( 'als_specialty');
										}
									}

									?>
								</dt>
								<dd>
									<?php echo rwmb_meta( 'als_description' ); ?>
								</dd>
							
							<?php $undergrad = rwmb_meta( 'als_undergrad' );
							if ( $undergrad )  {
								echo '<dt>Undergraduate Education</dt>';
							}
							if ( is_array( $undergrad ) ) {
								foreach( $undergrad as $u ) {
									echo '<dd>' . $u . '</dd>';
								}
							} else {
								echo '<dd>' . $undergrad . '</dd>';
							}
							?>

							<?php $graduate = rwmb_meta( 'als_graduate' );
							if ( $graduate ) {
								echo '<dt>Graduate Education</dt>';
							}
							if ( is_array( $graduate ) ) {
								foreach( $graduate as $g ) {
									echo '<dd>' . $g . '</dd>';
								}
							} else {
								echo '<dd>' . $graduate . '</dd>';
							}
							?>

							<?php $specialty = rwmb_meta( 'als_specialty-label' );
							if ( $specialty ) {
								echo '<dt>' . $specialty . '</dt>';
								echo '<dd>' . rwmb_meta( 'als_specialty' ) . '</dd>';
								echo '<dd>' . rwmb_meta( 'als_description' ) . '</dd>';
							}
							?>

							<?php $awards = rwmb_meta( 'als_award' );
							if ( ! empty( $awards[0] ) ) {
								echo '<dt>Awards</dt>';
							}
							if ( is_array( $awards ) ) {
								foreach( $awards as $a ) {
									echo '<dd>' . $a . '</dd>';
								}
							} else {
								echo '<dd>' . $awards . '</dd>';
							}
							?>

							<?php $courses = rwmb_meta( 'als_course' );
							if ( ! empty( $courses[0] ) ) {
								echo '<dt>Courses Taught</dt>';
							}
							if ( is_array( $courses ) ) {
								foreach( $courses as $c ) {
									echo '<dd>' . $c . '</dd>';
								}
							} else {
								echo '<dd>' . $courses . '</dd>';
							}
							?>
								
							</dl>	
								
						</div>
						<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'agriflex' ), 'after' => '</div>' ) ); ?>
					</section><!-- .entry-content -->

	
					<footer class="entry-meta">

						<section class="entry-utility">
							<?php edit_post_link( __( 'Edit', 'agriflex' ), '<span class="edit-link">', '</span>' ); ?>
						</section><!-- .entry-utility -->
					</footer><!-- .entry-meta -->
				</article><!-- #post-<?php the_ID(); ?> -->

<?php endwhile; // end of the loop. ?>
			</div><!-- #content -->
		</div><!-- #wrap -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
