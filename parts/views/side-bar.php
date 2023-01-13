<?php
$terms = get_terms( array(
	'taxonomy' => 'post_tag',
	'hide_empty' => false,
));
?>
<div class="side-bar">
	<div class="side-bar--title">Каталог:</div>
	<div class="side-bar--list">
		<ul>
            <li onclick="getPostByTag(''); changeTitle('', event)">Все категории</li>
            <?php foreach ($terms as $term):?>
			    <li
                        onclick="
                                getPostByTag('<?php echo $term->slug?>');
                                changeTitle('<?php echo $term->name?>', event)
                                "
                ><?php echo $term->name?></li>
            <?php endforeach;?>
		</ul>
	</div>
</div>
