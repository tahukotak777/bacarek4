<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>BacaRek</title>
  <link rel="stylesheet" href="LoginSignUp.css" />
  <link rel="stylesheet" href="css_reset.css" />
</head>

<body>
  <header>
    <a href="/" class="logo">
      <img src="/assets/Logo and Text Black.png" alt="logo" />
    </a>
  </header>

  <main>
    <div class="title-container">
      <h1>Sign Up</h1>
      <p>Already have an account? <a href="/Login">Log In</a></p>
    </div>
    <form action="/CreateAccount" method="post" enctype="multipart/form-data" class="form-container">
      @csrf
      @if ($errors->any())
      <div class="error">{{$errors->first() }}</div>
    @endif
      <div>
        <label for="#">Name</label>
      </div>
      <input type="text" name="username" id="" />
      <div>
        <label for="#">Password</label>
      </div>
      <input type="password" name="password" id="" />
      <div>
        <label for="#">Gender</label>
      </div>
      <select name="jenis_kelamin" id="#">
        <option value="laki">laki-laki</option>
        <option value="perempuan">perempuan</option>
      </select>
      <button id="button">Sign Up</button>
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
          <h1>What is Baca Rek?</h1>
        </div>
        <div>
          <p>
            BacaRek is one of online websites which provides you a bunch of
            information regarding what you need, containing national,
            international, economy, sports, technology, automotive and
            entertainment news, and obviously free. To fill the readers needs
            in comfort, we don’t have any advertisement.
          </p>
        </div>
      </div>
    </div>
  </footer>
</body>

</html>