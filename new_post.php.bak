<?php 

require "dbBroker.php";

session_start();

if (empty($_SESSION['loggeduser']) || $_SESSION['loggeduser'] == '') {
    header("Location: index.php");
    die();
}

require "static/header.php";
require "model/post.php";

# listen to post requests
if (isset($_POST['title']) && isset($_POST['content']) && isset($_POST['submit'])) {
    $title = $_POST['title'];
    $content = $_POST['content'];

    if($_POST['submit'] == 'new_post')
    {    
        $time = date('Y-m-d H:i:s');
        $author = $_SESSION['user_id'];
        $rs = Post::add($title, $time, $content, $author, $conn);

        echo "Uspesno ste postovali!";
        header('Location: forum.php');
        exit();
    }
}

?>

<!-- samo forma za unos title, content posta i poziv staticke funkcije za create post -->

<div class="container-fluid">
    <section class="mb-4">

    <h2 class="h1-responsive font-weight-bold text-center my-4">Add new post</h2>
    <p class="text-center w-responsive mx-auto">Hi <?php echo "<b>".$_SESSION['username']."</b>"; ?>! On MN Forum you are free to create a post/thread on any topic you wish!</p>
    <p onclick="ajaxGetNumOfPosts()" class="text-center w-responsive mx-auto mb-5"><i id="getnumposts">click me!</i></p>

    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10 mb-md-0 mb-5">
            <form action="" method="POST">
                <div class="row">
                    <div class="col-md-12">
                        <div class="md-form mb-0">
                            <label for="name" class="">Post title:</label>
                            <input type="text" id="name" name="title" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">

                        <div class="md-form">
                            <label for="message">Your message:</label>
                            <textarea type="text" id="message" name="content" rows="10" class="form-control md-textarea"></textarea>
                        </div>

                    </div>
                </div>

                <div class="text-center text-md-left" style="margin-top:20px">
                    <!-- <a class="btn btn-primary" onclick="document.getElementById('contact-form').submit();">Submit</a> -->
                    <input type="submit" name="submit" value="new_post">
                </div>
            </form>
        </div>
    </div>
    </section>
</div>

<script type="text/javascript">
function ajaxGetNumOfPosts()
{
    var xmlHttp;
    try
    {
        // Firefox, Opera 8.0+, Safari
        xmlHttp=new XMLHttpRequest();
    }
    catch (e)
    {
        // Internet Explorer
        try
        {
            xmlHttp=new ActiveXObject("Msxml2.XMLHTTP");
        }
        catch (e)
        {
            try
            {
                xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
            }
            catch (e)
            {
                alert("Your browser does not support AJAX!");
                return false;
            }
        
        }
    }

    var url="api/numofpost.php";
    console.log(url);
    xmlHttp.open("GET",url,true);
    xmlHttp.send(null);

    xmlHttp.onreadystatechange=function()
    {
        if(xmlHttp.readyState==4)
        {
            console.log(xmlHttp.responseText);
            document.getElementById('getnumposts').innerHTML = xmlHttp.responseText;
        }
    }
}
</script>

<?php require "static/footer.php"; ?>