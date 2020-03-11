
<?php
get_header();
/////////////////////////////////ATELIER
echo '<h1>' . category_description(get_category_by_slug('atelier')) . '</h1>';        

$args = array(
    "category_name" => "atelier",
    "posts_per_page" => -1,
    "orderby" => "name",
    "order" => "ASC"
);
$query1 = new WP_Query( $args );

// echo '<div class ="conteneur-nouvelles">';
// The 2nd Loop
$i = 1;
echo '<div class = "conteneur-atelier" >';
while ( $query1->have_posts() ) {
            $query1->the_post();

            $auteur = get_the_author_meta( 'display_name', $post->post_author );

            if($auteur == "Luna Luna"){
                $auteur = 1;
            }
            else if($auteur =="Eddy Martin"){
                $auteur = 2;
            }
            if($auteur == "derick derick"){
                $auteur = 3;
            }
            else if($auteur == "maybell maybell"){
                $auteur =4;
            }

            $heure = get_post_field('post_name');

            if($heure == "js-08" || $heure == "php-08" || $heure == "reac-08" || $heure == "wp-08"){
                $heure = 1;
            }
            else if($heure == "des-10" || $heure == "php-10" || $heure == "reac-10" || $heure == "wp-10"){
                $heure = 2;
            }
            if($heure == "anim-13" || $heure == "des-13" || $heure == "php-13" || $heure == "wp-13"){
                $heure = 3;
            }
            else if($heure == "js-15" || $heure == "php-15" || $heure == "reac-15" || $heure == "wp-15"){
                $heure = 4;
            }

            $heuredebut = $heure +1;
            $heurefin = $heure + 2;
            //$heurefin = $heure + 2; Ça fait ce que vous demandez mais ça crée un overlapping entre les cellules que je n'ai pas réussi à régler

            
            $i = $i + 1;

            echo '<h3 class="auteurcouleur'. $i . '" style = "grid-area:1/' . $auteur . "/1/" . $auteur .'">'. get_the_author_meta( 'display_name', $post->post_author ) . '</h3>';
            echo '<div class ="posts-atelier" style = "grid-area:'. $heuredebut . "/" . $auteur . "/" . $heurefin . "/" . $auteur .'">';
            echo '<p><a href ="' . get_permalink($id) . '">' . get_the_title() . "</p><p>" .get_post_field('post_name') . "</p><p>" .get_the_author_meta( 'display_name', $post->post_author )   . '</a></p>';
            echo '</div>';
}
echo '</div>';
// Restore original Post Data
wp_reset_postdata();
?>