<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>    
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="contentheadflex content-header"  id="contentheid">
    <div class="row">
     <div class="col-sm-6">
       <div class="contenttitle memberperformencetitle">
         <h1>
          Messages
  
        </h1>
   </div>
 </div>

</div>
<!--end row -->
</section>
<div class="col-md-6 col-xs-6">
  <?php  $msg=$this->session->flashdata('message');
  if(!empty($msg)){
    echo  "<br>".$msg;  } ?> 
  </div>
  <!-- Main content -->
  <form method="get" enctype="multipart/form-data" action="" id="mainform">  
    <section class="content">
      <div class="row">
        <div class="col-sm-12">
         <div class="box">
          <div class="box_header_custom box-header">
            
          </div>

          <div class="managecateshowing">
           <div class="singlemanacat">
             <div class="contenttitle">
               <p><strong> Total <?php echo $totalmessage;   ?> Messages </strong></p>
             </div>
           </div>
           <div class="singlemanacat">
             <div class="savechangesbutton">
              <button type="button" name="reset" id="" onclick="location.href = '<?=base_url()?>Contact/messages';">Reset Filter</button>
              <button type="submit" id="" name="Search">Search</button>
            </div>
          </div>
        </div>


        <!-- /.box-header -->
        <div class="settingstablebody box-body table-responsive no-padding">
          <table class="tablenew table table-hover">
            <tbody>


            <tr class="catmanageheader">
                 
              <th>Name</th>     
              <th>Email</th>     
              <th>Message</th>     
              <th>Action</th>    
            </tr>


            <!-- start tr -->
            <tr>
            

             <td>
               <div class="settingsinf">
                 <input type="text" placeholder="name" name="name" value="<?php if(!empty($name)){ echo $name;
                 } ?>" >
               </div>
             </td>

             <td>
               <div class="settingsinf">
                 <input type="text" placeholder="Email" name="email" value="<?php if(!empty($email)){ echo  $email;  } ?>" >
               </div>
             </td>
             <td>
               <div class="settingsinf">
                 <input type="text" placeholder="message" name="message" value="<?php if(!empty($message)){  echo  $message;  } ?>" >
               </div>
             </td>
             <td></td>

   </tr> 
   <!--end tr -->
   </form>
   <?php foreach($result as $row) {  ?>   
   <!-- start tr -->
   <td>
     <div class="settingsinf">
       <?=$row['name']?>
     </div>
   </td>

   <td>
     <div class="settingsinf">
       <?=$row['email']?>

     </div>
   </td>



   <td>
     <div class="settingsinf">
       <?=$row['message']?>

     </div>
   </td>

   

<td>
  <a href="<?=base_url()?>Contact/delete/<?=$row['id']?>" data-toggle="tooltip" title="Edit"><span class="glyphicon glyphicon-trash"></span></a> 
</td>
</tr> 
 <?php } ?>
</tbody>
</table>

</div><!-- box header -->



<!-- /.box-body -->
</div>
<!-- /.box --> 
</div>  


</div>
<!-- /.row -->
<!-- Main row -->


</section>
<!-- /.content -->
</div>
