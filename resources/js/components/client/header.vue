<template>
  <div>
    <nav class="nav_position navbar navbar-expand-md bg-transparent">
      <div class="nav_container container-fluid">

        <a
          class="navbar-brand"
          href="#"
        >
          <div class="brand_container">

            <img
              :src="logo"
              class="brand_logo"
              alt=""
            >
            <span class="brand_name font-weight-bold">BikeMo</span>

          </div>
        </a>
        <button
          class="navbar-toggler"
          type="button"
          data-toggle="collapse"
          data-target="#navbarNavDropdown"
          aria-controls="navbarNavDropdown"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class=""><i class="fas fa-bars"></i></span>
        </button>
        <div
          id="navbarNavDropdown"
          class="navbar-collapse collapse"
        >
          <ul class="navbar-nav mr-auto">
            <li class="nav-item nav_item">
              <a
                class="nav-link"
                href=""
              >Home</a>
            </li>
            <li class="nav-item nav_item">
              <a
                class="nav-link"
                href=""
              >About Us</a>
            </li>
            <li class="nav-item nav_item">
              <a
                class="nav-link"
                href=""
              >Pricing</a>
            </li>
            <li class="nav-item nav_item">
              <a
                style=""
                class="nav-link"
                href=""
              >Our Bikes</a>
            </li>

            <li class="nav-item nav_item">
              <a
                style=""
                class="nav-link"
                href=""
              >Contact</a>
            </li>

          </ul>
          <ul class="navbar-nav ">

            <li class=" nav-item">
              <button class="nav-link btnn signin mr-1">SignIn</button>
            </li>

            <li class="nav-item">
              <button class=" nav-link btnn signup">SignUp <i class="fas fa-arrow-right"></i></button>
            </li>

          </ul>
        </div>
      </div>
    </nav>

    <header class="bg">

      <div class="imageBikeContainer">
        <div class="bike_title_container">
          <div class="bike_title">
            <h1 class="main_tag">RIDE YOUR DREAM BIKE NOW<span style="color:#ef4a40">!</span></h1>
            <button
              type="button"
              class="rent_now btn btn-danger text-light btn-lg"
            >RENT NOW <i class="fas fa-bicycle"></i></button>
          </div>

        </div>
        <img
          :src="shadow"
          class="imageBike"
          alt=""
          width="50%"
        >
        <img
          :src="bikebg"
          class="imageBike1"
          alt=""
          width="50%"
        >

      </div>
    </header>

    <Cart />

    <footer class="pt-4 my-md-5 pt-md-5 border-top pl-3 pr-3">
      <div class="row">
        <div class="col-12 col-md">
          <img
            class="mb-2"
            src="https://getbootstrap.com/docs/4.0/assets/brand/bootstrap-solid.svg"
            alt=""
            width="24"
            height="24"
          >
          <small class="d-block mb-3 text-muted">&copy; 2017-2018</small>
        </div>
        <div class="col-6 col-md">
          <h5>Features</h5>
          <ul class="list-unstyled text-small">
            <li><a
                class="text-muted"
                href="#"
              >Cool stuff</a></li>
            <li><a
                class="text-muted"
                href="#"
              >Random feature</a></li>
            <li><a
                class="text-muted"
                href="#"
              >Team feature</a></li>
            <li><a
                class="text-muted"
                href="#"
              >Stuff for developers</a></li>
            <li><a
                class="text-muted"
                href="#"
              >Another one</a></li>
            <li><a
                class="text-muted"
                href="#"
              >Last time</a></li>
          </ul>
        </div>
        <div class="col-6 col-md">
          <h5>Resources</h5>
          <ul class="list-unstyled text-small">
            <li><a
                class="text-muted"
                href="#"
              >Resource</a></li>
            <li><a
                class="text-muted"
                href="#"
              >Resource name</a></li>
            <li><a
                class="text-muted"
                href="#"
              >Another resource</a></li>
            <li><a
                class="text-muted"
                href="#"
              >Final resource</a></li>
          </ul>
        </div>
        <div class="col-6 col-md">
          <h5>About</h5>
          <ul class="list-unstyled text-small">
            <li><a
                class="text-muted"
                href="#"
              >Team</a></li>
            <li><a
                class="text-muted"
                href="#"
              >Locations</a></li>
            <li><a
                class="text-muted"
                href="#"
              >Privacy</a></li>
            <li><a
                class="text-muted"
                href="#"
              >Terms</a></li>
          </ul>
        </div>
      </div>
    </footer>
  </div>

</template>

<script>
import Cart from "./categories_cart";
export default {
  components: {
    Cart
  },
  data() {
    return {
      logo: "../img/bikeLogo.png",
      bikebg: "../img/bikebg6.png",
      shadow: "../img/bikebg6shawdow.png"
    };
  }
};
</script>
<style scoped>
.bg {
  height: 70vh;
  margin-bottom: 9rem;
}
.nav_container {
  padding: 0 10rem 0 10rem;
}
/*SignIn ad SignUp  Css*/
.btnn {
  padding: 0.5rem;
  color: black;
}
.signin {
  min-width: 6rem;
  max-width: 50vw;
  font-weight: bolder;
}
.signin:hover {
  background-color: white;
  border-radius: 2.7rem / 100%;
  box-shadow: 0 2.8px 2.2px rgba(0, 0, 0, 0.034),
    0 6.7px 5.3px rgba(0, 0, 0, 0.048), 0 12.5px 10px rgba(0, 0, 0, 0.06),
    0 22.3px 17.9px rgba(0, 0, 0, 0.072);
  transition: 0.3s;
}
.signup {
  background-color: white;
  font-weight: bolder;
  min-width: 6rem;
  max-width: 50vw;
  border-radius: 2.7rem / 100%;

  box-shadow: 0 2.8px 2.2px rgba(0, 0, 0, 0.034),
    0 6.7px 5.3px rgba(0, 0, 0, 0.048), 0 12.5px 10px rgba(0, 0, 0, 0.06),
    0 22.3px 17.9px rgba(0, 0, 0, 0.072);
  transition: 0.3s;
}
.signup:hover {
  background-color: #ef4a40;
}

/*End SignIn ad SignUp  Css*/

/*nav_position ad SignUp  Css*/
.nav_position {
  margin-top: 2%;
}
.nav_item {
  text-align: center;
  font-family: "Trebuchet MS", "Lucida Sans Unicode", "Lucida Grande",
    "Lucida Sans", Arial, sans-serif;
  font-weight: bolder;
  min-width: 6rem;
  max-width: 50vw;
  border-radius: 2.7rem / 100%;
}
.rent_now {
  font-family: "Trebuchet MS", "Lucida Sans Unicode", "Lucida Grande",
    "Lucida Sans", Arial, sans-serif;
  font-weight: bolder;
}
.nav_item:hover {
  background-color: white;
  border-radius: 2.7rem / 100%;
  box-shadow: 0 2.8px 2.2px rgba(0, 0, 0, 0.034),
    0 6.7px 5.3px rgba(0, 0, 0, 0.048), 0 12.5px 10px rgba(0, 0, 0, 0.06),
    0 22.3px 17.9px rgba(0, 0, 0, 0.072);
  transition: 0.3s;
}
/*end nav_position ad SignUp  Css*/

/*brand  Css*/
.brand_container {
  display: flex;
  float: left;
}

.brand_name {
  color: #ef4a40;
  font-family: Impact, Haettenschweiler, "Arial Narrow Bold", sans-serif;
  font-size: 30px;
}
.brand_logo {
  margin-right: 0.3rem;
  vertical-align: middle;
  width: 45px;
  height: 45px;
}
li {
  font-family: "Arial", Helvetica, sans-serif;
}

.imageBikeContainer {
  position: relative;
}
.imageBike {
  width: 15%;
  position: absolute;
  display: block;
  top: 3rem;
  left: 50rem;
  opacity: 0.8;
  transform: scaleX(-1);
}
.imageBike1 {
  width: 40%;
  position: absolute;
  display: block;
  top: 0px;
  left: 200rem;
  transform: scaleX(-1);
  -webkit-animation: slide 0.2s forwards;
  -webkit-animation-delay: 0.2s;
  animation: slide 0.2s forwards;
  animation-delay: 0.2s;
}
@-webkit-keyframes slide {
  100% {
    left: 38rem;
  }
}

@keyframes slide {
  100% {
    left: 38rem;
  }
}

.bike_shawdow {
  width: 10px;
  height: 20px;
  background-color: transparent;
  box-shadow: 0 2.8px 2.2px rgba(0, 0, 0, 0.034),
    0 6.7px 5.3px rgba(0, 0, 0, 0.048), 0 12.5px 10px rgba(0, 0, 0, 0.06),
    0 22.3px 17.9px rgba(0, 0, 0, 0.072), 0 22.3px 17.9px rgba(0, 0, 0, 0.072);
}
.bike_title_container {
  padding: 2rem;
  height: 15rem;
  position: absolute;
  display: block;
  top: 6rem;
  left: 18rem;
}
.bike_title {
  position: relative;
  width: 35rem;
  text-align: left;
}
.main_tag {
  top: 50rem;

  font-size: 4rem;
  font-family: Impact, Haettenschweiler, "Arial Narrow Bold", sans-serif;
  font-weight: bolder;
}

/*smaller Devices Css*/
@media only screen and (max-width: 600px) {
  .bg {
    height: 38vh;
    margin-bottom: 1rem;
  }
  .nav_container {
    padding: 0 1rem 0 1rem;
  }
  .nav_position {
    margin-top: 0;
  }
  .btnn {
    padding: 0;
    min-width: 0;
    max-width: 0;
  }
  .nav_item {
    font-weight: bolder;
    min-width: 0;
    text-align: left;
    border-radius: 0;
  }
  .nav_item:hover {
    background-color: transparent;
    border-radius: 0;
    box-shadow: none;
    transition: 0.3s;
  }
  .imageBike1 {
    width: 50%;
    position: absolute;
    display: block;
    top: 0px;
    left: 100rem;
    transform: scaleX(-1);
    -webkit-animation: slide 0.2s forwards;
    -webkit-animation-delay: 0.2s;
    animation: slide 0.2s forwards;
    animation-delay: 0.2s;
  }
  @-webkit-keyframes slide {
    100% {
      left: 12rem;
    }
  }

  @keyframes slide {
    100% {
      left: 12rem;
    }
  }
  .imageBike {
    width: 15%;
    position: absolute;
    display: block;
    top: 2rem;
    left: 18rem;
    opacity: 0.8;
    transform: scaleX(-1);
  }
  .bike_title_container {
    padding: 2rem;
    height: 10rem;
    position: absolute;
    display: block;
    top: 1rem;
    left: 1rem;
  }
  .bike_title {
    width: 15rem;
  }
  .main_tag {
    font-family: "Arial", Helvetica, sans-serif;
    font-weight: bolder;
    font-size: 25px;
  }
}

@media only screen and (min-width: 600px) {
  .bg {
    height: 38vh;
    margin-bottom: 1rem;
  }
  .nav_container {
    padding: 0 1rem 0 1rem;
  }
  .nav_position {
    margin-top: 0;
  }
  .btnn {
    padding: 0;
    min-width: 0;
    max-width: 0;
  }
  .nav_item {
    font-weight: bolder;
    min-width: 0;
    text-align: left;
    border-radius: 0;
  }
  .nav_item:hover {
    background-color: transparent;
    border-radius: 0;
    box-shadow: none;
    transition: 0.3s;
  }
  .imageBike {
    width: 20%;
    position: absolute;
    display: block;
    top: 1rem;
    left: 21rem;
    opacity: 0.8;
    transform: scaleX(-1);
  }
  .imageBike1 {
    width: 40%;
    position: absolute;
    display: block;
    top: 0px;
    left: 100rem;
    transform: scaleX(-1);
    -webkit-animation: slide 0.2s forwards;
    -webkit-animation-delay: 0.2s;
    animation: slide 0.2s forwards;
    animation-delay: 0.2s;
  }
  @-webkit-keyframes slide {
    100% {
      left: 18rem;
    }
  }

  @keyframes slide {
    100% {
      left: 18rem;
    }
  }
  .bike_title_container {
    padding: 2rem;
    height: 10rem;
    position: absolute;
    display: block;
    top: 1rem;
    left: 2.5rem;
  }
  .bike_title {
    width: 17rem;
  }
  .main_tag {
    font-family: "Arial", Helvetica, sans-serif;
    font-weight: bolder;
    font-size: 28px;
  }
}
@media only screen and (min-width: 768px) {
  .bg {
    height: 38vh;
    
    margin-bottom: 1rem;
  }
  .nav_container {
    padding: 0;
  }
  .nav_position {
    margin-top: 1rem;
  }
  .btnn {
    padding: 0.5rem;
    color: black;
  }
  .nav_item {
    text-align: center;
    font-family: "Trebuchet MS", "Lucida Sans Unicode", "Lucida Grande",
      "Lucida Sans", Arial, sans-serif;
    font-weight: bolder;
    min-width: 4rem;
    max-width: 50vw;
    border-radius: 2.7rem / 100%;
  }
  .signin {
    min-width: 5rem;
    max-width: 50vw;
    font-weight: bolder;
  }
  .signup {
    background-color: white;
    font-weight: bolder;
    min-width: 5rem;
    max-width: 50vw;
    border-radius: 2.7rem / 100%;

    box-shadow: 0 2.8px 2.2px rgba(0, 0, 0, 0.034),
      0 6.7px 5.3px rgba(0, 0, 0, 0.048), 0 12.5px 10px rgba(0, 0, 0, 0.06),
      0 22.3px 17.9px rgba(0, 0, 0, 0.072);
    transition: 0.3s;
  }
  .imageBike {
    width: 22%;
    position: absolute;
    display: block;
    top: 1.5rem;
    left: 24rem;
    opacity: 0.8;
    transform: scaleX(-1);
  }
  .imageBike1 {
    width: 45%;
    position: absolute;
    display: block;
    top: 0px;
    left: 100rem;
    transform: scaleX(-1);
    -webkit-animation: slide 0.2s forwards;
    -webkit-animation-delay: 0.2s;
    animation: slide 0.2s forwards;
    animation-delay: 0.2s;
  }
  @-webkit-keyframes slide {
    100% {
      left: 20rem;
    }
  }

  @keyframes slide {
    100% {
      left: 20rem;
    }
  }
  .bike_title_container {
    padding: 2rem;
    height: 10rem;
    position: absolute;
    display: block;
    top: 1rem;
    left: 4rem;
  }
  .bike_title {
    width: 23rem;
  }
  .main_tag {
    font-family: "Arial", Helvetica, sans-serif;
    font-weight: bolder;
    font-size: 35px;
  }
}
@media only screen and (min-width: 992px) {
  .bg {
    height: 35vh;
    margin-bottom: 1rem;
  }
  .nav_container {
    padding: 0 4rem 0 3rem;
  }
  .nav_position {
    margin-top: 1rem;
  }
  .btnn {
    padding: 0.5rem;
    color: black;
  }
  .nav_item {
    text-align: center;
    font-family: "Trebuchet MS", "Lucida Sans Unicode", "Lucida Grande",
      "Lucida Sans", Arial, sans-serif;
    font-weight: bolder;
    min-width: 4rem;
    max-width: 50vw;
    border-radius: 2.7rem / 100%;
  }
  .nav_item:hover {
    background-color: white;
    border-radius: 2.7rem / 100%;
    box-shadow: 0 2.8px 2.2px rgba(0, 0, 0, 0.034),
      0 6.7px 5.3px rgba(0, 0, 0, 0.048), 0 12.5px 10px rgba(0, 0, 0, 0.06),
      0 22.3px 17.9px rgba(0, 0, 0, 0.072);
    transition: 0.3s;
  }
  .signin {
    min-width: 5rem;
    max-width: 50vw;
    font-weight: bolder;
  }
  .signup {
    background-color: white;
    font-weight: bolder;
    min-width: 5rem;
    max-width: 50vw;
    border-radius: 2.7rem / 100%;

    box-shadow: 0 2.8px 2.2px rgba(0, 0, 0, 0.034),
      0 6.7px 5.3px rgba(0, 0, 0, 0.048), 0 12.5px 10px rgba(0, 0, 0, 0.06),
      0 22.3px 17.9px rgba(0, 0, 0, 0.072);
    transition: 0.3s;
  }
  .imageBike {
    width: 22%;
    position: absolute;
    display: block;
    top: 2rem;
    left: 30rem;
    opacity: 0.8;
    transform: scaleX(-1);
  }
  .imageBike1 {
    width: 45%;
    position: absolute;
    display: block;
    top: 0px;
    left: 200rem;
    transform: scaleX(-1);
    -webkit-animation: slide 0.2s forwards;
    -webkit-animation-delay: 0.2s;
    animation: slide 0.2s forwards;
    animation-delay: 0.2s;
  }
  @-webkit-keyframes slide {
    100% {
      left: 24rem;
    }
  }

  @keyframes slide {
    100% {
      left: 24rem;
    }
  }
  .bike_title_container {
    padding: 2rem;
    height: 10rem;
    position: absolute;
    display: block;
    top: 3rem;
    left: 10rem;
  }
  .bike_title {
    width: 23rem;
  }
  .main_tag {
    font-family: "Arial", Helvetica, sans-serif;
    font-weight: bolder;
    font-size: 35px;
  }
}

@media only screen and (min-width: 1200px) {
  .bg {
    height: 70vh;
    margin-bottom: 9rem;
  }
  .nav_container {
    padding: 0 10rem 0 10rem;
  }
  /*SignIn ad SignUp  Css*/
  .btnn {
    padding: 0.5rem;
    color: black;
  }
  .signin {
    min-width: 6rem;
    max-width: 50vw;
    font-weight: bolder;
  }
  .signin:hover {
    background-color: white;
    border-radius: 2.7rem / 100%;
    box-shadow: 0 2.8px 2.2px rgba(0, 0, 0, 0.034),
      0 6.7px 5.3px rgba(0, 0, 0, 0.048), 0 12.5px 10px rgba(0, 0, 0, 0.06),
      0 22.3px 17.9px rgba(0, 0, 0, 0.072);
    transition: 0.3s;
  }
  .signup {
    background-color: white;
    font-weight: bolder;
    min-width: 6rem;
    max-width: 50vw;
    border-radius: 2.7rem / 100%;

    box-shadow: 0 2.8px 2.2px rgba(0, 0, 0, 0.034),
      0 6.7px 5.3px rgba(0, 0, 0, 0.048), 0 12.5px 10px rgba(0, 0, 0, 0.06),
      0 22.3px 17.9px rgba(0, 0, 0, 0.072);
    transition: 0.3s;
  }
  .signup:hover {
    background-color: #ef4a40;
  }

  /*End SignIn ad SignUp  Css*/

  /*nav_position ad SignUp  Css*/
  .nav_position {
    margin-top: 2%;
  }
  .nav_item {
    text-align: center;
    font-family: "Trebuchet MS", "Lucida Sans Unicode", "Lucida Grande",
      "Lucida Sans", Arial, sans-serif;
    font-weight: bolder;
    min-width: 6rem;
    max-width: 50vw;
    border-radius: 2.7rem / 100%;
  }
  .rent_now {
    font-family: "Trebuchet MS", "Lucida Sans Unicode", "Lucida Grande",
      "Lucida Sans", Arial, sans-serif;
    font-weight: bolder;
  }
  .nav_item:hover {
    background-color: white;
    border-radius: 2.7rem / 100%;
    box-shadow: 0 2.8px 2.2px rgba(0, 0, 0, 0.034),
      0 6.7px 5.3px rgba(0, 0, 0, 0.048), 0 12.5px 10px rgba(0, 0, 0, 0.06),
      0 22.3px 17.9px rgba(0, 0, 0, 0.072);
    transition: 0.3s;
  }
  /*end nav_position ad SignUp  Css*/

  /*brand  Css*/
  .brand_container {
    display: flex;
    float: left;
  }

  .brand_name {
    color: #ef4a40;
    font-family: Impact, Haettenschweiler, "Arial Narrow Bold", sans-serif;
    font-size: 30px;
  }
  .brand_logo {
    margin-right: 0.3rem;
    vertical-align: middle;
    width: 45px;
    height: 45px;
  }
  li {
    font-family: "Arial", Helvetica, sans-serif;
  }

  .imageBikeContainer {
    position: relative;
  }
  .imageBike {
    width: 15%;
    position: absolute;
    display: block;
    top: 3rem;
    left: 50rem;
    opacity: 0.8;
    transform: scaleX(-1);
  }
  .imageBike1 {
    width: 40%;
    position: absolute;
    display: block;
    top: 0px;
    left: 200rem;
    transform: scaleX(-1);
    -webkit-animation: slide 0.2s forwards;
    -webkit-animation-delay: 0.2s;
    animation: slide 0.2s forwards;
    animation-delay: 0.2s;
  }
  @-webkit-keyframes slide {
    100% {
      left: 38rem;
    }
  }

  @keyframes slide {
    100% {
      left: 38rem;
    }
  }

  .bike_shawdow {
    width: 10px;
    height: 20px;
    background-color: transparent;
    box-shadow: 0 2.8px 2.2px rgba(0, 0, 0, 0.034),
      0 6.7px 5.3px rgba(0, 0, 0, 0.048), 0 12.5px 10px rgba(0, 0, 0, 0.06),
      0 22.3px 17.9px rgba(0, 0, 0, 0.072), 0 22.3px 17.9px rgba(0, 0, 0, 0.072);
  }
  .bike_title_container {
    padding: 2rem;
    height: 15rem;
    position: absolute;
    display: block;
    top: 6rem;
    left: 18rem;
  }
  .bike_title {
    position: relative;
    width: 35rem;
    text-align: left;
  }
  .main_tag {
    top: 50rem;

    font-size: 4rem;
    font-family: Impact, Haettenschweiler, "Arial Narrow Bold", sans-serif;
    font-weight: bolder;
  }
}

/* .bg{

   
   
     background: linear-gradient(rgba(255,255,255,.2), rgba(255,255,255,.2)), url("https://mdbootstrap.com/img/Photos/Horizontal/Nature/full%20page/img%20%283%29.jpg")no-repeat center center fixed;
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    background-size: cover;
} */
</style>