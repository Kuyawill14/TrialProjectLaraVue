<template>

  <div class="main_conatainer container-fluid">
    <div class="row">
      <div class="col">
    
        <h3 style="font-family:impact;color:#ef4a40">Our Bikes</h3>
      </div>
      <div class="col text-right mb-2">
        <a
          class="btn btn-danger"
          href="#carouselExampleControlsNoTouching"
          data-slide="prev"
        > <i class="fas fa-chevron-left"></i> </a>
        <a
          class="btn btn-danger"
          href="#carouselExampleControlsNoTouching"
          data-slide="next"
        ><i class="fas fa-chevron-right"></i></a>

      </div>
    </div>
    <div
      id="carouselExampleControlsNoTouching"
      class="carousel slide"
      data-touch="false"
      data-ride="carousel"
    >
      <div class="carousel-inner">

        <div
          v-for="(item, index) in data.category"
          :key="index"
          v-if="item.bikes_count > 0"
          :class="index==0?'carousel-item active':'carousel-item'"
          data-interval="5000"
        >

          <h3
            class="text-center"
            style="font-family:impact;color:#ef4a40"
          >{{item.category}}</h3>
          <div class="row item_row">

            <span
              v-for="(bike, index1) in data.bikes[index]"
              :key="index1"
            >
       
              <div
           
                class="col-sm-12"
              >

                <div class="col-item">
                  <div class="photo">
                    <img
                      :src="'../images/'+bike.img"
                      class="img-responsive"
                      alt="a"
                    />
                  </div>
                  <div class="info">
                    <div class="row">
                      <div class="price col-md-6">
                        <p>{{bike.bike_name}}</p>
                        <h5 class="price-text-color">
                          {{bike.rent_price}}</h5>
                      </div>
                      <div class="rating hidden-sm col-md-6">

                        <span v-if="bike.rating > 0 && bike.rating == 5">
                          <i
                            v-for="n in 5"
                            class="price-text-color fa fa-star"
                          ></i>
                        </span>
                        <span v-else-if="bike.rating > 0 && bike.rating == 4">
                          <i
                            v-for="n in 4"
                            class="price-text-color fa fa-star"
                          ></i>
                          <i
                            v-for="n in 1"
                            class="fa fa-star"
                          ></i>
                        </span>
                        <span v-else-if="bike.rating > 0 && bike.rating == 3">
                          <i
                            v-for="n in 3"
                            class="price-text-color fa fa-star"
                          ></i>
                          <i
                            v-for="n in 2"
                            class="fa fa-star"
                          ></i>
                        </span>
                        <span v-else-if="bike.rating > 0 && bike.rating == 2">
                          <i
                            v-for="n in 2"
                            class="price-text-color fa fa-star"
                          ></i>
                          <i
                            v-for="n in 3"
                            class="fa fa-star"
                          ></i>
                        </span>
                        <span v-else-if="bike.rating > 0 && bike.rating == 1">
                          <i
                            v-for="n in 1"
                            class="price-text-color fa fa-star"
                          ></i>
                          <i
                            v-for="n in 4"
                            class="fa fa-star"
                          ></i>
                        </span>

                        <span v-else>
                          <i
                            v-for="n in 5"
                            class="fa fa-star"
                          ></i>
                        </span>

                      </div>
                    </div>
                    <div class="separator clear-left">
                      <p class="btn-add">
                        <i class="fa fa-shopping-cart"></i><a class="hidden-sm click_link">Rent Bike</a>
                      </p>
                      <p class="btn-details">
                        <i class="fa fa-list"></i><a
                          @click="RentBike(bike.id)"
                          class="hidden-sm click_link"
                        >More details</a>
                      </p>
                    </div>
                    <div class="clearfix">
                    </div>
                  </div>
                </div>
              </div>
            </span>
          </div>

        </div>

      </div>

    </div>
    <!-- modal -->
    <div
      id="viewModal"
      class="modal fade bd-example-modal-lg"
      tabindex="-1"
      role="dialog"
      aria-labelledby="myLargeModalLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog modal-lg">
        <div class="modal-content p-2">
          <div class="row">
            <div class="col-6">
              <div
                class="imageContainer"
                style="border:2px solid black;width:15rem;border-radius:10px;"
              >
                <img
                  :src="'../images/'+details.img"
                  alt=""
                  style="border-radius:10px;"
                >
              </div>

            </div>
            <div class="col-6 text-right">
              <div class="details">
                <h3>{{details.bike_name}}</h3>
              </div>
            </div>
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
      counter: 0,
      data: [],
      details: [],
      category1: [],
      bikes1: {},
      tempbikes: [],
      tempbikes2: []
    };
  },
  methods: {
    addCounter() {
      this.counter++;
    },
    getData() {
      axios
        .get("/api/page/sample")
        .then(response => {
          this.data = response.data;
          //this.bikes = response.data.bikes[0];
          console.log(this.data);

          this.tempbikes = response.data.bikes;
          this.category1 = response.data.category;
          let l1 = response.data.bikes.length;
          let l2 = response.data.category.length;

         
     
        })
        .catch(function(error) {
          console.log(error);
        });
    },
     /* getData() {
      axios
        .get("/api/page/all")
        .then(response => {
          this.data = response.data;
          //this.bikes = response.data.bikes[0];

          this.tempbikes = response.data.bikes;
          this.category1 = response.data.category;
          let l1 = response.data.bikes.length;
          let l2 = response.data.category.length;

         
     
        })
        .catch(function(error) {
          console.log(error);
        });
    }, */
    /*    getInfo(){
      this.bikes = this.data.bikes;
       for (let index = 0; index <  this.data.category; index++) {
            let counter = 0;
        
            this.category[index] = this.data.category[index];
            for (let i = 0; i < this.data.bikes.length; i++) {
              if(this.data.bikes[i].bike_category_categ_id == this.data.category[index].categ_id && counter < 4){

                  this.bikes[i] = this.data.bikes[i];
              }
              counter++;
            } 
          }
          console.log(this.data);
    }, */
    RentBike(id) {
      console.log(id);

      axios
        .get("/api/page/search/" + id)
        .then(res => {
          if (res.status == 200) {
            this.details = res.data;
            console.log(this.details);
          }
        })
        .catch(error => {
          console.log(error);
        });

      $("#viewModal").modal("show");
    }
  },
  mounted() {
    this.getData();
  }
};
</script>


<style scoped>
.main_conatainer {
  padding: 0 15rem 0 18rem;
}
.click_link {
  cursor: pointer;
}
.item_row {
  margin-left: 1rem;
}
.col-item {
  border: 1px solid #e1e1e1;
  border-radius: 5px;
  background: #fff;
  margin-bottom: 1rem;
  width: 15.3rem;
}
.col-item .photo img {
  margin: 0 auto;
  width: 100%;
}

.col-item .info {
  padding: 10px;
  border-radius: 0 0 5px 5px;
  margin-top: 1px;
}

.col-item:hover .info {
  background-color: #f5f5dc;
}
.col-item .price {
  /*width: 50%;*/
  float: left;
  margin-top: 5px;
}

.col-item .price h5 {
  line-height: 20px;
  margin: 0;
}

.price-text-color {
  color: red;
}

.col-item .info .rating {
  color: #777;
}

.col-item .rating {
  /*width: 50%;*/
  float: left;
  font-size: 10px;
  text-align: right;
  line-height: 52px;
  margin-bottom: 10px;
  height: 30px;
}

.col-item .separator {
  border-top: 1px solid #e1e1e1;
}

.clear-left {
  clear: left;
}

.col-item .separator p {
  line-height: 20px;
  margin-bottom: 0;
  margin-top: 10px;
  text-align: center;
}

.col-item .separator p i {
  margin-right: 5px;
}
.col-item .btn-add {
  width: 50%;
  float: left;
}

.col-item .btn-add {
  border-right: 1px solid #e1e1e1;
}

.col-item .btn-details {
  width: 50%;
  float: left;
  padding-left: 10px;
}
.controls {
  margin-top: 20px;
}
[data-slide="prev"] {
  margin-right: 10px;
}

@media only screen and (max-width: 600px) {
  .main_conatainer {
    padding: 0 1rem 0 1.5rem;
  }
  .item_row {
    margin-left: 0rem;
  }
  .col-item {
    margin-bottom: 1rem;
    width: 12.4rem;
  }
}

@media only screen and (min-width: 600px) {
  .main_conatainer {
    padding: 0 1rem 0 2rem;
  }
  .item_row {
    margin-left: 0px;
  }
  .col-item {
    margin-bottom: 1rem;
    width: 15rem;
  }
}

@media only screen and (min-width: 768px) {
  .main_conatainer {
    padding: 0 1rem 0 2rem;
  }

  .item_row {
    margin-left: 0.5rem;
    margin-top: 1rem;
  }
  .col-item {
    margin-bottom: 0.5rem;
    width: 9rem;
  }
  .col-item .photo img {
  margin: 0 auto;
  width: 80%;
}
}
@media only screen and (min-width: 992px) {
  .main_conatainer {
    padding: 0 2rem 0 2rem;
  }

  .item_row {
    margin-left: 0px;
    margin-top: 1rem;
  }
  .col-item {
    margin-bottom: 1rem;
    width: 13rem;
  }
}
@media only screen and (min-width: 1200px) {
  .main_conatainer {
    padding: 0 10rem 0 15rem;
  }
  .click_link {
    cursor: pointer;
  }
  .item_row {
    margin-left: 1rem;
  }
  .col-item {
    border: 1px solid #e1e1e1;
    border-radius: 5px;
    background: #fff;
    margin-bottom: 1rem;
    width: 15.3rem;
  }
  .col-item .photo img {
    margin: 0 auto;
    width: 100%;
  }

  .col-item .info {
    padding: 10px;
    border-radius: 0 0 5px 5px;
    margin-top: 1px;
  }

  .col-item:hover .info {
    background-color: #f5f5dc;
  }
  .col-item .price {
    /*width: 50%;*/
    float: left;
    margin-top: 5px;
  }

  .col-item .price h5 {
    line-height: 20px;
    margin: 0;
  }

  .price-text-color {
    color: red;
  }

  .col-item .info .rating {
    color: #777;
  }

  .col-item .rating {
    /*width: 50%;*/
    float: left;
    font-size: 10px;
    text-align: right;
    line-height: 52px;
    margin-bottom: 10px;
    height: 30px;
  }

  .col-item .separator {
    border-top: 1px solid #e1e1e1;
  }

  .clear-left {
    clear: left;
  }

  .col-item .separator p {
    line-height: 20px;
    margin-bottom: 0;
    margin-top: 10px;
    text-align: center;
  }

  .col-item .separator p i {
    margin-right: 5px;
  }
  .col-item .btn-add {
    width: 50%;
    float: left;
  }

  .col-item .btn-add {
    border-right: 1px solid #e1e1e1;
  }

  .col-item .btn-details {
    width: 50%;
    float: left;
    padding-left: 10px;
  }
  .controls {
    margin-top: 20px;
  }
  [data-slide="prev"] {
    margin-right: 10px;
  }
}
</style>