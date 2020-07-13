<?php
/**
 * Home page
 * 
 * @package RobynVeitch
 */
	get_header();
	get_template_part('template-parts/navbar');
	show_admin_bar(False);
?>

<div data-oddert='home.php'></div>

<div class='cover'>
	<?php $test = 'this is a short tag test'; ?>
	<?= $test ?>
</div>
  
<div class='nav-container'>
	<nav>
		<ul>
			<li title='home'>
				<span>home</span>
				<i class='fa fa-home'></i>
			</li>
			<li title='development'>
				<span>development</span>
				<i class='fa fa-terminal'></i>
			</li>
			<li title='industrial design'>
				<span>industrial design</span>
				<i class='fa fa-drafting-compass'></i>
			</li>
			<li title='blog'>
				<span>blog</span>
				<i class='fa fa-rss'></i>
			</li>
			<li title='about'>
				<span>about</span>
				<i class='fa fa-user'></i>
			</li>
			<li title='contact'>
				<span>contact</span>
				<i class='fa fa-comment-dots'></i>
			</li>
			<li class='nav-toggle' title='toggle menu position'>
				<i class='fa fa-chevron-left'></i>
			</li>
		</ul>
	</nav>
</div>

<section class='portfolio'>
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
</section>

<?php get_footer(); ?>