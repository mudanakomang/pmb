<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pendaftaran Mahasiswa Baru</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css" >

    <!-- Main css -->
    <link rel="stylesheet" href="css/style.css">
    <link href="css/font-awesome.min.css" rel="stylesheet">

</head>
<body>

    <div class="main">

        <!-- Sign up form -->
        <section class="signup">
            <div class="container">
                <div class="signup-header">
                    <img src="images/header2020.png" alt="sing up image">
                </div>
                <div class="signup-content">

                    <div class="signup-form">
                        <!--<h2 class="form-title">Daftar</h2>-->
                        <h3>Form Pendaftatan Mahasiswa Baru STKIP Suar Bangli</h3>
                        <form method="POST" class="register-form" id="register-form" action="proses.php">
                            <div class="form-group">
                                <label for="nama"><i class="fa fa-user"></i></label>
                                <input type="text" name="nama" id="nama" placeholder="Nama" />
                            </div>
                            <div class="form-group">
                                <label for="nowa"><i class="fa fa-phone"></i></label>
                                <input type="text" name="nowa" id="nowa" placeholder="Nomor WhatsApp" />
                            </div>
                            <div class="form-group">
                                <label for="email"><i class="fa fa-envelope"></i></label>
                                <input type="email" name="email" id="email" placeholder="Email" required/>
                            </div>
                            <div class="form-group">
                                <label for="sekolah"><i class="fa fa-building"></i></label>
                                <input type="text" name="sekolah" id="sekolah" placeholder="Sekolah Asal" required/>
                            </div>
                            <div class="form-group">
                                <label for="alamat"><i class="fa fa-home"></i></label>
                                <input type="text" name="alamat" id="alamat" placeholder="Alamat" required/>
                            </div>
                            <div class="form-group">
                                <input type="checkbox" name="kip" id="kip" class="agree-term" />
                                <label for="kip" class="label-agree-term"><span><span></span></span>Memiliki KIP (Kartu Indonesia Pintar) ? </label>
                            </div>
                            <div class="form-group" id="div_kip">
                                <label for="nomorkip"><i class="fa fa-credit-card"></i></label>
                                <input type="text" name="nomorkip" id="nomorkip" placeholder="Nomor KIP"/>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="signup" id="signup" class="form-submit" onclick="event.preventDefault();formSubmit()" value="Daftar"/>
                                <!--<a class="button" href="javascript:void(0);" onclick="submitForm()">Daftar</a>-->
                            </div>
                        </form>
                    </div>
                    <div class="signup-image">
                        <figure><img src="images/projek1rev3.png" alt="sing up image"></figure>
                    </div>
                </div>
            </div>
        </section>

    </div>

    <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/jquery.validate.min.js"></script>
    <script src="js/additional-methods.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js" ></script>
    <script src="js/main.js"></script>

    <script>


       $(function () {
           var kip=$('#kip')
           var kip_div=$('#div_kip')
           kip_div.hide()
           kip.change(function () {
               if(kip.is(':checked')){
                   kip_div.show()
                   $('#nomorkip').rules('add',{required:true,messages:{required:"Nomor KIP tidak boleh kosong!"}})
               }else{
                   kip_div.hide()
                   $('#nomorkip').rules('remove','required')
                   $('#nomorkip').val('')
               }
           })
       })
    $().ready(function () {
        $.validator.addMethod("regx", function(value, element, regexpr) {
            var re = new RegExp(regexpr)
            return re.test(value);
        }, "Nomor WA tidak valid");
        $('#register-form').validate({
            rules:{
                nama:"required",
                nowa:{
                    required:true,
                    regx:'^(^\\+62\\s?|^0)(\\d{3,4}-?){2}\\d{3,4}$',

                },
                email:{
                    required:true,
                    email:true
                },
                sekolah:"required",
                alamat:"required",
            },
            messages:{
                nama:"Nama harus diisi!",
                nowa:{
                    required:"Nomor WA tidak boleh kosong!",
                    regx:"Nomor WA tidak valid!"
                },
                email:{
                    required:"Email tidak boleh kosong!",
                    email:"Email tidak valid!"
                },
                sekolah:"Sekolah asal harus diisi!",
                alamat:"Alamat harus diisi!"
            }
        })

    })
    function formSubmit() {
        if(confirm("Anda akan dialihkan ke WhatsApp Admin STKIP Suar Bangli.")){
            $.ajax({
                url:'proses.php',
                type:'POST',
                data:{
                    formdata:$('#register-form').serialize()
                },success:function (s) {
                    location.href=s.url
                }
            })
        }
    }
    </script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>