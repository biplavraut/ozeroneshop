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
                            <h6 class="text-light text-uppercase ls-1 mb-1">Shop Sections</h6>
                            <h5 class="h3 text-white mb-0">Management</h5>
                        </b-col>
                        <b-col>
                            <b-nav class="nav-pills justify-content-end">
                            <b-nav-item
                                class="mr-2 mr-md-0"
                                link-classes="py-2 px-3"
                                @click="newShopSection">
                                <span class="d-none d-md-block"><i class="fas fa-plus"></i> Add New Shop Section</span>
                                <span class="d-md-none"><i class="fas fa-plus"></i> Add</span>
                            </b-nav-item>
                            </b-nav>
                        </b-col>
                    </b-row>
                    <b-card-body class="pt-0">
                        <vue-nestable 
                            v-model="shopsections" 
                            :max-depth="1" 
                            v-on:change="listChange(shopsections)">
                            <template slot-scope="{ item }">
                                <!-- Handler -->
                                <vue-nestable-handle :item="item" class="mt-2">
                                    <b-row align-v="center">
                                        <b-col>
                                            <i class="fas fa-bars"> </i> <span>{{ item.title }}</span>
                                            <small class="hidden-xs hidden-sm">/ {{ item.get_electronics_relation.length }} electronics listed inside it</small>
                                        </b-col>
                                        <b-col class="text-right">
                                            <router-link :to="'/backend/admin/electronics/'+item.slug" class="btn btn-sm btn-primary">
                                                <span class="d-none d-md-block"><i class="fas fa-plus"></i> Add Categories</span>
                                                <span class="d-md-none"><i class="fas fa-plus"></i></span>
                                            </router-link>
                                            <a href="#" @click="editShopSection(item)" class="btn btn-sm btn-success">
                                                <span class="d-none d-md-block"><i class="fas fa-edit"></i> Edit</span>
                                                <span class="d-md-none"><i class="fas fa-edit"></i></span>
                                            </a>
                                            <a href="#" @click="deleteShopSection(item.slug)" class="btn btn-sm btn-danger">
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
        <div class="modal fade" id="addNewShopSection" tabindex="-1" role="dialog" aria-labelledby="addNewShopSectionLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" v-show="!editmode" id="addNewShopSectionLabel">Add New Shop Section</h5>
                        <h5 class="modal-title" v-show="editmode" id="addNewShopSectionLabel">Update Shop Section</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form  @submit.prevent="editmode ? updateShopSection() : createShopSection()">
                        <div class="modal-body">
                            <div class="form-group">
                                <div class="input-group mb-2 mr-sm-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">Title</div>
                                    </div>
                                    <input v-model="form.title" type="text" name="title"
                                           placeholder="Shop Section Title."
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
                                <div class="col-md-6">
                                    <div class="form-group">
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
        data () {
            return {
                editmode: false,
                totalshopsections : 0,
                shopsections : [],
                form: new Form({
                    id:'',
                    title :'',
                    slug :'',
                    image:'',
                    icon:'',
                    display:'',
                    type:'',
                    child:'',
                    order_item:'',
                    excerpt:''
                })
            }
        },
        methods : {
            /*===== Call add new Shop Section modal ====*/
            newShopSection(){
                this.editmode = false;
                this.form.reset();
                $('#addNewShopSection').modal('show');
            },
            imageUpload(e) {
                let file = e.target.files[0];
                let reader = new FileReader();
                if (file['size'] < 2111775) {
                    reader.onloadend = (file) => {
                        //console.log('RESULT', reader.result)
                        this.form.image = reader.result;
                    }
                    reader.readAsDataURL(file);
                } else {
                    swal.fire(
                        'Opps..!',
                        'Image file exceeds 2MB size limit.',
                        'warning'
                    )
                }
            },
            /*Create Shop Section Function Starts*/
            createShopSection(){
                this.$Progress.start(); //start a progress bar
                this.form.post('../../api/shopsection') // POST form data
                //Start Condition to check form is validate
                    .then(({data})=>{
                        $("#addNewShopSection").modal('hide'); //Hide the model
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
            listChange(newshopsection){
                //console.log(newshopsection);
                axios({
                    method: 'post',
                    url: '../../api/orderShopSectionList',
                    data: {
                        newshopsection
                    },
                })
                //Start Condition to check form is validate
                    .then(()=>{
                        Fire.$emit('AfterCreate'); //custom event to reload data
                        //Sweetalert notification for the result
                        Toast.fire({
                            type: 'success',
                            title: 'Shop Section Sorted Successfully'
                        })

                        this.$Progress.finish(); //End the progress bar
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
            /*==== End of Shop Scetion Create ====*/
            /*==== Call edit Modal with user data ====*/
            editShopSection(shopsections){
                this.editmode = true;
                this.form.reset();
                $('#addNewShopSection').modal('show');
                this.form.fill(shopsections);
            },
            /*Edit User Function*/
            updateShopSection(){
                this.$Progress.start();
                //console.log('editing data');
                this.form.put('../../api/shopsection/'+this.form.slug)
                    .then(({data}) =>{
                        this.form.reset();
                        $("#addNewShopSection").modal('hide'); //Hide the model
                        this.serverResponse(data);
                    }).catch(()=>{
                        swal.fire(
                            'Error!',
                            'Something Went Wrong.',
                            'error'
                        )
                    this.$Progress.fail();
                });
            },
            /*==== End of edit user function ====*/

            /*==== Call Delete Modal uith user id ====*/
            deleteShopSection(slug){
                this.$Progress.start();
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
                        this.form.delete('../../api/shopsection/' + slug).then(({data}) => {
                            this.serverResponse(data);
                        }).catch(() => {
                            swal.fire(
                                'Error!',
                                'Something Went Wrong.',
                                'error'
                            )
                        this.$Progress.fail();
                        })
                    }

                })
            },
            /*==== End of Delete Modal ====*/

            loadShopSections(){
                this.$Progress.start();
                if (this.$gate.isAuthorized()){
                    axios.get("../../api/shopsection")
                        .then(({ data }) => (this.shopsections = data, this.totalshopsections = data.total));
                    this.$Progress.finish();
                }
            }
        },
        created() {
            Fire.$on('searching',()=>{
                let query =this.$parent.search; //take information from root
                axios.get('../../api/findShopSection?q='+ query)
                    .then((data)=>{
                        this.shopsections = data.data
                    }).catch(()=>{

                })
            })

            this.loadShopSections(); //load the user in the table

            //Load the shop section if add or created a new shop section
            Fire.$on("AfterCreate",()=>{
                this.loadShopSections();
            })
            //setInterval(() => this.loadShopSections(),3000);
        }
    }
</script>
