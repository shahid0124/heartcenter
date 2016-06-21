<?php
remove_all_actions('__header');
add_filter('tc_credits_display', 'my_custom_credits');
function my_custom_credits(){ ?>

<p style="float:left ; margin-left:0px;"> &#169;<?php echo date('Y');?> Shifa International Hospitals, Ltd., Islamabad Pakistan. All Rights Reserved.</p> 
<?php

}

add_filter('__before_logo', 'info_line');
function info_line(){ 
?>
<div class="container">
<div class="taginfo">
     <div class="row">
    <div class="col-md-1" style="background-color: rgb(214,236,255);">
        <img class="siteinfomail" src="http://localhost/wordpress/wp-content/uploads/2015/12/index-1-e1451549208902.png" alt="mail">
        <a href="mailto:info@shifa.com.pk" style="font-size:13px; float:left ; margin-left:5px; margin-top:6px; font-style:normal; color:#555;font-family: sans-serif;">:  info@shifa.com.pk</a>

     <img class="siteinfopn" src="http://localhost/wordpress/wp-content/uploads/2015/12/phone.jpg" alt="Phone:">
	<p style=" font-family:sans-serif;
	font-size: 13px;
	line-height: 20px;
	color: #555; 
      
        height:13px;
        float:left;
        margin-left:1%;
        margin-top:6px;">:+92-51-846-4646 </p>
     
</div>
</div>
</div>
</div>
<?php 
}

add_filter('tc_opt_tc_sticky_header', 'disable_sticky_in_mobiles');
function disable_sticky_in_mobiles( $bool ){
  return $bool && ! wp_is_mobile();    
}

/*
add_filter( 'tc_tagline_display' , 'my_icon_in_tagline');

function my_icon_in_tagline() {
	global $wp_current_filter;
	?>
		<?php if ( !in_array( '__navbar' , $wp_current_filter ) )  :?>
			<div class="container outside">
		        <h2 class="site-description">
		        <img src="http://localhost/wordpress/wp-content/uploads/2015/12/index-1.png"  style="width:5px; height:5px;" "alt="mail">
			//<?php bloginfo( 'description' ); ?>

		        </h2>

		    </div>
		<?php else : //when hooked on __navbar ?>
			<h2 class="span7 inside site-description" style="background:rgb(214,236,255)">
			<img src="http://localhost/wordpress/wp-content/uploads/2015/12/index-1-e1451549208902.png" style="font-family:sans-serif;
	font-size: 13px;
	line-height: 20px;
	color: #555; width:20px; height:15px ;float:left; margin-left:890px; margin-top:8px;" alt="mail">
			<a href="mailto:info@shifa.com.pk" style="font-size:13px; float:left ; margin-left:5px; margin-top:6px; font-style:normal; color:black;">:  info@shifa.com.pk</a>

<img src="http://localhost/wordpress/wp-content/uploads/2015/12/phone.jpg" style="font-family:sans-serif;
	font-size: 13px;
	line-height: 20px;
	color: #555; width:20px; height:15px ;float:left; margin-left:52px; margin-top:8px;" alt="mail">
	<p style="color:black; float:left; font-size:13px; font-style:normal; margin-top:6px; margin-left:5px;">:  +92-51-846-4646 </p>


			<?php bloginfo( 'description' ); ?>
	        </h2>

		<?php endif; ?>
	<?php
}
*/
add_action( '__before_main_container' , 'print_master_slider', 1 );
function print_master_slider(){
    //$page= get_the_ID('home');
    if((is_home() || is_front_page()) == true)
    {
    ?>
<div class="om-contact-us-link">
    <ahref="#" style="color:#fff;font-size:11px;font-weight:bold;"> </a>
    <div style="width: 100%">    
        <div style="float:left; width:35%">
            <img alt="Heart Center" src="/heartcenter/images/heart-check.png"></img>
            <div style="float:left;width:132%; background-color:#00539b;margin-top:-54px;padding:5px;border-radius:2px; margin-left: 56px;">
                Heart Risk <br> Calculator
            </div>
        </div>
    </div>
</div>

               
    <div class="container">
                   
        <div class="row"> 
                       <div class="col-md-4">
                           
                           <div class="rowafterslider">
                            <div class="hservice">
                                <div class="service-description text-center">
                                    <div class="button log-in-button" style="">
                                        <a href="#"><img class="image" src="/heartcenter/images/doctor-n.png" alt="Link to this page"></a> 
                                        <a class="heading" href="#"> <h5> Find A Doctor </h5></a>
                                    </div>
                                </div>
                                </div>
                            </div>
                           
                           
                       <div class="rowafterslider">
                            <div class="hservice">
                                <div class="service-description text-center">
                                    <div class="button log-in-button" style="">
                                         <a href="#"><img class="image" src="/heartcenter/images/app.png" alt="Link to this page"></a> 
                                          <a class="heading" href="#"> <h5> Appointment </h5></a>
                                    </div>
                                </div>
                                </div>
                            </div>
                        
                        
                         <div class="rowafterslider">
                            <div class="hservice">
                                <div class="service-description text-center">
                                    <div class="button log-in-button" style="">
                                        <a href="#"><img class="image" src="/heartcenter/images/pat.png"  alt="Link to this page"></a> 
                                        <a class="heading" href="#"> <h5> Refer Patient </h5></a>
                                    </div>
                                </div>
                                </div>
                            </div>
                        
                     <div class="rowafterslider">
                            <div class="hservice">
                                <div class="service-description text-center">
                                    <div class="button log-in-button" style="">
                                         <a href ="#"><img class="image" src="/heartcenter/images/medical_reports.png" alt="Link to this page"></a> 
                                         <a class="heading" href="#"> <h5> Patient Guide </h5></a>
                                    </div>
                                </div>
                                </div>
                            </div>
                        
                    <div class="rowaftersliderlast">
                            <div class="hservice">
                                <div class="service-description text-center">
                                    <div class="button log-in-button" style=" ">
                                         <a href ="#"><img class="imagelast" src="/heartcenter/images/index.jpg" style="width:30px; height: 35px; margin-top:3%; " alt="Link to this page"></a> 
                                         <a class="headinglast" href="#"> <h5> Health Professionals </h5></a>
                                    </div>
                                </div>
                                </div>
                            </div>
                    
                        
                             
                       </div>
                       
                       
                       
        </div>
        <div class="row">
                       <div class="col-md-5">
                           <?php
                               newsticker( $group = "", $title = "", $direction = "", $type = "", $pause = "", $speed = "" );
                            ?>
                       </div>
                     
            <div class="col-md-6">
                           <div class="servicesfirstline">
                                
                                    <div class="serviceheading1">
                                    <a href="#"><img class="serviceimage" src="/heartcenter/images/service1.jpg"  alt="Link to this page"></a> 
                                    <a class="serviceheading" href="#"> <h5> Service Heading1 </h5></a>
                                    </div>
                                     <div class="serviceheading2">
                                     <a href="#"><img class="serviceimage" src="/heartcenter/images/service3.jpg"  alt="Link to this page"></a> 
                                     <a class="serviceheading" href="#"> <h5> Service Heading 2 </h5></a>
                                    </div>
                               <div class="serviceheading3">
                        <a href="#"><img class="serviceimage" src="/heartcenter/images/service5.jpg" alt="Link to this page"></a> 
                             <a class="serviceheading" href="#"> <h5> Service Heading 3 </h5></a>
                        </div>
                                    
                                   
                        </div>
                           
               <div class="servicessecondline">   
                            
                        <div class="serviceheading4">
                        <a href="#"><img class="serviceimage" src="/heartcenter/images/service5.jpg" alt="Link to this page"></a> 
                             <a class="serviceheading" href="#"> <h5> Service Heading 4 </h5></a>
                        </div>
              
                      <div class="serviceheading5">
                        <a href="#"><img class="serviceimage" src="/heartcenter/images/service6.jpg"  alt="Link to this page"></a> 
                             <a class="serviceheading" href="#"> <h5> Service Heading 5 </h5></a>
                        </div>  
                   <div class="serviceheading6">
                        <a href="#"><img class="serviceimage" src="/heartcenter/images/service6.jpg"  alt="Link to this page"></a> 
                             <a class="serviceheading" href="#"> <h5> Service Heading 6 </h5></a>
                        </div>  

                        
                </div>
                
               
                       </div>    
                       
        <div class="consultantwrapper">
            <div class="col-md-6">
                
                       <div class="panel panel-default">
                                    <div class="panel-heading"> <span class="glyphicon glyphicon-list-alt"></span><b>Consultants</b></div>
                                    <div class="panel-body" style="height:163px;">
                                        
                                    <div class="row">
                                    <div class="col-xs-11">
                                    <ul class="demo3">
                                        <li class="news-item" style="height:160px;"> 
                                        <table cellpadding="4">
                                            <tr class="consultantdetails" style="height:170px;">
                                                <td><img class="consultantimage" src="images/1.jpg" width="150px" style="float:left;  height: 137px;">
                                                    <a class="consultantname" href="#" style="float: left; margin-left: 50px;"> Dr.Shahnaz</a>
                                             </td>
                                        </tr>
                                    </table>
                                       </li>
                                    </ul>
                                    </div>
                                    </div>
                                    </div>
                                    <div class="panel-footer" style="text-align:center"><a href="#"> View ALL </a></div>
                            </div>
            </div>             
      </div>                
        </div>  
    </div>
                       
  <script type="text/javascript">
    $(function () {	
		$(".demo3").bootstrapNews({
            newsPerPage: 2,
            autoplay: true,
			pauseOnHover: true,
			navigation: false,
            direction: 'down',
            newsTickerInterval:30000,
            onToDo: function () {
                //console.log(this);
            }
        });
    });
</script>       
                   

<?php 
    } 
    else 
    {
        ?>
<h4> Not the home Page </h4>
<?php     
    }
            
}
add_action( '__after_footer' , 'print_query', 1 );
function print_query(){
  ?>
<div class="livequery" style="width:210px; height: 40px; background-color: #c10;">
        <a href="#"><img class="queryimage" src="/heartcenter/images/live-query.png"  alt="Link to this page"></a> 
             <a class="queryheading" href="#"> <h5> Request Query  </h5></a>
        </div>
<?php
}
?>
