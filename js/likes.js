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

let updateLikeData = (likeCount, id, url) => {

    if (validateIfLiked(id)) {
        console.log('Ya diste like a esa publicación');
        return;
    }

        $.ajax({
            url: url,
            type: 'POST',
            data: {
                action: 'ajax_call_count_likes',
                post_id: id,
                like_count: likeCount,
            },
            success: function (result) {
                //console.log(result);
                setCookie(id);
            },
            error: function (errorThrown) {
                //console.log(errorThrown);
            }
        });

};

let updateUserFavs = (post_id, url) => {

    if (validateIfLiked(id)) {
        console.log('Ya diste like a esa publicación');
        return;
    }

    $.ajax({
        url: url,
        type: 'POST',
        data: {
            action: 'add_user_favoritos',
            post_id
        },
        success: function (result) {
            console.log(result);
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

                updateLikeData(parseInt(data.acf.likes), id, likes_params.ajaxurl);
                updateUserFavs(id, url);
                like.classList.add('liked');
            });
        });
};

likePost();
setAllLikes();

});