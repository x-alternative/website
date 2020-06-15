<?php
/**
* A Simple Category Template
*/
get_header(); ?>
<div id="primary" class="content-area">
<main id="main" class="site-main" role="main">
<article id="post-3007301" class="post-3007301 page type-page status-publish hentry pmpro-has-access">

        <header class="entry-header">
                <h1 class="entry-title">Textes historiques</h1>  </header><!-- .entry-header -->

        <div class="entry-content">
Nous regroupons ici des textes historiques relatifs à l'histoire de l'école polytechnique.
<br />
 
<?php 
// Check if there are any posts to display
if ( have_posts() ) : ?>
 
<?php
 
// The Loop
while ( have_posts() ) : the_post();
?>
<h2>
	<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
</h2>
 
<div class="entry">
<?php the_excerpt(); ?>
 
</div>
 
<?php endwhile; // End Loop
 
else: ?>
<p>Sorry, no posts matched your criteria.</p>
<?php endif; ?>
</div>

</article>
</main></div> 
<?php get_sidebar(); ?>
<?php get_footer(); ?>
