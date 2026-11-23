<?php
/**
 * Lahan Basah Hijau - Simulasi Ekosistem Interaktif
 * Kurikulum Merdeka IPAS Kelas V SD
 */
$pageTitle = 'Simulasi Keseimbangan Ekosistem Lahan Basah - IPAS SD';
$pageDesc  = 'Laboratorium interaktif ramah anak untuk mengamati hubungan sebab-akibat, rantai makanan, dan kelestarian ekosistem rawa gambut Kalimantan.';
$activePage = 'simulasi';
$bodyClass  = 'simulasi-page';

$extraHead = <<<'EOD'
<style>
    /* Specific styles for Simulasi */
    .simulasi-main-card {
      background: rgba(255, 255, 255, 0.95);
      backdrop-filter: blur(14px);
      border: 1px solid rgba(16, 185, 129, 0.2);
      border-radius: var(--radius-xl);
      padding: 38px 30px;
      box-shadow: 0 15px 35px rgba(6, 78, 59, 0.08);
    }

    /* Story Card */
    .story-card-wrapper {
      background: linear-gradient(135deg, #ffffff 0%, #f0fdf4 100%);
      border: 2px solid #a7f3d0;
      border-radius: var(--radius-xl);
      padding: 30px;
      box-shadow: var(--shadow-sm);
    }

    .story-character-avatar {
      width: 75px;
      height: 75px;
      object-fit: contain;
      filter: drop-shadow(0 4px 6px rgba(0, 0, 0, 0.1));
    }

    .speech-bubble {
      background: #ffffff;
      border: 1px solid #e2e8f0;
      border-radius: var(--radius-md);
      padding: 14px 18px;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.04);
      position: relative;
      font-size: 0.95rem;
    }

    /* Eco-Barometer */
    .eco-meter-box {
      background: #ffffff;
      border: 1px solid #e2e8f0;
      border-radius: var(--radius-lg);
      padding: 22px 26px;
      box-shadow: var(--shadow-sm);
      margin-bottom: 24px;
    }

    .meter-progress {
      height: 16px;
      border-radius: var(--radius-pill);
      background: #e2e8f0;
      overflow: hidden;
      margin-top: 10px;
    }

    .meter-bar {
      height: 100%;
      width: 65%;
      border-radius: var(--radius-pill);
      transition: width 0.6s cubic-bezier(0.34, 1.56, 0.64, 1), background-color 0.4s ease;
    }

    /* Telemetry Pill Grid */
    .telemetry-pill-card {
      background: #f8fafc;
      border: 1px solid #e2e8f0;
      border-radius: var(--radius-md);
      padding: 14px 18px;
      text-align: center;
      transition: all 0.3s ease;
    }

    .telemetry-pill-card:hover {
      border-color: #10b981;
      background: #ffffff;
      box-shadow: var(--shadow-sm);
    }

    /* Ecosystem Stage */
    .ecosystem-stage {
      position: relative;
      min-height: 330px;
      border-radius: var(--radius-lg);
      overflow: hidden;
      border: 3px dashed #10b981;
      background: #f0fdf4;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      padding: 24px;
      text-align: center;
      transition: all 0.3s ease;
      background-size: cover;
      background-position: center;
    }

    .ecosystem-stage.highlight-active {
      border-color: #059669;
      background-color: #d1fae5;
      box-shadow: 0 0 25px rgba(16, 185, 129, 0.4);
      transform: scale(1.01);
    }

    .stage-bg-image {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      object-fit: cover;
      opacity: 0.35;
      z-index: 1;
      pointer-events: none;
      transition: filter 0.5s ease;
    }

    .stage-content {
      position: relative;
      z-index: 2;
    }

    .stage-characters {
      display: flex;
      gap: 32px;
      justify-content: center;
      align-items: flex-end;
      margin-bottom: 16px;
    }

    .stage-mascot {
      height: 105px;
      width: auto;
      object-fit: contain;
      filter: drop-shadow(0 6px 12px rgba(0,0,0,0.18));
      transition: transform 0.4s cubic-bezier(0.34, 1.56, 0.64, 1);
    }

    /* Impact Box */
    .impact-result-box {
      border-radius: var(--radius-lg);
      padding: 20px 24px;
      min-height: 80px;
      display: flex;
      align-items: center;
      justify-content: center;
      text-align: center;
      font-size: 1.05rem;
      font-weight: 600;
      box-shadow: var(--shadow-sm);
      transition: all 0.4s ease;
      margin-bottom: 24px;
    }

    /* Activity Cards */
    .activity-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
      gap: 16px;
    }

    .activity-card {
      background: #ffffff;
      border: 2px solid #e2e8f0;
      border-radius: var(--radius-md);
      padding: 16px;
      cursor: grab;
      user-select: none;
      display: flex;
      align-items: center;
      gap: 14px;
      box-shadow: var(--shadow-sm);
      transition: all 0.3s cubic-bezier(0.34, 1.56, 0.64, 1);
      position: relative;
    }

    .activity-card:hover {
      transform: translateY(-5px);
      box-shadow: var(--shadow-md);
      border-color: #10b981;
    }

    .activity-card:active {
      cursor: grabbing;
      transform: scale(0.98);
    }

    .activity-card img {
      width: 52px;
      height: 52px;
      object-fit: contain;
      flex-shrink: 0;
      transition: transform 0.3s ease;
    }

    .activity-card:hover img {
      transform: scale(1.12) rotate(4deg);
    }

    .activity-title {
      font-family: var(--font-display);
      font-size: 1.05rem;
      font-weight: 700;
      color: #0f172a;
      line-height: 1.2;
      margin-bottom: 4px;
    }

    .activity-badge {
      font-size: 0.72rem;
      font-weight: 700;
      padding: 2px 8px;
      border-radius: var(--radius-pill);
      display: inline-block;
    }

    .badge-positive {
      background: #dcfce7;
      color: #15803d;
    }

    .badge-negative {
      background: #fee2e2;
      color: #b91c1c;
    }

    .cert-award-banner {
      background: linear-gradient(135deg, #fef3c7, #fef9c3);
      border: 2px dashed #f59e0b;
      border-radius: var(--radius-lg);
      padding: 20px;
      text-align: center;
      display: none;
      margin-bottom: 24px;
      animation: floatSubtle 3s ease-in-out infinite;
    }
  </style>
EOD;

require __DIR__ . '/partials/head.php';
require __DIR__ . '/partials/navbar.php';

// Unified Hero Banner
$heroTag       = '<i class="bi bi-bezier2 me-1 text-warning"></i> Laboratorium Digital Interaktif';
$heroTitle     = 'Simulasi Keseimbangan <br><span class="highlight">Ekosistem Lahan Basah</span>';
$heroSubtitle  = 'Uji coba aksi nyata: amati dampak vegetasi, ketinggian air rawa, dan tindakan manusia terhadap kelestarian alam rawa gambut Kalimantan.';
$heroMascot    = 'foto-simulasi/katak.webp';
$heroMascotAlt = 'Kodokko Penjaga Rawa';
$heroCta       = '
  <a href="#labArea" class="btn-eco-primary btn-sm px-4">
    <i class="bi bi-play-circle-fill"></i> Mulai Simulasi
  </a>
  <a href="materi.php" class="btn-eco-outline btn-sm px-4">
    <i class="bi bi-book-half"></i> Pelajari Teori Dulu
  </a>
';
require __DIR__ . '/partials/hero.php';
?>

<main class="eco-stage-container" id="labArea">
    <div class="simulasi-main-card" data-aos="fade-up">

      <!-- Eco-Certificate Banner (Muncul saat kesehatan >= 85%) -->
      <div class="cert-award-banner" id="certBanner">
        <img src="foto/leaderboard.webp" class="ui-2d-thumb ui-2d-thumb-lg d-block mx-auto mb-1" alt="Ilustrasi penghargaan" />
        <h4 class="fw-bold text-success mb-1">Selamat! Kamu Mendapat Predikat Penjaga Ekosistem Teladan!</h4>
        <p class="small text-muted mb-0">Tindakan pelestarianmu berhasil memulihkan habitat Kodokko & Bango hingga di atas 85%.</p>
      </div>

      <!-- Eco-Barometer (Kesehatan Ekosistem) -->
      <div class="eco-meter-box">
        <div class="d-flex flex-wrap justify-content-between align-items-center gap-2">
          <div>
            <h5 class="display-font text-success mb-0">
              <i class="bi bi-speedometer2"></i> Barometer Kesehatan Ekosistem
            </h5>
            <small class="text-muted" id="meterDesc">Kondisi saat ini: Stabil (Perlu dijaga)</small>
          </div>
          <div class="d-flex align-items-center gap-2">
            <span class="fs-4 fw-bold text-success" id="meterValue">65%</span>
            <button class="btn btn-sm btn-outline-secondary rounded-pill px-3" onclick="resetSimulasi()" title="Reset ke kondisi awal">
              <i class="bi bi-arrow-counterclockwise"></i> Reset
            </button>
          </div>
        </div>

        <div class="meter-progress">
          <div class="meter-bar bg-success" id="meterBar" style="width: 65%;"></div>
        </div>
        <small class="text-muted d-block mt-2">Catatan: persentase ini adalah indikator dalam model pembelajaran, bukan hasil pengukuran lingkungan nyata.</small>

        <!-- 3 Telemetri Parameter Lingkungan -->
        <div class="row g-2 mt-3 text-start">
          <div class="col-sm-4">
            <div class="telemetry-pill-card">
              <small class="text-muted d-block"><i class="bi bi-droplet-half text-primary"></i> Komponen Abiotik</small>
              <strong class="fs-6 text-dark" id="paramAir">Air dan tanah cukup baik</strong>
            </div>
          </div>
          <div class="col-sm-4">
            <div class="telemetry-pill-card">
              <small class="text-muted d-block"><i class="bi bi-tree text-success"></i> Komponen Biotik</small>
              <strong class="fs-6 text-dark" id="paramBio">Populasi cukup stabil</strong>
            </div>
          </div>
          <div class="col-sm-4">
            <div class="telemetry-pill-card">
              <small class="text-muted d-block"><i class="bi bi-diagram-3 text-info"></i> Jaring Makanan</small>
              <strong class="fs-6 text-dark" id="paramUdara">Hubungan masih seimbang</strong>
            </div>
          </div>
        </div>
      </div>

      <!-- Area Ekosistem (Drop Zone & Interactive Stage) -->
      <div class="mb-4">
        <div class="d-flex justify-content-between align-items-center mb-2">
          <h5 class="display-font text-primary mb-0">
          <i class="bi bi-flask-fill me-1"></i> Panggung Eksperimen Ekosistem
          </h5>
          <span class="badge bg-light text-muted border">Seret ke sini atau klik kartu aksi di bawah</span>
        </div>

        <div id="area-ekosistem" class="ecosystem-stage">
          <img src="foto-simulasi/background.webp" class="stage-bg-image" id="stageBg" alt="Latar Lahan Basah" />
          
          <div class="stage-content">
            <div class="stage-characters">
              <img src="foto-simulasi/katak.webp" class="stage-mascot" id="mascotKatak" alt="Katak" />
              <img src="foto-simulasi/bangau.webp" class="stage-mascot" id="mascotBangau" alt="Bangau" />
            </div>
            <div class="badge bg-white text-dark shadow-sm px-4 py-2 rounded-pill fs-6" id="stagePrompt">
              <i class="bi bi-hand-index-thumb me-1"></i> Tarik salah satu aktivitas ke area ini atau klik kartu aksi di bawah!
            </div>
          </div>
        </div>
      </div>

      <!-- Dampak Aktivitas (Impact Result Box) -->
      <div>
        <h5 class="display-font text-success mb-2">
          <i class="bi bi-journal-check me-1"></i> Hasil & Dampak Ekologis:
        </h5>
        <div id="dampak-area" class="impact-result-box alert alert-info text-dark">
          <span>Pilih salah satu aktivitas di bawah ini untuk melihat dampaknya bagi Kodokko & Bango!</span>
        </div>
      </div>

      <!-- Daftar Aktivitas (Cards) -->
      <div class="mt-4">
        <h5 class="display-font text-success mb-3">
          <i class="bi bi-tools me-1"></i> Pilihan Tindakan & Aktivitas Manusia:
        </h5>
        <div id="aktivitas-list" class="activity-grid">
          <!-- Diinjeksi otomatis oleh simulasi.js -->
        </div>
      </div>

      <!-- Timeline Log Aktivitas -->
      <div class="mt-4 pt-3 border-top">
        <h6 class="fw-bold text-muted mb-2"><i class="bi bi-clock-history"></i> Log Tindakan Simulasi Terakhir:</h6>
        <div id="logTimeline" style="max-height: 140px; overflow-y: auto;">
          <div class="text-muted small text-center py-2">Belum ada aktivitas yang dijalankan.</div>
        </div>
      </div>

    </div>
  </main>

<?php
$extraScripts = '<script src="simulasi.js"></script>';
require __DIR__ . '/partials/footer.php';
