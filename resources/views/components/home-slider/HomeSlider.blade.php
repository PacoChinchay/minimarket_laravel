<body>
  <div class="slider">
    <div class="list">
      <div class="item">
        <img src="{{ asset('banners/banner-1.jpg') }}">
      </div>
      <div class="item">
        <img src="{{ asset('banners/banner-2.jpg') }}">
      </div>
      <div class="item">
        <img src="{{ asset('banners/banner-3.jpg') }}">
      </div>
    </div>
  
    <div class="buttons">
      <div id="prev">&lt;</div>
      <div id="next">&gt;</div>
    </div>
  
    <ul class="dots">
      <li class="active"></li>
      <li></li>
      <li></li>
    </ul>
  </div>
</body>

<style>
  body { margin: 0; font-family: monospace; }
  .slider { width: 100%; max-width: 100vw; height: 700px; margin: auto; position: relative; overflow: hidden; }
  .list { position: absolute; top: 0; left: 0; height: 100%; display: flex; width: max-content; transition: 1s; }
  .list .item img { width: 100vw; max-width: 100vw; height: 100%; object-fit: cover; }
  .buttons { position: absolute; top: 45%; left: 5%; width: 90%; display: flex; justify-content: space-between; }
  .buttons div { width: 50px; height: 50px; border-radius: 50%; background-color: #fff5; color: #fff; display: flex; align-items: center; justify-content: center; cursor: pointer; font-weight: bold; font-size: 20px; }
  .dots { position: absolute; bottom: 10px; left: 0; width: 100%; display: flex; justify-content: center; padding: 0; margin: 0; }
  .dots li { list-style: none; width: 10px; height: 10px; background-color: #fff; margin: 20px; border-radius: 20px; transition: 1s; }
  .dots li.active { width: 30px; }
  @media screen and (max-width: 768px) {
    .slider { height: 400px; }
  }
</style>


<script>
  document.addEventListener("DOMContentLoaded", function () {
    let list = document.querySelector('.slider .list');
    let items = document.querySelectorAll('.slider .list .item');
    let dots = document.querySelectorAll('.slider .dots li');
    let prev = document.getElementById('prev');
    let next = document.getElementById('next');

    let active = 0;
    let lengthItems = items.length;

    next.onclick = function () {
      active = (active + 1) % lengthItems;
      reloadSlider();
    }

    prev.onclick = function () {
      active = (active - 1 + lengthItems) % lengthItems;
      reloadSlider();
    }

    let refreshSlider = setInterval(() => {
      next.click()
    }, 3000);

    function reloadSlider() {
      let checkleft = items[active].offsetLeft;
      list.style.left = -checkleft + 'px';

      document.querySelector('.slider .dots li.active').classList.remove('active');
      dots[active].classList.add('active');

      clearInterval(refreshSlider);
      refreshSlider = setInterval(() => {
        next.click()
      }, 3000);
    }

    dots.forEach((li, key) => {
      li.addEventListener('click', function () {
        active = key;
        reloadSlider();
      });
    });
  });
</script>
