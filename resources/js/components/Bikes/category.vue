<template>
  <div>
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h3 class="m-0">Bike Category</h3>
          </div>
          <!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item">
                <router-link to="/dashboard">Home</router-link>
              </li>
              <li class="breadcrumb-item active">Bike Category</li>
            </ol>
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Bike Category</h3>
                <a
                  class="link ml-2"
                  @click="RefreshData"
                >
                  <i :class="[isLoading ? 'fas fa-sync-alt fa-spin': 'fas fa-sync-alt' ]"></i>
                </a>
                <div class="card-tools">
                  <div class="input-group-append">
                    <button
                      type="button"
                      data-toggle="modal"
                      data-target="#addCategory"
                      class="btn btn-success btn-sm text-light"
                    >
                      <i class="nav-icon fas fa-biking"></i>
                      Add New
                    </button>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th>Category</th>
                      <th>Description</th>
                      <th># of Bike</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr
                      v-for="category in category"
                      :key="category.id"
                    >
                      <td>{{category.category}}</td>
                      <td>{{category.description}}</td>
                      <td>{{category.bikes_count}}</td>
                      <td style="width: 9%">
                        <!-- <a
                          @click="UpdateBike(bike)"
                          class="link"
                        ><i class="fa fa-edit text-primary"></i></a> -->
                        <button
                          @click="UpdateBike(bike)"
                          class="btn btn-primary btn-sm text-light"
                        >
                          <i class="fa fa-edit"></i>
                        </button>
                        /

                        <button
                          @click="removeCategory(category.categ_id)"
                          class="btn btn-danger btn-sm text-light"
                        >
                          <i class="fa fa-trash"></i>
                        </button>
                        <!--  <a
                          @click="removeBike(bike.id)"
                          class="link"
                        ><i class="fa fa-trash text-danger"></i></a> -->
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->

      <!-- /modalss -->
      <AddCategory v-on:reloadcategory="getCategories()" />
      <BikeModalUpate
        :bikeData="bikeData"
        v-on:reloadbikes="getBikes()"
      />
    </div>

  </div>
</template>

<script>
import AddCategory from "../modals/category/AddCategoryModal";
import BikeModalUpate from "../modals/bikes/UserUpdateBikeModal";
export default {
  components: {
    AddCategory,
    BikeModalUpate
  },
  data() {
    return {
      isLoading: false,
      category: [],
      bikeData: [],
      bikeId: "",
      totalrented: 0,
      img: "../img/usericon.png"
    };
  },
  methods: {
    RefreshData() {
      this.getCategories();
      this.isLoading = true;

      setTimeout(() => (this.isLoading = false), 1500);
    },
    getCategories() {
      axios
        .get("/api/category/all")
        .then(response => {
          this.category = response.data;
          /* this.totalrented = 0;
          for (let index = 0; index < response.data.length; index++) {
            if (response.data[index].availability == "Rented") {
              this.totalrented++;
            }
            localStorage.setItem("total_rented", this.totalrented);
          }
          localStorage.setItem("total_bikes", this.bikes.length); */
        })
        .catch(function(error) {
          console.log(error);
        });
    },
    UpdateBike(bike) {
      this.bikeData = bike;
      $("#UpdateBike").modal("show");
    },
    removeCategory(id) {
      Swal.fire({
        title: "Are you sure you want to delete this category?",
        //text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!"
      }).then(result => {
        if (result.isConfirmed) {
          axios
            .delete("/api/category/" + id)
            .then(res => {
              if (res.status == 200) {
                //Swal.fire("Deleted!", "User has been deleted.", "success");
                Toast.fire({
                  icon: "success",
                  title: "Category has been deleted."
                });
                this.getCategories();
              }
            })
            .catch(error => {
              console.log(error);
            });
        }
      });
    }
  },

  created() {
    this.getCategories();
  }
};
</script>

<style scoped>
.link {
  cursor: pointer;
}
.specs {
  word-break: break-word;
  white-space: normal;
  overflow-wrap: break-word;
  word-wrap: break-word;
  -ms-word-break: break-word;
  word-break: break-word;
  -ms-hyphens: auto;
  -moz-hyphens: auto;
  -webkit-hyphens: auto;
  hyphens: auto;
}

@media only screen and (max-width: 900px) {
  .collapsable {
    display: none;
  }
}
</style>