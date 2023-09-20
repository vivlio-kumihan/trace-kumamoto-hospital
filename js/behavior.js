// .home only start
if (document.querySelector('body.home')) {
  // ローディング・アニメーション
  function loaded() {
    const loading = document.getElementById('loading');
    loading.classList.remove('keep');

    const items = document.getElementById('head-copy');
    const coverGraphicBgImgLeft = document.getElementById('cover-graphic-bg-img-left');
    const coverGraphicBgImgRight = document.getElementById('cover-graphic-bg-img-right');
    const tl = gsap.timeline();
    tl
      .from(items.children, 1, {
        y: 200,
        opacity: 0,
        ease: 'power3.inOut',
        stagger: .2
      })
      .from(coverGraphicBgImgLeft.children, 4, {
        y: -200,
        opacity: 0,
        ease: Elastic.easeOut.config(1, 0.3),
        stagger: .2
      }, '-=1.5')
      .from(coverGraphicBgImgRight.children, 4, {
        y: -500,
        opacity: 0,
        ease: Elastic.easeOut.config(1, 0.3),
        stagger: .2
      }, '<')

    const coverzReadMoreLink = document.getElementById('coverz-read-more-link');
    coverzReadMoreLink.classList.add('active');
  }
  // ウィンドウを読み込んで2秒後には次に遷移する。
  window.addEventListener('load', () => {
    setTimeout(loaded, 1500)
  });

  // // 最低でも５秒後には表示
  // setTimeout(loaded, 5000)


  // header下のスライダー
  const mainSwiper = new Swiper(".swiper.main-visual", {
    loop: true,
    // スライドの数に対して半分に設定しないと途中ですぐに止まる。
    slidesPerView: 1,
    spaceBetween: 0,
    breakpoints: {
      576: {
        slidesPerView: 1,
      },
      700: {
        slidesPerView: 2.2,
        spaceBetween: 10,
      },
      1100: {
        slidesPerView: 2.5,
        spaceBetween: 10,
      },
      1500: {
        slidesPerView: 2.8,
        spaceBetween: 10,
      },
    },
    speed: 9000,
    allowTouchMove: false, // swipeを無効にする。
    autoplay: {
      delay: 0
      // reverseDirection: true, // 逆方向有効化
    }
    // スライドの動き等速にするCSSの必須設定。JS設定をしたら忘れずに。
    // .swiper-wrapper {
    //   transition-timing-function: linear;
    // }
  });
  

  // バンセイプラスのスライダー
  const vansayplusSwiper = new Swiper('.swiper.vansayplus-slide', {
    // Optional parameters
    loop: true,
    slidesPerView: 'auto',
    spaceBetween: 25,
    // Navigation arrows
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
  });
  
  
  // 当院からのお知らせ
  // 当院からのお知らせのメニュー項目をアクティブ付けてアミを濃くする。
  const categoryMenu = document.getElementById('category-menu');
  const menuList = Array.from(categoryMenu.children);
  
  menuList.forEach(elem => {
    elem.addEventListener('click', () => {
      // すべてのリスト項目から 'active' クラスを削除
      menuList.forEach(item => {
        item.classList.remove('active');
      });
  
      // クリックされたリスト項目に 'active' クラスを追加
      elem.classList.add('active');
    });
  });
  
  // // 4つ目以上の記事を非表示にする。
  // // これをすると検索に引っ掛からなくなる。
  // const latestInfo = Array.from(document.querySelectorAll('.latest-info .post-archive > li'));
  // latestInfo.filter((elem, index) => index > 2)
  //           .map(elem => elem.classList.add('hidden-list'));
  
  // 当院からのお知らせ
  const catList = document.querySelectorAll('#category-menu li a');
  const postAll = document.querySelectorAll('#post-archive > li');

  function adjustWrapperHeight(targetCategory = 'all') {
    let wrapperHeight = 0
    let addWrapperHeight = 0
    // data-category="all"で付与したall
    postAll.forEach(post => {
      if (targetCategory !== 'all' && !post.classList.contains(targetCategory)) {
        post.style.display = 'none'
      } else {
        if (addWrapperHeight < 3) {
          wrapperHeight += post.clientHeight
          addWrapperHeight++
        }
      }
    })
    document.getElementById('post-archive').style.height = `${wrapperHeight}px`
  }
  adjustWrapperHeight()

  catList.forEach(elem => {
    elem.addEventListener('click', (e) =>{
      // a要素の機能を無効化する。
      e.preventDefault();
      // data-categoryをjsで取りたい時、data-を抜いた名称になる。
      const targetCategory = e.target.dataset.category;
      // メソッドで返ってくる値
      // console.log(e);
      // => click { target: a, buttons: 0, clientX: 877, clientY: 463, layerX: 877, layerY: 815 }
  
      // console.log(e.target);
      // => <a data-category="recruit" href="">
  
      // console.log(e.target.dataset);
      // => DOMStringMap { category → "recruit" }
  
      // console.log(targetCategory);
      // => recruit
  
      // 2段階の下拵え
      // 前回かかっているかもしれないdisplay = 'none'を無効化する。
      postAll.forEach(post => post.style.display = '')
      // 前回つけた属性を解除する。
      catList.forEach(a => a.classList.remove('active'))
  
      e.target.classList.add('active');

      adjustWrapperHeight(targetCategory)
    })
  })
  
  // sectionをフワッと出す。
  const sections = ['policy', 
                    'outpatient-care-bg-image', 
                    'outpatient-care', 
                    'vansayplus-image', 
                    'vansayplus',
                    'wrapper-pick-up',
                    'wrapper-service'];
  sections.forEach(elem => {
    const sec = document.getElementById(elem)
    gsap.fromTo(sec, 1, {
      y: 100,
      opacity: 0,
    }, {
      y: 0,
      opacity: 1,
      ease: 'power1.easeInOut',
      scrollTrigger: {
        trigger: sec,
        start: 'top 90%',
        // markers: true
      }
    });
  });

  // section policyのアニメーション
  const policyBgGraphics = document.querySelectorAll(('#policy .item'))
  gsap.from(policyBgGraphics, 3, {
    y: -200,
    opacity: 0,
    ease: Elastic.easeOut.config(-1, 0.3),
    stagger: .1,
    scrollTrigger: {
      trigger: policyBgGraphics,
      start: 'top 20%',
      // markers: true,
    }
  })
  const aboutUsBgGraphics = document.querySelectorAll(('#outpatient-care .item'))
  gsap.from(aboutUsBgGraphics, 3, {
    y: -200,
    opacity: 0,
    ease: Elastic.easeOut.config(-1, 0.3),
    stagger: .1,
    scrollTrigger: {
      trigger: aboutUsBgGraphics,
      start: 'top 60%',
      // markers: true,
    }
  })
}
// .home only end


// パンくずリストのイレギュラーな処理
if (document.querySelector('body.archive')) {
  const ul = document.querySelector('#breadcrumbs ul');
  if (!ul) {
    document.querySelector('#breadcrumbs')
      .insertAdjacentHTML('afterbegin', 
      '<ul class="page-numbers"><li><span aria-current="page" class="page-numbers current">1</span></li></ul>');
  }
}


// ハンバーガー・メニュー
// ボタン
const menuToggleBtn = document.getElementById('menu-toggle-btn');
const menuWrapper = document.getElementById('menu-wrapper');
const menu = document.querySelector('.hamburger-menu > .main-menu > .menu');
const groupLink = document.querySelector('.hamburger-menu .group-link');
let isMenuVisible = false;

menuToggleBtn.addEventListener('click', function() {
  // ボタンの表示を切り替える。
  this.classList.toggle('flag')
  // メニューを出現させる。
  menuWrapper.classList.toggle('flag');

  if (!isMenuVisible) {
    // 項目を徐々に出す。
    const tl = gsap.timeline({
      defaults: {
        scaleY: .75,
        transformOrigin: '0 0',
        opacity: 0,    // 初期状態: 不透明度0
        duration: 1,   // アニメーションの時間（秒）
        ease: "power3.inOut", // イージング
        stagger: 0.1,  // 子要素ごとの遅延時間
      }
    })
    tl.from(menu.children, {})
      .from(groupLink.children, {}, '-=1')
  }
  isMenuVisible = !isMenuVisible;
});

// footer, hamburger-menuのアローマーク
const li = Array.from(document.querySelectorAll(['footer .site-map ul li a', '.hamburger-menu > .main-menu > ul > li > a']));
li.map(l => {l.insertAdjacentHTML('afterbegin', '<span class="leading-arrow"></span>')});

// 収納されているメニューの高さを調べてメニューを開く。
const slideDown = (elem) => {
  elem.style.height = 'auto'; //いったんautoに
  let getHeight = elem.offsetHeight; //autoにした要素から高さを取得
  elem.style.height = getHeight + 'px';
  elem.animate([ //高さ0から取得した高さまでのアニメーション
    { height: 0 },
    { height: getHeight + 'px' }
  ], {
    duration: 300, //アニメーションの時間（ms）
  });
};

// メニューを閉じる関数
const slideUp = (elem) => {
  elem.style.height = 0;
};

// アコーディオン・メニューが仕込んであるリストを収集する。
const accordionMenuList = Array.from(document.querySelectorAll('#hamburger-menu > .main-menu > .menu > li'))
                          .filter(list => list.querySelector('ul') !== null);
// アコーディオン・メニューにトグル・ボタンを設置する。
accordionMenuList.map(l => {
  l.insertAdjacentHTML('beforeend', '<button class="accordion-trigger-btn"><span></span><span></span></button>')
});
// 改めてトグル・ボタンを収集する。
const accordionMenuListBtn = Array.from(document.querySelectorAll('.accordion-trigger-btn'));
// トグル・ボタンをクリックしてメニューの開閉。
accordionMenuListBtn.forEach((btn, idx) => {
  btn.addEventListener('click', function() {
    this.classList.toggle('active');
    const toggledTarget = btn.previousElementSibling;
    const flag = toggledTarget.classList.toggle('active');
    if (flag) {
      slideDown(toggledTarget);
    } else {
      slideUp(toggledTarget);
    }
    accordionMenuList[idx].classList.toggle('plus-padding-bottom');
  });
})

// contact form7でフォームを確認した旨のインフォメーション画面を作る際に必要。
// contact form7でフォームを送信したらできるインスタンス
// その中にある情報からurlを抜き出し、あらかじめ作っておいた固定ページのurlに飛ぶ仕組み。
document.addEventListener('wpcf7mailsent', function () {
  window.location.href = location.protocol + '//' + location.hostname + '/thanks';
});



// footer前のcontact formへの導入
let getRatio = (el) => {
  return window.innerHeight / (window.innerHeight + el.offsetHeight);
};

document.querySelectorAll('.parallax-frame').forEach(section => {
  const bg = section.querySelector('.parallax-bg-img');
  gsap.fromTo(bg, {
    backgroundPosition: `50% ${-window.innerHeight * getRatio(section)}px`
  }, {
    backgroundPosition: () => `50% ${ window.innerHeight * (1 - getRatio(section)) }px`,
    ease: 'none',
    scrollTrigger: {
      trigger: section,
      start: 'top bottom',
      end: 'bottom top',
      scrub: true,
      invalidateOnRefresh: true,
      // markers: true
    }
  })
})


// 設置延期
// // サイドメニューを止めて、メインの読み物をスクロールさせる。
// // サイドとメインの『2つのpin』を用意する。
// // サイドをどこで止めるかを『start: 'top 10%'』で、
// // サイドをどのタイミングでメインと同期させるかを、
// // メインをpinにして決める。
// ScrollTrigger.create({
//   trigger: '.category-link-menu',
//   start: 'top 10%',
//   endTrigger: '.post-content',
//   end: 'bottom bottom', 
//   pin: true,
//   markers: true,
// })




// // 一文字ずつ現れるサンプル
// const para = document.querySelectorAll('.effect-para p');

// const splitPara = () => {
//   Array.from(para).forEach((p) => {
//     p.innerHTML = p.textContent.split('')
//       .map((char) => {
//         return char === ' ' ? `<span>${ '&nbsp;' }</span>` : `<span>${ char }</span>`;
//       })
//       .join('');
//   });
// };

// splitPara(para);

// para.forEach(elem => {
//   const tl = gsap.timeline({
//     defaults: {
//       opacity: 0,
//       ease: 'power1.inOut',
//       stagger: .1
//     },
//     scrollTrigger: {
//       trigger: elem,
//       start: 'top center',
//       // markers: true
//     }
//   });
//   tl.from(elem, {})
//     .from(elem.children, {}, '-=0.25')
// })


// // staggerを使ったサンプル
// const oneAfterAnotherRow = document.querySelectorAll('#one-after-another-row');
// oneAfterAnotherRow.forEach(elem => {
//   // 要素の子要素へアクセスはこれだけ。超絶賢い。
//   gsap.from(elem.children, .7, {
//     opacity: 0,
//     ease: 'power3.easeOut',
//     // ↓ 0.25秒ずつ延滞させて処理する。これだけ。
//     stagger: .25,
//     scrollTrigger: {
//       trigger: elem,
//       start: 'top 80%',
//       // markers: true,
//     },
//   });
// })