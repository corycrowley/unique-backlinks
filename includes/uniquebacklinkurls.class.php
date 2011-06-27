<?php
/**
 * Unique Backlink Urls
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
 * No Direct Access to file
 *
 * @since 1.0
 */
defined( 'EXECUTE' ) or die( 'Restricted access.' );

/**
 * Unique_Backlink_Urls Class
 *
 * @since 1.0
 **/
class Unique_Backlink_Urls {
	
	/**
	 * Upload Directory
	 *
	 * @since 1.0
	 * @access public
	 * @var string
	 **/
	var $upload_dir = '';
	
	/**
	 * Holds Uploaded File
	 *
	 * @since 1.0
	 * @access public
	 * @var string
	 **/
	var $uploaded_file = '';
	
	/**
	 * Output Directory
	 *
	 * @since 1.0
	 * @access public
	 * @var string
	 **/
	var $output_dir = '';
	
	/**
	 * Output CSV File
	 *
	 * @since 1.0
	 * @access public
	 * @var string
	 **/
	var $output_csv_file = '';
	
	/**
	 * Set Download Directory
	 *
	 * @since 1.0
	 * @access public
	 * @var string
	 **/
	var $download_dir = '';
	
	/**
	 * Download file path
	 *
	 * @since 1.0
	 * @access public
	 * @var string
	 **/
	var $download_csv_file = '';
	
	/**
	 * Holds delimiter.
	 *
	 * @since 1.0
	 * @access public
	 * @var string
	 **/
	var $delimiter = ',';
	
	/**
	 * PHP4 style constructor
	 *
	 * @since 1.0
	 * @access public
	 */
	public function Unique_Backlink_Urls() {
		$this->__construct();
	}

	/**
	 * PHP5 constructor
	 *
	 * @since 1.0
	 * @access public
	 */
	public function __construct() {
	}
	
	/**
	 * Set the $upload_dir variable
	 *
	 * @since 1.0
	 * @access public
	 * @param string $dir The uploaded file.
	 */
	public function set_upload_dir( $dir ) {
		$this->upload_dir = $dir;
	}
	
	/**
	 * Set the $uploaded_file variable
	 *
	 * @since 1.0
	 * @access public
	 * @param string $file The uploaded file.
	 */
	public function set_uploaded_file( $file ) {
		$this->uploaded_file = $this->upload_dir . $file;
	}

	/**
	 * Set the $output_dir variable
	 *
	 * @since 1.0
	 * @access public
	 * @param string $output_dir The uploaded file.
	 */
	public function set_output_dir( $output_dir ) {
		$this->output_dir = $output_dir;
	}

	/**
	 * Set the $output_csv_file
	 *
	 * @since 1.0
	 * @access public
	 * @param string $output_file The output file.
	 */
	public function set_output_file( $output_file ) {
		$this->output_csv_file = $this->output_dir . $output_file;
	}
	
	/**
	 * Set the $download_dir variable
	 *
	 * @since 1.0
	 * @access public
	 * @param string $download_dir The uploaded file.
	 */
	public function set_download_dir( $download_directory ) {
		$this->download_dir = $download_directory;
	}
	
	/**
	 * Set the $download_csv_file
	 *
	 * @since 1.0
	 * @access public
	 * @param string $download_file The downloaded file.
	 */
	public function set_download_file( $download_file ) {
		$this->download_csv_file = $this->download_dir . $download_file;
	}
	
	/**
	 * Set Delimiter Value.
	 *
	 * @since 1.0
	 * @access public
	 * @param string $delimiter_value The delimiter value
	 */
	public function set_delimiter ( $delimiter_value = ',' ) {
		$this->delimiter = $delimiter_value;
	}
	
	/**
	 * Function to upload the file and put in right directory.
	 *
	 * @since 1.0
	 * @access public
	 * @param object $file File upload object
	 */
	public function upload ( $file ) {
		
		// Assign file paramater.
		$file_object = $file;
		
		if ( $file_object["error"] > 0 ) {
			throw new Exceptions( "Return Code: " . $file_object["error"] );
		} else {	
      move_uploaded_file( $file_object["tmp_name"], $this->uploaded_file );
		}
		
	}
	
	/**
	 * Clean URL to prepare for matching.
	 *
	 * @since 1.0
	 * @access public
	 * @param string $url 
	 * @return string $cleaned_url The cleaned url
	 */
	public function clean_url( $url ) {
		
		$input_url = $url;
		
		if ( $input_url == '' ) {

			echo "EMPTY URL VALUE";
			die(); //redirect on empty value somewhere

		} else {

			$input_url = trim( $input_url );
			$input_url = rtrim( $input_url, "/" );

			if ( ( substr( $input_url, 0, 8 ) == "https://") OR ( substr( $input_url, 0, 7 ) == "http://" ) || ( substr( $input_url, 0, 6 ) == "ftp://" ) || ( substr( $input_url, 0, 7 ) == "feed://" ) ) {

				$new_url = $input_url;

			} else {

		    /*replace uppercase or unsupported to normal*/
		    $url_input = str_replace( array( 'feed://www.','feed://','HTTP://','HTTP://www.','HTTP://WWW.','http://WWW.','HTTPS://','HTTPS://www.','HTTPS://WWW.','https://WWW.' ), '', $input_url );
		    $new_url = "http://www.$url_input";

			} 

			// The parsed host
			$get_parse_url = parse_url( $new_url, PHP_URL_HOST ); 
			// Replace any uppers
			$host_parse_url = str_replace( array( 'Www.','WWW.' ), '', $get_parse_url); 
			// Lowercase host area
			$host_parse_url = strtolower( $host_parse_url ); 
			// The port, omitted from clean_url
			$port_parse_url = parse_url( $new_url, PHP_URL_PORT ); 
			// Users account
			$user_parse_url = parse_url( $new_url, PHP_URL_USER ); 
			// Users password
			$pass_parse_url = parse_url( $new_url, PHP_URL_PASS ); 
			// The file location or path
			$get_path_parse_url = parse_url( $new_url, PHP_URL_PATH ); 
			// Don't recall why I did this
			$path_parse_url = str_replace( array( 'Www.','WWW.' ), '', $get_path_parse_url ); 
			// The query
			$query_add_parse_url = parse_url( $new_url, PHP_URL_QUERY ); 
			// Add the ? back to front of query
			$query_add_parse_url = "?$query_add_parse_url"; 
			// Remove # from end
			$query_add_parse_url = rtrim( $query_add_parse_url, "#" );
			// The end fragment
			$fragment_parse_url = parse_url( $new_url, PHP_URL_FRAGMENT );
			// Add # back to beginning fragment
			$fragment_parse_url = "#$fragment_parse_url"; 
			// Remove any # from end fragment
			$fragment_parse_url = rtrim( $fragment_parse_url,"#" ); 
			// Combine parsed url and path
			$hostpath_url = "$host_parse_url$path_parse_url"; 
			// Remove ? from parsed url and path
			$hostpath_url = rtrim( $hostpath_url, '?' );
			// Remove ? from end of query
			$query_add_parse_url = rtrim( $query_add_parse_url, '?' ); 
			// Host path and query combined
			$hostpathquery_url = "$host_parse_url$path_parse_url$query_add_parse_url";
			// All combined minus port             
			$complete_url = "$host_parse_url$user_parse_url$pass_parse_url$path_parse_url$query_add_parse_url$fragment_parse_url"; 
			// All combined minus port
			$cleaned_url = "$host_parse_url$user_parse_url$pass_parse_url";
			// Double check is no whitespace
			$cleaned_url = trim( $cleaned_url );
			// Remove ? from end of url 
			$cleaned_url = rtrim( $cleaned_url,"?" );
			// Remove # from end of url 
			$cleaned_url = rtrim( $cleaned_url,"#" ); 
			// Remove end slash
			$cleaned_url = rtrim( $cleaned_url,"/" ); 
			// Remove www. if exists
			$cleaned_url = ltrim( $cleaned_url, "www."); 

			// Return Cleaned URL
			return $cleaned_url;
		}
		
	}
	
	/**
	 * Compare Url Utility function
	 *
	 * @since 1.0
	 * @access public
	 * @param string $url1 
	 * @param string $url2 
	 * @return bool If it matches or not
	 */
	public function compare_url( $url1, $url2 ) {
		
		if ( $this->clean_url( $url1 ) == $this->clean_url( $url2 ) ) {
			
			return TRUE;
		
		} else { 
			
			return FALSE;
		
		}
	
	}  
	
	/**
	 * Convert CSV file to array. 
	 *
	 * @since 1.0
	 * @access public
	 * @return array $csv_array CSV Array
	 */
	public function csv_to_array() {
		
		// Parse File
		if ( ( $handle = fopen( $this->uploaded_file , 'r' ) ) !== FALSE ) {
		  
			// Define csv array
			$csv_array = array();
			
			// Loop through file.
			while ( ( $csv_line = fgetcsv( $handle, 1000, $this->delimiter ) ) !== FALSE ) {
				
				$csv_line = implode( "", $csv_line );
				$csv_array[] = $csv_line;
			
			}
		  
			// Close file
			fclose( $handle );
			
			// Return array
			return $csv_array;
		
		} else { 
		
			echo 'Unable to get content of file located at: ' . $this->uploaded_file;
		
		}
		 
	}  
	
	/**
	 * Clean CSV urls
	 *
	 * @since 1.0
	 * @access public
	 * @param string $csv_list 
	 * @return array $clean_data The array of clean urls.
	 */
	public function clean_urls( $csv_list ) {
		
		// Assign paramater
		$url_list = $csv_list;
		
		// Clean url list array
		$cleaned_url_list = array();

		// Loop through the list.
		foreach ( $url_list as $url_entry ) {
			
			// Clean url
			$clean_url = $this->clean_url( $url_entry );
			
			// Add to clean list
			$cleaned_url_list[] = $clean_url;

		}
		
		// Return clean list.
		return $cleaned_url_list;
	
	}
	
	/**
	 * Retrieve Original Urls.
	 *
	 * @since 1.0
	 * @access public
	 * @param string $original_urls 
	 * @param string $cleaned_urls 
	 * @return array $unique_urls_array Original Unique Urls.
	 */
	public function retrieve_original_urls( $original_urls, $cleaned_urls ){
		
		// Assign original urls paramater
		$o_url_array = $original_urls;
		
		// Assign cleaned urls paramater
		$c_url_array = array_unique( $cleaned_urls );
		
		// Define unique urls array
		$unique_urls_array = array();
		
		// Loop through cleaned urls to use key.
		foreach ( $c_url_array as $key => $value ) {
			
			// Assign urls according to the key in cleaned urls array.
			$unique_urls_array[] = array( $o_url_array[ $key ] );

		}
		
		// Return unique urls array
		return $unique_urls_array;
		
	}
   
	/**
	 * Get Unique Urls File.
	 *
	 * @since 1.0
	 * @access public
	 * @return void
	 */
	public function get_backlink_urls_file() {
		
		// Original CSV File
		$csv_array = $this->csv_to_array();

		// Clean CSV File
		$cleaned_csv_array = $this->clean_urls( $csv_array );
		
		// New CSV File entries
		$csv_lines = $this->retrieve_original_urls( $csv_array, $cleaned_csv_array );
		
		// For Correct Line endings
		ini_set( 'auto_detect_line_endings', TRUE );
		
		//var_dump( $csv_array );
		
		// Open file, if not exists, create it.
		$fp = fopen( $this->output_csv_file, 'w' );
		
		// Loop through entries
		foreach( $csv_lines as $csv_line ){
			// Write line
			fputcsv( $fp, $csv_line, ',', '"' );
		}
		
		// Close handler
		fclose( $fp );
		
		return $this->download_csv_file;
	}
	
} // End Class
?>