<?php  require_once('../include/db_connection.php');  ?>
<?php  require_once('../include/function.php');?>
<?php  require_once('../include/layout/header.php');  ?>
    
	<?php
	    if(isset($_GET["subject"]))
		{
			$selected_subject_id  = $_GET["subject"];
			$display_subject      = Display_subject_data($selected_subject_id);
			$selected_page_id     = null;
			$display_page         = null;
		}
		elseif(isset($_GET["page"]))
		{
			$selected_page_id    = $_GET["page"];
			$display_page        = Display_page_data($selected_page_id);
			$selected_subject_id = null;
			$display_subject     = null;
		}
		else
		{
			$selected_subject_id = null;
			$selected_page_id    = null;
			$display_subject     = null;
			$display_page        = null;
		}
	?>

                     <!-- navigation -->
<div id="main">
  <div id="navigation">
    <ul class ="subjects">  
				     <!-- select query for subjects-->
<?php 
	    $sql = "SELECT* From subjects";
	    $subject_set = mysqli_query($connection,$sql);
	    if(! $subject_set)
		{
		    die ("query failed");
		} 
    while($subject = mysqli_fetch_assoc($subject_set))
    {
    ?>
	<br />
	                <!-- break li -->
					
	    <?php echo "<li "; ?>
		
		<?php if($selected_subject_id==$subject["id"])echo "class = \"selected\" "; ?>
		
		<?php echo " >" ; ?>
		
	        <a href="manage_content.php?subject=<?php echo $subject["id"]; ?>"> <?php echo $subject["menu_name"]."(" .$subject["id"] . ")"; ?></a>
        	
		        <ul class = "pages">
                                     <!-- select query for pages-->		
	                    <?php 
	                            $sql = "SELECT* From pages WHERE subject_id={$subject["id"]}";
	                            $page_set = mysqli_query($connection,$sql);
	                            if(! $page_set)
						        {
		                            die ("query failed");
	                            }
						        while($page = mysqli_fetch_assoc($page_set))
						        {
									
	                    ?>
						<br />
						        <!-- break li for pages -->
			                        <?php echo "<li "; ?>
									<?php if($selected_page_id == $page["id"]) echo "class = \"selected\" "; ?>
									<?php echo " >" ; ?>
								        <a href="manage_content.php?page=<?php echo $page["id"]; ?> "><?php echo $page["menu_name"]."(" .$page["id"] .") "; ?> </a>
                                    
									</li>
						  <?php } ?>
						  <?php mysqli_free_result ($page_set) ?>
				</ul>
		</li>
	<?php } ?>
    <?php mysqli_free_result($subject_set) ?>
</ul>
</br>
<a href= "new_subject.php" ><u> +Add New Subject </u></a>
</div>

<div id="page">
         <h2> Manage Content </h2>
		 <br>
		 <hr/>
		 <?php if( $display_subject ) { ?>
	     <h2> Manage Subject </h2>
		 <h4>       
		              Subject ID:   <?php  echo $display_subject["id"];         ?>   <br><br>
		            Subject Name:   <?php  echo $display_subject["menu_name"];  ?>   <br><br>
		                position:   <?php  echo $display_subject["position"];   ?>   <br><br>
					  visibility:   <?php    if($display_subject["visible"] == 1)
					{
						echo "Yes";
					}else{
						echo "No";
					}
		 
		  ?> <br />
	      </h4>
		  <hr />
		 <?php } elseif($display_page) { ?>
		 <h2> Manage Page </h2>
		 <h4>
		              Page ID:     <?php echo $display_page["id"];                 ?> <br><br>
		            Page Name:     <?php echo $display_page["menu_name"];          ?> <br><br>
		             Position:     <?php echo $display_page["position"];           ?> <br><br>
		           Visibility:     <?php   if($display_page["visible"] == 1 )
				   {
                        echo "Yes";
				   }else{
                        echo "No";
				   }
        ?><br>
        </h4>
		 <?php } else{ 
		            echo "select any subject or page";
		 }
		 ?>		
</div>
</div>
<?php require_once('../include/layout/footer.php'); ?>