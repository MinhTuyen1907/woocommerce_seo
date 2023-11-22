<?php
get_header();
?>
<?php
if ( have_posts() ) : while ( have_posts() ) : the_post();
endwhile;
endif;
the_content();
?>
<?php
get_footer();
?>