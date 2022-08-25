<div>
    <div class="truck-details-body">
        <table class="table" id="truck_table">
            <thead>
                <tr>
                    <th>Truck Brand</th>
                    <th>Plate No.</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                
                <tr>
                    <td>
                        <select name="cbotruckDetails"
                            wire:model="cbotruckDetails" class="form-control">
                            <option value="">-- choose truck type --</option>
                            @foreach ($objTruckType as $index => $truckDetail)
                                <option value={{ $truckDetail->id }}>
                                    {{$truckDetail->Description}}
                                </option>
                            @endforeach
                        </select>
                    </td>
                    <td>
                        <input type="text"
                            name="txtPlateNo" class="form-control"
                            wire:model="txtPlateNo"/>
                    </td>
                </tr>
                
            </tbody>
        </table>
        <div class="row">
            <div class="col-md-12">
                <button class="btn btn-sm btn-secondary"
                wire:click.prevent="addProduct">+ Add Another Product</button>
            </div>
        </div>
    </div>
</div>
