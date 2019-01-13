<?php if (have_posts()) : ?>

    <?php while (have_posts()) : the_post(); ?>

    <article class="" data-permalink="<?php the_permalink(); ?>">

        <?php if (has_post_thumbnail()):?>
            <div class="uk-position-relative tm-article-image">
                <div class="uk-position-cover" style="background-image: url(<?php echo the_post_thumbnail_url('tm_single_thumb') ?>); background-size: cover; background-position: 50% 50%; background-repeat: no-repeat;"></div>
                <?php the_post_thumbnail('tm_single_thumb', array('class' => 'uk-invisible')); ?>
            </div>
        <?php endif;?>
		
        <div class="tm-article-container uk-article tm-article tm-article-box">
            <div class="uk-text-center uk-margin-large-bottom">

                <?php if ($this_tag) : ?>
    			<span class="uk-badge"><?php echo $this_tag['link']; ?></span>
    			<?php endif; ?>

                <div class="uk-text-center">
                    <h1 class="uk-article-title uk-margin-small-top"><?php the_title(); ?></h1>
                </div>

            </div>

            <div class="uk-grid">
                <!--
                <div class="uk-width-medium-1-3">
                <div class="imac">
                <img class="imac-screen" src="<?php echo get_field('img_imac');?>">
                <img class="imac-cover" src="/wp-content/uploads/imac-mockup.png">
                </div>
                <p>falta fer responsive el imac</p>
                </div>
                -->
            
                <div class="uk-width-medium-1-1">
                    <?php the_content(''); ?>
                    <?php wp_link_pages(); ?>
                </div>
            </div>
        
        
            <?php //aqui imprimim que inclou i que no...
            $checkbox = get_field('incluye');
            if ($checkbox != "")://aqui llistem els que inlcou ?>
                <hr>
                <div class="uk-grid">
                    <div class="uk-width-medium-1-2">
                        <h2>El proyecto incluye:</h2>
                        <ul class="uk-list">
                            <?php foreach ($checkbox as $value): ?>
                                <li>
                                    <i class="uk-icon-check uk-text-success"></i>
                                    <?php echo $value; ?>
                                </li>
                            <?php endforeach;?>
                        </ul>
                    </div>
                    <div class="uk-width-medium-1-2"><!--aqui llistem els que no inlcou-->
                        <h2>El proyecto no incluye:</h2>
                        <ul class="uk-list">
                            <?php 
                            $checkbox_field = get_field_object('incluye');
                            $checkbox_choices = $checkbox_field['choices'];
                            foreach ($checkbox_choices as $value => $label): ?>
                                <?php if (!in_array($value, $checkbox)): ?> 
                                    <li>
                                        <i class="uk-icon-close uk-text-danger"></i>
                                        <?php echo $label; ?>
                                    </li>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            <?php endif; ?>

            <?php //aqui imprimim galeria...
            $galery = get_field('galeria');
            if ($galery != ""){
            echo '<hr><h2 class="uk-margin-top-remove">Imagenes adicionales del proyecto:</h2>';
            echo '<div class="uk-galery uk-grid uk-grid-width-1-2 uk-grid-width-medium-1-4" data-uk-grid-margin="" data-uk-grid>';
            $count = 0;
            foreach ($galery as $galery) {
                $count = $count+1;
                echo '<a href="'.$galery[url].'" ';
                if($count > 1){echo 'data-lightbox-type="image" ';}
                echo 'data-uk-lightbox="{group:\'group1\'}" title="'.$galery[title].'"><div class="overlay">';
                echo '<img src="'.$galery[url].'" alt="'.$galery[title].'" width="'.$galery[width].'" height="'.$galery[height].'" style="border: 1px solid #898989;">';
                echo '</div></a>';
                }
            echo '</div>';
            }?>

            <?php //aqui acces directe al web...
            $enlace = get_field('enlace');
            echo '<hr><div class="uk-text-center"><a class="uk-button" href="'.$enlace[url].'" target="_blank">Visitar '.$enlace[title].'</a></div>';
            ?>

        </div>
    </article>
    <?php endwhile; ?>
<?php endif; ?>
