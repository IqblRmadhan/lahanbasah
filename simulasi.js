// ==========================================================================
// simulasi.js - Professional Interactive Wetland Ecosystem Laboratory
// ==========================================================================

const aktivitas = [
  {
    id: "restorasi",
    nama: "🌱 Restorasi Ekosistem",
    dampak: "positif",
    delta: +20,
    penjelasan: "<strong>🎉 Hebat Sekali!</strong> Kodokko dan Bango tersenyum bahagia melihat tanaman air ditanam kembali. Air perlahan jernih dan rantai makanan rawa kembali pulih!",
    icon: "foto-simulasi/restorasi.webp",
    subtext: "+20% Kesehatan Ekosistem",
    air: "Sangat Jernih 💧",
    biodiversitas: "Meningkat Pesat 🌿",
    udara: "Segar & Oksigen Tinggi 🍃"
  },
  {
    id: "penebangan",
    nama: "🪓 Penebangan Pohon Liar",
    dampak: "negatif",
    delta: -25,
    penjelasan: "<strong>⚠️ Bahaya Besar!</strong> Penebangan pohon galam dan bakau menghilangkan tempat bersarang Bango. Tanah jadi gundul dan air cepat mengering!",
    icon: "foto-simulasi/penebangan.webp",
    subtext: "-25% Kesehatan Ekosistem",
    air: "Tersedimentasi Lumpur 🟤",
    biodiversitas: "Habitat Rusak Parah ⚠️",
    udara: "Panas & Gersang ☀️"
  },
  {
    id: "limbah",
    nama: "🏭 Pembuangan Limbah Kimia",
    dampak: "negatif",
    delta: -30,
    penjelasan: "<strong>☣️ Air Beracun!</strong> Limbah kimia meracuni air, membuat ikan-ikan kecil pingsan dan Kodokko tidak bisa lagi berenang karena kulitnya iritasi!",
    icon: "foto-simulasi/limbah.webp",
    subtext: "-30% Kesehatan Ekosistem",
    air: "Tercemar & Berbusa 🧪",
    biodiversitas: "Fauna Air Sekarat 🐟",
    udara: "Berbau Kimia Menyengat 😷"
  },
  {
    id: "edukasi",
    nama: "📚 Edukasi Lingkungan STEM",
    dampak: "positif",
    delta: +15,
    penjelasan: "<strong>🌟 Keren Banget!</strong> Banyak pelajar datang belajar tentang lahan basah. Mereka kini sadar dan tidak lagi membuang sampah sembarangan ke sungai!",
    icon: "foto-simulasi/edukasi.webp",
    subtext: "+15% Kesehatan Ekosistem",
    air: "Bebas Sampah Plastik 🌊",
    biodiversitas: "Terlindungi Warga 💚",
    udara: "Bersih & Nyaman 🌸"
  },
  {
    id: "pembuangan",
    nama: "🚯 Buang Sampah ke Sungai",
    dampak: "negatif",
    delta: -20,
    penjelasan: "<strong>🚫 Sungai Tersumbat!</strong> Sampah plastik menumpuk di permukaan air, memicu banjir dan membuat hewan rawa terjerat kantong plastik!",
    icon: "foto-simulasi/buang-sampah.webp",
    subtext: "-20% Kesehatan Ekosistem",
    air: "Kotor & Tersumbat Plastik 🗑️",
    biodiversitas: "Hewan Terjerat Sampah 🐢",
    udara: "Berbau Tidak Sedap 🚯"
  },
  {
    id: "konservasi",
    nama: "🌿 Perlindungan Kawasan Alam",
    dampak: "positif",
    delta: +20,
    penjelasan: "<strong>🛡️ Ekosistem Terlindungi!</strong> Kawasan rawa dijadikan suaka alam. Keanekaragaman hayati terlindungi dan bekantan dapat hidup damai!",
    icon: "foto-simulasi/konservasi.webp",
    subtext: "+20% Kesehatan Ekosistem",
    air: "Alami & Seimbang 💎",
    biodiversitas: "Suaka Satwa Harmonis 🦜",
    udara: "Asri & Segar 🌳"
  }
];

// Telemetry State
let healthScore = 65; // Initial 65%
let riwayatAksi = [];

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
      <div class="text-start">${selected.penjelasan}</div>
    </div>`;

    animasiKarakter("happy");
    stagePrompt.innerHTML = `✨ <strong>${selected.nama}</strong> berhasil diterapkan! Alam makin lestari.`;
    stagePrompt.className = "badge bg-success text-white shadow-sm px-4 py-2 rounded-pill fs-6";
  } else {
    dampakArea.classList.add("alert", "alert-danger", "text-danger");
    dampakArea.innerHTML = `<div class="d-flex align-items-center gap-3">
      <span class="fs-1">⚠️</span>
      <div class="text-start">${selected.penjelasan}</div>
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
  if (typeof SoundEffects !== 'undefined') SoundEffects.playPop();

  if (paramAir) paramAir.textContent = "Cukup Jernih 💧";
  if (paramBio) paramBio.textContent = "Kondisi Stabil 🌿";
  if (paramUdara) paramUdara.textContent = "Udara Bersih 🍃";

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
