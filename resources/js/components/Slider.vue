<template>
    <div>
        <base-header class="pb-6 pb-8 pt-5 pt-md-8 bg-gradient-warning">
            <!-- Card stats -->
            <b-row>
                <b-col>
                <router-link to="/backend/admin/slider">
                    <button type="button" title="Slider Management" data-clipboard-text="air-baloon" class="bg-gradient-default btn-icon-clipboard">
                        <div>
                            <span class="d-none d-md-block"><i class="fas fa-sliders-h"></i><span class="text-white">SLIDER</span></span>
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
                                <h6 class="text-light text-uppercase ls-1 mb-1">Slider</h6>
                                <h5 class="h3 text-white mb-0">Management</h5>
                            </b-col>
                            <b-col>
                                <b-nav class="nav-pills justify-content-end">
                                <b-nav-item
                                    class="mr-2 mr-md-0"
                                    link-classes="py-2 px-3"
                                    @click="newSlider">
                                    <span class="d-none d-md-block"><i class="fas fa-plus"></i> Add New Slider</span>
                                    <span class="d-md-none"><i class="fas fa-plus"></i> Add</span>
                                </b-nav-item>
                                </b-nav>
                            </b-col>
                        </b-row>
                        <b-skeleton-wrapper :loading="loading">
                            <template #loading>
                                <b-card-body class="pt-0">
                                    <ol class="nestable-list nestable-group">
                                        <li class="nestable-item nestable-item-10">
                                            <div class="nestable-item-content">
                                                <div draggable="true" class="nestable-handle mt-2">
                                                    <div class="row align-items-center">
                                                        <div class="col">
                                                            <b-skeleton animation="wave" width="35%"></b-skeleton>
                                                        </div> 
                                                        <div class="col">
                                                            <b-nav class="nav-pills justify-content-end">
                                                                <b-skeleton animation="wave" width="20%"></b-skeleton>
                                                            </b-nav>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="nestable-item nestable-item-10">
                                            <div class="nestable-item-content">
                                                <div draggable="true" class="nestable-handle mt-2">
                                                    <div class="row align-items-center">
                                                        <div class="col">
                                                            <b-skeleton animation="wave" width="55%"></b-skeleton>
                                                        </div> 
                                                        <div class="col">
                                                            <b-nav class="nav-pills justify-content-end">
                                                                <b-skeleton animation="wave" width="20%"></b-skeleton>
                                                            </b-nav>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    </ol>
                                </b-card-body>
                            </template>
                            <b-card-body class="pt-0">
                                <vue-nestable 
                                    v-model="sliders" 
                                    :max-depth="1" 
                                    v-on:change="listChange(sliders)">
                                    <template slot-scope="{ item }">
                                        <!-- Handler -->
                                        <vue-nestable-handle :item="item" class="mt-2">
                                            <b-row align-v="center">
                                                <b-col>
                                                    <i class="fas fa-bars"> </i> <span>{{ item.title }}</span>
                                                </b-col>
                                                <b-col class="text-right">
                                                    <a href="#" @click="editSlider(item)" class="btn btn-sm btn-success">
                                                        <span class="d-none d-md-block"><i class="fas fa-edit"></i> Edit</span>
                                                        <span class="d-md-none"><i class="fas fa-edit"></i></span>
                                                    </a>
                                                    <a href="#" @click="deleteSlider(item.slug)" class="btn btn-sm btn-danger">
                                                        <span class="d-none d-md-block"><i class="fas fa-trash"></i> Delete</span>
                                                        <span class="d-md-none"><i class="fas fa-trash"></i></span>
                                                    </a>
                                                </b-col>
                                            </b-row>
                                        </vue-nestable-handle>
                                    </template>
                                </vue-nestable>
                            </b-card-body>
                        </b-skeleton-wrapper>
                    </card>
                </b-col>
            </b-row>
            <div v-if="!$gate.isAuthorized()">
                <not-found></not-found>
            </div>
            <!-- Modal -->
            <div class="modal fade" id="addNewSlider" tabindex="-1" role="dialog" aria-labelledby="addNewSliderLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" v-show="!editmode" id="addNewSliderLabel">Add New Slider</h5>
                            <h5 class="modal-title" v-show="editmode" id="addNewSliderLabel">Update Slider</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form  @submit.prevent="editmode ? updateSlider() : createSlider()">
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="input-group mb-2 mr-sm-2">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">Title</div>
                                                </div>
                                                <input v-model="form.title" type="text" name="title"
                                                    placeholder="Slider Title."
                                                    class="form-control" :class="{ 'is-invalid': form.errors.has('title') }">
                                                <has-error :form="form" field="title"></has-error>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="input-group mb-2 mr-sm-2">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">Sub title</div>
                                                </div>
                                                <input v-model="form.sub_title" type="text" name="sub_title"
                                                    placeholder="Sub Title"
                                                    class="form-control" :class="{ 'is-invalid': form.errors.has('sub_title') }">
                                                <has-error :form="form" field="sub_title"></has-error>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="input-group mb-2">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">Image</div>
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
                                                    <div class="input-group-text">
                                                        <input v-model="form.display" type="checkbox" name="display" :class="{ 'is-invalid': form.errors.has('display') }">
                                                    </div>
                                                </div>
                                                <input type="text" value="Display" class="form-control" disabled>
                                                <has-error :form="form" field="display"></has-error>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <div class="input-group mb-2 mr-sm-2">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">Link</div>
                                                </div>
                                                <input v-model="form.link" type="text" name="link"
                                                    placeholder="Slider Link"
                                                    class="form-control" :class="{ 'is-invalid': form.errors.has('link') }">
                                                <has-error :form="form" field="link"></has-error>
                                            </div>
                                        </div>
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
            <!--End of modal-->
        </b-container>
    </div>
</template>

<script type="text/babel">
    import { VueEditor } from 'vue2-editor'
    export default {
        components: {
            VueEditor
        },
        data () {
            return {
                loading: false,
                loadingTime: 0,
                maxLoadingTime: 3,

                editmode: false,
                totalteslide : 0,
                sliders : [],
                form: new Form({
                    id:'',
                    title :'',
                    sub_title:'',
                    slug :'',
                    image:'',
                    display:'',
                    order_item:'',
                    link:'',
                })
            }
        },
        watch: {
        loading(newVal, oldValue) {
            if (newVal !== oldValue) {
            this.clearLoadingTimeInterval()

            if (newVal) {
                this.$_loadingTimeInterval = setInterval(() => {
                this.loadingTime++
                }, 1000)
            }
            }
        },
        loadingTime(newVal, oldValue) {
            if (newVal !== oldValue) {
            if (newVal === this.maxLoadingTime) {
                this.loading = false
            }
            }
        }
        },
        methods : {
            clearLoadingTimeInterval() {
                clearInterval(this.$_loadingTimeInterval)
                this.$_loadingTimeInterval = null
            },
            startLoading() {
                this.loading = true
                this.loadingTime = 0
            },
            /*===== Call add new content modal ====*/
            newSlider(){
                this.editmode = false;
                this.form.reset();
                $('#addNewSlider').modal('show');
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
            createSlider(){
                this.$Progress.start(); //start a progress bar
                this.form.post('../../api/slider') // POST form data
                //Start Condition to check form is validate
                    .then(({data})=>{
                        $("#addNewSlider").modal('hide'); //Hide the model
                        this.serverResponse(data);
                    })
                    //if form is not valid of handle any errors
                    .catch(()=>{
                        swal.fire(
                            'Error!',
                            'Something Went Wrong.',
                            'error'
                        )
                        this.$Progress.fail(); //End the progress bar
                    })

            },
            listChange(newslider){
                //console.log(newcontent);

                axios({
                    method: 'post',
                    url: '../../api/orderSlider',
                    data: {
                        newslider
                    },
                })
                //Start Condition to check form is validate
                    .then(()=>{
                        Fire.$emit('AfterCreate'); //custom event to reload data
                        //Sweetalert notification for the result
                        Toast.fire({
                            type: 'success',
                            title: 'Slider Sorted Successfully'
                        })

                        this.$Progress.finish(); //End the progress bar
                    })
                    //if form is not valid of handle any errors
                    .catch(()=>{
                        swal.fire(
                            'Error!',
                            'Something Went Wrong.',
                            'error'
                        )
                        this.$Progress.fail(); //End the progress bar
                    })

            },
            /*==== End of content Create ====*/

            /*==== Call edit Modal with Content data ====*/
            editSlider(sliders){
                this.editmode = true;
                this.form.reset();
                $('#addNewSlider').modal('show');
                this.form.fill(sliders);
            },
            /*Edit Slider Function*/
            updateSlider(){
                this.$Progress.start();
                //console.log('editing data');
                this.form.put('../../api/slider/'+this.form.slug)
                    .then(({data}) =>{
                        console.log(data);
                        this.form.reset();
                        $("#addNewSlider").modal('hide'); //Hide the model
                        this.serverResponse(data);

                    }).catch(()=>{
                    this.$Progress.fail();
                });
            },
            /*==== End of edit Testimonial function ====*/

            /*==== Call Delete Modal uith TEstimonial id ====*/
            deleteSlider(slug){
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
                        this.form.delete('../../api/slider/' + slug).then(({data}) => {
                            this.serverResponse(data);
                        }).catch(() => {
                            swal.fire(
                                'Oops!',
                                'Something went worong.',
                                'error'
                            )
                             this.$Progress.fail();
                        })
                    }

                })
            },
            /*==== End of Delete Modal ====*/

            loadSlider(){
                if (this.$gate.isAuthorized()){
                    axios.get("../../api/slider").then(({ data }) => (this.sliders = data, this.totalslider = data.total));
                }
            }
        },
        created() {
            this.$_loadingTimeInterval = null;
            Fire.$on('searching',()=>{
                let query =this.$parent.search; //take information from root
                axios.get('../../api/findSlider?q='+ query)
                    .then(({ data })=>{
                        this.sliders = data
                    }).catch(()=>{

                })
            })
            this.loadSlider(); //load the user in the table
            //Load the userlist if add or created a new user
            Fire.$on("AfterCreate",()=>{
                this.loadSlider();
            })


            //setInterval(() => this.loadUsers(),3000);
        },
        mounted() {
            this.startLoading()
        }
    }
</script>
