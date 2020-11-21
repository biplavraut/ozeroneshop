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
                <button type="button" title="SEO Management" data-clipboard-text="air-baloon" class="bg-gradient-default btn-icon-clipboard">
                <div>
                    <span class="d-none d-md-block"><i class="fas fa-star"></i><span class="text-white">SEO</span></span>
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
                    <card type="secondary" header-classes="bg-transparent">
                        <b-row align-v="center" slot="header">
                            <b-col>
                                <h6 class="text-light text-uppercase ls-1 mb-1">SEO - Meta</h6>
                                <h5 class="h3 text-black mb-0">Management</h5>
                            </b-col>
                        </b-row>
                        <b-card-body class="pt-0">
                            <form class="form-horizontal">
                                <div class="form-group">
                                    <div class="input-group mt-2 mb-2 mr-sm-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">Site Title</div>
                                        </div>
                                        <input v-model="form.title" type="text" name="title"
                                            placeholder="Site Title."
                                            class="form-control" :class="{ 'is-invalid': form.errors.has('title') }">
                                        <has-error :form="form" field="title"></has-error>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group mb-2 mr-sm-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">Keywords</div>
                                        </div>
                                        <input v-model="form.keyword" id="keyword" type="text" name="keyword" placeholder="keyword" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group mb-2 mr-sm-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">Subject</div>
                                        </div>
                                        <input v-model="form.subject" id="subject" type="text" name="subject" placeholder="subject" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group mb-2 mr-sm-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">Topic</div>
                                        </div>
                                        <input v-model="form.topic" id="topic" type="text" name="topic" placeholder="topic" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group mb-2 mr-sm-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">Summary</div>
                                        </div>
                                        <input v-model="form.summary" id="summary" type="text" name="summary" placeholder="summary" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group mb-2 mr-sm-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">Classification</div>
                                        </div>
                                        <input v-model="form.classification" id="classification" type="text" name="classification" placeholder="classification" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group mb-2 mr-sm-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">Category</div>
                                        </div>
                                        <input v-model="form.category" id="category" type="text" name="category" placeholder="category" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">Description</div>
                                    </div>
                                    <vue-editor v-model="form.excerpt" placeholder="Site Description"></vue-editor>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <button type="button" class="btn btn-danger floar-right"><i class="fas fa-times fa-fw"></i>Cancel</button>
                                        <button @click.prevent="updateSeo" type="submit" class="btn btn-success float-right">Update</button>
                                    </div>
                                </div>
                            </form>
                        </b-card-body>
                    </card>
                </b-col>
            </b-row>
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
                seo : {},
                form: new Form({
                    id:'',
                    title :'',
                    keyword:'',
                    subject:'',
                    topic:'',
                    summary:'',
                    classification:'',
                    category: '',
                    excerpt:''
                })
            }
        },
        methods : {
            updateSeo(id){
                this.$Progress.start();
                //console.log('editing data');
                this.form.put('../../api/seo/'+this.form.id)
                    .then(({data}) =>{
                        this.serverResponse(data);

                    }).catch(()=>{
                        swal.fire(
                                'Oops!',
                                'Something went worong.',
                                'error'
                            )
                    this.$Progress.fail();
                });
            },
            loadSeo(){
                if (this.$gate.isAuthorized()){
                    axios.get("../../api/seo/").then(({data}) => (this.form.fill(data))).catch();
                }
            }
        },
        created() {
            Fire.$on('searching',()=>{
                let query =this.$parent.search; //take information from root
                axios.get('api/findSeo?q='+ query)
                    .then(({ data })=>{
                        this.seo = data
                    }).catch(()=>{
                })
            })
            this.loadSeo(); //load the user in the table
            //Load the userlist if add or created a new user
            Fire.$on("AfterCreate",()=>{
                this.loadSeo();
            })

            //setInterval(() => this.loadSeo(),3000);
        }
    }
</script>
