@extends('layouts.app')

@section('content')
<title>Pendaftaran | Layanan Pengaduan Masyarakat </title>
<body>
<div class="container">
    <div class="row mt-5">
        <div class="col-md-4"></div>
            <div class="col-md-4 bg-light shadow-2 rounded">
                <div class="card-body ">
                @if( Session::get('alert') !="")
                    <div class='alert alert-success'><center><b>{{Session::get('alert')}}</b></center></div>       
                @endif
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        <center><b>{{ session('status') }}</b></center>
                    </div>
                @endif
                <form method="POST" action="/daftar_post">
                    @csrf
                    <div class="form-group">
                        <label for="nik">NIK : @error('nik') <span class="text-danger">{{$message}} </span> @enderror </label>
                        <input type="number" name="nik" class="form-control" onKeyPress="if(this.value.length==16) return false;" value="{{old('nik')}}">
                    </div>
                    
                    <div class="form-group">
                        <label for="nama">Nama : @error('nama') <span class="text-danger">{{$message}} </span> @enderror </label>
                        <input type="text" name="nama" class="form-control" value="{{old('nama')}}">
                    </div>
                    
                    <div class="form-group">
                        <label for="username">Username : @error('username') <span class="text-danger">{{$message}} </span> @enderror </label>
                        <input type="text" name="username" class="form-control" value="{{old('username')}}">
                    </div>
                    
                    <div class="form-group">
                        <label for="email">Email : @error('email') <span class="text-danger">{{$message}} </span> @enderror </label>
                        <input type="email" name="email" class="form-control" value="{{old('email')}}">
                    </div>
                    
                    <div class="form-group">
                        <label for="alamat">Alamat : @error('alamat') <span class="text-danger">{{$message}} </span> @enderror </label>
                        <input type="alamat" name="alamat" class="form-control" value="{{old('alamat')}}">
                    </div>
                    <div class="form-group">
                        <label for="telp">No. Telp : @error('telp') <span class="text-danger">{{$message}} </span> @enderror </label>
                        <input type="number" name="telp" class="form-control" value="{{old('telp')}}">
                    </div>

                    <div class="form-group">
                        <label for="myInput">Password :  @error('password') <span class="text-danger">{{$errors->first('password') }} </span> @enderror </label>
                    <div class="input-group input-group-xs">
                        <input id="myInput" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required data-toggle="password">                        <div class="input-group-append">
                            <i onclick="myFunction()" class="fa fa-eye btn btn-primary" id="mata"></i>
                        </div>
                    </div>
                    
                    </div>
                    
                    <div class="form-group">
                        <label for="myInput2">Password Confirm :</label>
                    <div class="input-group input-group-xs">
                        <input id="myInput2" type="password" class="form-control{{ $errors->has('password_confirmation') ? ' is-invalid' : '' }}" name="password_confirmation" required data-toggle="password_confirmation">      
                        <div class="input-group-append">
                            <i onclick="myFunction2()" class="fa fa-eye btn btn-primary" id="mata2"></i>
                        </div>
                    </div>
                    
                    </div>
                    
                    <button type="submit" class="btn btn-primary w-100 mb-2">
                        Register
                    </button>
                    <a href = "javascript:history.back()"class="btn btn-primary w-100 mb-2">Kembali</a>
               
            </div>
        </div>
    </div>
</div>

</body>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">

</script>

<script  src="/path/to/bootstrap-show-password.js"></script>

<script>
$('#exampleModal').on('show.bs.modal', function (event) {
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
  if (x.type=== "password") {
    x.type = "text";
    $("#mata").toggleClass("fa-eye-slash");
  } else if (x.type === "text") {
    x.type = "password";
    $("#mata").removeClass("fa-eye-slash");
  }
  
}


function myFunction2() {
  var x = document.getElementById("myInput2");
  var z = document.getElementById("mata2");
  if (x.type=== "password") {
    x.type = "text";
    $("#mata2").toggleClass("fa-eye-slash");
  } else if (x.type === "text") {
    x.type = "password";
    $("#mata2").removeClass("fa-eye-slash");
  }
  
}



</script>
@endsection
