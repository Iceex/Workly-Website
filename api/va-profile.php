<?php
/**
 * Workly - Virtual Assistant Detailed Profile
 * File: /php/va-profile.php
 */
require_once dirname(__DIR__) . '/data/vas.php';

$requestedId = $_GET['id'] ?? 'va-1';
$selectedVa = null;

foreach ($virtualAssistants as $va) {
    if ($va['id'] === $requestedId || $va['slug'] === $requestedId) {
        $selectedVa = $va;
        break;
    }
}

// Fallback to first VA if invalid ID
if (!$selectedVa) {
    $selectedVa = $virtualAssistants[0];
}

$pageTitle = "{$selectedVa['name']} – {$selectedVa['role']} | Workly";
$pageDescription = $selectedVa['tagline'];
$currentPage = "find-va";

require_once dirname(__DIR__) . '/includes/header.php';
?>

<!-- Top Breadcrumbs -->
<div class="breadcrumb-bar">
  <div class="site-container breadcrumb-flex">
    <a href="find-va" class="back-link"><span class="arrow-back">←</span> Return Back</a>
  </div>
</div>

<div class="site-container profile-container">
  <div class="profile-grid">
    <!-- Left Column: Video Presentation (Primary Content) & In-Depth Bio -->
    <div class="profile-main-content">

      <!-- PRIMARY CONTENT: Candidate Recorded Video Presentation -->
      <div class="video-container-card">
        <div class="video-card-header">
          <div class="video-status">
            <span class="pulse-indicator"></span>
            <strong>Recorded Candidate Presentation</strong>
            <span class="dot">·</span>
            <span class="badge-pending">Video Presentation</span>
          </div>
          <span class="video-note">HD 1080p Interview</span>
        </div>

        <!-- Video Player Viewport -->
<div class="video-screen-viewport" id="videoViewport">
  <button class="video-play-btn" id="playVideoBtn" aria-label="Play video preview"></button>
  <div class="media-loader is-loading">
    <div class="skeleton-placeholder"></div>  
  <video controlsList="nodownload" preload="metadata" poster="" class="media-content">
        <source
            src="<?= htmlspecialchars($selectedVa['videoInfo']['videoUrl'], ENT_QUOTES, 'UTF-8') ?>"
            type="video/mp4">
    </video>
      </div>
          <div class="video-overlay-scrim">
            <div class="video-top-details">
              <span><?= htmlspecialchars($selectedVa['videoInfo']['title'], ENT_QUOTES, 'UTF-8') ?></span>
              <span class="duration-badge"><?= htmlspecialchars($selectedVa['videoInfo']['duration'], ENT_QUOTES, 'UTF-8') ?></span>
            </div>
          </div>
</div>
        
        <!-- Topics Covered -->
        <div class="video-topics-strip">
          <span class="topics-title">Topics Covered in Presentation:</span>
          <div class="topics-list">
            <?php foreach ($selectedVa['videoInfo']['topicsCovered'] as $idx => $topic): ?>
              <span class="topic-tag">0<?= $idx + 1 ?>. <?= htmlspecialchars($topic, ENT_QUOTES, 'UTF-8') ?></span>
            <?php endforeach; ?>
          </div>
        </div>
      </div>

      <!-- In-Depth Role Breakdown & Responsibilities -->
      <div class="profile-details-card">
        <h3>About <?= htmlspecialchars($selectedVa['name'], ENT_QUOTES, 'UTF-8') ?></h3>
        <p class="lead-bio">
          <?= htmlspecialchars($selectedVa['fullBio'], ENT_QUOTES, 'UTF-8') ?>
        </p>

        <div class="divider-line"></div>

        <h3>Key Responsibilities & Deliverables for this Role</h3>
        <ul class="responsibilities-list">
          <?php foreach ($selectedVa['keyResponsibilities'] as $resp): ?>
            <li>
              <span class="check-icon">✓</span>
              <span><?= htmlspecialchars($resp, ENT_QUOTES, 'UTF-8') ?></span>
            </li>
          <?php endforeach; ?>
        </ul>

        <div class="divider-line"></div>

        <h3>Why <?= htmlspecialchars(explode(' ', $selectedVa['name'])[0], ENT_QUOTES, 'UTF-8') ?> Excels</h3>
        <div class="strengths-grid">
          <?php foreach ($selectedVa['whyTheyExcel'] as $strength): ?>
            <div class="strength-card">
              <?= htmlspecialchars($strength, ENT_QUOTES, 'UTF-8') ?>
            </div>
          <?php endforeach; ?>
        </div>
      </div>

      <!-- Verified Reviews -->
      <div class="profile-details-card">
        <div class="reviews-header">
          <div>
            <h3>Verified Client Reviews</h3>
            <p class="subtext">Feedback from previous engagements and ongoing contracts.</p>
          </div>
          <span class="score-badge">★ <?= htmlspecialchars($selectedVa['rating'], ENT_QUOTES, 'UTF-8') ?> / 5.0</span>
        </div>

        <div class="reviews-list">
          <?php foreach ($selectedVa['reviews'] as $rev): ?>
            <div class="review-item">
              <div class="rev-top">
                <div>
                  <strong><?= htmlspecialchars($rev['clientName'], ENT_QUOTES, 'UTF-8') ?></strong>
                  <span class="rev-org"><?= htmlspecialchars($rev['clientRole'], ENT_QUOTES, 'UTF-8') ?> · <?= htmlspecialchars($rev['company'], ENT_QUOTES, 'UTF-8') ?></span>
                </div>
                <div class="rev-stars">★★★★★</div>
              </div>
              <p class="rev-quote">"<?= htmlspecialchars($rev['comment'], ENT_QUOTES, 'UTF-8') ?>"</p>
              <div class="rev-date"><?= htmlspecialchars($rev['date'], ENT_QUOTES, 'UTF-8') ?></div>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
    </div>

    <!-- Right Sidebar: Quick Booking & Specs -->
    <div class="profile-sidebar">

      <!-- Profile Header Summary Card -->
       <div class="sidebar-card">
            <div class="summary-container">
              <div class="summary-name-row">
                <h1 class="summary-name"><?= htmlspecialchars($selectedVa['name'], ENT_QUOTES, 'UTF-8') ?></h1>
              </div>
          
              <div class="summary-pricing">
                <div class="rate-amount">$<?= htmlspecialchars($selectedVa['hourlyRate'], ENT_QUOTES, 'UTF-8') ?>
                <span>/hr</span>
                </div>
            </div>
              <div class="summary-meta">
              <p class="summary-role"><?= htmlspecialchars($selectedVa['role'], ENT_QUOTES, 'UTF-8') ?></p>
                <span class="badge-status-online">Available Immediately</span>
                <span><?= htmlspecialchars($selectedVa['category'], ENT_QUOTES, 'UTF-8') ?></span>
                <span class="dot">·</span>
                <span class="stars"><span class="star-icon">★</span> <?= htmlspecialchars($selectedVa['rating'], ENT_QUOTES, 'UTF-8') ?></span>
                <span class="rev-count">(<?= htmlspecialchars($selectedVa['reviewCount'], ENT_QUOTES, 'UTF-8') ?> reviews)</span>
              </div>
          </div>


        </div>

      <div class="sidebar-card">
        <h3>Interview <?= htmlspecialchars(explode(' ', $selectedVa['name'])[0], ENT_QUOTES, 'UTF-8') ?></h3>

        <div class="spec-list">
          <div class="spec-item">
            <span>Availability:</span>
            <strong><?= htmlspecialchars($selectedVa['availability'], ENT_QUOTES, 'UTF-8') ?> (<?= htmlspecialchars($selectedVa['hoursPerWeek'], ENT_QUOTES, 'UTF-8') ?> hrs/wk)</strong>
          </div>
          <div class="spec-item">
            <span>Timezone:</span>
            <strong><?= htmlspecialchars($selectedVa['timezone'], ENT_QUOTES, 'UTF-8') ?></strong>
          </div>
          <div class="spec-item">
            <span>Languages:</span>
            <strong><?= htmlspecialchars(implode(', ', $selectedVa['languages']), ENT_QUOTES, 'UTF-8') ?></strong>
          </div>
          <div class="spec-item">
            <span>Experience:</span>
            <strong><?= htmlspecialchars($selectedVa['experienceYears'], ENT_QUOTES, 'UTF-8') ?> Years Dedicated</strong>
          </div>
        </div>

        <a href="./#calendly-section" class="btn btn-primary btn-block btn-large">
          Schedule Call
        </a>
      </div>

      <!-- Tools Box -->
      <div class="sidebar-card">
        <h4>Proficient Tools & Software</h4>
        <div class="tools-cloud">
          <?php foreach ($selectedVa['tools'] as $tool): ?>
            <span class="tool-tag"><?= htmlspecialchars($tool, ENT_QUOTES, 'UTF-8') ?></span>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
  </div>
</div>

<?php require_once dirname(__DIR__) . '/includes/footer.php'; ?>