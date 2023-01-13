var slices = 8;
var sliceDeg = 360 / slices;
var deg = 0;
var speed = 0;
var slowDownRand = 1;
var superDeg = deg + sliceDeg;
var isStopped = false;
var lock = false;

// DOM
var stop = document.getElementById("stop");
var start = document.getElementById("start");
var close = document.querySelectorAll('.js-close');
var hForm = document.querySelector('.js-h-form');
var wheel = document.querySelector('.js-wheel');
var hWrapper = document.querySelector('.js-h-wrapper');

// function startGame() {
//   console.log("Start Game");
//     if (getcookie('lotereya') === 'ok') {
//         return;
//     }
//     hWrapper.classList.remove('_hide');
//     setTimeout(function() {
//         hWrapper.style.display = 'block';
//     }, 500);
// }
//
// setTimeout(startGame, 10000);

function rand(min, max) {
    return Math.random() * (max - min) + min;
  }

function rotateWheel() {
    var a = deg % 360;
    document.getElementById('wheel-elem').style.transform = 'rotate(' + a + 'deg)';
    a += sliceDeg;
}

function stopRotate() {
    isStopped = true;
    stop.disabled = true;
}

function anim() {
    deg += speed;

    // Increment speed
    if (!isStopped && speed < 3) {
        speed = speed + 1 * 0.1;
    }

    // Decrement Speed
    if (isStopped) {
        if (!lock) {
            lock = true;
            slowDownRand = rand(0.994, 0.998);
        }
        speed = speed > 0.2 ? speed *= slowDownRand : 0;
    }

    if (deg >= superDeg) {
        document.getElementById('check').play();
        superDeg = superDeg + sliceDeg;
    }

    // Stopped!
    if (lock && !speed) {
        document.getElementById('final').play();
        openForm();
        return;
    }

    // drawImg();
    rotateWheel();
    window.requestAnimationFrame(anim);
};

function disabledBtn() {
    stop.disabled = false;
    start.disabled = true;
}

function closeForm() {
    hWrapper.classList.add('_hide');
    setTimeout(function() {
        hWrapper.style.display = 'none';
    }, 400);
    setcookie('lotereya', 'ok', (new Date).getTime() + (3 * 24 * 60 * 60 * 1000), '/');
}

function openForm() {
    hForm.classList.remove('_hide');
    wheel.classList.add('_hide');
    setTimeout(function() {
        wheel.style.display = 'none';
    }, 400);
    // setTimeout(function() {
    //     hForm.style.display = 'block';
    // }, 500);
}

function setcookie(name, value, expires, path, domain, secure)
{
  document.cookie =	name + "=" + escape(value) +
            ((expires) ? "; expires=" + (new Date(expires)) : "") +
            ((path) ? "; path=" + path : "") +
            ((domain) ? "; domain=" + domain : "") +
            ((secure) ? "; secure" : "");
}


/**
 * Получить значение куки по имени name
 *
 */
function getcookie(name)
{
  var cookie = " " + document.cookie;
  var search = " " + name + "=";
  var setStr = null;
  var offset = 0;
  var end = 0;

  if (cookie.length > 0)
  {
    offset = cookie.indexOf(search);

    if (offset != -1)
    {
      offset += search.length;
      end = cookie.indexOf(";", offset)

      if (end == -1)
      {
        end = cookie.length;
      }

      setStr = unescape(cookie.substring(offset, end));
    }
  }

  return setStr;
}
if (stop) {
	stop.addEventListener("click", stopRotate, false);
}
if (start) {
  start.addEventListener("click", function() {
      anim();
      disabledBtn();
  }, false);
}
Array.prototype.forEach.call(close, function(item) {
    item.addEventListener("click", closeForm, false);
});
