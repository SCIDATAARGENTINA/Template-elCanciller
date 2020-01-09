jQuery(document).ready(function ($) {

let getPostData = (id, type) => {

    if (type == "post" || type == null) {
        type = "posts";
    }

    const url = `http://142.93.24.13/wp-json/wp/v2/${type}/${id}`;

    return $.get(url);

};

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

    $.ajax({
        url: url,
        type: 'POST',
        data: {
            'action': 'add_user_favoritos',
            post_id
        },
        success: function (result) {

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
            let postType = like.getAttribute('data-type');
            getPostData(id, postType).done(data => {

                updateUserFavs(parseInt(data.acf.likes), id, likes_params.ajaxurl, likes_params.liked, likes_params.logged_in);

                like.classList.add('liked');
            });
        });
};

likePost();
if (!likes_params.logged_in){
    setAllLikes();
}

});