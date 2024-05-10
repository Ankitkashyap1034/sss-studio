<div class="modal fade" id="showModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" >
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-light p-3">
                <h5 class="modal-title" id="exampleModalLabel"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close-modal"></button>
            </div>
            <form class="tablelist-form" autocomplete="off" action="{{route('admin.store.credit.card.type')}}" method="post">
                @csrf
                <div class="modal-body">

                    <div class="mb-3">
                        <label for="customername-field" class="form-label">Card Name</label>
                        <input type="text" id="customername-field" class="form-control" placeholder="Enter the card Name" required name="card_type_name"/>
                        <div class="invalid-feedback">Please enter a bank name.</div>
                    </div>

                    <div class="mb-3">
                        <label for="status-field" class="form-label">Bank Name</label>
                        <select class="form-control" id="bank_id" name="bank_id" required>
                            @foreach ($banks as $bank)
                                <option value="{{$bank->id}}">{{$bank->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    
                    <div >
                        <label for="status-field" class="form-label">Status</label>
                        <select class="form-control" data-trigger id="active" name="active" required>
                            <option value="">Status</option>
                            <option value="1">Active</option>
                            <option value="0">In active</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="hstack gap-2 justify-content-end">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success" id="add-btn">Add Credit Card</button>
                        <!-- <button type="button" class="btn btn-success" id="edit-btn">Update</button> -->
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>