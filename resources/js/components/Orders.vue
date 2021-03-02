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
                <card type="secondary" header-classes="bg-transparent">
                    <b-row align-v="center" slot="header">
                        <b-col>
                            <h6 class="text-dark text-uppercase ls-1 mb-1">Orders</h6>
                            <h5 class="h3 text-light mb-0">Management</h5>
                        </b-col>
                        <b-col>
                            <b-nav class="nav-pills justify-content-end">
                            <!-- <b-nav-item
                                class="mr-2 mr-md-0"
                                link-classes="py-2 px-3"
                                @click="newModal">
                                <span class="d-none d-md-block"><i class="fas fa-plus"></i> Add New User</span>
                                <span class="d-md-none"><i class="fas fa-plus"></i> Add</span>
                            </b-nav-item> -->
                            </b-nav>
                        </b-col>
                    </b-row>
                    <b-card-body class="pt-0">
                        <table class="table table-hover">
                            <tbody>
                            <tr>
                                <th>S.N.</th>
                                <th>Order Code</th>
                                <th>Orderer Name</th>
                                <th>Orderer Phone</th>
                                <th>Ordered At</th>
                                <th>Ship Date</th>
                                <th>Actions</th>
                            </tr>
                            <tr v-for="(order, index) in orders.data" :key="order.id">
                                <td>{{index+1}}</td>
                                <td>{{order.order_code}}</td>
                                <td>
                                <span v-for="customer in  order.get_customer_detail" :key="customer.id">
                                  <i>{{customer.name}}</i> 
                                </span>
                                </td>
                                <td>
                                <span v-for="customer in  order.get_customer_detail" :key="customer.id">
                                  <i>{{customer.primary_phone}}</i> 
                                </span>
                                </td>
                                <td>{{order.order_date | myDate}}</td>
                                <td>{{order.ship_date | myDate}}</td>
                                <td>
                                    <router-link :to="'/backend/admin/order-detail/' + order.id" class="btn btn-sm btn-primary">
                                        <span class="d-none d-md-block">View Details</span>
                                        <span class="d-md-none"><i class="fas fa-plus"></i></span>
                                    </router-link>
                                    <!-- <a href="#" @click="editModal(customer)" class="btn btn-sm btn-success">Edit
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <a href="#" @click="deleteCustomer(customer.id)" class="btn btn-sm btn-danger">Delete
                                        <i class="fa fa-trash"></i>
                                    </a> -->
                                </td>
                            </tr>
                            </tbody>
                        </table>
                        <b-row v-if="orders.data">
                            <b-col>
                                <span>Showing {{orders.data.length}} of {{this.totalorder}} Orders.</span>
                            </b-col>
                            <b-col class="justify-content-end">
                                <pagination :data="orders" @pagination-change-page="getResults"></pagination>
                            </b-col>
                        </b-row>
                    </b-card-body>
                </card>
            </b-col>
        </b-row>
        <div v-if="!$gate.isDevOrAdmin()">
            <not-found></not-found>
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
                totalorder:0,
                orders: {},
                form: new Form({
                    id:'',
                    name :'',
                    email:''
                })
            }
        },
        methods: {
            /*===== Start of pagination function =====*/
            getResults(page = 1) {
                axios.get('../../api/order?page=' + page)
                    .then(response => {
                        this.orders = response.data;
                    });
            },

            /*==== Start of Show existing User function ====*/
            loadOrders(){
                if (this.$gate.isDevOrAdmin()){
                    axios.get("../../api/order").then(({ data }) => (this.orders = data, this.totalorder = data.total));
                }
            }
            /*==== End of existing User ====*/

        },
        created() {
            Fire.$on('searching',()=>{
                let query =this.$parent.search; //take information from root
                axios.get('../../api/findOrder?q='+ query)
                    .then((data)=>{
                        this.orders = data.data
                    }).catch(()=>{

                })
            })

            this.loadOrders(); //load the user in the table

            //Load the userlist if add or created a new user
            Fire.$on("AfterCreate",()=>{
                this.loadOrders();
            })


            //setInterval(() => this.loadAdmins(),3000);
        }
    }
</script>
