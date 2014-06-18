function SetupValidation(){
	$("#RjCaseAddForm").validate({ignore: ":hidden:not(select)",debug: false});
	jQuery.validator.addMethod("lettersonly", function(value, element) {return this.optional(element) || /^[a-z\s\-\.]+$/i.test(value);}, "Letters or punctuation only"); 
	jQuery.validator.addMethod("numbersonly", function(value, element) {return this.optional(element) || /^[0-9]+$/i.test(value);}, "Numbers only");
	jQuery.validator.addMethod("ssnonly", function(value, element) {return this.optional(element) || /^([0-6]\d{2}|7[0-6]\d|77[0-2])([ \-]?)(\d{2})\2(\d{4})$/i.test(value);}, "Not a valid SSN");
	jQuery.validator.addMethod("phoneonly", function(value, element) {return this.optional(element) || /^\(?(\d{3})\)?[- ]?(\d{3})[- ]?(\d{4})$/.test(value);}, "Not a valid 10 digit phone number");		
	jQuery.validator.addMethod("emailonly", function(value, element) {return this.optional(element) || 	/[-0-9a-zA-Z.+_]+@[-0-9a-zA-Z.+_]+\.[a-zA-Z]{2,4}/i.test(value);}, "Not a valid email address");	
	jQuery.validator.addMethod("zipcodeonly", function(value, element) {return this.optional(element) || /^\d{5}(?:-\d{4})?$/.test(value);}, "Not a valid zip code");	

}

function AddOffenderValidation(offenderNumber){
	$('#offenderZipCode'+offenderNumber).rules( "add", {
		required: true,
		zipcodeonly: true
	});
	$('#offenderEmail'+offenderNumber).rules( "add", {
		emailonly: true
	});
	$('#offenderPhoneOne'+offenderNumber).rules( "add", {
		required: true,
		phoneonly: true
	});
	$('#offenderPhoneTwo'+offenderNumber).rules( "add", {
		phoneonly: true
	});
}

function AddVictimValidation(victimNumber){
	$('#victimZipCode'+victimNumber).rules( "add", {
		required: true,
		zipcodeonly: true
	});
	$('#victimEmail'+victimNumber).rules( "add", {
		emailonly: true
	});
	$('#victimPhoneOne'+victimNumber).rules( "add", {
		required: true,
		phoneonly: true
	});
	$('#victimPhoneTwo'+victimNumber).rules( "add", {
		phoneonly: true
	});
}