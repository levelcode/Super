<div class="default-query">
    <?php
        //Query posts type
        $args = array(
            'post_type' => 'post',
            'posts_per_page' => 200
        );

        query_posts($args);

        while(have_posts()):the_post();

            $videoUrl = get_post_meta($post->ID, 'url_video' );
            $alias = get_post_meta($post->ID, 'Alias' );
            $photo = get_post_meta($post->ID, 'photo' );
            $post_state = get_post_meta($post->ID, 'meta-box-dropdown' );
        ?>

        <div class="videos">
            <div class="box_estrellas">
                <?php if(function_exists('the_ratings')) { the_ratings(); } ?>
            </div>
            <div class="box_video">
                <a href="<?php the_permalink();?>" data-attr="<?php echo $videoUrl[0]; ?>">
                    <?php //if($post_state[0] == "publicado"){ ?>
                    <?php if(true){ ?>
                        <div class="img-poster" style="display: block;">
                            <img width="248" src="<?php echo bloginfo('template_url');?>/<?php echo $photo[0]; ?>" alt="Preview video2">
                        </div>
                    <?php } else { ?>
                        <div class="img-poster" style="display: block;">
                            <img width="248" src="<?php bloginfo('template_url')?>/img/no_pub.jpg" alt="Video NO Aprobado">
                        </div>
                    <?php } ?>
                </a>
            </div>
            <span class="nombre_video">
                <?php echo $alias[0] ?>
            </span>
            <!--span class="titulo_video">
                Reto super ricas
            </span-->
            <div class="shadow_video"></div>
        </div>

    <?php
        endwhile;
        wp_reset_query();
    ?>
    </div>