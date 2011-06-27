/**
 * Unique Backlinks JS
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

(function($){

	// FORM FIELDS - REMOVE VALUE ON FOCUS
	$.fn.focus_blur = function() {
		$(this).css({color:'#999999'});
		return this.focus(function() {
			if( this.value == this.defaultValue ) {
				this.value = "";
			}
			$(this).css({color:'#333333'});
		}).blur(function() {
			if( !this.value.length ) {
				this.value = this.defaultValue;
				$(this).css({color:'#999999'});
			}
		});
	};
	
	$(".input_textbox").focus_blur();
    
  // FORM VALIDATION
  // extend the required validator to check for default value
  // first we create our new validating function
  function checkDefaultVal(value, element) {
      return value !== element.defaultValue;
  }
  // then we re-map the old required validator to another name
  $.validator.methods.oldRequired = $.validator.methods.required;
  // then we write our new required validator, running our function, then calling the old (renamed) one
	$.validator.addMethod('required', function(value, element, param) {
		if (!checkDefaultVal(value, element)) {
			return false;
		}
		return $.validator.methods.oldRequired.call(this, value, element, param);
	},
		$.validator.messages.required // use default required field message
	);
    
	// then validate specific forms if they exist
  $('#UploadForm').each(function(){
      $(this).validate();
  });

})(window.$);