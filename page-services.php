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

    <div class='process_section p3c'>
      <div class='section_label'>
        <h4 class='section_label-text'>Specification</h4>
      </div>

      <div class='section_content'>
        <div class='section_content-bullet'></div>
        <button class='section_content-button'>
          <p>Scope Definition</p>
        </button>
        <p class='section_content-expandable'>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
      </div>

      <div class='section_content'>
        <div class='section_content-bullet'></div>
        <button class='section_content-button'>
          <p>Research</p>
        </button>
        <p class='section_content-expandable'>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
      </div>
      <div class='section_content'>
        <div class='section_content-bullet'></div>
        <button class='section_content-button'>
          <p>Specification & Sign Off</p>
        </button>
        <p class='section_content-expandable'>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
      </div>
    </div>

    <div class='process_section p4c light'>
      <div class='section_label'>
        <h4 class='section_label-text'>Design</h4>
      </div>
      <div class='section_content'>
        <div class='section_content-bullet'></div>
        <button class='section_content-button'>
          <p>Design | Initial Ideation</p>
        </button>
        <p class='section_content-expandable'>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
      </div>
      <div class='section_content'>
        <div class='section_content-bullet'></div>
        <button class='section_content-button'>
          <p>Concept Selection</p>
        </button>
        <p class='section_content-expandable'>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
      </div>
      <div class='section_content'>
        <div class='section_content-bullet'></div>
        <button class='section_content-button'>
          <p>Iterative Development</p>
        </button>
        <p class='section_content-expandable'>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
      </div>
      <div class='section_content'>
        <div class='section_content-bullet'></div>
        <button class='section_content-button'>
          <p>Review</p>
        </button>
        <p class='section_content-expandable'>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
      </div>
    </div>

    <div class='process_section p3c'>
      <div class='section_label'>
        <h4 class='section_label-text'>Implementation</h4>
      </div>
      <div class='section_content'>
        <div class='section_content-bullet'></div>
        <button class='section_content-button'>
          <p>Content Writing</p>
        </button>
        <p class='section_content-expandable'>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
      </div>
      <div class='section_content'>
        <div class='section_content-bullet'></div>
        <button class='section_content-button'>
          <p>Building / Coding / Prototyping</p>
        </button>
        <p class='section_content-expandable'>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
      </div>
      <div class='section_content'>
        <div class='section_content-bullet'></div>
        <button class='section_content-button'>
          <p>Testing & Review</p>
        </button>
        <p class='section_content-expandable'>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
      </div>
    </div>

    <div class='process_section p1c highlight'>
      <div class='section_label'>
        <h4 class='section_label-text'>Future</h4>
      </div>
      <div class='section_content'>
        <div class='section_content-bullet'></div>
        <button class='section_content-button'>
          <p>Additional Services</p>
        </button>
        <p class='section_content-expandable'>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
      </div>
    </div>

  </div>

</main>

<script>
  document.addEventListener('DOMContentLoaded', () => {

    const collapse = document.querySelectorAll('.section_content')

    function toggle (e) {
      e.target
      .closest('.section_content')
      .querySelector('.section_content-expandable')
      .classList.toggle('open')
    }

    collapse.forEach(each => {
      let expandable = each.querySelector('.section_content-expandable')
      each.querySelector('.section_content-button').onclick = toggle
      expandable.style.height = `${expandable.scrollHeight}px`
    })

  })
</script>


<?php
  get_sidebar();
  get_footer();
?>