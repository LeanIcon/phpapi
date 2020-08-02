<template>
  <div>
      <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div>
                    <a href="javascript:void(0);" @click="loadUser" class="btn btn-success mb-2"><i class="fa fa-plus-square"></i> Add Retailer</a>
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
                                <th>Customer</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Wallet Balance</th>
                                <th>Joining Date</th>
                                <th style="width: 120px;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customercheck1">
                                        <label class="custom-control-label" for="customercheck1">&nbsp;</label>
                                    </div>
                                </td>

                                <td>Carolyn Harvey</td>
                                <td>CarolynHarvey@rhyta.com</td>
                                <td>580-464-4694</td>

                                <td>
                                    $ 3245
                                </td>
                                <td>
                                    06 Apr, 2020
                                </td>
                                <td>
                                    <a href="javascript:void(0);" class="mr-3 text-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"><i class="mdi mdi-pencil font-size-18"></i></a>
                                    <a href="javascript:void(0);" class="text-danger" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"><i class="mdi mdi-trash-can font-size-18"></i></a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customercheck2">
                                        <label class="custom-control-label" for="customercheck2">&nbsp;</label>
                                    </div>
                                </td>
                                
                                <td>Angelyn Hardin</td>
                                <td>AngelynHardin@dayrep.com</td>
                                <td>913-248-2690</td>
                                
                                <td>
                                    $ 2435
                                </td>
                                <td>
                                    05 Apr, 2020
                                </td>
                                <td>
                                    <a href="javascript:void(0);" class="mr-3 text-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"><i class="mdi mdi-pencil font-size-18"></i></a>
                                    <a href="javascript:void(0);" class="text-danger" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"><i class="mdi mdi-trash-can font-size-18"></i></a>
                                </td>
                            </tr>
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
                                    <a href="javascript:void(0);" class="mr-3 text-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"><i class="mdi mdi-pencil font-size-18"></i></a>
                                    <a href="javascript:void(0);" class="text-danger" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"><i class="mdi mdi-trash-can font-size-18"></i></a>
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

    methods: {
        loadUser() {
            this.$modal.show('retailer-modal');
        },
        show () {
            this.$modal.show('retailer-modal');
        },
        hide () {
            this.$modal.hide('retailer-modal');
        }
    }

}
</script>

<style>

</style>