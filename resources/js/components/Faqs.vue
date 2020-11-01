<template>
    <div class="container">
        <div class="row mt-5" v-if="$gate.isAuthorized()">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">FAQ Management</h3>

                        <div class="card-tools">
                            <button type="" @click="newFaq" class="btn btn-primary"><i class="fas fa-plus"></i> Add New FAQ</button>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover">
                            <vue-nestable v-model="faqs" :max-depth="1" v-on:change="listChange(faqs)">
                                <template slot-scope="{ item }">
                                    <!-- Handler -->
                                    <vue-nestable-handle :item="item">
                                        <div class="row">
                                            <div class="col-md-8">
                                                <i class="fas fa-bars"> </i> <span>{{ item.title }}</span>
                                            </div>
                                            <div class="col-md-4 item_actions">
                                                <a href="#" @click="editFaq(item)" class="btn btn-sm btn-success">Edit
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                <a href="#" @click="deleteFaq(item.slug)" class="btn btn-sm btn-danger">Delete
                                                    <i class="fa fa-trash"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </vue-nestable-handle>
                                    <!-- Testimonial -->
                                </template>
                            </vue-nestable>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="addNewFaq" tabindex="-1" role="dialog" aria-labelledby="addNewFaqLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" v-show="!editmode" id="addNewFaqLabel">Add New FAQ</h5>
                        <h5 class="modal-title" v-show="editmode" id="addNewFaqLabel">Update</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form  @submit.prevent="editmode ? updateFaq() : createFaq()">
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="input-group mb-2 mr-sm-2">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">Title</div>
                                            </div>
                                            <input v-model="form.title" type="text" name="title"
                                                   placeholder="How to add FAQ?"
                                                   class="form-control" :class="{ 'is-invalid': form.errors.has('title') }">
                                            <has-error :form="form" field="title"></has-error>
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
                                                <div class="input-group-text">Link</div>
                                            </div>
                                            <input v-model="form.link" type="text" name="link"
                                                   placeholder="Website Link"
                                                   class="form-control" :class="{ 'is-invalid': form.errors.has('link') }">
                                            <has-error :form="form" field="link"></has-error>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">Excerpt</div>
                                        </div>
                                        <vue-editor v-model="form.excerpt" placeholder="Now! click create button."></vue-editor>
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
                totalfaq : 0,
                faqs: [],
                form: new Form({
                    id:'',
                    title :'',
                    slug :'',
                    display:'',
                    order_item:'',
                    link:'',
                    excerpt:''
                })
            }
        },
        methods : {
            /*===== Call add new content modal ====*/
            newFaq(){
                this.editmode = false;
                this.form.reset();
                $('#addNewFaq').modal('show');
            },
            
            /*Create Faq Function Starts*/
            createFaq(){
                this.$Progress.start(); //start a progress bar
                this.form.post('../../api/faq') // POST form data
                //Start Condition to check form is validate
                    .then(({data})=>{
                        $("#addNewFaq").modal('hide'); //Hide the model
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
            listChange(newfaq){
                //console.log(newcontent);
                axios({
                    method: 'post',
                    url: '../../api/orderFaq',
                    data: {
                        newfaq
                    },
                })
                //Start Condition to check form is validate
                    .then(()=>{
                        Fire.$emit('AfterCreate'); //custom event to reload data
                        //Sweetalert notification for the result
                        Toast.fire({
                            type: 'success',
                            title: 'Faqs Sorted Successfully'
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
            editFaq(faqs){
                this.editmode = true;
                this.form.reset();
                $('#addNewFaq').modal('show');
                this.form.fill(faqs);
            },
            /*Edit Slider Function*/
            updateFaq(){
                this.$Progress.start();
                //console.log('editing data');
                this.form.put('../../api/faq/'+this.form.slug)
                    .then(({data}) =>{
                        this.form.reset();
                        $("#addNewFaq").modal('hide'); //Hide the model
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
            /*==== End of edit Testimonial function ====*/

            /*==== Call Delete Modal uith TEstimonial id ====*/
            deleteFaq(slug){
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
                        this.form.delete('../../api/faq/' + slug).then(({data}) => {
                            this.serverResponse(data);
                        }).catch(() => {
                            swal.fire(
                                'Error!',
                                'Unauthorized Access to delete.',
                                'error'
                            )
                        this.$Progress.fail();
                        })
                    }

                })
            },
            /*==== End of Delete Modal ====*/

            loadFaq(){
                if (this.$gate.isAuthorized()){
                    axios.get("../../api/faq").then(({ data }) => (this.faqs = data, this.totalfaq = data.total));
                }
            }
        },
        created() {
            Fire.$on('searching',()=>{
                let query =this.$parent.search; //take information from root
                axios.get('../../api/findFaq?q='+ query)
                    .then(({ data })=>{
                        this.faqs = data
                    }).catch(()=>{

                })
            })
            this.loadFaq(); //load the Faq in the table
            //Load the partner if add or created a new Faq
            Fire.$on("AfterCreate",()=>{
                this.loadFaq();
            })
            //setInterval(() => this.loadFaq(),3000);
        }
    }
</script>
