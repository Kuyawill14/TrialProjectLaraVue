<template>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">Laravel Vue JS File Upload Demo</div>

          <div class="card-body">

            <div
              v-if="success != ''"
              class="alert alert-success"
            >
              {{success}}
            </div>

            <form
              @submit.prevent="formSubmit"
              enctype="multipart/form-data"
            >
              <input
                type="file"
                class="form-control"
                v-on:change="onChange"
                accept="image/*"
              >
              <button class="btn btn-primary btn-block">Upload</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      image: ""
    };
  },
  methods: {
    onChange(e) {
      this.image = e.target.files[0];
    },
    formSubmit() {
 
 

      

      let fd = new FormData();
      fd.append("image", this.image);

      axios
        .post('http://127.0.0.1:8000/api/bike/upload', fd)
        .then(function(res) {
         console.log(res.data)
        })
        .catch(function(err) {
         console.log(err)
        });
    }
  }
};
</script>