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
                                <div class="form-group">
                                    <div class="input-group mb-2 mr-sm-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">Model</div>
                                        </div>
                                        <input v-model="oform.model" type="text" name="model"
                                            placeholder="Product Model."
                                            class="form-control">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="input-group mb-2 mr-sm-2">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">
                                                        <input v-model="cform.display" :checked="cform.display == 1" type="checkbox" name="display">
                                                    </div>
                                                </div>
                                                <input type="text" value="Display" class="form-control" disabled>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="input-group mb-2 mr-sm-2">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">
                                                        <input v-model="cform.featured" :checked="cform.featured == 1" type="checkbox" name="featured">
                                                    </div>
                                                </div>
                                                <input type="text" value="Featured" class="form-control" disabled>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="input-group mb-2 mr-sm-2">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">Price</div>
                                                </div>
                                                <input v-model="cform.price" type="number" name="price"
                                                    placeholder="Product Price."
                                                    class="form-control">
                                            </div>
                                        </div>                            
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="input-group mb-2 mr-sm-2">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">% Discount</div>
                                                </div>
                                                <input v-model="cform.discount" type="number" name="discount"
                                                    placeholder="Discount"
                                                    class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="input-group mb-2 mr-sm-2">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">Total Quantity</div>
                                                </div>
                                                <input v-model="cform.total_quantity" type="number" name="total_quantity"
                                                    placeholder="Total Quantity"
                                                    class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <b>BRAND</b>
                                <div class="row">
                                    <div class="col-md-6">
                                        <multiselect v-model="cform.brand"
                                        tag-placeholder="Brand"
                                        placeholder="Select Brand"
                                        label="title"
                                        track-by="id"
                                        :options="brands"
                                        :multiple="false"
                                        :taggable="true" @input="checkSubBrand()"></multiselect>
                                    </div>
                                    <div class="col-md-6">
                                        <multiselect v-model="cform.sub_brand"
                                        tag-placeholder="Sub Brand"
                                        placeholder="Select Sub Brand"
                                        label="title"
                                        track-by="id"
                                        :options="sub_brands"
                                        :multiple="false"
                                        :taggable="true" @input="setSubBrandId()"></multiselect>
                                    </div>                                        
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-12">
                                        <b>SHOP SECTIONS</b>
                                        <multiselect v-model="cform.shop_category"
                                            tag-placeholder="Shop Categories"
                                            placeholder="Search &amp; select multiple categories"
                                            label="title"
                                            track-by="id"
                                            :options="electronics"
                                            :multiple="true"
                                            :hide-selected="true"
                                            :searchable="true"
                                            :preserve-search="true"
                                            :taggable="true" @input="checkChanges()"></multiselect>
                                        
                                        <!-- <div v-for="shopsection in shopsections" :key="shopsection.id">
                                            <b-form-group :label="shopsection.title">
                                                <b-form-checkbox
                                                    v-for="option in shopsection.get_electronics_relation"
                                                    :key="option.id"
                                                    v-model="cform.shop_category"
                                                    :value="option.slug"
                                                    name="categories"
                                                    inline
                                                >  {{ option.title }}</b-form-checkbox>
                                            </b-form-group>  
                                        </div>   -->
                                    </div>
                                </div>
                                <hr>
                                <!-- <b>SPECS</b>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="input-group mb-2 mr-sm-2">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">Screen Detail</div>
                                                </div>
                                                <input v-model="cform.screen_detail" type="text" name="screen_detail"
                                                    placeholder="Type-Size-Resolution-Protection"
                                                    class="form-control">
                                            </div>
                                        </div>                            
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="input-group mb-2 mr-sm-2">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">Operating System</div>
                                                </div>
                                                <input v-model="cform.operating_system" type="text" name="operating_system"
                                                    placeholder="ios, Android"
                                                    class="form-control">
                                            </div>
                                        </div>                            
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="input-group mb-2 mr-sm-2">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">Main Camera</div>
                                                </div>
                                                <input v-model="cform.main_camera" type="text" name="main_camera"
                                                    placeholder="Modules-Features-Video"
                                                    class="form-control">
                                            </div>
                                        </div>                            
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="input-group mb-2 mr-sm-2">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">Selfie Camera</div>
                                                </div>
                                                <input v-model="cform.selfie_camera" type="text" name="selfie_camera"
                                                    placeholder="Modules-Features-Video"
                                                    class="form-control">
                                            </div>
                                        </div>                            
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="input-group mb-2 mr-sm-2">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">Sensors</div>
                                                </div>
                                                <input v-model="cform.sensor" type="text" name="sensor"
                                                    placeholder="Finger Print-Face Recognition"
                                                    class="form-control">
                                            </div>
                                        </div>                            
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="input-group mb-2 mr-sm-2">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">Battery</div>
                                                </div>
                                                <input v-model="cform.battery" type="text" name="battery"
                                                    placeholder="Type-Charging-Stand By-Talk Time"
                                                    class="form-control">
                                            </div>
                                        </div>                            
                                    </div>
                                </div> -->
                                <div class="form-group"> 
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">Description</div>
                                    </div>
                                    <vue-editor v-model="cform.excerpt" placeholder="Long Description about the product."></vue-editor>
                                </div>

                                <b>SEARCH ENGINE DATA</b>
                                <div class="form-group">
                                    <div class="input-group mb-2 mr-sm-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">Meta Keywords</div>
                                        </div>
                                        <input v-model="cform.meta_keywords" type="text" name="meta_keywords"
                                            placeholder="Keywords: Electronics, Brand, Model, Features..,"
                                            class="form-control">
                                    </div>

                                </div>
                                <div class="form-group">
                                    <div class="input-group mb-2 mr-sm-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">Meta Tags</div>
                                        </div>
                                        <input v-model="cform.meta_tags" type="text" name="meta_tags"
                                            placeholder="Tags: Brand, Company, Electronics..,"
                                            class="form-control">
                                    </div>

                                </div>
                                <div class="form-group">
                                    <div class="input-group mb-2 mr-sm-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">Meta Categories</div>
                                        </div>
                                        <input v-model="cform.meta_categories" type="text" name="meta_categories"
                                            placeholder="Categories: Smart Phone, TV..,"
                                            class="form-control">
                                    </div>
                                </div>
                            </b-card-body>
                            <b-card-foot>
                                <button class="btn btn-danger">Cancel</button>
                                <button class="btn btn-success float-right" type="submit">Update</button>
                            </b-card-foot>                        
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
                            <b-col cols="6" v-for="customer in get_customer_detail" :key="customer.id">
                                <card type="light" class="mb-2 mb-xl-2">
                                        <div class="text-center small">
                                            <span>
                                                Storage: {{storage.storage}} <br> 
                                                RAM: {{storage.ram}} <br>
                                                Quantity: {{storage.quantity}} <br>
                                            </span>
                                            <span>
                                                <a href="#" @click="editStorage(storage)" class="text-success float-left" title="Edit Option"><i class="fas fa-edit success"></i></a>
                                                <span class="text-muted">NPR {{storage.price}}</span>
                                                <a href="#" @click="deleteStorage(storage.id)" class="text-danger float-right" title="Remove Option"><i class="fas fa-trash"></i></a>
                                            </span>
                                        </div>
                                </card>
                            </b-col>
                        </b-row>
                    </b-card-body>
                </card>
                <card type="secondary" class="mb-5 mb-xl-5" header-classes="bg-transparent">
                    <b-row align-v="center" slot="header" >
                        <b-col cols="8">
                            <h3 class="mb-0">Color Option </h3>
                        </b-col>
                        <b-col cols="4" class="text-right">
                            <a v-on:click="newColor" class="btn btn-sm btn-primary"><i class="fas fa-hdd"></i> Create</a>
                        </b-col>
                    </b-row>
                    <b-card-body class="pt-0">
                        <b-row align-v="center">
                            <b-col cols="6" v-for="color in get_colors" :key="color.id">
                                <card type="secondary" class="mb-2 mb-xl-2">
                                    <img class="card-img-top img-fluid" :src="'/img/product/'+$route.params.slug+'/thumbs/'+color.image" :alt="color.image">
                                    
                                    <span class="ml-2 mr-2 small">
                                        <a @click="editColor(color)" title="Edit" class="text-success"><i class="fas fa-edit success"></i></a>
                                        <i>{{color.color}}</i>
                                        <i>,{{color.quantity}} Items</i>
                                        <a @click="deleteColor(color.id)" title="Delete" class="text-danger float-right"><i class="fas fa-trash"></i></a>                                            
                                    </span>
                                </card>
                            </b-col>
                        </b-row>
                    </b-card-body>
                </card>
                <card type="secondary" class="mb-5 mb-xl-5" header-classes="bg-transparent">
                    <b-row align-v="center" slot="header" >
                        <b-col cols="8">
                            <h3 class="mb-0">Images </h3>
                        </b-col>
                        <b-col cols="4" class="text-right">
                            <a v-on:click="newImage" class="btn btn-sm btn-primary"><i class="fas fa-images fa-fw"></i> Add Image</a>
                        </b-col>
                    </b-row>
                    <b-card-body class="pt-0">
                        <b-row align-v="center">
                            <b-col cols="6" v-for="image in get_images" :key="image.id">
                                <card type="secondary" class="mb-2 mb-xl-2">
                                    <img class="card-img-top img-fluid" :src="'/img/product/'+$route.params.slug+'/thumbs/'+image.image" :alt="image.image">
                                    <div class="text-center small">
                                        <i>{{image.image}}</i>
                                        <i>,{{image.primary}}</i>
                                    </div>
                                    <span class="ml-2 mr-2 small">
                                        <a v-if="image.primary == 0" @click="displayImage(image)" title="Make Dispaly" class="text-success"><i class="fas fa-eye success"></i></a>
                                        &nbsp;
                                        <a v-if="image.primary == 0" @click="deleteImage(image.id)" title="Delete" class="text-danger float-right"><i class="fas fa-trash"></i></a>
                                        <i v-else class="small">Display Image</i>                                            
                                    </span>
                                </card>
                            </b-col>
                        </b-row>
                    </b-card-body>
                </card> 
                <card type="secondary" class="mb-5 mb-xl-5" header-classes="bg-transparent">
                    <b-row align-v="center" slot="header" >
                        <b-col cols="8">
                            <h3 class="mb-0">Additional Specs </h3>
                        </b-col>
                        <b-col cols="4" class="text-right">
                            <a v-on:click="newDetail" class="btn btn-sm btn-primary"><i class="fas fa-plus fa-fw"></i> Create</a>
                        </b-col>
                    </b-row>
                    <b-card-body class="pt-0">
                        <b-row align-v="center">
                            <b-col cols="6" v-for="detail in get_details" :key="detail.id">
                                 <card class="mb-2 mb-xl-2">
                                     <b-row align-v="center" slot="header" >
                                        <b-col>
                                            <h3 class="mb-0">{{detail.title }}</h3>
                                        </b-col>
                                        <b-col class="text-right">
                                            <button type="button" @click="editDetail(detail)" class="btn btn-sm btn-tool">
                                                <i class="fas fa-edit green"></i>
                                            </button>
                                            <button type="button" @click="deleteDetail(detail.id)" class="btn btn-sm btn-tool">
                                                <i class="fas fa-trash red"></i>
                                            </button>
                                        </b-col>
                                    </b-row>
                                    <b-card-text v-html="detail.excerpt.substring(0,50)+'...'"></b-card-text>
                                </card>
                            </b-col>
                        </b-row>
                    </b-card-body>
                </card>
            </b-col>
        </b-row>

        <!--========== MODELS START ==========-->
        <!-- ADD EDIT Storage, RAM and Price Model -->
        <div class="modal fade" id="forStorage" tabindex="-1" role="dialog" aria-labelledby="forStorageLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" v-show="!editstorage" id="forStorageLabel">Add New Detail</h5>
                        <h5 class="modal-title" v-show="editstorage" id="forStorageLabel">Update Detail</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form  @submit.prevent="editstorage ? updateStorage() : createStorage()">
                        <div class="modal-body">                            
                            <b-form-group label="RAM">
                                <b-form-radio-group
                                    v-model="sform.ram"
                                    :options="ram"
                                    name="ram"
                                ></b-form-radio-group>
                            </b-form-group>
                            <b-form-group label="Storages">
                                <b-form-radio-group
                                    v-model="sform.storage"
                                    :options="storages"
                                    name="storages"
                                ></b-form-radio-group>
                            </b-form-group>
                            <div class="form-group">
                                <div class="input-group mb-2 mr-sm-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">Quantity</div>
                                    </div>
                                    <input min="0" v-model="sform.quantity" type="number" name="quantity"
                                        placeholder="Available Quantity"
                                        class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group mb-2 mr-sm-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">Price</div>
                                    </div>
                                    <input v-model="sform.price" type="text" name="price"
                                        placeholder="Product Price"
                                        class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-times fa-fw"></i>Close</button>
                            <button v-show="editstorage" type="submit" class="btn btn-success"><i class="fas fa-plus fa-fw"></i>Update Option</button>
                            <button v-show="!editstorage" type="submit" class="btn btn-primary"><i class="fas fa-plus fa-fw"></i>Create Option</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- / End of ADD EDIT Storage, RAM and Price Model -->

        <!-- ADD EDIT Color with Image Model -->
        <div class="modal fade" id="forColor" tabindex="-1" role="dialog" aria-labelledby="forColorLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" v-show="!editcolor" id="forColorLabel">Add New Color Image</h5>
                        <h5 class="modal-title" v-show="editcolor" id="forColorLabel">Update Color Image</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form  @submit.prevent="editcolor ? updateColor() : createColor()">
                        <div class="modal-body">                            
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">Color Title</div>
                                    </div>
                                        <input type="text" v-model="ciform.color" class="form-control">
                                    <div class="input-group-append">
                                        <input type="hidden" v-model="ciform.hex" value='' id="inputcolorhex">
                                        <span class="input-group-text" onclick="colorName()"><verte v-model="ciform.hex" picker="square" model="hex"></verte></span>
                                    </div>
                                </div>
                                <p><small>Hint: <i id="inputcolorname"></i> </small></p>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="input-group mb-2">
                                            <!-- <div class="input-group-prepend">
                                                <div class="input-group-text">Image</div>
                                            </div> -->
                                            <input type="file" name="image" ref="colorimage" @change="imageValidate"
                                                placeholder="Image"
                                                class="btn btn-sm btn-info" :class="{ 'is-invalid': ciform.errors.has('image') }">
                                            <has-error :form="ciform" field="image"></has-error>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <img v-show="editcolor" class="img-fluid" :src="'/img/product/'+$route.params.slug+'/thumbs/'+ciform.image" alt="">
                                    <img v-show="!editcolor" class="img-fluid" :src="ciform.image" alt="">
                                </div>
                            </div>                          
                            
                            <div class="form-group">
                                <div class="input-group mb-2 mr-sm-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">Quantity</div>
                                    </div>
                                    <input v-model="ciform.quantity" min="0" type="number" name="quantity"
                                        placeholder="Available Quantity"
                                        class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-times fa-fw"></i>Close</button>
                            <button v-show="editcolor" type="submit" class="btn btn-success"><i class="fas fa-plus fa-fw"></i>Update Color Image</button>
                            <button v-show="!editcolor" type="submit" class="btn btn-primary"><i class="fas fa-plus fa-fw"></i>Create Color Image</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- / End of ADD EDIT Color with Image Model -->
         <!-- Modal Image -->
        <div class="modal fade" id="addNewImage" tabindex="-1" role="dialog" aria-labelledby="addNewImageLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addNewImageLabel">Add New Image</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form  @submit.prevent="addImage()">
                        <div class="modal-body">
                            <div class="form-group">
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">Image</div>
                                    </div>
                                    <input type="file" name="image" ref="image" @change="uploadImage"
                                           placeholder="Image"
                                           class="btn btn-sm btn-info" :class="{ 'is-invalid': iform.errors.has('image') }">
                                    <has-error :form="iform" field="image"></has-error>
                                </div>
                            </div>
                            
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-times fa-fw"></i>Close</button>
                            <button v-show="editimage" type="submit" class="btn btn-success"><i class="fas fa-plus fa-fw"></i>Update</button>
                            <button v-show="!editimage" type="submit" class="btn btn-primary"><i class="fas fa-plus fa-fw"></i>Upload</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!--End of modal image-->

        <!--========== /MODELS ENDS ========== -->
        <!-- Modal -->
        <div class="modal fade" id="addNewDetail" tabindex="-1" role="dialog" aria-labelledby="addNewDetailLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" v-show="!editmode" id="addNewDetailLabel">Add New Detail</h5>
                        <h5 class="modal-title" v-show="editmode" id="addNewDetailLabel">Update Detail</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form  @submit.prevent="editdetail ? updateDetail() : createDetail()">
                        <div class="modal-body">
                            <div class="form-group">
                                <div class="input-group mb-2 mr-sm-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">Title</div>
                                    </div>
                                    <input v-model="dform.title" type="text" name="title"
                                           placeholder="Detail Title."
                                           class="form-control" :class="{ 'is-invalid': dform.errors.has('title') }">
                                    <has-error :form="dform" field="title"></has-error>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group mb-2 mr-sm-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <input v-model="dform.display" type="checkbox" name="display" :class="{ 'is-invalid': dform.errors.has('display') }">
                                        </div>
                                    </div>
                                    <input type="text" value="Display" class="form-control" disabled>
                                    <has-error :form="dform" field="display"></has-error>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">Description</div>
                                </div>
                                <vue-editor v-model="dform.excerpt" placeholder="Detail Description"></vue-editor>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-times fa-fw"></i>Close</button>
                            <button v-show="editdetail" type="submit" class="btn btn-success"><i class="fas fa-plus fa-fw"></i>Update</button>
                            <button v-show="!editdetail" type="submit" class="btn btn-primary"><i class="fas fa-plus fa-fw"></i>Create</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!--End of modal-->
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
                get_order_detail:[],
                get_customer_detail:[],
                get_shipping_detail:[],
                
                editmode: false,
                editdetail: false,
                editstorage: false,
                editcolor: false,
                editimage: false,
                sform: new Form({
                    id:'',
                    storage :'',
                    ram :'',
                    product_id:'',
                    content_slug : this.$route.params.slug,
                    quantity:'',
                    price:''
                }),
                ciform: new Form({
                    id:'',
                    product_id:'',
                    color :'',
                    hex :'',
                    content_slug : this.$route.params.slug,
                    quantity:'',
                    image:''
                }),
                iform: new Form({
                    id:'',
                    product_id:'',
                    content_slug : this.$route.params.slug,
                    image:'',
                    primary:''
                }),
                dform: new Form({
                    id:'',
                    product_id:'',
                    title :'',
                    slug :'',
                    content_slug : this.$route.params.slug,
                    display:'',
                    excerpt:''
                }),
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
            
            // End of Add, Edit or Delete Image
            loadProduct(){
                this.$Progress.start();
                if (this.$gate.isAuthorized()){
                    axios.get("/api/product?slug="+this.product_slug).then(({ data }) => (
                        this.cform.fill(data),
                        this.cform.change_shop_category = 0,
                        this.cform.brand = JSON.parse(data.brand),
                        this.cform.sub_brand = JSON.parse(data.sub_brand),
                        this.cform.shop_category = JSON.parse(data.shop_category),
                        this.get_storages=data.get_storage_relation,
                        this.get_colors=data.get_color_relation,
                        this.get_images=data.get_image_relation,
                        this.get_details=data.get_detail_relation
                    ));
                    this.$Progress.finish();
                }
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
                        this.get_order_detail=data.get_order_detail, 
                        this.get_customer_detail=data.get_customer_detail,
                        this.get_shipping_detail=data.get_shipping_detail                       
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
                this.loadProduct();
            })


            //setInterval(() => this.loadUsers(),3000);
        }
    }
</script>
