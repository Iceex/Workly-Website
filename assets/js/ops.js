/**
 * Workly OPS - Interactive Operations Showcase Script
 * Drives viewport reveals, sticky scroll parallax, multi-cursor team collaboration,
 * 3D desktop perspective rig, benchmark comparison, and vertical category switcher.
 * File: /php/assets/js/ops.js
 */
document.addEventListener('DOMContentLoaded', function () {
  var prefersReducedMotion =
    window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches;
  var isFinePointer =
    window.matchMedia && window.matchMedia('(pointer: fine)').matches;

  /* ========================================================================
     1. VIEWPORT SCROLL REVEAL
     ======================================================================== */
  var revealEls = document.querySelectorAll('.ops-reveal');
  if ('IntersectionObserver' in window && !prefersReducedMotion) {
    var revealObs = new IntersectionObserver(
      function (entries) {
        entries.forEach(function (entry) {
          if (entry.isIntersecting) {
            entry.target.classList.add('is-visible');
            revealObs.unobserve(entry.target);
          }
        });
      },
      { threshold: 0.1, rootMargin: '0px 0px -30px 0px' }
    );
    revealEls.forEach(function (el) {
      revealObs.observe(el);
    });
  } else {
    revealEls.forEach(function (el) {
      el.classList.add('is-visible');
    });
  }

  /* ========================================================================
     2. HERO FLOATING ELEMENTS POINTER PARALLAX
     ======================================================================== */
  var heroBanner = document.querySelector('.ops-hero-banner');
  var heroFloaters = document.querySelectorAll('.ops-hero-stage [data-parallax]');

  if (heroBanner && heroFloaters.length > 0 && !prefersReducedMotion && isFinePointer) {
    var heroRaf = null;
    var hx = 0;
    var hy = 0;

    heroBanner.addEventListener('mousemove', function (e) {
      var rect = heroBanner.getBoundingClientRect();
      hx = (e.clientX - rect.left) / rect.width - 0.5;
      hy = (e.clientY - rect.top) / rect.height - 0.5;

      if (!heroRaf) {
        heroRaf = requestAnimationFrame(function () {
          heroFloaters.forEach(function (el) {
            var depth = parseFloat(el.getAttribute('data-parallax') || '16');
            el.style.setProperty('--px', (hx * depth).toFixed(1) + 'px');
            el.style.setProperty('--py', (hy * depth).toFixed(1) + 'px');
          });
          heroRaf = null;
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
     3. CONCEPT SECTION: WITH WORKLY OPS VS AD-HOC CHATS BENCHMARK
     ======================================================================== */
  var comparePresets = {
    with: {
      turn: '2.6h',
      turnSub: 'Same-shift execution with live priority queues',
      sla: '94.8%',
      slaSub: 'Measured across BrightPath & Northstar pods',
      rework: '3.2%',
      reworkSub: 'Subtask checklists verified prior to handoff',
      inbox: '18m',
      inboxSub: 'Auto-labeled client threads inside Email Hub',
      summary: 'Result: Up to 3.4x faster client response and predictable weekly output.'
    },
    without: {
      turn: '11.4h',
      turnSub: 'Delayed replies buried across Slack, email, and sheets',
      sla: '71.0%',
      slaSub: 'No shared deadline alerts or PTO handoff tracking',
      rework: '24.5%',
      reworkSub: 'Missing briefs trigger repeated rounds of revisions',
      inbox: '4.2h',
      inboxSub: 'Unstructured threads shared over manual screenshots',
      summary: 'Ad-hoc workflows lose hours daily chasing status instead of shipping work.'
    }
  };

  document.querySelectorAll('#opsCompareToggle .ops-seg-btn').forEach(function (btn) {
    btn.addEventListener('click', function () {
      var key = btn.getAttribute('data-compare');
      var data = comparePresets[key] || comparePresets.with;

      document.querySelectorAll('#opsCompareToggle .ops-seg-btn').forEach(function (b) {
        var active = b === btn;
        b.classList.toggle('active', active);
        b.setAttribute('aria-selected', active ? 'true' : 'false');
      });

      var els = {
        turn: document.getElementById('opsCmpTurn'),
        turnSub: document.getElementById('opsCmpTurnSub'),
        sla: document.getElementById('opsCmpSla'),
        slaSub: document.getElementById('opsCmpSlaSub'),
        rework: document.getElementById('opsCmpRework'),
        reworkSub: document.getElementById('opsCmpReworkSub'),
        inbox: document.getElementById('opsCmpInbox'),
        inboxSub: document.getElementById('opsCmpInboxSub'),
        summary: document.getElementById('opsCmpSummary')
      };

      if (els.turn) els.turn.textContent = data.turn;
      if (els.turnSub) els.turnSub.textContent = data.turnSub;
      if (els.sla) {
        els.sla.textContent = data.sla;
        els.sla.classList.toggle('ops-text-accent', key === 'with');
      }
      if (els.slaSub) els.slaSub.textContent = data.slaSub;
      if (els.rework) els.rework.textContent = data.rework;
      if (els.reworkSub) els.reworkSub.textContent = data.reworkSub;
      if (els.inbox) els.inbox.textContent = data.inbox;
      if (els.inboxSub) els.inboxSub.textContent = data.inboxSub;
      if (els.summary) els.summary.textContent = data.summary;
    });
  });

  /* ========================================================================
     4. STICKY IMMERSIVE PARALLAX WORKFLOW
     ======================================================================== */
  var stickySection = document.getElementById('opsStickySection');
  var stickySteps = document.querySelectorAll('#opsStickySteps .ops-sticky-step');
  var stickyPanels = document.querySelectorAll('#opsStickyStage .ops-sticky-panel');

  function activateStickyStep(idx) {
    stickySteps.forEach(function (s) {
      s.classList.toggle('active', s.getAttribute('data-sticky-step') === String(idx));
    });
    stickyPanels.forEach(function (p, i) {
      p.classList.toggle('active', i === Number(idx));
    });
  }

  stickySteps.forEach(function (stepBtn) {
    stepBtn.addEventListener('click', function () {
      activateStickyStep(stepBtn.getAttribute('data-sticky-step'));
    });
  });

  if (stickySection && 'IntersectionObserver' in window) {
    var stepObs = new IntersectionObserver(
      function (entries) {
        entries.forEach(function (entry) {
          if (entry.isIntersecting) {
            activateStickyStep(entry.target.getAttribute('data-sticky-step'));
          }
        });
      },
      { threshold: 0.55, rootMargin: '-15% 0px -25% 0px' }
    );
    stickySteps.forEach(function (step) {
      stepObs.observe(step);
    });
  }

  // Subtle vertical parallax on sticky float layers during scroll
  var stickyLayers = document.querySelectorAll('[data-sticky-parallax]');
  if (stickySection && stickyLayers.length > 0 && !prefersReducedMotion) {
    var stickyRaf = null;
    window.addEventListener(
      'scroll',
      function () {
        if (!stickyRaf) {
          stickyRaf = requestAnimationFrame(function () {
            var rect = stickySection.getBoundingClientRect();
            var vh = window.innerHeight || 800;
            if (rect.bottom > 0 && rect.top < vh) {
              var progress = Math.max(-1, Math.min(1, (vh * 0.5 - rect.top) / rect.height - 0.5));
              var offset = (progress * 18).toFixed(1);
              stickyLayers.forEach(function (layer) {
                layer.style.setProperty('--sp', offset + 'px');
              });
            }
            stickyRaf = null;
          });
        }
      },
      { passive: true }
    );
  }

  /* ========================================================================
     5. COLLABORATIVE MULTI-CURSOR SUITE (3 CURSORS ACTUALLY WORKING TOGETHER)
     ======================================================================== */
  var collabStage = document.getElementById('opsCollabStage');
  var collabStatus = document.getElementById('opsCollabStatus');
  var collabToggle = document.getElementById('opsCollabToggle');

  var zoneTodo = document.getElementById('opsZoneTodo');
  var zoneProg = document.getElementById('opsZoneProg');
  var zoneDone = document.getElementById('opsZoneDone');

  var countTodo = document.getElementById('opsCountTodo');
  var countProg = document.getElementById('opsCountProg');
  var countDone = document.getElementById('opsCountDone');

  var taskBanner = document.getElementById('opsTaskBanner');
  var taskCrm = document.getElementById('opsTaskCrm');
  var taskReport = document.getElementById('opsTaskReport');

  var barBanner = document.getElementById('opsBarBanner');
  var pctBanner = document.getElementById('opsPctBanner');
  var barCrm = document.getElementById('opsBarCrm');
  var pctCrm = document.getElementById('opsPctCrm');

  var cursorLead = document.getElementById('opsCursorLead');
  var cursorEthan = document.getElementById('opsCursorEthan');
  var cursorOlivia = document.getElementById('opsCursorOlivia');

  var ptoTarget = document.getElementById('opsPtoTarget');
  var pto19Label = document.getElementById('opsPto19Label');
  var ptoStatusText = document.getElementById('opsPtoStatusText');

  var benchmarkData = {
    '7d': {
      sla: '96.2% On-Time SLA',
      turn: '2.1h Avg',
      curve: 'M8 54 Q 70 26, 140 12 T 272 14',
      area: 'M8 54 Q 70 26, 140 12 T 272 14 L 272 74 L 8 74 Z',
      dotX: '140',
      dotY: '12'
    },
    '14d': {
      sla: '95.1% On-Time SLA',
      turn: '2.4h Avg',
      curve: 'M8 58 Q 75 34, 140 20 T 272 16',
      area: 'M8 58 Q 75 34, 140 20 T 272 16 L 272 74 L 8 74 Z',
      dotX: '140',
      dotY: '20'
    },
    '30d': {
      sla: '94.8% On-Time SLA',
      turn: '2.6h Avg',
      curve: 'M8 62 Q 70 28, 140 16 T 272 22',
      area: 'M8 62 Q 70 28, 140 16 T 272 22 L 272 74 L 8 74 Z',
      dotX: '140',
      dotY: '16'
    }
  };

  function setBenchmark(tf) {
    var d = benchmarkData[tf] || benchmarkData['30d'];
    document.querySelectorAll('#opsBenchmarkTabs .ops-seg-btn').forEach(function (b) {
      b.classList.toggle('active', b.getAttribute('data-tf') === tf);
    });
    var slaEl = document.getElementById('opsCollabSlaVal');
    var turnEl = document.getElementById('opsCollabTurnVal');
    var curveEl = document.getElementById('opsCollabCurve');
    var areaEl = document.getElementById('opsCollabArea');
    var dotEl = document.getElementById('opsCollabDot');
    if (slaEl) slaEl.textContent = d.sla;
    if (turnEl) turnEl.textContent = d.turn;
    if (curveEl) curveEl.setAttribute('d', d.curve);
    if (areaEl) areaEl.setAttribute('d', d.area);
    if (dotEl) {
      dotEl.setAttribute('cx', d.dotX);
      dotEl.setAttribute('cy', d.dotY);
    }
  }

  function syncColumnCounts() {
    if (countTodo && zoneTodo) countTodo.textContent = String(zoneTodo.children.length);
    if (countProg && zoneProg) countProg.textContent = String(zoneProg.children.length);
    if (countDone && zoneDone) countDone.textContent = String(zoneDone.children.length);
  }

  function setBannerState(stage) {
    if (!taskBanner) return;
    taskBanner.classList.remove('is-complete');
    if (stage === 'todo' && zoneTodo) {
      zoneTodo.appendChild(taskBanner);
      if (barBanner) barBanner.style.width = '40%';
      if (pctBanner) pctBanner.textContent = '40% · Ethan Brooks';
    } else if (stage === 'progress' && zoneProg) {
      zoneProg.appendChild(taskBanner);
      if (barBanner) barBanner.style.width = '72%';
      if (pctBanner) pctBanner.textContent = '72% · In Progress';
    } else if (stage === 'done' && zoneDone) {
      zoneDone.appendChild(taskBanner);
      taskBanner.classList.add('is-complete');
      if (barBanner) barBanner.style.width = '100%';
      if (pctBanner) pctBanner.textContent = '100% · Signed Off';
    }
    syncColumnCounts();
  }

  function setCrmState(stage) {
    if (!taskCrm) return;
    taskCrm.classList.remove('is-complete');
    if (stage === 'progress' && zoneProg) {
      zoneProg.appendChild(taskCrm);
      if (barCrm) barCrm.style.width = '75%';
      if (pctCrm) pctCrm.textContent = '75% · Olivia Carter';
    } else if (stage === 'done' && zoneDone) {
      zoneDone.appendChild(taskCrm);
      taskCrm.classList.add('is-complete');
      if (barCrm) barCrm.style.width = '100%';
      if (pctCrm) pctCrm.textContent = '100% · Signed Off';
    }
    syncColumnCounts();
  }

  function setPto19(approved) {
    if (!ptoTarget || !pto19Label || !ptoStatusText) return;
    ptoTarget.classList.toggle('is-approved', approved);
    pto19Label.textContent = approved ? 'Approved' : 'Approve';
    ptoStatusText.textContent = approved
      ? 'Nov 19: Ethan Approved (Covered by Olivia)'
      : 'Nov 19: Ethan Pending Review';
  }

  function pulseCursor(el) {
    if (!el) return;
    el.classList.add('is-clicking');
    setTimeout(function () {
      el.classList.remove('is-clicking');
    }, 340);
  }

  // Interactive handlers for visitor clicks inside Collaborative Suite
  document.querySelectorAll('#opsBenchmarkTabs .ops-seg-btn').forEach(function (btn) {
    btn.addEventListener('click', function () {
      setBenchmark(btn.getAttribute('data-tf'));
    });
  });

  document.querySelectorAll('#opsPtoDays .ops-pto-btn').forEach(function (btn) {
    btn.addEventListener('click', function () {
      if (btn === ptoTarget) {
        setPto19(!ptoTarget.classList.contains('is-approved'));
      } else if (ptoStatusText) {
        ptoStatusText.textContent = 'Nov ' + btn.getAttribute('data-pto');
      }
    });
  });

  // Allow clicking task cards directly to advance their Kanban column!
  [taskBanner, taskCrm, taskReport].forEach(function (card) {
    if (!card) return;
    card.addEventListener('click', function () {
      if (!card.parentElement) return;
      var pid = card.parentElement.id;
      if (card === taskBanner) {
        if (pid === 'opsZoneTodo') setBannerState('progress');
        else if (pid === 'opsZoneProg') setBannerState('done');
        else setBannerState('todo');
      } else if (card === taskCrm) {
        setCrmState(pid === 'opsZoneProg' ? 'done' : 'progress');
      } else if (card === taskReport && zoneProg && zoneDone) {
        if (pid === 'opsZoneDone') zoneProg.appendChild(card);
        else zoneDone.appendChild(card);
        syncColumnCounts();
      }
    });
  });

  // Synchronized 3-Cursor Choreography
  var collabPlaying = !prefersReducedMotion;
  var collabInterval = null;
  var collabStepIdx = 0;

  var collabSequence = [
    function () {
      if (cursorLead) { cursorLead.style.left = '14%'; cursorLead.style.top = '36%'; }
      if (cursorEthan) { cursorEthan.style.left = '20%'; cursorEthan.style.top = '48%'; }
      if (cursorOlivia) { cursorOlivia.style.left = '44%'; cursorOlivia.style.top = '42%'; }
      setTimeout(function () {
        pulseCursor(cursorEthan);
        setBannerState('progress');
        setBenchmark('30d');
        if (collabStatus) collabStatus.textContent = 'Ethan moved Fix marketing banner to In Progress (72%)';
      }, 450);
    },
    function () {
      if (cursorLead) { cursorLead.style.left = '76%'; cursorLead.style.top = '78%'; }
      if (cursorEthan) { cursorEthan.style.left = '43%'; cursorEthan.style.top = '52%'; }
      if (cursorOlivia) { cursorOlivia.style.left = '56%'; cursorOlivia.style.top = '34%'; }
      setTimeout(function () {
        pulseCursor(cursorLead);
        pulseCursor(cursorOlivia);
        setPto19(true);
        setCrmState('done');
        setBenchmark('14d');
        if (collabStatus) collabStatus.textContent = 'Jordan approved Nov 19 PTO · Olivia completed CRM Retainer Audit';
      }, 450);
    },
    function () {
      if (cursorLead) { cursorLead.style.left = '66%'; cursorLead.style.top = '28%'; }
      if (cursorEthan) { cursorEthan.style.left = '58%'; cursorEthan.style.top = '46%'; }
      if (cursorOlivia) { cursorOlivia.style.left = '78%'; cursorOlivia.style.top = '22%'; }
      setTimeout(function () {
        pulseCursor(cursorEthan);
        setBannerState('done');
        setBenchmark('7d');
        if (collabStatus) collabStatus.textContent = 'Pod 100% synced · Weekly SLA benchmark verified at 96.2%';
      }, 450);
    },
    function () {
      if (cursorLead) { cursorLead.style.left = '12%'; cursorLead.style.top = '24%'; }
      if (cursorEthan) { cursorEthan.style.left = '16%'; cursorEthan.style.top = '36%'; }
      if (cursorOlivia) { cursorOlivia.style.left = '40%'; cursorOlivia.style.top = '36%'; }
      setTimeout(function () {
        pulseCursor(cursorLead);
        setBannerState('todo');
        setCrmState('progress');
        setPto19(false);
        setBenchmark('30d');
        if (collabStatus) collabStatus.textContent = 'New sprint deliverables dispatched across team pod...';
      }, 450);
    }
  ];

  function startCollabLoop() {
    if (collabInterval || !collabPlaying || !collabStage) return;
    collabSequence[collabStepIdx]();
    collabStepIdx = (collabStepIdx + 1) % collabSequence.length;
    collabInterval = setInterval(function () {
      collabSequence[collabStepIdx]();
      collabStepIdx = (collabStepIdx + 1) % collabSequence.length;
    }, 2600);
  }

  function stopCollabLoop() {
    if (collabInterval) {
      clearInterval(collabInterval);
      collabInterval = null;
    }
  }

  if (collabToggle) {
    collabToggle.addEventListener('click', function () {
      collabPlaying = !collabPlaying;
      collabToggle.setAttribute('aria-pressed', collabPlaying ? 'true' : 'false');
      collabToggle.textContent = collabPlaying ? 'Pause Live Team' : 'Play Live Team';
      if (collabPlaying) startCollabLoop();
      else stopCollabLoop();
    });
  }

  if (collabStage && !prefersReducedMotion && 'IntersectionObserver' in window) {
    var collabObs = new IntersectionObserver(
      function (entries) {
        entries.forEach(function (entry) {
          if (entry.isIntersecting && collabPlaying) startCollabLoop();
          else stopCollabLoop();
        });
      },
      { threshold: 0.2 }
    );
    collabObs.observe(collabStage);
  }

  /* ========================================================================
     6. INTERACTIVE 3D DESKTOP PLATFORM SHOWCASE
     ======================================================================== */
  var scene3d = document.getElementById('ops3dScene');
  var rig3d = document.getElementById('ops3dRig');
  var addr3d = document.getElementById('ops3dAddress');

  function switch3dView(viewKey) {
    document.querySelectorAll('#ops3dViews .ops-seg-btn').forEach(function (b) {
      var active = b.getAttribute('data-3d-view') === viewKey;
      b.classList.toggle('active', active);
      b.setAttribute('aria-selected', active ? 'true' : 'false');
    });
    document.querySelectorAll('.ops-3d-sidebar .ops-3d-nav').forEach(function (n) {
      n.classList.toggle('active', n.getAttribute('data-3d-nav') === viewKey);
    });
    document.querySelectorAll('#ops3dScreen .ops-3d-view').forEach(function (v) {
      v.classList.toggle('active', v.id === 'ops3dView-' + viewKey);
    });
    if (addr3d) addr3d.textContent = 'ops.worklystaff.com / ' + viewKey;
  }

  document.querySelectorAll('#ops3dViews .ops-seg-btn').forEach(function (btn) {
    btn.addEventListener('click', function () {
      switch3dView(btn.getAttribute('data-3d-view'));
    });
  });

  document.querySelectorAll('.ops-3d-sidebar .ops-3d-nav').forEach(function (nav) {
    nav.addEventListener('click', function () {
      switch3dView(nav.getAttribute('data-3d-nav'));
    });
  });

  document.querySelectorAll('#ops3dModes .ops-seg-btn').forEach(function (modeBtn) {
    modeBtn.addEventListener('click', function () {
      var mode = modeBtn.getAttribute('data-3d-mode');
      document.querySelectorAll('#ops3dModes .ops-seg-btn').forEach(function (b) {
        b.classList.toggle('active', b === modeBtn);
      });
      if (!rig3d) return;
      rig3d.classList.remove('is-tilt', 'is-exploded', 'is-flat');
      rig3d.classList.add('is-' + mode);
      if (mode === 'flat') {
        rig3d.style.setProperty('--rx', '0deg');
        rig3d.style.setProperty('--ry', '0deg');
      }
    });
  });

  if (scene3d && rig3d && !prefersReducedMotion && isFinePointer) {
    var tiltRaf = null;
    var tx = 0;
    var ty = 0;

    scene3d.addEventListener('mousemove', function (e) {
      if (rig3d.classList.contains('is-flat')) return;
      var rect = scene3d.getBoundingClientRect();
      tx = ((e.clientX - rect.left) / rect.width - 0.5) * 14;
      ty = ((e.clientY - rect.top) / rect.height - 0.5) * -10;

      if (!tiltRaf) {
        tiltRaf = requestAnimationFrame(function () {
          rig3d.style.setProperty('--ry', tx.toFixed(2) + 'deg');
          rig3d.style.setProperty('--rx', ty.toFixed(2) + 'deg');
          tiltRaf = null;
        });
      }
    });

    scene3d.addEventListener('mouseleave', function () {
      rig3d.style.setProperty('--rx', rig3d.classList.contains('is-exploded') ? '12deg' : '6deg');
      rig3d.style.setProperty('--ry', rig3d.classList.contains('is-exploded') ? '-14deg' : '-6deg');
    });
  }

  /* ========================================================================
     7. SERVICE VERTICALS / INDUSTRY CATEGORIES ENGAGEMENT SWITCHER
     ======================================================================== */
  var categoryData = {
    it: {
      tag: 'IT & Technical Operations',
      title: 'Tier-1 ticket triage, QA logging, and cloud documentation',
      desc: 'Technical VAs track incoming helpdesk escalations inside structured Kanban queues, attach system logs, and maintain predictable SLA response windows.',
      items: [
        'Helpdesk triage & ticket routing with clear response SLAs',
        'SOP documentation & Knowledge Base maintenance',
        'Daily QA verification checklists before handoff'
      ],
      speed: '45m',
      sla: '96.2%',
      modules: 'Tasks · Email Hub · SLA Reports',
      cta: 'Find IT Support VAs →',
      href: 'find-va'
    },
    marketing: {
      tag: 'Digital Marketing',
      title: 'Campaign launches, asset QA, and social sprint tracking',
      desc: 'Creative and marketing VAs organize launch assets, ad variations, and newsletter approvals without missing campaign drop dates.',
      items: [
        'Multi-channel campaign calendar & creative QA tracking',
        'Vendor, sponsor, and inbox outreach neatly labeled by account',
        'Weekly conversion & deliverable velocity reporting'
      ],
      speed: '1.9h',
      sla: '94.8%',
      modules: 'Kanban · Email Hub · Retainer CRM',
      cta: 'Find Marketing VAs →',
      href: 'find-va'
    },
    legal: {
      tag: 'Legal Support',
      title: 'Case intake coordination, document prep, and deadline control',
      desc: 'Legal assistants maintain airtight audit trails across discovery requests, client intake follow-ups, and court or filing reminders.',
      items: [
        'Structured intake workflows with priority deadline alerts',
        'Synchronized client correspondence linked to matter folders',
        'Monthly billing & retainer hour utilization summaries'
      ],
      speed: '1.5h',
      sla: '97.4%',
      modules: 'Tasks · Client CRM · Document SOPs',
      cta: 'Find Legal VAs →',
      href: 'find-va'
    },
    insurance: {
      tag: 'Insurance Operations',
      title: 'Policy renewals, claims follow-ups, and carrier coordination',
      desc: 'Dedicated insurance VAs stay ahead of renewal windows, underwriter requests, and policy endorsements with zero dropped follow-ups.',
      items: [
        'Automated renewal pipeline checklists 30/60/90 days ahead',
        'Labeled carrier & policyholder Email Hub threads',
        'Backup PTO coverage ensuring continuous desk responsiveness'
      ],
      speed: '1.2h',
      sla: '95.9%',
      modules: 'Kanban · Email Hub · PTO Coverage',
      cta: 'Find Insurance VAs →',
      href: 'find-va'
    },
    healthcare: {
      tag: 'Healthcare Administration',
      title: 'Patient scheduling, verification, and back-office billing queues',
      desc: 'Healthcare admin VAs streamline appointment confirmations, insurance verification tasks, and clinic inbox triage accurately.',
      items: [
        'Daily verification & intake queues prioritized by visit date',
        'Structured shift handoff & approved backup coverage',
        'Turnaround visibility across high-volume clinic requests'
      ],
      speed: '35m',
      sla: '98.1%',
      modules: 'Tasks · Calendar · PTO Coverage',
      cta: 'Find Healthcare VAs →',
      href: 'find-va'
    },
    management: {
      tag: 'Operations & Executive Admin',
      title: 'Executive inbox zero, bookkeeping prep, and weekly KPI reporting',
      desc: 'Bilingual executive VAs unify leadership calendars, vendor billing reconciliations, and cross-team deliverable tracking.',
      items: [
        'Executive inbox triage & daily summary briefings',
        'Month-end bookkeeping checks & retainer tracking',
        'One-click leadership SLA & productivity scorecards'
      ],
      speed: '1.6h',
      sla: '96.5%',
      modules: 'Overview · Email Hub · Executive PDFs',
      cta: 'Find Executive VAs →',
      href: 'find-va'
    },
    realestate: {
      tag: 'Real Estate Coordination',
      title: 'Transaction coordination, listing prep, and lead follow-through',
      desc: 'Real estate VAs track inspection dates, escrow checklists, MLS updates, and buyer/seller inquiries seamlessly.',
      items: [
        'Contract-to-close milestone boards with subtask checklists',
        'Unified buyer, lender, and title Email Hub communication',
        'Instant sync across agents and property managers'
      ],
      speed: '50m',
      sla: '95.4%',
      modules: 'Tasks · Client CRM · Email Hub',
      cta: 'Find Real Estate VAs →',
      href: 'find-va'
    }
  };

  document.querySelectorAll('#opsCatTabs .ops-cat-btn').forEach(function (btn) {
    btn.addEventListener('click', function () {
      var key = btn.getAttribute('data-cat');
      var info = categoryData[key] || categoryData.it;

      document.querySelectorAll('#opsCatTabs .ops-cat-btn').forEach(function (b) {
        b.classList.toggle('active', b === btn);
      });

      var tagEl = document.getElementById('opsCatTag');
      var titleEl = document.getElementById('opsCatTitle');
      var descEl = document.getElementById('opsCatDesc');
      var listEl = document.getElementById('opsCatList');
      var speedEl = document.getElementById('opsCatSpeed');
      var slaEl = document.getElementById('opsCatSla');
      var modEl = document.getElementById('opsCatModules');
      var linkEl = document.getElementById('opsCatLink');

      if (tagEl) tagEl.textContent = info.tag;
      if (titleEl) titleEl.textContent = info.title;
      if (descEl) descEl.textContent = info.desc;
      if (speedEl) speedEl.textContent = info.speed;
      if (slaEl) slaEl.textContent = info.sla;
      if (modEl) modEl.textContent = info.modules;
      if (linkEl) {
        linkEl.textContent = info.cta;
        linkEl.setAttribute('href', info.href);
      }
      if (listEl) {
        listEl.innerHTML = info.items
          .map(function (item) {
            return '<li>' + item + '</li>';
          })
          .join('');
      }
    });
  });
});
