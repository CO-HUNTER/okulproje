
<!DOCTYPE html>
<html lang="tr">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Aktivasyon</title>

  <!-- MY CSS -->
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: sans-serif;
    }

    nav {
      background-color: #2c3e50;
      color: #fff;
      padding: 20px 40px;
      height: 70px;
    }

    section {
      height: calc(100vh - 70px);
      display: flex;
      align-items: center;
      justify-content: center;
      flex-direction: column;
      font-size: 20px;
    }

    a {
      margin-top: 20px;
      text-decoration: none;
      color: #2980b9;
    }
  </style>
</head>

<body>

  <nav>
    <div class="logo">
      <h2>KİTABI-DEVRAN</h2>
    </div>
  </nav>

  <section>
    <p>
      Sayın <b>{{$data[1]['name'].' '.$data[1]['surName'] }}</b> aşağıdaki aktivasyon linkine tıklayarak üyeliğinizi onaylayabilirsiniz.
    </p>
    <a href="{{"http://okulproje/aktivasyon/".$data[0]}}" target="_blank" id="activation">{{"http://okulproje/aktivasyon/".$data[0]}}</a>
  </section>



</body>

</html>