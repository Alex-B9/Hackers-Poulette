<?php
session_start();
//$_SESSION['ErrFirstName'];
//$_SESSION['ErrLastName'];
//$_SESSION['ErrCountry'];
//$_SESSION['ErrEmail'];
//$_SESSION['ErrMessage'];
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="Contact_page">
    <link rel="stylesheet" href="style/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bellota+Text:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700&display=swap" rel="stylesheet">
    <title>Hackers Poulettes</title>
</head>
<body>
<?php
//$_SESSION['ErrFirstName'];
//$_SESSION['ErrLastName'];
//$_SESSION['ErrCountry'];
//$_SESSION['ErrEmail'];
//$_SESSION['ErrMessage'];
if (!empty($_SESSION['ErrLastName'])){
    echo $_SESSION['ErrLastName'];
}
if (!empty($_SESSION['ErrFirstName'])){
    echo $_SESSION['ErrFirstName'];
}
if (!empty($_SESSION['ErrCountry'])){
    echo $_SESSION['ErrCountry'];
}
if (!empty($_SESSION['ErrMessage'])){
    echo $_SESSION['ErrMessage'];
}
?>
    <div class="container">
        <div class="logo">
            <a href="#Home">
                <img src="/src/assets/img/hackers-poulette-logo.png" alt="logo">
            </a>
        </div>
        <div class="box_container">

            <div class="text_content">
                <h1>CONTACT</h1>
                <p>An observation ? A suggestion ? </p>
                <p> Do not hesitate to write to me !</p>
            </div>
            <form method="POST" action="mail.php">
                <div class="name">
                    <input type="text" name="lastname" placeholder="Lastname"
                           >
                    <input type="text" name="firstname" placeholder="Firstname"
                           >
                </div>
                <div>

<!--                    <select name="Gender">-->
<!--                        <option value="choose">Select gender</option>-->
<!--                        <option value="Man">Man</option>-->
<!--                        <option value="Woman">Woman</option>-->
<!--                    </select>-->
                    <input type="text" placeholder="Country" name="country">
                </div>
                <div>
                    <input type="text" name="email" placeholder="Email" >
                </div>
                <div class="gender">
                    <div>
                        <input type="radio" name="gender" value="man"
                               checked>
                        <label for="man">♂</label>
                    </div>
                    <div>
                        <input type="radio" name="gender" value="woman">
                        <label for="woman">♀</label>
                    </div>
                </div>
                <div>
                    <select name="subject">
                        <option value="choose"> Select subject </option>
                        <option value="subject1">subject1</option>
                        <option value="subject2">subject2</option>
                        <option value="subject3">subject3</option>
                    </select>
                </div>
                <div>
                    <textarea name="message" id="message"
                              placeholder="Your message here" cols="50"
                              rows="7" ></textarea>
                </div>
                <div>
                    <input name="submit" type="submit" value="Send">
                </div>
            </form>
        </div>
    </div>
</body>
</html>

<?php
session_destroy();