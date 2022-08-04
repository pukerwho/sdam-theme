let tabsBtn = document.querySelectorAll('.tab-btn');
let tabsContent = document.querySelectorAll('.tab-content');

function tabRemove() {
  tabsContent.forEach((item) => {
    item.classList.add('hidden');
  })
  tabsBtn.forEach((tab) => {
    tab.classList.remove('bg-primary');
    tab.classList.add('bg-main-gray');
  })
}

function tabAdd(tabContent, item) {
  tabContent.classList.remove('hidden');
  item.classList.add('bg-primary')
  item.classList.remove('bg-main-gray');
}

tabsBtn.forEach((item) => {
  item.addEventListener('click', () => {
    tabData = item.dataset.tab;
    let tabContent = document.querySelector('.tab-content[data-tab="' + tabData + '"]');
    tabRemove();
    tabAdd(tabContent, item);
  })
})