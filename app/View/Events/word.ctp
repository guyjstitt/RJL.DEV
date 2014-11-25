<?php
header("Content-Type: application/vnd.ms-word");
header("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); // Date in the past - so must always re-read
header("content-disposition: attachment; filename=myfile.doc"); //this will be the name of the file the user downloads
?>



<style>
<?php echo $inlineCss;?>
</style>
 
 
 
 <?php
 echo "<html>";
 echo "Case Number:";
 echo "<u>";
 echo  $name['Event']['eventName'];	 
 echo "</u>";
 echo "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=Windows-1252\">";
 echo "<body>";
 echo "<b>Conference Report
                       
Case number 			Date: _________________________
	
Youth’s Name:  _______________  ________________________________________________________
Name of Victim:  ____________________________________________________________________
Offense(s):  ______________________________________	Date of Conference:  _________________

0 Completion of the Conference: 
      The RJL Conference report is being returned to the court due to the following: 
	0  The Conference has been held.  		
	        If conference was held, a copy of the Conference Agreement shall be attached.

	0  The Conference has NOT been held due to.
		0 Identified victim could not be located.
		0 No victim identified and representatives of the community could not be identified.
		0 Identified victim did not respond to contact from RJL.
		0 Identified victim did not wish to participate in the conference process.
		0 Identified victim did not wish to participate in the conference process/prosecution of case.
		0 Identified offender did not wish to participate.
		0 Identified offender did not respond to contact from RJL.
		0 Identified victim did not attend preconference meeting after several scheduled meetings.
		0 Identified offender did not attend preconference meeting after several scheduled meetings.

0 Status of the Conference Agreement: 
      The conference agreement is being returned to the court based on the following:

	0  The Agreement has been completed.		

	0  The Agreement has NOT been completed.

Additional Comments, if appropriate: 
 
___________________________________________
Libby Mills, Executive Director
</b>";
  echo "</body>";
  echo "</html>";
  ?>