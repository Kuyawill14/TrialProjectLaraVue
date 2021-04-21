<template>
  <div>
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h3 class="m-0">Bike Information</h3>
          </div>
          <!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item">
                <router-link to="/dashboard">Home</router-link>
              </li>
              <li class="breadcrumb-item active">Bike Information</li>
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

                <a
                  class="link ml-2"
                  @click="RefreshData"
                >
                  <i :class="[isLoading ? 'fas fa-sync-alt fa-spin': 'fas fa-sync-alt' ]"></i>
                </a>
                <h3 class="card-title">Bike Information</h3>

                <div class="card-tools">
                  <div class="input-group-append">
                    <button
                      type="button"
                      data-toggle="modal"
                      data-target="#addBike"
                      class="btn btn-success btn-sm text-light"
                    >
                      <i class="nav-icon fas fa-biking"></i>
                      Add New
                    </button>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="table-resposive table_res">
                <table class="table table-head-fixed table-bordered table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th class="text-center">Bike Picture</th>
                      <th>Bike Name</th>
                      <th class='collapsable'>Category</th>
                      <th class='collapsable'>Bike Specs</th>
                      <th>Rent Price</th>
                      <th>Availability</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr
                      v-for="(bike, index) in bikes.data"
                      :key="index"
                    >

                      <td class="text-center"><img
                          :src="'../images/'+bike.img"
                          alt="Bike Picture"
                          width="60"
                        ></td>
                      <td>{{ bike.bike_name }}</td>
                      <td class='collapsable'>{{ bike.category }}</td>
                      <td class='collapsable'>
                        <div class="specs">
                          {{ bike.bike_specs }}
                        </div>
                      </td>
                      <td>
                        <i class="fas fa-dollar-sign"></i>
                        <span class="font-weight-bold">{{ bike.rent_price }}</span>
                        /
                        <span class="text-danger font-weight-bold">hr</span>
                      </td>
                      <td>
                        <span
                          class="badge bg-success"
                          v-if="bike.availability === 'Available'"
                        >
                          {{bike.availability}}
                        </span>
                        <span
                          class="badge bg-danger"
                          v-else-if="bike.availability === 'Rented'"
                        >
                          {{bike.availability}}
                        </span>
                        <span
                          class="badge bg-info"
                          v-else
                        >
                          {{bike.availability}}
                        </span>
                      </td>
                      <td style="width: 9%">
                      <!--   <a
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
                          @click="removeBike(bike.id)"
                          class="btn btn-danger btn-sm text-light"
                        >
                          <i class="fa fa-trash"></i>
                        </button>
                        <!-- <a
                          @click="removeBike(bike.id)"
                          class="link"
                        ><i class="fa fa-trash text-danger"></i></a> -->
                      </td>
                    </tr>
                  </tbody>
                </table>
               
                </div>
                  
              </div>
              <!-- /.card-body -->
              <div class="card-footer" style="height:4rem">
               <pagination
                  :data="bikes"
                  @pagination-change-page="getResults"
                ></pagination>
              </div>
              <!-- /.card-footer -->
            </div>
            <!-- /.card -->
          </div>
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->

      <!-- /modalss -->
      <BikeModal
        :bikeCategory="category"
        v-on:reloadbikes="getBikes()"
      />
      <BikeModalUpate
        :bikeCategory="category"
        :bikeData="bikeData"
        v-on:reloadbikes="getBikes()"
      />
    </div>

  </div>
</template>

<script>
import VueLoadingButton from "vue-loading-button";
import BikeModal from "../modals/bikes/UserAddBikeModal";
import BikeModalUpate from "../modals/bikes/UserUpdateBikeModal";
export default {
  components: {
    BikeModal,
    BikeModalUpate,
    VueLoadingButton
  },
  data() {
    return {
      isLoading: false,
      currentPage: "",
      category: [],
      bikes: {},
      bikeData: [],
      bikeId: "",
      totalrented: 0,
      img: "../img/usericon.png"
    };
  },
  methods: {
    RefreshData() {
      this.getBikes();
      this.isLoading = true;

      setTimeout(() => (this.isLoading = false), 1500);
    },
    getResults(page = 1) {
      axios.get("/api/bike/all?page=" + page).then(response => {
        this.bikes = response.data;
      });
    },
    getBikes() {
      axios
        .get("/api/bike/all")
        .then(response => {
          this.bikes = response.data;
          this.currentPage = response.data.current_page;
          this.totalrented = 0;
          for (let index = 0; index < response.data.data.length; index++) {
            if (response.data.data[index].availability == "Rented") {
              this.totalrented++;
            }
            localStorage.setItem("total_rented", this.totalrented);
          }
          localStorage.setItem("total_bikes", this.bikes.data.length);
        })
        .catch(function(error) {
          console.log(error);
        });
    },
    UpdateBike(bike) {
      this.bikeData = bike;

      $("#UpdateBike").modal("show");
    },
    removeBike(id) {
      console.log(id);
      Swal.fire({
        title: "Are you sure you want to delete this bike?",
        //text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!"
      }).then(result => {
        if (result.isConfirmed) {
          axios
            .delete("/api/bike/" + id)
            .then(res => {
              if (res.status == 200) {
                //Swal.fire("Deleted!", "User has been deleted.", "success");
                Toast.fire({
                  icon: "success",
                  title: "Bike has been deleted."
                });
                this.getBikes();
              }
            })
            .catch(error => {
              console.log(error);
            });
        }
      });
    },
    getCategory() {
      axios
        .get("/api/category/all")
        .then(response => {
          this.category = response.data;
        })
        .catch(function(error) {
          console.log(error);
        });
    }
  },
  mounted() {
    this.getBikes();
    this.getCategory();
  }
};
</script>

<style scoped>
.table_res{
  height:29rem;

  overflow:auto;


}

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