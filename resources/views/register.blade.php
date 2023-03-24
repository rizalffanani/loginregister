<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Register Akun</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    </head>
    <body>
        <div class="container mt-4 pt-4">
            <div class="row">
                <div class="col-md-5 offset-md-3">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Register Akun Baru</h5>
                            <div class="form-group">
                                <label>Nama</label>
                                <input type="text" class="form-control" id="name" placeholder="masukkan nama">
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="Email" class="form-control" id="email" placeholder="masukkan email">
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" class="form-control" id="password" placeholder="masukkan password">
                            </div>
                            <div class="form-group">
                                <label>Ulangi Password</label>
                                <input type="password" class="form-control" id="password_confirmation" placeholder="Ulangi password">
                            </div>

                            <button class="btn btn-register btn-block btn-success">Daftar</button>
                            Sudah Punya Akun? <a href="/login">Login</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.all.min.js"></script>

        <script>
            $(document).ready(function() {

                $(".btn-register").click( function() {

                    var name = $("#name").val();
                    var email    = $("#email").val();
                    var password = $("#password").val();
                    var password_confirmation = $("#password_confirmation").val();

                    if (name.length == "") {
                        alertMassage('warning','Oops...','Nama Lengkap Wajib Diisi !')
                    } else if(email.length == "") {
                        alertMassage('warning','Oops...','Email Wajib Diisi !')
                    } else if(password.length == "") {
                        alertMassage('warning','Oops...','Password Wajib Diisi !')
                    } else if(password_confirmation.length == "") {
                        alertMassage('warning','Oops...','Ulangi Password Wajib Diisi !')
                    } else {

                        $.ajax({

                            url: "{{ route('register') }}",
                            type: "POST",
                            cache: false,
                            data: {
                                "name": name,
                                "email": email,
                                "password": password,
                                "password_confirmation": password_confirmation,
                            },

                            success:function(response){
                                if (response.success) {
                                    alertMassage('success','Register Berhasil!','silahkan login!')
                                    $("#nama").val('');
                                    $("#email").val('');
                                    $("#password").val('');
                                    $("#password_confirmation").val('');
                                } else {
                                    alertMassage('error','Register Gagal!','silahkan coba lagi!')
                                }
                            },

                            error:function(response){
                                alertMassage('error','Opps!','server error!')
                            }

                        })

                    }

                });

                function alertMassage(type,title,text) {
                    Swal.fire({
                        type: type,
                        title: title,
                        text: text
                    });
                }

            });
        </script>
    </body>
</html>
