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
                <button type="button" title="Products Management" data-clipboard-text="air-baloon" class="bg-gradient-default btn-icon-clipboard">
                <div>
                    <span class="d-none d-md-block"><i class="fas fa-store"></i><span class="text-white">Products</span></span>
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
                            <h6 class="text-light text-uppercase ls-1 mb-1">Products</h6>
                            <h5 class="h3 text-white mb-0">Management</h5>
                        </b-col>
                        <b-col>
                            <b-nav class="nav-pills justify-content-end">
                            <b-nav-item
                                class="mr-2 mr-md-0"
                                link-classes="py-2 px-3"
                                @click="newProduct">
                                <span class="d-none d-md-block"><i class="fas fa-plus"></i> Add New Product</span>
                                <span class="d-md-none"><i class="fas fa-plus"></i> Add</span>
                            </b-nav-item>
                            </b-nav>
                        </b-col>
                    </b-row>
                    <b-card-body class="pt-0">
                        <vue-nestable 
                            v-model="products" 
                            :max-depth="1" 
                            v-on:change="listChange(products)">
                            <template slot-scope="{ item }">
                                <!-- Handler -->
                                <vue-nestable-handle :item="item" class="mt-2">
                                    <b-row align-v="center">
                                        <b-col>
                                            <i class="fas fa-bars"> </i> <span>{{ item.title }}</span>
                                        </b-col>
                                        <b-col class="text-right">
                                            <router-link :to="'/backend/admin/product-detail/' + item.slug" class="btn btn-sm btn-primary">
                                                <span class="d-none d-md-block"><i class="fas fa-plus"></i> Add Details</span>
                                                <span class="d-md-none"><i class="fas fa-plus"></i></span>
                                            </router-link>
                                            <a href="#" @click="editProduct(item)" class="btn btn-sm btn-success">
                                                <span class="d-none d-md-block"><i class="fas fa-edit"></i> Edit</span>
                                                <span class="d-md-none"><i class="fas fa-edit"></i></span>
                                            </a>
                                            <a href="#" @click="deleteProduct(item.slug)" class="btn btn-sm btn-danger">
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
        <div class="modal fade" id="addNewProduct" tabindex="-1" role="dialog" aria-labelledby="addNewProductLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" v-show="!editmode" id="addNewProductLabel">Add New Tirp</h5>
                        <h5 class="modal-title" v-show="editmode" id="addNewProductLabel">Update Trip</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form  @submit.prevent="editmode ? updateProduct() : createProduct()">
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="input-group mb-2 mr-sm-2">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">Title</div>
                                            </div>
                                            <input v-model="form.title" type="text" name="title"
                                                placeholder="Product Title."
                                                class="form-control" :class="{ 'is-invalid': form.errors.has('title') }">
                                            <has-error :form="form" field="title"></has-error>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-times fa-fw"></i>Close</button>
                            <button v-show="editmode" type="submit" class="btn btn-success"><i class="fas fa-plus fa-fw"></i>Update</button>
                            <button v-show="!editmode" type="submit" class="btn btn-primary"><i class="fas fa-plus fa-fw"></i>Create and Procced</button>
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
    import Multiselect from 'vue-multiselect'
    export default {
        components: {
            Multiselect,
        },
        data () {
            return {
                editmode: false,
                totalproduct : 0,
                products : [],
                form: new Form({
                    id:'',
                    title :'',
                    slug :''
                })
            }
        },


        methods : {
            /*===== Call add new products modal ====*/
            newProduct(){
                this.editmode = false;
                this.form.reset();
                $('#addNewProduct').modal('show');
            },
            /*Create User Function Starts*/
            createProduct(){
                swal.fire({
                    title: 'Please Wait! preceding...',
                    showConfirmButton: false,
                    allowOutsideClick: false,
                    allowEscapeKey: false
                    })
                this.$Progress.start(); //start a progress bar
                this.form.post('../../api/product') // POST form data
                //Start Condition to check form is validate
                    .then(({ data })=>{
                        this.form.reset();
                        $('#addNewProduct').modal('hide');
                        if(data.result == 'success'){
                            //alert(data.slug);
                            window.location.href = '/backend/admin/product-detail/'+data.slug;
                        }else{
                            swal.fire(
                            'Error!',
                            'Something Went Wrong.',
                            'warning'
                            )
                            this.$Progress.fail(); //End the progress bar
                        }
                        Fire.$emit('AfterCreate');
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
            listChange(newproduct){
                axios({
                    method: 'post',
                    url: '../../api/orderProduct',
                    data: {
                        newproduct
                    },
                })
                //Start Condition to check form is validate
                    .then(()=>{
                        Fire.$emit('AfterCreate'); //custom event to reload data
                        //Sweetalert notification for the result
                        Toast.fire({
                            type: 'success',
                            title: 'Product Sorted Successfully'
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
            editProduct(products){
                this.editmode = true;
                this.form.reset();
                $('#addNewProduct').modal('show');
                this.form.fill(products);
            },
            /*Edit product Function*/
            updateProduct(){
                this.$Progress.start();
                //console.log('editing data');
                this.form.put('/api/product/'+this.form.slug)
                    .then((data) =>{
                        this.form.reset();
                        $("#addNewProduct").modal('hide'); //Hide the model
                        this.serverResponse(data.data);
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
            deleteProduct(slug){
                swal.fire({
                    title: 'Are you sure?',
                    text: "This action will delete all data and files associated with this data. You won't be able to revert this!",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    //send an ajax request to the server
                    if (result.value) {
                        this.form.delete('../../api/product/' + slug).then(() => {
                            swal.fire(
                                'Deleted!',
                                'Your file has been deleted.',
                                'success'
                            )
                            Fire.$emit('AfterCreate'); //Fire an reload event
                        }).catch(() => {
                            swal.fire(
                                'Warning!',
                                'Unauthorized Access to delete.',
                                'warning'
                            )
                        })
                    }

                })
            },

            loadProducts(){
                this.$Progress.start();
                if (this.$gate.isAuthorized()){
                    axios.get("/api/product").then(({ data }) => (this.products = data, this.totalproduct = data.total));
                    this.$Progress.finish();
                }
            }
        },
        created() {
            Fire.$on('searching',()=>{
                let query =this.$parent.search; //take information from root
                axios.get('/api/findProduct?q='+ query)
                    .then((data)=>{
                        this.products = data.data
                    }).catch(()=>{

                })
            })

            this.loadProducts(); //load the user in the table

            //Load the userlist if add or created a new user
            Fire.$on("AfterCreate",()=>{
                this.loadProducts();
            })
            //setInterval(() => this.loadProducts(),3000);
        }
    }
</script>
