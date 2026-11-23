// ==========================================================================
// sfx.js - Synthesized Web Audio Sound Effects & Speech Synthesis
// Zero external files, ultra-responsive, works in all modern browsers!
// Enhanced for Multi-Game Eco-Quiz (Memory, DragDrop, Word Scramble, Puzzle, Hidden Object)
// ==========================================================================

const SoundEffects = (function () {
  let audioCtx = null;
  let isMuted = false;

  function getAudioContext() {
    if (!audioCtx) {
      const AudioContext = window.AudioContext || window.webkitAudioContext;
      if (AudioContext) {
        audioCtx = new AudioContext();
      }
    }
    if (audioCtx && audioCtx.state === 'suspended') {
      audioCtx.resume();
    }
    return audioCtx;
  }

  return {
    toggleMute: function () {
      isMuted = !isMuted;
      return isMuted;
    },
    isMuted: function () {
      return isMuted;
    },

    // Soft bubble pop for button hover & click
    playPop: function () {
      if (isMuted) return;
      try {
        const ctx = getAudioContext();
        if (!ctx) return;
        const osc = ctx.createOscillator();
        const gain = ctx.createGain();

        osc.type = 'sine';
        osc.frequency.setValueAtTime(450, ctx.currentTime);
        osc.frequency.exponentialRampToValueAtTime(850, ctx.currentTime + 0.08);

        gain.gain.setValueAtTime(0.12, ctx.currentTime);
        gain.gain.exponentialRampToValueAtTime(0.01, ctx.currentTime + 0.08);

        osc.connect(gain);
        gain.connect(ctx.destination);

        osc.start();
        osc.stop(ctx.currentTime + 0.08);
      } catch (e) {}
    },

    // Card flip swoosh
    playFlip: function () {
      if (isMuted) return;
      try {
        const ctx = getAudioContext();
        if (!ctx) return;
        const osc = ctx.createOscillator();
        const gain = ctx.createGain();

        osc.type = 'sine';
        osc.frequency.setValueAtTime(300, ctx.currentTime);
        osc.frequency.exponentialRampToValueAtTime(600, ctx.currentTime + 0.06);

        gain.gain.setValueAtTime(0.08, ctx.currentTime);
        gain.gain.exponentialRampToValueAtTime(0.001, ctx.currentTime + 0.06);

        osc.connect(gain);
        gain.connect(ctx.destination);

        osc.start();
        osc.stop(ctx.currentTime + 0.06);
      } catch (e) {}
    },

    // Card matching pair found chime
    playMatch: function () {
      if (isMuted) return;
      try {
        const ctx = getAudioContext();
        if (!ctx) return;
        const now = ctx.currentTime;
        [587.33, 880, 1174.66].forEach((f, i) => { // D5, A5, D6
          const osc = ctx.createOscillator();
          const gain = ctx.createGain();
          osc.type = 'sine';
          osc.frequency.setValueAtTime(f, now + i * 0.07);
          gain.gain.setValueAtTime(0.15, now + i * 0.07);
          gain.gain.exponentialRampToValueAtTime(0.001, now + i * 0.07 + 0.3);
          osc.connect(gain);
          gain.connect(ctx.destination);
          osc.start(now + i * 0.07);
          osc.stop(now + i * 0.07 + 0.3);
        });
      } catch (e) {}
    },

    // Letter tap / marimba droplet tone
    playLetter: function () {
      if (isMuted) return;
      try {
        const ctx = getAudioContext();
        if (!ctx) return;
        const osc = ctx.createOscillator();
        const gain = ctx.createGain();
        osc.type = 'triangle';
        const notes = [440, 493.88, 523.25, 587.33, 659.25, 698.46, 783.99];
        const f = notes[Math.floor(Math.random() * notes.length)];
        osc.frequency.setValueAtTime(f, ctx.currentTime);
        gain.gain.setValueAtTime(0.12, ctx.currentTime);
        gain.gain.exponentialRampToValueAtTime(0.001, ctx.currentTime + 0.12);
        osc.connect(gain);
        gain.connect(ctx.destination);
        osc.start();
        osc.stop(ctx.currentTime + 0.12);
      } catch (e) {}
    },

    // Hidden object discovery sparkle
    playFound: function () {
      if (isMuted) return;
      try {
        const ctx = getAudioContext();
        if (!ctx) return;
        const now = ctx.currentTime;
        [523.25, 659.25, 783.99, 1046.5, 1318.51].forEach((f, i) => {
          const osc = ctx.createOscillator();
          const gain = ctx.createGain();
          osc.type = 'sine';
          osc.frequency.setValueAtTime(f, now + i * 0.05);
          gain.gain.setValueAtTime(0.14, now + i * 0.05);
          gain.gain.exponentialRampToValueAtTime(0.001, now + i * 0.05 + 0.25);
          osc.connect(gain);
          gain.connect(ctx.destination);
          osc.start(now + i * 0.05);
          osc.stop(now + i * 0.05 + 0.25);
        });
      } catch (e) {}
    },

    // Tile slide click
    playSlide: function () {
      if (isMuted) return;
      try {
        const ctx = getAudioContext();
        if (!ctx) return;
        const osc = ctx.createOscillator();
        const gain = ctx.createGain();
        osc.type = 'sine';
        osc.frequency.setValueAtTime(320, ctx.currentTime);
        osc.frequency.exponentialRampToValueAtTime(180, ctx.currentTime + 0.07);
        gain.gain.setValueAtTime(0.1, ctx.currentTime);
        gain.gain.exponentialRampToValueAtTime(0.001, ctx.currentTime + 0.07);
        osc.connect(gain);
        gain.connect(ctx.destination);
        osc.start();
        osc.stop(ctx.currentTime + 0.07);
      } catch (e) {}
    },

    // Crisp triumphant chime for correct answer
    playCorrect: function () {
      if (isMuted) return;
      try {
        const ctx = getAudioContext();
        if (!ctx) return;
        const now = ctx.currentTime;
        const notes = [523.25, 659.25, 783.99, 1046.5]; // C5, E5, G5, C6

        notes.forEach((freq, index) => {
          const osc = ctx.createOscillator();
          const gain = ctx.createGain();

          osc.type = 'triangle';
          osc.frequency.setValueAtTime(freq, now + index * 0.08);

          gain.gain.setValueAtTime(0.15, now + index * 0.08);
          gain.gain.exponentialRampToValueAtTime(0.001, now + index * 0.08 + 0.25);

          osc.connect(gain);
          gain.connect(ctx.destination);

          osc.start(now + index * 0.08);
          osc.stop(now + index * 0.08 + 0.25);
        });
      } catch (e) {}
    },

    // Gentle soft buzz for wrong answer
    playWrong: function () {
      if (isMuted) return;
      try {
        const ctx = getAudioContext();
        if (!ctx) return;
        const now = ctx.currentTime;
        const osc = ctx.createOscillator();
        const gain = ctx.createGain();

        osc.type = 'sawtooth';
        osc.frequency.setValueAtTime(220, now);
        osc.frequency.exponentialRampToValueAtTime(140, now + 0.25);

        gain.gain.setValueAtTime(0.12, now);
        gain.gain.exponentialRampToValueAtTime(0.001, now + 0.25);

        osc.connect(gain);
        gain.connect(ctx.destination);

        osc.start(now);
        osc.stop(now + 0.25);
      } catch (e) {}
    },

    // Fanfare celebratory chime
    playFanfare: function () {
      if (isMuted) return;
      try {
        const ctx = getAudioContext();
        if (!ctx) return;
        const now = ctx.currentTime;
        const chords = [
          { f: 523.25, t: 0.0 },
          { f: 659.25, t: 0.1 },
          { f: 783.99, t: 0.2 },
          { f: 1046.5, t: 0.35 },
          { f: 1318.5, t: 0.55 }
        ];

        chords.forEach(c => {
          const osc = ctx.createOscillator();
          const gain = ctx.createGain();

          osc.type = 'triangle';
          osc.frequency.setValueAtTime(c.f, now + c.t);

          gain.gain.setValueAtTime(0.2, now + c.t);
          gain.gain.exponentialRampToValueAtTime(0.001, now + c.t + 0.5);

          osc.connect(gain);
          gain.connect(ctx.destination);

          osc.start(now + c.t);
          osc.stop(now + c.t + 0.5);
        });
      } catch (e) {}
    },

    // Text to Speech Narrator in Indonesian
    speakText: function (text, onEnd) {
      if (!('speechSynthesis' in window)) {
        alert("Browser kamu belum mendukung narator suara.");
        return;
      }
      window.speechSynthesis.cancel(); // stop previous

      const utterance = new SpeechSynthesisUtterance(text);
      utterance.lang = 'id-ID';
      utterance.rate = 1.0;
      utterance.pitch = 1.05;

      const voices = window.speechSynthesis.getVoices();
      const idVoice = voices.find(v => v.lang.includes('id') || v.lang.includes('ID'));
      if (idVoice) utterance.voice = idVoice;

      if (onEnd) utterance.onend = onEnd;
      window.speechSynthesis.speak(utterance);
    },

    stopSpeaking: function () {
      if ('speechSynthesis' in window) {
        window.speechSynthesis.cancel();
      }
    }
  };
})();

// Attach pop sound effect to all clickable interactive buttons automatically
document.addEventListener('DOMContentLoaded', () => {
  document.querySelectorAll('.btn-eco-primary, .btn-eco-outline, .feature-nav-card, .option-btn, .activity-card, .game-mode-tab, .module-badge-nav').forEach(el => {
    el.addEventListener('mouseenter', () => SoundEffects.playPop());
  });
});

// ==========================================================================
// EcoMusicPlayer - Global Persistent Background Music Manager
// Strictly enforces persistent state across all pages:
// - "Kalo mati ya mati": Muted state persists everywhere, no random autoplay
// - "Kalo hidup ya hidup": Unmuted state persists seamlessly
// - Remembers exact currentTime so music doesn't restart from 0:00 on navigation
// ==========================================================================
const EcoMusicPlayer = (function () {
  const STORAGE_KEY_STATUS = 'eco_music_status'; // 'playing' | 'paused'
  const STORAGE_KEY_TIME   = 'eco_music_time';   // Float audio time in seconds

  let musicEl = null;
  let dockEl = null;
  let toggleBtn = null;
  let iconEl = null;
  let toastEl = null;
  let lastTimeSaved = 0;

  function getStatus() {
    // Default to 'playing' on first visit, or user's explicit preference
    return localStorage.getItem(STORAGE_KEY_STATUS) || 'playing';
  }

  function setStatus(status) {
    try {
      localStorage.setItem(STORAGE_KEY_STATUS, status);
    } catch (e) {}
  }

  function getSavedTime() {
    const t = parseFloat(localStorage.getItem(STORAGE_KEY_TIME));
    return (!isNaN(t) && t >= 0) ? t : 0;
  }

  function saveCurrentTime() {
    if (musicEl && !musicEl.paused && !isNaN(musicEl.currentTime)) {
      try {
        localStorage.setItem(STORAGE_KEY_TIME, musicEl.currentTime.toFixed(2));
      } catch (e) {}
    }
  }

  function updateUI(isPlaying) {
    if (iconEl) {
      iconEl.className = isPlaying ? 'bi bi-volume-up-fill' : 'bi bi-volume-mute-fill';
    }
    if (dockEl) {
      if (isPlaying) {
        dockEl.classList.add('playing');
        dockEl.setAttribute('aria-pressed', 'true');
        dockEl.title = 'Hentikan Musik Alam';
      } else {
        dockEl.classList.remove('playing');
        dockEl.setAttribute('aria-pressed', 'false');
        dockEl.title = 'Putar Musik Alam';
      }
    }
  }

  function showToast(message) {
    if (!toastEl) return;
    toastEl.textContent = message;
    toastEl.style.display = 'block';
    setTimeout(() => { toastEl.style.opacity = '1'; }, 10);
    setTimeout(() => {
      toastEl.style.opacity = '0';
      setTimeout(() => {
        if (toastEl.style.opacity === '0') {
          toastEl.style.display = 'none';
        }
      }, 350);
    }, 1800);
  }

  function applySavedTime() {
    if (!musicEl) return;
    const savedTime = getSavedTime();
    if (savedTime > 0) {
      try {
        if (musicEl.duration && savedTime >= musicEl.duration) {
          musicEl.currentTime = 0;
        } else {
          musicEl.currentTime = savedTime;
        }
      } catch (e) {}
    }
  }

  function startPlayback() {
    if (!musicEl) return;

    const doPlay = () => {
      applySavedTime();
      const playPromise = musicEl.play();
      if (playPromise !== undefined) {
        playPromise.then(() => {
          updateUI(true);
        }).catch(() => {
          // Browser blocked autoplay without user interaction yet
          updateUI(false);
          setupAutoplayUnlock();
        });
      }
    };

    if (musicEl.readyState >= 1) {
      doPlay();
    } else {
      musicEl.addEventListener('loadedmetadata', doPlay, { once: true });
      // Fallback if loadedmetadata already triggered
      setTimeout(doPlay, 150);
    }
  }

  function pausePlayback() {
    if (!musicEl) return;
    saveCurrentTime();
    musicEl.pause();
    updateUI(false);
  }

  function toggle() {
    if (!musicEl) return;
    SoundEffects.playPop();

    const currentStatus = getStatus();
    if (currentStatus === 'playing') {
      // User requested PAUSE / MUTE
      setStatus('paused');
      pausePlayback();
      showToast('Musik dimatikan');
    } else {
      // User requested PLAY
      setStatus('playing');
      startPlayback();
      showToast('Musik dinyalakan');
    }
  }

  function setupAutoplayUnlock() {
    const unlockHandler = function () {
      // CRITICAL: "kalo mati ya mati"
      // NEVER start music if user previously set status to 'paused'!
      if (getStatus() === 'playing' && musicEl && musicEl.paused) {
        applySavedTime();
        musicEl.play().then(() => {
          updateUI(true);
        }).catch(() => {});
      }
      window.removeEventListener('click', unlockHandler, true);
      window.removeEventListener('touchstart', unlockHandler, true);
      window.removeEventListener('keydown', unlockHandler, true);
    };

    window.addEventListener('click', unlockHandler, true);
    window.addEventListener('touchstart', unlockHandler, true);
    window.addEventListener('keydown', unlockHandler, true);
  }

  function init() {
    musicEl = document.getElementById('bg-music');
    dockEl = document.getElementById('music-dock');
    toggleBtn = document.getElementById('music-toggle');
    iconEl = document.getElementById('music-icon');
    toastEl = document.getElementById('music-toast');

    if (!musicEl) return;

    // Comfortable ambient volume
    musicEl.volume = 0.45;

    // Track playback time throttled to every 600ms
    musicEl.addEventListener('timeupdate', () => {
      const now = Date.now();
      if (now - lastTimeSaved >= 600) {
        lastTimeSaved = now;
        saveCurrentTime();
      }
    });

    // Save exact position on page unload / navigation
    window.addEventListener('beforeunload', saveCurrentTime);
    window.addEventListener('pagehide', saveCurrentTime);

    // Multi-tab synchronization via storage event
    window.addEventListener('storage', (e) => {
      if (e.key === STORAGE_KEY_STATUS) {
        if (e.newValue === 'playing' && musicEl.paused) {
          applySavedTime();
          musicEl.play().then(() => updateUI(true)).catch(() => {});
        } else if (e.newValue === 'paused' && !musicEl.paused) {
          musicEl.pause();
          updateUI(false);
        }
      }
    });

    // Toggle button handler
    if (toggleBtn) {
      toggleBtn.addEventListener('click', (e) => {
        e.preventDefault();
        e.stopPropagation();
        toggle();
      });
    }

    // Floating dock click handler (if clicked on dock outside toggle button)
    if (dockEl) {
      dockEl.addEventListener('click', (e) => {
        if (toggleBtn && !toggleBtn.contains(e.target)) {
          e.preventDefault();
          toggle();
        }
      });
    }

    // Determine initial state based on persistent localStorage
    const savedStatus = getStatus();
    if (savedStatus === 'playing') {
      // User left it ON -> resume playing seamlessly
      updateUI(true);
      startPlayback();
    } else {
      // User left it OFF -> "kalo mati ya mati"! Strictly keep paused.
      setStatus('paused');
      pausePlayback();
      updateUI(false);
    }
  }

  return {
    init: init,
    toggle: toggle,
    play: function () {
      setStatus('playing');
      startPlayback();
    },
    pause: function () {
      setStatus('paused');
      pausePlayback();
    },
    getStatus: getStatus,
    getAudio: function () { return musicEl; }
  };
})();

// Auto-initialize when DOM is ready
if (document.readyState === 'loading') {
  document.addEventListener('DOMContentLoaded', EcoMusicPlayer.init);
} else {
  EcoMusicPlayer.init();
}
window.EcoMusicPlayer = EcoMusicPlayer;
