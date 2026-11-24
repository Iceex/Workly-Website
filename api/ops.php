<?php
/**
 * Workly OPS - Connected Operations Platform Showcase
 * File: /php/ops.php
 */
$currentPage     = "ops";
$pageTitle       = "Workly OPS | Connected Operations & Real-Time SLA Visibility";
$pageDescription = "See how Workly OPS unifies VA tasks, live turnaround graphs, client retainers, PTO coverage, and inbox threads to boost deliverable quality and speed.";
$canonicalUrl    = "https://worklystaff.com/ops";

/**
 * ============================================================================
 * SCREEN MEDIA SLOTS (Images, GIFs, or Videos)
 * Insert any relative path (e.g. 'assets/media/ops-demo.mp4') or full URL.
 * Supports:
 *   - Video (.mp4, .webm, .mov, .ogg)
 *   - Image / GIF (.png, .jpg, .webp, .gif, .svg)
 *   - Empty ('') -> Renders the interactive Workly OPS workspace interface
 * ============================================================================
 */
$opsMedia = [
    'hero_center'     => '', // Hero centered iPhone 16+ screen
    'slate_analytics' => '', // Collaborative Multi-Cursor Suite canvas
    'desktop_3d'      => '', // Interactive 3D desktop platform screen
    'banner_phone'    => '', // Protruding Email Hub iPhone 16+ screen
    'wide_frame'      => '', // Legacy alias fallback for desktop_3d if needed
];

// Automatically resolve asset paths whether ops.php runs at root or in /php/
$assetPrefix = file_exists(__DIR__ . '/assets/logo.png') ? 'assets/' : '../assets/';
$opsLogoPath = $assetPrefix . 'logo.png';
$logoEsc     = htmlspecialchars($opsLogoPath, ENT_QUOTES, 'UTF-8');

if (!function_exists('ops_render_media_or_fallback')) {
    function ops_render_media_or_fallback(string $url, string $alt, string $fallbackHtml): string
    {
        $cleanUrl = trim($url);
        if ($cleanUrl === '') {
            return $fallbackHtml;
        }

        $pathOnly   = parse_url($cleanUrl, PHP_URL_PATH) ?? '';
        $ext        = strtolower(pathinfo($pathOnly, PATHINFO_EXTENSION));
        $escapedUrl = htmlspecialchars($cleanUrl, ENT_QUOTES, 'UTF-8');
        $escapedAlt = htmlspecialchars($alt, ENT_QUOTES, 'UTF-8');

        if (in_array($ext, ['mp4', 'webm', 'mov', 'ogg'], true)) {
            $mime = $ext === 'mov' ? 'video/mp4' : 'video/' . $ext;
            return '<div class="ops-media-wrap">'
                 . '<video class="ops-media-el" autoplay loop muted playsinline controls preload="metadata">'
                 . '<source src="' . $escapedUrl . '" type="' . $mime . '">'
                 . '</video>'
                 . '</div>';
        }

        return '<div class="ops-media-wrap">'
             . '<img class="ops-media-el" src="' . $escapedUrl . '" alt="' . $escapedAlt . '" loading="lazy">'
             . '</div>';
    }
}

header('Cache-Control: public, max-age=120, s-maxage=3600, stale-while-revalidate=86400');

$headerPath = file_exists(__DIR__ . '/includes/header.php')
    ? __DIR__ . '/includes/header.php'
    : dirname(__DIR__) . '/includes/header.php';
require_once $headerPath;
?>

<link rel="stylesheet" href="<?= htmlspecialchars($assetPrefix, ENT_QUOTES, 'UTF-8') ?>css/ops.css">

<div class="ops-page">

  <!-- ================================================================
       1. NEAR-FULLWIDTH HERO BANNER (Floating Cards + Slim iPhone 16+)
       ================================================================ -->
  <section class="ops-hero-section">
    <div class="ops-hero-wrap">
      <div class="ops-hero-banner">
        <div class="ops-hero-rings" aria-hidden="true">
          <span></span><span></span><span></span>
        </div>

        <div class="ops-hero-header animate-entrance">
          <div class="ops-kicker">
            <img src="<?= $logoEsc ?>" alt="Workly" class="ops-inline-logo">
            <span>Workly OPS</span>
            <span aria-hidden="true">·</span>
            <span>Instant Sync &amp; Connectivity</span>
          </div>
          <h1>One connected workspace<br>for <span class="ops-gradient-text">seamless VA operations</span></h1>
          <p>
            Organize VA deliverables, monitor real-time SLA performance, balance client retainers, and centralize team email threads so every request finishes faster with zero guesswork.
          </p>
          <div class="ops-hero-actions">
            <a class="ops-btn ops-btn--primary" href="find-va">
              <span>Find Your VA</span>
              <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
            </a>
            <a class="ops-btn ops-btn--glass" href="#ops-concept">How OPS Works</a>
          </div>
        </div>

        <!-- Centered Slim iPhone 16+ + Continuous Floating Cards -->
        <div class="ops-hero-stage">

          <div class="ops-float-card ops-float-card--tl" data-parallax="18">
            <span class="ops-float-meta-line">To Do · High Priority</span>
            <strong>Fix marketing banner</strong>
            <div class="ops-float-meta">
              <span>BrightPath Digital</span>
              <span>40%</span>
            </div>
            <div class="ops-mini-bar"><span style="width:40%"></span></div>
          </div>

          <div class="ops-float-card ops-float-card--bl" data-parallax="-14">
            <div class="ops-float-row">
              <span class="ops-avatar-pill">EB</span>
              <div>
                <strong>Email Hub · 6 Unread</strong>
                <small>Ethan Brooks replied to client brief</small>
              </div>
            </div>
          </div>

          <div class="ops-float-card ops-float-card--tr" data-parallax="-20">
            <span class="ops-float-meta-line ops-meta-ok">Pod On-Time SLA</span>
            <strong>94.8% · 2.6h Turnaround</strong>
            <small>Ethan 93.0% · Olivia 96.5%</small>
          </div>

          <div class="ops-float-card ops-float-card--br" data-parallax="15">
            <span class="ops-float-meta-line">Retainer Capacity</span>
            <strong>120.5 / 180h Used (66.9%)</strong>
            <small>BrightPath 68% · Northstar 65.6%</small>
          </div>

          <!-- Centered Slim iPhone 16+ Frame -->
          <div class="ops-hero-phone-wrap" data-parallax="8">
            <div class="ops-phone-bezel ops-phone-bezel--iphone16 ops-phone-bezel--hero">
              <div class="ops-phone-island" aria-hidden="true"></div>
              <div class="ops-phone-viewport">
                <?php
                $heroPhoneFallback = '
                  <div class="ops-app-phone-ui">
                    <div class="ops-app-statusbar">
                      <span>9:41</span>
                      <span>5G · Live</span>
                    </div>
                    <div class="ops-app-greeting">
                      <div class="ops-va-chip">
                        <img src="' . $logoEsc . '" alt="Workly" class="ops-phone-brand-logo">
                        <div>
                          <small>Operations Pod · Synced</small>
                          <b>Hello, Jordan M.</b>
                        </div>
                      </div>
                    </div>
                    <div class="ops-app-feed">
                      <div class="ops-app-notif ops-app-notif--purple">
                        <div class="ops-notif-icon">
                          <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><rect width="20" height="16" x="2" y="4" rx="2"></rect><path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"></path></svg>
                        </div>
                        <div>
                          <strong>Email Hub · BrightPath Digital</strong>
                          <small>Campaign assets &amp; SLA approved</small>
                        </div>
                      </div>
                      <div class="ops-app-notif ops-app-notif--deep">
                        <div class="ops-notif-icon">
                          <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path></svg>
                        </div>
                        <div>
                          <strong>Task Completed · Bookkeeping</strong>
                          <small>Ethan Brooks · 2.6h turnaround</small>
                        </div>
                      </div>
                      <div class="ops-app-notif ops-app-notif--white">
                        <div class="ops-notif-icon ops-notif-icon--dark">
                          <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M3 3v18h18"></path><path d="m19 9-5 5-4-4-3 3"></path></svg>
                        </div>
                        <div>
                          <strong>Olivia Carter · 96.5% SLA</strong>
                          <small>Northstar retainer at 65.6%</small>
                        </div>
                      </div>
                    </div>
                  </div>
                ';
                echo ops_render_media_or_fallback($opsMedia['hero_center'], 'Workly OPS assistant activity stream', $heroPhoneFallback);
                ?>
              </div>
            </div>

            <div class="ops-hero-overlay-stack">
              <div class="ops-overlay-card ops-overlay-card--primary">
                <span class="ops-overlay-icon">
                  <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><rect width="20" height="16" x="2" y="4" rx="2"></rect><path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"></path></svg>
                </span>
                <div class="ops-overlay-text">
                  <strong>Email Hub · 6 Active Threads</strong>
                  <small>Synced automatically across client accounts</small>
                </div>
                <span class="ops-overlay-chevron">›</span>
              </div>
              <div class="ops-overlay-card ops-overlay-card--deep">
                <span class="ops-overlay-icon">
                  <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M3 3v18h18"></path><path d="m19 9-5 5-4-4-3 3"></path></svg>
                </span>
                <div class="ops-overlay-text">
                  <strong>Team SLA Summary · 94.8% On-Time</strong>
                  <small>Live deliverable velocity &amp; QA metrics</small>
                </div>
                <span class="ops-overlay-chevron">›</span>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
  </section>

  <!-- ================================================================
       2. PLATFORM CONCEPT — WHY WORKLY OPS IMPROVES QUALITY & SPEED
       ================================================================ -->
  <section class="ops-concept-section" id="ops-concept">
    <div class="ops-container">
      <div class="ops-concept-grid ops-reveal">
        <div class="ops-concept-copy">
          <div class="ops-kicker ops-kicker--subtle">
            <span>The OPS Method</span>
            <span aria-hidden="true">·</span>
            <span>Quality &amp; Response Speed</span>
          </div>
          <h2>Talent alone stalls without structured execution.</h2>
          <p>
            Most remote setups break down in scattered chat messages, unclear handoffs, and blind turnaround times. Workly OPS gives your dedicated VA and leadership team a single operational cadence—cutting response delays and preventing rework before deliverables ever ship.
          </p>

          <div class="ops-concept-pillars">
            <div class="ops-pillar-item">
              <span class="ops-pillar-num">01</span>
              <div>
                <strong>Zero-Ambiguity Briefs</strong>
                <p>Every task enters with client context, subtasks, and due-date SLAs attached—eliminating back-and-forth clarifications.</p>
              </div>
            </div>
            <div class="ops-pillar-item">
              <span class="ops-pillar-num">02</span>
              <div>
                <strong>2.6h Average Turnaround Guardrails</strong>
                <p>Real-time SLA alerts flag stalled deliverables early so your VA resolves bottlenecks before client deadlines slip.</p>
              </div>
            </div>
            <div class="ops-pillar-item">
              <span class="ops-pillar-num">03</span>
              <div>
                <strong>Continuous PTO Coverage</strong>
                <p>Approved time-off calendars automatically pair backup VAs with client workflows for uninterrupted quality.</p>
              </div>
            </div>
          </div>
        </div>

        <div class="ops-compare-card">
          <div class="ops-compare-head">
            <div>
              <strong>Operational Impact Benchmark</strong>
              <small>Toggle between ad-hoc chat workflows and Workly OPS</small>
            </div>
            <div class="ops-segmented" id="opsCompareToggle" role="tablist" aria-label="Workflow comparison">
              <button type="button" class="ops-seg-btn active" data-compare="with" aria-selected="true">With Workly OPS</button>
              <button type="button" class="ops-seg-btn" data-compare="without" aria-selected="false">Ad-Hoc Chats</button>
            </div>
          </div>

          <div class="ops-compare-metrics">
            <div class="ops-cmp-stat">
              <small>Avg Response Turnaround</small>
              <strong id="opsCmpTurn">2.6h</strong>
              <span id="opsCmpTurnSub">Same-shift execution with live priority queues</span>
            </div>
            <div class="ops-cmp-stat">
              <small>On-Time Deliverable SLA</small>
              <strong id="opsCmpSla" class="ops-text-accent">94.8%</strong>
              <span id="opsCmpSlaSub">Measured across BrightPath &amp; Northstar pods</span>
            </div>
            <div class="ops-cmp-stat">
              <small>Rework &amp; Revision Rate</small>
              <strong id="opsCmpRework">3.2%</strong>
              <span id="opsCmpReworkSub">Subtask checklists verified prior to handoff</span>
            </div>
            <div class="ops-cmp-stat">
              <small>Inbox Triage Speed</small>
              <strong id="opsCmpInbox">18m</strong>
              <span id="opsCmpInboxSub">Auto-labeled client threads inside Email Hub</span>
            </div>
          </div>

          <div class="ops-compare-foot">
            <span id="opsCmpSummary">Result: Up to 3.4x faster client response and predictable weekly output.</span>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ================================================================
       3. STICKY IMMERSIVE PARALLAX WORKFLOW SECTION
       ================================================================ -->
  <section class="ops-sticky-section" id="opsStickySection">
    <div class="ops-container">
      <div class="ops-section-heading">
        <div class="ops-kicker ops-kicker--subtle">
          <span>Operational Flow</span>
          <span aria-hidden="true">·</span>
          <span>Sticky Live Walkthrough</span>
        </div>
        <h2>Follow a deliverable from intake to executive sign-off</h2>
        <p>Scroll or click each step to watch how Workly OPS keeps context, execution, and reporting synchronized.</p>
      </div>

      <div class="ops-sticky-grid">
        <!-- Left Scrollable Narrative Chapters -->
        <div class="ops-sticky-steps" id="opsStickySteps">
          <button type="button" class="ops-sticky-step active" data-sticky-step="0">
            <span class="ops-step-index">01 · Dispatch</span>
            <h3>Requests land with priority &amp; client context</h3>
            <p>Incoming client emails or retainer requests convert straight into structured Kanban cards with subtasks, due windows, and assigned VA ownership.</p>
          </button>

          <button type="button" class="ops-sticky-step" data-sticky-step="1">
            <span class="ops-step-index">02 · Execution</span>
            <h3>Email Hub &amp; subtasks update side-by-side</h3>
            <p>Your VA works inside one unified queue—checking off subtasks, replying on labeled client threads, and logging retainer hours automatically.</p>
          </button>

          <button type="button" class="ops-sticky-step" data-sticky-step="2">
            <span class="ops-step-index">03 · Verification</span>
            <h3>SLA metrics &amp; retainer health update live</h3>
            <p>Completed deliverables feed 30-day velocity charts, per-VA turnaround benchmarks, and leadership-ready CSV or PDF SLA reports.</p>
          </button>
        </div>

        <!-- Right Sticky Parallax Stage -->
        <div class="ops-sticky-stage-col">
          <div class="ops-sticky-stage" id="opsStickyStage">
            <div class="ops-sticky-bg-glow" aria-hidden="true"></div>

            <!-- Layer 0: Dispatch -->
            <div class="ops-sticky-panel active" id="opsStickyPanel0">
              <div class="ops-st-header">
                <img src="<?= $logoEsc ?>" alt="Workly" class="ops-mock-brand-img">
                <strong>Step 01 · Structured Deliverable Dispatch</strong>
                <span class="ops-st-status">Queue Synced</span>
              </div>
              <div class="ops-st-card">
                <small>BrightPath Digital · Marketing Pod</small>
                <h4>Launch Q4 Campaign Landing Assets</h4>
                <p>Subtasks: Hero copy check (done) · Banner QA (in progress) · Client approval</p>
                <div class="ops-st-progress">
                  <div class="ops-progress-track"><div class="ops-progress-fill" style="width: 40%;"></div></div>
                  <span>40% · SLA Window: 3.0h remaining</span>
                </div>
              </div>
              <div class="ops-st-float-layer" data-sticky-parallax>
                <strong>Auto-Assigned: Ethan Brooks</strong>
                <small>Client Retainer: 68.0 / 100h · Active</small>
              </div>
            </div>

            <!-- Layer 1: Execution -->
            <div class="ops-sticky-panel" id="opsStickyPanel1">
              <div class="ops-st-header">
                <img src="<?= $logoEsc ?>" alt="Workly" class="ops-mock-brand-img">
                <strong>Step 02 · Email Hub &amp; Subtask Progress</strong>
                <span class="ops-st-status">In Execution</span>
              </div>
              <div class="ops-st-card">
                <small>Northstar Consulting · Inbox Thread #24</small>
                <h4>Client CRM Retainer Audit &amp; Reply</h4>
                <p>Ethan attached updated spreadsheet and moved thread from Unread to Client-Ready.</p>
                <div class="ops-st-progress">
                  <div class="ops-progress-track"><div class="ops-progress-fill" style="width: 78%;"></div></div>
                  <span>78% · Zero missed client replies</span>
                </div>
              </div>
              <div class="ops-st-float-layer" data-sticky-parallax>
                <strong>Olivia Carter · Parallel Review</strong>
                <small>Cross-checked financial rows in 1.8h</small>
              </div>
            </div>

            <!-- Layer 2: Verification -->
            <div class="ops-sticky-panel" id="opsStickyPanel2">
              <div class="ops-st-header">
                <img src="<?= $logoEsc ?>" alt="Workly" class="ops-mock-brand-img">
                <strong>Step 03 · SLA Scorecards &amp; Sign-Off</strong>
                <span class="ops-st-status ops-st-ok">Verified · 100%</span>
              </div>
              <div class="ops-st-card">
                <small>Executive SLA Summary · Nov 2026</small>
                <h4>Month-End Bookkeeping &amp; Assets Shipped</h4>
                <p>Completed ahead of deadline—automatically logged into 30-day Pod Velocity &amp; PDF exports.</p>
                <div class="ops-st-progress">
                  <div class="ops-progress-track"><div class="ops-progress-fill ops-fill-ok" style="width: 100%;"></div></div>
                  <span>94.8% Pod On-Time SLA · 2.6h Avg Turnaround</span>
                </div>
              </div>
              <div class="ops-st-float-layer" data-sticky-parallax>
                <strong>Report Export Ready</strong>
                <small>CSV &amp; Executive SLA PDF synced</small>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ================================================================
       4. COLLABORATIVE MULTI-CURSOR SUITE — TEAM TASKS, BENCHMARKS & PTO
       ================================================================ -->
  <section class="ops-collab-section" id="ops-collab">
    <div class="ops-container">
      <div class="ops-section-heading">
        <div class="ops-kicker ops-kicker--subtle">
          <span>Live Multi-Cursor Suite</span>
          <span aria-hidden="true">·</span>
          <span>Coordinated Execution</span>
        </div>
        <h2>Watch your team coordinate tasks, SLAs, and coverage together</h2>
        <p>Multiple cursors operate in real time across Kanban columns, performance benchmarks, and PTO schedules—click any element yourself to test every workflow.</p>
      </div>

      <div class="ops-collab-shell ops-reveal" id="opsCollabStage">
        <!-- Toolbar -->
        <div class="ops-collab-topbar">
          <div class="ops-collab-brand">
            <img src="<?= $logoEsc ?>" alt="Workly" class="ops-mock-brand-img">
            <div>
              <strong>Workly OPS · Weekly Pod Suite</strong>
              <small id="opsCollabStatus">Ethan moving Marketing Banner to In Progress...</small>
            </div>
          </div>

          <div class="ops-collab-controls">
            <div class="ops-segmented ops-segmented--light" id="opsBenchmarkTabs">
              <button type="button" class="ops-seg-btn" data-tf="7d">7D</button>
              <button type="button" class="ops-seg-btn" data-tf="14d">14D</button>
              <button type="button" class="ops-seg-btn active" data-tf="30d">30D</button>
            </div>
            <button type="button" class="ops-collab-playbtn" id="opsCollabToggle" aria-pressed="true">Pause Live Team</button>
          </div>
        </div>

        <!-- Functional Collaborative Workspace Body -->
        <div class="ops-collab-workspace">
          <!-- Kanban Columns (Real cards move between columns!) -->
          <div class="ops-collab-kanban">
            <div class="ops-collab-col" data-col="todo">
              <div class="ops-col-title">
                <span>To Do</span>
                <b id="opsCountTodo">1</b>
              </div>
              <div class="ops-col-dropzone" id="opsZoneTodo">
                <article class="ops-task-card" id="opsTaskBanner" data-task="banner">
                  <div class="ops-task-meta">High · BrightPath Digital</div>
                  <strong>Fix marketing banner</strong>
                  <div class="ops-task-bar"><span id="opsBarBanner" style="width: 40%;"></span></div>
                  <small id="opsPctBanner">40% · Ethan Brooks</small>
                </article>
              </div>
            </div>

            <div class="ops-collab-col" data-col="progress">
              <div class="ops-col-title">
                <span>In Progress</span>
                <b id="opsCountProg">1</b>
              </div>
              <div class="ops-col-dropzone" id="opsZoneProg">
                <article class="ops-task-card" id="opsTaskCrm" data-task="crm">
                  <div class="ops-task-meta">Medium · Northstar</div>
                  <strong>Client CRM Retainer Audit</strong>
                  <div class="ops-task-bar"><span id="opsBarCrm" style="width: 75%;"></span></div>
                  <small id="opsPctCrm">75% · Olivia Carter</small>
                </article>
              </div>
            </div>

            <div class="ops-collab-col" data-col="done">
              <div class="ops-col-title">
                <span>Completed</span>
                <b id="opsCountDone">1</b>
              </div>
              <div class="ops-col-dropzone" id="opsZoneDone">
                <article class="ops-task-card is-complete" id="opsTaskReport" data-task="report">
                  <div class="ops-task-meta ops-meta-ok">Verified · Bookkeeping</div>
                  <strong>Month-End Reconciliation</strong>
                  <div class="ops-task-bar"><span id="opsBarReport" style="width: 100%;"></span></div>
                  <small id="opsPctReport">100% · Signed Off</small>
                </article>
              </div>
            </div>
          </div>

          <!-- Right Panel: Live Velocity Graph & Interactive PTO Approval -->
          <div class="ops-collab-side">
            <div class="ops-bench-box">
              <div class="ops-bench-head">
                <div>
                  <small>Team Performance &amp; SLA</small>
                  <strong id="opsCollabSlaVal">94.8% On-Time SLA</strong>
                </div>
                <span class="ops-bench-turn" id="opsCollabTurnVal">2.6h Avg</span>
              </div>
              <svg viewBox="0 0 280 76" class="ops-collab-svg" aria-hidden="true">
                <defs>
                  <linearGradient id="opsCollabGrad" x1="0" y1="0" x2="0" y2="1">
                    <stop offset="0%" stop-color="#AE09E9" stop-opacity="0.22"/>
                    <stop offset="100%" stop-color="#AE09E9" stop-opacity="0"/>
                  </linearGradient>
                </defs>
                <path id="opsCollabArea" d="M8 62 Q 70 28, 140 16 T 272 22 L 272 74 L 8 74 Z" fill="url(#opsCollabGrad)"/>
                <path id="opsCollabCurve" d="M8 62 Q 70 28, 140 16 T 272 22" fill="none" stroke="#AE09E9" stroke-width="2.5" stroke-linecap="round"/>
                <circle id="opsCollabDot" cx="140" cy="16" r="4.5" fill="#10b981" stroke="#ffffff" stroke-width="2"/>
              </svg>
              <div class="ops-va-bars">
                <div><span>Ethan B.</span><b>93.0% SLA</b></div>
                <div><span>Olivia C.</span><b>96.5% SLA</b></div>
              </div>
            </div>

            <div class="ops-pto-box">
              <div class="ops-pto-head">
                <strong>Team PTO &amp; Backup Coverage</strong>
                <small id="opsPtoStatusText">Nov 19: Ethan Pending</small>
              </div>
              <div class="ops-pto-days" id="opsPtoDays">
                <button type="button" class="ops-pto-btn is-approved" data-pto="17 · Ethan Approved (Covered by Olivia)">
                  <span>Tue 17</span>
                  <b>Approved</b>
                </button>
                <button type="button" class="ops-pto-btn is-approved" data-pto="18 · Ethan Approved (Covered by Olivia)">
                  <span>Wed 18</span>
                  <b>Approved</b>
                </button>
                <button type="button" class="ops-pto-btn" id="opsPtoTarget" data-pto="19 · Ethan Approved (Covered by Olivia)">
                  <span>Thu 19</span>
                  <b id="opsPto19Label">Approve</b>
                </button>
              </div>
            </div>
          </div>

          <!-- 3 Simultaneous Collaborating Cursors -->
          <div class="ops-named-cursor ops-collab-cursor ops-cursor--lead" id="opsCursorLead" aria-hidden="true">
            <svg width="15" height="15" viewBox="0 0 24 24" fill="#0f172a" stroke="#ffffff" stroke-width="1.8"><path d="M4 4l7.07 17 2.51-7.39L21 11.07z"></path></svg>
            <span>Jordan · Client Lead</span>
          </div>

          <div class="ops-named-cursor ops-collab-cursor ops-cursor--ethan" id="opsCursorEthan" aria-hidden="true">
            <svg width="15" height="15" viewBox="0 0 24 24" fill="#AE09E9" stroke="#ffffff" stroke-width="1.8"><path d="M4 4l7.07 17 2.51-7.39L21 11.07z"></path></svg>
            <span>Ethan · VA</span>
          </div>

          <div class="ops-named-cursor ops-collab-cursor ops-cursor--olivia" id="opsCursorOlivia" aria-hidden="true">
            <svg width="15" height="15" viewBox="0 0 24 24" fill="#10b981" stroke="#ffffff" stroke-width="1.8"><path d="M4 4l7.07 17 2.51-7.39L21 11.07z"></path></svg>
            <span>Olivia · VA</span>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ================================================================
       5. INTERACTIVE 3D DESKTOP PLATFORM SHOWCASE
       ================================================================ -->
  <section class="ops-3d-section" id="ops-3d-platform">
    <div class="ops-container">
      <div class="ops-section-heading">
        <div class="ops-kicker ops-kicker--subtle">
          <span>3D Workspace Explorer</span>
          <span aria-hidden="true">·</span>
          <span>Spatial Desktop View</span>
        </div>
        <h2>Inspect every layer of the Workly OPS command center</h2>
        <p>Move your pointer across the 3D workstation, separate UI depth layers, or switch core platform modules below.</p>
      </div>

      <div class="ops-3d-toolbar">
        <div class="ops-segmented" id="ops3dViews" role="tablist" aria-label="Platform Views">
          <button type="button" class="ops-seg-btn active" data-3d-view="tasks">Tasks Board</button>
          <button type="button" class="ops-seg-btn" data-3d-view="clients">Client CRM</button>
          <button type="button" class="ops-seg-btn" data-3d-view="analytics">SLA Analytics</button>
          <button type="button" class="ops-seg-btn" data-3d-view="email">Email Hub</button>
        </div>

        <div class="ops-segmented" id="ops3dModes" role="tablist" aria-label="3D Perspective Modes">
          <button type="button" class="ops-seg-btn active" data-3d-mode="tilt">3D Interactive</button>
          <button type="button" class="ops-seg-btn" data-3d-mode="exploded">Exploded Layers</button>
          <button type="button" class="ops-seg-btn" data-3d-mode="flat">Front Focus</button>
        </div>
      </div>

      <div class="ops-3d-scene" id="ops3dScene">
        <div class="ops-3d-rig is-tilt" id="ops3dRig">

          <!-- Base Z Layer: Window Chrome + Sidebar -->
          <div class="ops-3d-layer ops-3d-layer--base">
            <div class="ops-browser-top">
              <div class="ops-browser-dots" aria-hidden="true"><span></span><span></span><span></span></div>
              <div class="ops-browser-bar" id="ops3dAddress">ops.worklystaff.com / tasks</div>
            </div>

            <div class="ops-3d-body">
              <aside class="ops-3d-sidebar">
                <div class="ops-mock-logo">
                  <img src="<?= $logoEsc ?>" alt="Workly" class="ops-mock-brand-img">
                  <span>Workly</span>
                </div>
                <button type="button" class="ops-3d-nav active" data-3d-nav="tasks">Tasks</button>
                <button type="button" class="ops-3d-nav" data-3d-nav="clients">Client CRM</button>
                <button type="button" class="ops-3d-nav" data-3d-nav="analytics">SLA Reports</button>
                <button type="button" class="ops-3d-nav" data-3d-nav="email">Email Hub <em>6</em></button>
              </aside>

              <!-- Mid Z Layer: Active View Canvas (or $opsMedia['desktop_3d']) -->
              <div class="ops-3d-layer ops-3d-layer--canvas">
                <?php
                $desktopUrl = $opsMedia['desktop_3d'] !== '' ? $opsMedia['desktop_3d'] : $opsMedia['wide_frame'];
                $desktop3dFallback = '
                  <div class="ops-3d-views-wrap" id="ops3dScreen">
                    <!-- View 1: Tasks Kanban -->
                    <div class="ops-3d-view active" id="ops3dView-tasks">
                      <div class="ops-mock-header">
                        <strong>Weekly Task Organizer</strong>
                        <span class="ops-mock-cta">33.3% Complete</span>
                      </div>
                      <div class="ops-mock-kanban">
                        <div class="ops-mock-col">
                          <label>To Do · 1</label>
                          <div class="ops-mock-card">
                            <span class="tag tag-high">High</span>
                            <b>Fix marketing banner</b>
                            <small>BrightPath · 40%</small>
                            <i><em style="width:40%"></em></i>
                          </div>
                        </div>
                        <div class="ops-mock-col">
                          <label>In Progress · 1</label>
                          <div class="ops-mock-card">
                            <span class="tag tag-med">Active</span>
                            <b>CRM Pipeline Sync</b>
                            <small>Olivia C. · 78%</small>
                            <i><em style="width:78%"></em></i>
                          </div>
                        </div>
                        <div class="ops-mock-col">
                          <label>Completed · 1</label>
                          <div class="ops-mock-card">
                            <span class="tag tag-ok">Done</span>
                            <b>Bookkeeping Close</b>
                            <small>Verified · 100%</small>
                            <i><em style="width:100%"></em></i>
                          </div>
                        </div>
                      </div>
                    </div>

                    <!-- View 2: Client CRM -->
                    <div class="ops-3d-view" id="ops3dView-clients">
                      <div class="ops-mock-header">
                        <strong>Client CRM &amp; Retainers</strong>
                        <span class="ops-mock-cta">66.9% Portfolio Used</span>
                      </div>
                      <div class="ops-3d-crm-rows">
                        <div class="ops-3d-crm-row">
                          <div><b>BrightPath Digital</b><small>Lucas Bennett · Assigned VA: Ethan Brooks</small></div>
                          <div class="ops-3d-usage"><span>68.0 / 100h</span><i><em style="width:68%"></em></i></div>
                        </div>
                        <div class="ops-3d-crm-row">
                          <div><b>Northstar Consulting</b><small>Sophia Reynolds · Assigned VA: Olivia Carter</small></div>
                          <div class="ops-3d-usage"><span>52.5 / 80h</span><i><em style="width:65.6%"></em></i></div>
                        </div>
                      </div>
                    </div>

                    <!-- View 3: SLA Analytics -->
                    <div class="ops-3d-view" id="ops3dView-analytics">
                      <div class="ops-mock-header">
                        <strong>Executive SLA Benchmarks</strong>
                        <span class="ops-mock-cta">94.8% On-Time</span>
                      </div>
                      <div class="ops-3d-kpis">
                        <div><small>Ethan Brooks</small><b>93.0% SLA</b><span>2.6h avg turnaround</span></div>
                        <div><small>Olivia Carter</small><b>96.5% SLA</b><span>1.8h avg turnaround</span></div>
                        <div><small>Kanban Velocity</small><b>+33.3%</b><span>Zero overdue blockers</span></div>
                      </div>
                    </div>

                    <!-- View 4: Email Hub -->
                    <div class="ops-3d-view" id="ops3dView-email">
                      <div class="ops-mock-header">
                        <strong>Unified Email Hub</strong>
                        <span class="ops-mock-cta">6 Unread Synced</span>
                      </div>
                      <div class="ops-3d-crm-rows">
                        <div class="ops-3d-crm-row">
                          <div><b>BrightPath Digital · Campaign QA</b><small>Ethan Brooks replied with updated hero assets</small></div>
                          <span class="tag tag-ok">Synced</span>
                        </div>
                        <div class="ops-3d-crm-row">
                          <div><b>Northstar Consulting · Monthly Report</b><small>Olivia Carter attached November SLA summary</small></div>
                          <span class="tag tag-med">Labeled</span>
                        </div>
                      </div>
                    </div>
                  </div>
                ';
                echo ops_render_media_or_fallback($desktopUrl, 'Workly OPS 3D Desktop Platform', $desktop3dFallback);
                ?>
              </div>
            </div>
          </div>

          <!-- Elevated Front Z-Layer Cards (Separate physically in Exploded 3D Mode) -->
          <div class="ops-3d-layer ops-3d-layer--float-a">
            <small>Pod SLA Benchmark</small>
            <strong>94.8% On-Time · 2.6h</strong>
          </div>
          <div class="ops-3d-layer ops-3d-layer--float-b">
            <small>Active Portfolio Load</small>
            <strong>120.5 / 180h Retainer</strong>
          </div>

        </div>
      </div>
    </div>
  </section>

  <!-- ================================================================
       6. PROTRUDING BANNER — UNIFIED EMAIL HUB (Slim iPhone 16+)
       ================================================================ -->
  <section class="ops-protrude-section">
    <div class="ops-container">
      <div class="ops-protrude-banner ops-reveal">
        <div class="ops-protrude-grid">
          <div class="ops-protrude-copy">
            <div class="ops-kicker ops-kicker--light">
              <span>Email Hub</span>
              <span aria-hidden="true">·</span>
              <span>Instant Connectivity</span>
            </div>
            <h2>Client threads organized right beside the work</h2>
            <p>
              Your VA filters inbox threads by client and label, attaches completed deliverables, and keeps executive communications structured in one shared hub.
            </p>
            <div class="ops-hero-actions ops-protrude-actions">
              <a class="ops-btn ops-btn--dark" href="find-va">Browse Verified VAs</a>
              <a class="ops-btn ops-btn--white" href="./#calendly-section">Schedule Discovery Call</a>
            </div>
          </div>

          <div class="ops-protrude-visual">
            <div class="ops-phone-bezel ops-phone-bezel--iphone16 ops-phone-bezel--protrude">
              <div class="ops-phone-island" aria-hidden="true"></div>
              <div class="ops-phone-viewport">
                <?php
                $bannerPhoneFallback = '
                  <div class="ops-email-phone-ui">
                    <div class="ops-app-statusbar">
                      <span>9:41</span>
                      <span>Email Hub</span>
                    </div>
                    <div class="ops-ep-head">
                      <small>Inbox · 6 Unread</small>
                      <strong>Conversations (25)</strong>
                    </div>
                    <div class="ops-ep-list">
                      <div class="ops-ep-item is-active">
                        <span class="ops-avatar-pill">BP</span>
                        <div>
                          <b>BrightPath Digital</b>
                          <small>Q4 marketing brief &amp; SLA approved</small>
                        </div>
                      </div>
                      <div class="ops-ep-item">
                        <span class="ops-avatar-pill">NC</span>
                        <div>
                          <b>Northstar Consulting</b>
                          <small>Retainer report attached for review</small>
                        </div>
                      </div>
                      <div class="ops-ep-item">
                        <span class="ops-avatar-pill">VA</span>
                        <div>
                          <b>Ethan Brooks · Reply</b>
                          <small>Deliverable moved to Completed</small>
                        </div>
                      </div>
                    </div>
                    <div class="ops-ep-footer">
                      <span>Synced with Team Inbox</span>
                    </div>
                  </div>
                ';
                echo ops_render_media_or_fallback($opsMedia['banner_phone'], 'Workly OPS Email Hub stream', $bannerPhoneFallback);
                ?>
              </div>
            </div>

            <div class="ops-protrude-tag ops-protrude-tag--1">Unread Threads Triaged</div>
            <div class="ops-protrude-tag ops-protrude-tag--2">Auto-Labeled by Client</div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ================================================================
       7. ENGAGE CLIENTS ACROSS SERVICE CATEGORIES & ROLES
       ================================================================ -->
  <section class="ops-categories-section" id="ops-services">
    <div class="ops-container">
      <div class="ops-section-heading">
        <div class="ops-kicker ops-kicker--subtle">
          <span>Built For Every Specialty</span>
          <span aria-hidden="true">·</span>
          <span>7 Core Service Verticals</span>
        </div>
        <h2>How teams deploy Workly OPS across industries</h2>
        <p>Select a department to see the exact deliverables, SLA targets, and operational workflows our vetted bilingual VAs run daily.</p>
      </div>

      <div class="ops-cat-shell ops-reveal">
        <div class="ops-cat-tabs" id="opsCatTabs" role="tablist" aria-label="Service Categories">
          <button type="button" class="ops-cat-btn active" data-cat="it">IT &amp; Tech Support</button>
          <button type="button" class="ops-cat-btn" data-cat="marketing">Digital Marketing</button>
          <button type="button" class="ops-cat-btn" data-cat="legal">Legal Support</button>
          <button type="button" class="ops-cat-btn" data-cat="insurance">Insurance</button>
          <button type="button" class="ops-cat-btn" data-cat="healthcare">Healthcare Admin</button>
          <button type="button" class="ops-cat-btn" data-cat="management">Operations &amp; Admin</button>
          <button type="button" class="ops-cat-btn" data-cat="realestate">Real Estate</button>
        </div>

        <div class="ops-cat-panel">
          <div class="ops-cat-main">
            <span class="ops-cat-eyebrow" id="opsCatTag">IT &amp; Technical Operations</span>
            <h3 id="opsCatTitle">Tier-1 ticket triage, QA logging, and cloud documentation</h3>
            <p id="opsCatDesc">Technical VAs track incoming helpdesk escalations inside structured Kanban queues, attach system logs, and maintain predictable SLA response windows.</p>
            <ul class="ops-cat-list" id="opsCatList">
              <li>Helpdesk triage &amp; ticket routing with clear response SLAs</li>
              <li>SOP documentation &amp; Knowledge Base maintenance</li>
              <li>Daily QA verification checklists before handoff</li>
            </ul>
            <a class="ops-btn ops-btn--primary" id="opsCatLink" href="find-va">Find IT Support VAs →</a>
          </div>

          <div class="ops-cat-metrics">
            <div class="ops-cat-stat">
              <small>Target First Response</small>
              <strong id="opsCatSpeed">45m</strong>
            </div>
            <div class="ops-cat-stat">
              <small>Verified Pod SLA</small>
              <strong id="opsCatSla">96.2%</strong>
            </div>
            <div class="ops-cat-stat">
              <small>Workly OPS Modules Used</small>
              <strong id="opsCatModules">Tasks · Email Hub · SLA Reports</strong>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ================================================================
       8. FINAL CTA BANNER
       ================================================================ -->
  <section class="ops-final-cta">
    <div class="ops-container">
      <div class="ops-cta-box ops-reveal">
        <div>
          <div class="ops-kicker ops-kicker--light">
            <img src="<?= $logoEsc ?>" alt="Workly" class="ops-inline-logo">
            <span>Ready to Launch</span>
          </div>
          <h2>Pair a dedicated bilingual VA with Workly OPS.</h2>
          <p>Cut staffing overhead by up to 70% while gaining instant operational sync and clear SLA visibility.</p>
        </div>
        <div class="ops-cta-actions">
          <a class="ops-btn ops-btn--primary" href="find-va">Find Your VA →</a>
          <a class="ops-btn ops-btn--light" href="./#calendly-section">Book Discovery Call</a>
        </div>
      </div>
    </div>
  </section>

</div>

<script src="<?= htmlspecialchars($assetPrefix, ENT_QUOTES, 'UTF-8') ?>js/ops.js" defer></script>

<?php
$footerPath = file_exists(__DIR__ . '/includes/footer.php')
    ? __DIR__ . '/includes/footer.php'
    : dirname(__DIR__) . '/includes/footer.php';
require_once $footerPath;
?>