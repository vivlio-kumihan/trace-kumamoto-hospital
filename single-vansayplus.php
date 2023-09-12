<?php get_header(); ?>

<main>
  <div class="front single">
    <div class="site-title"><a href="<?php echo home_url('/') ?>"><span>特定医療法人 萬生会 熊本第一病院</span></a></div>
  </div>

  <div class="container">
    <div class="category-link-menu">
      <header>記事カテゴリー</header>
      <ul class="sub-menu">
        <li><a href="/vansayplus/">すべて</a></li>
        <?php
        $taxonomy = 'vansayplus-category'; // タクソノミーの名前を指定
        $terms = get_terms($taxonomy);
        if (!empty($terms)) {
          foreach ($terms as $term) {
            echo '<li><a href="' . get_term_link($term) . '">' . $term->name . '</a></li>';
          }
        }
        ?>
      </ul>
    </div>

    <div class="post-content">
      <?php while (have_posts()) : the_post(); ?>
        <?php $terms = get_the_terms($post->ID, 'tax_news'); ?>
        <div class="header-sub">
          <div class="post-title"><?php the_title(); ?></div>
          <ul class="post-category">
            <?php
            $terms = get_the_terms(get_the_ID(), 'vansayplus-category');
            foreach ($terms as $attr) {
              echo '<li>' . $attr->name . '</li>';
            }
            ?>
          </ul>
          <time datetime="<?php echo get_the_date("Y-m-d") ?>"><?php echo get_the_date("Y年m月d日") ?></time>
        </div>
        <p><?php the_content(); ?></p>
      <?php endwhile; ?>
    </div>

    <div class="page-direction">
      <a href="<?php echo home_url('/vansayplus') ?>">記事一覧へ</a>
      <ul>
        <li><?php previous_post_link('%link', '前の記事へ', true); ?></li>
        <li><?php next_post_link('%link', '次の記事へ', true); ?></li>
      </ul>
    </div>
  </div>
  </div>
</main>

<?php get_footer(); ?>