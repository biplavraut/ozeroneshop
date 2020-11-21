<template>
<div>
    <base-header class="pb-6 pb-8 pt-5 pt-md-8 bg-gradient-warning">
      <!-- Card stats -->
      <b-row>
        <b-col>
          <router-link to="/backend/admin/slider">
            <button type="button" title="Slider Management" data-clipboard-text="air-baloon" class="bg-gradient-secondary btn-icon-clipboard">
              <div>
                <span class="d-none d-md-block"><i class="fas fa-sliders-h"></i><span>Slider</span></span>
                <span class="d-md-none"><i class="fas fa-sliders-h"></i></span>
              </div>
            </button>
          </router-link>
        </b-col>
        <b-col>
          <router-link to="/backend/admin/blogs">
            <button type="button" title="Blog Management" data-clipboard-text="air-baloon" class="bg-gradient-secondary btn-icon-clipboard">
              <div>
                <span class="d-none d-md-block"><i class="fas fa-blog"></i><span>Blog</span></span>
                <span class="d-md-none"><i class="fas fa-blog"></i></span>
              </div>
            </button>
          </router-link>
        </b-col>
        <b-col>
          <router-link to="/backend/admin/partner">
            <button type="button" title="Partner Management" data-clipboard-text="air-baloon" class="bg-gradient-secondary btn-icon-clipboard">
              <div>
                <span class="d-none d-md-block"><i class="fas fa-handshake"></i><span>Partner</span></span>
                <span class="d-md-none"><i class="fas fa-handshake"></i></span>
              </div>
            </button>
          </router-link>
        </b-col>
        <b-col>
          <router-link to="/backend/admin/faq">
            <button type="button" title="FAQs Management" data-clipboard-text="air-baloon" class="bg-gradient-secondary btn-icon-clipboard">
              <div>
                <span class="d-none d-md-block"><i class="fas fa-question"></i><span>FAQs</span></span>
                <span class="d-md-none"><i class="fas fa-question"></i></span>
              </div>
            </button>
          </router-link>
        </b-col>
        <b-col>
          <router-link to="/backend/admin/seo">
            <button type="button" title="SEO Management" data-clipboard-text="air-baloon" class="bg-gradient-secondary btn-icon-clipboard">
              <div>
                <span class="d-none d-md-block"><i class="fas fa-star"></i><span>SEO</span></span>
                <span class="d-md-none"><i class="fas fa-star"></i></span>
              </div>
            </button>
          </router-link>
        </b-col>
        <b-col>
          <router-link to="/backend/admin/product">
            <button type="button" title="Products Management" data-clipboard-text="air-baloon" class="bg-gradient-secondary btn-icon-clipboard">
              <div>
                <span class="d-none d-md-block"><i class="fas fa-store"></i><span>Products</span></span>
                <span class="d-md-none"><i class="fas fa-store"></i></span>
              </div>
            </button>
          </router-link>
        </b-col>
      </b-row>
    </base-header>
    <b-container fluid class="mt--7">
        <b-row v-if="$gate.isAuthorized()">
            <b-col xl="12" class="mb-5 mb-xl-0">
                <card type="default" header-classes="bg-transparent">
                    <b-row align-v="center" slot="header">
                        <b-col>
                            <h6 class="text-light text-uppercase ls-1 mb-1">Admin - Users</h6>
                            <h5 class="h3 text-white mb-0">Management</h5>
                        </b-col>
                        <b-col>
                            <b-nav class="nav-pills justify-content-end">
                            <b-nav-item
                                class="mr-2 mr-md-0"
                                link-classes="py-2 px-3"
                                @click="newModal">
                                <span class="d-none d-md-block"><i class="fas fa-plus"></i> Add New User</span>
                                <span class="d-md-none"><i class="fas fa-plus"></i> Add</span>
                            </b-nav-item>
                            </b-nav>
                        </b-col>
                    </b-row>
                    <b-card-body class="pt-0">
                        <table class="table table-hover">
                            <tbody>
                            <tr>
                                <th>S.N.</th>
                                <th>Name</th>
                                <th>Slug</th>
                                <th>Email</th>
                                <th>Type</th>
                                <th>Registered At</th>
                                <th>Actions</th>
                            </tr>
                            <tr v-for="(admin, index) in admins.data" :key="admin.id">
                                <td>{{index+1}}</td>
                                <td>{{admin.name}}</td>
                                <td>{{admin.slug}}</td>
                                <td>{{admin.email}}</td>
                                <td><span class="tag tag-success">{{admin.type | upText}}</span></td>
                                <td>{{admin.created_at | myDate}}</td>
                                <td>
                                    <a href="#" @click="editModal(admin)" class="btn btn-sm btn-success">Edit
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <a href="#" @click="deleteAdmin(admin.id)" class="btn btn-sm btn-danger">Delete
                                        <i class="fa fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                        <b-row>
                            <b-col>
                                <span>Showing {{admins.data.length}} of {{this.totaladmin}} Users.</span>
                            </b-col>
                            <b-col class="justify-content-end">
                                <pagination :data="admins" @pagination-change-page="getResults"></pagination>
                            </b-col>
                        </b-row>
                    </b-card-body>
                </card>
            </b-col>
        </b-row>
        <div v-if="!$gate.isDevOrAdmin()">
            <not-found></not-found>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="addNewAdmin" tabindex="-1" role="dialog" aria-labelledby="addNewAdminLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" v-show="!editmode" id="addNewAdminLabel">Add New User</h5>
                        <h5 class="modal-title" v-show="editmode" id="addNewAdminLabel">Update User</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form  @submit.prevent="editmode ? updateAdmin() : createAdmin()">
                        <div class="modal-body">
                            <div class="form-group">
                                <div class="input-group mb-2 mr-sm-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">Full Name</div>
                                    </div>
                                    <input v-model="form.name" type="text" name="name"
                                           placeholder="John Doe"
                                           class="form-control" :class="{ 'is-invalid': form.errors.has('name') }">
                                    <has-error :form="form" field="name"></has-error>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group mb-2 mr-sm-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">Email Address</div>
                                    </div>
                                    <input v-model="form.email" type="email" name="email"
                                           placeholder="Email Address"
                                           class="form-control" :class="{ 'is-invalid': form.errors.has('email') }">
                                    <has-error :form="form" field="email"></has-error>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">Short Bio</div>
                                </div>
                                <textarea v-model="form.bio" name="bio" id="bio"
                                        placeholder="Short bio for user (optional)"
                                          class="form-control" :class="{ 'is-invalid': form.errors.has('bio') }"></textarea>
                                <has-error :form="form" field="bio"></has-error>
                            </div>
                            <div class="form-group">
                                <select name="type" v-model="form.type" id="type" class="form-control" :class="{ 'is-invalid': form.errors.has('role') }" >
                                    <option value="" selected disabled>--Select User Role--</option>
                                    <option v-if="$gate.isSupDevOrDev()" value="dev">Developer</option>
                                    <option v-if="$gate.isSupDevOrDev()" value="supadmin">Site Owner</option>
                                    <option v-if="$gate.isDevOrAdmin()" value="admin">Admin</option>
                                    <option v-if="$gate.isDevOrAdmin()" value="editor">Editor</option>
                                    <option value="user">Standard User</option>

                                </select>
                                <has-error :form="form" field="bio"></has-error>
                            </div>
                            <div class="form-group">
                                <div class="input-group mb-2 mr-sm-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">Password</div>
                                    </div>
                                    <input v-model="form.password" type="password" name="password"
                                           placeholder="Secret Password"
                                           class="form-control" :class="{ 'is-invalid': form.errors.has('password') }">
                                    <has-error :form="form" field="password"></has-error>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-times fa-fw"></i>Close</button>
                            <button v-show="editmode" type="submit" class="btn btn-success"><i class="fas fa-plus fa-fw"></i>Update</button>
                            <button v-show="!editmode" type="submit" class="btn btn-primary"><i class="fas fa-plus fa-fw"></i>Create</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </b-container>
</div>
</template>

<script>
    export default {
        /*Filling the data into form*/
        data(){
            return{
                editmode: false,
                totaladmin:0,
                admins: {},
                form: new Form({
                    id:'',
                    name :'',
                    slug :'',
                    email:'',
                    password:'',
                    type:'',
                    bio:'',
                    photo:''
                })
            }
        },
        methods: {
            /*===== Start of pagination function =====*/
            getResults(page = 1) {
                axios.get('../../api/admin?page=' + page)
                    .then(response => {
                        this.admins = response.data;
                    });
            },

            /*===== Call add new user modal ====*/
            newModal(){
                this.editmode = false;
                this.form.reset();
                $('#addNewAdmin').modal('show');
            },
            /*Create User Function Starts*/
            createAdmin(){
                this.$Progress.start(); //start a progress bar
                this.form.post('../../api/admin') // POST form data
                //Start Condition to check form is validate
                    .then(({data})=>{
                        $("#addNewAdmin").modal('hide'); //Hide the model
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

            },
            /*==== End of Admin User Create ====*/

            /*==== Call edit Modal with user data ====*/
            editModal(admin){
                this.editmode = true;
                this.form.reset();
                $('#addNewAdmin').modal('show');
                this.form.fill(admin);
            },
            /*Edit User Function*/
            updateAdmin(id){
                this.$Progress.start();
                //console.log('editing data');
                this.form.put('../../api/admin/'+this.form.id)
                .then(({data}) =>{
                    $("#addNewAdmin").modal('hide'); //Hide the model
                    this.serverResponse(data);

                }).catch(()=>{
                    this.$Progress.fail();
                });
            },
            /*==== End of edit user function ====*/

            /*==== Call Delete Modal uith user id ====*/
            deleteAdmin(id){
                swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    //send an ajax request to the server
                    if (result.value) {
                        this.form.delete('../../api/admin/' + id).then(({data}) => {
                            this.serverResponse(data);
                        }).catch(() => {
                            swal.fire(
                                'Error!',
                                'Something Went wrong!',
                                'error'
                            )
                        })
                    }

                })
            },
            /*==== End of Delete Modal ====*/

            /*==== Start of Show existing User function ====*/
            loadAdmins(){
                if (this.$gate.isDevOrAdmin()){
                    axios.get("../../api/admin").then(({ data }) => (this.admins = data, this.totaladmin = data.total));
                }
            }
            /*==== End of existing User ====*/

        },
        created() {
            Fire.$on('searching',()=>{
                let query =this.$parent.search; //take information from root
                axios.get('../../api/findAdmin?q='+ query)
                    .then((data)=>{
                        this.admins = data.data
                    }).catch(()=>{

                })
            })

            this.loadAdmins(); //load the user in the table

            //Load the userlist if add or created a new user
            Fire.$on("AfterCreate",()=>{
                this.loadAdmins();
            })


            //setInterval(() => this.loadAdmins(),3000);
        }
    }
</script>
