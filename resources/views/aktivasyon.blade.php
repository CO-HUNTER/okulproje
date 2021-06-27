
@if ($data==1)
<!DOCTYPE html>
<html lang="tr">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>

  <style>
    body {
      position: relative;
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      background-color: #2980b9;
      color: #fff;
      font-family: sans-serif;
    }

    .container__box {
      position: absolute;
      left: 50%;
      top: 50%;
      transform: translate(-50%, -50%);
      padding: 20px;
    }

    h1 {
      margin-right: 20px;
      font-weight: 500;
    }

    #time__text {
      font-size: 30px;
    }
  </style>

</head>

<body>
  <h1>YÖNLENDİRİLİYORSUNUZ</h1>
  <h2 id="time__text">5</h2>


  <script>
    window.addEventListener('DOMContentLoaded', (event) => {
      let time = document.querySelector("#time__text");
      let index = time.innerHTML;
      let interval = setInterval(() => {
        index--;
        if (index === 0) {
          clearInterval(interval);
          window.location.href = "https://www.busraticaret.com/";
        }
        time.innerHTML = index;
      }, 1000);
    });
  </script>

</body>

</html>

    
@else
    
{{"böyle bir aktavasyon kodu bulunamadı"}}
@endif