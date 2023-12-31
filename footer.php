<?php if (is_page('contact')) : ?>
  <footer class="footer-contact">
    © Vansay.
  </footer>
<?php else : ?>
  <footer>
    <div class="upper">
      <div class="hospital-address">
        <div class="site-title"><a href="<?php echo home_url('/') ?>"><span>特定医療法人 萬生会 熊本第一病院</span></a></div>
        <address>
          &#12306;862-0965 熊本市南区田迎町田井島224<br>
          電話：<a href="tel:0963707333">096-370-7333</a><br>
          FAX：096-370-7334
        </address>
      </div>

      <div class="wrapper">
        <div class="site-map">
          <h2>サイトマップ</h2>
          <?php
          wp_nav_menu(array(
            'theme_location' => 'site-map',
            'container'      => '',
            'depth'          => 1,
          ));
          ?>
        </div>

        <div id="hamburger-menu" class="hamburger-menu">
          <h2>サイトマップ</h2>
          <div class="main-menu">
            <?php
            wp_nav_menu(array(
              'theme_location' => 'hamburger-menu',
              'container'      => '',
              'depth'          => 2,
            ));
            ?>
          </div>
        </div>
        <div class="group-link">
          <h2>萬生会グループリンク</h2>
          <ul>
            <li><a href="/vansay-top"><span class="leading-arrow"></span>萬生会総合トップ</a></li>
            <li><a href="/kumamoto-hospital"><span class="leading-arrow"></span>熊本第一病院</a></li>
            <li><a href="/koshi-hospital"><span class="leading-arrow"></span>合志第一病院</a></li>
            <li><a href="/zaitaku"><span class="leading-arrow"></span>在宅事業部</a></li>
          </ul>
        </div>
      </div>
    </div>
    <div class="lower">
      <a href="/privacy-policy">プライバシーポリシー</a>
      <small>© vansay.</small>
    </div>
  </footer>
<?php endif; ?>
<?php wp_footer(); ?>
</body>

</html>