// Referencia al reproductor de audio
const audio = document.getElementById("audio");

// Tiempos y letras
const lyricsTiming = [
  { time: 0, line: "line-1" },
  { time: 5, line: "line-2" },
  { time: 10, line: "line-3" },
  { time: 15, line: "line-4" },
  { time: 20, line: "line-5" },
  // Agrega los tiempos y líneas restantes
];

// Reproducir automáticamente la canción
audio.play().catch(() => {
  console.log("Reproducción automática bloqueada. Haz clic para iniciar.");
});

// Sincronización de letras
audio.addEventListener("timeupdate", () => {
  const currentTime = audio.currentTime;

  // Quitar la clase activa de todas las líneas
  document.querySelectorAll(".lyrics p").forEach((el) => el.classList.remove("active"));

  // Activar la línea actual
  const currentLyric = lyricsTiming.find((lyric) => currentTime >= lyric.time);
  if (currentLyric) {
    const activeLine = document.getElementById(currentLyric.line);
    if (activeLine) activeLine.classList.add("active");
  }
});
