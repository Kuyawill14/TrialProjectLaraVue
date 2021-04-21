<template>
  <div
    class="modal fade"
    id="addBike"
    tabindex="-1"
    role="dialog"
    aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true"
  >
    <div
      class="modal-dialog modal-dialog-centered"
      role="document"
    >
      <div class="modal-content">
        <div class="modal-header">
          <h5
            class="modal-title"
            id="exampleModalLongTitle"
          >
            <i class="nav-icon fas fa-biking text-primary"></i> Add new bike
          </h5>
          <button
            type="button"
            class="close"
            data-dismiss="modal"
            aria-label="Close"
          >
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form @submit.prevent="handleSubmit">
            <div class="form-group">
              <label for="name">Bike Name</label>
              <input
                type="text"
                class="form-control"
                name="name"
                id="name"
                aria-describedby="emailHelp"
                v-model="form.name"
                placeholder="Enter name"
              >
            </div>
            <div class="form-group">
              <label for="category">Bike Category</label>
              <select
                id="category"
                name="category"
                class="form-control"
                v-model="form.category"
              >
                <option value="">Select Category</option>
                <option
                  v-for="category in bikeCategory"
                  :key="category.categ_id"
                  v-bind:value="category.categ_id"
                >{{ category.category }}</option>

                <!-- 

                <option value="Mountain bike">Mountain bike</option>
                <option value="Road bike">Road bike</option>
                <option value="Regular bike">Regular bike</option>
                <option value="Chinese bike">Chinese bike</option>
                <option value="Kids bike">Kids bike</option> -->
              </select>
            </div>

            <div class="form-group">
              <label for="specs">Bike Specs</label>
              <textarea
                class="form-control"
                placeholder="Enter Specs"
                v-model="form.specs"
                name="specs"
                id="specs"
                rows="3"
              ></textarea>
            </div>
            <div class="form-group">
              <label for="rent">Rent Price</label>
              <input
                type="number"
                class="form-control"
                name="rent"
                v-model="form.price"
                id="rent"
                aria-describedby="emailHelp"
                placeholder="Enter price"
              >
            </div>

            <!--  <div class="form-group">
              <label for="rent">Bike Picture</label>
              <div class="d-flex justify-content-center"><img
                  :src="imagepreview"
                  alt="form.img "
                  width="100"
                ></div>

              <div class="custom-file">
                <input
                  type="file"
                  accept="image/*"
                  class="custom-file-input"
                  id="exampleInputFile"
                  @change="Getimage"
                >
                <label
                  class="custom-file-label"
                  for="exampleInputFile"
                >Choose file</label>
              </div>
            </div>
 -->
            <div class="form-group">
              <label for="rent">Bike Picture</label>
              <div class="">
                <img
                  id="image_id"
                  :src="AddImage"
                  alt="form.img "
                  width="90"
                >

              </div>

              <div class="custom-file">
                <input
                  type="file"
                  accept="image/*"
                  id="upload"
                  @change="Getimage"
                  hidden
                />
                <label
                  class="label mt-1"
                  for="upload"
                >Choose file <i class="fas fa-upload"></i></label>
              </div>

            </div>

            <div class="row">
              <div class="col text-right">

                <button
                  type="submit"
                  class="btn btn-primary btn-sm text-light"
                >Save</button>
                <button
                  type="button"
                  class="btn btn-secondary btn-sm text-light"
                  data-dismiss="modal"
                >
                  Close
                </button>
              </div>
            </div>

          </form>
        </div>
        <div class="modal-footer">

        </div>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  props: ["bikeCategory"],
  data() {
    return {
      // Create a new form instance
      category: [],
      imagepreview: "",
      AddImage: "../images/Add.png",
      image: "",
      form: new Form({
        name: "",
        category: "",
        specs: "",
        price: "",
        availability: "Available"
      })
    };
  },
  methods: {
    Getimage(e) {
      const file = e.target.files[0];
      this.image = file;
      this.imagepreview = URL.createObjectURL(file);
      document.getElementById("image_id").src = this.imagepreview;
    },
    handleSubmit() {
      const fd = new FormData();

      fd.append("image", this.image);
      fd.append("name", this.form.name);
      fd.append("category", this.form.category);
      fd.append("specs", this.form.specs);
      fd.append("rent", this.form.price);
      fd.append("availability", this.form.availability);

      this.$Progress.start();
      axios
        .post("/api/bike/store", fd)
        .then(response => {
          if (response.status == 200) {
            this.imagepreview = "";
            this.$emit("reloadbikes");
            this.form.reset();
            document.getElementById("image_id").src = "";
            
            $("#addBike").modal("hide");
            Toast.fire({
              icon: "success",
              title: "Bike added successfully"
            });
            this.$Progress.finish();
          }

          /*
          this.form.name = "";
          this.form.email = "";
          this.form.password = "";
          this.form.password_confirmation = ""; */
        })
        .catch(error => {
          this.errors = error.response.data.errors;
          console.log(this.errors);
        });
    }
  }
};
</script>

<style scoped>
.label {
  display: inline-block;
  background-color: #3490dc;
  color: white;
  padding: 0.3rem;
  font-family: sans-serif;
  border-radius: 0.3rem;
  cursor: pointer;
}
.label:hover {
  background-color: #227dc7;
}
</style>






