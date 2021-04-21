<template>
  <div class="content mt-5">
    <div class="row justify-content-center">
      <div class="login-box">
        <!-- /.login-logo -->
        <div class="card card-outline card-primary">
          <div class="card-header text-center">
            <a
              href="../../index2.html"
              class="h1"
            >
              <b>Bike</b><i class="fa fa-bicycle text-primary"></i>Rental</a>
          </div>
          <div class="card-body">
            <p class="login-box-msg">Sign in to start your session</p>

            <form
              form
              @submit.prevent="login"
              @keydown="form.onKeydown($event)"
            >
              <div class="input-group mb-3">
                <input
                  v-model="form.email"
                  type="text"
                  name="email"
                  placeholder="Email"
                  class="form-control"
                  :class="{ 'is-invalid': form.errors.has('email') }"
                />
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-envelope"></span>
                  </div>
                </div>
                <has-error
                  :form="form"
                  field="email"
                ></has-error>
              </div>

              <div class="input-group mb-3">
                <input
                  v-model="form.password"
                  type="password"
                  name="password"
                  placeholder="Password"
                  class="form-control"
                  :class="{ 'is-invalid': form.errors.has('password') }"
                />
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                  </div>
                </div>
                <has-error
                  :form="form"
                  field="password"
                ></has-error>
              </div>
              <div class="row">
                <div class="col-8">
                  <div class="icheck-primary">
                    <input
                      type="checkbox"
                      id="remember"
                    />
                    <label for="remember"> Remember Me </label>
                  </div>
                </div>
                <!-- /.col -->
                <div class="col-4">
                  <button
                    :disabled="form.busy"
                    type="submit"
                    class="btn btn-primary btn-block text-light"
                  >
                    Sign In
                  </button>
                </div>
                <!-- /.col -->
              </div>
            </form>

            <!-- <div class="social-auth-links text-center mt-2 mb-3">
              <a href="#" class="btn btn-block btn-primary">
                <i class="fab fa-facebook mr-2"></i> Sign in using Facebook
              </a>
              <a href="#" class="btn btn-block btn-danger">
                <i class="fab fa-google-plus mr-2"></i> Sign in using Google+
              </a>
            </div> -->
            <!-- /.social-auth-links -->

            <p class="mb-1">
              <a href="forgot-password.html">I forgot my password</a>
            </p>
            <p class="mb-0">
              <router-link
                to="/registerUser"
                class="text-center"
              >
                Register a new membership
              </router-link>
            </p>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
    </div>
  </div>
</template>

<script>
import VueRouter from "vue-router";
const { isNavigationFailure, NavigationFailureType } = VueRouter;
export default {
  data() {
    return {
      // Create a new form instance
      form: new Form({
        email: "",
        password: ""
      })
    };
  },

  methods: {
    login1() {
      this.$store.dispatch("currentUser/loginUser", this.form);
    },
    login() {
      // Submit the form via a POST request
      this.form.post("/api/user/login").then(
        response => {

          this.$Progress.start();
          if (response.data.remember_token) {
            Toast.fire({
              icon: "success",
              title: "Signed in successfully"
            });
            localStorage.setItem("User_token", response.data.remember_token);
            localStorage.setItem("user_name", response.data.user.name);
            localStorage.setItem("app_logo", "img/bikeLogo.png");
            localStorage.setItem("user_logo", "img/usericon.png");

            this.$router.push({
              path: "dashboard"
            });
          } else {
            Toast.fire({
              icon: "error",
              title: "Invalid login credentials"
            });
          }
          this.$Progress.finish();
        },
        function(error) {
          Toast.fire({
            icon: "error",
            title: "Log in Failed"
          });
          //console.log(error.response.data);
        }
      );
    }
  }
};
</script>

