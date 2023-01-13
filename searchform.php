<form action="<?php echo home_url( '/' ) ?>" class="header__search">
  <input type="text" value="<?php echo get_search_query() ?>" name="s" id="s" placeholder="Поиск">
  <input type="submit" id="searchsubmit" value="Поиск">
</form>