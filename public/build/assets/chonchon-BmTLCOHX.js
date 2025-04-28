class p extends HTMLElement{constructor(){super(),this.attachShadow({mode:"open"}),this.root=document.documentElement,this.svg}get activeEls(){return this.getAttribute("active-on")}connectedCallback(){this.setupSpark(),this.root.addEventListener("click",t=>{this.activeEls&&!t.target.matches(this.activeEls)||(this.setSparkPosition(t),this.animateSpark())})}animateSpark(){let t=[...this.svg.children],e=parseInt(t[0].getAttribute("y1")),l=e/2+"px",c=a=>{let i=`calc(${a} * (360deg / ${t.length}))`;return[{strokeDashoffset:e*3,transform:`rotate(${i}) translateY(${l})`},{strokeDashoffset:e,transform:`rotate(${i}) translateY(0)`}]},h={duration:660,easing:"cubic-bezier(0.25, 1, 0.5, 1)",fill:"forwards"};t.forEach((a,i)=>a.animate(c(i),h))}setSparkPosition(t){let e=this.root.getBoundingClientRect();this.svg.style.left=t.clientX-e.left-this.svg.clientWidth/2+"px",this.svg.style.top=t.clientY-e.top-this.svg.clientHeight/2+"px"}setupSpark(){let t=`
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
        ${Array.from({length:8},e=>'<line x1="50" y1="30" x2="50" y2="4"/>').join("")}
      </svg>
    `;this.shadowRoot.innerHTML=t,this.svg=this.shadowRoot.querySelector("svg")}}customElements.define("click-spark",p);const g=document.querySelector("click-spark"),k=document.getElementById("click-spark-color");k.addEventListener("change",r=>{g.style.setProperty("--click-spark-color",r.target.value)});$(".card").click(function(){$(this).toggleClass("flipped")});$(".flipper").click(function(){var r=$(event.target);return r.is("a")?!0:($(this).toggleClass("flip"),!1)});$(document).ready(function(){var r=null,t=null,e=70;function l(o,s){o.preventDefault();var n=$(s.attr("href")).offset().top-e+1;$("html, body").animate({scrollTop:n},600)}function c(){a(),i()}function h(){r&&f()}function a(){var o=$(".et-hero-tabs").offset().top+$(".et-hero-tabs").height()-e;$(window).scrollTop()>o?$(".et-hero-tabs-container").addClass("et-hero-tabs-container--top"):$(".et-hero-tabs-container").removeClass("et-hero-tabs-container--top")}function i(){var o,s;$(".et-hero-tab").each(function(){var n=$(this).attr("href"),d=$(n).offset().top-e,u=$(n).offset().top+$(n).height()-e;$(window).scrollTop()>d&&$(window).scrollTop()<u&&(o=n,s=$(this))}),(r!=o||r===null)&&(r=o,t=s,f())}function f(){var o=0,s=0;t&&(o=t.css("width"),s=t.offset().left),$(".et-hero-tab-slider").css("width",o),$(".et-hero-tab-slider").css("left",s)}$(".et-hero-tab").click(function(o){l(o,$(this))}),$(window).scroll(function(){c()}),$(window).resize(function(){h()})});
