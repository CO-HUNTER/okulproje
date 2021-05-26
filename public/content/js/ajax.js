const getProduct = (field) => {
  $.ajax({
    type: "POST",
    url: "http://okulproje/getProduct",
    headers: {'X-CSRF-TOKEN': $('#token').val()},
    data: {
      res1: "val1"
    },
    success: data => {
      $(".read").text("");
      $(".reading").text("");
      $(".toBeRead").text("");
      $(".read").text(`olmuyorr`);
      var read="",reading="",toBeRead="";
      Object.values(data).forEach(element => {
        console.log(data);
        if(element.kitap_durum===0){
read+=` <div class='card'>
<div class='cardHeader'>
  <div>
    <div class='proImg'>
      <img src='content/images/${element.resim}.jpg' alt='profil_resim'>
    </div>
    <h2>İbrahim Sandıklılı</h2>
  </div>
  <div>
    <h3>User64</h3>
  </div>
</div>
<div class='cardContent'>
  <p>Kitap Adı:
    <span>${element.kitap_ad}</span>
    Yazar Adı:
    <span>${element.yazar_ad}</span>
  </p>
  Bu kitabı ${element.olusum_zaman} tarihinde okudunuz
</div>
</div>`;
        }
        if(element.kitap_durum===1){
          
          reading+=`<div class='card' id=${element.kid}>
        <div class='cardHeader'>
          <div>
            <div class='proImg'>
              <img src='content/images/${element.resim}.jpg' alt='profil_resim'>
            </div>
            <h2>İbrahim Sandıklılı</h2>
          </div>
          <div>
            <h3>User64</h3>
          </div>
        </div>
        <div class='cardContent'>
          <p>Kitap Adı:
            <span>${element.kitap_ad} </span>
            Yazar Adı:
            <span>${element.yazar_ad}</span>
            <br>
            <span>
              Bu kitabın ${element.sayfa_kalinan===null?'0':element.sayfa_kalinan} sayfasındasınız
            </span>
          </p>
          Okunan sayfa sayısı ekle<br />
          <input type='number' min='1' max='${element.max_sayfa===null?'0':element.max_sayfa}' name='işlk' required>
          <button data-cart='reading' data-filter='updateReading' class='updateBtn' onclick="updateBook(event);">EKLE</button>
        </div>
        </div>
        `;
        }
        if(element.kitap_durum===2){
          console.log("durum 2 if");
         toBeRead+=
          `<div class='card' id=${element.kid}>
          <div class='cardHeader'>
            <div>
              <div class='proImg'>
                <img src='content/images/${element.resim}.jpg' alt='profil_resim'>
              </div>
              <h2>İbrahim Sandıklılı</h2>
            </div>
            <div>
              <h3>User64</h3>
            </div>
          </div>
          <div class='cardContent'>
            <p>Kitap Adı:
              <span>${element.kitap_ad}</span>
              Yazar Adı:
              <span>${element.yazar_ad}</span>
              <br>
            </p>
            Kitabı okunuyor olarak ekle
            <br>
            <label>Kitap sayfa sayısı</label><br />
            <input type='number' min='1' name='işlk' required>
            <button data-cart='toBeRead' data-filter='updateToBeRead' class='updateBtn' onclick="updateBook(event);">Ekle</button>
          </div>
          </div>`;
        }
        $(".read").html(read);
        $(".reading").html(reading);
        $(".toBeRead").html(toBeRead);
      
      });
      
    //  $(`.${field}`).text("");
     // $(`.${field}`).append(data);
    }
  });
};