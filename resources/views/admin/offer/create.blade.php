<div class="modal fade" id="showModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" >
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-light p-3">
                <h5 class="modal-title" id="exampleModalLabel"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close-modal"></button>
            </div>
            <form class="tablelist-form" autocomplete="off" action="{{route('admin.store.offer')}}" method="post">
                @csrf
                <div class="modal-body">

                    <div class="mb-3">
                        <label for="customername-field" class="form-label">Amount</label>
                        <input class="form-control" required name="min_amount" type="number" placeholder="Enter the amount for offer">
                    </div>

                    <div class="mb-3">
                        <label for="customername-field" class="form-label">Affilate Link</label>
                        <input class="form-control" required name="aff_link" type="text" placeholder="Paste the affilate link" required>
                    </div>

                    <div class="mb-3">
                        <label for="customername-field" class="form-label">Bank Name</label>
                        <select class="form-control" id="bank-name-select" name="bank_id" required>
                            @foreach ($banks as $bank)
                                <option value="{{$bank->id}}">{{$bank->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="email-field" class="form-label">Card Type</label>
                        <select class="form-control" id="card-type-show" name="card_type_id" required>
                            <option value="">Select Card</option>
                        </select>
                    </div>
                   
                    <div class="mb-3">
                        <label for="email-field" class="form-label">Payment Platform Name</label>
                        <select class="form-control" data-trigger id="payment-platform-name" name="payment_platform_id" required>
                            @foreach ($paymentPlatforms as $payment)
                                <option value="{{$payment->id}}">{{$payment->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    
                    <div class="mb-3">
                        <label for="status-field" class="form-label">Offer Details</label>
                        <textarea name="description" class="form-control" id="" cols="30" rows="10" value=""></textarea>
                    </div>

                    <div>
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
                        <button type="submit" class="btn btn-success" id="add-btn">Add Offer</button>
                        <!-- <button type="button" class="btn btn-success" id="edit-btn">Update</button> -->
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@push('js')
    <script>
        $(document).ready(function() {
            $('#bank-name-select').change(function() {
                var bankId = $(this).val();
                $.ajax({
                    url: '{{ url('admin/get/cards') }}' + '/' + bankId,
                    type: 'GET',
                    success: function(response) {
                        $('#card-type-show').empty();
                        $('#card-type-show').append('<option value="">Select Card Type</option>');
                        $.each(response.cards, function(index, val) {
                            $('#card-type-show').append('<option value="' + val.id +
                                '">' + val.card_type_name + '</option>');
                        });
                    }
                });
            });
        });
    </script>
@endpush