<template>
    <div>
    <header class="header-global">
          <base-nav class="navbar-main" transparent type="" effect="light" expand>
              <router-link slot="brand" class="navbar-brand mr-lg-5" to="/">
                  <img src="img/brand/white.png" alt="logo">
              </router-link>

              <div class="row" slot="content-header" slot-scope="{closeMenu}">
                  <div class="col-6 collapse-brand">
                      <a href="https://demos.creative-tim.com/vue-argon-design-system/documentation/">
                          <img src="img/brand/blue.png">
                      </a>
                  </div>
                  <div class="col-6 collapse-close">
                      <close-button @click="closeMenu"></close-button>
                  </div>
              </div>

              <ul class="navbar-nav navbar-nav-hover align-items-lg-center">
                  <base-dropdown class="nav-item" menu-classes="dropdown-menu-xl">
                      <a slot="title" href="#" class="nav-link" data-toggle="dropdown" role="button">
                          <i class="ni ni-ui-04 d-lg-none"></i>
                          <span class="nav-link-inner--text">Components</span>
                      </a>
                      <div class="dropdown-menu-inner">
                          <a href="https://demos.creative-tim.com/vue-argon-design-system/documentation/"
                            class="media d-flex align-items-center">
                              <div class="icon icon-shape bg-gradient-primary rounded-circle text-white">
                                  <i class="ni ni-spaceship"></i>
                              </div>
                              <div class="media-body ml-3">
                                  <h6 class="heading text-primary mb-md-1">Getting started</h6>
                                  <p class="description d-none d-md-inline-block mb-0">Get started with Bootstrap, the
                                      world's most popular framework for building responsive sites.</p>
                              </div>
                          </a>
                          <a href="https://demos.creative-tim.com/vue-argon-design-system/documentation/"
                            class="media d-flex align-items-center">
                              <div class="icon icon-shape bg-gradient-warning rounded-circle text-white">
                                  <i class="ni ni-ui-04"></i>
                              </div>
                              <div class="media-body ml-3">
                                  <h5 class="heading text-warning mb-md-1">Components</h5>
                                  <p class="description d-none d-md-inline-block mb-0">Learn how to use Argon
                                      compiling Scss, change brand colors and more.</p>
                              </div>
                          </a>
                      </div>
                  </base-dropdown>
                  <base-dropdown tag="li" class="nav-item">
                      <a slot="title" href="#" class="nav-link" data-toggle="dropdown" role="button">
                          <i class="ni ni-collection d-lg-none"></i>
                          <span class="nav-link-inner--text">Examples</span>
                      </a>
                      <router-link to="/landing" class="dropdown-item">Landing</router-link>
                      <router-link to="/profile" class="dropdown-item">Profile</router-link>
                      <router-link to="/login" class="dropdown-item">Login</router-link>
                      <router-link to="/register" class="dropdown-item">Register</router-link>
                  </base-dropdown>
              </ul>
              <ul class="navbar-nav align-items-lg-center ml-lg-auto">
                  
                  <li class="nav-item d-none d-lg-block ml-lg-4">
                      <a href="https://www.creative-tim.com/product/vue-argon-design-system" target="_blank" rel="noopener"
                        class="btn btn-neutral btn-icon">
                        <span class="btn-inner--icon">
                            <i class="fa fa-cloud-download mr-2"></i>
                        </span>
                          <span class="nav-link-inner--text">Download</span>
                      </a>
                  </li>
              </ul>
          </base-nav>
    </header>

    <b-carousel
        id="carousel-1"
        v-model="slide"
        :interval="4000"
        controls
        indicators
        background="#ababab"
        img-width="1024"
        img-height="480"
        style="text-shadow: 1px 1px 2px #333;"
        @sliding-start="onSlideStart"
        @sliding-end="onSlideEnd"
        >      
        <!-- Slides with img slot -->
        <!-- Note the classes .d-block and .img-fluid to prevent browser default image alignment -->
        <b-carousel-slide v-for="slider in sliders" :key="slider.id"
            :caption="slider.title"
            :text="slider.sub_title">
            <template #img>
            <img
                class="d-block img-fluid w-100"
                width="1024"
                height="480"
                :src="'/img/slider/'+slider.image"
                :alt="slider.title"
            >
            </template>
        </b-carousel-slide>
        
    </b-carousel>


    <footer class="footer has-cards">
        <div class="container">
            <hr>
            <div class="row align-items-center justify-content-md-between">
                <div class="col-md-6">
                    <div class="copyright">
                        &copy; 2020
                        <a href="https://www.creative-tim.com" target="_blank" rel="noopener">Creative Tim</a> & <a href="https://www.binarcode.com" target="_blank" rel="noopener">Binar Code</a>
                    </div>
                </div>
                <div class="col-md-6">
                    <ul class="nav nav-footer justify-content-end">
                        <li class="nav-item">
                            <a href="https://www.creative-tim.com" class="nav-link" target="_blank" rel="noopener">Creative Tim</a>
                        </li>
                        <li class="nav-item">
                            <a href="https://www.creative-tim.com/presentation" class="nav-link" target="_blank" rel="noopener">About
                                Us</a>
                        </li>
                        <li class="nav-item">
                            <a href="http://blog.creative-tim.com" class="nav-link" target="_blank" rel="noopener">Blog</a>
                        </li>
                        <li class="nav-item">
                            <a href="https://github.com/creativetimofficial/argon-design-system/blob/master/LICENSE.md"
                               class="nav-link" target="_blank" rel="noopener">MIT License</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
    </div>
</template>
<script>
import BaseNav from "../argon-front/components/BaseNav";
import BaseDropdown from "../argon-front/components/BaseDropdown";
import CloseButton from "../argon-front/components/CloseButton";

import Hero from "./components/Hero";

export default {
  name: "components",
  components: {
    BaseNav,
    CloseButton,
    BaseDropdown,
    Hero,
    
  },
  data() {
      return {
          sliders : []
      }
  },
  methods: {
    loadSlider(){
        axios.get("../../front-slider").then(({ data }) => (this.sliders = data, this.totalslider = data.total));
    }
    },
    created() {
        this.loadSlider(); 
    }
};
</script>
