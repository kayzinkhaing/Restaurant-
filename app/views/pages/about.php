
<?php require_once APPROOT . '/views/inc/user/header.php' ?>
<?php require_once APPROOT . '/views/inc/user/navbar.php' ?>

<main class="main">
    <section id="about">
      <div class="about-wrapper container">
        <div class="about-text">
          <p class="small"><h2>We've beem making healthy food last for many years</h2></p>
          
          <p>
          Welcome to Yummy Restaurant, where flavor meets delight! Nestled in the heart of Myanmar, Yummy Restaurant is your go-to destination for an unforgettable dining experience. Our culinary team crafts each dish with passion and precision, ensuring that every bite is a journey through a world of flavors.

          <h2>Our Story</h2>

          <p>Yummy Restaurant was born from a love of food and a desire to bring people together. Established in [Year], we have grown into a beloved local spot where friends and family gather to enjoy delicious meals, warm hospitality, and a cozy atmosphere. Our commitment to quality and excellence shines through in everything we do.</p>
        </div>
        <div class="about-img">
          <img src="https://i.postimg.cc/mgpwzmx9/about-photo.jpg" alt="food" />
        </div>
      </div>
    </section>
    <section id="food">
      <h2>Types of food</h2>
      <div class="food-container container">
        <div class="food-type fruite">
          <div class="img-container">
            <img src="https://i.postimg.cc/yxThVPXk/food1.jpg" alt="error" />
            <div class="img-content">
              <h3>fruite</h3>
              <a
                href="https://en.wikipedia.org/wiki/Fruit"
                class="btn btn-primary"
                target="blank"
                >learn more</a
              >
            </div>
          </div>
        </div>
        <div class="food-type vegetable">
          <div class="img-container">
            <img src="https://i.postimg.cc/Nffm6Rkk/food2.jpg" alt="error" />
            <div class="img-content">
              <h3>vegetable</h3>
              <a
                href="https://en.wikipedia.org/wiki/Vegetable"
                class="btn btn-primary"
                target="blank"
                >learn more</a
              >
            </div>
          </div>
        </div>
        <div class="food-type grin">
          <div class="img-container">
            <img src="https://i.postimg.cc/76ZwsPsd/food3.jpg" alt="error" />
            <div class="img-content">
              <h3>grin</h3>
              <a
                href="https://en.wikipedia.org/wiki/Grain"
                class="btn btn-primary"
                target="blank"
                >learn more</a
              >
            </div>
          </div>
        </div>
      </div>
    </section>
    

  </body>
  <!-- 
    .................../ JS Code for smooth scrolling /...................... -->

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script>
    $(document).ready(function () {
      // Add smooth scrolling to all links
      $("a").on("click", function (event) {
        // Make sure this.hash has a value before overriding default behavior
        if (this.hash !== "") {
          // Prevent default anchor click behavior
          event.preventDefault();

          // Store hash
          var hash = this.hash;

          // Using jQuery's animate() method to add smooth page scroll
          // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
          $("html, body").animate(
            {
              scrollTop: $(hash).offset().top,
            },
            800,
            function () {
              // Add hash (#) to URL when done scrolling (default click behavior)
              window.location.hash = hash;
            }
          );
        } // End if
      });
    });
  </script>
</html>


  </main>
  <style>
    /* @import url("https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"); */

/* *,
*::after,
*::before {
  box-sizing: border-box;
  padding: 0;
  margin: 0;
} */



/* ............/navbar/............ *

/* desktop mode............/// */


/* ......//about us//...... */

#about {
  padding: 50px 0;
  background: #f5f5f7;
}

.about-wrapper {
  display: flex;
  flex-wrap: wrap;
}

#about h2 {
  font-size: 2.3rem;
}

#about p {
  font-size: 1.2rem;
  color: #555;
}

#about .small {
  font-size: 1.2rem;
  color: #666;
  font-weight: 600;
}

.about-img {
  flex: 1 1 400px;
  padding: 30px;
  transform: translateX(150%);
  animation: about-img-animation 1s ease-in-out forwards;
}

@keyframes about-img-animation {
  100% {
    transform: translate(0);
  }
}

.about-text {
  flex: 1 1 400px;
  padding: 30px;
  margin: auto;
  transform: translate(-150%);
  animation: about-text-animation 1s ease-in-out forwards;
}

@keyframes about-text-animation {
  100% {
    transform: translate(0);
  }
}

.about-img img {
  display: block;
  height: 400px;
  max-width: 100%;
  margin: auto;
  object-fit: cover;
  object-position: right;
}

/* ..........////Food category///........... */

#food {
  padding: 5rem 0 10rem 0;
}

#food h2 {
  text-align: center;
  font-size: 2.5rem;
  font-weight: 400;
  margin-bottom: 40px;
  text-transform: uppercase;
  color: #555;
}

.food-container {
  display: flex;
  justify-content: space-between;
}

.food-container img {
  display: block;
  width: 100%;
  margin: auto;
  max-height: 300px;
  object-fit: cover;
  object-position: center;
}

.img-container {
  margin: 0 1rem;
  position: relative;
}

.img-content {
  position: absolute;
  top: 70%;
  left: 50%;
  transform: translate(-50%, -50%);
  opacity: 0;
  z-index: 2;
  text-align: center;
  transition: all 0.3s ease-in-out 0.1s;
}

.img-content h3 {
  color: #fff;
  font-size: 2.2rem;
}

.img-content a {
  font-size: 1.2rem;
}

.img-container::after {
  content: "";
  display: block;
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background: rgba(0, 0, 0, 0.871);
  opacity: 0;
  z-index: 1;

  transform: scaleY(0);
  transform-origin: 100% 100%;
  transition: all 0.3s ease-in-out;
}

.img-container:hover::after {
  opacity: 1;
  transform: scaleY(1);
}

.img-container:hover .img-content {
  opacity: 1;
  top: 40%;
}

/* .........../Food Menu/............ */

.food-menu-heading {
  text-align: center;
  font-size: 3.4rem;
  font-weight: 400;
  color: #666;
}

.food-menu-container {
  display: flex;
  flex-wrap: wrap;
  padding: 50px 0px 30px 0px;
}

.food-menu-container img {
  display: block;
  width: 250px;
  height: 250px;
  border-radius: 50%;
  object-fit: cover;
  object-position: center;
}

.food-menu-item {
  display: flex;
  flex: 1 1 600px;
  justify-content: space-evenly;
  margin-bottom: 3rem;
}

.food-description {
  margin: auto 1.5rem;
}

.font-title {
  font-size: 1.8rem;
  font-weight: 400;
  color: #444;
}

.food-description p {
  font-size: 1.4rem;
  color: #555;
  font-weight: 500;
}

.food-description .food-price {
  color: #117964;
  font-weight: 700;
}

/* ........./ Testimonial /.......... */

#testimonials {
  padding: 5rem 0;
  background: rgba(243, 243, 243);
}

.testimonial-title {
  text-align: center;
  font-size: 2.8rem;
  font-weight: 400;
  color: #555;
}

.testimonial-container {
  display: flex;
  justify-content: space-between;
  font-size: 1.4rem;
  padding: 1rem;
}

.testimonial-box .checked {
  color: #ff9529;
}

.testimonial-box .testimonial-text {
  margin: 1rem 0;
  color: #444;
}



/* ......../ media query /.......... */

@media (max-width: 768px) {
  .navbar {
    opacity: 0.95;
  }





@media (max-width: 500px) {
  html {
    font-size: 65%;
  }


  .testimonial-container {
    flex-direction: column;
    text-align: center;
  }

  .food-menu-container img {
    margin: auto;
  }

  .food-menu-item {
    flex-direction: column;
    text-align: center;
  }
}

}

  </style>
  <?php require_once APPROOT . '/views/inc/user/footer.php' ?>

  