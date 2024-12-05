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
      <h1>Log In</h1>
      <p>Don't have an account? <a href="/SignUp">Sign Up</a></p>
    </div>
    @if (session()->has('massage'))
    <div class="error">{{session()->get('massage')}}</div>
  @endif
    <form action="/LoginAccount" method="post" enctype="multipart/form-data" class="form-container">
      @csrf
      <div>
        <label for="#">Name</label>
      </div>
      <input type="text" name="username" id="" />
      <div>
        <label for="#">Password</label>
      </div>
      <input type="password" name="password" id="" />
      <button id="button">Log In</button>
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