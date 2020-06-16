<?php
/**
 * Template name : Authors
 */

get_header(); ?>
<div id="primary" class="content-area">
<main id="main" class="site-main" role="main">
<article id="post-30073" class="post-30073 page type-page status-publish hentry pmpro-has-access">
	
	<header class="entry-header">
		<h1 class="entry-title">Contributions des membres</h1>	</header><!-- .entry-header -->

	<div class="entry-content">
Nous regroupons ici les contributions publiées par nos membres.
Les propos tenus dans ces pages n'engagent que leurs auteurs respectifs et en aucun cas X-Alternative dans son ensemble.
<br />

<?php
$args  = array(
		'who' => 'authors',
		'orderby' => 'display_name'
	      );

$wp_user_query = new WP_User_Query($args);

if ( ! empty( $wp_user_query->results ) ) {
	foreach ( $wp_user_query->results as $author ) {
		$id = $author->ID;
		if ($id !== 1) {	
			$postCount = count_user_posts($id);
			if($postCount > 0) {	
				$fN = get_the_author_meta('first_name', $author->ID);
				$lN = get_the_author_meta('last_name', $author->ID);
				$fn = remove_accents(strtolower($fN));
				$ln = remove_accents(strtolower($lN));
				echo "<a class=\"author\" href=\"https://x-alternative.org/author/" . $fn . "-" . $ln . "\">"; 
				echo "<img src=\"https://x-alternative.org/" . $fn . "-" . $ln . ".png\" alt=\"" . $fN . " " . $lN . "\" title=\"" . $fN . " " . $lN . "\" />";
				echo "<div class=\"author-name\">" . $fN . " " . $lN . "</div>";
				echo "<div class=\"author-post-count\">". $postCount ;
				if($postCount > 1)
					echo " articles";
				else
					echo " article";
				echo "</div>";
				echo "</a>" ;
			}
		}
	}
}
?>
</div>


	</main><!-- .site-main -->
	</div><!-- .content-area -->

	<?php get_footer(); ?>
