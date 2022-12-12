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
if (isset($_POST['title']) && isset($_POST['content']) && isset($_POST['sbmt'])) {
    $title = $_POST['title'];
    $content = $_POST['content'];

    if($_POST['sbmt'] == 'new_post')
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
    <p class="text-center w-responsive mx-auto">Hi <?php echo "<b>".$_SESSION['username']."</b>"; ?>! On CN Forum you are free to create a post/thread on any topic. The CN Chief Officers will respond in no time!</p>
    <p onclick="ajaxGetNumOfPosts()" class="text-center w-responsive mx-auto"><i id="getnumposts">click me!</i></p>

    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10 mb-md-0 mb-5">
            <form action="" method="POST" name="post" id="post">
                <div class="row">
                    <div class="col-md-12">
                        <div class="md-form mb-0">
                            <label for="name" class="">Post title: <i><span style="color:red" id="error_title_label"></span></i></label>
                            <input type="text" id="title" onchange="validateContent('post')" name="title" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">

                        <div class="md-form">
                            <label for="message">Your message: <i><span style="color:red" id="error_content_label"></span></i></label>
                            <textarea type="text" onchange="validateContent('post')" id="content" name="content" rows="10" class="form-control md-textarea"></textarea>
                        </div>

                    </div>
                </div>

                <div class="text-center text-md-left" style="margin-top:20px">
                    <!-- <a class="btn btn-primary" onclick="document.getElementById('contact-form').submit();">Submit</a> -->
                    <!-- <input type="submit" name="submit" value="new_post"> -->
                    <button type="button" onclick="validatePost()">Post</button>
                    <input type="text" name="sbmt" value="new_post" style="display:none">
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

<script type="">
    // OVDE PROVERI FORM VALIDATION
    function validateContent(str)
    {
        if(document.forms[str]['content'].value == ""){
            document.forms[str]['content'].style.border = "2px dashed red";
            document.getElementById('error_content_label').innerHTML = ' : fali sadrzaj posta';
            return false;
        }
        else
        {
            document.forms[str]['content'].style.border = "";
            document.getElementById('error_content_label').innerHTML = "";
            return true;
        }
    }

    function validateTitle(str)
    {
        if(document.forms[str]['title'].value == ""){
            document.forms[str]['title'].style.border = "2px dashed red";
            document.getElementById('error_title_label').innerHTML = ' : fali naslov';
            return false;
        }
        else
        {
            document.forms[str]['title'].style.border = "";
            document.getElementById('error_title_label').innerHTML = "";
            return true;
        }
    }

    function validatePost(){
        if(validateTitle('post') * validateContent('post'))
        {
            console.log('radi');
            document.getElementById('post').submit();
        }
        else
        {
            console.log("ne radi");
        }

        return;
    }
//event listener on every input box, while typing, it checks
    // username must not be empty

    // password must not be empty
    // email must not be empty
    // email must follow mail address rules

</script>

<?php require "static/footer.php"; ?>