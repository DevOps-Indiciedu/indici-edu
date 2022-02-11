<?php 
$edit_data		=	$this->db->get_where('evenement' , array('id' => $param2) )->result_array();

?>

<div class="tab-pane box active" id="edit" style="padding: 5px" style="max-width:80%;">
 
    <div class="box-content">
        <?php foreach($edit_data as $row):?>
        <?php echo form_open(base_url().'' , array('class' => 'editevent form-horizontal form-groups-bordered validate','target'=>'_top','onSubmit'=>'return false;'));?>
                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo get_phrase('event_title');?></label>
                    <div class="col-sm-5" style="margin-bottom:7px;">
                        <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $row['id'];?>"/>
                        <input type="text" class="form-control" id="title" name="title" value="<?php echo $row['title'];?>" required=""/>
                    </div>
                
                <div class="form-group">
                  <div class="col-sm-offset-3 col-sm-5">
                      <button type="submit" onClick="return edit();" class="btn btn-info" style="margin-left:8px;"><?php echo get_phrase('edit_event');?></button>
                      <button onClick="return deleteevent();" type="submit" class="btn btn-danger"><?php echo get_phrase('delete_event');?></button>
                  </div>
                </div>         
        </form>
        <?php endforeach;?>
    </div>
</div>