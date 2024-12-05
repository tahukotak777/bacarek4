<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Baca Rek</title>
  <link rel="stylesheet" href="/css_reset.css" />
  <link rel="stylesheet" href="/HomeWriter.css" />
</head>

<body>
  <header>
    <div class="header-atas">
      <img src="/assets/Logo and Text Black.png" alt="logo" class="logo" />
      <div class="picture-container">
        <a href="/Profile"><img src="/assets/Ellipse 5.png" alt="picture" class="profile-picture" /></a>
      </div>
    </div>
  </header>

  <main>
    @if (session()->has('success'))
      <div class="success">{{ session()->get('success') }}</div>
    @endif
    <h1>SELAMAT DATANG {{ $dataAccount->username }}</h1>
    <p>Apa yang anda ingin lakukan?</p>
    <a href="/Upload"><button class="big-button">Tulis Berita</button></a>
    <p>Riwayat Berita</p>
    <section class="container-riwayat">
      @foreach ($beritaAccount as $berita)
        <div class="list-riwayat">
          <div>
            <a href="/DetailBerita/{{ $berita->ID_berita }}">{{ $berita->title }}</a>
          </div>
          <div class="button-list">
            <div>
              <a id="buttonA" href="/Edit/{{ $berita->ID_berita }}">Sunting</a>
            </div>
            <div>
              <a id="buttonA1" href="/DeleteBerita/{{ $berita->ID_berita }}"
                onclick="return confirm('anda yakin menghapus berita')">Hapus</a>
            </div>
          </div>
        </div>
      @endforeach
    </section>
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
