<?php
/**
 * Home page
 * 
 * @package RobynVeitch
 */
	// get_header();
	// get_template_part('template-parts/navigation/navbar');
	// show_admin_bar(False);
?>

<?php
  // Replacement for get_header() to allow manipulation of a style attributed to #page.site
  // may be possible to change functionality to accomodate get_header() in the future, OR reuse code pieces
  // e.g remove the begining of the body tag to anotehr template and make sure to include it in all other files.
?>

<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700&family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;0,800;1,300;1,400;1,600;1,700;1,800&family=Poiret+One&display=swap" rel="stylesheet">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<div data-oddert='header.php'></div>
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'RobynVeitch' ); ?></a>


  <div class='site__main homepage noscript'>

    <div hidden data-oddert='home.php test' data-featuredimg='<?php echo get_header_image(); ?>'></div>

    <!-- <header class='header'>
        <h1>portfolio</h1>
    </header> -->

    <!-- WARNING: body should have .noscript by default but I'm a riddy and made this on a platform (codepen) where you can't add class to body. There is a line in the js which does this for me. :C -->

    <div class='nav-container open'>
      <nav>
        <ul>
          <!-- <li title='home' class='nav-home'>
            <a href='#landing'>
              <span>home</span>
              <i class='fa fa-home'></i>
            </a>
          </li> -->
          <li title='design' class='nav-design nav-top-of-page'>
            <a href='?focus=design#portfolio'>
              <span>industrial design</span>
              <i class='fa fa-drafting-compass'></i>
            </a>
          </li>
          <li title='development' class='nav-development nav-top-of-page'>
            <a href='?focus=development#portfolio'>
              <span>development</span>
              <i class='fa fa-terminal'></i>
            </a>
          </li>
          <li title='blog' class='nav-blog'>
            <a href='/blog'>
              <span>blog</span>
              <!-- <i class='fa fa-rss'></i> -->
              <!-- <i class='far fa-newspaper'></i> -->
              <i class='fa fa-newspaper'></i>
            </a>
          </li>
          <li title='about' class='nav-about'>
            <a href='#about'>
              <span>about</span>
              <i class='fa fa-user'></i>
            </a>
          </li>
          <li title='contact' class='nav-contact'>
            <a href='/services'>
              <span>services</span>
              <!-- <i class='fa fa-comment-dots'></i> -->
              <i class='fa fa-shapes'></i>
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

              $miniumn_priority = 60;

              $posts = get_posts( $post_args );

              $sorted_posts = array();

              foreach( $posts as $post ) {
                $priority = get_the_terms($post->ID, "priority")[0]->name;

                if ( (int)$priority <= $miniumn_priority ) continue;

                if ( !array_key_exists($priority, $sorted_posts) ) {
                  $sorted_posts[$priority] = array();
                }
                
                $sorted_posts[$priority][] = $post;
              }                
                
              foreach ( $sorted_posts as $priority => $posts ) {

                foreach ( $posts as $idx => $post ) {
                  $id = apply_filters( 'ID', $post->ID );
                  $name = apply_filters( 'post_name', $post->post_name );
                  $title = apply_filters( 'post_title', $post->post_title );
                  $thumb = get_the_post_thumbnail_url( $id );
                  
                  $post_categories = get_the_category( $id );
                  $folio_tags = "";
  
                  $idx = sizeof($post_categories) > 0 ? sizeof($post_categories) - 1 : 0;
                  $idxCopy = sizeof($post_categories) > 0 ? sizeof($post_categories) - 1 : 0;
  
                  while ($idx >= 0) {
                    $folio_tags .= '"' . $post_categories[$idx]->slug . '"';
                    if ($idx >= 1 && $idx != sizeof($post_categories)) {
                      $folio_tags .=  ', ';
                    }
                    $idx--;
                  }
  
                  ?>
                    <div class='folio-item' data-folio-tags='[<?php echo $folio_tags; ?>]'>
                      <a href='<?php echo $name ?>' class='folio-item__wrapper'>
                        <img src='<?php echo $thumb; ?>' />
                        <h3>
                          <?php echo $title ?>
                        </h3>
                      </a>
                    </div>
                  <?php
                }
              
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
            <!-- <img src='https://res.cloudinary.com/oddert/image/upload/v1581962527/Portfolio/folio_profile.jpg' /> -->
            <img src='/wp-content/uploads/2020/09/main_profile.jpg' />
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
        <ul class="about-contact">
          <li>
            <i class="fa fa-envelope"></i> <p><a href='mailto:robynv@robynveitch.com'>robyn@robynveitch.com</a></p>
          </li>
          <li>
            <i class="fa fa-phone"></i> <p><a href='tel:+44-07767-297041'>(+44) 07767 297041</a></p>
          </li>
          <li>
            <i class="fa fa-map-marker"></i> <p>Isle of Dogs, London, England, UK</p>
          </li>
        </ul>
        <ul class='social-links' id='contact'>
          <li class='social-link linkedin'>
            <a href='https://www.linkedin.com/in/robyn-veitch/' title='Linkedin profile link'>
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
        <div class='contact'>
          <a href='/services'>
            <i class='fa fa-chevron-left'></i> Services
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
