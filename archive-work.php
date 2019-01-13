<?php if (have_posts()) : ?>

    <?php if (is_category()) : ?>
        <?php /* <h1 class="page-title">Archive for the &#8216;<?php single_cat_title(); ?>&#8217; Category</h1> */ ?>
    <?php elseif (is_tag()) : ?>
        <div class="uk-panel uk-panel-box uk-text-center uk-margin-large">
            <h1 class="uk-h3"><?php printf(__('Posts Tagged %s', 'warp'), '&#8216;'.single_tag_title('', false).'&#8217;'); ?></h1>
        </div>
    <?php elseif (is_day()) : ?>
        <h1 class="uk-h3"><?php printf(__('Archive for %s', 'warp'), get_the_date()); ?></h1>
    <?php elseif (is_month()) : ?>
        <h1 class="uk-h3"><?php printf(__('Archive for %s', 'warp'), get_the_date('F, Y')); ?></h1>
    <?php elseif (is_year()) : ?>
        <h1 class="uk-h3"><?php printf(__('Archive for %s', 'warp'), get_the_date('Y')); ?></h1>
    <?php elseif (is_author()) : ?>
        <h1 class="uk-h3"><?php _e('Author Archive', 'warp'); ?></h1>
    <?php elseif (isset($_GET['paged']) && !empty($_GET['paged'])) : ?>
        <h1 class="uk-h3"><?php _e('Blog Archives', 'warp'); ?></h1>
    <?php endif; ?>



<!-- Imprimim etiquetes per filtrar... ara son picades, pero s'hauria de fer un foreach per treureles... -->
<ul id="my-id" class="uk-subnav uk-subnav-pill uk-flex-center">
    <li class="uk-active" data-uk-filter=""><a href="">Todo</a></li>
    <li data-uk-filter="blog"><a href="">Blog</a></li>
    <li data-uk-filter="catalogo"><a href="">Catálogo</a></li>
    <li data-uk-filter="multi-idioma"><a href="">Multi-idioma</a></li>
    <li data-uk-filter="tienda-online"><a href="">Tienda Online</a></li>
    <li data-uk-filter="intranet"><a href="">Intranet</a></li>
</ul>
<!-- Imprimim els CPT dins de la div per filtrar -->
<div data-uk-grid="{gutter: ' 20',controls: '#my-id'}" class="uk-grid wgk-porfolio">
<?php 

$the_posts = get_posts(array('posts_per_page'=>20,'post_type'=>'trabajos'));//agafem unicament el CPT que ens interesa
$num_CPT=count($the_posts);//el total de posts que te el CPT
for($i=0 ; $i<($num_CPT); $i++){//foreach incremental que repeteix tants com total

$client_id=$the_posts[$i]->ID;
$client_name=$the_posts[$i]->post_title;
$client_link=get_permalink($client_id);//hem de treure el link mes maco...
$client_img="aaaaaa/images/all/UtopixStudios-logo.png";//per exemple...
$client_img=wp_get_attachment_image_src(get_post_thumbnail_id($client_id),'large' );


echo '<div data-uk-filter="';

$client_tags_solo = get_the_terms($client_id, 'tipos_trabajos' );//recuperem els CPT tipus tags del CPT
$num_CPT_tags=count($client_tags_solo);//el total de tags que te el post del CPT
for($i_tag=0 ; $i_tag<($num_CPT_tags); $i_tag++){//foreach incremental que repeteix tants com total
echo($client_tags_solo[$i_tag]->slug);
if($i_tag<$num_CPT_tags-1){echo ",";}
}

echo '" class="uk-width-1-1 uk-width-small-1-2 uk-width-medium-1-4 uk-text-center">
        <div class="uk-panel uk-panel-box uk-panel-box-hover uk-overlay-hover">
			<a class="uk-position-cover uk-position-z-index" href="'.$client_link.'"></a>
			<div class="uk-text-center uk-panel-teaser"><div class="uk-overlay "><img src="'.$client_img[0].'" class=" uk-overlay-scale" alt="'.$client_name.'"></div></div>
			<h3 class="uk-h5 uk-margin-top-remove"><a class="uk-link-reset" href="'.$client_link.'">'.$client_name.'</a></h3>
			</div>
    </div>';
	
	

}?> 
</div>






<article class="uk-article uk-margin-large-top tm-article tm-article-box uk-margin-large-bottom">
<?php //esto imprimira el contenido de la descripcion de CPT.
$porfolio = get_post_type_object( 'trabajos' );
echo $porfolio->description; 
?>    
</article>













<?php else : ?>

    <?php if (is_category()) : ?>
        <h1 class="uk-h3"><?php printf(__("Sorry, but there aren't any posts in the %s category yet.", "warp"), single_cat_title('', false)); ?></h1>
    <?php elseif (is_date()) : ?>
        <h1 class="uk-h3"><?php _e("Sorry, but there aren't any posts with this date.", "warp"); ?></h1>
    <?php elseif (is_author()) : ?>
        <?php $userdata = get_userdatabylogin(get_query_var('author_name')); ?>
        <h1 class="uk-h3"><?php printf(__("Sorry, but there aren't any posts by %s yet.", "warp"), $userdata->display_name); ?></h1>
    <?php else : ?>
        <h1 class="uk-h3"><?php _e("No posts found.", "warp"); ?></h1>
    <?php endif; ?>

    <?php get_search_form(); ?>

<?php endif; ?>
