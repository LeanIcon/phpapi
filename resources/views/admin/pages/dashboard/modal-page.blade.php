<!--  Modal content for the above example -->
<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0" id="myLargeModalLabel">Add New Lead</h5>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="LeadName">Name</label>
                                <input type="text" class="form-control" id="LeadName" required="">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="LeadEmail">Email</label>
                                <input type="email" class="form-control" id="LeadEmail" required="">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="PhoneNo">Phone No</label>
                                <input type="text" class="form-control" id="PhoneNo" required="">
                            </div>
                        </div>
                            
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="status-select" class="mr-2">Country</label>
                                <select class="custom-select" id="status-select">
                                    <option selected="">Select</option>
                                    <option value="1">India</option>
                                    <option value="2">USA</option>
                                    <option value="3">Japan</option>
                                    <option value="4">China</option>
                                    <option value="5">Germany</option>
                                </select>
                            </div>
                        </div>                                     
                    </div> 
                    <button type="button" class="btn btn-sm btn-primary">Save</button>  
                    <button type="button" class="btn btn-sm btn-danger">Delete</button>             
                </form>  
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal --> 