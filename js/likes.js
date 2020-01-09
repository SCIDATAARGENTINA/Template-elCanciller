jQuery(document).ready(function ($) {

let setCookie = (id) => {

    let likedPosts = Cookies.get('likedPosts');
    let arrIds = [];

    if (likedPosts) {

        arrIds = JSON.parse(likedPosts);
        arrIds.push(id);
        likedPosts = JSON.stringify(arrIds);
        Cookies.set('likedPosts', likedPosts, { expires: Infinity });

    } else {

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

let updateUserFavs = (post_id, url, logged_in) => {
    console.log('updating..');
    $.ajax({
        url: url,
        type: 'POST',
        data: {
            'action': 'add_user_favoritos',
            post_id
        },
        success: function (result) {
            console.log('updated');
            console.log(result);
            if(!logged_in){
                setCookie(post_id);
            }

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

            updateUserFavs(id, like_params.ajaxurl, like_params.logged_in);

            like.classList.add('liked');

                
        });
};

likePost();
if (!like_params.logged_in){
    setAllLikes();
}

});