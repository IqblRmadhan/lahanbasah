<?php
/**
 * Shared Hero Section Component - Consistent Across All Pages
 * Lahan Basah Hijau - Professional & Child-Friendly
 *
 * Variables:
 *   $heroTag      : Badge text/HTML (e.g. '<i class="bi bi-stars"></i> Belajar Sambil Bermain!')
 *   $heroTitle    : Main heading HTML (e.g. 'Harmoni dalam <span class="highlight">Ekosistem Lahan Basah</span>')
 *   $heroSubtitle : Description paragraph
 *   $heroMascot   : Path to mascot image on the right (e.g. 'foto/children.webp')
 *   $heroMascotAlt: Alt text for mascot
 *   $heroCta      : Optional HTML for action buttons
 */
$heroTag       = $heroTag ?? '<i class="bi bi-mortarboard-fill me-1"></i> IPAS Kelas V SD • Kurikulum Merdeka';
$heroTitle     = $heroTitle ?? 'Eksplorasi Keajaiban <br><span class="highlight">Lahan Basah Hijau</span>';
$heroSubtitle  = $heroSubtitle ?? 'Belajar interaktif mengenal ekosistem rawa, gambut, dan keanekaragaman hayati Kalimantan.';
$heroMascot    = $heroMascot ?? 'foto/children.webp';
$heroMascotAlt = $heroMascotAlt ?? 'Maskot Belajar';
$heroCta       = $heroCta ?? '';
?>
<section class="hero-section">
  <!-- Floating Background Nature Decor Elements -->
  <img src="foto/cloud1.webp" class="hero-cloud c1" alt="Awan Dekorasi" aria-hidden="true" />
  <img src="foto/cloud2.webp" class="hero-cloud c2" alt="Awan Dekorasi" aria-hidden="true" />
  <img src="foto/daun1.webp" class="hero-floating-leaf leaf1" alt="Daun Hijau" aria-hidden="true" />
  <img src="foto/daun2.webp" class="hero-floating-leaf leaf2" alt="Daun Hijau" aria-hidden="true" />

  <!-- Right Mascot (Child-friendly accent) -->
  <?php if (!empty($heroMascot) && file_exists(__DIR__ . '/../' . $heroMascot)): ?>
    <img src="<?= htmlspecialchars($heroMascot) ?>" class="hero-mascot-right" alt="<?= htmlspecialchars($heroMascotAlt) ?>" data-aos="fade-left" data-aos-duration="1000" />
  <?php endif; ?>

  <div class="container hero-content">
    <div class="hero-tag" data-aos="fade-down">
      <?= $heroTag ?>
    </div>

    <h1 class="hero-title" data-aos="zoom-in" data-aos-duration="800">
      <?= $heroTitle ?>
    </h1>

    <p class="hero-subtitle" data-aos="fade-up" data-aos-delay="100">
      <?= $heroSubtitle ?>
    </p>

    <?php if (!empty($heroCta)): ?>
      <div class="d-flex flex-wrap justify-content-center gap-3 mb-2" data-aos="fade-up" data-aos-delay="200">
        <?= $heroCta ?>
      </div>
    <?php endif; ?>
  </div>

  <!-- Organic Wave Bottom Divider -->
  <div class="hero-wave-divider" aria-hidden="true">
    <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
      <path d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V120H0V95.8C59.71,118.08,130.83,121.31,200,105,242.79,94.92,284.28,74.58,321.39,56.44Z" class="shape-fill"></path>
    </svg>
  </div>
</section>
