<?php
/**
 * Template part for opinion content
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since 1.0.0
 */

?>

<?php 
$thumbnail_id = get_post_thumbnail_id($post->ID);
$featured_img = wp_get_attachment_image_src( $thumbnail_id, 'card-nota' );
$featured_img_url = $featured_img[0];
$alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);
?>

<div id="encuesta-<?php echo $post->ID ?>" class="encuesta card" style="background-image : url('<?php echo $featured_img_url ?>')">
    <div class="encuesta-container">
        <div class="encabezado">
            <div class="titulo">
                <h3><?php the_field('subtitulo'); ?></h3>
            </div><!-- titulo -->
        </div>
        <div class="opciones">
            <?php 
            // check if the repeater field has rows of data
            if( have_rows('opciones') ):
                $row_index = 0;
                // loop through the rows of data
                while ( have_rows('opciones') ) : the_row(); 
                $opcion = get_sub_field('opcion');
                $row_index++;
                ?>
                    <div class="opcion" data-id="<?php echo $post->ID ?>" data-votos_totales="<?php echo get_field('total_votos', $post->ID) ?>" data-votos="<?php echo $opcion['votos'] ?>" data-row_index="<?php echo $row_index - 1; ?>">
                        <div class="titulo-opcion">
                            <span class="num-opcion"><?php echo $row_index; ?></span><?php echo $opcion['nombre'] ?>
                        </div><!-- titulo opcion -->
                        <div class="total">
                            <i class="far fa-thumbs-up"></i><div class="result"></div>
                        </div>
                    </div><!-- opcion -->

                <?php endwhile;

            else :

                // no rows found

            endif;
            ?>
        </div>
    </div>
</div><!-- end opinion -->