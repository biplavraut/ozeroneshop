<template>
  <b-card no-body class="card-profile" alt="Image placeholder" img-top>
    <b-row class="justify-content-center">
      <b-col lg="3" class="order-lg-2">
        <div class="card-profile-image">
          <a href="#">
            <b-img v-bind:src="'../../img/profile/'+this.$parent.form.photo" rounded="circle" />
          </a>
        </div>
      </b-col>
    </b-row>

    <b-card-header class="text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
      <div class="d-flex justify-content-between">
        <a href="https://www.facebook.com/ozerone.co/" target="_blank" class="btn btn-sm btn-info mr-4"><i class="fab fa-facebook-f"></i> Connect</a>
        <a href="https://www.facebook.com/messages/t/ozerone.co" target="_blank" class="btn btn-sm btn-default float-right"><i class="fab fa-facebook-messenger"></i> Message</a>
      </div>
    </b-card-header>

    <b-card-body class="pt-0">
      <b-row>
        <b-col >
          <div class="card-profile-stats d-flex justify-content-center mt-md-5">
            <!-- <div>
              <span class="heading">22</span>
              <span class="description">Friends</span>
            </div>
            <div>
              <span class="heading">10</span>
              <span class="description">Photos</span>
            </div>
            <div>
              <span class="heading">89</span>
              <span class="description">Comments</span>
            </div> -->
          </div>
        </b-col>
      </b-row>
      <div class="text-center">
        <h5 class="h3">
          {{this.$parent.form.name}}<span class="font-weight-light">, {{this.$parent.form.type}}</span>
        </h5>
        <div class="h5 font-weight-300">
          <i class="ni location_pin mr-2"></i>Kathmandu, Nepal
        </div>
        <hr class="my-4">
        <p>{{this.$parent.form.bio}}</p>

      </div>
    </b-card-body>
  </b-card>
</template>
<script>
export default {};
</script>
<style></style>
