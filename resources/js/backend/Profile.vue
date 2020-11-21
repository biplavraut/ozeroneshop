<style>
    .is-equal{
        border-color: green;
        box-shadow: 0 0 0 0.2rem rgba(73, 231, 25, 0.25) !important;
    }
</style>
<template>
  <div>
    <div class="header pb-8 pt-5 pt-lg-8 d-flex align-items-center profile-header"
        v-bind:style="'min-height: 400px; background-image: url(../../img/profile/thumbs/'+form.photo+'); background-size: cover; background-position: center top;'">
      <b-container fluid>
        <!-- Mask -->
        <span class="mask bg-gradient-warning opacity-8"></span>
        <!-- Header container -->
        <b-container fluid class="d-flex align-items-center">
          <b-row >
            <b-col>
              <h1 class="display-3 text-white">Hello {{form.name.split(' ').slice(0, -1).join(' ')}}</h1>
              <p class="text-white mt-0 mb-5">“To win in the marketplace you must first win in the workplace.”</p>
              <a href="#editProfileForm" class="btn btn-info">Edit profile</a>
            </b-col>
          </b-row>
        </b-container>
      </b-container>
    </div>

    <b-container fluid class="mt--6">
      <b-row>
        <b-col xl="4" class="order-xl-2 mb-5">
          <user-card></user-card>
        </b-col>
        <b-col xl="8" class="order-xl-1" id="editProfileForm">
          <edit-profile-form></edit-profile-form>
        </b-col>
      </b-row>
    </b-container>
  </div>
</template>

<script>
    import EditProfileForm from './UserProfile/EditProfileForm.vue';
    import UserCard from './UserProfile/UserCard.vue';
    export default {
        components: {
            EditProfileForm,
            UserCard
        },
        data() {
            return {
                isActive:true,
                fc:false,
                form: new Form({
                    id: '',
                    name: '',
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
            }
        },
        mounted() {
            console.log('Component mounted.')
        },
        methods: {
            getSocialLink() {
                this.$Progress.start(); //start a progress bar
                this.form.post('../../api/getSocialLink') // POST form data
                //Start Condition to check form is validate
                    .then(()=>{
                            Fire.$emit('AfterCreate'); //custom event to reload data

                            $("#socialLink").modal('hide'); //Hide the model

                            //Sweetalert notification for the result
                            Toast.fire({
                                type: 'success',
                                title: 'Link Added Successfully'
                            })

                            this.$Progress.finish(); //End the progress bar
                        }
                    )
                    //if form is not valid of handle any errors
                    .catch(()=>{
                        swal.fire(
                            'Error!',
                            'Something Went Wrong.',
                            'warning'
                        )
                        this.$Progress.fail(); //End the progress bar
                    })
            },
            check(){
                if(this.form.newpassword == this.form.confirmpassword){
                    this.isActive = false ;
                    this.fc = true;
                }
                else{
                    this.isActive = true ;
                    this.fc = false;
                }
            },
            getProfilePhoto(){
                let photo = (this.form.photo.length > 200)? this.form.photo : "../../img/profile/thumbs/"+ this.form.photo;
                return photo;
            },
            updatePassword() {
                this.$Progress.start();
                if(this.form.newpassword == this.form.confirmpassword){
                    axios({
                        method: 'post',
                        url: '../../api/updatePassword',
                        data: {
                            id: this.form.id,
                            oldpassword: this.form.oldpassword ,
                            newpassword: this.form.newpassword ,
                        },
                    })
                    //Start Condition to check form is validate
                        .then(({data}) => {
                            this.serverResponse(data);
                        })
                        //if form is not valid of handle any errors
                        .catch(()=>{
                            swal.fire(
                                'Error!',
                                'Something Went Wrong.',
                                'warning'
                            )
                            this.$Progress.fail(); //End the progress bar
                        })
                }else{
                    swal.fire(
                        'Opps..!',
                        'New Passwords does not match',
                        'warning'
                    )
                }
            },
            updateInfo() {
                this.$Progress.start();
                this.form.put('../../api/profile')
                    .then(({data}) => {
                        this.serverResponse(data);             

                    }).catch(() => {
                    this.Progress.fail();
                });
            },
            updateProfile(e) {
                //console.log('Uploading');
                let file = e.target.files[0];
                //console.log(file);
                let reader = new FileReader();
                if (file['size'] < 2111775) {
                    reader.onloadend = (file) => {
                        //console.log('RESULT', reader.result)
                        this.form.photo = reader.result;
                    }
                    reader.readAsDataURL(file);
                    Fire.$emit('AfterCreate'); //Fire an reload event
                } else {
                    swal.fire(
                        'Opps..!',
                        'Image file exceeds 2MB size limit.',
                        'warning'
                    )
                }
            }
        },
        /*==== Start of Show existing User function ====*/
        loadUsers(){
            axios.get("../../api/profile")
                .then(({data}) => (this.form.fill(data))).catch();
        },
        /*==== End of existing User ====*/
        created() {
            axios.get("../../api/profile")
                .then(({data}) => (this.form.fill(data))).catch();

            //Load the user data if add or created a new user
            Fire.$on("AfterCreate",()=>{
                this.loadUsers();
            })
        }

    }
</script>
