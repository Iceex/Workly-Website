<?php
/**
 * Workly OPS - Connected Operations Platform Showcase
 * File: /php/ops.php
 */
$currentPage     = "ops";
$pageTitle       = "Workly OPS | VA & Client CRM, Task Orchestration & Real-Time Sync";
$pageDescription = "Organize VA workflows with Kanban orchestration, task comments and notes, Team Leader supervision, real-time email & calendar sync, time analytics, and 1-click client reports.";
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
       1. NEAR-FULLWIDTH LIGHT BRAND HERO BANNER + FLOATING ELEMENTS
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
            <span>Built for VAs &amp; Growing Businesses</span>
          </div>
          <h1>One connected workspace<br>where <span class="ops-gradient-text">VAs thrive &amp; clients scale</span></h1>
          <p>
            Give your Virtual Assistant a simple, 1-click daily workspace while your business gains faster turnaround, transparent ROI, and hands-free Team Leader coordination—powered by shared CRM, real-time email &amp; calendar sync, and 1-click reporting.
          </p>
          <div class="ops-hero-actions">
            <a class="ops-btn ops-btn--dark" href="find-va">
              <span>Find Your VA</span>
              <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
            </a>
            <a class="ops-btn ops-btn--glass" href="#ops-capabilities">Explore Capabilities</a>
          </div>
        </div>

        <!-- Centered Slim iPhone 16+ + Continuous Floating Cards -->
        <div class="ops-hero-stage">

          <div class="ops-float-card ops-float-card--tl">
            <span class="ops-float-meta-line">Task Note · 2 Comments</span>
            <strong>Fix marketing banner</strong>
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
                <strong>Team Leader Alert</strong>
                <small>Jordan prioritized Q4 meeting</small>
              </div>
            </div>
          </div>

          <div class="ops-float-card ops-float-card--tr">
            <span class="ops-float-meta-line ops-meta-ok">1-Click Weekly Report</span>
            <strong>94.8% SLA · 2.6h Avg</strong>
            <small>Emailed to Client &amp; Team Leader</small>
          </div>

          <div class="ops-float-pill ops-float-pill--br">
            <span class="ops-pill-avatars">
              <i>OC</i><i>EB</i>
            </span>
            <span>VA &amp; Client CRM · <b>66.9% Used</b></span>
          </div>

          <!-- Centered Slim iPhone 16+ Frame -->
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
                          <small>Team Leader Supervised</small>
                          <b>Hello, Jordan M.</b>
                        </div>
                      </div>
                    </div>
                    <div class="ops-app-feed">
                      <div class="ops-app-notif ops-app-notif--purple">
                        <div class="ops-notif-icon">
                          <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path></svg>
                        </div>
                        <div>
                          <strong>Task Comment · Marketing Banner</strong>
                          <small>Ethan: Updated draft &amp; notes added</small>
                        </div>
                      </div>
                      <div class="ops-app-notif ops-app-notif--deep">
                        <div class="ops-notif-icon">
                          <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><rect width="18" height="18" x="3" y="4" rx="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line></svg>
                        </div>
                        <div>
                          <strong>Real-Time Meeting Sync</strong>
                          <small>BrightPath Call · Joined Calendar</small>
                        </div>
                      </div>
                      <div class="ops-app-notif ops-app-notif--white">
                        <div class="ops-notif-icon ops-notif-icon--dark">
                          <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline></svg>
                        </div>
                        <div>
                          <strong>Weekly Report Sent · 1-Click</strong>
                          <small>Delivered to Client &amp; Team Leader</small>
                        </div>
                      </div>
                    </div>
                  </div>
                ';
                echo ops_render_media_or_fallback($opsMedia['hero_center'], 'Workly OPS live assistant feed', $heroPhoneFallback);
                ?>
              </div>
            </div>

            <div class="ops-hero-overlay-stack">
              <div class="ops-overlay-card ops-overlay-card--primary">
                <span class="ops-overlay-icon">
                  <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><rect width="20" height="16" x="2" y="4" rx="2"></rect><path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"></path></svg>
                </span>
                <div class="ops-overlay-text">
                  <strong>Email &amp; Real-Time Calendar Sync</strong>
                  <small>Meetings &amp; threads linked to every CRM client</small>
                </div>
                <span class="ops-overlay-chevron">›</span>
              </div>
              <div class="ops-overlay-card ops-overlay-card--deep">
                <span class="ops-overlay-icon">
                  <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M3 3v18h18"></path><path d="m19 9-5 5-4-4-3 3"></path></svg>
                </span>
                <div class="ops-overlay-text">
                  <strong>1-Click Reports · Time &amp; Performance</strong>
                  <small>Weekly or monthly digests emailed automatically</small>
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
       2. RESTORED ASYMMETRIC 4-CARD BENTO GRID (Light Workly Tints)
       ================================================================ -->
  <section class="ops-bento-section" id="ops-capabilities">
    <div class="ops-container">
      <div class="ops-section-heading">
        <div class="ops-kicker ops-kicker--subtle">
          <span>Platform Pillars</span>
          <span aria-hidden="true">·</span>
          <span>Core Capabilities</span>
        </div>
        <h2>Higher output for clients. Effortless flow for VAs.</h2>
        <p>Four connected modules that eliminate daily tool friction for VAs, protect client delivery margins, and turn completed work into measurable growth.</p>
      </div>

      <!-- Row 1: Wide Card (Instant Sync & CRM) + Compact Card (1-Click Task Control) -->
      <div class="ops-bento-row ops-bento-row--wide-left">

        <!-- CARD 1 (Wide Lilac): Unified CRM & Instant Sync -->
        <article class="ops-bento-card ops-card--lilac ops-reveal">
          <div class="ops-bento-split">
            <div class="ops-bento-copy">
              <span class="ops-card-tag">Instant Sync Hub</span>
              <h3>VA &amp; Client CRM</h3>
              <p>Keep client retainers, assigned VAs, synced calendars, email threads, and Team Leader alerts aligned in one place so VAs start fast and clients never repeat context.</p>
              <a href="#ops-collab" class="ops-text-link">See guided workflow →</a>
            </div>

            <div class="ops-sync-diagram" aria-label="Instant sync network visualization">
              <div class="ops-sync-ring"></div>
              <div class="ops-sync-core">
                <img src="<?= $logoEsc ?>" alt="Workly" class="ops-sync-logo">
              </div>
              <div class="ops-sync-node ops-sync-node--1"><span>CRM &amp; Notes</span></div>
              <div class="ops-sync-node ops-sync-node--2"><span>Email &amp; Calls</span></div>
              <div class="ops-sync-node ops-sync-node--3"><span>Kanban Tasks</span></div>
              <div class="ops-sync-node ops-sync-node--4"><span>1-Click Reports</span></div>
            </div>
          </div>
        </article>

        <!-- CARD 2 (Compact Mint): 1-Click Task Orchestration & Notes -->
        <article class="ops-bento-card ops-card--mint ops-reveal">
          <div class="ops-bento-copy">
            <span class="ops-card-tag">Kanban &amp; Notes</span>
            <h3>1-Click Task Control</h3>
            <p>VAs update task statuses, pin shared notes, and resolve comments in seconds—completing more billable deliverables every week.</p>
          </div>

          <div class="ops-mgmt-chips" id="opsMgmtFilter">
            <button type="button" class="ops-chip active" data-stage="all">All</button>
            <button type="button" class="ops-chip" data-stage="todo">To Do</button>
            <button type="button" class="ops-chip" data-stage="progress">In Progress</button>
            <button type="button" class="ops-chip" data-stage="done">Completed</button>
          </div>

          <div class="ops-mgmt-preview" id="opsMgmtCard">
            <div class="ops-mgmt-top">
              <strong id="opsMgmtTitle">Month-End Bookkeeping</strong>
              <span class="ops-badge-pct" id="opsMgmtPct">68%</span>
            </div>
            <div class="ops-progress-track">
              <div class="ops-progress-fill" id="opsMgmtBar" style="width: 68%;"></div>
            </div>
            <small id="opsMgmtClient">BrightPath Digital · Note + 2 comments · TL Supervised</small>
          </div>
        </article>

      </div>

      <!-- Row 2: Compact Card (VA Performance Graph) + Wide Card (VA & Client CRM Retainer Capacity) -->
      <div class="ops-bento-row ops-bento-row--wide-right">

        <!-- CARD 3 (Compact Ivory): Performance & Time Analytics -->
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

        <!-- CARD 4 (Wide Slate): VA & Client CRM + 1-Click Report Linking -->
        <article class="ops-bento-card ops-card--slate ops-reveal">
          <div class="ops-bento-split">
            <div class="ops-bento-copy">
              <span class="ops-card-tag">CRM &amp; 1-Click Reports</span>
              <h3>Account Capacity</h3>
              <p>Track retainer hours and delivery velocity side by side, then send weekly or monthly executive reports to clients and Team Leaders in 1 click.</p>
              <div class="ops-mgmt-chips" id="opsCrmToggle">
                <button type="button" class="ops-chip active" data-mode="retainer">Retainer Usage</button>
                <button type="button" class="ops-chip" data-mode="sla">SLA Health</button>
              </div>
            </div>

            <div class="ops-crm-mini-panel">
              <div class="ops-crm-kpis">
                <div><small>Consumed / Turnaround</small><strong id="opsCrmTotal">120.5h</strong></div>
                <div><small>Portfolio / Pod SLA</small><strong class="ops-text-purple" id="opsCrmRate">66.9%</strong></div>
              </div>
              <div class="ops-crm-mini-row">
                <div class="ops-crm-row-top">
                  <strong>BrightPath Digital</strong>
                  <span id="opsBpLabel">68.0 / 100h</span>
                </div>
                <div class="ops-progress-track"><div class="ops-progress-fill" id="opsBpBar" style="width: 68%;"></div></div>
                <small>VA: Ethan Brooks · TL: Jordan Mitchell · Reports Synced</small>
              </div>
              <div class="ops-crm-mini-row">
                <div class="ops-crm-row-top">
                  <strong>Northstar Consulting</strong>
                  <span id="opsNsLabel">52.5 / 80h</span>
                </div>
                <div class="ops-progress-track"><div class="ops-progress-fill" id="opsNsBar" style="width: 65.6%;"></div></div>
                <small>VA: Olivia Carter · TL: Jordan Mitchell · Reports Synced</small>
              </div>
            </div>
          </div>
        </article>

      </div>
    </div>
  </section>

  <!-- ================================================================
       3. PLATFORM CONCEPT — MUTUAL GROWTH FOR VAs & CLIENTS
       ================================================================ -->
  <section class="ops-concept-section" id="ops-concept">
    <div class="ops-container">
      <div class="ops-concept-grid ops-reveal">
        <div class="ops-concept-copy">
          <div class="ops-kicker ops-kicker--subtle">
            <span>Built For Mutual Growth</span>
            <span aria-hidden="true">·</span>
            <span>VA Efficiency + Client ROI</span>
          </div>
          <h2>Faster execution for VAs. Predictable ROI for clients.</h2>
          <p>
            Cluttered spreadsheets and scattered chats slow VAs down and cost clients valuable hours. Workly OPS gives VAs an intuitive 1-click daily cockpit backed by a dedicated Workly Team Leader—delivering consistent quality, faster turnaround, and higher output without pulling clients into daily micro-management.
          </p>

          <div class="ops-concept-pillars">
            <div class="ops-pillar-item">
              <span class="ops-pillar-num">01</span>
              <div>
                <strong>VA &amp; Client CRM with Threaded Comments &amp; Notes</strong>
                <p>Every task links directly to a client account, pinned brand notes, and @comment feedback—so VAs execute accurately on the first pass and clients never repeat instructions.</p>
              </div>
            </div>
            <div class="ops-pillar-item">
              <span class="ops-pillar-num">02</span>
              <div>
                <strong>Real-Time Email, Calendar Sync &amp; Team Leader Alerts</strong>
                <p>Live Google Calendar meetings, synced client emails, and instant alerts keep the VA and Workly Team Leader aligned on deadlines—eliminating delays before they affect revenue.</p>
              </div>
            </div>
            <div class="ops-pillar-item">
              <span class="ops-pillar-num">03</span>
              <div>
                <strong>Turnaround Analytics &amp; 1-Click Linked Reports</strong>
                <p>Automated performance and time logs turn completed work into polished weekly or monthly digests—emailed directly to the client and Team Leader in a single click.</p>
              </div>
            </div>
          </div>
        </div>

        <div class="ops-compare-card">
          <div class="ops-compare-head">
            <div>
              <strong>Speed, Quality &amp; Retention Impact</strong>
              <small>Why structured OPS outperforms scattered chat tools</small>
            </div>
            <div class="ops-segmented ops-segmented--light" id="opsCompareToggle" role="tablist" aria-label="Workflow comparison">
              <button type="button" class="ops-seg-btn active" data-compare="with" aria-selected="true">With Workly OPS</button>
              <button type="button" class="ops-seg-btn" data-compare="without" aria-selected="false">Ad-Hoc Chats</button>
            </div>
          </div>

          <div class="ops-compare-metrics">
            <div class="ops-cmp-stat">
              <small>Avg Turnaround Time</small>
              <strong id="opsCmpTurn">2.6h</strong>
              <span id="opsCmpTurnSub">Simple 1-click task progression &amp; live alerts</span>
            </div>
            <div class="ops-cmp-stat">
              <small>On-Time SLA Compliance</small>
              <strong id="opsCmpSla" class="ops-text-accent">94.8%</strong>
              <span id="opsCmpSlaSub">Coordinated with Team Leader quality checks</span>
            </div>
            <div class="ops-cmp-stat">
              <small>Client Report Effort</small>
              <strong id="opsCmpRework">1 Click</strong>
              <span id="opsCmpReworkSub">Weekly/monthly email dispatched to Client &amp; Lead</span>
            </div>
            <div class="ops-cmp-stat">
              <small>Calendar &amp; Email Sync</small>
              <strong id="opsCmpInbox">Real-Time</strong>
              <span id="opsCmpInboxSub">Meetings &amp; threads tied to VA &amp; Client CRM</span>
            </div>
          </div>

          <div class="ops-compare-foot">
            <span id="opsCmpSummary">Outcome: VAs complete more high-value work with less friction, and clients realize measurable ROI faster.</span>
          </div>
        </div>
      </div>

      <!-- Integrated 3-Stage Value Strip (Absorbed from former walkthrough section) -->
      <div class="ops-workflow-strip ops-reveal" aria-label="End-to-end operational flow">
        <article class="ops-wf-card">
          <div class="ops-wf-top">
            <span class="ops-wf-badge">Stage 01 · Execution</span>
            <span class="ops-wf-metric">Zero Rework</span>
          </div>
          <h4>CRM-Linked Tasks, Comments &amp; Notes</h4>
          <p>VAs open a task and see client preferences, pinned files, and Team Leader notes instantly—cutting back-and-forth questions in half.</p>
          <div class="ops-wf-foot">Benefit: Faster first-draft delivery &amp; higher VA productivity</div>
        </article>

        <article class="ops-wf-card">
          <div class="ops-wf-top">
            <span class="ops-wf-badge">Stage 02 · Coordination</span>
            <span class="ops-wf-metric">Real-Time Sync</span>
          </div>
          <h4>Synced Emails, Meetings &amp; Live Alerts</h4>
          <p>Client replies and live calendar bookings stay tied to active deliverables, while Team Leader alerts keep every deadline protected.</p>
          <div class="ops-wf-foot">Benefit: Zero missed client calls or stalled deliverables</div>
        </article>

        <article class="ops-wf-card">
          <div class="ops-wf-top">
            <span class="ops-wf-badge">Stage 03 · Retention</span>
            <span class="ops-wf-metric">1-Click Export</span>
          </div>
          <h4>SLA Scorecards &amp; Linked Email Reports</h4>
          <p>Every hour logged and deliverable shipped feeds a clean weekly or monthly executive report sent directly to Client and Team Leader.</p>
          <div class="ops-wf-foot">Benefit: Clear ROI proof that grows long-term client retainers</div>
        </article>
      </div>
    </div>
  </section>

  <!-- ================================================================
       4. GUIDED WORKFLOW SUITE (Single Smooth Guided Mouse + Stable Columns)
       ================================================================ -->
  <section class="ops-collab-section" id="ops-collab">
    <div class="ops-container">
      <div class="ops-section-heading">
        <div class="ops-kicker ops-kicker--subtle">
          <span>Guided Workflow</span>
          <span aria-hidden="true">·</span>
          <span>Live Team Leader &amp; VA Coordination</span>
        </div>
        <h2>Watch one smooth flow turn daily tasks into client growth</h2>
        <p>Follow a step-by-step demonstration of how VAs update Kanban progress, sync live calendars, get Team Leader approval, and dispatch 1-click executive reports.</p>
      </div>

      <div class="ops-collab-shell ops-reveal" id="opsCollabStage">
        <div class="ops-collab-topbar">
          <div class="ops-collab-brand">
            <img src="<?= $logoEsc ?>" alt="Workly" class="ops-mock-brand-img">
            <div>
              <strong>Workly OPS · Guided Pod Flow</strong>
              <small id="opsCollabStatus">Step 1: VA Ethan opens CRM task &amp; starts execution...</small>
            </div>
          </div>

          <div class="ops-collab-controls">
            <div class="ops-segmented ops-segmented--light" id="opsBenchmarkTabs">
              <button type="button" class="ops-seg-btn" data-tf="7d">Weekly</button>
              <button type="button" class="ops-seg-btn" data-tf="14d">14D</button>
              <button type="button" class="ops-seg-btn active" data-tf="30d">Monthly</button>
            </div>
            <button type="button" class="ops-collab-reportbtn" id="opsCollabReportBtn">1-Click Send Report</button>
            <button type="button" class="ops-collab-playbtn" id="opsCollabToggle" aria-pressed="true">Pause Guide</button>
          </div>
        </div>

        <!-- Guided 4-Step Process Indicator -->
        <div class="ops-guided-rail" id="opsGuidedRail" role="tablist" aria-label="Guided workflow steps">
          <button type="button" class="ops-guided-step active" data-guide-step="0">
            <b>01</b><span>Advance Kanban &amp; Notes</span>
          </button>
          <button type="button" class="ops-guided-step" data-guide-step="1">
            <b>02</b><span>Approve Alert &amp; Calendar</span>
          </button>
          <button type="button" class="ops-guided-step" data-guide-step="2">
            <b>03</b><span>Verify Completion &amp; SLA</span>
          </button>
          <button type="button" class="ops-guided-step" data-guide-step="3">
            <b>04</b><span>1-Click Client Report</span>
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
                  <div class="ops-task-meta">High · BrightPath CRM</div>
                  <strong>Fix marketing banner</strong>
                  <div class="ops-task-notes" id="opsNoteBanner">Note: Match Q4 hex · 2 comments</div>
                  <div class="ops-task-bar"><span id="opsBarBanner" style="width: 40%;"></span></div>
                  <small id="opsPctBanner">40% · Ready for VA</small>
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
                  <div class="ops-task-meta">In Review · Northstar CRM</div>
                  <strong>Client CRM Retainer Audit</strong>
                  <div class="ops-task-notes" id="opsNoteCrm">Note: TL QA checked · 4 comments</div>
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
                  <div class="ops-task-meta ops-meta-ok">Done · Synced Email</div>
                  <strong>Monthly Client Summary</strong>
                  <div class="ops-task-notes">Note: Verified &amp; Emailed · 1 comment</div>
                  <div class="ops-task-bar"><span id="opsBarReport" style="width: 100%;"></span></div>
                  <small id="opsPctReport">100% · Client Notified</small>
                </article>
              </div>
            </div>
          </div>

          <div class="ops-collab-side">
            <div class="ops-bench-box">
              <div class="ops-bench-head">
                <div>
                  <small>Performance &amp; Turnaround Analytics</small>
                  <strong id="opsCollabSlaVal">94.8% On-Time SLA</strong>
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
                Linked Emails: lucas@brightpath.com · jordan@worklystaff.com
              </div>
            </div>

            <div class="ops-pto-box">
              <div class="ops-pto-head">
                <strong>Live Alerts &amp; Real-Time Calendar</strong>
                <small id="opsPtoStatusText">Nov 19: Team Leader Review</small>
              </div>
              <div class="ops-pto-days" id="opsPtoDays">
                <button type="button" class="ops-pto-btn is-approved" data-pto="Meeting Sync · Client + VA Call (10:30 AM)">
                  <span>Live Call</span>
                  <b>10:30 AM</b>
                </button>
                <button type="button" class="ops-pto-btn is-approved" data-pto="Task Alert · Team Leader notified Ethan">
                  <span>TL Alert</span>
                  <b>Synced</b>
                </button>
                <button type="button" class="ops-pto-btn" id="opsPtoTarget" data-pto="Nov 19 Approved · Olivia Assigned Backup">
                  <span>Approve</span>
                  <b id="opsPto19Label">Review</b>
                </button>
              </div>
            </div>
          </div>

          <!-- Single Smooth Guided Cursor -->
          <div class="ops-named-cursor ops-collab-cursor ops-cursor--guided" id="opsGuidedCursor" aria-hidden="true">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="#AE09E9" stroke="#ffffff" stroke-width="2"><path d="M4 4l7.07 17 2.51-7.39L21 11.07z"></path></svg>
            <span id="opsGuidedCursorLabel">Step 1 · Ethan (VA)</span>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ================================================================
       5. WORKLY OPS COMMAND CENTER (With Staggered Tab Entrance Effects)
       ================================================================ -->
  <section class="ops-3d-section" id="ops-3d-platform">
    <div class="ops-container">
      <div class="ops-section-heading">
        <div class="ops-kicker ops-kicker--subtle">
          <span>Workly OPS Command Center</span>
          <span aria-hidden="true">·</span>
          <span>Unified Platform Modules</span>
        </div>
        <h2>Every tool VAs and clients rely on, in one view</h2>
        <p>Explore how simple-click task boards, shared client CRM retainers, real-time calendar meetings, and 1-click executive reports work together to increase output and keep ROI visible.</p>
      </div>

      <div class="ops-3d-toolbar">
        <div class="ops-segmented ops-segmented--light" id="ops3dViews" role="tablist" aria-label="Platform Views">
          <button type="button" class="ops-seg-btn active" data-3d-view="tasks">Tasks &amp; Notes</button>
          <button type="button" class="ops-seg-btn" data-3d-view="clients">VA &amp; Client CRM</button>
          <button type="button" class="ops-seg-btn" data-3d-view="calendar">Email &amp; Calendar</button>
          <button type="button" class="ops-seg-btn" data-3d-view="analytics">1-Click Reports</button>
        </div>

        <div class="ops-segmented ops-segmented--light" id="ops3dModes" role="tablist" aria-label="Perspective Modes">
          <button type="button" class="ops-seg-btn active" data-3d-mode="tilt">3D Perspective</button>
          <button type="button" class="ops-seg-btn" data-3d-mode="exploded">Layered Depth</button>
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
                <button type="button" class="ops-3d-nav" data-3d-nav="clients">VA &amp; Client CRM</button>
                <button type="button" class="ops-3d-nav" data-3d-nav="calendar">Email &amp; Calendar</button>
                <button type="button" class="ops-3d-nav" data-3d-nav="analytics">1-Click Reports</button>
              </aside>

              <div class="ops-3d-layer--canvas">
                <?php
                $desktopUrl = $opsMedia['desktop_3d'] !== '' ? $opsMedia['desktop_3d'] : $opsMedia['wide_frame'];
                $desktop3dFallback = '
                  <div class="ops-3d-views-wrap" id="ops3dScreen">
                    <div class="ops-3d-view active is-entering" id="ops3dView-tasks">
                      <div class="ops-mock-header">
                        <strong>Task Orchestration · Notes &amp; Comments</strong>
                        <span class="ops-mock-cta">Team Leader Guided</span>
                      </div>
                      <div class="ops-mock-kanban">
                        <div class="ops-mock-col">
                          <label>To Do · Status Synced</label>
                          <div class="ops-mock-card">
                            <span class="tag tag-high">Note Attached</span>
                            <b>Fix marketing banner</b>
                            <small>2 comments · @Jordan check</small>
                            <i><em style="width:40%"></em></i>
                          </div>
                        </div>
                        <div class="ops-mock-col">
                          <label>In Progress · Live</label>
                          <div class="ops-mock-card">
                            <span class="tag tag-med">3 Comments</span>
                            <b>CRM Pipeline Sync</b>
                            <small>Note: Client list updated</small>
                            <i><em style="width:78%"></em></i>
                          </div>
                        </div>
                        <div class="ops-mock-col">
                          <label>Completed · Verified</label>
                          <div class="ops-mock-card">
                            <span class="tag tag-ok">Signed Off</span>
                            <b>Bookkeeping Close</b>
                            <small>Team Leader approved</small>
                            <i><em style="width:100%"></em></i>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="ops-3d-view" id="ops3dView-clients">
                      <div class="ops-mock-header">
                        <strong>VA &amp; Client CRM Directory</strong>
                        <span class="ops-mock-cta">Linked Report Emails</span>
                      </div>
                      <div class="ops-3d-crm-rows">
                        <div class="ops-3d-crm-row">
                          <div><b>BrightPath Digital · Lucas Bennett</b><small>VA: Ethan Brooks · TL: Jordan Mitchell · lucas@brightpath.com</small></div>
                          <div class="ops-3d-usage"><span>68.0 / 100h</span><i><em style="width:68%"></em></i></div>
                        </div>
                        <div class="ops-3d-crm-row">
                          <div><b>Northstar Consulting · Sophia Reynolds</b><small>VA: Olivia Carter · TL: Jordan Mitchell · sophia@northstar.co</small></div>
                          <div class="ops-3d-usage"><span>52.5 / 80h</span><i><em style="width:65.6%"></em></i></div>
                        </div>
                      </div>
                    </div>

                    <div class="ops-3d-view" id="ops3dView-calendar">
                      <div class="ops-mock-header">
                        <strong>Synced Email Threads &amp; Live Meetings</strong>
                        <span class="ops-mock-cta">Google Calendar Live</span>
                      </div>
                      <div class="ops-3d-crm-rows">
                        <div class="ops-3d-crm-row">
                          <div><b>Real-Time Client Sync · 10:30 AM Today</b><small>Joined by Client, Ethan Brooks (VA) &amp; Jordan (Team Leader)</small></div>
                          <span class="tag tag-ok">Live Meeting</span>
                        </div>
                        <div class="ops-3d-crm-row">
                          <div><b>Email Hub · BrightPath Digital Thread</b><small>Auto-synced messages linked to deliverables &amp; CRM timeline</small></div>
                          <span class="tag tag-med">Email Synced</span>
                        </div>
                      </div>
                    </div>

                    <div class="ops-3d-view" id="ops3dView-analytics">
                      <div class="ops-mock-header">
                        <strong>Time Analytics &amp; 1-Click Reports</strong>
                        <button type="button" class="ops-mock-cta ops-3d-sendbtn" id="ops3dSendReport">Send Weekly Report</button>
                      </div>
                      <div class="ops-3d-kpis">
                        <div><small>Ethan Brooks</small><b>93.0% SLA</b><span>2.6h avg response time</span></div>
                        <div><small>Olivia Carter</small><b>96.5% SLA</b><span>1.8h avg response time</span></div>
                        <div><small>Auto-Linked Dispatch</small><b>1-Click</b><span id="ops3dReportNote">Weekly/Monthly to Client &amp; Lead</span></div>
                      </div>
                    </div>
                  </div>
                ';
                echo ops_render_media_or_fallback($desktopUrl, 'Workly OPS 3D Desktop Platform', $desktop3dFallback);
                ?>
              </div>
            </div>
          </div>

          <div class="ops-3d-layer ops-3d-layer--float-a">
            <small>Team Leader Guided SLA</small>
            <strong>94.8% On-Time · 2.6h Avg</strong>
          </div>
          <div class="ops-3d-layer ops-3d-layer--float-b">
            <small>1-Click Reports</small>
            <strong>Client &amp; Lead Emails Linked</strong>
          </div>

        </div>
      </div>
    </div>
  </section>

  <!-- ================================================================
       6. SYNC & NOTIFICATIONS (Sleek Elongated iPhone 16+)
       ================================================================ -->
  <section class="ops-protrude-section">
    <div class="ops-container">
      <div class="ops-protrude-banner ops-reveal">
        <div class="ops-protrude-grid">
          <div class="ops-protrude-copy">
            <div class="ops-kicker ops-kicker--light">
              <span>Sync &amp; Notifications</span>
              <span aria-hidden="true">·</span>
              <span>Always Connected</span>
            </div>
            <h2>Synced emails, live meetings, and instant alerts in your pocket</h2>
            <p>
              VAs receive immediate alerts for task comments, live calendar meetings, and synced client emails—eliminating missed updates so clients experience faster execution and reliable turnarounds.
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
                      <span>Alerts &amp; Sync</span>
                    </div>
                    <div class="ops-ep-head">
                      <small>Synced Inbox &amp; Calendar</small>
                      <strong>Live Feed (4)</strong>
                    </div>
                    <div class="ops-ep-list">
                      <div class="ops-ep-item is-active">
                        <span class="ops-avatar-pill">TL</span>
                        <div>
                          <b>Team Leader Alert · Task Comment</b>
                          <small>Jordan tagged @Ethan on Q4 banner note</small>
                        </div>
                      </div>
                      <div class="ops-ep-item">
                        <span class="ops-avatar-pill">CALENDAR</span>
                        <div>
                          <b>Real-Time Meeting · 10:30 AM</b>
                          <small>BrightPath review synced on Google Calendar</small>
                        </div>
                      </div>
                      <div class="ops-ep-item">
                        <span class="ops-avatar-pill">CRM</span>
                        <div>
                          <b>Client Email Linked · BrightPath</b>
                          <small>New creative assets attached to active board</small>
                        </div>
                      </div>
                      <div class="ops-ep-item">
                        <span class="ops-avatar-pill">RPT</span>
                        <div>
                          <b>Monthly Report Emailed</b>
                          <small>Sent to Client &amp; Team Leader in 1 click</small>
                        </div>
                      </div>
                    </div>
                    <div class="ops-ep-footer">
                      <span>Synced · Client CRM + Team Leader</span>
                    </div>
                  </div>
                ';
                echo ops_render_media_or_fallback($opsMedia['banner_phone'], 'Workly OPS alerts, calendar and email sync', $bannerPhoneFallback);
                ?>
              </div>
            </div>

            <div class="ops-protrude-tag ops-protrude-tag--1">Real-Time Meeting Sync</div>
            <div class="ops-protrude-tag ops-protrude-tag--2">1-Click Linked Reports</div>
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
        <h2>How Workly OPS drives faster output across 7 industries</h2>
        <p>Every department runs on simple-click Kanban workflows, Team Leader coordination, shared CRM context, and 1-click weekly reports—saving hours and increasing client retention.</p>
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
            <h3 id="opsCatTitle">Tier-1 ticket triage, task notes, and SLA oversight</h3>
            <p id="opsCatDesc">Technical VAs track incoming helpdesk escalations in Kanban boards, add troubleshooting notes and comments, and keep response times transparent so clients resolve issues faster.</p>
            <ul class="ops-cat-list" id="opsCatList">
              <li>1-click ticket status updates with threaded Team Leader comments</li>
              <li>Real-time calendar escalation calls synced with IT leads</li>
              <li>Weekly 1-click SLA performance reports emailed to stakeholders</li>
            </ul>
            <a class="ops-btn ops-btn--primary" id="opsCatLink" href="find-va">Find IT Support VAs →</a>
          </div>

          <div class="ops-cat-metrics">
            <div class="ops-cat-stat">
              <small>Target Response Time</small>
              <strong id="opsCatSpeed">45m</strong>
            </div>
            <div class="ops-cat-stat">
              <small>Verified Pod SLA</small>
              <strong id="opsCatSla">96.2%</strong>
            </div>
            <div class="ops-cat-stat">
              <small>Active OPS Tools</small>
              <strong id="opsCatModules">Kanban · Notes · 1-Click Reports</strong>
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
            <span>Scale Profitably</span>
          </div>
          <h2>Grow output with dedicated VAs and Workly OPS.</h2>
          <p>Cut staffing overhead by up to 70% while giving your VAs an intuitive workspace backed by Team Leader coordination, real-time calendar &amp; email sync, and 1-click weekly reporting.</p>
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