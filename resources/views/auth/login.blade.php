<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Company Title</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;900&display=swap');

    input {
        caret-color: red;
    }

    body {
        margin: 0;
        width: 100vw;
        /* height: 100vh; */
        background: #ecf0f3;
        display: flex;
        align-items: center;
        text-align: center;
        justify-content: center;
        place-items: center;
        /* overflow: hidden; */
        font-family: poppins;
    }

    .container {
        position: relative;
        /* width: 350px;
    height: 500px; */
        margin-top: 40px;
        border-radius: 20px;
        padding: 10px 40px 20px 40px;
        box-sizing: border-box;
        background: #ecf0f3;
        box-shadow: 14px 14px 20px #cbced1, -14px -14px 20px white;
    }

    /* .brand-logo {
    height: 100px;
    width: 100px;
    background: url("https://img.icons8.com/color/100/000000/twitter--v2.png");
    margin: auto;
    border-radius: 50%;
    box-sizing: border-box;
    box-shadow: 7px 7px 10px #cbced1, -7px -7px 10px white;
    } */

    .company-details {
        margin-top: 10px;
        font-weight: 900;
        font-size: 1.8rem;
        color: #1DA1F2;
        letter-spacing: 1px;
        text-align: center;
    }

    .inputs {
        text-align: left;
        margin-top: 30px;
    }

    label,
    input,
    button {
        display: block;
        width: 100%;
        padding: 0;
        border: none;
        outline: none;
        box-sizing: border-box;
    }

    label {
        margin-bottom: 4px;
    }

    label:nth-of-type(2) {
        margin-top: 12px;
    }

    input::placeholder {
        color: gray;
    }

    input {
        background: #ecf0f3;
        padding: 10px;
        padding-left: 20px;
        height: 50px;
        font-size: 14px;
        border-radius: 50px;
        box-shadow: inset 6px 6px 6px #cbced1, inset -6px -6px 6px white;
    }

    button {
        color: white;
        margin-top: 20px;
        background: #1DA1F2;
        height: 40px;
        border-radius: 20px;
        cursor: pointer;
        font-weight: 900;
        box-shadow: 6px 6px 6px #cbced1, -6px -6px 6px white;
        transition: 0.5s;
    }

    button:hover {
        box-shadow: none;
    }

    a {
        position: absolute;
        font-size: 8px;
        bottom: 4px;
        right: 4px;
        text-decoration: none;
        color: black;
        background: yellow;
        border-radius: 10px;
        padding: 2px;
    }

    h1 {
        position: absolute;
        top: 0;
        left: 0;
    }
</style>

<body>


    <div class="container">
        {{-- <div class="brand-logo"></div> --}}
        <div class="company-details text-center">
            <h1>Login</h1>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger">
                @foreach ($errors->all() as $err)
                    <p>{{ $err }}</p>
                @endforeach
            </div>
        @endif

        <form action="{{ route('login') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="inputs tab" id="tab-1">

                <label>E-Mail
                    <input type="email" name="email" value="{{ old('email') }}" placeholder="Inter your email" />
                </label>

                <label>Password
                    <input type="password" name="password" value="{{ old('password') }}" />
                </label>
                <!-- Session Status -->
                <x-auth-session-status class="mb-4" :status="session('status')" />

                <!-- Validation Errors -->
                <x-auth-validation-errors class="mb-4" :errors="$errors" />

                <div class="row">
                    <div class="col-sm-6 text-right">
                        <button class="btn btn-success">Save</button>
                    </div>
                </div>
            </div>
        </form>
        {{-- <a href="#">MADE BY Nobir</a> --}}
    </div>

</body>

</html>
