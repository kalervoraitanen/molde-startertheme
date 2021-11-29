<?php
  /*
   * This is the default post format.
   *
   */
?>

  <article id="post-<?php the_ID(); ?>" <?php post_class(); ?> role="article" itemscope itemprop="blogPost" itemtype="http://schema.org/BlogPosting">

    <header class="entry-header">

      <h1 class="entry-title" itemprop="headline" rel="bookmark"><?php the_title(); ?></h1>

      <p class="entry-date">
        <span class="screen-reader-text"><?php echo esc_html__( 'Posted', 'molde-theme' ) ?> </span>
        <time class="updated entry-time" datetime="<?php echo esc_attr(get_the_time('c')); ?>" itemprop="datePublished"><?php echo get_the_date(); esc_html_e( ' at ', 'molde-theme' ); echo get_the_time(); ?></time>
      </p>

    </header>

    <section class="entry-content cf" itemprop="articleBody">

      <?php /* If post has feature image show it */ ?>
      <?php if ( has_post_thumbnail() ) { ?>
        <span itemprop="image" class="feat-image"><?php the_post_thumbnail(); ?></span>
      <?php } ?>

      <?php /* Show post content */ ?>
      <?php
        the_content();
      ?>

    </section>

    <footer class="entry-footer">

      <?php molde_categories_tags(); ?>

    </footer>

  </article>
