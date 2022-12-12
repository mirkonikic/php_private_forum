<?php 

require "dbBroker.php";
require "model/post.php";
require "model/user.php";

session_start();

if (empty($_SESSION['loggeduser']) || $_SESSION['loggeduser'] == '') {
    header("Location: index.php");
    die();
}

require "static/header.php"

?>
<div class="container-fluid">
    <section class="mb-4">

    <h2 class="h1-responsive font-weight-bold text-center my-4">Welcome <?php echo "<b>".$_SESSION['username']."</b>"; ?>!</h2>
    <p style="display:none" id="whoami"><?php echo $_SESSION['username']; ?></p>
    <p class="text-center w-responsive mx-auto mb-5">On MN Forum you are free to read a post/threead on any topic you wish!</p>

    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10 mb-md-0 mb-5">

<?php 
$rows=Post::getPosts($conn)->fetch_all();
array_multisort( array_column($rows, 0), SORT_DESC, $rows );
$nmbr = 1;
foreach($rows as $row):?>
    <div class="d-flex justify-content-center" style="margin:5px">
        <div class="col-md-4"></div>
        <div style="border-radius:12px; border:solid 1px black; padding:5px" class="col-md-4">
            <div class="row">
                <div class="col-md-1"><p style="display:inline"><?php echo $nmbr.".  "; ?></p></div>
                <div class="col-md-11">
                    <img src="img/default_pfp.jpg" class="rounded-circle" height="25" alt="Black and White Portrait of a Man" loading="lazy" />
                    <?php echo User::getUserById($row[4], $conn)->fetch_row()[1].":  "; ?>
                    <a href="post.php?id=<?php echo $row[0]; ?>"> <?php echo $row[1] ?> </a>
                    <br>
                    <p style="display:inline; color:lightgray" class="dateposted"> <?php echo $row[2]; ?> </p>
                    <p class="howmanydayspassed">  </p>
                </div>
            </div>
        </div>
        <div class="col-md-4"></div>
    </div>
<?php $nmbr++; endforeach;?>
        </div>
    </div>
    </section>
</div>

<script type="">
//calculate days ago for each post
    dates = document.getElementsByClassName("dateposted");
    howmanydayspasseds = document.getElementsByClassName("howmanydayspassed");

    for (var i = 0; i < dates.length; i++) {
        howmanydayspasseds[i].innerHTML = "   ("+count_days_passed(dates[i].innerHTML.split()[0])+" days ago)";
    }

    function count_days_passed(date)
    {
        //var days_passed = Math.floor(Math.abs(Date.parse(new Date) - Date.parse(date)) / 1000 / 86400);
        //document.getElementById('howmanydayspassed').innerHTML = "    (" + days_passed + " days ago)";
        return Math.floor(Math.abs(Date.parse(new Date) - Date.parse(date)) / 1000 / 86400);
    }

//when filter gets clicked, AJAX the posts from that user to me
</script>

<?php require "static/footer.php" ?>