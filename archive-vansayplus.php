<?php get_header(); ?>

<main>
  <div class="front">
    <div class="site-title"><span>特定医療法人 萬生会 熊本第一病院</span></div>
    <h2>お知らせ</h2>
    <!-- <img class="divider" src="<?php echo get_template_directory_uri(); ?>/img/divider.png" alt=""> -->
  </div>

  <div class="container">

    <div class="section-link-menu">

      <header>記事カテゴリー</header>




      <h2>どっちがいいのかわからない。とりあえず後回し</h2>
      <hr>
      <!-- <ul>
      <?php
      $taxonomy = 'vansayplus-category'; // タクソノミーの名前を指定
      $terms = get_terms($taxonomy);

      if (!empty($terms)) {
        foreach ($terms as $term) {
          echo '<a href="' . get_term_link($term) . '">' . $term->name . '</a><br>';
        }
      }
      ?>
    </ul> -->

      <!-- <ul>
        <?php
        $id = $post->ID; // 投稿ID
        $taxonomy = 'vansayplus-category'; // タクソノミースラッグ
        $terms = get_the_terms($id, $taxonomy);
        foreach ($terms as $term) :
          $slug = $term->slug;  //タームのスラッグ
          $name = $term->name;  //タームの名前
          echo '<li><a href="/vansayplus/' . $slug . '">' . $name . '</a></li>';
        endforeach;
        ?>
      </ul> -->

      <a class="read-more-link" href="<?php echo home_url('/vansayplus') ?>">記事一覧を見る</a>

      <ul class="post-category">
        <?php
        $taxonomy = 'vansayplus-category'; // タクソノミーの名前を指定
        $terms = get_terms($taxonomy);

        if (!empty($terms)) {
          foreach ($terms as $term) {
            echo '<a href="' . get_term_link($term) . '">' . $term->name . '</a><br>';
          }
        }
        ?>
      </ul>
      <hr>






      <ul class="post-archive">
        <?php
        $recent_page = get_query_var('paged') ? get_query_var('paged') : 1;

        $args = array(
          'post_type' => 'vansayplus',
          'posts_per_page' => -1,
        );

        $my_query = new WP_Query($args);

        if ($my_query->have_posts()) : while ($my_query->have_posts()) : $my_query->the_post();
        ?>
            <li class="post -item">
              <a href="<?php the_permalink(); ?>">
                <div class="frame">
                  <?php the_post_thumbnail(); ?>
                </div>
                <div class="header-sub">
                  <ul class="post-category">
                    <?php
                    $category = get_the_category();
                    foreach ($category as $attr) {
                      echo '<li>' . $attr->name . '</li>';
                    }
                    ?>
                  </ul>
                  <time datetime="<?php echo get_the_date("Y-m-d") ?>"><?php echo get_the_date("Y年m月d日") ?></time>
                </div>
                <div class="post-title"><?php the_title(); ?></div>
                <!-- p要素で記事抜粋が必要なときはこの関数 => the_excerpt(); -->
                <!-- CPT UIのメニューから『アーカイブあり』をtrueにしておくのを忘れずに。 -->
              </a>
            </li>
        <?php endwhile;
        endif; ?>
      </ul>

      <div class="breadcrumbs">
        <?php
        $args = array(
          'type' => 'list',
          'current' => $recent_page,
          'total' => $my_query->max_num_pages,
          'prev_text' => '前のページ',
          'next_text' => '次のページ',
        );
        echo paginate_links($args);
        ?>
      </div>
    </div>
</main>

<?php get_footer(); ?>


<!-- 上手くいっているカテゴリーを置いておく -->
<!-- 

<a class="read-more-link" href="<?php echo home_url('/vansayplus') ?>">記事一覧を見る</a>

<ul class="post-category">
//  <?php
    //  $taxonomy = 'vansayplus-category'; // タクソノミーの名前を指定
    //  $terms = get_terms($taxonomy);
    //
    //  if (!empty($terms)) {
    //    foreach ($terms as $term) {
    //      echo '<a href="' . get_term_link($term) . '">' . $term->name . '</a><br>';
    //    }
    //  }
    //  
    ?>
</ul> 

-->