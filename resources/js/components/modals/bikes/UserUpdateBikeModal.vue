<template>
  <div
    class="modal fade"
    id="UpdateBike"
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
            <i class="nav-icon fas fa-biking text-primary"></i> Update bike details
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
            <input
              type="hidden"
              v-model="bikeData.id"
              ref="id"
            >
            <div class="form-group">
              <label for="name">Bike Name</label>
              <input
                type="text"
                class="form-control"
                name="name"
                id="name"
                aria-describedby="emailHelp"
                v-model="bikeData.bike_name"
                placeholder="Enter name"
                ref="name"
              >
            </div>
            <div class="form-group">
              <label for="category">Bike Category</label>
              <select
                id="category"
                name="category"
                class="form-control"
                v-model="bikeData.bike_category_categ_id"
                ref="category"
              >
                <option value="">Select Category*</option>

                <option v-for="category in bikeCategory" :key="category.categ_id" :value="category.categ_id">{{category.category}}</option>
              </select>
            </div>

            <div class="form-group">
              <label for="specs">Bike Specs</label>
              <textarea
                class="form-control"
                placeholder="Enter Specs"
                v-model="bikeData.bike_specs"
                ref="specs"
                name="specs"
                id="specs"
                rows="3"
              ></textarea>
            </div>

            <div class="form-row">
              <div class="form-group col-sm-6">
                <label for="rent">Rent Price</label>
                <input
                  type="number"
                  class="form-control"
                  name="rent"
                  v-model="bikeData.rent_price"
                  ref="price"
                  id="rent"
                  placeholder="Enter price"
                >
              </div>
              <div class="form-group col-sm-6">
                <label for="category">Bike Availability</label>
                <select
                  id="availability"
                  name="availability"
                  class="form-control"
                  v-model="bikeData.availability"
                  ref="availability"
                >

                  <option value="">Select Availability*</option>
                  <option value="Available">Available</option>
                  <option value="Rented">Rented</option>
                  <option value="On Maintenance">On Maintenance</option>
                </select>
              </div>
            </div>

            <div class="form-group">
              <label for="rent">Bike Picture</label>
              <div class="">
                <img
                  id="image_preview"
                  :src="'../images/'+bikeData.img"
                  alt="form.img "
                  width="90"
                >

              </div>

              <div class="custom-file">
                <input
                  type="file"
                  accept="image/*"
                  id="uploadUpdate"
                  @change="previewImage"
                  hidden
                />
                <label
                  class="label mt-1"
                  for="uploadUpdate"
                >Choose file <i class="fas fa-upload"></i></label>
              </div>

            </div>

            <div class="row">
              <div class="col text-right">

                <button
                  type="submit"
                  class="btn btn-primary btn-sm text-light"
                >Update</button>
                <button
                  type="button"
                  data-dismiss="modal"
                  class="btn btn-secondary btn-sm text-light"
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
  props: {
    bikeData: {},
    bikeCategory: {}
  },
  data() {
    return {
      // Create a new form instance
      imagepreview: "",
      image: "",
      Form: new Form({
        name: "",
        category: "",
        specs: "",
        price: "",
        availability: ""
      })
    };
  },
  methods: {
    previewImage(e) {
      const file = e.target.files[0];
      this.image = file;
      this.imagepreview = URL.createObjectURL(file);
      document.getElementById("image_preview").src = this.imagepreview;
      console.log(this.$refs.id.value);
      //this.form.name = this.$refs.name.value
    },
    handleSubmit() {
      let formData = new FormData();
      
      formData.append("image", this.image);

      formData.append("name", this.$refs.name.value);
            console.log(formData.get('name'));
      formData.append("category", this.$refs.category.value);
      formData.append("specs", this.$refs.specs.value);
      formData.append("price", this.$refs.price.value);
      formData.append("availability", this.$refs.availability.value);

      /* this.form.name = this.$refs.name.value;
      this.form.category = this.$refs.category.value;
      this.form.specs = this.$refs.specs.value;
      this.form.price = this.$refs.price.value;
      this.form.availability = this.$refs.availability.value; */

      this.$Progress.start();
      axios
        .post("/api/bike/update/" +this.$refs.id.value, formData)
        .then(response => {
          if (response.status == 200) {
            this.$emit("reloadbikes");
            $("#UpdateBike").modal("hide");
            Toast.fire({
              icon: "success",
              title: "Bike info successfully updated"
            });
            this.$Progress.finish();
          }
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


