<template>
  <div class="wrapper">
    <notifications></notifications>
    <side-bar>
      <template slot="links">
        <sidebar-item
          :link="{
            name: 'Dashboard',
            path: '/backend/admin/dashboard',
            icon: 'ni ni-tv-2 text-primary',
          }"
        >
        </sidebar-item>
        <sidebar-item
              :link="{
                name: 'Slider',
                path: '/backend/admin/slider',
                icon: 'fas fa-sliders-h text-orange'
              }">
        </sidebar-item>

        <sidebar-item
              :link="{
                name: 'Blogs',
                path: '/backend/admin/blogs',
                icon: 'fas fa-blog text-yellow'
                }">
        </sidebar-item>

        <sidebar-item
                :link="{
                  name: 'Partners',
                  path: '/backend/admin/partner',
                  icon: 'fas fa-handshake text-red'
                }">
        </sidebar-item>

        <sidebar-item
                  :link="{
                    name: 'FAQs',
                    path: '/backend/admin/faq',
                    icon: 'fas fa-question text-info'
                  }">
        </sidebar-item>
        <sidebar-item
                  :link="{
                    name: 'SEO',
                    path: '/backend/admin/seo',
                    icon: 'fas fa-star text-pink'
                  }">
        </sidebar-item>
        <div><hr class="m-3"></div>        
        <sidebar-item
                  :link="{
                    name: 'Products',
                    path: '/backend/admin/product',
                    icon: 'fas fa-store text-success'
                  }">
        </sidebar-item>        
      </template>
      <template slot="links-after">
        <sidebar-item
            :link="{
              name: 'Backend Users ',
              path: '/backend/admin/admins',
              icon: 'fas fa-users text-blue'
              }"
            >
        </sidebar-item>
        <sidebar-item
            :link="{
              name: 'Shop Sections',
              path: '/backend/admin/shop-sections',
              icon: 'fas fa-store-alt text-blue'
              }"
            >
        </sidebar-item>
        <sidebar-item
            :link="{
              name: 'Brands',
              path: '/backend/admin/brands',
              icon: 'fas fa-copyright text-blue'
              }"
            >
        </sidebar-item>
      </template>
      <template slot="links-categories">
        <div v-for="item in categories " :key="item.id">
          <div v-if="item.display==1"></div>
          <sidebar-item
              :link="{
                name: item.title,
                path: '/backend/admin/electronics/'+item.slug,
                icon: 'fas fa-bars text-blue'
                }"
              >
          </sidebar-item>
        </div>
      </template>
      <template slot="links-orders">
        <sidebar-item
            :link="{
              name: 'Orders Listing ',
              path: '/backend/admin/orders',
              icon: 'fas fa-luggage-cart text-green'
              }"
            >
        </sidebar-item>
        <sidebar-item
            :link="{
              name: 'Customers',
              path: '/backend/admin/customers',
              icon: 'fas fa-people-arrows text-green'
              }"
            >
        </sidebar-item>
      </template>
    </side-bar>
    <div class="main-content">
      <dashboard-navbar :type="$route.meta.navbarType"></dashboard-navbar>

      <div @click="$sidebar.displaySidebar(false)">
        <fade-transition :duration="200" origin="center top" mode="out-in">
          <!-- your content here -->
          <router-view></router-view>
        </fade-transition>
      </div>
      <content-footer v-if="!$route.meta.hideFooter"></content-footer>
    </div>
  </div>
</template>
<script>
  /* eslint-disable no-new */
  import PerfectScrollbar from 'perfect-scrollbar';
  import 'perfect-scrollbar/css/perfect-scrollbar.css';

  function hasElement(className) {
    return document.getElementsByClassName(className).length > 0;
  }

  function initScrollbar(className) {
    if (hasElement(className)) {
      new PerfectScrollbar(`.${className}`);
    } else {
      // try to init it later in case this component is loaded async
      setTimeout(() => {
        initScrollbar(className);
      }, 100);
    }
  }

  import DashboardNavbar from './DashboardNavbar.vue';
  import ContentFooter from './ContentFooter.vue';
  import DashboardContent from './Content.vue';
  import { FadeTransition } from 'vue2-transitions';

  export default {
    components: {
      DashboardNavbar,
      ContentFooter,
      DashboardContent,
      FadeTransition
    },
    data () {
      return {
        categories : []
      }
    },
    methods: {
      initScrollbar() {
        let isWindows = navigator.platform.startsWith('Win');
        if (isWindows) {
          initScrollbar('sidenav');
        }
      },
      loadCategories(){
          this.$Progress.start();
          if (this.$gate.isAuthorized()){
              axios.get("../../api/shopsection")
                  .then(({ data }) => (this.categories = data));
              this.$Progress.finish();
          }
      }
    },
    created() {
        this.loadCategories(); //Load Shop Categories
    },
    mounted() {
      this.initScrollbar()
    }
  };
</script>
<style lang="scss">
</style>
