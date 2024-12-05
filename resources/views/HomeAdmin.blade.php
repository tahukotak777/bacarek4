<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Baca Rek</title>
  <link rel="stylesheet" href="css_reset.css" />
  <link rel="stylesheet" href="HomeAdmin.css" />
  <script src="https://unpkg.com/@phosphor-icons/web"></script>
</head>

<body>
  <header>
    <div class="header-atas">
      <a href="/" class="logo">
        <img src="/assets/Logo and Text Black.png" alt="logo"  />
      </a>
      <div class="picture-container">
        <a href="/Profile"><img src="/assets/Ellipse 5.png" alt="picture" class="profile-picture" /></a>
      </div>
    </div>
  </header>

  <main>
    @if (session()->has('success'))
    <div class="success">{{session()->get('success')}}</div>
  @endif
    <div class="wellcome">
      <h1>SELAMAT DATANG {{$dataAccount->username}}</h1>
      <p>Apa yang anda ingin lakukan?</p>
    </div>
    <section>
      <div class="titelbar-container">
        <p>Berita</p>
        <form action="/" method="get" class="searchBar">
          <input type="text" name="KB" id="idSearch" placeholder="Search...">
          <button><i class="ph ph-magnifying-glass"></i></button>
        </form>
      </div>
      <section class="container-riwayat">
        @foreach ($beritaALL as $berita)
      <div class="list-riwayat">
        <div>
        <a href="/DetailBerita/{{$berita->ID_berita}}">{{$berita->title}}</a>
        <p id="tanggal">{{$berita->tanggal}}</p>
        </div>
        <div class="button-list">
        <div>
          <a href="/Edit/{{$berita->ID_berita}}" id="buttonA">Sunting</a>
        </div>
        <div>
          <a id="buttonA1" href="/DeleteBerita/{{$berita->ID_berita}}"
          onclick="return confirm('anda yakin menghapus berita')">Hapus</a>
        </div>
        </div>
      </div>
    @endforeach
      </section>
    </section>

    <section>
      <div class="titelbar-container">
        <p>Hak Peran Penulis</p>
        <form action="/" method="get" class="searchBar">
          <input type="text" name="KA" id="idSearch" placeholder="Search...">
          <button type="submit"><i class="ph ph-magnifying-glass"></i></button>
        </form>
      </div>
      <section class="container-riwayat">
        @foreach ($accountALL as $account)
      @if ($account->role == "Penulis")
      <div class="list-riwayat">
      <div>
      <h1>{{$account->username}}</h1>
      <p>Peran : {{$account->role}}</p>
      </div>
      <div class="button-list">
      <div>
        <a href="/MencabutHak/{{$account->ID_account}}" id="buttonA1"
        onclick="return confirm('anda yakin mencabut hak {{$account->username}}')">Cabut Peran Penulis</a>
      </div>
      </div>
      </div>
    @endif
    @endforeach
      </section>
    </section>

    <section>
      <div class="titelbar-container">
        <p>Hak Peran Pembaca</p>
      </div>
      <section class="container-riwayat">
        @foreach ($accountALL as $account)
      @if ($account->role == "Pembaca")
      <div class="list-riwayat">
      <div>
      <div>
        <h1>{{$account->username}}</h1>
        <p>Peran : {{$account->role}}</p>
      </div>
      </div>
      <div class="button-list">
      <div>
        <a href="/MemberikanHak/{{$account->ID_account}}" id="buttonA">Beri Peran Penulis</a>
      </div>
      </div>
      </div>
    @endif
    @endforeach
      </section>
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