<?php
/**
 * Home page
 * 
 * @package RobynVeitch
 */
	get_header();
	// get_template_part('template-parts/navbar');
	show_admin_bar(False);
?>

<div class='cover'></div>

  <div class='site__main noscript'>

    <header class='header'>
      <!--   <h1>portfolio</h1> -->
    </header>

    <!-- WARNING: body should have .noscript by default but I'm a riddy and made this on a platform where you can't add class to body. There is a line in the js which does this for me. :C -->

    <div class='nav-container open'>
      <nav>
        <ul>
          <li title='home' class='nav-home'>
            <span>home</span>
            <i class='fa fa-home'></i>
          </li>
          <li title='design' class='nav-design'>
            <span>industrial design</span>
            <i class='fa fa-drafting-compass'></i>
          </li>
          <li title='development' class='nav-development'>
            <span>development</span>
            <i class='fa fa-terminal'></i>
          </li>
          <li title='blog' class='nav-blog'>
            <span>blog</span>
            <i class='fa fa-rss'></i>
          </li>
          <li title='about' class='nav-about'>
            <span>about</span>
            <i class='fa fa-user'></i>
          </li>
          <li title='contact' class='nav-contact'>
            <span>services / contact</span>
            <i class='fa fa-comment-dots'></i>
          </li>
        </ul>
        <button class='nav-toggle'>
          <i class='fa fa-chevron-right'></i>
        </button>
      </nav>
    </div>

    <div class='main'>

      <section class='landing'>
        <h1 class='landing-title'>Robyn F H Veitch</h1>
        <p class='landing-subtitle'>design • engineer • advocate</p>
      </section>
      <!--   <section style='height: 200px; background: tomato; grid-column: 2 / 5;'></section> -->

      <div class='section-title'>
        <div class='section-title__inner'>
          <h2 class='section-title'>portfolio</h2>
        </div>
      </div>

      <section class='portfolio'>
        <div class='content'>
          <ul class='tags'>
            <li>
              <button class='tag-button'>
                industrial design
              </button>
            </li>
            <li>
              <button class='tag-button'>
                web development
              </button>
            </li>
            <li>
              <button class='tag-button active'>
                app development
              </button>
            </li>
            <li>
              <button class='tag-button'>
                service design
              </button>
            </li>
            <li>
              <button class='tag-button active'>
                social design
              </button>
            </li>
            <li>
              <button class='tag-button'>
                microservices
              </button>
            </li>
            <li>
              <button class='tag-button'>
                data vis
              </button>
            </li>
          </ul>

          <div class='folio-items'>

            <div class='folio-item'>
              <a href='#' class='folio-item__wrapper'>
                <img src='https://res.cloudinary.com/oddert/image/upload/v1571354267/Portfolio/tube_style_map_alt_colors_edited_2.jpg' />
                <h3>Margate Art Tour</h3>
              </a>
            </div>

            <div class='folio-item'>
              <a href='#' class='folio-item__wrapper'>
                <img src='http://robynveitch.com/folios/polymat/img/polymat_banner.jpg' />
                <h3>Polymat</h3>
              </a>
            </div>

            <div class='folio-item'>
              <button class='folio-item__wrapper'>
                <img src='https://res.cloudinary.com/oddert/image/upload/v1571337553/Portfolio/30_days_js.png' />
                <h3>#JS30</h3>
              </button>
            </div>

            <div class='folio-item'>
              <button class='folio-item__wrapper'>
                <img src='http://robynveitch.com/folios/root_to_root/img/root_to_root_banner.jpg' />
                <h3>Root to Root</h3>
              </button>
            </div>

            <div class='folio-item'>
              <a href='#' class='folio-item__wrapper'>
                <img src='https://res.cloudinary.com/oddert/image/upload/v1571337549/Portfolio/dungeon_crawler_banner.png' />
                <h3>Rouge Like React</h3>
              </a>
            </div>

          </div>
        </div>
      </section>

      <div class='section-title'>
        <h2 class='section-title'>about</h2>
      </div>

      <section class='about'>
        <div class='content'>
          <div class='intro'>
            <h2 class='intro-text'>Hello, my name is Robyn. I'm a problem solver.<span class='cursor'>|</span></h2>
          </div>
          <div class='profile-picture'>
            <img src='https://res.cloudinary.com/oddert/image/upload/v1581962527/Portfolio/folio_profile.jpg' />
          </div>
        </div>
        <div class='bio'>
          <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
        </div>
        <ul class='social-links'>
          <li class='social-link linkedin'>
            <a href='https://www.linkedin.com/in/robyn-veitch-582aa3b6/' title='Linkedin profile link'>
              <i class='fab fa-linkedin'></i>
            </a>
          </li>
          <li class='social-link github'>
            <a href='https://github.com/Oddert/' title='Github profile link'>
              <i class='fab fa-github'></i>
            </a>
          </li>
          <li class='social-link fcc'>
            <a href='https://www.freecodecamp.org/certification/oddert/full-stack' title='FreeCodeCamp profile link'>
              <i class='fab fa-free-code-camp'></i>
            </a>
          </li>
        </ul>
      </section>

      <!--   <div>1</div>
    <div>2</div>
    <div>3</div>
    <div>4</div>
    <div>5</div>
    <div>6</div>
    <div>7</div>
    <div>8</div>
    <div>9</div> -->

      <div class='footer'>
        <div class='contact'>
          <a href='#'>
            <i class='fa fa-chevron-left'></i> Services + Contact
          </a>
        </div>
        <div class='contact-wedge'></div>
        <div class='cv'>
          <a href='#'>
            CV <i class='fa fa-chevron-right'></i>
          </a>
        </div>
        <div class='cv-wedge'></div>
        <div class='blog'>
          <a href='#'>
            Blog <i class='fa fa-chevron-down'></i>
          </a>
        </div>
      </div>

    </div> <!-- .main -->
  </div> <!-- .site__main -->