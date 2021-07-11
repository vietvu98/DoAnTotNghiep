<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SHTP-Trung tâm đào tạo khu công nghệ cao</title>
    <link rel="shortcut icon" href="{{ asset('public/frontend/assets/logo.png') }}" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
<style>
    *,
::after,
::before {
  box-sizing: border-box;
  border-width: 0;
  margin: 0;
}

body {
  font-family: "Roboto", sans-serif;
  background-color: #ecf2f8;
  position: relative;
}

#logo {
  width: 50px;
}

p {
  font-size: 16px;
}
a {
  text-decoration: none;
  /*   text-transform: uppercase; */
}

h2 {
  color: #667eea;
}

/* #shadowbox {
  background-color: #667EEA;
  margin: 0 auto;
  width: 450px;
  height: 450px;
  position: absolute;

} */
#container {
  margin: 0 auto;
  position: relative;
  top: 50px;
  padding: 20px;
  /*   border: solid 1px red; */
  width: 450px;
  height: 450px;
  background-color: #fff;
  display: flex;
  flex-direction: column;
  align-items: center;
  box-shadow: 10px 10px 0px 0px rgba(102, 126, 234);
}
input {
  font-family: FontAwesome, "Roboto", sans-serif;
  font-size: 16px;
  background-color: #ecf2f8;
  padding: 13px;
  margin: 10px;
  width: 100%;
  height: 50px;
}

input:focus {
  border: 3px solid #c2e0fd;
}
input[placeholder]::before {
  content: "";
  background-image: url("https://img.icons8.com/ios/32/000000/key.png");
}
#myForm {
  margin: 10px auto;
  display: flex;
  flex-direction: column;
  width: 90%;
  align-items: center;
  justify-content: center;
}

button {
  margin: 20px 5px;
  padding: 10px;
  font-family: "Roboto", sans-serif;
  letter-spacing: 1.5px;
  font-size: 16px;
  cursor: pointer;
}
#loginButton {
  background-color: #667eea;
  color: #fff;
  width: 100%;
}

#registerButton {
  border: solid 1px rgba(0, 0, 0, 0.4);
  background-color: #fff;
  color: rgba(0, 0, 0, 0.8);
  width: 100%;
}

</style>
</head>
<body>
    <div id="shadowbox">
      <div id="container">

        <img id="logo" src="{{ asset('public/frontend/assets/logo.png') }}" alt="">
        <h2>Forgot Password</h2>
        <br>
        @if(Session::has('message'))
        <p style="font-size: 18px; color: green;" class="alert alert-info">{{ Session::get('message') }}</p>
        @elseif(Session::has('error'))
        <p  style="font-size: 18px; color: red;" class="alert alert-info">{{ Session::get('error') }}</p>
        @endif
        <form action="{{url('/recover_password')}}" method="POST">
            @csrf
          <input type="email" id="email" class="email" name="email" placeholder="&#xf0e0;   Email">
          <button id="loginButton" type="submit">Send</button>
          <a href="{{ URL::to('/dangnhap')}}" class="btn btn-success rounded-pill "> Quay lại trang đăng nhập</a>
        </form>
      </div>
    </div>
    <div id="gif">
        <a href="https://dribbble.com/shots/2197140-New-Material-Text-Fields">
            <img src="https://d13yacurqjgara.cloudfront.net/users/472930/screenshots/2197140/efsdfsdae.gif" alt="">
        </a>
    </div>
    <script src="{{asset('public/frontend/assets/js/quenmk.js')}}"></script>
</body>
</html>
