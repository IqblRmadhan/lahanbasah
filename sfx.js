// ==========================================================================
// sfx.js - Synthesized Web Audio Sound Effects & Speech Synthesis
// Zero external files, ultra-responsive, works in all modern browsers!
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

      // Find an Indonesian voice if available
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
  document.querySelectorAll('.btn-eco-primary, .btn-eco-outline, .feature-nav-card, .option-btn, .activity-card').forEach(el => {
    el.addEventListener('mouseenter', () => SoundEffects.playPop());
  });
});
