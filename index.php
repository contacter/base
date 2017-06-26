<!DOCTYPE html>
<html lang="en">
  <head>
  <?php include_once("analyticstracking.php") ?>
	<meta http-equiv="content-type" content="text/plain; charset=UTF-8"/>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Nemokama Lietuvos įmonių kontatų duomenų bazė">
    <meta name="author" content="Inforalis">
    <meta property="og:title" content="Nemokama Lietuvos įmonių kontatų duomenų bazė" />
	<meta property="og:type" content="web.page" />
	<meta property="og:url" content="http://inforalis.lt/dev" />
	<meta property="og:image" content="http://i3.alfi.lt/29351/71/32.jpg" />

    <title>Inforalis, nemokami įmonių kontaktai</title>

	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/album.css" rel="stylesheet">
	
	<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,700" rel="stylesheet">

	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.11.1/bootstrap-table.min.css">
	<link href="css/bootstrap-table-sticky-header.css" rel="stylesheet">

	<!-- Font awesome -->
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css" rel="stylesheet" />

	<!-- DATATABLES CSS -->
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs-3.3.7/jszip-3.1.3/pdfmake-0.1.27/dt-1.10.15/af-2.2.0/b-1.3.1/b-flash-1.3.1/b-html5-1.3.1/fh-3.1.2/r-2.1.1/sc-1.4.2/se-1.2.2/datatables.min.css"/>

	<!-- jQuery UI theme, here I use "flick" -->
	<link rel="stylesheet" href="https://code.jquery.com/ui/1.10.4/themes/flick/jquery-ui.css">

	<!-- CUSTOM CSS -->
	<link href="css/custom.css" rel="stylesheet">

	<!-- Cookies notification -->
    <link href="css/cookies-message.min.css" rel="stylesheet">

<!--  
    <link rel="stylesheet" href="css/ion.rangeSlider.css" />
    <link rel="stylesheet" href="css/ion.rangeSlider.skinFlat.css" />
 -->
	<!-- Google Analytics -->
	<script>
	(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

	ga('create', 'UA-XXXXX-Y', 'auto');
	ga('send', 'pageview');
	</script>
	<!-- End Google Analytics -->

 </head>

  <body>

    <!-- Navigation -->
<!--     <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation" style="background-color: #f2f2f2;">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Navigacija</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Logo</a>
            </div>

            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                <li>
                        <a href="#">Veikla</a>
                    </li>
                    <li>
                        <a href="#">Kontaktai</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav> -->

    <!-- Full Width Image Header with Logo -->
    <!-- Image backgrounds are set within the full-width-pics.css file. -->
    <header class="image-bg-fluid-height">
        
			<?php 
			include 'db.php'; 
		  	 //get number of rows
		    $queryNum = $conn->query("SELECT COUNT(*) as postNum FROM joined");
		    $resultNum = $queryNum->fetch_assoc();
		    $rowCount = $resultNum['postNum'];
		    ?>
		      <div class="container banner" style="padding-top: 50px;">
		      	<h1>Didžiausias nemokamas Lietuvos įmonių katalogas</h1>
		      	<span class="highlight"><?php echo number_format($rowCount);?></span> 
			      	<div class="highlight" style="padding-bottom: 50px;"> 
			      		<h4> telefonai, el. paštai ir kita informacija </h4>
			      	</div>
		      </div>

    </header>

  
<div class="body-wrapper">
   <div class="post-search-panel">
		<div class="row">
			<div class="col-xs-9 col-sm-9 col-md-6 col-lg-4">
				<h4>Įveskite paieškos tekstą</h4>
				<input class="form-control" type="text" id="keywords" placeholder="pvz. logistikos paslaugos""/>
			</div>
			<div class="col-md-3 col-lg-3 hidden-xs hidden-sm" style="padding-top: 35px;">
				<div class="dropdown">
	    			<div id="buttons"></div>
	    		</div>
			</div>
		</div>
	

		<div class="row">
			<div class="col-xs-9 col-sm-9 col-md-9 col-lg-2">
				<h4>Paisrinkite miestą</h4>
				 <select data-column="1" id="search-input-select" class="form-control">
		            <option value="" style="font-weight: bold;">VISI MIESTAI</option>
		            <option disabled="disabled">-----------</option>
		            <option value="VILNIUS" style="font-weight: bold;">VILNIUS</option>
		            <option value="KAUNAS" style="font-weight: bold;">KAUNAS</option>
		            <option value="KLAIPĖDA" style="font-weight: bold;">KLAIPĖDA</option>
		            <option value="ŠIAULIAI" style="font-weight: bold;">ŠIAULIAI</option>
		            <option value="PANEVĖŽYS" style="font-weight: bold;">PANEVĖŽYS</option>
		            <option value="ALYTUS" class="select-hr" style="font-weight: bold;">ALYTUS</option>
		            <option disabled="disabled">-----------</option>
		              <?php include 'db.php'; 
		               //get number of rows
		              $unique = $conn->query("SELECT DISTINCT miestas FROM joined WHERE miestas NOT IN ('VILNIUS', 'KAUNAS', 'KLAIPĖDA' , 'ŠIAULIAI', 'PANEVĖŽYS', 'ALYTUS') ORDER BY miestas ASC");
		             // echo "<option value=''>Visi miestai</option>";
		                while($row = $unique->fetch_assoc()){
		                    $rows = $row['miestas'];
		                     echo '<option value="'.$row['miestas'].'">'.$row['miestas'].'</option>';
		                }
		              ?>
          </select>
			</div>
		<!-- 	<div class="col-xs-9 col-sm-9 col-md-9 col-lg-2">
				<h4>Įmonių rūšiavimas</h4>
				<select class="form-control" id="sortBy" onchange="searchFilter()">
			        <option value="desc">&#xf038; Z iki A</option>
			        <option value="asc">&#xf036; A iki Z</option>
			    </select>
			 </div>
			<div class="col-xs-9 col-sm-9 col-md-9 col-lg-2" style="padding-top: 35px;">
				<button class="dropbtn" id="resetButton" style="background-color: #3FA7D6;">Panaikinti filtrą</button>
			 </div> -->
		</div>

<!-- 		<div class="row">
			<div class="col-xs-9 col-sm-9 col-md-9 col-lg-2">
				<h4>Yra el. paštas?</h4>
				<select class="form-control" id="isEmail" onchange="searchFilter()">
			        <option value="">Taip</option>
			        <option value="1">Visi</option>
			    </select>
			</div>

		</div> -->

	</div> <!-- End post-search-panel -->
</div> <!-- End body-wrapper -->

<div id="posts_content">
    
    <?php
 
    //Include database configuration file
    include('db.php');
    /*$limit = 10;*/
 	
    //get rows
    $query = $conn->query("SELECT id, miestas, imone, imoneskodas, vadovas, adresas, tel, email, web, ivertinimas_bal, ivertinimas_sk, darbuotojai, sodra, apyvarta, veikla FROM joined");
    ?>
	      <div class="posts_list">
			<table id="table_grid" class="table table-condensed table-hover" style="font-size: 12px;">
		        <thead>
		            <tr>
		            	<th>ID</th>
		            	<th>Miestas</th>
		            	<th>Veikla</th>
		            	<th>Įmonė</th>
		            	<th>Įmonės kodas</th>
		            	<th>Vadovas</th>
	      				<th>Adresas</th>
	      				<th>Telefonas</th>
	      				<th>El. paštas</th>
	      				<th>Tinklapis</th>
	      				<th>Balas</th>
	      				<th>Įvertinimų sk.</th>
	      				<th>Personalas</th>
	      				<th>Skola (sodra)</th>
	      				<th>Apyvarta</th>
		            </tr>
		        </thead>

		    </table>

      </div> <!-- END posts_list -->
    </div> <!-- END posts_content -->

	<!-- Back To Top -->
	<a id="back-to-top" href="#" class="btn btn-primary btn-lg back-to-top" role="button" data-placement="left"><span class="glyphicon glyphicon-chevron-up icon-success"></span></a>

</div> <!-- END body-wrapper -->

	<div class="col-section-header">
		Duomenų bazės apibendrinimas
	</div>
			<?php
			    $qEmail = $conn->query("SELECT COUNT(*) as n1 FROM joined where email != ''");
			    $resEmail = $qEmail->fetch_assoc();
			    $email_count = $resEmail['n1'];
				
				$qTel = $conn->query("SELECT COUNT(*) as n2 FROM joined where tel != ''");
			    $resTel = $qTel->fetch_assoc();
			    $tel_count = $resTel['n2'];

				$qWeb = $conn->query("SELECT COUNT(*) as n3 FROM joined where web != ''");
			    $resWeb = $qWeb->fetch_assoc();
			    $web_count = $resWeb['n3'];

				$qBoss = $conn->query("SELECT COUNT(*) as n4 FROM joined where vadovas != ''");
			    $resBoss = $qBoss->fetch_assoc();
			    $boss_count = $resBoss['n4'];

/*
				$qCity = $db->query("SELECT COUNT(*) as n4 FROM joined where vadovas != ''");
			    $resBoss = $qBoss->fetch_assoc();
			    $boss_count = $resBoss['n4'];

				$qBoss = $db->query("SELECT COUNT(*) as n4 FROM joined where vadovas != ''");
			    $resBoss = $qBoss->fetch_assoc();
			    $boss_count = $resBoss['n4'];*/
		    ?>
	  <div class="col-section">
		<div class="col-xs-6 col-sm-3">
			<h4><span class="stats_digits"><?php echo number_format($email_count);?></span> </h4>
			<div class="stat_label"> el. paštai </div>
		</div>
		<div class="col-xs-6 col-sm-3">
			<h4><span class="stats_digits"><?php echo number_format($tel_count);?></span> </h4>
			<div class="stat_label"> telefonai </div>
		</div>
		<div class="col-xs-6 col-sm-3">
			<h4><span class="stats_digits"><?php echo number_format($web_count);?></span> </h4>
			<div class="stat_label"> interneto svetainės </div>
		</div>
		<div class="col-xs-6 col-sm-3">
			<h4><span class="stats_digits"><?php echo number_format($boss_count);?></span> </h4>
			<div class="stat_label"> vadovai </div>
		</div>

<!-- 		<div class="col-lg-6 col-xs-12 col-sm-12 col-lg-offset-3" style="padding-top: 25px; padding-bottom: 55px;">
			<div class="stat_header" style="color:#f2f2f2; background-color: #2c3e50; padding-top: 25px;">
			<h4 style="font-size: 35px; font-weight: bold; padding-bottom: 25px;">Detali duomenų bazės statistika</h4>

			
					<div class="col-sm-12" style="background-color: #2c3e50;">
						<div class="col-xs-12">
							<h4 style="text-align: left;">Miestai: 57</h4>
						</div>
						<div class="col-xs-12">
							<h4>Miestai: 57</h4>
						</div>
						<div class="col-xs-12">
							<h4>Miestai: 57</h4>
						</div>
					</div>
				
			</div>
		</div> 
 -->
		</div>
	  </div>


	<div class="col-footer-container">
	  <div class="col-footer">
	  	<h3>Daugiau info</h3>
	  	<p><a href="#" target='_blank'>Facebook</a></p>
	    <p><a href="#" target='_blank'>Git</a></p>
	  </div>

	  <div class="col-footer">
	  	<h3>Rėmėjai</h3>
	  	<p><a href="http://www.delfi.lt/" target='_blank'>DELFI.lt</a></p>
	  	<p><a href="https://www.15min.lt/" target='_blank'>15min.lt</a></p>
	  	<p><a href="http://www.verocafe.lt/" target='_blank'>verocafe.lt</a></p>
	  	<p><a href="http://coffee-inn.com/" target='_blank'>coffee-inn.com</a></p>
	  </div>

	  <div class="col-footer">
	  	<p><a href="#" target='_blank'>Privatumo politika</a></p>
	  	<p><a href="#" target='_blank'>Naudojimo taisyklės</a></p>
	  </div>

	</div>

	<div class="col-footer-container-slim">
		Visos teisės saugomos © 2017 Inforalis
	</div>

	<!-- JQuery -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

	<!-- DataTables -->
	<script type="text/javascript" src="https://cdn.datatables.net/v/bs-3.3.7/jszip-3.1.3/pdfmake-0.1.27/dt-1.10.15/af-2.2.0/b-1.3.1/b-flash-1.3.1/b-html5-1.3.1/fh-3.1.2/r-2.1.1/sc-1.4.2/se-1.2.2/datatables.min.js"></script>
	
	
	<script src="js/jquery.counterup.min.js"></script>
	<script src="js/jquery.waypoints.min.js"></script>

	<!-- Cookies notification -->
    <script src="js/cookies-message.min.js"></script>

	<!-- Cookies -->
	<script type="text/javascript">
        $(document).ready(function() {
        $.CookiesMessage({
                    messageText: "Norėdami Jums suteikti aukščiausio lygio paslaugas ir pateikti personalizuotą interneto svetainės turinį, naudojame slapukus ('Cookies'). Daugiau informacijos Veikla slapukus rasite čia",
                    messageBg: "#151515",                               // Message box background color
                    messageColor: "#FFFFFF",                        // Message box text color
                    messageLinkColor: "#F0FFAA",                // Message box links color
                    closeEnable: true,                                  // pagesize the close icon
                    closeColor: "#444444",                          // Close icon color
                    closeBgColor: "#000000",                        // Close icon background color
                    acceptEnable: true,                                 // pagesize the Accept button
                    acceptText: "Sutikti ir uždaryti",              // Accept button text
                    infoEnable: true,                                       // pagesize the More Info button
                    infoText: "Daugiau",                            // More Info button text
                    infoUrl: "http://inforalis.lt/sutartis.html",                                               // More Info button URL
                    cookieExpire: 180                                   // Cookie expire time (days)
                });

        });
    </script>

	
	<!-- Subseting data -->
	<script>
		$( document ).ready(function() {
  			var dataTable = $('#table_grid').DataTable({   
			 "searching": true,
             "processing": true,
             "oLanguage": {
             	"sProcessing": "Kraunasi duomenys...",
             	"buttons": {
				      "copyTitle": 'Nukopijuota',
				      "copySuccess": {
				          _: '%d rez.',
				          1: '1 rez.'
				    }
				},
				"sInfo": "Rodoma _START_ - _END_ įmonė iš _TOTAL_ įmonių",
				"sInfoEmpty": "Rodoma 0 - 0 įmonių iš _TOTAL_ įmonių",
				"sInfoFiltered": "(vykdant paiešką tarp _MAX_ įmonių)",
				"sLengthMenu": "Rodoma po _MENU_ įmonių",
				"sZeroRecords": "Pagal šią užklausą įmonių nerasta",
				"oPaginate": {
					"sNext": "Pirmyn",
					"sPrevious": "Atgal"
				}
              },



			"language": {
			    
			  },	
             "bProcessing": true,
             "serverSide": true,
             "responsive": true,
             "dom": 'Blfrtip',
          
             "buttons": [
              ],

             "lengthMenu": [[10, 50, 200, 500], [10, 50, 200, 500]],
             
           "ajax":{
              url :"fetch_data.php", // json datasource
              type: "POST",  // type of method  , by default would be get
              error: function(){  // error handling
                $(".employee-grid-error").html("");
                $("#employee-grid").append('<tbody class="employee-grid-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
                $("#employee-grid_processing").css("display","none");
                
              }
            }
          });

	      
		var buttons = new $.fn.dataTable.Buttons(dataTable, {
		     buttons: [
		       'copyHtml5',
		       'excelHtml5',
		       'csvHtml5',
		       'pdfHtml5'
		    ]
		}).container().appendTo($('#buttons'));

		/*	SEARCH  */
		oTable = $('#table_grid').DataTable();
		$('#keywords').keyup(function(){
		      oTable.search($(this).val()).draw() ;
		})

	    /*	MIESTAI  */
	    $('#search-input-select').on( 'change', function () {   // for Miestai dropdown
            var i =$(this).attr('data-column');  
            var v =$(this).val();  
            dataTable.columns(i).search(v).draw();
	    } );

		/*	STYLE EXPORT BUTTON   */
	    $("a.buttons-copy, a.buttons-csv, a.buttons-excel, a.buttons-pdf").css({"background":"#FE4949", "font-weight":"bold", "color":"#f2f2f2"}); 
	    $("a.buttons-copy:hover, a.buttons-csv:hover, a.buttons-excel:hover, a.buttons-pdf:hover").css({"background":"#a2a2a2", "font-weight":"bold", "color":"#a2a2a2"});

  	});
	</script>


	<!-- Back to top -->
	<script type="text/javascript">
		$(document).ready(function(){
	     $(window).scroll(function () {
	            if ($(this).scrollTop() > 50) {
	                $('#back-to-top').fadeIn();
	            } else {
	                $('#back-to-top').fadeOut();
	            }
	        });
	        // scroll body to 0px on click
	        $('#back-to-top').click(function () {
	            $('#back-to-top').tooltip('hide');
	            $('body,html').animate({
	                scrollTop: 0
	            }, 800);
	            return false;
	        });
	        
	        $('#back-to-top').tooltip('pagesize');

	});
	</script>

	<!-- Range slider -->

	<!-- Sortable Table Columns -->


  </body>
</html>
