﻿<?php
	require_once("includes/header.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="shortcut icon" href="images/ieee_merge.ico" />
	<title>WIE Affinity Group - IEEE SB IIIT Allahabad</title>
	
	<meta name="keywords" content="IEEE, IIITA, IIIT Allahabad, IEEE Students Branch, Engineering" />
	<meta name="description" content="Official Page of IEEE Students Branch of IIIT Allahabad." />
	
	<link rel="stylesheet" type="text/css" href="css/templatemo_style.css" />
	<link rel="stylesheet" type="text/css" href="css/ddsmoothmenu.css" />
	<link rel="stylesheet" type="text/css" href="css/slimbox2.css" media="screen" /> 
	<link rel="stylesheet" type="text/css" href="css/style.css" media="screen" /> 
	
	<script type="text/javascript" src="js/jquery-1.7.2.min.js" ></script>
	<script type="text/javascript" src="js/ddsmoothmenu.js"></script>
	<script type="text/JavaScript" src="js/slimbox2.js"></script>
	<script type="text/javascript" src="js/172.js"></script>
	<script type="text/javascript" src="js/1821.js"></script>
	<!--[if lte IE 8]>
	<script type="text/javascript" src="js/mootools.js"></script>
	<script type="text/javascript" src="js/selectivizr.js"></script>
	<![endif]-->
	<script type="text/javascript">
	ddsmoothmenu.init({
		mainmenuid: "templatemo_menu", //menu DIV id
		orientation: 'h', //Horizontal or vertical menu: Set to "h" or "v"
		classname: 'ddsmoothmenu', //class added to menu's outer DIV
		//customtheme: ["#1c5a80", "#18374a"],
		contentsource: "markup" //"markup" or ["container_id", "path_to_menu_file"]
	})
	</script>
	<script type="text/javascript">
	$(function() {
		$( "#accordion" ).accordion({
			autoHeight: false,
			navigation: true
		});
	});
	</script>
</head>
<body>

<div id="templatemo_wrapper">
	<a href="index.php"><img id = "site_title" src = "images/header.png" style = "height: 150px"></a>
	<div id="templatemo_header"><span class="header_border"></span>
		<div id="templatemo_menu" class="ddsmoothmenu">
            <ul>
					<li><a href="index.php" class="selected"><span></span>Home</a></li>
					<li><a href="#"><span></span>Office Bearers</a>
						<ul>
							<li><a href="faculty_advisors.php">Faculty Advisors</a></li>
							<li><a href="office_bearers.php">Office Bearers</a></li>
							<li><a href="Execom.php">ExCom Members</a></li>
							<li><a href="Student_Volunteers.php">Student Volunteers</a></li>
						</ul></li>
					<li><a href="#"><span></span>Chapters</a>
						<ul>
							<li><a href="ras_chapter.php">RAS (SBC14321A)</a></li>							
							<li><a href="cs_chapter.php">Computer Society (SBC14321B)</a><br/></li>
							<li><a href="sp_chapter.php">Signal Processing (SBC14321C)</a><br/></li>
							<li><a href="wie_chapter.php">WIE Affinity Group (SBA14321)</a><br/></li>
						</ul></li>
					<li><a href="IEEE_Student_Members.php"><span>Members</span></a>
					<li><a href="#"><span></span>Activities</a>
						<ul>
							<li><a href="event.php"><span></span>Events</a></li>
							<li><a href="reports.php"><span></span>Reports</a></li>
						</ul></li>					
					<li><a href="IEEE-Shop.php"><span></span>Shop</a></li>		
					<li><a href="download.php"><span></span>Downloads</a></li>					
				</ul>
				<br style="clear: left" />
        </div> <!-- end of templatemo_menu -->
        <div class="clear"></div>
    </div> <!-- END of header -->
    
    
    <div id="templatemo_main_content">
    	<div id="templatemo_sidebar">
		<div class="sidebar_content_box">
			<h3>IEEE Members</h3>
			<ul class="sidebar_gallery">
				<?php
					$imgs = 1;
					$check = array();
					while ($imgs <= 9) {
						    $qry = "SELECT * FROM student_team";
	                        $smt = $dbh->prepare($qry);
	                        $smt->execute();
	                        $rw = $smt->rowCount();
						    $rand_img = rand (1, $rw);
						    $rand_img = rand (11, 22);
						    while (in_array($rand_img, $check)) {
							  $rand_img = rand (1, $rw);
							  $rand_img = rand (11, 22);
					    }
					    array_push($check, $rand_img);
					    $p = "stu_images/member" . $rand_img . ".jpg";
					    $query2 = "SELECT member_id FROM student_image WHERE image_id = (SELECT image_id FROM image WHERE image_path = :path)";
					    $stmt2 = $dbh->prepare($query2);
					    $stmt2->bindParam(':path', $p, PDO::PARAM_STR);
					    $stmt2->execute();
					    $row = $stmt2->fetch(PDO::FETCH_ASSOC);
					    $member_id = $row['member_id'];
					    $num = 1;
					    $query2 = "SELECT member_id FROM student_team";
					    $stmt2 = $dbh->prepare($query2);
					    $stmt2->execute();
					    while ($r = $stmt2->fetch(PDO::FETCH_ASSOC)) {
						if ($member_id == $r['member_id']) {
						    break;
						}
						$num++;
					    }
					    $a = $num;
					    if ($num%10 == 0) {
						$num = $num / 10;
					    } else {
						$num = (int) ($num / 10) + 1;
					    }
				?>
			    <li><a href="<?php echo "student_team.php?page=" . urlencode($num) . "&id=" . urlencode($a) . "#" . $a; ?>"><img src="<?php echo $p; ?>"  /></a></li>
			    <?php
				$imgs++;
				}
			    ?>
			</ul>
			<div class="clear"></div>
		</div>
		<div class="sidebar_content_box">
			<a href="sponsors.pdf" download="Sponsorship Benefits and Categories"><img src="images/sp.png" style="width: 100%"></a>
		</div>
		<div class="sidebar_content_box ">
				<a href = "http://www.ieeer10.org/" target="_blank"><image src = "images/linksUp/ieeeRegion10.jpg" height = "50px" width = "65"></a>
				<a href = "http://ewh.ieee.org/r10/india_council/" target="_blank"><image src = "images/linksUp/ieee_india_council.png" height = "50px" width = "65px" style="margin-left:10px"></a>
				<a href = "http://www.ieeeup.org/"  target="_blank"><image src = "images/linksUp/ieee-up.png" height = "50px" width = "73px" style="margin-left:10px"></a>
		</div>
        </div>
        
               <div id="templatemo_content">

			<div id="accordion">
				
			<h2><a href="#">IEEE Women in Engineering (WIE) Affinity Group - IIITA (SBA14321) </a></h2>
				<div>
				<h3><a href="#">Office Bearers (2016-17) </a></h3>
					<table width="100%" border="0">
			            <tr>
					<td><img src="images/professional team/suvidha.jpg" width="100" height="100" style="border-radius:50%;"/></td>
			              <td><div><h5><b><a href="#">Suvidha Tripathi</a></b></h5></div>
			                Role : Chairperson<br>
					GSMIEEE: 92898083<br>
			               Email: suvitri24@gmail.com, Mob No: 9956667373<br>
			               PhD Research Scholar<br>
					</td>
			            </tr>
				     <tr>
					<td><img src="images/professional team/shantal.png" width="80" height="100" style=""/></td>
			              <td><div><h5><b><a href="#">Shantal Raj</a></b></h5></div>
			                Role : Secretary<br>
					GSMIEEE: 93930443<br>
			               Email: shantalraj72@gmail.com, Mob No: (+91)7054910846<br>
			               B.Tech ECE<br>
					</td>
			            </tr>
			          </table>
				</div>
				
			</div>
        	
			<div id="accordion">
				
			<h3><a href="#">Office Bearers (2015-16) </a></h3>
				<div>
					<table width="100%" border="0">
			            <tr>
						  <td>
							Monika Rani (RS139) (Chairperson)<br>
							Shweta (PSE2014001) (Vice Chair)<br>
							Ishani Mishra (IWM2015008) (Vice Chair)<br>
							Swarnima Singh Gautam (PSE2014003) (Secretary)<br>
							Ritika Motwani (IIT2015096) (Joint Secretary)<br>
							Priyanka Singhala (ISM2015004) (Treasurer)<br><br>
							
							<div><b>Other Members/Volunteers - </b></div>
							Surbhi Saraswat (IWC2014007)<br>
							Surabhi Saxena (ISE2014004)<br>
							Neha Gautam (IIS2014002)<br>
							Apurva Gupta (IEC2014091)<br>
							Smiti Maheshwari (IIT2014067)<br>
							Shantal Raj (IEC2014056)<br>
							Neha Oraon (IEC2015086)<br>
							Tanisha Keshari (IIT2015125)<br>
							Sheetal Parsa (LIT2015036)<br>
						  </td>
						</tr>
			          </table>
				</div>
				
			</div>
        </div> <!-- END of templatemo_content -->
        <div class="clear"></div>
    </div> <!-- END of templatemo_main_content -->
    
<!--
* Smooth Navigational Menu- (c) Dynamic Drive DHTML code library (www.dynamicdrive.com)
* This notice MUST stay intact for legal use
* Visit Dynamic Drive at http://www.dynamicdrive.com/ for full source code
-->
    <div id="templatemo_footer">
			Copyright © 2014, IEEE Student Branch IIIT Allahabad (Web: ieee.sb.iiita.ac.in; Email: ieee.sb@iiita.ac.in)
	    </div> <!-- END of templatemo_footer -->
</div> <!-- END of templatemo_wrapper -->
</body>

</html>
