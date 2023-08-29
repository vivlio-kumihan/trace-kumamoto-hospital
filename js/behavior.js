document.addEventListener("DOMContentLoaded", () => {
  const checkLinks = document.querySelectorAll('.category-menu ul li a');
  // const postArchive = document.querySelector('.post-archive');
  
  checkLinks.forEach(function(link) {
    link.addEventListener('click', function(e) {
      e.preventDefault();
      
      const catId = this.getAttribute('data-cat-id');
      console.log(catId)
      
    });
  });
});


// const categoryLists = document.querySelectorAll('.category-menu ul li a');
// const postArchive = document.querySelector('.post-archive');
// const postAll = document.querySelectorAll('.post-archive > li');
// categoryLists.forEach(elem => {
//   elem.addEventListener('click', (e) =>{
//     // a要素の機能を無効化する。
//     e.preventDefault()
//     // data-categoryをjsで取りたい時、data-を抜いた名称になる。
//     const targetCategory = e.target.dataset.category
//     console.log(targetCategory)
//     // 2段階の下拵え
//     // 前回かかっているかもしれないdisplay = 'none'を無効化する。
//     postAll.forEach(post => {
//       post.style.display = ''
//     })
//     // 前回つけた属性を解除する。
//     categoryLists.forEach(a => a.classList.remove('active'))
//     e.target.classList.add('active')
//     // data-category="all"で付与したall
//     if (targetCategory !== 'all') {
//       postAll.forEach(post => {
//         if (!post.classList.contains(targetCategory)) {
//           post.style.display = 'none'
//         }
//       })
//     }
//   })
// })