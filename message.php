<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <title>Message | Anonymous Message</title>
        <meta name="keywords" content="" />
        <meta name="description" content="" />

        <script type="text/javascript" src="ajax.js"></script>
        <link rel="icon" href="favicon.ico" type="image/x-icon" />
        <link rel="stylesheet" type="text/css" href="style/style.css"/>
    </head>
    <body  onbeforeunload="signInForm.signInButt.name='signOut';mainFunction()" onload="hideShow('hide')">
        <!-- start header -->
        <div id="header">
            <div id="menu">
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li class="active"><a href="message.php">Message</a></li>
                    <li><a href="about.php">About</a></li>
                    <li><a href="links.php">Links</a></li>
                    <li><a href="contact.php">Contact</a></li>
                </ul>
            </div>
            <div id="logo">
                <h1><a href="#">Anonymous Messaging Center</a></h1>
                <h2><a href="http://www.uoit.ca">By Team Jobbs</a></h2>
            </div>
        </div>
        <!-- end header -->
        <!-- start page -->
        <div id="page">
            <!-- start content -->
            <div id="content">
                <h1>Messaging center</h1>

<?php 

?>
                <div id="chatdox"></div>
                <div id="chatBox"></div>
                <form onsubmit="sendMessage();   return false" id="messageForm">
                    <input id="message" type="text">
                    <input id="sendButt" type="submit" value="Send">
               </form>

                            

                            </div>
                            <!-- end content -->



                            <!-- start sidebar -->
                            <div id="sidebar">
                                <h2>Welcome <span id="signInName">Guest</span></h2>
                                <form class="form-1" onsubmit="mainFunction(); return false" id="signInForm" action="">
                 
                                    <p class="field"><input id="userName"   type="text"     name="login"    placeholder="Username"></input></p>
                                    <p class="field"><input id="password"   type="password" name="password" placeholder="Password"></input></p>        
                                    <p>              <input id="signInButt" type="submit"   name="signIn"  value=" Sign in"></input></p>
                                </form>



                                <p>
                                </p>
                                <ul>

                                    <li>
                                        <h2>All time users</h2>
                                        <div id="usersOnLine"></div>
                                    </li>


                                </ul>
                            </div>
                            <!-- end sidebar -->
                            </div>
                            <!-- end page -->
                            <div id="footer">
                                <p id="legal">Copyright &copy; 2013 Team Jobbs</p>
                                <p id="links"> <a href="http://validator.w3.org/check/referer" title="This page validates as XHTML 1.0 Transitional"><abbr title="eXtensible HyperText Markup Language">XHTML</abbr></a> | <a href="http://jigsaw.w3.org/css-validator/check/referer" title="This page validates as CSS"><abbr title="Cascading Style Sheets">CSS</abbr></a></p>
                            </div>
                            
        <script type="text/javascript" src="messages.js"></script>
                            </body>
                            </html>


