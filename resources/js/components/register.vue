<template>
  <div class="content mt-5">
    <div class="row justify-content-center">
      <div class="register-box">
        <div class="card card-outline card-primary">
          <div class="card-header text-center">
            <a
              href="../../index2.html"
              class="h1"
            ><b>Bike</b><i class="fa fa-bicycle text-primary"></i>Rental</a>
          </div>
          <div class="card-body">
            <p class="login-box-msg">Register a new membership</p>

            <form @submit.prevent="handleSubmit">
              <div class="input-group mb-3">

                <input
                  type="text"
                  class="form-control"
                  placeholder="Full name"
                  v-model="form.name"
                  name="name"
                  autocomplete="name"
                  :class="{ 'is-invalid': form.errors.has('name') }"
                  autofocus
                />
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-user"></span>
                  </div>
                </div>
                <has-error
                  :form="form"
                  field="name"
                ></has-error>
              </div>

              <div class="input-group mb-3">
                <input
                  type="email"
                  placeholder="Email"
                  class="form-control"
                  v-model="form.email"
                  autocomplete="email"
                />
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-envelope"></span>
                  </div>
                </div>
              </div>
              <div class="input-group mb-3">
                <input
                  placeholder="Password"
                  type="password"
                  class="form-control"
                  name="password"
                  v-model="form.password"
                  autocomplete="new-password"
                />
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                  </div>
                </div>
              </div>
              <div class="input-group mb-3">
                <input
                  placeholder="Retype password"
                  type="password"
                  class="form-control"
                  name="password_confirmation"
                  v-model="form.password_confirmation"
                  autocomplete="new-password"
                />
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-8">
                  <div class="icheck-primary">
                    <input
                      type="checkbox"
                      id="agreeTerms"
                      name="terms"
                      value="agree"
                    />
                    <label for="agreeTerms">
                      I agree to the <a href="#">terms</a>
                    </label>
                  </div>
                </div>
                <!-- /.col -->
                <div class="col-4">
                  <button
                    type="submit"
                    class="btn btn-primary btn-block text-light"
                  >
                    Register
                  </button>
                </div>
                <!-- /.col -->
              </div>
            </form>

            <!--  <div class="social-auth-links text-center">
              <a href="#" class="btn btn-block btn-primary">
                <i class="fab fa-facebook mr-2"></i>
                Sign up using Facebook
              </a>
              <a href="#" class="btn btn-block btn-danger">
                <i class="fab fa-google-plus mr-2"></i>
                Sign up using Google+
              </a>
            </div> -->
            <router-link
              to="/admin"
              class="text-center"
            >
              I already have a membership
            </router-link>
          </div>
          <!-- /.form-box -->
        </div>
        <!-- /.card -->
      </div>
      <!-- /.register-box -->
    </div>
  </div>
</template>

<script>
export default {
  data: () => ({
    form: new Form({
      name: "",
      email: "",
      password: "",
      password_confirmation: ""
    }),

  }),
  methods: {
    async handleSubmit() {
      this.$Progress.start();

      this.form
        .post("/api/user/register")
        .then(() => {
          Toast.fire({
            icon: "success",
            title: "User register in successfully"
          });

          this.form.name = "";
          this.form.email = "";
          this.form.password = "";
          this.form.password_confirmation = "";

          this.$Progress.finish();
        })
        .catch(error => {
          this.errors = error.response.data.errors;
        });
    }
    /* register() {
      this.$store.dispatch("currentUser/saveForm", this.form);
    }, */
  }
};
</script>