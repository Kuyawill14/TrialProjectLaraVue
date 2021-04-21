<template>
  <div
    class="modal fade"
    id="addCategory"
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
            <i class="nav-icon fas fa-biking text-primary"></i> Add Bike Category
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
              <label for="name">Category Name</label>
              <input
                type="text"
                class="form-control"
                name="name"
                id="name"
                aria-describedby="emailHelp"
                v-model="form.category"
                placeholder="Enter name"
              >
            </div>


            <div class="form-group">
              <label for="specs">Description</label>
              <textarea
                class="form-control"
                placeholder="Enter Description"
                v-model="form.description"
                name="specs"
                id="specs"
                rows="3"
              ></textarea>
            </div>
     

     
         <!--    <div class="form-group">
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

            </div> -->

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

  data() {
    return {
      // Create a new form instance
/*       imagepreview: "",
      AddImage: "../images/Add.png",
      image: "", */
      form: new Form({
        category: "",
        description: ""
      })
    };
  },
  methods: {
 
    handleSubmit() {
      const fd = new FormData();


      fd.append("category", this.form.category);
      fd.append("description", this.form.description);

      this.$Progress.start();
      axios
        .post("/api/category/store", fd)
        .then(response => {
          if (response.status == 201) {
            this.imagepreview = "";
            this.$emit("reloadcategory");
            this.form.reset();
            $("#addCategory").modal("hide");
            Toast.fire({
              icon: "success",
              title: "Category added successfully"
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






