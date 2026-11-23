<?php
/**
 * Lahan Basah Hijau - Arena Game Kuis Ekosistem
 * Kurikulum Merdeka IPAS Kelas V SD - 6 Mini Games Interaktif
 */
$pageTitle = 'Arena Game Kuis Ekosistem Lahan Basah - IPAS SD';
$pageDesc  = 'Uji pemahaman ekosistem rawa dengan 6 mini-game seru ramah anak: kuis detektif, kartu memori satwa, rantai makanan, susun kata, detektif panorama, dan puzzle 3x3.';
$activePage = 'kuis';
$bodyClass  = 'kuis-page';

$extraHead = <<<'EOD'
<style>
    /* Styling Spesifik Game Hub */
    .game-hero {
      background: radial-gradient(circle at 80% 20%, #dcfce7 0%, #e0f2fe 50%, #fffbeb 100%);
      padding: 40px 0 60px;
      border-bottom: 2px solid #bbf7d0;
      position: relative;
      overflow: hidden;
    }

    .game-arena-card {
      max-width: 900px;
      margin: -35px auto 60px;
      position: relative;
      z-index: 10;
      padding: 0 15px;
    }

    .game-stage-box {
      background: rgba(255, 255, 255, 0.98);
      backdrop-filter: blur(16px);
      border: 2px solid #ccebd7;
      border-radius: 28px;
      padding: clamp(20px, 4vw, 36px);
      box-shadow: 0 16px 40px rgba(6, 78, 59, 0.08);
      min-height: 520px;
    }

    .player-dock {
      background: #f0fdf4;
      border: 1.5px solid #86efac;
      border-radius: 20px;
      padding: 14px 20px;
      margin-bottom: 20px;
    }

    .score-chip {
      background: #ffffff;
      border: 1px solid #d1fae5;
      padding: 6px 14px;
      border-radius: 99px;
      font-weight: 700;
      color: #065f46;
      display: inline-flex;
      align-items: center;
      gap: 6px;
      box-shadow: 0 2px 6px rgba(0,0,0,0.04);
    }

    /* Game 1: Pilihan Ganda styles */
    .option-btn {
      width: 100%;
      text-align: left;
      padding: 14px 18px;
      margin-bottom: 12px;
      background: #ffffff;
      border: 2px solid #e2e8f0;
      border-radius: 16px;
      font-weight: 600;
      color: #1e293b;
      transition: all 0.2s ease;
      display: flex;
      align-items: center;
      gap: 12px;
      cursor: pointer;
    }

    .option-btn:hover:not(:disabled) {
      border-color: #10b981;
      background: #f0fdf4;
      transform: translateX(4px);
    }

    .option-btn.correct {
      background: #dcfce7 !important;
      border-color: #22c55e !important;
      color: #14532d !important;
    }

    .option-btn.wrong {
      background: #fee2e2 !important;
      border-color: #ef4444 !important;
      color: #991b1b !important;
    }

    .lifeline-btn {
      background: #ffffff;
      border: 2px solid #cbd5e1;
      border-radius: 16px;
      padding: 8px 16px;
      font-weight: 700;
      font-size: 0.88rem;
      color: #334155;
      cursor: pointer;
      transition: all 0.2s ease;
    }

    .lifeline-btn:hover:not(:disabled) {
      border-color: #f59e0b;
      background: #fffbeb;
      color: #b45309;
      transform: translateY(-2px);
    }

    .lifeline-btn:disabled {
      opacity: 0.5;
      cursor: not-allowed;
      border-color: #e2e8f0;
    }

    /* Explanation alert */
    .explanation-box {
      border-radius: 18px;
      padding: 16px 20px;
      margin-top: 16px;
      font-size: 0.95rem;
    }

    /* Game 3: Drag and Drop Dropzone highlight */
    .chain-drop-slot {
      min-height: 100px;
      border: 2px dashed #94a3b8;
      border-radius: 16px;
      background: #f8fafc;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      padding: 10px;
      text-align: center;
      transition: all 0.2s ease;
    }

    .chain-drop-slot.active-over {
      border-color: #10b981;
      background: #ecfdf5;
      transform: scale(1.03);
    }

    .chain-drop-slot.filled-correct {
      border: 2px solid #22c55e;
      background: #dcfce7;
    }

    .draggable-card {
      background: #ffffff;
      border: 2px solid #10b981;
      border-radius: 14px;
      padding: 8px 16px;
      font-weight: 700;
      cursor: grab;
      user-select: none;
      box-shadow: 0 4px 10px rgba(0,0,0,0.06);
      display: inline-flex;
      align-items: center;
      gap: 8px;
      transition: transform 0.15s ease;
    }

    .draggable-card:active {
      cursor: grabbing;
      transform: scale(1.06);
    }

    /* Hidden Object Canvas scene */
    .hidden-scene-wrapper {
      position: relative;
      border-radius: 22px;
      overflow: hidden;
      border: 3px solid #10b981;
      background: linear-gradient(180deg, #7dd3fc 0%, #38bdf8 30%, #15803d 70%, #064e3b 100%);
      height: 380px;
      box-shadow: 0 10px 25px rgba(0,0,0,0.15);
      cursor: crosshair;
    }

    .hidden-item-spot {
      position: absolute;
      width: 52px;
      height: 52px;
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 1.8rem;
      cursor: pointer;
      transition: all 0.25s ease;
      background: rgba(255, 255, 255, 0.15);
    }

    .hidden-item-spot:hover {
      background: rgba(255, 255, 255, 0.45);
      transform: scale(1.15);
      box-shadow: 0 0 16px #facc15;
    }

    .hidden-item-spot.found-spot {
      background: rgba(34, 197, 94, 0.85);
      border: 3px solid #ffffff;
      pointer-events: none;
      animation: popIn 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    }

    /* Mode switcher bar */
    .game-tab-badge {
      font-size: 0.72rem;
      padding: 2px 8px;
      border-radius: 99px;
      background: rgba(0,0,0,0.08);
      margin-left: 6px;
    }

    .game-tabs-wrapper {
      display: flex;
      gap: 10px;
      overflow-x: auto;
      padding: 10px 4px 18px;
      scrollbar-width: thin;
    }

    .game-mode-tab {
      display: flex;
      align-items: center;
      gap: 8px;
      padding: 12px 22px;
      background: #ffffff;
      border: 2px solid #e2e8f0;
      border-radius: 18px;
      font-family: var(--font-display);
      font-weight: 700;
      font-size: 0.95rem;
      color: #1e293b;
      cursor: pointer;
      white-space: nowrap;
      transition: all 0.25s cubic-bezier(0.4, 0, 0.2, 1);
      box-shadow: 0 4px 10px rgba(0,0,0,0.03);
    }

    .game-mode-tab:hover {
      border-color: #10b981;
      transform: translateY(-2px);
    }

    .game-mode-tab.active {
      background: linear-gradient(135deg, #10b981, #059669);
      color: #ffffff;
      border-color: transparent;
      box-shadow: 0 8px 24px rgba(16, 185, 129, 0.35);
    }

    /* Game 2: Memory Matching Game */
    .memory-grid {
      display: grid;
      grid-template-columns: repeat(4, 1fr);
      gap: 14px;
      max-width: 680px;
      margin: 0 auto;
    }

    .memory-card {
      aspect-ratio: 1;
      perspective: 1000px;
      cursor: pointer;
    }

    .memory-card-inner {
      position: relative;
      width: 100%;
      height: 100%;
      text-align: center;
      transition: transform 0.5s cubic-bezier(0.4, 0, 0.2, 1);
      transform-style: preserve-3d;
      border-radius: 18px;
      box-shadow: 0 6px 16px rgba(0,0,0,0.08);
    }

    .memory-card.flipped .memory-card-inner,
    .memory-card.matched .memory-card-inner {
      transform: rotateY(180deg);
    }

    .memory-card-front, .memory-card-back {
      position: absolute;
      width: 100%;
      height: 100%;
      -webkit-backface-visibility: hidden;
      backface-visibility: hidden;
      border-radius: 18px;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      padding: 10px;
      font-weight: 700;
    }

    .memory-card-front {
      background: linear-gradient(135deg, #059669, #10b981);
      color: #ffffff;
      font-size: 2.2rem;
      border: 3px solid #34d399;
    }

    .memory-card-back {
      background: #ffffff;
      color: #064e3b;
      transform: rotateY(180deg);
      border: 3px solid #10b981;
      font-size: 0.85rem;
      line-height: 1.25;
    }

    .memory-card.matched .memory-card-back {
      background: #dcfce7;
      border-color: #22c55e;
    }

    /* Game 4: Word Scramble */
    .scramble-slots {
      display: flex;
      gap: 8px;
      justify-content: center;
      flex-wrap: wrap;
      margin-bottom: 24px;
    }

    .scramble-slot {
      width: 48px;
      height: 54px;
      background: #f1f5f9;
      border: 2px dashed #94a3b8;
      border-radius: 12px;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 1.5rem;
      font-family: var(--font-display);
      font-weight: 800;
      color: #064e3b;
    }

    .scramble-slot.filled {
      background: #ecfdf5;
      border: 2px solid #10b981;
      color: #065f46;
      box-shadow: 0 4px 10px rgba(16, 185, 129, 0.15);
    }

    .scramble-letters {
      display: flex;
      gap: 10px;
      justify-content: center;
      flex-wrap: wrap;
    }

    .letter-btn {
      width: 50px;
      height: 52px;
      background: linear-gradient(135deg, #ffffff, #f0fdf4);
      border: 2px solid #86efac;
      border-radius: 14px;
      font-size: 1.4rem;
      font-weight: 800;
      color: #065f46;
      cursor: pointer;
      transition: all 0.2s ease;
      box-shadow: 0 4px 8px rgba(0,0,0,0.06);
    }

    .letter-btn:hover {
      transform: translateY(-3px);
      border-color: #10b981;
      background: #dcfce7;
    }

    .letter-btn.used {
      opacity: 0.3;
      pointer-events: none;
      transform: scale(0.9);
    }

    /* Game 6: Sliding Tile Puzzle */
    .puzzle-board {
      width: 330px;
      height: 330px;
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      grid-template-rows: repeat(3, 1fr);
      gap: 4px;
      background: #0f172a;
      border-radius: 20px;
      padding: 8px;
      margin: 0 auto;
      box-shadow: 0 12px 28px rgba(0,0,0,0.2);
    }

    .puzzle-piece {
      width: 100%;
      height: 100%;
      background-size: 300% 300%;
      border-radius: 12px;
      cursor: pointer;
      transition: transform 0.15s ease, filter 0.15s ease;
      position: relative;
      display: flex;
      align-items: flex-end;
      justify-content: flex-end;
      padding: 4px;
      border: 1.5px solid rgba(255,255,255,0.35);
      box-shadow: inset 0 0 6px rgba(0,0,0,0.25);
    }

    .puzzle-piece:hover:not(.empty) {
      filter: brightness(1.08);
      transform: scale(0.97);
    }

    .puzzle-piece.empty {
      background: rgba(15, 23, 42, 0.45) !important;
      border: 2px dashed rgba(255,255,255,0.25);
      cursor: default;
    }

    .memory-card-thumb {
      width: 52px;
      height: 52px;
      max-width: 80%;
      object-fit: contain;
      display: block;
      margin: 0 auto 3px auto;
      filter: drop-shadow(0 2px 4px rgba(0,0,0,0.12));
    }

    .dnd-item-thumb {
      width: 36px;
      height: 36px;
      object-fit: contain;
      filter: drop-shadow(0 2px 3px rgba(0,0,0,0.12));
    }

    .puzzle-piece .piece-num {
      font-size: 0.75rem;
      background: rgba(0,0,0,0.65);
      color: #ffffff;
      padding: 2px 6px;
      border-radius: 6px;
    }

    .puzzle-piece.empty {
      background: transparent !important;
      cursor: default;
    }

    /* Penyegaran visual arena */
    body { overflow-x: hidden; }

    .game-hero::before,
    .game-hero::after {
      content: "";
      position: absolute;
      border-radius: 50%;
      pointer-events: none;
      filter: blur(2px);
      animation: heroFloat 7s ease-in-out infinite;
    }

    .game-hero::before {
      width: 180px;
      height: 180px;
      left: -45px;
      top: -55px;
      background: rgba(52, 211, 153, .2);
    }

    .game-hero::after {
      width: 230px;
      height: 230px;
      right: -55px;
      bottom: -120px;
      background: rgba(56, 189, 248, .2);
      animation-delay: -2s;
    }

    .hero-game-icons {
      display: flex;
      justify-content: center;
      gap: clamp(20px, 7vw, 75px);
      margin-bottom: 10px;
      position: relative;
      z-index: 1;
    }

    .hero-game-icons span {
      display: grid;
      place-items: center;
      width: 54px;
      height: 54px;
      border-radius: 18px;
      background: rgba(255, 255, 255, .78);
      border: 1px solid rgba(16, 185, 129, .25);
      box-shadow: 0 10px 24px rgba(6, 78, 59, .1);
      font-size: 1.6rem;
      animation: iconBounce 3s ease-in-out infinite;
    }

    .hero-game-icons span:nth-child(2) { animation-delay: -.7s; }
    .hero-game-icons span:nth-child(3) { animation-delay: -1.4s; }
    .hero-game-icons span:nth-child(4) { animation-delay: -2.1s; }

    .player-avatar {
      width: 54px;
      height: 54px;
      display: grid;
      place-items: center;
      border-radius: 18px;
      background: linear-gradient(135deg, #fef3c7, #fde68a);
      box-shadow: inset 0 0 0 2px rgba(245, 158, 11, .18);
      font-size: 1.8rem;
    }

    .xp-level-track {
      width: min(230px, 48vw);
      height: 7px;
      background: #d9eee6;
      border-radius: 99px;
      overflow: hidden;
      margin-top: 6px;
    }

    .xp-level-fill {
      width: 0;
      height: 100%;
      border-radius: inherit;
      background: linear-gradient(90deg, #10b981, #38bdf8);
      transition: width .5s ease;
    }

    .mission-board {
      display: grid;
      grid-template-columns: minmax(0, 1fr) auto;
      align-items: center;
      gap: 18px;
      padding: 18px;
      margin-bottom: 24px;
      border-radius: 22px;
      color: #fff;
      background: linear-gradient(135deg, #075e47, #0f9f77 58%, #16a2bb);
      box-shadow: 0 12px 30px rgba(6, 95, 70, .2);
      position: relative;
      overflow: hidden;
    }

    .mission-board::after {
      content: "";
      position: absolute;
      right: 120px;
      top: -18px;
      width: 92px;
      height: 92px;
      background: url('foto/leaderboard.webp') center / contain no-repeat;
      opacity: .1;
      transform: rotate(14deg);
    }

    .journey-dots { display: flex; gap: 7px; margin-top: 10px; }
    .journey-dot { width: 24px; height: 7px; border-radius: 99px; background: rgba(255,255,255,.25); transition: .25s; }
    .journey-dot.done { background: #fde047; box-shadow: 0 0 12px rgba(253,224,71,.65); }

    .surprise-btn {
      position: relative;
      z-index: 1;
      border: 0;
      border-radius: 18px;
      padding: 12px 18px;
      background: #fff;
      color: #07644c;
      font-weight: 800;
      box-shadow: 0 7px 18px rgba(0,0,0,.14);
      transition: .2s ease;
      white-space: nowrap;
    }

    .surprise-btn:hover { transform: translateY(-3px) rotate(-1deg); }

    .game-picker-title {
      display: flex;
      align-items: end;
      justify-content: space-between;
      gap: 15px;
      margin-bottom: 12px;
    }

    .game-tabs-wrapper {
      display: grid;
      grid-template-columns: repeat(3, minmax(0, 1fr));
      gap: 12px;
      overflow: visible;
      padding: 0 0 22px;
    }

    .game-mode-tab {
      min-width: 0;
      min-height: 125px;
      display: grid;
      grid-template-columns: 48px minmax(0, 1fr);
      grid-template-rows: auto auto;
      align-content: center;
      text-align: left;
      white-space: normal;
      padding: 16px;
      border-radius: 22px;
      background: linear-gradient(145deg, #fff, #f8fffc);
    }

    .game-mode-icon {
      grid-row: 1 / 3;
      width: 44px;
      height: 44px;
      display: grid;
      place-items: center;
      border-radius: 14px;
      background: #dcfce7;
      font-size: 1.45rem;
    }

    .game-mode-name { align-self: end; font-size: .94rem; line-height: 1.2; }
    .game-mode-desc { align-self: start; color: #64748b; font: 600 .72rem/1.3 var(--font-body); margin-top: 4px; }
    .game-mode-tab .game-tab-badge { grid-column: 1 / 3; justify-self: start; margin: 10px 0 0; }

    .game-mode-tab:nth-child(2) .game-mode-icon { background: #e0f2fe; }
    .game-mode-tab:nth-child(3) .game-mode-icon { background: #fef3c7; }
    .game-mode-tab:nth-child(4) .game-mode-icon { background: #ede9fe; }
    .game-mode-tab:nth-child(5) .game-mode-icon { background: #ffe4e6; }
    .game-mode-tab:nth-child(6) .game-mode-icon { background: #ffedd5; }

    .game-mode-tab.active .game-mode-icon { background: rgba(255,255,255,.2); }
    .game-mode-tab.active .game-mode-desc { color: rgba(255,255,255,.82); }
    .game-mode-tab.active .game-tab-badge { background: rgba(255,255,255,.22); }

    .game-section.mode-enter { animation: modeEnter .4s cubic-bezier(.2,.8,.2,1); }

    .xp-toast {
      position: fixed;
      top: 100px;
      right: 22px;
      z-index: 2000;
      padding: 12px 18px;
      border-radius: 16px;
      color: #fff;
      background: linear-gradient(135deg, #f59e0b, #f97316);
      box-shadow: 0 12px 28px rgba(234, 88, 12, .28);
      font-weight: 800;
      transform: translateX(130%);
      transition: transform .35s cubic-bezier(.2,.8,.2,1);
    }

    .xp-toast.show { transform: translateX(0); }

    .registration-overlay {
      position: relative;
      display: none;
      place-items: center;
      min-height: 100vh;
      padding: clamp(24px, 5vw, 64px) 20px;
      background:
        radial-gradient(circle at 10% 10%, rgba(52,211,153,.25), transparent 25%),
        radial-gradient(circle at 90% 85%, rgba(56,189,248,.22), transparent 27%),
        linear-gradient(135deg, #e9fff6, #eaf7ff 55%, #fff9df);
    }

    .registration-overlay.open { display: grid; }
    body.registration-open { overflow-x: hidden; }
    body.registration-open > :not(#registrationOverlay):not(script) { display: none !important; }

    .registration-card {
      width: min(850px, 100%);
      display: grid;
      grid-template-columns: .85fr 1.15fr;
      border-radius: 30px;
      overflow: hidden;
      background: #fff;
      box-shadow: 0 28px 80px rgba(0,0,0,.32);
      animation: registrationEnter .5s cubic-bezier(.2,.8,.2,1);
    }

    @keyframes registrationEnter {
      from { opacity: 0; transform: translateY(24px); }
      to { opacity: 1; transform: none; }
    }

    .registration-art {
      display: flex;
      flex-direction: column;
      justify-content: space-between;
      min-height: 480px;
      padding: 34px;
      color: #fff;
      background: linear-gradient(155deg, #075e47, #0b9b73 62%, #16a2bb);
      position: relative;
      overflow: hidden;
    }

    .registration-art::before,
    .registration-art::after {
      content: "";
      position: absolute;
      border-radius: 50%;
      background: rgba(255,255,255,.1);
    }

    .registration-art::before { width: 190px; height: 190px; right: -80px; top: -55px; }
    .registration-art::after { width: 130px; height: 130px; left: -45px; bottom: 50px; }
    .registration-art > * { position: relative; z-index: 1; }
    .registration-mascot { text-align: center; animation: iconBounce 3s ease-in-out infinite; }
    .registration-mascot img { width: min(190px, 78%); height: 170px; object-fit: contain; filter: drop-shadow(0 15px 18px rgba(0,0,0,.18)); }

    .ui-icon-img { width: 100%; height: 100%; object-fit: contain; display: block; }
    .hero-game-icons .ui-icon-img { width: 40px; height: 40px; }
    .player-avatar .ui-icon-img { width: 46px; height: 46px; }
    .game-mode-icon .ui-icon-img { width: 38px; height: 38px; }
    .game-feature-img { width: 92px; height: 92px; object-fit: contain; filter: drop-shadow(0 10px 14px rgba(6,78,59,.16)); }
    .section-title-img { width: 42px; height: 42px; object-fit: contain; vertical-align: middle; margin-right: 8px; }
    .result-illustration { width: 110px; height: 110px; object-fit: contain; filter: drop-shadow(0 12px 18px rgba(6,78,59,.18)); }

    .registration-form-wrap { padding: clamp(28px, 5vw, 48px); position: relative; }
    .registration-close {
      position: absolute;
      top: 18px;
      right: 18px;
      width: 38px;
      height: 38px;
      border: 0;
      border-radius: 50%;
      background: #f1f5f9;
      color: #475569;
      font-size: 1.2rem;
    }

    .registration-field { position: relative; margin-bottom: 18px; }
    .registration-field .field-icon { position: absolute; left: 16px; top: 43px; font-size: 1.1rem; }
    .registration-field label { display: block; margin-bottom: 8px; color: #334155; font-weight: 800; }
    .registration-field input {
      width: 100%;
      padding: 14px 16px 14px 48px;
      border: 2px solid #dce9e4;
      border-radius: 15px;
      outline: 0;
      font-weight: 600;
      color: #173b34;
      background: #fbfefd;
      transition: .2s ease;
    }

    .registration-field input:focus { border-color: #10b981; box-shadow: 0 0 0 4px rgba(16,185,129,.12); background: #fff; }
    .registration-error { min-height: 22px; color: #c2410c; font-size: .84rem; font-weight: 700; }
    .registration-submit { width: 100%; justify-content: center; margin-top: 5px; }

    @keyframes heroFloat { 50% { transform: translateY(14px) scale(1.04); } }
    @keyframes iconBounce { 50% { transform: translateY(-8px) rotate(3deg); } }
    @keyframes modeEnter { from { opacity: 0; transform: translateY(14px) scale(.985); } to { opacity: 1; transform: none; } }

    @media (max-width: 767.98px) {
      .game-hero { padding: 32px 0 55px; }
      .game-hero h1 { font-size: 2rem; }
      .game-tabs-wrapper { grid-template-columns: repeat(2, minmax(0, 1fr)); }
      .mission-board { grid-template-columns: 1fr; }
      .mission-board::after { right: -5px; }
      .surprise-btn { width: 100%; }
      .registration-card { grid-template-columns: 1fr; max-width: 520px; }
      .registration-art { min-height: auto; padding: 24px; }
      .registration-art .registration-mascot { display: none; }
      .registration-art p { margin-bottom: 0; }
      .registration-form-wrap { padding: 28px 24px; }
    }

    @media (max-width: 480px) {
      .game-stage-box { padding-inline: 14px; border-radius: 22px; }
      .game-tabs-wrapper { grid-template-columns: 1fr; }
      .game-mode-tab { min-height: 92px; }
      .hero-game-icons span { width: 46px; height: 46px; }
      .puzzle-board { width: min(330px, 100%); height: auto; aspect-ratio: 1; }
    }

    @media (prefers-reduced-motion: reduce) {
      .hero-game-icons span, .game-hero::before, .game-hero::after { animation: none; }
    }

    /* Floating Music Dock & Button Styles (Embedded to prevent cache bugs) */
    .music-dock {
      position: fixed;
      bottom: 24px;
      right: 24px;
      z-index: 9999;
      display: flex;
      align-items: center;
      gap: 10px;
      background: rgba(255, 255, 255, 0.95);
      backdrop-filter: blur(16px);
      -webkit-backdrop-filter: blur(16px);
      border: 1.5px solid rgba(16, 185, 129, 0.4);
      padding: 6px 14px 6px 6px;
      border-radius: 999px;
      box-shadow: 0 8px 25px rgba(6, 78, 59, 0.15);
      transition: all 0.3s cubic-bezier(0.34, 1.56, 0.64, 1);
      cursor: pointer;
    }

    .music-dock:hover {
      transform: translateY(-2px) scale(1.04);
      box-shadow: 0 12px 30px rgba(16, 185, 129, 0.25);
      border-color: #10b981;
    }

    .music-btn,
    .music-toggle-btn {
      width: 42px !important;
      height: 42px !important;
      border-radius: 50% !important;
      background: linear-gradient(135deg, #10b981 0%, #059669 100%) !important;
      color: #ffffff !important;
      border: none !important;
      outline: none !important;
      display: flex !important;
      align-items: center !important;
      justify-content: center !important;
      font-size: 1.2rem !important;
      box-shadow: 0 4px 12px rgba(16, 185, 129, 0.35) !important;
      cursor: pointer !important;
      transition: all 0.2s ease !important;
      padding: 0 !important;
      margin: 0 !important;
      appearance: none !important;
      -webkit-appearance: none !important;
      flex-shrink: 0 !important;
    }

    .music-btn:hover,
    .music-toggle-btn:hover {
      transform: scale(1.1);
      background: linear-gradient(135deg, #059669 0%, #047857 100%) !important;
    }

    .music-dock.playing .music-btn,
    .music-dock.playing .music-toggle-btn {
      background: linear-gradient(135deg, #10b981 0%, #0284c7 100%) !important;
      animation: pulseEco 2s infinite ease-in-out;
    }

    @keyframes pulseEco {
      0%, 100% { box-shadow: 0 0 0 0 rgba(16, 185, 129, 0.4); }
      50% { box-shadow: 0 0 0 8px rgba(16, 185, 129, 0); }
    }

    .sound-bars {
      display: flex;
      align-items: flex-end;
      gap: 3px;
      height: 18px;
    }

    .sound-bar {
      width: 3.5px;
      background-color: #10b981;
      border-radius: 99px;
      height: 4px;
      transition: height 0.2s ease;
    }

    .music-dock.playing .sound-bar:nth-child(1) {
      animation: eqBar1 0.8s ease-in-out infinite alternate;
    }
    .music-dock.playing .sound-bar:nth-child(2) {
      animation: eqBar2 0.7s ease-in-out infinite alternate 0.2s;
    }
    .music-dock.playing .sound-bar:nth-child(3) {
      animation: eqBar3 0.9s ease-in-out infinite alternate 0.4s;
    }

    @keyframes eqBar1 { 0% { height: 4px; } 100% { height: 16px; } }
    @keyframes eqBar2 { 0% { height: 6px; } 100% { height: 18px; } }
    @keyframes eqBar3 { 0% { height: 3px; } 100% { height: 14px; } }

    .music-label {
      font-family: var(--font-display, sans-serif);
      font-size: 0.84rem;
      font-weight: 700;
      color: #064e3b;
      user-select: none;
      white-space: nowrap;
    }

    .music-toast,
    .music-toast-popup {
      position: fixed;
      bottom: 84px;
      right: 24px;
      z-index: 9999;
      background: rgba(15, 23, 42, 0.92);
      color: #ffffff;
      backdrop-filter: blur(12px);
      padding: 8px 18px;
      border-radius: 999px;
      font-size: 0.85rem;
      font-weight: 600;
      box-shadow: 0 6px 20px rgba(0, 0, 0, 0.15);
      display: none;
      opacity: 0;
      transition: opacity 0.3s ease;
    }
  </style>
EOD;

require __DIR__ . '/partials/head.php';
require __DIR__ . '/partials/navbar.php';

// Unified Hero Banner
$heroTag       = '<i class="bi bi-joystick me-1 text-warning"></i> Arena Edukasi Ramah Anak';
$heroTitle     = 'Taman Bermain Game <br><span class="highlight">Kuis Ekosistem Rawa</span>';
$heroSubtitle  = 'Pilih permainan favoritmu! Uji pengetahuanmu tentang harmoni alam, rantai makanan, dan satwa khas Kalimantan dengan 6 game interaktif yang seru.';
$heroMascot    = 'foto/puzzle.webp';
$heroMascotAlt = 'Maskot Game STEM';
$heroCta       = '
  <a href="materi.php" class="btn-eco-outline btn-sm px-4">
    <i class="bi bi-book-half"></i> Baca Modul Dulu
  </a>
  <a href="leaderboard.php" class="btn-eco-primary btn-sm px-4">
    <i class="bi bi-trophy-fill"></i> Lihat Peringkat
  </a>
';
require __DIR__ . '/partials/hero.php';
?>

<main class="game-arena-card">
    <div class="game-stage-box" data-aos="fade-up">

      <!-- Player Identity Bar -->
      <div class="player-dock d-flex flex-wrap align-items-center justify-content-between gap-3">
        <div class="d-flex align-items-center gap-2">
          <span class="player-avatar"><img class="ui-icon-img" src="foto/children.webp" alt="Ilustrasi penjelajah" /></span>
          <div>
            <div class="small text-muted fw-bold">Penjelajah Cilik:</div>
            <div class="fw-bold text-success fs-6" id="playerDisplay">Belum Terdaftar</div>
            <div class="d-flex align-items-center gap-2">
              <small class="fw-bold text-muted" id="playerLevel">Bibit Penjelajah</small>
              <div class="xp-level-track" aria-label="Progres level"><div class="xp-level-fill" id="xpLevelFill"></div></div>
            </div>
          </div>
        </div>
        <div class="d-flex flex-wrap align-items-center gap-2">
          <span class="score-chip"><i class="bi bi-star-fill text-warning"></i> XP: <strong id="playerXp">0</strong></span>
          <span class="score-chip"><i class="bi bi-trophy-fill text-warning"></i> Skor Kuis: <strong id="bestQuizScore">0</strong>/12</span>
          <button class="btn btn-outline-success btn-sm rounded-pill fw-bold" onclick="promptPlayerName()">
            <i class="bi bi-pencil-square"></i> Ganti Nama
          </button>
        </div>
      </div>

      <section class="mission-board" aria-labelledby="missionTitle">
        <div>
          <div class="small text-white-50 fw-bold mb-1">MISI JELAJAH HARI INI</div>
          <h2 class="h5 fw-bold mb-1" id="missionTitle">Coba tiga jenis permainan berbeda!</h2>
          <div class="small"><strong id="journeyCount">0</strong>/3 mode telah dijelajahi · lanjutkan untuk membuka lencana Petualang</div>
          <div class="journey-dots" id="journeyDots" aria-label="Progres jelajah permainan">
            <span class="journey-dot"></span><span class="journey-dot"></span><span class="journey-dot"></span>
          </div>
        </div>
        <button class="surprise-btn" type="button" onclick="playSurpriseGame()"><i class="bi bi-dice-5-fill me-1"></i> Pilihkan Game</button>
      </section>

      <!-- Game Mode Selection Navigation Bar -->
      <div class="game-picker-title">
        <div>
          <div class="small text-success fw-bold">PILIH TANTANGANMU</div>
          <h2 class="h4 fw-bold mb-0">Enam cara seru belajar ekosistem</h2>
        </div>
        <span class="badge bg-warning-subtle text-warning-emphasis rounded-pill px-3 py-2"><i class="bi bi-star-fill me-1"></i> Dapatkan XP</span>
      </div>
      <div class="game-tabs-wrapper mb-4">
        <button class="game-mode-tab active" data-mode="pilihanGanda" onclick="switchGameMode('pilihanGanda', this)">
          <span class="game-mode-icon"><img class="ui-icon-img" src="foto/kuis.webp" alt="" /></span><span class="game-mode-name">Kuis Detektif</span><span class="game-mode-desc">Taklukkan soal bertingkat</span><span class="game-tab-badge">12 Soal</span>
        </button>
        <button class="game-mode-tab" data-mode="memoryMatch" onclick="switchGameMode('memoryMatch', this)">
          <span class="game-mode-icon"><img class="ui-icon-img" src="foto/asetgame/Teratai.webp" alt="" /></span><span class="game-mode-name">Mencocokkan Kartu</span><span class="game-mode-desc">Latih ingatan dan konsep</span><span class="game-tab-badge">6 Pasang</span>
        </button>
        <button class="game-mode-tab" data-mode="dragDrop" onclick="switchGameMode('dragDrop', this)">
          <span class="game-mode-icon"><img class="ui-icon-img" src="foto/asetgame/Ikan.webp" alt="" /></span><span class="game-mode-name">Susun Rantai</span><span class="game-mode-desc">Urutkan aliran energi</span><span class="game-tab-badge">Taraf Trofik</span>
        </button>
        <button class="game-mode-tab" data-mode="wordScramble" onclick="switchGameMode('wordScramble', this)">
          <span class="game-mode-icon"><img class="ui-icon-img" src="foto/modul.webp" alt="" /></span><span class="game-mode-name">Susun Kata</span><span class="game-mode-desc">Pecahkan istilah ilmiah</span><span class="game-tab-badge">Kosakata STEM</span>
        </button>
        <button class="game-mode-tab" data-mode="hiddenObject" onclick="switchGameMode('hiddenObject', this)">
          <span class="game-mode-icon"><img class="ui-icon-img" src="foto/asetgame/Bekantan.webp" alt="" /></span><span class="game-mode-name">Cari Hewan Rawa</span><span class="game-mode-desc">Temukan satwa tersembunyi</span><span class="game-tab-badge">Detektif</span>
        </button>
        <button class="game-mode-tab" data-mode="puzzle" onclick="switchGameMode('puzzle', this)">
          <span class="game-mode-icon"><img class="ui-icon-img" src="foto/puzzle.webp" alt="" /></span><span class="game-mode-name">Puzzle Gambar</span><span class="game-mode-desc">Susun panorama lahan basah</span><span class="game-tab-badge">3×3</span>
        </button>
      </div>

      <!-- ===================================================================
           MODE 1: PILIHAN GANDA DETEKTIF EKOSISTEM
           =================================================================== -->
      <section id="arena-pilihanGanda" class="game-section">
        
        <!-- Welcome Screen Kuis -->
        <div id="quizStartView" class="text-center py-4">
          <img class="game-feature-img mb-2" src="foto/kuis.webp" alt="Ilustrasi kuis detektif" />
          <h3 class="fw-bold text-dark mb-2">Tantangan Kuis Detektif Ekosistem</h3>
          <p class="text-muted mx-auto mb-4" style="max-width: 540px;">
            Selesaikan 12 soal bertingkat (Mudah, Sedang, Sulit). Gunakan bantuan 50:50 dan Hint, kumpulkan streak jawaban benar untuk meraih skor tertinggi di Papan Peringkat!
          </p>
          <div class="d-flex justify-content-center gap-3">
            <button class="btn btn-eco-primary" onclick="startMultipleChoiceQuiz()">
              <i class="bi bi-play-circle-fill"></i> Mulai Kuis Sekarang
            </button>
            <a href="leaderboard.php" class="btn btn-eco-outline">
              <i class="bi bi-trophy-fill"></i> Lihat Peringkat
            </a>
          </div>
        </div>

        <!-- Quiz Gameplay Screen -->
        <div id="quizPlayView" class="d-none">
          
          <!-- Top Stats & Lifelines -->
          <div class="d-flex flex-wrap align-items-center justify-content-between gap-2 mb-3 pb-2 border-bottom">
            <div class="d-flex align-items-center gap-2">
              <span id="levelBadge" class="level-badge-pill level-mudah-pill">Level 1: Mudah</span>
              <span class="badge bg-light text-dark border fw-bold rounded-pill px-3 py-2">
                Soal <span id="currentQuestionNum">1</span> / 12
              </span>
            </div>
            <div class="d-flex align-items-center gap-2">
              <span id="streakBadge" class="streak-badge px-3 py-1 rounded-pill small" style="display: none;">
                <i class="bi bi-fire"></i> Streak x<span id="streakCount">0</span>
              </span>
              <button class="lifeline-btn" id="btn5050" onclick="use5050()">
                <i class="bi bi-scissors"></i> 50:50
              </button>
              <button class="lifeline-btn" id="btnHint" onclick="useHint()">
                <i class="bi bi-lightbulb-fill"></i> Petunjuk
              </button>
            </div>
          </div>

          <!-- Progress Bar -->
          <div class="progress mb-4" style="height: 10px; border-radius: 99px;">
            <div id="quizProgressBar" class="progress-bar bg-success progress-bar-striped progress-bar-animated" style="width: 8%;"></div>
          </div>

          <!-- Question Text -->
          <div class="mb-4">
            <h4 class="fw-bold text-dark lh-base" id="questionText">
              Pertanyaan kuis sedang disiapkan...
            </h4>
            <div id="hintAlert" class="alert alert-warning border-2 rounded-4 small fw-bold d-none mt-2">
              <i class="bi bi-lightbulb-fill me-1"></i> <span id="hintText"></span>
            </div>
          </div>

          <!-- Option Buttons -->
          <div id="optionsContainer"></div>

          <!-- Explanation & Next Button -->
          <div id="explanationContainer" class="d-none">
            <div id="explanationBox" class="explanation-box mb-3"></div>
            <div class="text-end">
              <button class="btn btn-eco-primary" id="btnNextQuestion" onclick="goToNextQuestion()">
                Lanjut Soal Berikutnya <i class="bi bi-arrow-right"></i>
              </button>
            </div>
          </div>

        </div>

        <!-- Quiz Result Screen -->
        <div id="quizResultView" class="text-center py-4 d-none">
          <div class="mb-2" id="resultEmoji"><img class="result-illustration" src="foto/leaderboard.webp" alt="Ilustrasi hasil kuis" /></div>
          <h3 class="fw-bold text-dark mb-1" id="resultTitle">Selamat! Kuis Selesai!</h3>
          <p class="text-muted mb-3" id="resultSub">Kerja bagus, kamu berhasil menyelesaikan seluruh soal.</p>

          <div class="p-4 bg-light rounded-4 d-inline-block border mb-4 text-center" style="min-width: 280px;">
            <div class="display-4 fw-bolder text-success mb-1" id="finalScoreVal">10/12</div>
            <div class="badge bg-success-subtle text-success fw-bold px-3 py-2 rounded-pill fs-6" id="finalRankBadge">
              Penjaga Lahan Basah Teladan
            </div>
          </div>

          <div class="d-flex flex-wrap justify-content-center gap-3">
            <button class="btn btn-eco-primary" onclick="startMultipleChoiceQuiz()">
              <i class="bi bi-arrow-repeat"></i> Coba Lagi
            </button>
            <a href="leaderboard.php" class="btn btn-eco-outline">
              <i class="bi bi-trophy-fill"></i> Papan Peringkat
            </a>
            <button class="btn btn-outline-secondary rounded-pill px-4 fw-bold" onclick="switchGameMode('memoryMatch')">
              Main Game Kartu ➔
            </button>
          </div>
        </div>

      </section>

      <!-- ===================================================================
           MODE 2: MENCOCOKAN KARTU (MEMORY MATCH PAIRS)
           =================================================================== -->
      <section id="arena-memoryMatch" class="game-section d-none">
        <div class="text-center mb-3">
          <h4 class="fw-bold text-success-emphasis mb-1"><img class="section-title-img" src="foto/asetgame/Teratai.webp" alt="" />Mencocokkan Kartu Ekosistem</h4>
          <p class="text-muted small mb-3">Balik kartu dan temukan pasangan organisme lahan basah dengan perannya!</p>
          <div class="d-flex justify-content-center gap-3 mb-3">
            <span class="score-chip"><i class="bi bi-cursor-fill text-primary"></i> Gerakan: <strong id="memoryMoves">0</strong></span>
            <span class="score-chip"><i class="bi bi-check2-circle text-success"></i> Cocok: <strong id="memoryMatches">0</strong>/6</span>
            <button class="btn btn-outline-success btn-sm rounded-pill fw-bold" onclick="initMemoryGame()">
              <i class="bi bi-arrow-clockwise"></i> Acak Ulang
            </button>
          </div>
        </div>

        <div class="memory-grid" id="memoryGrid"></div>

        <!-- Victory Modal for Memory -->
        <div id="memoryVictory" class="text-center p-4 bg-light rounded-4 border border-success mt-4 d-none">
          <img class="section-title-img mb-1" src="foto/asetgame/Katak.webp" alt="Ilustrasi keberhasilan" />
          <h4 class="fw-bold text-success mb-1">Luar Biasa! Semua Pasangan Ditemukan!</h4>
          <p class="text-muted small mb-3">Kamu berhasil menyelesaikan permainan dalam <strong id="victoryMoves"></strong> gerakan!</p>
          <button class="btn btn-eco-primary btn-sm" onclick="initMemoryGame()">
            <i class="bi bi-play-fill"></i> Main Lagi
          </button>
        </div>
      </section>

      <!-- ===================================================================
           MODE 3: DRAG AND DROP RANTAI MAKANAN
           =================================================================== -->
      <section id="arena-dragDrop" class="game-section d-none">
        <div class="text-center mb-4">
          <h4 class="fw-bold text-success-emphasis mb-1"><img class="section-title-img" src="foto/asetgame/Ikan.webp" alt="" />Susun Rantai Makanan Lahan Basah</h4>
          <p class="text-muted small mb-2">Tarik dan letakkan organisme ke dalam kotak taraf trofik yang tepat sesuai aliran energi!</p>
          <button class="btn btn-outline-success btn-sm rounded-pill fw-bold" onclick="initDragDropGame()">
            <i class="bi bi-arrow-repeat"></i> Reset Susunan
          </button>
        </div>

        <!-- Target Drop Slots -->
        <div class="row g-2 mb-4 text-center">
          <div class="col">
            <div class="chain-drop-slot" data-slot="produsen" ondragover="handleDragOver(event)" ondragleave="handleDragLeave(event)" ondrop="handleDrop(event, 'produsen')">
              <span class="badge bg-success-subtle text-success mb-1">1. Produsen</span>
              <div class="slot-content text-muted small">Tarik ke sini</div>
            </div>
          </div>
          <div class="col-auto d-flex align-items-center">➔</div>
          <div class="col">
            <div class="chain-drop-slot" data-slot="konsumen1" ondragover="handleDragOver(event)" ondragleave="handleDragLeave(event)" ondrop="handleDrop(event, 'konsumen1')">
              <span class="badge bg-primary-subtle text-primary mb-1">2. Konsumen I</span>
              <div class="slot-content text-muted small">Tarik ke sini</div>
            </div>
          </div>
          <div class="col-auto d-flex align-items-center">➔</div>
          <div class="col">
            <div class="chain-drop-slot" data-slot="konsumen2" ondragover="handleDragOver(event)" ondragleave="handleDragLeave(event)" ondrop="handleDrop(event, 'konsumen2')">
              <span class="badge bg-warning-subtle text-warning-emphasis mb-1">3. Konsumen II</span>
              <div class="slot-content text-muted small">Tarik ke sini</div>
            </div>
          </div>
          <div class="col-auto d-flex align-items-center">➔</div>
          <div class="col">
            <div class="chain-drop-slot" data-slot="puncak" ondragover="handleDragOver(event)" ondragleave="handleDragLeave(event)" ondrop="handleDrop(event, 'puncak')">
              <span class="badge bg-danger-subtle text-danger mb-1">4. Konsumen Puncak</span>
              <div class="slot-content text-muted small">Tarik ke sini</div>
            </div>
          </div>
          <div class="col-auto d-flex align-items-center">➔</div>
          <div class="col">
            <div class="chain-drop-slot" data-slot="pengurai" ondragover="handleDragOver(event)" ondragleave="handleDragLeave(event)" ondrop="handleDrop(event, 'pengurai')">
              <span class="badge bg-secondary-subtle text-secondary mb-1">5. Dekomposer</span>
              <div class="slot-content text-muted small">Tarik ke sini</div>
            </div>
          </div>
        </div>

        <!-- Draggable Source Items -->
        <div class="p-3 bg-light rounded-4 border text-center mb-3">
          <div class="small fw-bold text-muted mb-2">Pilihan Organisme (Tarik kartu atau klik untuk memasukkan):</div>
          <div id="dragItemsPool" class="d-flex flex-wrap justify-content-center gap-2"></div>
        </div>

        <div id="dndCelebration" class="alert alert-success rounded-4 fw-bold text-center d-none">
          <i class="bi bi-stars me-1"></i> <strong>Hebat Sekali!</strong> Rantai makanan tersusun sempurna dari fotosintesis hingga penguraian! (+50 XP)
        </div>
      </section>

      <!-- ===================================================================
           MODE 4: SUSUN KATA STEM (WORD SCRAMBLE)
           =================================================================== -->
      <section id="arena-wordScramble" class="game-section d-none">
        <div class="text-center mb-4">
          <h4 class="fw-bold text-success-emphasis mb-1"><img class="section-title-img" src="foto/modul.webp" alt="" />Susun Kata STEM Ekosistem</h4>
          <p class="text-muted small mb-2">Susun kembali huruf-huruf acak menjadi kosakata ilmiah ekosistem yang tepat!</p>
          <div class="d-flex justify-content-center gap-3">
            <span class="score-chip"><i class="bi bi-award-fill text-warning"></i> Level: <strong id="scrambleLevel">1</strong>/6</span>
            <span class="score-chip"><i class="bi bi-star-fill text-warning"></i> Skor Kata: <strong id="scrambleScore">0</strong></span>
          </div>
        </div>

        <!-- Clue Card with Visual Clue & Definition -->
        <div class="d-flex align-items-center justify-content-center gap-3 p-3 bg-white border border-2 border-primary-subtle rounded-4 shadow-sm mb-4">
          <img id="scrambleImage" src="foto/game/puzzle_ekosistem.webp" alt="Visual Clue" style="width: 72px; height: 72px; object-fit: contain; border-radius: 12px; filter: drop-shadow(0 2px 4px rgba(0,0,0,0.12)); flex-shrink: 0;">
          <div class="text-start">
            <span class="badge bg-primary-subtle text-primary border border-primary-subtle rounded-pill px-3 py-1 mb-1 fw-bold">Petunjuk Visual & Definisi:</span>
            <div class="fw-bold fs-6 text-dark" id="scrambleClue">
              Memuat petunjuk kosakata...
            </div>
          </div>
        </div>

        <!-- Word Slots -->
        <div class="scramble-slots" id="scrambleSlots"></div>

        <!-- Letter Buttons -->
        <div class="scramble-letters mb-4" id="scrambleLetters"></div>

        <div class="d-flex justify-content-center gap-2">
          <button class="btn btn-outline-danger btn-sm rounded-pill fw-bold" onclick="resetCurrentWord()">
            <i class="bi bi-arrow-counterclockwise"></i> Ulangi Huruf
          </button>
          <button class="btn btn-outline-primary btn-sm rounded-pill fw-bold" onclick="skipWord()">
            Kata Berikutnya ➔
          </button>
        </div>

        <div id="scrambleFeedback" class="text-center fw-bold mt-3" style="min-height: 30px;"></div>
      </section>

      <!-- ===================================================================
           MODE 5: HIDDEN OBJECT (DETEKTIF SATWA LAHAN BASAH)
           =================================================================== -->
      <section id="arena-hiddenObject" class="game-section d-none">
        <div class="hidden-game-card">
          <!-- Game Header -->
          <div class="text-center mb-3">
            <span class="badge bg-success-subtle text-success border border-success-subtle px-3 py-1 rounded-pill fw-bold mb-2">
              <i class="bi bi-search"></i> Eksplorasi Visual IPAS Bab 3
            </span>
            <h3 class="fw-bolder text-success-emphasis mb-1"><img class="section-title-img" src="foto/asetgame/Bekantan.webp" alt="" />Detektif Satwa Lahan Basah</h3>
            <p class="text-muted small mb-3">
              Temukan 5 objek tersembunyi di ekosistem rawa Kalimantan! Perhatikan balik dedaunan pohon, bebatuan, dan perairan rawa.
            </p>

            <!-- Target Checklist Grid with Real PNG Thumbnails -->
            <div class="hidden-checklist-grid" id="hiddenChecklistGrid">
              <!-- Dynamically populated by renderHiddenChecklist() -->
            </div>
          </div>

          <!-- 16:9 Multi-Layer Panoramic Arena -->
          <div class="eco-panorama-box" id="ecoPanoramaBox">
            <!-- Layer 1: Langit (Edge-to-edge seamless sky & clouds) -->
            <img src="foto/asetgame/Langit.webp" class="eco-pano-layer pano-sky-bg" alt="Langit Rawa" />

            <!-- Layer 2: Halaman / Perbukitan Hijau -->
            <img src="foto/asetgame/Halaman.webp" class="eco-pano-layer" style="z-index: 2;" alt="Daratan Lahan Basah" />

            <!-- Layer 3: Pohon Alami di Bukit Kanan Belakang (Distant hillside landscape tree) -->
            <!-- Optional distant tree disabled for cleaner sunlight horizon: <img src="foto/asetgame/Pohon.webp" class="eco-pano-bg-tree" style="right: 14%; top: 38%; width: 18%; z-index: 3; opacity: 0.92; filter: brightness(0.95);" alt="Pohon Mangrove di Tepi Air" /> -->

            <!-- Layer 4: Rawa / Air Jernih Mengalir -->
            <img src="foto/asetgame/Rawa.webp" class="eco-pano-layer" style="z-index: 4;" alt="Perairan Rawa" />

            <!-- Container for Layer 5 (Animals in water / background) -->
            <div id="hiddenLayer5" style="position: absolute; inset: 0; z-index: 5; pointer-events: none;"></div>

            <!-- Layer 6: Batu Alami Pinggir Rawa -->
            <img src="foto/asetgame/Batu.webp" class="eco-pano-rock" style="left: 17%; bottom: 12%; width: 17%; z-index: 6;" alt="Batu Tepi Rawa Kiri" />
            <img src="foto/asetgame/Batu.webp" class="eco-pano-rock" style="right: 18%; bottom: 13%; width: 16%; transform: scaleX(-1); z-index: 6;" alt="Batu Tepi Rawa Kanan" />

            <!-- Container for Layer 7 (Animals in midground bank) -->
            <div id="hiddenLayer7" style="position: absolute; inset: 0; z-index: 7; pointer-events: none;"></div>

            <!-- Layer 8: Pohon Mangrove Utama Kiri & Vegetasi Rumput Tropis Depan -->
            <img src="foto/asetgame/Pohon.webp" class="eco-pano-tree" style="left: -4%; top: 22%; width: 38%; z-index: 8; filter: drop-shadow(4px 4px 12px rgba(0,0,0,0.18));" alt="Pohon Mangrove Kiri" />
            <img src="foto/asetgame/Rumput.webp" class="eco-pano-layer" style="z-index: 8;" alt="Rerumputan & Daun Tropis Depan" />

            <!-- Container for Layer 9 (Animals in foreground) -->
            <div id="hiddenLayer9" style="position: absolute; inset: 0; z-index: 9; pointer-events: none;"></div>

            <!-- Layer 10: Interactive Hitboxes & Hints -->
            <div id="hiddenHitboxLayer" style="position: absolute; inset: 0; z-index: 10;"></div>
          </div>

          <!-- Bottom Control Bar -->
          <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mt-3 pt-2 border-top">
            <div class="d-flex align-items-center gap-2">
              <span class="badge bg-success text-white px-3 py-2 rounded-pill fw-bold">
                <i class="bi bi-check2-circle me-1"></i> Progres: <span id="hiddenFoundCount">0</span>/5 Ditemukan
              </span>
              <span id="hiddenFoundScore" class="badge bg-light text-dark border px-3 py-2 rounded-pill fw-bold">
                <i class="bi bi-star-fill text-warning me-1"></i> 0 XP
              </span>
            </div>
            <div class="d-flex gap-2">
              <button class="btn btn-outline-warning text-dark fw-bold rounded-pill px-3 py-2 shadow-sm" onclick="useHiddenHint()" id="btnHiddenHint">
                <i class="bi bi-lightbulb-fill text-warning me-1"></i> Petunjuk
              </button>
              <button class="btn btn-eco-primary fw-bold rounded-pill px-3 py-2 shadow-sm" onclick="resetHiddenObjectGame()">
                <i class="bi bi-arrow-repeat me-1"></i> Main Lagi
              </button>
            </div>
          </div>

          <!-- Discovery Feedback & Educational Fact Banner -->
          <div id="hiddenDiscoveryBanner" class="hidden-discovery-modal d-none">
            <div class="d-flex align-items-center gap-3">
            <div id="hiddenDiscoveryIcon" class="flex-shrink-0"><img class="section-title-img" src="foto/asetgame/Katak.webp" alt="" /></div>
              <div>
                <h5 class="fw-bold text-success mb-1" id="hiddenDiscoveryTitle">Hebat! Kamu menemukan Bekantan!</h5>
                <p class="mb-0 text-dark small" id="hiddenDiscoveryFact">Fakta sains ekosistem...</p>
              </div>
            </div>
          </div>

        </div>
      </section>

      <!-- ===================================================================
           MODE 6: PUZZLE GAMBAR EKOSISTEM (3x3 SLIDING TILES)
           =================================================================== -->
      <section id="arena-puzzle" class="game-section d-none">
        <div class="text-center mb-3">
          <h4 class="fw-bold text-success-emphasis mb-1"><img class="section-title-img" src="foto/puzzle.webp" alt="" />Puzzle Geser Ekosistem</h4>
          <p class="text-muted small mb-2">Klik petak puzzle yang berada di samping kotak kosong untuk menggesernya hingga gambar utuh!</p>
          <div class="d-flex justify-content-center gap-3 mb-3">
            <span class="score-chip"><i class="bi bi-hand-index-thumb text-primary"></i> Langkah: <strong id="puzzleMoves">0</strong></span>
            <button class="btn btn-outline-success btn-sm rounded-pill fw-bold" onclick="initPuzzleGame()">
              <i class="bi bi-shuffle"></i> Acak Puzzle
            </button>
          </div>
        </div>

        <!-- 3x3 Puzzle Board -->
        <div class="puzzle-board" id="puzzleBoard"></div>

        <div id="puzzleVictory" class="text-center p-3 bg-light rounded-4 border border-success mt-3 d-none">
          <img class="section-title-img mb-1" src="foto/asetgame/Katak.webp" alt="Ilustrasi keberhasilan" />
          <h5 class="fw-bold text-success mb-1">Selamat! Puzzle Tersusun Rapi!</h5>
          <img src="foto/game/puzzle_ekosistem.webp" alt="Master Puzzle Lahan Basah" class="rounded-3 shadow-sm mx-auto my-2" style="max-width: 220px; display: block; border: 2px solid #10b981;">
          <p class="text-muted small mb-2">Kamu berhasil menyusun ekosistem lahan basah dalam <strong id="finalPuzzleMoves"></strong> langkah!</p>
          <button class="btn btn-eco-primary btn-sm rounded-pill px-4" onclick="initPuzzleGame()"><i class="bi bi-arrow-clockwise"></i> Mainkan Lagi</button>
        </div>
      </section>

    </div>
  </main>

<?php
$extraScripts = <<<'EOD'
<script>
    AOS.init({ duration: 600, once: true });

    // ==========================================================================
    // 0. DATA SOAL & STATE GLOBAL
    // ==========================================================================
    const QUIZ_STORAGE_KEY = "lahanBasahQuizResults";
    const GAME_JOURNEY_KEY = "lahanBasahGameJourney";
    const GAME_MODES = ['pilihanGanda', 'memoryMatch', 'dragDrop', 'wordScramble', 'hiddenObject', 'puzzle'];
    let visitedGameModes = new Set();
    let storedProfileFound = false;
    let profileReady = false;
    let registrationCanClose = false;
    let currentUser = {
      nama: "Siswa Cerdas",
      sekolah: "SD Negeri Lahan Basah",
      xp: 0,
      bestScore: 0
    };

    // Load user from storage
    function loadUserData() {
      try {
        const saved = JSON.parse(localStorage.getItem('currentUserProfile'));
        if (saved && saved.nama) {
          currentUser = saved;
          storedProfileFound = true;
          profileReady = saved.profileCompleted === true && Boolean(saved.nama.trim()) && Boolean((saved.sekolah || '').trim());
        }
        currentUser.xp = Number(currentUser.xp) || 0;
        visitedGameModes = new Set(JSON.parse(localStorage.getItem(GAME_JOURNEY_KEY)) || []);
        // Ambil best quiz score
        const allScores = JSON.parse(localStorage.getItem(QUIZ_STORAGE_KEY)) || {};
        const key = `${currentUser.nama.toLowerCase().replace(/\s+/g, '_')}_${currentUser.sekolah.toLowerCase().replace(/\s+/g, '_')}`;
        if (allScores[key]) {
          currentUser.bestScore = allScores[key].skor || 0;
        }
      } catch (e) {}

      document.getElementById('playerDisplay').textContent = `${currentUser.nama} (${currentUser.sekolah})`;
      document.getElementById('playerXp').textContent = currentUser.xp;
      document.getElementById('bestQuizScore').textContent = currentUser.bestScore;
      updatePlayerLevel();
      updateJourneyBoard();
      return profileReady;
    }

    function promptPlayerName() {
      openRegistrationModal(true);
    }

    function openRegistrationModal(isEditing = false) {
      registrationCanClose = Boolean(isEditing && profileReady);
      const overlay = document.getElementById('registrationOverlay');
      const closeButton = document.getElementById('registrationClose');
      const nameInput = document.getElementById('registrationName');
      const schoolInput = document.getElementById('registrationSchool');

      closeButton.classList.toggle('d-none', !registrationCanClose);
      document.getElementById('registrationTitle').textContent = registrationCanClose ? 'Perbarui identitasmu' : 'Daftar sebelum bermain';
      nameInput.value = storedProfileFound ? currentUser.nama : '';
      schoolInput.value = storedProfileFound ? (currentUser.sekolah || '') : '';
      document.getElementById('registrationError').textContent = '';
      overlay.classList.add('open');
      document.body.classList.add('registration-open');
      setTimeout(() => nameInput.focus(), 250);
    }

    function closeRegistrationModal() {
      if (!registrationCanClose) return;
      hideRegistrationModal();
    }

    function hideRegistrationModal() {
      document.getElementById('registrationOverlay').classList.remove('open');
      document.body.classList.remove('registration-open');
    }

    function savePlayerProfile(event) {
      event.preventDefault();
      const nameInput = document.getElementById('registrationName');
      const schoolInput = document.getElementById('registrationSchool');
      const errorBox = document.getElementById('registrationError');
      const nama = nameInput.value.trim();
      const sekolah = schoolInput.value.trim();

      if (nama.length < 2) {
        errorBox.textContent = 'Nama lengkap harus diisi minimal 2 karakter.';
        nameInput.focus();
        return;
      }
      if (sekolah.length < 3) {
        errorBox.textContent = 'Nama sekolah harus diisi minimal 3 karakter.';
        schoolInput.focus();
        return;
      }

      currentUser.nama = nama;
      currentUser.sekolah = sekolah;
      currentUser.profileCompleted = true;
      storedProfileFound = true;
      profileReady = true;
      try { localStorage.setItem('currentUserProfile', JSON.stringify(currentUser)); } catch (e) {}
      loadUserData();
      registrationCanClose = true;
      closeRegistrationModal();
      SoundEffects.playFanfare();
      showXpToast(0);
    }

    document.getElementById('registrationForm').addEventListener('submit', savePlayerProfile);

    function addPlayerXp(amount) {
      currentUser.xp += amount;
      document.getElementById('playerXp').textContent = currentUser.xp;
      updatePlayerLevel();
      showXpToast(amount);
      try {
        localStorage.setItem('currentUserProfile', JSON.stringify(currentUser));
      } catch (e) {}
    }

    function updatePlayerLevel() {
      const xp = Number(currentUser.xp) || 0;
      const levelIndex = Math.floor(xp / 150);
      const levelNames = ['Bibit Penjelajah', 'Sahabat Rawa', 'Detektif Ekosistem', 'Penjaga Lahan Basah'];
      document.getElementById('playerLevel').textContent = levelNames[Math.min(levelIndex, levelNames.length - 1)];
      document.getElementById('xpLevelFill').style.width = `${Math.min(100, (xp % 150) / 150 * 100)}%`;
    }

    function showXpToast(amount) {
      const toast = document.getElementById('xpToast');
      toast.textContent = amount > 0 ? `+${amount} XP · Hebat!` : 'Profil tersimpan · Selamat bermain!';
      toast.classList.add('show');
      clearTimeout(showXpToast.timer);
      showXpToast.timer = setTimeout(() => toast.classList.remove('show'), 1800);
    }

    function updateJourneyBoard() {
      const count = Math.min(visitedGameModes.size, 3);
      document.getElementById('journeyCount').textContent = count;
      document.querySelectorAll('.journey-dot').forEach((dot, index) => dot.classList.toggle('done', index < count));
      if (count >= 3) document.getElementById('missionTitle').textContent = 'Lencana Petualang terbuka! Terus jelajahi semua game.';
    }

    function recordGameVisit(modeId) {
      visitedGameModes.add(modeId);
      try { localStorage.setItem(GAME_JOURNEY_KEY, JSON.stringify([...visitedGameModes])); } catch (e) {}
      updateJourneyBoard();
    }

    function playSurpriseGame() {
      const activeMode = document.querySelector('.game-mode-tab.active')?.dataset.mode;
      const choices = GAME_MODES.filter((mode) => mode !== activeMode);
      const chosenMode = choices[Math.floor(Math.random() * choices.length)];
      const chosenTab = document.querySelector(`.game-mode-tab[data-mode="${chosenMode}"]`);
      switchGameMode(chosenMode, chosenTab);
      document.querySelector('.game-picker-title').scrollIntoView({ behavior: 'smooth', block: 'start' });
    }

    // Switch between 6 Game Modes
    function switchGameMode(modeId, tabElem) {
      SoundEffects.playPop();
      document.querySelectorAll('.game-section').forEach(sec => sec.classList.add('d-none'));
      document.querySelectorAll('.game-mode-tab').forEach(tab => tab.classList.remove('active'));

      const target = document.getElementById(`arena-${modeId}`);
      if (target) {
        target.classList.remove('d-none', 'mode-enter');
        void target.offsetWidth;
        target.classList.add('mode-enter');
      }
      const activeTab = tabElem || document.querySelector(`.game-mode-tab[data-mode="${modeId}"]`);
      if (activeTab) activeTab.classList.add('active');
      recordGameVisit(modeId);

      // Initialize game if needed
      if (modeId === 'memoryMatch') initMemoryGame();
      if (modeId === 'dragDrop') initDragDropGame();
      if (modeId === 'wordScramble') initWordScrambleGame();
      if (modeId === 'hiddenObject') initHiddenObjectGame();
      if (modeId === 'puzzle') initPuzzleGame();
    }

    // ==========================================================================
    // 1. GAME MODE 1: PILIHAN GANDA DETEKTIF (12 SOAL BAB 3 & BAB 4)
    // ==========================================================================
    const quizQuestions = [
      // Level 1: Mudah (Soal 1-4)
      {
        level: "mudah",
        levelLabel: "Level 1: Mudah",
        levelClass: "level-mudah-pill",
        pertanyaan: "Dalam ekosistem lahan basah rawa gambut, manakah di bawah ini yang merupakan contoh komponen abiotik?",
        opsi: ["Ikan Haruan dan Katak Rawa", "Air Rawa, Tanah Gambut, dan Cahaya Matahari", "Rumput Purun dan Teratai", "Bekantan dan Burung Bangau"],
        kunci: 1,
        hint: "Ingat, komponen abiotik adalah benda-benda tak hidup yang sangat diperlukan oleh makhluk hidup.",
        penjelasan: "Tepat sekali! Komponen abiotik adalah unsur tak hidup seperti air, tanah gambut, udara, dan sinar matahari."
      },
      {
        level: "mudah",
        levelLabel: "Level 1: Mudah",
        levelClass: "level-mudah-pill",
        pertanyaan: "Makhluk hidup di lahan basah yang mampu membuat makanannya sendiri melalui fotosintesis dengan bantuan sinar matahari disebut...",
        opsi: ["Konsumen Puncak", "Produsen", "Dekomposer", "Herbivora"],
        kunci: 1,
        hint: "Tumbuhan hijau dan alga memproduksi zat makanan untuk dirinya sendiri dan makhluk lain.",
        penjelasan: "Benar! Tumbuhan hijau seperti teratai dan lumut air adalah produsen karena memproduksi makanan sendiri."
      },
      {
        level: "mudah",
        levelLabel: "Level 1: Mudah",
        levelClass: "level-mudah-pill",
        pertanyaan: "Satwa endemik Kalimantan berhidung panjang dan berbulu kemerahan yang hidup di pohon rambai tepi sungai adalah...",
        opsi: ["Orangutan", "Bekantan", "Burung Cendrawasih", "Harimau"],
        kunci: 1,
        hint: "Satwa ini menjadi maskot provinsi Kalimantan Selatan.",
        penjelasan: "Tepat! Bekantan (Nasalis larvatus) adalah primata khas lahan basah dan mangrove Kalimantan Selatan."
      },
      {
        level: "mudah",
        levelLabel: "Level 1: Mudah",
        levelClass: "level-mudah-pill",
        pertanyaan: "Perhatikan rantai makanan rawa: Teratai ➔ Keong Mas ➔ Katak ➔ Ikan Haruan. Hewan yang berperan sebagai Konsumen Tingkat I adalah...",
        opsi: ["Teratai", "Keong Mas", "Katak", "Ikan Haruan"],
        kunci: 1,
        hint: "Konsumen tingkat I adalah hewan herbivora yang langsung memakan produsen (tumbuhan).",
        penjelasan: "Hebat! Keong Mas memakan langsung daun teratai sehingga berstatus Konsumen I (Herbivora)."
      },

      // Level 2: Sedang (Soal 5-8)
      {
        level: "sedang",
        levelLabel: "Level 2: Sedang",
        levelClass: "level-sedang-pill",
        pertanyaan: "Apa peran krusial organisme pengurai (dekomposer) seperti jamur dan bakteri dalam ekosistem lahan basah?",
        opsi: [
          "Memangsa ikan-ikan kecil yang sedang sakit",
          "Menguraikan sisa organisme mati menjadi unsur hara yang menyuburkan tanah gambut",
          "Menyerap seluruh air rawa hingga kering",
          "Membuat air sungai menjadi berbuih detergen"
        ],
        kunci: 1,
        hint: "Pengurai mendaur ulang bangkai dan daun kering kembali ke alam.",
        penjelasan: "Sempurna! Dekomposer mengembalikan nutrisi dari bangkai dan sisa tanaman mati ke dalam tanah dan air rawa."
      },
      {
        level: "sedang",
        levelLabel: "Level 2: Sedang",
        levelClass: "level-sedang-pill",
        pertanyaan: "Jika pemburu menangkap ikan haruan dan katak rawa secara berlebihan, peristiwa apa yang akan terjadi pada rantai makanan?",
        opsi: [
          "Populasi serangga dan keong mas melonjak drastis merusak tanaman purun dan padi",
          "Tanaman teratai menjadi punah seketika",
          "Semua air rawa berubah menjadi jernih",
          "Tidak ada pengaruh apa-apa terhadap ekosistem"
        ],
        kunci: 0,
        hint: "Pikirkan tentang predator alami: jika pemangsanya hilang, mangsanya akan berkembang biak tanpa kendali.",
        penjelasan: "Tepat! Hilangnya predator puncak memicu ledakan populasi herbivora (hama) yang merusak tanaman."
      },
      {
        level: "sedang",
        levelLabel: "Level 2: Sedang",
        levelClass: "level-sedang-pill",
        pertanyaan: "Hubungan antara burung kuntul putih yang memakan kutu di punggung kerbau rawa Amuntai merupakan contoh simbiosis...",
        opsi: ["Parasitisme", "Mutualisme", "Komensalisme", "Netralisme"],
        kunci: 1,
        hint: "Kedua pihak sama-sama mendapatkan keuntungan: kerbau bebas gatal, burung kuntul kenyang.",
        penjelasan: "Benar sekali! Simbiosis mutualisme adalah hubungan yang saling menguntungkan kedua belah pihak."
      },
      {
        level: "sedang",
        levelLabel: "Level 2: Sedang",
        levelClass: "level-sedang-pill",
        pertanyaan: "Mengapa menangkap ikan di rawa dengan menggunakan alat setrum listrik atau racun kimia dilarang keras oleh hukum?",
        opsi: [
          "Karena membuat harga ikan di pasar terlalu murah",
          "Karena mematikan bibit ikan kecil, plankton, dan merusak habitat air secara luas",
          "Karena membuat nelayan lain malas bekerja",
          "Karena rasa ikannya menjadi terlalu gurih"
        ],
        kunci: 1,
        hint: "Setrum dan racun membunuh segala makhluk tanpa pandang bulu, termasuk generasi penerus ikan.",
        penjelasan: "Hebat! Menyetrum membunuh benih ikan kecil dan jentik plankton, sehingga memutus rantai makanan secara permanen."
      },

      // Level 3: Sulit (Soal 9-12)
      {
        level: "sulit",
        levelLabel: "Level 3: Sulit",
        levelClass: "level-sulit-pill",
        pertanyaan: "Mengapa kebakaran pada lahan gambut Kalimantan sangat sulit dipadamkan saat musim kemarau?",
        opsi: [
          "Karena air di Kalimantan tidak bisa memadamkan api",
          "Karena api membakar lapisan bahan organik tebal di bawah permukaan tanah (smoldering)",
          "Karena lahan gambut terbuat dari batu bara keras",
          "Karena hewan rawa meniupkan api ke tempat lain"
        ],
        kunci: 1,
        hint: "Gambut terbentuk dari daun membusuk ribuan tahun; api bisa hidup di kedalaman 1-2 meter di bawah tanah.",
        penjelasan: "Tepat sekali! Api merambat di bawah tanah (smoldering) pada lapisan gambut kering tebal yang kaya karbon."
      },
      {
        level: "sulit",
        levelLabel: "Level 3: Sulit",
        levelClass: "level-sulit-pill",
        pertanyaan: "Teknik konservasi 'Rewetting' (pembasahan kembali) pada lahan gambut dilakukan dengan cara...",
        opsi: [
          "Mengeringkan parit agar lahan bisa ditanami kelapa sawit",
          "Membangun sekat kanal (canal blocking) agar air tertahan dan gambut tetap basah sepanjang tahun",
          "Menimbun rawa gambut dengan pasir bangunan",
          "Membakar daun kering setiap pagi"
        ],
        kunci: 1,
        hint: "Sekat kanal berfungsi menahan air agar tidak lari ke sungai besar dan laut.",
        penjelasan: "Benar! Sekat kanal menjaga muka air tanah gambut tetap tinggi dan basah, sehingga kebal terhadap api."
      },
      {
        level: "sulit",
        levelLabel: "Level 3: Sulit",
        levelClass: "level-sulit-pill",
        pertanyaan: "Dalam siklus air (Bab 4), proses keluarnya uap air dari pori-pori daun tumbuhan rawa ke atmosfer disebut...",
        opsi: ["Kondensasi", "Transpirasi", "Presipitasi", "Infiltrasi"],
        kunci: 1,
        hint: "Penguapan dari daun tumbuhan memiliki istilah khusus yang berawalan huruf T.",
        penjelasan: "Luar biasa! Penguapan dari tumbuhan disebut Transpirasi, sedangkan dari permukaan air disebut Evaporasi."
      },
      {
        level: "sulit",
        levelLabel: "Level 3: Sulit",
        levelClass: "level-sulit-pill",
        pertanyaan: "Lahan basah dan rawa gambut sering disebut sebagai 'Spons Alami Raksasa' karena kemampuannya...",
        opsi: [
          "Mengeluarkan busa sabun untuk mencuci baju",
          "Menyerap air berlebih saat hujan lebat dan melepaskannya perlahan saat musim kemarau",
          "Mengapungkan perahu tanpa memerlukan dayung",
          "Menyaring ikan agar tidak masuk ke laut"
        ],
        kunci: 1,
        hint: "Spons menyerap air saat basah dan mengeluarkan air saat diperas atau kering.",
        penjelasan: "Tepat sekali! Lahan basah menyerap banjir saat musim hujan dan mempertahankan aliran air saat kemarau."
      }
    ];

    let currentQIdx = 0;
    let quizScore = 0;
    let streakCount = 0;
    let used5050 = false;
    let usedHint = false;

    function startMultipleChoiceQuiz() {
      currentQIdx = 0;
      quizScore = 0;
      streakCount = 0;
      used5050 = false;
      usedHint = false;

      document.getElementById('quizStartView').classList.add('d-none');
      document.getElementById('quizResultView').classList.add('d-none');
      document.getElementById('quizPlayView').classList.remove('d-none');

      document.getElementById('btn5050').disabled = false;
      document.getElementById('btnHint').disabled = false;

      renderCurrentQuestion();
      SoundEffects.playPop();
    }

    function renderCurrentQuestion() {
      const q = quizQuestions[currentQIdx];
      document.getElementById('currentQuestionNum').textContent = currentQIdx + 1;
      
      const levelBadge = document.getElementById('levelBadge');
      levelBadge.textContent = q.levelLabel;
      levelBadge.className = `level-badge-pill ${q.levelClass}`;

      document.getElementById('quizProgressBar').style.width = `${((currentQIdx + 1) / quizQuestions.length) * 100}%`;
      document.getElementById('questionText').textContent = q.pertanyaan;

      document.getElementById('hintAlert').classList.add('d-none');
      document.getElementById('explanationContainer').classList.add('d-none');

      const container = document.getElementById('optionsContainer');
      container.innerHTML = '';

      q.opsi.forEach((optText, idx) => {
        const btn = document.createElement('button');
        btn.className = 'option-btn';
        btn.id = `optBtn_${idx}`;
        btn.innerHTML = `<span class="badge bg-light text-dark border rounded-circle p-2" style="width:30px; height:30px; display:inline-flex; align-items:center; justify-content:center;">${String.fromCharCode(65 + idx)}</span> <span>${optText}</span>`;
        btn.onclick = () => selectOption(idx);
        container.appendChild(btn);
      });
    }

    function use5050() {
      if (used5050) return;
      used5050 = true;
      document.getElementById('btn5050').disabled = true;
      SoundEffects.playPop();

      const q = quizQuestions[currentQIdx];
      let wrongIndices = [0, 1, 2, 3].filter(i => i !== q.kunci);
      // Shuffle & pick 2 to disable
      wrongIndices.sort(() => Math.random() - 0.5);
      const toHide = wrongIndices.slice(0, 2);

      toHide.forEach(idx => {
        const btn = document.getElementById(`optBtn_${idx}`);
        if (btn) {
          btn.style.opacity = '0.3';
          btn.disabled = true;
        }
      });
    }

    function useHint() {
      if (usedHint) return;
      usedHint = true;
      document.getElementById('btnHint').disabled = true;
      SoundEffects.playPop();

      const q = quizQuestions[currentQIdx];
      const alertBox = document.getElementById('hintAlert');
      document.getElementById('hintText').textContent = q.hint;
      alertBox.classList.remove('d-none');
    }

    function selectOption(selectedIdx) {
      const q = quizQuestions[currentQIdx];
      const isCorrect = (selectedIdx === q.kunci);

      // Disable all options
      document.querySelectorAll('.option-btn').forEach((btn, idx) => {
        btn.disabled = true;
        if (idx === q.kunci) {
          btn.classList.add('correct');
        } else if (idx === selectedIdx) {
          btn.classList.add('wrong');
        }
      });

      const explBox = document.getElementById('explanationBox');
      const streakElem = document.getElementById('streakBadge');

      if (isCorrect) {
        quizScore++;
        streakCount++;
        SoundEffects.playCorrect();
        addPlayerXp(15 * streakCount);

        explBox.className = 'explanation-box bg-success-subtle text-success border border-success-subtle';
        explBox.innerHTML = `<strong><i class="bi bi-check-circle-fill me-1"></i>Jawaban Benar!</strong><br>${q.penjelasan}`;

        if (streakCount > 1) {
          streakElem.style.display = 'inline-flex';
          document.getElementById('streakCount').textContent = streakCount;
        }
      } else {
        streakCount = 0;
        streakElem.style.display = 'none';
        SoundEffects.playWrong();

        explBox.className = 'explanation-box bg-danger-subtle text-danger border border-danger-subtle';
        explBox.innerHTML = `<strong><i class="bi bi-x-circle-fill me-1"></i>Kurang Tepat!</strong><br>${q.penjelasan}`;
      }

      document.getElementById('explanationContainer').classList.remove('d-none');
    }

    function goToNextQuestion() {
      currentQIdx++;
      if (currentQIdx < quizQuestions.length) {
        renderCurrentQuestion();
      } else {
        finishQuiz();
      }
    }

    function finishQuiz() {
      document.getElementById('quizPlayView').classList.add('d-none');
      document.getElementById('quizResultView').classList.remove('d-none');

      document.getElementById('finalScoreVal').textContent = `${quizScore}/12`;
      const rankBadge = document.getElementById('finalRankBadge');
      const emojiElem = document.getElementById('resultEmoji');

      if (quizScore >= 11) {
        emojiElem.innerHTML = '<img class="result-illustration" src="foto/leaderboard.webp" alt="Ilustrasi pencapaian tertinggi" />';
        rankBadge.textContent = 'Mahaguru Ekosistem Lahan Basah';
        rankBadge.className = 'badge bg-warning text-dark fw-bold px-3 py-2 rounded-pill fs-6';
        SoundEffects.playFanfare();
        addPlayerXp(100);
      } else if (quizScore >= 8) {
        emojiElem.innerHTML = '<img class="result-illustration" src="foto/asetgame/Katak.webp" alt="Ilustrasi penjaga lahan basah" />';
        rankBadge.textContent = 'Penjaga Lahan Basah Teladan';
        rankBadge.className = 'badge bg-success text-white fw-bold px-3 py-2 rounded-pill fs-6';
        SoundEffects.playCorrect();
        addPlayerXp(50);
      } else {
        emojiElem.innerHTML = '<img class="result-illustration" src="foto/modul.webp" alt="Ilustrasi penjelajah belajar" />';
        rankBadge.textContent = 'Penjelajah Cilik Bersemangat';
        rankBadge.className = 'badge bg-info text-white fw-bold px-3 py-2 rounded-pill fs-6';
        SoundEffects.playPop();
      }

      // Save to localStorage
      try {
        const results = JSON.parse(localStorage.getItem(QUIZ_STORAGE_KEY)) || {};
        const userKey = `${currentUser.nama.toLowerCase().replace(/\s+/g, '_')}_${currentUser.sekolah.toLowerCase().replace(/\s+/g, '_')}`;
        
        if (!results[userKey] || quizScore > results[userKey].skor) {
          results[userKey] = {
            nama: currentUser.nama,
            sekolah: currentUser.sekolah,
            skor: quizScore,
            totalSoal: 12,
            tanggal: new Date().toISOString(),
            predikat: rankBadge.textContent
          };
          localStorage.setItem(QUIZ_STORAGE_KEY, JSON.stringify(results));
        }
      } catch (e) {}

      loadUserData();
    }

    // ==========================================================================
    // 2. GAME MODE 2: MENCOCOKAN KARTU (MEMORY MATCH PAIRS)
    // ==========================================================================
    const memoryPairsData = [
      { id: 1, front: "Teratai Rawa", back: "Produsen (Fotosintesis)", image: "foto/asetgame/Teratai.webp" },
      { id: 1, front: "Purun & Rumput", back: "Produsen (Fotosintesis)", image: "foto/asetgame/Rumput.webp" },
      { id: 2, front: "Keong Mas", back: "Konsumen I (Herbivora)", image: "foto/game/keong_kartu.webp" },
      { id: 2, front: "Pemakan Daun", back: "Konsumen I (Herbivora)", image: "foto/game/keong_kartu.webp" },
      { id: 3, front: "Ikan Haruan", back: "Konsumen Karnivora", image: "foto/asetgame/Ikan.webp" },
      { id: 3, front: "Katak Rawa", back: "Konsumen Karnivora", image: "foto/asetgame/Katak.webp" },
      { id: 4, front: "Jamur Lapuk", back: "Pengurai (Dekomposer)", image: "foto/game/jamur_kartu.webp" },
      { id: 4, front: "Bakteri Tanah", back: "Pengurai (Dekomposer)", image: "foto/game/bakteri_kartu.webp" },
      { id: 5, front: "Bekantan", back: "Satwa Maskot Kalsel", image: "foto/asetgame/Bekantan.webp" },
      { id: 5, front: "Pohon Rambai", back: "Pohon Pakan Kalsel", image: "foto/asetgame/Pohon.webp" },
      { id: 6, front: "Spons Gambut", back: "Penyimpan Air Alami", image: "foto/game/gambut_kartu.webp" },
      { id: 6, front: "Sinar Mentari", back: "Energi Utama Ekosistem", image: "foto/game/matahari_kartu.webp" }
    ];

    let memoryCards = [];
    let flippedCards = [];
    let matchedPairs = 0;
    let memoryMovesCount = 0;
    let isMemoryLocked = false;

    function initMemoryGame() {
      matchedPairs = 0;
      memoryMovesCount = 0;
      flippedCards = [];
      isMemoryLocked = false;

      document.getElementById('memoryMoves').textContent = '0';
      document.getElementById('memoryMatches').textContent = '0';
      document.getElementById('memoryVictory').classList.add('d-none');

      // Shuffle deck
      memoryCards = [...memoryPairsData].sort(() => Math.random() - 0.5);

      const grid = document.getElementById('memoryGrid');
      grid.innerHTML = '';

      memoryCards.forEach((card, idx) => {
        const cardElem = document.createElement('div');
        cardElem.className = 'memory-card';
        cardElem.dataset.index = idx;
        cardElem.dataset.pairId = card.id;

        cardElem.innerHTML = `
          <div class="memory-card-inner">
            <div class="memory-card-front">
              <img src="foto/logo.webp" alt="" style="width: 42px; height: 42px; object-fit: contain; filter: drop-shadow(0 2px 4px rgba(0,0,0,0.2));" />
              <div style="font-size: 0.72rem; font-weight: 800; letter-spacing: 1px; opacity: 0.95; margin-top: 2px;">RAWA</div>
            </div>
            <div class="memory-card-back">
              <img src="${card.image}" alt="${card.front}" class="memory-card-thumb">
              <div class="fw-bold text-dark text-truncate w-100" style="font-size: 0.82rem; line-height: 1.2;">${card.front}</div>
              <div class="text-success text-truncate w-100" style="font-size: 0.68rem; font-weight: 600;">${card.back}</div>
            </div>
          </div>
        `;

        cardElem.onclick = () => flipMemoryCard(cardElem, idx);
        grid.appendChild(cardElem);
      });
    }

    function flipMemoryCard(cardElem, idx) {
      if (isMemoryLocked) return;
      if (cardElem.classList.contains('flipped') || cardElem.classList.contains('matched')) return;

      SoundEffects.playFlip();
      cardElem.classList.add('flipped');
      flippedCards.push({ elem: cardElem, data: memoryCards[idx] });

      if (flippedCards.length === 2) {
        memoryMovesCount++;
        document.getElementById('memoryMoves').textContent = memoryMovesCount;
        checkMemoryMatch();
      }
    }

    function checkMemoryMatch() {
      isMemoryLocked = true;
      const [card1, card2] = flippedCards;

      if (card1.data.id === card2.data.id) {
        // Matched!
        setTimeout(() => {
          SoundEffects.playMatch();
          card1.elem.classList.add('matched');
          card2.elem.classList.add('matched');
          matchedPairs++;
          document.getElementById('memoryMatches').textContent = matchedPairs;
          flippedCards = [];
          isMemoryLocked = false;

          if (matchedPairs === 6) {
            handleMemoryVictory();
          }
        }, 500);
      } else {
        // No match
        setTimeout(() => {
          SoundEffects.playWrong();
          card1.elem.classList.remove('flipped');
          card2.elem.classList.remove('flipped');
          flippedCards = [];
          isMemoryLocked = false;
        }, 900);
      }
    }

    function handleMemoryVictory() {
      SoundEffects.playFanfare();
      addPlayerXp(40);
      document.getElementById('victoryMoves').textContent = memoryMovesCount;
      document.getElementById('memoryVictory').classList.remove('d-none');
    }

    // ==========================================================================
    // 3. GAME MODE 3: DRAG AND DROP RANTAI MAKANAN
    // ==========================================================================
    const chainItemsData = [
      { id: "teratai", slot: "produsen", label: "Teratai Rawa", role: "Produsen", image: "foto/asetgame/Teratai.webp" },
      { id: "keong", slot: "konsumen1", label: "Keong Mas", role: "Konsumen I", image: "foto/game/keong_kartu.webp" },
      { id: "katak", slot: "konsumen2", label: "Katak Rawa", role: "Konsumen II", image: "foto/asetgame/Katak.webp" },
      { id: "bangau", slot: "puncak", label: "Bangau Tongtong", role: "Konsumen Puncak", image: "foto/asetgame/Bangau.webp" },
      { id: "jamur", slot: "pengurai", label: "Jamur Pengurai", role: "Dekomposer", image: "foto/game/jamur_kartu.webp" }
    ];

    let currentDraggedItem = null;
    let placedSlots = {};

    function initDragDropGame() {
      placedSlots = {};
      document.getElementById('dndCelebration').classList.add('d-none');

      // Clear slots
      document.querySelectorAll('.chain-drop-slot').forEach(slot => {
        slot.classList.remove('filled-correct');
        const role = slot.querySelector('.badge').textContent;
        slot.innerHTML = `<span class="badge bg-light text-dark mb-1">${role}</span><div class="slot-content text-muted small">Tarik ke sini</div>`;
      });

      // Render pool
      const pool = document.getElementById('dragItemsPool');
      pool.innerHTML = '';
      const shuffled = [...chainItemsData].sort(() => Math.random() - 0.5);

      shuffled.forEach(item => {
        const itemElem = document.createElement('div');
        itemElem.className = 'draggable-card';
        itemElem.draggable = true;
        itemElem.innerHTML = `<img src="${item.image}" alt="${item.label}" class="dnd-item-thumb"><div class="text-start"><div class="fw-bold lh-sm">${item.label}</div><div class="text-muted" style="font-size: 0.72rem;">${item.role}</div></div>`;
        itemElem.dataset.id = item.id;
        itemElem.dataset.slot = item.slot;

        itemElem.ondragstart = (e) => {
          currentDraggedItem = item;
          e.dataTransfer.setData('text/plain', item.id);
          SoundEffects.playPop();
        };

        // Mobile tap support
        itemElem.onclick = () => handleTapItemPlacement(item, itemElem);

        pool.appendChild(itemElem);
      });
    }

    function handleDragOver(e) {
      e.preventDefault();
      e.currentTarget.classList.add('active-over');
    }

    function handleDragLeave(e) {
      e.currentTarget.classList.remove('active-over');
    }

    function handleDrop(e, targetSlotName) {
      e.preventDefault();
      e.currentTarget.classList.remove('active-over');

      if (!currentDraggedItem) return;

      if (currentDraggedItem.slot === targetSlotName) {
        // Correct drop!
        SoundEffects.playCorrect();
        placedSlots[targetSlotName] = currentDraggedItem;

        e.currentTarget.classList.add('filled-correct');
        e.currentTarget.innerHTML = `
              <span class="badge bg-success text-white mb-1"><i class="bi bi-check-circle-fill me-1"></i>Tepat!</span>
          <img src="${currentDraggedItem.image}" alt="${currentDraggedItem.label}" style="width: 44px; height: 44px; object-fit: contain; margin: 4px auto; display: block;">
          <div class="fw-bold text-success lh-sm">${currentDraggedItem.label}</div>
          <div class="text-muted" style="font-size: 0.72rem;">${currentDraggedItem.role}</div>
        `;

        // Remove from pool
        const poolItems = document.querySelectorAll('#dragItemsPool .draggable-card');
        poolItems.forEach(el => {
          if (el.dataset.id === currentDraggedItem.id) el.remove();
        });

        checkDnDCompletion();
      } else {
        SoundEffects.playWrong();
      }
      currentDraggedItem = null;
    }

    function handleTapItemPlacement(item, itemElem) {
      // Find empty slot for this item
      const slotElem = document.querySelector(`.chain-drop-slot[data-slot="${item.slot}"]`);
      if (slotElem && !placedSlots[item.slot]) {
        SoundEffects.playCorrect();
        placedSlots[item.slot] = item;
        slotElem.classList.add('filled-correct');
        slotElem.innerHTML = `
              <span class="badge bg-success text-white mb-1"><i class="bi bi-check-circle-fill me-1"></i>Tepat!</span>
          <img src="${item.image}" alt="${item.label}" style="width: 44px; height: 44px; object-fit: contain; margin: 4px auto; display: block;">
          <div class="fw-bold text-success lh-sm">${item.label}</div>
          <div class="text-muted" style="font-size: 0.72rem;">${item.role}</div>
        `;
        itemElem.remove();
        checkDnDCompletion();
      } else {
        SoundEffects.playWrong();
      }
    }

    function checkDnDCompletion() {
      if (Object.keys(placedSlots).length === 5) {
        SoundEffects.playFanfare();
        addPlayerXp(50);
        document.getElementById('dndCelebration').classList.remove('d-none');
      }
    }

    // ==========================================================================
    // 4. GAME MODE 4: SUSUN KATA STEM (WORD SCRAMBLE)
    // ==========================================================================
    const scrambleVocab = [
      { word: "EKOSISTEM", clue: "Hubungan timbal balik antara makhluk hidup dengan lingkungan alamnya.", image: "foto/game/puzzle_ekosistem.webp" },
      { word: "PRODUSEN", clue: "Tumbuhan atau alga yang mampu membuat makanannya sendiri melalui fotosintesis.", image: "foto/asetgame/Teratai.webp" },
      { word: "KARNIVORA", clue: "Golongan hewan pemakan daging seperti ikan haruan dan katak rawa.", image: "foto/asetgame/Ikan.webp" },
      { word: "DEKOMPOSER", clue: "Bakteri dan jamur pengurai bangkai serta daun lapuk di rawa.", image: "foto/game/jamur_kartu.webp" },
      { word: "BEKANTAN", clue: "Monyet unik berhidung panjang yang menjadi satwa maskot Kalimantan Selatan.", image: "foto/asetgame/Bekantan.webp" },
      { word: "GAMBUT", clue: "Lahan basah kaya bahan organik yang menyimpan air seperti spons raksasa.", image: "foto/game/gambut_kartu.webp" }
    ];

    let currentWordIdx = 0;
    let currentInputWord = [];
    let scrambledLetterSet = [];

    function initWordScrambleGame() {
      currentWordIdx = 0;
      loadWordLevel();
    }

    function loadWordLevel() {
      const target = scrambleVocab[currentWordIdx];
      document.getElementById('scrambleLevel').textContent = currentWordIdx + 1;
      document.getElementById('scrambleClue').textContent = target.clue;
      const imgEl = document.getElementById('scrambleImage');
      if (imgEl && target.image) imgEl.src = target.image;
      document.getElementById('scrambleFeedback').textContent = '';

      currentInputWord = [];
      const slotsContainer = document.getElementById('scrambleSlots');
      slotsContainer.innerHTML = '';

      for (let i = 0; i < target.word.length; i++) {
        const slot = document.createElement('div');
        slot.className = 'scramble-slot';
        slot.id = `slot_${i}`;
        slotsContainer.appendChild(slot);
      }

      // Scramble letters
      scrambledLetterSet = target.word.split('').map((char, index) => ({ id: index, char: char }));
      scrambledLetterSet.sort(() => Math.random() - 0.5);

      const lettersContainer = document.getElementById('scrambleLetters');
      lettersContainer.innerHTML = '';

      scrambledLetterSet.forEach((item, idx) => {
        const btn = document.createElement('button');
        btn.className = 'letter-btn';
        btn.textContent = item.char;
        btn.id = `letterBtn_${idx}`;
        btn.onclick = () => handleLetterClick(item, btn);
        lettersContainer.appendChild(btn);
      });
    }

    function handleLetterClick(item, btnElem) {
      const target = scrambleVocab[currentWordIdx];
      if (currentInputWord.length >= target.word.length) return;

      SoundEffects.playLetter();
      btnElem.classList.add('used');

      const nextSlotIdx = currentInputWord.length;
      currentInputWord.push({ char: item.char, btnElem: btnElem });

      const slotElem = document.getElementById(`slot_${nextSlotIdx}`);
      if (slotElem) {
        slotElem.textContent = item.char;
        slotElem.classList.add('filled');
      }

      // Check if full
      if (currentInputWord.length === target.word.length) {
        const formed = currentInputWord.map(x => x.char).join('');
        if (formed === target.word) {
          SoundEffects.playCorrect();
        document.getElementById('scrambleFeedback').innerHTML = `<span class="text-success fs-5"><i class="bi bi-check-circle-fill me-1"></i>Hebat! "${target.word}" Tersusun Benar!</span>`;
          addPlayerXp(30);

          setTimeout(() => {
            currentWordIdx = (currentWordIdx + 1) % scrambleVocab.length;
            loadWordLevel();
          }, 1400);
        } else {
          SoundEffects.playWrong();
          document.getElementById('scrambleFeedback').innerHTML = `<span class="text-danger">Susunan huruf belum tepat. Coba ulangi!</span>`;
        }
      }
    }

    function resetCurrentWord() {
      SoundEffects.playPop();
      currentInputWord = [];
      document.querySelectorAll('.scramble-slot').forEach(s => {
        s.textContent = '';
        s.classList.remove('filled');
      });
      document.querySelectorAll('.letter-btn').forEach(b => b.classList.remove('used'));
      document.getElementById('scrambleFeedback').textContent = '';
    }

    function skipWord() {
      SoundEffects.playPop();
      currentWordIdx = (currentWordIdx + 1) % scrambleVocab.length;
      loadWordLevel();
    }

    // ==========================================================================
    // 5. GAME MODE 5: HIDDEN OBJECT (DETEKTIF SATWA LAHAN BASAH)
    // Multi-Layer Panorama & Realistic Wildlife Occlusion
    // ==========================================================================
    const HIDDEN_OBJECTS_DATA = [
      {
        id: "bekantan",
        name: "Bekantan",
        iconImg: "foto/asetgame/Bekantan.webp",
        fact: "🐒 Bekantan (Nasalis larvatus) adalah primata endemik Kalimantan berhidung unik yang suka memakan pucuk dedaunan pohon rambai di tepi rawa dan sungai!",
        spots: [
          {
            // Spot 0 (Kiri): Duduk santai di dahan pohon bakau kiri utama
            left: 8.5, top: 20, width: 10.5, zIndex: 9, rotate: -4, flip: false,
            hitbox: { left: 8, top: 19, width: 11.5, height: 12 }
          },
          {
            // Spot 1 (Kiri-Atas): Mengintip dari balik kanopi dedaunan rimbun
            left: 14, top: 8, width: 9.5, zIndex: 9, rotate: 6, flip: false,
            hitbox: { left: 13.5, top: 7.5, width: 10.5, height: 11 }
          },
          {
            // Spot 2 (Kanan): Duduk di dahan pohon bakau kanan dekat matahari
            left: 77, top: 22, width: 10, zIndex: 9, rotate: -5, flip: true,
            hitbox: { left: 76.5, top: 21, width: 11, height: 12 }
          }
        ]
      },
      {
        id: "bangau",
        name: "Burung Bangau",
        iconImg: "foto/asetgame/Bangau.webp",
        fact: "🪶 Burung Bangau Tongtong memiliki kaki jangkung dan paruh runcing yang kokoh untuk menyambar ikan serta katak di rawa dangkal.",
        spots: [
          {
            // Spot 0 (Kiri): Berdiri anggun di tepian daratan rumput kiri
            left: 21, top: 40, width: 9, zIndex: 7, rotate: 0, flip: false,
            hitbox: { left: 20.5, top: 39.5, width: 10, height: 14 }
          },
          {
            // Spot 1 (Tengah): Berdiri di tepian daratan seberang air tenang
            left: 45, top: 35, width: 8.5, zIndex: 5, rotate: 0, flip: true,
            hitbox: { left: 44.5, top: 34.5, width: 9.5, height: 13.5 }
          },
          {
            // Spot 2 (Kanan): Berdiri di tepian rawa kanan dekat bebatuan
            left: 67, top: 43, width: 9, zIndex: 7, rotate: 0, flip: true,
            hitbox: { left: 66.5, top: 42.5, width: 10, height: 14 }
          }
        ]
      },
      {
        id: "katak",
        name: "Katak Rawa",
        iconImg: "foto/asetgame/Katak.webp",
        fact: "🐸 Katak Rawa memangsa serangga air dan menjadi mangsa bergizi bagi ikan predator serta burung air dalam jejaring makanan lahan basah.",
        spots: [
          {
            // Spot 0 (Kiri): Duduk santai di atas batu lumut kiri bawah
            left: 23, top: 69, width: 6.5, zIndex: 7, rotate: -3, flip: false,
            hitbox: { left: 22.5, top: 68.5, width: 7.5, height: 7.5 }
          },
          {
            // Spot 1 (Tengah): Duduk di tepian rumput hijau tengah
            left: 53, top: 70, width: 6.5, zIndex: 7, rotate: 0, flip: true,
            hitbox: { left: 52.5, top: 69.5, width: 7.5, height: 7.5 }
          },
          {
            // Spot 2 (Kanan): Duduk di atas batu lumut kanan bawah
            left: 65, top: 69, width: 6.5, zIndex: 7, rotate: 4, flip: false,
            hitbox: { left: 64.5, top: 68.5, width: 7.5, height: 7.5 }
          }
        ]
      },
      {
        id: "ikan",
        name: "Ikan Seluang",
        iconImg: "foto/asetgame/Ikan.webp",
        fact: "🐟 Ikan Seluang berenang lincah secara berkelompok di perairan rawa dan sungai gambut yang bersih, memakan mikroorganisme serta lumut air.",
        spots: [
          {
            // Spot 0 (Kiri): Melompat lincah di perairan rawa kiri
            left: 33, top: 56, width: 7.5, zIndex: 5, rotate: -8, flip: false,
            hitbox: { left: 32.5, top: 55, width: 8.5, height: 7.5 }
          },
          {
            // Spot 1 (Tengah): Meluncur gesit di perairan rawa tengah
            left: 49, top: 58, width: 7.5, zIndex: 5, rotate: 6, flip: true,
            hitbox: { left: 48.5, top: 57, width: 8.5, height: 7.5 }
          },
          {
            // Spot 2 (Kanan): Berenang di perairan tenang sisi kanan
            left: 63, top: 57, width: 7.5, zIndex: 5, rotate: -4, flip: false,
            hitbox: { left: 62.5, top: 56, width: 8.5, height: 7.5 }
          }
        ]
      },
      {
        id: "teratai",
        name: "Teratai Mekar",
        iconImg: "foto/asetgame/Teratai.webp",
        fact: "🪷 Teratai adalah tanaman air produsen utama yang meneduhkan dasar rawa dengan daunnya dan memekarkan bunga indah untuk fauna air.",
        spots: [
          {
            // Spot 0 (Kiri): Mengapung di permukaan air rawa kiri
            left: 17, top: 62, width: 10, zIndex: 5, rotate: 0, flip: false,
            hitbox: { left: 16.5, top: 61.5, width: 11, height: 9.5 }
          },
          {
            // Spot 1 (Tengah): Mekar indah di pusat perairan rawa
            left: 40, top: 64, width: 10.5, zIndex: 5, rotate: 0, flip: true,
            hitbox: { left: 39.5, top: 63.5, width: 11.5, height: 10 }
          },
          {
            // Spot 2 (Kanan): Mengapung di perairan tenang sisi kanan
            left: 71, top: 61, width: 9.5, zIndex: 5, rotate: 0, flip: false,
            hitbox: { left: 70.5, top: 60.5, width: 10.5, height: 9.5 }
          }
        ]
      }
    ];

    let hiddenGameState = {
      foundIds: new Set(),
      assignedSpots: {},
      isInitialized: false,
      hintTimeout: null
    };

    function initHiddenObjectGame(forceReset = false) {
      if (hiddenGameState.isInitialized && !forceReset) return;
      hiddenGameState.isInitialized = true;
      hiddenGameState.foundIds = new Set();
      hiddenGameState.assignedSpots = {};

      if (hiddenGameState.hintTimeout) {
        clearTimeout(hiddenGameState.hintTimeout);
        hiddenGameState.hintTimeout = null;
      }

      const banner = document.getElementById('hiddenDiscoveryBanner');
      if (banner) banner.classList.add('d-none');

      // Sebaran Seimbang (Balanced Zone Distribution: Left, Center, Right)
      // Mencegah semua hewan menumpuk di satu sisi
      const zonePermutations = [
        [0, 1, 2, 0, 1],
        [1, 0, 2, 1, 0],
        [2, 0, 1, 2, 0],
        [0, 2, 1, 0, 2],
        [1, 2, 0, 1, 2]
      ];
      const chosenZones = zonePermutations[Math.floor(Math.random() * zonePermutations.length)];

      HIDDEN_OBJECTS_DATA.forEach((obj, idx) => {
        const spotIdx = chosenZones[idx % chosenZones.length];
        hiddenGameState.assignedSpots[obj.id] = obj.spots[spotIdx] || obj.spots[0];
      });

      renderHiddenChecklist();
      renderHiddenLayers();
      updateHiddenProgressUI();
    }

    function renderHiddenChecklist() {
      const grid = document.getElementById('hiddenChecklistGrid');
      if (!grid) return;

      grid.innerHTML = HIDDEN_OBJECTS_DATA.map(item => {
        const isFound = hiddenGameState.foundIds.has(item.id);
        return `
          <div class="hidden-target-card ${isFound ? 'found' : ''}" id="targetCard-${item.id}">
            <img src="${item.iconImg}" class="target-thumb" alt="${item.name}" />
            <span class="target-label">${item.name}</span>
            <span class="target-status-pill">${isFound ? 'Ditemukan' : 'Belum'}</span>
          </div>
        `;
      }).join('');
    }

    function renderHiddenLayers() {
      const layer5 = document.getElementById('hiddenLayer5');
      const layer7 = document.getElementById('hiddenLayer7');
      const layer9 = document.getElementById('hiddenLayer9');
      const hitboxLayer = document.getElementById('hiddenHitboxLayer');

      if (!layer5 || !layer7 || !layer9 || !hitboxLayer) return;

      layer5.innerHTML = '';
      layer7.innerHTML = '';
      layer9.innerHTML = '';
      hitboxLayer.innerHTML = '';

      HIDDEN_OBJECTS_DATA.forEach(item => {
        const spot = hiddenGameState.assignedSpots[item.id];
        if (!spot) return;

        const isFound = hiddenGameState.foundIds.has(item.id);
        const transformStyle = [
          spot.flip ? 'scaleX(-1)' : '',
          spot.rotate ? `rotate(${spot.rotate}deg)` : ''
        ].filter(Boolean).join(' ');

        // Animal container
        const animalHtml = `
          <div class="hidden-animal-wrap ${isFound ? 'found' : ''}" id="animalWrap-${item.id}"
               style="left: ${spot.left}%; top: ${spot.top}%; width: ${spot.width}%; transform: ${transformStyle};">
              <span class="found-badge"><i class="bi bi-check-circle-fill me-1"></i>${item.name}</span>
            <img src="${item.iconImg}" class="hidden-animal-img animal-${item.id}" alt="${item.name}" />
          </div>
        `;

        // Append to appropriate depth layer
        if (spot.zIndex <= 5) {
          layer5.insertAdjacentHTML('beforeend', animalHtml);
        } else if (spot.zIndex <= 7) {
          layer7.insertAdjacentHTML('beforeend', animalHtml);
        } else {
          layer9.insertAdjacentHTML('beforeend', animalHtml);
        }

        // Interactive Hitbox on Layer 10
        const hb = spot.hitbox || { left: spot.left, top: spot.top, width: spot.width, height: spot.width };
        const hitboxHtml = `
          <div class="hidden-hitbox ${isFound ? 'found' : ''}" id="hitbox-${item.id}"
               style="left: ${hb.left}%; top: ${hb.top}%; width: ${hb.width}%; height: ${hb.height}%;"
               onclick="clickHiddenObject('${item.id}')"
               title="Klik untuk menemukan ${item.name}">
          </div>
        `;
        hitboxLayer.insertAdjacentHTML('beforeend', hitboxHtml);
      });
    }

    function clickHiddenObject(itemId) {
      if (hiddenGameState.foundIds.has(itemId)) return;

      const item = HIDDEN_OBJECTS_DATA.find(x => x.id === itemId);
      if (!item) return;

      SoundEffects.playFound();
      hiddenGameState.foundIds.add(itemId);

      // Animate animal and hitbox
      const wrap = document.getElementById(`animalWrap-${itemId}`);
      if (wrap) wrap.classList.add('found');

      const hitbox = document.getElementById(`hitbox-${itemId}`);
      if (hitbox) hitbox.classList.add('found');

      // Update card badge
      const card = document.getElementById(`targetCard-${itemId}`);
      if (card) {
        card.classList.add('found');
        const pill = card.querySelector('.target-status-pill');
      if (pill) pill.textContent = 'Ditemukan';
      }

      // Add XP
      addPlayerXp(25);

      // Show discovery notification
      showHiddenDiscovery(item);
      updateHiddenProgressUI();

      // Check victory (5/5 found)
      if (hiddenGameState.foundIds.size === HIDDEN_OBJECTS_DATA.length) {
        setTimeout(() => {
          SoundEffects.playFanfare();
          addPlayerXp(100);
          showHiddenVictory();
        }, 600);
      }
    }

    function showHiddenDiscovery(item) {
      const banner = document.getElementById('hiddenDiscoveryBanner');
      const title = document.getElementById('hiddenDiscoveryTitle');
      const fact = document.getElementById('hiddenDiscoveryFact');
      const icon = document.getElementById('hiddenDiscoveryIcon');

      if (!banner || !title || !fact) return;

      icon.innerHTML = `<img src="${item.iconImg}" style="width: 44px; height: 44px; object-fit: contain;" alt="${item.name}" />`;
      title.textContent = `Hebat! Kamu menemukan ${item.name}! (+25 XP)`;
      fact.textContent = item.fact;

      banner.classList.remove('d-none');
    }

    function showHiddenVictory() {
      const banner = document.getElementById('hiddenDiscoveryBanner');
      const title = document.getElementById('hiddenDiscoveryTitle');
      const fact = document.getElementById('hiddenDiscoveryFact');
      const icon = document.getElementById('hiddenDiscoveryIcon');

      if (!banner || !title || !fact) return;

      icon.innerHTML = '<img class="section-title-img" src="foto/leaderboard.webp" alt="Ilustrasi pencapaian" />';
      title.innerHTML = `LUAR BIASA! SEMUA 5 SATWA DITEMUKAN! (+100 XP Bonus)`;
      fact.innerHTML = `Kamu telah membuktikan ketelitian detektif sains sejati dalam memahami harmoni ekosistem lahan basah Kalimantan! Seluruh satwa hidup rukun di habitat aslinya.`;

      banner.classList.remove('d-none');
    }

    function updateHiddenProgressUI() {
      const countEl = document.getElementById('hiddenFoundCount');
      if (countEl) countEl.textContent = hiddenGameState.foundIds.size;

      const scoreEl = document.getElementById('hiddenFoundScore');
      if (scoreEl) {
        const earned = hiddenGameState.foundIds.size * 25 + (hiddenGameState.foundIds.size === 5 ? 100 : 0);
      scoreEl.innerHTML = `<i class="bi bi-star-fill text-warning me-1"></i>${earned} XP`;
      }
    }

    function useHiddenHint() {
      SoundEffects.playLetter();

      // Find first un-found item
      const unfoundItem = HIDDEN_OBJECTS_DATA.find(x => !hiddenGameState.foundIds.has(x.id));
      if (!unfoundItem) {
        alert("Semua satwa sudah berhasil kamu temukan! Hebat!");
        return;
      }

      const spot = hiddenGameState.assignedSpots[unfoundItem.id];
      if (!spot) return;

      const hb = spot.hitbox || { left: spot.left, top: spot.top, width: spot.width, height: spot.width };
      const hitboxLayer = document.getElementById('hiddenHitboxLayer');
      if (!hitboxLayer) return;

      // Remove existing hint ring
      document.querySelectorAll('.hint-radar-ring').forEach(el => el.remove());

      // Create radar hint ring over that item's area
      const radar = document.createElement('div');
      radar.className = 'hint-radar-ring';
      radar.style.left = `${hb.left}%`;
      radar.style.top = `${hb.top}%`;
      radar.style.width = `${hb.width}%`;
      radar.style.height = `${hb.height}%`;

      hitboxLayer.appendChild(radar);

      // Auto-remove radar after 3.2 seconds
      if (hiddenGameState.hintTimeout) clearTimeout(hiddenGameState.hintTimeout);
      hiddenGameState.hintTimeout = setTimeout(() => {
        radar.remove();
      }, 3200);
    }

    function resetHiddenObjectGame() {
      SoundEffects.playFlip();
      initHiddenObjectGame(true);
    }

    // ==========================================================================
    // 6. GAME MODE 6: PUZZLE GAMBAR EKOSISTEM (3x3 SLIDING TILES)
    // ==========================================================================
    let puzzleTiles = [1, 2, 3, 4, 5, 6, 7, 8, 0]; // 0 is empty
    let puzzleMovesCount = 0;

    function initPuzzleGame() {
      puzzleMovesCount = 0;
      document.getElementById('puzzleMoves').textContent = '0';
      document.getElementById('puzzleVictory').classList.add('d-none');

      // Shuffle solvable puzzle
      puzzleTiles = [1, 2, 3, 4, 5, 6, 7, 8, 0];
      for (let i = 0; i < 40; i++) {
        const emptyIdx = puzzleTiles.indexOf(0);
        const validMoves = getAdjacentIndices(emptyIdx);
        const randomMove = validMoves[Math.floor(Math.random() * validMoves.length)];
        // Swap
        [puzzleTiles[emptyIdx], puzzleTiles[randomMove]] = [puzzleTiles[randomMove], puzzleTiles[emptyIdx]];
      }

      renderPuzzleBoard();
    }

    function getAdjacentIndices(idx) {
      const valid = [];
      const row = Math.floor(idx / 3);
      const col = idx % 3;

      if (row > 0) valid.push(idx - 3); // top
      if (row < 2) valid.push(idx + 3); // bottom
      if (col > 0) valid.push(idx - 1); // left
      if (col < 2) valid.push(idx + 1); // right

      return valid;
    }

    function renderPuzzleBoard() {
      const board = document.getElementById('puzzleBoard');
      board.innerHTML = '';

      puzzleTiles.forEach((val, idx) => {
        const piece = document.createElement('div');
        piece.className = 'puzzle-piece';

        if (val === 0) {
          piece.classList.add('empty');
        } else {
          // Calculate background coordinates for 3x3 tiles
          const origRow = Math.floor((val - 1) / 3);
          const origCol = (val - 1) % 3;
          piece.style.backgroundImage = 'url("foto/game/puzzle_ekosistem.webp")';
          piece.style.backgroundPosition = `${origCol * 50}% ${origRow * 50}%`;
          piece.innerHTML = `<span class="piece-num">${val}</span>`;
          piece.onclick = () => handlePuzzleClick(idx);
        }

        board.appendChild(piece);
      });
    }

    function handlePuzzleClick(idx) {
      const emptyIdx = puzzleTiles.indexOf(0);
      const adjacent = getAdjacentIndices(emptyIdx);

      if (adjacent.includes(idx)) {
        SoundEffects.playSlide();
        // Swap
        [puzzleTiles[emptyIdx], puzzleTiles[idx]] = [puzzleTiles[idx], puzzleTiles[emptyIdx]];
        puzzleMovesCount++;
        document.getElementById('puzzleMoves').textContent = puzzleMovesCount;
        renderPuzzleBoard();

        // Check if solved: [1,2,3,4,5,6,7,8,0]
        const isSolved = puzzleTiles.every((val, i) => (i === 8 ? val === 0 : val === i + 1));
        if (isSolved) {
          SoundEffects.playFanfare();
          addPlayerXp(60);
          document.getElementById('finalPuzzleMoves').textContent = puzzleMovesCount;
          document.getElementById('puzzleVictory').classList.remove('d-none');
        }
      } else {
        SoundEffects.playWrong();
      }
    }

    // On Load
    document.addEventListener('DOMContentLoaded', () => {
      const isProfileReady = loadUserData();
      if (isProfileReady) hideRegistrationModal();
      else openRegistrationModal(false);
      initHiddenObjectGame();
    });
  </script>
EOD;

require __DIR__ . '/partials/footer.php';
