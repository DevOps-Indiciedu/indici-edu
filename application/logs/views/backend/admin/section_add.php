<?php 
$school_id=$_SESSION['school_id'];
$dep_id=$this->uri->segment(4);
$class_id=$this->uri->segment(5);
$title = 'Add Section';


?>
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-primary" data-collapsed="0">
        	<div class="panel-heading ">
            	<div class="panel-title black2" >
            		<i class="entypo-plus-circled"></i>
					<?php get_phrase($title);?>
            	</div>
            </div>
			<div class="panel-body">
				
                <?php echo form_open(base_url().'departments/section_new/add_edit/' , array('id'=>'disable_submit_btn','class' => 'form-horizontal form-groups-bordered validate', 'enctype' => 'multipart/form-data')); ?>
                
            <div class="form-group">
						<label for="field-1" class="col-sm-4 control-label"><?php echo get_phrase('department');?> <span class="star">*</span></label>
                      
                       <div class="col-sm-8">
			<select id="departments_id1" name="" class="form-control" required>
                              <option value=""><?php echo get_phrase('select');?></option>
                              <?php
$this->db->where('school_id',$_SESSION['school_id']); 
	$classes = $this->db->get(get_school_db().'.departments')->result_array();
		foreach($classes as $row){
			
		
											?>
        <option
        <?php
        if($row['departments_id']==$dep_id){
			echo "selected";
		}
        
        
         ?>
        
        
        
         value="<?php echo $row['departments_id']; ?>">
													<?php echo $row['title'];?>
                                                    </option>
                                        <?php
										}
								  ?>
                          </select>
			
			</div>
					</div>  



  
               <div class="form-group">
						<label for="field-1" class="col-sm-4 control-label"><?php echo get_phrase('class');?> <span class="star">*</span></label>
                       
                       <div class="col-sm-8">
			<select class="form-control" id="class_id1" name="class_id"  data-validate="required" data-message-required="<?php echo get_phrase('value_required');?>" >
			
  <option value=""></option>
			</select>
				
					</div>
					</div>
					
				
				
  
               <div class="form-group">
						<label for="field-1" class="col-sm-4 control-label"><?php echo get_phrase('title');?> <span class="star">*</span></label>
                       
                       <div class="col-sm-8">
							<input maxlength="100" type="text" class="form-control" name="title" data-validate="required" data-message-required="<?php echo get_phrase('value_required');?>" value="<?php echo $edit_data[0]['title'];?>">
	<input type="hidden" name="section_id" value="<?php echo $edit_data[0]['section_id'];   ?>">
				
					</div>
					</div>
					
				
				
				
				
				
				
				
				
					<div class="form-group">
						<label for="field-2" class="col-sm-4 control-label"><?php echo get_phrase('short_name');?></label>
                        
						<div class="col-sm-8">
						

 
 
 		<input maxlength="20" type="text" class="form-control" name="short_name"  value="<?php
echo $edit_data[0]['short_name'];
?>">
</div> 
					</div>
					
					
					   <div class="form-group">
						<label for="field-1" class="col-sm-4 control-label"><?php echo get_phrase('teacher');?></label>
                      
                       <div class="col-sm-8">
			<select id="teacher_id" name="teacher_id" class="form-control">
                              <option value=""><?php echo get_phrase('select');?></option>
                              <?php
$this->db->where('school_id',$_SESSION['school_id']); 
	$classes = $this->db->get(get_school_db().'.staff')->result_array();
		foreach($classes as $row):
											?>
        <option
        
        
        
        
         value="<?php echo $row['staff_id']; ?>">
<?php echo $row['name'];?>
  </option>
                                        <?php
										endforeach;
								  ?>
                          </select>
			
			</div>
					</div>  
					
					
					
					
					<div class="form-group">
						<label for="field-2" class="col-sm-4 control-label"><?php echo get_phrase('description');?></label>
                        
						<div class="col-sm-8">


<textarea maxlength="1000"  id="discription2"
oninput="count_value('discription2','discription_count2','1000')" class="form-control" name="discription"><?php echo $edit_data[0]['discription'];?></textarea>

<div id="discription_count2" class="col-sm-12"></div>

		
		
</div> 
					</div>
		
		
		
		
		
		
				<div class="form-group">
						<label for="field-2" class="col-sm-4 control-label"><?php echo get_phrase('status');?></label>
                        
						<div class="col-sm-8">
			
			
<?php 
echo status('status',"form-control",$edit_data[0]['status']);
			
	?>		
			
			
			
		
</div> 
					</div>
	
	
	
	
	
				<div class="form-group">
						<label for="field-2" class="col-sm-4 control-label"><?php echo get_phrase('');?></label>
                        
						<div class="col-sm-8">
						
<button type="submit" class="btn btn-default"><?php echo get_phrase('save'); ?></button>		
				
						</div> 
					</div>
				
                <?php echo form_close();?>
            </div>
        </div>
    </div>
</div>


<script>
$(document).ready(function(){
	
	get_dt();
	
	$("#departments_id1").change(function(){
		
		get_dt();
		
		});
		
});


function get_dt(){
	
var departments_id=$("#departments_id1").val();
var clscomp_id="<?php echo $class_id;  ?>";

if(departments_id!=""){
	
$('#departments_id1').after('<div id="loader" class="loader_small"></div>');
	
	$.ajax({
			type: 'POST',
			data: {departments_id:departments_id,clscomp_id:clscomp_id},
	url: "<?php echo base_url();?>departments/get_class",
			dataType: "html",
			success: function(response) { 
			//alert(response);
			$("#class_id1").html(response);
			$('#loader').remove();
			}
		});	
	
	
	}
	
else{
		$("#class_id1").html("<option><?php echo get_phrase('select'); ?></option>");
	}

}
	
	
</script>
<style>


.loader {
    border: 16px solid #f3f3f3; /* Light grey */
    border-top: 16px solid #63b7e7; /* Blue */
    border-radius: 50%;
    width: 120px;
    height: 120px;
    animation: spin 2s linear infinite;
}

.loader_small {
       border: 7px solid #f3f3f3;
    border-top: 7px solid #63b7e7;
    border-radius: 50%;
    width: 30px;
    height: 30px;
    animation: spin 1s linear infinite;
}

@keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
}



</style>


