let aromaItemsAll = document.querySelectorAll('.aromabussiness-item');
aromaItemsAll.forEach(el => {
  el.addEventListener('click', function(e){
    this.classList.toggle('show');
  })
})