<?php
/**
 * Lahan Basah Hijau - Beranda Utama
 * Platform Pembelajaran STEM Interaktif Berbasis Lingkungan Lahan Basah Kalimantan
 * Kurikulum Merdeka IPAS Kelas V SD
 */
$pageTitle = 'Lahan Basah Hijau - Pembelajaran STEM Interaktif Berbasis Lingkungan';
$pageDesc  = 'Eksplorasi ekosistem rawa, gambut, dan keanekaragaman hayati Kalimantan dengan simulasi, modul, game, dan proyek sains ramah anak.';
$activePage = 'home';
$bodyClass  = 'home-page';

require __DIR__ . '/partials/head.php';
require __DIR__ . '/partials/navbar.php';

// Konfigurasi Hero Banner Beranda
$heroTag       = '<i class="bi bi-stars text-warning me-1"></i> Belajar Sambil Bermain!';
$heroTitle     = 'Eksplorasi Keajaiban <br><span class="highlight">Lahan Basah Hijau</span>';
$heroSubtitle  = 'Kenali ekosistem rawa, gambut, dan hutan mangrove melalui petualangan edukatif STEM. Pelajari bagaimana sains dan teknologi mampu menjaga kelestarian air dan bumi kita bersama!';
$heroMascot    = 'foto/children.webp';
$heroMascotAlt = 'Anak-anak Belajar Alam';
$heroCta       = '
  <a href="materi.php" class="btn-eco-primary">
    <i class="bi bi-book-half"></i> Mulai Belajar Modul
  </a>
  <a href="kuis.php" class="btn-eco-outline">
    <i class="bi bi-joystick"></i> Main Game Kuis
  </a>
';

require __DIR__ . '/partials/hero.php';
?>

<!-- ==========================================================================
     PETA PETUALANGAN BELAJAR (JOURNEY MAP)
     ========================================================================== -->
<section class="home-journey-section">
  <div class="container">
    <div class="home-journey-shell">
      <div class="home-journey-intro">
        <span class="home-eyebrow"><i class="bi bi-map-fill"></i> Peta Petualangan</span>
        <h2>Pilih petualanganmu!</h2>
        <p>Ikuti jejak Kodokko dan Bango. Belajar, mencoba, bermain, lalu membuat karya untuk menjaga lahan basah.</p>
        <div class="home-journey-friends" aria-label="Kodokko dan Bango mengajak belajar">
          <img src="foto-simulasi/katak.webp" alt="Kodokko si katak">
          <div class="home-speech">Ayo mulai!<span>Petualangan seru menunggumu.</span></div>
          <img src="foto-simulasi/bangau.webp" alt="Bango si bangau">
        </div>
        <div class="home-stem-line" aria-label="Empat pilar STEM">
          <span>Sains</span><i></i><span>Teknologi</span><i></i><span>Rekayasa</span><i></i><span>Matematika</span>
        </div>
      </div>

      <nav class="home-path-list" aria-label="Pilihan aktivitas belajar">
        <a href="materi.php" class="home-path-link">
          <span class="home-path-number">01</span>
          <span><strong>Pelajari Materi</strong><small>Enam modul ekosistem dan siklus air</small></span>
          <i class="bi bi-arrow-right"></i>
        </a>
        <a href="simulasi.php" class="home-path-link">
          <span class="home-path-number">02</span>
          <span><strong>Coba Simulasi</strong><small>Amati hubungan sebab-akibat di lahan basah</small></span>
          <i class="bi bi-arrow-right"></i>
        </a>
        <a href="kuis.php" class="home-path-link">
          <span class="home-path-number">03</span>
          <span><strong>Uji Pemahaman</strong><small>Mainkan kuis dan kumpulkan skor terbaik</small></span>
          <i class="bi bi-arrow-right"></i>
        </a>
        <a href="proyek.php" class="home-path-link">
          <span class="home-path-number">04</span>
          <span><strong>Buat Proyek</strong><small>Terapkan pengetahuan menjadi karya nyata</small></span>
          <i class="bi bi-arrow-right"></i>
        </a>
      </nav>
    </div>
  </div>
</section>

<?php require __DIR__ . '/partials/footer.php'; ?>
