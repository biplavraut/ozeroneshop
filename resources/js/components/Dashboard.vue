<template>
  <div class="container-fluid">
    <div class="row mt-5">
      <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box mb-3 bg-warning">
          <span class="info-box-icon"><i class="fas fa-tag"></i></span>
          <div class="info-box-content">
            <span class="info-box-text">Inventory</span>
            <span class="info-box-number">Management</span>
          </div>
        </div>
      </div>
      <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box mb-3 bg-success">
          <span class="info-box-icon"><i class="fas fa-cloud-download-alt"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Order</span>
            <span class="info-box-number">Placement</span>
          </div>
        </div>
      </div>
      <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box mb-3 bg-danger">
          <span class="info-box-icon"><i class="fas fa-heart"></i></span>
          <div class="info-box-content">
            <span class="info-box-text">Special</span>
            <span class="info-box-number">Offers</span>
          </div>
        </div>
      </div>
      <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box mb-3 bg-info">
          <span class="info-box-icon"><i class="fas fa-mail-bulk"></i></span>
          <div class="info-box-content">
            <span class="info-box-text">Check</span>
            <span class="info-box-number">Webmails</span>
          </div>
        </div>
      </div>
    </div>
      <!-- fix for small devices only -->
      <div class="clearfix hidden-md-up"></div>     
      <h6 class="m-2 text-muted">QUICK LINKS</h6>
    <div class="row">      
      <!-- Sidebar Pages Quick Links -->
      <div class="col-12 col-sm-6 col-md-3">
          <router-link to="/backend/admin/slider">
              <div class="info-box">
                  <span class="info-box-icon bg-light elevation-1"><i class="fas fa-sliders-h nav-icon green"></i></span>
                  <div class="info-box-content">
                      <span class="info-box-text">Slider Management</span>
                      <span class="info-box-number">Go To Page
                          <small><i class="fas fa-chevron-right"></i></small>
                      </span>
                  </div>
              </div>
          </router-link>
      </div>      
      <div class="col-12 col-sm-6 col-md-3">
          <router-link to="/backend/admin/blogs">
              <div class="info-box">
                  <span class="info-box-icon bg-light elevation-1"><i class="fas fa-blog nav-icon gray-dark"></i></span>
                  <div class="info-box-content">
                      <span class="info-box-text">Blogs Management</span>
                      <span class="info-box-number">Go To Page
                          <small><i class="fas fa-chevron-right"></i></small>
                      </span>
                  </div>
              </div>
          </router-link>
      </div>
      
      <div class="col-12 col-sm-6 col-md-3">
          <router-link to="/backend/admin/partner">
          <div class="info-box">
              <span class="info-box-icon bg-light elevation-1"><i class="fas fa-handshake blue nav-icon"></i></span>
              <div class="info-box-content">
                  <span class="info-box-text">Partner Management</span>
                  <span class="info-box-number">Go To Page
                      <small><i class="fas fa-chevron-right"></i></small>
                  </span>
              </div>
          </div>
          </router-link>
      </div>
      <div class="col-12 col-sm-6 col-md-3">
          <router-link to="/backend/admin/FAQs">
          <div class="info-box">
              <span class="info-box-icon bg-light elevation-1"><i class="fas fa-question-circle blue nav-icon"></i></span>
              <div class="info-box-content">
                  <span class="info-box-text">FAQs</span>
                  <span class="info-box-number">Go To Page
                      <small><i class="fas fa-chevron-right"></i></small>
                  </span>
              </div>
          </div>
          </router-link>
      </div>
      <!-- fix for small devices only -->
      <div class="clearfix hidden-md-up"></div>
      <div class="col-12 col-sm-6 col-md-3">
          <router-link to="/backend/admin/seo">
              <div class="info-box">
                  <span class="info-box-icon bg-light elevation-1"><i class="fas fa-star nav-icon teal"></i></span>
                  <div class="info-box-content">
                      <span class="info-box-text">SEO</span>
                      <span class="info-box-number">Go To Page
                          <small><i class="fas fa-chevron-right"></i></small>
                      </span>
                  </div>
              </div>
          </router-link>
      </div>
      <div class="col-12 col-sm-6 col-md-3">
          <router-link to="/backend/admin/admins">
              <div class="info-box">
                  <span class="info-box-icon bg-light elevation-1"><i class="fas fa-users indigo nav-icon"></i></span>
                  <div class="info-box-content">
                      <span class="info-box-text">Admins Management</span>
                      <span class="info-box-number">Go To Page
                          <small><i class="fas fa-chevron-right"></i></small>
                      </span>
                  </div>
              </div>
          </router-link>
      </div>
                  
    </div>
  </div>
</template>

<script>
    export default {
        data () {
            return {
            nestableItems: [
                {
                id: 0,
                text: 'Andy'
                }, {
                id: 1,
                text: 'Harry',
                children: [{
                    id: 2,
                    text: 'David'
                }]
                }, {
                id: 3,
                text: 'Lisa'
                }
            ]
            }
        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
