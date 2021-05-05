@extends('themas.thema')
@section('title','Anasayfa')
@section('body')

<header>
  <h2 class="slideTitle">Sizin İçin Önerilenler</h2>
</header>
<section class="slideSwip">
  <div class="swiper-container">
    <div class="swiper-wrapper">

      <div class="swiper-slide">
        <div class="imgBox">
          <img src="https://media.istockphoto.com/photos/books-picture-id949118068?s=170x170" alt="slide">
        </div>
        <div class="slideContent">
          <h2>Satranç</h2>
          <h3>Steffan Zweig</h3>
          <a href="#">Kitaba Git</a>
        </div>
      </div>

      <div class="swiper-slide">
        <div class="imgBox">
          <img src="https://media.istockphoto.com/photos/bookshelves-and-laptops-are-placed-on-the-library-deskelearning-class-picture-id1177967778?s=170x170" alt="slide">
        </div>
        <div class="slideContent">
          <h2>Kürk Mantolu Madonna</h2>
          <h3>Sabahattin Ali</h3>
          <a href="#">Kitaba Git</a>
        </div>
      </div>

      <div class="swiper-slide">
        <div class="imgBox">
          <img src="https://image.shutterstock.com/image-photo/concept-open-magic-book-pages-260nw-1585685068.jpg" alt="slide">
        </div>
        <div class="slideContent">
          <h2>İçimizdeki Şeytan</h2>
          <h3>Sabahattin Ali</h3>
          <a href="#">Kitaba Git</a>
        </div>
      </div>

      <div class="swiper-slide">
        <div class="imgBox">
          <img src="https://image.shutterstock.com/image-photo/collection-old-books-on-wooden-260nw-1567429222.jpg" alt="slide">
        </div>
        <div class="slideContent">
          <h2>Camdaki Kız</h2>
          <h3>Gülseren Budayıcıoğlu</h3>
          <a href="#">Kitaba Git</a>
        </div>
      </div>

    </div>
    <!-- Add Pagination -->
    <div class="swiper-pagination"></div>
  </div>
</section>

<header>
  <h2 class="slideTitle">En Çok Okunanlar</h2>
</header>
<section class="slideSwip">
  <div class="swiper-container">
    <div class="swiper-wrapper">

      <div class="swiper-slide">
        <div class="imgBox">
          <img src="https://media.istockphoto.com/photos/books-picture-id949118068?s=170x170" alt="slide">
        </div>
        <div class="slideContent">
          <h2>Satranç</h2>
          <h3>Steffan Zweig</h3>
          <a href="#">Kitaba Git</a>
        </div>
      </div>

      <div class="swiper-slide">
        <div class="imgBox">
          <img src="https://media.istockphoto.com/photos/bookshelves-and-laptops-are-placed-on-the-library-deskelearning-class-picture-id1177967778?s=170x170" alt="slide">
        </div>
        <div class="slideContent">
          <h2>Kürk Mantolu Madonna</h2>
          <h3>Sabahattin Ali</h3>
          <a href="#">Kitaba Git</a>
        </div>
      </div>

      <div class="swiper-slide">
        <div class="imgBox">
          <img src="https://image.shutterstock.com/image-photo/concept-open-magic-book-pages-260nw-1585685068.jpg" alt="slide">
        </div>
        <div class="slideContent">
          <h2>İçimizdeki Şeytan</h2>
          <h3>Sabahattin Ali</h3>
          <a href="#">Kitaba Git</a>
        </div>
      </div>

      <div class="swiper-slide">
        <div class="imgBox">
          <img src="https://image.shutterstock.com/image-photo/collection-old-books-on-wooden-260nw-1567429222.jpg" alt="slide">
        </div>
        <div class="slideContent">
          <h2>Camdaki Kız</h2>
          <h3>Gülseren Budayıcıoğlu</h3>
          <a href="#">Kitaba Git</a>
        </div>
      </div>

    </div>
    <!-- Add Pagination -->
    <div class="swiper-pagination"></div>
  </div>
</section>
@endsection
