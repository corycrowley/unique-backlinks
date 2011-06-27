<?php
/**
 * Results page
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


/**
 * Allow safe access and execution of PHP files in includes
 *
 * @since 1.0
 */
if ( !defined( 'EXECUTE' ) ) {
	define('EXECUTE', 1);
}

/**
 * Define ABS PATH
 * 
 * @since 1.0
 */
if ( !defined( 'BLURLS_ABSPATH') ) {
	define( 'BLURLS_ABSPATH', dirname(__FILE__) );
}

/**
 * Upload File object.
 *
 * @since 1.0
 * @var string
 */
$upload_file_object = $_FILES["file"];

/**
 * Define Upload file name.
 *
 * @since 1.0
 * @var string
 */
$upload_file_name = $_FILES["file"]["name"];

/**
 * Define output file name.
 *
 * @since 1.0
 * @var string
 */
$output_file_name = ( $_POST['name'] ) ? $_POST['name'] : 'unique-back-link-urls.csv';

/**
 * Require Unique Backlink Urls Class
 *
 * @since 1.0
 */
require_once ( BLURLS_ABSPATH . '/includes/uniquebacklinkurls.class.php' );

/**
 * Execute Class
 *
 * @since 1.0
 */
$backlink_urls = new Unique_Backlink_Urls();
$backlink_urls->set_upload_dir( BLURLS_ABSPATH . '/uploads/' );
$backlink_urls->set_output_dir( BLURLS_ABSPATH . '/output/' );
$backlink_urls->set_download_dir( 'output/' ); // Relative path.
$backlink_urls->set_uploaded_file( $upload_file_name );
$backlink_urls->set_output_file( $output_file_name );
$backlink_urls->set_download_file( $output_file_name );
$backlink_urls->set_delimiter( ',' );
$backlink_urls->upload( $upload_file_object );
$download_file = $backlink_urls->get_backlink_urls_file();

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
	
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	
		<title>Results | Unique Backlinks</title>
  
	  <meta name="description" content="Unique Backlinks">
	  <meta name="keywords" content="">
	  <meta name="author" content="">
	
		<link rel="shortcut icon" href="includes/images/favicon.ico" />
		
		<link rel="stylesheet" href="includes/css/style.css" type="text/css" media="screen" title="no title" charset="utf-8" />
		
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
					<p>Click the button to your right to download your new file.</p>
					<p><a href="/unique-backlinks/">Generate another file &rarr;</a></p>
        </div><!-- End .left -->

        <div class="right">
					<a id="output-file" class="file_input_button" href="<?php echo $download_file; ?>"><?php echo $output_file_name; ?></a>
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