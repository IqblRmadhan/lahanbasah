// ==========================================================================
// simulasi.js - Professional Interactive Wetland Ecosystem Laboratory
// ==========================================================================

const aktivitas = [
  {
    id: "restorasi",
    nama: "🌱 Restorasi Ekosistem",
    dampak: "positif",
    delta: +20,
    penjelasan: "<strong>🎉 Habitat Dipulihkan!</strong> Tumbuhan lokal menyediakan tempat berlindung dan membantu menjaga tanah tetap lembap. Serangga dan ikan kecil bertambah sehingga makanan katak dan bangau kembali tersedia.",
    icon: "foto-simulasi/restorasi.webp",
    subtext: "+20% Kesehatan Ekosistem",
    air: "Tanah lembap & air terjaga 💧",
    biodiversitas: "Tumbuhan dan hewan pulih 🌿",
    udara: "Rantai makanan menguat 🔗",
    komponen: "Abiotik: air dan tanah. Biotik: tumbuhan air, serangga, ikan, katak, dan bangau.",
    rantai: "Tumbuhan pulih → hewan kecil memperoleh habitat → makanan katak dan bangau bertambah."
  },
  {
    id: "penebangan",
    nama: "🪓 Penebangan Pohon Liar",
    dampak: "negatif",
    delta: -25,
    penjelasan: "<strong>⚠️ Habitat Berkurang!</strong> Penebangan menghilangkan tempat bersarang dan peneduh. Tanah lebih mudah kering atau terkikis, lalu banyak hewan kehilangan tempat hidup dan sumber makanan.",
    icon: "foto-simulasi/penebangan.webp",
    subtext: "-25% Kesehatan Ekosistem",
    air: "Tanah terbuka & air keruh 🟤",
    biodiversitas: "Populasi kehilangan habitat ⚠️",
    udara: "Jaring makanan melemah 📉",
    komponen: "Abiotik: tanah, air, dan cahaya. Biotik: pohon galam, serangga, ikan, dan burung.",
    rantai: "Pohon berkurang → habitat dan makanan hewan kecil berkurang → pemangsa ikut kesulitan makan."
  },
  {
    id: "limbah",
    nama: "🏭 Pembuangan Limbah Kimia",
    dampak: "negatif",
    delta: -30,
    penjelasan: "<strong>☣️ Kualitas Air Menurun!</strong> Zat berbahaya mengubah kondisi air. Plankton, ikan, dan katak dapat sakit atau mati sehingga sumber makanan bagi hewan lain berkurang.",
    icon: "foto-simulasi/limbah.webp",
    subtext: "-30% Kesehatan Ekosistem",
    air: "Air tercemar zat berbahaya 🧪",
    biodiversitas: "Biota air menurun 🐟",
    udara: "Rantai makanan terganggu ⚠️",
    komponen: "Abiotik: kualitas air. Biotik: plankton, ikan, katak, bangau, dan dekomposer.",
    rantai: "Air tercemar → organisme air menurun → katak dan bangau kehilangan makanan."
  },
  {
    id: "edukasi",
    nama: "📚 Edukasi Lingkungan STEM",
    dampak: "positif",
    delta: +15,
    penjelasan: "<strong>🌟 Kebiasaan Baik Menyebar!</strong> Pelajar mengamati lingkungan, mengurangi sampah, dan mengajak keluarga menjaga air. Tekanan terhadap habitat pun berkurang.",
    icon: "foto-simulasi/edukasi.webp",
    subtext: "+15% Kesehatan Ekosistem",
    air: "Sampah di air berkurang 🌊",
    biodiversitas: "Makhluk hidup lebih aman 💚",
    udara: "Hubungan ekosistem terjaga 🔗",
    komponen: "Peran manusia memengaruhi komponen air, tanah, tumbuhan, dan hewan.",
    rantai: "Sampah berkurang → habitat lebih aman → lebih banyak organisme dapat menjalankan perannya."
  },
  {
    id: "pembuangan",
    nama: "🚯 Buang Sampah ke Sungai",
    dampak: "negatif",
    delta: -20,
    penjelasan: "<strong>🚫 Habitat Tercemar!</strong> Plastik dapat menyumbat aliran, menjerat hewan, atau termakan. Kualitas habitat turun dan hubungan makan-dimakan ikut terganggu.",
    icon: "foto-simulasi/buang-sampah.webp",
    subtext: "-20% Kesehatan Ekosistem",
    air: "Aliran terganggu & air kotor 🗑️",
    biodiversitas: "Hewan terancam sampah 🐢",
    udara: "Jaring makanan terganggu ⚠️",
    komponen: "Abiotik: aliran dan kualitas air. Biotik: ikan, katak, burung, tumbuhan, dan manusia.",
    rantai: "Sampah masuk → organisme air terganggu → makanan pemangsa berkurang."
  },
  {
    id: "konservasi",
    nama: "🌿 Perlindungan Kawasan Alam",
    dampak: "positif",
    delta: +20,
    penjelasan: "<strong>🛡️ Habitat Terlindungi!</strong> Vegetasi, air, dan tempat berkembang biak dijaga. Populasi memiliki ruang dan sumber makanan yang cukup sehingga ekosistem lebih seimbang.",
    icon: "foto-simulasi/konservasi.webp",
    subtext: "+20% Kesehatan Ekosistem",
    air: "Air & tanah terlindungi 💎",
    biodiversitas: "Populasi lebih stabil 🦜",
    udara: "Jaring makanan seimbang 🌳",
    komponen: "Abiotik dan biotik dijaga bersama sebagai satu kesatuan ekosistem.",
    rantai: "Habitat terjaga → produsen dan konsumen tersedia → populasi lebih seimbang."
  }
];

// Telemetry State
let healthScore = 65; // Initial 65%
const riwayatAksi = new Set();

const aktivitasList = document.getElementById("aktivitas-list");
const dropZone = document.getElementById("area-ekosistem");
const dampakArea = document.getElementById("dampak-area");
const meterBar = document.getElementById("meterBar");
const meterValue = document.getElementById("meterValue");
const meterDesc = document.getElementById("meterDesc");
const stageBg = document.getElementById("stageBg");
const stagePrompt = document.getElementById("stagePrompt");
const mascotKatak = document.getElementById("mascotKatak");
const mascotBangau = document.getElementById("mascotBangau");

// Telemetry Elements
const paramAir = document.getElementById("paramAir");
const paramBio = document.getElementById("paramBio");
const paramUdara = document.getElementById("paramUdara");
const logTimeline = document.getElementById("logTimeline");
const certBanner = document.getElementById("certBanner");

// Render Kartu Aktivitas
function renderAktivitas() {
  aktivitasList.innerHTML = "";
  aktivitas.forEach((act) => {
    const card = document.createElement("div");
    card.className = "activity-card";
    card.setAttribute("draggable", true);
    card.dataset.id = act.id;

    const isPositive = act.dampak === "positif";

    card.innerHTML = `
      <img src="${act.icon}" alt="${act.nama}" />
      <div class="flex-grow-1">
        <div class="activity-title">${act.nama}</div>
        <span class="activity-badge ${isPositive ? 'badge-positive' : 'badge-negative'}">
          ${act.subtext}
        </span>
      </div>
      <div class="text-muted small">
        <i class="bi bi-grip-vertical"></i>
      </div>
    `;

    card.addEventListener("dragstart", (e) => {
      e.dataTransfer.setData("text/plain", act.id);
      card.style.opacity = "0.6";
    });

    card.addEventListener("dragend", () => {
      card.style.opacity = "1";
    });

    card.addEventListener("click", () => {
      terapkanAktivitas(act.id);
    });

    aktivitasList.appendChild(card);
  });
}

// Terapkan Aktivitas
function terapkanAktivitas(id) {
  const selected = aktivitas.find((a) => a.id === id);
  if (!selected) return;

  if (riwayatAksi.has(id)) {
    dampakArea.className = "impact-result-box alert alert-warning text-dark";
    dampakArea.innerHTML = `<span>🔁 Tindakan <strong>${selected.nama}</strong> sudah diuji. Pilih tindakan lain agar kamu dapat membandingkan dampaknya.</span>`;
    return;
  }
  riwayatAksi.add(id);

  // Sound Effect
  if (typeof SoundEffects !== 'undefined') {
    if (selected.dampak === "positif") {
      SoundEffects.playCorrect();
    } else {
      SoundEffects.playWrong();
    }
  }

  // Update Health
  healthScore = Math.max(10, Math.min(100, healthScore + selected.delta));
  updateMeter(selected);

  // Catat riwayat
  catatRiwayat(selected);

  // Tampilkan Dampak
  dampakArea.className = "impact-result-box";
  if (selected.dampak === "positif") {
    dampakArea.classList.add("alert", "alert-success", "text-success");
    dampakArea.innerHTML = `<div class="d-flex align-items-center gap-3">
      <span class="fs-1">🌿</span>
      <div class="text-start">
        ${selected.penjelasan}
        <hr class="my-2">
        <div class="small"><strong>Komponen terdampak:</strong> ${selected.komponen}</div>
        <div class="small mt-1"><strong>Urutan sebab-akibat:</strong> ${selected.rantai}</div>
      </div>
    </div>`;

    animasiKarakter("happy");
    stagePrompt.innerHTML = `✨ <strong>${selected.nama}</strong> berhasil diterapkan! Alam makin lestari.`;
    stagePrompt.className = "badge bg-success text-white shadow-sm px-4 py-2 rounded-pill fs-6";
  } else {
    dampakArea.classList.add("alert", "alert-danger", "text-danger");
    dampakArea.innerHTML = `<div class="d-flex align-items-center gap-3">
      <span class="fs-1">⚠️</span>
      <div class="text-start">
        ${selected.penjelasan}
        <hr class="my-2">
        <div class="small"><strong>Komponen terdampak:</strong> ${selected.komponen}</div>
        <div class="small mt-1"><strong>Urutan sebab-akibat:</strong> ${selected.rantai}</div>
      </div>
    </div>`;

    animasiKarakter("worried");
    stagePrompt.innerHTML = `⚠️ <strong>${selected.nama}</strong> merusak ekosistem! Ayo pulihkan segera.`;
    stagePrompt.className = "badge bg-danger text-white shadow-sm px-4 py-2 rounded-pill fs-6";
  }

  // Cek Sertifikat Kelestarian jika skor >= 85
  if (healthScore >= 85 && certBanner) {
    certBanner.style.display = "block";
    if (typeof SoundEffects !== 'undefined') SoundEffects.playFanfare();
  }

  // Visual pulse
  dropZone.classList.add("highlight-active");
  setTimeout(() => {
    dropZone.classList.remove("highlight-active");
  }, 600);
}

// Update Eco-Barometer Tampilan
function updateMeter(selected) {
  meterValue.textContent = `${healthScore}%`;
  meterBar.style.width = `${healthScore}%`;

  if (selected) {
    if (paramAir) paramAir.textContent = selected.air;
    if (paramBio) paramBio.textContent = selected.biodiversitas;
    if (paramUdara) paramUdara.textContent = selected.udara;
  }

  if (healthScore >= 75) {
    meterBar.className = "meter-bar bg-success";
    meterValue.className = "fs-4 fw-bold text-success";
    meterDesc.textContent = "Kondisi saat ini: Sangat Sehat & Seimbang (Luar Biasa!) 🌿";
    if (stageBg) stageBg.style.filter = "none";
  } else if (healthScore >= 45) {
    meterBar.className = "meter-bar bg-warning";
    meterValue.className = "fs-4 fw-bold text-warning";
    meterDesc.textContent = "Kondisi saat ini: Sedang / Perlu Perhatian Bersama ⚠️";
    if (stageBg) stageBg.style.filter = "sepia(25%)";
  } else {
    meterBar.className = "meter-bar bg-danger";
    meterValue.className = "fs-4 fw-bold text-danger";
    meterDesc.textContent = "Kondisi saat ini: Kritis & Tercemar! Perlu Restorasi Cepat 🚨";
    if (stageBg) stageBg.style.filter = "grayscale(70%) contrast(120%)";
  }
}

// Catat ke Timeline Log
function catatRiwayat(act) {
  if (!logTimeline) return;
  const isPos = act.dampak === "positif";
  const item = document.createElement("div");
  item.className = `p-2 rounded-3 mb-2 small d-flex justify-content-between align-items-center ${isPos ? 'bg-success-subtle text-success' : 'bg-danger-subtle text-danger'}`;
  item.innerHTML = `
    <span>${isPos ? '✅' : '❌'} <strong>${act.nama}</strong></span>
    <span class="badge ${isPos ? 'bg-success' : 'bg-danger'}">${act.subtext}</span>
  `;
  logTimeline.prepend(item);
}

// Animasi Reaksi Karakter
function animasiKarakter(status) {
  if (!mascotKatak || !mascotBangau) return;

  if (status === "happy") {
    mascotKatak.style.transform = "translateY(-22px) rotate(-8deg) scale(1.18)";
    mascotBangau.style.transform = "translateY(-22px) rotate(8deg) scale(1.18)";
    setTimeout(() => {
      mascotKatak.style.transform = "none";
      mascotBangau.style.transform = "none";
    }, 500);
  } else {
    mascotKatak.style.transform = "translateX(-16px) rotate(-18deg)";
    mascotBangau.style.transform = "translateX(16px) rotate(18deg)";
    setTimeout(() => {
      mascotKatak.style.transform = "none";
      mascotBangau.style.transform = "none";
    }, 500);
  }
}

// Reset Simulasi
function resetSimulasi() {
  healthScore = 65;
  riwayatAksi.clear();
  if (typeof SoundEffects !== 'undefined') SoundEffects.playPop();

  if (paramAir) paramAir.textContent = "Air & tanah cukup baik 💧";
  if (paramBio) paramBio.textContent = "Populasi cukup stabil 🌿";
  if (paramUdara) paramUdara.textContent = "Hubungan masih seimbang 🔗";

  updateMeter();

  if (certBanner) certBanner.style.display = "none";
  if (logTimeline) logTimeline.innerHTML = "<div class='text-muted small text-center py-2'>Belum ada aktivitas yang dijalankan.</div>";

  dampakArea.className = "impact-result-box alert alert-info text-dark";
  dampakArea.innerHTML = "<span>Simulasi telah direset. Silakan seret atau klik kartu aksi untuk mulai bereksperimen lagi!</span>";

  stagePrompt.innerHTML = "📍 Tarik salah satu aktivitas ke area ini atau klik kartu aksi di bawah!";
  stagePrompt.className = "badge bg-white text-dark shadow-sm px-4 py-2 rounded-pill fs-6";

  if (stageBg) stageBg.style.filter = "none";
  if (mascotKatak) mascotKatak.style.transform = "none";
  if (mascotBangau) mascotBangau.style.transform = "none";
}

// Setup Event Drag and Drop pada Stage
if (dropZone) {
  ["dragover", "dragenter"].forEach((evt) => {
    dropZone.addEventListener(evt, (e) => {
      e.preventDefault();
      dropZone.classList.add("highlight-active");
    });
  });

  ["dragleave", "dragend"].forEach((evt) => {
    dropZone.addEventListener(evt, () => {
      dropZone.classList.remove("highlight-active");
    });
  });

  dropZone.addEventListener("drop", (e) => {
    e.preventDefault();
    dropZone.classList.remove("highlight-active");

    const id = e.dataTransfer.getData("text/plain");
    if (id) {
      terapkanAktivitas(id);
    }
  });
}

// Inisialisasi
document.addEventListener("DOMContentLoaded", () => {
  renderAktivitas();
  updateMeter();
});
