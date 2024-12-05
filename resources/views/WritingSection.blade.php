<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Baca Rek</title>
  <link rel="stylesheet" href="/css_reset.css" />
  <link rel="stylesheet" href="/WritingSection.css" />
</head>

<sc>
  <header>
    <div class="header-atas">
      <a href="/" class="logo">
        <img src="/assets/Logo and Text Black.png" alt="logo" />
      </a>
      <div class="picture-container">
        <a href="/Profile.html"><img src="/assets/Ellipse 5.png" alt="picture" class="profile-picture" /></a>
      </div>
    </div>
  </header>

  <main>
    @if (!$berita)
      <form action="/UploadBerita" method="post" enctype="multipart/form-data">
        @csrf
        @if ($errors)
          <div class="error">{{ $errors->first() }}</div>
        @endif
        @if (session()->has('success'))
          <div class="success">{{ session()->get('success') }}</div>
        @endif
        <div>
          <label for="">Judul</label>
        </div>
        <input id="input-small" type="text" name="title" value="" />
        <div>
          <label for="">Tanggal</label>
        </div>
        <input id="input-small" type="date" name="tanggal" />
        <div>
          <label for="">Kategori</label>
        </div>
        <select id="input-small" name="kategori" id="">
          @foreach ($kategoris as $kategori)
            <option value="{{ $kategori->ID_kategori }}">{{ $kategori->kategori }}</option>
          @endforeach
        </select>
        <div>
          <label>Gambar</label>
        </div>
        <div class="file-input-wrapper">
          <label for="file-input" class="file-input-label">
            Jatuhkan File anda di sini
          </label>
          <input type="file" id="file-input" class="file-input" accept="image/*" name="photo" value="" />
          <img id="preview-image" class="preview-image" alt="Preview" />
        </div>
        <div>
          <label for="">Teks</label>
        </div>
        <textarea name="desc" id="input-large"></textarea>
        <button class="upload">Unggah</button>
      </form>
    @else
      <form action="/EditBerita/{{ $berita->ID_berita }}" method="post" enctype="multipart/form-data">
        @csrf
        <div>
          <label for="">Judul</label>
        </div>
        <input id="input-small" type="text" name="title" value="{{ $berita->title }}" />
        <div>
          <label for="">Tanggal</label>
        </div>
        <input id="input-small" type="date" name="tanggal" value="{{ $berita->tanggal }}" />
        <div>
          <label for="">Kategori</label>
        </div>
        <select id="input-small" name="kategori" id="">
          <option value="{{ $berita->ID_kategori }}">
            @foreach ($kategoris as $kategori)
              @if ($kategori->ID_kategori == $berita->ID_kategori)
                {{$kategori->kategori}}
              @endif
            @endforeach
          </option>
          @foreach ($kategoris as $kategori)
            @if ($kategori->ID_kategori != $berita->ID_kategori)
              <option value="{{ $kategori->ID_kategori }}">{{ $kategori->kategori }}</option>
            @endif
          @endforeach
        </select>
        <div>
          <label>Gambar</label>
        </div>
        <div class="file-input-wrapper">
          <label for="file-input" class="file-input-label">
            Jatuhkan File anda di sini
          </label>
          <input type="file" id="file-input" class="file-input" accept="image/*" name="photo"
            value="{{ $berita->photo }}" />
          <img id="preview-image" class="preview-image" alt="Preview" />
          <!-- <label for="file-input" class="file-input-label">Jatuhkan File anda di sini</label>
  <input type="file" id="file-input" class="file-input" name="photo" value="{{ $berita->photo }}"/> -->
        </div>
        <div>
          <label for="">Teks</label>
        </div>
        <textarea name="desc" id="input-large" value="{{ $berita->desc }}">{{ $berita->desc }}</textarea>
        <button class="upload">Edit</button>
      </form>
    @endif

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
  <script src="/UploadImg.js"></script>
</sc>

</html>
