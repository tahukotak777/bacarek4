<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Baca Rek</title>
  <link rel="stylesheet" href="/css_reset.css" />
  <link rel="stylesheet" href="/ReadingPage.css" />
</head>

<body>
  <div id="overlay" onclick="hideOverlay()"></div>
  <header>
    <div class="header-atas">
      <a href="/" class="logo">
        <img src="/assets/Logo and Text Black.png" alt="logo" />
      </a>
      <div class="picture-container">
        <a href="/Profile.html"><img src="/assets/Ellipse 5.png" alt="picture" class="profile-picture" /></a>
      </div>
      <img src="/assets/Menu.png" class="menu-toggle" alt="menu" />
    </div>

    <nav class="navigasi-container">
      <a href="/">Beranda</a>
      <a href="/National">Nasional</a>
      <a href="/International">Internasional</a>
      <a href="/Economy">Ekonomi</a>
      <a href="/Sports">Olahraga</a>
      <a href="/Technology">Teknologi</a>
      <a href="/Automotive">Otomotif</a>
      <a href="/Entertainment">Hiburan</a>
      <input type="text" placeholder="Search..." />
    </nav>

    <nav class="navigasi-sidebar-container">
      <div class="sidebar-header">
        <a href="/Profile.html"><img src="/assets/Ellipse 5.png" alt="profile picture"
            class="sidebar-profile-picture" /></a>
        <img src="/assets/Exit.png" alt="keluar" />
      </div>
      <div class="profile-name">Galvin</div>
      <div class="profile-role">Peran: Pembaca</div>
      <input type="text" placeholder="Search..." />
      <a href="/User/Home.html">Beranda</a>
      <a href="/User/National.html">Nasional</a>
      <a href="/User/International.html">Internasional</a>
      <a href="/User/Economy.html">Ekonomi</a>
      <a href="/User/Sports.html">Olahraga</a>
      <a href="/User/Technology.html">Teknologi</a>
      <a href="/User/Automotive.html">Otomotif</a>
      <a href="/User/Entertainment.html">Hiburan</a>
      <button id="button1">Keluar</button>
    </nav>
  </header>

  <main>
    <section class="main-container">
      <a href="#">
        <h1>{{$dataBerita->title}}</h1>
      </a>
      <img src="/assets/Upload/{{$dataBerita->photo}}" alt="profile" />
      <p id="tanggal">{{$dataBerita->tanggal}}</p>
      <p>
        {{$dataBerita->desc}}
      </p>
    </section>
    <section id="sidebar-container">
      @foreach ($dataBeritaRandom as $berita)
      <section>
      <h1>-</h1>
      <div>
        <a href="/DetailBerita/{{$berita->ID_berita}}">
        <h1 id="subjudul">
          {{$berita->title}}
        </h1>
        </a>
        <p id="tanggal">{{$berita->tanggal}}</p>
      </div>
      </section>
    @endforeach
  </main>

  <footer>
    <div class="footer-container">
      <div class="connection-container">
        <div class="logo-text">
          <img src="/assets/Logo and Text White.png" alt="Logo" />
        </div>
        <div>
          <p>&copy; 2024 - All rights reserved</p>
        </div>
      </div>
      <div class="information-container">
        <div>
          <h1>Apa Itu Baca Rek?</h1>
        </div>
        <div>
          <p>
            BacaRek adalah salah satu situs online yang memberikan Anda banyak
            informasi mengenaiapa yang anda butuhkan, berisi nasional,
            internasional, ekonomi, olah raga, teknologi, otomotif dan berita
            hiburan, dan tentu saja gratis. Untuk memenuhi kebutuhan pembaca
            dalam bidang kenyamanan, kami tidak menampilkan iklan apa pun.
          </p>
        </div>
      </div>
    </div>
  </footer>
  <script src="/Script.js"></script>
</body>

</html>