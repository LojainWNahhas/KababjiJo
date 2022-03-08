

<header>
    <div class="header-top top-layout-02">
      <div class="container">
        <div class="topbar-left">
          <div class="topbar-content">
            <div class="item"> 
              <a href="https://goo.gl/maps/Ng4jvLQ8EqzrPX159"> <div class="wg-contact"><i class="fa fa-map-marker"></i><span>Mecca Street Opposite Marmara Hotel</span></div></a>
            </div>
            <div class="item"> 
              <a href="tel:+96265561065"> <div class="wg-contact"><i class="fa fa-phone"></i><span>(06) 556 1065</span></div></a>
            </div>
          </div>
        </div>
        <div class="topbar-right">
          <div class="topbar-content">
            <div class="item">
              <ul class="socials-nb list-inline wg-social">
                <li><a href="https://ar-ar.facebook.com/kababjijo/"><i class="fa fa-facebook"></i></a></li>
                <li><a href="https://www.instagram.com/kababji_jordan_/"><i class="fa fa-instagram"></i></a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    
    <div class="header-main">
      <div class="container">
        <div class="open-offcanvas">&#9776;</div>
        <div class="header-logo"><a href="index" class="logo"><img style="width:25rem" src="assets/images/logo.svg" alt="Kababji" class="logo-img"></a></div>
        <nav id="main-nav-offcanvas" class="main-nav-wrapper">
          <div class="close-offcanvas-wrapper"><span class="close-offcanvas">x</span></div>
          <div class="main-nav">
            <ul id="main-nav" class="nav nav-pills">
              <li id="Home"  class=""><a href="index" class="dropdown-toggle">Home</a>
              </li>
              <li id="About" class=""><a href="about">About</a></li>
              <li id="Catering" >  <a href="catering">Catering</a></li>
              <li class=""><a href="https://bitesnbags.com/place/p7fpf9dolv-kababji" target="_blank" class="">
                   
                  Menu</a>
                
              </li>
              
              <li id="Contact" ><a href="contact">Contact</a></li>
            </ul>
          </div>
        </nav>
      </div>
    </div>
  </header>

  <script>
    var url = window.location.href;
    var lastPart = url.substr(url.lastIndexOf('/') + 1);
  

    if (lastPart === "about") {
     document.getElementById('About').classList.add('current-menu-item');
  };
  if (lastPart === "index") {
     document.getElementById('Home').classList.add('current-menu-item');
  };
  if (lastPart === "catering") {
     document.getElementById('Catering').classList.add('current-menu-item');
  };
  if (lastPart === "contact") {
     document.getElementById('Contact').classList.add('current-menu-item');
  };
    
         
       
    </script>