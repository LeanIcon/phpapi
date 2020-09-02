<template>
<div>
        <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div>
                    <a href="javascript:void(0);" @click="procatmodal" class="btn btn-success mb-2"> Add Product Category </a>
                </div>
                <div class="table-responsive mt-3">
                    <table class="table table-centered datatable dt-responsive nowrap dataTable no-footer" style="border-collapse: collapse; border-spacing: 0; width: 100%;" id="DataTables_Table_0">
                        <thead class="thead-light">
                            <tr>
                                <th style="width: 20px;">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customercheck">
                                        <label class="custom-control-label" for="customercheck">&nbsp;</label>
                                    </div>
                                </th>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Type</th>
                               
                                <th style="width: 120px;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(productcat, index) in productcats.data" :key="index">
                                <td>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customercheck3">
                                        <label class="custom-control-label" for="customercheck3">&nbsp;</label>
                                    </div>
                                </td>

                                <td>{{ productcat.id }}</td>
                                <td>{{ productcat.name }}</td>
                                <td>{{productcat.type}}</td>
                                
                                <td>
                                    <!-- <a href="javascript:void(0);" @click="editUser(user)" class="mr-1 text-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"><i class=" ri-edit-box-line font-size-18"></i></a>
                                    <a href="javascript:void(0);" @click="viewUser(user)" class="mr-1 text-info" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"><i class="ri-eye-fill font-size-18"></i></a> -->
                                    <a href="javascript:void(0);" v-on:click="deleteprocat(productcat.id, index)" class="text-danger" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"><i class="ri-delete-bin-line font-size-18"></i></a>
                                </td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <modal name="pro-modal">
        <div class="card">
            <div class="card-header">
                Category Types
            </div>
            <div class="card-body">
               <form method = "post" name="product_category" id="product_category" action="#" enctype="multipart/form-data" @submit.prevent="addpro">
                   <div class="row">
                       <div class="col-lg-6 p-1">
                           <label for="">Name</label>
                           <input v-model="productcat.name" type="text" class="form-control" >
                       </div>
                       <div class="col-lg-6 p-1">
                           <label for=""> Type</label>
                           <input v-model="productcat.type" type="text" class="form-control">
                       </div>
                       <suglify :slugify="productcat.name" :slug.sync="productcat.slug">
                    <input slot-scope="{inputBidding}" v-bind="inputBidding"
               type="text" class="form-control" placeholder="Slug ..." hidden>
</suglify>
                   </div>    
               </form>
               <button v-on:click="addpro" class="btn btn-primary" >SAVE</button>
            </div>
        </div>
    </modal>
</div>
</template>

<script>
export default {
    data() {
            return {
                productcats: {},
                productcat: {
                name: '',
                type: '',
                status: '',
                slug: ''
                }
            }
        },
        
        methods: {

            showAlert(){
            this.$swal('Product Category added successfully');
        },

            deleteprocat(id, index) {
                axios.delete('product_category/'+id)
                    .then(resp => {
                    this.productcats.data.splice(index, 1)
                    this.$swal('Product Category deleted successfully');
                            })
                .catch(error => {
                    console.log(error);
                    })
                },


            addpro() {
                axios.post('product_category',{
                        'name': this.productcat.name,
                        'type': this.productcat.type,
                        'status':this.productcat.status,
                        'slug':this.productcat.slug
                        
                    })
                    .then((res) => {
                        console.log(res.data);
                        this.productcat.name = '';
                        this.productcat.type = '';
                        this.productcat.status = '';
                        this.productcat.slug = '';
                        this.loadregion()
                         this.$swal('Product Category added successfully');
                        loading.close()
                        $('pro-modal').modal('hide');
                        
                    })
                    .catch((err) =>{
                        console.log(err);
                    })
            },        

            procatmodal(){
                this.$modal.show('pro-modal');
            },

            async loadregion(url = 'product_category') {
            this.loading = !this.loading
            await axios.get(url)
            .then(({data}) => {
                this.productcats = data
                this.loading != this.loading
                loading.close();
                })
            .catch((error) => console.log(error))
            
            }
            
        },

        mounted() {
        this.loadregion();
    },

}

</script>

<style>
     table, input, a, label {
        font-family: 'Roboto' !important;
    }
</style>