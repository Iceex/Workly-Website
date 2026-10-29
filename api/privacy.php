<?php
/**
 * Workly - Privacy Policy & Cybersecurity Standards
 * File: /php/privacy.php
 */
$currentPage = "privacy";
$pageTitle = "Privacy Policy & Data Security – Workly";
$pageDescription = "Workly data protection protocols, GDPR/CCPA compliance, and cybersecurity measures protecting client operations.";

require_once dirname(__DIR__) . '/includes/header.php';
?>

<!-- Skeleton section -->
    <div id="page-skeleton" aria-hidden="true">
        <div class="skeleton-block skeleton-heading"></div>
        <div class="skeleton-block skeleton-line"></div>
        <div class="skeleton-block skeleton-line"></div>
        <div class="skeleton-block skeleton-section"></div>
    </div>
<div class="page-header-banner">
  <div class="site-container">
    <span class="kicker-badge">Cybersecurity & Data Privacy</span>
    <h1 class="page-title">Privacy Policy & Security Standards</h1>
    <p class="page-subtitle">Last updated: October 28, 2026 · Compliant with GDPR, CCPA, and HIPAA Security Standards.</p>
  </div>
</div>

<div class="site-container legal-page-container">
  <div class="legal-card">
    <div class="security-callout-box">
      <strong>Zero Data Selling Commitment:</strong>
      <p>Workly never sells, rents, or monetizes client business data, customer lists, or proprietary files. All information shared is governed by enterprise encryption and zero-trust protocols.</p>
    </div>

    <section>
      <h2>1. Information We Collect</h2>
      <p>We collect information you provide directly when filling out discovery forms, booking via Calendly, or communicating with our talent coordinators:</p>
      <ul>
        <li><strong>Contact Information:</strong> Full name, corporate email address, phone number, and company name.</li>
        <li><strong>Staffing Requirements:</strong> Desired industry domain, required weekly hours, and software stack prerequisites.</li>
        <li><strong>Billing Information:</strong> Processed directly via PCI-DSS Level 1 certified processors (Stripe). Workly never stores raw credit card numbers.</li>
      </ul>
    </section>

    <section>
      <h2>2. Cybersecurity Protocols</h2>
      <p>Workly implements rigorous technical and administrative safeguards:</p>
      <ul>
        <li><strong>256-Bit TLS Encryption:</strong> All web requests and API transmissions are encrypted using modern Transport Layer Security.</li>
        <li><strong>Password Delegation:</strong> We mandate password sharing via 1Password or LastPass vaults without revealing plaintext secrets.</li>
      </ul>
    </section>

    <section>
      <h2>3. HIPAA Compliance for Healthcare Clients</h2>
      <p>
        For clients in the healthcare vertical, Workly executes Business Associate Agreements (BAAs). Placed healthcare assistants complete annual HIPAA certification, operate on dedicated secure profiles, and maintain strict data privacy.
      </p>
    </section>

    <section>
      <h2>4. Google Analytics & Telemetry Sovereignty</h2>
      <p>
        We provide a reserved slot in the website header for your designated Google Analytics (gtag.js) script, ensuring you retain total sovereignty over user analytics.
      </p>
    </section>

    <section>
      <h2>5. Contact Our Privacy Team</h2>
      <p>For data inquiries or deletion requests, contact privacy@workly.staff.</p>
    </section>
  </div>
</div>

<?php require_once dirname(__DIR__) . '/includes/footer.php'; ?>