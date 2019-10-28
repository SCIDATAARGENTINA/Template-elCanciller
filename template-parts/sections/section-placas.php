<?php
/**
 * Template part for displaying CANCILLER SECCION PLACAS
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since 1.0.0
 */

?>

<div class="placas-section container">

     <?php 

     $titulos = array();
     $placas = array();
     $ids = array();
     $alts = array();
     $slide = 0;
     
     $args = array(
                        'posts_per_page' => -1,
                        'post_type' => 'placa'
                    );
                    $query = new WP_Query( $args );
                    while( $query->have_posts() ) {
                        $query->the_post(); 
                        $featured_img_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
                        $alt = get_post_meta( get_post_thumbnail_id(), '_wp_attachment_image_alt', true );
                        
                        array_push($ids, get_the_ID());
                        array_push($titulos, get_the_content());
                        array_push($placas, $featured_img_url);
                        array_push($alts, $alt);
                        
                    }
                    // Restore original Post Data
                    wp_reset_postdata(); ?> 

    <div class="placa-title">
        <div class="placa-content">
            <img src="<?php bloginfo('url') ?>/wp-content/uploads/2019/07/placa-logo.svg" alt="El Canciller Twitter">
            <div class="slider-placa-titulo">
                <?php $slide = 0; ?>
                <?php foreach($titulos as $titulo){ ?>
                    <?php $slide++; ?>
                    <?php if( $slide == 1 ){ ?>
                        <h3 class="active" data-slide="<?php echo $slide; ?>"><?php echo $titulo; ?></h3>
                    <?php }else { ?>
                    <h3 data-slide="<?php echo $slide; ?>"><?php echo $titulo; ?></h3>
                    <?php } ?>
                <?php } ?>
                <div class="placa-like">
                    <?php $slide = 0; ?>
                    <?php foreach($ids as $id){ ?>
                        <?php $slide++; ?>
                        <?php if( $slide == 1 ){ ?>
                            <i data-slide="<?php echo $slide; ?>" class="active fas fa-heart like" data-id="<?php echo $id ?>" data-type="<?php echo get_post_type( $id ); ?>"></i>
                        <?php }else { ?>
                            <i data-slide="<?php echo $slide; ?>" class="fas fa-heart like" data-id="<?php echo $id ?>" data-type="<?php echo get_post_type( $id ); ?>"></i>
                        <?php } ?>
                    <?php } ?>
                </div>
            </div><!-- end slider placa titulo -->
            <button id="next-placa" class="placa-next mobile"></button>
            <button id="prev-placa" class="placa-prev"></button>
        </div><!-- placa-content -->
    </div><!-- placa-title -->

    <div class="placa-image">
        <div class="slider-placa-imagen">
            <?php $slide = 0; ?>
            <?php $count = 0; ?>
            <?php foreach($placas as $placa){ ?>
                <?php $slide++; ?>
                <?php if( $slide == 1 ){ ?>
                    <img class="active" data-slide="<?php echo $slide; ?>" src="<?php echo $placa; ?>" alt="<?php echo $alts[$count] ?>">
                <?php }else { ?>
                    <img data-slide="<?php echo $slide; ?>" src="<?php echo $placa; ?>" alt="<?php echo $alts[$count] ?>">
                <?php } ?>
                <?php $count++; ?>
            <?php } ?>
        </div><!-- end slider placa imagen -->        
        <button id="next-placa" class="placa-next"></button>
    </div><!-- placa-image -->
    
</div><!-- end placas-section container -->