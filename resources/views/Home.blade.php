<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Baca Rek</title>
  <link rel="stylesheet" href="css_reset.css" />
  <link rel="stylesheet" href="Home.css" />
</head>

<body>
  <div id="overlay" onclick="hideOverlay()"></div>
  <header>
    <div class="header-atas">
      <a href="/" class="logo">
        <img src="/assets/Logo and Text Black.png" alt="logo" />
      </a>
      <div class="picture-container">
        <a href="/Profile"><img src="/assets/Ellipse 5.png" alt="picture" class="profile-picture" /></a>
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
      <input type="text" placeholder="Search..." class="searchBar" />
    </nav>

    <nav class="navigasi-sidebar-container">
      <div class="sidebar-header">
        <a href="/Profile"><img src="/assets/Ellipse 5.png" alt="profile picture" class="sidebar-profile-picture" /></a>
        <img src="/assets/Exit.png" alt="keluar" />
      </div>
      <div class="profile-name">Galvin</div>
      <div class="profile-role">Peran: Pembaca</div>
      <input type="text" placeholder="Search..." />
      <a href="/">Beranda</a>
      <a href="/National">Nasional</a>
      <a href="/International">Internasional</a>
      <a href="/Economy">Ekonomi</a>
      <a href="/Sports">Olahraga</a>
      <a href="/Technology">Teknologi</a>
      <a href="/Automotive">Otomotif</a>
      <a href="/Entertainment">Hiburan</a>
      <button id="button1">Keluar</button>
    </nav>
  </header>

  <main id="setup-container">
    @if (!$beritaRandom)
      <div id="main-container">
        <div class="content">
          <img src="/assets/UI UX Image Download (3) 1.png" alt="picture" />
        </div>
        <div>
          <p id="tanggal">Wednesday, 6 September 2024</p>
        </div>
        <div>
          <a href="/">
            <h1 class="title">
              Vegetables are some of the most precious things given to us
            </h1>
          </a>
        </div>
        <div>
          <p>
            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Hic debitis non adipisci, assumenda
            impedit velit
            totam ipsam odio corporis harum consequatur expedita voluptates labore illo magni, fuga iusto
            minima modi.
          </p>
        </div>
      </div>
    @else
      <div id="main-container">
        <div class="content">
          <img src="/assets/Upload/{{ $beritaRandom[0]->photo }}" alt="picture" />
        </div>
        <div>
          <p id="tanggal">{{ $beritaRandom[0]->tanggal }}</p>
        </div>
        <div>
          <a href="/DetailBerita/{{ $beritaRandom[0]->ID_berita }}">
            <h1 class="title">
              {{ $beritaRandom[0]->title }}
            </h1>
          </a>
        </div>
        <div>
          <p>
            {{ $beritaRandom[0]->desc }}
          </p>
        </div>
      </div>
    @endif


    <div id="sidebar-container" class="sidebar-container">
      @for ($i = 1; $i <= 4; $i++)
        @if (!@empty($beritaRandom[$i]))
          <section>
            <img src="/assets/Upload/{{ $beritaRandom[$i]->photo }}" alt="" />
            <div>
              <a href="/DetailBerita/{{$beritaRandom[$i]->ID_berita}}">
                <h1 id="subjudul">
                  {{ $beritaRandom[$i]->title }}
                </h1>
              </a>
              <p id="tanggal">{{ $beritaRandom[$i]->tanggal }}</p>
            </div>
          </section>
        @endif
        <section>
          <img src="/assets/UI UX Image Download (3) 1.png" alt="" />
          <div>
            <a href="#">
              <h1 id="subjudul">
                Vegetables are some of the most precious things given to us
              </h1>
            </a>
            <p id="tanggal">Wednesday, 6 September 2024</p>
          </div>
        </section>
      @endfor
    </div>
  </main>

  <main id="setup-container">
    <div id="main-container">
      <a href="">
        <h1 class="title">Berita Terbaru</h1>
      </a>
      @for ($i = 0; $i < 5; $i++)
        @if (!@empty($beritaTerbaru[$i]))
          <section class="content1">
            <img src="/assets/Upload/{{ $beritaTerbaru[$i]->photo }}" alt="" />
            <div>
              <a href="/DetailBerita/{{$beritaTerbaru[$i]->ID_berita}}">
                <h1 id="subjudul">
                  {{ $beritaTerbaru[$i]->title }}
                </h1>
              </a>
              <p id="tanggal">{{ $beritaTerbaru[$i]->tanggal }}</p>
            </div>
          </section>
        @else
          <section class="content1">
            <img src="/assets/UI UX Image Download (3) 1.png" alt="" />
            <div>
              <a href="#">
                <h1 id="subjudul">
                  Vegetables are some of the most precious things given to us
                </h1>
              </a>
              <p id="tanggal">Wednesday, 6 September 2024</p>
            </div>
          </section>
        @endif
      @endfor
    </div>

    <div id="sidebar-container">
      <a href="">
        <h1 class="title">Berita Terkini</h1>
      </a>
      @for ($i = 0; $i < 5; $i++)
        @if (!@empty($beritaTerkini[$i]))
          <section>
            <h1 id="number-sidebar">{{ $i + 1 }}.</h1>
            <div>
              <a href="/DetailBerita/{{$beritaTerkini[$i]->ID_berita}}">
                <h1 id="subjudul-sidebar">
                  {{ $beritaTerkini[$i]->title }}
                </h1>
              </a>
            </div>
          </section>
        @else
          <section>
            <h1 id="number-sidebar">{{ $i + 1 }}.</h1>
            <div>
              <a href="#">
                <h1 id="subjudul-sidebar">
                  Vegetables are some of the most precious things given to us
                </h1>
              </a>
            </div>
          </section>
        @endif
      @endfor
    </div>
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
  <script src="Script.js"></script>
</body>

</html>
