// document.addEventListener("DOMContentLoaded", () => {
//   const checkLinks = document.querySelectorAll('.category-menu ul li a');
//   // const postArchive = document.querySelector('.post-archive');
  
//   checkLinks.forEach(function(link) {
//     link.addEventListener('click', function(e) {
//       e.preventDefault();
      
//       const catId = this.getAttribute('data-cat-id');
//       console.log(catId)
      
//     });
//   });
// });


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
        } else {
          post.style.display = 'hidden'
        }
      })
    }
  });
});

// グローバル・メニューのサブ・メニュー出現
const subMenu = Array.from(document.querySelectorAll('.global-menu > ul.menu > li'));

subMenu.forEach(elem => {
  elem.addEventListener('mouseenter', function() {
    this.classList.add('active');
  });
  elem.addEventListener('mouseleave', function() {
    this.classList.remove('active');
  });
})