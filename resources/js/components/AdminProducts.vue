<template>
  <div>
      <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div>
                    <a href="javascript:void(0);" @click="loadUser" class="btn btn-success mb-2"><i class="fa fa-plus-square"></i> Add Product</a>
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
                                <th>Product Name</th>
                                <th>Product Description</th>
                                <th>Manufacturer</th>
                                <th>Wallet Balance</th>
                                <th>Packet Size</th>
                                <th style="width: 120px;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customercheck3">
                                        <label class="custom-control-label" for="customercheck3">&nbsp;</label>
                                    </div>
                                </td>
                                
                                <td>Carrie Thompson</td>
                                <td>CarrieThompson@rhyta.com</td>
                                <td>734-819-9286</td>
                                
                                <td>
                                    $ 2653
                                </td>
                                <td>
                                    04 Apr, 2020
                                </td>
                               <td>
                                    <a href="javascript:void(0);" class="mr-3 text-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"><i class="fa fa-edit font-size-18"></i></a>
                                    <a href="javascript:void(0);" class="text-danger" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"><i class="fa fa-trash font-size-18"></i></a>
                                </td>
                            </tr>
            

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
     <modal name="retailer-modal">
        <div class="card">
            <div class="card-header">
                Retailer
            </div>
            <div class="card-body">
               <form action="" class="form" >
                   <div class="row">
                       <div class="col-lg-6 p-1">
                           <label for="">First Name</label>
                           <input type="text" class="form-control" >
                       </div>
                       <div class="col-lg-6 p-1">
                            <label for="">Last Name</label>
                           <input type="text" class="form-control" >
                       </div>
                   </div>
                   <div class="row">
                       <div class="col-lg-6 p-1">
                            <label for="">Location Name</label>
                           <input type="text" class="form-control" >
                       </div>
                       <div class="col-lg-6 p-1">
                            <label for="">Position Name</label>
                           <input type="text" class="form-control" >
                       </div>
                   </div>
               </form>
               <button class="btn btn-primary" >SAVE</button>
            </div>
        </div>
    </modal>
  </div>
</template>

<script>
export default {

    data () {
        return {
            products: {},
            manufacturers: {}
        }
    },
    methods: {
        loadUser() {
            this.$modal.show('retailer-modal');
        },
        show () {
            this.$modal.show('retailer-modal');
        },
        hide () {
            this.$modal.hide('retailer-modal');
        },
        loadProduct() {
            axios.get('admin_products')
            .then((response) => console.log(response))
            .catch((error) => console.log(error))
        },
        loadManufacturers() {
            axios.get('manufacturers')
            .then((response) => console.log(response))
            .catch((error) => console.log(error))
        }
    },
    mounted() {
        this.loadProduct();
        this.loadManufacturers();
    },

}
</script>

<style>

</style>