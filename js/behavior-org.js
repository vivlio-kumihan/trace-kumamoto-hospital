// ホーム用

// // ローディング 動きが不自然なので改良する。
// function loaded() {
//   const loading = document.getElementById('openning-action');
//   loading.classList.add('action');
// };
// // ウィンドウを読み込んで2秒後には次に遷移する。
// window.addEventListener('load', () => {
//   // setTimeout(loaded, 0);
//   setTimeout(loaded, 2000);
// })
// // 最低でも５秒後には表示
// // setTimeout(loaded, 5000);

// setTimeout(() => {
//   const headCopy = document.getElementById('head-copy');
//   const latestInfo = document.getElementById('latest-info');

//   gsap.fromTo(headCopy.children, .3, {
//       y: 100,
//       opacity: 0,
//     }, {
//       y: 0,
//       opacity: 1,
//       ease: Power1.easeInOut,
//       stagger: .2 
//     }
//   );
  
//   gsap.fromTo(latestInfo, .3, {
//       y: 100,
//       opacity: 0,
//     }, {
//       y: 0,
//       opacity: 1,
//     }
//   );
// }, 1000);


if (document.querySelector('body.home')) {}



  // 当院からのお知らせ

  // 当院からのお知らせのメニュー項目をアクティブ付けてアミを濃くする。
  // const menu = document.getElementById('category-menu');
  const menuList = Array.from(menu.children);

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
      // data-category="all"で付与したall
      if (targetCategory !== 'all') {
        postAll.forEach(post => {
          if (!post.classList.contains(targetCategory)) {
            post.style.display = 'none'
          }
        })
      }
    }
  )




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


  // 一文字ずつ現れる
  const para = document.querySelectorAll('.effect-para p');

  const splitPara = () => {
    Array.from(para).forEach((p) => {
      p.innerHTML = p.textContent.split('')
        .map((char) => {
          return char === ' ' ? `<span>${ '&nbsp;' }</span>` : `<span>${ char }</span>`;
        })
        .join('');
    });
  };

  splitPara(para);

  para.forEach(elem => {
    const tl = gsap.timeline({
      defaults: {
        opacity: 0,
        ease: 'power1.inOut',
        stagger: .1
      },
      scrollTrigger: {
        trigger: elem,
        start: 'top center',
        // markers: true
      }
    });
    tl.from(elem, {})
      .from(elem.children, {}, '-=0.25')
  })
})

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