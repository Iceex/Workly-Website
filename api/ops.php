<?php
/**
 * Workly OPS - Interactive Operations Workspace Showcase
 * File: /php/ops.php
 */
$currentPage     = "ops";
$pageTitle       = "Workly OPS | Instant Sync & Operational Visibility";
$pageDescription = "Organize VA deliverables, monitor real-time SLA performance graphs, manage client retainers, and unify email threads in one connected workspace.";
$canonicalUrl    = "https://worklystaff.com/ops";

/**
 * ============================================================================
 * MOCKUP MEDIA URLS (Images, GIFs, or Videos)
 * Insert any relative path (e.g. 'assets/media/ops-demo.mp4') or full URL.
 * Supports:
 *   - Video (.mp4, .webm, .mov, .ogg) -> Plays inside the mockup screen
 *   - Image / GIF (.png, .jpg, .webp, .gif, .svg) -> Renders inside the mockup
 *   - Empty ('') -> Displays the live interactive Workly OPS UI inside the mockup
 * ============================================================================
 */
$opsMedia = [
    'hero_center'     => '', // Hero centered iPhone 16+ screen (image / gif / video)
    'wide_frame'      => '', // Wide Kanban & velocity showcase (image / gif / video)
    'slate_analytics' => '', // Analytics & PTO benchmarks showcase (image / gif / video)
    'banner_phone'    => '', // Protruding Email Hub iPhone 16+ screen (image / gif / video)
];

// Automatically resolve asset paths whether ops.php is in root or a subfolder
$assetPrefix = file_exists(__DIR__ . '/assets/logo.png') ? 'assets/' : '../assets/';
$opsLogoPath = $assetPrefix . 'logo.png';

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

<link rel="stylesheet" href="<?= htmlspecialchars($assetPrefix, ENT_QUOTES, 'UTF-8') ?>css/ops.css">

<div class="ops-page">

  <!-- ================================================================
       1. NEAR-FULLWIDTH HERO BANNER (Floating Elements + iPhone 16+)
       ================================================================ -->
  <section class="ops-hero-section">
    <div class="ops-hero-wrap">
      <div class="ops-hero-banner">
        <div class="ops-hero-rings" aria-hidden="true">
          <span></span><span></span><span></span>
        </div>

        <div class="ops-hero-header animate-entrance">
          <div class="ops-eyebrow">
            <img src="<?= htmlspecialchars($opsLogoPath, ENT_QUOTES, 'UTF-8') ?>" alt="Workly" class="ops-inline-logo">
            <span>Workly OPS · Instant Sync &amp; Connectivity</span>
          </div>
          <h1>One connected workspace<br>for <span class="ops-gradient-text">seamless VA operations</span></h1>
          <p>
            Track deliverables, monitor VA turnaround &amp; SLA benchmarks, balance client retainers, and centralize team email—all synchronized in real time.
          </p>
          <div class="ops-hero-actions">
            <a class="ops-btn ops-btn--dark" href="find-va">
              <span>Find Your VA</span>
              <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
            </a>
            <a class="ops-btn ops-btn--glass" href="#ops-capabilities">Explore Capabilities</a>
          </div>
        </div>

        <!-- Centered iPhone 16+ Showcase + Continuous Floating Elements -->
        <div class="ops-hero-stage">

          <!-- Floating Card Top-Left: Active VA Deliverable -->
          <div class="ops-float-card ops-float-card--tl" data-parallax="18">
            <div class="ops-float-badge ops-float-badge--amber">To Do · High</div>
            <strong>Fix marketing banner</strong>
            <div class="ops-float-meta">
              <span>BrightPath Digital</span>
              <span>40%</span>
            </div>
            <div class="ops-mini-bar"><span style="width:40%"></span></div>
          </div>

          <!-- Floating Card Bottom-Left: Email Hub -->
          <div class="ops-float-card ops-float-card--bl" data-parallax="-14">
            <div class="ops-float-row">
              <span class="ops-avatar-pill">EB</span>
              <div>
                <strong>Email Hub · 6 Unread</strong>
                <small>Ethan Brooks replied to client</small>
              </div>
            </div>
          </div>

          <!-- Floating Card Top-Right: SLA Benchmark -->
          <div class="ops-float-card ops-float-card--tr" data-parallax="-20">
            <div class="ops-float-badge ops-float-badge--emerald">Pod On-Time SLA</div>
            <strong>94.8% · 2.6h Avg</strong>
            <small>Ethan 93.0% · Olivia 96.5%</small>
          </div>

          <!-- Floating Pill Bottom-Right: Client Utilization -->
          <div class="ops-float-pill ops-float-pill--br" data-parallax="15">
            <span class="ops-pill-avatars">
              <i>OC</i><i>EB</i>
            </span>
            <span>Client Retainers · <b>66.9% Used</b></span>
          </div>

          <!-- Centered Slim iPhone 16+ Frame -->
          <div class="ops-hero-phone-wrap" data-parallax="8">
            <div class="ops-phone-bezel ops-phone-bezel--iphone16 ops-phone-bezel--hero">
              <div class="ops-phone-island" aria-hidden="true"></div>
              <div class="ops-phone-viewport">
                <?php
                $logoEsc = htmlspecialchars($opsLogoPath, ENT_QUOTES, 'UTF-8');
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
                          <small>Re: Campaign assets &amp; SLA approved</small>
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
                echo ops_render_media_or_fallback($opsMedia['hero_center'], 'Workly OPS live assistant feed', $heroPhoneFallback);
                ?>
              </div>
            </div>

            <!-- Overlapping Front Action Cards -->
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
                  <small>Real-time VA velocity &amp; deliverable metrics</small>
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
       2. ASYMMETRIC 4-CARD BENTO GRID (4 Distinct Platform Capabilities)
       ================================================================ -->
  <section class="ops-bento-section" id="ops-capabilities">
    <div class="ops-container">
      <div class="ops-section-heading">
        <span class="ops-eyebrow">Platform Pillars</span>
        <h2>Everything your VA needs, built into one rhythm</h2>
        <p>Four core capabilities working in instant sync—eliminating scattered spreadsheets, blind spots, and manual follow-ups.</p>
      </div>

      <!-- Row 1: Wide Card (Instant Sync) + Compact Card (Task Stage Control) -->
      <div class="ops-bento-row ops-bento-row--wide-left">

        <!-- CARD 1 (Wide): Instant Sync Hub -->
        <article class="ops-bento-card ops-card--lilac">
          <div class="ops-bento-split">
            <div class="ops-bento-copy">
              <span class="ops-card-tag">Instant Sync</span>
              <h3>Unified Workspace</h3>
              <p>Tasks, client accounts, team availability, and inbox threads update simultaneously—zero status chasing.</p>
              <a href="#ops-interactive-suite" class="ops-text-link">Explore live suite →</a>
            </div>

            <div class="ops-sync-diagram" aria-label="Instant sync network visualization">
              <div class="ops-sync-ring"></div>
              <div class="ops-sync-core">
                <img src="<?= htmlspecialchars($opsLogoPath, ENT_QUOTES, 'UTF-8') ?>" alt="Workly" class="ops-sync-logo">
              </div>
              <div class="ops-sync-node ops-sync-node--1"><span>Tasks</span></div>
              <div class="ops-sync-node ops-sync-node--2"><span>Email Hub</span></div>
              <div class="ops-sync-node ops-sync-node--3"><span>Client CRM</span></div>
              <div class="ops-sync-node ops-sync-node--4"><span>SLA &amp; PTO</span></div>
            </div>
          </div>
        </article>

        <!-- CARD 2 (Compact): Task Stage Control -->
        <article class="ops-bento-card ops-card--mint">
          <div class="ops-bento-copy">
            <span class="ops-card-tag">Kanban Flow</span>
            <h3>Task Control</h3>
            <p>Track subtasks, priorities, and completion progress by stage.</p>
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
            <small id="opsMgmtClient">BrightPath Digital · Assigned to Ethan Brooks</small>
          </div>
        </article>

      </div>

      <!-- Row 2: Compact Card (VA Performance Graph + Multi-Stop Cursor) + Wide Card (Client CRM & Capacity) -->
      <div class="ops-bento-row ops-bento-row--wide-right">

        <!-- CARD 3 (Compact): VA Completion & Turnaround Graph + Interactive Named Cursor -->
        <article class="ops-bento-card ops-card--ivory">
          <div class="ops-bento-copy">
            <span class="ops-card-tag">Performance Analytics</span>
            <h3>VA Completion &amp; SLA</h3>
            <p>Measure completion rates, turnaround speed, and on-time SLA across every assistant.</p>
          </div>

          <div class="ops-graph-stage" id="opsGraphStage">
            <div class="ops-graph-header">
              <div class="ops-graph-legend">
                <span><i class="dot-purple"></i>Completion</span>
                <span><i class="dot-green"></i>On-Time SLA</span>
              </div>
              <span class="ops-gkpi-pill">Pod SLA: <b>94.8%</b></span>
            </div>

            <!-- Combo Bar + Turnaround Curve inspired by Dashboard Screenshot -->
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

            <!-- Dynamic Tooltip driven by Scripted Mouse -->
            <div class="ops-graph-tooltip" id="opsGraphTooltip">
              <strong class="tt-name">Ethan Brooks</strong>
              <span class="tt-role">Marketing</span>
              <div class="tt-metrics">
                <b class="tt-sla">93.0% SLA</b>
                <small class="tt-turn">2.6h Turnaround</small>
              </div>
            </div>

            <!-- Multi-Waypoint Animated Mouse with Name -->
            <div class="ops-named-cursor ops-js-cursor" id="opsGraphCursor" aria-hidden="true">
              <svg width="16" height="16" viewBox="0 0 24 24" fill="#AE09E9" stroke="#ffffff" stroke-width="1.8"><path d="M4 4l7.07 17 2.51-7.39L21 11.07z"></path></svg>
              <span>Jordan · Lead</span>
            </div>
          </div>
        </article>

        <!-- CARD 4 (Wide): Client CRM & Retainer Utilization -->
        <article class="ops-bento-card ops-card--slate">
          <div class="ops-bento-split">
            <div class="ops-bento-copy">
              <span class="ops-card-tag">Client CRM &amp; Retainers</span>
              <h3>Account Capacity</h3>
              <p>Track contracted hours, consumed deliverables, and assigned VAs per client account.</p>
              <div class="ops-mgmt-chips" id="opsCrmToggle">
                <button type="button" class="ops-chip active" data-mode="retainer">Retainer Usage</button>
                <button type="button" class="ops-chip" data-mode="sla">SLA Health</button>
              </div>
            </div>

            <div class="ops-crm-mini-panel">
              <div class="ops-crm-kpis">
                <div><small>Consumed / Avg</small><strong id="opsCrmTotal">120.5h</strong></div>
                <div><small>Portfolio Rate</small><strong class="ops-text-purple" id="opsCrmRate">66.9%</strong></div>
              </div>
              <div class="ops-crm-mini-row">
                <div class="ops-crm-row-top">
                  <strong>BrightPath Digital</strong>
                  <span id="opsBpLabel">68.0 / 100h</span>
                </div>
                <div class="ops-progress-track"><div class="ops-progress-fill" id="opsBpBar" style="width: 68%;"></div></div>
                <small>Assigned VA: Ethan Brooks · Active</small>
              </div>
              <div class="ops-crm-mini-row">
                <div class="ops-crm-row-top">
                  <strong>Northstar Consulting</strong>
                  <span id="opsNsLabel">52.5 / 80h</span>
                </div>
                <div class="ops-progress-track"><div class="ops-progress-fill" id="opsNsBar" style="width: 65.6%;"></div></div>
                <small>Assigned VA: Olivia Carter · Active</small>
              </div>
            </div>
          </div>
        </article>

      </div>
    </div>
  </section>

  <!-- ================================================================
       3. WIDE WORKSPACE SHOWCASE — KANBAN & DELIVERABLE VELOCITY
       ================================================================ -->
  <section class="ops-feature-banner">
    <div class="ops-container">
      <div class="ops-wide-card ops-wide-card--lavender">
        <div class="ops-wide-grid">
          <div class="ops-wide-copy">
            <span class="ops-eyebrow">Kanban &amp; 30-Day Velocity</span>
            <h2>Every deliverable tracked from backlog to sign-off</h2>
            <p>
              Organize work across Backlog, To Do, In Progress, and Completed while automatically aggregating daily due-versus-completed velocity.
            </p>
            <ul class="ops-clean-list">
              <li><span class="ops-check-badge">✓</span><span>4-column Kanban distribution by status or VA assignee</span></li>
              <li><span class="ops-check-badge">✓</span><span>Priority alerts &amp; subtask progress bars on every card</span></li>
              <li><span class="ops-check-badge">✓</span><span>30-day deliverable velocity chart for leadership clarity</span></li>
            </ul>
            <a class="ops-btn ops-btn--primary" href="find-va">Match With a VA</a>
          </div>

          <!-- Wide Browser Frame (Reads $opsMedia['wide_frame']) -->
          <div class="ops-wide-device">
            <div class="ops-browser-frame">
              <div class="ops-browser-top">
                <div class="ops-browser-dots" aria-hidden="true"><span></span><span></span><span></span></div>
                <div class="ops-browser-bar">ops.worklystaff.com / tasks</div>
              </div>
              <div class="ops-browser-viewport">
                <?php
                $logoEsc = htmlspecialchars($opsLogoPath, ENT_QUOTES, 'UTF-8');
                $wideFallback = '
                  <div class="ops-mock-app">
                    <aside class="ops-mock-sidebar">
                      <div class="ops-mock-logo">
                        <img src="' . $logoEsc . '" alt="Workly" class="ops-mock-brand-img">
                        <span>Workly</span>
                      </div>
                      <span>Overview</span>
                      <span class="active">Tasks</span>
                      <span>Clients</span>
                      <span>Email Hub <em>6</em></span>
                    </aside>
                    <div class="ops-mock-main">
                      <div class="ops-mock-header">
                        <strong>Weekly Task Organizer</strong>
                        <span class="ops-mock-cta">+ New Deliverable</span>
                      </div>
                      <div class="ops-mock-kanban">
                        <div class="ops-mock-col">
                          <label>To Do · 33.3%</label>
                          <div class="ops-mock-card">
                            <span class="tag tag-high">High</span>
                            <b>Fix marketing banner</b>
                            <small>BrightPath · 40%</small>
                            <i><em style="width:40%"></em></i>
                          </div>
                        </div>
                        <div class="ops-mock-col">
                          <label>In Progress · 33.3%</label>
                          <div class="ops-mock-card">
                            <span class="tag tag-med">Active</span>
                            <b>Client CRM Update</b>
                            <small>Ethan B. · 78%</small>
                            <i><em style="width:78%"></em></i>
                          </div>
                        </div>
                        <div class="ops-mock-col">
                          <label>Completed · 33.3%</label>
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
                echo ops_render_media_or_fallback($opsMedia['wide_frame'], 'Workly OPS Weekly Task Organizer', $wideFallback);
                ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ================================================================
       4. TABLET / SLATE SHOWCASE — TEAM BENCHMARKS, GRAPHS & PTO COVERAGE
       (Multi-Waypoint Animated Mouse Touring Real Dashboard Graphs)
       ================================================================ -->
  <section class="ops-feature-banner">
    <div class="ops-container">
      <div class="ops-wide-card ops-wide-card--sand">
        <div class="ops-wide-grid ops-wide-grid--reverse">

          <!-- Sleek Slate Frame (Reads $opsMedia['slate_analytics']) -->
          <div class="ops-slate-device">
            <div class="ops-slate-bezel">
              <div class="ops-slate-camera" aria-hidden="true"></div>
              <div class="ops-slate-viewport">
                <?php
                $analyticsFallback = '
                  <div class="ops-slate-ui" id="opsSlateStage">
                    <div class="ops-slate-top">
                      <div>
                        <strong>Team Performance &amp; VA Benchmarks</strong>
                        <small id="opsSlateReadout">30D Productivity Curve · 94.8% Pod On-Time SLA</small>
                      </div>
                      <div class="ops-slate-pills">
                        <span data-slate-el="tab-roles">VA Roles</span>
                        <span data-slate-el="tab-trends" class="is-hovered">Productivity</span>
                      </div>
                    </div>

                    <!-- Productivity Spline Graph -->
                    <div class="ops-slate-chart">
                      <svg viewBox="0 0 320 74" class="ops-spline-svg" aria-hidden="true">
                        <defs>
                          <linearGradient id="opsSlateGrad" x1="0" y1="0" x2="0" y2="1">
                            <stop offset="0%" stop-color="#0284c7" stop-opacity="0.22"/>
                            <stop offset="100%" stop-color="#0284c7" stop-opacity="0"/>
                          </linearGradient>
                        </defs>
                        <path d="M12 64 Q 88 22, 162 14 T 308 62 L 308 72 L 12 72 Z" fill="url(#opsSlateGrad)"/>
                        <path d="M12 64 Q 88 22, 162 14 T 308 62" fill="none" stroke="#0284c7" stroke-width="2.5" stroke-linecap="round"/>
                        <circle cx="162" cy="14" r="5" fill="#AE09E9" stroke="#fff" stroke-width="2" data-slate-el="peak-point"/>
                      </svg>
                    </div>

                    <!-- Bottom Split: Kanban Distribution + Team PTO Approval -->
                    <div class="ops-slate-bottom">
                      <div class="ops-slate-mini-box">
                        <span>Kanban Distribution</span>
                        <div class="ops-mini-dist">
                          <i class="d-purple" style="height:70%"></i>
                          <i class="d-blue" style="height:70%"></i>
                          <i class="d-green" style="height:82%" data-slate-el="kanban-done"></i>
                        </div>
                      </div>
                      <div class="ops-slate-mini-box">
                        <span>Team PTO Coverage</span>
                        <div class="ops-mini-pto">
                          <span>17 Ethan</span>
                          <span>18 Ethan</span>
                          <span class="pto-focus" data-slate-el="pto-day">19 Ethan</span>
                        </div>
                      </div>
                    </div>

                    <!-- Multi-Stop Scripted Mouse Pointer -->
                    <div class="ops-named-cursor ops-js-cursor" id="opsSlateCursor" aria-hidden="true">
                      <svg width="16" height="16" viewBox="0 0 24 24" fill="#AE09E9" stroke="#ffffff" stroke-width="1.8"><path d="M4 4l7.07 17 2.51-7.39L21 11.07z"></path></svg>
                      <span>Jordan Mitchell</span>
                    </div>
                  </div>
                ';
                echo ops_render_media_or_fallback($opsMedia['slate_analytics'], 'Workly OPS Team Performance Benchmarks and PTO Coverage', $analyticsFallback);
                ?>
              </div>
            </div>
          </div>

          <div class="ops-wide-copy">
            <span class="ops-eyebrow">Team Benchmarks &amp; PTO Coverage</span>
            <h2>Data-backed visibility without micromanagement</h2>
            <p>
              Compare completion velocity across 7, 14, or 30 days, spot bottlenecked tasks early, and approve VA time-off requests with zero coverage gaps.
            </p>
            <ul class="ops-clean-list">
              <li><span class="ops-check-badge">✓</span><span>Per-VA completion rate &amp; average turnaround hours</span></li>
              <li><span class="ops-check-badge">✓</span><span>Visual Team PTO Approval calendar preventing overlap</span></li>
              <li><span class="ops-check-badge">✓</span><span>One-click CSV &amp; Executive SLA PDF report exports</span></li>
            </ul>
            <a class="ops-btn ops-btn--light" href="#ops-interactive-suite">Try Live Analytics →</a>
          </div>

        </div>
      </div>
    </div>
  </section>

  <!-- ================================================================
       5. PROTRUDING BANNER — UNIFIED EMAIL HUB (Thin iPhone 16+ Protruding!)
       ================================================================ -->
  <section class="ops-protrude-section">
    <div class="ops-container">
      <div class="ops-protrude-banner">
        <div class="ops-protrude-grid">
          <div class="ops-protrude-copy">
            <span class="ops-eyebrow ops-eyebrow--light">Email Hub &amp; Instant Connectivity</span>
            <h2>Client threads organized right beside the work</h2>
            <p>
              Your VA filters inbox threads by client and label, attaches deliverables, and keeps executive communications structured in one shared hub.
            </p>
            <div class="ops-hero-actions ops-protrude-actions">
              <a class="ops-btn ops-btn--dark" href="find-va">Browse Verified VAs</a>
              <a class="ops-btn ops-btn--white" href="./#calendly-section">Schedule Discovery Call</a>
            </div>
          </div>

          <!-- Protruding Slim iPhone 16+ Frame (Reads $opsMedia['banner_phone']) -->
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

            <div class="ops-protrude-tag ops-protrude-tag--1">✓ Unread Threads Triaged</div>
            <div class="ops-protrude-tag ops-protrude-tag--2">↗ Auto-Labeled by Client</div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ================================================================
       6. INTERACTIVE PLATFORM SUITE EXPLORER (4 Distinct Modules)
       ================================================================ -->
  <section class="ops-interactive-section" id="ops-interactive-suite">
    <div class="ops-container">
      <div class="ops-section-heading">
        <span class="ops-eyebrow">Interactive Tour</span>
        <h2>Explore every module in one workspace</h2>
        <p>Switch tabs below to test analytics timeframes, task progression, email triage, and meeting scheduling.</p>
      </div>

      <div class="ops-tabs-bar" role="tablist" aria-label="Workly OPS Modules">
        <button type="button" class="ops-tab-btn active" data-tab="analytics" role="tab" aria-selected="true">SLA &amp; Velocity</button>
        <button type="button" class="ops-tab-btn" data-tab="tasks" role="tab" aria-selected="false">Task Suite</button>
        <button type="button" class="ops-tab-btn" data-tab="email" role="tab" aria-selected="false">Email Hub</button>
        <button type="button" class="ops-tab-btn" data-tab="calendar" role="tab" aria-selected="false">Meetings &amp; PTO</button>
      </div>

      <div class="ops-interactive-panel">

        <!-- TAB 1: SLA & VELOCITY ANALYTICS -->
        <div class="ops-tab-pane active" id="opsTab-analytics">
          <div class="ops-pane-grid">
            <div class="ops-pane-info">
              <span class="ops-card-tag">Interactive Benchmarks</span>
              <h3>Compare VA turnaround &amp; SLA</h3>
              <p>Filter performance windows across 7, 14, or 30 days to verify on-time delivery and team velocity.</p>
              <div class="ops-mgmt-chips" id="opsTimeframeTabs">
                <button type="button" class="ops-chip" data-tf="7d">7 Days</button>
                <button type="button" class="ops-chip" data-tf="14d">14 Days</button>
                <button type="button" class="ops-chip active" data-tf="30d">30 Days</button>
              </div>
              <div class="ops-pane-metrics ops-pane-metrics--3">
                <div><strong id="opsExpSla">94.8%</strong><span>On-Time SLA</span></div>
                <div><strong id="opsExpTurn">2.6h</strong><span>Avg Turnaround</span></div>
                <div><strong id="opsExpComp">91.4%</strong><span>30D Velocity</span></div>
              </div>
            </div>
            <div class="ops-pane-visual">
              <div class="ops-exp-chart-card">
                <div class="ops-exp-chart-top">
                  <strong>Productivity &amp; Velocity Curve</strong>
                  <span>Live Pod Benchmark</span>
                </div>
                <svg viewBox="0 0 320 70" class="ops-exp-svg" aria-hidden="true">
                  <path id="opsExpCurve" d="M0 52 Q 60 40, 120 14 T 230 16 T 320 6" fill="none" stroke="#AE09E9" stroke-width="3" stroke-linecap="round"/>
                </svg>
                <div class="ops-exp-bars">
                  <div><span>Backlog</span><b>0%</b></div>
                  <div><span>To Do</span><b>33.3%</b></div>
                  <div><span>In Progress</span><b>33.3%</b></div>
                  <div class="is-ok"><span>Completed</span><b>33.3%</b></div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- TAB 2: INTERACTIVE TASK SUITE -->
        <div class="ops-tab-pane" id="opsTab-tasks">
          <div class="ops-pane-grid">
            <div class="ops-pane-info">
              <span class="ops-card-tag">Kanban Task Suite</span>
              <h3>Step-by-step deliverable flow</h3>
              <p>Click a stage to simulate how your VA advances deliverables from prioritized queue to verified sign-off.</p>
              <div class="ops-suite-controls" id="opsSuiteTriggers">
                <button type="button" class="ops-suite-btn active" data-step="0">1. Prioritize</button>
                <button type="button" class="ops-suite-btn" data-step="1">2. Execute</button>
                <button type="button" class="ops-suite-btn" data-step="2">3. Deliver</button>
              </div>
            </div>
            <div class="ops-pane-visual">
              <div class="ops-suite-board">
                <div class="ops-suite-col">
                  <span class="ops-col-head">To Do</span>
                  <div class="ops-suite-task active" id="opsSuiteTask0">
                    <b>Marketing Banner QA</b>
                    <small>High · BrightPath · 40%</small>
                  </div>
                </div>
                <div class="ops-suite-col">
                  <span class="ops-col-head">In Progress</span>
                  <div class="ops-suite-task" id="opsSuiteTask1">
                    <b>Client CRM Audit</b>
                    <small>Olivia · 78% complete</small>
                  </div>
                </div>
                <div class="ops-suite-col">
                  <span class="ops-col-head">Completed</span>
                  <div class="ops-suite-task" id="opsSuiteTask2">
                    <b>Monthly SLA Export</b>
                    <small>Verified · 100%</small>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- TAB 3: EMAIL HUB -->
        <div class="ops-tab-pane" id="opsTab-email">
          <div class="ops-pane-grid">
            <div class="ops-pane-info">
              <span class="ops-card-tag">Email Communications</span>
              <h3>Inbox organized by client &amp; label</h3>
              <p>Review client correspondence, filter attachments, and track team replies without leaving your workspace.</p>
              <div class="ops-pane-metrics">
                <div><strong>25 Threads</strong><span>Synced Conversations</span></div>
                <div><strong>6 Unread</strong><span>Labeled by Account</span></div>
              </div>
            </div>
            <div class="ops-pane-visual">
              <div class="ops-email-stack">
                <div class="ops-email-item active">
                  <span class="ops-avatar-pill">BP</span>
                  <div>
                    <strong>BrightPath Digital · Q4 Assets Ready</strong>
                    <small>Ethan Brooks: Attached landing banner &amp; SLA summary.</small>
                  </div>
                  <span class="ops-email-time">11:00 AM</span>
                </div>
                <div class="ops-email-item">
                  <span class="ops-avatar-pill">NC</span>
                  <div>
                    <strong>Northstar Consulting · Retainer Review</strong>
                    <small>Olivia Carter: Updated monthly utilization to 65.6%.</small>
                  </div>
                  <span class="ops-email-time">10:15 AM</span>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- TAB 4: MEETINGS & PTO CALENDAR -->
        <div class="ops-tab-pane" id="opsTab-calendar">
          <div class="ops-pane-grid">
            <div class="ops-pane-info">
              <span class="ops-card-tag">Calendar &amp; PTO Coverage</span>
              <h3>Sync meetings &amp; time-off cleanly</h3>
              <p>Select a day to check focus blocks, approved PTO coverage, and discovery meeting availability.</p>
              <a href="./#calendly-section" class="ops-btn ops-btn--primary">Confirm Selected Slot →</a>
            </div>
            <div class="ops-pane-visual">
              <div class="ops-interactive-cal">
                <div class="ops-ic-header">
                  <strong>November 2026</strong>
                  <span id="opsSelectedDayText">Wed, Nov 25 · 10:30 AM · Full Coverage</span>
                </div>
                <div class="ops-ic-days" id="opsCalDays">
                  <button type="button" class="ops-ic-day" data-day="Mon, Nov 23 · 09:30 AM · All VAs Online"><span>Mon</span><b>23</b></button>
                  <button type="button" class="ops-ic-day" data-day="Tue, Nov 24 · 11:00 AM · All VAs Online"><span>Tue</span><b>24</b></button>
                  <button type="button" class="ops-ic-day active" data-day="Wed, Nov 25 · 10:30 AM · Full Coverage"><span>Wed</span><b>25</b></button>
                  <button type="button" class="ops-ic-day" data-day="Thu, Nov 26 · 02:00 PM · PTO Approved (Ethan)"><span>Thu</span><b>26</b></button>
                  <button type="button" class="ops-ic-day" data-day="Fri, Nov 27 · 04:00 PM · SLA Report Day"><span>Fri</span><b>27</b></button>
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
          <div class="ops-eyebrow ops-eyebrow--light">
            <img src="<?= htmlspecialchars($opsLogoPath, ENT_QUOTES, 'UTF-8') ?>" alt="Workly" class="ops-inline-logo">
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