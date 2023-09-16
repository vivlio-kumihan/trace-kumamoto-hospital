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
//     };
//   );
  
//   gsap.fromTo(latestInfo, .3, {
//       y: 100,
//       opacity: 0,
//     }, {
//       y: 0,
//       opacity: 1,
//     };
//   );
// }, 1000);

if (document.querySelector('body.home')) {
  // swiper
  const mainSwiper = new Swiper(".swiper.main-visual", {
    loop: true,
    // スライドの数に対して半分に設定しないと途中ですぐに止まる。
    slidesPerView: 1,
    breakpoints: {
      750: {
        slidesPerView: 1.8,
      },
      1100: {
        slidesPerView: 2.2,
      },
      1500: {
        slidesPerView: 2.8,
      },
    },
    spaceBetween: 10,
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

  const vansayplusSwiper = new Swiper('.swiper.vansayplus-slide', {
    // Optional parameters
    
    loop: true,
    slidesPerView: 'auto',
    spaceBetween: 30,

    // Navigation arrows
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
  });

  // 当院からのお知らせ
  // 4つ目以上の記事を非表示にする。
  // const latestInfo = Array.from(document.querySelectorAll('.latest-info .post-archive > li'));
  // latestInfo.filter((elem, index) => index > 2)
  //           .map(elem => elem.classList.add('hidden-list'));

  // // 当院からのお知らせ
  // const catList = document.querySelectorAll('#category-menu li a');
  // const postAll = document.querySelectorAll('#post-archive > li');
  // catList.forEach(elem => {
  //   elem.addEventListener('click', (e) =>{
  //     // a要素の機能を無効化する。
  //     e.preventDefault();
  //     // data-categoryをjsで取りたい時、data-を抜いた名称になる。
  //     const targetCategory = e.target.dataset.category;
  //     // メソッドで返ってくる値
  //     // console.log(e);
  //     // => click { target: a, buttons: 0, clientX: 877, clientY: 463, layerX: 877, layerY: 815 }

  //     // console.log(e.target);
  //     // => <a data-category="recruit" href="">

  //     // console.log(e.target.dataset);
  //     // => DOMStringMap { category → "recruit" }

  //     // console.log(targetCategory);
  //     // => recruit

  //     // 2段階の下拵え
  //     // 前回かかっているかもしれないdisplay = 'none'を無効化する。
  //     postAll.forEach(post => post.style.display = '')
  //     // 前回つけた属性を解除する。
  //     catList.forEach(a => a.classList.remove('active'))

  //     e.target.classList.add('active');
  //     // data-category="all"で付与したall
  //     if (targetCategory !== 'all') {
  //       postAll.forEach(post => {
  //         if (!post.classList.contains(targetCategory)) {
  //           post.style.display = 'none'
  //         }
  //       })
  //     }
  //   }
  // )
  // // sectionをフワッと出す。
  // const sections = ['policy', 
  //               'outpatient-care-bg-image', 
  //               'outpatient-care', 
  //               'vansayplus-image', 
  //               'vansayplus',
  //               'wrapper-pick-up',
  //               'wrapper-service'];
  // sections.forEach(elem => {
  //   const sec = document.getElementById(elem)
  //   gsap.fromTo(sec, 1, {
  //     y: 100,
  //     opacity: 0,
  //   }, {
  //     y: 0,
  //     opacity: 1,
  //     ease: 'power1.easeInOut',
  //     scrollTrigger: {
  //       trigger: sec,
  //       start: 'top 90%',
  //       // markers: true
  //     }
  //   });
  // });

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
  // });
  // });

  // 当院からのお知らせのメニュー
  const menu = document.getElementById('category-menu');
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
    })
    tl.from(elem, {})
      .from(elem.children, {}, '-=0.25')
  })
}


// ボタン
const menuToggleBtn = document.getElementById('menu-toggle-btn');
const menuWrapper = document.getElementById('menu-wrapper')

menuToggleBtn.addEventListener('click', function() {
  this.classList.toggle('flag')
  menuWrapper.classList.toggle('flag')
});

// ハンバーガー・メニュー
// const toSectionLinkBtn = document.getElementById('to-section-link-btn')
// const contentsLinks = document.getElementById('contents-links')
// const linksLi = document.getElementById('contents-links').children

// // メニューの切り替え
// toSectionLinkBtn.addEventListener('click', function () {
//   this.classList.toggle('active')
//   this.nextElementSibling.classList.toggle('appear')
// })

// // リンクをクリックでページ内スクロールの際にメニューを閉じる。
// Array.from(linksLi).forEach(el => {
//   el.addEventListener('click', () => {
//     toSectionLinkBtn.classList.remove('active')
//     contentsLinks.classList.remove('appear')
//   })
// })

if (document.querySelector('body.archive')) {
  const ul = document.querySelector('#breadcrumbs ul');
  if (!ul) {
    document.querySelector('#breadcrumbs')
      .insertAdjacentHTML('afterbegin', 
      '<ul class="page-numbers"><li><span aria-current="page" class="page-numbers current">1</span></li></ul>');
  }
}

// footer, hamburger-menuのアローマーク
const li = Array.from(document.querySelectorAll(['footer .site-map ul li a', '.hamburger-menu > .main-menu > ul > li > a']));
li.map(l => {l.insertAdjacentHTML('afterbegin', '<span class="leading-arrow"></span>')});



// メニューを開く関数
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

let activeIndex = null; //開いているアコーディオンのindex

//アコーディオンコンテナ全てで実行
const menuList = Array.from(document.querySelectorAll('#hamburger-menu > .main-menu > .menu > li'));
const accordionMenuList = menuList.filter(list => list.querySelector('ul') !== null)
accordionMenuList.map(l => {l.insertAdjacentHTML('beforeend', '<button class="accordion-trigger-btn"><span></span><span></span></button>')});

// accordionMenuList.forEach((list, idx) => {
//   list.addEventListener('click', function(e) {
//     this.classList.add('active')
//   })

// })
// accordions.forEach((accordion) => {
//   //アコーディオンのトリガー全てで実行
//   const accordionTriggers = accordion.querySelectorAll('.job-type')
//   accordionTriggers.forEach((acoTrig, idx) => {
//     acoTrig.addEventListener('click', (e) => {
//       activeIndex = idx //クリックされたトリガーを把握
//       // parentNode => .job-type < li 
//       e.target.parentNode.classList.toggle('active') //トリガーの親要素（=ul>li)にクラスを付与／削除
//       const content = acoTrig.nextElementSibling //トリガーの次の要素（=ul>ul）
//       if(e.target.parentNode.classList.contains('active')){
//         slideDown(content) //クラス名がactive（＝閉じていた）なら上記で定義した開く関数を実行
//       }else{
//         slideUp(content) //クラス名にactiveがない（＝開いていた）なら上記で定義した閉じる関数を実行
//       }
//     })
//   })
// })