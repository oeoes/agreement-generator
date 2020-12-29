<template>
  <div id="aside" class="page-sidenav no-shrink bg-white b-r nav-dropdown fade">
    <div class="sidenav h-100 bg-white modal-dialog">
      <!-- sidenav top -->
      <!-- Flex nav content -->
      <div class="flex scrollable hover">
        <div class="nav-border b-primary" data-nav>
          <div class="nav-fold flex-column pt-4">
            <a class="d-flex p-2" data-toggle="dropdown">
              <span class="avatar w-56 circle hide">J</span>
              <img :src="photo" alt class="w-56 mx-auto circle" />
            </a>
            <div class="hidden-folded w-100 p-2 pb-4 b-b">
              <div class="text-center">
                <a href="#" class="mr-auto text-nowrap text-color">
                  {{ name }}
                  <small class="d-block text-sm text-muted">{{ email }}</small>
                </a>
              </div>
              <!-- <div class="d-flex text-center pt-4">
                <div class="px-2 flex">
                  <div class="font-weight-bold">510</div>
                  <small class="text-muted">Videos</small>
                </div>
                <div class="px-2 flex">
                  <div class="font-weight-bold">25.5k</div>
                  <small class="text-muted">Subscribers</small>
                </div>
              </div>-->
            </div>
          </div>

          <side-nav></side-nav>
        </div>
      </div>
      <!-- sidenav bottom -->
      <div class="no-shrink">
        <div class="p-3 d-flex align-items-center text-center">
          <!-- <div class="text-sm hidden-folded text-muted">Trial: 35%</div> -->
          <div
            @click="logout"
            class="btn btn-info text-sm"
            style="border-radius: 35px; width: 100%; font-size: 80%; cursor: pointer"
          >Logout</div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import SideNav from "./SideNav";
export default {
  data() {
    return {
      name: localStorage.getItem("name"),
      email: localStorage.getItem("email"),
      photo: localStorage.getItem("photo")
    };
  },
  components: {
    "side-nav": SideNav
  },
  methods: {
    logout() {      
      this.$authenticate.destroyToken();
      this.$router.go('/login')
      // this.$router.push("/login");
    }
  },
};
</script>

<style>
</style>