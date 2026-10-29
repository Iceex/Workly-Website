/**
 * Workly - Directory Live Filter Script
 * File: /php/assets/js/filter.js
 */

document.addEventListener('DOMContentLoaded', function () {
  const searchInput = document.getElementById('searchInput');
  const availTabs = document.querySelectorAll('#availTabs .seg-btn');
  const categoryChips = document.querySelectorAll('#categoryChips .role-chip');
  const vaCards = document.querySelectorAll('.catalog-va-item');
  const visibleCountEl = document.getElementById('visibleCount');
  const noResultsBox = document.getElementById('noResultsBox');
  const resetBtn = document.getElementById('resetFiltersBtn');

  let activeAvailability = 'All';
  let activeCategory = 'All';
  let searchQuery = '';

  // Check URL parameters for initial category or availability
  const urlParams = new URLSearchParams(window.location.search);
  const paramCat = urlParams.get('cat');
  const paramAvail = urlParams.get('avail');
  const availContainer = document.getElementById('availTabs');
  const availIndicator = availContainer?.querySelector('.seg-indicator');

  function updateAvailabilityIndicator(animate = true) {
    const activeTab = availContainer?.querySelector('.seg-btn.active');

    if (!activeTab || !availIndicator) return;

    if (!animate) {
      availIndicator.style.transition = 'none';
    }

    availIndicator.style.left = `${activeTab.offsetLeft}px`;
    availIndicator.style.width = `${activeTab.offsetWidth}px`;

    if (!animate) {
      availIndicator.offsetHeight;
      availIndicator.style.removeProperty('transition');
    }
  }


  if (paramCat) {
    activeCategory = paramCat;
    categoryChips.forEach((chip) => {
      chip.classList.toggle('active', chip.getAttribute('data-cat') === paramCat);
    });
  }

  if (paramAvail) {
    activeAvailability = paramAvail;
    availTabs.forEach((tab) => {
      tab.classList.toggle('active', tab.getAttribute('data-avail') === paramAvail);
    });
  }

  function applyFilters() {
    let visibleCount = 0;
    const query = searchQuery.toLowerCase().trim();

    vaCards.forEach((card) => {
      const cardCat = card.getAttribute('data-category');
      const cardSec = card.getAttribute('data-secondary') || '';
      const cardAvail = card.getAttribute('data-availability');
      const cardName = card.getAttribute('data-name') || '';
      const cardRole = card.getAttribute('data-role') || '';
      const cardTools = card.getAttribute('data-tools') || '';

      // Check category
      let matchesCat = activeCategory === 'All' || cardCat === activeCategory || cardSec.includes(activeCategory);

      // Check availability
      let matchesAvail = activeAvailability === 'All' || cardAvail === activeAvailability;

      // Check search query
      let matchesSearch = true;
      if (query !== '') {
        matchesSearch =
          cardName.includes(query) ||
          cardRole.includes(query) ||
          cardCat.toLowerCase().includes(query) ||
          cardTools.includes(query);
      }

      if (matchesCat && matchesAvail && matchesSearch) {
        card.style.display = 'flex';
        visibleCount++;
      } else {
        card.style.display = 'none';
      }
    });

    if (visibleCountEl) visibleCountEl.textContent = visibleCount;

    if (noResultsBox) {
      noResultsBox.style.display = visibleCount === 0 ? 'flex' : 'none';
    }
  }

  // Search Input Event
  if (searchInput) {
    searchInput.addEventListener('input', function (e) {
      searchQuery = e.target.value;
      applyFilters();
    });
  }

  // Availability Tabs Event
  availTabs.forEach((tab) => {
    tab.addEventListener('click', function () {
      availTabs.forEach((t) => t.classList.remove('active'));
      this.classList.add('active');

      activeAvailability = this.getAttribute('data-avail');

      updateAvailabilityIndicator();
      applyFilters();
    });
  });

  // Category Chips Event
  categoryChips.forEach((chip) => {
    chip.addEventListener('click', function () {
      categoryChips.forEach((c) => c.classList.remove('active'));
      this.classList.add('active');
      activeCategory = this.getAttribute('data-cat');
      applyFilters();
    });
  });

  // Reset Button Event
  if (resetBtn) {
    resetBtn.addEventListener('click', function () {
      if (searchInput) searchInput.value = '';
      searchQuery = '';
      activeAvailability = 'All';
      activeCategory = 'All';

      availTabs.forEach((t) => t.classList.toggle('active', t.getAttribute('data-avail') === 'All'));
      categoryChips.forEach((c) => c.classList.toggle('active', c.getAttribute('data-cat') === 'All'));

      applyFilters();
    });
  }

  // Initial Run
  applyFilters();
});
