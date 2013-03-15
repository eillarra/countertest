$('.js-post-add-new-locale').click(function(e) {
    var locale  = $(this).data('locale')
      , section = $('.js-post-section-tpl').html().replace(/__name__/g, locale)
    ;
      
    if (!$('a[href=#' + locale + ']').length) {
        $('.js-post-new-locale-section').before(section);
    }
    
    e.preventDefault();
});

$('.js-post-delete-locale').click(function(e) {
    console.log(19);
    e.preventDefault();
});
