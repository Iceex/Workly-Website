/**
 * Workly OPS - Interactive Motion, Multi-Waypoint Cursor Tours & Live Charts
 * File: /php/assets/js/ops.js
 */
document.addEventListener('DOMContentLoaded', function () {
  var prefersReducedMotion =
    window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches;

  /* ========================================================================
     1. VIEWPORT SCROLL REVEAL & CHART BAR ENTRANCE
     ======================================================================== */
  var revealTargets = document.querySelectorAll(
    '.ops-bento-card, .ops-wide-card, .ops-protrude-banner, .ops-interactive-panel, .ops-cta-box'
  );

  if ('IntersectionObserver' in window && !prefersReducedMotion) {
    var revealObserver = new IntersectionObserver(
      function (entries) {
        entries.forEach(function (entry) {
          if (entry.isIntersecting) {
            entry.target.classList.add('is-visible');
            revealObserver.unobserve(entry.target);
          }
        });
      },
      { threshold: 0.12, rootMargin: '0px 0px -36px 0px' }
    );

    revealTargets.forEach(function (el) {
      el.classList.add('ops-reveal');
      revealObserver.observe(el);
    });
  } else {
    revealTargets.forEach(function (el) {
      el.classList.add('is-visible');
    });
  }

  /* ========================================================================
     2. HERO SUBTLE POINTER PARALLAX FOR FLOATING CARDS (Desktop Fine Pointer)
     ======================================================================== */
  var heroBanner = document.querySelector('.ops-hero-banner');
  var heroFloaters = document.querySelectorAll('.ops-hero-stage [data-parallax]');

  if (
    heroBanner &&
    heroFloaters.length > 0 &&
    !prefersReducedMotion &&
    window.matchMedia('(pointer: fine)').matches
  ) {
    var rafId = null;
    var targetX = 0;
    var targetY = 0;

    heroBanner.addEventListener('mousemove', function (e) {
      var rect = heroBanner.getBoundingClientRect();
      targetX = (e.clientX - rect.left) / rect.width - 0.5;
      targetY = (e.clientY - rect.top) / rect.height - 0.5;

      if (!rafId) {
        rafId = requestAnimationFrame(function () {
          heroFloaters.forEach(function (el) {
            var depth = parseFloat(el.getAttribute('data-parallax') || '16');
            var tx = (targetX * depth).toFixed(1);
            var ty = (targetY * depth).toFixed(1);
            el.style.setProperty('--px', tx + 'px');
            el.style.setProperty('--py', ty + 'px');
          });
          rafId = null;
        });
      }
    });

    heroBanner.addEventListener('mouseleave', function () {
      heroFloaters.forEach(function (el) {
        el.style.setProperty('--px', '0px');
        el.style.setProperty('--py', '0px');
      });
    });
  }

  /* ========================================================================
     3. BENTO CARD: EFFORTLESS TASK STAGE SWITCHER
     ======================================================================== */
  var mgmtData = {
    all: {
      title: 'Month-End Bookkeeping',
      pct: '68%',
      bar: '68%',
      client: 'BrightPath Digital · Assigned to Ethan Brooks'
    },
    todo: {
      title: 'Fix Marketing Banner',
      pct: '40%',
      bar: '40%',
      client: 'BrightPath Digital · High priority'
    },
    progress: {
      title: 'Client CRM Retainer Audit',
      pct: '78%',
      bar: '78%',
      client: 'Northstar Consulting · Olivia Carter'
    },
    done: {
      title: 'Weekly SLA Report Export',
      pct: '100%',
      bar: '100%',
      client: 'All Client Accounts · Verified & Delivered'
    }
  };

  document.querySelectorAll('#opsMgmtFilter .ops-chip').forEach(function (btn) {
    btn.addEventListener('click', function () {
      document.querySelectorAll('#opsMgmtFilter .ops-chip').forEach(function (b) {
        b.classList.remove('active');
      });
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

  /* ========================================================================
     4. BENTO CARD: INTERACTIVE CLIENT CAPACITY TOGGLE
     ======================================================================== */
  var crmModeData = {
    retainer: {
      bpLabel: '68.0 / 100h',
      bpPct: '68%',
      nsLabel: '52.5 / 80h',
      nsPct: '65.6%',
      total: '120.5h',
      rate: '66.9%'
    },
    sla: {
      bpLabel: '93.0% On-Time',
      bpPct: '93%',
      nsLabel: '96.5% On-Time',
      nsPct: '96.5%',
      total: '2.6h Avg',
      rate: '94.8%'
    }
  };

  document.querySelectorAll('#opsCrmToggle .ops-chip').forEach(function (btn) {
    btn.addEventListener('click', function () {
      document.querySelectorAll('#opsCrmToggle .ops-chip').forEach(function (b) {
        b.classList.remove('active');
      });
      btn.classList.add('active');
      var d = crmModeData[btn.getAttribute('data-mode')] || crmModeData.retainer;
      var bpL = document.getElementById('opsBpLabel');
      var bpB = document.getElementById('opsBpBar');
      var nsL = document.getElementById('opsNsLabel');
      var nsB = document.getElementById('opsNsBar');
      var tot = document.getElementById('opsCrmTotal');
      var rte = document.getElementById('opsCrmRate');
      if (bpL) bpL.textContent = d.bpLabel;
      if (bpB) bpB.style.width = d.bpPct;
      if (nsL) nsL.textContent = d.nsLabel;
      if (nsB) nsB.style.width = d.nsPct;
      if (tot) tot.textContent = d.total;
      if (rte) rte.textContent = d.rate;
    });
  });

  /* ========================================================================
     5. MULTI-WAYPOINT SCRIPTED CURSOR 1: BENTO VA PERFORMANCE GRAPH
     Cursor moves smoothly between Ethan bar, tooltip inspection, Olivia bar,
     and 30D benchmark pill with realistic click ripples.
     ======================================================================== */
  var graphStage = document.getElementById('opsGraphStage');
  var graphCursor = document.getElementById('opsGraphCursor');
  var graphTooltip = document.getElementById('opsGraphTooltip');
  var graphTimer = null;

  if (graphStage && graphCursor && !prefersReducedMotion) {
    var graphWaypoints = [
      {
        x: '24%',
        y: '48%',
        target: '.ops-gcol--ethan',
        click: true,
        tooltip: {
          name: 'Ethan Brooks',
          role: 'Marketing',
          sla: '93.0% SLA',
          turn: '2.6h Turnaround'
        }
      },
      {
        x: '56%',
        y: '34%',
        target: '.ops-gcol--peak',
        click: false,
        tooltip: {
          name: 'Pod Velocity',
          role: '30-Day Trend',
          sla: '94.8% On-Time',
          turn: 'Peak Output'
        }
      },
      {
        x: '76%',
        y: '40%',
        target: '.ops-gcol--olivia',
        click: true,
        tooltip: {
          name: 'Olivia Carter',
          role: 'Accounting',
          sla: '96.5% SLA',
          turn: '1.8h Turnaround'
        }
      },
      {
        x: '82%',
        y: '14%',
        target: '.ops-gkpi-pill',
        click: true,
        tooltip: {
          name: 'Pod Benchmark',
          role: 'All Active VAs',
          sla: '94.8% SLA',
          turn: '2.2h Avg'
        }
      }
    ];

    var gIdx = 0;
    var runGraphStep = function () {
      var wp = graphWaypoints[gIdx];
      graphCursor.style.left = wp.x;
      graphCursor.style.top = wp.y;

      graphStage.querySelectorAll('.is-hovered').forEach(function (el) {
        el.classList.remove('is-hovered');
      });

      setTimeout(function () {
        var el = graphStage.querySelector(wp.target);
        if (el) el.classList.add('is-hovered');

        if (wp.click) {
          graphCursor.classList.add('is-clicking');
          setTimeout(function () {
            graphCursor.classList.remove('is-clicking');
          }, 320);
        }

        if (graphTooltip && wp.tooltip) {
          graphTooltip.querySelector('.tt-name').textContent = wp.tooltip.name;
          graphTooltip.querySelector('.tt-role').textContent = wp.tooltip.role;
          graphTooltip.querySelector('.tt-sla').textContent = wp.tooltip.sla;
          graphTooltip.querySelector('.tt-turn').textContent = wp.tooltip.turn;
          graphTooltip.classList.add('is-active');
        }
      }, 420);

      gIdx = (gIdx + 1) % graphWaypoints.length;
    };

    var graphObserver = new IntersectionObserver(
      function (entries) {
        entries.forEach(function (entry) {
          if (entry.isIntersecting) {
            if (!graphTimer) {
              runGraphStep();
              graphTimer = setInterval(runGraphStep, 2300);
            }
          } else if (graphTimer) {
            clearInterval(graphTimer);
            graphTimer = null;
          }
        });
      },
      { threshold: 0.25 }
    );
    graphObserver.observe(graphStage);
  }

  /* ========================================================================
     6. MULTI-WAYPOINT SCRIPTED CURSOR 2: ANALYTICS & BENCHMARK SLATE
     Cursor navigates tabs (VA Role Comparison -> Productivity Trends ->
     Kanban Completed Bar -> PTO Calendar Thu 19) and updates live readout.
     ======================================================================== */
  var slateStage = document.getElementById('opsSlateStage');
  var slateCursor = document.getElementById('opsSlateCursor');
  var slateReadout = document.getElementById('opsSlateReadout');
  var slateTimer = null;

  if (slateStage && slateCursor && !prefersReducedMotion) {
    var slateWaypoints = [
      {
        x: '22%',
        y: '22%',
        sel: '[data-slate-el="tab-roles"]',
        click: true,
        msg: 'Comparing VA Role Turnaround (2.6h avg)'
      },
      {
        x: '52%',
        y: '22%',
        sel: '[data-slate-el="tab-trends"]',
        click: true,
        msg: '30D Productivity Curve · 94.8% Pod On-Time SLA'
      },
      {
        x: '56%',
        y: '55%',
        sel: '[data-slate-el="peak-point"]',
        click: false,
        msg: 'Nov 18 Peak · 100% Deliverable Velocity'
      },
      {
        x: '80%',
        y: '74%',
        sel: '[data-slate-el="kanban-done"]',
        click: true,
        msg: 'Kanban Completed · 33.3% Verified'
      },
      {
        x: '32%',
        y: '78%',
        sel: '[data-slate-el="pto-day"]',
        click: true,
        msg: 'PTO Coverage · Ethan approved Nov 17–19'
      }
    ];

    var sIdx = 0;
    var runSlateStep = function () {
      var wp = slateWaypoints[sIdx];
      slateCursor.style.left = wp.x;
      slateCursor.style.top = wp.y;

      slateStage.querySelectorAll('.is-hovered').forEach(function (el) {
        el.classList.remove('is-hovered');
      });

      setTimeout(function () {
        var el = slateStage.querySelector(wp.sel);
        if (el) el.classList.add('is-hovered');
        if (wp.click) {
          slateCursor.classList.add('is-clicking');
          setTimeout(function () {
            slateCursor.classList.remove('is-clicking');
          }, 320);
        }
        if (slateReadout) slateReadout.textContent = wp.msg;
      }, 480);

      sIdx = (sIdx + 1) % slateWaypoints.length;
    };

    var slateObserver = new IntersectionObserver(
      function (entries) {
        entries.forEach(function (entry) {
          if (entry.isIntersecting) {
            if (!slateTimer) {
              runSlateStep();
              slateTimer = setInterval(runSlateStep, 2400);
            }
          } else if (slateTimer) {
            clearInterval(slateTimer);
            slateTimer = null;
          }
        });
      },
      { threshold: 0.2 }
    );
    slateObserver.observe(slateStage);
  }

  /* ========================================================================
     7. INTERACTIVE SUITE EXPLORER TABS & CHART TIMEFRAME SWITCHER
     ======================================================================== */
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

  // Timeframe pills (7D / 14D / 30D) inside Operations Analytics Explorer
  var timeframeMetrics = {
    '7d':  { sla: '96.2%', turn: '2.1h', comp: '88.5%', path: 'M0 44 Q 55 24, 110 26 T 210 12 T 320 8' },
    '14d': { sla: '95.1%', turn: '2.4h', comp: '82.0%', path: 'M0 48 Q 65 36, 125 22 T 225 18 T 320 10' },
    '30d': { sla: '94.8%', turn: '2.6h', comp: '91.4%', path: 'M0 52 Q 60 40, 120 14 T 230 16 T 320 6' }
  };

  document.querySelectorAll('#opsTimeframeTabs .ops-chip').forEach(function (btn) {
    btn.addEventListener('click', function () {
      document.querySelectorAll('#opsTimeframeTabs .ops-chip').forEach(function (b) {
        b.classList.remove('active');
      });
      btn.classList.add('active');
      var tf = timeframeMetrics[btn.getAttribute('data-tf')] || timeframeMetrics['30d'];
      var s = document.getElementById('opsExpSla');
      var t = document.getElementById('opsExpTurn');
      var c = document.getElementById('opsExpComp');
      var line = document.getElementById('opsExpCurve');
      if (s) s.textContent = tf.sla;
      if (t) t.textContent = tf.turn;
      if (c) c.textContent = tf.comp;
      if (line) line.setAttribute('d', tf.path);
    });
  });

  // Interactive Task Suite Progression in Explorer
  document.querySelectorAll('#opsSuiteTriggers .ops-suite-btn').forEach(function (btn) {
    btn.addEventListener('click', function () {
      var idx = btn.getAttribute('data-step');
      document.querySelectorAll('#opsSuiteTriggers .ops-suite-btn').forEach(function (b) {
        b.classList.remove('active');
      });
      btn.classList.add('active');
      [0, 1, 2].forEach(function (i) {
        var el = document.getElementById('opsSuiteTask' + i);
        if (el) el.classList.toggle('active', String(i) === idx);
      });
    });
  });

  // Interactive Meeting & PTO Day Selector
  document.querySelectorAll('#opsCalDays .ops-ic-day').forEach(function (dayBtn) {
    dayBtn.addEventListener('click', function () {
      document.querySelectorAll('#opsCalDays .ops-ic-day').forEach(function (d) {
        d.classList.remove('active');
      });
      dayBtn.classList.add('active');
      var label = document.getElementById('opsSelectedDayText');
      if (label) label.textContent = dayBtn.getAttribute('data-day');
    });
  });
});
