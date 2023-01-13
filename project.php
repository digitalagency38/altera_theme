<?php
/*
Template Name: Дизайн проект
Template Post Type: post_project
*/
?>
<?php get_header('new')?>
<?php
    $project_docs = get_field('project_docs', $post->ID);
    $project_gallery = get_field('project_gallery', $post->ID);
    $project_description = get_field('project_description', $post->ID);
    $project_portfolio = get_field('project_portfolio', $post->ID);
?>
<div class="container">
    <section class="project_about">
        <div class="project_about--title"><h1><?= $post->post_title ?></h1></div>
        <div class="project_about--cover"><img src="<?php echo get_the_post_thumbnail_url($post)?>" alt="#"></div>
        <div class="project_layouts">
          <?php echo apply_filters('the_content', $post->post_content);?>
        </div>
        <div class="project_about--details">
          <?php if ($project_docs): ?>
            <div class="box box_docs">
                <div class="title">Смотреть документацию: </div>
                <div class="docs">
                    <?php foreach ($project_docs as $doc):?>
                    <a href="<?php echo $doc['url']?>" class="item" download>
                        <div class="icon"><img src="<?php get_uri('img/project/pdf.png')?>" alt="#"></div>
                        <div class="name"><?php echo $doc['title']?></div>
                    </a>
                    <?php endforeach;?>
                </div>
            </div>
          <?php endif; ?>
          <?php if ($project_description): ?>
            <div class="box box_description">
                <div class="title">Описание проекта:</div>
                <div class="text">
	                <?php echo $project_description?>
                </div>
            </div>
            <?php endif; ?>
        </div>
        <?php if ($project_portfolio): ?>
        <div class="button-portfolio-block">
          <a href="<?= get_permalink($project_portfolio) ?>" class="button">
            Посмотреть объект
          </a>
        </div>
        <?php endif; ?>
    </section>
</div>
<!-- <section class="project_gallery">
    <?php //foreach ($project_gallery as $item):?>
        <div class="project_gallery--item"><img src="<?php //echo $item?>" alt="#"></div>
    <?php //endforeach; unset($item)?>
</section> -->
<section class="project_form">
    <?php require 'parts/views/form.php'?>
</section>
<div class="service-popup">
  <div class="service-popup__inner">
    <?php echo do_shortcode('[contact-form-7 id="708" title="Получить консультацию"]') ?>  
  </div>
</div>
<?php get_footer('new')?>
