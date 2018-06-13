
$(document).ready(function () {
    $('.user_content_data').html("");
    display('answer');
});
$(document).ready(function () {
    $.ajax({
        url:"displayProfile.php",
        type:'get',
        data:{
            'type':'userinfo'
        },
        success:function (data) {
            data = JSON.parse(data);
            console.log(data);

            for(var key in data[0]){
                if(data[0][key]!==null && data[0][key]!=='' ){
                    console.log(key);
                    if(key!=='followerscount'){
                        $('.profile-details').append('<div class=" "><span class="col red-header user-name">'+key+':</span><span class="col" class="">'+data[0][key]+'</span></div>');
                        $('.followers-count').html("0");
                    }else if(key ==='followerscount'){
                        $('.followers-count').html(data[0][key]);
                    }

                }

            }
        }

    });
});

$(document).on('click','#showQuestions',function (e) {
    $('.content-filter-button').toggleClass('content-filter-button-active');
    $('.user_content_data').html("");
    display('question');
});
$(document).on('click','#showAnswers',function (e) {
    $('.content-filter-button').toggleClass('content-filter-button-active');
    $('.user_content_data').html("");
    display('answer');
});

function displayQuestions(data){

}
var offset = 0;
function display(ftype){
    var i =0;
    $.ajax({
        url:"displayProfile.php",
        type:"get",
        data:{
            'type':ftype
        },
        success:function(data){
            data = JSON.parse(data);
            console.log(data);
            var template;
            var answertemp;
            $('.user_content_data').append('<div class="content_head"><span class="content_count">'+data.length+'&nbsp;</span><span class="content_description">'+ftype+'s</span></div>');

            while(i<data.length){
                if(ftype==='answer'){
                    answertemp = '<div class=" feed-post-answer"><div class="answer-header red-header">Answer</div><div class="answer-content">'+data[i].content+'<button class="more-button">More...</button></div></div>';
                }else if(ftype==='question'){
                    answertemp = '';
                }
                template = '<div class="row feed-post"><div class="col"><div class="col feed-post-question"><div class=""><div class="row question-header red-header">Question<div class="row question-updates"><div class="new-answers"> <span class="count">'+(data[i].answerCount>0?("+"+data[i].answerCount):"-")+'</span> Answers</div><div class="new-comments"><span class="count">'+(data[i].commentCount>0?("+"+data[i].commentCount):"-")+'</span> Comments</div><div class="new-likes"><span class="count">'+(data[i].upvoteCount>0?("+"+data[i].upvoteCount):"-")+'</span> Likes </div></div></div><div class="question-content">'+data[i].question_content+'</div>' +'</div>'+answertemp+'</div></div></div>';
                $('.user_content_data').append(template);
                i++;
            }
        },
        error:function (){
            console.log('request unsuccessful');
        }
    });
}
$(document).on('click','.more-button',function (e) {
    expandAnswer(e);

});

$(document).on('click','.cancel_details_edit',function () {
    console.log("11111111");
    $('.userdetails input').val("");
    $('.modal_container').css("display",'none');
});
$(document).on('click','#editdetails',function () {
   $('.modal_container').css('display',"block");
    $.ajax({
        url:"displayProfile.php",
        type:'get',
        data:{
            'type':'userinfo'
        },
        success:function (data) {
            data = JSON.parse(data);
            console.log(data);
            for(var key in data[0]){
                if(data[0][key]!==null){
                    $('#'+key).val(data[0][key]);
                }
            }
        }

    });

});
$(document).on('click','.save_details_button',function () {
    // var userdata = document.querySelectorAll('.userdetails input');
    var userdata ={
        'name':$('.userdetails #name').val(),
        'city':$('#city').val(),
        'gender':$('#gender').val(),
        'tagline':$('#tagline').val(),
        'country':$('#country').val(),
        'dob':$('#dob').val(),
        'phoneno':$('#phoneno').val()

    };
    var i=0;
    console.log('this is user data');
    console.log(userdata);

    console.log($('#city').val());
    $.ajax({
        url:"displayProfile.php",
        type:"post",
        data:{
            'name':$('.userdetails #name').val(),
            'city':$('#city').val(),
            'gender':$('#gender').val(),
            'tagline':$('#tagline').val(),
            'country':$('#country').val(),
            'dob':$('#dob').val(),
            'phoneno':$('#phoneno').val()

        },
        success:function (result) {
            console.log(result);
            $('.userdetails input').val("");
            $('.modal_container').css("display","none");
        }
    })
});