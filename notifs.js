$(document).ready(function () {
    checknotifs();
        setInterval(checknotifs,60000)
});

function checknotifs() {
    $.ajax({
        type: "post",
        url: "notifications.php",
        data: {
            'type': 'checknotif'
        },
        success:function (data) {
            console.log(data);
            data=JSON.parse(data);
            var count = parseInt(data[0].newnotifs);
            console.log(data);
            if(count!==0){
                $('.notif_count').show();
                $('.notif_count').html((count<9?"+"+(count):"+10" ));
            }
            else{
                $('.notif_count').hide();
            }
        }
    });
}

$(document).on('click',"body",function(event){
    console.log('121231');
    console.log(event.target.classList);
    console.log($('.header-user-notif').css('display'));
});
var offset = 0;
var limit = 10;
$(document).on('click','.notif_icon',function(){
    $('.notif_count').hide();
   if($('.header-user-notif').css("display")==="none"){
       console.log("dfsd");
       $('.header-user-notif').css("display","flex");
       show_notifs();
   }
   else{
       $('.header-user-notif').css("display","none");
   }
});

function show_notifs(){
    $.ajax({
        type:"post",
        url:"notifications.php",
        data:{
            'offset':offset,
            'limit':limit,
            'type':'shownotif'
        },
        success:function(result){
            console.log(result);
            result = JSON.parse(result);
            var j=0;

            while(j<result.length){
                if(result[j].notiftype==='upvote') {
                    var notif_temp = "<div class='row notification'><span class='upvote_icon'><svg xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\"><path fill='#df5350' d=\"M7 11h-6l11-11 11 11h-6v13h-10z\"/></svg></span>Your Post&nbsp;<span class='notif_content'><b>" + result[j].content + "..&nbsp; "+" </b></span>has an <b> &nbsp;Upvote</b></div>";
                    console.log('sdfsdf');

                }
                if(result[j].notiftype==='answer'){
                    var notif_temp = "<div class='row notification'><span class='answered_icon'><img src='./icons/answered_icon.svg' alt=''></span>Your Question &nbsp;<span class='notif_content'><b> " + result[j].content + "..&nbsp; </b> </span>has a new &nbsp;<b> Answer</b></div>";

                }
                if(result[j].notiftype==='request'){
                    var notif_temp = "<div class='row notification'><span class='requested_icon'><svg xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\"><path fill='#df5350' d=\"M14 18l10-7.088-10-6.912v3.042s-11.618 2.583-14 12.958c5.072-5.431 14-5.218 14-5.218v3.218z\"/></svg></span>A Question &nbsp;<span class='notif_content'><b> "+" "+ result[j].content + "..&nbsp;"+"</b> </span>has been <b>&nbsp;requested&nbsp;</b> from you</div>";
                }
                if (result[j].flag === '1') {
                    $('.earlier').append(notif_temp);
                }
                else if (result[j].flag === '0') {
                    $('.new').append(notif_temp);
                }
                // console.log(notif_temp);
                j++;
            }

            offset = offset + (result.length<limit?result.length:limit);
        }
    });
}

$(document).on('click','#more_notif',function(){
        console.log("dfsd");
        show_notifs();
});