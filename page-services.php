<?php
/**
 * Services Page
 * 
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 * 
 * @package RobynVeitch
 */

  get_header();
  get_template_part('template-parts/navigation/navbar');

?>

<div data-oddert='page-services.php'></div>
<main id='primary' class='site-main page-services'>

  <div class='intro'>
    <img class='intro-cover_img' src="/wp-content/uploads/2020/08/floating_cards-crop.png" alt="" />
    <div class='intro-cover_filter'></div>
    <div class='intro-text'>
      <h2 class='intro-title'>Lets build something together.</h2>
      <p class='intro-description'>Whether you have a grand vison to implement, a spark of an idea, or just have a curious question</p>
      <div class='intro-button__container'>
        <div class='intro-button__wrapper'>
          <button class='intro-button'>Get in touch</button>
        </div>
      </div>
    </div>
  </div>

  <div class='client_work'>
    <h3 class='client_work-title'>Case Studies</h3>
    <div class='client_work-case_studies'>

    <?php 
      // $att_url = 'http://robynveitch.local/wp-content/uploads/2020/08/portfolio_moodboard-banner.png';
      // $att_id = attachment_url_to_postid($att_url);
      $procurement_id = 483;
      $moodboard_id = 466;
      $bloqs_id = 515;
      $tn_id = 551;
      
      function client_work_img ($id) {
        $att_src = wp_get_attachment_image_src($id, 'full');
        $att_alt = get_post_meta($id, '_wp_attachment_image_alt', True);
        return '<div class="case_study-image"><img class="case_study-image_img" src="' . $att_src[0] . '" alt="' . $att_alt . '" /></div>';
      }

      function client_project ($class_name, $id, $title, $client, $short_desc, $time) {
        return "
        <div class='client_work-case_study case_study--" . $class_name . "'>"
          . client_work_img($id) .
          "<div class='case_study-text'>
            <div class='case_study-text--top'>
              <h4 class='case_study-title'>" . $title . "</h4>
              <p class='case_study-client'>" . $client . "</p>
              <p class='case_study-short_description'>" . $short_desc . "</p>
            </div>
            <div class='case_study-text--bottom'>
              <div class='case_study-time'>
                <time class='case_study-time_text'>" . $time . "</time>
              </div>
            </div>
          </div>
        </div>";
      }
    ?>

      <?php echo client_project (
        'mos_site', 
        $procurement_id, 
        'Page Block System',
        'Matter of Stuff',
        'Implementation of a site redesign with a modular client-editor.',
        'March 2020'
      ); ?>

      <?php echo client_project (
        'moodboard', 
        $moodboard_id, 
        'The MoodBoard',
        'Matter of Stuff',
        'An on-site collaborative design and curation tool for use by the company and clients.',
        'November 2019'
      ); ?>

      <?php echo client_project (
        'bloqs', 
        $bloqs_id, 
        'Bloqs Game & Site', 
        'Design Against Crime', 
        'A collaborative project designing a social game to help incarcerated fathers reconnect with their families.', 
        'April 2019'
      ); ?>

      <?php echo client_project (
        'tailored_nutrition', 
        $tn_id, 
        'Tailored Nutrition', 
        'Bow & Arrow', 
        'A speculative system and service to give customers insight into their base nutritional levels.', 
        'June 2020'
      ); ?>

    </div>
  </div>
    
  <div class='cta'>
    
    <div class='cta__container'>
      <div class='cta--wrapper'>
        <div class='cta-text'>
          <h3 class='cta-text__title'>Digital Design and Development for the 20’s</h3>
          <p>Get your message across with fast, responsive, customisable web design that gives you control over how the world sees you.</p>
          <p>Benefit from a range of content management systems, frameworks, and scalable systems, microservices and applets.</p>
          <p>Native mobile and desktop apps and other software solutions can integrate with your existing platform or be used to build a new one.</p>
        </div>
        <div class='cta-image'>
          <img src="/wp-content/uploads/2020/08/mos_procurement_onw.png" alt="" />
        </div>
      </div>
    </div>

    <div class='cta__container'>
      <div class='cta--wrapper'>
        <div class='cta-image'>
          <img src="/wp-content/uploads/2020/08/mos_procurement_onw.png" alt="" />
        </div>
        <div class='cta-text'>
          <h3 class='cta-text__title'>The Industrial Design Approach</h3>
          <p>Take advantage of a full-service design methodology founded in user centred design and ethnographic research.</p>
          <p>If the scope of your project extends beyond a site or screen, benefit from physical product design as well as considerations for graphics, packaging and production.</p>
        </div>
      </div>
    </div>

  </div>

  <div class='process'>

    <div class='process_section'>
      <p class='section_label'>Specification</p>
      <div class='section_content'>
        <p>Problem Definition</p>
        <p>Lorem ipsum</p>
      </div>
      <div class='section_content'>
        <p>Research</p>
        <p>Lorem ipsum</p>
      </div>
      <div class='section_content'>
        <p>Specification & Sign Off</p>
        <p>Lorem ipsum</p>
      </div>
    </div>

    <div class='process_section light'>
      <p class='section_label'>Design</p>
      <div class='section_content'>
        <p>Design | Initial Ideation</p>
        <p>Lorem ipsum</p>
      </div>
      <div class='section_content'>
        <p>Concept Selection</p>
        <p>Lorem ipsum</p>
      </div>
      <div class='section_content'>
        <p>Iterative Development</p>
        <p>Lorem ipsum</p>
      </div>
      <div class='section_content'>
        <p>Review</p>
        <p>Lorem ipsum</p>
      </div>
    </div>

    <div class='process_section'>
      <p class='section_label'>Implementation</p>
      <div class='section_content'>
        <p>Content Writing</p>
        <p>Lorem ipsum</p>
      </div>
      <div class='section_content'>
        <p>Building / Coding / Prototyping</p>
        <p>Lorem ipsum</p>
      </div>
      <div class='section_content'>
        <p>Testing & Review</p>
        <p>Lorem ipsum</p>
      </div>
    </div>

    <div class='process_section highlight'>
      <p class='section_label'>Future</p>
      <div class='section_content'>
        <p>Additional Services</p>
        <p>Lorem ipsum</p>
      </div>
    </div>

  </div>

</main>


<?php
  get_sidebar();
  get_footer();
?>