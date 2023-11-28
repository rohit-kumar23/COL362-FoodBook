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
const searchcloseLink = document.querySelector('.profile-page1');
const clearLink = document.querySelector('.box-clear');
const createLink = document.querySelector('#cbtn');
const createLink2 = document.querySelector('.pgb3');
const createLink3 = document.querySelector('.pgb5');
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

createLink2.addEventListener('click', () => {
    createpost.classList.add('active-cp');
    document.querySelector('body').classList.add('bodyclass');
});

createLink3.addEventListener('click', () => {
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

profileLink.addEventListener('click', () => {
    window.location = 'profile.php';
});


createcloseLink2.addEventListener('click', () => {
    createpost.classList.remove('active-cp');
    document.querySelector('body').classList.remove('bodyclass');
});


const logoutLink = document.querySelector('#logoutbtn');

logoutLink.addEventListener('click', () => {
    window.location = '/../access/logout.php';
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






const friendsLink = document.querySelector('.friends-box-btn');
const friendsbox = document.querySelector('.friends-box');
const closeLinks1 = document.querySelectorAll('.lb-h3c');
const closeLinks2 = document.querySelectorAll('.like-black-box');



friendsLink.addEventListener('click', () => {
    friendsbox.classList.add('active-fb');
    document.querySelector('body').classList.add('bodyclass');

    var form_data = new FormData();
    form_data.append('friends', '1');

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




closeLinks1.forEach((closeLink1) => {
    closeLink1.addEventListener('click', () => {
        friendsbox.classList.remove('active-fb');
        document.querySelector('body').classList.remove('bodyclass');
    });
});


closeLinks2.forEach((closeLink2) => {
    closeLink2.addEventListener('click', () => {
        friendsbox.classList.remove('active-fb');
        document.querySelector('body').classList.remove('bodyclass');
    });
});



const friendsbox_followLink = document.querySelector('.lb-b2.lb-b2-like');

friendsbox_followLink.addEventListener('click', function(e) {
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