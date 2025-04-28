class ClickSpark extends HTMLElement {
  constructor() {
    super();
    this.attachShadow({ mode: "open" });
    this.root = document.documentElement;
    this.svg;
  }

  get activeEls() {
    return this.getAttribute("active-on");
  }

  connectedCallback() {
    this.setupSpark();

    this.root.addEventListener("click", (e) => {
      if (this.activeEls && !e.target.matches(this.activeEls)) return;

      this.setSparkPosition(e);
      this.animateSpark();
    });
  }

  animateSpark() {
    let sparks = [...this.svg.children];
    let size = parseInt(sparks[0].getAttribute("y1"));
    let offset = size / 2 + "px";

    let keyframes = (i) => {
      let deg = `calc(${i} * (360deg / ${sparks.length}))`;

      return [
        {
          strokeDashoffset: size * 3,
          transform: `rotate(${deg}) translateY(${offset})`
        },
        {
          strokeDashoffset: size,
          transform: `rotate(${deg}) translateY(0)`
        }
      ];
    };

    let options = {
      duration: 660,
      easing: "cubic-bezier(0.25, 1, 0.5, 1)",
      fill: "forwards"
    };

    sparks.forEach((spark, i) => spark.animate(keyframes(i), options));
  }

  setSparkPosition(e) {
    let rect = this.root.getBoundingClientRect();

    this.svg.style.left =
      e.clientX - rect.left - this.svg.clientWidth / 2 + "px";
    this.svg.style.top =
      e.clientY - rect.top - this.svg.clientHeight / 2 + "px";
  }

  setupSpark() {
    let template = `
      <style>
        :host {
          display: contents;
        }
        
        svg {
          pointer-events: none;
          position: absolute;
          rotate: -20deg;
          stroke: var(--click-spark-color, currentcolor);
        }

        line {
          stroke-dasharray: 30;
          stroke-dashoffset: 30;
          transform-origin: center;
        }
      </style>
      <svg width="30" height="30" viewBox="0 0 100 100" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="4">
        ${Array.from(
          { length: 8 },
          (_) => `<line x1="50" y1="30" x2="50" y2="4"/>`
        ).join("")}
      </svg>
    `;

    this.shadowRoot.innerHTML = template;
    this.svg = this.shadowRoot.querySelector("svg");
  }
}

customElements.define("click-spark", ClickSpark);

/** Demo scripts **/

const spark = document.querySelector("click-spark");
const colorPicker = document.getElementById("click-spark-color");

colorPicker.addEventListener("change", (e) => {
  spark.style.setProperty("--click-spark-color", e.target.value);
});

$('.card').click(function(){
  $(this).toggleClass('flipped');
});



$(".flipper").click(function() {
  var target = $( event.target );
  if ( target.is("a") ) {
    //follow that link
    return true;
  } else {
    $(this).toggleClass("flip");
  }
  return false;
});





$(document).ready(function() {
  var currentId = null;
  var currentTab = null;
  var tabContainerHeight = 70;

  function onTabClick(event, element) {
    event.preventDefault();
    var scrollTop = $(element.attr('href')).offset().top - tabContainerHeight + 1;
    $('html, body').animate({ scrollTop: scrollTop }, 600);
  }

  function onScroll() {
    checkTabContainerPosition();
    findCurrentTabSelector();
  }

  function onResize() {
    if (currentId) {
      setSliderCss();
    }
  }

  function checkTabContainerPosition() {
    var offset = $('.et-hero-tabs').offset().top + $('.et-hero-tabs').height() - tabContainerHeight;
    if ($(window).scrollTop() > offset) {
      $('.et-hero-tabs-container').addClass('et-hero-tabs-container--top');
    } else {
      $('.et-hero-tabs-container').removeClass('et-hero-tabs-container--top');
    }
  }

  function findCurrentTabSelector() {
    var newCurrentId;
    var newCurrentTab;
    $('.et-hero-tab').each(function() {
      var id = $(this).attr('href');
      var offsetTop = $(id).offset().top - tabContainerHeight;
      var offsetBottom = $(id).offset().top + $(id).height() - tabContainerHeight;
      if ($(window).scrollTop() > offsetTop && $(window).scrollTop() < offsetBottom) {
        newCurrentId = id;
        newCurrentTab = $(this);
      }
    });
    if (currentId != newCurrentId || currentId === null) {
      currentId = newCurrentId;
      currentTab = newCurrentTab;
      setSliderCss();
    }
  }

  function setSliderCss() {
    var width = 0;
    var left = 0;
    if (currentTab) {
      width = currentTab.css('width');
      left = currentTab.offset().left;
    }
    $('.et-hero-tab-slider').css('width', width);
    $('.et-hero-tab-slider').css('left', left);
  }

  $('.et-hero-tab').click(function(event) {
    onTabClick(event, $(this));
  });

  $(window).scroll(function() {
    onScroll();
  });

  $(window).resize(function() {
    onResize();
  });
});