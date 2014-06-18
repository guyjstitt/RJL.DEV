<html>
<head>
<link rel="stylesheet" href="http://code.jquery.com/ui/1.9.2/themes/base/jquery-ui.css">
<script src="http://code.jquery.com/jquery-1.8.3.js"></script>
<script src="http://code.jquery.com/ui/1.9.2/jquery-ui.js"></script>
<script src="http://harvesthq.github.com/chosen/chosen/chosen.jquery.js"></script>
<link rel="stylesheet" href="http://harvesthq.github.com/chosen/chosen/chosen.css">
</head>
<body>

<script type="text/javascript">
$(function(){
    $(".chzn-select").chosen();
});
</script>

<select class="chzn-select" multiple="true" name="faculty" style="width:200px;">
        <option value="AC">A</option>
        <option value="AD">B</option>
        <option value="AM">C</option>
        <option value="AP">D</option>
</select>


</body>
</html>