<?php
/**
 * The template for displaying the header.
 *
 * @package Organicity
 * @since 0.1.0
 */
 ?><!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title><?php wp_title('&#124;', true, 'right'); ?><?php bloginfo('name'); ?></title>
  <meta name="description" content="OrganiCity is a new EU project with € 7.2m in funding that puts people at the centre of the development of future cities. The project brings together 3 leading smart cities and a total of 15 consortium members with great diversity in skills and experience.">
  <meta name="keywords" content="OrganiCity,EU,future,city,cities,innovation,innovative,co-creating">

  <meta name="viewport" content="width=device-width, initial-scale=1">

  <meta property="og:title" content="Organicity"/>
  <meta property="og:type" content="website"/>
  <meta property="og:url" content="http://www.organicity.eu/"/>
  <meta property="og:image" content="http://www.organicity.eu/social_image.png"/>
  <meta property="og:site_name" content="Organicity"/>
  <meta property="og:description" content="Organicity - Co-creating the Cities of the Future"/>

  <meta name="twitter:card" content="summary" />
  <meta name="twitter:title" content="Organicity" />
  <meta name="twitter:description" content="Organicity - Co-creating the Cities of the Future" />
  <meta name="twitter:url" content="http://www.organicity.eu/" />
  <meta name="twitter:image" content="http://www.organicity.eu/social_image.png" />

  <meta itemprop="name" content="Organicity">
  <meta itemprop="description" content="Organicity - Co-creating the Cities of the Future">
  <meta itemprop="image" content="http://www.organicity.eu/social_image.png">

  <link rel="shortcut icon" href="/favicon.ico">
  <!-- TypeKit - Freight Text -->
  <script src="//use.typekit.net/buo5xqw.js"></script>
  <script>try{Typekit.load();}catch(e){}</script>
  <!-- WP head -->
  <?php wp_head(); ?>
</head>

<body>
<!--[if lt IE 7]>
    <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->
<header>
  <?php wp_nav_menu( array( 'theme_location' => 'header-menu' ) ); ?>
  <h2><?php echo get_bloginfo('description'); ?><h2>
</header>
