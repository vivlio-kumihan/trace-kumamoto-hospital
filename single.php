<?php get_header(); ?>

<main>
  <div class="front single">
    <div class="site-title"><a href="<?php echo home_url('/') ?>"><span>特定医療法人 萬生会 熊本第一病院</span></a></div>
  </div>

  <div class="container">
    <div class="category-link-menu">
      <header data-cat-id="all">記事カテゴリー</header>
      <ul class="sub-menu">
        <li><a href="/news/">すべて</a></li>
        <?php
        $categories = get_categories();
        if ($categories) {
          foreach ($categories as $category) {
            echo '<li><a href="/category/' . $category->slug . '">' . $category->name . '</a></li>';
          }
        }
        ?>
      </ul>
    </div>

    <div class="post-content">
      <div class="header-sub">
        <ul class="post-category">
          <?php
          $categories = get_the_category();
          if ($categories) {
            echo '<li><a href="' . esc_url(get_category_link($categories[0]->term_id)) . '">' . $categories[0]->name . '</a></li>';
          }
          ?>
        </ul>
        <time datetime="<?php echo get_the_date("Y-m-d") ?>"><?php echo get_the_date("Y年m月d日") ?></time>
      </div>
      <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
          <h2><?php the_title(); ?></h2>
          <p><?php echo the_content(); ?></p>
      <?php endwhile;
      endif; ?>

      <div class="page-direction">
        <a href="<?php echo home_url('/news') ?>">記事一覧へ</a>
        <ul>
          <?php if (get_previous_post() !== '') : ?>
            <li><?php previous_post_link('%link', '前の記事へ', true); ?></li>
          <?php endif; ?>
          <?php if (get_next_post() !== '') : ?>
            <li><?php next_post_link('%link', '次の記事へ', true); ?></li>
          <?php endif; ?>
        </ul>
      </div>
    </div>
  </div>
</main>

<?php get_footer(); ?>