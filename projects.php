<?php
/*
Template Name: Дизайн проекты
Template Post Type: post_service
*/
?>
<?php
    $load_count = 6;
    $post_type = 'post_project';
    $count = wp_count_posts('post_project')->publish;

    $projects = get_posts([
	    'post_type' => $post_type,
	    'numberposts' => $load_count,
    ]);
?>
<?php get_header('new')?>
	<div class="container">
        <section class="projects">
            <div class="projects--title">Дизайн-проекты</div>
            <div class="projects--content">
      				<?php echo apply_filters('the_content', $post->post_content);?>
      			</div>
            <div class="projects--list more-box">
				<?php foreach ($projects as $project):?>
                    <a href="<?php echo str_replace("","",$project->guid)?>" class="item" itemid="<?php echo $project->ID?>">
                        <div class="img"><img src="<?php echo get_the_post_thumbnail_url($project)?>" alt="#"></div>
                        <div class="text">
                            <div class="title"><?php echo $project->post_title?></div>
                            <div class="short_desc"><?php echo $project->post_excerpt?></div>
                        </div>
                    </a>
				<?php endforeach;?>
            </div>
        </section>
	</div>
    <?php if($count > $load_count):?>
    <section class="container">
        <div class="button button_show-more"
             onclick="showMorePost('<?php echo $load_count?>', '<?php echo $count?>', '<?php echo $post_type?>')"
        >
            Показать еще
        </div>
    </section>
    <?php endif;?>
<div class="service-popup">
  <div class="service-popup__inner">
    <?php echo do_shortcode('[contact-form-7 id="708" title="Получить консультацию"]') ?>  
  </div>
</div>
<?php get_footer('new')?>
