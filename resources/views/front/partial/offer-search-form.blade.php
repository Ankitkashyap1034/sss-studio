<form class="hero-form" action="{{route('search.offer')}}" method="post">
    @csrf
    <div class="row" onclick="checkAuth()">
      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="form-group" >
          <i class="far fa-credit-card"></i>
            <select class="js-example-basic-single form-select" name="credit_card_bank" id="banks_list" required>
              <option selected disabled value="">Selcet Bank</option>
              @foreach ($allBanks as $bank)
                <option value="{{$bank->id}}">{{$bank->name}}</option>
              @endforeach
            </select>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="form-group">
          <i class="far fa-credit-card"></i>
            <select class="form-select" name="credit_card_type" id="card_type_credit" onclick="checkempty(this)" required>
              <option value="" selected disabled="disabled">
                Credit Cards
              </option>

            </select>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="form-group">
          <i class="fas fa-rupee-sign"></i>
          <input type="number" placeholder="Amount" name="amount" required/>
        </div>
      </div>

      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <button type="submit" class="vs-btn style4">Search</button>
      </div>
    </div>
    </form>
@push('js')
    <script>
        $(document).ready(function() {
            $('#banks_list').change(function() {
                var bankId = $(this).val();
                $.ajax({
                    url: '{{ url('admin/get/cards') }}' + '/' + bankId,
                    type: 'GET',
                    success: function(response) {
                        $('#card_type_credit').empty();
                        $('#card_type_credit').append('<option value="">Select Card Type</option>');
                        $.each(response.cards, function(index, val) {
                            $('#card_type_credit').append('<option value="' + val.id +
                                '">' + val.card_type_name + '</option>');
                        });
                    }
                });
            });
        });
    </script>

    <script>
        const checkempty = (e) => {
            const optionsLength = e.options.length;
            if (optionsLength < 2) {
                alert('Please select a bank.');
            }
        }
    </script>

    <script>
        const checkAuth = () => {
            const authCheck = {{Auth::user() ? 'true' : 'false'}};
            console.log(authCheck);
            if(authCheck == true){
                
            }else{
                iziToast.warning({
                    title: 'error',
                    message: "Please login or register first",
                    position: 'topRight',
                    timeout: 4000,
                    displayMode: 0,
                    color: 'orange',
                    theme: 'light',
                    messageColor: 'black',
				});
                window.location.href = '{{ url('/login') }}';
            }
        }
    </script>
@endpush