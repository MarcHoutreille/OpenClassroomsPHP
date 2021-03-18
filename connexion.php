<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

    <title>Login page</title>
</head>
<style>

</style>

<body style="background-color:lightgrey;">
    <header>
        <p>Hello !</p>
    </header>
    <div class="container">
        <div class="row">
            <div class="col-3 offset-3 p-5 ">
                <div class="formulaire bg-secondary p-2 rounded shadow-lg" style="width:100%*">
                    <form action="connexion_check.php" method="post">
                        <p><label for="pseudo" class="fw-bold">Nickname : <input type="text" name="pseudo"></label></p>
                        <p><label for="message" class="fw-bold">Password : <input type="password" name="password"></label></p>

                        <input type="submit" value="Log in" />
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>