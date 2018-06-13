document.onscroll = function () {
    // var scrollTop     = $(window).scrollTop();
    //     console.log("jquery"+scrollTop);
    // var elementOffset = $('#content-loader').offset().top;
    //     console.log("-jquery"+elementOffset);
    var scrollvalue = document.documentElement.scrollTop;
    var loading_height = document.getElementById('content-loader').offsetTop -document.getElementById('content-loader').offsetHeight;
    console.log(scrollvalue);
    console.log(loading_height);
    if(loading_height-scrollvalue<200){
        console.log("keeploading");
    }
};

function expandAnswer(event) {
    var next = event.target.parentElement;
    next.style.height= '100%';
    event.target.style.display = 'none';
}

window.onload = function (e) {
    firebase.auth().onAuthStateChanged(function(user) {
        if (user) {
            // User is signed in.
            var username = firebase.auth().currentUser.displayName;
            console.log(user.providerData);
            console.log(user.providerData[0].photoURL+"......");
            // console.log(firebase.auth.exists());
            $.ajax({
                    type:"post",
                    url: "checkuser.php",
                    data:{
                        'name':user.providerData[0].displayName,
                        'email':user.providerData[0].email,
                        'photourl':user.providerData[0].photoURL
                    },

                    success:function(result){
                        console.log(result);
                        // console.log(firebase.auth().currentUser.photoURL);
                        getuser();
                        // document.querySelector('#userimage').src = user.providerData[0].photoURL;
                    }

                }
            )
        } else {
            // No user is signed in.
            console.log("Not logged in");
            window.location = "../Groupstudy/keys.html";
        }
    });
    /* if (typeof firebase.auth().currentUser ==="object"){
         var username = firebase.auth().currentUser.uid;
         console.log(username);
        // console.log(firebase.auth().currentUser.uid);
    }
    else
    {
        console.log("Not logged in");
        // window.location ="../GroupStudy/keys.html";
    }*/
};
function signout() {
    firebase.auth().signOut().then(function() {
        console.log("signout successfull");
        $.ajax({
            type:"post",

            url:'../GroupStudy/logout.php',
            success:function(result){
                console.log('logout');
            }

            }

        );
        window.location = "../GroupStudy/keys.html";
    }).catch(function(error) {
        console.log(error);
    });
}

function getuser(){
    $.ajax({
        type:'post',
        url:'../GroupStudy/getuserinfo.php',
        success:function(result){
            result = JSON.parse(result);
            console.log(result.photourl);
            var i=0;
            var userimage=document.querySelectorAll('.user-image');
            while(i<userimage.length){
                userimage[i].src= result['photourl'];
                i++;
            }

            document.querySelector('#userimage').src= result['photourl'];
            document.querySelector('#question-user-image').src = result['photourl'];
            document.querySelector('#user-name').innerHTML = result['name'];
            document.querySelector('#profilepic').src = result['photourl'];
            console.log(result);

            document.getElementById('user-name').innerHTML = result.name;


            // document.querySelector('#profilepic').style.width="80%";

        }
    });
}
