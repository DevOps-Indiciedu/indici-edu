<?php
  if($this->session->flashdata('club_updated')){
   echo '<div align="center">
     <div class="alert alert-success alert-dismissable">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
      '.$this->session->flashdata('club_updated').'
     </div> 
    </div>';
  }
?>
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 myt topbar">
            <a style="float:right;color:blue;font-size: 15px;" href="javascript:void(0);" id="chalan_tour" onclick="javascript:introJs().start();">
                <b><i class="fas fa-info-circle"></i> Interactive tutorial</b>
            </a>
            <h3 class="system_name inline">
                <?php echo get_phrase('exam_weightage'); ?> 
            </h3>
        </div>
    </div>
    <div class="col-lg-12 col-sm-12">
        <table class="table table-bordered table_export" data-step="2" data-position="top" data-intro="exam weightage record">
                    <thead>
                        <tr>
                            <th style="width:34px">
                                <div>#</div>
                            </th>
                            <th>
                                <div>
                                    <?php echo get_phrase('details');?>
                                </div>
                            </th>
                            <th style="width:94px">
                                <div>
                                    <?php echo get_phrase('options');?>
                                </div>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $r=0;   
                        
                        foreach($weightage as $row)
                        {
                           $r++;           
                        ?>
                        <tr>
                            <td class="td_middle">
                                <?php echo $r;?>
                            </td>
                            <td>
                                <div class="myttl">
                                    <?php echo $row['yt'];?>
                                </div>
                                <div><strong>
                                
                                <?php echo get_phrase('section'); ?>
                                : </strong>
                                    <?php echo $row['st'];?>
                                </div>
                                <div><strong>
                                
                                <?php echo get_phrase('subject'); ?>
                                : </strong>
                                    <?php echo $row['sn'];?>
                                </div>
                                <div><strong>
								<?php echo get_phrase('exam_weightage'); ?>
                                 : </strong>
                                    <?php echo $row['exam_percentage'];?>%
                                </div>
                                <div><strong>
								<?php echo get_phrase('assessments_weightage'); ?>
                                :</strong>
                                    <?php echo $row['assessment_percentage'];?>%
                                </div>
                            </td>
                            <td class="td_middle">
                                <div class="btn-group" data-step="3" data-position="left" data-intro="exam weightage options: edit / delete">
                                    <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown">
                                        <?php echo get_phrase('action'); ?> <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu dropdown-default pull-right" role="menu">
                                        
                                        <li>
                                            <a href="#" onclick="showAjaxModal('<?php echo base_url();?>modal/popup/modal_edit_exam_weightage/<?php echo $row['weightage_id'];?>');">
                                                <i class="entypo-pencil"></i>
                                                <?php echo get_phrase('edit');?>
                                            </a>
                                        </li>
                                        
                                        <li class="divider"></li>
                                        <!-- DELETION LINK -->
                                        <li>
                                            <a href="#" onclick="confirm_modal('<?php echo base_url();?>adm_assessment/exam_weightage/delete/<?php echo $row['weightage_id'];?>');">
                                                <i class="entypo-trash"></i>
                                                <?php echo get_phrase('delete');?>
                                            </a>
                                        </li>
                                        
                                    </ul>
                                </div>
                                
                            </td>
                        </tr>
                        <?php }?>
                    </tbody>
                </table>
    </div>
    
    <script>
        var datatable_btn_url = 'showAjaxModal("<?php echo base_url();?>modal/popup/modal_add_exam_weightage")';
        var datatable_btn     = "<a href='javascript:;' onclick="+datatable_btn_url+" data-step='1' data-position='left' data-intro='Press this button to add exam weightage' class='modal_open_btn'><i class='entypo-plus-circled'></i><?php echo get_phrase('add_exam_weightage');?></a>"; 
        $(".dataTables_filter label").after(datatable_btn);
    </script>
