
<link rel="stylesheet" id="underscores-style-css" href="http://localhost/2020-veille/wp-content/themes/exercice9/style.css?ver=5.3.2" type="text/css" media="all">
<script type="text/javascript" src="http://localhost/2020-veille/wp-content/themes/exercice9/js/main.js?ver=5.3.2"></script>
<?php
/////////////////////////////////NOUVELLES
echo '<h1>' . category_description(get_category_by_slug('nouvelle')) . '</h1>';        
/* The 2nd Query (without global var) */
$args2 = array(
    "category_name" => "nouvelle",
    "posts_per_page" => 6,
    "orderby" => "date",
    "order" => "DSC"
);
$query2 = new WP_Query( $args2 );

// echo '<div class ="conteneur-nouvelles">';
// The 2nd Loop
while ( $query2->have_posts() ) {
            $query2->the_post();
            echo '<div class ="posts-nouvelle2">';
            the_post_thumbnail('thumbnail');
            echo '<div class ="texte-nouvelle2">';
            echo '<h3> <a href ="' . get_permalink($id) . '">' . get_the_title() ." - ". get_the_date() . '</a></h3>';
            echo '<p>' . substr(get_the_excerpt(),0,200) . '</p>'; 
            echo '<button class="BtnLireSuite"> Lire la suite </button>';
            echo '<div class="division-vide"></div>';
            echo '</div>';
            echo '</div>';
}
// echo '</div>';
// Restore original Post Data
wp_reset_postdata();
?>