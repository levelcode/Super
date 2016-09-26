<div class="content_videos" id="gallery">
    <div class="header_videos">
        <form action="" class="videos_form">
            <div class="select-style select_1">
                <select>
                <option value="volvo">Volvo</option>
                <option value="saab">Saab</option>
                <option value="mercedes">Mercedes</option>
                <option value="audi">Audi</option>
                </select>
            </div>

            <div class="select-style select_2">
                <select>
                <option value="volvo">Volvo</option>
                <option value="saab">Saab</option>
                <option value="mercedes">Mercedes</option>
                <option value="audi">Audi</option>
                </select>
            </div>
            <button></button>
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
    ?>
        
        <div class="videos">
            <div class="box_estrellas">
                <div class="estrella activate"></div>
                <div class="estrella"></div>
                <div class="estrella"></div>
                <div class="estrella"></div>
                <div class="estrella"></div>
            </div>
            <div class="box_video">
                <a href="#" data-attr="<?php echo $videoUrl[0]; ?>"></a>    
                <video>
                    <source src="<?php echo $videoUrl[0]; ?>" type="video/webm">
                </video>
            </div>
            <span class="nombre_video">
                <?php the_title();?>
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