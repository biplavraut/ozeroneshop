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
                            <h6 class="text-light text-uppercase ls-1 mb-1">Categories listing</h6>
                            <h5 class="h3 text-white mb-0"> {{this.shop_section}}</h5>
                        </b-col>
                        <b-col>
                            <b-nav class="nav-pills justify-content-end">
                            <b-nav-item
                                class="mr-2 mr-md-0"
                                link-classes="py-2 px-3"
                                @click="newElectronics">
                                <span class="d-none d-md-block"><i class="fas fa-plus"></i> Add New Category</span>
                                <span class="d-md-none"><i class="fas fa-plus"></i> Add</span>
                            </b-nav-item>
                            </b-nav>
                        </b-col>
                    </b-row>
                    <b-card-body class="pt-0">
                        <vue-nestable 
                            v-model="electronics" 
                            :max-depth="2" 
                            v-on:change="listChange(electronics)">
                            <template slot-scope="{ item }">
                                <!-- Handler -->
                                <vue-nestable-handle :item="item" class="mt-2">
                                    <b-row align-v="center">
                                        <b-col>
                                            <i class="fas fa-bars"> </i> <span>{{ item.title }}</span>
                                        </b-col>
                                        <b-col class="text-right">
                                            <a href="#" @click="editElectronics(item)" class="btn btn-sm btn-success">
                                                <span class="d-none d-md-block"><i class="fas fa-edit"></i> Edit</span>
                                                <span class="d-md-none"><i class="fas fa-edit"></i></span>
                                            </a>
                                            <a href="#" @click="deleteElectronics(item.slug)" class="btn btn-sm btn-danger">
                                                <span class="d-none d-md-block"><i class="fas fa-trash"></i> Delete</span>
                                                <span class="d-md-none"><i class="fas fa-trash"></i></span>
                                            </a>
                                        </b-col>
                                    </b-row>
                                </vue-nestable-handle>
                            </template>
                        </vue-nestable>
                    </b-card-body>
                </card>
            </b-col>
        </b-row>
        <div v-if="!$gate.isAuthorized()">
            <not-found></not-found>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="addNewElectronics" tabindex="-1" role="dialog" aria-labelledby="addNewElectronicsLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" v-show="!editmode" id="addNewElectronicsLabel">Add New Category</h5>
                        <h5 class="modal-title" v-show="editmode" id="addNewElectronicsLabel">Update Category</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form  @submit.prevent="editmode ? updateElectronics() : createElectronics()">
                        <div class="modal-body">
                            <div class="form-group">
                                <div class="input-group mb-2 mr-sm-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">Title</div>
                                    </div>
                                    <input v-model="form.title" type="text" name="title"
                                           placeholder="Category Title."
                                           class="form-control" :class="{ 'is-invalid': form.errors.has('title') }">
                                    <has-error :form="form" field="title"></has-error>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="input-group mb-2">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">SVG <small>512x512</small></div>
                                            </div>
                                            <input type="file" name="image"  @change="imageUpload"
                                                placeholder="Image"
                                                class="btn btn-sm btn-info" :class="{ 'is-invalid': form.errors.has('image') }">
                                            <has-error :form="form" field="image"></has-error>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="input-group mb-2 mr-sm-2">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">Icons</div>
                                            </div>
                                            <input v-model="form.icon" type="text" name="icon"
                                                placeholder="Icon if available."
                                                class="form-control" :class="{ 'is-invalid': form.errors.has('icon') }">
                                            <has-error :form="form" field="icon"></has-error>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6"><div class="form-group">
                                <div class="input-group mb-2 mr-sm-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <input v-model="form.type" type="checkbox" name="type"
                                                   :class="{ 'is-invalid': form.errors.has('type') }">
                                        </div>
                                    </div>
                                    <input type="text" value="Product or Service Category" class="form-control" disabled>
                                    <has-error :form="form" field="type"></has-error>
                                </div>
                               </div>
                            </div> 
                                <div class="col-md-6">
                                    <div class="form-group">
                                <div class="input-group mb-2 mr-sm-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <input v-model="form.display" type="checkbox" name="display" :class="{ 'is-invalid': form.errors.has('display') }">
                                        </div>
                                    </div>
                                    <input type="text" value="Display" class="form-control" disabled>
                                    <has-error :form="form" field="display"></has-error>
                                </div>
                            </div>  
                                    </div>                           
                            </div>
                            <div class="form-group"> 
                                <div class="input-group-prepend">
                                    <div class="input-group-text">Excerpt</div>
                                </div>
                                <vue-editor v-model="form.excerpt" placeholder="Excerpt"></vue-editor>
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
        <!--End of modal-->
    </b-container>
</div>
</template>

<script type="text/babel">
    export default {
        watch:{
            '$route' (to, from) {
                // react to route changes...
            }
        },
        data () {
            return {
                editmode: false,
                totalelectronics : 0,
                electronics : [],
                shop_section: this.$route.params.shop_section,
                form: new Form({
                    id:'',
                    shop_section: this.$route.params.shop_section,
                    title :'',
                    slug :'',
                    image:'',
                    icon:'',
                    display:'',
                    type:'',
                    parent_id:'',
                    child:'',
                    order_item:'',
                    excerpt:'',
                    user_id:0
                })
            }
        },

        methods : {
            /*===== Call add new Menu modal ====*/
            newElectronics(){
                this.editmode = false;
                this.form.reset();
                $('#addNewElectronics').modal('show');
            },
            imageUpload(e) {
                //console.log('Uploading');
                let file = e.target.files[0];
                //console.log(file);
                let reader = new FileReader();
                if (file['size'] < 2111775) {
                    reader.onloadend = (file) => {
                        //console.log('RESULT', reader.result)
                        this.form.image = reader.result;
                    }
                    reader.readAsDataURL(file);
                    //Fire.$emit('AfterCreate'); //Fire an reload event
                } else {
                    swal.fire(
                        'Opps..!',
                        'Image file exceeds 2MB size limit.',
                        'warning'
                    )
                }
            },
            /*Create User Function Starts*/
            createElectronics(){
                this.$Progress.start(); //start a progress bar
                this.form.post('../../../api/electronics') // POST form data
                //Start Condition to check form is validate
                .then(({data})=>{
                    $("#addNewElectronics").modal('hide'); //Hide the model
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
            listChange(newelectronics){
                // console.log(newElectronics);
                axios({
                    method: 'post',
                    url: '../../../api/orderElectronics',
                    data: {
                        newelectronics
                    },
                }).then(()=>{
                    Fire.$emit('AfterCreate');
                    Toast.fire({
                        type: 'success',
                        title: 'Electronics Sorted Successfully'
                    })
                    this.$Progress.finish();
                }).catch(()=>{
                    swal.fire(
                        'Error!',
                        'Something Went Wrong.',
                        'warning'
                    )
                    this.$Progress.fail();
                })

            },
            /*==== End of Electronics Create ====*/
            /*==== Call edit Modal with Electronics data ====*/
            editElectronics(electronics){
                this.editmode = true;
                this.form.reset();
                $('#addNewElectronics').modal('show');
                this.form.fill(electronics);
            },
            /*Edit Electronics Function*/
            updateElectronics(){
                this.$Progress.start();
                //console.log('editing data');
                this.form.put('../../../api/electronics/'+this.form.slug)
                    .then(({data}) =>{
                        this.form.reset();
                        $("#addNewElectronics").modal('hide'); //Hide the model
                        this.serverResponse(data);
                    }).catch(()=>{
                    this.$Progress.fail();
                });
            },
            /*==== End of edit Electronics function ====*/

            /*==== Call Delete Modal uith user id ====*/
            deleteElectronics(slug){
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
                        this.form.delete('../../../api/electronics/' + slug).then(({data}) => {
                            this.serverResponse(data);
                        }).catch(() => {
                            swal.fire(
                                'Warning!',
                                'Unauthorized Access to delete.',
                                'warning'
                            )
                            this.$Progress.fail();
                        })
                    }
                })
            },
            /*==== End of Delete Modal ====*/

            loadElectronics(){
                this.$Progress.start();
                if (this.$gate.isAuthorized()){
                    axios.get('../../../api/electronics?shop_section='+this.shop_section)
                        .then(({ data }) => {
                        this.electronics = data, this.totalelectronics = data.total
                        this.$Progress.finish();
                    }).catch(()=>{
                        this.$Progress.fail();
                        swal.fire({
                            title: 'Something went wrong!',
                            text: "or The shop section is invalid.",
                            type: 'error',
                            showCancelButton: false,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: '&crarr; Return, Dashboard!'
                        }).then((result) => {
                            //send an ajax request to the server
                            if (result.value) {
                                window.location.href = '/backend/admin';
                            }else{
                                window.location.href = '/backend/admin';
                            }
                        })


                    })
                }
            }

        },
        created() {
            Fire.$on('searching',()=>{
                let query =this.$parent.search; //take information from root
                axios.get('../../../api/findElectronics?q='+ query)
                    .then((data)=>{
                        this.electronics = data.data
                    }).catch(()=>{

                })
            })

            this.loadElectronics(); //load the user in the table

            //Load the userlist if add or created a new user
            Fire.$on("AfterCreate",()=>{
                this.loadElectronics();
            })
            //setInterval(() => this.loadElectronics(),3000);
        }
    }
</script>
