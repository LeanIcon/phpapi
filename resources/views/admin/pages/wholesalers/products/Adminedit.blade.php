<div class="row" id="selectedDrugCat">
    <div class="col-md-6">
                                <label for="LeadEmail">Drug Class</label>
                                <select name="drug_class_id" class="form-control custom-select" id="status-select">
                                    <option selected="">Select</option>
                                    @if (!is_null($drugClass))
                                        @foreach ($drugClass as $drug)
                                        <option value="{{$drug->id}}">{{$drug->name}}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                            <div class="col-md-6">
                        <div class="form-group">
                        @if (!is_null($product))
                            <label for="LeadEmail">Strength</label>
                            <input type="text" class="form-control" id="LeadName" required="" name="strength" value="{{$product->strength}}">

                        @endif 
                        </div>
                </div>

               
                <div class="col-md-6">
                    <div class="form-group">
                                <label for="status-select" class="mr-2">Dosage Form</label>
                                <select name="dosage_id" class="form-control custom-select">
                                    <option selected="">Select</option>
                                @if (!is_null($dosageForm))
                                    @foreach ($dosageForm as $dosage)
                                        <option value="{{$dosage->id}}">{{$dosage->name}}</option>
                                    @endforeach
                                @endif
                                </select>
                            </div>
                    </div>
                        </div>

    

                        </div>

</div>