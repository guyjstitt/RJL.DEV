
  	var lastRow=0;
	function addPerson() {
		lastRow++;
		$("#victimsTable tbody>tr:#victim0").clone(true).attr('id','victim'+lastRow).removeAttr('style').insertBefore("#victimsTable tbody>tr:#trAdd");
		$("#victim"+lastRow+" button.remove").attr('onclick','removePerson('+lastRow+')');
		$("#victim"+lastRow+" button.fnSearch").attr('onclick','SearchFN('+'victimFirstName'+lastRow+')');
		$("#victim"+lastRow+" button.lnSearch").attr('onclick','SearchLN('+'victimLastName'+lastRow+')');
		$("#victim"+lastRow+" button.ssnSearch").attr('onclick','SearchSSN('+'victimSSN'+lastRow+')');
		$("#victim"+lastRow+" input.vTxtID").attr('name','data[Victim]['+lastRow+'][victimId]').attr('id','victimID'+lastRow);
		$("#victim"+lastRow+" input.vFN").attr('name','data[Victim]['+lastRow+'][firstName]').attr('id','victimFirstName'+lastRow);
		$("#victim"+lastRow+" input.vLN").attr('name','data[Victim]['+lastRow+'][lastName]').attr('id','victimLastName'+lastRow);
		$("#victim"+lastRow+" input.vSSN").attr('name','data[Victim]['+lastRow+'][socialSecurityNumber]').attr('id','victimSSN'+lastRow);
		$("#victim"+lastRow+" input.victimdatepicker").attr('name','data[Victim]['+lastRow+'][dateOfBirth]').attr('id','victimDateOfBirth'+lastRow);
		$("#victim"+lastRow+" select.r").attr('name','data[Victim]['+lastRow+'][race]').attr('id','victimRace'+lastRow);
		$("#victim"+lastRow+" select.g").attr('name','data[Victim]['+lastRow+'][gender]').attr('id','victimGender'+lastRow);
		$("#victim"+lastRow+" input.vADDR").attr('name','data[Victim]['+lastRow+'][streetAddress]').attr('id','victimStreetAddress'+lastRow);
		$("#victim"+lastRow+" input.vCITY").attr('name','data[Victim]['+lastRow+'][city]').attr('id','victimCity'+lastRow);
		$("#victim"+lastRow+" select.vST").attr('name','data[Victim]['+lastRow+'][state]').attr('id','victimState'+lastRow);
		$("#victim"+lastRow+" input.vZIP").attr('name','data[Victim]['+lastRow+'][zipCode]').attr('id','victimZipCode'+lastRow);
		$("#victim"+lastRow+" input.vPh1").attr('name','data[Victim]['+lastRow+'][phoneOne]').attr('id','victimPhoneOne'+lastRow);
		$("#victim"+lastRow+" select.p1t").attr('name','data[Victim]['+lastRow+'][phoneOneType]').attr('id','victimPhoneOneType'+lastRow);
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
		
	
	

	}
	
	function removePerson(x) {
		$("#victim"+x).remove();
	}
	
	
	function addOffender() {
		lastRow++;
		
		$("#offendersTable tbody>tr:#offender0").clone(true).attr('id','offender'+lastRow).removeAttr('style').insertBefore("#offendersTable tbody>tr:#ofAdd");
		$("#offender"+lastRow+" button.remove").attr('onclick','removeOffender('+lastRow+')');
		$("#offender"+lastRow+" button.fnSearch").attr('onclick','SearchOffFN('+'offenderFirstName'+lastRow+')');
		$("#offender"+lastRow+" button.lnSearch").attr('onclick','SearchOffLN('+'offenderLastName'+lastRow+')');
		$("#offender"+lastRow+" input.oTxtID").attr('name','data[Offender]['+lastRow+'][offenderId]').attr('id','offenderID'+lastRow);
		$("#offender"+lastRow+" input.oFN").attr('name','data[Offender]['+lastRow+'][firstName]').attr('id','offenderFirstName'+lastRow);
		$("#offender"+lastRow+" input.oLN").attr('name','data[Offender]['+lastRow+'][lastName]').attr('id','offenderLastName'+lastRow);

		$("#offender"+lastRow+" input.offenderdatepicker").attr('name','data[Offender]['+lastRow+'][dateOfBirth]').attr('id','offenderDateOfBirth'+lastRow);
		$("#offender"+lastRow+" select.og").attr('name','data[Offender]['+lastRow+'][gender]').attr('id','offenderGender'+lastRow);
		$("#offender"+lastRow+" select.or").attr('name','data[Offender]['+lastRow+'][race]').attr('id','offenderRace'+lastRow);
		$("#offender"+lastRow+" input.oADDR").attr('name','data[Offender]['+lastRow+'][streetAddress]').attr('id','offenderStreetAddress'+lastRow);
		$("#offender"+lastRow+" input.oZIP").attr('name','data[Offender]['+lastRow+'][zipCode]').attr('id','offenderZipCode'+lastRow);
		$("#offender"+lastRow+" input.oCITY").attr('name','data[Offender]['+lastRow+'][city]').attr('id','offenderCity'+lastRow);
		$("#offender"+lastRow+" select.oST").attr('name','data[Offender]['+lastRow+'][state]').attr('id','offenderState'+lastRow);
		$("#offender"+lastRow+" input.oEML").attr('name','data[Offender]['+lastRow+'][email]').attr('id','offenderEmail'+lastRow);
		
		
		$("#offender"+lastRow+" input.oPGF").attr('name','data[Offender]['+lastRow+'][guardianOneFirstName]').attr('id','offenderguardianOneFirstName'+lastRow);
		$("#offender"+lastRow+" input.oPGL").attr('name','data[Offender]['+lastRow+'][guardianOneLastName]').attr('id','offenderguardianOneLastName'+lastRow);
		$("#offender"+lastRow+" select.oPGR").attr('name','data[Offender]['+lastRow+'][guardianOneRelation]').attr('id','offenderGuardianOneRelation'+lastRow);
		$("#offender"+lastRow+" input.oSGF").attr('name','data[Offender]['+lastRow+'][guardianTwoFirstName]').attr('id','guardianTwoFirstName'+lastRow);
		$("#offender"+lastRow+" input.oSGL").attr('name','data[Offender]['+lastRow+'][guardianTwoLastName]').attr('id','guardianTwoLastName'+lastRow);
		$("#offender"+lastRow+" select.oSGR").attr('name','data[Offender]['+lastRow+'][guardianTwoRelation]').attr('id','offenderGuardianTwoRelation'+lastRow);
		$("#offender"+lastRow+" select.opt1").attr('name','data[Offender]['+lastRow+'][phoneOneType]').attr('id','offenderPhoneOneType'+lastRow);
		$("#offender"+lastRow+" input.oPH1").attr('name','data[Offender]['+lastRow+'][phoneOne]').attr('id','offenderPhoneOne'+lastRow);
		$("#offender"+lastRow+" select.opt2").attr('name','data[Offender]['+lastRow+'][phoneTwoType]').attr('id','offenderPhoneTwoType'+lastRow);
		$("#offender"+lastRow+" input.oPH2").attr('name','data[Offender]['+lastRow+'][phoneTwo]').attr('id','offenderPhoneTwo'+lastRow);
		$("#offender"+lastRow+" input.oID").attr('name','data[Offender]['+lastRow+'][id]').attr('id','Idoffender'+lastRow);
		
		AddOffenderCalScript(lastRow); 
		AddOffenderChosenGenderScript(lastRow);
		AddOffenderChosenRaceScript(lastRow);
		AddOffenderChosenState(lastRow);
		AddOffenderChosenPhoneOneTypeScript(lastRow);
		AddOffenderChosenPhoneTwoTypeScript(lastRow);
		AddOffenderChosenGuardian1(lastRow);
		AddOffenderChosenGuardian2(lastRow);
	
		
	}
	
	function removeOffender(x) {
		$("#offender"+x).remove();
	}