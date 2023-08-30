<?php get_header(); ?>

<main>
  <div class="hero">
    <div class="site-title">
      <span>特定医療法人 萬生会 熊本第一病院</span>
    </div>
    <div class="head-copy">
      <div class="catch-copy">その人らしさ<span>を</span><br><span>支える手</span></div>
      <div class="lead-copy">地域の皆さまの「その人らしい生き方」をささえるために、<br> 手をおしまない医療、手厚い看護、心をこめた介護を提供します。</div>
      <a class="read-more-link" href="">当院の特徴をみる</a>
    </div>
  </div>

  <div class="cover-graphic">
    <div class="graphic left">
      <img class="left-yel-1" src="<?php echo get_template_directory_uri(); ?>/img/object_yellow_left.svg" alt="">
      <img class="left-org-1" src="<?php echo get_template_directory_uri(); ?>/img/object_orange_left.svg" alt="">
      <img class="left-org-2" src="<?php echo get_template_directory_uri(); ?>/img/object_orange_left.svg" alt="">
      <img class="left-yel-2" src="<?php echo get_template_directory_uri(); ?>/img/object_yellow_left.svg" alt="">
      <img class="left-org-3" src="<?php echo get_template_directory_uri(); ?>/img/object_orange_left.svg" alt="">
    </div>
    <div class="graphic right">
      <img class="right-org-2" src="<?php echo get_template_directory_uri(); ?>/img/object_orange.svg" alt="">
      <img class="right-org-1" src="<?php echo get_template_directory_uri(); ?>/img/object_orange.svg" alt="">
      <img class="right-yel-1" src="<?php echo get_template_directory_uri(); ?>/img/object_yellow.svg" alt="">
    </div>
  </div>

  <section class="latest-info">
    <h3>当院からの<br>お知らせ</h3>
    <div class="archive">
      <ul class="category-menu">
        <li><a href="/news">すべて</a></li>
        <?php
        $categories = get_categories();
        if ($categories) {
          foreach ($categories as $category) {
            echo '<li><a data-category="' . $category->slug . '" href="">' . $category->name . '</a></li>';
          }
        }
        ?>
      </ul>
      <ul class="post-archive">
        <?php
        $recent_page = get_query_var('paged') ? get_query_var('paged') : 1;
        $args = array(
          'post_type' => 'post',
          'posts_per_page' => -1,
          'paged' => $recent_page,
        );
        $my_query = new WP_Query($args);
        if ($my_query->have_posts()) : while ($my_query->have_posts()) : $my_query->the_post();
            $category = get_the_category();
            $category_names = '';
            foreach ($category as $attr) {
              $category_names .= ' ' . $attr->slug;
            }
        ?>
        <li class="wrapper<?php echo $category_names; ?>">
          <a href="<?php the_permalink(); ?>">
            <time datetime="<?php echo get_the_date("Y-m-d") ?>"><?php echo get_the_date("Y.m.d") ?></time>
            <ul class="post-category">
              <?php
              $category = get_the_category();
              foreach ($category as $attr) {
                echo '<li>' . $attr->name . '</li>';
              }
              ?>
            </ul>
            <div class="post-title"><?php the_title(); ?></div>
          </a>
        </li>
        <?php endwhile; endif; ?>
      </ul>
    </div>
  </section>
  <div class="wrapper">
    <a class="read-more-link" href="">お知らせ一覧を見る</a>
  </div>

  <section class="policy">
    <dl>
      <dt>
        <div class="frame">
          <div class="bgimage outpatient"></div>
        </div>
        <div class="catch-copy">
          <p><span>地域の皆さま</span>の</p>
          <p>さまざまな症状を診察</p>
        </div>
        <div class="policy-title">
          <h3><span>01</span>外来</h3>
        </div>
      </dt>
      <dd>
        <p>診療時間・診療担当医・受診手続きについてご覧いただけます。</p>
        <a class="read-more-link" href="">詳しく見る</a>
      </dd>
    </dl>
    <dl>
      <dt>
        <div class="frame">
          <div class="bgimage hospitalization"></div>
        </div>
        <div class="catch-copy">
          <p><span>思いやりを大切に</span></p>
          <p>患者さまの回復を支援</p>
        </div>
        <div class="policy-title">
          <h3><span>02</span>入院</h3>
        </div>
      </dt>
      <dd>
        <p>入院手続き・入院中の過ごし方・施設設備についてご覧いただけます。</p>
        <a class="read-more-link" href="">詳しく見る</a>
      </dd>
    </dl>
    <dl>
      <dt>
        <div class="frame">
          <div class="bgimage treatment-sct"></div>
        </div>
        <div class="catch-copy">
          <p><span>患者さま</span>に<span>寄り添う</span></p>
          <p>適切な診療を提供</p>
        </div>
        <div class="policy-title">
          <h3><span>03</span>診療科・部門</h3>
        </div>
      </dt>
      <dd>
        <p>当院の診療部・看護部・事務部についてご覧いただけます。</p>
        <a class="read-more-link" href="">詳しく見る</a>
      </dd>
    </dl>
  </section>

  <section class="outpatient-care">
    <h3>外来受診のご案内</h3>
    <dl>
      <div>
        <dt>外来診療日</dt>
        <dd>
          <p>月曜日〜金曜（午前・午後）</p>
          <p>休診日：土曜、日曜、祝祭日、年末年始</p>
        </dd>
      </div>
      <div>
        <dt>受付時間</dt>
        <dd>
          8:30-11:30/13:00-16:00
          診療時間：9:30-12:00 / 13:30-17:00
          金曜日は 14:00- 受付開始
        </dd>
      </div>
    </dl>
    <div class="to-patient-guidance">
      <a href="">外来診療担当医表</a>
    </div>
  </section>

  <section class="about-us">
    <h3>当院について</h3>
    <dl>
      <div>
        <dt>病院概要</dt>
        <dd>当院の基本方針・患者様の権利についてご覧いただけます。</dd>
      </div>
      <div>
        <dt>治療実績・退院実績</dt>
        <dd>当院の主な治療実績・退院実績についてご覧いただけます。</dd>
      </div>
      <div>
        <dt>災害に強い病院</dt>
        <dd>当院の災害時のライフライン対策についてご覧いただけます。</dd>
      </div>
      <div>
        <dt>ご挨拶</dt>
        <dd>病院長メッセージをご覧いただけます。</dd>
      </div>
      <div>
        <dt>医療関係の皆様へ</dt>
        <dd>当院から医療関係の皆様へ向けたご案内・お知らせをご覧いただけます。</dd>
      </div>
      <div>
        <dt>当法人で働きたい方へ</dt>
        <dd>ご自身の経験を活かしてみませんか？仕事への意欲をお持ちの方をお待ちしています。</dd>
      </div>
    </dl>
  </section>

  <ul class="post-archive">
    <?php
    $recent_page = get_query_var('paged') ? get_query_var('paged') : 1;
    $args = array(
      'post_type' => 'media-post',
      'posts_per_page' => 3,
      'paged' => $recent_page,
    );
    $my_query = new WP_Query($args);
    if ($my_query->have_posts()) : while ($my_query->have_posts()) : $my_query->the_post();
    ?>
        <li>
          <a href="<?php the_permalink(); ?>">
            <time datetime="<?php echo get_the_date("Y-m-d") ?>"><?php echo get_the_date("Y.m.d") ?></time>
            <ul class="post-category">
              <?php
              $terms = get_the_terms(get_the_ID(), 'media-post-category');
              foreach ($terms as $attr) {
                echo '<li>' . $attr->name . '</li>';
              }
              ?>
            </ul>
            <div class="post-title"><?php the_title(); ?></div>
          </a>
        </li>
    <?php endwhile;
    endif; ?>
  </ul>
  <section class="posts-archive">
    <header>
      <div class="catch-copy">
        萬生会グループがお届けする<br>健康情報メディア
      </div>
      <img class="vansay-logo" src=""></img>
    </header>
    <div class="content">
      <div class="lead-copy">
        皆さまの暮らしに役立つ医療情報から生活の中で使えるコラムを掲載しております。
      </div>
      <!-- archive -->
      <!-- 要素：アイキャッチ画像、日付、カテゴリー、タイトル -->
      <a class="read-more-link" href="">記事一覧を見る</a>
    </div>
  </section>

  <section class="another-info">
    <div class="pick-up">
      <h3>ピックアップ</h3>
      <ul>
        <li>看護部</li>
        <li>健康診断</li>
        <li>見学予約</li>
      </ul>
    </div>
    <div class="service">
      <h3>関連施設・サービス</h3>
      <ul>
        <li>合志第一病院</li>
        <li>在宅事業部</li>
      </ul>
    </div>
  </section>
</main>

<?php get_footer(); ?>