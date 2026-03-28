(function () {
  var toggle = document.querySelector('.menu-toggle');
  var menu = document.getElementById('main-menu');

  if (toggle && menu) {
    toggle.addEventListener('click', function () {
      menu.classList.toggle('open');
    });
  }

  var tabs = document.querySelector('[data-gallery-tabs]');
  var grid = document.querySelector('[data-gallery-grid]');

  if (tabs && grid) {
    var buttons = tabs.querySelectorAll('button');
    var items = grid.querySelectorAll('[data-category]');

    tabs.addEventListener('click', function (event) {
      var target = event.target.closest('button');
      if (!target) return;

      var filter = target.getAttribute('data-filter');
      buttons.forEach(function (btn) {
        btn.classList.toggle('active', btn === target);
      });

      items.forEach(function (item) {
        var category = item.getAttribute('data-category');
        var show = filter === 'all' || category === filter;
        item.style.display = show ? 'block' : 'none';
      });
    });
  }
})();
