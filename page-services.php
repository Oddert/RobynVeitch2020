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
    <div class="intro-content">
      <div class='intro-text'>
        <h2 class='intro-title'>Lets build something, together.</h2>
        <p class='intro-description'>Whether you have a grand vison to implement, or just a quick question, drop a line</p>
      </div>
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
      
      function client_work_img ($id, $href) {
        $att_src = wp_get_attachment_image_src($id, 'full');
        $att_alt = get_post_meta($id, '_wp_attachment_image_alt', True);
        $img = "<a class='case_study-image' href='" . $href . "'>"
            ."<img 
                class='case_study-image_img' 
                src='" . $att_src[0] . "' 
                alt='" . $att_alt . "' 
              />"
          ."</a>";
        return $img;
      }

      function client_project ($class_name, $id, $title, $client, $short_desc, $time, $href) {
        return "
        <div class='client_work-case_study case_study--" . $class_name . "'>"
          . client_work_img($id, $href)
        .  "<div class='case_study-text'>
            <div class='case_study-text--top'>"
            . "<a href='" . $href . "'>"
              . "<h4 class='case_study-title'>" 
                . $title 
              . "</h4>"
            . "</a>"
            . "<p class='case_study-client'>" . $client . "</p>
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
        'March 2020',
        '/page-block-system-matter-of-stuff'
      ); ?>

      <?php echo client_project (
        'moodboard', 
        $moodboard_id, 
        'The MoodBoard',
        'Matter of Stuff',
        'An on-site collaborative design and curation tool for use by the company and clients.',
        'November 2019',
        '/the-moodboard-system-matter-of-stuff'
      ); ?>

      <?php echo client_project (
        'bloqs', 
        $bloqs_id, 
        'Bloqs Game & Site', 
        'Design Against Crime', 
        'A collaborative project designing a social game to help incarcerated fathers reconnect with their families.', 
        'April 2019',
        '/bloqs-design-against-crime'
      ); ?>

      <?php echo client_project (
        'tailored_nutrition', 
        $tn_id, 
        'Tailored Nutrition', 
        'Bow & Arrow', 
        'A speculative system and service to give customers insight into their base nutritional levels.', 
        'June 2020',
        '/tailored-nutrition'
      ); ?>

      <div class="case_study-bookend"></div>

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
          <img src="/wp-content/uploads/2021/01/firinn-figma-6_dropshaddow-1.png" alt="" />
        </div>
      </div>
    </div>

    <div class='cta__container'>
      <div class='cta--wrapper'>
        <div class='cta-image'>
          <img src="/wp-content/uploads/2020/08/exp-3-scaled.jpg" alt="" />
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

    <div class='process_intro'>
      <div class="intro_icon">
        <svg width="124" viewBox="0 0 207 793" fill="none" xmlns="http://www.w3.org/2000/svg">
          <rect x="87" y="172" width="32" height="486" fill="#ECF0F1"/>
          <circle cx="103.5" cy="103.5" r="103.5" fill="#1BBC9B"/>
          <path d="M52 105.073L89.2963 143L166 65" stroke="#4D4B4D" stroke-width="19" stroke-linecap="round" stroke-linejoin="round"/>
          <circle cx="103.5" cy="689.5" r="103.5" fill="#1BBC9B"/>
          <path d="M52 691.073L89.2963 729L166 651" stroke="#4D4B4D" stroke-width="19" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
      </div>
      <div class="process-intro_text--title_group">
        <h3 class="process-intro_text-title">
          A Transparent Process
        </h3>
        <h4 class="process-intro_text-subtitle">
          Hands on or hands off, have confidence in receiving the perfect result.
        </h4>
      </div>
      <div class="process-intro_text--paragraph_group">
        <p class="process-intro_text-paragraph">
          Every piece of work, small or large, is put through the same refined and tested design process.
        </p>
        <p class="process-intro_text-paragraph">
          This sets key deliverable points to let you have the final say in each section.
        </p>
        <p class="process-intro_text-paragraph">
          If you’d like a more involved approach, I utilise a range of collaborative tools and methodologies to let you get to the heart of the process.
        </p>
        <p class="process-intro_text-paragraph">
          If you already have a design, skip the early steps and jump strait to implementation.
        </p>
      </div>
    </div>

    <div class='process_section p3c'>
      <button class='section_label'>
        <h4 class='section_label-text'>Specification</h4>
      </button>

      <div class='section_content'>
        <div class='section_content-arrow--head'></div>
        <div class='section_content-arrow--tail'></div>
        <div class='section_content-bullet'>
          <div class='bullet_point'></div>
          <div class='bullet_border'></div>
        </div>
        <div class="section_content-bullet_line">
          <div class="bullet_line-border"></div>
        </div>
        <button class='section_content-button'>
          <p>Scope Definition</p>
        </button>
        <div class='section_content-expandable'>
          <p>
            I will work closely with you to understand your needs and values; a shared understanding of your vision ensures the work that follows is exactly in tune with your needs.
          </p>

          <p>
            This allows the creation of a brief; a project or work set outline and list of deliverable requirements.
          </p>
        </div>
      </div>

      <div class='section_content'>
        <div class='section_content-arrow--head'></div>
        <div class='section_content-arrow--tail'></div>
        <div class='section_content-bullet'>
          <div class='bullet_point'></div>
          <div class='bullet_border'></div>
        </div>
        <div class="section_content-bullet_line">
          <div class="bullet_line-border"></div>
        </div>
        <button class='section_content-button'>
          <p>Research</p>
        </button>
        <div class='section_content-expandable'>
          <p>
            Possibilities are explored, options generated, and technological feasibility testing is performed.
          </p>
          <p>
            Data and research can be collated as appropriate to inform the design phase.
          </p>
        </div>
      </div>

      <div class='section_content'>
        <div class='section_content-arrow--head'></div>
        <div class='section_content-arrow--tail'></div>
        <div class='section_content-bullet'>
          <div class='bullet_point'></div>
          <div class='bullet_border'></div>
        </div>
        <div class="section_content-bullet_line">
          <div class="bullet_line-border"></div>
        </div>
        <button class='section_content-button'>
          <p>Proposal & Sign Off</p>
        </button>
        <div class='section_content-expandable'>
          <p>
            A plan is drafted along with timescales and costings.
          </p>
          <p>
            Several options can be presented to you as appropriate, with differing features.
          </p>
          <p>
            The proposal can then be reviewed, amended, and signed off on for work to then begin. This process ensures that the determined proposal has everything you need, and the contract protects all parties.
          </p>
        </div>
      </div>
    </div>

    <div class='process_section p4c light'>
      <button class='section_label'>
        <h4 class='section_label-text'>Design</h4>
      </button>

      <div class='section_content'>
        <div class='section_content-arrow--head show arrow_end'><i class='fas fa-caret-right'></i></div>
        <div class='section_content-arrow--tail show'></div>
        <div class='section_content-bullet'>
          <div class='bullet_point'></div>
          <div class='bullet_border'></div>
        </div>
        <div class="section_content-bullet_line">
          <div class="bullet_line-border"></div>
        </div>
        <button class='section_content-button'>
          <p>Design | Initial Ideation</p>
        </button>
        <div class='section_content-expandable'>
          <p>
            A range of ideas is generated through the creative process, approaching the brief from multiple angles, and whittled down to the most appropriate.
          </p>
        </div>
      </div>

      <div class='section_content'>
        <div class='section_content-arrow--head show'></div>
        <div class='section_content-arrow--tail show'></div>
        <div class='section_content-bullet'>
          <div class='bullet_point'></div>
          <div class='bullet_border'></div>
        </div>
        <div class="section_content-bullet_line">
          <div class="bullet_line-border"></div>
        </div>
        <button class='section_content-button'>
          <p>Concept Selection</p>
        </button>
        <div class='section_content-expandable'>
          <p>
            From these, the best idea is selected either by me, or by offering you the final say.
          </p>
          <p>
            The nature of some projects may mean that the optimal solution is obvious, or decided based on professional judgment, so this stage may not apply to all projects.
          </p>
        </div>
      </div>

      <div class='section_content'>
        <div class='section_content-arrow--head show'></div>
        <div class='section_content-arrow--tail show'></div>
        <div class='section_content-bullet'>
          <div class='bullet_point'></div>
          <div class='bullet_border'></div>
        </div>
        <div class="section_content-bullet_line">
          <div class="bullet_line-border"></div>
        </div>
        <button class='section_content-button'>
          <p>Iterative Development</p>
        </button>
        <div class='section_content-expandable'>
          <p>
            Iteration is the heart of design.
          </p>
          <p>
            Every aspect of the selected idea is assessed and evolved across multiple directions to find its optimal form.
          </p>
          <p>
            The idea is refined and built upon to test every scenario and account for every use-case.
          </p>
        </div>
      </div>

      <div class='section_content'>
        <div class='section_content-arrow--head show arrow_start'></div>
        <div class='section_content-arrow--tail'></div>
        <div class='section_content-bullet'>
          <div class='bullet_point'></div>
          <div class='bullet_border'></div>
        </div>
        <div class="section_content-bullet_line">
          <div class="bullet_line-border"></div>
        </div>
        <button class='section_content-button'>
          <p>Review</p>
        </button>
        <div class='section_content-expandable'>
          <p>
            The final piece is evaluated against the specification.
          </p>
          <p>
            If any changes or revision is required or desired, this insight can be fed back and put through the design process again.
          </p>
        </div>
      </div>
    </div>

    <div class='process_section p3c'>
      <button class='section_label'>
        <h4 class='section_label-text'>Implementation</h4>
      </button>

      <div class='section_content'>
        <div class='section_content-arrow--head'></div>
        <div class='section_content-arrow--tail'></div>
        <div class='section_content-bullet'>
          <div class='bullet_point'></div>
          <div class='bullet_border'></div>
        </div>
        <div class="section_content-bullet_line">
          <div class="bullet_line-border"></div>
        </div>
        <button class='section_content-button'>
          <p>Content Writing</p>
        </button>
        <div class='section_content-expandable'>
          <p>
            For web projects, this is where there is an option for content creation such as writing post backlogs or doing graphics work not covered by the design.
          </p>
        </div>
      </div>

      <div class='section_content'>
        <div class='section_content-arrow--head show arrow_end'><i class='fas fa-caret-right'></i></div>
        <div class='section_content-arrow--tail show'></div>
        <div class='section_content-bullet'>
          <div class='bullet_point'></div>
          <div class='bullet_border'></div>
        </div>
        <div class="section_content-bullet_line">
          <div class="bullet_line-border"></div>
        </div>
        <button class='section_content-button'>
          <p>Building / Coding / Prototyping</p>
        </button>
        <div class='section_content-expandable'>
          <p>
            The final concept is engineered and deployed. 
          </p>
          <p>
            For code based projects this involved writing the code, testing and (if required) deployment & setup.
          </p>
          <p>
            For more physical projects, this encapsulates creating renderings, prototypes, and specification documentation.
          </p>
        </div>
      </div>

      <div class='section_content'>
        <div class='section_content-arrow--head show arrow_start'></div>
        <div class='section_content-arrow--tail'></div>
        <div class='section_content-bullet'>
          <div class='bullet_point'></div>
          <div class='bullet_border'></div>
        </div>
        <div class="section_content-bullet_line">
          <div class="bullet_line-border"></div>
        </div>
        <button class='section_content-button'>
          <p>Testing & Review</p>
        </button>
        <div class='section_content-expandable'>
          <p>
            Before final delivery, anything that has not yet been tested can be put through its paces, to ensure swift deployment.
          </p>
        </div>
      </div>
    </div>

    <div class='process_section p1c highlight'>
      <button class='section_label'>
        <h4 class='section_label-text'>Future</h4>
      </button>

      <div class='section_content'>
        <div class='section_content-arrow--head'></div>
        <div class='section_content-arrow--tail'></div>
        <div class='section_content-bullet'>
          <div class='bullet_point'></div>
          <div class='bullet_border'></div>
        </div>
        <div class="section_content-bullet_line">
          <div class="bullet_line-border"></div>
        </div>
        <button class='section_content-button'>
          <p>Additional Services</p>
        </button>
        <div class='section_content-expandable'>
          <p>
            I believe that it is though commitments to sustainable practice, in all aspects of work, that real value is created.
          </p>
          <p>
            It is through strong professional relationships that we create networks that last. I am committed to offering ongoing support and collaboration to ensure satisfaction long after the delivery has taken place.
          </p>
        </div>
      </div>
    </div>

  </div>

</main>

<script>
  document.addEventListener('DOMContentLoaded', () => {

    const sectionLables = document.querySelectorAll('.section_label')
    const collapse = document.querySelectorAll('.section_content')

    function collapseToggle (e) {
      e.target
        .closest('.section_content')
        .querySelector('.section_content-expandable')
        .classList.toggle('open')
    }

    function collapseSetHeight (expandable) {
      expandable.style.height = null
      const nativeHeight = expandable.scrollHeight
      expandable.style.height = `${nativeHeight}px`
    }

    function sectionLableToggle (e) {
      const section = e.target.closest('.process_section')
      const expandables = section.querySelectorAll('.section_content-expandable')
      let open = false
      expandables.forEach(each => {
        if (each.classList.contains('open')) open = true
      })
      if (open) {
        expandables.forEach(each => each.classList.remove('open'))
      } else {
        expandables.forEach(each => each.classList.add('open'))
      }
    }

    function itirateCollapse (colapse, firstTime = false) {
      let expandable = colapse.querySelector('.section_content-expandable')
      collapseSetHeight(expandable)
      if (firstTime) {
        colapse.querySelector('.section_content-button').onclick = collapseToggle
        expandable.classList.toggle('open')
      }
    }

    collapse.forEach(each => itirateCollapse(each, true))

    sectionLables.forEach(each => each.onclick = sectionLableToggle)

    window.addEventListener('resize', debounce(() => {
      console.log('resizing, adjusting inline styles...')
      collapse.forEach(each => itirateCollapse(each, false))
    }), 250)

    function debounce(func, wait=20, immediate) {
      var timeout;
      return function() {
        var context = this, args = arguments;
        var later = function() {
          timeout = null;
          if (!immediate) func.apply(context, args);
        };
        var callNow = immediate && !timeout;
        clearTimeout(timeout);
        timeout = setTimeout(later, wait);
        if (callNow) func.apply(context, args);
      };
    };

  })
</script>


<?php
  get_sidebar();
  get_footer();
?>