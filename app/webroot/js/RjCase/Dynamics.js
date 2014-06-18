
  	var lastRow=0;
	function addPerson() {
		lastRow++;
		$("#victimsTable tbody>tr:#victim0").clone(true).attr('id','victim'+lastRow).removeAttr('style').insertBefore("#victimsTable tbody>tr:#trAdd");
		$("#victim"+lastRow+" button.remove").attr('onclick','removePerson('+lastRow+')');
		$("#victim"+lastRow+" button.fnSearch").attr('onclick','SearchFN('+'victimFirstName'+lastRow+')');
		$("#victim"+lastRow+" button.lnSearch").attr('onclick','SearchLN('+'victimLastName'+lastRow+')');
		$("#victim"+lastRow+" button.ssnSearch").attr('onclick','SearchSSN('+'victimSSN'+lastRow+')');
		$("#victim"+lastRow+" input.vTxtID").attr('name','data[Victim]['+lastRow+'][victimId]').attr('id','victimID'+lastRow).addClass('required').attr('onfocusout','ValidateVictimID('+lastRow+')');
		$("#victim"+lastRow+" input.vFN").attr('name','data[Victim]['+lastRow+'][firstName]').attr('id','victimFirstName'+lastRow).addClass('required');
		$("#victim"+lastRow+" input.vLN").attr('name','data[Victim]['+lastRow+'][lastName]').attr('id','victimLastName'+lastRow).addClass('required');
		$("#victim"+lastRow+" input.vSSN").attr('name','data[Victim]['+lastRow+'][socialSecurityNumber]').attr('id','victimSSN'+lastRow);
		$("#victim"+lastRow+" input.victimdatepicker").attr('name','data[Victim]['+lastRow+'][dateOfBirth]').attr('id','victimDateOfBirth'+lastRow);
		$("#victim"+lastRow+" select.r").attr('name','data[Victim]['+lastRow+'][race]').attr('id','victimRace'+lastRow);
		$("#victim"+lastRow+" select.g").attr('name','data[Victim]['+lastRow+'][gender]').attr('id','victimGender'+lastRow);
		$("#victim"+lastRow+" input.vADDR").attr('name','data[Victim]['+lastRow+'][streetAddress]').attr('id','victimStreetAddress'+lastRow).addClass('required');
		$("#victim"+lastRow+" input.vCITY").attr('name','data[Victim]['+lastRow+'][city]').attr('id','victimCity'+lastRow).addClass('required');
		$("#victim"+lastRow+" select.vST").attr('name','data[Victim]['+lastRow+'][state]').attr('id','victimState'+lastRow).addClass('required');
		$("#victim"+lastRow+" input.vZIP").attr('name','data[Victim]['+lastRow+'][zipCode]').attr('id','victimZipCode'+lastRow).addClass('required');
		$("#victim"+lastRow+" input.vPh1").attr('name','data[Victim]['+lastRow+'][phoneOne]').attr('id','victimPhoneOne'+lastRow);
		$("#victim"+lastRow+" select.p1t").attr('name','data[Victim]['+lastRow+'][phoneOneType]').attr('id','victimPhoneOneType'+lastRow).addClass('required');
		$("#victim"+lastRow+" input.vPh2").attr('name','data[Victim]['+lastRow+'][phoneTwo]').attr('id','victimPhoneTwo'+lastRow);
		$("#victim"+lastRow+" select.p2t").attr('name','data[Victim]['+lastRow+'][phoneTwoType]').attr('id','victimPhoneTwoType'+lastRow);
		$("#victim"+lastRow+" input.vEML").attr('name','data[Victim]['+lastRow+'][email]').attr('id','victimEmail'+lastRow);
		$("#victim"+lastRow+" input.vID").attr('name','data[Victim]['+lastRow+'][id]').attr('id','Idvictim'+lastRow);
		
		
		
		AddVictimCalScript(lastRow);
		AddVictimChosenGenderScript(lastRow);
		AddVictimChosenRaceScript(lastRow);
		AddVictimChosenState(lastRow);
		AddVictimChosenPhoneOneTypeScript(lastRow);
		AddVictimChosenPhoneTwoTypeScript(lastRow);
	
		AddVictimValidation(lastRow);

	}
	
	function removePerson(x) {
		$("#victim"+x).remove();
	}
	

  	var lastORow=0;	
	function addOffender() {
		lastORow++;
		$("#offendersTable tbody>tr:#offender0").clone(true).attr('id','offender'+lastORow).removeAttr('style').insertBefore("#offendersTable tbody>tr:#ofAdd");
		$("#offender"+lastORow+" button.remove").attr('onclick','removeOffender('+lastORow+')');
		$("#offender"+lastORow+" button.fnSearch").attr('onclick','SearchOffFN('+'offenderFirstName'+lastORow+')');
		$("#offender"+lastORow+" button.lnSearch").attr('onclick','SearchOffLN('+'offenderLastName'+lastORow+')');
		$("#offender"+lastORow+" button.ssnSearch").attr('onclick','SearchOffSSN('+'offenderSSN'+lastORow+')');
		$("#offender"+lastORow+" input.oTxtID").attr('name','data[Offender]['+lastORow+'][offenderId]').attr('id','offenderID'+lastORow).attr('onfocusout','ValidateOffID('+lastORow+')');
		$("#offender"+lastORow+" input.oFN").attr('name','data[Offender]['+lastORow+'][firstName]').attr('id','offenderFirstName'+lastORow).addClass('required');
		$("#offender"+lastORow+" input.oLN").attr('name','data[Offender]['+lastORow+'][lastName]').attr('id','offenderLastName'+lastORow).addClass('required');
		$("#offender"+lastORow+" input.oSSN").attr('name','data[Offender]['+lastORow+'][socialSecurityNumber]').attr('id','offenderSSN'+lastORow);
		$("#offender"+lastORow+" input.offenderdatepicker").attr('name','data[Offender]['+lastORow+'][dateOfBirth]').attr('id','offenderDateOfBirth'+lastORow).addClass('required');
		$("#offender"+lastORow+" select.og").attr('name','data[Offender]['+lastORow+'][gender]').attr('id','offenderGender'+lastORow);
		$("#offender"+lastORow+" select.or").attr('name','data[Offender]['+lastORow+'][race]').attr('id','offenderRace'+lastORow);
		$("#offender"+lastORow+" input.oADDR").attr('name','data[Offender]['+lastORow+'][streetAddress]').attr('id','offenderStreetAddress'+lastORow).addClass('required');
		$("#offender"+lastORow+" input.oZIP").attr('name','data[Offender]['+lastORow+'][zipCode]').attr('id','offenderZipCode'+lastORow).addClass('required');
		$("#offender"+lastORow+" input.oCITY").attr('name','data[Offender]['+lastORow+'][city]').attr('id','offenderCity'+lastORow).addClass('required');
		$("#offender"+lastORow+" select.oST").attr('name','data[Offender]['+lastORow+'][state]').attr('id','offenderState'+lastORow).addClass('required');
		$("#offender"+lastORow+" input.oEML").attr('name','data[Offender]['+lastORow+'][email]').attr('id','offenderEmail'+lastORow);
		$("#offender"+lastORow+" input.oPGF").attr('name','data[Offender]['+lastORow+'][guardianOneFirstName]').attr('id','offenderguardianOneFirstName'+lastORow);
		$("#offender"+lastORow+" input.oPGL").attr('name','data[Offender]['+lastORow+'][guardianOneLastName]').attr('id','offenderguardianOneLastName'+lastORow);
		$("#offender"+lastORow+" select.oPGR").attr('name','data[Offender]['+lastORow+'][guardianOneRelation]').attr('id','offenderGuardianOneRelation'+lastORow);
		$("#offender"+lastORow+" input.oSGF").attr('name','data[Offender]['+lastORow+'][guardianTwoFirstName]').attr('id','guardianTwoFirstName'+lastORow);
		$("#offender"+lastORow+" input.oSGL").attr('name','data[Offender]['+lastORow+'][guardianTwoLastName]').attr('id','guardianTwoLastName'+lastORow);
		$("#offender"+lastORow+" select.oSGR").attr('name','data[Offender]['+lastORow+'][guardianTwoRelation]').attr('id','offenderGuardianTwoRelation'+lastORow);
		$("#offender"+lastORow+" select.opt1").attr('name','data[Offender]['+lastORow+'][phoneOneType]').attr('id','offenderPhoneOneType'+lastORow).addClass('required');
		$("#offender"+lastORow+" input.oPH1").attr('name','data[Offender]['+lastORow+'][phoneOne]').attr('id','offenderPhoneOne'+lastORow);
		$("#offender"+lastORow+" select.opt2").attr('name','data[Offender]['+lastORow+'][phoneTwoType]').attr('id','offenderPhoneTwoType'+lastORow);
		$("#offender"+lastORow+" input.oPH2").attr('name','data[Offender]['+lastORow+'][phoneTwo]').attr('id','offenderPhoneTwo'+lastORow);
		$("#offender"+lastORow+" input.oCMH").attr('name','data[Offender]['+lastORow+'][commhours]').attr('id','offenderCommHours'+lastORow);
		$("#offender"+lastORow+" input.oID").attr('name','data[Offender]['+lastORow+'][id]').attr('id','Idoffender'+lastORow);
		
		AddOffenderCalScript(lastORow); 
		AddOffenderChosenGenderScript(lastORow);
		AddOffenderChosenRaceScript(lastORow);
		AddOffenderChosenState(lastORow);
		AddOffenderChosenPhoneOneTypeScript(lastORow);
		AddOffenderChosenPhoneTwoTypeScript(lastORow);
		AddOffenderChosenGuardian1(lastORow);
		AddOffenderChosenGuardian2(lastORow);
	
		AddOffenderValidation(lastORow);
		
	}
	
	function removeOffender(x) {
		$("#offender"+x).remove();
	}