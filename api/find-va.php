<?php
/**
 * Workly - Directory & Sticky Filter Search
 * File: /php/find-va.php
 */
$currentPage = "find-va";
$pageTitle = "Find a Virtual Assistant – Workly Directory";
$pageDescription = "Search and filter our verified bilingual virtual assistants by availability (Full-time or Part-time) and industry domain (IT, Marketing, Legal, Healthcare, Real Estate, Insurance, and Operations).";

require_once dirname(__DIR__) . '/includes/header.php';

$requestedCat = $_GET['cat'] ?? 'All';
$requestedAvail = $_GET['avail'] ?? 'All';
?>

<div class="page-header-banner">
  <div class="site-container">
    <span class="kicker-badge">Curated Talent Roster · 10 Verified Profiles</span>
    <h1 class="page-title">Find Your Ideal Virtual Assistant</h1>
    <p class="page-subtitle">
      Filter by availability, industry domain, or specific operational skills. Review self-recorded video presentations and client reviews before scheduling an interview.
    </p>
  </div>
</div>

<!-- Main Catalog Container with STICKY FILTER -->
<div class="catalog-container">
  <!-- Sticky Filter Bar: stuck to top of this container and ends with container -->
  <div class="sticky-filter-wrapper" id="stickyFilter">
    <div class="site-container">
      <div class="filter-top-row">
        <!-- Search input -->
        <div class="filter-search-box">
          <input
            type="text"
            id="searchInput"
            placeholder="Search by skill, name, or tool (e.g. Clio, AWS, SEO)..."
            class="input-search"
          >
        </div>

        <!-- Availability Filter -->
        <div class="filter-segmented-control" id="availTabs">
          <span class="seg-indicator" aria-hidden="true"></span>
          <button class="seg-btn active" data-avail="All">All Hours</button>
          <button class="seg-btn" data-avail="Full-time">Full-time (40h)</button>
          <button class="seg-btn" data-avail="Part-time">Part-time (20-25h)</button>
        </div>

        <!-- Results Counter -->
        <div class="filter-counter">
          Showing <strong id="visibleCount"><?= count($virtualAssistants) ?></strong> of <?= count($virtualAssistants) ?> assistants
        </div>
      </div>

      <!-- Category Filter Pills -->
      <div class="filter-roles-scroller" id="categoryChips">
        <span class="roles-label">Roles:</span>
        <button class="role-chip active" data-cat="All">All</button>
        <button class="role-chip" data-cat="IT">IT & Cloud</button>
        <button class="role-chip" data-cat="Marketing">Marketing</button>
        <button class="role-chip" data-cat="Legal">Legal</button>
        <button class="role-chip" data-cat="Insurance">Insurance</button>
        <button class="role-chip" data-cat="Healthcare">Healthcare</button>
        <button class="role-chip" data-cat="Administrative">Administrative</button>
        <button class="role-chip" data-cat="Management">Management</button>
        <button class="role-chip" data-cat="Real Estate">Real Estate</button>
      </div>
    </div>
  </div>

  <!-- Cards Grid -->
  <div class="site-container catalog-cards-padding">
    <div class="va-cards-grid" id="vaCardsContainer">
      <?php foreach ($virtualAssistants as $va): ?>
        <div
          class="va-card catalog-va-item"
          data-category="<?= htmlspecialchars($va['category'], ENT_QUOTES, 'UTF-8') ?>"
          data-secondary="<?= htmlspecialchars(implode(',', $va['secondaryRoles']), ENT_QUOTES, 'UTF-8') ?>"
          data-availability="<?= htmlspecialchars($va['availability'], ENT_QUOTES, 'UTF-8') ?>"
          data-name="<?= strtolower(htmlspecialchars($va['name'], ENT_QUOTES, 'UTF-8')) ?>"
          data-role="<?= strtolower(htmlspecialchars($va['role'], ENT_QUOTES, 'UTF-8')) ?>"
          data-tools="<?= strtolower(htmlspecialchars(implode(' ', $va['tools']), ENT_QUOTES, 'UTF-8')) ?>"
        >
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
            <a href="./#calendly-section" class="btn btn-primary btn-small">Schedule</a>
          </div>
        </div>
      <?php endforeach; ?>
    </div>

    <!-- Empty State -->
    <div id="noResultsBox" class="no-results-box" style="display: none;">
      <h3>No Virtual Assistants Found</h3>
      <p>No assistants match the selected criteria. Try resetting filters.</p>
      <button id="resetFiltersBtn" class="btn btn-primary">Reset Filters</button>
    </div>
  </div>
</div>

<script src="assets/js/filter.js"></script>
<?php require_once dirname(__DIR__) . '/includes/footer.php'; ?>