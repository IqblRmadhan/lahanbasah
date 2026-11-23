<?php
/**
 * Shared Footer & Core Scripts Partial
 * Lahan Basah Hijau - Professional & Child-Friendly
 *
 * Variables:
 *   $extraScripts (string) : Optional page-specific inline scripts or script tags
 */
?>
<!-- Floating Persistent Audio Dock & Toast -->
<div class="music-dock" id="music-dock" role="button" tabindex="0" aria-label="Putar atau matikan musik alam" title="Musik Alam Lahan Basah">
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

<!-- Site Footer -->
<footer class="custom-footer site-footer">
  <div class="footer-top-wave" aria-hidden="true">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
      <path d="M985.66,92.83C906.67,72,823.78,31,743.84,14.19c-82.26-17.34-168.06-16.33-250.45.39-57.84,11.73-114,31.07-172,41.86A600.21,600.21,0,0,1,0,27.35V120H1200V95.8C1132.19,118.92,1055.71,111.31,985.66,92.83Z" class="shape-fill"></path>
    </svg>
  </div>

  <div class="container footer-content">
    <div class="row g-4 align-items-start">
      <div class="col-lg-5">
        <a href="index.php" class="footer-logo-link">
          <img src="foto/logo.webp" alt="Logo Lahan Basah Hijau" width="48" height="48" />
          <span class="footer-brand">Lahan Basah Hijau</span>
        </a>
        <p class="footer-desc mt-3 mb-0">Media belajar IPAS berbasis STEM ramah anak untuk mengenal, mencintai, dan menjaga kelestarian ekosistem lahan basah Indonesia.</p>
      </div>

      <div class="col-6 col-lg-3">
        <div class="footer-heading">Belajar</div>
        <a href="materi.php" class="footer-link"><i class="bi bi-book-fill me-1 text-success"></i> Materi</a>
        <a href="simulasi.php" class="footer-link"><i class="bi bi-bezier2 me-1 text-success"></i> Simulasi</a>
        <a href="proyek.php" class="footer-link"><i class="bi bi-lightbulb-fill me-1 text-success"></i> Proyek STEM</a>
      </div>

      <div class="col-6 col-lg-4">
        <div class="footer-heading">Aktivitas</div>
        <a href="kuis.php" class="footer-link"><i class="bi bi-controller me-1 text-success"></i> Kuis & Games</a>
        <a href="leaderboard.php" class="footer-link"><i class="bi bi-trophy-fill me-1 text-success"></i> Papan Peringkat</a>
        <div class="footer-note mt-2"><i class="bi bi-mortarboard-fill text-warning me-1"></i> IPAS Kelas V SD • Kurikulum Merdeka</div>
      </div>
    </div>

    <div class="footer-bottom d-flex flex-wrap justify-content-between gap-2 mt-4 pt-3 border-top border-white-10">
      <span>© <?= date('Y') ?> Lahan Basah Hijau</span>
      <span>Dibuat dengan kasih untuk pendidikan lingkungan Indonesia 🌿</span>
    </div>
  </div>
</footer>

<!-- Core Script Bundles -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
<script src="sfx.js?v=4.0"></script>
<script>
  if (typeof AOS !== 'undefined') {
    AOS.init({ duration: 700, once: true, easing: 'ease-out-cubic' });
  }
</script>

<!-- Page-Specific Extra Scripts -->
<?= $extraScripts ?? '' ?>
</body>
</html>
