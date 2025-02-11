<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>wendyowo</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <div class="container">
    <div class="lyrics lyricsA grid">
      <p id="line-1">Sé que el pasado a veces
        <br> pesa más de lo que quisiéramos
      </p>
      <p id="line-2">que hay heridas que tardan en cerrar</p>
      <p id="line-3">y que ni tú ni yo somos perfectos</p>
      <p id="line-4">Pero si algo he aprendido en este tiempo contigo</p>
      <p id="line-5">es que vale la pena trabajar en lo que duele</p>
      <p id="line-6">porque estar contigo hace que todo tenga más sentido.</p>
      <p id="line-7">Quiero que sepas que no espero que cambies</p>
      <p id="line-8">ni que te transformes en alguien diferente.</p>
      <p id="line-9">Me basta con que seas tú</p>
      <p id="line-10">con tus luces y tus sombras</p>
      <p id="line-11">con tus risas y tus lágrimas</p>
      <p id="line-12">incluso aunque estés loca<br>(nomás lo que es ps)</p>
      <p id="line-13">
        Quiero que, cuando todo se complique seas quien diga: "todo va a estar bien"

      </p>
      <p id="line-14">
        Que, cuando todo sea risas <br> solo pueda pensar en lo feliz que me haces

      </p>
      <p id="line-15">
        Que al cerrar los ojos piense en en la suerte que tengo
      </p>
      <p id="line-16">
        Y al abrirlos, sigas siendo tú <br> el motivo de mis dias buenos
      </p>

    </div>
    <div class="lyrics lyricsB grid">

      <!-- Reproductor de audio oculto -->
      <audio id="audio" src="cancion.mp3" preload="auto"></audio>

      <!-- Letras con botón -->
      <button id="start-btn" class="start-btn"></button>
      <p id="line-17">Porque eres <span class="blue">tú</span>, no quiero a nadie más</p>
      <p id="line-18">It's just <span class="blue">you</span>, i don't want anyone else</p>
      <p id="line-19">C'est juste <span class="blue">toi</span>, je ne veux personne d'autre</p>
      <p id="line-20">Es bist nur <span class="blue">du</span>, ich will niemanden anderen</p>
      <p id="line-21">Es que eres <span class="blue">tú</span>, no quiero a nadie más</p>
      <p id="line-23">É só <span class="blue">você</span>, nao quero mais ninguém</p>
      <p id="line-25">Sei solo <span class="blue">tu</span>, non voglio nessun altro</p>
      <p id="line-27">Es que eres <span class="blue">tú</span>, no quiero a nadie más</p>
      <p id="line-28">Sí, no quiero a nadie más</p>


    </div>

    <div class="lyrics lyricsC grid">

      <p id="line-29">Y yo solo quiero ser tuyo</p>
      <p id="line-30">y solo tuyo</p>
      <p id="line-31">Pero la pregunta aquí es</p>
      <p id="line-32">¿Me dejas ser tuyo y solo tuyo?

        <button id="boton-si"> si :D </button>
        <button id="boton-no"> no D: </button>
      </p>
      <p id="line-32"></p>
      <div class="image-container" id="image-container"></div>
    </div>
  </div>
  <script>
    const audio = document.getElementById("audio");
    const startBtn = document.getElementById("start-btn");

    // Tiempos y letras
    const lyricsTiming = [{
        time: 0,
        line: "line-1"
      },
      {
        time: 4,
        line: "line-2"
      },
      {
        time: 8,
        line: "line-3"
      },
      {
        time: 12,
        line: "line-4"
      },
      {
        time: 16,
        line: "line-5"
      },
      {
        time: 20,
        line: "line-6"
      },
      {
        time: 24,
        line: "line-7"
      },
      {
        time: 28,
        line: "line-8"
      },
      {
        time: 32,
        line: "line-9"
      },
      {
        time: 36,
        line: "line-10"
      },
      {
        time: 40,
        line: "line-11"
      },
      {
        time: 44,
        line: "line-12"
      },
      {
        time: 48,
        line: "line-13"
      },
      {
        time: 52,
        line: "line-14"
      },
      {
        time: 56,
        line: "line-15"
      },
      {
        time: 60,
        line: "line-16"
      },
      {
        time: 63,
        line: "line-17"
      },
      {
        time: 69,
        line: "line-18"
      },
      {
        time: 75,
        line: "line-19"
      },
      {
        time: 82,
        line: "line-20"
      },
      {
        time: 88,
        line: "line-21"
      },
      {
        time: 94,
        line: "line-23"
      },
      {
        time: 100,
        line: "line-25"
      },
      {
        time: 107,
        line: "line-27"
      },
      {
        time: 110,
        line: "line-28"
      },
      {
        time: 114,
        line: "line-29"
      },
      {
        time: 118,
        line: "line-30"
      },
      {
        time: 122,
        line: "line-31"
      },
      {
        time: 126,
        line: "line-32"
      },
      {
        time: 2000,
        line: "line-33"
      }
    ];


    // Inicia la sincronización y oculta el botón
    const startSync = () => {
      audio.play().catch((err) => console.error("Error:", err));
      startBtn.style.display = "none"; // Oculta el botón
    };

    startBtn.addEventListener("click", startSync);

    // Actualiza las letras según el tiempo
    audio.addEventListener("timeupdate", () => {
      const currentTime = audio.currentTime;

      // Quita la clase activa de todas las líneas
      document.querySelectorAll(".lyrics p").forEach((p) => p.classList.remove("active"));

      // Muestra la línea actual
      const currentLyric = lyricsTiming.find((lyric, index) => {
        const next = lyricsTiming[index + 1];
        return currentTime >= lyric.time && (!next || currentTime < next.time);
      });

      if (currentLyric) {
        const currentLine = document.getElementById(currentLyric.line);
        if (currentLine) currentLine.classList.add("active");
      }
    });
  </script>
  <script>
    const botonSi = document.getElementById("boton-si");
    const botonNo = document.getElementById("boton-no");
    const imageContainer = document.getElementById("image-container");
    let scaleSi = 1;
    let scaleNo = 1;

    botonNo.addEventListener("click", () => {
      scaleNo *= 0.5; // Reduce tamaño a la mitad
      scaleSi *= 1.5; // Aumenta tamaño en 1.5x
      botonNo.style.transform = `scale(${scaleNo})`;
      botonSi.style.transform = `scale(${scaleSi})`;
    });

    botonSi.addEventListener("click", () => {
      if (!imageContainer.innerHTML) {
        const img = document.createElement("img");
        img.src = "animacion.gif"; // Ruta de la imagen
        img.alt = "";
        imageContainer.appendChild(img);
      }
    });

    // Asegurar que el viewport sea correcto en móviles
    const metaViewport = document.createElement('meta');
    metaViewport.name = 'viewport';
    metaViewport.content = 'width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no';
    document.head.appendChild(metaViewport);
    // Ajustar altura dinámica
    function adjustHeight() {
      const vh = window.innerHeight * 0.01;
      document.documentElement.style.setProperty('--vh', `${vh}px`);
    }
    window.addEventListener('resize', adjustHeight);
    adjustHeight();
  </script>
</body>

</html>