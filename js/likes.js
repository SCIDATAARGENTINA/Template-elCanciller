jQuery(document).ready(function ($) {

let setCookie = (id) => {
    console.log('setting cookie..');
    if (validateIfLiked(id)){
        console.log('post liked already');
        return;
    }

    let likedPosts = Cookies.get('likedPosts');
    let arrIds = [];

    if (likedPosts) {

        console.log('update current cookie array');
        arrIds = JSON.parse(likedPosts);
        arrIds.push(id);
        likedPosts = JSON.stringify(arrIds);
        Cookies.set('likedPosts', likedPosts, { expires: Infinity });

    } else {
        console.log('create cookie array');
        arrIds = [id];
        likedPosts = JSON.stringify(arrIds);
        Cookies.set('likedPosts', likedPosts, { expires: Infinity });

    }

};

let validateIfLiked = (id) => {

    if (Cookies.get('likedPosts')) {
        let likedPosts = Cookies.get('likedPosts');
        let arrIds = JSON.parse(likedPosts);

        return arrIds.includes(id);
    } else {
        return false;
    }

};

let setAllLikes = () => {

    if (Cookies.get('likedPosts')) {
        let likedPosts = Cookies.get('likedPosts');
        let arrIds = JSON.parse(likedPosts);

        arrIds.forEach(function (value) {
            let el = document.querySelectorAll('.like[data-id="' + value + '"]');
            if (el) {
                el.forEach(function (el) {
                    el.classList.add('liked');
                })
            }
        });
    }
};

let updateUserFavs = (post_id, url, logged_in, callback) => {
    
    $.ajax({
        url: url,
        type: 'POST',
        data: {
            'action': 'add_user_favoritos',
            post_id
        },
        success: function (result) {

            if(!logged_in){
                console.log('logged in:', logged_in);
                setCookie(post_id);
            }

            callback();

        },
        error: function (errorThrown) {
            console.log(errorThrown);
        }
    });

}

let likePost = () => {

        $('.like').click(function(){
            // Don't follow the link
            event.preventDefault();

            let like = event.target;
            let id = like.getAttribute('data-id');

            updateUserFavs(id, like_params.ajaxurl, like_params.logged_in, function(){
                like.classList.add('liked');
            });
                
        });
};

likePost();
if (!like_params.logged_in){
    setAllLikes();
}

});