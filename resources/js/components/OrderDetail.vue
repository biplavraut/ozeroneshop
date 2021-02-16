<template>
<div>
    <base-header class="pb-6 pb-8 pt-5 pt-md-8 bg-gradient-warning">
        <b-row>
            <b-col>
            </b-col>
        </b-row>
    </base-header>
    <b-container fluid class="mt--7">
        <b-row v-if="$gate.isAuthorized()">
            <b-col xl="8" class="mb-5 mb-xl-0">
                    <card type="secondary" header-classes="bg-transparent">
                        <b-row align-v="center" slot="header">
                            <b-col>
                                <h6 class="text-light text-uppercase ls-1 mb-1">Order Detail</h6>
                                <h5 class="h3 text-black mb-0">{{oform.order_code}}</h5>
                            </b-col>
                            <b-col cols="4" class="text-right">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
                                </button>                            
                            </b-col>
                        </b-row>
                        
                        <b-form @submit.prevent="updateOrder()">
                            <b-card-body class="pt-0">                            
                                
                            <b-col cols="12" v-for="order_detail in get_order_details" :key="order_detail.id">
                                <p>Product Title: {{ order_detail.product_title }}</p>
                                <p>Product unit price: {{ order_detail.unit_price }}</p>
                                <p>Product discount: {{ order_detail.discount }}</p>
                                <p>Product quantity: {{ order_detail.quantity }}</p>
                                <p>Product sub total: {{ order_detail.sub_total }}</p>
                                <p>Product image: {{ order_detail.image }}</p>
                                <p>Product color: {{ order_detail.color }}</p>
                                <p>Product storage: {{ order_detail.storage }}</p>
                                <hr>
                            </b-col>
                            <b-col cols="12">
                                <p><b>Grand Total: NPR {{ oform.total_price }}</b> </p>
                                
                                <hr>
                            </b-col>
                                
                            </b-card-body>
                            <!-- <b-card-foot>
                                <button class="btn btn-danger">Cancel</button>
                                <button class="btn btn-success float-right" type="submit">Update</button>
                            </b-card-foot>                         -->
                        </b-form>
                    </card>
            </b-col>
            <b-col xl="4" class="mb-5 mb-xl-0">
                <card type="secondary" class="mb-5 mb-xl-5" header-classes="bg-transparent">
                    <b-row align-v="center" slot="header" >
                        <b-col cols="8">
                            <h3 class="mb-0">Customer Detail </h3>
                        </b-col>
                    </b-row>
                    <b-card-body class="pt-0">
                        <b-row align-v="center">

                            <p>Customer Name: {{get_customer_details.name}}</p>
                            <p>Customer Email: {{get_customer_details.email}}</p>
                            <p>Customer Primary Phone: {{get_customer_details.primary_phone}}</p>
                            <p>Customer Secondary Phone: {{get_customer_details.secondary_phone}}</p>
                            <p>Customer Address: {{get_customer_details.address}}</p>
                            <!-- <b-col cols="6" v-for="customer in get_customer_details" :key="customer.id">
                                <p>Customer Name: {{ customer.name }}</p>
                                <p>Customer Email: {{ customer.email }}</p>
                            </b-col> -->
                        </b-row>
                    </b-card-body>
                </card>
                <card type="secondary" class="mb-5 mb-xl-5" header-classes="bg-transparent">
                    <b-row align-v="center" slot="header" >
                        <b-col cols="8">
                            <h3 class="mb-0">Shipping Detail </h3>
                        </b-col>
                    </b-row>
                    <b-card-body class="pt-0">
                        <b-row align-v="center">
                            <p>Shipping Name: {{get_shipping_details.name}}</p>
                            <p>Shipping Email: {{get_shipping_details.email}}</p>
                            <p>Shipping Primary Phone: {{get_shipping_details.primary_phone}}</p>
                            <p>Shipping Secondary Phone: {{get_shipping_details.secondary_phone}}</p>
                            <p>Shipping Address: {{get_shipping_details.address}}</p>
                            <!-- <b-col cols="6" v-for="shipping in get_shipping_details" :key="shipping.id">
                                <p>Shipping Name: {{ shipping.name }}</p>
                                <p>Shipping Email: {{ shipping.email }}</p>
                            </b-col> -->
                        </b-row>
                    </b-card-body>
                </card>
                
            </b-col>
        </b-row>

    </b-container>
</div>
</template>


<script>
    import Multiselect from 'vue-multiselect'
    import { VueEditor } from 'vue2-editor'
    // Vue color picker
    import Verte from 'verte';
    
    export default {
        watch:{
            '$route' (to, from) {
                // react to route changes...
            }
        },
        components: {
            Multiselect,
            VueEditor,
            Verte
        },
        data () {
            return {
                order_id: this.$route.params.id,
                get_order_details:[],
                get_customer_details:[],
                get_shipping_details:[],
                
                editmode: false,
                editdetail: false,
                
                oform: new Form({
                    id:'',
                    order_code :'',
                    shipping_id :'',
                    delivered :'',
                    user:'',
                    customer_id:'',
                    promo_code:'',
                    payment_type:'',
                    payment_verified:'',
                    discount:'',
                    shipping_cost:'',
                    vat:'',
                    service_charge:'',
                    total_price:'',
                    order_date:'',
                    ship_date:'',
                    transaction_status: '0',
                    deleted:''
                })
            }
        },

        methods : {
            
            editDetail(details){
                this.editdetail = true;
                this.dform.reset();
                $('#addNewDetail').modal('show');
                this.dform.fill(details);
            },
            updateDetail(){
                this.$Progress.start();
                //console.log('editing data');
                this.dform.put('/api/product_detail/'+this.dform.id)
                    .then((data) =>{
                        $("#addNewDetail").modal('hide'); //Hide the model
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
            
            loadDetail(){
                swal.fire({
                    title: 'Please Wait! Loading...',
                    showConfirmButton: false,
                    allowOutsideClick: false,
                    allowEscapeKey: false,
                    timer: 3000
                    })
                this.$Progress.start();
                if (this.$gate.isAuthorized()){
                    axios.get("/api/order?id="+this.order_id).then(({ data }) => (
                        this.oform.fill(data),
                        this.get_order_details = data.get_order_detail, 
                        this.get_customer_details = data.get_customer_detail,
                        this.get_shipping_details = data.get_shipping_detail                      
                    ));
                    this.$Progress.finish();
                }
                // swal.close();
            }
        },
        created() {
            Fire.$on('searching',()=>{
                let query =this.$parent.search; //take information from root
                axios.get('/api/findDetail?q='+ query)
                    .then((data)=>{
                        this.details = data.data
                    }).catch(()=>{

                })
            })

            this.loadDetail(); //load the user in the table
            //Load the userlist if add or created a new user
            Fire.$on("AfterCreate",()=>{
                this.loadDetail();
            })


            //setInterval(() => this.loadUsers(),3000);
        }
    }
</script>
