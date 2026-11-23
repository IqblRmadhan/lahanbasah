<?php
/**
 * Lahan Basah Hijau - Papan Peringkat & Prestasi Siswa
 * Kurikulum Merdeka IPAS Kelas V SD
 */
$pageTitle = 'Papan Peringkat & Prestasi Siswa - Lahan Basah Hijau';
$pageDesc  = 'Pantau skor kuis, koleksi lencana prestasi, dan peringkat penjelajah ekosistem lahan basah se-Indonesia.';
$activePage = 'leaderboard';
$bodyClass  = 'leaderboard-page';

$extraHead = <<<'EOD'
<style>
    /* Specific styles for Leaderboard */
    .leaderboard-container {
      max-width: 900px;
      margin: -40px auto 50px;
      position: relative;
      z-index: 10;
      padding: 0 15px;
    }

    .glass-leaderboard-card {
      background: rgba(255, 255, 255, 0.95);
      backdrop-filter: blur(16px);
      border: 1px solid rgba(16, 185, 129, 0.2);
      border-radius: var(--radius-xl);
      padding: 38px 32px;
      box-shadow: 0 15px 35px rgba(6, 78, 59, 0.08);
    }

    /* Podium Top 3 */
    .podium-wrapper {
      display: flex;
      align-items: flex-end;
      justify-content: center;
      gap: 16px;
      margin: 30px auto 40px;
      max-width: 650px;
    }

    .podium-col {
      flex: 1;
      display: flex;
      flex-direction: column;
      align-items: center;
      text-align: center;
    }

    .podium-avatar {
      width: 72px;
      height: 72px;
      border-radius: var(--radius-pill);
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 2.2rem;
      margin-bottom: 8px;
      box-shadow: var(--shadow-md);
      position: relative;
      background: #ffffff;
      transition: transform 0.3s ease;
    }

    .podium-col.rank-1 .podium-avatar {
      width: 90px;
      height: 90px;
      font-size: 2.7rem;
      border: 4px solid #f59e0b;
      box-shadow: 0 0 25px rgba(245, 158, 11, 0.45);
      animation: floatSubtle 3s ease-in-out infinite;
    }

    .podium-col.rank-2 .podium-avatar {
      border: 4px solid #94a3b8;
    }

    .podium-col.rank-3 .podium-avatar {
      border: 4px solid #b45309;
    }

    .crown-icon {
      position: absolute;
      top: -24px;
      font-size: 1.8rem;
    }

    .podium-name {
      font-family: var(--font-display);
      font-size: 1.05rem;
      font-weight: 700;
      color: #0f172a;
      line-height: 1.2;
      max-width: 140px;
      overflow: hidden;
      text-overflow: ellipsis;
      white-space: nowrap;
    }

    .podium-school {
      font-size: 0.75rem;
      color: var(--text-muted);
      max-width: 130px;
      overflow: hidden;
      text-overflow: ellipsis;
      white-space: nowrap;
      margin-bottom: 8px;
    }

    .podium-pedestal {
      width: 100%;
      border-radius: var(--radius-md) var(--radius-md) 0 0;
      color: #ffffff;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      font-family: var(--font-display);
      padding: 16px 10px;
      box-shadow: var(--shadow-sm);
    }

    .podium-col.rank-1 .podium-pedestal {
      height: 145px;
      background: linear-gradient(180deg, #f59e0b 0%, #d97706 100%);
    }

    .podium-col.rank-2 .podium-pedestal {
      height: 110px;
      background: linear-gradient(180deg, #94a3b8 0%, #64748b 100%);
    }

    .podium-col.rank-3 .podium-pedestal {
      height: 85px;
      background: linear-gradient(180deg, #d97706 0%, #92400e 100%);
    }

    .pedestal-rank-num {
      font-size: 2.3rem;
      font-weight: 800;
      line-height: 1;
    }

    .pedestal-score-badge {
      background: rgba(255, 255, 255, 0.25);
      border-radius: var(--radius-pill);
      padding: 3px 12px;
      font-size: 0.85rem;
      font-weight: 700;
      margin-top: 4px;
    }

    /* List Table / Cards */
    .ranking-item-card {
      background: #ffffff;
      border: 1px solid #e2e8f0;
      border-radius: var(--radius-md);
      padding: 14px 20px;
      margin-bottom: 10px;
      display: flex;
      align-items: center;
      gap: 16px;
      transition: all 0.25s ease;
      box-shadow: var(--shadow-sm);
    }

    .ranking-item-card:hover {
      transform: translateX(6px);
      border-color: #10b981;
      box-shadow: var(--shadow-md);
    }

    .rank-number-pill {
      width: 38px;
      height: 38px;
      border-radius: var(--radius-pill);
      background: #f1f5f9;
      color: #334155;
      font-family: var(--font-display);
      font-weight: 700;
      font-size: 1.1rem;
      display: flex;
      align-items: center;
      justify-content: center;
      flex-shrink: 0;
    }

    .ranking-score-pill {
      background: #d1fae5;
      color: #065f46;
      font-family: var(--font-display);
      font-weight: 700;
      font-size: 0.95rem;
      padding: 6px 14px;
      border-radius: var(--radius-pill);
      border: 1px solid #a7f3d0;
      white-space: nowrap;
    }

    /* Search Box */
    .search-filter-input {
      border-radius: var(--radius-pill);
      padding: 12px 20px;
      border: 1px solid #cbd5e1;
      box-shadow: var(--shadow-sm);
      font-size: 0.95rem;
    }
  </style>
EOD;

require __DIR__ . '/partials/head.php';
require __DIR__ . '/partials/navbar.php';

// Unified Hero Banner
$heroTag       = '<i class="bi bi-trophy-fill me-1 text-warning"></i> Papan Bintang Prestasi';
$heroTitle     = 'Peringkat & Prestasi <br><span class="highlight">Sahabat Lahan Basah</span>';
$heroSubtitle  = 'Lihat pencapaian terbaikmu dan teman-teman se-Indonesia dalam kuis, eksplorasi ekosistem, dan proyek sains pelestarian rawa!';
$heroMascot    = 'foto/leaderboard.webp';
$heroMascotAlt = 'Maskot Juara Lahan Basah';
$heroCta       = '
  <a href="kuis.php" class="btn-eco-primary btn-sm px-4">
    <i class="bi bi-controller"></i> Tambah Skor di Kuis
  </a>
  <a href="proyek.php" class="btn-eco-outline btn-sm px-4">
    <i class="bi bi-lightbulb-fill"></i> Kirim Proyek STEM
  </a>
';
require __DIR__ . '/partials/hero.php';
?>

<div class="leaderboard-container" id="leaderboardList">
    <div class="glass-leaderboard-card" data-aos="fade-up">

      <div class="text-center mb-4">
      <h3 class="display-font text-success mb-1"><img src="foto/leaderboard.webp" class="ui-2d-thumb ui-2d-thumb-sm" alt="" /> Panggung Juara Teratas</h3>
        <p class="text-muted small">Peringkat diambil dari hasil kuis yang tersimpan di browser perangkat ini.</p>
      </div>

      <!-- Loading Spinner -->
      <div id="leaderboardLoading" class="text-center my-5">
        <div class="spinner-border text-success" role="status">
          <span class="visually-hidden">Memuat data skor...</span>
        </div>
        <p class="text-muted small mt-2">Sedang mengambil data peringkat terbaru...</p>
      </div>

      <!-- Top 3 Podium -->
      <div class="podium-wrapper" id="podiumArea" style="display:none;">
        
        <!-- Juara 2 (Perak) -->
        <div class="podium-col rank-2">
            <div class="podium-avatar"><i class="bi bi-award-fill text-secondary"></i></div>
          <div class="podium-name" id="p2Name">-</div>
          <div class="podium-school" id="p2School">-</div>
          <div class="podium-pedestal">
            <span class="pedestal-rank-num">2</span>
            <span class="pedestal-score-badge" id="p2Score">0 Pts</span>
          </div>
        </div>

        <!-- Juara 1 (Emas) -->
        <div class="podium-col rank-1">
          <div class="podium-avatar">
            <span class="crown-icon"><i class="bi bi-gem"></i></span>
            <i class="bi bi-trophy-fill text-warning"></i>
          </div>
          <div class="podium-name" id="p1Name">-</div>
          <div class="podium-school" id="p1School">-</div>
          <div class="podium-pedestal">
            <span class="pedestal-rank-num">1</span>
            <span class="pedestal-score-badge" id="p1Score">0 Pts</span>
          </div>
        </div>

        <!-- Juara 3 (Perunggu) -->
        <div class="podium-col rank-3">
            <div class="podium-avatar"><i class="bi bi-award-fill" style="color:#b86b38"></i></div>
          <div class="podium-name" id="p3Name">-</div>
          <div class="podium-school" id="p3School">-</div>
          <div class="podium-pedestal">
            <span class="pedestal-rank-num">3</span>
            <span class="pedestal-score-badge" id="p3Score">0 Pts</span>
          </div>
        </div>

      </div>

      <!-- Search & Filter Bar -->
      <div class="mb-4">
        <div class="input-group">
          <span class="input-group-text bg-white border-end-0 rounded-start-pill ps-4 text-muted">
            <i class="bi bi-search"></i>
          </span>
          <input type="text" class="form-control search-filter-input border-start-0 rounded-end-pill pe-4" id="searchInput" placeholder="Cari nama peserta atau nama sekolah..." oninput="filterLeaderboard()" />
        </div>
      </div>

      <!-- Rankings List (Rank 4 to 10+) -->
      <div id="rankingListContainer">
        <!-- Diinjeksi otomatis oleh JS -->
      </div>

      <!-- Call to Action Footer Card -->
      <div class="p-4 bg-success-subtle rounded-4 border border-success-subtle text-center mt-4">
          <h5 class="fw-bold text-success mb-2">Ingin Namamu Masuk Papan Juara? <i class="bi bi-rocket-takeoff-fill"></i></h5>
        <p class="text-muted small mb-3">Tunjukkan kemampuanmu dalam Kuis Interaktif Lahan Basah sekarang juga!</p>
        <a href="kuis.php" class="btn-eco-primary">
          <i class="bi bi-lightning-charge-fill"></i> Mulai Kerjakan Kuis Sekarang
        </a>
      </div>

    </div>
  </div>

  <!-- ==========================================================================
       FLOATING MUSIC DOCK & TOAST
       ========================================================================== -->
  <!-- Floating Audio Dock -->
  <div class="music-dock" id="music-dock" title="Putar / Hentikan Musik Alam">
    <button id="music-toggle" class="music-btn" aria-label="Toggle Musik">
      <i id="music-icon" class="bi bi-volume-mute-fill"></i>
    </button>
    <div class="sound-bars">
      <div class="sound-bar"></div>
      <div class="sound-bar"></div>
      <div class="sound-bar"></div>
    </div>
    <span class="music-label d-none d-sm-inline">Musik</span>
  </div>
  <audio id="bg-music" loop preload="auto">
    <source src="sound/sound2.mp3" type="audio/mpeg" />
  </audio>
  <div id="music-toast" class="music-toast-popup"></div>

  <!-- ==========================================================================
       FOOTER
       ========================================================================== -->

<?php
$extraScripts = <<<'EOD'
<script>
    AOS.init({ duration: 800, once: true });

    const QUIZ_STORAGE_KEY = "lahanBasahQuizResults";

    let allLeaderboardData = [];

    function renderLeaderboard() {
      const loading = document.getElementById("leaderboardLoading");
      const podiumArea = document.getElementById("podiumArea");
      const listContainer = document.getElementById("rankingListContainer");

      loading.style.display = "block";

      try {
        const rawData = JSON.parse(localStorage.getItem(QUIZ_STORAGE_KEY)) || {};
        const data = Object.values(rawData)
          .filter(item => item && item.nama && item.skor !== undefined)
          .map(item => ({
            nama: item.nama,
            skor: Number(item.skor),
            sekolah: item.sekolah || "-",
            waktu: item.waktu || null
          }))
          .sort((a, b) => b.skor - a.skor || new Date(a.waktu || 0) - new Date(b.waktu || 0));

        loading.style.display = "none";
        allLeaderboardData = data;

        if (data.length === 0) {
          podiumArea.style.display = "none";
          listContainer.innerHTML = `<div class="text-center py-5 text-muted">
              <img src="foto/asetgame/Teratai.webp" class="ui-2d-thumb ui-2d-thumb-lg d-block mx-auto mb-2" alt="Ilustrasi lahan basah" />
            Belum ada hasil kuis di perangkat ini. Jadilah yang pertama!
          </div>`;
          return;
        }

        displayData(allLeaderboardData);
      } catch (error) {
        loading.style.display = "none";
        podiumArea.style.display = "none";
        listContainer.innerHTML = `<p class="text-danger text-center">Data lokal tidak dapat dibaca.</p>`;
        console.error("Gagal membaca papan peringkat lokal:", error);
      }
    }

    function displayData(data) {
      const podiumArea = document.getElementById("podiumArea");
      const listContainer = document.getElementById("rankingListContainer");
      listContainer.innerHTML = "";

      if (data.length === 0) {
        podiumArea.style.display = "none";
        listContainer.innerHTML = `<p class="text-center text-muted py-4">Tidak ada data yang cocok dengan pencarian.</p>`;
        return;
      }

      if (data.length >= 1) {
        podiumArea.style.display = "flex";
        
        // Juara 1
        document.getElementById("p1Name").textContent = data[0].nama;
        document.getElementById("p1School").textContent = data[0].sekolah;
        document.getElementById("p1Score").textContent = `${data[0].skor} / 12`;

        // Juara 2
        if (data.length >= 2) {
          document.getElementById("p2Name").textContent = data[1].nama;
          document.getElementById("p2School").textContent = data[1].sekolah;
          document.getElementById("p2Score").textContent = `${data[1].skor} / 12`;
        } else {
          document.getElementById("p2Name").textContent = "-";
          document.getElementById("p2School").textContent = "-";
          document.getElementById("p2Score").textContent = "-";
        }

        // Juara 3
        if (data.length >= 3) {
          document.getElementById("p3Name").textContent = data[2].nama;
          document.getElementById("p3School").textContent = data[2].sekolah;
          document.getElementById("p3Score").textContent = `${data[2].skor} / 12`;
        } else {
          document.getElementById("p3Name").textContent = "-";
          document.getElementById("p3School").textContent = "-";
          document.getElementById("p3Score").textContent = "-";
        }
      }

      const restData = data.slice(3, 25);
      if (restData.length > 0) {
        restData.forEach((item, index) => {
          const rank = index + 4;
          const card = document.createElement("div");
          card.className = "ranking-item-card";

          card.innerHTML = `
            <div class="rank-number-pill">#${rank}</div>
            <div class="flex-grow-1">
              <div class="fw-bold text-dark fs-6">${escapeHtml(item.nama)}</div>
              <small class="text-muted"><i class="bi bi-building"></i> ${escapeHtml(item.sekolah)}</small>
            </div>
            <div class="ranking-score-pill">
                <i class="bi bi-star-fill text-warning me-1"></i>${item.skor} / 12
            </div>
          `;

          listContainer.appendChild(card);
        });
      }
    }

    function filterLeaderboard() {
      const query = document.getElementById("searchInput").value.toLowerCase().trim();
      if (!query) {
        displayData(allLeaderboardData);
        return;
      }

      const filtered = allLeaderboardData.filter(item => 
        item.nama.toLowerCase().includes(query) ||
        item.sekolah.toLowerCase().includes(query)
      );

      displayData(filtered);
    }

    function escapeHtml(str) {
      if (!str) return "";
      return str.replace(/&/g, "&amp;").replace(/</g, "&lt;").replace(/>/g, "&gt;").replace(/"/g, "&quot;");
    }

    document.addEventListener("DOMContentLoaded", () => {
      renderLeaderboard();
    });
  </script>
EOD;

require __DIR__ . '/partials/footer.php';
