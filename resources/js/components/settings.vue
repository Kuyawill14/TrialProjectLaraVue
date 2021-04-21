<template>
    <div>
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h3 class="m-0">Settings</h3>
          </div>
          <!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item">
                <router-link to="/dashboard">Home</router-link>
              </li>
              <li class="breadcrumb-item active">Settings</li>
            </ol>
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </div>

    <div class="content">
      <div class="container-fluid">
          <!-- Timelime example  -->
        <div class="row">
          <div class="col-md-12">
            <!-- The time line -->
            <div class="timeline">
              <!-- timeline time label -->
              <div class="time-label">
                <span class="bg-blue">SYSTEM PROPERTIES</span>
              </div>
              <!-- /.timeline-label -->
              <!-- timeline item -->
              <div>
                <i class="fas fa-file-signature bg-blue"></i>
                <div class="timeline-item">

                  <h3 class="timeline-header"><a href="#">System Name</a></h3>

                  <div class="timeline-body">
                      <div class="form-group">
                        <input type="text" v-model="system_name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter name">
                    </div>
                  </div>
                </div>
              </div>
              <!-- END timeline item -->
              <div>
                <i class="fas fa-file-signature bg-blue"></i>
                <div class="timeline-item">

                  <h3 class="timeline-header"><a href="#">System Logo</a></h3>

                  <div class="timeline-body">
                       <div class="form-group">

              <div class="">
                <img
                  id="image_id"
                  :src="system_logo"
                  alt="form.img "
                  width="200"
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
                  </div>
                </div>
              </div>
            
              <div class="time-label">
                <span class="bg-green">Client Page Properties</span>
              </div>
              <!-- /.timeline-label -->
              <!-- timeline item -->
              <div>
                <i class="fas fa-file-signature bg-green"></i>
                <div class="timeline-item">

                  <h3 class="timeline-header"><a href="#">System Landing page picture</a></h3>

                  <div class="timeline-body">
                       <div class="form-group">

              <div class="">
                <img
                  id="image_id1"
                  :src="landing_page_logo"
                  alt="form.img "
                  width="200"
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
                  </div>
                </div>
              </div>
               <!-- END timeline item -->
              <!-- timeline item -->
               <div>
                <i class="fas fa-file-signature bg-green"></i>
                <div class="timeline-item">

                  <h3 class="timeline-header"><a href="#">System Tagline</a></h3>

                  <div class="timeline-body">
                      <div class="form-group">
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter name">
                    </div>
                  </div>
                </div>
              </div>
              <!-- END timeline item -->
              <!-- timeline time label -->

              <div>
                <i class="fas fa-clock bg-gray"></i>
              </div>
            </div>
          </div>
          <!-- /.col -->
        </div>
  
      <!-- /.timeline -->
      </div>
    </div>
  </div>
</template>
<script>
export default {
    data(){
        return{
            system_name: "BikeMo",
            system_logo: '../img/bikelogo.png',
            landing_page_logo: '../img/bikebg.png'
        }
    },
    methods:{
        getSystemProperties(){
            
        }
    }
}
</script>
