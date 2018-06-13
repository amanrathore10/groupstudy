<?php
session_start();
include 'config.php';
if(isset($_SESSION)){
//    header("location:https://www.google.co.in");

}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Group Study</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="https://www.gstatic.com/firebasejs/4.12.0/firebase.js"></script>

    <script>
        // Initialize Firebase
        var config = {
            apiKey: "AIzaSyCqGwG7E3A8fuafiSyJmEW4ssy2sf2JxUvI",
            authDomain: "my-project-1515396851668.firebaseapp.com",
            databaseURL: "https://my-project-1515396851668.firebaseio.com",
            projectId: "my-project-1515396851668",
            storageBucket: "my-project-1515396851668.appspot.com",
            clientId:"983531817565-llovm55vp61va25jg4sevs4jpige0ekp.apps.googleusercontent.com",
            messagingSenderId: "983531817565",
            scopes:[
                'profile',
                'email'
            ]

        };
        firebase.initializeApp(config);

    </script>
    <script src="gs.js"></script>
</head>
<body>

<div class="container">
    <div class="row header">
        <div class="header-site-logo">
            <a href=""><img src="images/gs-icon.png" alt=""></a>
        </div>
        <div class="row header-nav">
            <div class="row header-nav-links">
                <ul class="row header-nav-links-list">
                    <li class="active"><a href="index.html">Home</a></li>
                    <li class=""><a href="groups.html">Groups</a></li>
                    <li class=""><a href="questions.html">Questions</a></li>
                </ul>
            </div>
            <div class="row header-nav-search">
                <div class="row header-nav-search-bar">
                    <input type="text" id="search" name="search" placeholder="Search">
                    <label for="search"><img src="data:image/svg+xml;utf8;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pgo8IS0tIEdlbmVyYXRvcjogQWRvYmUgSWxsdXN0cmF0b3IgMTkuMS4wLCBTVkcgRXhwb3J0IFBsdWctSW4gLiBTVkcgVmVyc2lvbjogNi4wMCBCdWlsZCAwKSAgLS0+CjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgdmVyc2lvbj0iMS4xIiBpZD0iQ2FwYV8xIiB4PSIwcHgiIHk9IjBweCIgdmlld0JveD0iMCAwIDQ1MSA0NTEiIHN0eWxlPSJlbmFibGUtYmFja2dyb3VuZDpuZXcgMCAwIDQ1MSA0NTE7IiB4bWw6c3BhY2U9InByZXNlcnZlIiB3aWR0aD0iMTZweCIgaGVpZ2h0PSIxNnB4Ij4KPGc+Cgk8cGF0aCBkPSJNNDQ3LjA1LDQyOGwtMTA5LjYtMTA5LjZjMjkuNC0zMy44LDQ3LjItNzcuOSw0Ny4yLTEyNi4xQzM4NC42NSw4Ni4yLDI5OC4zNSwwLDE5Mi4zNSwwQzg2LjI1LDAsMC4wNSw4Ni4zLDAuMDUsMTkyLjMgICBzODYuMywxOTIuMywxOTIuMywxOTIuM2M0OC4yLDAsOTIuMy0xNy44LDEyNi4xLTQ3LjJMNDI4LjA1LDQ0N2MyLjYsMi42LDYuMSw0LDkuNSw0czYuOS0xLjMsOS41LTQgICBDNDUyLjI1LDQ0MS44LDQ1Mi4yNSw0MzMuMiw0NDcuMDUsNDI4eiBNMjYuOTUsMTkyLjNjMC05MS4yLDc0LjItMTY1LjMsMTY1LjMtMTY1LjNjOTEuMiwwLDE2NS4zLDc0LjIsMTY1LjMsMTY1LjMgICBzLTc0LjEsMTY1LjQtMTY1LjMsMTY1LjRDMTAxLjE1LDM1Ny43LDI2Ljk1LDI4My41LDI2Ljk1LDE5Mi4zeiIgZmlsbD0iIzAwMDAwMCIvPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+Cjwvc3ZnPgo=" /></label> </div>
            </div>
        </div>
        <div class="header-user">
            <div class="header-user-image"><a href="user-profile.html"><img id="userimage" src="" alt=""></a><div class="header-user-action col"><div><button onclick="signout()">Logout</button></div><div>My Profile</div></div></div>
        </div>
    </div>
    <div class="col main-container">
        <div class="row">
            <div class="col left-menu">
                <div class="col">
                    <div class="row category">
                        <div class="col">
                            <div class="category-header">
                                <span class="red-header">Favourite Groups</span>
                            </div>
                            <div class="row">
                                <div class="col categories">
                                    <ul>
                                        <li class="row"><a href="" class="red-option">IIT Kanpur</a></li>
                                        <li class="row"><a href="" class="red-option">Impact</a></li>
                                        <li class="row"><a href="" class="red-option">Hansraj</a></li>

                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row category">
                        <div class="col">
                            <div class="category-header">
                                <span class="red-header">Following</span>
                            </div>
                            <div class="row">
                                <div class="col categories">
                                    <ul>
                                        <li class="row"><a href="" class="red-option">Maths</a><span><input type="checkbox" id="sub-4"><label for="sub-4"></label></span></li>
                                        <li class="row"><a href="" class="red-option">English</a><span><input type="checkbox" id="sub-5"><label for="sub-5"></label></span></li>
                                        <li class="row"><a href="" class="red-option">Chemistry</a><span><input type="checkbox" id="sub-6"><label for="sub-6"></label></span></li>
                                        <li class="row"><a href="" class="red-option">Globalisation</a><span><input type="checkbox" id="sub-7"><label for="sub-7"></label></span></li>
                                        <li class="row"><a href="" class="red-option">Astronomy</a><span><input type="checkbox" id="sub-8"><label for="sub-8"></label></span></li>
                                        <li class="row"><a href="" class="red-option">Economics</a><span><input type="checkbox" id="sub-9"><label for="sub-9"></label></span></li>

                                    </ul>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col feed">
                <div class="row">
                    <div class="col feed-container">
                        <div class="row Ask-question">
                            <div class="col">
                                <div class="row question-container">
                                    <div class="row question-bar">
                                        <input type="text" id="ask" name="ask-question" placeholder="Anything to ask?">
                                        <label for="ask">Do you have any doubt?Ask your question here</label>
                                    </div>
                                </div>
                                <div class="col"><button class="ask-button" type="submit">Submit</button></div>
                            </div>
                        </div>
                        <div class="row feed-post">
                            <div class="col">
                                <div class="col feed-post-question">
                                    <div class="question-header red-header">Question</div>
                                    <div class="question-content">Did you any time face driver cancellation or non availability of cars?</div>
                                </div>

                                <div class=" feed-post-answer">
                                    <div class="answer-header red-header">Answer</div>
                                    <div class="row answerer"><div class="answerer-info row"><div class="answerer-image">
                                                <img src="https://scontent.fbho1-1.fna.fbcdn.net/v/t1.0-1/p160x160/16730131_1257021167686782_3712355408147196725_n.jpg?oh=04f5aa9dd21935bf6976c870639a35c3&oe=5B390FC9" alt=""></div>
                                            <div class="answerer-details col"><span class="answerer-name">Aman Rathore</span><span class="answerer-others">Impact</span></div></div><div ><span class="red-header answerer-follow">Follow</span></div>
                                    </div>
                                    <div class="answer-content"><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet, asperiores assumenda beatae eligendi expedita id illum in inventore iste laboriosam nesciunt nobis nostrum optio pariatur quam quasi quibusdam totam vel.</p>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto consequatur, consequuntur eius explicabo natus sed suscipit! Asperiores commodi eos, fugiat illum ipsum laudantium necessitatibus provident quae, quasi rem vitae voluptate.</p>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium aliquid, assumenda culpa cumque earum, error esse ex excepturi necessitatibus quo recusandae reiciendis repudiandae soluta temporibus, unde vitae voluptas voluptates! Libero?
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias aliquam amet consequatur, eaque eligendi esse fugiat illum libero nesciunt placeat quo tempore, voluptatum. Asperiores error explicabo ratione rem totam voluptate?</p>
                                        <button class="more-button" onclick="expandAnswer(event)">..more</button>
                                    </div>
                                    <div class="row post-actions"><div class="post-action-tag">Upvote</div><div class="post-action-tag">Bookmark</div><div class="post-action-tag">Share</div><div class="post-action-tag">Report</div><div class="verify-button "> <div><span class="tick">&#x2714; Verify</span></div></div></div>

                                </div>


                            </div>

                        </div>
                        <div class="row feed-post">
                            <div class="col">
                                <div class="col feed-post-question">
                                    <div class="question-header red-header">Question</div>
                                    <div class="question-content">Did you any time face driver cancellation or non availability of cars?</div>
                                </div>

                                <div class=" feed-post-answer">
                                    <div class="answer-header red-header">Answer</div>
                                    <div class="row answerer"><div class="answerer-info row"><div class="answerer-image">
                                                <img src="https://scontent.fbho1-1.fna.fbcdn.net/v/t1.0-1/p160x160/16730131_1257021167686782_3712355408147196725_n.jpg?oh=04f5aa9dd21935bf6976c870639a35c3&oe=5B390FC9" alt=""></div>
                                            <div class="answerer-details col"><span class="answerer-name">Aman Rathore</span><span class="answerer-others">Impact</span></div></div><div ><span class="red-header answerer-follow">Follow</span></div>
                                    </div>
                                    <div class="answer-content"><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet, asperiores assumenda beatae eligendi expedita id illum in inventore iste laboriosam nesciunt nobis nostrum optio pariatur quam quasi quibusdam totam vel.</p>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto consequatur, consequuntur eius explicabo natus sed suscipit! Asperiores commodi eos, fugiat illum ipsum laudantium necessitatibus provident quae, quasi rem vitae voluptate.</p>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium aliquid, assumenda culpa cumque earum, error esse ex excepturi necessitatibus quo recusandae reiciendis repudiandae soluta temporibus, unde vitae voluptas voluptates! Libero?
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias aliquam amet consequatur, eaque eligendi esse fugiat illum libero nesciunt placeat quo tempore, voluptatum. Asperiores error explicabo ratione rem totam voluptate?</p>
                                        <button class="more-button" onclick="expandAnswer(event)">..more</button>
                                    </div>
                                    <div class="row post-actions"><div class="post-action-tag">Upvote</div><div class="post-action-tag">Bookmark</div><div class="post-action-tag">Share</div><div class="post-action-tag">Report</div><div class="verify-button "> <div><span class="tick">&#x2714;</span>Verify</div></div></div>

                                </div>


                            </div>

                        </div>
                        <div class="row feed-post">
                            <div class="col">
                                <div class="col feed-post-question">
                                    <div class="question-header red-header">Question</div>
                                    <div class="question-content">Did you any time face driver cancellation or non availability of cars?</div>
                                </div>

                                <div class=" feed-post-answer">
                                    <div class="answer-header red-header">Answer</div>
                                    <div class="row answerer"><div class="answerer-info row"><div class="answerer-image">
                                                <img src="https://scontent.fbho1-1.fna.fbcdn.net/v/t1.0-1/p160x160/16730131_1257021167686782_3712355408147196725_n.jpg?oh=04f5aa9dd21935bf6976c870639a35c3&oe=5B390FC9" alt=""></div>
                                            <div class="answerer-details col"><span class="answerer-name">Aman Rathore</span><span class="answerer-others">Impact</span></div></div><div ><span class="red-header answerer-follow">Follow</span></div>
                                    </div>
                                    <div class="answer-content"><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet, asperiores assumenda beatae eligendi expedita id illum in inventore iste laboriosam nesciunt nobis nostrum optio pariatur quam quasi quibusdam totam vel.</p>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto consequatur, consequuntur eius explicabo natus sed suscipit! Asperiores commodi eos, fugiat illum ipsum laudantium necessitatibus provident quae, quasi rem vitae voluptate.</p>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium aliquid, assumenda culpa cumque earum, error esse ex excepturi necessitatibus quo recusandae reiciendis repudiandae soluta temporibus, unde vitae voluptas voluptates! Libero?
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias aliquam amet consequatur, eaque eligendi esse fugiat illum libero nesciunt placeat quo tempore, voluptatum. Asperiores error explicabo ratione rem totam voluptate?</p>
                                        <button class="more-button" onclick="expandAnswer(event)">..more</button>
                                    </div>
                                    <div class="row post-actions"><div class="post-action-tag">Upvote</div><div class="post-action-tag">Bookmark</div><div class="post-action-tag">Share</div><div class="post-action-tag">Report</div><div class="verify-button "> <div><span class="tick">&#x2714;</span>Verify</div></div></div>

                                </div>


                            </div>

                        </div>
                        <div class="row feed-post">
                            <div class="col">
                                <div class="col feed-post-question">
                                    <div class="question-header red-header">Question</div>
                                    <div class="question-content">Did you any time face driver cancellation or non availability of cars?</div>
                                </div>

                                <div class=" feed-post-answer">
                                    <div class="answer-header red-header">Answer</div>
                                    <div class="row answerer"><div class="answerer-info row"><div class="answerer-image">
                                                <img src="https://scontent.fbho1-1.fna.fbcdn.net/v/t1.0-1/p160x160/16730131_1257021167686782_3712355408147196725_n.jpg?oh=04f5aa9dd21935bf6976c870639a35c3&oe=5B390FC9" alt=""></div>
                                            <div class="answerer-details col"><span class="answerer-name">Aman Rathore</span><span class="answerer-others">Impact</span></div></div><div ><span class="red-header answerer-follow">Follow</span></div>
                                    </div>
                                    <div class="answer-content"><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet, asperiores assumenda beatae eligendi expedita id illum in inventore iste laboriosam nesciunt nobis nostrum optio pariatur quam quasi quibusdam totam vel.</p>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto consequatur, consequuntur eius explicabo natus sed suscipit! Asperiores commodi eos, fugiat illum ipsum laudantium necessitatibus provident quae, quasi rem vitae voluptate.</p>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium aliquid, assumenda culpa cumque earum, error esse ex excepturi necessitatibus quo recusandae reiciendis repudiandae soluta temporibus, unde vitae voluptas voluptates! Libero?
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias aliquam amet consequatur, eaque eligendi esse fugiat illum libero nesciunt placeat quo tempore, voluptatum. Asperiores error explicabo ratione rem totam voluptate?</p>
                                        <button class="more-button" onclick="expandAnswer(event)">..more</button>
                                    </div>
                                    <div class="row post-actions"><div class="post-action-tag">Upvote</div><div class="post-action-tag">Bookmark</div><div class="post-action-tag">Share</div><div class="post-action-tag">Report</div><div class="verify-button "> <div><span class="tick">&#x2714;</span>Verify</div></div></div>

                                </div>


                            </div>

                        </div>
                        <div class="row feed-post">
                            <div class="col">
                                <div class="col feed-post-question">
                                    <div class="question-header red-header">Question</div>
                                    <div class="question-content">Did you any time face driver cancellation or non availability of cars?</div>
                                </div>

                                <div class=" feed-post-answer">
                                    <div class="answer-header red-header">Answer</div>
                                    <div class="row answerer"><div class="answerer-info row"><div class="answerer-image">
                                                <img src="https://scontent.fbho1-1.fna.fbcdn.net/v/t1.0-1/p160x160/16730131_1257021167686782_3712355408147196725_n.jpg?oh=04f5aa9dd21935bf6976c870639a35c3&oe=5B390FC9" alt=""></div>
                                            <div class="answerer-details col"><span class="answerer-name">Aman Rathore</span><span class="answerer-others">Impact</span></div></div><div ><span class="red-header answerer-follow">Follow</span></div>
                                    </div>
                                    <div class="answer-content"><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet, asperiores assumenda beatae eligendi expedita id illum in inventore iste laboriosam nesciunt nobis nostrum optio pariatur quam quasi quibusdam totam vel.</p>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto consequatur, consequuntur eius explicabo natus sed suscipit! Asperiores commodi eos, fugiat illum ipsum laudantium necessitatibus provident quae, quasi rem vitae voluptate.</p>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium aliquid, assumenda culpa cumque earum, error esse ex excepturi necessitatibus quo recusandae reiciendis repudiandae soluta temporibus, unde vitae voluptas voluptates! Libero?
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias aliquam amet consequatur, eaque eligendi esse fugiat illum libero nesciunt placeat quo tempore, voluptatum. Asperiores error explicabo ratione rem totam voluptate?</p>
                                        <button class="more-button" onclick="expandAnswer(event)">..more</button>
                                    </div>
                                    <div class="row post-actions"><div class="post-action-tag">Upvote</div><div class="post-action-tag">Bookmark</div><div class="post-action-tag">Share</div><div class="post-action-tag">Report</div><div class="verify-button "> <div><span class="tick">&#x2714;</span>Verify</div></div></div>

                                </div>


                            </div>

                        </div>
                        <div class="row feed-post">
                            <div class="col">
                                <div class="col feed-post-question">
                                    <div class="question-header red-header">Question</div>
                                    <div class="question-content">Did you any time face driver cancellation or non availability of cars?</div>
                                </div>

                                <div class=" feed-post-answer">
                                    <div class="answer-header red-header">Answer</div>
                                    <div class="row answerer"><div class="answerer-info row"><div class="answerer-image">
                                                <img src="https://scontent.fbho1-1.fna.fbcdn.net/v/t1.0-1/p160x160/16730131_1257021167686782_3712355408147196725_n.jpg?oh=04f5aa9dd21935bf6976c870639a35c3&oe=5B390FC9" alt=""></div>
                                            <div class="answerer-details col"><span class="answerer-name">Aman Rathore</span><span class="answerer-others">Impact</span></div></div><div ><span class="red-header answerer-follow">Follow</span></div>
                                    </div>
                                    <div class="answer-content"><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet, asperiores assumenda beatae eligendi expedita id illum in inventore iste laboriosam nesciunt nobis nostrum optio pariatur quam quasi quibusdam totam vel.</p>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto consequatur, consequuntur eius explicabo natus sed suscipit! Asperiores commodi eos, fugiat illum ipsum laudantium necessitatibus provident quae, quasi rem vitae voluptate.</p>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium aliquid, assumenda culpa cumque earum, error esse ex excepturi necessitatibus quo recusandae reiciendis repudiandae soluta temporibus, unde vitae voluptas voluptates! Libero?
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias aliquam amet consequatur, eaque eligendi esse fugiat illum libero nesciunt placeat quo tempore, voluptatum. Asperiores error explicabo ratione rem totam voluptate?</p>
                                        <button class="more-button" onclick="expandAnswer(event)">..more</button>
                                    </div>
                                    <div class="row post-actions"><div class="post-action-tag">Upvote</div><div class="post-action-tag">Bookmark</div><div class="post-action-tag">Share</div><div class="post-action-tag">Report</div><div class="verify-button "> <div><span class="tick">&#x2714;</span>Verify</div></div></div>

                                </div>


                            </div>

                        </div>
                        <div class="row feed-post">
                            <div class="col">
                                <div class="col feed-post-question">
                                    <div class="question-header red-header">Question</div>
                                    <div class="question-content">Did you any time face driver cancellation or non availability of cars?</div>
                                </div>

                                <div class=" feed-post-answer">
                                    <div class="answer-header red-header">Answer</div>
                                    <div class="row answerer"><div class="answerer-info row"><div class="answerer-image">
                                                <img src="https://scontent.fbho1-1.fna.fbcdn.net/v/t1.0-1/p160x160/16730131_1257021167686782_3712355408147196725_n.jpg?oh=04f5aa9dd21935bf6976c870639a35c3&oe=5B390FC9" alt=""></div>
                                            <div class="answerer-details col"><span class="answerer-name">Aman Rathore</span><span class="answerer-others">Impact</span></div></div><div ><span class="red-header answerer-follow">Follow</span></div>
                                    </div>
                                    <div class="answer-content"><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet, asperiores assumenda beatae eligendi expedita id illum in inventore iste laboriosam nesciunt nobis nostrum optio pariatur quam quasi quibusdam totam vel.</p>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto consequatur, consequuntur eius explicabo natus sed suscipit! Asperiores commodi eos, fugiat illum ipsum laudantium necessitatibus provident quae, quasi rem vitae voluptate.</p>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium aliquid, assumenda culpa cumque earum, error esse ex excepturi necessitatibus quo recusandae reiciendis repudiandae soluta temporibus, unde vitae voluptas voluptates! Libero?
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias aliquam amet consequatur, eaque eligendi esse fugiat illum libero nesciunt placeat quo tempore, voluptatum. Asperiores error explicabo ratione rem totam voluptate?</p>
                                        <button class="more-button" onclick="expandAnswer(event)">..more</button>
                                    </div>
                                    <div class="row post-actions"><div class="post-action-tag">Upvote</div><div class="post-action-tag">Bookmark</div><div class="post-action-tag">Share</div><div class="post-action-tag">Report</div><div class="verify-button "> <div><span class="tick">&#x2714;</span>Verify</div></div></div>

                                </div>


                            </div>

                        </div>
                        <div class="row feed-post">
                            <div class="col">
                                <div class="col feed-post-question">
                                    <div class="question-header red-header">Question</div>
                                    <div class="question-content">Did you any time face driver cancellation or non availability of cars?</div>
                                </div>

                                <div class=" feed-post-answer">
                                    <div class="answer-header red-header">Answer</div>
                                    <div class="row answerer"><div class="answerer-info row"><div class="answerer-image">
                                                <img src="https://scontent.fbho1-1.fna.fbcdn.net/v/t1.0-1/p160x160/16730131_1257021167686782_3712355408147196725_n.jpg?oh=04f5aa9dd21935bf6976c870639a35c3&oe=5B390FC9" alt=""></div>
                                            <div class="answerer-details col"><span class="answerer-name">Aman Rathore</span><span class="answerer-others">Impact</span></div></div><div ><span class="red-header answerer-follow">Follow</span></div>
                                    </div>
                                    <div class="answer-content"><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet, asperiores assumenda beatae eligendi expedita id illum in inventore iste laboriosam nesciunt nobis nostrum optio pariatur quam quasi quibusdam totam vel.</p>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto consequatur, consequuntur eius explicabo natus sed suscipit! Asperiores commodi eos, fugiat illum ipsum laudantium necessitatibus provident quae, quasi rem vitae voluptate.</p>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium aliquid, assumenda culpa cumque earum, error esse ex excepturi necessitatibus quo recusandae reiciendis repudiandae soluta temporibus, unde vitae voluptas voluptates! Libero?
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias aliquam amet consequatur, eaque eligendi esse fugiat illum libero nesciunt placeat quo tempore, voluptatum. Asperiores error explicabo ratione rem totam voluptate?</p>
                                        <button class="more-button" onclick="expandAnswer(event)">..more</button>
                                    </div>
                                    <div class="row post-actions"><div class="post-action-tag">Upvote</div><div class="post-action-tag">Bookmark</div><div class="post-action-tag">Share</div><div class="post-action-tag">Report</div><div class="verify-button "> <div><span class="tick">&#x2714;</span>Verify</div></div></div>

                                </div>


                            </div>

                        </div>
                        <div class="row feed-post">
                            <div class="col">
                                <div class="col feed-post-question">
                                    <div class="question-header red-header">Question</div>
                                    <div class="question-content">Did you any time face driver cancellation or non availability of cars?</div>
                                </div>

                                <div class=" feed-post-answer">
                                    <div class="answer-header red-header">Answer</div>
                                    <div class="row answerer"><div class="answerer-info row"><div class="answerer-image">
                                                <img src="https://scontent.fbho1-1.fna.fbcdn.net/v/t1.0-1/p160x160/16730131_1257021167686782_3712355408147196725_n.jpg?oh=04f5aa9dd21935bf6976c870639a35c3&oe=5B390FC9" alt=""></div>
                                            <div class="answerer-details col"><span class="answerer-name">Aman Rathore</span><span class="answerer-others">Impact</span></div></div><div ><span class="red-header answerer-follow">Follow</span></div>
                                    </div>
                                    <div class="answer-content"><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet, asperiores assumenda beatae eligendi expedita id illum in inventore iste laboriosam nesciunt nobis nostrum optio pariatur quam quasi quibusdam totam vel.</p>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto consequatur, consequuntur eius explicabo natus sed suscipit! Asperiores commodi eos, fugiat illum ipsum laudantium necessitatibus provident quae, quasi rem vitae voluptate.</p>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium aliquid, assumenda culpa cumque earum, error esse ex excepturi necessitatibus quo recusandae reiciendis repudiandae soluta temporibus, unde vitae voluptas voluptates! Libero?
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias aliquam amet consequatur, eaque eligendi esse fugiat illum libero nesciunt placeat quo tempore, voluptatum. Asperiores error explicabo ratione rem totam voluptate?</p>
                                        <button class="more-button" onclick="expandAnswer(event)">..more</button>
                                    </div>
                                    <div class="row post-actions"><div class="post-action-tag">Upvote</div><div class="post-action-tag">Bookmark</div><div class="post-action-tag">Share</div><div class="post-action-tag">Report</div><div class="verify-button "> <div><span class="tick">&#x2714;</span>Verify</div></div></div>

                                </div>


                            </div>

                        </div>
                        <div class="row feed-post">
                            <div class="col">
                                <div class="col feed-post-question">
                                    <div class="question-header red-header">Question</div>
                                    <div class="question-content">Did you any time face driver cancellation or non availability of cars?</div>
                                </div>

                                <div class=" feed-post-answer">
                                    <div class="answer-header red-header">Answer</div>
                                    <div class="row answerer"><div class="answerer-info row"><div class="answerer-image">
                                                <img src="https://scontent.fbho1-1.fna.fbcdn.net/v/t1.0-1/p160x160/16730131_1257021167686782_3712355408147196725_n.jpg?oh=04f5aa9dd21935bf6976c870639a35c3&oe=5B390FC9" alt=""></div>
                                            <div class="answerer-details col"><span class="answerer-name">Aman Rathore</span><span class="answerer-others">Impact</span></div></div><div ><span class="red-header answerer-follow">Follow</span></div>
                                    </div>
                                    <div class="answer-content"><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet, asperiores assumenda beatae eligendi expedita id illum in inventore iste laboriosam nesciunt nobis nostrum optio pariatur quam quasi quibusdam totam vel.</p>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto consequatur, consequuntur eius explicabo natus sed suscipit! Asperiores commodi eos, fugiat illum ipsum laudantium necessitatibus provident quae, quasi rem vitae voluptate.</p>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium aliquid, assumenda culpa cumque earum, error esse ex excepturi necessitatibus quo recusandae reiciendis repudiandae soluta temporibus, unde vitae voluptas voluptates! Libero?
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias aliquam amet consequatur, eaque eligendi esse fugiat illum libero nesciunt placeat quo tempore, voluptatum. Asperiores error explicabo ratione rem totam voluptate?</p>
                                        <button class="more-button" onclick="expandAnswer(event)">..more</button>
                                    </div>
                                    <div class="row post-actions"><div class="post-action-tag">Upvote</div><div class="post-action-tag">Bookmark</div><div class="post-action-tag">Share</div><div class="post-action-tag">Report</div><div class="verify-button "> <div><span class="tick">&#x2714;</span>Verify</div></div></div>

                                </div>


                            </div>

                        </div>
                        <div class="row feed-post">
                            <div class="col">
                                <div class="col feed-post-question">
                                    <div class="question-header red-header">Question</div>
                                    <div class="question-content">Did you any time face driver cancellation or non availability of cars?</div>
                                </div>

                                <div class=" feed-post-answer">
                                    <div class="answer-header red-header">Answer</div>
                                    <div class="row answerer"><div class="answerer-info row"><div class="answerer-image">
                                                <img src="https://scontent.fbho1-1.fna.fbcdn.net/v/t1.0-1/p160x160/16730131_1257021167686782_3712355408147196725_n.jpg?oh=04f5aa9dd21935bf6976c870639a35c3&oe=5B390FC9" alt=""></div>
                                            <div class="answerer-details col"><span class="answerer-name">Aman Rathore</span><span class="answerer-others">Impact</span></div></div><div ><span class="red-header answerer-follow">Follow</span></div>
                                    </div>
                                    <div class="answer-content"><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet, asperiores assumenda beatae eligendi expedita id illum in inventore iste laboriosam nesciunt nobis nostrum optio pariatur quam quasi quibusdam totam vel.</p>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto consequatur, consequuntur eius explicabo natus sed suscipit! Asperiores commodi eos, fugiat illum ipsum laudantium necessitatibus provident quae, quasi rem vitae voluptate.</p>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium aliquid, assumenda culpa cumque earum, error esse ex excepturi necessitatibus quo recusandae reiciendis repudiandae soluta temporibus, unde vitae voluptas voluptates! Libero?
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias aliquam amet consequatur, eaque eligendi esse fugiat illum libero nesciunt placeat quo tempore, voluptatum. Asperiores error explicabo ratione rem totam voluptate?</p>
                                        <button class="more-button" onclick="expandAnswer(event)">..more</button>
                                    </div>
                                    <div class="row post-actions"><div class="post-action-tag">Upvote</div><div class="post-action-tag">Bookmark</div><div class="post-action-tag">Share</div><div class="post-action-tag">Report</div><div class="verify-button "> <div><span class="tick">&#x2714;</span>Verify</div></div></div>

                                </div>


                            </div>

                        </div>
                        <div class="row feed-post">
                            <div class="col">
                                <div class="col feed-post-question">
                                    <div class="question-header red-header">Question</div>
                                    <div class="question-content">Did you any time face driver cancellation or non availability of cars?</div>
                                </div>

                                <div class=" feed-post-answer">
                                    <div class="answer-header red-header">Answer</div>
                                    <div class="row answerer"><div class="answerer-info row"><div class="answerer-image">
                                                <img src="https://scontent.fbho1-1.fna.fbcdn.net/v/t1.0-1/p160x160/16730131_1257021167686782_3712355408147196725_n.jpg?oh=04f5aa9dd21935bf6976c870639a35c3&oe=5B390FC9" alt=""></div>
                                            <div class="answerer-details col"><span class="answerer-name">Aman Rathore</span><span class="answerer-others">Impact</span></div></div><div ><span class="red-header answerer-follow">Follow</span></div>
                                    </div>
                                    <div class="answer-content"><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet, asperiores assumenda beatae eligendi expedita id illum in inventore iste laboriosam nesciunt nobis nostrum optio pariatur quam quasi quibusdam totam vel.</p>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto consequatur, consequuntur eius explicabo natus sed suscipit! Asperiores commodi eos, fugiat illum ipsum laudantium necessitatibus provident quae, quasi rem vitae voluptate.</p>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium aliquid, assumenda culpa cumque earum, error esse ex excepturi necessitatibus quo recusandae reiciendis repudiandae soluta temporibus, unde vitae voluptas voluptates! Libero?
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias aliquam amet consequatur, eaque eligendi esse fugiat illum libero nesciunt placeat quo tempore, voluptatum. Asperiores error explicabo ratione rem totam voluptate?</p>
                                        <button class="more-button" onclick="expandAnswer(event)">..more</button>
                                    </div>
                                    <div class="row post-actions"><div class="post-action-tag">Upvote</div><div class="post-action-tag">Bookmark</div><div class="post-action-tag">Share</div><div class="post-action-tag">Report</div><div class="verify-button "> <div><span class="tick">&#x2714;</span>Verify</div></div></div>

                                </div>


                            </div>

                        </div>
                        <div class="row feed-post">
                            <div class="col">
                                <div class="col feed-post-question">
                                    <div class="question-header red-header">Question</div>
                                    <div class="question-content">Did you any time face driver cancellation or non availability of cars?</div>
                                </div>

                                <div class=" feed-post-answer">
                                    <div class="answer-header red-header">Answer</div>
                                    <div class="row answerer"><div class="answerer-info row"><div class="answerer-image">
                                                <img src="https://scontent.fbho1-1.fna.fbcdn.net/v/t1.0-1/p160x160/16730131_1257021167686782_3712355408147196725_n.jpg?oh=04f5aa9dd21935bf6976c870639a35c3&oe=5B390FC9" alt=""></div>
                                            <div class="answerer-details col"><span class="answerer-name">Aman Rathore</span><span class="answerer-others">Impact</span></div></div><div ><span class="red-header answerer-follow">Follow</span></div>
                                    </div>
                                    <div class="answer-content"><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet, asperiores assumenda beatae eligendi expedita id illum in inventore iste laboriosam nesciunt nobis nostrum optio pariatur quam quasi quibusdam totam vel.</p>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto consequatur, consequuntur eius explicabo natus sed suscipit! Asperiores commodi eos, fugiat illum ipsum laudantium necessitatibus provident quae, quasi rem vitae voluptate.</p>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium aliquid, assumenda culpa cumque earum, error esse ex excepturi necessitatibus quo recusandae reiciendis repudiandae soluta temporibus, unde vitae voluptas voluptates! Libero?
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias aliquam amet consequatur, eaque eligendi esse fugiat illum libero nesciunt placeat quo tempore, voluptatum. Asperiores error explicabo ratione rem totam voluptate?</p>
                                        <button class="more-button" onclick="expandAnswer(event)">..more</button>
                                    </div>
                                    <div class="row post-actions"><div class="post-action-tag">Upvote</div><div class="post-action-tag">Bookmark</div><div class="post-action-tag">Share</div><div class="post-action-tag">Report</div><div class="verify-button "> <div><span class="tick">&#x2714;</span>Verify</div></div></div>

                                </div>


                            </div>

                        </div>
                        <div class="row feed-post">
                            <div class="col">
                                <div class="col feed-post-question">
                                    <div class="question-header red-header">Question</div>
                                    <div class="question-content">Did you any time face driver cancellation or non availability of cars?</div>
                                </div>

                                <div class=" feed-post-answer">
                                    <div class="answer-header red-header">Answer</div>
                                    <div class="row answerer"><div class="answerer-info row"><div class="answerer-image">
                                                <img src="https://scontent.fbho1-1.fna.fbcdn.net/v/t1.0-1/p160x160/16730131_1257021167686782_3712355408147196725_n.jpg?oh=04f5aa9dd21935bf6976c870639a35c3&oe=5B390FC9" alt=""></div>
                                            <div class="answerer-details col"><span class="answerer-name">Aman Rathore</span><span class="answerer-others">Impact</span></div></div><div ><span class="red-header answerer-follow">Follow</span></div>
                                    </div>
                                    <div class="answer-content"><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet, asperiores assumenda beatae eligendi expedita id illum in inventore iste laboriosam nesciunt nobis nostrum optio pariatur quam quasi quibusdam totam vel.</p>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto consequatur, consequuntur eius explicabo natus sed suscipit! Asperiores commodi eos, fugiat illum ipsum laudantium necessitatibus provident quae, quasi rem vitae voluptate.</p>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium aliquid, assumenda culpa cumque earum, error esse ex excepturi necessitatibus quo recusandae reiciendis repudiandae soluta temporibus, unde vitae voluptas voluptates! Libero?
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias aliquam amet consequatur, eaque eligendi esse fugiat illum libero nesciunt placeat quo tempore, voluptatum. Asperiores error explicabo ratione rem totam voluptate?</p>
                                        <button class="more-button" onclick="expandAnswer(event)">..more</button>
                                    </div>
                                    <div class="row post-actions"><div class="post-action-tag">Upvote</div><div class="post-action-tag">Bookmark</div><div class="post-action-tag">Share</div><div class="post-action-tag">Report</div><div class="verify-button "> <div><span class="tick">&#x2714;</span>Verify</div></div></div>

                                </div>


                            </div>

                        </div>
                        <div class="row feed-post">
                            <div class="col">
                                <div class="col feed-post-question">
                                    <div class="question-header red-header">Question</div>
                                    <div class="question-content">Did you any time face driver cancellation or non availability of cars?</div>
                                </div>

                                <div class=" feed-post-answer">
                                    <div class="answer-header red-header">Answer</div>
                                    <div class="row answerer"><div class="answerer-info row"><div class="answerer-image">
                                                <img src="https://scontent.fbho1-1.fna.fbcdn.net/v/t1.0-1/p160x160/16730131_1257021167686782_3712355408147196725_n.jpg?oh=04f5aa9dd21935bf6976c870639a35c3&oe=5B390FC9" alt=""></div>
                                            <div class="answerer-details col"><span class="answerer-name">Aman Rathore</span><span class="answerer-others">Impact</span></div></div><div ><span class="red-header answerer-follow">Follow</span></div>
                                    </div>
                                    <div class="answer-content"><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet, asperiores assumenda beatae eligendi expedita id illum in inventore iste laboriosam nesciunt nobis nostrum optio pariatur quam quasi quibusdam totam vel.</p>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto consequatur, consequuntur eius explicabo natus sed suscipit! Asperiores commodi eos, fugiat illum ipsum laudantium necessitatibus provident quae, quasi rem vitae voluptate.</p>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium aliquid, assumenda culpa cumque earum, error esse ex excepturi necessitatibus quo recusandae reiciendis repudiandae soluta temporibus, unde vitae voluptas voluptates! Libero?
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias aliquam amet consequatur, eaque eligendi esse fugiat illum libero nesciunt placeat quo tempore, voluptatum. Asperiores error explicabo ratione rem totam voluptate?</p>
                                        <button class="more-button" onclick="expandAnswer(event)">..more</button>
                                    </div>
                                    <div class="row post-actions"><div class="post-action-tag">Upvote</div><div class="post-action-tag">Bookmark</div><div class="post-action-tag">Share</div><div class="post-action-tag">Report</div><div class="verify-button "> <div><span class="tick">&#x2714;</span>Verify</div></div></div>

                                </div>


                            </div>

                        </div>
                        <div class="row feed-post">
                            <div class="col">
                                <div class="col feed-post-question">
                                    <div class="question-header red-header">Question</div>
                                    <div class="question-content">Did you any time face driver cancellation or non availability of cars?</div>
                                </div>

                                <div class=" feed-post-answer">
                                    <div class="answer-header red-header">Answer</div>
                                    <div class="row answerer"><div class="answerer-info row"><div class="answerer-image">
                                                <img src="https://scontent.fbho1-1.fna.fbcdn.net/v/t1.0-1/p160x160/16730131_1257021167686782_3712355408147196725_n.jpg?oh=04f5aa9dd21935bf6976c870639a35c3&oe=5B390FC9" alt=""></div>
                                            <div class="answerer-details col"><span class="answerer-name">Aman Rathore</span><span class="answerer-others">Impact</span></div></div><div ><span class="red-header answerer-follow">Follow</span></div>
                                    </div>
                                    <div class="answer-content"><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet, asperiores assumenda beatae eligendi expedita id illum in inventore iste laboriosam nesciunt nobis nostrum optio pariatur quam quasi quibusdam totam vel.</p>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto consequatur, consequuntur eius explicabo natus sed suscipit! Asperiores commodi eos, fugiat illum ipsum laudantium necessitatibus provident quae, quasi rem vitae voluptate.</p>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium aliquid, assumenda culpa cumque earum, error esse ex excepturi necessitatibus quo recusandae reiciendis repudiandae soluta temporibus, unde vitae voluptas voluptates! Libero?
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias aliquam amet consequatur, eaque eligendi esse fugiat illum libero nesciunt placeat quo tempore, voluptatum. Asperiores error explicabo ratione rem totam voluptate?</p>
                                        <button class="more-button" onclick="expandAnswer(event)">..more</button>
                                    </div>
                                    <div class="row post-actions"><div class="post-action-tag">Upvote</div><div class="post-action-tag">Bookmark</div><div class="post-action-tag">Share</div><div class="post-action-tag">Report</div><div class="verify-button "> <div><span class="tick">&#x2714;</span>Verify</div></div></div>

                                </div>


                            </div>

                        </div>
                        <div class="row feed-post">
                            <div class="col">
                                <div class="col feed-post-question">
                                    <div class="question-header red-header">Question</div>
                                    <div class="question-content">Did you any time face driver cancellation or non availability of cars?</div>
                                </div>

                                <div class=" feed-post-answer">
                                    <div class="answer-header red-header">Answer</div>
                                    <div class="row answerer"><div class="answerer-info row"><div class="answerer-image">
                                                <img src="https://scontent.fbho1-1.fna.fbcdn.net/v/t1.0-1/p160x160/16730131_1257021167686782_3712355408147196725_n.jpg?oh=04f5aa9dd21935bf6976c870639a35c3&oe=5B390FC9" alt=""></div>
                                            <div class="answerer-details col"><span class="answerer-name">Aman Rathore</span><span class="answerer-others">Impact</span></div></div><div ><span class="red-header answerer-follow">Follow</span></div>
                                    </div>
                                    <div class="answer-content"><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet, asperiores assumenda beatae eligendi expedita id illum in inventore iste laboriosam nesciunt nobis nostrum optio pariatur quam quasi quibusdam totam vel.</p>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto consequatur, consequuntur eius explicabo natus sed suscipit! Asperiores commodi eos, fugiat illum ipsum laudantium necessitatibus provident quae, quasi rem vitae voluptate.</p>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium aliquid, assumenda culpa cumque earum, error esse ex excepturi necessitatibus quo recusandae reiciendis repudiandae soluta temporibus, unde vitae voluptas voluptates! Libero?
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias aliquam amet consequatur, eaque eligendi esse fugiat illum libero nesciunt placeat quo tempore, voluptatum. Asperiores error explicabo ratione rem totam voluptate?</p>
                                        <button class="more-button" onclick="expandAnswer(event)">..more</button>
                                    </div>
                                    <div class="row post-actions"><div class="post-action-tag">Upvote</div><div class="post-action-tag">Bookmark</div><div class="post-action-tag">Share</div><div class="post-action-tag">Report</div><div class="verify-button "> <div><span class="tick">&#x2714;</span>Verify</div></div></div>

                                </div>


                            </div>

                        </div>
                        <div class="row feed-post">
                            <div class="col">
                                <div class="col feed-post-question">
                                    <div class="question-header red-header">Question</div>
                                    <div class="question-content">Did you any time face driver cancellation or non availability of cars?</div>
                                </div>

                                <div class=" feed-post-answer">
                                    <div class="answer-header red-header">Answer</div>
                                    <div class="row answerer"><div class="answerer-info row"><div class="answerer-image">
                                                <img src="https://scontent.fbho1-1.fna.fbcdn.net/v/t1.0-1/p160x160/16730131_1257021167686782_3712355408147196725_n.jpg?oh=04f5aa9dd21935bf6976c870639a35c3&oe=5B390FC9" alt=""></div>
                                            <div class="answerer-details col"><span class="answerer-name">Aman Rathore</span><span class="answerer-others">Impact</span></div></div><div ><span class="red-header answerer-follow">Follow</span></div>
                                    </div>
                                    <div class="answer-content"><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet, asperiores assumenda beatae eligendi expedita id illum in inventore iste laboriosam nesciunt nobis nostrum optio pariatur quam quasi quibusdam totam vel.</p>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto consequatur, consequuntur eius explicabo natus sed suscipit! Asperiores commodi eos, fugiat illum ipsum laudantium necessitatibus provident quae, quasi rem vitae voluptate.</p>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium aliquid, assumenda culpa cumque earum, error esse ex excepturi necessitatibus quo recusandae reiciendis repudiandae soluta temporibus, unde vitae voluptas voluptates! Libero?
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias aliquam amet consequatur, eaque eligendi esse fugiat illum libero nesciunt placeat quo tempore, voluptatum. Asperiores error explicabo ratione rem totam voluptate?</p>
                                        <button class="more-button" onclick="expandAnswer(event)">..more</button>
                                    </div>
                                    <div class="row post-actions"><div class="post-action-tag">Upvote</div><div class="post-action-tag">Bookmark</div><div class="post-action-tag">Share</div><div class="post-action-tag">Report</div><div class="verify-button "> <div><span class="tick">&#x2714;</span>Verify</div></div></div>

                                </div>


                            </div>

                        </div>

                    </div>
                </div>
            </div>
            <div class="col right-menu">
                <div class="col">
                    <div class="row category">
                        <div class="col">
                            <div class="category-header">
                                <span class="red-header">Your Library</span>
                            </div>
                            <div class="row">
                                <div class="col categories">
                                    <ul>
                                        <li><a href="" class="red-option">IIT Kanpur</a></li>
                                        <li><a href="" class="red-option">Impact</a></li>
                                        <li><a href="" class="red-option">Hansraj</a></li>

                                    </ul>
                                </div>

                            </div>

                        </div>

                    </div>
                </div>
            </div>

        </div>

    </div>

</div>




</body>
<script>

</script>
</html>