<template>
  <card>
    <b-row align-v="center" slot="header" >
      <b-col cols="8">
        <h3 class="mb-0">Edit profile </h3>
      </b-col>
      <b-col cols="4" class="text-right">
        <a href="#!" class="btn btn-sm btn-primary">Update</a>
      </b-col>
    </b-row>

    <b-form @submit.prevent="updateProfile">
      <h6 class="heading-small text-muted mb-4">User information</h6>

      <div class="pl-lg-4">
        <b-row>
          <b-col lg="6">
            <base-input
              type="text"
              label="Full Name"
              placeholder="Full Name"
              value="test"
              v-model="userprofile.name"
            >
            </base-input>
          </b-col>
          <b-col lg="6">
            <base-input
              type="email"
              label="Email address"
              placeholder="mike@email.com"
              v-model="this.$parent.form.email"
            >
            </base-input>
          </b-col>
        </b-row>
        <b-row>
          <b-col lg="6">
            <base-input
              type="text"
              label="Messenger"
              placeholder="https://www.facebook.com/messages/t/ozerone.co"
              v-model="this.$parent.form.facebook"
            >
            </base-input>
          </b-col>
          <b-col lg="6">
            <base-input
              type="text"
              label="Instagram"
              placeholder="https://www.instagram.com/ozerone.shop/"
              v-model="this.$parent.form.instagram"
            >
            </base-input>
          </b-col>
        </b-row>
      </div>
      <div class="pl-lg-4">
        <b-form-group label="About Me" label-class="form-control-label" class="mb-0" label-for="about-form-textaria">
         <!--  <label class="form-control-label">About Me</label> -->
          <b-form-textarea rows="4" v-model="this.$parent.form.bio" id="about-form-textaria" placeholder="A few words about you ..."></b-form-textarea>
        </b-form-group>
      </div>
      <hr class="my-4">

      <!-- Address -->
      <h6 class="heading-small text-muted mb-4">Update Password</h6>

      <div class="pl-lg-4">
        <b-row>
          <b-col md="12">
            <base-input
              type="password"
              label="Old Password"
              v-model="userprofile.oldpassword"
            >
            </base-input>
          </b-col>
        </b-row>
        <b-row>
          <b-col lg="6">
            <base-input
              type="password"
              label="New Password"
              v-model="userprofile.newpassword"
            >
            </base-input>
          </b-col>
          <b-col lg="6">
            <base-input
              type="password"
              label="Retype Password"
              v-model="userprofile.confirmpassword"
            >
            </base-input>
          </b-col>
        </b-row>
      </div>
    </b-form>
  </card>
</template>
<script>
export default {
  data() {
    return {
      userprofile: new Form({
          id: '',
          name: this.$parent.form.name,
          email: '',
          password: '',
          type: '',
          bio: '',
          photo: '',
          newpassword: '',
          oldpassword: '',
          confirmpassword: '',
          facebook:'',
          instagram: '',
          github:'',
      })
    };
  },
  methods: {
    updateProfile() {
      alert('Your data: ' + JSON.stringify(this.user));
    }
  },
  created() {
    this.userprofile.name = 'Test Name';      
  }
};
</script>
<style></style>
