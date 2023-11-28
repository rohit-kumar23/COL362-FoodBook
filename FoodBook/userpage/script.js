const searchbar = document.querySelector('#searchbar');
const createpost = document.querySelector('.create-box1');

const s1 = document.querySelector('#sidebar');
const s2 = document.querySelector('#logo1');
const s3 = document.querySelector('#logo2');
const s4 = document.querySelector('.logo2-pic');
const s5 = document.querySelectorAll('.nav-box');
const s6 = document.querySelectorAll('.navigate.nav-box-name');
const s7 = document.querySelectorAll('.mini-box');

const searchLink = document.querySelector('#sbtn');
const searchcloseLink = document.querySelector('#rpage');
const clearLink = document.querySelector('.box-clear');
const createLink = document.querySelector('#cbtn');
const createcloseLink = document.querySelector('.create-close');
const createcloseLink2 = document.querySelector('.black-box');
const homeLink = document.querySelector('#hbtn');
const profileLink = document.querySelector('#pbtn');



searchLink.addEventListener('click', () => {
    searchbar.classList.toggle('search-active');

    s1.classList.toggle('s1');
    s2.classList.toggle('s2');
    s3.classList.toggle('s3');
    s4.classList.toggle('s4');
    s5.forEach(s5 => s5.classList.toggle('s5'));
    s6.forEach(s6 => s6.classList.toggle('s6'));
    s7.forEach(s7 => s7.classList.toggle('s7'));

    var sbox = document.querySelector('.box-input');
    sbox.value = "";
    document.querySelector('.recent-searched').innerHTML = '';
});

searchcloseLink.addEventListener('click', () => {
    searchbar.classList.remove('search-active');

    s1.classList.remove('s1');
    s2.classList.remove('s2');
    s3.classList.remove('s3');
    s4.classList.remove('s4');
    s5.forEach(s5 => s5.classList.remove('s5'));
    s6.forEach(s6 => s6.classList.remove('s6'));
    s7.forEach(s7 => s7.classList.remove('s7'));

    var sbox = document.querySelector('.box-input');
    sbox.value = "";
    document.querySelector('.recent-searched').innerHTML = '';
});

clearLink.addEventListener('click', () => {
    var sbox = document.querySelector('.box-input');
    sbox.value = "";
    document.querySelector('.recent-searched').innerHTML = '';
});


createLink.addEventListener('click', () => {
    createpost.classList.add('active-cp');
    document.querySelector('body').classList.add('bodyclass');
});


createcloseLink.addEventListener('click', () => {
    createpost.classList.remove('active-cp');
    document.querySelector('body').classList.remove('bodyclass');
});


homeLink.addEventListener('click', () => {
    window.location = 'user.php';
});

const homeLinks2 = document.querySelectorAll('.open-profile');

homeLinks2.forEach((homeLink2) => {
    homeLink2.addEventListener('click', () => {
        window.location = 'profile.php';
    });
});

profileLink.addEventListener('click', () => {
    window.location = 'profile.php';
});


createcloseLink2.addEventListener('click', () => {
    createpost.classList.remove('active-cp');
    document.querySelector('body').classList.remove('bodyclass');
});


const likebox = document.querySelector('.like-box');
const likesLinks = document.querySelectorAll('.numlikes');
const closeLinks1 = document.querySelectorAll('.lb-h3c');
const closeLinks2 = document.querySelectorAll('.like-black-box');


likesLinks.forEach((likesLink) => {
    likesLink.addEventListener('click', () => {
        likebox.classList.add('active-lcb');
        document.querySelector('body').classList.add('bodyclass');

        var recipeID = likesLink.dataset.recipeId;

        var form_data = new FormData();
        form_data.append('recipeid_likes', recipeID);

        var ajax_request = new XMLHttpRequest();

		ajax_request.open('POST', 'get-data.php');

		ajax_request.send(form_data);

        document.querySelector('.lb-b2-like').innerHTML = '<div class="load-wrapp"><div class="load-3"><div class="line"></div><div class="line"></div><div class="line"></div></div></div>';

        ajax_request.onreadystatechange = function() {
			if(ajax_request.readyState == 4 && ajax_request.status == 200) {
                var response = ajax_request.responseText;

                if (response == 'session expired') {
                    window.location = '/../access/logout.php';
                }

                document.querySelector('.lb-b2-like').innerHTML = response;
            }
        }
    });
});


closeLinks1.forEach((closeLink1) => {
    closeLink1.addEventListener('click', () => {
        likebox.classList.remove('active-lcb');
        commentbox.classList.remove('active-lcb');
        document.querySelector('body').classList.remove('bodyclass');
    });
});


closeLinks2.forEach((closeLink2) => {
    closeLink2.addEventListener('click', () => {
        likebox.classList.remove('active-lcb');
        commentbox.classList.remove('active-lcb');
        document.querySelector('body').classList.remove('bodyclass');
    });
});


const commentbox = document.querySelector('.comment-box');
const commentLinks = document.querySelectorAll('.numcomments');

commentLinks.forEach((commentLink) => {
    commentLink.addEventListener('click', () => {
        commentbox.classList.add('active-lcb');
        document.querySelector('body').classList.add('bodyclass');

        var recipeID = commentLink.dataset.recipeId;

        var form_data = new FormData();
        form_data.append('recipeid_comments', recipeID);

        var ajax_request = new XMLHttpRequest();

		ajax_request.open('POST', 'get-data.php');

		ajax_request.send(form_data);

        document.querySelector('.lb-b2-comment').innerHTML = '<div class="load-wrapp"><div class="load-3"><div class="line"></div><div class="line"></div><div class="line"></div></div></div>';

        ajax_request.onreadystatechange = function() {
			if(ajax_request.readyState == 4 && ajax_request.status == 200) {
                var response = ajax_request.responseText;

                if (response == 'session expired') {
                    window.location = '/../access/logout.php';
                }

                document.querySelector('.lb-b2-comment').innerHTML = response;
            }
        }
    });
});


const logoutLink = document.querySelector('#logoutbtn');

logoutLink.addEventListener('click', () => {
    window.location = '/../access/logout.php';
});


const seemoreprofiles = document.querySelector('#profile-section');
const seeallbutton = document.querySelector('#seeallbtn');
const seemoreLink = document.querySelector('.suggestion-link');

seemoreLink.addEventListener('click', () => {
    seemoreprofiles.classList.toggle('seemore');
    if (seeallbutton.innerHTML == 'See All') {
        seeallbutton.innerHTML = 'See less';
    }
    else {
        seeallbutton.innerHTML = 'See All';
    }
});



const search_element = document.querySelector('.box-input');
const recent_searched_element = document.querySelector('.recent-searched');
let debounceTimeoutId = null;

search_element.addEventListener("keyup", () => {
    const searchInput = search_element.value.trim();

    if (searchInput == '') {
        // If input is empty, clear the recent searched list
        recent_searched_element.innerHTML = '';
        return;
    }

    // Cancel the previous debounce timeout
    clearTimeout(debounceTimeoutId);

    // Set a new debounce timeout to wait for 500 milliseconds
    debounceTimeoutId = setTimeout(() => {
        var form_data = new FormData();
        form_data.append('searchInput', searchInput);

        recent_searched_element.innerHTML = '<div class="load-wrapp"><div class="load-3"><div class="line"></div><div class="line"></div><div class="line"></div></div></div>';

        var ajax_request = new XMLHttpRequest();

        ajax_request.open('POST', 'get-data.php');

        ajax_request.send(form_data);

        ajax_request.onreadystatechange = function() {
            if(ajax_request.readyState == 4 && ajax_request.status == 200) {
                var response = ajax_request.responseText;

                if (response == 'session expired') {
                    window.location = '/../access/logout.php';
                }

                recent_searched_element.innerHTML = response;
            }
        }
    }, 800);
});



const followLinks = document.querySelectorAll('.followbtn');

followLinks.forEach((followLink) => {
    followLink.addEventListener('click', () => {
        var flw = 0;        // 0 = to follow
        if (followLink.innerHTML == '<span>Following</span>') {
            flw = 1;
        }
        else {
            flw = 0;
        }


        var userID = followLink.dataset.userId;

        var form_data = new FormData();
        form_data.append('userid_follow', userID);
        form_data.append('flw', flw);

        var ajax_request = new XMLHttpRequest();

		ajax_request.open('POST', 'get-data.php');

		ajax_request.send(form_data);

        ajax_request.onreadystatechange = function() {
			if(ajax_request.readyState == 4 && ajax_request.status == 200) {
                var response = ajax_request.responseText;

                if (response == 'session expired') {
                    window.location = '/../access/logout.php';
                }

                response = JSON.parse(response);

                if (response.success == "true") {
                    if (followLink.innerHTML == '<span>Following</span>') {
                        followLink.innerHTML = '<span>Follow</span>';
                        followLink.style.color = 'rgb(0, 149, 246)';
                    }
                    else {
                        followLink.innerHTML = '<span>Following</span>';
                        followLink.style.color = 'black';
                    }
                }
            }
        }

    });
});



const likebox_followLink = document.querySelector('.lb-b2.lb-b2-like');

likebox_followLink.addEventListener('click', function(e) {
    const followLink = e.target.closest(".followbtn");

    if (followLink) {
        var flw = 0;        // 0 = to follow
        if (followLink.textContent.trim() === 'Following') {
            flw = 1;
        }
        else {
            flw = 0;
        }


        var userID = followLink.dataset.userId;

        var form_data = new FormData();
        form_data.append('userid_follow', userID);
        form_data.append('flw', flw);

        var ajax_request = new XMLHttpRequest();

        ajax_request.open('POST', 'get-data.php');

        ajax_request.send(form_data);

        ajax_request.onreadystatechange = function() {
            if(ajax_request.readyState == 4 && ajax_request.status == 200) {
                var response = ajax_request.responseText;

                if (response == 'session expired') {
                    window.location = '/../access/logout.php';
                }

                response = JSON.parse(response);

                if (response.success == "true") {
                    if (followLink.textContent.trim() === 'Following') {
                        followLink.innerHTML = '<span>Follow</span>';
                        followLink.classList.remove('following');
                        followLink.classList.add('follow');
                    }
                    else {
                        followLink.innerHTML = '<span>Following</span>';
                        followLink.classList.remove('follow');
                        followLink.classList.add('following');
                    }
                }
            }
        }
    }

});




const searchbox_followLink = document.querySelector('.recent-searched');

searchbox_followLink.addEventListener('click', function(e) {
    const followLink = e.target.closest(".followbtn");

    if (followLink) {
        var flw = 0;        // 0 = to follow
        if (followLink.textContent.trim() === 'Following') {
            flw = 1;
        }
        else {
            flw = 0;
        }


        var userID = followLink.dataset.userId;

        var form_data = new FormData();
        form_data.append('userid_follow', userID);
        form_data.append('flw', flw);

        var ajax_request = new XMLHttpRequest();

        ajax_request.open('POST', 'get-data.php');

        ajax_request.send(form_data);

        ajax_request.onreadystatechange = function() {
            if(ajax_request.readyState == 4 && ajax_request.status == 200) {
                var response = ajax_request.responseText;

                if (response == 'session expired') {
                    window.location = '/../access/logout.php';
                }

                response = JSON.parse(response);

                if (response.success == "true") {
                    if (followLink.textContent.trim() === 'Following') {
                        followLink.innerHTML = '<span>Follow</span>';
                        followLink.classList.remove('following1');
                        followLink.classList.add('follow1');
                    }
                    else {
                        followLink.innerHTML = '<span>Following</span>';
                        followLink.classList.remove('follow1');
                        followLink.classList.add('following1');
                    }
                }
            }
        }
    }

});



const postlikeLinks = document.querySelectorAll('.btns.like-btn');

postlikeLinks.forEach((postlikeLink) => { 
    postlikeLink.addEventListener('click', () => {
        var liked = 0;      // 0 = to like
        if (postlikeLink.classList.contains('unliked')) {
            liked = 0;
        }
        else {
            liked = 1;
        }


        var recipeID = postlikeLink.dataset.recipeId;

        var form_data = new FormData();
        form_data.append('recipeid_tolike', recipeID);
        form_data.append('liked', liked);

        var ajax_request = new XMLHttpRequest();

        ajax_request.open('POST', 'get-data.php');

        ajax_request.send(form_data);

        ajax_request.onreadystatechange = function() {
            if(ajax_request.readyState == 4 && ajax_request.status == 200) {
                var response = ajax_request.responseText;

                if (response == 'session expired') {
                    window.location = '/../access/logout.php';
                }

                response = JSON.parse(response);

                if (response.success == "true") {
                    if (postlikeLink.classList.contains('unliked')) {
                        postlikeLink.innerHTML = 
                            '<svg aria-label="Unlike" color="rgb(255, 48, 64)" fill="rgb(255, 48, 64)" height="24" role="img" viewBox="0 0 48 48" width="24"><title>Unlike</title><path d="M34.6 3.1c-4.5 0-7.9 1.8-10.6 5.6-2.7-3.7-6.1-5.5-10.6-5.5C6 3.1 0 9.6 0 17.6c0 7.3 5.4 12 10.6 16.5.6.5 1.3 1.1 1.9 1.7l2.3 2c4.4 3.9 6.6 5.9 7.6 6.5.5.3 1.1.5 1.6.5s1.1-.2 1.6-.5c1-.6 2.8-2.2 7.8-6.8l2-1.8c.7-.6 1.3-1.2 2-1.7C42.7 29.6 48 25 48 17.6c0-8-6-14.5-13.4-14.5z"></path></svg>';
                        
                        
                        postlikeLink.classList.remove('unliked');
                        postlikeLink.classList.add('liked');
                    }
                    else {
                        postlikeLink.innerHTML = 
                            '<svg aria-label="Like" class="" color="rgb(38, 38, 38)" fill="rgb(38, 38, 38)" height="24" role="img" viewBox="0 0 24 24" width="24"><title>Like</title><path d="M16.792 3.904A4.989 4.989 0 0 1 21.5 9.122c0 3.072-2.652 4.959-5.197 7.222-2.512 2.243-3.865 3.469-4.303 3.752-.477-.309-2.143-1.823-4.303-3.752C5.141 14.072 2.5 12.167 2.5 9.122a4.989 4.989 0 0 1 4.708-5.218 4.21 4.21 0 0 1 3.675 1.941c.84 1.175.98 1.763 1.12 1.763s.278-.588 1.11-1.766a4.17 4.17 0 0 1 3.679-1.938m0-2a6.04 6.04 0 0 0-4.797 2.127 6.052 6.052 0 0 0-4.787-2.127A6.985 6.985 0 0 0 .5 9.122c0 3.61 2.55 5.827 5.015 7.97.283.246.569.494.853.747l1.027.918a44.998 44.998 0 0 0 3.518 3.018 2 2 0 0 0 2.174 0 45.263 45.263 0 0 0 3.626-3.115l.922-.824c.293-.26.59-.519.885-.774 2.334-2.025 4.98-4.32 4.98-7.94a6.985 6.985 0 0 0-6.708-7.218Z"></path></svg>';
                        
                        postlikeLink.classList.remove('liked');
                        postlikeLink.classList.add('unliked');
                    }
                }
            }
        }

    });
});


const commentforms = document.querySelectorAll('.comment-form');

commentforms.forEach((commentform) => {
    commentform.addEventListener('click', function(e) {
        const postbtn = e.target.closest(".post-btn");

        if (postbtn) {
            const input = commentform.querySelector('.textareainput');

            const typedText = input.value.trim();
        
            if (typedText != "") {
                var recipeID = commentform.dataset.recipeId;

                var form_data = new FormData();
                form_data.append('recipeid_tocomment', recipeID);
                form_data.append('content', typedText);

                var ajax_request = new XMLHttpRequest();

                ajax_request.open('POST', 'get-data.php');

                ajax_request.send(form_data);

                ajax_request.onreadystatechange = function() {
                    if(ajax_request.readyState == 4 && ajax_request.status == 200) {
                        var response = ajax_request.responseText;

                        if (response == 'session expired') {
                            window.location = '/../access/logout.php';
                        }

                        response = JSON.parse(response);

                        if (response.success == "true") {
                            // success
                            input.value = "";
                        }
                    }
                }
            }
        }

    });
});

