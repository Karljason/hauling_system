<div>
    <div class="truck-details-body">
        <table class="table" id="truck_table">
            <thead>
                <tr>
                    <th>Last Name</th>
                    <th>First Name</th>
                    <th>Middle Name</th>
                    <th>Address</th>
                    <th>Contact #</th>
                    <th>ID Type</th>
                    <th>ID Ref. No.</th>
                </tr>
            </thead>
            <tbody>
                
                <tr>
                    <td>
                        <input type="text"
                        name="txtLastName" class="form-control"
                        wire:model="txtLastName"/>
                    </td>
                    <td>
                        <input type="text"
                            name="txtFirstName" class="form-control"
                            wire:model="txtFirstName"/>
                    </td>
                    <td>
                        <input type="text"
                            name="txtMidName" class="form-control"
                            wire:model="txtMidName"/>
                    </td>
                    <td>
                        <input type="text"
                            name="txtAddress" class="form-control"
                            wire:model="txtAddress"/>
                    </td>
                    <td>
                        <input type="text"
                            name="txtContact" class="form-control"
                            wire:model="txtContact"/>
                    </td>
                    <td>
                        <input type="text"
                            name="txtIDType" class="form-control"
                            wire:model="txtIDType"/>
                    </td>
                    <td>
                        <input type="text"
                            name="txtIDNo" class="form-control"
                            wire:model="txtIDNo"/>
                    </td>
                </tr>
                
            </tbody>
        </table>
        <div class="row">
            <div class="col-md-12">
                <button class="btn btn-sm btn-secondary"
                wire:click.prevent="addEmployee">+ Add Another Employee</button>
            </div>
        </div>
    </div>
</div>
