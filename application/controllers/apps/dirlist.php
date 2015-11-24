<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>AA Planetica</title>
<style type="text/css">
body {
	background-position: center center;
	width: auto;
	clear: both;
	float: none;
	position: static;
	overflow: visible;
	z-index: auto;
	margin-top: -38px;
	margin-right: 5px;
	margin-bottom: 5px;
	margin-left: 5px;
	padding-top: -5px;
	padding-right: 5px;
	padding-bottom: 5px;
	padding-left: 5px;
}
tr {
	border: 3px double #333;	
}
table {
	border: 5px double #000;
	background-color: #CCC;
}
td {
	border: 2px solid #666;
}
a {
	font-family: "MS Serif", "New York", serif;
	background-repeat: no-repeat;
	color: #003;
	text-transform: capitalize;
	text-decoration: blink;
	float: none;
	position: relative;
}
p {
	font-family: "Times New Roman", Times, serif;
	font-size: 36px;
	font-weight: bolder;
	font-style: normal;
	line-height: normal;
	color: #300;
	background-color: #09F;
}
.aa {
	font-weight: bolder;
}
.footer {
	font-size: 12px;
	color: #003;
}

.menu {
	width: 100px;
	background-color: #666666;
	text-align: center;
	font-weight: bolder;
}

.menu:hover {
	width: 100px;
	background-color: #0099FF;
	text-align: center;
	color: #FFF;
}

.menua {
	width: 100px;
	background-color: #0099FF;
	text-align: center;
	color: #FFF;
	font-weight: bolder;
}


a {
	text-decoration: underline;
	//color: #0099FF;
}



/*a:hover {

	text-decoration: none;

	color: #F40C42;

}*/

</style>
</head>
<body>
<div><p align="center">Welcome</p>
  <table align="center" width="Auto" height="36" border="1">
    <tr>
      <td class="menua"><a href="index.php">Home</a></td>
      <td class="menu"><a href="http://wp.aa.sitex.us/" target="_blank">Portfolio</a></td>
      <td class="menu"><a href="http://jml.aa.sitex.us/" target="_blank">1st Joomla</a></td>
      <td class="menu"><a href="http://aapf.tk/1st-dynamic-fw/dynamic" target="_blank">Dynamic</a></td>
      <td class="menu"><a href="http://aapf.tk/jml/pg" target="_blank">Photography</a></td>
      <td class="menu"><a href="http://www.get2gether.tk" target="_blank">Get2Gether</a></td>
      <td class="menu"><a href="http://www.planetica.tk" target="_blank">Planetica</a></td>
      <td class="menu"><a href="http://www.talentsbd.tk" target="_blank">TalentsBD</a></td>
      <td class="menu"><a href="http://www.planetica.tk/leomessi/" target="_blank">Lio Messi</a></td>
    </tr>
  </table>
<br />
</div>

<div>
<?PHP
# The current directory
$directory = dir("./");

# If you want to turn on Extension Filter, then uncomment this:
### $allowed_ext = array(".sample", ".png", ".jpg", ".jpeg", ".txt", ".doc", ".xls"); 




## Description of the soft: list_dir_files.php  
## Major credits: phpDIRList 2.0 -(c)2005 Ulrich S. Kapp :: Systemberatung ::

$do_link = TRUE; 
$sort_what = 0; //0- by name; 1 - by size; 2 - by date
$sort_how = 0; //0 - ASCENDING; 1 - DESCENDING


# # #
function dir_list($dir){ 
    $i=0; 
    $dl = array(); 
    if ($hd = opendir($dir))    { 
        while ($sz = readdir($hd)) {  
            if (preg_match("/^\./",$sz)==0) $dl[] = $sz;$i.=1;  
        } 
    closedir($hd); 
    } 
    asort($dl); 
    return $dl; 
} 
if ($sort_how == 0) { 
    function compare0($x, $y) {  
        if ( $x[0] == $y[0] ) return 0;  
        else if ( $x[0] < $y[0] ) return -1;  
        else return 1;  
    }  
    function compare1($x, $y) {  
        if ( $x[1] == $y[1] ) return 0;  
        else if ( $x[1] < $y[1] ) return -1;  
        else return 1;  
    }  
    function compare2($x, $y) {  
        if ( $x[2] == $y[2] ) return 0;  
        else if ( $x[2] < $y[2] ) return -1;  
        else return 1;  
    }  
}else{ 
    function compare0($x, $y) {  
        if ( $x[0] == $y[0] ) return 0;  
        else if ( $x[0] < $y[0] ) return 1;  
        else return -1;  
    }  
    function compare1($x, $y) {  
        if ( $x[1] == $y[1] ) return 0;  
        else if ( $x[1] < $y[1] ) return 1;  
        else return -1;  
    }  
    function compare2($x, $y) {  
        if ( $x[2] == $y[2] ) return 0;  
        else if ( $x[2] < $y[2] ) return 1;  
        else return -1;  
    }  

} 

################################################## 
#    We get the information here 
################################################## 

$i = 0; 
while($file=$directory->read()) { 
    $file = strtolower($file);
    $ext = strrchr($file, '.');
    if (isset($allowed_ext) && (!in_array($ext,$allowed_ext)))
        {
            // dump 
        }
    else { 
        $temp_info = stat($file); 
        $new_array[$i][0] = $file; 
        $new_array[$i][1] = $temp_info[7]; 
        $new_array[$i][2] = $temp_info[9]; 
        $new_array[$i][3] = date("F d, Y", $new_array[$i][2]); 
        $i = $i + 1; 
        } 
} 
$directory->close(); 

################################################## 
# We sort the information here 
################################################# 

switch ($sort_what) { 
    case 0: 
            usort($new_array, "compare0"); 
    break; 
    case 1: 
            usort($new_array, "compare1"); 
    break; 
    case 2: 
            usort($new_array, "compare2"); 
    break; 
} 

############################################################### 
#    We display the infomation here 
############################################################### 

$i2 = count($new_array); 
$i = 0; 
echo "<table align=center border=1> 
                <tr> 
                    <td class=aa width=150> File name</td> 
                    <td class=aa width=100> File Size</td> 
                    <td class=aa width=100>Last Modified</td> 
                </tr>"; 
for ($i=0;$i<$i2;$i++) { 
    if (!$do_link) { 
        $line = "<tr><td align=left>" .  
                        $new_array[$i][0] .  
                        "</td><td align=left>" .  
                        number_format(($new_array[$i][1]/1024)) .  
                        "k"; 
        $line = $line  . "</td><td align=left>" . $new_array[$i][3] . "</td></tr>"; 
    }else{ 
        $line = '<tr><td align=left><A HREF="' .   
                        $new_array[$i][0] . '">' .  
                        $new_array[$i][0] .  
                        "</A></td><td align=left>"; 
        $line = $line . number_format(($new_array[$i][1]/1024)) .  
                        "k"  . "</td><td align=left>" .  
                        $new_array[$i][3] . "</td></tr>"; 
    } 
    echo $line; 
} 
echo "</table>"; 


?>

</div>
<br />
<p class=footer align="center"> <br> © 2013 <a href="http://wp.aa.sitex.us">AA Planetica</a>. <br /><br /> </p>
</body>
</html>
