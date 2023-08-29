<div class="category-menu">
  <header>記事カテゴリー</header>
  <ul>
    <li><a href="<?php echo esc_url(home_url('/')); ?>">すべて</a></li>
    <?php
    $categories = get_categories();
    if ($categories) {
        foreach ($categories as $category) {
          echo '<li><a href="' . get_category_link($category->term_id) . '?cat_id=' . $category->term_id . '">' . $category->name . '</a></li>';
        }
    }
    ?>
  </ul>
</div>

<ul class="post-archive">
    <?php
    $recent_page = get_query_var('paged') ? get_query_var('paged') : 1;
    $category_id = get_query_var('cat'); // カテゴリーIDを取得

    $args = array(
        'post_type' => 'post',
        'posts_per_page' => 10,
        'paged' => $recent_page,
        'cat' => $category_id, // カテゴリーIDをフィルタリングに使用
    );

    $my_query = new WP_Query($args);
    if ($my_query->have_posts()) : while ($my_query->have_posts()) : $my_query->the_post();
    ?>
            <!-- 記事の表示コード -->
    <?php endwhile;
    endif; ?>
</ul>