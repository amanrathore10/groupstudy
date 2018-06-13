var subjects = ["Accounting","Agriculture","Algebra","Architecture","Art","Astronomy","Biology","Botany","Business","Business Stud","Calculus","Chemistry","Civics","Commerce","Computer","Design","Drama","Earth Science","Economics","Electricity","Electronics","English","Environmental Sci","Finance","Forensic","Geography","Geology","Geometry","Grammar","Health","Hindi","History","Inorganic Chemistry","Journalism","Language","Law","Literature","Macroeconomics","Magnetism","Management","Marine","Maths","Mechanics","Microeconomics","Music","Nutrition","Organic Chemistry","Philosophy","Photography","Physical Chemistry","Physical Edu","Physics","Poetry","Political Sci","Psychology","Religion","Renaissance","Robotics","Science","Social Sci","Social Std","Sociology","Statistics","Stories","Trigonometry","Zoology"];
var filteredSubjects = [];
var offset = 0;
$(document).ready(function(){
    var count = 0;
    while( count<subjects.length){
        $('#select-subject-buttons').append('<li class="row"><a href="" class="red-option">'+subjects[count]+'</a><span><input class="question-subject" type="checkbox" id="'+subjects[count]+'" value="'+subjects[count]+'"><label for="'+subjects[count]+'"></label></span></li>');
        count++;
    }
});
setInterval(function () {
    document.onscroll = function () {
        // var scrollTop     = $(window).scrollTop();
        //     console.log("jquery"+scrollTop);
        // var elementOffset = $('#content-loader').offset().top;
        //     console.log("-jquery"+elementOffset);
        var scrollvalue = document.documentElement.scrollTop;
        // var loading_height = document.getElementById('content-loader').offsetBottom -document.getElementById('content-loader').offsetHeight;
        var offsetheight = document.documentElement.offsetHeight;
        // console.log("scrollvalue"+scrollvalue);
        // console.log("offsetheight"+offsetheight);
        if(offsetheight-scrollvalue<700){
            console.log("keeploading");
            filteredSubjects = [];
            $.each($("input[type='checkbox']:checked"),function(ev){
                filteredSubjects.push($(this).attr("value"));
            });
            load(filteredSubjects,offset);
            offset++;
        }

    };
},5000);
$('#feed-filter').on('click',function () {
    var p = 0;
    filteredSubjects = [];
    $('#display-feed').html("");
    $.each($("input[type='checkbox']:checked"),function(ev){
        filteredSubjects.push($(this).attr("value"));
    });
    console.log(filteredSubjects);
    load(filteredSubjects,p);
    offset++;
});
function display_question(input) {
    var j = 0;
    console.log("dfkdlkfjdslkjfsd");
            var feed_template = "";
    while (j < input.length) {
        if ((input[j].upvote === '0' || input[j].upvote === null) && (input[j].bookmark === '0'|| input[j].upvote === null)) {
            feed_template =
                '<div class="row feed-post" data-role="' + input[j].answerid + '"><div class="col"><div class="col feed-post-question"><div class="question-header red-header">Question</div><div class="question-content">' + input[j].question_content + '</div></div><div class=" feed-post-answer"><div class="answer-header red-header">Answer</div><div class="row answerer"><div class="answerer-info row"><div class="answerer-image"><img src="'+ input[j].photourl+'" alt=""></div><div class="answerer-details col"><span class="answerer-name">'+ input[j].username+'</span><span class="answerer-others">'+ input[j].city+'</span></div></div><div ><span class="red-header answerer-follow" data-role="' + input[j].userid + '">Follow</span></div></div><div class="answer-content">' + input[j].content + '<button class="more-button" onclick="expandAnswer(event)">..more</button></div><div class="row post-actions"><div class="post-action-tag upvote-button upvote" data-answerid="' + input[j].answerid + '">Upvote <span>'+(input[j].upvoteno>0?input[j].upvoteno:'')+'</span></div><div class="post-action-tag bookmark-button bookmarked" data-answerid="' + input[j].answerid + '">Bookmark</div><div class="post-action-tag">Share</div><div class="post-action-tag">Report</div><div class="verify-button "> <div><span class="tick">&#x2714; Verify</span></div></div></div><div class="comment_system"><div class="col"><div class="comments"><div class="comments_header"><div class="comment_heading">Comments</div> <div class="show_comments_button" data-role="' + input[j].answerid + '">Show comments</div></div><div class="comments_container" data-role="' + input[j].answerid + '"></div></div><div class="comment_input_container"><div class=""><img src="" class="user-image" alt=""></div><div contenteditable="true" class="comment_input" data-role="' + input[j].answerid + '" aria-placeholder="Leave a Comment..."></div></div></div></div></div></div></div>';

        }else if (input[j].upvote === '1'  && input[j].bookmark === '1') {
            console.log('bookmarked post');
            feed_template =
                '<div class="row feed-post" data-role="' + input[j].answerid + '"><div class="col"><div class="col feed-post-question"><div class="question-header red-header">Question</div><div class="question-content">' + input[j].question_content + '</div></div><div class=" feed-post-answer"><div class="answer-header red-header">Answer</div><div class="row answerer"><div class="answerer-info row"><div class="answerer-image"><img src="'+ input[j].photourl+'" alt=""></div><div class="answerer-details col"><span class="answerer-name">'+ input[j].username+'</span><span class="answerer-others">'+ input[j].city+'</span></div></div><div ><span class="red-header answerer-follow" data-role="' + input[j].userid + '">Follow</span></div></div><div class="answer-content">' + input[j].content + '<button class="more-button" onclick="expandAnswer(event)">..more</button></div><div class="row post-actions"><div class="post-action-tag upvote-button upvoted" data-answerid="' + input[j].answerid + '">Upvoted <span>'+(input[j].upvoteno>0?input[j].upvoteno:'')+'</span></div><div class="post-action-tag bookmark-button bookmarked" data-answerid="' + input[j].answerid + '">Bookmarked</div><div class="post-action-tag">Share</div><div class="post-action-tag">Report</div><div class="verify-button "> <div><span class="tick">&#x2714; Verify</span></div></div></div><div class="comment_system"><div class="col"><div class="comments"><div class="comments_header"><div class="comment_heading">Comments</div> <div class="show_comments_button" data-role="' + input[j].answerid + '">Show comments</div></div><div class="comments_container" data-role="' + input[j].answerid + '"></div></div><div class="comment_input_container"><div class=""><img src="" class="user-image" alt=""></div><div contenteditable="true" class="comment_input" data-role="' + input[j].answerid + '" aria-placeholder="Leave a Comment..." data-role="' + input[j].answerid +'"></div></div></div></div></div></div></div>';
            console.log(feed_template+"aaaaaaaaaaaaaaaaaaaalksd");
        }else if ((input[j].upvote === '0'||input[j].upvote === null ) && input[j].bookmark === '1') {
             feed_template =
                '<div class="row feed-post" data-role="' + input[j].answerid + '"><div class="col"><div class="col feed-post-question"><div class="question-header red-header">Question</div><div class="question-content">' + input[j].question_content + '</div></div><div class=" feed-post-answer"><div class="answer-header red-header">Answer</div><div class="row answerer"><div class="answerer-info row"><div class="answerer-image"><img src="'+ input[j].photourl+'" alt=""></div><div class="answerer-details col"><span class="answerer-name">'+ input[j].username+'</span><span class="answerer-others">'+ input[j].city+'</span></div></div><div ><span class="red-header answerer-follow" data-role="' + input[j].userid + '">Follow</span></div></div><div class="answer-content">' + input[j].content + '<button class="more-button" onclick="expandAnswer(event)">..more</button></div><div class="row post-actions"><div class="post-action-tag upvote-button upvote" data-answerid="' + input[j].answerid + '">Upvote <span>'+(input[j].upvoteno>0?input[j].upvoteno:'')+'</span></div><div class="post-action-tag bookmark-button bookmarked" data-answerid="' + input[j].answerid + '">Bookmarked</div><div class="post-action-tag">Share</div><div class="post-action-tag">Report</div><div class="verify-button "> <div><span class="tick">&#x2714; Verify</span></div></div></div><div class="comment_system"><div class="col"><div class="comments"><div class="comments_header"><div class="comment_heading">Comments</div> <div class="show_comments_button" data-role="' + input[j].answerid + '">Show comments</div></div><div class="comments_container" data-role="' + input[j].answerid + '"></div></div><div class="comment_input_container"><div class=""><img src="" class="user-image" alt=""></div><div contenteditable="true" class="comment_input" data-role="' + input[j].answerid + '" aria-placeholder="Leave a Comment..." data-role="' + input[j].answerid + '"></div></div></div></div></div></div></div>';

        }else if (input[j].upvote === '1' && (input[j].bookmark === '0'||input[j].bookmark === null)) {
             feed_template =
                '<div class="row feed-post" data-role="' + input[j].answerid + '"><div class="col"><div class="col feed-post-question"><div class="question-header red-header">Question</div><div class="question-content">' + input[j].question_content + '</div></div><div class=" feed-post-answer"><div class="answer-header red-header">Answer</div><div class="row answerer"><div class="answerer-info row"><div class="answerer-image"><img src="'+ input[j].photourl+'" alt=""></div><div class="answerer-details col"><span class="answerer-name">'+ input[j].username+'</span><span class="answerer-others">'+ input[j].city+'</span></div></div><div ><span class="red-header answerer-follow" data-role="' + input[j].userid + '">Follow</span></div></div><div class="answer-content">' + input[j].content + '<button class="more-button" onclick="expandAnswer(event)">..more</button></div><div class="row post-actions"><div class="post-action-tag upvote-button upvoted" data-answerid="' + input[j].answerid + '">Upvoted <span>'+(input[j].upvoteno>0?input[j].upvoteno:'')+'</span></div><div class="post-action-tag bookmark-button bookmark" data-answerid="' + input[j].answerid + '">Bookmark</div><div class="post-action-tag">Share</div><div class="post-action-tag">Report</div><div class="verify-button "> <div><span class="tick">&#x2714; Verify</span></div></div></div><div class="comment_system"><div class="col"><div class="comments"><div class="comments_header"><div class="comment_heading">Comments</div> <div class="show_comments_button" data-role="' + input[j].answerid + '">Show comments</div></div><div class="comments_container" data-role="' + input[j].answerid + '"></div></div><div class="comment_input_container"><div class=""><img src="" class="user-image" alt=""></div><div contenteditable="true" class="comment_input" data-role="' + input[j].answerid + '" aria-placeholder="Leave a Comment..." data-role="' + input[j].answerid + '"></div></div></div></div></div></div></div>';

        } else {

             feed_template =
                '<div class="row feed-post" data-role="' + input[j].answerid + '"><div class="col"><div class="col feed-post-question"><div class="question-header red-header">Question</div><div class="question-content">' + input[j].question_content + '</div></div><div class=" feed-post-answer"><div class="answer-header red-header">Answer</div><div class="row answerer"><div class="answerer-info row"><div class="answerer-image"><img src="'+ input[j].photourl+'" alt=""></div><div class="answerer-details col"><span class="answerer-name">'+ input[j].username+'</span><span class="answerer-others">'+ input[j].city+'</span></div></div><div ><span class="red-header answerer-follow" data-role="' + input[j].userid + '">Follow</span></div></div><div class="answer-content">' + input[j].content + '<button class="more-button" onclick="expandAnswer(event)">..more</button></div><div class="row post-actions"><div class="post-action-tag upvote-button upvote" data-answerid="' + input[j].answerid + '">Upvote <span>'+(input[j].upvoteno>0?input[j].upvoteno:'')+'</span></div><div class="post-action-tag bookmark-button bookmark" data-answerid="' + input[j].answerid + '">Bookmark</div><div class="post-action-tag">Share</div><div class="post-action-tag">Report</div><div class="verify-button "> <div><span class="tick">&#x2714; Verify</span></div></div></div><div class="comment_system"><div class="col"><div class="comments"><div class="comments_header"><div class="comment_heading">Comments</div> <div class="show_comments_button" data-role="' + input[j].answerid + '">Show comments</div></div><div class="comments_container" data-role="' + input[j].answerid + '"></div></div><div class="comment_input_container"><div class=""><img src="" class="user-image" alt=""></div><div contenteditable="true" class="comment_input" data-role="' + input[j].answerid + '" aria-placeholder="Leave a Comment..." data-role="' + input[j].answerid + '"></div></div></div></div></div></div></div>';


        }
            console.log(feed_template);
            $('#display-feed').append(feed_template);

            j++;
        }


}

function load(filteredSubjects,offset) {
    $.ajax({
        type:"get",
        data:{
            'filteredsubjects':filteredSubjects,
            'now':function(){
                var start = new Date();
                var timestamp = "'"+start.getFullYear()+"-"+(start.getMonth()<=9?"0":"")+(start.getMonth()+1)+"-"+start.getDate()+" "+start.getHours()+":"+(start.getMinutes()<=9?"0":"")+start.getMinutes()+":"+start.getSeconds()+"'";
                console.log(timestamp);
                return timestamp;
            },
            'limit':1,
            'offset': offset
        },
        url:'../GroupStudy/displayfeed.php',
        success:function (result) {
            console.log(result);
            if(result !== false){
                console.log(JSON.parse(result));
                display_question(JSON.parse(result));

            }
            else{
                console.log("error");
            }
        }
    });

}
$(document).on('click','.upvote-button',function (e) {
    e.preventDefault();
    console.log("dfdskljflksdjf");
    var dataanswerid = $(this).attr('data-answerid');
    console.log(dataanswerid);
    var upvotebutton = $(this);
    var selector = ".feed-post[data-role='"+dataanswerid+"']";
    var datarole = $(selector).attr("data-role");
    // console.log(datatagid1);
    console.log(datarole);
    if(dataanswerid === datarole){
        var upvote_status = "";
        if(upvotebutton.hasClass('upvoted')){
            upvote_status = "upvoted";
        }
        else{
            upvote_status = "not_upvoted";
        }
       $.ajax({
           'type':'get',
           'url':'postactions.php',
           'data':{
               'upvotestatus':upvote_status,
               'answerid':dataanswerid,
               'questionid':'qid12345446546545'

           },
           'success':function (result) {
               console.log(result);
               upvotebutton.toggleClass('upvoted');
               if(upvotebutton.hasClass('upvoted')){
                   upvotebutton.html('Upvoted');
               }
               else{
                   upvotebutton.html('Upvote');
               }
               console.log('........');

           }

       });
    }
});
$(document).on('click','.bookmark-button',function (e) {
    e.preventDefault();
    console.log("dfdskljflksdjf");

    var dataanswerid = $(this).attr('data-answerid');
    console.log(dataanswerid);
    var bookmarkbutton = $(this);
    var selector = ".feed-post[data-role='"+dataanswerid+"']";
    var datarole = $(selector).attr("data-role");
    // console.log(datatagid1);
    console.log(datarole);
    if(dataanswerid === datarole){
        var bookmark_status = "";
        if(bookmarkbutton.hasClass('bookmarked')){
            bookmark_status = "bookmarked";
        }
        else{
            bookmark_status = "not_bookmarked";
        }
        $.ajax({
            'type':'get',
            'url':'postactions.php',
            'data':{
                'bookmarkstatus':bookmark_status,
                'answerid':dataanswerid,
                'questionid':'qid12345446546545'

            },
            'success':function (result) {
                console.log(result);
                bookmarkbutton.toggleClass('bookmarked');
                if(bookmarkbutton.hasClass('bookmarked')){
                    bookmarkbutton.html('Bookmarked');
                }
                else{
                    bookmarkbutton.html('Bookmark');
                }
                console.log('........');

            }

        });
    }
});

$(document).on('keypress','.comment_input',function(event) {
    if (event.keyCode === 13) {
        event.preventDefault();
        console.log($(this).attr('data-role'));
        console.log($(this).text());
        $.ajax({
            type:"post",
            url:"postactions.php",
            data:{
                'comment':$(this).text(),
                'answerid':$(this).attr('data-role'),
                'type':"storecomment"
            },
            success:function(result){
                console.log(result);
                $('.comments').append($(this).text());
                $(this).text("");
            }
        });
        $(".comments_container[data-role='"+$(this).attr('data-role')+"']").append('<div class="comment"><img src="" class="user-image comment_image"><div class="comment_text">'+$(this).text()+'</div></div>');
        $(this).text("");
        getuser();
    }
});
$(document).on('click','.show_comments_button',function () {
    console.log($(this).attr('data-role'));
    console.log($(this));
    var dataid = $(this).attr('data-role');
    if($('.comments_container[data-role="'+dataid+'"]').css('display')==='none'){

        $('.comments_container[data-role="'+dataid+'"]').html("");
        $.ajax({
            type: 'post',
            url: "postactions.php",
            data: {
                'type': 'showcomments',
                'offset': '0',
                'answerid':dataid
            },
            success: function (result) {
                result = JSON.parse(result);
                console.log(result.length);
                var j = 0;
                while (j < result.length) {
                    console.log('heyeayaaaaaa');
                    console.log('.comments_container[data-role="' + dataid + '"]');
                    console.log('.comments_container[data-role="'+dataid+'"]');
                                $('.comments_container[data-role="'+dataid+'"]').append('<div class="comment"><img src="' + result[j].photourl + '" class="user-image comment_image"><div class="comment_text">' + result[j].comment + '</div></div>');
                    j++;
                }
                if(result.length===10){
                    console.log('result 10');
                    $('.comments_container[data-role="' + $(this).attr('data-role') + '"]').append('<span class="morecomments">morecomments</span>');
                }


            }
        });
    }

    $('.comments_container[data-role="' + $(this).attr('data-role') + '"]').toggle(200, 'linear');
});
$(document).on('click','.morecomments',function () {
    console.log("79849849848");
});
$(document).on('click','.answerer-follow',function () {
    var followedid= $(this).attr('data-role');
    console.log(followedid);
   $.ajax({
       type:"post",
       url:"postactions.php",
       data:{
            'type':'follow',
           'followedid':followedid
       },
       success:function (data) {
           console.log(data);
           $('.answerer-follow[data-role="'+followedid+'"]').toggleClass('followed');
           $('.answerer-follow[data-role="'+followedid+'"]').html('Followed');
           if(!$('.answerer-follow[data-role="'+followedid+'"]').hasClass('followed')){
               $('.answerer-follow[data-role="'+followedid+'"]').html("Follow");
           }
       }
   })
});