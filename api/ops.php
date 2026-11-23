<?php

$currentPage = "ops";
$pageTitle = 'Workly OPS | A better way to work together';
$pageDescription = 'Workly OPS helps your virtual assistant organize tasks, coordinate projects, communicate clearly and keep your business informed.';
$currentPage = 'ops';
$canonicalUrl = 'https://worklystaff.com/ops';


header(
    'Cache-Control: public, max-age=120, s-maxage=3600, stale-while-revalidate=86400'
);

require_once dirname(__DIR__) . '/includes/header.php';

?>

<head>
    <link rel="stylesheet" href="assets/css/ops.css">
</head>

<main class="ops-page">
    <section class="ops-hero">
        <div class="ops-container ops-hero-grid">
            <div class="ops-hero-copy">
                <span class="ops-eyebrow">The Workly advantage</span>
                <h1>Great support.<br><span>Better organized.</span></h1>
                <p>Meet OPS Workly, the workspace that helps your virtual assistant keep projects moving, communication clear and your business one step ahead.</p>
                <div class="ops-hero-actions">
                    <a class="ops-btn" href="/find-va">Find your VA <span aria-hidden="true">→</span></a>
                    <a class="ops-btn ops-btn--light" href="#ops-platform">Explore the platform</a>
                </div>
                <div class="ops-proof">
                    <span><i class="ops-check">✓</i> Clear task ownership</span>
                    <span><i class="ops-check">✓</i> Visible progress</span>
                    <span><i class="ops-check">✓</i> Transparent updates</span>
                </div>
            </div>
            <div class="ops-hero-visual">
                <img src="<?= htmlspecialchars($opsScreenshot, ENT_QUOTES, 'UTF-8') ?>" alt="Workly OPS weekly task organizer dashboard showing task stages and project progress">
                <div class="ops-float ops-float--one"><span class="ops-float-icon">✓</span><span>Work in progress<small>Tasks stay on track</small></span></div>
                <div class="ops-float ops-float--two"><span class="ops-float-icon">↗</span><span>One shared workspace<small>Your VA and projects, connected</small></span></div>
            </div>
        </div>
    </section>

    <section class="ops-intro" id="ops-platform">
        <div class="ops-container ops-intro-grid">
            <div class="ops-intro-copy">
                <span class="ops-eyebrow">Meet OPS Workly</span>
                <h2>More than a task manager. A smarter way to work together.</h2>
                <p>OPS is the operations workspace that supports the day-to-day work between your business and your Workly virtual assistant. It brings tasks, clients, schedules and communication into a more organized workflow.</p>
                <p>Your VA spends less time switching between scattered tools and chasing information, and more time focused on the work that helps your business move forward.</p>
                <div class="ops-intro-note">
                    <span class="ops-note-icon">✦</span>
                    <div><b>Built around your VA's workflow</b><p>OPS gives your assistant a shared place to organize responsibilities and keep you informed as work progresses.</p></div>
                </div>
            </div>
            <div class="ops-mini-board" aria-label="Illustration of a task workflow">
                <div class="ops-mini-top"><b>Weekly task overview</b><span>● Workspace active</span></div>
                <div class="ops-mini-columns">
                    <div class="ops-mini-col"><strong>To do</strong><div class="ops-mini-card"><i></i><b>Prepare campaign brief</b><small>Marketing · High priority</small></div><div class="ops-mini-card"><i></i><b>Review new requests</b><small>Operations</small></div></div>
                    <div class="ops-mini-col"><strong>In progress</strong><div class="ops-mini-card"><i></i><b>Update client records</b><small>68% complete</small></div><div class="ops-mini-card"><i></i><b>Weekly report</b><small>Due today</small></div></div>
                    <div class="ops-mini-col"><strong>Completed</strong><div class="ops-mini-card"><i></i><b>Inbox organization</b><small>Delivered</small></div></div>
                </div>
            </div>
        </div>
    </section>

    <section class="ops-benefits">
        <div class="ops-container">
            <div class="ops-heading">
                <span class="ops-eyebrow">Everything connected</span>
                <h2>The tools your VA needs, in one workspace.</h2>
                <p>OPS brings essential operational tools together so your assistant can stay organized and your business can stay informed.</p>
            </div>
            <div class="ops-feature-grid">
                <article class="ops-feature"><span class="ops-feature-icon">▤</span><h3>Task & deliverable management</h3><p>Organize work by stage, set priorities and due dates, track subtasks and follow each deliverable through completion.</p></article>
                <article class="ops-feature"><span class="ops-feature-icon">◷</span><h3>Calendar & planning</h3><p>Keep schedules, important dates and work commitments visible to help your VA plan the week.</p></article>
                <article class="ops-feature"><span class="ops-feature-icon">◎</span><h3>Client workspace</h3><p>Keep client information and assigned work structured, making responsibilities easier to follow.</p></article>
                <article class="ops-feature"><span class="ops-feature-icon">✉</span><h3>Email Hub</h3><p>Bring email communication into the workflow so relevant conversations are easier to access and manage.</p></article>
                <article class="ops-feature"><span class="ops-feature-icon">▧</span><h3>Knowledge base</h3><p>Keep useful instructions and reference information available, reducing repeated questions and lost context.</p></article>
                <article class="ops-feature"><span class="ops-feature-icon">✧</span><h3>People & collaboration</h3><p>Support coordination with team visibility, comments, leave information and shared working context.</p></article>
            </div>
        </div>
    </section>

    <section class="ops-showcase">
        <div class="ops-container ops-showcase-grid">
            <div class="ops-showcase-copy">
                <span class="ops-eyebrow">Desktop workspace</span>
                <h2>A clear view of what's happening across your work.</h2>
                <p>The desktop workspace gives your VA room to organize tasks, review priorities and manage several deliverables at once. Work is easier to follow because every item has a stage and a next step.</p>
                <ul class="ops-list">
                    <li><i class="ops-check">✓</i><span>Track work from backlog to completion.</span></li>
                    <li><i class="ops-check">✓</i><span>Identify priorities, due dates and overdue items.</span></li>
                    <li><i class="ops-check">✓</i><span>Keep client work and responsibilities organized.</span></li>
                    <li><i class="ops-check">✓</i><span>Follow progress without relying on scattered updates.</span></li>
                </ul>
            </div>
            <div class="ops-screen">
                <img src="<?= htmlspecialchars($opsScreenshot, ENT_QUOTES, 'UTF-8') ?>" alt="Desktop view of the Workly OPS task organizer">
                <div class="ops-screen-caption"><b>Weekly Task Organizer</b><span>Desktop workspace</span></div>
            </div>
        </div>
    </section>

    <section class="ops-showcase ops-showcase--tint">
        <div class="ops-container ops-showcase-grid ops-showcase-grid--reverse">
            <div class="ops-mobile-stage">
                <div class="ops-mobile-bubble">Stay up to date<small>Check priorities and progress wherever you are.</small></div>
                <div class="ops-phone" aria-label="Illustrative mobile layout of a Workly OPS dashboard">
                    <div class="ops-phone-screen">
                        <div class="ops-phone-status"><span>9:41</span><span>● ● ●</span></div>
                        <h4>Good morning</h4><p>Your workspace at a glance</p>
                        <div class="ops-phone-summary">
                            <div class="ops-phone-stat"><small>Open tasks</small><b>08</b></div>
                            <div class="ops-phone-stat"><small>Completed</small><b>12</b></div>
                        </div>
                        <div class="ops-phone-task"><div class="ops-phone-task-top"><span>HIGH PRIORITY</span><span>Today</span></div><strong>Review campaign assets</strong><small>Marketing · Client project</small><div class="ops-progress"><span></span></div></div>
                        <div class="ops-phone-task"><div class="ops-phone-task-top"><span>IN PROGRESS</span><span>Nov 24</span></div><strong>Prepare weekly update</strong><small>Operations · Deliverable</small><div class="ops-progress"><span style="width:45%"></span></div></div>
                        <div class="ops-phone-task"><div class="ops-phone-task-top"><span>UP NEXT</span><span>Nov 25</span></div><strong>Organize client inbox</strong><small>Administration</small></div>
                        <div class="ops-phone-nav"><b>Overview</b><span>Tasks</span><span>Calendar</span><span>Profile</span></div>
                    </div>
                </div>
                <div class="ops-mobile-bubble ops-mobile-bubble--bottom">A more flexible workflow<small>Your VA can keep work organized beyond the desk.</small></div>
            </div>
            <div class="ops-showcase-copy">
                <span class="ops-eyebrow">Mobile-friendly workflow</span>
                <h2>Keep the important things close, wherever work takes you.</h2>
                <p>OPS is designed around a connected workflow. The mobile presentation makes it easy to understand how key information can be surfaced in a compact view, while your VA continues managing the details in the workspace.</p>
                <ul class="ops-list">
                    <li><i class="ops-check">✓</i><span>See priorities and upcoming work at a glance.</span></li>
                    <li><i class="ops-check">✓</i><span>Review task status without opening a full desktop board.</span></li>
                    <li><i class="ops-check">✓</i><span>Stay connected to the workflow while away from your desk.</span></li>
                </ul>
                <p style="margin-top:18px;font-size:11px;">Mobile screen shown as a conceptual layout. Replace it with a real OPS mobile capture when available.</p>
            </div>
        </div>
    </section>

    <section class="ops-transparency">
        <div class="ops-container">
            <div class="ops-heading">
                <span class="ops-eyebrow">Visibility builds trust</span>
                <h2>Know what's moving forward. And what's next.</h2>
                <p>A good working relationship needs more than completed tasks. It needs shared context, clear communication and consistent updates.</p>
            </div>
            <div class="ops-transparency-grid">
                <article class="ops-transparency-card"><span>01</span><h3>Progress you can follow</h3><p>Task stages, due dates and deliverables help make ongoing work easier to understand.</p></article>
                <article class="ops-transparency-card"><span>02</span><h3>Communication in context</h3><p>Comments, email workflows and shared information help reduce disconnected conversations.</p></article>
                <article class="ops-transparency-card"><span>03</span><h3>More structured reporting</h3><p>Calendar and reporting tools support clearer updates about activity, priorities and performance.</p></article>
            </div>
        </div>
    </section>

    <section class="ops-showcase">
        <div class="ops-container ops-showcase-grid">
            <div class="ops-showcase-copy">
                <span class="ops-eyebrow">A better experience for your business</span>
                <h2>Less time coordinating. More time moving forward.</h2>
                <p>OPS helps create a consistent operating rhythm between you and your VA. Instead of wondering what is being handled, you have a clearer way to understand the work and stay aligned on priorities.</p>
                <ul class="ops-list">
                    <li><i class="ops-check">✓</i><span><b>Organization:</b> responsibilities and deliverables have a shared place.</span></li>
                    <li><i class="ops-check">✓</i><span><b>Productivity:</b> your VA can spend more time executing and less time searching for context.</span></li>
                    <li><i class="ops-check">✓</i><span><b>Transparency:</b> progress and communication become easier to follow.</span></li>
                    <li><i class="ops-check">✓</i><span><b>Consistency:</b> a repeatable workflow helps keep work moving.</span></li>
                </ul>
            </div>
            <div class="ops-mini-board" style="background:linear-gradient(145deg,#fbf6ff,#f1fff9);">
                <div class="ops-mini-top"><b>Business workflow snapshot</b><span>● Organized</span></div>
                <div class="ops-mini-columns">
                    <div class="ops-mini-col"><strong>Plan</strong><div class="ops-mini-card"><i></i><b>Set weekly priorities</b><small>Clear direction</small></div></div>
                    <div class="ops-mini-col"><strong>Execute</strong><div class="ops-mini-card"><i></i><b>Manage deliverables</b><small>Visible progress</small></div></div>
                    <div class="ops-mini-col"><strong>Report</strong><div class="ops-mini-card"><i></i><b>Share updates</b><small>Aligned decisions</small></div></div>
                </div>
            </div>
        </div>
    </section>

    <section class="ops-cta">
        <div class="ops-container ops-cta-inner">
            <div><h2>Give your business the support it deserves.</h2><p>Work with a dedicated virtual assistant backed by a more organized way to get things done.</p></div>
            <a class="ops-btn" href="/find-va">Find your virtual assistant <span aria-hidden="true">→</span></a>
        </div>
    </section>
</main>


<?php require_once dirname(__DIR__) . '/includes/footer.php'; ?>