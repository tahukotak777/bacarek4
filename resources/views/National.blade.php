<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Baca Rek</title>
  <link rel="stylesheet" href="/css_reset.css" />
  <link rel="stylesheet" href="/Kategori.css" />
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

  @if (!@empty($PBeritaTerkini) || !@empty($PberitaTerbaru))
    <main>
      <a href="#">
        <h1 class="title" id="title-theme">Politik</h1>
      </a>
      <a href="#">
        <h1 class="title">Most Popular</h1>
      </a>
      <section class="setup-container">
        <section id="main-container">
          <div class="content">
            <img src="/assets/Upload/{{ $PBeritaTerkini[0]->photo }}" alt="profile" />
          </div>
          <div>
            <p id="tanggal">{{ $PBeritaTerkini[0]->tanggal }}</p>
          </div>
          <div>
            <a href="#">
              <h1>
                {{ $PBeritaTerkini[0]->title }}
              </h1>
            </a>
          </div>
          <div>
            <p>
              {{ $PBeritaTerkini[0]->desc }}
            </p>
          </div>
        </section>

        <section id="sidebar-container">
          @for ($i = 1; $i < 5; $i++)
            @if (!@empty($PBeritaTerkini[$i]))
              <section>
                <h1 id="number-sidebar">{{ $i + 1 }}.</h1>
                <div>
                  <a href="">
                    <h1 id="subjudul-sidebar">
                      {{ $PBeritaTerkini[$i]->title }}
                    </h1>
                  </a>
                </div>
              </section>
            @endif
          @endfor
        </section>
      </section>

      <a href="#">
        <h1 class="title">Lastest News</h1>
      </a>
      <section id="bottombar-container">
        @foreach ($PBeritaTerbaru as $berita)
          <section>
            <img src="/assets/Upload/{{$berita->photo}}" alt="" />
            <div>
              <a href="#">
                <h1 id="subjudul">
                  {{$berita->title}}
                </h1>
              </a>
              <p class="desc">
                {{$berita->desc}}
              </p>
            </div>
          </section>
        @endforeach
      </section>
    </main>
  @else
    <div class="kosong-kategori">Belum ada berita politik saat ini</div>
  @endif

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
