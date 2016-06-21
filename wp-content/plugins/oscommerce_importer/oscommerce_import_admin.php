<?php 
global $wpdb;
if(isset($_POST['Submit']))
{
$title=$_POST['title'];
$shortdescription = $_POST['shortdescription'];
$longdescription = $_POST['longdescription'];
$startdate = $_POST['startdate'];
$enddate = $_POST['enddate'];
$attachment = $_POST['attachment'];
$status = $_POST['status'];
echo($status);
$wpdb->query( $wpdb->prepare( "INSERT INTO news( title, Shortdescription, longdescription ,startdate,enddate,attachment)
		VALUES ( %s, %s, %s,%s,%s,%s )", 
        array(
		$title, 
		$shortdescription, 
		$longdescription,
		$startdate,
		$enddate, 
		$attachment
		
	) 
) );

}

if(isset($_POST['Submit1']))
{
   $result= $wpdb->get_results('select * from news');
   $rowcount = $wpdb->num_rows;
   if($rowcount==0)
   {
     echo("There are no news ");
   }
   else 
   {
   ?>
   
       <div class="gridview">
	     <table width="70%" border="1">
		   <tr>
		       <td class="column"> Title </td>
			    <td class="column"> Short Description </td>
				 <td class="column"> Long Description </td>
				  <td class="column"> Start Date </td>
				   <td class="column"> End Date</td>
				    <td class="column"> Attachment </td>
					 <td class="column">  Status </td>
					  <td class="column">  Enable/Disable</td>
					    <td class="column">  Edit/Delete </td>
					  
		   </tr>
	

  <?php

foreach($result as $row) 
	 {
	 ?>
<tr>
	 <td>
	<?php
	    echo($row->title);
	?>
	 </td>
<td>
 <?php 
    echo($row->shortdescription);
 ?>
 </td>
<td>
<?php 
    echo($row->longdescription);
 ?>
</td>
<td>
<?php
     echo($row->startdate);
?>
</td>
<td>
<?php
      echo($row->enddate);
?>
</td>
<td>
<?php
      if($row->attachment == NULL)
	  {
	    echo("No Attachment");
	   }
	  else
	  {
	  echo($row->attachment);
	  }
?>
</td>
<td>
<?php
    if($row->status==E)
	   echo("Active");
	  else
	   echo("Inactive");
	
?>
</td>

<td>
<?php


echo '<b>'.$linktext.'</b><br> <a href="'.$weburl.'/wp-content/plugins/oscommerce_importer/newsedit.php?post='.$postid.'&action=edit" title="Edit">Edit</a><br/>';
?>
  <!--<select name="status" style="width:70px; margin-left:10px; border: 1px solid #c7d0d2;border-radius: 2px; box-shadow: inset 0 1.5px 2px rgba(190, 190, 190, .4), 0 0 0 5px #f5f7f8;">   
	  <option value="Enable" <?php if($row->status=='E') { echo "selected"; }?>> <?php echo Enable ?></option>
	   <option value="Disable" <?php if($row->status=='D') { echo "selected"; }?>> <?php echo Disable ?></option>
</select> 
-->


</td>
<td>
   <input type ="submit" name="submit" value="Edit" />
</td>
<?php
}}}
?>



<div class="wrap">
    <?php    echo "<h2>" . __( 'Shifa News and Events', 'oscimp_trdom' ) . "</h2>"; ?>
     
    <form name="oscimp_form" method="post" action="" onSubmit="return vaidateImage();>
        <input type="hidden" name="oscimp_hidden" value="Y">
        <?php    echo "<h4>" . __( 'Please fill all the required Fields' ) . "</h4>"; ?>
        <p style="font-weight:bold"><?php _e("Title: " ); ?><input type="text" name="title" value="" size="20" style="margin-left:80px;"><?php _e(" ex: Title of the post" ); ?></p>
        <p style="font-weight:bold"><?php _e("Short Description: " ); ?><input type="text" name="shortdescription" value="" size="20" ";><?php _e(" News Heading" ); ?></p>
        <p style="font-weight:bold"><?php _e("Long Description " ); ?><input type="text" name="longdescription" value="" size="20" style="margin-left:8px"><?php _e(" Long Description" ); ?></p>
        <p style="font-weight:bold"><?php _e("Start Date " ); ?><input type="datetime" name="startdate" value="" size="20" style="margin-left:49px;"><?php _e(" Start Date of the Post" ); ?></p>
        <p style="font-weight:bold"><?php _e("End Date: " ); ?><input type="datetime" name="enddate" value="" size="20" style="margin-left:52px;"><?php _e("End Date of the post" ); ?></p>
        <p style="font-weight:bold"><?php _e("Attachments: " ); ?><input type="file" name="attachment" id="attachment" value="" size="20" style="margin-left:28px;"><?php _e(" Any Attachments you want to be included" ); ?></p>
         
     
        <p class="submit">
        <input type="submit" name="Submit" value="<?php _e('Update News', 'oscimp_trdom' ) ?>" />
		<input type="submit" name="Submit1" value="<?php _e('View and Edit News', 'oscimp_trdom' ) ?>" />
        </p>
		
		
    </form>
	
	<?php
	function oscimp_getproducts() {
    //Connect to the OSCommerce database
    
}
	   
	
	
	
	?>
	
</div>