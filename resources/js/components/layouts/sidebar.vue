<template>
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <router-link
      to="/dashboard/"
      class="brand-link"
    >
      <img
        :src="datas[1]"
        alt="AdminLTE Logo"
        class="brand-image img-circle elevation-3"
        style="opacity: 0.8"
      />
      <span class="brand-text font-weight-light"><b>Bike</b>Mo</span>
    </router-link>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img
            :src="datas[2]"
            class="img-circle elevation-2"
            alt="User Image"
          />
        </div>
        <div class="info">
          <a
            href="#"
            class="d-block"
          >{{ datas[0] }}</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <!-- <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input
            class="form-control form-control-sidebar"
            type="search"
            placeholder="Search"
            aria-label="Search"
          />
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div> -->

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul
          class="nav nav-pills nav-sidebar flex-column"
          data-widget="treeview"
          role="menu"
          data-accordion="false"
        >
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

          <li class="nav-item">
            <router-link
              to="/dashboard"
              class="nav-link"
              exact
            >
              <i class="nav-icon fas fa-tachometer-alt text-primary"></i>
              <p>Dashboard</p>
            </router-link>
          </li>

          <li class="nav-item">
            <router-link
              to="/dashboard/users"
              id="client"
              class="nav-link"
            >
              <i class="nav-icon fas fa-copy text-info"></i>
              <p>
                User Management
                <span class="badge badge-info right"></span>
              </p>
            </router-link>
          </li>

          <li class="nav-item menu-open">
            <a
              class="nav-link"
              style="cursor: pointer"
            >
              <i class="nav-icon fas fa-biking text-success"></i>
              <p>
                Bike
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <router-link
                  to="/dashboard/BikeCategory"
                  class="nav-link"
                >
                  <i class="far fa-circle nav-icon"></i>
                  <p>Category</p>
                </router-link>

              </li>
              <li class="nav-item">
                <router-link
                  to="/dashboard/BikeInformation"
                  class="nav-link"
                >
                  <i class="far fa-circle nav-icon"></i>
                  <p>Information</p>
                </router-link>
              </li>
            </ul>
          </li>

           <li class="nav-item">
            <router-link
              to="/dashboard/sample2"
              class="nav-link"
            >
              <i class="nav-icon fas fa-file-signature"></i>
              <p>Rent Request</p>
            </router-link>
          </li>

          <li class="nav-item">
            <router-link
              to="/dashboard/sample2"
              class="nav-link"
            >
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>Page3</p>
            </router-link>
          </li>

          <li class="nav-item">
            <router-link
              to="/dashboard/Payment"
              class="nav-link"
            >
              <i class="nav-icon fas fa-money-bill-wave text-success"></i>
              <p>Payment</p>
            </router-link>
          </li>

          <li class="nav-item">
            <router-link
              to="/dashboard/Setting"
              class="nav-link"
            >
              <i class="nav-icon fas fa-cog text-warning"></i>
              <p>Setting</p>
            </router-link>
          </li>

          <li class="nav-item">
            <a
              href="/"
              to="logout"
              class="nav-link"
            >
              <i class="nav-icon fas fa-power-off  text-danger"></i>
              <p>Logout</p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
</template>

<script>
export default {
  props: ["datas"]
  /* data: function () {
    return {
      user: "",
      appLogo: "",
      userLogo: ""
    };
  },
  methods:{
    GetDatas(){
       axios.get("api/user").then((res) => {
      this.user = res.data.name;
    });
    this.appLogo = localStorage.getItem("app_logo");
    this.userLogo = localStorage.getItem("user_logo");
    }
  },
  mounted() {
   this.GetDatas();
  }, */
};
</script>

