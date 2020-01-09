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

let updateLikeData = (likeCount, id, url, logged_in, liked) => {
    if (!logged_in){
        console.log('is cache time');
        if (validateIfLiked(id)) {
            console.log('ya esta likeado en cache');

            return;
        }
    }else{
        console.log('is php time');
        if(liked){
            console.log('ya esta likeado');
            return;
        }
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
                console.log('se sumo el like al post');
                if (!logged_in) {
                    setCookie(id);
                }
            },
            error: function (errorThrown) {
                //console.log(errorThrown);
            }
        });

};

let updateUserFavs = (post_id, url, isLiked) => {

    if (isLiked) {
        console.log('likedliked');
        return;
    }

    $.ajax({
        url: url,
        type: 'POST',
        data: {
            'action': 'add_user_favoritos',
            post_id
        },
        success: function (result) {
            console.log('updated ok', result);
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

                updateLikeData(parseInt(data.acf.likes), id, likes_params.ajaxurl, likes_params.logged_in, likes_params.liked);

                if (likes_params.logged_in){
                    console.log('updateUserFavs');
                    updateUserFavs(id, likes_params.ajaxurl, likes_params.liked);
                }

                like.classList.add('liked');
            });
        });
};

likePost();
if (!likes_params.logged_in){
    setAllLikes();
}

});