<input 
	type="submit"
	value="<?php echo isset($label) && $label !== '' ? $label : 'Submit Now &gt;' ?>"
	class="<?php echo $location === "contact_page" ? "form-send button-5 d-text-c-h d-border-c-h" : "send-form submit-button"?>"
	data-sending='<?php _e('Sending Message','cuisinier') ?>'
	data-sent='<?php _e('Message Successfully Sent','cuisinier') ?>'
	>