 $(document).on('click','.answer-button',function (e) {
    e.preventDefault();
    console.log("dfdskljflksdjf");
    var dataqid = $(this).attr('data-qid');
    console.log(dataqid);

     var selector = ".feed-post-question[data-role='"+dataqid+"']";
     var datarole = $(selector).attr("data-role");
    var datatagid1 = $(this).attr('data-tagid1');
    // console.log(datatagid1);
     console.log(datarole);
    if(dataqid === datarole){
        console.log('there is a problem');
        console.log(selector);
        // var tagid1 = $(this).attr('data-tagid1');
        $(selector).append('<div class="answer-container"><div><div class="answerer"><div class="row"><img class="user-image" src="" alt="" style="width:50px;height:50px;border-radius: 25px;background-color: #aaaaaa"><div class="col"><span class="user-name">Aman Rathore</span><span class="user-school">Bhopal</span></div></div> </div><div><form class="answer-form" method="post" action="store-answer.php"><input id="x" type="hidden" name="content"><trix-editor input="x"></trix-editor><div class="answer-action"><button class="cancel-answer-button" data-qid="'+dataqid+'">Cancel</button><button type="submit" class="answer-submit-button"  data-qid="'+dataqid+'" data-tagid1="'+datatagid1+'">Submit</button></div></form></div></div></div>');
    }
    getuser();
});

 $(document).on('click','.answer-submit-button',function (event) {
    event.preventDefault();
    console.log("event prevented");
    console.log($(this).attr('data-qid'));
    var qid = $(this).attr('data-qid');
    var tagid1= $(this).attr('data-tagid1');
    console.log(tagid1);
    var answercontent = $('#x').val();
    $.ajax({
       "type":"post",
       "url":'../GroupStudy/store-answer.php',
       "data":{
           "qid":qid,
           "content":answercontent,
           "tagid1": tagid1
       },
       'success':function (result) {
           console.log(result);
           var dataqid = $(this).attr("data-qid");
           var selector = ".feed-post-question[data-role='"+qid+"']";
           var datarole = $(selector).attr("data-role");

           console.log('there is a problem');
           if(qid === datarole) {
               console.log('there is -----');
               $(selector +" .answer-container").detach();
               $(selector).html("<div class='toast-notifier' style='display: flex;position: relative'>Your answer is submitted</div>");

           }
       },
       'error':function (error) {
           console.log("there is some error"+error);

       }
    });
});
 $(document).on('click','.cancel-answer-button',function (event) {
    event.preventDefault();
     var dataqid = $(this).attr("data-qid");
     var selector = ".feed-post-question[data-role='"+dataqid+"']";
     var datarole = $(selector).attr("data-role");

     console.log('there is a problem');
     if(dataqid === datarole) {
         console.log('there is -----');
         $(selector +" .answer-container").detach();

     }
 });