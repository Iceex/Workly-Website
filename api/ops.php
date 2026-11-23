<?php
/**
 * Workly OPS - Interactive Operations Workspace Showcase
 * File: /php/ops.php
 */
$currentPage     = "ops";
$pageTitle       = "Workly OPS | Instant Sync & Seamless Connectivity for Your VA";
$pageDescription = "Organize tasks, client workflows, meetings, and team email in one connected workspace with instant sync and real-time visibility.";
$canonicalUrl    = "https://worklystaff.com/ops";

/**
 * ============================================================================
 * MOCKUP MEDIA URLS (Images, GIFs, or Videos)
 * Insert any relative path (e.g. 'assets/media/ops-demo.mp4') or full URL.
 * Supports:
 *   - Video (.mp4, .webm, .mov, .ogg) -> Renders inside the device screen
 *   - Image / GIF (.png, .jpg, .webp, .gif, .svg) -> Renders inside the mockup
 *   - Empty ('') -> Displays the live interactive Workly OPS UI inside the mockup
 * ============================================================================
 */
$opsMedia = [
    'hero_center'    => '', // Hero centered frame (image / gif / video)
    'wide_frame'     => '', // Wide workspace frame (image / gif / video)
    'slate_calendar' => '', // Slate calendar & analytics frame (image / gif / video)
    'banner_feature' => '', // Protruding highlight frame (image / gif / video)
];

if (!function_exists('ops_render_media_or_fallback')) {
    function ops_render_media_or_fallback(string $url, string $alt, string $fallbackHtml): string
    {
        $cleanUrl = trim($url);
        if ($cleanUrl === '') {
            return $fallbackHtml;
        }

        $pathOnly = parse_url($cleanUrl, PHP_URL_PATH) ?? '';
        $ext = strtolower(pathinfo($pathOnly, PATHINFO_EXTENSION));
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

<link rel="stylesheet" href="assets/css/ops.css">

<div class="ops-page">

  <!-- ================================================================
       1. FULL-VIEWPORT HERO BANNER (Centered Device + Floating App Cards)
       ================================================================ -->
  <section class="ops-hero-section">
    <div class="ops-container">
      <div class="ops-hero-banner">
        <div class="ops-hero-rings" aria-hidden="true">
          <span></span><span></span><span></span>
        </div>

        <div class="ops-hero-header animate-entrance">
          <span class="ops-eyebrow">Workly OPS · Instant Sync &amp; Connectivity</span>
          <h1>The connected workspace<br>for <span class="ops-gradient-text">seamless VA execution</span></h1>
          <p>
            Bring tasks, client capacity, calendars, and email threads together in one synchronized hub—built so you and your virtual assistant stay effortlessly aligned.
          </p>
          <div class="ops-hero-actions">
            <a class="ops-btn ops-btn--dark" href="find-va">
              <span>Find Your VA</span>
              <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
            </a>
            <a class="ops-btn ops-btn--glass" href="#ops-capabilities">Explore Capabilities</a>
          </div>
        </div>

        <!-- Centered Device Showcase + Floating Real OPS Notifications -->
        <div class="ops-hero-stage">

          <!-- Floating Card Top-Left: Random VA Task -->
          <div class="ops-float-card ops-float-card--tl">
            <div class="ops-float-badge ops-float-badge--amber">To Do · High</div>
            <strong>Fix the marketing banner</strong>
            <div class="ops-float-meta">
              <span>BrightPath Digital</span>
              <span>40%</span>
            </div>
            <div class="ops-mini-bar"><span style="width:40%"></span></div>
          </div>

          <!-- Floating Card Bottom-Left: Email Hub Thread -->
          <div class="ops-float-card ops-float-card--bl">
            <div class="ops-float-row">
              <span class="ops-avatar-pill">EB</span>
              <div>
                <strong>Email Hub · 6 Unread</strong>
                <small>Ethan Brooks replied to BrightPath</small>
              </div>
            </div>
          </div>

          <!-- Floating Card Top-Right: Calendar Meeting -->
          <div class="ops-float-card ops-float-card--tr">
            <div class="ops-float-badge ops-float-badge--emerald">Calendar Sync</div>
            <strong>Weekly SLA Review</strong>
            <small>Wed 25 · 10:30 AM · Auto-synced</small>
          </div>

          <!-- Floating Pill Bottom-Right: Live Utilization -->
          <div class="ops-float-pill ops-float-pill--br">
            <span class="ops-pill-avatars">
              <i>OC</i><i>EB</i>
            </span>
            <span>Portfolio Utilization · <b>66.9%</b></span>
          </div>

          <!-- Centered Phone Frame (Reads $opsMedia['hero_center'] if set) -->
          <div class="ops-hero-phone-wrap">
            <div class="ops-phone-bezel ops-phone-bezel--hero">
              <div class="ops-phone-notch" aria-hidden="true"></div>
              <div class="ops-phone-viewport">
                <?php
                $heroPhoneFallback = '
                  <div class="ops-app-phone-ui">
                    <div class="ops-app-statusbar">
                      <span>9:41</span>
                      <span>5G · Synced</span>
                    </div>
                    <div class="ops-app-greeting">
                      <div class="ops-va-chip">
                        <span class="ops-va-avatar">EB</span>
                        <div>
                          <small>Assigned VA · Online</small>
                          <b>Hello, Ethan Brooks</b>
                        </div>
                      </div>
                    </div>
                    <div class="ops-app-feed">
                      <div class="ops-app-notif ops-app-notif--purple">
                        <div class="ops-notif-icon">
                          <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><rect width="20" height="16" x="2" y="4" rx="2"></rect><path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"></path></svg>
                        </div>
                        <div>
                          <strong>Email Hub · BrightPath Digital</strong>
                          <small>Re: Q4 Deliverables &amp; SLA approved</small>
                        </div>
                      </div>
                      <div class="ops-app-notif ops-app-notif--deep">
                        <div class="ops-notif-icon">
                          <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path></svg>
                        </div>
                        <div>
                          <strong>Task Moved to Completed</strong>
                          <small>Month-End Bookkeeping Reconciliation</small>
                        </div>
                      </div>
                      <div class="ops-app-notif ops-app-notif--white">
                        <div class="ops-notif-icon ops-notif-icon--dark">
                          <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><rect width="18" height="18" x="3" y="4" rx="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line></svg>
                        </div>
                        <div>
                          <strong>Meeting Confirmed · Wed 25</strong>
                          <small>Northstar Consulting · 11:00 AM</small>
                        </div>
                      </div>
                    </div>
                  </div>
                ';
                echo ops_render_media_or_fallback($opsMedia['hero_center'], 'Workly OPS live assistant feed', $heroPhoneFallback);
                ?>
              </div>
            </div>

            <!-- Overlapping Front Action Cards (Exact Reference Composition) -->
            <div class="ops-hero-overlay-stack">
              <div class="ops-overlay-card ops-overlay-card--primary">
                <span class="ops-overlay-icon">
                  <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><rect width="20" height="16" x="2" y="4" rx="2"></rect><path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"></path></svg>
                </span>
                <div class="ops-overlay-text">
                  <strong>Email Hub · 6 Active Threads</strong>
                  <small>Synced 2 mins ago with BrightPath</small>
                </div>
                <span class="ops-overlay-chevron">›</span>
              </div>
              <div class="ops-overlay-card ops-overlay-card--deep">
                <span class="ops-overlay-icon">
                  <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M9 11l3 3L22 4"></path><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path></svg>
                </span>
                <div class="ops-overlay-text">
                  <strong>Daily Task Update · Olivia C.</strong>
                  <small>Client CRM capacity updated (66.9%)</small>
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
       2. ASYMMETRIC 4-CARD BENTO GRID (One Card Wider Than Other)
       Features: Instant Sync, Effortless Management, Seamless Connectivity (Graphs + Named Cursor), Suite Task Interaction
       ================================================================ -->
  <section class="ops-bento-section" id="ops-capabilities">
    <div class="ops-container">
      <div class="ops-section-heading">
        <span class="ops-eyebrow">Core Architecture</span>
        <h2>Built for speed, clarity, and instant sync</h2>
        <p>Discover how Workly OPS unites daily deliverables, client analytics, and calendar coordination in one cohesive platform.</p>
      </div>

      <!-- Row 1: Wider Left (1.22fr) + Compact Right (0.78fr) -->
      <div class="ops-bento-row ops-bento-row--wide-left">

        <!-- CARD 1 (Wide): Instant Sync Hub -->
        <article class="ops-bento-card ops-card--lilac">
          <div class="ops-bento-split">
            <div class="ops-bento-copy">
              <span class="ops-card-tag">Real-Time Architecture</span>
              <h3>Instant Sync</h3>
              <p>Every task update, email reply, and calendar change propagates across your team workspace instantaneously—zero manual status chasing.</p>
              <a href="#ops-interactive-suite" class="ops-text-link">See live workspace →</a>
            </div>

            <div class="ops-sync-diagram" aria-label="Instant sync network visualization">
              <div class="ops-sync-ring"></div>
              <div class="ops-sync-core">
                <span>W</span>
              </div>
              <div class="ops-sync-node ops-sync-node--1" title="Tasks">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path></svg>
                <span>Tasks</span>
              </div>
              <div class="ops-sync-node ops-sync-node--2" title="Email">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><rect width="20" height="16" x="2" y="4" rx="2"></rect><path d="m22 7-8.97 5.7"></path></svg>
                <span>Email</span>
              </div>
              <div class="ops-sync-node ops-sync-node--3" title="CRM">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle></svg>
                <span>CRM</span>
              </div>
              <div class="ops-sync-node ops-sync-node--4" title="Calendar">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><rect width="18" height="18" x="3" y="4" rx="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line></svg>
                <span>Sync</span>
              </div>
            </div>
          </div>
        </article>

        <!-- CARD 2 (Compact): Effortless Management -->
        <article class="ops-bento-card ops-card--mint">
          <div class="ops-bento-copy">
            <span class="ops-card-tag">Workflow Control</span>
            <h3>Effortless Management</h3>
            <p>Organize deliverables across structured stages with live progress meters.</p>
          </div>

          <div class="ops-mgmt-chips" id="opsMgmtFilter">
            <button type="button" class="ops-chip active" data-stage="all">All Stages</button>
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
            <small id="opsMgmtClient">BrightPath Digital · Assigned to Ethan Brooks</small>
          </div>
        </article>

      </div>

      <!-- Row 2: Compact Left (0.82fr) + Wider Right (1.18fr) -->
      <div class="ops-bento-row ops-bento-row--wide-right">

        <!-- CARD 3 (Compact): Seamless Connectivity + Graphs & Named Mouse Cursor -->
        <article class="ops-bento-card ops-card--ivory">
          <div class="ops-bento-copy">
            <span class="ops-card-tag">SLA &amp; Utilization</span>
            <h3>Seamless Connectivity</h3>
            <p>Live charts reveal consumed hours, team utilization, and SLA delivery at a glance.</p>
          </div>

          <div class="ops-analytics-box">
            <div class="ops-analytics-kpis">
              <div>
                <small>Capacity</small>
                <strong>180h</strong>
              </div>
              <div>
                <small>Consumed</small>
                <strong>120.5h</strong>
              </div>
              <div>
                <small>Utilization</small>
                <strong class="ops-text-purple">66.9%</strong>
              </div>
            </div>

            <!-- Bar + Trend Graph -->
            <div class="ops-chart-bars" aria-label="Weekly SLA utilization chart">
              <div class="ops-bar-col"><span style="height:52%"></span><small>Mon</small></div>
              <div class="ops-bar-col"><span style="height:74%"></span><small>Tue</small></div>
              <div class="ops-bar-col is-peak"><span style="height:92%"></span><small>Wed</small></div>
              <div class="ops-bar-col"><span style="height:68%"></span><small>Thu</small></div>
              <div class="ops-bar-col"><span style="height:84%"></span><small>Fri</small></div>
            </div>

            <!-- Animated Named Mouse Pointer -->
            <div class="ops-named-cursor ops-cursor-graph" aria-hidden="true">
              <svg width="16" height="16" viewBox="0 0 24 24" fill="#AE09E9" stroke="#ffffff" stroke-width="1.8"><path d="M4 4l7.07 17 2.51-7.39L21 11.07z"></path></svg>
              <span>Ethan Brooks</span>
            </div>
          </div>
        </article>

        <!-- CARD 4 (Wide): Suite Task Interaction -->
        <article class="ops-bento-card ops-card--slate">
          <div class="ops-bento-split">
            <div class="ops-bento-copy">
              <span class="ops-card-tag">Interactive Task Suite</span>
              <h3>Suite Task Execution</h3>
              <p>Click any stage below to see how your VA advances deliverables from backlog through review and verified completion.</p>
              <div class="ops-suite-controls" id="opsSuiteTriggers">
                <button type="button" class="ops-suite-btn active" data-step="0">1. Prioritize</button>
                <button type="button" class="ops-suite-btn" data-step="1">2. Execute</button>
                <button type="button" class="ops-suite-btn" data-step="2">3. Deliver</button>
              </div>
            </div>

            <div class="ops-suite-board">
              <div class="ops-suite-col" data-col="0">
                <span class="ops-col-head">To Do</span>
                <div class="ops-suite-task active" id="opsSuiteTask0">
                  <b>Marketing Banner QA</b>
                  <small>High · BrightPath</small>
                </div>
              </div>
              <div class="ops-suite-col" data-col="1">
                <span class="ops-col-head">In Progress</span>
                <div class="ops-suite-task" id="opsSuiteTask1">
                  <b>Client CRM Audit</b>
                  <small>Olivia · 65% done</small>
                </div>
              </div>
              <div class="ops-suite-col" data-col="2">
                <span class="ops-col-head">Completed</span>
                <div class="ops-suite-task" id="opsSuiteTask2">
                  <b>SLA Monthly Export</b>
                  <small>Verified · 100%</small>
                </div>
              </div>
            </div>
          </div>
        </article>

      </div>
    </div>
  </section>

  <!-- ================================================================
       3. COLORFUL SECTION A — WIDE WORKSPACE SHOWCASE (Widescreen Frame)
       ================================================================ -->
  <section class="ops-feature-banner">
    <div class="ops-container">
      <div class="ops-wide-card ops-wide-card--lavender">
        <div class="ops-wide-grid">
          <div class="ops-wide-copy">
            <span class="ops-eyebrow">Unified Communications &amp; Tasks</span>
            <h2>Email Hub &amp; Task Suite working in harmony</h2>
            <p>
              Stop switching across disconnected tabs. Your assistant manages incoming client emails, attaches deliverables directly to tasks, and keeps every conversation searchable by account.
            </p>
            <ul class="ops-clean-list">
              <li>
                <span class="ops-check-badge">✓</span>
                <span>Shared Email Hub with client &amp; project labeling</span>
              </li>
              <li>
                <span class="ops-check-badge">✓</span>
                <span>4-stage Kanban board with real-time progress bars</span>
              </li>
              <li>
                <span class="ops-check-badge">✓</span>
                <span>Retainer consumption tracking across active contracts</span>
              </li>
            </ul>
            <a class="ops-btn ops-btn--primary" href="find-va">Match With a VA</a>
          </div>

          <!-- Wide Frame Mockup (Reads $opsMedia['wide_frame'] for img/gif/video) -->
          <div class="ops-wide-device">
            <div class="ops-browser-frame">
              <div class="ops-browser-top">
                <div class="ops-browser-dots" aria-hidden="true"><span></span><span></span><span></span></div>
                <div class="ops-browser-bar">ops.worklystaff.com / workspace</div>
              </div>
              <div class="ops-browser-viewport">
                <?php
                $wideFallback = '
                  <div class="ops-mock-app">
                    <aside class="ops-mock-sidebar">
                      <div class="ops-mock-logo"><b>W</b> Workly</div>
                      <span class="active">Tasks</span>
                      <span>Clients</span>
                      <span>Calendar</span>
                      <span>Email Hub <em>6</em></span>
                    </aside>
                    <div class="ops-mock-main">
                      <div class="ops-mock-header">
                        <strong>Weekly Task Organizer</strong>
                        <span class="ops-mock-cta">+ New Deliverable</span>
                      </div>
                      <div class="ops-mock-kanban">
                        <div class="ops-mock-col">
                          <label>To Do</label>
                          <div class="ops-mock-card">
                            <span class="tag tag-high">High</span>
                            <b>Fix marketing banner</b>
                            <small>BrightPath · 40%</small>
                            <i><em style="width:40%"></em></i>
                          </div>
                        </div>
                        <div class="ops-mock-col">
                          <label>In Progress</label>
                          <div class="ops-mock-card">
                            <span class="tag tag-med">Active</span>
                            <b>Client CRM Update</b>
                            <small>Ethan B. · 78%</small>
                            <i><em style="width:78%"></em></i>
                          </div>
                        </div>
                        <div class="ops-mock-col">
                          <label>Completed</label>
                          <div class="ops-mock-card">
                            <span class="tag tag-ok">Done</span>
                            <b>Bookkeeping Sync</b>
                            <small>Verified · 100%</small>
                            <i><em style="width:100%"></em></i>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                ';
                echo ops_render_media_or_fallback($opsMedia['wide_frame'], 'Workly OPS Task Organizer and Email Hub', $wideFallback);
                ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ================================================================
       4. COLORFUL SECTION B — SLATE FRAME (Calendar + Animated Mouse Picking Day + Graphs)
       ================================================================ -->
  <section class="ops-feature-banner">
    <div class="ops-container">
      <div class="ops-wide-card ops-wide-card--sand">
        <div class="ops-wide-grid ops-wide-grid--reverse">

          <!-- Tablet/Slate Bezel Frame (Reads $opsMedia['slate_calendar'] for img/gif/video) -->
          <div class="ops-slate-device">
            <div class="ops-slate-bezel">
              <div class="ops-slate-camera" aria-hidden="true"></div>
              <div class="ops-slate-viewport">
                <?php
                $calendarFallback = '
                  <div class="ops-cal-ui">
                    <div class="ops-cal-topbar">
                      <div>
                        <strong>Calendar &amp; Meeting Scheduler</strong>
                        <small>Google Calendar Sync · Live</small>
                      </div>
                      <span class="ops-cal-btn">+ Schedule Meeting</span>
                    </div>

                    <div class="ops-cal-grid-wrap">
                      <div class="ops-cal-week">
                        <div class="ops-cal-day"><span>MON</span><b>23</b><small>9:00 AM Sync</small></div>
                        <div class="ops-cal-day"><span>TUE</span><b>24</b><small>CRM Review</small></div>
                        <div class="ops-cal-day ops-cal-day--target"><span>WED</span><b>25</b><small>10:30 AM Call</small></div>
                        <div class="ops-cal-day"><span>THU</span><b>26</b><small>SLA Audit</small></div>
                        <div class="ops-cal-day"><span>FRI</span><b>27</b><small>Report Export</small></div>
                      </div>

                      <div class="ops-cal-bottom-row">
                        <div class="ops-cal-chart-mini">
                          <span>SLA Attendance &amp; Hours</span>
                          <svg viewBox="0 0 200 46" class="ops-sparkline" aria-hidden="true">
                            <defs>
                              <linearGradient id="opsSparkGrad" x1="0" y1="0" x2="0" y2="1">
                                <stop offset="0%" stop-color="#AE09E9" stop-opacity="0.28"/>
                                <stop offset="100%" stop-color="#AE09E9" stop-opacity="0"/>
                              </linearGradient>
                            </defs>
                            <path d="M0 36 Q 35 28, 65 22 T 130 14 T 200 6 L 200 46 L 0 46 Z" fill="url(#opsSparkGrad)"/>
                            <path d="M0 36 Q 35 28, 65 22 T 130 14 T 200 6" fill="none" stroke="#AE09E9" stroke-width="2.5" stroke-linecap="round"/>
                          </svg>
                        </div>
                        <div class="ops-cal-meeting-pill">
                          <strong>Meeting Slot Locked</strong>
                          <small>Wed Nov 25 · 10:30 AM EST</small>
                        </div>
                      </div>

                      <!-- Animated Cursor Gliding to WED 25 -->
                      <div class="ops-named-cursor ops-cursor-calendar" aria-hidden="true">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="#AE09E9" stroke="#ffffff" stroke-width="1.8"><path d="M4 4l7.07 17 2.51-7.39L21 11.07z"></path></svg>
                        <span>Olivia Carter · VA</span>
                      </div>
                    </div>
                  </div>
                ';
                echo ops_render_media_or_fallback($opsMedia['slate_calendar'], 'Workly OPS Calendar and SLA Reporting', $calendarFallback);
                ?>
              </div>
            </div>
          </div>

          <div class="ops-wide-copy">
            <span class="ops-eyebrow">Calendar &amp; Executive SLA Reports</span>
            <h2>Schedule meetings &amp; monitor SLA hours effortlessly</h2>
            <p>
              Coordinate focus blocks, client reviews, and executive meetings directly inside OPS with real-time calendar synchronization and visual capacity reports.
            </p>
            <ul class="ops-clean-list">
              <li>
                <span class="ops-check-badge">✓</span>
                <span>Live two-way Google Calendar sync with instant alerts</span>
              </li>
              <li>
                <span class="ops-check-badge">✓</span>
                <span>Visual attendance &amp; retainer hour utilization graphs</span>
              </li>
              <li>
                <span class="ops-check-badge">✓</span>
                <span>One-click CSV &amp; Executive SLA PDF report exports</span>
              </li>
            </ul>
            <a class="ops-btn ops-btn--light" href="#ops-interactive-suite">Try Interactive Calendar →</a>
          </div>

        </div>
      </div>
    </div>
  </section>

  <!-- ================================================================
       5. PROTRUDING COLORFUL BANNER (Phone Mockup Overflows Container!)
       ================================================================ -->
  <section class="ops-protrude-section">
    <div class="ops-container">
      <div class="ops-protrude-banner">
        <div class="ops-protrude-grid">
          <div class="ops-protrude-copy">
            <span class="ops-eyebrow ops-eyebrow--light">Instant Connectivity</span>
            <h2>Stay aligned everywhere with Workly OPS</h2>
            <p>
              Review urgent tasks, reply to priority email threads, and confirm client meetings without waiting for end-of-day summaries.
            </p>
            <div class="ops-hero-actions ops-protrude-actions">
              <a class="ops-btn ops-btn--dark" href="find-va">Browse Verified VAs</a>
              <a class="ops-btn ops-btn--white" href="./#calendly-section">Schedule Discovery Call</a>
            </div>
          </div>

          <!-- Protruding Phone Mockup (Extends out of top & bottom of the banner!) -->
          <div class="ops-protrude-visual">
            <div class="ops-phone-bezel ops-phone-bezel--protrude">
              <div class="ops-phone-notch" aria-hidden="true"></div>
              <div class="ops-phone-viewport">
                <?php
                $bannerPhoneFallback = '
                  <div class="ops-cal-phone-ui">
                    <div class="ops-app-statusbar">
                      <span>9:41</span>
                      <span>OPS Live</span>
                    </div>
                    <div class="ops-cal-phone-head">
                      <small>November 2026</small>
                      <strong>Wednesday, 25</strong>
                    </div>
                    <div class="ops-cal-phone-list">
                      <div class="ops-cal-slot is-active">
                        <span>10:30 AM</span>
                        <div>
                          <b>BrightPath Weekly Sync</b>
                          <small>Ethan Brooks · Confirmed</small>
                        </div>
                      </div>
                      <div class="ops-cal-slot">
                        <span>01:00 PM</span>
                        <div>
                          <b>Client CRM Utilization Review</b>
                          <small>120.5h / 180h Logged</small>
                        </div>
                      </div>
                      <div class="ops-cal-slot">
                        <span>03:30 PM</span>
                        <div>
                          <b>Email Hub Inbox Zero Pass</b>
                          <small>6 Threads Categorized</small>
                        </div>
                      </div>
                    </div>
                    <div class="ops-cal-phone-badge">
                      <span>Synced with Google Calendar</span>
                    </div>
                  </div>
                ';
                echo ops_render_media_or_fallback($opsMedia['banner_feature'], 'Workly OPS compact schedule view', $bannerPhoneFallback);
                ?>
              </div>
            </div>

            <!-- Floating Badges Outside Protruding Phone -->
            <div class="ops-protrude-tag ops-protrude-tag--1">
              <span>✓ Task Completed · 100%</span>
            </div>
            <div class="ops-protrude-tag ops-protrude-tag--2">
              <span>↗ Instant Sync Active</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ================================================================
       6. INTERACTIVE OPERATIONS SUITE & LIVE MEETING CALENDAR
       ================================================================ -->
  <section class="ops-interactive-section" id="ops-interactive-suite">
    <div class="ops-container">
      <div class="ops-section-heading">
        <span class="ops-eyebrow">Interactive Preview</span>
        <h2>Experience the OPS suite in action</h2>
        <p>Switch modules below to inspect how tasks, client utilization charts, email threads, and meeting scheduling connect together.</p>
      </div>

      <!-- Interactive Module Switcher -->
      <div class="ops-tabs-bar" role="tablist" aria-label="Workly OPS Modules">
        <button type="button" class="ops-tab-btn active" data-tab="tasks" role="tab" aria-selected="true">Tasks Suite</button>
        <button type="button" class="ops-tab-btn" data-tab="crm" role="tab" aria-selected="false">Client CRM &amp; Graphs</button>
        <button type="button" class="ops-tab-btn" data-tab="calendar" role="tab" aria-selected="false">Meeting Calendar</button>
        <button type="button" class="ops-tab-btn" data-tab="email" role="tab" aria-selected="false">Email Hub</button>
      </div>

      <div class="ops-interactive-panel">
        <!-- TAB 1: TASKS SUITE -->
        <div class="ops-tab-pane active" id="opsTab-tasks">
          <div class="ops-pane-grid">
            <div class="ops-pane-info">
              <span class="ops-card-tag">Weekly Task Organizer</span>
              <h3>Real-time deliverable progression</h3>
              <p>Drag or click stages to keep every VA assignment transparent—from initial backlog triage to completed sign-off.</p>
              <div class="ops-pane-metrics">
                <div><strong>4 Stages</strong><span>Backlog to Completed</span></div>
                <div><strong>Subtasks</strong><span>Granular checklists</span></div>
              </div>
            </div>
            <div class="ops-pane-visual">
              <div class="ops-interactive-board">
                <div class="ops-ib-card">
                  <div class="ops-ib-head"><span class="ops-pill-high">High</span><small>To Do</small></div>
                  <strong>Fix marketing campaign brief</strong>
                  <small>BrightPath Digital · Ethan B.</small>
                  <div class="ops-progress-track"><div class="ops-progress-fill" style="width:45%"></div></div>
                </div>
                <div class="ops-ib-card">
                  <div class="ops-ib-head"><span class="ops-pill-med">Active</span><small>In Progress</small></div>
                  <strong>Update Q4 client records</strong>
                  <small>Northstar Consulting · Olivia C.</small>
                  <div class="ops-progress-track"><div class="ops-progress-fill" style="width:78%"></div></div>
                </div>
                <div class="ops-ib-card">
                  <div class="ops-ib-head"><span class="ops-pill-ok">Verified</span><small>Completed</small></div>
                  <strong>Month-End Bookkeeping</strong>
                  <small>BrightPath Digital · 100%</small>
                  <div class="ops-progress-track"><div class="ops-progress-fill ops-fill-ok" style="width:100%"></div></div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- TAB 2: CRM & GRAPHS -->
        <div class="ops-tab-pane" id="opsTab-crm">
          <div class="ops-pane-grid">
            <div class="ops-pane-info">
              <span class="ops-card-tag">Client CRM &amp; Capacity</span>
              <h3>Track retainer hours &amp; VA output</h3>
              <p>Monitor contracted monthly retainers, consumed hours, and active account health without manual spreadsheets.</p>
              <div class="ops-pane-metrics">
                <div><strong>180h</strong><span>Contracted Capacity</span></div>
                <div><strong>66.9%</strong><span>Portfolio Utilization</span></div>
              </div>
            </div>
            <div class="ops-pane-visual">
              <div class="ops-crm-table-card">
                <div class="ops-crm-row">
                  <div><strong>BrightPath Digital</strong><small>Lucas Bennett · Ethan Brooks (VA)</small></div>
                  <div class="ops-crm-usage">
                    <span>68.0 / 100h (68%)</span>
                    <div class="ops-progress-track"><div class="ops-progress-fill" style="width:68%"></div></div>
                  </div>
                </div>
                <div class="ops-crm-row">
                  <div><strong>Northstar Consulting</strong><small>Sophia Reynolds · Olivia Carter (VA)</small></div>
                  <div class="ops-crm-usage">
                    <span>52.5 / 80h (65.6%)</span>
                    <div class="ops-progress-track"><div class="ops-progress-fill" style="width:65.6%"></div></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- TAB 3: MEETING CALENDAR -->
        <div class="ops-tab-pane" id="opsTab-calendar">
          <div class="ops-pane-grid">
            <div class="ops-pane-info">
              <span class="ops-card-tag">Calendar &amp; Scheduling</span>
              <h3>Book meetings directly on the grid</h3>
              <p>Select a day to preview available discovery and SLA sync times, connected seamlessly to your calendar.</p>
              <a href="./#calendly-section" class="ops-btn ops-btn--primary" id="opsBookSlotBtn">Confirm Selected Slot →</a>
            </div>
            <div class="ops-pane-visual">
              <div class="ops-interactive-cal">
                <div class="ops-ic-header">
                  <strong>November 2026</strong>
                  <span id="opsSelectedDayText">Selected: Wed, Nov 25 · 10:30 AM</span>
                </div>
                <div class="ops-ic-days" id="opsCalDays">
                  <button type="button" class="ops-ic-day" data-day="Mon, Nov 23 · 09:30 AM"><span>Mon</span><b>23</b></button>
                  <button type="button" class="ops-ic-day" data-day="Tue, Nov 24 · 11:00 AM"><span>Tue</span><b>24</b></button>
                  <button type="button" class="ops-ic-day active" data-day="Wed, Nov 25 · 10:30 AM"><span>Wed</span><b>25</b></button>
                  <button type="button" class="ops-ic-day" data-day="Thu, Nov 26 · 02:00 PM"><span>Thu</span><b>26</b></button>
                  <button type="button" class="ops-ic-day" data-day="Fri, Nov 27 · 04:00 PM"><span>Fri</span><b>27</b></button>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- TAB 4: EMAIL HUB -->
        <div class="ops-tab-pane" id="opsTab-email">
          <div class="ops-pane-grid">
            <div class="ops-pane-info">
              <span class="ops-card-tag">Email Communications</span>
              <h3>Client conversations right beside tasks</h3>
              <p>Categorize, assign, and reply to important inbox threads with full team visibility and zero lost context.</p>
              <div class="ops-pane-metrics">
                <div><strong>25 Threads</strong><span>Synced Conversations</span></div>
                <div><strong>6 Unread</strong><span>Categorized by Client</span></div>
              </div>
            </div>
            <div class="ops-pane-visual">
              <div class="ops-email-stack">
                <div class="ops-email-item active">
                  <span class="ops-avatar-pill">BP</span>
                  <div>
                    <strong>BrightPath Digital · Q4 Assets Ready</strong>
                    <small>Ethan Brooks: Attached updated landing banner &amp; SLA summary.</small>
                  </div>
                  <span class="ops-email-time">11:00 AM</span>
                </div>
                <div class="ops-email-item">
                  <span class="ops-avatar-pill">NC</span>
                  <div>
                    <strong>Northstar Consulting · Meeting Confirmed</strong>
                    <small>Olivia Carter: Calendar invite synced for Wednesday Nov 25.</small>
                  </div>
                  <span class="ops-email-time">10:15 AM</span>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </section>

  <!-- ================================================================
       7. FINAL CTA BANNER
       ================================================================ -->
  <section class="ops-final-cta">
    <div class="ops-container">
      <div class="ops-cta-box">
        <div>
          <span class="ops-eyebrow">Ready to Start</span>
          <h2>Give your business a dedicated VA backed by Workly OPS.</h2>
          <p>Hire top 1% bilingual talent and manage every project with instant sync and complete operational clarity.</p>
        </div>
        <div class="ops-cta-actions">
          <a class="ops-btn ops-btn--primary" href="find-va">Find Your VA →</a>
          <a class="ops-btn ops-btn--light" href="./#calendly-section">Book Discovery Call</a>
        </div>
      </div>
    </div>
  </section>

</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
  // 1. Interactive Effortless Management Stage Chips
  var mgmtData = {
    all:      { title: 'Month-End Bookkeeping', pct: '68%', bar: '68%', client: 'BrightPath Digital · Assigned to Ethan Brooks' },
    todo:     { title: 'Fix Marketing Banner', pct: '40%', bar: '40%', client: 'BrightPath Digital · Queued for review' },
    progress: { title: 'Client CRM Retainer Audit', pct: '78%', bar: '78%', client: 'Northstar Consulting · Olivia Carter active' },
    done:     { title: 'Executive SLA Monthly Export', pct: '100%', bar: '100%', client: 'All Client Accounts · Verified & Delivered' }
  };
  document.querySelectorAll('#opsMgmtFilter .ops-chip').forEach(function (btn) {
    btn.addEventListener('click', function () {
      document.querySelectorAll('#opsMgmtFilter .ops-chip').forEach(function (b) { b.classList.remove('active'); });
      btn.classList.add('active');
      var info = mgmtData[btn.getAttribute('data-stage')] || mgmtData.all;
      var t = document.getElementById('opsMgmtTitle');
      var p = document.getElementById('opsMgmtPct');
      var b = document.getElementById('opsMgmtBar');
      var c = document.getElementById('opsMgmtClient');
      if (t) t.textContent = info.title;
      if (p) p.textContent = info.pct;
      if (b) b.style.width = info.bar;
      if (c) c.textContent = info.client;
    });
  });

  // 2. Interactive Suite Task Progression
  document.querySelectorAll('#opsSuiteTriggers .ops-suite-btn').forEach(function (btn) {
    btn.addEventListener('click', function () {
      var idx = btn.getAttribute('data-step');
      document.querySelectorAll('#opsSuiteTriggers .ops-suite-btn').forEach(function (b) { b.classList.remove('active'); });
      btn.classList.add('active');
      [0, 1, 2].forEach(function (i) {
        var el = document.getElementById('opsSuiteTask' + i);
        if (el) el.classList.toggle('active', String(i) === idx);
      });
    });
  });

  // 3. Interactive Module Switcher Tabs
  document.querySelectorAll('.ops-tab-btn').forEach(function (tab) {
    tab.addEventListener('click', function () {
      var target = tab.getAttribute('data-tab');
      document.querySelectorAll('.ops-tab-btn').forEach(function (t) {
        t.classList.remove('active');
        t.setAttribute('aria-selected', 'false');
      });
      tab.classList.add('active');
      tab.setAttribute('aria-selected', 'true');

      document.querySelectorAll('.ops-tab-pane').forEach(function (pane) {
        pane.classList.remove('active');
      });
      var activePane = document.getElementById('opsTab-' + target);
      if (activePane) activePane.classList.add('active');
    });
  });

  // 4. Interactive Meeting Calendar Day Picker
  document.querySelectorAll('#opsCalDays .ops-ic-day').forEach(function (dayBtn) {
    dayBtn.addEventListener('click', function () {
      document.querySelectorAll('#opsCalDays .ops-ic-day').forEach(function (d) { d.classList.remove('active'); });
      dayBtn.classList.add('active');
      var label = document.getElementById('opsSelectedDayText');
      if (label) label.textContent = 'Selected: ' + dayBtn.getAttribute('data-day');
    });
  });
});
</script>

<?php
$footerPath = file_exists(__DIR__ . '/includes/footer.php')
    ? __DIR__ . '/includes/footer.php'
    : dirname(__DIR__) . '/includes/footer.php';
require_once $footerPath;
?>