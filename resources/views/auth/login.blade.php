@extends('layouts.app')

@section('content')
<title>Login | Aplikasi Pengaduan Masyarakat</title>

<body>
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-4"></div>
            <div class="col-md-4 bg-light shadow-2 rounded">
                <div class="card-body ">
                    <h1 class="card-title text-center"><br>
                        <h2>
                            <center>
                                <font class="text-primary"><b>Login</b></font>
                        </h2>
                    </h1>
                    <p class="text-center" style="font-style: Helvetica">Sistem Layanan Pengaduan PJU Dinas Perhubungan Sambas</p>
                    </center>
                    <hr>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input id="username" autofocus type="text" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" value="{{ old('username') }}" required>
                        </div>
                        <div class="form-group">
                            <label for="myInput">Password</label>
                            <div class="input-group input-group-xs">
                                <input id="myInput" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required data-toggle="password">

                                <div class="input-group-append">
                                    <i onclick="myFunction()" class="fa fa-eye btn btn-primary" id="mata"></i>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary w-100 mb-2">
                            {{ __('Login') }}
                        </button>

                        <a class="btn btn-primary w-100 mb-2" href="/daftar">{{ __('Register') }}</a>
                        <div class="alert alert-success" role="alert">
                            <br>Belum punya akun? Lakukan Registerasi</br>
                        </div>
                        @if( Session::get('alert') !="")
                        <div class='alert alert-success'>
                            <center><b>{{Session::get('alert')}}</b></center>
                        </div>
                        @endif
                        @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            <center><b>{{ session('status') }}</b></center>
                        </div>
                        @endif
                        <br>
                        <br>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>

</body>

<script>
    $('#exampleModal').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var recipient = button.data('whatever') // Extract info from data-* attributes
        // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
        // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
        var modal = $(this)
        modal.find('.modal-title').text('New message to ' + recipient)
        modal.find('.modal-body input').val(recipient)
    })


    $("#password").password('toggle');

    function myFunction() {
        var x = document.getElementById("myInput");
        var z = document.getElementById("mata");
        if (x.type === "password") {
            x.type = "text";
            $("#mata").toggleClass("fa-eye-slash");
        } else if (x.type === "text") {
            x.type = "password";
            $("#mata").removeClass("fa-eye-slash");
        }

    }
</script>
@endsection
