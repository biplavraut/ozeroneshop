<template>
<div>
    <base-header class="pb-6 pb-8 pt-5 pt-md-8 bg-gradient-warning">
        <!-- Card stats -->
        <b-row>
            <b-col>
            <router-link to="/backend/admin/slider">
                <button type="button" title="Slider Management" data-clipboard-text="air-baloon" class="bg-gradient-secondary btn-icon-clipboard">
                    <div>
                        <span class="d-none d-md-block"><i class="fas fa-sliders-h"></i><span>SLIDER</span></span>
                        <span class="d-md-none"><i class="fas fa-sliders-h"></i></span>
                    </div>                       
                </button>
            </router-link>
            </b-col>             
            <b-col>
            <router-link to="/backend/admin/blogs">
                <button type="button" title="Blog Management" data-clipboard-text="air-baloon" class="bg-gradient-default btn-icon-clipboard">
                <div>
                    <span class="d-none d-md-block"><i class="fas fa-blog"></i><span class="text-white">Blog</span></span>
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
            <router-link to="/backend/admin/faqs">
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
                            <h6 class="text-light text-uppercase ls-1 mb-1">Blogs</h6>
                            <h5 class="h3 text-white mb-0">Management</h5>
                        </b-col>
                        <b-col>
                            <b-nav class="nav-pills justify-content-end">
                            <b-nav-item
                                class="mr-2 mr-md-0"
                                link-classes="py-2 px-3"
                                @click="newBlog">
                                <span class="d-none d-md-block"><i class="fas fa-plus"></i> Add New Blog</span>
                                <span class="d-md-none"><i class="fas fa-plus"></i> Add</span>
                            </b-nav-item>
                            </b-nav>
                        </b-col>
                    </b-row>
                    <b-card-body class="pt-0">
                        <vue-nestable 
                            v-model="blogs" 
                            :max-depth="1" 
                            v-on:change="listChange(blogs)">
                            <template slot-scope="{ item }">
                                <!-- Handler -->
                                <vue-nestable-handle :item="item" class="mt-2">
                                    <b-row align-v="center">
                                        <b-col>
                                            <i class="fas fa-bars"> </i> <span>{{ item.title }}</span>
                                        </b-col>
                                        <b-col class="text-right">
                                            <a href="#" @click="editContent(item)" class="btn btn-sm btn-success">
                                                <span class="d-none d-md-block"><i class="fas fa-edit"></i> Edit</span>
                                                <span class="d-md-none"><i class="fas fa-edit"></i></span>
                                            </a>
                                            <a href="#" @click="deleteBlog(item.slug)" class="btn btn-sm btn-danger">
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
        <div class="modal fade" id="addNewBlog" tabindex="-1" role="dialog" aria-labelledby="addNewBlogLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" v-show="!editmode" id="addNewBlogLabel">Add New Blog</h5>
                        <h5 class="modal-title" v-show="editmode" id="addNewBlogLabel">Update Blog</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form  @submit.prevent="editmode ? updateBlog() : createBlog()">
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="input-group mb-2">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">Blog Title</div>
                                            </div>
                                            <input v-model="form.title" type="text" name="title"
                                                   placeholder="Some nice title."
                                                   class="form-control" :class="{ 'is-invalid': form.errors.has('title') }">
                                            <has-error :form="form" field="title"></has-error>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="input-group mb-2">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">Brand</div>
                                            </div>
                                            <b-form-select v-model="form.brand" :options="brands" value-field="id" text-field="title"></b-form-select>
                                            <has-error :form="form" field="brand"></has-error>
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
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="input-group mb-2 mr-sm-2">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">Blog Author</div>
                                            </div>
                                            <input v-model="form.author" type="text" name="author"
                                                   placeholder="Blog Author."
                                                   class="form-control" :class="{ 'is-invalid': form.errors.has('author') }">
                                            <has-error :form="form" field="author"></has-error>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="input-group mb-2 mr-sm-2">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">Blog Date</div>
                                            </div>
                                            <input v-model="form.date" type="date" name="date"
                                                   placeholder="Blog Date."
                                                   class="form-control" :class="{ 'is-invalid': form.errors.has('date') }">
                                            <has-error :form="form" field="date"></has-error>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="input-group mb-2 mr-sm-2">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">Meta Keywords</div>
                                            </div>
                                            <input v-model="form.meta_keywords" type="text" name="meta_keywords"
                                                   placeholder="Keywords: Shop, Online..,"
                                                   class="form-control" :class="{ 'is-invalid': form.errors.has('meta_keywords') }">
                                            <has-error :form="form" field="meta_keywords"></has-error>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="input-group mb-2 mr-sm-2">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">Meta Tags</div>
                                            </div>
                                            <input v-model="form.meta_tags" type="text" name="meta_tags"
                                                   placeholder="Tags: Shop, Online..,"
                                                   class="form-control" :class="{ 'is-invalid': form.errors.has('meta_tags') }">
                                            <has-error :form="form" field="meta_tags"></has-error>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="input-group mb-2 mr-sm-2">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">Meta Categories</div>
                                            </div>
                                            <input v-model="form.meta_categories" type="text" name="meta_categories"
                                                   placeholder="Categories: Shop, Online..,"
                                                   class="form-control" :class="{ 'is-invalid': form.errors.has('meta_categories') }">
                                            <has-error :form="form" field="meta_categories"></has-error>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">Blog Description</div>
                                    </div>
                                    <vue-editor v-model="form.excerpt" placeholder="Blog Discription"></vue-editor>
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
                editmode: false,
                totalblog : 0,
                blogs : [],
                brands: [],
                form: new Form({
                    id:'',
                    title :'',
                    slug :'',
                    image:'',
                    display:'',
                    author:'',
                    brand:'',
                    date:'',
                    meta_keywords:'',
                    meta_tags:'',
                    meta_categories:'',
                    order_item:'',
                    excerpt:''
                })
            }
        },


        methods : {
            /*===== Call add new content modal ====*/
            newBlog(){
                this.editmode = false;
                this.form.reset();
                $('#addNewBlog').modal('show');
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
            createBlog(){
                this.$Progress.start(); //start a progress bar
                this.form.post('../../api/blog') // POST form data
                //Start Condition to check form is validate
                    .then(({data})=>{
                        $("#addNewBlog").modal('hide'); //Hide the model
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
            listChange(newblog){
                //console.log(newcontent);

                axios({
                    method: 'post',
                    url: '../../api/orderBlog',
                    data: {
                        newblog
                    },
                })
                //Start Condition to check form is validate
                    .then(()=>{
                        Fire.$emit('AfterCreate'); //custom event to reload data
                        //Sweetalert notification for the result
                        Toast.fire({
                            type: 'success',
                            title: 'Blog Sorted Successfully'
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
            /*==== End of content Create ====*/

            /*==== Call edit Modal with Content data ====*/
            editContent(blogs){
                this.editmode = true;
                this.form.reset();
                $('#addNewBlog').modal('show');
                this.form.fill(blogs);
            },
            /*Edit Blog Function*/
            updateBlog(){
                this.$Progress.start();
                //console.log('editing data');
                this.form.put('../../api/blog/'+this.form.slug)
                    .then(({data}) =>{
                        this.form.reset();
                        $("#addNewBlog").modal('hide'); //Hide the model
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
            /*==== End of edit Blog function ====*/

            /*==== Call Delete Modal uith Blog id ====*/
            deleteBlog(slug){
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
                        this.form.delete('../../api/blog/' + slug).then(({data}) => {
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

            loadBlogs(){
                this.$Progress.start();
                if (this.$gate.isAuthorized()){
                    axios.get("../../api/blog").then(({ data }) => (this.blogs = data, this.totalblog = data.total));
                    axios.get("../../../api/brand").then(({ data }) => (this.brands = data));
                    this.$Progress.finish();
                }
            }
        },
        created() {
            Fire.$on('searching',()=>{
                let query =this.$parent.search; //take information from root
                axios.get('../../api/findBlog?q='+ query)
                    .then((data)=>{
                        this.blogs = data.data
                    }).catch(()=>{

                })
            })

            this.loadBlogs(); //load the user in the table

            //Load the userlist if add or created a new user
            Fire.$on("AfterCreate",()=>{
                this.loadBlogs();
            })
            //setInterval(() => this.loadBlogs(),3000);
        }
    }
</script>
