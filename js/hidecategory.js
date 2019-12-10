jQuery(function ($) { 

    $('.hide-category').click(function(){
        
        let button = $(this);

        let categoryId = button.attr('data-categoryid');
        let categoryName = button.attr('data-categoryname');

        console.log(categoryId, ' ', categoryName);


    });

});