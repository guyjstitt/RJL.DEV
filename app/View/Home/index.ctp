<!DOCTYPE html>
<html>
<head>

<link rel="stylesheet" href="/rjl/app/webroot/css/jquery.dataTables_themeroller.css" /> 
<link rel="stylesheet" href="/rjl/app/webroot/css/jquery-ui-1.10.4.custom.min.css" /> 
<link rel="stylesheet" href="/rjl/app/webroot/css/jquery-ui-1.10.4.custom.css" /> 


<script>
$(document).ready( function () {
    $('#home').dataTable({
	"bJQueryUI": true
	});
	 $('#potential').dataTable({
	"bJQueryUI": true
	});
	$("li#dash").addClass("active");
	
	$("#pVol").click(function(){
		$("#pVolTab").slideToggle();
	});
	
} );
</script>
</head>	



<div class="table-responsive">
<h2>Cases</h2>
<table id="home" class="table">
	<thead>
          <th>Case ID</th>
            <th>Case Status</th>
          	<th>Offender First Name</th>
			<th>Offender Last Name</th>
			<th>Victim First Name</th>
            <th>Victim Last Name</th>
			<th>Actions</th> 
     </thead> 
<tbody id="table">



    
 <?php
 foreach ($items as $case): ?>
	<?php if ($cur_user['id']==$case['RjCase']['user_id']||$cur_user['role']=='admin'||!empty($case['User'][0]['id'])&&$cur_user['id']==($case['User'][0]['id'])||!empty($case['User'][1]['id'])&&$cur_user['id']==($case['User'][1]['id'])||!empty($case['User'][2]['id'])&&$cur_user['id']==($case['User'][2]['id'])||!empty($case['User'][3]['id'])&&$cur_user['id']==($case['User'][3]['id'])||!empty($case['User'][4]['id'])&&$cur_user['id']==($case['User'][4]['id'])||!empty($case['User'][5]['id'])&&$cur_user['id']==($case['User'][5]['id'])):?>
	<tr>
		<td><?php echo $case['RjCase']['caseId']; ?></td>
		<td><?php echo $case['RjCase']['caseStatus']; ?></td>
		<td><?php echo $case['OffenderJoin']['firstName']; ?></td>
		<td><?php echo $case['OffenderJoin']['lastName']; ?></td>
		<td><?php echo $case['VictimJoin']['firstName']; ?></td>
		<td><?php echo $case['VictimJoin']['lastName']; ?></td>
		<td class="actions">
			<?php echo $this->Html->link(('View'), array('controller'=> 'RjCases', 'action' => 'view', $case['RjCase']['id'])); ?> 	<?php if ($cur_user['role']!='facilitator'): ?>|
			<?php echo $this->Html->link(__('Edit'), array('controller'=> 'RjCases','action' => 'edit', $case['RjCase']['id'])); ?>
			<?php endif; ?>
		</td>
	</tr>
	<?php endif; ?>
	<?php endforeach; ?>
</tbody>
</table>

</div>

<?php if ($cur_user['role']!='facilitator' && $cur_user['role']!='casemanager'): ?>
<div id="pVol">
<h2>Potential Volunteers</h2>
<p>Click to hide/show</p>
</div>
<div class="table-responsive" id="pVolTab">
<table id="potential" class="table">
	<thead>
          <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Phone</th>
			<th>Viewed</th>
			<th>Actions</th> 
     </thead> 
<tbody id="table">

 <?php
 foreach ($potentialvols as $potential): ?>
	<tr>
		<td><?php echo $potential['Potential']['firstName']; ?></td>
		<td><?php echo $potential['Potential']['lastName']; ?></td>
		<td><?php echo $potential['Potential']['email']; ?></td>
		<td><?php echo $potential['Potential']['phone']; ?></td>
		<td><?php echo $potential['Potential']['seen']; ?></td>
		<td class="actions">
			<?php echo $this->Html->link(('View'), array('controller'=> 'Potentials', 'action' => 'view', $potential['Potential']['id'])); ?> |
			
			<?php echo $this->Form->postLink('Delete', array('controller'=>'Potentials','action' => 'delete', $potential['Potential']['id']), array('confirm'=>'Are you sure you want to delete that volunteer?')); ?>
		</td>
	</tr>
	<?php endforeach; ?>
</tbody>
</table>
</div>




</html>
<?php echo $this->Html->script('highcharts');?>
<script src="http://code.highcharts.com/modules/exporting.js"></script>

<div class="row">
    <div class="col-xs-6" id="barchart"></div>
    <div class="col-xs-6"id="pieChart"></div>
</div>
<div class="row">
	<div class="col-xs-6">
		<div class= "chartStyle">
			<button id="column" class="chartButton">Bar</button>
			<button id="pie" class="chartButton">Pie</button>
			<button id="line" class="chartButton">Line</button>
			<button id="scatter" class="chartButton">Scatter</button>
		</div>
	</div>
	<div class="col-xs-6">
		<div class= "chartStyle">
			<button id="column1" class="chartButton">Bar</button>
			<button id="pie1" class="chartButton">Pie</button>
			<button id="line1" class="chartButton">Line</button>
			<button id="scatter1" class="chartButton">Scatter</button>
		</div>
	</div>
</div>
<script type="text/javascript">
    hs.graphicsDir = 'highslide/graphics/';
    hs.showCredits = false;
</script>
<script>

	$(function () {
        $('#barchart').highcharts({
            chart: {
                type: 'column'
            },
            title: {
                text: 'Case Volume'
            },
            subtitle: {
                text: ''
            },
			legend: {
            enabled: false
            
			},
			credits: {
                enabled: false
            },
            xAxis: {
                categories: [
                    'Open - Pending','Open - Monitoring', 'Closed - Successful','Closed - Unsuccessful'
                ]
            },
            yAxis: {
                showEmpty: false
            },
            tooltip: {
                headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                    '<td style="padding:0"><b>{point.y:.1f}</b></td></tr>',
                footerFormat: '</table>',
                shared: true,
                useHTML: true
            },
            plotOptions: {
                column: {
                    pointPadding: 0.2,
                    borderWidth: 0
                },
				  series: {
                colorByPoint: true,
				 lineColor: 'gray' 
            }
            },
			series: [{
			
			   allowPointSelect: true,
			   name: 'Cases',
			   
            data: [
                ['Open - Pending', <?php echo $openPending?>],
				 ['Open - Monitoring', <?php echo $openMonitoring?>],
				['Closed - Successful', <?php echo $closedSuccessful?>],
				['Closed - Unsuccessful', <?php echo $closedUnsuccessful?>]
          
            ],
			  showInLegend: true
			  }]
        });
		
    var chart = $('#barchart').highcharts();
        
    // Set type
    $.each(['line', 'column', 'spline', 'area', 'areaspline', 'scatter', 'pie'], function (i, type) {
        $('#' + type).click(function () {
            chart.series[0].update({
                type: type
            }),
			 chart.series[1].update({
                type: type
            }),
			 chart.series[2].update({
                type: type
            }),
			 chart.series[3].update({
                type: type
            });
        });
    });
 });
	
	
	

	
	$(function () {
    $('#pieChart').highcharts({
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false
        },
		legend: {
            enabled: false
			},
			credits: {
                enabled: false
            },
        title: {
            text: 'Crimes Committed by Zip Code'
        },
        tooltip: {
    	    pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
			xAxis: {
                categories: [
              
                    '40214',
					'40109',
					'40165',
					'40209'
                ]
            },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    color: '#000000',
                    connectorColor: '#000000',
                    format: '<b>{point.name}</b>: {point.percentage:.1f} %'
                }
            },
			series: {
                colorByPoint: true,
				  name: 'Crimes',
				 lineColor: 'gray' 
            }
        },
        series: [{
            type: 'pie',
       
            data: [
                ['40214',  <?php echo $zip1?> ],
                ['40109',  <?php echo $zip2?>],
                ['40165',<?php echo  $zip3?>],
                ['40209', <?php echo $zip4 ?>]
                
            ]
        }]
    });
	
 var chart = $('#pieChart').highcharts();
        
    // Set type
    $.each(['line', 'column', 'spline', 'area', 'areaspline', 'scatter', 'pie'], function (i, type) {
        $('#' + type + '1').click(function () {
            chart.series[0].update({
                type: type
            }),
			 chart.series[1].update({
                type: type
            }),
			 chart.series[2].update({
                type: type
            }),
			 chart.series[4].update({
                type: type
            })
			;
        });
    });
 });





</script>
<?php endif ?>
<?php if ($cur_user['role']=='facilitator' || $cur_user['role']=='casemanager'): ?>
<div class="navactions">
	
	<ul>
		<li><?php echo $this->Html->link(__('Go To Documents'), array('controller' => 'Facilitators','action' => 'index')); ?></li>
	</ul>
</div>

<?php endif ?>
