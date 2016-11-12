<!DOCTYPE html>
<html lang="en">
    <head>
		<meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <title>::DIDBMS</title>
		<!--datepicker script-->
	<script src="js/mootools-core.js" type="text/javascript"></script>
	<script src="js/mootools-more.js" type="text/javascript"></script>
	<script src="js/Locale.en-US.DatePicker.js" type="text/javascript"></script>
	<script src="js/Picker.js" type="text/javascript"></script>
	<script src="js/Picker.Attach.js" type="text/javascript"></script>
	<script src="js/Picker.Date.js" type="text/javascript"></script>

	<link  href="css/style2.css" rel="stylesheet" />
	<link  href="css/datepicker.css" rel="stylesheet" type="text/css" media="screen" />
        
        <meta name="description" content="Custom Login Form Styling with CSS3" />
        <meta name="keywords" content="css3, login, form, custom, input, submit, button, html5, placeholder" />
        <link rel="shortcut icon" href="../favicon.ico"> 
        <link rel="stylesheet" type="text/css" href="css/style.css" />
		<script src="js/modernizr.custom.63321.js"></script>
	<script>
	window.addEvent('domready', function(){
		new Picker.Date('default');
		new Picker.Date('custom', {
			pickerClass: 'datepicker custom'
		});
});

	</script>
    <script type="text/javascript">
<!--
function printContent(id){
str=document.getElementById(id).innerHTML
newwin=window.open('','printwin','left=100,top=100,width=400,height=400')
newwin.document.write('<HTML>\n<HEAD>\n')
newwin.document.write('<TITLE>Print Page</TITLE>\n')
newwin.document.write('<script>\n')
newwin.document.write('function chkstate(){\n')
newwin.document.write('if(document.readyState=="complete"){\n')
newwin.document.write('window.close()\n')
newwin.document.write('}\n')
newwin.document.write('else{\n')
newwin.document.write('setTimeout("chkstate()",2000)\n')
newwin.document.write('}\n')
newwin.document.write('}\n')
newwin.document.write('function print_win(){\n')
newwin.document.write('window.print();\n')
newwin.document.write('chkstate();\n')
newwin.document.write('}\n')
newwin.document.write('<\/script>\n')
newwin.document.write('</HEAD>\n')
newwin.document.write('<BODY onload="print_win()">\n')
newwin.document.write(str)
newwin.document.write('</BODY>\n')
newwin.document.write('</HTML>\n')
newwin.document.close()
}
//-->
</script>

		<style>
		
		
		
		</style>