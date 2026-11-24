/**
 * Workly OPS - Interactive Operations Showcase Script
 * Drives Bento controls, multi-cursor team coordination, sticky walkthrough,
 * 3D desktop platform explorer, benchmark comparison, and industry switcher.
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
     2. BENTO CARD CONTROLS (1-Click Task Filter & CRM/SLA Toggle)
     ======================================================================== */
  var mgmtData = {
    all: {
      title: 'Month-End Bookkeeping',
      pct: '68%',
      bar: '68%',
      client: 'BrightPath Digital · Note + 2 comments · TL Supervised'
    },
    todo: {
      title: 'Fix Marketing Banner',
      pct: '40%',
      bar: '40%',
      client: 'BrightPath Digital · High priority · Assigned to Ethan'
    },
    progress: {
      title: 'Client CRM Retainer Audit',
      pct: '78%',
      bar: '78%',
      client: 'Northstar Consulting · Note checked by Team Leader'
    },
    done: {
      title: 'Weekly SLA Client Report',
      pct: '100%',
      bar: '100%',
      client: 'Emailed to Client & Team Leader · 1-Click verified'
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
     3. CONCEPT SECTION: WITH WORKLY OPS VS AD-HOC CHATS BENCHMARK
     ======================================================================== */
  var comparePresets = {
    with: {
      turn: '2.6h',
      turnSub: 'Simple 1-click task progression & live alerts',
      sla: '94.8%',
      slaSub: 'Actively supervised by a Workly Team Leader',
      rework: '1 Click',
      reworkSub: 'Weekly/monthly email dispatched to Client & Lead',
      inbox: 'Real-Time',
      inboxSub: 'Meetings & threads tied to VA & Client CRM',
      summary: 'Outcome: VAs complete more high-value work with less friction, and clients realize measurable ROI faster.'
    },
    without: {
      turn: '11.4h',
      turnSub: 'Delayed replies buried across Slack, email, and sheets',
      sla: '71.0%',
      slaSub: 'No Team Leader oversight or deadline escalation alerts',
      rework: 'Manual',
      reworkSub: 'Hours spent compiling spreadsheets every Friday',
      inbox: 'Fragmented',
      inboxSub: 'Disconnected calendars, emails, and missing task notes',
      summary: 'Ad-hoc workflows lose hours daily chasing updates instead of executing deliverables.'
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
     4. GUIDED WORKFLOW SUITE (1 Smooth Guided Cursor + Fluid Transitions)
     ======================================================================== */
  var collabStage = document.getElementById('opsCollabStage');
  var collabWorkspace = document.getElementById('opsCollabWorkspace');
  var collabStatus = document.getElementById('opsCollabStatus');
  var collabToggle = document.getElementById('opsCollabToggle');
  var collabReportBtn = document.getElementById('opsCollabReportBtn');
  var reportDispatchBanner = document.getElementById('opsReportDispatchBanner');

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
  var noteBanner = document.getElementById('opsNoteBanner');
  var barCrm = document.getElementById('opsBarCrm');
  var pctCrm = document.getElementById('opsPctCrm');
  var noteCrm = document.getElementById('opsNoteCrm');

  var guidedCursor = document.getElementById('opsGuidedCursor');
  var guidedCursorLabel = document.getElementById('opsGuidedCursorLabel');
  var guidedStepBtns = document.querySelectorAll('#opsGuidedRail .ops-guided-step');

  var ptoTarget = document.getElementById('opsPtoTarget');
  var pto19Label = document.getElementById('opsPto19Label');
  var ptoStatusText = document.getElementById('opsPtoStatusText');

  var benchmarkData = {
    '7d': {
      sla: '96.2% On-Time SLA',
      turn: '2.1h Avg',
      curve: 'M8 54 Q 70 26, 140 12 T 272 14',
      area: 'M8 54 Q 70 26, 140 12 T 272 14 L 272 70 L 8 70 Z',
      dotX: '140',
      dotY: '12'
    },
    '14d': {
      sla: '95.1% On-Time SLA',
      turn: '2.4h Avg',
      curve: 'M8 58 Q 75 34, 140 20 T 272 16',
      area: 'M8 58 Q 75 34, 140 20 T 272 16 L 272 70 L 8 70 Z',
      dotX: '140',
      dotY: '20'
    },
    '30d': {
      sla: '94.8% On-Time SLA',
      turn: '2.6h Avg',
      curve: 'M8 58 Q 70 26, 140 16 T 272 20',
      area: 'M8 58 Q 70 26, 140 16 T 272 20 L 272 70 L 8 70 Z',
      dotX: '140',
      dotY: '16'
    }
  };

  var pendingTimers = [];
  function scheduleStepTimeout(fn, delay) {
    var id = setTimeout(fn, delay);
    pendingTimers.push(id);
    return id;
  }

  function clearStepTimeouts() {
    while (pendingTimers.length) {
      clearTimeout(pendingTimers.pop());
    }
  }

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

  function smoothMoveCard(card, targetZone, updateFn, instant) {
    if (!card || !targetZone) return;
    if (instant || prefersReducedMotion) {
      if (card.parentElement !== targetZone) {
        targetZone.appendChild(card);
      }
      if (updateFn) updateFn();
      syncColumnCounts();
      return;
    }

    if (card.parentElement === targetZone) {
      if (updateFn) updateFn();
      syncColumnCounts();
      return;
    }

    card.classList.remove('is-arriving');
    card.classList.add('is-transitioning');

    scheduleStepTimeout(function () {
      targetZone.appendChild(card);
      if (updateFn) updateFn();
      syncColumnCounts();
      card.classList.remove('is-transitioning');
      card.classList.add('is-arriving');

      scheduleStepTimeout(function () {
        card.classList.remove('is-arriving');
      }, 500);
    }, 280);
  }

  function setBannerState(stage, instant) {
    if (!taskBanner) return;
    if (stage === 'todo' && zoneTodo) {
      smoothMoveCard(
        taskBanner,
        zoneTodo,
        function () {
          taskBanner.classList.remove('is-complete');
          if (barBanner) barBanner.style.width = '40%';
          if (pctBanner) pctBanner.textContent = '40% · Ready for VA';
          if (noteBanner) noteBanner.textContent = 'Note: Match Q4 hex · 2 comments';
        },
        instant
      );
    } else if (stage === 'progress' && zoneProg) {
      smoothMoveCard(
        taskBanner,
        zoneProg,
        function () {
          taskBanner.classList.remove('is-complete');
          if (barBanner) barBanner.style.width = '72%';
          if (pctBanner) pctBanner.textContent = '72% · Ethan updating';
          if (noteBanner) noteBanner.textContent = 'Comment (@Jordan): Draft uploaded · 3 comments';
        },
        instant
      );
    } else if (stage === 'done' && zoneDone) {
      smoothMoveCard(
        taskBanner,
        zoneDone,
        function () {
          taskBanner.classList.add('is-complete');
          if (barBanner) barBanner.style.width = '100%';
          if (pctBanner) pctBanner.textContent = '100% · TL Verified';
          if (noteBanner) noteBanner.textContent = 'Note: Approved for Client · 4 comments';
        },
        instant
      );
    }
  }

  function setCrmState(stage, instant) {
    if (!taskCrm) return;
    if (stage === 'progress' && zoneProg) {
      smoothMoveCard(
        taskCrm,
        zoneProg,
        function () {
          taskCrm.classList.remove('is-complete');
          if (barCrm) barCrm.style.width = '75%';
          if (pctCrm) pctCrm.textContent = '75% · Olivia Carter';
          if (noteCrm) noteCrm.textContent = 'Note: TL QA checked · 4 comments';
        },
        instant
      );
    } else if (stage === 'done' && zoneDone) {
      smoothMoveCard(
        taskCrm,
        zoneDone,
        function () {
          taskCrm.classList.add('is-complete');
          if (barCrm) barCrm.style.width = '100%';
          if (pctCrm) pctCrm.textContent = '100% · Retainer Synced';
          if (noteCrm) noteCrm.textContent = 'Note: Approved by Jordan · 5 comments';
        },
        instant
      );
    }
  }

  function setPto19(approved) {
    if (!ptoTarget || !pto19Label || !ptoStatusText) return;
    ptoTarget.classList.toggle('is-approved', approved);
    pto19Label.textContent = approved ? 'Approved' : 'Review';
    ptoStatusText.textContent = approved
      ? 'Nov 19 Approved · Olivia Assigned Backup'
      : 'Nov 19: Team Leader Review';
  }

  function triggerOneClickReport(isAuto) {
    if (collabReportBtn) {
      collabReportBtn.textContent = 'Report Sent ✓';
      collabReportBtn.classList.add('is-sent');
      if (!isAuto) {
        scheduleStepTimeout(function () {
          collabReportBtn.textContent = '1-Click Send Report';
          collabReportBtn.classList.remove('is-sent');
        }, 2500);
      }
    }
    if (reportDispatchBanner) {
      reportDispatchBanner.textContent = '✓ Weekly Report sent to lucas@brightpath.com & jordan@worklystaff.com';
      reportDispatchBanner.classList.add('is-dispatched');
    }
  }

  function resetReportDispatch() {
    if (collabReportBtn) {
      collabReportBtn.textContent = '1-Click Send Report';
      collabReportBtn.classList.remove('is-sent');
    }
    if (reportDispatchBanner) {
      reportDispatchBanner.textContent = 'Linked Emails: lucas@brightpath.com · jordan@worklystaff.com';
      reportDispatchBanner.classList.remove('is-dispatched');
    }
  }

  function setGuidedRailActive(stepIndex) {
    guidedStepBtns.forEach(function (btn, idx) {
      btn.classList.toggle('active', idx === stepIndex);
    });
  }

  function moveGuidedCursorTo(targetEl, labelText, badgeColor) {
    if (!guidedCursor || !collabWorkspace || !targetEl) return;
    var wsRect = collabWorkspace.getBoundingClientRect();
    var elRect = targetEl.getBoundingClientRect();
    if (!wsRect.width || !elRect.width) return;

    var x = elRect.left - wsRect.left + Math.min(elRect.width * 0.58, 92);
    var y = elRect.top - wsRect.top + elRect.height * 0.52;

    guidedCursor.style.left = Math.round(x) + 'px';
    guidedCursor.style.top = Math.round(y) + 'px';

    if (guidedCursorLabel && labelText) {
      guidedCursorLabel.textContent = labelText;
      guidedCursorLabel.style.backgroundColor = badgeColor || '#AE09E9';
    }
  }

  function pulseGuidedCursor() {
    if (!guidedCursor) return;
    guidedCursor.classList.add('is-clicking');
    scheduleStepTimeout(function () {
      guidedCursor.classList.remove('is-clicking');
    }, 420);
  }

  document.querySelectorAll('#opsBenchmarkTabs .ops-seg-btn').forEach(function (btn) {
    btn.addEventListener('click', function () {
      setBenchmark(btn.getAttribute('data-tf'));
    });
  });

  if (collabReportBtn) {
    collabReportBtn.addEventListener('click', function () {
      triggerOneClickReport(false);
      if (collabStatus) {
        collabStatus.textContent = 'Step 4: Weekly report emailed to Client & Team Leader in 1 click';
      }
    });
  }

  document.querySelectorAll('#opsPtoDays .ops-pto-btn').forEach(function (btn) {
    btn.addEventListener('click', function () {
      if (btn === ptoTarget) {
        setPto19(!ptoTarget.classList.contains('is-approved'));
      } else if (ptoStatusText) {
        ptoStatusText.textContent = btn.getAttribute('data-pto');
      }
    });
  });

  [taskBanner, taskCrm, taskReport].forEach(function (card) {
    if (!card) return;
    card.addEventListener('click', function () {
      if (!card.parentElement) return;
      var pid = card.parentElement.id;
      if (card === taskBanner) {
        if (pid === 'opsZoneTodo') setBannerState('progress', false);
        else if (pid === 'opsZoneProg') setBannerState('done', false);
        else setBannerState('todo', false);
      } else if (card === taskCrm) {
        setCrmState(pid === 'opsZoneProg' ? 'done' : 'progress', false);
      } else if (card === taskReport && zoneProg && zoneDone) {
        smoothMoveCard(card, pid === 'opsZoneDone' ? zoneProg : zoneDone, null, false);
      }
    });
  });

  var collabPlaying = !prefersReducedMotion;
  var collabInterval = null;
  var collabStepIdx = 0;

  function runGuidedStep(stepIdx) {
    clearStepTimeouts();
    setGuidedRailActive(stepIdx);

    if (stepIdx === 0) {
      resetReportDispatch();
      setBannerState('todo', true);
      setCrmState('progress', true);
      setPto19(false);
      setBenchmark('30d');

      if (collabStatus) {
        collabStatus.textContent = 'Step 1: Ethan (VA) opens task notes & moves Kanban card to In Progress';
      }
      moveGuidedCursorTo(taskBanner, 'Step 1 · Ethan (VA)', '#AE09E9');

      scheduleStepTimeout(function () {
        pulseGuidedCursor();
        setBannerState('progress', false);
      }, 1080);
    } else if (stepIdx === 1) {
      setBannerState('progress', true);
      setCrmState('progress', true);
      setPto19(false);

      if (collabStatus) {
        collabStatus.textContent = 'Step 2: Jordan (Team Lead) approves coverage & verifies CRM audit';
      }
      moveGuidedCursorTo(ptoTarget, 'Step 2 · Jordan (Lead)', '#0f172a');

      scheduleStepTimeout(function () {
        pulseGuidedCursor();
        setPto19(true);
        setCrmState('done', false);
        setBenchmark('14d');
      }, 1080);
    } else if (stepIdx === 2) {
      setBannerState('progress', true);
      setCrmState('done', true);
      setPto19(true);

      if (collabStatus) {
        collabStatus.textContent = 'Step 3: Deliverable finalized at 100% — Weekly SLA climbs to 96.2%';
      }
      moveGuidedCursorTo(taskBanner, 'Step 3 · Verify SLA', '#10b981');

      scheduleStepTimeout(function () {
        pulseGuidedCursor();
        setBannerState('done', false);
        setBenchmark('7d');
      }, 1080);
    } else {
      setBannerState('done', true);
      setCrmState('done', true);
      setPto19(true);
      setBenchmark('7d');

      if (collabStatus) {
        collabStatus.textContent = 'Step 4: 1-Click Weekly Report emailed directly to Client & Team Leader';
      }
      moveGuidedCursorTo(collabReportBtn, 'Step 4 · 1-Click Report', '#8822CE');

      scheduleStepTimeout(function () {
        pulseGuidedCursor();
        triggerOneClickReport(true);
      }, 1080);
    }
  }

  guidedStepBtns.forEach(function (btn) {
    btn.addEventListener('click', function () {
      var idx = Number(btn.getAttribute('data-guide-step')) || 0;
      collabStepIdx = idx;
      runGuidedStep(idx);
      if (collabPlaying) {
        clearInterval(collabInterval);
        collabInterval = setInterval(function () {
          collabStepIdx = (collabStepIdx + 1) % 4;
          runGuidedStep(collabStepIdx);
        }, 3800);
      }
    });
  });

  function startCollabLoop() {
    if (collabInterval || !collabPlaying || !collabStage) return;
    runGuidedStep(collabStepIdx);
    collabInterval = setInterval(function () {
      collabStepIdx = (collabStepIdx + 1) % 4;
      runGuidedStep(collabStepIdx);
    }, 3800);
  }

  function stopCollabLoop() {
    clearStepTimeouts();
    if (collabInterval) {
      clearInterval(collabInterval);
      collabInterval = null;
    }
  }

  if (collabToggle) {
    collabToggle.addEventListener('click', function () {
      collabPlaying = !collabPlaying;
      collabToggle.setAttribute('aria-pressed', collabPlaying ? 'true' : 'false');
      collabToggle.textContent = collabPlaying ? 'Pause Guide' : 'Play Guide';
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
     5. WORKLY OPS COMMAND CENTER (With Staggered Tab Entrance Animations)
     ======================================================================== */
  var scene3d = document.getElementById('ops3dScene');
  var rig3d = document.getElementById('ops3dRig');
  var addr3d = document.getElementById('ops3dAddress');
  var send3dReportBtn = document.getElementById('ops3dSendReport');
  var send3dReportNote = document.getElementById('ops3dReportNote');

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
      var isTarget = v.id === 'ops3dView-' + viewKey;
      v.classList.remove('is-entering');
      v.classList.toggle('active', isTarget);
      if (isTarget) {
        void v.offsetWidth;
        v.classList.add('is-entering');
      }
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

  if (send3dReportBtn) {
    send3dReportBtn.addEventListener('click', function () {
      send3dReportBtn.textContent = 'Report Dispatched ✓';
      if (send3dReportNote) {
        send3dReportNote.textContent = 'Emailed to Client & Team Leader!';
      }
      setTimeout(function () {
        send3dReportBtn.textContent = 'Send Weekly Report';
        if (send3dReportNote) {
          send3dReportNote.textContent = 'Weekly/Monthly to Client & Lead';
        }
      }, 2600);
    });
  }

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
      title: 'Tier-1 ticket triage, task notes, and SLA oversight',
      desc: 'Technical VAs track incoming helpdesk escalations in Kanban boards, add troubleshooting notes and comments, and keep response times transparent with Team Leader supervision.',
      items: [
        '1-click ticket status updates with threaded Team Leader comments',
        'Real-time calendar escalation calls synced with IT leads',
        'Weekly 1-click SLA performance reports emailed to stakeholders'
      ],
      speed: '45m',
      sla: '96.2%',
      modules: 'Kanban · Notes · 1-Click Reports',
      cta: 'Find IT Support VAs →',
      href: 'find-va'
    },
    marketing: {
      tag: 'Digital Marketing',
      title: 'Campaign orchestration, review comments, and asset QA',
      desc: 'Marketing VAs move launch cards across simple Kanban columns, attach draft notes, and get instant Team Leader sign-off before campaign release.',
      items: [
        'Multi-stage campaign boards with threaded feedback & asset notes',
        'Synced client email & real-time kickoff calendar meetings',
        'Monthly turnaround & deliverable velocity reports in 1 click'
      ],
      speed: '1.9h',
      sla: '94.8%',
      modules: 'Task Comments · Email Sync · CRM',
      cta: 'Find Marketing VAs →',
      href: 'find-va'
    },
    legal: {
      tag: 'Legal Support',
      title: 'Matter intake tracking, filing alerts, and Team Leader review',
      desc: 'Legal VAs manage intake notes, client emails, and strict court filing deadlines inside an organized VA & Client CRM with real-time alerts.',
      items: [
        'Deadline alerts monitored jointly by the VA and Team Leader',
        'Client email correspondence & meeting schedules synced to CRM matters',
        '1-click weekly status & time utilization reports for partners'
      ],
      speed: '1.5h',
      sla: '97.4%',
      modules: 'VA & Client CRM · Alerts · Reports',
      cta: 'Find Legal VAs →',
      href: 'find-va'
    },
    insurance: {
      tag: 'Insurance Operations',
      title: 'Policy renewals, carrier threads, and zero-gap coordination',
      desc: 'Insurance VAs filter carrier and policyholder emails, log renewal status updates in simple clicks, and rely on supervised coverage queues.',
      items: [
        'Kanban renewal tracking with status tags and underwriting notes',
        'Real-time calendar reminders & Team Leader escalation alerts',
        'Weekly or monthly productivity digests emailed automatically'
      ],
      speed: '1.2h',
      sla: '95.9%',
      modules: 'Email Hub · Calendar Sync · SLA',
      cta: 'Find Insurance VAs →',
      href: 'find-va'
    },
    healthcare: {
      tag: 'Healthcare Administration',
      title: 'Scheduling sync, verification queues, and supervised speed',
      desc: 'Healthcare admin VAs coordinate patient calendars in real time, log insurance verification notes, and follow supervised SLA targets.',
      items: [
        'Real-time calendar appointment sync & intake alert routing',
        'Simple 1-click Kanban queues designed for high-volume desks',
        'Supervised shift coverage & verified weekly turnaround metrics'
      ],
      speed: '35m',
      sla: '98.1%',
      modules: 'Real-Time Calendar · Notes · Alerts',
      cta: 'Find Healthcare VAs →',
      href: 'find-va'
    },
    management: {
      tag: 'Operations & Executive Admin',
      title: 'Executive inbox zero, bookkeeping, and 1-click executive digests',
      desc: 'Executive VAs handle daily inbox & calendar synchronization while Team Leaders guarantee spotless monthly reconciliations and leadership reports.',
      items: [
        'Unified inbox & real-time Google Calendar meeting coordination',
        'Detailed task comments & audit-ready notes per client account',
        '1-click weekly/monthly executive reports linked to Client & Lead'
      ],
      speed: '1.6h',
      sla: '96.5%',
      modules: 'Full Suite · CRM · 1-Click Reports',
      cta: 'Find Executive VAs →',
      href: 'find-va'
    },
    realestate: {
      tag: 'Real Estate Coordination',
      title: 'Contract-to-close checklists, vendor sync, and fast follow-up',
      desc: 'Transaction coordinators manage escrow tasks, attach inspection notes, and keep agents updated through automated email reports.',
      items: [
        'Escrow & listing Kanban boards with comment threads per property',
        'Real-time showing & closing calendar sync across agents & VAs',
        'Instant Team Leader alerts on upcoming contingency deadlines'
      ],
      speed: '50m',
      sla: '95.4%',
      modules: 'Kanban · Calendar Sync · Client CRM',
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
