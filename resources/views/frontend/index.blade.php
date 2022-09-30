@include('frontend.layouts.header')

<body>
    <!-- Navbar  -->
    <div class="row cus-nav text-center justify-content-center shadow-lg p-4 fixed-top rounded">
        <div class="col-md-8">
            <a class="navbar-brand" href="#">
                {{-- logo --}}
                <img class="rounded-pill" src="{{ asset($company_info->logo) }}" alt="Image_logo" style="width: 100px">
                {{-- Copany Name --}}
                {{-- <span style="font-size: 22px">{{ $company_info->name }}</span> --}}
            </a>
        </div>
    </div>


    {{-- Body content --}}
    <div class="container-fluid">
        {{-- Paragrap div --}}
        <div class="row mt-5 justify-content-md-center header-text">
            <div class="col-md-12 text-wrap text-center">
                <p class="text-wrap-head">বেবি ফেয়ার বিডিতে আপনাকে স্বাগতম যেকোনো বেবি প্রোডাক্ট আমরা দিচ্ছি 100%
                    নিশ্চয়তা এবং ক্যাশব্যাক গ্যারান্টি।</p>
            </div>
            <div class="col-md-12  text-center">
                <p class="text-wrap-head">কোথাও ঘুরতে গেলে খুব সহজেই নিয়ে যেতে পারবেন। উপহারের জন্য ও বেস্ট এই বেবি
                    ব্লাংকেট গুলো। অনেকেই উপহারের জন্য নিয়েছেন।বেবি বাউন্সার।</p>
            </div>
            {{-- <div class="col-md-12  text-center">
                <button class="order-button order-btn-dialogify">Order Now</button>
            </div> --}}
        </div>

        {{-- video section --}}
        <div class="video m-4 shadow p-4 mb-4 bg-white ">
            <iframe width="560" height="315" src="https://www.youtube.com/embed/ts1WLuALz14"
                title="YouTube video player" frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                allowfullscreen></iframe>
        </div>

        {{-- <div class="row">
            <div class="col-md-12  text-center">
                <button class="order-button order-btn-dialogify">Order Now</button>
            </div>
        </div> --}}

        {{-- product section --}}
        <section class="products" id="products">
            <h1 class="heading"><span>পণ্য</span> </h1>
            @if ($product == null)
                <p style="text-align: center">কোনো পণ্য যোগ করা হইনি</p>
            @endif
            <div class="box-container">

                @if ($product != null)
                    @foreach ($product as $product)
                        <div class="box">
                            @php
                                $discount = ($product->discount * $product->price) / 100;
                            @endphp
                            <span class="discount">-{{ round($discount) }}৳</span>
                            <div class="image">
                                <img class="img-fluid rounded-4 shadow-2-strong"
                                    src="{{ asset('product/' . $product->photo) }}" alt="Product Image">
                                <div class="icons">
                                    {{-- <a href="javascript:void(0)" class="fas fa-thumbs-up"></a> --}}
                                    <a type="button" href="javascript:void(0)" class="product-order-btn cart-btn"
                                        id="{{ $product->id }}" data-bs-toggle="modal"
                                        data-bs-target="#product-{{ $product->id }}">ওর্ডার করুন
                                    </a>
                                    {{-- data-bs-toggle="collapse" data-bs-target="#product-{{ $product->id }}"
                                        aria-expanded="false" aria-controls="product-{{ $product->id }}" --}}
                                    {{-- <a href="javascript:void(0)" class="fas fa-thumbs-up"></a> --}}
                                </div>
                            </div>
                            <div class="content">
                                <h3>{{ $product->title }}</h3>
                                @php
                                    $discount = ($product->discount * $product->price) / 100;
                                @endphp
                                <div class="price"> {{ round($product->price - $discount) }}৳
                                    <span>{{ round($product->price) }}৳</span>
                                </div>
                            </div>
                        </div>
                        <!-- Modal -->
                        <div class="modal fade" id="product-{{ $product->id }}" tabindex="-1"
                            aria-labelledby="exampleModalLabel{{ $loop->index }}" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <form action="{{ route('order.store') }}" method="POST"
                                        class="row g-3 needs-validation">
                                        @csrf
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel{{ $loop->index }}">Order
                                                Form
                                            </h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body ml-5">
                                            {{-- Hidden field  --}}
                                            <input type="hidden" name="product_title" value="{{ $product->title }}">
                                            <input type="hidden" name="product_price" value="{{ $product->price }}">
                                            <input type="hidden" name="product_id" value="{{ $product->id }}">

                                            {{-- Form part  --}}
                                            <div class="col-md-12">
                                                <label for="name" class="form-label">নাম <span
                                                        style="color: red;">*</span></label>
                                                <input name="first_name" type="text" class="form-control"
                                                    id="name" placeholder="Enter your name" required>
                                                @if ($errors->has('first_name'))
                                                    <span class="text-danger">{{ $errors->first('first_name') }}</span>
                                                @endif
                                            </div>
                                            <div class="col-md-12 mt-4">
                                                <label for="address1" class="form-label"
                                                    placeholder="Enter your Address">সম্পূর্ণ
                                                    ঠিকানা
                                                    <span style="color: red;">*</span></label>
                                                <textarea name="address1" id="address1" class="form-control" aria-label="With textarea" required></textarea>
                                            </div>

                                            <div class="col-md-12 mt-4">
                                                <label for="phone" class="form-label">ফোন নাম্বার
                                                    <span style="color: red;">*</span>
                                                </label>
                                                <input type="tel" name="phone" class="form-control" id="phone"
                                                    aria-describedby="inputGroupPrepend" required
                                                    placeholder="Enter your phone number">
                                            </div>

                                            <div class="col-md-12 mt-4">
                                                <label for="address" class="form-label">ই-মেইল(যদি থাকে)</label>
                                                <input type="email" name="email" id="email"
                                                    class="form-control" placeholder="Enter your address">
                                            </div>
                                            <div class="col-md-4 mt-4">
                                                <label for="quantity" class="form-label">পরিমাণ</label>
                                                <input type="number" name="quantity" value="1" id="quantity"
                                                    class="form-control" required>
                                            </div>

                                            <div class="col-md-12 mt-4">
                                                <label for="address" class="form-label">শিপিং</label>
                                                <select name="shipping_id" id="" class="form-control"
                                                    required>
                                                    <option value="" hidden>Select Shipping Method</option>
                                                    @foreach ($shipping as $n)
                                                        <option value="{{ $n->id }}">
                                                            {{ $n->type . '(' . $n->price . ')' }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <label class="mt-4 mb-2">পেমেন্ট প্রক্রিয়া:</label>

                                            <div class="form-check payment-input d-none">
                                                <input class="pamyment_method form-control form-check-input ml-3 "
                                                    type="radio" name="pamyment_methods" id="flexRadioDefault1"
                                                    nobir='{{ $loop->index }}' value="Bkash">
                                                <label class="form-check-label" for="flexRadioDefault1">
                                                    বিকাশ
                                                </label>
                                            </div>

                                            <div class="form-check payment-input d-none">
                                                <input class="pamyment_method form-control form-check-input ml-3 "
                                                    type="radio" name="pamyment_methods" id="flexRadioDefault2"
                                                    value="Nagad" nobir='{{ $loop->index }}'>
                                                <label class="form-check-label" for="{{ $loop->index }}">
                                                    নগদ
                                                </label>
                                            </div>
                                            <div class="form-check payment-input">
                                                <input class="pamyment_method form-control form-check-input ml-3"
                                                    type="radio" name="pamyment_methods" id="checkbox3"
                                                    value="CashonDelivery" nobir='{{ $loop->index }}' checked>
                                                <label class="form-check-label " for="checkbox3">
                                                    Cash On
                                                    Delivary
                                                </label>
                                            </div>

                                            <div class="row text-center">
                                                <div class="col-md-12" id="bkash{{ $loop->index }}" class="bkash"
                                                    style="display:none">
                                                    <label class="mt-2">আপনার বিকাশ নাম্বারঃ
                                                        <input type="number" name="payment_number"
                                                            class="bkash_input form-control"
                                                            id="bkash_input{{ $loop->index }}" class="form-control"
                                                            placeholder="যে নাম্বার থেকে টাকা পাঠিয়েছেন" required
                                                            disabled>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="row text-center">
                                                <div class="col-md-12" id="nagad{{ $loop->index }}" class="nagad"
                                                    style="display:none">
                                                    <label class="mt-2">আপনার নগদ নাম্বারঃ
                                                        <input type="number" name="payment_number"
                                                            class="nagad_input form-control"
                                                            id="nagad_input{{ $loop->index }}" class="form-control"
                                                            placeholder="যে নাম্বার থেকে টাকা পাঠিয়েছেন" required
                                                            disabled>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">ওর্ডার নিশিত করুন</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </section>

        {{-- Why this product  --}}
        @if (isset($product->summary))
            <section class="why-us">

                <div class="row p-3 mb-5 rounded justify-content-md-center">
                    <h1 class="why-us-header">বেবি বাউন্সার ব্যবহার করলে কি হয় </h1>
                </div>

                <div class="row">

                    <div class="col-md-4 shadow-lg gx-5 p-3 mb-5 bg-body rounded justify-content-md-center des-dev">
                        <div class="row">
                            <span class="why-us-emoji"><i class="fas fa-check-circle font-awesome-icon "></i></span>
                        </div>
                        <div class="row p-3">
                            <h1 class="why-us-div-des">
                                তিন মাস থেকে ব্যবহার করতে পারবে
                            </h1>
                            <p>আপনার সোনামণি থাকুক পরম যত্নে ও নিরাপদে বেবী বাউন্সার চেয়ারে</p>
                        </div>
                    </div>

                    <div class="col-md-4 des-dev shadow-lg p-3 mb-5 bg-body rounded justify-content-md-center">
                        <div class="row">
                            <span class="why-us-emoji"><i class="fas fa-check-circle font-awesome-icon "></i></span>
                        </div>
                        <div class="row">
                            <h1 class="why-us-div-des">
                                বাচ্চার শারীরিক ও মানসিক শক্তির বিকাশ করে
                            </h1>
                            <p>তিন মাস থেকে শুরু করে প্রায় ২ বছর পর্যন্ত প্রায় সব বাচ্চাদের জন্য</p>
                        </div>
                    </div>

                    <div class="col-md-3 des-dev shadow-lg p-3 mb-5  bg-body rounded justify-content-md-center">
                        <div class="row">
                            <span class="why-us-emoji"><i class="fas fa-check-circle font-awesome-icon "></i></span>
                        </div>
                        <div class="row">
                            <h1 class="why-us-div-des">
                                এটা থেকে আপনার সোনামণি পড়ে যাওয়ার ভয় নেই
                            </h1>
                            <p>এই চেয়ারটি লক বিশিষ্ট হওয়ার ফলে বাচ্চার পরে যাওয়ার ও কোন ভয় নেই</p>
                        </div>
                    </div>

                    <div class="col-md-4 des-dev shadow-lg p-3 mb-5 bg-body rounded justify-content-md-center">
                        <div class="row">
                            <span class="why-us-emoji"><i class="fas fa-check-circle font-awesome-icon "></i></span>
                        </div>
                        <div class="row">
                            <h1 class="why-us-div-des">
                                এস এস স্টিলের
                            </h1>
                            <p>এটি ৩ থেকে 25 কেজি ওজন বহন করতে সক্ষম।</p>
                        </div>
                    </div>

                    <div class="col-md-4 des-dev shadow-lg p-3 mb-5 bg-body rounded justify-content-md-center">
                        <div class="row">
                            <span class="why-us-emoji"><i class="fas fa-check-circle font-awesome-icon "></i></span>
                        </div>
                        <div class="row">
                            <h1 class="why-us-div-des">
                                ওয়াশেবল মখমল কাপড়
                            </h1>
                            <p>এটি সহজেই খোলা যায় এবং ধৌত করা যায়।</p>
                        </div>
                    </div>

                    <div class="col-md-3 shadow-lg p-3 mb-5 bg-body rounded justify-content-md-center">
                        <div class="row">
                            <span class="why-us-emoji"><i class="fas fa-check-circle font-awesome-icon "></i></span>
                        </div>
                        <div class="row">
                            <h1 class="why-us-div-des">
                                বেবি বাউন্সার দুলিয়ে দিতে হয় না
                            </h1>
                            <p>এর উপরে বাচ্চাকে রেখে নড়াচড়া করলেই নিজে নিজে দুলতে থাকবে।</p>
                        </div>
                    </div>

                </div>
            </section>
        @endif

        {{-- Why section-2  --}}
        <section class="why-us2">

            <div class="row p-3 mb-5 rounded justify-content-md-center">
                <h1 class="why-us-header">বেবি বাউন্সার গুলো আপনারা কেন নিবেন </h1>
            </div>

            <div class="des-1">
                <i class="fas fa-check-circle"></i>
                <h1>
                    চুলার অথবা গ্যাসের লুজ পাইপের যেকোনো ধরনের লিকেজ হলে অটোমেটিক গ্যাস বন্ধ হয়ে যাবে
                </h1>
            </div>
            <div class="des-1">
                <i class="fas fa-check-circle"></i>
                <h1>
                    অনেক সময় সিজারিয়ান মায়েরা বাচ্চা কোলে নিতে সমস্যা হয় দীর্ঘ টাইম কোলে রাখলে হাত ব্যথা করে তাদের
                    জন্য এটা বেস্ট প্রডাক্ট হতে পারে
                </h1>
            </div>
            <div class="des-1">
                <i class="fas fa-check-circle"></i>
                <h1>
                    আমাদের এটা ওজনে হালকা হওয়া খুব সহজে এক জায়গা থেকে অন্য জায়গায় বহন করতে পারবেন
                </h1>
            </div>
            <div class="des-1">
                <i class="fas fa-check-circle"></i>
                <h1>
                    বেবি বাউন্সার এর কাপড় খুলে খুব সহজেই ওয়াশ করা যায়
                </h1>
            </div>
            <div class="des-1">
                <i class="fas fa-check-circle"></i>
                <h1>
                    এটা এস এস স্টিলের হয় কখনো মরিচা পড়বে না বা জং ধরবে না
                </h1>
            </div>
            <div class="des-1">
                <i class="fas fa-check-circle"></i>
                <h1>
                    বিশ্রাম, ঘুম ও খেলা এই ৩ পজিশনেই ব্যবহার করতে পারবেন।
                </h1>
            </div>
            <div class="des-1">
                <i class="fas fa-check-circle"></i>
                <h1>
                    আমাদের এটা উন্নতমানের মখমল কাপড় দ্বারা তৈরি যা কখনো ভুলে যাবেনা বা ছিঁড়ে যাওয়ার সম্ভাবনা নেই
                </h1>
            </div>

        </section>


    </div>

    <div>
        <div class="row justify-content-center social-icon">

            <div class="col-md-4">
                <a href="tel:{{ $company_contact_info->phone }}"><i class="fas fa-phone-alt"></i></a>
                <p><a href="tel:{{ $company_contact_info->phone }}">{{ $company_contact_info->phone }}</a></p>
            </div>
            <div class="col-md-4">
                <a href="{{ $company_contact_info->facebook_page_link }}"><i class="fab fa-facebook"></i>
                    <p>আমাদের ফেসবুক পেজ</p>
                </a>
            </div>
            <div class="col-md-4">
                <a href="{{ $company_contact_info->facebook_group_link }}"><i class="fab fa-youtube"></i>
                    <p>আমাদের ইউটিউব চ্যানেল</p>
                </a>
            </div>


        </div>
    </div>

    <div class="footer-top">
        <p>আপনাকে অনেক ধন্যবাদ আমদের ওয়েবসাইট টি ভিজিট করার জন্য</p>
    </div>
    <footer class="footer" style="height: auto">
        <p>
            All Right Reserved By <span class="footer-text">JARIFTRADING.COM</span> <br>
            Designed And developed by <span class="footer-text">Md. Nobir Hasan</span> <br>
            Powdered by <span class="footer-text">Business Mind Academy</span>
        </p>
    </footer>

    </div>
    @if (session()->has('script_msg'))
        {!! session()->get('script_msg') !!}
    @endif



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"
        integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <script src="https://www.jqueryscript.net/demo/Dialog-Modal-Dialogify/dist/dialogify.min.js"></script>
    <script>
        // $(document).ready(function({
        //     $('#payment_method').on()(function() {
        //         var value = $(this).val();
        //         alert(value);
        //     });
        // }));
        $(document).ready(function() {
            $('.pamyment_method').each(function(index) {
                $(this).on('click', function() {
                    var value = $(this).val();
                    var i = $(this).attr('nobir');
                    if (value == 'Bkash') {
                        $('#bkash' + i).css('display', 'block');
                        $('#bkash_input' + i).prop('disabled', false);
                        $('#nagad_input' + i).prop('disabled', true);
                        $('#nagad' + i).css('display', 'none');
                    } else if (value == 'Nagad') {
                        $('#bkash_input' + i).prop('disabled', true);
                        $('#nagad_input' + i).prop('disabled', false);
                        $('#bkash' + i).css('display', 'none');
                        $('#nagad' + i).css('display', 'block');
                    } else {
                        $('#bkash_input' + i).prop('disabled', true);
                        $('#nagad_input' + i).prop('disabled', true);
                        $('#bkash' + i).css('display', 'none');
                        $('#nagad' + i).css('display', 'none');
                    }
                })
            });
            // Dialogify
            $('.order-btn-dialogify').each(function(index) {
                $(this).click(function() {

                    var product_id = $(this).attr('id');

                    var options = {
                        ajaxPrefix: ''
                    };
                    new Dialogify('{{ url('order/ajax') }}/' + product_id, options)
                        .title("Confirm Order")
                        .buttons([{
                                text: "Cancle",
                                type: Dialogify.BUTTON_DANGER,
                                click: function(e) {
                                    this.close();
                                }
                            },
                            {
                                text: 'Confirm Order',
                                type: Dialogify.BUTTON_PRIMARY,
                                click: function(e) {
                                    // var discount_v = $('#discount_offer').val();

                                    //Regex for discount validation
                                    // var valid_dis = /(^[0-9]{1,2}%{1}$)/m;

                                    // if (!valid_dis.test(discount_v)) {
                                    //     alert(
                                    //         "You have to input one or two number and one % as discount"
                                    //     );
                                    // } else {

                                    var form_data = new FormData();
                                    form_data.append('name', $('#name').val());
                                    form_data.append('address', $('#address')
                                        .val());
                                    form_data.append('discount', discount_v);
                                    form_data.append('id', data[0].cake_id);
                                    $.ajax({
                                        method: "POST",
                                        url: '{{ url('order.store') }}',
                                        data: form_data,
                                        // dataType:'json',
                                        contentType: false,
                                        cache: false,
                                        processData: false,
                                        success: function(value) {
                                            alert(value);
                                            // $.ajax({
                                            //     cache: false,
                                            //     url: "{{ url('order.store') }}",
                                            //     method: "POST",
                                            //     success: function(
                                            //         data) {
                                            //         $("#show_data")
                                            //             .html(
                                            //                 data
                                            //             );
                                            //     }
                                            // });

                                        }
                                    });
                                }
                                // }
                            }
                        ]).showModal();
                });
            });
        });
    </script>

</body>

</html>
