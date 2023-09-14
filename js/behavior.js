// ホーム用

// // ローディング
// function loaded() {
//   const loading = document.getElementById('openning-action')
//   loading.classList.add('action')
// }
// // ウィンドウを読み込んで2秒後には次に遷移する。
// window.addEventListener('load', () => {
//   // setTimeout(loaded, 0)
//   setTimeout(loaded, 2000)
// })
// // 最低でも５秒後には表示
// // setTimeout(loaded, 5000)

// setTimeout(() => {
//   const headCopy = document.getElementById('head-copy')
//   const latestInfo = document.getElementById('latest-info')

//   gsap.fromTo(headCopy.children, .3, {
//       y: 100,
//       opacity: 0,
//     }, {
//       y: 0,
//       opacity: 1,
//       ease: Power1.easeInOut,
//       stagger: .2 
//     }
//   )
  
//   gsap.fromTo(latestInfo, .3, {
//       y: 100,
//       opacity: 0,
//     }, {
//       y: 0,
//       opacity: 1,
//     }
//   )
// }, 1000)

const sections = ['policy', 
                  'outpatient-care-bg-image', 
                  'outpatient-care', 
                  'vansayplus-image', 
                  'vansayplus',
                  'wrapper-pick-up',
                  'wrapper-service']
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
      markers: true
    }
  })
})

// const oneAfterAnotherRow = document.querySelectorAll('#one-after-another-row')
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
//   })
// })


// swiper
if (document.querySelector('body.home')) {
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
  //           .map(elem => elem.classList.add('hidden-list'))

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
    });
  });

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
}


// CSSで代替のため不要
// // グローバル・メニューのサブ・メニュー出現
// const subMenu = Array.from(document.querySelectorAll('.global-menu > ul > li'));
// subMenu.forEach(elem => {
//   elem.addEventListener('mouseenter', function() {
//     console.log(this)
//     this.classList.add('active');
//   });
//   elem.addEventListener('mouseleave', function() {
//     this.classList.remove('active');
//   });
// })


// // ボタン要素を取得
// const buttons = document.querySelectorAll('.button');

// // 各ボタンにクリックイベントリスナーを追加
// buttons.forEach(button => {
//     button.addEventListener('click', () => {
//         // クリックされたボタンにactiveクラスを追加し、他のボタンからactiveクラスを削除
//         buttons.forEach(btn => {
//             btn.classList.remove('active');
//         });
//         button.classList.add('active');
//     });
// });

if (document.querySelector('body.archive')) {
  const ul = document.querySelector('#breadcrumbs ul')
  if (!ul) {
    document.querySelector('#breadcrumbs')
      .insertAdjacentHTML('afterbegin', 
      '<ul class="page-numbers"><li><span aria-current="page" class="page-numbers current">1</span></li></ul>')
  }
}

// footerのアローマーク
const li = Array.from(document.querySelectorAll('footer .site-map ul li'))
li.map(l => {l.insertAdjacentHTML('afterbegin', '<span></span>')})
