var subjects = ["Accounting","Agriculture","Algebra","Architecture","Art","Astronomy","Biology","Botany","Business","Business Stud","Calculus","Chemistry","Civics","Commerce","Computer","Design","Drama","Earth Science","Economics","Electricity","Electronics","English","Environmental Sci","Finance","Forensic","Geography","Geology","Geometry","Grammar","Health","Hindi","History","Inorganic Chemistry","Journalism","Language","Law","Literature","Macroeconomics","Magnetism","Management","Marine","Maths","Mechanics","Microeconomics","Music","Nutrition","Organic Chemistry","Philosophy","Photography","Physical Chemistry","Physical Edu","Physics","Poetry","Political Sci","Psychology","Religion","Renaissance","Robotics","Science","Social Sci","Social Std","Sociology","Statistics","Stories","Trigonometry","Zoology"];
var index = 0;
while(index<subjects.length){
    $('#subjects-list').append('<option value="'+subjects[index]+'"></option>');
    index++;
}
function shortensize() {
    if($('#ask').text().length > 30){
        $('#ask').css('font-size','15px');
    }
}

function hide_notify() {
    $('.message').removeClass('error-notification');
    $('.message').html("");
}
function notify(input){
    $('.message').addClass('error-notification');
    $('.message').html(input);
    console.log(input);
    setTimeout(hide_notify,5000);
}
var tags = [];
var message ="";
document.getElementById('addtag-btn').addEventListener('click',function (ev) {


   var inputtag = $('#question-tag-input').val();
   console.log(inputtag);
   var i=0;

   if($.inArray(inputtag,subjects)!== -1){
       while(i<subjects.length){
           if(subjects[i]=== inputtag ){

               if(tags.length<3){
                   if($.inArray(inputtag,tags)=== -1){
                       tags.push(inputtag);
                       $('#question-tags').append('<span class="question-tag" onclick="deletetag(this)">'+inputtag+'</span>');
                       $('#question-tag-input').val("");

                       // console.log(tags);
                   }
               }
               if(tags.length===3){
                   if($.inArray(inputtag,tags)!== -1){
                       message = 'Tag already exists';
                       notify(message);

                       // console.log(tags);
                   }
                   else{
                       message = 'Maximum 3 tags are allowed';
                       notify(message);
                   }
               }

           }
           i++;
       }
   }else{
       message = 'Select appropriate tag from the list';
       notify(message);
   }

});
$('#question-tag-input').keypress(function(event) {
    console.log('heye yeyye');
    if (event.keyCode === 13) {
        var inputtag = $(this).val();
        console.log(inputtag);
        var i=0;

        if($.inArray(inputtag,subjects)!== -1){
            while(i<subjects.length){
                if(subjects[i]=== inputtag ){
                    if(tags.length<3){
                        if($.inArray(inputtag,tags)=== -1){
                            tags.push(inputtag);
                            $('#question-tags').append('<span class="question-tag" onclick="deletetag(this)">'+inputtag+'</span>');
                            $('#question-tag-input').val("");

                            // console.log(tags);
                        }
                    }
                }
                if(tags.length===3){
                    if($.inArray(inputtag,tags)!== -1){
                        message = 'Tag already exists';
                        notify(message);

                        // console.log(tags);
                    }
                    else{
                        message = 'Maximum 3 tags are allowed';
                        notify(message);
                    }
                }
                i++;
            }
        }else{
            message = 'Select appropriate tag from the list';
            notify(message);

    }
}});

function deletetag(input){
    tags.pop($(input).text());
    input.remove();
}

$('#ask-button').on('click',function (event) {
    var question = $('#ask').text();
console.log($('#ask').text().length);
        if($('#ask').text().length < 30 ){
            message = "Question too short";
            notify(message);
        }
        else if(tags.length === 0){
            message="Atleast one tag is required";
            notify(message);
        }else{
            console.log($('#ask').text());
            $.ajax({
                type:"post",
                data:{
                    question:$('#ask').text(),
                    tags:tags
                },
                url:"../GroupStudy/postquestion.php",
                success:function (result) {
                    message='<p style="color:limegreen">&#x1f592;Question added successfully</p>';
                    console.log(result);
                    $('#ask').text(" ");

                    notify(message);
                    message="";
                    $('#question-tags').html(" ");
                    setTimeout(function(){
                        modalclose();
                        showtoast();
                        setTimeout(
                            hidetoast,4000);
                    },2000);
                    tags = [];


                },error:function (error) {
                    console.log("there is an error");
                }

            })
        }
        console.log(message);
        console.log(tags);
});


function modalclose(){
    $('.question-modal').hide();
    tags = [];
}
function showmodal() {
    $('.question-modal').show();
}
function hidehint(){
    $('.hint').attr('style',"top:0;font-size:12px;");
}
$('#ask').keypress(function(event) {
    if (event.keyCode === 13) {
        event.preventDefault();
    }
});
function showtoast() {
    $('.toast-notifier').css('display',"flex");
}
function hidetoast() {
    $('.toast-notifier').css('display',"none");
}