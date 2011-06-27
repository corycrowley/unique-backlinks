<?php
/**
 * Index page
 * 
 * Copyright (c) 2011 Skyhook Marketing
 * 
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 *
 * @author Cory Crowley
 * @version 1.0
 */

// Allow safe access and execution of PHP files in includes
define('EXECUTE', 1);
?>
<!DOCTYPE html>
<!--[if lt IE 7 ]> <html lang="en" class="no-js ie6"> <![endif]-->
<!--[if IE 7 ]>    <html lang="en" class="no-js ie7"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en" class="no-js ie8"> <![endif]-->
<!--[if IE 9 ]>    <html lang="en" class="no-js ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html lang="en" class="no-js"> <!--<![endif]-->
	<head>
	
		<meta charset="utf-8">
	
		<!--[if IE]><![endif]-->
	
		<title>Generate Unique Backlinks | Unique Backlinks</title>
  
	  <meta name="description" content="Unique Backlinks">
	  <meta name="keywords" content="">
	  <meta name="author" content="">
	
		<link rel="shortcut icon" href="includes/images/favicon.ico" />
		
		<link rel="stylesheet" href="includes/css/style.css" type="text/css" media="screen" title="no title" />
		
		<script src="includes/js/modernizr-1.6.min.js"></script>
		
	</head>
	<body>
		
		<div id="container">
			
			<header>
				<div class="main"></div><!-- End .main -->
			</header>
		
			<div class="main">
        
				<div id="top"></div>
        
				<div class="left">
        	<h1 id="page-title"><a href="/unique-backlinks/">Generate Unique Backlinks</a></h1>
					<p>Use the form to the right to upload a .csv file of links.</p>
        </div>
    
    		<div class="right">
					
					<form id="UploadForm" method="POST" action="result.php" enctype="multipart/form-data" >
						
						<fieldset>
							<h2>Give a file name:<em> required</em></h2>
							<input id="name" name="name" size="30" type="text" class="input_textbox required" value="something.csv" />	
            </fieldset>
						
						<fieldset>
							<h2>Browse for your file:<em> required</em></h2>
							<div class="file_input_div">
								<input type="button" value="Browse&nbsp;&nbsp;»" class="file_input_button" />
								<input type="file" name="file" class="file_input_hidden" onchange="javascript: document.getElementById('fileName').value = this.value" />
							</div><!-- End .file_input_div -->
							<input type="text" id="fileName" class="file_input_textbox" readonly="readonly" />
						</fieldset>
            
						<fieldset class="buttons">
              <button id="upload_button" name="upload_button" type="submit" value="Upload Now&nbsp;&nbsp;»">Upload Now&nbsp;&nbsp;»</button>
            </fieldset>
					
					</form><!-- End #UploadForm -->
					
        </div><!-- End .right -->

        <div class="clearfix"></div><!-- End .clearfix -->
    	
			</div><!-- End .main -->
			
			<footer>
			
				<div class="main">
					<img id="footer-icon" src="includes/images/skyhook-icon-16-16.png" alt="Skyhook Marketing" width="16" height="16" />
					<p>Copyright © 2011 Skyhook Internet Marketing</p>
				</div><!-- End .main -->
			
			</footer>
			
		</div><!-- End #container -->
		
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
	  <script>!window.jQuery && document.write('<script src="includes/js/jquery-1.4.2.min.js"><\/script>')</script>
	  <script src="includes/js/plugins.js?v=1"></script>
	  <script src="includes/js/custom.js?v=1"></script>
	
	</body>
</html>