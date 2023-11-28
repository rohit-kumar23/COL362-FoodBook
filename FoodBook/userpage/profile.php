<?php
session_start();

if (! isset($_SESSION['id']) || ! isset($_SESSION['username'])) {
    header("Location: /../access/logout.php");
}

require_once '../db_setup.php';

$connection_string = "host = {$host} port = {$port} dbname = {$dbname} user = {$user} password = {$password} ";
$dbconn = pg_connect($connection_string);

if (!$dbconn) {
    echo "error connecting database";
    exit();
}

$username = $_SESSION['username'];
$id = $_SESSION['id'];

$sql = "select * from users where username = '" . $username . "' and id ='" . $id . "'";
$data = pg_query($dbconn, $sql);
$row = pg_fetch_assoc($data);

$query_posts = "SELECT * FROM recipe WHERE creatoruserid = $id";
$query_friends = "SELECT user2id as friendid FROM user_knows_user WHERE user1id = $id
                UNION
                SELECT user1id as friendid FROM user_knows_user WHERE user2id = $id";

$data_posts = pg_query($dbconn, $query_posts);
$data_friends = pg_query($dbconn, $query_friends);

$num_posts = pg_num_rows($data_posts);
$num_friends = pg_num_rows($data_friends);

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <title>FoodBook</title>
</head>

<style>
    body {
        overflow: hidden;
    }
</style>

<body>
    <div class="pages">
        <div id="userpage">

            <div id="sidebar2">

                <div id="sidebar">

                    <div id="logo1">
                        <img src="images/foodbook2.png" alt="FoodBook">
                    </div>

                    <div id="logo2">
                        <img class="logo2-pic" src="images/logo2.png" alt="FoodBook">
                    </div>

                    <div id="navigation">

                        <div class="nav-box">
                            <div class="mini-box" id="hbtn">
                                <div class="navigate nav-box-icon">
                                    <svg aria-label="Home" color="rgb(0, 0, 0)" fill="rgb(0, 0, 0)" height="24"
                                        role="img" viewBox="0 0 24 24" width="24">
                                        <path
                                            d="M9.005 16.545a2.997 2.997 0 0 1 2.997-2.997A2.997 2.997 0 0 1 15 16.545V22h7V11.543L12 2 2 11.543V22h7.005Z"
                                            fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="2">
                                        </path>
                                    </svg>
                                </div>
                                <div class="navigate nav-box-name">
                                    <a href="#" class="icon-name">Home</a>
                                </div>
                            </div>
                        </div>

                        <div class="nav-box">
                            <div class="mini-box" id="sbtn">
                                <div class="navigate nav-box-icon">
                                    <svg aria-label="Search" class="icon-pic" color="rgb(0, 0, 0)" fill="rgb(0, 0, 0)"
                                        height="24" role="img" viewBox="0 0 24 24" width="24">
                                        <path d="M19 10.5A8.5 8.5 0 1 1 10.5 2a8.5 8.5 0 0 1 8.5 8.5Z" fill="none"
                                            stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2">
                                        </path>
                                        <line fill="none" stroke="currentColor" stroke-linecap="round"
                                            stroke-linejoin="round" stroke-width="2" x1="16.511" x2="22" y1="16.511"
                                            y2="22">
                                        </line>
                                    </svg>
                                </div>
                                <div class="navigate nav-box-name">
                                    <a href="#" class="icon-name">Search</a>
                                </div>
                            </div>
                        </div>

                        <div class="nav-box">
                            <div class="mini-box" id="cbtn">
                                <div class="navigate nav-box-icon">

                                    <svg aria-label="New post" class="icon-pic" color="rgb(0, 0, 0)" fill="rgb(0, 0, 0)"
                                        height="24" role="img" viewBox="0 0 24 24" width="24">
                                        <path
                                            d="M2 12v3.45c0 2.849.698 4.005 1.606 4.944.94.909 2.098 1.608 4.946 1.608h6.896c2.848 0 4.006-.7 4.946-1.608C21.302 19.455 22 18.3 22 15.45V8.552c0-2.849-.698-4.006-1.606-4.945C19.454 2.7 18.296 2 15.448 2H8.552c-2.848 0-4.006.699-4.946 1.607C2.698 4.547 2 5.703 2 8.552Z"
                                            fill="none" stroke="currentColor" stroke-linecap="round"
                                            stroke-linejoin="round" stroke-width="2">
                                        </path>
                                        <line fill="none" stroke="currentColor" stroke-linecap="round"
                                            stroke-linejoin="round" stroke-width="2" x1="6.545" x2="17.455" y1="12.001"
                                            y2="12.001">
                                        </line>
                                        <line fill="none" stroke="currentColor" stroke-linecap="round"
                                            stroke-linejoin="round" stroke-width="2" x1="12.003" x2="12.003" y1="6.545"
                                            y2="17.455">
                                        </line>
                                    </svg>
                                </div>
                                <div class="navigate nav-box-name">
                                    <a href="#" class="icon-name">Create</a>
                                </div>
                            </div>
                        </div>

                        <div class="nav-box">
                            <div class="mini-box" id="pbtn">
                                <div class="navigate nav-box-icon">
                                    <img class="icon-pic" src="images/user.png" alt="">
                                </div>
                                <div class="navigate nav-box-name">
                                    <a href="#" class="icon-name">Profile</a>
                                </div>
                            </div>
                        </div>

                    </div>



                    <div id="more" class="nav-box">
                        <div class="mini-box" id="logoutbtn">
                            <div class="navigate nav-box-icon">
                                <span class="icon-pic"><ion-icon name="log-out"></ion-icon></span>
                            </div>
                            <div class="navigate nav-box-name">
                                <a class="icon-name">Log out</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="searchbar">
                    <div class="search-name">
                        <span>Search</span>
                    </div>

                    <div class="search-box">
                        <input class="box-input" aria-label="Search input" placeholder="Search" type="text">
                        <div class="box-clear" aria-disabled="false" aria-label="Clear the search box" role="button"
                            tabindex="0"></div>
                    </div>

                    <div class="recent">
                        <div class="recent-name">
                            <span>Recent</span>
                        </div>

                        <div class="recent-searched">
                            <!-- profiles -->
                        </div>
                    </div>
                </div>



            </div>

            <div class="profile-page1">

                <div class="profile-page">
                    <header class="pg-a">
                        <div class="pg-b">
                            <div class="pg-c">
                                <div class="pg-d">
                                    <img src="https://source.unsplash.com/random/1080x1080/?user-<?php echo $row['gender'] ?>" alt="">
                                </div>
                            </div>
                        </div>

                        <section class="pg-e">
                            <div class="pg-ea">
                                <h2 class="pg-ea1"><?php echo $row['username'] ?></h2>

                                <div class="pg-ea2">
                                    <a href="#">Edit profile</a>
                                </div>

                                <div class="pg-ea3">
                                    <button class="pg-ea4">
                                        <svg aria-label="Options" class="" color="rgb(0, 0, 0)"
                                            fill="rgb(0, 0, 0)" height="24" role="img" viewBox="0 0 24 24" width="24">
                                            <title>Options</title>
                                            <circle cx="12" cy="12" fill="none" r="8.635" stroke="currentColor"
                                                stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></circle>
                                            <path
                                                d="M14.232 3.656a1.269 1.269 0 0 1-.796-.66L12.93 2h-1.86l-.505.996a1.269 1.269 0 0 1-.796.66m-.001 16.688a1.269 1.269 0 0 1 .796.66l.505.996h1.862l.505-.996a1.269 1.269 0 0 1 .796-.66M3.656 9.768a1.269 1.269 0 0 1-.66.796L2 11.07v1.862l.996.505a1.269 1.269 0 0 1 .66.796m16.688-.001a1.269 1.269 0 0 1 .66-.796L22 12.93v-1.86l-.996-.505a1.269 1.269 0 0 1-.66-.796M7.678 4.522a1.269 1.269 0 0 1-1.03.096l-1.06-.348L4.27 5.587l.348 1.062a1.269 1.269 0 0 1-.096 1.03m11.8 11.799a1.269 1.269 0 0 1 1.03-.096l1.06.348 1.318-1.317-.348-1.062a1.269 1.269 0 0 1 .096-1.03m-14.956.001a1.269 1.269 0 0 1 .096 1.03l-.348 1.06 1.317 1.318 1.062-.348a1.269 1.269 0 0 1 1.03.096m11.799-11.8a1.269 1.269 0 0 1-.096-1.03l.348-1.06-1.317-1.318-1.062.348a1.269 1.269 0 0 1-1.03-.096"
                                                fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="2">
                                            </path>
                                        </svg>
                                    </button>
                                </div>

                            </div>
                            <div class="pg-eb">
                                <div></div>
                            </div>
                            
                            <ul class="pg-ec">
                                <li class="pg-ed">
                                    <span> <?php echo $num_posts ?> </span> posts
                                </li>
                                <li class="pg-ed friends-box-btn">
                                    <span> <?php echo $num_friends ?> </span> friends
                                </li>
                            </ul>
                        </section>
                    </header>

                    <div class="pgb">
                        <div class="pgb1">
                            <div class="pgb2">
                                <div class="pgb3">
                                    <!-- img -->
                                </div>
                            </div>

                            <div class="pgb4">
                                <span>Share Photos</span>
                            </div>

                            <div class="pgb5">
                                Share your photo
                            </div>
                        </div>
                    </div>
                </div>

            </div>


            <!-- <div class="edit-page">
                <div class="edit-page1">
                    <h1>Settings</h1>
                    <div class="ep-a">
                        <article class="ep-b">
                            <div class="ep-c">
                                <div class="ep-c1">
                                    <h2>Edit profile</h2>
                                </div>
                            </div>

                            <div class="ep-d"></div>

                            <form class="ep-e" method="POST">
                                <div class="ep-e1">
                                    <label for="">Firstname</label>
                                    <input type="text" value>
                                </div>

                                <div class="ep-e1">
                                    <label for="">Lastname</label>
                                    <input type="text" value>
                                </div>

                                <div class="ep-e1">
                                    <label for="">Gender</label>
                                    <input type="text" value>
                                </div>

                                <div class="ep-e1">
                                    <label for="">Firstname</label>
                                    <input type="text" value>
                                </div>

                                <div class="ep-e1">
                                    <label for="">Firstname</label>
                                    <input type="text" value>
                                </div>
                            </form>
                        </article>
                    </div>
                </div>
            </div> -->



        </div>

        <div class="create-box1">
            <div class="black-box">

                <div class="create-close">
                    <svg aria-label="Close" class="" color="rgb(255, 255, 255)" fill="rgb(255, 255, 255)" height="18"
                        role="img" viewBox="0 0 24 24" width="18">
                        <title>Close</title>
                        <polyline fill="none" points="20.643 3.357 12 12 3.353 20.647" stroke="currentColor"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="3"></polyline>
                        <line fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                            stroke-width="3" x1="20.649" x2="3.354" y1="20.649" y2="3.354"></line>
                    </svg>
                </div>

            </div>


            <div class="create-box2">
                <div class="create-post-box1">
                    <div class="create-header">
                        <h1>Create new post</h1>
                    </div>
                    <div class="create-main1">

                        <div class="create-main2">
                            <svg aria-label="Icon to represent media such as images or videos" class=""
                                color="rgb(0, 0, 0)" fill="rgb(0, 0, 0)" height="77" role="img" viewBox="0 0 97.6 77.3"
                                width="96">
                                <title>Icon to represent media such as images or videos</title>
                                <path
                                    d="M16.3 24h.3c2.8-.2 4.9-2.6 4.8-5.4-.2-2.8-2.6-4.9-5.4-4.8s-4.9 2.6-4.8 5.4c.1 2.7 2.4 4.8 5.1 4.8zm-2.4-7.2c.5-.6 1.3-1 2.1-1h.2c1.7 0 3.1 1.4 3.1 3.1 0 1.7-1.4 3.1-3.1 3.1-1.7 0-3.1-1.4-3.1-3.1 0-.8.3-1.5.8-2.1z"
                                    fill="currentColor"></path>
                                <path
                                    d="M84.7 18.4 58 16.9l-.2-3c-.3-5.7-5.2-10.1-11-9.8L12.9 6c-5.7.3-10.1 5.3-9.8 11L5 51v.8c.7 5.2 5.1 9.1 10.3 9.1h.6l21.7-1.2v.6c-.3 5.7 4 10.7 9.8 11l34 2h.6c5.5 0 10.1-4.3 10.4-9.8l2-34c.4-5.8-4-10.7-9.7-11.1zM7.2 10.8C8.7 9.1 10.8 8.1 13 8l34-1.9c4.6-.3 8.6 3.3 8.9 7.9l.2 2.8-5.3-.3c-5.7-.3-10.7 4-11 9.8l-.6 9.5-9.5 10.7c-.2.3-.6.4-1 .5-.4 0-.7-.1-1-.4l-7.8-7c-1.4-1.3-3.5-1.1-4.8.3L7 49 5.2 17c-.2-2.3.6-4.5 2-6.2zm8.7 48c-4.3.2-8.1-2.8-8.8-7.1l9.4-10.5c.2-.3.6-.4 1-.5.4 0 .7.1 1 .4l7.8 7c.7.6 1.6.9 2.5.9.9 0 1.7-.5 2.3-1.1l7.8-8.8-1.1 18.6-21.9 1.1zm76.5-29.5-2 34c-.3 4.6-4.3 8.2-8.9 7.9l-34-2c-4.6-.3-8.2-4.3-7.9-8.9l2-34c.3-4.4 3.9-7.9 8.4-7.9h.5l34 2c4.7.3 8.2 4.3 7.9 8.9z"
                                    fill="currentColor"></path>
                                <path
                                    d="M78.2 41.6 61.3 30.5c-2.1-1.4-4.9-.8-6.2 1.3-.4.7-.7 1.4-.7 2.2l-1.2 20.1c-.1 2.5 1.7 4.6 4.2 4.8h.3c.7 0 1.4-.2 2-.5l18-9c2.2-1.1 3.1-3.8 2-6-.4-.7-.9-1.3-1.5-1.8zm-1.4 6-18 9c-.4.2-.8.3-1.3.3-.4 0-.9-.2-1.2-.4-.7-.5-1.2-1.3-1.1-2.2l1.2-20.1c.1-.9.6-1.7 1.4-2.1.8-.4 1.7-.3 2.5.1L77 43.3c1.2.8 1.5 2.3.7 3.4-.2.4-.5.7-.9.9z"
                                    fill="currentColor"></path>
                            </svg>

                            <span>Drag photos and videos here</span>

                            <button type="button">Select from computer</button>

                        </div>

                    </div>
                </div>
            </div>
        </div>


        <div class="friends-box">
            <div class="like-black-box"></div>

            <div class="lb1">
                <div class="lb2">
                    <div class="lb3">
                        <div class="lb4" role="dialog">
                            <div class="lb5">
                                <div class="lb6">
                                    <div class="lb-h">
                                        <div class="lb-h1"></div>

                                        <h1 class="lb-h2">Followers</h1>

                                        <div class="lb-h3">
                                            <div class="lb-h3a">
                                                <div class="lb-h3b">
                                                    <svg aria-label="Close" class="lb-h3c" color="rgb(0, 0, 0)" fill="rgb(0, 0, 0)" height="24" role="img" viewBox="0 0 24 24" width="24">
                                                        <title>Close</title>
                                                        <line fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" x1="21" x2="3" y1="3" y2="21"></line>
                                                        <line fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" x1="21" x2="3" y1="21" y2="3"></line>
                                                    </svg>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="lb-b">
                                        <div class="lb-b1">
                                            <div class="lb-b2 lb-b2-like">
                                                <!-- profiles -->

                                                <!-- <div class="profileBox">

                                                    <div class="pic-box">
                                                        <img class="profile-pic" src="images/mypic.jpg" alt="">
                                                    </div>

                                                    <div class="name-box">
                                                        <span class="username">rohit.2.3</span>
                                                        <span class="name">Rohit</span>
                                                    </div>

                                                    <div class="switch-box">
                                                        <button type="button">
                                                            <span>Follow</span>
                                                        </button>
                                                    </div>

                                                </div> -->

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>


    </div>

    <script src="script-pg.js"></script>

</body>

</html>