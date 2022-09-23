<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $company_info->title }}</title>
    <link rel="icon" type="image/png" href="{{ asset($company_info->logo) }}" />
    {{-- online css link --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    {{-- custom css link --}}
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/style.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('css/css/style1.css') }}"> --}}
    <style>
        body {
            font-size: 17px;
        }
    </style>
</head>

<body>
    <!-- Navbar  -->
    <div class="row text-center justify-content-center bg-success shadow-lg p-4 fixed-top rounded">
        <div class="col-md-8">
            <a class="navbar-brand" href="#">
                {{-- logo --}}
                <img class="rounded-pill" src="{{ asset($company_info->logo) }}" alt="Image_logo" style="width: 60px">
                {{-- Copany Name --}}
                <span style="font-size: 22px">{{ $company_info->name }}</span>
            </a>
        </div>
    </div>

    {{-- Body content --}}
    <div class="container-fluid">
        {{-- Paragrap div --}}
        <div class="row mt-5 justify-content-md-center header-text">
            <div class="col-md-8 text-wrap text-center">
                <p class="text-wrap">আপনার একটু অসতর্কতা পরিণত হতে পারে সারাজীবনের কান্নায়।</p>
            </div>
        </div>

        {{-- video section --}}
        <div class="video m-4 shadow p-4 mb-4 bg-white ">
            <iframe class="shadow-lg p-3 mb-5 bg-body rounded" width="560" height="315"
                src="https://www.youtube.com/embed/JnX7Oc8LqD8" title="YouTube video player" frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                allowfullscreen></iframe>
        </div>

        {{-- Paragrap div --}}
        <div class="row mt-5 justify-content-md-center video-footer-text">
            <div class="col-md-8 text-wrap text-center">
                <p class="text-wrap">গ্যাসের আগুনে প্রতিবছর কেড়ে নেয় হাজারো প্রান। গ্যাসের আগুন এবং সিলিন্ডার বিস্ফোরণ
                    থেকে আপনার পরিবারকে সুরক্ষা দিতে ব্যবহার করুন গ্যাস সেইফটি ডিভাইস। </p>
            </div>
            @if (isset($product))
                <a href="#" class="cart-btn text-center" data-bs-toggle="collapse" data-bs-target="#product-top"
                    aria-expanded="false" aria-controls="product- {{ $product->id }}">অর্ডার করুন</a>
                </a>
            @endif
            <div class="collapse" id="product-top">
                <div class="card card-body">
                    <form action="{{ route('order.store') }}" method="POST" class="row g-3 needs-validation">
                        @csrf
                        <div class="col-12 text-center">
                            @if (isset($product))
                                <input type="hidden" name="product_title" value="{{ $product->title }}">
                                <input type="hidden" name="product_price" value="{{ $product->price }}">
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                            @endif
                        </div>
                        <div class="col-md-4">
                            <label for="name" class="form-label">নাম <span style="color: red;">*</span></label>
                            <input name="first_name" type="text" class="form-control" id="name"
                                placeholder="Enter your name" required>
                            @if ($errors->has('first_name'))
                                <span class="text-danger">{{ $errors->first('first_name') }}</span>
                            @endif
                        </div>
                        <div class="col-md-4">
                            <label for="address1" class="form-label" placeholder="Enter your Address">ঠিকানা
                                <span style="color: red;">*</span></label>
                            <textarea name="address1" id="address1" class="form-control" aria-label="With textarea" required></textarea>
                        </div>

                        <div class="col-md-4">
                            <label for="phone" class="form-label">ফোন নাম্বার
                                <span style="color: red;">*</span>
                            </label>
                            <input type="tel" name="phone" class="form-control" id="phone"
                                aria-describedby="inputGroupPrepend" required placeholder="Enter your phone number">
                        </div>

                        <div class="col-md-4">
                            <label for="address" class="form-label">ই-মেইল</label>
                            <input type="email" name="email" id="email" class="form-control"
                                placeholder="Enter your address">
                        </div>
                        <div class="col-md-4">
                            <label for="quantity" class="form-label">পরিমাণ</label>
                            <input type="number" name="quantity" value="1" id="quantity" class="form-control"
                                required>
                        </div>

                        <div class="col-md-4">
                            <label for="address" class="form-label">শিপিং</label>
                            <select name="shipping_id" id="" class="form-control select" required>
                                <option value="" hidden>Select Shipping Method</option>
                                @if (isset($shipping))
                                    @foreach ($shipping as $n)
                                        <option value="{{ $n->id }}">{{ $n->type }}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>

                        <label>শিপিং প্রক্রিয়া:</label>
                        <div class="form-check">
                            <input class="pamyment_method form-check-input" type="radio" name="pamyment_methods"
                                id="flexRadioDefault1" value="Bkash" autocomplete="off">
                            <label class="form-check-label" for="flexRadioDefault1">
                                Bkash
                            </label>
                        </div>

                        <div class="form-check">
                            <input class="pamyment_method form-check-input" type="radio" name="pamyment_methods"
                                id="flexRadioDefault2"value="Nagad" autocomplete="off">
                            <label class="form-check-label" for="flexRadioDefault2">
                                Nagad
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="pamyment_method form-check-input" type="radio" name="pamyment_methods"
                                id="checkbox3" value="CashonDelivery" autocomplete="off">
                            <label class="form-check-label" for="checkbox3">
                                Cash On
                                Delivary
                            </label>
                        </div>

                        <div class="row text-center">
                            <div class="col-md-4" id="bkash" style="display:none">
                                <label>আপনার বিকাশ নাম্বারঃ
                                    <input type="number" name="payment_number" id="bkash_input"
                                        class="form-control" placeholder="যে নাম্বার থেকে টাকা পাঠিয়েছেন" required>
                                </label>
                            </div>
                        </div>
                        <div class="row text-center">
                            <div class="col-md-4" id="nagad" style="display:none">
                                <label>আপনার নগদ নাম্বারঃ
                                    <input type="number" name="payment_number" id="nagad_input"
                                        class="form-control" placeholder="যে নাম্বার থেকে টাকা পাঠিয়েছেন" required>
                                </label>
                            </div>
                        </div>

                        <div class="col-12 text-center">
                            <button class="btn btn-primary">ওর্ডার নিশ্চিত করুন</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        {{-- product section --}}
        <section class="products" id="products">
            <h1 class="heading"><span>পণ্য</span> </h1>
            @if ($product == null)
                <p style="text-align: center">কোনো পণ্য যোগ করা হইনি</p>
            @endif
            <div class="box-container">

                @if ($product != null)
                    <div class="box">
                        @php
                            $discount = ($product->discount * $product->price) / 100;
                        @endphp
                        <span class="discount">-{{ round($discount) }}৳</span>
                        <div class="image">
                            <img class="img-fluid rounded-4 shadow-2-strong"
                                src="{{ asset('product/' . $product->photo) }}" alt="Product Image">
                            <div class="icons">
                                <a href="javascript:void(0)" class="fas fa-thumbs-up"></a>
                                <a href="#" class="cart-btn" data-bs-toggle="collapse"
                                    data-bs-target="#product-{{ $product->id }}" aria-expanded="false"
                                    aria-controls="product-{{ $product->id }}">ওর্ডার করুন</a>
                                <a href="javascript:void(0)" class="fas fa-thumbs-up"></a>
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

                    {{-- Order form --}}
                    <div class="collapse" id="product-{{ $product->id }}">
                        <div class="card card-body">
                            <form action="{{ route('order.store') }}" method="POST"
                                class="row g-3 needs-validation">
                                @csrf
                                <div class="col-12 text-center">
                                    {{-- <label> Product Name <span class="text-danger"> {{ $data->title }}</span> --}}
                                    <input type="hidden" name="product_title" value="{{ $product->title }}">
                                    <input type="hidden" name="product_price" value="{{ $product->price }}">
                                    <input type="hidden" name="product_id" value="{{ $product->id }}">

                                    </label>
                                </div>
                                <div class="col-md-4">
                                    <label for="name" class="form-label">নাম <span
                                            style="color: red;">*</span></label>
                                    <input name="first_name" type="text" class="form-control" id="name"
                                        placeholder="Enter your name" required>
                                    @if ($errors->has('first_name'))
                                        <span class="text-danger">{{ $errors->first('first_name') }}</span>
                                    @endif
                                </div>
                                <div class="col-md-4">
                                    <label for="address1" class="form-label"
                                        placeholder="Enter your Address">সম্পূর্ণ
                                        ঠিকানা
                                        <span style="color: red;">*</span></label>
                                    <textarea name="address1" id="address1" class="form-control" aria-label="With textarea" required></textarea>
                                </div>

                                <div class="col-md-4">
                                    <label for="phone" class="form-label">ফোন নাম্বার
                                        <span style="color: red;">*</span>
                                    </label>
                                    <input type="tel" name="phone" class="form-control" id="phone"
                                        aria-describedby="inputGroupPrepend" required
                                        placeholder="Enter your phone number">
                                </div>

                                <div class="col-md-4">
                                    <label for="address" class="form-label">ই-মেইল(যদি থাকে)</label>
                                    <input type="email" name="email" id="email" class="form-control"
                                        placeholder="Enter your address">
                                </div>
                                <div class="col-md-4">
                                    <label for="quantity" class="form-label">পরিমাণ</label>
                                    <input type="number" name="quantity" value="1" id="quantity"
                                        class="form-control" required>
                                </div>

                                <div class="col-md-4">
                                    <label for="address" class="form-label">শিপিং</label>
                                    <select name="shipping_id" id="" class="form-control select" required>
                                        <option value="" hidden>Select Shipping Method</option>
                                        @foreach ($shipping as $n)
                                            <option value="{{ $n->id }}">{{ $n->type }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <label>পেমেন্ট প্রক্রিয়া:</label>
                                <div class="form-check">
                                    <input class="pamyment_method form-check-input" type="radio"
                                        name="pamyment_methods" id="flexRadioDefault1" value="Bkash"
                                        autocomplete="off">
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        Bkash
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="pamyment_method form-check-input" type="radio"
                                        name="pamyment_methods" id="flexRadioDefault2"value="Nagad"
                                        autocomplete="off">
                                    <label class="form-check-label" for="flexRadioDefault2">
                                        Nagad
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="pamyment_method form-check-input" type="radio"
                                        name="pamyment_methods" id="checkbox3" value="CashonDelivery"
                                        autocomplete="off">
                                    <label class="form-check-label" for="checkbox3">
                                        Cash On
                                        Delivary
                                    </label>
                                </div>

                                <div class="row text-center">
                                    <div class="col-md-4" id="bkash" style="display:none">
                                        <label>আপনার বিকাশ নাম্বারঃ
                                            <input type="number" name="payment_number" id="bkash_input"
                                                class="form-control" placeholder="যে নাম্বার থেকে টাকা পাঠিয়েছেন"
                                                required>
                                        </label>
                                    </div>
                                </div>
                                <div class="row text-center">
                                    <div class="col-md-4" id="nagad" style="display:none">
                                        <label>আপনার নগদ নাম্বারঃ
                                            <input type="number" name="payment_number" id="nagad_input"
                                                class="form-control" placeholder="যে নাম্বার থেকে টাকা পাঠিয়েছেন"
                                                required>
                                        </label>
                                    </div>
                                </div>

                                <div class="col-12 text-center">
                                    <button class="btn btn-primary">ওর্ডার নিশিত করুন</button>
                                </div>
                            </form>
                        </div>
                    </div>
                @endif
            </div>
        </section>

        {{-- Why this product  --}}
        @if (isset($product->summary))
            <section class="why-us">

                <div class="row text-center shadow-lg p-3 mb-5 bg-body rounded justify-content-md-center">
                    <h1 style="font-weight: bolder; text-align: center;margin-bottom: 20px; color: #e82a86">কেন গ্যাস
                        সেইফটি ডিভাইস ব্যবহার করবেন? </h1>
                    {{-- align-self-center --}}
                    <div class="col-md-8">

                        {!! $product->summary !!}
                    </div>
                </div>
            </section>
        @endif

        {{-- review sectio --}}
        <section>
            {{-- <div class="row text-center shadow-lg p-3 mb-5 bg-body rounded "> --}}
            {{-- <h1>Customer Review</h1> --}}
            {{-- @foreach ($posts as $n)
                    <div class="col-md-6 about">
                        <img src="{{ url($n->photo) }}" alt="" width="100px">
                    </div>
                @endforeach --}}
            {{-- </div> --}}
            {{-- </section> --}}
            {{-- review sectio end --}}
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
    <footer class="footer">
        <p> All Right Reserved by <a href="TaiTaikids.com" class="text-warning">{{ $company_info->name }}</a>
            Copyright © 2022 <br> Website Design and
            Develop by MDNH</p>
    </footer>

    </div>
    @if (session()->has('script_msg'))
        {!! session()->get('script_msg') !!}
    @endif



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"
        integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
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
        });
    </script>
</body>

</html>
