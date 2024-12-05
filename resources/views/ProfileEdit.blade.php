<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Baca Rek</title>
  <link rel="stylesheet" href="/css_reset.css" />
  <link rel="stylesheet" href="/Profile.css" />
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
    </div>
  </header>

  <main>
    <form action="/EditProfile" method="post">
      @csrf
      <div class="profileee">
        <label for="profilePicInput" class="profile-pic-wrapper">
          <img id="profilePic" src="/assets/Ellipse 5.png" alt="Profile Picture" class="profile-pic-large" />
          <img src="/assets/Change.png" class="edit-icon" />
        </label>
        <input id="profilePicInput" type="file" accept="image/*" class="hidden" onchange="updateProfilePicture(event)"
          disabled onchange="updateProfilePicture(event)" />
      </div>
      <div>
        <label for="">Nama Pengguna</label>
      </div>
      <input id="input-small" type="text" name="username" value="{{$dataAccount->username}}" />
      <div>
        <label for="">Kata Sandi</label>
      </div>
      <input id="input-small" type="text" name="password" value="{{$dataAccount->password}}" />
      <div>
        <label for="">Jenis Kelamin</label>
      </div>
      <select id="input-small" name="jenis_kelamin" id="">
        @if ($dataAccount->jenis_kelamin == 'laki')
      <option value="laki" selected>Laki-Laki</option>
      <option value="perempuan">Perempuan</option>
    @else
    <option value="laki">Laki-Laki</option>
    <option value="perempuan" selected>Perempuan</option>
  @endif
      </select>
      <button id="saveButton" class="upload" type="submit">
        Simpan
      </button>
    </form>
  </main>

  <footer>
    <div class="footer-container">
      <div class="connection-container">
        <div class="logo-text">
          <img src="assets/Logo and Text White.png" alt="Logo" />
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