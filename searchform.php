<form role="search" method="get" class="searchform" itemscope itemtype="https://schema.org/SearchAction" action="<?php echo esc_url( home_url( '/' ) ); ?>">
  
  <label><span class="screen-reader-text"><?php _e('Search for:','molde-theme'); ?></span>
  
  <input type="search" name="s" itemprop="query" placeholder="<?php _e('Search for...','molde-theme'); ?>" value="" />

  </label>

  <button type="submit" class="searchsubmit" ><span class="screen-reader-text"><?php _e('Search','molde-theme'); ?></span><span class="search-glass">&#9906;</span></button>

</form>