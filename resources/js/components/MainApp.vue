<template>
  <div class="sidebar-mini hold-transition">
    <div class="wrapper">
      <Header />
      <Sidebar :datas="details"/>
      <div class="content-wrapper">
        <!-- /.content -->

        <router-view></router-view>
      </div>
      <Footer />
    </div>
  </div>
</template>

<script>
const default_layout = "default";
import Header from "./layouts/header";
import Sidebar from "./layouts/sidebar";
import Footer from "./layouts/footer";
export default {
  components: {
    Header,
    Sidebar,
    Footer,
  },
  data: function () {
    return {
      details:[],
    };
  },
  methods: {
    GetDatas() {
      axios.get("api/user").then((res) => {
        this.user = res.data.email;
      });
      this.details[0] = localStorage.getItem("user_name");
      this.details[1] = localStorage.getItem("app_logo");
      this.details[2] = localStorage.getItem("user_logo");
     
    },
  },
  created() {
    this.GetDatas();
  },
};
</script>
