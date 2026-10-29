<?php
/**
 * Workly - Virtual Assistant Platform
 * File: /php/includes/header.php
 */
require_once dirname(__DIR__) . '/data/vas.php';

$pageTitle = $pageTitle ?? "Workly – Elite Virtual Assistant Talent Platform";
$pageDescription = $pageDescription ?? "Hire vetted, top 1% bilingual virtual assistants for IT, Marketing, Legal, Insurance, Healthcare, Operations, and Real Estate.";
$currentPage = $currentPage ?? "home";
?>
<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= htmlspecialchars($pageTitle, ENT_QUOTES, 'UTF-8') ?></title>
  <meta name="description" content="<?= htmlspecialchars($pageDescription, ENT_QUOTES, 'UTF-8') ?>">
  <link rel="icon" type="image/png" href="assets/logo.png">

  <!-- OpenGraph Metadata -->
  <meta property="og:type" content="website">
  <meta property="og:title" content="<?= htmlspecialchars($pageTitle, ENT_QUOTES, 'UTF-8') ?>">
  <meta property="og:description" content="<?= htmlspecialchars($pageDescription, ENT_QUOTES, 'UTF-8') ?>">
  <meta property="og:image" content="assets/logo.png">
  <meta property="og:site_name" content="Workly">

  <!-- Twitter Cards -->
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:title" content="<?= htmlspecialchars($pageTitle, ENT_QUOTES, 'UTF-8') ?>">
  <meta name="twitter:description" content="<?= htmlspecialchars($pageDescription, ENT_QUOTES, 'UTF-8') ?>">
  <meta name="twitter:image" content="assets/logo.png">

  <!-- Google Fonts: Plus Jakarta Sans -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

  <!-- ============================================================== -->
  <!-- GOOGLE TAG (gtag.js) PLACEHOLDER                               -->
  <!-- Paste your Google Analytics (G-XXXXXXXXXX) or Google Tag       -->
  <!-- Manager script below this line when ready:                     -->
  <!--                                                                -->
  <!-- <script async src="https://www.googletagmanager.com/gtag/js?id=G-XXXXXXXXXX"></script> -->
  <!-- <script>                                                       -->
  <!--   window.dataLayer = window.dataLayer || [];                   -->
  <!--   function gtag(){dataLayer.push(arguments);}                   -->
  <!--   gtag('js', new Date());                                       -->
  <!--   gtag('config', 'G-XXXXXXXXXX');                               -->
  <!-- </script>                                                      -->
  <!-- ============================================================== -->

  <!-- Workly Stylesheet (Relative path works at domain root or any subfolder) -->
  <link rel="stylesheet" href="/assets/css/skeleton.css">
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
</head>
<body>

<!-- Fixed Top Navigation Bar -->
<header class="workly-navbar">
  <div class="nav-container">
    
      <!-- Zone 1: Brand Wordmark & Emblem -->
    <a href="./" class="brand-link">
      <img src="assets/logo.png" alt="Workly Logo" class="brand-logo" onerror="this.onerror=null;this.src='https://raw.githubusercontent.com/favicon.ico'">
      <span class="brand-title">Workly</span>
    </a>

    <!-- Mobile Hamburger Toggle Button (Aesthetic 3-bar button) -->
    <button class="mobile-menu-btn" id="mobileMenuBtn" aria-label="Open Navigation Menu" aria-expanded="false">
      <span class="bar bar-1"></span>
      <span class="bar bar-2"></span>
      <span class="bar bar-3"></span>
    </button>



    <!-- Zone 2: Navigation Links (Clean URLs for Desktop) -->
    <nav class="nav-links">
      <a href="./" class="<?= $currentPage === 'home' ? 'active' : '' ?>">Home</a>
      <a href="find-va" class="<?= $currentPage === 'find-va' ? 'active' : '' ?>">Find a VA</a>
      <a href="about" class="<?= $currentPage === 'about' ? 'active' : '' ?>">About Us</a>
      <a href="./#how-it-works">How It Works</a>
      <a href="./#faqs">FAQs</a>
    </nav>

    <!-- Zone 3: Primary Action CTA -->
    <div class="nav-cta">
      <a href="./#calendly-section" class="btn btn-primary">Book a Time</a>
    </div>
  </div>
</header>

<!-- ==============================================================
     AESTHETIC LEFT SLIDE-IN DRAWER & BACKDROP BLUR OVERLAY
     ============================================================== -->
<!-- 1. Background Blur Scrim Overlay -->
<div class="mobile-drawer-overlay" id="mobileDrawerOverlay" aria-hidden="true"></div>

<!-- 2. Left Slide-In Drawer -->
<aside class="mobile-side-drawer" id="mobileSideDrawer" aria-label="Mobile Navigation">
  <!-- Drawer Header -->
  <div class="drawer-header">
    <div class="drawer-brand">
      <img src="assets/logo.png" alt="Workly Logo" class="drawer-logo">
      <span class="drawer-title">Workly<span class="brand-accent">.</span></span>
    </div>
    <button class="drawer-close-btn" id="drawerCloseBtn" aria-label="Close Navigation Menu">
      <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
        <line x1="18" y1="6" x2="6" y2="18"></line>
        <line x1="6" y1="6" x2="18" y2="18"></line>
      </svg>
    </button>
  </div>

  <!-- Drawer Body Navigation Links -->
  <div class="drawer-body">
    <div class="drawer-section-label">Main Navigation</div>

    <a href="./" class="drawer-link <?= $currentPage === 'home' ? 'active' : '' ?>">
      <div class="drawer-icon-box">
        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m3 9 9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
      </div>
      <div class="drawer-link-content">
        <span class="drawer-link-title">Home</span>
        <span class="drawer-link-sub">Overview & discovery booking</span>
      </div>
      <svg class="drawer-arrow" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 18 15 12 9 6"></polyline></svg>
    </a>

    <a href="find-va" class="drawer-link <?= $currentPage === 'find-va' ? 'active' : '' ?>">
      <div class="drawer-icon-box">
        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"></circle><path d="m21 21-4.3-4.3"></path></svg>
      </div>
      <div class="drawer-link-content">
        <div class="drawer-title-row">
          <span class="drawer-link-title">Find a VA</span>
          <span class="drawer-chip-badge">Experienced</span>
        </div>
        <span class="drawer-link-sub">Pre-vetted bilingual experts</span>
      </div>
      <svg class="drawer-arrow" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 18 15 12 9 6"></polyline></svg>
    </a>

    <a href="about" class="drawer-link <?= $currentPage === 'about' ? 'active' : '' ?>">
      <div class="drawer-icon-box">
        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M22 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
      </div>
      <div class="drawer-link-content">
        <span class="drawer-link-title">About Workly</span>
        <span class="drawer-link-sub">Bilingual advantage & vetting rigor</span>
      </div>
      <svg class="drawer-arrow" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 18 15 12 9 6"></polyline></svg>
    </a>

    <a href="./#how-it-works" class="drawer-link">
      <div class="drawer-icon-box">
        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m12 3-1.912 5.813a2 2 0 0 1-1.275 1.275L3 12l5.813 1.912a2 2 0 0 1 1.275 1.275L12 21l1.912-5.813a2 2 0 0 1 1.275-1.275L21 12l-5.813-1.912a2 2 0 0 1-1.275-1.275L12 3Z"></path></svg>
      </div>
      <div class="drawer-link-content">
        <span class="drawer-link-title">How It Works</span>
        <span class="drawer-link-sub">3-Step simple hiring workflow</span>
      </div>
      <svg class="drawer-arrow" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 18 15 12 9 6"></polyline></svg>
    </a>

    <a href="./#faqs" class="drawer-link">
      <div class="drawer-icon-box">
        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><path d="9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3"></path><line x1="12" y1="17" x2="12.01" y2="17"></line></svg>
      </div>
      <div class="drawer-link-content">
        <span class="drawer-link-title">FAQs</span>
        <span class="drawer-link-sub">Common questions & policies</span>
      </div>
      <svg class="drawer-arrow" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 18 15 12 9 6"></polyline></svg>
    </a>

  <!-- Drawer Footer CTA -->
  <div class="drawer-footer">
    <a href="./#calendly-section" class="btn btn-primary btn-block">
      <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="18" height="18" x="3" y="4" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
      <span>Book a Time</span>
    </a>
  </div>
</aside>

<main class="page-main">