<div class="row" id="selectedDrugCat">
    <div class="col-md-6">
        <div class="form-group">
            <label for="LeadEmail">Dosage Form</label>
            <select class="custom-select" id="status-select">
                <option selected="">Select</option>
                @if ($manufacturers->isNotEmpty())
                    @foreach ($manufacturers as $manufacturer)
                    <option value="{{$manufacturer->id}}">{{$manufacturer->name}}</option>
                    @endforeach
                @endif
            </select>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="status-select" class="mr-2">Drug Class</label>
            <select class="custom-select" id="status-select">
                <option selected="">Select</option>
            @if (!is_null($productCategory))
                @foreach ($productCategory as $category)
                    <option value="{{$category['key']}}">{{$category['name']}}</option>
                @endforeach
            @endif
            </select>
        </div>
    </div>
</div>

<div class="row" id="selectedEquipCat">
    <div class="col-md-12">
        <div class="form-group">
            <label for="model">Machine / Equipment Model</label>
            <input class="form-control" type="text" name="model" id="model">
        </div>
    </div>
</div>