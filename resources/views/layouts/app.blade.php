<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title', 'Responsive Bootstrap 5 Template')</title>
  <!-- Bootstrap CSS -->
  @vite(['resources/scss/app.scss', 'resources/js/app.js' ,'resources/js/chonchon.js' ,'resources/scss/app.css'])
  <style>
    .footer {
      background-color: rgba(0, 0, 0, 0.2);
      padding: 10px 0 0 0;
      text-align: center;
    }

    body {
      font-family: "Century Gothic", 'Lato', sans-serif;
    }

    a {
      text-decoration: none;
    }

    .et-hero-tabs,
    .et-slide {
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      height: 100vh;
      position: relative;
      background: #eee;
      text-align: center;
      padding: 0 2em;
    }

    .et-hero-tabs-container {
      display: flex;
      flex-direction: row;
      position: absolute;
      bottom: 0;
      width: 100%;
      height: 70px;
      box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
      background: #fff;
      z-index: 10;
    }

    .et-hero-tabs-container--top {
      position: fixed;
      top: 0;
    }

    .et-hero-tab {
      display: flex;
      justify-content: center;
      align-items: center;
      flex: 1;
      color: #000;
      letter-spacing: 0.1rem;
      transition: all 0.5s ease;
      font-size: 0.8rem;
    }

    .et-hero-tab:hover {
      color: white;
      background: #9900ff;
      transition: all 0.5s ease;
    }

    .et-hero-tab-slider {
      position: absolute;
      bottom: 0;
      width: 0;
      height: 6px;
      background: #9900ff;
      transition: left 0.3s ease;
    }

    @media (min-width: 800px) {
      .et-hero-tabs,
      .et-slide {
        h1 {
          font-size: 3rem;
        }
        h3 {
          font-size: 1rem;
        }
      }
      .et-hero-tab {
        font-size: 1rem;
      }
    }

    .et-hero-tabs {
      background-position: center top;
      background-size: cover;
    }

    .background-video {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      object-fit: cover;
      z-index: 0;
    }

 
  </style>
</head>
<body>
@include('partials.header')



  <!-- Main Content -->
  <div class="container-fluid p-0">
    <section class="home">
      <!-- Section content here -->
    </section>
  </div>
  @yield('content')
  @include('partials.footer')

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script>
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
  </script>

</body>
</html>
