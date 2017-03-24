<html>
<head>
  <title>Aer Framework</title>
  <style>
    html {
      background: url(/style/images/background.png) no-repeat center center fixed;
      -webkit-background-size: cover;
      -moz-background-size: cover;
      -o-background-size: cover;
      background-size: cover;
    }
    .parent {
      position: relative;
      height: 100%;
      width: 100%;
    }

    .child {
      width: 800px;
      height: 600px;
      padding: 20px;

      position: absolute;
      top: 30%;
      left: 50%;

      margin: 0px 0 0 -420px;
    }

    button {
      text-align: center;
      width: 600px;
      height: 100px;
      margin-left: 90px;
      background-color: #403074;
      color: lightgray;
      font-size: 3em;
      font-weight: bold;
      text-transform: uppercase;
      font-family: sans-serif;
      border-radius: 50px;
      border-style: none;
      cursor: pointer;
      margin-top: 10px;
      box-shadow: 10px 10px 10px #888888;
    }
  </style>
<body>
<div class="parent">
  <div class="child">
    <img src="/style/images/Aerframe_800.png">
    <button type="button">Create</button>
  </div>
</div>

</body>
</html>