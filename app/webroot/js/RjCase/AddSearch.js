	var $myDialog;
	var curSearchVictim;
	function SearchFN(searchid){
		var item = $(searchid,this);
		curSearchVictim = item.attr('id').slice(-1);
		var searchVal = item.val();
		 $myDialog = $('<div></div>')
			.load('/rjl/victims/searchfn/' + searchVal)
			.dialog({
				width: $(window).width() * 0.8,
				height: $(window).height() * 0.8,
				autoOpen: false,
				title: 'Search by First Name',
				close: function( event, ui ) {
				},
				buttons: {
					"Cancel": function () {
						$(this).dialog("close");
						return false;
					}
				}
			});
		$myDialog.dialog('open');
	}
	
	function SearchLN(searchid){
		var item = $(searchid,this);
		curSearchVictim = item.attr('id').slice(-1);
		var searchVal = item.val();
		 $myDialog = $('<div></div>')
			.load('/rjl/victims/searchln/' + searchVal)
			.dialog({
				width: $(window).width() * 0.8,
				height: $(window).height() * 0.8,
				autoOpen: false,
				title: 'Search by Last Name',
				close: function( event, ui ) {
				},
				buttons: {
					"Cancel": function () {
						$(this).dialog("close");
						return false;
					}
				}
			});
		$myDialog.dialog('open');
	}
	function SearchSSN(searchid){
		var item = $(searchid,this);
		curSearchVictim = item.attr('id').slice(-1);
		var searchVal = item.val();
		 $myDialog = $('<div></div>')
			.load('/rjl/victims/searchssn/' + searchVal)
			.dialog({
				width: $(window).width() * 0.8,
				height: $(window).height() * 0.8,
				autoOpen: false,
				title: 'Search by SSN',
				close: function( event, ui ) {
				},
				buttons: {
					"Cancel": function () {
						$(this).dialog("close");
						return false;
					}
				}
			});
		$myDialog.dialog('open');
	}

	function PopulateVictim(jsonObj)
	{
		var obj = jQuery.parseJSON(jsonObj);
		$('#victimID'+curSearchVictim).val(obj.Victim.victimId);
		$('#victimFirstName'+curSearchVictim).val(obj.Victim.firstName);
		$('#victimLastName'+curSearchVictim).val(obj.Victim.lastName);
		$('#victimSocialSecurityNumber'+curSearchVictim).val(obj.Victim.ssn);
		$('#victimAge'+curSearchVictim).val(obj.Victim.age);
		$('#victimDateOfBirth'+curSearchVictim).val(obj.Victim.dateOfBirth);
		$('#victimGender'+curSearchVictim).val(obj.Victim.gender).trigger('chosen:updated');;
		$('#victimRace'+curSearchVictim).val(obj.Victim.race).trigger('chosen:updated');;
		$('#victimStreetAddress'+curSearchVictim).val(obj.Victim.streetAddress);
		$('#victimZipCode'+curSearchVictim).val(obj.Victim.zipCode);
		$('#victimCity'+curSearchVictim).val(obj.Victim.city);
		$('#victimState'+curSearchVictim).val(obj.Victim.state);
		$('#victimEmail'+curSearchVictim).val(obj.Victim.email);
		$('#victimPhoneOne'+curSearchVictim).val(obj.Victim.phoneOne);
		$('#victimPhoneOneType'+curSearchVictim).val(obj.Victim.phoneOneType).trigger('chosen:updated');
		$('#victimPhoneTwo'+curSearchVictim).val(obj.Victim.phoneTwo);
		$('#victimPhoneTwoType'+curSearchVictim).val(obj.Victim.phoneTwoType).trigger('chosen:updated');;
		$('#victimSSN'+curSearchVictim).val(obj.Victim.socialSecurityNumber);
		$('#Idvictim'+curSearchVictim).val(obj.Victim.id);
		$myDialog.dialog('close');
	}


	var $myDialog;
	var curSearchOffender;
	function SearchOffFN(searchid){
		var item = $(searchid,this);
		curSearchOffender = item.attr('id').slice(-1);
		var searchVal = item.val();
		 $myDialog = $('<div></div>')
			.load('/rjl/Offenders/searchfn/' + searchVal)
			.dialog({
				width: $(window).width() * 0.8,
				height: $(window).height() * 0.8,
				autoOpen: false,
				title: 'Search by First Name',
				close: function( event, ui ) {
				},
				buttons: {
					"Cancel": function () {
						$(this).dialog("close");
						return false;
					}
				}
			});
		$myDialog.dialog('open');
	}
	
	function SearchOffLN(searchid){
		var item = $(searchid,this);
		curSearchOffender = item.attr('id').slice(-1);
		var searchVal = item.val();
		 $myDialog = $('<div></div>')
			.load('/rjl/Offenders/searchln/' + searchVal)
			.dialog({
				width: $(window).width() * 0.8,
				height: $(window).height() * 0.8,
				autoOpen: false,
				title: 'Search by Last Name',
				close: function( event, ui ) {
				},
				buttons: {
					"Cancel": function () {
						$(this).dialog("close");
						return false;
					}
				}
			});
		$myDialog.dialog('open');
	}
	function SearchOffSSN(searchid){
		var item = $(searchid,this);
		curSearchOffender = item.attr('id').slice(-1);
		var searchVal = item.val();
		 $myDialog = $('<div></div>')
			.load('/rjl/Offenders/searchssn/' + searchVal)
			.dialog({
				width: $(window).width() * 0.8,
				height: $(window).height() * 0.8,
				autoOpen: false,
				title: 'Search by SSN',
				close: function( event, ui ) {
				},
				buttons: {
					"Cancel": function () {
						$(this).dialog("close");
						return false;
					}
				}
			});
		$myDialog.dialog('open');
	}

	function PopulateOffender(jsonObj)
	{
		var obj = jQuery.parseJSON(jsonObj);
		$('#offenderID'+curSearchOffender).val(obj.Offender.offenderId);
		$('#offenderFirstName'+curSearchOffender).val(obj.Offender.firstName);
		$('#offenderLastName'+curSearchOffender).val(obj.Offender.lastName);
		$('#offenderDateOfBirth'+curSearchOffender).val(obj.Offender.dateOfBirth);
		$('#offenderGender'+curSearchOffender).val(obj.Offender.gender).trigger('chosen:updated');
		$('#offenderRace'+curSearchOffender).val(obj.Offender.race).trigger('chosen:updated');
		$('#offenderStreetAddress'+curSearchOffender).val(obj.Offender.streetAddress);
		$('#offenderZipCode'+curSearchOffender).val(obj.Offender.zipCode);
		$('#offenderCity'+curSearchOffender).val(obj.Offender.city);
		$('#offenderState'+curSearchOffender).val(obj.Offender.state);
		$('#offenderEmail'+curSearchOffender).val(obj.Offender.email);
		$('#offenderguardianOneFirstName'+curSearchOffender).val(obj.Offender.guardianOneFirstName);
		$('#offenderguardianOneLastName'+curSearchOffender).val(obj.Offender.guardianOneLastName);
		$('#offenderGuardianOneRelation'+curSearchOffender).val(obj.Offender.guardianOneRelation).trigger('chosen:updated');
		$('#guardianTwoFirstName'+curSearchOffender).val(obj.Offender.guardianTwoFirstName);
		$('#guardianTwoLastName'+curSearchOffender).val(obj.Offender.guardianTwoLastName);
		$('#offenderGuardianTwoRelation'+curSearchOffender).val(obj.Offender.guardianTwoRelation).trigger('chosen:updated');
		$('#offenderPhoneOne'+curSearchOffender).val(obj.Offender.phoneOne);
		$('#offenderPhoneOneType'+curSearchOffender).val(obj.Offender.phoneOneType).trigger('chosen:updated');
		$('#offenderPhoneTwo'+curSearchOffender).val(obj.Offender.phoneTwo);
		$('#offenderPhoneTwoType'+curSearchOffender).val(obj.Offender.phoneTwoType).trigger('chosen:updated');
		$('#offenderSSN'+curSearchOffender).val(obj.Offender.socialSecurityNumber);
		$('#offenderCommHours'+curSearchOffender).val(obj.Offender.commhours);
		$('#Idoffender'+curSearchOffender).val(obj.Offender.id);
		$myDialog.dialog('close');
	}