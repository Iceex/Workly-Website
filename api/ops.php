<?php
/**
 * Workly OPS - Connected Operations Platform Showcase
 * File: /php/ops.php
 */
$currentPage     = "ops";
$pageTitle       = "Workly OPS | VA workflows";
$pageDescription = "OPS simplifies business operations by connecting tools, streamlining workflows, and making everyday tasks easier.";
$canonicalUrl    = "https://worklystaff.com/ops";


/**
 * ============================================================================
 * SCREEN MEDIA SLOTS (Images, GIFs, or Videos)
 * Insert any relative path (e.g. 'assets/media/ops-demo.mp4') or full URL.
 * Supports:
 *   - Video (.mp4, .webm, .mov, .ogg)
 *   - Image / GIF (.png, .jpg, .webp, .gif, .svg)
 *   - Empty ('') -> Renders the live Workly OPS interface
 * ============================================================================
 */
$opsMedia = [
    'hero_center'     => '', // Hero centered slim iPhone 16+ screen
    'slate_analytics' => '', // Collaborative Multi-Cursor Suite canvas
    'desktop_3d'      => '', // Interactive 3D desktop platform screen
    'banner_phone'    => '', // Protruding Alerts, Email & Calendar iPhone 16+ screen
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
       1. HERO SECTION
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
            <span>A Better Way to Work Together</span>
          </div>

          <h1>
            Everything your team needs,<br>
            <span class="ops-gradient-text">all in one place.</span>
          </h1>

          <p>
            Work smarter with a dedicated virtual assistant and a team that keeps everything organized.
            Manage daily tasks, stay connected, track progress, and see how your business moves forward
            — all from one simple workspace.
          </p>

          <div class="ops-hero-actions">
            <a class="ops-btn ops-btn--dark" href="find-va">
              <span>Find Your VA</span>
              <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                <line x1="5" y1="12" x2="19" y2="12"></line>
                <polyline points="12 5 19 12 12 19"></polyline>
              </svg>
            </a>
            <a class="ops-btn ops-btn--glass" href="#ops-capabilities">Discover How It Works</a>
          </div>
        </div>

        <div class="ops-hero-stage">

          <div class="ops-float-card ops-float-card--tl">
            <span class="ops-float-meta-line">Task Update · 2 Comments</span>
            <strong>Update Marketing Banner</strong>
            <div class="ops-float-meta">
              <span>BrightPath Digital</span>
              <span>65%</span>
            </div>
            <div class="ops-mini-bar"><span style="width:65%"></span></div>
          </div>

          <div class="ops-float-card ops-float-card--bl">
            <div class="ops-float-row">
              <span class="ops-avatar-pill">TL</span>
              <div>
                <strong>Team Update</strong>
                <small>Your next meeting is ready</small>
              </div>
            </div>
          </div>

          <div class="ops-float-card ops-float-card--tr">
            <span class="ops-float-meta-line ops-meta-ok">Weekly Summary</span>
            <strong>94.8% On-Time · 2.6h Avg</strong>
            <small>Shared with Client &amp; Team</small>
          </div>

          <div class="ops-float-pill ops-float-pill--br">
            <span class="ops-pill-avatars">
              <i>OC</i><i>EB</i>
            </span>
            <span>Your Team &amp; Clients · <b>66.9% Used</b></span>
          </div>

          <div class="ops-hero-phone-wrap">
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
                          <small>Your Workly Team</small>
                          <b>Hello, Jordan!</b>
                        </div>
                      </div>
                    </div>
                    <div class="ops-app-feed">
                      <div class="ops-app-notif ops-app-notif--purple">
                        <div class="ops-notif-icon">
                          <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path></svg>
                        </div>
                        <div>
                          <strong>New Task Update</strong>
                          <small>Ethan: Updated the design and added notes</small>
                        </div>
                      </div>
                      <div class="ops-app-notif ops-app-notif--deep">
                        <div class="ops-notif-icon">
                          <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><rect width="18" height="18" x="3" y="4" rx="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line></svg>
                        </div>
                        <div>
                          <strong>Upcoming Meeting</strong>
                          <small>BrightPath Call · Added to Calendar</small>
                        </div>
                      </div>
                      <div class="ops-app-notif ops-app-notif--white">
                        <div class="ops-notif-icon ops-notif-icon--dark">
                          <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline></svg>
                        </div>
                        <div>
                          <strong>Weekly Report Sent</strong>
                          <small>Shared with Client &amp; Team</small>
                        </div>
                      </div>
                    </div>
                  </div>
                ';
                echo ops_render_media_or_fallback($opsMedia['hero_center'], 'Workly workspace on mobile', $heroPhoneFallback);
                ?>
              </div>
            </div>

            <div class="ops-hero-overlay-stack">
              <div class="ops-overlay-card ops-overlay-card--primary">
                <span class="ops-overlay-icon">
                  <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><rect width="20" height="16" x="2" y="4" rx="2"></rect><path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"></path></svg>
                </span>
                <div class="ops-overlay-text">
                  <strong>Your Emails &amp; Meetings</strong>
                  <small>Keep conversations and appointments together</small>
                </div>
                <span class="ops-overlay-chevron">›</span>
              </div>
              <div class="ops-overlay-card ops-overlay-card--deep">
                <span class="ops-overlay-icon">
                  <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M3 3v18h18"></path><path d="m19 9-5 5-4-4-3 3"></path></svg>
                </span>
                <div class="ops-overlay-text">
                  <strong>Simple Weekly &amp; Monthly Reports</strong>
                  <small>Keep everyone informed about the work being done</small>
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
       2. MAIN FEATURES
       ================================================================ -->
  <section class="ops-bento-section" id="ops-capabilities">
    <div class="ops-container">
      <div class="ops-section-heading">
        <div class="ops-kicker ops-kicker--subtle">
          <span>Everything in One Place</span>
          <span aria-hidden="true">·</span>
          <span>Simple Tools, Better Results</span>
        </div>
        <h2>Less time organizing. More time getting things done.</h2>
        <p>
          Everything your virtual assistant needs to stay organized, work efficiently, and keep you informed
          — without the hassle of managing multiple tools.
        </p>
      </div>

      <div class="ops-bento-row ops-bento-row--wide-left">

        <article class="ops-bento-card ops-card--lilac ops-reveal">
          <div class="ops-bento-split">
            <div class="ops-bento-copy">
              <span class="ops-card-tag">Stay Organized</span>
              <h3>Your Team &amp; Clients</h3>
              <p>
                Keep client information, assigned assistants, important notes, and conversations together.
                Everyone knows what needs to be done and has the information they need to do it right.
              </p>
              <a href="#ops-collab" class="ops-text-link">See how it works →</a>
            </div>

            <div class="ops-sync-diagram" aria-label="Connected workspace overview">
              <div class="ops-sync-ring"></div>
              <div class="ops-sync-core">
                <img src="<?= $logoEsc ?>" alt="Workly" class="ops-sync-logo">
              </div>
              <div class="ops-sync-node ops-sync-node--1"><span>Client Details</span></div>
              <div class="ops-sync-node ops-sync-node--2"><span>Emails &amp; Calls</span></div>
              <div class="ops-sync-node ops-sync-node--3"><span>Daily Tasks</span></div>
              <div class="ops-sync-node ops-sync-node--4"><span>Progress Reports</span></div>
            </div>
          </div>
        </article>

        <article class="ops-bento-card ops-card--mint ops-reveal">
          <div class="ops-bento-copy">
            <span class="ops-card-tag">Daily Tasks</span>
            <h3>Keep Every Task on Track</h3>
            <p>
              Easily create, update, and follow tasks from start to finish.
              Add notes, share feedback, and always know what is pending, in progress, or completed.
            </p>
          </div>

          <div class="ops-mgmt-chips" id="opsMgmtFilter">
            <button type="button" class="ops-chip active" data-stage="all">All</button>
            <button type="button" class="ops-chip" data-stage="todo">To Do</button>
            <button type="button" class="ops-chip" data-stage="progress">In Progress</button>
            <button type="button" class="ops-chip" data-stage="done">Done</button>
          </div>

          <div class="ops-mgmt-preview" id="opsMgmtCard">
            <div class="ops-mgmt-top">
              <strong id="opsMgmtTitle">Month-End Bookkeeping</strong>
              <span class="ops-badge-pct" id="opsMgmtPct">68%</span>
            </div>
            <div class="ops-progress-track">
              <div class="ops-progress-fill" id="opsMgmtBar" style="width: 68%;"></div>
            </div>
            <small id="opsMgmtClient">BrightPath Digital · Note + 2 comments · Workly Team Support</small>
          </div>
        </article>

      </div>

      <div class="ops-bento-row ops-bento-row--wide-right">

        <article class="ops-bento-card ops-card--ivory ops-reveal">
          <div class="ops-bento-copy">
            <span class="ops-card-tag">Time &amp; SLA Analytics</span>
            <h3>Performance Visibility</h3>
            <p>Quantify turnaround speed and on-time delivery—proving clear client ROI while spotlighting top-performing VAs.</p>
          </div>

          <div class="ops-graph-stage" id="opsGraphStage">
            <div class="ops-graph-header">
              <div class="ops-graph-legend">
                <span><i class="dot-purple"></i>Velocity</span>
                <span><i class="dot-green"></i>On-Time SLA</span>
              </div>
              <span class="ops-gkpi-pill">Pod SLA: <b>94.8%</b></span>
            </div>

            <div class="ops-combo-chart">
              <div class="ops-gcol ops-gcol--ethan">
                <div class="ops-gbar-pair">
                  <span class="bar-p" style="height: 36%;"></span>
                  <span class="bar-g" style="height: 93%;"></span>
                </div>
                <small>Ethan B.</small>
              </div>
              <div class="ops-gcol ops-gcol--peak">
                <div class="ops-gbar-pair">
                  <span class="bar-p" style="height: 72%;"></span>
                  <span class="bar-g" style="height: 95%;"></span>
                </div>
                <small>Pod Avg</small>
              </div>
              <div class="ops-gcol ops-gcol--olivia">
                <div class="ops-gbar-pair">
                  <span class="bar-p" style="height: 58%;"></span>
                  <span class="bar-g" style="height: 97%;"></span>
                </div>
                <small>Olivia C.</small>
              </div>
            </div>

            <div class="ops-graph-tooltip" id="opsGraphTooltip">
              <strong class="tt-name">Ethan Brooks</strong>
              <span class="tt-role">Marketing · BrightPath</span>
              <div class="tt-metrics">
                <b class="tt-sla">93.0% SLA</b>
                <small class="tt-turn">2.6h Turnaround</small>
              </div>
            </div>
          </div>
        </article>

        <article class="ops-bento-card ops-card--slate ops-reveal">
          <div class="ops-bento-split">
            <div class="ops-bento-copy">
              <span class="ops-card-tag">Hours &amp; Reports</span>
              <h3>Know Where Your Time Goes</h3>
              <p>
                Keep track of working hours and completed tasks for each client.
                Share clear weekly or monthly reports and stay informed about everything your team accomplishes.
              </p>
              <div class="ops-mgmt-chips" id="opsCrmToggle">
                <button type="button" class="ops-chip active" data-mode="retainer">Hours Used</button>
                <button type="button" class="ops-chip" data-mode="sla">Task Progress</button>
              </div>
            </div>

            <div class="ops-crm-mini-panel">
              <div class="ops-crm-kpis">
                <div><small>Hours Worked</small><strong id="opsCrmTotal">120.5h</strong></div>
                <div><small>Hours Available</small><strong class="ops-text-purple" id="opsCrmRate">66.9%</strong></div>
              </div>
              <div class="ops-crm-mini-row">
                <div class="ops-crm-row-top">
                  <strong>BrightPath Digital</strong>
                  <span id="opsBpLabel">68.0 / 100h</span>
                </div>
                <div class="ops-progress-track"><div class="ops-progress-fill" id="opsBpBar" style="width: 68%;"></div></div>
                <small>Assistant: Ethan Brooks · Workly Team: Jordan Mitchell · Reports Ready</small>
              </div>
              <div class="ops-crm-mini-row">
                <div class="ops-crm-row-top">
                  <strong>Northstar Consulting</strong>
                  <span id="opsNsLabel">52.5 / 80h</span>
                </div>
                <div class="ops-progress-track"><div class="ops-progress-fill" id="opsNsBar" style="width: 65.6%;"></div></div>
                <small>Assistant: Olivia Carter · Workly Team: Jordan Mitchell · Reports Ready</small>
              </div>
            </div>
          </div>
        </article>

      </div>
    </div>
  </section>


  <!-- ================================================================
       3. HOW WORKLY WORKS
       ================================================================ -->
  <section class="ops-concept-section" id="ops-concept">
    <div class="ops-container">
      <div class="ops-concept-grid ops-reveal">
        <div class="ops-concept-copy">
          <div class="ops-kicker ops-kicker--subtle">
            <span>Better Work, Better Together</span>
            <span aria-hidden="true">·</span>
            <span>For Assistants &amp; Businesses</span>
          </div>

          <h2>Your assistant gets organized. Your business keeps moving.</h2>

          <p>
            Managing daily work shouldn't be complicated.
            Workly brings tasks, conversations, schedules, and progress together in one place,
            while our team helps keep everything running smoothly.
          </p>

          <div class="ops-concept-pillars">
            <div class="ops-pillar-item">
              <span class="ops-pillar-num">01</span>
              <div>
                <strong>All Your Tasks and Information in One Place</strong>
                <p>
                  Your assistant always has access to the right instructions, important files,
                  and client preferences. No more searching through endless messages or repeating the same information.
                </p>
              </div>
            </div>

            <div class="ops-pillar-item">
              <span class="ops-pillar-num">02</span>
              <div>
                <strong>Never Miss an Important Update</strong>
                <p>
                  Keep up with emails, upcoming meetings, and important notifications.
                  Your assistant and Workly team stay connected so nothing gets overlooked.
                </p>
              </div>
            </div>

            <div class="ops-pillar-item">
              <span class="ops-pillar-num">03</span>
              <div>
                <strong>Know What's Getting Done</strong>
                <p>
                  Receive easy-to-understand weekly or monthly reports showing completed tasks,
                  working hours, and team progress. Always know how your business is moving forward.
                </p>
              </div>
            </div>
          </div>
        </div>

        <div class="ops-compare-card">
          <div class="ops-compare-head">
            <div>
              <strong>A Better Way to Manage Your Team</strong>
              <small>See the difference between having everything organized and managing work through scattered messages</small>
            </div>
            <div class="ops-segmented ops-segmented--light" id="opsCompareToggle" role="tablist" aria-label="Workspace comparison">
              <button type="button" class="ops-seg-btn active" data-compare="with" aria-selected="true">With Workly</button>
              <button type="button" class="ops-seg-btn" data-compare="without" aria-selected="false">Without a Shared Workspace</button>
            </div>
          </div>

          <div class="ops-compare-metrics">
            <div class="ops-cmp-stat">
              <small>Average Completion Time</small>
              <strong id="opsCmpTurn">2.6h</strong>
              <span id="opsCmpTurnSub">Simple task updates and helpful notifications</span>
            </div>
            <div class="ops-cmp-stat">
              <small>Tasks Completed on Time</small>
              <strong id="opsCmpSla" class="ops-text-accent">94.8%</strong>
              <span id="opsCmpSlaSub">Workly team support and regular follow-ups</span>
            </div>
            <div class="ops-cmp-stat">
              <small>Report Preparation</small>
              <strong id="opsCmpRework">1 Click</strong>
              <span id="opsCmpReworkSub">Weekly and monthly updates shared with your team</span>
            </div>
            <div class="ops-cmp-stat">
              <small>Emails &amp; Meetings</small>
              <strong id="opsCmpInbox">Real-Time</strong>
              <span id="opsCmpInboxSub">Keep important conversations and meetings together</span>
            </div>
          </div>

          <div class="ops-compare-foot">
            <span id="opsCmpSummary">The result: Your assistant can focus on meaningful work while you stay informed and in control.</span>
          </div>
        </div>
      </div>

      <div class="ops-workflow-strip ops-reveal" aria-label="How Workly supports your team">
        <article class="ops-wf-card">
          <div class="ops-wf-top">
            <span class="ops-wf-badge">Step 01 · Daily Work</span>
            <span class="ops-wf-metric">Stay Organized</span>
          </div>
          <h4>Tasks, Notes &amp; Shared Information</h4>
          <p>
            Your assistant can easily find instructions, important files, and feedback before starting each task.
          </p>
          <div class="ops-wf-foot">Benefit: Less confusion and more time for meaningful work</div>
        </article>

        <article class="ops-wf-card">
          <div class="ops-wf-top">
            <span class="ops-wf-badge">Step 02 · Communication</span>
            <span class="ops-wf-metric">Stay Connected</span>
          </div>
          <h4>Emails, Meetings &amp; Important Updates</h4>
          <p>
            Keep conversations and scheduled meetings together while your assistant and Workly team stay up to date.
          </p>
          <div class="ops-wf-foot">Benefit: Fewer missed updates and smoother communication</div>
        </article>

        <article class="ops-wf-card">
          <div class="ops-wf-top">
            <span class="ops-wf-badge">Step 03 · Results</span>
            <span class="ops-wf-metric">Clear Reports</span>
          </div>
          <h4>Easy-to-Read Progress Reports</h4>
          <p>
            See working hours, completed tasks, and overall progress through simple weekly or monthly reports.
          </p>
          <div class="ops-wf-foot">Benefit: A clear picture of the work your team delivers</div>
        </article>
      </div>
    </div>
  </section>


  <!-- ================================================================
       4. GUIDED WORKFLOW DEMONSTRATION
       ================================================================ -->
  <section class="ops-collab-section" id="ops-collab">
    <div class="ops-container">
      <div class="ops-section-heading">
        <div class="ops-kicker ops-kicker--subtle">
          <span>See Workly in Action</span>
          <span aria-hidden="true">·</span>
          <span>A Simple Way to Stay Organized</span>
        </div>
        <h2>From daily tasks to completed work, all in one place.</h2>
        <p>
          Take a look at how your virtual assistant organizes tasks, communicates with your team,
          manages meetings, and keeps you updated on every important step.
        </p>
      </div>

      <div class="ops-collab-shell ops-reveal" id="opsCollabStage">
        <div class="ops-collab-topbar">
          <div class="ops-collab-brand">
            <img src="<?= $logoEsc ?>" alt="Workly" class="ops-mock-brand-img">
            <div>
              <strong>Workly · Team Workspace</strong>
              <small id="opsCollabStatus">Step 1: Your assistant starts working on an assigned task...</small>
            </div>
          </div>

          <div class="ops-collab-controls">
            <div class="ops-segmented ops-segmented--light" id="opsBenchmarkTabs">
              <button type="button" class="ops-seg-btn" data-tf="7d">Weekly</button>
              <button type="button" class="ops-seg-btn" data-tf="14d">14 Days</button>
              <button type="button" class="ops-seg-btn active" data-tf="30d">Monthly</button>
            </div>
            <button type="button" class="ops-collab-reportbtn" id="opsCollabReportBtn">Send Report</button>
            <button type="button" class="ops-collab-playbtn" id="opsCollabToggle" aria-pressed="true">Pause Demo</button>
          </div>
        </div>

        <div class="ops-guided-rail" id="opsGuidedRail" role="tablist" aria-label="Demonstration steps">
          <button type="button" class="ops-guided-step active" data-guide-step="0">
            <b>01</b><span>Organize Tasks</span>
          </button>
          <button type="button" class="ops-guided-step" data-guide-step="1">
            <b>02</b><span>Review Updates</span>
          </button>
          <button type="button" class="ops-guided-step" data-guide-step="2">
            <b>03</b><span>Check Completed Work</span>
          </button>
          <button type="button" class="ops-guided-step" data-guide-step="3">
            <b>04</b><span>Share Your Report</span>
          </button>
        </div>

        <div class="ops-collab-workspace" id="opsCollabWorkspace">
          <div class="ops-collab-kanban">
            <div class="ops-collab-col" data-col="todo">
              <div class="ops-col-title">
                <span>To Do</span>
                <b id="opsCountTodo">1</b>
              </div>
              <div class="ops-col-dropzone" id="opsZoneTodo">
                <article class="ops-task-card" id="opsTaskBanner" data-task="banner">
                  <div class="ops-task-meta">Priority Task · BrightPath</div>
                  <strong>Update Marketing Banner</strong>
                  <div class="ops-task-notes" id="opsNoteBanner">Note: Match Q4 colors · 2 comments</div>
                  <div class="ops-task-bar"><span id="opsBarBanner" style="width: 40%;"></span></div>
                  <small id="opsPctBanner">40% · Ready to Start</small>
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
                  <div class="ops-task-meta">Under Review · Northstar</div>
                  <strong>Review Client Hours</strong>
                  <div class="ops-task-notes" id="opsNoteCrm">Notes reviewed · 4 comments</div>
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
                  <div class="ops-task-meta ops-meta-ok">Completed</div>
                  <strong>Monthly Progress Report</strong>
                  <div class="ops-task-notes">Reviewed &amp; Shared · 1 comment</div>
                  <div class="ops-task-bar"><span id="opsBarReport" style="width: 100%;"></span></div>
                  <small id="opsPctReport">100% · Client Updated</small>
                </article>
              </div>
            </div>
          </div>

          <div class="ops-collab-side">
            <div class="ops-bench-box">
              <div class="ops-bench-head">
                <div>
                  <small>Team Progress</small>
                  <strong id="opsCollabSlaVal">94.8% Completed on Time</strong>
                </div>
                <span class="ops-bench-turn" id="opsCollabTurnVal">2.6h Avg</span>
              </div>
              <svg viewBox="0 0 280 72" class="ops-collab-svg" aria-hidden="true">
                <defs>
                  <linearGradient id="opsCollabGrad" x1="0" y1="0" x2="0" y2="1">
                    <stop offset="0%" stop-color="#AE09E9" stop-opacity="0.22"/>
                    <stop offset="100%" stop-color="#AE09E9" stop-opacity="0"/>
                  </linearGradient>
                </defs>
                <path id="opsCollabArea" d="M8 58 Q 70 26, 140 16 T 272 20 L 272 70 L 8 70 Z" fill="url(#opsCollabGrad)"/>
                <path id="opsCollabCurve" d="M8 58 Q 70 26, 140 16 T 272 20" fill="none" stroke="#AE09E9" stroke-width="2.5" stroke-linecap="round"/>
                <circle id="opsCollabDot" cx="140" cy="16" r="4.5" fill="#10b981" stroke="#ffffff" stroke-width="2"/>
              </svg>
              <div class="ops-report-dispatch" id="opsReportDispatchBanner">
                Reports shared with your team
              </div>
            </div>

            <div class="ops-pto-box">
              <div class="ops-pto-head">
                <strong>Upcoming Meetings &amp; Updates</strong>
                <small id="opsPtoStatusText">Nov 19: Workly Team Review</small>
              </div>
              <div class="ops-pto-days" id="opsPtoDays">
                <button type="button" class="ops-pto-btn is-approved" data-pto="Meeting · Client + Assistant Call (10:30 AM)">
                  <span>Meeting</span>
                  <b>10:30 AM</b>
                </button>
                <button type="button" class="ops-pto-btn is-approved" data-pto="Update · Workly Team notified Ethan">
                  <span>Team Update</span>
                  <b>Ready</b>
                </button>
                <button type="button" class="ops-pto-btn" id="opsPtoTarget" data-pto="Nov 19 Reviewed · Olivia Assigned Backup">
                  <span>Review</span>
                  <b id="opsPto19Label">Pending</b>
                </button>
              </div>
            </div>
          </div>

          <div class="ops-named-cursor ops-collab-cursor ops-cursor--guided" id="opsGuidedCursor" aria-hidden="true">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="#AE09E9" stroke="#ffffff" stroke-width="2"><path d="M4 4l7.07 17 2.51-7.39L21 11.07z"></path></svg>
            <span id="opsGuidedCursorLabel">Step 1 · Ethan (VA)</span>
          </div>
        </div>
      </div>
    </div>
  </section>


  <!-- ================================================================
       5. WORKSPACE PRESENTATION
       ================================================================ -->
  <section class="ops-3d-section" id="ops-3d-platform">
    <div class="ops-container">
      <div class="ops-section-heading">
        <div class="ops-kicker ops-kicker--subtle">
          <span>Meet Your Workspace</span>
          <span aria-hidden="true">·</span>
          <span>Everything Working Together</span>
        </div>
        <h2>A simpler way to manage your daily operations.</h2>
        <p>
          Explore the tools that help your virtual assistant stay organized, manage client tasks,
          keep track of meetings, and share progress with you.
        </p>
      </div>

      <div class="ops-3d-toolbar">
        <div class="ops-segmented ops-segmented--light" id="ops3dViews" role="tablist" aria-label="Workspace sections">
          <button type="button" class="ops-seg-btn active" data-3d-view="tasks">Tasks &amp; Notes</button>
          <button type="button" class="ops-seg-btn" data-3d-view="clients">Team &amp; Clients</button>
          <button type="button" class="ops-seg-btn" data-3d-view="calendar">Emails &amp; Calendar</button>
          <button type="button" class="ops-seg-btn" data-3d-view="analytics">Reports</button>
        </div>

        <div class="ops-segmented ops-segmented--light" id="ops3dModes" role="tablist" aria-label="Workspace display">
          <button type="button" class="ops-seg-btn active" data-3d-mode="tilt">3D View</button>
          <button type="button" class="ops-seg-btn" data-3d-mode="exploded">Layered View</button>
          <button type="button" class="ops-seg-btn" data-3d-mode="flat">Flat View</button>
        </div>
      </div>

      <div class="ops-3d-scene" id="ops3dScene">
        <div class="ops-3d-rig is-tilt" id="ops3dRig">

          <div class="ops-3d-layer--base">
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
                <button type="button" class="ops-3d-nav active" data-3d-nav="tasks">Tasks &amp; Notes</button>
                <button type="button" class="ops-3d-nav" data-3d-nav="clients">Team &amp; Clients</button>
                <button type="button" class="ops-3d-nav" data-3d-nav="calendar">Emails &amp; Calendar</button>
                <button type="button" class="ops-3d-nav" data-3d-nav="analytics">Reports</button>
              </aside>

              <div class="ops-3d-layer--canvas">
                <?php
                $desktopUrl = $opsMedia['desktop_3d'] !== '' ? $opsMedia['desktop_3d'] : $opsMedia['wide_frame'];
                $desktop3dFallback = '
                  <div class="ops-3d-views-wrap" id="ops3dScreen">

                    <div class="ops-3d-view active is-entering" id="ops3dView-tasks">
                      <div class="ops-mock-header">
                        <strong>Tasks &amp; Updates</strong>
                        <span class="ops-mock-cta">Supported by Workly</span>
                      </div>
                      <div class="ops-mock-kanban">
                        <div class="ops-mock-col">
                          <label>To Do</label>
                          <div class="ops-mock-card">
                            <span class="tag tag-high">Important Note</span>
                            <b>Update Marketing Banner</b>
                            <small>2 comments · Review requested</small>
                            <i><em style="width:40%"></em></i>
                          </div>
                        </div>
                        <div class="ops-mock-col">
                          <label>In Progress</label>
                          <div class="ops-mock-card">
                            <span class="tag tag-med">3 Comments</span>
                            <b>Update Client List</b>
                            <small>Note: Information updated</small>
                            <i><em style="width:78%"></em></i>
                          </div>
                        </div>
                        <div class="ops-mock-col">
                          <label>Completed</label>
                          <div class="ops-mock-card">
                            <span class="tag tag-ok">Reviewed</span>
                            <b>Monthly Bookkeeping</b>
                            <small>Reviewed by Workly Team</small>
                            <i><em style="width:100%"></em></i>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="ops-3d-view" id="ops3dView-clients">
                      <div class="ops-mock-header">
                        <strong>Your Team &amp; Clients</strong>
                        <span class="ops-mock-cta">Shared Reports</span>
                      </div>
                      <div class="ops-3d-crm-rows">
                        <div class="ops-3d-crm-row">
                          <div><b>BrightPath Digital · Lucas Bennett</b><small>Assistant: Ethan Brooks · Workly Team: Jordan Mitchell · lucas@brightpath.com</small></div>
                          <div class="ops-3d-usage"><span>68.0 / 100h</span><i><em style="width:68%"></em></i></div>
                        </div>
                        <div class="ops-3d-crm-row">
                          <div><b>Northstar Consulting · Sophia Reynolds</b><small>Assistant: Olivia Carter · Workly Team: Jordan Mitchell · sophia@northstar.co</small></div>
                          <div class="ops-3d-usage"><span>52.5 / 80h</span><i><em style="width:65.6%"></em></i></div>
                        </div>
                      </div>
                    </div>

                    <div class="ops-3d-view" id="ops3dView-calendar">
                      <div class="ops-mock-header">
                        <strong>Your Emails &amp; Upcoming Meetings</strong>
                        <span class="ops-mock-cta">Calendar Connected</span>
                      </div>
                      <div class="ops-3d-crm-rows">
                        <div class="ops-3d-crm-row">
                          <div><b>Client Meeting · 10:30 AM Today</b><small>Client, Ethan Brooks (VA) &amp; Jordan (Workly Team)</small></div>
                          <span class="tag tag-ok">Meeting Ready</span>
                        </div>
                        <div class="ops-3d-crm-row">
                          <div><b>BrightPath Digital · New Email</b><small>Latest client messages and attachments available in one place</small></div>
                          <span class="tag tag-med">New Message</span>
                        </div>
                      </div>
                    </div>

                    <div class="ops-3d-view" id="ops3dView-analytics">
                      <div class="ops-mock-header">
                        <strong>Working Hours &amp; Progress Reports</strong>
                        <button type="button" class="ops-mock-cta ops-3d-sendbtn" id="ops3dSendReport">Send Weekly Report</button>
                      </div>
                      <div class="ops-3d-kpis">
                        <div><small>Ethan Brooks</small><b>93.0% On-Time</b><span>2.6h average completion time</span></div>
                        <div><small>Olivia Carter</small><b>96.5% On-Time</b><span>1.8h average completion time</span></div>
                        <div><small>Easy Report Sharing</small><b>One Click</b><span id="ops3dReportNote">Weekly or monthly updates</span></div>
                      </div>
                    </div>

                  </div>
                ';
                echo ops_render_media_or_fallback($desktopUrl, 'Workly workspace overview', $desktop3dFallback);
                ?>
              </div>
            </div>
          </div>

          <div class="ops-3d-layer ops-3d-layer--float-a">
            <small>Workly Team Support</small>
            <strong>94.8% On-Time · 2.6h Avg</strong>
          </div>
          <div class="ops-3d-layer ops-3d-layer--float-b">
            <small>Progress Reports</small>
            <strong>Shared with Clients &amp; Team</strong>
          </div>

        </div>
      </div>
    </div>
  </section>


  <!-- ================================================================
       6. EMAILS, MEETINGS & NOTIFICATIONS
       ================================================================ -->
  <section class="ops-protrude-section">
    <div class="ops-container">
      <div class="ops-protrude-banner ops-reveal">
        <div class="ops-protrude-grid">
          <div class="ops-protrude-copy">
            <div class="ops-kicker ops-kicker--light">
              <span>Stay Connected</span>
              <span aria-hidden="true">·</span>
              <span>Always in the Loop</span>
            </div>

            <h2>Your team, your updates, always within reach.</h2>

            <p>
              Stay informed about task updates, upcoming meetings, and important client messages.
              Everything your assistant needs to keep work moving is right where it belongs.
            </p>

            <div class="ops-hero-actions ops-protrude-actions">
              <a class="ops-btn ops-btn--dark" href="find-va">Browse Our Assistants</a>
              <a class="ops-btn ops-btn--white" href="./#calendly-section">Let's Talk</a>
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
                      <span>Updates &amp; Messages</span>
                    </div>
                    <div class="ops-ep-head">
                      <small>Your Inbox &amp; Calendar</small>
                      <strong>Recent Updates (4)</strong>
                    </div>
                    <div class="ops-ep-list">
                      <div class="ops-ep-item is-active">
                        <span class="ops-avatar-pill">TL</span>
                        <div>
                          <b>New Task Update</b>
                          <small>Jordan shared feedback on the marketing design</small>
                        </div>
                      </div>
                      <div class="ops-ep-item">
                        <span class="ops-avatar-pill">CALL</span>
                        <div>
                          <b>Upcoming Meeting · 10:30 AM</b>
                          <small>BrightPath meeting added to your calendar</small>
                        </div>
                      </div>
                      <div class="ops-ep-item">
                        <span class="ops-avatar-pill">CRM</span>
                        <div>
                          <b>New Client Email</b>
                          <small>BrightPath shared new files and information</small>
                        </div>
                      </div>
                      <div class="ops-ep-item">
                        <span class="ops-avatar-pill">RPT</span>
                        <div>
                          <b>Monthly Report Shared</b>
                          <small>Sent to Client &amp; Workly Team</small>
                        </div>
                      </div>
                    </div>
                    <div class="ops-ep-footer">
                      <span>Everything Up to Date</span>
                    </div>
                  </div>
                ';
                echo ops_render_media_or_fallback($opsMedia['banner_phone'], 'Workly mobile updates and notifications', $bannerPhoneFallback);
                ?>
              </div>
            </div>

            <div class="ops-protrude-tag ops-protrude-tag--1">Upcoming Meetings</div>
            <div class="ops-protrude-tag ops-protrude-tag--2">Easy Report Sharing</div>
          </div>
        </div>
      </div>
    </div>
  </section>


  <!-- ================================================================
       7. SERVICES & SPECIALTIES
       ================================================================ -->
  <section class="ops-categories-section" id="ops-services">
    <div class="ops-container">
      <div class="ops-section-heading">
        <div class="ops-kicker ops-kicker--subtle">
          <span>Support for Every Kind of Business</span>
          <span aria-hidden="true">·</span>
          <span>Our Areas of Expertise</span>
        </div>

        <h2>The right support for every part of your business.</h2>

        <p>
          From everyday administrative work to marketing, customer support, and specialized assistance,
          Workly helps businesses find the right people and stay organized as they grow.
        </p>
      </div>

      <div class="ops-cat-shell ops-reveal">
        <div class="ops-cat-tabs" id="opsCatTabs" role="tablist" aria-label="Service Categories">
          <button type="button" class="ops-cat-btn active" data-cat="it">IT &amp; Technology</button>
          <button type="button" class="ops-cat-btn" data-cat="marketing">Marketing</button>
          <button type="button" class="ops-cat-btn" data-cat="legal">Legal Assistance</button>
          <button type="button" class="ops-cat-btn" data-cat="insurance">Insurance Support</button>
          <button type="button" class="ops-cat-btn" data-cat="healthcare">Healthcare</button>
          <button type="button" class="ops-cat-btn" data-cat="management">Administration</button>
          <button type="button" class="ops-cat-btn" data-cat="realestate">Real Estate</button>
        </div>

        <div class="ops-cat-panel">
          <div class="ops-cat-main">
            <span class="ops-cat-eyebrow" id="opsCatTag">IT &amp; Technology</span>

            <h3 id="opsCatTitle">
              Keep your technology and daily tasks running smoothly.
            </h3>

            <p id="opsCatDesc">
              Get help managing technical requests, organizing information, assisting customers,
              and keeping your daily operations on track.
            </p>

            <ul class="ops-cat-list" id="opsCatList">
              <li>Organized tracking of requests and ongoing tasks</li>
              <li>Clear communication and timely updates</li>
              <li>Regular reports to keep you informed</li>
            </ul>

            <a class="ops-btn ops-btn--primary" id="opsCatLink" href="find-va">
              Find IT Support Assistants →
            </a>
          </div>

          <div class="ops-cat-metrics">
            <div class="ops-cat-stat">
              <small>Response Time Goal</small>
              <strong id="opsCatSpeed">45m</strong>
            </div>
            <div class="ops-cat-stat">
              <small>On-Time Completion</small>
              <strong id="opsCatSla">96.2%</strong>
            </div>
            <div class="ops-cat-stat">
              <small>Available Tools</small>
              <strong id="opsCatModules">Tasks · Notes · Reports</strong>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>


  <!-- ================================================================
       8. FINAL CALL TO ACTION
       ================================================================ -->
  <section class="ops-final-cta">
    <div class="ops-container">
      <div class="ops-cta-box ops-reveal">
        <div>
          <div class="ops-kicker ops-kicker--light">
            <img src="<?= $logoEsc ?>" alt="Workly" class="ops-inline-logo">
            <span>Grow With Workly</span>
          </div>

          <h2>The right people. The right support. A better way to grow.</h2>

          <p>
            Focus on growing your business while your dedicated virtual assistant takes care of the daily work.
            With Workly, you get organized support, clear communication, and a team that helps you move forward.
          </p>
        </div>

        <div class="ops-cta-actions">
          <a class="ops-btn ops-btn--primary" href="find-va">Find Your VA →</a>
          <a class="ops-btn ops-btn--light" href="./#calendly-section">Let's Talk</a>
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