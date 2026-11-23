<?php
/**
 * Shared HTML Head Partial - Lahan Basah Hijau
 * Unified Design Tokens, Fonts, Viewport, Meta, and Stylesheets
 *
 * Configurable Variables before including:
 *   $pageTitle (string) : Page <title>
 *   $pageDesc  (string) : Meta description
 *   $bodyClass (string) : CSS class for <body> tag
 *   $extraHead (string) : Custom inline <style> or <link> tags
 */
$pageTitle = $pageTitle ?? 'Lahan Basah Hijau - Pembelajaran STEM Ekosistem IPAS SD';
$pageDesc  = $pageDesc  ?? 'Media pembelajaran interaktif STEM ramah anak untuk mengenal, mencintai, dan menjaga kelestarian ekosistem lahan basah Indonesia.';
$bodyClass = $bodyClass ?? '';
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0" />
  <title><?= htmlspecialchars($pageTitle) ?></title>
  <meta name="description" content="<?= htmlspecialchars($pageDesc) ?>" />
  <meta name="theme-color" content="#059669" />

  <!-- Google Fonts: Fredoka (Display Ramah Anak) & Plus Jakarta Sans (Body Super Terbaca) -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Fredoka:wght@500;600;700&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

  <!-- CSS Frameworks & Icon Libraries -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" rel="stylesheet" />

  <!-- Master Design System -->
  <link rel="stylesheet" href="custom.css?v=4.0" />

  <!-- Page-Specific Stylesheets / Inline Overrides -->
  <?= $extraHead ?? '' ?>
</head>
<body class="<?= htmlspecialchars($bodyClass) ?>">
