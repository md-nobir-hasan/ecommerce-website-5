<div class="col-md-12">
    <label for="name" class="form-label">নাম <span style="color: red;">*</span></label>
    <input name="first_name" type="text" class="form-control" id="name" placeholder="Enter your name" required>
    @if ($errors->has('first_name'))
        <span class="text-danger">{{ $errors->first('first_name') }}</span>
    @endif
</div>
<div class="col-md-12 mt-4">
    <label for="address1" class="form-label" placeholder="Enter your Address">সম্পূর্ণ
        ঠিকানা
        <span style="color: red;">*</span></label>
    <textarea name="address1" id="address1" class="form-control" aria-label="With textarea" required></textarea>
</div>

<div class="col-md-12 mt-4">
    <label for="phone" class="form-label">ফোন নাম্বার
        <span style="color: red;">*</span>
    </label>
    <input type="tel" name="phone" class="form-control" id="phone" aria-describedby="inputGroupPrepend"
        required placeholder="Enter your phone number">
</div>

<div class="col-md-12 mt-4">
    <label for="address" class="form-label">ই-মেইল(যদি থাকে)</label>
    <input type="email" name="email" id="email" class="form-control" placeholder="Enter your address">
</div>
<div class="col-md-4 mt-4">
    <label for="quantity" class="form-label">পরিমাণ</label>
    <input type="number" name="quantity" value="1" id="quantity" class="form-control" required>
</div>

<div class="col-md-12 mt-4">
    <label for="address" class="form-label">শিপিং</label>
    <select name="shipping_id" id="" class="form-control" required>
        <option value="" hidden>Select Shipping Method</option>
        @foreach ($shipping as $n)
            <option value="{{ $n->id }}">{{ $n->type }}</option>
        @endforeach
    </select>
</div>

<label class="mt-4 mb-2">পেমেন্ট প্রক্রিয়া:</label>

<div class="form-check payment-input">
    <input class="pamyment_method form-control form-check-input ml-3 " type="radio" name="pamyment_methods"
        id="flexRadioDefault1" value="Bkash" autocomplete="off">
    <label class="form-check-label" for="flexRadioDefault1">
        বিকাশ
    </label>
</div>

<div class="form-check payment-input">
    <input class="pamyment_method form-control form-check-input ml-3 " type="radio" name="pamyment_methods"
        id="flexRadioDefault2" value="Nagad" autocomplete="off">
    <label class="form-check-label" for="flexRadioDefault2">
        নগদ
    </label>
</div>
<div class="form-check payment-input">
    <input class="pamyment_method form-control form-check-input ml-3" type="radio" name="pamyment_methods"
        id="checkbox3" value="CashonDelivery" autocomplete="off">
    <label class="form-check-label " for="checkbox3">
        Cash On
        Delivary
    </label>
</div>

<div class="row text-center">
    <div class="col-md-12" id="bkash" class="bkash" style="display:none">
        <label class="mt-2">আপনার বিকাশ নাম্বারঃ
            <input type="number" name="payment_number" class="bkash_input form-control" id="bkash_input"
                class="form-control" placeholder="যে নাম্বার থেকে টাকা পাঠিয়েছেন" required>
        </label>
    </div>
</div>
<div class="row text-center">
    <div class="col-md-12" id="nagad" class="nagad" style="display:none">
        <label class="mt-2">আপনার নগদ নাম্বারঃ
            <input type="number" name="payment_number" class="nagad_input form-control" id="nagad_input"
                class="form-control" placeholder="যে নাম্বার থেকে টাকা পাঠিয়েছেন" required>
        </label>
    </div>
</div>

<script>
    $('.pamyment_method').each(function(index) {
        $(this).on('click', function() {
            var value = $(this).val();
            if (value == 'Bkash') {
                $('#bkash').css('display', 'block');
                $('#bkash_input').prop('disabled', false);
                $('#nagad_input').prop('disabled', true);
                $('#nagad').css('display', 'none');
            } else if (value == 'Nagad') {
                $('#bkash_input').prop('disabled', true);
                $('#nagad_input').prop('disabled', false);
                $('#bkash').css('display', 'none');
                $('#nagad').css('display', 'block');
            } else {
                $('#bkash_input').prop('disabled', true);
                $('#nagad_input').prop('disabled', true);
                $('#bkash').css('display', 'none');
                $('#nagad').css('display', 'none');
            }
        })
    });
</script>
