<div class="content_videos" id="gallery">
    <div class="header_videos">
        <form action="" class="videos_form">
            <div class="select-style select_1">
                <select>
                <option value="volvo">Alias</option>
                <option value="saab">Fecha</option>
                </select>
            </div>

            <div class="select-style select_2">
                <select>
                <option value="volvo">Ascendente</option>
                <option value="saab">Descendente</option>
                </select>
            </div>
            <button class="buscar"></button>
        </form>
    </div>
    <div class="busqueda_galeria_botones"></div>
    <div class="box_content_videos">

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
            $post_state = get_post_meta($post->ID, 'meta-box-dropdown' );
    ?>

        <div class="videos">
            <div class="box_estrellas">
                <?php echo do_shortcode('[usr 3]');?>
            </div>
            <div class="box_video">
                <a href="<?php the_permalink();?>" data-attr="<?php echo $videoUrl[0]; ?>">
                    <?php if($post_state[0] == "publicado"){ ?>
                        <video class="videos_galeria">
                            <source src="<?php echo $videoUrl[0]; ?>" type="video/webm">
                        </video>
                    <?php }else{ ?>
                        <div class="img-poster" style="display: block;">
                            <img src="<?php bloginfo('template_url')?>/img/no_pub.jpg" alt="">
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
</div>