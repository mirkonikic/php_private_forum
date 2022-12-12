<?php 
require "static/header.php";
require "dbBroker.php";
require "model/user.php";

# check if user is logged in -> sto ovde nije tolko bitno, bitnije je na forum.php

# check if there is any post data
# if its login, send user to forum
if ((isset($_POST['username']) && isset($_POST['password']) && isset($_POST['sbmt'])) || (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['email']) && isset($_POST['sbmt']))) {
    $name = $_POST['username'];
    $password = $_POST['password'];

    if($_POST['sbmt'] == 'login')
    {    
        $rs = User::logIn($name, $password, $conn);

        if ($rs->num_rows == 1) {
            echo "Uspesno ste se prijavili";
            $_SESSION['loggeduser'] = "prijavljen";
            $result = $rs->fetch_row();
            $_SESSION['user_id'] = $result[0];
            $_SESSION['admin'] = $result[3];
            $_SESSION['email'] = $result[4];
            $_SESSION['username'] = $name;
            header('Location: forum.php');
            exit();
        } else {
            //promeni 
            echo '<script type="text/javascript">alert("Pogresni podaci za login");
                        window.location.href = "http://localhost/iteh/";</script>';
            exit();
        }
    }
    elseif($_POST['sbmt'] == 'register')
    {
        $email = $_POST['email'];
        $rs = User::register($name, $password, $email, $conn);

        echo "Uspesno ste se Registrovali!";
        header('Location: index.php');
        exit();
    }
    else
    {
        echo $_POST['submit'];
    }

}
else
{

}

?>
<!-- mid section -->

<!-- ovde 
    1. home page -> Main part; Login/Register; About
    2. forum -> CRUD nad postovima
    3. posts -> PostContent; Comments
    4. profile -> Image; Info
    5. api/ create read update delete
-->

<!-- Main -> lep dizajn showcase -->
<!-- Login -> samo login i register forme -->
<?php if (empty($_SESSION['loggeduser']) || $_SESSION['loggeduser'] == ''){
?>
<div class="container-fluid" style="">
    <section class="h-100 h-custom gradient-custom-2">
    <h1 style="padding-top:50px; text-align:center; font-family:fantasy;">MN Forum</h1>
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12">
            <div class="card card-registration card-registration-2" style="border-radius: 15px;">
            <div class="card-body p-0">
                <div class="row g-0">
    <!-- Login -->
                <div class="col-lg-6">
                    <form method="post" action="" name="log" id="log">
                        <div class="p-5">
                        <h3 class="fw-normal mb-5" style="color: #4835d4;">Login</h3>

                        <div class="row">
                            <div class="col-md-6 mb-4 pb-2">

                            <div class="form-outline">
                                <label class="form-label" for="log_usrnm">Username: <i><span id="error_log_usrnm" style="color:red;"></span></i></label>
                                <input type="text" name="username" onchange="validateUsername('log')" id="log_usrnm" class="form-control form-control-lg" />
                            </div>

                            </div>
                            <div class="col-md-6 mb-4 pb-2">

                            <div class="form-outline">
                                <label class="form-label" for="log_pwd">Password: <i><span id="error_log_pswd" style="color:red;"></span></i></label>
                                <input type="password" name="password" onchange="validatePassword('log')" id="log_pwd" class="form-control form-control-lg" />
                            </div>

                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <button type="button" id="login" onclick="validateLogin()">Login</button>    
                                <input type="text" name="sbmt" value="login" style="display:none">
                            </div>
                        </div>

                        </div>
                    </form>
                </div>
    <!-- Register -->
                <div class="col-lg-6">
                    <form method="post" action="" id="reg" name="reg">
                        <div class="p-5">
                        <h3 class="fw-normal mb-5">Register</h3>

                        <div class="row">
                            <div class="col-md-5 mb-4 pb-2">

                            <div class="form-outline form-white">
                                <label class="form-label" for="reg_usrnm">Username: <i><span id="error_reg_usrnm" style="color:red;"></span></i></label>
                                <input type="text" name="username" onchange="validateUsername('reg')" id="reg_usrnm" value="" class="form-control form-control-lg" />
                            </div>

                            </div>
                            <div class="col-md-7 mb-4 pb-2">

                            <div class="form-outline form-white">
                                <label class="form-label" for="reg_pwd">Password: <i><span id="error_reg_pswd" style="color:red;"></span></i></label>
                                <input type="password" name="password" onchange="validatePassword('reg')" id="reg_pwd" class="form-control form-control-lg" />
                            </div>

                            </div>
                        </div>

                        <div class="mb-4 pb-2">
                            <div class="form-outline form-white">
                            <label class="form-label" for="reg_email">Email: <i><span id="error_reg_mail" style="color:red;"></span></i></label>
                            <input type="text" name="email" onchange="validateEmail('reg')" id="reg_email" class="form-control form-control-lg" />
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <button type="button" id="register" onclick="validateRegister()">Register</button>
                                <input type="text" name="sbmt" value="register" style="display:none">
                            </div>
                        </div>

                        </div>
                    </form>
                </div>
                </div>
            </div>
            </div>
        </div>
        </div>
    </div>
    </section>
</div>

<?php }else {
    header("Location: forum.php");
    die();
}
?>

<script type="">
    // OVDE PROVERI FORM VALIDATION
    function isEmailValid (email) {
        console.log(email);
        let re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        return re.test(email);
    }

    const isPasswordSecure = (password) => {
        let re = new RegExp("^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{8,})");
        return re.test(password);   
    };

    function validatePassword(str)
    {
        if(document.forms[str]['password'].value == ""){
            document.forms[str]['password'].style.border = "2px dashed red";
            document.getElementById('error_'+str+'_pswd').innerHTML = 'fali password';
            return false;
        }
        else
        {
            document.forms[str]['password'].style.border = "";
            document.getElementById('error_'+str+'_pswd').innerHTML = "";
            return true;
        }
    }

    function validateUsername(str)
    {
        if(document.forms[str]['username'].value == ""){
            document.forms[str]['username'].style.border = "2px dashed red";
            document.getElementById('error_'+str+'_usrnm').innerHTML = 'fali username';
            return false;
        }
        else
        {
            document.forms[str]['username'].style.border = "";
            document.getElementById('error_'+str+'_usrnm').innerHTML = "";
            return true;
        }
    }

    function validateEmail(str)
    {
        if(isEmailValid(document.forms[str]['email'].value)){
            document.forms[str]['email'].style.border = "";
            document.getElementById('error_'+str+'_mail').innerHTML = "";
            return true;
        }
        else
        {
            document.forms[str]['email'].style.border = "2px dashed red";
            document.getElementById('error_'+str+'_mail').innerHTML = "neispravan format email-a";
            return false;
        }
    }

    function validateRegister(){
        if(validateUsername('reg') * validatePassword('reg') * validateEmail('reg'))
        {
            console.log('radi');
            document.getElementById('reg').submit();
        }

        return;
    }

    function validateLogin(){
        if(validateUsername('log') * validatePassword('log'))
        {
            console.log('radi');
            document.getElementById('log').submit();
        }

        return;
    }
//event listener on every input box, while typing, it checks
    // username must not be empty

    // password must not be empty
    // email must not be empty
    // email must follow mail address rules

</script>

<!-- footer -->
<?php 
require "static/footer.php"
?>