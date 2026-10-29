<?php
/**
 * Workly - Home Landing Page
 * File: /php/index.php
 */
$currentPage = "home";
$pageTitle = "Workly – Elite Bilingual Virtual Assistant Talent Platform";
$pageDescription = "Hire vetted, top 1% bilingual virtual assistants for IT, Marketing, Legal, Insurance, Healthcare, Operations, and Real Estate.";

require_once dirname(__DIR__) . '/includes/header.php';

$featuredList = array_filter($virtualAssistants, function($v) {
    return !empty($v['featured']);
});
?>

<!-- Skeleton section -->
    <div id="page-skeleton" aria-hidden="true">
        <div class="skeleton-block skeleton-heading"></div>
        <div class="skeleton-block skeleton-line"></div>
        <div class="skeleton-block skeleton-line"></div>
        <div class="skeleton-block skeleton-section"></div>
    </div>


<!-- Hero Section -->
<section class="hero-section">
  <div class="hero-bg-glow"></div>
  <div class="site-container hero-grid">
    <div class="hero-content">
      <div class="kicker-badge">
        <span>Your next hire doesn't need another desk</span>
      </div>
      <h1 class="hero-title">
        Scale Your Business With Dedicated <span class="gradient-text">Bilingual Virtual Assistants</span>
      </h1>
      <p class="hero-subtext">
        Hire handpicked, English-fluent professionals trained across IT, Marketing, Legal, Healthcare, Insurance, and Operations. Reclaim 20+ executive hours a week while reducing staffing overhead by up to 70%.
      </p>

      <div class="hero-actions">
        <a href="#calendly-section" class="btn btn-primary btn-large">Schedule Discovery Call</a>
        <a href="find-va" class="btn btn-secondary btn-large">Browse All Verified VAs</a>
      </div>

      <div class="hero-metrics-strip">
        <div class="metric-item">
          <strong>48 Hours</strong>
          <span>Average Placement</span>
        </div>
        <div class="metric-item">
          <strong>100% Bilingual</strong>
          <span>Native English & Spanish</span>
        </div>
        <div class="metric-item">
          <strong>Up to 70%</strong>
          <span>Payroll Cost Savings</span>
        </div>
      </div>
    </div>

    <div class="hero-visual-card" id="remove-left">
      <div class="hero-image-wrapper" id="remove-bottom">
        <img src="assets/images/hero_remote_workspace_1793194428011.jpg" alt="Workly Remote Workspace" class="hero-img">
        <div class="hero-image-overlay">
          <span class="status-live">Synchronous US Timezones (EST, CST, PST)</span>
          <p>Equipped with high-speed fiber, noise-canceling headsets, and signed NDAs.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- 8 Industry Verticals Bento Section -->
<section class="section-padding bg-light">
  <div class="site-container">
    <div class="section-header text-center">
      <span class="section-kicker">Specialized Expertise</span>
      <h2 class="section-title">Virtual Assistants Trained for Your Exact Industry</h2>
      <p class="section-subtitle">
        Eliminate the learning curve. Our talent arrives pre-trained on the specialized software and terminology of your vertical.
      </p>
    </div>

    <div class="categories-grid">
      <a href="find-va?cat=IT" class="cat-card">
        <span class="cat-chip">DevOps & Cloud</span>
        <h3>IT & Cloud Support</h3>
        <p>AWS/GCP, Docker, CI/CD triage, and fast employee access provisioning.</p>
        <span class="cat-link">View IT Assistants →</span>
      </a>

      <a href="find-va?cat=Marketing" class="cat-card">
        <span class="cat-chip">Meta Ads & SEO</span>
        <h3>Growth Marketing</h3>
        <p>Social media content, HubSpot nurture sequences, and paid ad monitoring.</p>
        <span class="cat-link">View Marketing VAs →</span>
      </a>

      <a href="find-va?cat=Legal" class="cat-card">
        <span class="cat-chip">Paralegal & Clio</span>
        <h3>Legal Operations</h3>
        <p>Contract redlining, litigation calendaring, NDA intake, and discovery Bates stamping.</p>
        <span class="cat-link">View Legal VAs →</span>
      </a>

      <a href="find-va?cat=Insurance" class="cat-card">
        <span class="cat-chip">Acord & COI</span>
        <h3>Insurance Claims & Policy</h3>
        <p>Certificate of Insurance generation in 30 minutes, policy change endorsements.</p>
        <span class="cat-link">View Insurance VAs →</span>
      </a>

      <a href="find-va?cat=Healthcare" class="cat-card">
        <span class="cat-chip">HIPAA & EHR</span>
        <h3>Healthcare & Billing</h3>
        <p>Patient appointment scheduling, SimplePractice, Kareo billing, and prior auths.</p>
        <span class="cat-link">View Health VAs →</span>
      </a>

      <a href="find-va?cat=Administrative" class="cat-card">
        <span class="cat-chip">Inbox Zero & Travel</span>
        <h3>Executive Administrative</h3>
        <p>C-level calendar triage, executive travel logistics, and weekly standup prep.</p>
        <span class="cat-link">View Executive VAs →</span>
      </a>

      <a href="find-va?cat=Management" class="cat-card">
        <span class="cat-chip">Scrum & Jira</span>
        <h3>Agile Project Management</h3>
        <p>Sprint backlog grooming, team velocity tracking, and cross-functional sync.</p>
        <span class="cat-link">View Project VAs →</span>
      </a>

      <a href="find-va?cat=Real+Estate" class="cat-card">
        <span class="cat-chip">MLS & Escrow</span>
        <h3>Real Estate Coordination</h3>
        <p>Contract-to-close milestone tracking, buyer disclosures, and Follow Up Boss CRM.</p>
        <span class="cat-link">View Real Estate VAs →</span>
      </a>
    </div>
  </div>
</section>

<!-- Featured Virtual Assistants Spotlight -->
<section class="section-padding">
  <div class="site-container">
    <div class="section-split-header">
      <div>
        <span class="section-kicker">Verified Talent</span>
        <h2 class="section-title">Featured Virtual Assistants</h2>
        <p class="section-subtitle">
          Review self-recorded video presentations, hourly rates, and client reviews.
        </p>
      </div>
      <a href="find-va" class="btn btn-secondary">Browse All VAs →</a>
    </div>

    <div class="va-cards-grid">
      <?php foreach ($featuredList as $va): ?>
        <div class="va-card">
          <div class="va-card-header">
            <img src="<?= htmlspecialchars($va['avatar'], ENT_QUOTES, 'UTF-8') ?>" alt="<?= htmlspecialchars($va['name'], ENT_QUOTES, 'UTF-8') ?>" class="va-card-avatar">
            <div class="va-card-title-group">
              <div class="va-card-name-row">
                <h3 class="va-card-name"><?= htmlspecialchars($va['name'], ENT_QUOTES, 'UTF-8') ?></h3>
                <span class="badge-rating">★ <?= htmlspecialchars($va['rating'], ENT_QUOTES, 'UTF-8') ?></span>
              </div>
              <p class="va-card-role"><?= htmlspecialchars($va['role'], ENT_QUOTES, 'UTF-8') ?></p>
              <div class="va-card-meta">
                <span><?= htmlspecialchars($va['category'], ENT_QUOTES, 'UTF-8') ?></span>
                <span class="dot">·</span>
                <strong>$<?= htmlspecialchars($va['hourlyRate'], ENT_QUOTES, 'UTF-8') ?>/hr</strong>
              </div>
            </div>
          </div>

          <p class="va-card-bio"><?= htmlspecialchars($va['tagline'], ENT_QUOTES, 'UTF-8') ?></p>

          <div class="va-card-specs">
            <div class="spec-row">
              <span>Availability:</span>
              <strong><?= htmlspecialchars($va['availability'], ENT_QUOTES, 'UTF-8') ?> (<?= htmlspecialchars($va['hoursPerWeek'], ENT_QUOTES, 'UTF-8') ?>h/wk)</strong>
            </div>
            <div class="spec-row">
              <span>Languages:</span>
              <strong><?= htmlspecialchars(implode(', ', $va['languages']), ENT_QUOTES, 'UTF-8') ?></strong>
            </div>
          </div>

          <div class="va-card-tools">
            <?php foreach (array_slice($va['tools'], 0, 4) as $tool): ?>
              <span class="tool-tag"><?= htmlspecialchars($tool, ENT_QUOTES, 'UTF-8') ?></span>
            <?php endforeach; ?>
          </div>

          <div class="va-card-actions">
            <a href="va-profile?id=<?= urlencode($va['id']) ?>" class="btn btn-outline btn-small">Profile & Video</a>
            <a href="#calendly-section" class="btn btn-primary btn-small">Hire <?= htmlspecialchars(explode(' ', $va['name'])[0], ENT_QUOTES, 'UTF-8') ?></a>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- How It Works Section -->
<section id="how-it-works" class="section-padding bg-light">
  <div class="site-container">
    <div class="section-header text-center">
      <span class="section-kicker">Simple 3-Step Process</span>
      <h2 class="section-title">How Workly Connects You With Top Talent</h2>
      <p class="section-subtitle">
        Zero recruitment headaches. Zero payroll bureaucracy. Here is how we get your assistant working within 48 hours.
      </p>
    </div>

    <div class="steps-grid">
      <div class="step-card">
        <span class="step-num">01.</span>
        <h3>30-Min Discovery Session</h3>
        <p>Book a calendar consultation below. We dissect your operational bottlenecks, required software stack, and ideal timezone.</p>
      </div>

      <div class="step-card">
        <span class="step-num">02.</span>
        <h3>Review Candidate Videos</h3>
        <p>We deliver 2–3 pre-vetted candidate portfolios with recorded video introductions. Conduct a 20-minute video chemistry interview.</p>
      </div>

      <div class="step-card">
        <span class="step-num">03.</span>
        <h3>Guided Onboarding & Scale</h3>
        <p>We provide standard operating procedure (SOP) playbooks, password delegation vaults, and ongoing client success oversight.</p>
      </div>
    </div>
  </div>
</section>

<!-- Calendly Integration Section -->
<section id="calendly-section" class="calendly-section">
  <div class="site-container">
    <div class="calendly-header text-center">
      <span class="badge-calendly">Free 30-Minute Consultation</span>
      <h2 class="calendly-title">Schedule Your Discovery Meeting</h2>
      <p class="calendly-subtitle">
        Select a convenient time slot below on Calendly. We will prepare candidate matches and present customized staffing options.
      </p>
    </div>

    <!-- CALENDLY HTML AS SPECIFIED BY USER -->
    <?php require_once dirname(__DIR__) . '/includes/calendly-widget.php'; ?>
  </div>
</section>

<!-- FAQs Section -->
<section id="faqs" class="section-padding">
  <div class="site-container faq-container">
    <div class="section-header text-center">
      <span class="section-kicker">Transparent Answers</span>
      <h2 class="section-title">Frequently Asked Questions</h2>
      <p class="section-subtitle">Everything you need to know about working with Workly Virtual Assistants.</p>
    </div>

    <div class="faq-accordion">
      <details class="faq-item" open>
        <summary class="faq-question">How fast can I start working with a Workly Virtual Assistant?</summary>
        <div class="faq-answer">
          Our placement process is rapid. Most clients review curated candidate profiles within 24 hours, conduct a 20-minute discovery video interview, and onboard their dedicated assistant within 48 to 72 hours.
        </div>
      </details>

      <details class="faq-item">
        <summary class="faq-question">Are all Workly Virtual Assistants bilingual?</summary>
        <div class="faq-answer">
          Yes! All Workly talent operates with fluent or native-level English (C1/C2 proficiency) and native or fluent Spanish. They undergo rigorous verbal and written assessments to guarantee seamless communication with your team and clients.
        </div>
      </details>

      <details class="faq-item">
        <summary class="faq-question">How does Workly ensure data privacy, confidentiality, and cybersecurity?</summary>
        <div class="faq-answer">
          Every Virtual Assistant signs strict Non-Disclosure Agreements (NDAs) prior to onboarding. For sensitive domains (Healthcare, Legal, Financial), we enforce encrypted workstations, hardware-backed 2FA, password managers (1Password/LastPass), and HIPAA/GDPR-compliant workflows.
        </div>
      </details>

      <details class="faq-item">
        <summary class="faq-question">What is the commitment? Can I scale hours up or down?</summary>
        <div class="faq-answer">
          Workly offers full flexibility. You can choose Part-time (20–25 hours/week) or Full-time (40 hours/week) with simple bi-weekly or monthly billing. There are no punitive long-term lock-ins, and you can transition hours as your business needs evolve.
        </div>
      </details>

      <details class="faq-item">
        <summary class="faq-question">What happens if a candidate is not the right fit?</summary>
        <div class="faq-answer">
          We provide a 100% Risk-Free Match Guarantee. If during the first 14 days you feel the assistant is not the right chemistry or skill match, we immediately replace them at zero additional matching fee.
        </div>
      </details>

      <details class="faq-item">
        <summary class="faq-question">How do you handle payroll, benefits, and international compliance?</summary>
        <div class="faq-answer">
          Workly handles all international contracting, global payroll, tax compliance, and performance management. You receive one straightforward invoice from us with zero international wire friction.
        </div>
      </details>
    </div>
  </div>
</section>

<!-- Final CTA Banner -->
<section class="cta-banner-section">
  <div class="site-container text-center">
    <h2>Ready to Build Your Dedicated Remote Team?</h2>
    <p>Join hundreds of CEOs, agency owners, and medical practices saving 20+ hours each week with Workly.</p>
    <div class="cta-banner-actions">
      <a href="#calendly-section" class="btn btn-primary btn-large">Schedule Discovery Call</a>
      <a href="find-va" class="btn btn-outline btn-large">Browse All Profiles</a>
    </div>
  </div>
</section>

<?php require_once dirname(__DIR__) . '/includes/footer.php'; ?>