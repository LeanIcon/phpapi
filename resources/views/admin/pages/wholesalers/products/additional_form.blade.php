<div class="row" id="selectedDrugCat">
    <div class="col-md-6">
        <div class="form-group">
            <label for="LeadEmail">Dosage Form</label>
            <select name="dosage_form_id" class="form-control custom-select" id="status-select">
                <!--<option selected="">Select</option> -->

                @if (!is_null($dosageForm))
                                    @foreach ($dosageForm as $dos)
                                    <option value="{{$dos->id}}" @if($dos->id == $product->dosage_form_id) {{ 'selected' }}
                                            
                                            @endif >{{$dos->name}}</option>
                                    
                                    @endforeach
                                @endif

                
            </select>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="status-select" class="mr-2">Drug Class</label>
            <select name="drug_class_id" class="form-control custom-select" id="status-select">
                <option selected="">Select</option>
            @if (!is_null($drugClass))
                @foreach ($drugClass as $drug)
                    <option value="{{$drug->id}}">{{$drug->name}}</option>
                @endforeach
            @endif
            </select>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="form-group">
            <label for="LeadName">Drug Strength</label>
            <input type="text" name="strength" class="form-control" id="LeadName">
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="PhoneNo">Packet Size</label>
            <input type="text" name="packet_size" class="form-control" id="price">
        </div>
    </div>
</div>


  <!--  <div class="col-md-6">
        <div class="form-group">
            <label for="PhoneNo">Packet Size</label>
            <input type="text" name="packet_size" class="form-control" id="price">
        </div>
    </div> -->

<div class="row" id="selectedEquipCat">
    <div class="col-md-6">
        <div class="form-group">
            <label for="model">Machine / Equipment Model</label>
            <input class="form-control" type="text" name="model" id="model">
        </div>
    </div>
</div>








