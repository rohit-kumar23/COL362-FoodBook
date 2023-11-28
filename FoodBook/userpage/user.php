<?php
session_start();

if (!isset($_SESSION['id']) || !isset($_SESSION['username'])) {
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
                                    <svg aria-label="Home" color="rgb(0, 0, 0)" fill="rgb(0, 0, 0)" height="24" role="img" viewBox="0 0 24 24" width="24">
                                        <path d="M9.005 16.545a2.997 2.997 0 0 1 2.997-2.997A2.997 2.997 0 0 1 15 16.545V22h7V11.543L12 2 2 11.543V22h7.005Z" fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="2">
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
                                    <svg aria-label="Search" class="icon-pic" color="rgb(0, 0, 0)" fill="rgb(0, 0, 0)" height="24" role="img" viewBox="0 0 24 24" width="24">
                                        <path d="M19 10.5A8.5 8.5 0 1 1 10.5 2a8.5 8.5 0 0 1 8.5 8.5Z" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                                        </path>
                                        <line fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" x1="16.511" x2="22" y1="16.511" y2="22">
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

                                    <svg aria-label="New post" class="icon-pic" color="rgb(0, 0, 0)" fill="rgb(0, 0, 0)" height="24" role="img" viewBox="0 0 24 24" width="24">
                                        <path d="M2 12v3.45c0 2.849.698 4.005 1.606 4.944.94.909 2.098 1.608 4.946 1.608h6.896c2.848 0 4.006-.7 4.946-1.608C21.302 19.455 22 18.3 22 15.45V8.552c0-2.849-.698-4.006-1.606-4.945C19.454 2.7 18.296 2 15.448 2H8.552c-2.848 0-4.006.699-4.946 1.607C2.698 4.547 2 5.703 2 8.552Z" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                                        </path>
                                        <line fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" x1="6.545" x2="17.455" y1="12.001" y2="12.001">
                                        </line>
                                        <line fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" x1="12.003" x2="12.003" y1="6.545" y2="17.455">
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
                        <div class="box-clear" aria-disabled="false" aria-label="Clear the search box" role="button" tabindex="0"></div>
                    </div>

                    <div class="recent">
                        <div class="recent-name">
                            <span>Recent</span>
                        </div>

                        <div class="recent-searched">
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

            <div id="rpage">
                <div id="main-section">
                    <div id="post-section">

                        <div class="empty-box"></div>

                        <div id="posts">

                            <?php
                            $query = "SELECT r.*, u.username, u.gender, u.firstname FROM Recipe r
                                    JOIN users u ON r.creatoruserid = u.id
                                    WHERE EXISTS (
                                        SELECT 1 FROM User_knows_User uku WHERE
                                        (uku.user1id = r.creatoruserid AND uku.user2id = $id)
                                        OR (uku.user1id = $id AND uku.user2id = r.creatoruserid)
                                    )";
                            $querydata = pg_query($dbconn, $query);
                            $x = 0;

                            while ($x < 20 && $queryrow = pg_fetch_assoc($querydata)) {
                                $query_likes = "SELECT COUNT(*) FROM user_likes_recipe WHERE recipeid =".$queryrow['id'];
                                $query_comments = "SELECT COUNT(*) FROM comment WHERE parentrecipeid =".$queryrow['id'];
                                
                                $query_likes_result = pg_query($dbconn, $query_likes);
                                $query_comments_result = pg_query($dbconn, $query_comments);

                                $likes_count = pg_fetch_result($query_likes_result, 0, 0);
                                $comments_count = pg_fetch_result($query_comments_result, 0, 0);
                                
                                $query_isliked = "SELECT * FROM user_likes_recipe WHERE userid = $id AND recipeid = ".$queryrow['id'];
                                $query_isliked_result = pg_query($dbconn, $query_isliked);

                                $isliked = pg_num_rows($query_isliked_result) > 0;

                                $str = '';
                                if ($isliked) {
                                    $str =
                                        '<div class="btns like-btn liked" data-recipe-id="' .$queryrow['id']. '">
                                            <svg aria-label="Unlike" class="" color="rgb(255, 48, 64)" fill="rgb(255, 48, 64)" height="24" role="img" viewBox="0 0 48 48" width="24">
                                                <title>Unlike</title>
                                                <path
                                                    d="M34.6 3.1c-4.5 0-7.9 1.8-10.6 5.6-2.7-3.7-6.1-5.5-10.6-5.5C6 3.1 0 9.6 0 17.6c0 7.3 5.4 12 10.6 16.5.6.5 1.3 1.1 1.9 1.7l2.3 2c4.4 3.9 6.6 5.9 7.6 6.5.5.3 1.1.5 1.6.5s1.1-.2 1.6-.5c1-.6 2.8-2.2 7.8-6.8l2-1.8c.7-.6 1.3-1.2 2-1.7C42.7 29.6 48 25 48 17.6c0-8-6-14.5-13.4-14.5z">
                                                </path>
                                            </svg>
                                        </div>';
                                }
                                else {
                                    $str =
                                        '<div class="btns like-btn unliked" data-recipe-id="' .$queryrow['id']. '">
                                            <svg aria-label="Like" class="" color="rgb(38, 38, 38)" fill="rgb(38, 38, 38)" height="24" role="img" viewBox="0 0 24 24" width="24">
                                                <title>Like</title>
                                                <path d="M16.792 3.904A4.989 4.989 0 0 1 21.5 9.122c0 3.072-2.652 4.959-5.197 7.222-2.512 2.243-3.865 3.469-4.303 3.752-.477-.309-2.143-1.823-4.303-3.752C5.141 14.072 2.5 12.167 2.5 9.122a4.989 4.989 0 0 1 4.708-5.218 4.21 4.21 0 0 1 3.675 1.941c.84 1.175.98 1.763 1.12 1.763s.278-.588 1.11-1.766a4.17 4.17 0 0 1 3.679-1.938m0-2a6.04 6.04 0 0 0-4.797 2.127 6.052 6.052 0 0 0-4.787-2.127A6.985 6.985 0 0 0 .5 9.122c0 3.61 2.55 5.827 5.015 7.97.283.246.569.494.853.747l1.027.918a44.998 44.998 0 0 0 3.518 3.018 2 2 0 0 0 2.174 0 45.263 45.263 0 0 0 3.626-3.115l.922-.824c.293-.26.59-.519.885-.774 2.334-2.025 4.98-4.32 4.98-7.94a6.985 6.985 0 0 0-6.708-7.218Z">
                                                </path>
                                            </svg>
                                        </div>';
                                }

                                echo '
                                <div class="post-box">
                                    <div class="post-header">

                                        <div class="header-pic">

                                            <a>
                                                <img src="https://source.unsplash.com/random/1080x1080/?user-'.$queryrow['firstname'].'-'.$queryrow['gender'].'" alt="">
                                            </a>
                                        </div>

                                        <div class="header-name">
                                            <a>' .$queryrow['username']. '</a>
                                        </div>

                                        <div class="header-option">
                                            <svg aria-label="More options" class="_ab6-" color="rgb(0, 0, 0)" fill="rgb(0, 0, 0)" height="24" role="img" viewBox="0 0 24 24" width="24">
                                                <circle cx="12" cy="12" r="1.5"></circle>
                                                <circle cx="6" cy="12" r="1.5"></circle>
                                                <circle cx="18" cy="12" r="1.5"></circle>
                                            </svg>
                                        </div>
                                    </div>

                                    <div class="post-pic" data-recipe-id="' .$queryrow['id']. '">
                                        <img src="https://source.unsplash.com/random/1080x1350/?food-'.$queryrow['title'].'" alt="">
                                    </div>

                                    <div class="post-react">
                                        <div class="react-button">
                                            '.$str.'
                                            <div class="btns comment-btn">
                                                <svg aria-label="Comment" class="x1lliihq x1n2onr6" color="rgb(0, 0, 0)" fill="rgb(0, 0, 0)" height="24" role="img" viewBox="0 0 24 24" width="24">
                                                    <title>Comment</title>
                                                    <path d="M20.656 17.008a9.993 9.993 0 1 0-3.59 3.615L22 22Z" fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="2">
                                                    </path>
                                                </svg>
                                            </div>
                                        </div>

                                        <div></div>

                                        <div class="btns download-button">
                                            <svg aria-label="Save" class="x1lliihq x1n2onr6" color="rgb(0, 0, 0)" fill="rgb(0, 0, 0)" height="24" role="img" viewBox="0 0 24 24" width="24">
                                                <title>Save</title>
                                                <polygon fill="none" points="20 21 12 13.44 4 21 4 3 20 3 20 21" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></polygon>
                                            </svg>
                                        </div>
                                    </div>

                                    <div class="nums">
                                        <a class="numlikes" data-recipe-id="' .$queryrow['id']. '">' .$likes_count. ' likes</a>
                                        <a class="numcomments" data-recipe-id="' .$queryrow['id']. '">View all '.$comments_count.' comments</a>
                                    </div>

                                    <div class="comment-form" data-recipe-id="' .$queryrow['id']. '">
                                        <form action="#" method="POST">
                                            <textarea class = "textareainput" aria-label="Add a comment…" placeholder="Add a comment…" class="" autocomplete="off" autocorrect="off"></textarea>
                                            <div class="post-btn">Post</div>
                                        </form>
                                    </div>
                                </div>
                                ';
                                $x++;
                            }
                            ?>

                        </div>
                    </div>
                </div>

                <div id="profile-section">
                    <div id="subpart1">
                        <div class="profileBox">

                            <div class="pic-box">
                                <!-- <img class="profile-pic" src="images/mypic.jpg" alt=""> -->
                                <img class="profile-pic open-profile" src="https://source.unsplash.com/random/1080x1080/?user-<?php echo $row['gender'] ?>" alt="">
                            </div>

                            <div class="name-box">
                                <span class="username open-profile"><?php echo $row['username'] ?></span>
                                <span class="name open-profile"><?php echo $row['firstname'] ?></span>
                            </div>

                            <div class="switch-box">
                                <button type="button">
                                    <span>Switch</span>
                                </button>
                            </div>

                        </div>
                    </div>

                    <div id="subpart2">
                        <div class="suggestion-header">
                            <div class="suggestion-name">
                                <span>Suggestions for you</span>
                            </div>
                            <a class="suggestion-link">
                                <span id="seeallbtn">See All</span>
                            </a>
                        </div>
                    </div>

                    <div id="subpart3">

                        <?php

                        $query = "(SELECT u.id, u.username, u.firstname, u.gender, COUNT(*) as num_common_interests
                                FROM Users u
                                INNER JOIN User_hasInterest_Tag uhit1 ON uhit1.UserId = u.id
                                INNER JOIN User_hasInterest_Tag uhit2 ON uhit2.UserId = $id AND uhit2.TagId = uhit1.TagId AND uhit1.UserId != uhit2.UserId
                                WHERE NOT EXISTS (
                                    SELECT 1 FROM User_knows_User WHERE (user1id = $id AND user2id = u.id)
                                    OR (user1id = u.id AND user2id = $id)
                                )
                                GROUP BY u.id, u.username, u.firstname, u.gender
                                HAVING COUNT(*) >= 1
                                ORDER BY num_common_interests DESC
                                LIMIT 15)
                                
                                UNION
                                
                                (SELECT u.id, u.username, u.firstname, u.gender, 0 as num_common_interests
                                FROM Users u WHERE u.locationcityid = ".$row['locationcityid']." AND u.id != $id
                                AND NOT EXISTS (
                                    SELECT 1 FROM user_knows_user WHERE (user1id = $id AND user2id = u.id)
                                    OR (user1id = u.id AND user2id = $id)
                                ))
                                
                                ORDER BY num_common_interests DESC
                                LIMIT 15";
                        $querydata = pg_query($dbconn, $query);
                        $x = 0;

                        while ($x < 15 && $queryrow = pg_fetch_assoc($querydata)) {
                            echo '
                            <div class="profileBox">

                                <div class="pic-box">
                                    <img class="profile-pic" src="https://source.unsplash.com/random/1080x1080/?user-'. $x. '-' .$queryrow['gender']. '" alt="">
                                </div>

                                <div class="name-box">
                                    <span class="username">'.$queryrow['username'].'</span>
                                    <span class="name">'.$queryrow['firstname'].'</span>
                                </div>

                                <div class="switch-box">
                                    <button type="button" class = "followbtn" data-user-id = "'.$queryrow['id'].'">
                                        <span>Follow</span>
                                    </button>
                                </div>

                            </div>
                            ';
                            $x++;
                        }

                        ?>

                    </div>

                </div>
            </div>

        </div>

        <div class="create-box1">
            <div class="black-box">

                <div class="create-close">
                    <svg aria-label="Close" class="" color="rgb(255, 255, 255)" fill="rgb(255, 255, 255)" height="18" role="img" viewBox="0 0 24 24" width="18">
                        <title>Close</title>
                        <polyline fill="none" points="20.643 3.357 12 12 3.353 20.647" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="3"></polyline>
                        <line fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="3" x1="20.649" x2="3.354" y1="20.649" y2="3.354"></line>
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
                            <svg aria-label="Icon to represent media such as images or videos" class="" color="rgb(0, 0, 0)" fill="rgb(0, 0, 0)" height="77" role="img" viewBox="0 0 97.6 77.3" width="96">
                                <title>Icon to represent media such as images or videos</title>
                                <path d="M16.3 24h.3c2.8-.2 4.9-2.6 4.8-5.4-.2-2.8-2.6-4.9-5.4-4.8s-4.9 2.6-4.8 5.4c.1 2.7 2.4 4.8 5.1 4.8zm-2.4-7.2c.5-.6 1.3-1 2.1-1h.2c1.7 0 3.1 1.4 3.1 3.1 0 1.7-1.4 3.1-3.1 3.1-1.7 0-3.1-1.4-3.1-3.1 0-.8.3-1.5.8-2.1z" fill="currentColor"></path>
                                <path d="M84.7 18.4 58 16.9l-.2-3c-.3-5.7-5.2-10.1-11-9.8L12.9 6c-5.7.3-10.1 5.3-9.8 11L5 51v.8c.7 5.2 5.1 9.1 10.3 9.1h.6l21.7-1.2v.6c-.3 5.7 4 10.7 9.8 11l34 2h.6c5.5 0 10.1-4.3 10.4-9.8l2-34c.4-5.8-4-10.7-9.7-11.1zM7.2 10.8C8.7 9.1 10.8 8.1 13 8l34-1.9c4.6-.3 8.6 3.3 8.9 7.9l.2 2.8-5.3-.3c-5.7-.3-10.7 4-11 9.8l-.6 9.5-9.5 10.7c-.2.3-.6.4-1 .5-.4 0-.7-.1-1-.4l-7.8-7c-1.4-1.3-3.5-1.1-4.8.3L7 49 5.2 17c-.2-2.3.6-4.5 2-6.2zm8.7 48c-4.3.2-8.1-2.8-8.8-7.1l9.4-10.5c.2-.3.6-.4 1-.5.4 0 .7.1 1 .4l7.8 7c.7.6 1.6.9 2.5.9.9 0 1.7-.5 2.3-1.1l7.8-8.8-1.1 18.6-21.9 1.1zm76.5-29.5-2 34c-.3 4.6-4.3 8.2-8.9 7.9l-34-2c-4.6-.3-8.2-4.3-7.9-8.9l2-34c.3-4.4 3.9-7.9 8.4-7.9h.5l34 2c4.7.3 8.2 4.3 7.9 8.9z" fill="currentColor"></path>
                                <path d="M78.2 41.6 61.3 30.5c-2.1-1.4-4.9-.8-6.2 1.3-.4.7-.7 1.4-.7 2.2l-1.2 20.1c-.1 2.5 1.7 4.6 4.2 4.8h.3c.7 0 1.4-.2 2-.5l18-9c2.2-1.1 3.1-3.8 2-6-.4-.7-.9-1.3-1.5-1.8zm-1.4 6-18 9c-.4.2-.8.3-1.3.3-.4 0-.9-.2-1.2-.4-.7-.5-1.2-1.3-1.1-2.2l1.2-20.1c.1-.9.6-1.7 1.4-2.1.8-.4 1.7-.3 2.5.1L77 43.3c1.2.8 1.5 2.3.7 3.4-.2.4-.5.7-.9.9z" fill="currentColor"></path>
                            </svg>

                            <span>Drag photos and videos here</span>

                            <button type="button">Select from computer</button>

                        </div>

                    </div>
                </div>
            </div>
        </div>


        <div class="like-box">
            <div class="like-black-box"></div>

            <div class="lb1">
                <div class="lb2">
                    <div class="lb3">
                        <div class="lb4" role="dialog">
                            <div class="lb5">
                                <div class="lb6">
                                    <div class="lb-h">
                                        <div class="lb-h1"></div>

                                        <h1 class="lb-h2">Likes</h1>

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


        <div class="comment-box">
            <div class="like-black-box"></div>

            <div class="lb1">
                <div class="lb2">
                    <div class="lb3">
                        <div class="lb4" role="dialog">
                            <div class="lb5">
                                <div class="lb6">
                                    <div class="lb-h">
                                        <div class="lb-h1"></div>

                                        <h1 class="lb-h2">Comments</h1>

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
                                            <div class="lb-b2 lb-b2-comment">
                                                <!-- comments -->

                                                <!-- <div class="commentBox">
                                                    <li class="cb-1">
                                                        <div class="cb-2">
                                                            <div class="cb-3">
                                                                <div class="cb-4">
                                                                    <div class="cb-5">
                                                                        <a class="cb-5a">
                                                                            <img class="cb-5b" src="images/mypic.jpg" alt="">
                                                                        </a>
                                                                    </div>
                                                                </div>

                                                                <div class="cb-6">
                                                                    <h3 class="cb-7">
                                                                        <div class="cb-8">
                                                                            <div class="cb-9">
                                                                                <a>rohit.2.3</a>
                                                                            </div>
                                                                        </div>
                                                                    </h3>

                                                                    <div class="cb-10" lang="en">
                                                                        <span>hehehe hehehe hehehe hehehe hehehehehehehehehehehehehehehehehe h h h h h h h h h h h h h h h h h hehehe hehehe heheheheheheheehheeheheheh</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
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

    <script src="script.js"></script>

</body>

</html>