$(document).ready(function(e) {

    // colorbox call
    $.colorbox({
        href: "ajax/ajax.html",
        open: true,
        width: "85%",
        transition: "elastic",
        title: false,
        className: "myclass-2",
        closeButton: false,
        height: '500',

        onComplete: function() {
            $('.small-button').flexidropdown('click');
        }
    });

    // colorbox close
    $(document).on('click', '.pop-remove', function() {
        $.colorbox.close();
    });

    //default
    $('.small-button').flexidropdown()

    // full dropdown width and custom class
    $('.full-width').dropdown({
        dropdownWidth: true, //true or false
        customClass: 'custom-class',
        dropdownTopAuto: true, //true or false

    });

});
