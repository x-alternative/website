<?php 
	$authId = get_the_author_meta('ID');
	$authFirstName = get_the_author_meta('first_name', $authId);
	$authLastName = get_the_author_meta('last_name', $authId);
	$authPostCount = count_user_posts($authId);
?>
<?php get_header(); ?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<section class="author-profile">
				<header class="xalt-author-header">
					<img class="xalt-auth-image" src="<?php echo get_avatar_url($authId); ?>" />
					<div class="page-title author-page-title"><?php printf("Tous les articles de %s %s", $authFirstName, $authLastName); ?></div>
				</header><!-- .page-header -->

				<div class="xalt-author-posts">
				
				<!-- The Loop -->
					<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
						<li>
							<span class="xalt-post-date"><?php the_time('d F Y') ?> : </span>
							<?php $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID), 'thumbnail' ); ?>
							<a class="xalt-post-link" href="<?php the_permalink() ?>"><?php the_title(); ?></a>
							
							<img src="<?php echo $url ?>" />
							<div class="xalt-post-abstract"><?php
								$str = apply_filters( 'the_content', get_the_content() );
								$start = strpos($str, '<p>');
								$stop = strpos($str, '</p>');
								if ($stop - $start < 128)
									$stop = strpos($str, '</p>', $stop+1);
								if ($stop - $start < 128)
									$stop = strpos($str, '</p>', $stop+1);
								$firstPar = substr($str, $start, $stop - $start + 4);
								echo $firstPar;
							?><p>...</p></div>
                            <a class="xalt-read-more" href="<?php the_permalink() ?>">Lire en entier</a>
						</li>

					<?php endwhile; else: ?>
						<p><?php _e('Cet auteur n\'a encore publié aucun article'); ?></p>

					<?php endif; ?>

				<!-- End Loop -->
				<?php the_posts_pagination() ?>
				</div><!-- .page-content -->
			</section><!-- .error-404 -->

		</main><!-- .site-main -->
	</div><!-- .content-area -->
<?php get_footer(); ?>
