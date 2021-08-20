<?php
$insert = false;
if(isset($_POST['name'])){
    $server = "localhost";
    $username = "root";
    $password = "";

    $con = mysqli_connect($server, $username, $password);

    if(!$con){
        die("connection to this database failed due to" . mysqli_connect_error());
    }
    // echo "Success connecting to the db";

    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $other = $_POST['other'];

    $sql = "INSERT INTO `khanblogsdt`.`contact` (`name`, `phone`, `email`, `other`, `dt`) VALUES ('$name', '$phone', '$email', '$other', CURRENT_TIMESTAMP());";
    // echo $sql;

    if($con->query($sql) == true){
        // echo "successfully inserted";
        $insert = true;
    }
    else{
        echo "ERROR: $sql <br> $con->error";
    }

    $con->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/utils.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/contact.css">
    <link rel="stylesheet" href="css/mobile.css">
    <title>MiyaBlogs - Platform for Blogg Articles</title>
</head>

<body>
    <nav class="navigation max-width-1 m-auto">
        <div class="nav-left">
            <a href="/">
                <img src="img/logo.png" width="96px" alt="MiyaBlogs">
                <!-- <span>Miya Blogs</span> -->
            </a>
            <ul>
                <li><a href="/index.html">Home</a></li>
                <li><a href="#">About</a></li>
                <li><a href="/contact.html">Contact</a></li>
            </ul>
        </div>
        <div class="nav-right">
            <form action="/search.html" method="GET">
                <input class="form-input" type="text" name="query" placeholder="Search articles">
                <button class="btn">Search</button>
            </form>
        </div>
    </nav>
    <div class="max-width-1 m-auto">
        <hr>
    </div>
    <div class="contact-content font1 max-width-1 m-auto">
        <div class="max-width-1 m-auto mx-1">
            <h2>Feel free to Contact me</h2>
            <?php
            if($insert == true) {
            echo "<p class='submitmsg'>Thankyou for sharing your query with me!</p>";
        }
            ?>
            <div class="contact-form">
                <div class=" form-box ">
                    <form action="index.php" method="post">
                        <input type="text" name="name" id="name " placeholder="Enter your name: ">
                </div>
                <div class="form-box ">
                    <input type="text" name="phone" id="phone" placeholder="Enter your Phone Number: ">
                </div>
                <div class="form-box ">
                    <input type="text" name="email" id="email " placeholder="Enter your email-id: ">
                </div>
                <div class="form-box ">
                    <textarea name="other" id="other " cols="30 " rows="10 " placeholder="How may I help you? "></textarea>
                </div>
                <div class="form-box ">
                    <button class="btn ">Submit</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <div class="footer ">
        <p>Copyright &copy; MiyaBlogs.com.np</p>
        <a href="https://www.vecteezy.com/free-vector/typing ">Vector credits: Vecteezy</a>
        <!-- <a href="https://www.vecteezy.com/free-vector/web ">Web Vectors by Vecteezy</a> -->
        <!-- <a href="https://www.vecteezy.com/free-vector/icons ">Icons Vectors by Vecteezy</a> -->
        <!-- <a href="https://www.vecteezy.com/free-vector/article-template ">Article Template Vectors by Vecteezy</a> -->
    </div>
    <!-- INSERT INTO `contact` (`sno`, `name`, `phone`, `email`, `other`, `dt`) VALUES ('1', 'testname', '9999999999', 'this@this.com', 'This is a good database.', CURRENT_TIMESTAMP); -->
</body>

</html>