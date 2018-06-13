$(document).on('click','.request-button',function (e) {
    e.preventDefault();
    requested_usertag = [];
    $('.request_container ').html("");

    var dataqid1 = $(this).attr('data-qid');
    console.log(dataqid1);

    var selector = ".request_container[data-qid='"+dataqid1+"']";
    var dataqid2 = $(selector).attr("data-qid");
    // var datatagid1 = $(this).attr('data-tagid1');
    // console.log(datatagid1);

    if(dataqid1 === dataqid2){
        console.log(selector);
        $(selector).addClass('smooth_trans');
        // var tagid1 = $(this).attr('data-tagid1');
        // $('.request_container .ui-widget').detach();
        $(selector).html('<div class="requested_users"></div><div class="ui-widget">\n' +
            '                                    <label for="autosuggest"><img src="icons/user.svg" alt=""></label>\n' +
            '                                    <input type="text" id="autosuggest" value="">\n' +
            '                                    <input type="hidden" id="autosuggestid" value="">\n' +
            '                                </div>' +
            '<div class="submit_request_tags"><submit class="request_submit_button" data-qid="'+dataqid1+'">Submit</submit></div>');
    }

});
