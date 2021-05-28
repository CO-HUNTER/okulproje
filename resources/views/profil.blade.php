@extends('themas.thema')
@section('title','Profil')
@section('body')

<input type="hidden" name="_token" id="token" value={{ csrf_token() }}>

<section id="content">
  <!-- Profile Card -->
  <div id="a">
    <div class="profileCard">
      <div class="cardTop">
        <i class="fas fa-ellipsis-v scToggle"></i>
        <div class="scBox">
          <ul>
            <li style="--i:3">
              <a href="#"><i class="fab fa-instagram"></i></a>
            </li>
            <li style="--i:2">
              <a href="#"><i class="fab fa-facebook-f"></i></a>
            </li>
            <li style="--i:1">
              <a href="#"><i class="fab fa-twitter"></i></a>
            </li>
          </ul>
        </div>
      </div>
      <div class="cardBody">
        <div class="cardImg">
          <img src="content/images/{{$userInfo->resim}}" alt="userProfile">
        </div>
        <div class="userDetails">
          <h2>{{$userInfo->ad." ".$userInfo->soyad }}</h2>
          <h3>{{$userInfo->klncad}}</h3>
        </div>
      </div>
    </div>

    <!-- Kullanıcı Kitap Ekleme -->
    <div class="userAddBook">
      <div class="addInput">
        <div id="b">
          <input autocomplete="off" type="text" name="userAdd" placeholder="Kitap Ekle" required>
          <button class="addBookBtn"><i class="fas fa-plus"></i></button>
        </div>
        <div id="c">
          <p>
            <label>
              <input class="radio" id="radio1" type="radio" name="status" value="complete">
              Okundu
              <span></span>
            </label>
          </p>
          <input type="date" id="üğpo" required placeholder="Zaman Girin">
          <input type="number" min="0" id="çömn" required placeholder="Sayfa sayısı giriniz">
          <p>
            <label>
              <input class="radio" id="radio2" type="radio" name="status" value="uncomplete">
              Okunacak
              <span></span>
            </label>
          </p>
          <p>
            <label>
              <input class="radio" id="radio3" type="radio" name="status" value="reading">
              Okunuyor
              <span></span>
            </label>
          </p>
          <input type="number" min="0" id="qwer" required placeholder="Sayfa sayısı giriniz">
          <div class="bookList">
            <ul>
              <!-- Javascriptden gelecek -->
            </ul>
            <div class="error">
              <!-- Javascriptden gelecek -->
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Kullanıcı işlemleri -->
  <div class="userBox">
    <!-- Kullanıcın yaptığı yorumlar ve beğendiği kitaplar -->
    <aside class="aside1">
      <ul>
        <li>Kitaplar</li>
        <li>İstatistikler</li>
        <li>Notlar</li>
      </ul>
      <div class="underline"></div>
    </aside>

    <article class="cmtBox">
      <aside class="aside2">
        <ul>
          <li data-status="read">Okundu</li>
          <li data-status="toBeRead">Okunacak</li>
          <li data-status="reading">Okunuyor</li>
        </ul>
        <div class="underline"></div>
      </aside>
      <div class="cardBox">
        <div class="read"></div>
        <div class="toBeRead"></div>
        <div class="reading"></div>
      </div>
    </article>

    <article class="likes">
      <h2>İSTATİSTİKLER</h2>
      <div class="statistics">
        <canvas id="myChart" width="400" height="400"></canvas>
      </div>
      <div class="statistics">
        <canvas id="myChart2" width="400" height="400"></canvas>
      </div>
      <div class="statistics">
        <canvas id="myChart3" width="400" height="400"></canvas>
      </div>
      <div class="statistics">
        <canvas id="myChart4" width="400" height="400"></canvas>
      </div>
    </article>

    <article class="notes">
      <h2>NOTLAR</h2>
    </article>
  </div>
</section>

<!-- Notification Js -->
<script src="./content/js/notification.js"></script>
<script src="./content/js/ajax.js"></script>

<!-- Grafik -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.0.2/chart.min.js" integrity="sha512-dnUg2JxjlVoXHVdSMWDYm2Y5xcIrJg1N+juOuRi0yLVkku/g26rwHwysJDAMwahaDfRpr1AxFz43ktuMPr/l1A==" crossorigin="anonymous"></script>

<script>
  $(document).ready(function() {
    getProduct("read");
  });
</script>

<!-- Profile card click -->
<script>
  $(function() {
    $(".scToggle").click(e => $(".scBox ul li").toggleClass("active"));
  });
</script>

<!-- Kullanıcı yorumlar ve beğeniler -->
<!-- Aside menü effect -->
<script>
  $(function() {
    $(".userBox .aside1 ul li").click(e => {
      let a = $(e.target).index() * 100;
      $(".userBox .aside1 .underline").css("transform", `translateX(${a}%)`);
    });

    $(".userBox .aside2 ul li").click(e => {
      let a = $(e.target).index() * 100;
      $(".userBox .aside2 .underline").css("transform", `translateX(${a}%)`);
    });

    $(".userBox .aside1 ul li").click(e => {
      let a = $(e.target).index();

      switch (a) {
        case 0:
          $(".cmtBox").fadeIn("slow");
          $(".likes").fadeOut("slow");
          $(".notes").fadeOut("slow");
          break;

        case 1:
          $(".likes").fadeIn("slow");
          $(".cmtBox").fadeOut("slow");
          $(".notes").fadeOut("slow");
          break;

        case 2:
          $(".notes").fadeIn("slow");
          $(".cmtBox").fadeOut("slow");
          $(".likes").fadeOut("slow");
          break;
      }
    });

    $(".userBox .aside2 ul li").click(e => {
      let b = $(e.target).index();

      switch (b) {
        case 0:
          $(".read").fadeIn("slow");
          $(".read").siblings().fadeOut("slow");
          break;

        case 1:
          $(".toBeRead").fadeIn("slow");
          $(".toBeRead").siblings().fadeOut("slow");
          break;

        case 2:
          $(".reading").fadeIn("slow");
          $(".reading").siblings().fadeOut("slow");
          break;
      }
    });
  });
</script>

<!-- Useraddbook radio checked -->
<script>
  $(function() {
    $("#radio1,#radio2, #radio3").change(e => {
      $("#radio1").is(":checked") ? $("#üğpo").show() : $("#üğpo").hide();
      $("#radio1").is(":checked") ? $("#çömn").show() : $("#çömn").hide();
      $("#radio3").is(":checked") ? $("#qwer").show() : $("#qwer").hide();
    });
  });
</script>

<!-- Useraddbook input -->
<script>
  $(function() {
    let counter = -1;
    $("#b input").keyup(e => {
      let length = $("#b input").val().length;
      let code = e.keyCode;

      //--- İnput boşsa yada herhangi bir yere tıklanınca bookList 'i saklıyoruz eğer değilse gösteriyoruz
      length === 0 ? $(".bookList").fadeOut() : $(".bookList").fadeIn();
      $("body").click(e => $(".bookList").fadeOut());

      length !== 0 ? $(".addBookBtn").addClass("active") : $(".addBookBtn").removeClass("active");

      let next = count => {
        count = count >= $(".bookList ul li").length - 1 ? 0 : count + 1;
        return count;
      };
      let previos = prev => {
        prev = prev <= 0 ? $(".bookList ul li").length - 1 : prev - 1;
        return prev;
      };

      //--- Basılan tuşa göre active classını taşıyoruz
      switch (code) {
        case 40:
          counter = next(counter);
          $(".bookList ul li").removeClass("active");
          $(".bookList ul li:eq(" + counter + ")").addClass("active");
          break;

        case 38:
          counter = previos(counter);
          $(".bookList ul li").removeClass("active");
          $(".bookList ul li:eq(" + counter + ")").addClass("active");
          break;

          //--- ENTER tuşuna basıldığında hangi liste elemanı active classına sahipse onun içindeki metni inputun value değerine atıyoruz
        case 13:
          let target;
          $(".bookList ul li").each((index, item) => {
            target = $(item).hasClass("active") ? $(item).index() : target;
          });
          $("#b input").val($(".bookList ul li:eq(" + target + ") #bookName").text());
          $(".bookList").fadeOut();
          break;

          //---j  Yukarıdaki tuşlar haricinde bir tuşa basılırsa ajaxı çağırıyoruz
        default:
          let value = $("#b input").val();
          $.ajax({
            type: "POST",
            url: "{{route('filterbook')}}",
            headers: {
              'X-CSRF-TOKEN': $('#token').val()
            },
            data: {

              data1: value

            },
            success: response => {
              document.querySelector(".bookList ul").innerHTML = "";
              console.log(typeof response);
              Object.values(response).forEach(val => {

                document.querySelector(".bookList ul").innerHTML += "<li> <span id='bookName'>" + val.kitap_ad + "</span> <span>" + val.yazar_ad + "</span></li>";
                $(".bookList ul li").click(function() {
                  $("#b input").val($(this).children("#bookName").text());
                  $(this).siblings().removeClass("active");
                  $(this).addClass("active");
                });
              });


            },
            error: err => {
              console.log(err);
            }
          });
          break;
      }
    });
  });
</script>

<!-- Useraddbook -->
<script>
  $(document).ready(function() {
    $(".addBookBtn").click(function(e) {
      e.preventDefault();
      let control = 0;
      let selectedItem;

      $(".radio").each((index, item) => {
        control = $(item).is(":checked") ? control + 1 : control;
        selectedItem = $(item).is(":checked") ? item : selectedItem;
      });

      if (control === 0) {
        alert.error("Bir seçenek seçin !..", 4000);
      } else if (control === 1) {
        let item = $(selectedItem).attr("id");

        let val1 = $("#b input").val();

        if (item === "radio1") {
          if ($("#üğpo").val().length === 0 || $("#çömn").val() === "") {
            alert.error("Okundu seçeneğini seçebilmek için tarih alanını ve sayfa sayısını doldurmanız gerek", 4000);
            $("#üğpo").addClass("active");
            $("#çömn").addClass("active");
          } else {
            $("#üğpo").removeClass("active");

            let val2 = $("#üğpo").val();
            let val3 = $("#çömn").val();

            $.ajax({
              type: "POST",
              url: "{{route('bookStatusRead')}}",
              headers: {
                'X-CSRF-TOKEN': $('#token').val()
              },
              data: {
                res1: val1,
                res2: val2,
                res3: val3
              },
              success: response => {
                if (response === 0) {
                  alert.error("Bu kitap daha önce okundu olarak eklenmiş !..", 2000);
                } else if (response === 1) {
                  alert.error("Bu kitap daha önce okunuyor olarak eklenmiş !..", 2000)
                } else if (response === 2) {
                  alert.error("Bu kitap daha önce okunacak olarak eklenmiş !..", 2000)
                } else if (response === "succes") {
                  alert.success("Kitap başarıyla eklendi", 2000);
                  getProduct("toBeRead");
                }
              }
            });
          }
        } else if (item === "radio3") {
          console.log("doğru tıkladın");
          if ($("#qwer").val().length === 0) {
            alert.error("Okunuyor seçeneğini seçebilmek için kaç sayfa okuduğunuzu belirtmeniz gerek", 4000)
            $("#qwer").addClass("active");
          } else {
            $("#qwer").removeClass("active");
            let pageCount = $("#qwer").val();
            $.ajax({
              type: "POST",
              url: "{{route('bookStatusReading')}}",
              headers: {
                'X-CSRF-TOKEN': $('#token').val()
              },
              data: {
                res1: val1,
                data2: pageCount
              },
              success: resp => {
                if (resp === 0) {
                  alert.error("Bu kitap daha önce okundu olarak eklenmiş !..", 2000);
                } else if (resp === 1) {
                  alert.error("Bu kitap daha önce okunuyor olarak eklenmiş !..", 2000)
                } else if (resp === 2) {
                  alert.error("Bu kitap daha önce okunacak olarak eklenmiş !..", 2000)
                } else if (resp === "succes") {
                  alert.success("Kitap başarıyla eklendi", 2000);
                  getProduct("toBeRead");
                }
              }
            });
          }
        } else if (item === "radio2") {

          $.ajax({
            type: "POST",
            url: "{{route('bookStatusToBeRead')}}",
            headers: {
              'X-CSRF-TOKEN': $('#token').val()
            },
            data: {
              res1: val1
            },
            success: res => {
              if (res === 0) {
                alert.error("Bu kitap daha önce okundu olarak eklenmiş !..", 2000);
              } else if (res === 1) {
                alert.error("Bu kitap daha önce okunuyor olarak eklenmiş !..", 2000)
              } else if (res === 2) {
                alert.error("Bu kitap daha önce okunacak olarak eklenmiş !..", 2000)
              } else if (res === "succes") {
                alert.success("Kitap başarıyla eklendi", 2000);
                getProduct("toBeRead");
              }
            }
          });
        }
      }
    });
  });
</script>



<script>
  $(function() {
    $.ajax({
      type: "POST",
      url: "{{route('staticsYear')}}",
      headers: {
        'X-CSRF-TOKEN': $('#token').val()
      },
      success: response => {
        let dayList = [];
        let dataList = [];

        response.reverse().forEach((item, index) => {
          if (index % 2 === 1) {
            dayList.push(item)
          } else if (index % 2 === 0) {
            dataList.push(item)
          }
        })

        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
          type: 'line',
          data: {
            labels: dayList,
            datasets: [{
              label: 'Yıllık Okunan Kitap',
              data: dataList,
              backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)',
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
              ],
              borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)',
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)',
              ],
              borderWidth: 1
            }]
          },
          options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
              yAxes: [{
                ticks: {
                  beginAtZero: true
                }
              }]
            }
          }
        });
      }
    });

    $.ajax({
      type: "POST",
      url: "{{route('staticsMounth')}}",
      headers: {
        'X-CSRF-TOKEN': $('#token').val()
      },
      success: response => {
        let dayList = [];
        let dataList = [];

        response.reverse().forEach((item, index) => {
          if (index % 2 === 1) {
            dayList.push(item);
          } else if (index % 2 === 0) {
            dataList.push(item);
          }
        })

        var ctx = document.getElementById('myChart2').getContext('2d');
        var myChart = new Chart(ctx, {
          type: 'line',
          data: {
            labels: dayList,
            datasets: [{
              label: 'Aylık Okunan Kitap',
              data: dataList,
              backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)',
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
              ],
              borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)',
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)',
              ],
              borderWidth: 1
            }]
          },
          options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
              yAxes: [{
                ticks: {
                  beginAtZero: true
                }
              }]
            }
          }
        });
      }
    });

    $.ajax({
      type: "POST",
      url: "{{route('staticsPageYear')}}",
      headers: {
        'X-CSRF-TOKEN': $('#token').val()
      },
      success: response => {
        let dayList = [];
        let dataList = [];

        response.reverse().forEach((item, index) => {
          if (index % 2 === 1) {
            dayList.push(item);
          } else if (index % 2 === 0) {
            dataList.push(item);
          }
        })

        let newList = dataList.map(item => item == null ? 0 : item);

        var ctx = document.getElementById('myChart3').getContext('2d');
        var myChart = new Chart(ctx, {
          type: 'line',
          data: {
            labels: dayList,
            datasets: [{
              label: 'Yıllık Okunan Sayfa Sayısı',
              data: newList,
              backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)',
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
              ],
              borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)',
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)',
              ],
              borderWidth: 1
            }]
          },
          options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
              yAxes: [{
                ticks: {
                  beginAtZero: true
                }
              }]
            }
          }
        });
      }
    });

    $.ajax({
      type: "POST",
      url: "{{route('staticsPageMounth')}}",
      headers: {
        'X-CSRF-TOKEN': $('#token').val()
      },
      success: response => {
        //console.log(response);
        let dayList = [];
        let dataList = [];

        response.reverse().forEach((item, index) => {
          if (index % 2 === 1) {
            dayList.push(item);
          } else if (index % 2 === 0) {
            dataList.push(item);
          }
        })

        let newList = dataList.map(item => item == null ? 0 : item);

        var ctx = document.getElementById('myChart4').getContext('2d');
        var myChart = new Chart(ctx, {
          type: 'line',
          data: {
            labels: dayList,
            datasets: [{
              label: 'Aylık Okunan Sayfa Sayısı',
              data: newList,
              backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)',
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
              ],
              borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)',
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)',
              ],
              borderWidth: 1
            }]
          },
          options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
              yAxes: [{
                ticks: {
                  beginAtZero: true
                }
              }]
            }
          }
        });
      }
    });

  });
</script>

<!-- Update Js -->
<script>
  let updateBook = () => {
    let filter = $(event.target).attr('data-filter');
    let status = $(event.target).attr('data-cart');
    let ınputValue = $(event.target).siblings('input').val();
    let cardId = $(event.target).parent().parent().attr('id');

    if (filter === "updateReading") {
      let boundary = +$(event.target).siblings('input').attr('max');
      if (+ınputValue > boundary) {
        alert.error('Bu kitabın okunacak ' + boundary + ' sayfası kaldı');
        $(event.target).siblings('input').val('');
      } else {
        $.ajax({
          type: 'POST',
          url: 'http://okulproje/' + filter,
      headers: {
        'X-CSRF-TOKEN': $('#token').val()
      },
          data: {
            value: ınputValue,
            id: cardId,
            max:boundary
          },
          success: response => {
            getProduct(status);
          }
        });
      }
    } else if (filter === "updateToBeRead") {
      $.ajax({
        type: 'POST',
        url: 'http://okulproje/' + filter,
        headers: {
        'X-CSRF-TOKEN': $('#token').val()
      },
        data: {
          value: ınputValue,
          id: cardId
        },
        success: response => {
          console.log(response);
        }
      });
    }
  };
</script>

@endsection