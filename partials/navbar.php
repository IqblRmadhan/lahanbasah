<?php
/**
 * Shared Navbar Component - Glassmorphic & Sticky
 * Lahan Basah Hijau - STEM Interaktif
 *
 * Variable:
 *   $activePage (string) : 'home' | 'materi' | 'kuis' | 'simulasi' | 'proyek' | 'leaderboard'
 */
$activePage = $activePage ?? '';
$navigationItems = [
    'home'        => ['index.php', 'bi-house-door-fill', 'Beranda'],
    'materi'      => ['materi.php', 'bi-book-fill', 'Materi'],
    'kuis'        => ['kuis.php', 'bi-controller', 'Kuis & Games'],
    'simulasi'    => ['simulasi.php', 'bi-bezier2', 'Simulasi'],
    'proyek'      => ['proyek.php', 'bi-lightbulb-fill', 'Proyek'],
    'leaderboard' => ['leaderboard.php', 'bi-trophy-fill', 'Peringkat'],
];
?>
<nav class="navbar navbar-expand-lg custom-navbar sticky-top" aria-label="Navigasi utama">
  <div class="container">
    <a class="brand-wrapper" href="index.php" title="Menuju Beranda Lahan Basah Hijau">
      <img src="foto/logo.webp" alt="Logo Lahan Basah Hijau" class="brand-logo-img" width="44" height="44" />
      <div class="brand-text">
        <span>Lahan Basah Hijau</span>
        <span class="brand-badge"><i class="bi bi-tree-fill me-1"></i> STEM Interaktif</span>
      </div>
    </a>

    <button class="navbar-toggler border-0 shadow-none p-2" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Buka navigasi menu">
      <i class="bi bi-list fs-2 text-success"></i>
    </button>

    <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
      <ul class="navbar-nav custom-nav-pills mt-3 mt-lg-0">
        <?php foreach ($navigationItems as $pageKey => [$url, $icon, $label]): ?>
          <li class="nav-item">
            <a class="nav-link<?= $activePage === $pageKey ? ' active' : '' ?>" href="<?= htmlspecialchars($url) ?>"<?= $activePage === $pageKey ? ' aria-current="page"' : '' ?>>
              <i class="bi <?= htmlspecialchars($icon) ?>"></i><span><?= htmlspecialchars($label) ?></span>
            </a>
          </li>
        <?php endforeach; ?>
      </ul>
    </div>
  </div>
</nav>
