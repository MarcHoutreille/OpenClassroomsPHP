<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Major+Mono+Display&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    
    <link href="https://fonts.googleapis.com/css2?family=PT+Mono&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css" class="style">
    <title>Welcome</title>
</head>

<body class="bg-dark" style="height:100%;">
    <main>
        <!-- main div !-->
        <div class="h-100 d-flex justify-content-center align-items-center" style="padding-top:17%">
            <div>
                <!-- signup button -->
                <div class="px-4" id="signup">
                    <div class="btn-1 orange" href="" class="m-5 px-2">
                        <h3 style="cursor:pointer" class="monotext">sign up </h3>
                    </div>
                </div>


            </div>

            <div>
                <!-- login button -->
                <div class="px-4" id="login">
                    <div class="" href="" class="m-5 px-2">
                        <h3 style="cursor:pointer" class="monotext">log in </h3>
                    </div>
                </div>

            </div>

        </div>
        <div class="d-flex justify-content-center m-4">
            <section class="d-none" id="signupbox">

                <!-- formulaire de sign up -->
                <form autocomplete="off" action="signup_post.php" class="orange" method="post">
                    <p><label for="nickname" class="fw-bold">Nickname  <input style="width: 200px;" type="text" name="nickname"></label></p>
                    <span class="d-flex justify-content-between">
                        <p><label for="email" class="fw-bold">E-mail  &nbsp;&nbsp;<input class="" style="width: 200px;" type="text" name="email"></label></p>
                    </span>
                    <p><label for="password" class="fw-bold">Password  <input style="width: 200px;" type="password" name="password"></label></p>
                    <p><label for="confirm" class="fw-bold">Confirm&nbsp; <input style="width: 200px;" type="password" name="confirm"></label></p>

                    <input class="monotext bg-dark" type="submit" value="Sign up" />
                </form>
            </section>
            <section class="d-none" id="loginbox">

                <!-- formulaire de login -->
                <form autocomplete="off" action="login_post.php" class="orange" method="post">
                    <p><label for="nickname" class="fw-bold">Nickname  <input style="width: 200px;" type="text" name="nickname"></label></p>
                    <p><label for="password" class="fw-bold">Password  <input style="width: 200px;" type="password" name="password"></label></p>
                    
                    <input class="monotext bg-dark" type="submit" value="Log in" />
                </form>
            </section>
        </div>
    </main>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
<script>
    let loginbox = document.getElementById("loginbox")
    let signupbox = document.getElementById("signupbox")

    document.getElementById("login").addEventListener("click", function() {

        if (loginbox.classList.contains("d-none")) {
            if (signupbox.classList.contains("d-inline")) {
                signupbox.classList.remove("d-inline")
                signupbox.classList.add("d-none")
                loginbox.classList.remove("d-none")
                loginbox.classList.add("d-inline")
            } else {
                loginbox.classList.remove("d-none")
                loginbox.classList.add("d-inline")
            }
        } else {
            loginbox.classList.remove("d-inline")
            loginbox.classList.add("d-none")
        }
    })

    document.getElementById("signup").addEventListener("click", function() {

        if (signupbox.classList.contains("d-none")) {
            if (loginbox.classList.contains("d-inline")) {
                loginbox.classList.remove("d-inline")
                loginbox.classList.add("d-none")
                signupbox.classList.remove("d-none")
                signupbox.classList.add("d-inline")
            } else {
                signupbox.classList.remove("d-none")
                signupbox.classList.add("d-inline")
            }
        } else {
            signupbox.classList.remove("d-inline")
            signupbox.classList.add("d-none")
        }

    })
</script>

</html>