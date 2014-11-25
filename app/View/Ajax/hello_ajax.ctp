

<?php echo $result; ?>
<a href="#" id="performAjaxLink">Do Ajax </a>
<?php echo $this->Form->create('');



echo $this->Form->input('caseId', array('id' => 'resultField')); 
echo $this->Form->input('anotherfield', array('id' => 'resultField2')); 
?>
<?php echo $this->Form->end(__('Submit'));?>

<script>
    jQuery("#performAjaxLink").click(
            function()
            {                
                jQuery.ajax({
                    type:'POST',
                    async: true,
                    cache: false,
                    url: '<?php echo Router::Url(array('controller' => 'ajax','admin' => FALSE, 'action' => 'helloAjax'), TRUE); ?>',
                    success: function(response) {
                        jQuery('#resultField').val(response);,
						jQuery('#resultField2').val(response);
                    },
                    data:jQuery('form').serialize()
                });
                return false;
            }
    );
</script>