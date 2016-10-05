<div class="content_videos" id="gallery">
    <div class="header_videos">
        <form action="" class="videos_form" id="filter_video">
            <div class="select-style select_1">
                <select id="filter">
                <option value="title">Alias</option>
                <option value="DATE">Fecha</option>
                </select>
            </div>

            <div class="select-style select_2">
                <select id="filter2">
                <option value="ASC">Ascendente</option>
                <option value="DESC">Descendente</option>
                </select>
            </div>
            <button class="buscar"></button>
        </form>
    </div>
    <div class="busqueda_galeria_botones"></div>
    <div class="box_content_videos">

    <?php

        get_template_part('loops/default-loop');

    ?>
    
    </div>
</div>