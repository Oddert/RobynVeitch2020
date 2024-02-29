<?php
/**
 * Robyn Veitch CV
 * 
 * @package RobynVeitch
 */
  get_header();
  get_template_part('template-parts/navigation/navbar');
?>


<main class='robyn-veitch-cv'>
  <div class='cv-download'>
    <i class='fa fa-file-pdf'></i>
    <?php 
      while (have_posts()):
        the_post();
        the_content(); 
      endwhile;
    ?>
  </div>
  <div data-oddert='page-robyn_veitch_cv.php'></div>
  <div class='cv-container'>
    <div class='cv'>
      <div class='cv-grid'>

        <div class='cv-title'>
          <h2 class='cv-title__name'>
            Robyn F H Veitch
          </h2>
          <h3 class='cv-title__tagline'>
            Product Design Engineer | robynveitch.com/
          </h3>
        </div>

        <div class='cv-column--one'>
          <h3>Summary</h3>
          <p>
            Practising freelance developer, trained in principles of social focused design and systems-based solutions.
          </p>
          
          <h3>Skills</h3>
          <h4>General</h4>
          <p>
						Research and human insight lead design, team leadership & management, communication, workshop skills, CAD / CAM, complex problem-solving, Data Visualisation, DevOps, CI/CD, Microservices, design for manufacture, code structuring, reverse engineering
					</p>
          <h4>Tools</h4>
          <p>
						JavaScript (ES6+), Typescript, React-Redux, React-Native, SQL, MongoDB, D3.js, P5.js, Node, PHP, Adobe suite, Figma, REST API’s, GraphQL, WebSockets, SASS, Python, SolidWorks, WebGL
          </p>
          
          <h3>Contact</h3>
          <h4>Site</h4>
          robynveitch.com/
          <h4>Email</h4>
          RobynFHVeitch@gmail.com
          <h4>GitHub</h4>
          github.com/Oddert/
          <h4>LinkedIn</h4>
          linkedin.com/in/robyn-veitch/
          <h4>Phone</h4>
          +44 07767 297041

          <p class='cv-references'>
            References can be provided on request
          </p>
        </div>

        <div class='cv-column--two'>
          <h3>Experience</h3>
          <h4>Web Developer | Freelance</h4>
          <p class='cv-content__subtitle'>
            1 August 2020 - ongoing
          </p>
          <p>
            Helped several small businesses to launch, designed a custom stock tracking system for a growing start up. Advised a number of large companies on successful technological strategy.
          </p>

          <h4>Operations & Retail Associate | Waitrose & Partners</h4>
          <p class='cv-content__subtitle'>
            17 February 2019 – ongoing 
          </p>
          <p>
            Working across multiple branches, running the cash control processes I designed and implemented new resources and management processes to minimise wastage and successfully eliminated ongoing theft issues.
          </p>

          <h4>Web Developer Consultant | Matter of Stuff</h4>
          <p class='cv-content__subtitle'>
            1 April 2019 - 1 March 2020
          </p>
          <p>
            Beginning with content curation I worked on a product visualisation tool to enhance the customer experience. I built their new Moodboard tool to allow on-site collaborative curation of project themes and resources.
          </p>

          <h4>Product Designer | Design Against Crime</h4>
          <p class='cv-content__subtitle'>
            1 July 2020
          </p>
          <p>
            Working with a small team, running workshops in prisons and with the Social Games team at University of South Denmark designing a social game to help incarcerated fathers reconnect with their children.
          </p>
          
          <h3>Education</h3>
          <h4>BA (Hons) Product Design | Central Saint Martins, UAL</h4>
          <p class='cv-content__subtitle'>
            1 July 2020
          </p>
          <p>
            Graduated with first class honours, developing skillsets in social and systems-based design amongst diverse design contexts.
          </p>
          <h4>Diploma in Professional Studies | Central Saint Martins, UAL</h4>
          <p class='cv-content__subtitle'>
            1 July 2020
          </p>
          <p>
            A year of work in industry across a breadth of sectors, providing professional knowledge and processes for the final year projects.
          </p>
          <h4>Full Stack Certification | freeCodeCamp</h4>
          <p class='cv-content__subtitle'>
            4 September 2018
          </p>
          <p>
            Self-directed study into coding and development technologies through the FCC online curriculum.
          </p>
        </div>

      </div>
    </div>
  </div>
</main>
