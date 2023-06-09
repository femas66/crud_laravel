<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Noto+Sans:wght@700&family=Poppins:wght@400;500;600&display=swap');

    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: "Poppins", sans-serif;
    }

    body {
      margin: 0;
      padding: 0;
      background: rgb(157, 224, 173);
      background: #37306B;
      height: 100vh;
      overflow: hidden;
    }

    .center {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      width: 400px;
      background: white;
      border-radius: 10px;
      box-shadow: 10px 10px 15px rgba(0, 0, 0, 0.05);
    }

    .center h1 {
      color: #594F4F;
      text-align: center;
      padding: 20px 0;
      border-bottom: 1px solid silver;
    }

    .center form {
      padding: 0 40px;
      box-sizing: border-box;
    }

    form .txt_field {
      position: relative;
      border-bottom: 2px solid #9DE0AD;
      margin: 30px 0;
    }

    .txt_field input {
      color: #2a363b;
      width: 100%;
      padding: 0 5px;
      height: 40px;
      font-size: 16px;
      border: none;
      background: none;
      outline: none;
    }

    .txt_field label {
      position: absolute;
      top: 50%;
      left: 5px;
      color: #9DE0AD;
      transform: translateY(-50%);
      font-size: 16px;
      pointer-events: none;
      transition: .5s;
    }

    .txt_field span::before {
      content: '';
      position: absolute;
      top: 40px;
      left: 0;
      width: 0%;
      height: 2px;
      background: #45ADA8;
      transition: .5s;
    }

    .txt_field input:focus~label,
    .txt_field input:valid~label {
      top: -5px;
      color: #45ADA8;
    }

    .txt_field input:focus~span::before,
    .txt_field input:valid~span::before {
      width: 100%;
    }

    .pass {
      margin: -5px 0 20px 5px;
      color: #594F4F;
      cursor: pointer;
    }

    .pass:hover {
      text-decoration: underline;
    }

    button {
      width: 100%;
      height: 50px;
      border: 1px solid;
      background: #37306B;
      border-radius: 25px;
      font-size: 18px;
      color: #e9f4fb;
      font-weight: 700;
      cursor: pointer;
      outline: none;
    }

    button:hover {
      border-color: #99b898;
      transition: .5s;
    }

    .signup_link {
      margin: 30px 0;
      text-align: center;
      font-size: 16px;
      color: #666666;
    }

    .signup_link a {
      color: #594F4F;
      text-decoration: none;
    }

    .signup_link a:hover {
      text-decoration: underline;
    }

    a {
      text-decoration: none;
      color: #666666;
    }
    .alert {
    padding: 20px;
    background-color: #f44336;
    color: white;
  }

  .closebtn {
    margin-left: 15px;
    color: white;
    font-weight: bold;
    float: right;
    font-size: 22px;
    line-height: 20px;
    cursor: pointer;
    transition: 0.3s;
  }

  .closebtn:hover {
    color: black;
  }
  </style>
  @if ($errors->any())
  @foreach ($errors->all() as $error)
  <div class="alert">
    <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
    {{ $error }}
  </div>
  @endforeach
  @endif
  <link rel="icon" type="image/x-icon" href="img/logo.ico">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <meta charset="utf-8">
  <script src="https://kit.fontawesome.com/83685fdc33.js" crossorigin="anonymous"></script>
  <title>FEMAS</title>
</head>

<body>
  @if (Session::get('msg'))
  <script>
    Swal.fire(
        'Email tidak ditemukan'
      )
  </script>
  @endif
  <div class="center">
    <h1>Lupa Password</h1>
    <form method="post" action="{{ route('forgot-password.store') }}">
      @csrf
      <div class="txt_field">
        <input type="text" required name="email" autofocus>
        <span></span>
        <label><i class="fa-solid fa-envelope"></i> Email</label>
      </div>
      <div class="txt_field">
        <script>
          function ceksama() {
              let password = document.getElementById('password').value;
              let confirmpassword = document.getElementById('confirmpassword').value;
              if (password == confirmpassword) {
                document.getElementById('error').style.visibility = 'hidden';
                document.getElementById('btn').disabled = false;
              } else {
                document.getElementById('btn').disabled = true;
                document.getElementById('error').style.visibility = 'visible';
              }
            }
        </script>

        <input type="password" name="password" autofocus id="password" onkeyup="ceksama()">
        <span></span>
        <label><i class="fa-solid fa-lock"></i> Password baru</label>
      </div>
      <div class="txt_field">
        <input type="password" name="password" autofocus id="confirmpassword" onkeyup="ceksama()">
        <span></span>
        <label><i class="fa-solid fa-lock"></i> Konfirmasi Password baru</label>
      </div>
      <div class="pass"><a href='{{ route('login') }}'>Login</a></div>
      <button type="submit" name="submit" disabled id="btn">Reset</button>
      <div class="signup_link" style="color: red; visibility: hidden;" id="error">
        Password tidak sama
      </div>
    </form>
  </div>
</body>

</html>