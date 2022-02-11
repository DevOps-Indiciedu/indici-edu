<?php 
$edit_data		=	$this->db->get_where('book' , array('book_id' => $param2) )->result_array();

?>

<div class="tab-pane box active" id="edit" style="padding: 5px">
    <div class="box-content">
        <?php foreach($edit_data as $row):?>
        <?php echo form_open(base_url().'admin/book/do_update/'.$row['book_id'] , array('id'=>'disable_submit_btn','class' => 'form-horizontal form-groups-bordered validate','target'=>'_top'));?>
                <div class="form-group">
                    <label class="col-sm-4 control-label"><?php echo get_phrase('name');?></label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="name" value="<?php echo $row['name'];?>"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label"><?php echo get_phrase('author');?></label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="author" value="<?php echo $row['author'];?>"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label"><?php echo get_phrase('description');?></label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="description" value="<?php echo $row['description'];?>"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label"><?php echo get_phrase('price');?></label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="price" value="<?php echo $row['price'];?>"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label"><?php echo get_phrase('class');?></label>
                    <div class="col-sm-8">
                        <select name="class_id" class="form-control">
                        	<option value="">
                            <?php echo get_phrase('please_select');?>
                            </option>
                            <?php 
                            $classes = $this->db->get('class')->result_array();
                            foreach($classes as $row2):
                            ?>
                                <option value="<?php echo $row2['class_id'];?>" <?php if($row2['class_id']==$row['class_id']) echo "selected";?>
                                    <?php if($row['class_id']==$row2['class_id'])echo 'selected';?>><?php echo $row2['name'];?></option>
                            <?php
                            endforeach;
                            ?>
                        </select>
                    </div>
                </div>
                 <div class="form-group">
                    <label class="col-sm-4 control-label"><?php echo get_phrase('category');?></label>
                    <div class="col-sm-8">
                        <select name="book_category_id" class="form-control" style="width:100%;" required>
                            <option value="">
							<?php echo get_phrase('please_select');?></option>
                            <?php 
                            $categ = $this->db->get('book_category')->result_array();
                            foreach($categ as $row3):
                            ?>
                                <option value="<?php echo $row3['book_category_id'];?>" <?php if($row3['book_category_id']==$row['book_category_id']) echo "selected";?>><?php echo $row3['name'];?></option>
                            <?php
                            endforeach;
                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label"><?php echo get_phrase('number_of_books');?></label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="number_books" value="<?php echo $row['number_books'];?>" required/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label"><?php echo get_phrase('status');?></label>
                    <div class="col-sm-8">
                        <select name="status" class="form-control">
                            <option value="available" <?php if($row['status']=='available')echo 'selected';?>><?php echo get_phrase('available');?></option>
                            <option value="unavailable" <?php if($row['status']=='unavailable')echo 'selected';?>><?php echo get_phrase('unavailable');?></option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-offset-3 col-sm-5">
                      <button type="submit" class="btn btn-info"><?php echo get_phrase('edit_book');?></button>
                  </div>
                </div>
        </form>
        <?php endforeach;?>
    </div>
</div>