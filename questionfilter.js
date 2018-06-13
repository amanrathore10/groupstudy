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

// $('.red-header[data-role="followbutton"]').on('click',function (e) {
//     e.preventDefault();
//     console.log("dfsdfsd");
// });

$('#feed-filter').on('click',function () {
    offset=0;
    var p = 0;
    filteredSubjects = [];
    $('#display-questions').html("");
    $.each($("input[type='checkbox']:checked"),function(ev){
        filteredSubjects.push($(this).attr("value"));
    });
    load(filteredSubjects,p);
    offset++;
    /*$.ajax({
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
            'offset': function(){
                return offset++;
            }

        },
        url:'../GroupStudy/displayquestions.php',
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
    });*/


});
function display_question(input){
    var j = 0;

    while(j<input.length){
        var question_template =
            '<div class="row feed-post" ><div class="col"><div class="col feed-post-question" data-role="'+input[j].questionid+'"><div class="question-header red-header">Question</div><div class="question-content">'+input[j].question_content+'</div><div class="question-action"><button class="red-header answer-button" id="'+input[j].questionid+'" data-tagid1="'+input[j].tagid1+'" data-qid="'+input[j].questionid+'">Answer</button><button class="red-header" data-role="followbutton" data-qid="'+input[j].questionid+'">Follow</button><button class="red-header request-button" data-qid="'+input[j].questionid+'">Request</button></div></div><div class="request_container"  data-qid="'+input[j].questionid+'"></div></div> </div>';

        $('#display-questions').append(question_template);
        j++;
    }

}
setInterval(function () {
    document.onscroll = function () {
        // var scrollTop     = $(window).scrollTop();
        //     console.log("jquery"+scrollTop);
        // var elementOffset = $('#content-loader').offset().top;
        //     console.log("-jquery"+elementOffset);
        var scrollvalue = document.documentElement.scrollTop;
        // var loading_height = document.getElementById('content-loader').offsetBottom -document.getElementById('content-loader').offsetHeight;
        var offsetheight = document.documentElement.offsetHeight;
        console.log("scrollvalue"+scrollvalue);
        console.log("offsetheight"+offsetheight);
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
        url:'../GroupStudy/displayquestions.php',
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
