/**
 * Workly - Main Interactive Script
 * File: /php/assets/js/main.js
 */

document.addEventListener('DOMContentLoaded', function () {
  // 1. Aesthetic Left-Side Mobile Drawer Toggle with Backdrop Blur
  const mobileBtn = document.getElementById('mobileMenuBtn');
  const drawerCloseBtn = document.getElementById('drawerCloseBtn');
  const drawerOverlay = document.getElementById('mobileDrawerOverlay');
  const sideDrawer = document.getElementById('mobileSideDrawer');

  function openDrawer() {
    if (!sideDrawer) return;
    document.body.classList.add('mobile-drawer-open');
    if (mobileBtn) mobileBtn.setAttribute('aria-expanded', 'true');
  }

  function closeDrawer() {
    if (!sideDrawer) return;
    document.body.classList.remove('mobile-drawer-open');
    if (mobileBtn) mobileBtn.setAttribute('aria-expanded', 'false');
  }

  if (mobileBtn) {
    mobileBtn.addEventListener('click', function (e) {
      e.stopPropagation();
      if (document.body.classList.contains('mobile-drawer-open')) {
        closeDrawer();
      } else {
        openDrawer();
      }
    });
  }

  if (drawerCloseBtn) {
    drawerCloseBtn.addEventListener('click', closeDrawer);
  }

  if (drawerOverlay) {
    drawerOverlay.addEventListener('click', closeDrawer);
  }

  // Close on Escape key
  document.addEventListener('keydown', function (e) {
    if (e.key === 'Escape' && document.body.classList.contains('mobile-drawer-open')) {
      closeDrawer();
    }
  });

  // Close drawer when any internal link is clicked
  if (sideDrawer) {
    sideDrawer.querySelectorAll('a').forEach(function (link) {
      link.addEventListener('click', function () {
        closeDrawer();
      });
    });
  }

  // 2. Smooth Scroll for anchor links with subtle easing
  document.querySelectorAll('a[href^="#"], a[href^="./#"]').forEach((anchor) => {
    anchor.addEventListener('click', function (e) {
      const rawHref = this.getAttribute('href');
      const hashIndex = rawHref.indexOf('#');
      if (hashIndex !== -1) {
        const hash = rawHref.substring(hashIndex);
        const targetElement = document.querySelector(hash);
        if (targetElement) {
          e.preventDefault();
          targetElement.scrollIntoView({
            behavior: 'smooth',
            block: 'start',
          });
          closeDrawer();
          if (history.pushState) {
            history.pushState(null, null, hash);
          }
        }
      }
    });
  });

  // 3. Viewport Scroll Reveal (Subtle entrance motion for cards and sections)
  const revealElements = document.querySelectorAll(
    '.hero-content, .hero-visual-card, .cat-card, .va-card, .step-card, .pillar-card, .legal-card, .about-cta-banner'
  );

  if ('IntersectionObserver' in window) {
    const observer = new IntersectionObserver(
      (entries) => {
        entries.forEach((entry) => {
          if (entry.isIntersecting) {
            entry.target.classList.add('revealed');
            observer.unobserve(entry.target);
          }
        });
      },
      {
        threshold: 0.1,
        rootMargin: '0px 0px -40px 0px',
      }
    );

    revealElements.forEach((el) => {
      el.classList.add('reveal-item');
      observer.observe(el);
    });
  } else {
    revealElements.forEach((el) => el.classList.add('revealed'));
  }

  // 4. Simulated Video Player Play / Pause


const video = document.querySelector('#videoViewport video');
const playBtn = document.querySelector('.video-play-btn');
const overlay = document.querySelector('.video-overlay-scrim');
const viewport = document.querySelector('#videoViewport');

if (video && playBtn && overlay && viewport) {
    const playIcon = `
        <svg viewBox="0 0 24 24" fill="currentColor" width="32" height="32">
            <path d="M8 5v14l11-7z"/>
        </svg>
    `;

    const pauseIcon = `
        <svg viewBox="0 0 24 24" fill="currentColor" width="32" height="32">
            <path d="M6 5h4v14H6zm8 0h4v14h-4z"/>
        </svg>
    `;

    const updatePlayer = () => {
        const isPlaying = !video.paused && !video.ended;

        playBtn.innerHTML = isPlaying ? pauseIcon : playIcon;

        playBtn.setAttribute(
            'aria-label',
            isPlaying ? 'Pausar video' : 'Reproducir video'
        );

        overlay.hidden = isPlaying;

        if (!isPlaying) {
            playBtn.classList.remove('is-hidden', 'is-visible');
        } else {
            playBtn.classList.add('is-hidden');
            playBtn.classList.remove('is-visible');
        }
    };

    playBtn.addEventListener('click', async () => {
        try {
            if (video.paused || video.ended) {
                if (video.ended) {
                    video.currentTime = 0;
                }

                await video.play();
            } else {
                video.pause();
            }
        } catch (error) {
            console.error('No se pudo reproducir el video:', error);
        }
    });

    video.addEventListener('play', updatePlayer);
    video.addEventListener('pause', updatePlayer);
    video.addEventListener('ended', updatePlayer);

    viewport.addEventListener('mouseenter', () => {
        if (!video.paused && !video.ended) {
            playBtn.classList.remove('is-hidden');
            playBtn.classList.add('is-visible');
        }
    });

    viewport.addEventListener('mouseleave', () => {
        if (!video.paused && !video.ended) {
            playBtn.classList.remove('is-visible');
            playBtn.classList.add('is-hidden');
        }
    });

    updatePlayer();
}


});
