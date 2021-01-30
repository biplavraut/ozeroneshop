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
                                <h6 class="text-light text-uppercase ls-1 mb-1">Product Detail</h6>
                                <h5 class="h3 text-black mb-0">{{cform.title}}</h5>
                            </b-col>
                            <b-col cols="4" class="text-right">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
                                </button>                            
                            </b-col>
                        </b-row>
                        <b-form @submit.prevent="updateProduct()">
                            <b-card-body class="pt-0">                            
                                <div class="form-group">
                                    <div class="input-group mb-2 mr-sm-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">Model</div>
                                        </div>
                                        <input v-model="cform.model" type="text" name="model"
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
                                        :taggable="true"></multiselect>
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
                            <h3 class="mb-0">Storage &amp; RAM </h3>
                        </b-col>
                        <b-col cols="4" class="text-right">
                            <a v-on:click="newStorage" class="btn btn-sm btn-primary"><i class="fas fa-hdd"></i> Create</a>
                        </b-col>
                    </b-row>
                    <b-card-body class="pt-0">
                        <b-row align-v="center">
                            <b-col cols="6" v-for="storage in get_storages" :key="storage.id">
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
                            <div class="form-group">
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">Image</div>
                                    </div>
                                    <input type="file" name="image" ref="colorimage" @change="imageValidate"
                                        placeholder="Image"
                                        class="btn btn-sm btn-info" :class="{ 'is-invalid': ciform.errors.has('image') }">
                                    <has-error :form="ciform" field="image"></has-error>
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
                product_slug: this.$route.params.slug,
                ram: [
                    { text: '1 GB', value: '1 GB' },
                    { text: '2 GB', value: '2 GB' },
                    { text: '3 GB', value: '3 GB' },
                    { text: '4 GB', value: '4 GB' },
                    { text: '6 GB', value: '6 GB' },
                    { text: '8 GB', value: '8 GB' },
                    { text: '12 GB', value: '12 GB' },
                    { text: '16 GB', value: '16 GB' },
                    { text: '32 GB', value: '32 GB' },
                    { text: '64 GB', value: '64 GB' }
                ],
                storages: [
                    { text: '4 GB', value: '4 GB' },
                    { text: '8 GB', value: '8 GB' },
                    { text: '16 GB', value: '16 GB' },
                    { text: '32 GB', value: '32 GB' },
                    { text: '64 GB', value: '64 GB' },
                    { text: '128 GB', value: '128 GB' },
                    { text: '256 GB', value: '256 GB' },
                    { text: '512 GB', value: '512 GB' },
                    { text: '1 TB', value: '1 TB' },
                    { text: '2 TB', value: '2 TB' },
                ],
                get_storages:[],
                get_colors:[],
                get_images:[],
                get_details:[],
                brands: [],
                sub_brands: [],
                shopsections:[],
                electronics:[],
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
                cform: new Form({
                    id:'',
                    title :'',
                    slug :'',
                    sku :'',
                    model:'',
                    display:'',
                    featured:'',
                    order_item:'',
                    price:'',
                    discount:'',
                    total_quantity:'',
                    brand:'',
                    sub_brand:'',
                    shop_category:'',
                    change_shop_category: '0',
                    screen_detail:'',
                    operating_system:'',
                    main_camera:'',
                    selfie_camera:'',
                    sensor:'',
                    battery:'',
                    excerpt:'',
                    meta_keywords:'',
                    meta_tags:'',
                    meta_categories:''
                })
            }
        },

        methods : {
            updateProduct(){
                //alert("I m here");
                this.$Progress.start();
                //console.log('editing data');
                this.cform.put('../../../api/product/'+this.cform.slug)
                    .then((data) =>{
                        this.serverResponse(data.data);
                        
                    }).catch(()=>{
                    swal.fire(
                            'Error!',
                            'OOPS! Something Went Wrong.',
                            'error'
                        )
                    this.$Progress.fail();
                });
            },            
            // Checking if brand has Sub brands //
            checkSubBrand(){
                this.cform.subbrand = '';
                this.sub_brands = this.cform.brand.children;
            },
            checkChanges(){
                this.cform.change_shop_category = 1;
            },
            // Add, Edit or Delete Storage, Ram with Price 
            newStorage(){
                this.editstorage = false;
                this.sform.reset();
                $('#forStorage').modal('show');
            },
            createStorage(){
                this.sform.product_id = this.cform.id,
                this.$Progress.start(); //start a progress bar
                this.sform.post('../../../api/product_storage') // POST form data
                //Start Condition to check form is validate
                .then(({data})=>{
                    $("#forStorage").modal('hide'); //Hide the model
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
            editStorage(item){
                this.editstorage = true;
                this.sform.reset();
                $('#forStorage').modal('show');
                this.sform.fill(item);
            },
            updateStorage(){
                this.$Progress.start();
                //console.log('editing data');
                this.sform.put('../../../api/product_storage/'+this.sform.id)
                    .then((data) =>{
                        this.sform.reset();
                        $("#forStorage").modal('hide'); //Hide the model
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
            deleteStorage(id){
                swal.fire({
                    title: 'Are you sure?',
                    text: "Delete this option will remove this option.",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    //send an ajax request to the server
                    if (result.value) {
                        this.sform.delete('../../../api/product_storage/' + id).then(({data}) => {
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
            // End of Add, Edit or Delete Storage, Ram with Price

            // Add, Edit or Delete Color Image 
            // Validate Image
            imageValidate(e) {
                //console.log('Uploading');
                let file = e.target.files[0];
                //console.log(file);
                let reader = new FileReader();
                if (file['size'] < 2111775) {
                    reader.onloadend = (file) => {
                        //console.log('RESULT', reader.result)
                        this.ciform.image = reader.result;
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
            newColor(){
                this.editcolor = false;
                this.ciform.reset();
                $('#forColor').modal('show');
            },
            createColor(){
                this.ciform.product_id = this.cform.id,
                this.$Progress.start(); //start a progress bar
                this.ciform.post('../../../api/product_color') // POST form data
                //Start Condition to check form is validate
                .then(({data})=>{
                    $("#forColor").modal('hide'); //Hide the model
                    this.$refs["colorimage"].value = "";
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
            editColor(item){
                this.editcolor = true;
                this.ciform.reset();
                $('#forColor').modal('show');
                this.ciform.fill(item);
            },
            updateColor(){
                this.$Progress.start();
                //console.log('editing data');
                this.ciform.put('../../../api/product_color/'+this.ciform.id)
                    .then((data) =>{
                        this.ciform.reset();
                        this.$refs["colorimage"].value = "";
                        $("#forColor").modal('hide'); //Hide the model
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
            deleteColor(id){
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
                        this.ciform.delete('../../../api/product_color/' + id).then(({data}) => {
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
            // End of Add, Edit or Delete Color Image
            // Add, Edit or Delete Images
            newImage(){
                this.iform.reset();
                $('#addNewImage').modal('show');
            },
            uploadImage(e) {
                let file = e.target.files[0];
                let reader = new FileReader();
                if (file['size'] < 2111775) {
                    reader.onloadend = (file) => {
                        this.iform.image = reader.result;
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
            addImage(){
                this.$Progress.start(); //start a progress bar
                this.iform.product_id = this.cform.id,
                this.iform.post('../../../api/product_image') // POST form data
                    .then((data)=>{
                        Fire.$emit('AfterCreate'); //custom event to reload data
                        $("#addNewImage").modal('hide'); //Hide the model
                        this.$refs["image"].value = "";
                        this.serverResponse(data.data);
                    })
                    .catch(()=>{
                        swal.fire(
                            'Error!',
                            'Something Went Wrong.',
                            'warning'
                        )
                        this.$Progress.fail(); //End the progress bar
                    })

            },
            displayImage(item){
                this.$Progress.start();
                this.iform.fill(item);
                //console.log('editing data');
                this.iform.put('../../../api/product_image/'+this.iform.id)
                    .then((data) =>{
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
            deleteImage(id){
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
                        this.iform.delete('../../../api/product_image/' + id).then(({data}) => {
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
            // End of Add, Edit or Delete Image

            // Add, Edit or Delete Detail
            newDetail(){
                this.editdetail = false;
                this.dform.reset();
                $('#addNewDetail').modal('show');
            },
            createDetail(){
                this.$Progress.start(); //start a progress bar
                this.dform.product_id = this.cform.id,
                this.dform.post('../../../api/product_detail') // POST form data
                    .then((data)=>{
                        Fire.$emit('AfterCreate'); //custom event to reload data

                        $("#addNewDetail").modal('hide'); //Hide the model
                        this.serverResponse(data.data);
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
            editDetail(details){
                this.editdetail = true;
                this.dform.reset();
                $('#addNewDetail').modal('show');
                this.dform.fill(details);
            },
            updateDetail(){
                this.$Progress.start();
                //console.log('editing data');
                this.dform.put('../../../api/product_detail/'+this.dform.id)
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
            deleteDetail(id){
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
                        this.dform.delete('../../../api/product_detail/' + id).then((data) => {
                            swal.fire(
                                'Deleted!',
                                'Product Detail has been deleted.',
                                'success'
                            )
                            Fire.$emit('AfterCreate'); //Fire an reload event
                        }).catch(() => {
                            swal.fire(
                            'Error!',
                            'Something Went Wrong.',
                            'error'
                            )
                        this.$Progress.fail();
                        });
                    }

                })
            },
            // End of Add, Edit or Delete Image
            loadProduct(){
                this.$Progress.start();
                if (this.$gate.isAuthorized()){
                    axios.get("../../../api/product?slug="+this.product_slug).then(({ data }) => (
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
                    axios.get("../../../api/brand").then(({ data }) => (this.brands = data));
                    axios.get("../../../api/shopsection").then(({ data }) => (this.shopsections = data));
                    axios.get("../../../api/electronics").then(({ data }) => (this.electronics = data));
                    axios.get("../../../api/product?slug="+this.product_slug).then(({ data }) => (
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
                // swal.close();
            }
        },
        created() {
            Fire.$on('searching',()=>{
                let query =this.$parent.search; //take information from root
                axios.get('../api/findDetail?q='+ query)
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
