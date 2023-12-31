<?php get_header(); ?>

<main>
  <div id="loading" class="loading-wrapper keep">
    <div class="loading">
      <span></span>
      <span></span>
      <span></span>
      <span></span>
    </div>
  </div>
  <div class="swiper-container">
    <div class="swiper main-visual">
      <div class="swiper-wrapper">
        <div class="swiper-slide"><img src="<?php echo get_template_directory_uri(); ?>/img/mv_slide-kumamoto01.jpg" alt=""></div>
        <div class="swiper-slide"><img src="<?php echo get_template_directory_uri(); ?>/img/mv_slide-kumamoto02.jpg" alt=""></div>
        <div class="swiper-slide"><img src="<?php echo get_template_directory_uri(); ?>/img/mv_slide-kumamoto03.jpg" alt=""></div>
        <div class="swiper-slide"><img src="<?php echo get_template_directory_uri(); ?>/img/mv_slide-kumamoto04.jpg" alt=""></div>
        <div class="swiper-slide"><img src="<?php echo get_template_directory_uri(); ?>/img/mv_slide-kumamoto01.jpg" alt=""></div>
        <div class="swiper-slide"><img src="<?php echo get_template_directory_uri(); ?>/img/mv_slide-kumamoto02.jpg" alt=""></div>
        <div class="swiper-slide"><img src="<?php echo get_template_directory_uri(); ?>/img/mv_slide-kumamoto03.jpg" alt=""></div>
        <div class="swiper-slide"><img src="<?php echo get_template_directory_uri(); ?>/img/mv_slide-kumamoto04.jpg" alt=""></div>
      </div>
    </div>
    <div class="frame-divider"></div>
  </div>

  <div class="hero">
    <div class="site-title">
      <span>特定医療法人 萬生会 熊本第一病院</span>
    </div>
    <div id="head-copy" class="head-copy">
      <div class="catch-copy">その人らしさ<span>を</span></div>
      <div class="catch-copy">支える手</div>
      <div class="lead-copy">地域の皆さまの「その人らしい生き方」をささえる<br class="for-smp">ために、<br class="for-pc"> 手をおしまない医療、手厚い看護、<br class="for-smp">心をこめた介護を提供します。</div>
    </div>
    <a id="coverz-read-more-link" class="read-more-link" href="<?php echo home_url('/about') ?>">当院の特徴をみる</a>
  </div>

  <div class="cover-graphic">
    <div id="cover-graphic-bg-img" class="graphic">
      <img class="item left-yel-1" src="<?php echo get_template_directory_uri(); ?>/img/object_yellow_left.svg" alt="">
      <img class="item left-org-1" src="<?php echo get_template_directory_uri(); ?>/img/object_orange_left.svg" alt="">
      <img class="item left-org-2" src="<?php echo get_template_directory_uri(); ?>/img/object_orange_left.svg" alt="">
      <img class="item left-yel-2" src="<?php echo get_template_directory_uri(); ?>/img/object_yellow_left.svg" alt="">
      <img class="item left-org-3" src="<?php echo get_template_directory_uri(); ?>/img/object_orange_left.svg" alt="">
      <img class="item right-org-2" src="<?php echo get_template_directory_uri(); ?>/img/object_orange.svg" alt="">
      <img class="item right-org-1" src="<?php echo get_template_directory_uri(); ?>/img/object_orange.svg" alt="">
      <img class="item right-yel-1" src="<?php echo get_template_directory_uri(); ?>/img/object_yellow.svg" alt="">
    </div>
  </div>

  <section id="latest-info" class="latest-info">
    <h3>当院からの<br class="for-pc">お知らせ</h3>
    <div class="archive">
      <ul id="category-menu" class="category-menu">
        <li class="active"><a data-category="all" href="">すべて</a></li>
        <?php
        $categories = get_categories();
        if ($categories) {
          foreach ($categories as $category) {
            echo '<li><a data-category="' . $category->slug . '" href="">' . $category->name . '</a></li>';
          }
        }
        ?>
      </ul>
      <ul id="post-archive" class="post-archive">
        <?php
        $recent_page = get_query_var('paged') ? get_query_var('paged') : 1;
        $args = array(
          'post_type' => 'post',
          'posts_per_page' => -1,
          'paged' => $recent_page,
          'cat' => 'all'
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
                <div class="header-sub">
                  <time datetime="<?php echo get_the_date("Y-m-d") ?>"><?php echo get_the_date("Y.m.d") ?></time>
                  <ul class="post-category">
                    <?php
                    $category = get_the_category();
                    foreach ($category as $attr) {
                      echo '<li>' . $attr->name . '</li>';
                    }
                    ?>
                  </ul>
                </div>
                <div class="post-title"><?php the_title(); ?></div>
              </a>
            </li>
        <?php endwhile;
        endif; ?>
      </ul>
    </div>
  </section>

  <div class="wrapper to-archive">
    <a class="read-more-link" href="/news/">お知らせ一覧を見る</a>
  </div>

  <section id="policy" class="policy">
    <img class="item left-org-1" src="<?php echo get_template_directory_uri(); ?>/img/object_orange_left.svg" alt="">
    <img class="item right-org-2" src="<?php echo get_template_directory_uri(); ?>/img/object_orange2_2.svg" alt="">
    <img class="item right-org-1" src="<?php echo get_template_directory_uri(); ?>/img/object_orange2_1.svg" alt="">
    <img class="item left-org-2" src="<?php echo get_template_directory_uri(); ?>/img/object_orange_left.svg" alt="">
    <img class="item left-yel-1" src="<?php echo get_template_directory_uri(); ?>/img/object_yellow_left.svg" alt="">
    <ul>
      <li>
        <a href="<?php echo home_url('/outpatient') ?>">
          <div class="header">
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
          </div>
          <div class="content">
            <p>診療時間・診療担当医・受診手続きについてご覧いただけます。</p>
            <div class="read-more-link hover-area">詳しく見る</div>
          </div>
        </a>
      </li>
      <li>
        <a href="<?php echo home_url('/hospitalization'); ?>">
          <div class="header">
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
          </div>
          <div class="content">
            <p>入院手続き・入院中の過ごし方・施設設備についてご覧いただけます。</p>
            <div class="read-more-link hover-area">詳しく見る</div>
          </div>
        </a>
      </li>
      <li>
        <a href="<?php echo home_url('/departments') ?>">
          <div class="header">
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
          </div>
          <div class="content">
            <p>当院の診療部・看護部・事務部についてご覧いただけます。</p>
            <div class="read-more-link hover-area">詳しく見る</div>
          </div>
        </a>
      </li>
    </ul>
  </section>

  <section class="information">
    <div id="outpatient-care-bg-image" class="outpatient-care bg-image">
    </div>
    <div id="outpatient-care" class="outpatient-care">
      <div class="wrapper-outpatient-care">
        <div class="wrapper-inner">
          <img class="item left-org" src="<?php echo get_template_directory_uri(); ?>/img/左org.svg"></img>
          <img class="item left-yel" src="<?php echo get_template_directory_uri(); ?>/img/左yel.svg"></img>
          <img class="item right-org" src="<?php echo get_template_directory_uri(); ?>/img/右org.svg"></img>
          <img class="item right-yel" src="<?php echo get_template_directory_uri(); ?>/img/右yel.svg"></img>
          <h3>外来受診のご案内</h3>
          <dl>
            <div>
              <dt>
                <p>外来診療日</p>
              </dt>
              <dd>
                <p>月曜日〜金曜<span>（午前・午後）</span></p>
                <p>休診日：土曜、日曜、祝祭日、年末年始</p>
              </dd>
            </div>
            <div>
              <dt>
                <p class="clock-icon">受付時間</p>
              </dt>
              <dd>
                <p class="font-size-1dot7-lg">8:30-11:30/13:00-16:00</p>
                <p class="color-red">診療時間：9:30-12:00 / 13:30-17:00</p>
                <p class="color-red">金曜日は 14:00- 受付開始</p>
              </dd>
            </div>
          </dl>
          <div class="to-patient-guidance">
            <a href="">外来診療担当医表</a>
          </div>
        </div>
      </div>
    </div>

    <div class="about-us">
      <h3>当院について</h3>
      <ul class="wrapper-about-us">
        <li>
          <a href="/philosophy/">
            <div class="frame-about-us">
              <img src="<?php echo get_template_directory_uri(); ?>/img/_info_01_link_about (1).jpg" alt="">
            </div>
            <dl>
              <dt>病院概要</dt>
              <dd>当院の基本方針・患者様の権利についてご覧いただけます。</dd>
            </dl>
          </a>
        </li>
        <li>
          <a href="/result/">
            <div class="frame-about-us">
              <img src="<?php echo get_template_directory_uri(); ?>/img/_info_02_link_achievement (1).jpg" alt="">
            </div>
            <dl>
              <dt>治療実績・退院実績</dt>
              <dd>当院の主な治療実績・退院実績についてご覧いただけます。</dd>
            </dl>
          </a>
        </li>
        <li>
          <a href="/disaster/">
            <div class="frame-about-us">
              <img src="<?php echo get_template_directory_uri(); ?>/img/_info_03_link_strong (1).jpg" alt="">
            </div>
            <dl>
              <dt>災害に強い病院</dt>
              <dd>当院の災害時のライフライン対策についてご覧いただけます。</dd>
            </dl>
          </a>
        </li>
        <li>
          <a href="/message/">
            <div class="frame-about-us">
              <img src="<?php echo get_template_directory_uri(); ?>/img/_info_04_link_greeting (1).jpg" alt="">
            </div>
            <dl>
              <dt>ご挨拶</dt>
              <dd>病院長メッセージをご覧いただけます。</dd>
            </dl>
          </a>
        </li>
        <li>
          <a href="/introduction/">
            <div class="frame-about-us">
              <img src="<?php echo get_template_directory_uri(); ?>/img/_info_05_link_concerned (1).jpg" alt="">
            </div>
            <dl>
              <dt>医療関係の皆様へ</dt>
              <dd>当院から医療関係の皆様へ向けたご案内・お知らせをご覧いただけます。</dd>
            </dl>
          </a>
        </li>
        <li>
          <a href="/recruit/">
            <div class="frame-about-us">
              <img src="<?php echo get_template_directory_uri(); ?>/img/_info_06_link_recruit (1).jpg" alt="">
            </div>
            <dl>
              <dt>当法人で働きたい方へ</dt>
              <dd>ご自身の経験を活かしてみませんか？仕事への意欲をお持ちの方をお待ちしています。</dd>
            </dl>
          </a>
        </li>
      </ul>
    </div>

    <div id="vansayplus-image" class="vansayplus-image">VANSAY</div>
    <div id="vansayplus" class="vansayplus">
      <header>
        <div class="catch-copy">
          <p>萬生会グループがお届けする<br>健康情報メディア</p>
          <img class="vansay-logo" src="<?php echo get_template_directory_uri(); ?>/img/logo_vansay-plus.svg"></img>
        </div>
      </header>
      <div class="content">
        <div class="lead-copy">
          皆さまの暮らしに役立つ医療情報から生活の中で使えるコラムを掲載しております。
        </div>
        <div class="vansayplus-posts">
          <div class="swiper vansayplus-slide">
            <div class="swiper-wrapper post-archive">
              <?php
              $recent_page = get_query_var('paged') ? get_query_var('paged') : 1;
              $args = array(
                'post_type' => 'vansayplus',
                'posts_per_page' => -1,
                'paged' => $recent_page,
              );
              $my_query = new WP_Query($args);
              if ($my_query->have_posts()) : while ($my_query->have_posts()) : $my_query->the_post();
              ?>
                  <div class="swiper-slide">
                    <a href="<?php the_permalink(); ?>">
                      <div class="frame">
                        <?php the_post_thumbnail(); ?>
                      </div>
                      <div class="header-sub">
                        <time datetime="<?php echo get_the_date("Y-m-d") ?>"><?php echo get_the_date("Y.m.d") ?></time>
                        <ul class="post-category">
                          <?php
                          $terms = get_the_terms(get_the_ID(), 'vansayplus-category');
                          foreach ($terms as $attr) {
                            echo '<li>' . $attr->name . '</li>';
                          }
                          ?>
                        </ul>
                      </div>
                      <div class="post-title"><?php the_title(); ?></div>
                    </a>
                  </div>
              <?php endwhile;
              endif; ?>
            </div>
          </div>
          <div class="wrapper-button">
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
          </div>
          <a class="read-more-link" href="<?php echo home_url('/vansayplus') ?>">記事一覧を見る</a>
          <a class="to-link" href="<?php echo home_url('/vansayplus') ?>">記事一覧を見る</a>
        </div>
      </div>
    </div>

    <div class="another-info">
      <div id="wrapper-pick-up" class="wrapper pick-up">
        <h3>ピックアップ</h3>
        <ul>
          <li><a class="nursing-dep" href="<?php echo home_url('/nurse') ?>">看護部</a></li>
          <li><a class="physical-exam" href="<?php echo home_url('/health') ?>">健康診断</a></li>
          <li><a class="book-tour" href="<?php echo home_url('/contact') ?>">見学予約</a></li>
        </ul>
      </div>
      <div id="wrapper-service" class="wrapper service">
        <h3>関連施設・サービス</h3>
        <ul>
          <li>
            <a href="<?php echo home_url('/koshi-hospital') ?>">
              <div class="frame">
                <img src="<?php echo get_template_directory_uri(); ?>/img/link_koshi.jpg" alt="">
              </div>
              合志第一病院
            </a>
          </li>
          <li>
            <a href="<?php echo home_url('/zaitaku') ?>">
              <div class="frame">
                <img src="<?php echo get_template_directory_uri(); ?>/img/link_zaitaku.jpg" alt="">
              </div>
              在宅事業部
            </a>
          </li>
        </ul>
      </div>
    </div>
  </section>

  <section class="form-to-our-thoughts parallax-frame">
    <div class="parallax-bg-img"></div>
    <div class="border-circle">
      <a href="<?php echo home_url('/contact') ?>">
        <h2>Contact Us</h2>
        <p>We stand by your side in the fight against illness.</p>
      </a>
    </div>
  </section>
</main>

<?php get_footer(); ?>