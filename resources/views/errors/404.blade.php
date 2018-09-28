<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>404 lur</title>
    <style type="text/css">
    @import url("https://fonts.googleapis.com/css?family=Bungee");

    body {
      background: #1b1b1b;
      color: white;
      font-family: "Bungee", cursive;
      margin-top: 50px;
      text-align: center;
  }
  a {
      color: #2aa7cc;
      text-decoration: none;
  }
  a:hover {
      color: white;
  }
  svg {
      width: 50vw;
  }
  .error-text {
      text-shadow: -2px -4px 0px black;
  }
  .alarm {
      animation: alarmOn 0.5s infinite;
  }

  @keyframes alarmOn {
      to {
        fill: darkred;
    }
}

</style>

</head>
<body>
  <svg xmlns="http://www.w3.org/2000/svg" id="robot-error" viewBox="0 0 260 118.9">
    <style type="text/css">.lightblue{fill:#444;} .eye{ cx:calc(120px + 20px * var(--mouse-x));cy:calc(50px + 20px * var(--mouse-y));} #eye-wrap{overflow:hidden;}</style>
    <defs>
        <clipPath id="white-clip"><circle id="white-eye" fill="#cacaca" cx="130" cy="65" r="20" /> </clipPath>
    </defs>
    <path class="alarm" fill="#e62326" d="M120.9 19.6V9.1c0-5 4.1-9.1 9.1-9.1h0c5 0 9.1 4.1 9.1 9.1v10.6" />
    <text class="error-text" fill="#2b2b2b" y="106" font-size="120"> 403 </text>
    <g id="robot">
      <g id="eye-wrap">
        <use xlink:href="#white-eye"></use>
        <circle class="eye" clip-path="url(#white-clip)" fill="#000" stroke="#2aa7cc" stroke-width="2" stroke-miterlimit="10" cx="130" cy="65" r="11" />
        <ellipse id="white-eye" fill="#2b2b2b" cx="130" cy="40" rx="18" ry="12" />
    </g>
    <circle class="lightblue" cx="105" cy="32" r="2.5" id="tornillo" />
    <use xlink:href="#tornillo" x="50"></use>
    <use xlink:href="#tornillo" x="50" y="60"></use>
    <use xlink:href="#tornillo" y="60"></use>
</g>
</svg>
<h1>You are not allowed to enter here</h1>
<h2>Go <a href="/">Home!</a></h2>


<script type="text/javascript">
var root = document.documentElement;

document.addEventListener("mousemove", evt => {
  let x = evt.clientX / innerWidth;
  let y = evt.clientY / innerHeight;

  root.style.setProperty("--mouse-x", x);
  root.style.setProperty("--mouse-y", y);
});

document.addEventListener("touchmove", touchHandler => {
  let x = touchHandler.touches[0].clientX / innerWidth;
  let y = touchHandler.touches[0].clientY / innerHeight;

  root.style.setProperty("--mouse-x", x);
  root.style.setProperty("--mouse-y", y);
});
</script>
</body>
</html>
