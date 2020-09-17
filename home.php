<?php
/**
 * Home page
 * 
 * @package RobynVeitch
 */
	get_header();
	// get_template_part('template-parts/navigation/navbar');
	show_admin_bar(False);
?>


  <div class='site__main homepage noscript'>

    <header class='header'>
      <!--   <h1>portfolio</h1> -->
    </header>

    <!-- WARNING: body should have .noscript by default but I'm a riddy and made this on a platform (codepen) where you can't add class to body. There is a line in the js which does this for me. :C -->

    <div class='nav-container open'>
      <nav>
        <ul>
          <li title='home' class='nav-home'>
            <a href='#landing'>
              <span>home</span>
              <i class='fa fa-home'></i>
            </a>
          </li>
          <li title='design' class='nav-design'>
            <a href='?focus=design#portfolio'>
              <span>industrial design</span>
              <i class='fa fa-drafting-compass'></i>
            </a>
          </li>
          <li title='development' class='nav-development'>
            <a href='?focus=development#portfolio'>
              <span>development</span>
              <i class='fa fa-terminal'></i>
            </a>
          </li>
          <li title='blog' class='nav-blog'>
            <a href='/blog'>
              <span>blog</span>
              <i class='fa fa-rss'></i>
            </a>
          </li>
          <li title='about' class='nav-about'>
            <a href='#about'>
              <span>about</span>
              <i class='fa fa-user'></i>
            </a>
          </li>
          <!-- TODO: add services page -->
          <li title='contact' class='nav-contact'>
            <a href='/services'>
              <span>services / contact</span>
              <i class='fa fa-comment-dots'></i>
            </a>
          </li>
        </ul>
        <button class='nav-toggle'>
          <i class='fa fa-chevron-right nav-toggle__icon--close'></i>
          <i class='fa fa-chevron-left nav-toggle__icon--open'></i>
        </button>
      </nav>
    </div>

    <div class='homepage-main'>

      <section class='landing' id='landing'>
        <h1 class='landing-title'>Robyn F H Veitch</h1>
        <p class='landing-subtitle'>
          <span class='landing-subtitle-1'>design</span> • <span class='landing-subtitle-2'>engineer</span> • <span class='landing-subtitle-3'>advocate</span>
        </p>
      </section>
      <!--   <section style='height: 200px; background: tomato; grid-column: 2 / 5;'></section> -->

      <div class='section-title'>
        <div class='section-title__inner'>
          <h2 class='section-title__inner-txt'>portfolio</h2>
        </div>
      </div>

      <section class='portfolio'>
        <div class='content' id='portfolio'>

          <div class='tag-clear'>
            <button class='tag-clear__button'>clear</button>
          </div>

          <!-- <ul class='tags'>
            <li>
              <button class='tag-button' data-folio-filter-tagname='industrial_design'>
                industrial design
              </button>
            </li>
            <li>
              <button class='tag-button' data-folio-filter-tagname='web_development'>
                web development
              </button>
            </li>
            <li>
              <button class='tag-button' data-folio-filter-tagname='app_development'>
                app development
              </button>
            </li>
            <li>
              <button class='tag-button' data-folio-filter-tagname='service_design'>
                service design
              </button>
            </li>
            <li>
              <button class='tag-button' data-folio-filter-tagname='social_design'>
                social design
              </button>
            </li>
            <li>
              <button class='tag-button' data-folio-filter-tagname='microservices'>
                microservices
              </button>
            </li>
            <li>
              <button class='tag-button' data-folio-filter-tagname='system_design'>
                system design
              </button>
            </li>
            <li>
              <button class='tag-button' data-folio-filter-tagname='data_vis'>
                data vis
              </button>
            </li>
          </ul> -->
          <ul class='tags'>

            <?php
              $cat_args = array(
                'order_by' => 'name',
                'order' => 'ASC',
                'parent' => get_cat_ID( 'portfolio' ),
              );
              
              $categories = get_categories( $cat_args );

              foreach( $categories as $category ) {
                ?>
                  <li>
                    <button 
                      class='tag-button' 
                      data-folio-filter-tagname='<?php echo $category->slug; ?>'
                    >
                      <?php echo $category->name; ?>
                    </button>
                  </li>
                <?php
              }
            ?>

          </ul>

          <div class='folio-items'>

            <?php
              $post_args = array(
                'category_in' => get_cat_ID( 'portfolio' ),
                'numberposts' => -1,
              );

              $posts = get_posts( $post_args );

              foreach ( $posts as $post ) {
                $id = apply_filters( 'ID', $post->ID );
                $name = apply_filters( 'post_name', $post->post_name );
                $title = apply_filters( 'post_title', $post->post_title );
                $post_categories = get_the_category( $id );
                $thumb = get_the_post_thumbnail_url( $id );
                ?>
                  <div class='folio-item' data-folio-tags='[<?php 
                    $idx = sizeof($post_categories);
                    while ($idx > 0) {
                      echo $post_categories[$idx]->slug;
                      if ($idx > 1 && $idx != sizeof($post_categories)) {
                        echo ', ';
                      }
                      $idx--;
                    }
                  ?>]'>
                    <a href='<?php echo $name ?>' class='folio-item__wrapper'>
                      <img src='<?php echo $thumb; ?>' />
                      <h3><?php echo $title ?></h3>
                    </a>
                  </div>
                <?php
              }
            ?>

      <!-- <div class='folio-item' data-folio-tags='["industrial-design", "service-design"]'>
              <a href='#' class='folio-item__wrapper'>
                <img src='https://res.cloudinary.com/oddert/image/upload/v1571354267/Portfolio/tube_style_map_alt_colors_edited_2.jpg' />
                <h3>Margate Art Tour</h3>
              </a>
            </div>

            <div class='folio-item' data-folio-tags='["industrial_design", "social_design"]'>
              <a href='#' class='folio-item__wrapper'>
                <img src='http://robynveitch.com/folios/polymat/img/polymat_banner.jpg' />
                <h3>Polymat</h3>
              </a>
            </div>

            <div class='folio-item' data-folio-tags='["web_development", "microservices", "data_vis"]'>
              <button class='folio-item__wrapper'>
                <img src='https://res.cloudinary.com/oddert/image/upload/v1571337553/Portfolio/30_days_js.png' />
                <h3>#JS30</h3>
              </button>
            </div>

            <div class='folio-item' data-folio-tags='["social_design", "system_design"]'>
              <button class='folio-item__wrapper'>
                <img src='http://robynveitch.com/folios/root_to_root/img/root_to_root_banner.jpg' />
                <h3>Root to Root</h3>
              </button>
            </div>

            <div class='folio-item' data-folio-tags='["web_development", "data_vis"]'>
              <a href='#' class='folio-item__wrapper'>
                <img src='https://res.cloudinary.com/oddert/image/upload/v1571337549/Portfolio/dungeon_crawler_banner.png' />
                <h3>Rouge Like React</h3>
              </a>
            </div> -->

          </div>
        </div>
      </section>

      <div class='section-title'>
        <div class='section-title__inner'>
          <h2 class='section-title__inner-txt'>about</h2>
        </div>
      </div>

      <section class='about' id='about'>
        <div class='content'>
          <div class='intro'>
            <h2 class='intro-text'>
              <span class='text'>
                Hello, my name is Robyn. I'm a problem solver.
              </span>
              <span class='cursor'>|</span>
            </h2>
          </div>
          <div class='profile-picture'>
            <img src='https://res.cloudinary.com/oddert/image/upload/v1581962527/Portfolio/folio_profile.jpg' />
          </div>
        </div>
        <div class='bio'>
          <p>
            I'm a designer and developer specialising in the application of social and systems design.
          </p>
          <p>
            I come from a background in industrial design and have worked in development and code for over four years. I take a research-first approach to my work with the core ethos of adding genuine value to the world and improving people's lives. 
          </p>
        </div>
        <ul class='social-links' id='contact'>
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

      <div class='footer'>
        <!-- TODO: add services page -->
        <div class='contact'>
          <a href='/services'>
            <i class='fa fa-chevron-left'></i> Services + Contact
          </a>
        </div>
        <div class='contact-wedge'></div>
        <div class='cv'>
          <a href='/robyn-veitch-cv'>
            CV <i class='fa fa-chevron-right'></i>
          </a>
        </div>
        <div class='cv-wedge'></div>
        <div class='blog'>
          <a href='/blog'>
            Blog <i class='fa fa-chevron-down'></i>
          </a>
        </div>
      </div>

    </div> <!-- .homepage-main -->
  </div> <!-- .site__main.homepage.noscript -->

  
  <div class='homepage-cover'></div>