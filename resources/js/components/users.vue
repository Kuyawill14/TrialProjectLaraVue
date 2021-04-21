<template>
  <div>
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h3 class="m-0">User Management</h3>
          </div>
          <!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item">
                <router-link to="/dashboard">Home</router-link>
              </li>
              <li class="breadcrumb-item active">User Management</li>
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
                <h3 class="card-title">Users Table</h3>

                <div class="card-tools">
                  <div class="input-group-append">
                    <button
                      type="button"
                      data-toggle="modal"
                      data-target="#addNew"
                      class="btn btn-success btn-sm text-light"
                    >
                      <i class="fas fa-user-plus"></i> Add New
                    </button>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Role</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="user in users" :key="user.id">
                      <td>{{ user.id }}</td>
                      <td>{{ user.name }}</td>
                      <td>{{ user.email }}</td>
                      <td><span class="tag tag-success">Approved</span></td>
                      <td style="width: 9%">
                        <a href="#" class=""><i class="fa fa-edit"></i></a> /

                        <button
                          @click="RemoveUser(user.id)"
                          class="btn btn-danger btn-sm text-light"
                        >
                          <i class="fa fa-trash"></i>
                        </button>
                        <!--   <a @click="RemoveUser()" class=""
                          ><i class="fa fa-trash text-danger"></i
                        ></a> -->
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
      <UserModal />
    </div>
  </div>
</template>


<script>
import UserModal from "./modals/UserAddModal";
export default {
  components: {
    UserModal,
  },
  data: function () {
    return {
      users: [],
      id: "",
    };
  },
  methods: {
    getUsers() {
      axios
        .get("/api/user/all")
        .then((response) => {
          this.users = response.data;
        })
        .catch(function (error) {
          console.log(error);
        });
    },
    RemoveUser(id) {
      Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!",
      }).then((result) => {
        if (result.isConfirmed) {
          axios
            .delete("/api/user/" + id)
            .then((res) => {
              if (res.status == 200) {
                //Swal.fire("Deleted!", "User has been deleted.", "success");
                Toast.fire({
                  icon: "success",
                  title: "User has been deleted.",
                });
                this.getUsers();
              }
            })
            .catch((error) => {
              console.log(error);
            });
        }
      });
    },
  },

  created() {
    this.getUsers();
  },
};
</script>