<?php
    $clients = get_posts(['post_type' => 'post_clients', 'numberposts' => 999])
?>
<div class="clients">
	<div class="clients_logos">
        <?php foreach ($clients as $client):?>
		    <div class="clients_logos--item"><img src="<?php echo get_the_post_thumbnail_url($client)?>" alt="#"></div>
        <?php endforeach; unset($clients, $client)?>
	</div>
</div>
