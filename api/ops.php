<?php
/**
 * Workly OPS - Operations Workspace Showcase
 * File: /php/ops.php
 */
$currentPage     = "ops";
$pageTitle       = "Workly OPS | A Better Way to Work Together";
$pageDescription = "Workly OPS helps your virtual assistant organize tasks, coordinate projects, communicate clearly, and keep your business informed.";
$canonicalUrl    = "https://worklystaff.com/ops";

/**
 * ============================================================================
 * IMAGE URL CONFIGURATION
 * Insert your image URLs below (e.g. 'assets/images/ops-dashboard.png' or full URL).
 * Leave empty ('') to render the clean styled placeholder frames.
 * ============================================================================
 */
$opsHeroVisualUrl   = ''; // Main hero showcase image URL
$opsWorkspaceUrl    = ''; // Full workspace overview image URL
$opsHandheldViewUrl = ''; // Compact companion view image URL

header('Cache-Control: public, max-age=120, s-maxage=3600, stale-while-revalidate=86400');

$headerPath = file_exists(__DIR__ . '/includes/header.php')
    ? __DIR__ . '/includes/header.php'
    : dirname(__DIR__) . '/includes/header.php';
require_once $headerPath;
?>

<link rel="stylesheet" href="assets/css/ops.css">

<div class="ops-page">
  <!-- 1. HERO SECTION -->
  <section class="ops-hero">
    <div class="ops-hero-grid-bg" aria-hidden="true"></div>
    <div class="ops-container ops-hero-grid">
      <div class="ops-hero-copy animate-entrance">
        <span class="ops-eyebrow">The Workly Advantage</span>
        <h1>Great support.<br><span class="ops-gradient-text">Better organized.</span></h1>
        <p>
          Meet Workly OPS, the dedicated operations workspace that helps your virtual assistant keep projects moving, communication clear, and your business one step ahead.
        </p>

        <div class="ops-hero-actions">
          <a class="ops-btn ops-btn--primary" href="find-va">
            <span>Find your VA</span>
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
          </a>
          <a class="ops-btn ops-btn--light" href="#ops-platform">Explore the platform</a>
        </div>

        <div class="ops-proof">
          <span>
            <i class="ops-check" aria-hidden="true">
              <svg width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"></polyline></svg>
            </i>
            Clear task ownership
          </span>
          <span>
            <i class="ops-check" aria-hidden="true">
              <svg width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"></polyline></svg>
            </i>
            Visible progress
          </span>
          <span>
            <i class="ops-check" aria-hidden="true">
              <svg width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"></polyline></svg>
            </i>
            Transparent updates
          </span>
        </div>
      </div>

      <!-- Hero Visual Slot -->
      <div class="ops-hero-visual animate-entrance">
        <div class="ops-window-chrome">
          <div class="ops-window-dots" aria-hidden="true">
            <span></span><span></span><span></span>
          </div>
          <span class="ops-window-label">Workly OPS — Shared Operations Hub</span>
        </div>

        <div class="ops-visual-viewport">
          <?php if (!empty($opsHeroVisualUrl)): ?>
            <img
              src="<?= htmlspecialchars($opsHeroVisualUrl, ENT_QUOTES, 'UTF-8') ?>"
              alt="Workly OPS weekly task organizer showing project stages and team progress"
              class="ops-visual-img"
            >
          <?php else: ?>
            <!-- Replace $opsHeroVisualUrl at the top of ops.php to render your image here -->
            <div class="ops-image-slot" role="img" aria-label="Platform overview image slot">
              <div class="ops-slot-icon" aria-hidden="true">
                <svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><rect width="18" height="18" x="3" y="3" rx="2" ry="2"></rect><circle cx="9" cy="9" r="2"></circle><path d="m21 15-3.086-3.086a2 2 0 0 0-2.828 0L6 21"></path></svg>
              </div>
              <strong>Workspace Overview Preview</strong>
              <span>Ready for platform image URL</span>
            </div>
          <?php endif; ?>
        </div>

        <div class="ops-float ops-float--one">
          <span class="ops-float-icon" aria-hidden="true">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"></polyline></svg>
          </span>
          <div>
            <strong>Work in progress</strong>
            <small>Tasks stay on track</small>
          </div>
        </div>

        <div class="ops-float ops-float--two">
          <span class="ops-float-icon" aria-hidden="true">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="7" y1="17" x2="17" y2="7"></line><polyline points="7 7 17 7 17 17"></polyline></svg>
          </span>
          <div>
            <strong>One shared workspace</strong>
            <small>Your VA and projects, connected</small>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- 2. MEET WORKLY OPS INTRO -->
  <section class="ops-intro" id="ops-platform">
    <div class="ops-container ops-intro-grid">
      <div class="ops-intro-copy">
        <span class="ops-eyebrow">Meet Workly OPS</span>
        <h2>More than a task manager. A smarter way to work together.</h2>
        <p>
          OPS is the operations workspace that supports the day-to-day collaboration between your business and your Workly virtual assistant. It brings tasks, clients, schedules, and communication into one cohesive rhythm.
        </p>
        <p>
          Your assistant spends less time switching between scattered tools and chasing missing context, and more time executing the high-impact work that moves your company forward.
        </p>

        <div class="ops-intro-note">
          <span class="ops-note-icon" aria-hidden="true">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>
          </span>
          <div>
            <strong>Built around your VA's workflow</strong>
            <p>OPS gives your assistant a shared space to organize daily responsibilities and keep your leadership team informed at every stage.</p>
          </div>
        </div>
      </div>

      <div class="ops-mini-board" aria-label="Task workflow overview">
        <div class="ops-mini-top">
          <strong>Weekly task overview</strong>
          <span class="ops-status-text">Workspace active</span>
        </div>
        <div class="ops-mini-columns">
          <div class="ops-mini-col">
            <strong>To do</strong>
            <div class="ops-mini-card">
              <span class="ops-card-bar ops-card-bar--accent"></span>
              <b>Prepare campaign brief</b>
              <small>Marketing · High priority</small>
            </div>
            <div class="ops-mini-card">
              <span class="ops-card-bar"></span>
              <b>Review new requests</b>
              <small>Operations</small>
            </div>
          </div>

          <div class="ops-mini-col">
            <strong>In progress</strong>
            <div class="ops-mini-card">
              <span class="ops-card-bar ops-card-bar--primary"></span>
              <b>Update client records</b>
              <small>68% complete</small>
            </div>
            <div class="ops-mini-card">
              <span class="ops-card-bar ops-card-bar--primary"></span>
              <b>Weekly performance report</b>
              <small>Due today</small>
            </div>
          </div>

          <div class="ops-mini-col">
            <strong>Completed</strong>
            <div class="ops-mini-card">
              <span class="ops-card-bar ops-card-bar--done"></span>
              <b>Inbox organization</b>
              <small>Delivered</small>
            </div>
            <div class="ops-mini-card">
              <span class="ops-card-bar ops-card-bar--done"></span>
              <b>Vendor follow-ups</b>
              <small>Verified</small>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- 3. EVERYTHING CONNECTED (6 CAPABILITIES) -->
  <section class="ops-benefits">
    <div class="ops-container">
      <div class="ops-heading">
        <span class="ops-eyebrow">Everything Connected</span>
        <h2>The tools your VA needs, in one workspace.</h2>
        <p>OPS brings essential operational tools together so your assistant stays organized and your business stays informed without friction.</p>
      </div>

      <div class="ops-feature-grid">
        <article class="ops-feature">
          <span class="ops-feature-icon" aria-hidden="true">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="18" height="18" x="3" y="3" rx="2"></rect><path d="M9 3v18"></path><path d="M15 3v18"></path></svg>
          </span>
          <h3>Task &amp; deliverable management</h3>
          <p>Organize work by stage, set priorities and due dates, track subtasks, and follow each deliverable cleanly through completion.</p>
        </article>

        <article class="ops-feature">
          <span class="ops-feature-icon" aria-hidden="true">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="18" height="18" x="3" y="4" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
          </span>
          <h3>Calendar &amp; planning</h3>
          <p>Keep schedules, important milestones, and recurring work commitments visible so your VA can plan every week with clarity.</p>
        </article>

        <article class="ops-feature">
          <span class="ops-feature-icon" aria-hidden="true">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 7h-9"></path><path d="M14 17H5"></path><circle cx="17" cy="17" r="3"></circle><circle cx="7" cy="7" r="3"></circle></svg>
          </span>
          <h3>Client workspace</h3>
          <p>Keep client details, workflows, and assigned deliverables structured so responsibilities are always easy to follow.</p>
        </article>

        <article class="ops-feature">
          <span class="ops-feature-icon" aria-hidden="true">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="20" height="16" x="2" y="4" rx="2"></rect><path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"></path></svg>
          </span>
          <h3>Email hub</h3>
          <p>Bring external communication right into the operational workflow so key client and vendor threads stay easy to manage.</p>
        </article>

        <article class="ops-feature">
          <span class="ops-feature-icon" aria-hidden="true">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 19.5v-15A2.5 2.5 0 0 1 6.5 2H20v20H6.5a2.5 2.5 0 0 1 0-5H20"></path></svg>
          </span>
          <h3>Knowledge base</h3>
          <p>Store SOPs, instructions, and reference guides in one place—reducing repeated questions and preserving institutional knowledge.</p>
        </article>

        <article class="ops-feature">
          <span class="ops-feature-icon" aria-hidden="true">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M22 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
          </span>
          <h3>People &amp; collaboration</h3>
          <p>Support smooth coordination with clear team visibility, contextual comments, availability tracking, and shared working context.</p>
        </article>
      </div>
    </div>
  </section>

  <!-- 4. UNIFIED WORKSPACE SHOWCASE (FULL VIEW IMAGE SLOT) -->
  <section class="ops-showcase">
    <div class="ops-container ops-showcase-grid">
      <div class="ops-showcase-copy">
        <span class="ops-eyebrow">Full Command Center</span>
        <h2>A clear view of what's happening across your work.</h2>
        <p>
          Give your virtual assistant a structured space to organize tasks, review priorities, and manage several deliverables at once. Work becomes effortless to follow because every item has a clear stage and next step.
        </p>
        <ul class="ops-list">
          <li>
            <i class="ops-check" aria-hidden="true">
              <svg width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"></polyline></svg>
            </i>
            <span>Track every assignment seamlessly from backlog to completion.</span>
          </li>
          <li>
            <i class="ops-check" aria-hidden="true">
              <svg width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"></polyline></svg>
            </i>
            <span>Spot top priorities, upcoming deadlines, and overdue items early.</span>
          </li>
          <li>
            <i class="ops-check" aria-hidden="true">
              <svg width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"></polyline></svg>
            </i>
            <span>Keep client deliverables and daily responsibilities neatly organized.</span>
          </li>
          <li>
            <i class="ops-check" aria-hidden="true">
              <svg width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"></polyline></svg>
            </i>
            <span>Follow live progress without relying on scattered status messages.</span>
          </li>
        </ul>
      </div>

      <div class="ops-screen">
        <div class="ops-visual-viewport ops-visual-viewport--screen">
          <?php if (!empty($opsWorkspaceUrl)): ?>
            <img
              src="<?= htmlspecialchars($opsWorkspaceUrl, ENT_QUOTES, 'UTF-8') ?>"
              alt="Workly OPS weekly task organizer overview"
              class="ops-visual-img"
            >
          <?php else: ?>
            <!-- Replace $opsWorkspaceUrl at the top of ops.php to render your full workspace image -->
            <div class="ops-image-slot" role="img" aria-label="Operations workspace image slot">
              <div class="ops-slot-icon" aria-hidden="true">
                <svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><rect width="20" height="14" x="2" y="3" rx="2"></rect><line x1="8" y1="21" x2="16" y2="21"></line><line x1="12" y1="17" x2="12" y2="21"></line></svg>
              </div>
              <strong>Shared Operations View</strong>
              <span>Ready for workspace image URL</span>
            </div>
          <?php endif; ?>
        </div>
        <div class="ops-screen-caption">
          <b>Weekly Task Organizer</b>
          <span>Shared Workspace Overview</span>
        </div>
      </div>
    </div>
  </section>

  <!-- 5. ON-THE-GO WORKFLOW (COMPANION MOCKUP IMAGE SLOT) -->
  <section class="ops-showcase ops-showcase--tint">
    <div class="ops-container ops-showcase-grid ops-showcase-grid--reverse">
      <div class="ops-handheld-stage">
        <div class="ops-stage-bubble">
          <strong>Stay up to date</strong>
          <small>Check priorities and progress wherever you are.</small>
        </div>

        <div class="ops-phone" aria-label="Compact companion view preview">
          <div class="ops-phone-screen">
            <?php if (!empty($opsHandheldViewUrl)): ?>
              <img
                src="<?= htmlspecialchars($opsHandheldViewUrl, ENT_QUOTES, 'UTF-8') ?>"
                alt="Workly OPS companion dashboard view"
                class="ops-phone-img"
              >
            <?php else: ?>
              <!-- Replace $opsHandheldViewUrl at the top of ops.php to insert your custom image URL -->
              <div class="ops-phone-slot">
                <div class="ops-phone-status">
                  <span>9:41</span>
                  <span>OPS</span>
                </div>
                <div class="ops-phone-placeholder-box">
                  <div class="ops-slot-icon ops-slot-icon--sm" aria-hidden="true">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><rect width="14" height="20" x="5" y="2" rx="2" ry="2"></rect><line x1="12" y1="18" x2="12.01" y2="18"></line></svg>
                  </div>
                  <strong>Compact Companion View</strong>
                  <span>Ready for app preview URL</span>
                </div>
                <div class="ops-phone-mini-preview">
                  <div class="ops-phone-summary">
                    <div class="ops-phone-stat"><small>Open tasks</small><b>08</b></div>
                    <div class="ops-phone-stat"><small>Completed</small><b>12</b></div>
                  </div>
                  <div class="ops-phone-task">
                    <div class="ops-phone-task-top"><span>HIGH PRIORITY</span><span>Today</span></div>
                    <strong>Review campaign assets</strong>
                    <div class="ops-progress"><span></span></div>
                  </div>
                </div>
              </div>
            <?php endif; ?>
          </div>
        </div>

        <div class="ops-stage-bubble ops-stage-bubble--bottom">
          <strong>A more flexible rhythm</strong>
          <small>Keep operations moving smoothly from anywhere.</small>
        </div>
      </div>

      <div class="ops-showcase-copy">
        <span class="ops-eyebrow">Connected Anywhere</span>
        <h2>Keep the important things close, wherever work takes you.</h2>
        <p>
          OPS is built around continuous alignment. Critical priorities, daily deliverables, and project milestones remain accessible at a glance so you stay informed while your assistant handles the execution.
        </p>
        <ul class="ops-list">
          <li>
            <i class="ops-check" aria-hidden="true">
              <svg width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"></polyline></svg>
            </i>
            <span>See urgent priorities and upcoming deliverables at a glance.</span>
          </li>
          <li>
            <i class="ops-check" aria-hidden="true">
              <svg width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"></polyline></svg>
            </i>
            <span>Review task progress quickly without digging through long email threads.</span>
          </li>
          <li>
            <i class="ops-check" aria-hidden="true">
              <svg width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"></polyline></svg>
            </i>
            <span>Stay connected to your assistant's workflow throughout the day.</span>
          </li>
        </ul>
      </div>
    </div>
  </section>

  <!-- 6. VISIBILITY BUILDS TRUST (DARK SECTION) -->
  <section class="ops-transparency">
    <div class="ops-container">
      <div class="ops-heading">
        <span class="ops-eyebrow">Visibility Builds Trust</span>
        <h2>Know what's moving forward. And what's next.</h2>
        <p>A great working relationship requires more than completed tasks—it thrives on shared context, structured communication, and reliable updates.</p>
      </div>

      <div class="ops-transparency-grid">
        <article class="ops-transparency-card">
          <span class="ops-step-num">01</span>
          <h3>Progress you can follow</h3>
          <p>Clear stages, realistic due dates, and organized deliverables make ongoing initiatives effortless to track.</p>
        </article>

        <article class="ops-transparency-card">
          <span class="ops-step-num">02</span>
          <h3>Communication in context</h3>
          <p>Comments, email workflows, and shared documentation live alongside each task to eliminate fragmented chats.</p>
        </article>

        <article class="ops-transparency-card">
          <span class="ops-step-num">03</span>
          <h3>Structured reporting</h3>
          <p>Planning and reporting tools give leaders clear visibility into weekly output, upcoming priorities, and capacity.</p>
        </article>
      </div>
    </div>
  </section>

  <!-- 7. OPERATING RHYTHM & SNAPSHOT -->
  <section class="ops-showcase">
    <div class="ops-container ops-showcase-grid">
      <div class="ops-showcase-copy">
        <span class="ops-eyebrow">Built for Growth</span>
        <h2>Less time coordinating. More time moving forward.</h2>
        <p>
          OPS establishes a dependable operating cadence between you and your virtual assistant. Instead of wondering what is being handled, you gain a transparent system for alignment.
        </p>
        <ul class="ops-list">
          <li>
            <i class="ops-check" aria-hidden="true">
              <svg width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"></polyline></svg>
            </i>
            <span><b>Organization:</b> responsibilities and deliverables share a single source of truth.</span>
          </li>
          <li>
            <i class="ops-check" aria-hidden="true">
              <svg width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"></polyline></svg>
            </i>
            <span><b>Productivity:</b> your VA spends more time executing and less time searching for files.</span>
          </li>
          <li>
            <i class="ops-check" aria-hidden="true">
              <svg width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"></polyline></svg>
            </i>
            <span><b>Transparency:</b> progress, timelines, and decisions stay crystal clear.</span>
          </li>
          <li>
            <i class="ops-check" aria-hidden="true">
              <svg width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"></polyline></svg>
            </i>
            <span><b>Consistency:</b> repeatable workflows keep operations running smoothly every week.</span>
          </li>
        </ul>
      </div>

      <div class="ops-mini-board ops-mini-board--tint">
        <div class="ops-mini-top">
          <strong>Business workflow snapshot</strong>
          <span class="ops-status-text">Aligned rhythm</span>
        </div>
        <div class="ops-mini-columns">
          <div class="ops-mini-col">
            <strong>Plan</strong>
            <div class="ops-mini-card">
              <span class="ops-card-bar ops-card-bar--accent"></span>
              <b>Set weekly priorities</b>
              <small>Clear direction</small>
            </div>
          </div>
          <div class="ops-mini-col">
            <strong>Execute</strong>
            <div class="ops-mini-card">
              <span class="ops-card-bar ops-card-bar--primary"></span>
              <b>Manage deliverables</b>
              <small>Visible progress</small>
            </div>
          </div>
          <div class="ops-mini-col">
            <strong>Report</strong>
            <div class="ops-mini-card">
              <span class="ops-card-bar ops-card-bar--done"></span>
              <b>Share updates</b>
              <small>Aligned decisions</small>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- 8. FINAL CTA -->
  <section class="ops-cta">
    <div class="ops-container ops-cta-inner">
      <div class="ops-cta-copy">
        <h2>Give your business the support it deserves.</h2>
        <p>Work with a dedicated bilingual virtual assistant backed by a cleaner, more organized way to get things done.</p>
      </div>
      <a class="ops-btn ops-btn--primary" href="find-va">
        <span>Find your virtual assistant</span>
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
      </a>
    </div>
  </section>
</div>

<?php
$footerPath = file_exists(__DIR__ . '/includes/footer.php')
    ? __DIR__ . '/includes/footer.php'
    : dirname(__DIR__) . '/includes/footer.php';
require_once $footerPath;
?>