<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Login</title>
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
                            <h5 class="card-title">Silahkan Login</h5>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="Email" class="form-control" id="email" placeholder="masukkan email">
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" class="form-control" id="password" placeholder="masukkan password">
                            </div>

                            <button class="btn btn-register btn-block btn-success">Login</button>
                            Sudah Punya Akun? <a href="/register">Daftar</a>
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

                    var email    = $("#email").val();
                    var password = $("#password").val();

                    if(email.length == "") {
                        alertMassage('warning','Oops...','Email Wajib Diisi !')
                    } else if(password.length == "") {
                        alertMassage('warning','Oops...','Password Wajib Diisi !')
                    } else {

                        $.ajax({

                            url: "{{ route('login') }}",
                            type: "POST",
                            cache: false,
                            data: {
                                "email": email,
                                "password": password,
                            },

                            success:function(response){
                                if (response.success) {
                                    Swal.fire({
                                        type: 'success',
                                        title: 'Login Berhasil!',
                                        text: 'Anda akan di arahkan dalam 3 Detik',
                                        timer: 3000,
                                        showCancelButton: false,
                                        showConfirmButton: false
                                    }).then (function() {
                                        window.location.href = "{{ route('home.index') }}";
                                    });
                                    localStorage.setItem('data', JSON.stringify(response.user))
                                    localStorage.setItem('token', "Bearer "+response.token)
                                } else {
                                    alertMassage('error','Login Gagal!','silahkan coba lagi!')
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
