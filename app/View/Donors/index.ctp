<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="/rjl/app/webroot/css/jquery.dataTables_themeroller.css" /> 
<link rel="stylesheet" href="/rjl/app/webroot/css/jquery-ui-1.10.4.custom.min.css" /> 
<link rel="stylesheet" href="/rjl/app/webroot/css/jquery-ui-1.10.4.custom.css" /> 

<style>
.messageHead {
	display: none;
}

.required label:after {
	content: "";
	
}
</style>

<script>
$(document).ready( function () {
    $('#donor').dataTable({
	"bJQueryUI": true
	});
	$("li#admin").addClass("active");
} );


</script>


<?php echo $this->Html->script('highcharts');?>

</head>

<div class="donors index">
    <h2>Donors</h2>
	<div class="table-responsive">
	<table class="table" id="donor">
    <thead>
		<tr>
            <th>Donor ID</th>
            <th>Email Address</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Organization Name</th>
			<th>Donor Amount </th>
			<th>Donor Type </th>
			<th>Actions</th>
        </tr>
	</thead>
	<tbody>
    <?php foreach ($donors as $donor): ?>
    <tr>
        <td><?php echo $donor['Donor']['id']; ?> </td>
        <td><?php echo $donor['Donor']['emailAddress']; ?> </td>
        <td><?php echo $donor['Donor']['firstName']; ?> </td>
        <td><?php echo $donor['Donor']['lastName']; ?> </td>
        <td><?php echo $donor['Donor']['organizationName']; ?> </td>
		<td><?php echo $donor['Donor']['donorAmount']; ?> </td>
		<td><?php echo $donor['Donor']['donorType']; ?> </td>
		<td class="actions">
            <?php echo $this->Html->link('View',array('action' => 'view', $donor['Donor']['id'])); ?> |
            <?php echo $this->Html->link('Edit',array('action' => 'edit', $donor['Donor']['id'])); ?> |
			<?php echo $this->Form->postLink('Delete', array('action' => 'delete', $donor['Donor']['id']), array('confirm'=>'Are you sure you want to delete that donor?')); ?>
        </td>
    </tr>
    <?php endforeach; ?>
    </tbody>
	</table>
</div>
</div> 


<div>
<div class="table-responsive">
<table class="table holder">
	<tr>
	
	
		<td class="fileL">
<div class="navactions">
    <ul>
		<li><?php echo $this->Html->link('New Donor', array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link('Export File', array('action' => 'export'));?></li>
		<li><?php echo $this->Html->link('Run a Report', array('controller' => 'Reports','action' => 'wizard','new','Donor'));?></li>
	</ul>
</div>
	</td>
	<td class="fileR">
	<h3>Import Donor Information</h3>
		<?php 
		echo $this->Form->create('Contact', array('type'=>'file'));
		?>

		<?php if (!empty($this->data['Contact']['filepath'])): ?>
			<div class="input">
				<label>Uploaded File</label>
				<?php
				
				echo $this->Form->input('filepath', array('type'=>'hidden'));
				echo $this->Html->link(basename($this->data['Contact']['filepath']), $this->data['Contact']['filepath']);
				?>
			</div>
		<?php else: ?>
			<?php echo $this->Form->input('filename',array(
				'type' => 'file','label'=>''
			)); ?>
		<?php endif; ?>

		<?php
		echo $this->Form->end('Submit');
		?>
	</td>

	</tr>
</table>
</div>


<script src="http://code.highcharts.com/modules/exporting.js"></script>

<div class="row">
    <div class="col-md-6"id="bar"></div>
	<div class="col-md-6"id="pie2"></div>
</div>
<div class="row">
	<div class="col-md-6">
		<div class= "chartStyle">
			<button id="column" class="chartButton">Bar</button>
			<button id="pie" class="chartButton">Pie</button>
			<button id="line" class="chartButton">Line</button>
			<button id="scatter" class="chartButton">Scatter</button>
		</div>
	</div>
	<div class="col-md-6">
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
        $('#bar').highcharts({
            chart: {
                type: 'column'
            },
			legend: {
            enabled: false
            
			},
			credits: {
                enabled: false
            },
            title: {
                text: 'Total Amount of Donations'
            },
            subtitle: {
                text: ''
            },
            xAxis: {
                categories: [
                    'Total',
                    'Total Identified',
					'Total Anonymous'
                ]
            }, 
            yAxis: {
                 showEmpty: false
            },
            tooltip: {
                headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                    '<td style="padding:"><b>${point.y:1f}</b></td></tr>',
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
				  name: 'Donors',
				 lineColor: 'gray' 
            }
            },
            series: [{
			
			   allowPointSelect: true,
			   name: 'Donations',
			   
		
	
			 data: [ // use names for display in pie data labels
			 
				
               ['Total',<?php echo $totalDonations['Donor']['total'] ?>],
    
               ['Total Identified', <?php echo $totalIdentified['Donor']['totalId'] ?>],
			   
			   [ 'Total Anonymous',<?php echo $totalAnonymous['Donor']['totalAnon'] ?>]
	
			
			],
			  showInLegend: true
			  }]
        });
	
		 
    var chart = $('#bar').highcharts();
        
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
            })
			;
        });
    });
 });
    

    $(function () {
    $('#pie2').highcharts({
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
            text: 'Identified vs. Anonymous '
        },
        tooltip: {
    	    pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
		xAxis: {
                categories: [
              
                    'Total Identified',
					'Total Anonymous'
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
                }},
			series: {
                colorByPoint: true,
				 lineColor: 'gray' 
            }
			
        },
        series: [{
		
            type: 'pie',
          
            data: [
                ['Identified',  <?php echo $Identified ?>],
				['Anonymous',  <?php echo $Anonymous ?>]
                
               
            ]
		
        },
		]
		});
			    var chart = $('#pie2').highcharts();
        
    // Set type
    $.each(['line', 'column', 'spline', 'area', 'areaspline', 'scatter', 'pie'], function (i, type) {
        $('#' + type + '1').click(function () {
            chart.series[0].update({
                type: type
            }),
			 chart.series[1].update({
                type: type
            })
			;
        });
    });
 });

    
   </script>







</html>

