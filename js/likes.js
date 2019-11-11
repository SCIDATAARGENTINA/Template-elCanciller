var cjs = require("cookies-js");

let getPostData = (id, type) => {

    if (type == "post" || type == null) {
        type = "posts";
    }

    const url = `https://elcanciller.com/wp-json/wp/v2/${type}/${id}`;

    const headers = {

    };

    return fetch(url, { headers }).then(data => data.json());

};

let setCookie = (cjs, id) => {

    let likedPosts = cjs.get('likedPosts');
    let arrIds = [];

    if (likedPosts) {

        arrIds = JSON.parse(likedPosts);
        arrIds.push(id);
        likedPosts = JSON.stringify(arrIds);
        cjs.set('likedPosts', likedPosts, { expires: Infinity });

    } else {

        arrIds = [id];
        likedPosts = JSON.stringify(arrIds);
        cjs.set('likedPosts', likedPosts, { expires: Infinity });

    }

};

let validateIfLiked = (id) => {

    if (cjs.get('likedPosts')) {
        let likedPosts = cjs.get('likedPosts');
        let arrIds = JSON.parse(likedPosts);

        return arrIds.includes(id);
    } else {
        return false;
    }

};

let setAllLikes = () => {

    if (cjs.get('likedPosts')) {
        let likedPosts = cjs.get('likedPosts');
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

let updateLikeData = (likeCount, id, url, $) => {

    if (validateIfLiked(id)) {
        console.log('Ya diste like a esa publicación');
        return;
    }

    $(document).ready(function () {

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
                setCookie(cjs, id);
                console.log('updated');
            },
            error: function (errorThrown) {
                //console.log(errorThrown);
            }
        });

    });

};

let likePost = () => {

    document.addEventListener('click', async function (event) {

        // If the clicked element doesn't have the right selector, bail
        if (!event.target.matches('.like')) return;

        // Don't follow the link
        event.preventDefault();

        let like = event.target;
        let id = like.getAttribute('data-id');
        let postType = like.getAttribute('data-type');
        let data = await getPostData(id, postType);

        updateLikeData(parseInt(data.acf.likes), id, content_data.ajax_url, $);

        like.classList.add('liked');

    }, false);

};

likePost();
setAllLikes();