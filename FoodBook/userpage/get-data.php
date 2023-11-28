<?php

session_start();

if (! isset($_SESSION['id']) || ! isset($_SESSION['username'])) {
    echo "session expired";
    exit();
}

require_once '../db_setup.php';

$connection_string = "host = {$host} port = {$port} dbname = {$dbname} user = {$user} password = {$password} ";
$dbconn = pg_connect($connection_string);

if (!$dbconn) {
    echo "error connecting database";
    exit();
}
// else {
//     echo "Connected to the database\n";
// }

if (isset($_POST['recipeid_likes'])) {

    $recipeid = $_POST['recipeid_likes'];

    $query = "SELECT ulr.*, u.username, u.firstname, u.gender FROM user_likes_recipe ulr
            JOIN users u ON u.id = ulr.userid
            WHERE ulr.recipeid = $recipeid";
    
    $querydata = pg_query($dbconn, $query);
    $result = "";
    $id = $_SESSION['id'];

    while ($queryrow = pg_fetch_assoc($querydata)) {
        $isFollowingQuery = "SELECT * FROM user_knows_user WHERE
                (user1id = $id AND user2id = {$queryrow['userid']}) OR (user2id = $id AND user1id = {$queryrow['userid']})";
        $isFollowingResult = pg_query($dbconn, $isFollowingQuery);
        $isFollowing = pg_num_rows($isFollowingResult) > 0;

        $followStatus = $isFollowing ? 'Following' : 'Follow';
        $followClass = $isFollowing ? 'following' : 'follow';

        $str = '<div class="switch-box">
                    <button type="button" class = "followbtn '.$followClass.'" data-user-id = "'.$queryrow['userid'].'">
                        <span>'.$followStatus.'</span>
                    </button>
                </div>';
        if ($queryrow['userid'] == $id) {
            $str = '';
        }

        $result = $result.
        '<div class="profileBox">

            <div class="pic-box">
                <img class="profile-pic" src="https://source.unsplash.com/random/1080x1080/?user-'.$queryrow['firstname'].'-'.$queryrow['gender'].'" alt="">
            </div>

            <div class="name-box">
                <span class="username">'.$queryrow['username'].'</span>
                <span class="name">'.$queryrow['firstname'].'</span>
            </div>'

            .$str.

       '</div>';
    }

    echo $result;
}


if (isset($_POST['recipeid_comments'])) {

    $recipeid = $_POST['recipeid_comments'];

    $query = "SELECT c.*, u.username, u.firstname, u.gender FROM comment c
            JOIN users u ON u.id = c.creatoruserid
            WHERE c.parentrecipeid = $recipeid";
    
    $querydata = pg_query($dbconn, $query);
    $result = "";

    while ($queryrow = pg_fetch_assoc($querydata)) {
        $result = $result.
        '<div class="commentBox">
            <li class="cb-1">
                <div class="cb-2">
                    <div class="cb-3">
                        <div class="cb-4">
                            <div class="cb-5">
                                <a class="cb-5a">
                                    <img class="cb-5b" src="https://source.unsplash.com/random/1080x1080/?user-'.$queryrow['firstname'].'-'.$queryrow['gender'].'" alt="">
                                </a>
                            </div>
                        </div>

                        <div class="cb-6">
                            <h3 class="cb-7">
                                <div class="cb-8">
                                    <div class="cb-9">
                                        <a>'.$queryrow['username'].'</a>
                                    </div>
                                </div>
                            </h3>

                            <div class="cb-10" lang="en">
                                <span>'.$queryrow['content'].'</span>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
        </div>';
    }

    echo $result;
}



if (isset($_POST['searchInput'])) {

    $input = $_POST['searchInput'];

    $query = "SELECT id, username, firstname, gender, 
            (CASE WHEN username ILIKE '$input%' THEN 1 ELSE 0 END) + 
            (CASE WHEN firstname ILIKE '$input%' THEN 1 ELSE 0 END) +
            (CASE WHEN username ILIKE '%$input%' THEN 1 ELSE 0 END) +
            (CASE WHEN firstname ILIKE '%$input%' THEN 1 ELSE 0 END) as num_matches
            FROM users 
            WHERE username ILIKE '%$input%' OR firstname ILIKE '%$input%'
            ORDER BY num_matches DESC, username ASC";
    
    $querydata = pg_query($dbconn, $query);
    $result = "";
    $id = $_SESSION['id'];

    while ($queryrow = pg_fetch_assoc($querydata)) {

        $isFollowingQuery = "SELECT * FROM user_knows_user WHERE
                (user1id = $id AND user2id = {$queryrow['id']}) OR (user2id = $id AND user1id = {$queryrow['id']})";
        $isFollowingResult = pg_query($dbconn, $isFollowingQuery);
        $isFollowing = pg_num_rows($isFollowingResult) > 0;

        $followStatus = $isFollowing ? 'Following' : 'Follow';
        $followClass = $isFollowing ? 'following1' : 'follow1';

        $str = '<div class="switch-box">
                    <button type="button" class = "followbtn '.$followClass.'" data-user-id = "'.$queryrow['id'].'">
                        <span>'.$followStatus.'</span>
                    </button>
                </div>';

        if ($queryrow['id'] == $id) {
            $str = '';
        }
        
        $result = $result.
        '<div class="profileBox">

            <div class="pic-box">
                <img class="profile-pic" src="https://source.unsplash.com/random/1080x1080/?user-'.$queryrow['id'].'-'.$queryrow['gender'].'" alt="">
            </div>

            <div class="name-box">
                <span class="username">'.$queryrow['username'].'</span>
                <span class="name">'.$queryrow['firstname'].'</span>
            </div>'

            .$str.

        '</div>';
    }

    echo $result;
}


if (isset($_POST['userid_follow'])) {

    $userid = $_POST['userid_follow'];
    $id = $_SESSION['id'];
    $flw = $_POST['flw'];

    if ($flw == 0) {
        $query = "INSERT INTO User_knows_User (creationDate, creationTime, user1id, user2id)
                VALUES (CURRENT_DATE, CURRENT_TIME, LEAST($id, $userid), GREATEST($id, $userid))";

        $data = pg_query($dbconn, $query);

        if (! $data) {
            $output = array(
                'success' => "error"
            );

            echo json_encode($output);
            exit();
        }

        $output = array(
            'success' => "true"
        );

        echo json_encode($output);
        exit();
    }

    else {
        $query = "DELETE FROM User_knows_User WHERE
                (user1id = $id AND user2id = $userid) OR (user1id = $userid AND user2id = $id)";

        $data = pg_query($dbconn, $query);

        if (! $data) {
            $output = array(
                'success' => "error"
            );

            echo json_encode($output);
            exit();
        }

        $output = array(
            'success' => "true"
        );

        echo json_encode($output);
        exit();
    }
}


if (isset($_POST['recipeid_tolike'])) {

    $recipeid = $_POST['recipeid_tolike'];
    $id = $_SESSION['id'];
    $liked = $_POST['liked'];

    if ($liked == 0) {
        $query = "INSERT INTO User_likes_Recipe (creationDate, creationTime, UserId, RecipeID)
                VALUES (CURRENT_DATE, CURRENT_TIME, $id, $recipeid)";

        $data = pg_query($dbconn, $query);

        if (! $data) {
            $output = array(
                'success' => "error"
            );

            echo json_encode($output);
            exit();
        }

        $output = array(
            'success' => "true"
        );

        echo json_encode($output);
        exit();
    }

    else {
        $query = "DELETE FROM User_likes_Recipe WHERE UserId = $id AND RecipeId = $recipeid";

        $data = pg_query($dbconn, $query);

        if (! $data) {
            $output = array(
                'success' => "error"
            );

            echo json_encode($output);
            exit();
        }

        $output = array(
            'success' => "true"
        );

        echo json_encode($output);
        exit();
    }
}


if (isset($_POST['recipeid_tocomment'])) {

    $recipeid = $_POST['recipeid_tocomment'];
    $content = $_POST['content'];
    $length = strlen($content);
    $id = $_SESSION['id'];

    $query = "INSERT INTO Comment (creationDate, creationTime, locationIP, browserUsed, Content, length, CreatorUserId, locationCountryId, ParentRecipeId)
            VALUES (CURRENT_DATE, CURRENT_TIME, '0.0.0.0', 'Chrome', '$content', $length, $id, 0, $recipeid)";

    $data = pg_query($dbconn, $query);

    if (! $data) {
        $output = array(
            'success' => "error"
        );

        echo json_encode($output);
        exit();
    }

    $output = array(
        'success' => "true"
    );

    echo json_encode($output);
    exit();
}


if (isset($_POST['friends']) && $_POST['friends'] == '1') {

    $id = $_SESSION['id'];
    $query = "WITH friends AS (SELECT user1id AS userid FROM user_knows_user WHERE user2id = $id
            UNION
            SELECT user2id AS userid FROM user_knows_user WHERE user1id = $id)
            SELECT f.*, u.username, u.gender, u.firstname FROM friends f JOIN users u ON u.id = f.userid";
    
    $querydata = pg_query($dbconn, $query);
    $result = "";

    while ($queryrow = pg_fetch_assoc($querydata)) {

        $followStatus = 'Following';
        $followClass = 'following';

        $result = $result.
        '<div class="profileBox">

            <div class="pic-box">
                <img class="profile-pic" src="https://source.unsplash.com/random/1080x1080/?user-'.$queryrow['firstname'].'-'.$queryrow['gender'].'" alt="">
            </div>

            <div class="name-box">
                <span class="username">'.$queryrow['username'].'</span>
                <span class="name">'.$queryrow['firstname'].'</span>
            </div>

            <div class="switch-box">
                <button type="button" class = "followbtn '.$followClass.'" data-user-id = "'.$queryrow['userid'].'">
                    <span>'.$followStatus.'</span>
                </button>
            </div>

        </div>';
    }

    echo $result;
}