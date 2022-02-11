<style>
    .form-group {
        margin-bottom: 0px !important;
    }
</style>
<?php
		  
if($this->session->flashdata('club_updated')){
	echo '<div align="center">
	<div class="alert alert-success alert-dismissable">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
    '.$this->session->flashdata('club_updated').'
	</div> 
	</div>';
}

if($this->session->flashdata('error_msg')){
	echo '<div align="center">
	<div class="alert alert-danger alert-dismissable">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
	'.$this->session->flashdata('error_msg').'
	</div> 
	</div>';
}
?>

<script>
$(window).on("load",function() {
    setTimeout(function() {
        $('.alert').fadeOut();
    }, 5000);
});
	
$(window).on("load",function() {
    setTimeout(function() {
        $('.mydiv').fadeOut();
    }, 5000);
});
</script>

<a style="float:right;color:blue;font-size: 15px;" href="javascript:void(0);" id="chalan_tour" onclick="javascript:introJs().start();">
    <b><i class="fas fa-info-circle"></i> Interactive tutorial</b>
</a>
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 myt topbar">
        <h3 class="system_name inline">
            <?php echo get_phrase('journal_voucher'); ?>
        </h3>
    </div>
</div>


<form action="<?php echo base_url().'vouchers/journal_voucher_listing'?>" method="post" name="journal_voucher_form" id="journal_voucher_form">
        <div>
            <div class="row filterContainer" data-step="1" data-position="top" data-intro="Please select the filters and press Filter button to get specific records">
                
                <div class="col-md-4">
                   <div class="form-group">
                        <label for="status">Status</label>
                        <select id="status" class="form-control"  name="status">
                            <option value=""><?php echo get_phrase('select_status'); ?></option>
                             <?php echo status_list($status);?>
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="start_date">Start Date</label>
                        <input class="form-control datepicker" type="text" autocomplete="off" name="start_date" id="start_date" value="<?php echo date_dash($start_date); ?>" style="background-color:#FFF !important;"  data-format="dd/mm/yyyy">
                        <div id="d3"></div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="end_date">End Date</label>
                        <input class="form-control datepicker" type="text" autocomplete="off" name="end_date" id="end_date" value="<?php echo date_dash($end_date); ?>" style="background-color:#FFF !important;"  data-format="dd/mm/yyyy">
                        <div id="d3"></div>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="form-group" style="margin-top: 20px;">
                        <input type="hidden" name="apply_filter" value="1">
                        <input type="submit" id="filter" value="<?php echo get_phrase('filter');?>" class="modal_save_btn">
                        <?php
                        if ($apply_filter == 1)
                        {
                        ?>
                            <a id="btn_show" href="<?php echo base_url().'vouchers/journal_voucher_listing'?>" class="modal_cancel_btn"><i class="fa fa-remove"></i><?php echo get_phrase('remove_filters');?></a>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
</form>



    <div class="col-lg-12 col-md-12 col-sm-12">

        <table class="table table-bordered table_export" id="voucher" data-step="3" data-position='top' data-intro="vouchers records">
            <thead>
                <tr>
                    <th>
                        <?php echo get_phrase('voucher');?> #
                    </th>
                    <th>
                        <?php echo get_phrase('date');?>
                    </th>
                    <th>
                        <?php echo get_phrase('status');?>
                    </th>
                    <th>
                        <?php echo get_phrase('actions');?>
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php
        		    $a=0;
                    foreach ($data->result_array() as $row) {
                ?>
                    <?php $a++; ?>
                    <tr>
                    <td class="td_middle">
                        <?php echo $row['voucher_number'];?>
                    </td>
                    <td>
                    <?php echo date_view($row['voucher_date']);?>
                    </td>
                    <td>
                        <?php
                        $status = status_check($row['status']);
                        $color = "";
                        if ($status=='Saved')
                        {
                            $color = "black";
                        }elseif ($status=='Submited')
                        {
                            $color = "orange";
                        }elseif ($status=='Posted')
                        {
                            $color = "green";
                        }
                        ?>
                        <span style="color: <?php echo $color;?>;">
                            <?php echo status_check($row['status']);?>
                        </span>
                    </td>
                    <td class="td_middle">
                        <?php
                        {
                        ?>
                            <div class="btn-group" data-step="4" data-position='left' data-intro="voucher view / edit / delete / print options">
                                <button type="button" class="btn btn-default btn-sm dropdown-toggle pull-right"
                                        data-toggle="dropdown">
                                    <?php echo get_phrase('actioin'); ?> <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu dropdown-default pull-right" role="menu">
                                    <?php
                                    //if (right_granted('staff_manage'))
                                    {
                                        ?>
                                        <li>
                                            <a href="<?php echo base_url(); ?>vouchers/journal_voucher_detail/<?php echo $row['journal_voucher_id']; ?>">
                                                <i class="entypo-eye"></i>
                                                <?php echo get_phrase('view'); ?>
                                            </a>
                                        </li>
                                        <?php
                                    }
                                    //if (right_granted('staff_manage'))
                                    {
                                        ?>
                                        <li class="divider"></li>
                                        <li>
                                            <a href="<?php echo base_url(); ?>vouchers/journal_voucher_print/<?php echo $row['journal_voucher_id']; ?>">
                                                <i class="entypo-print"></i>
                                                <?php echo get_phrase('print'); ?>
                                            </a>
                                        </li>
                                        <?php
                                    }
                                    if ($status!='Posted')
                                    {
                                        ?>
                                        <li class="divider"></li>
                                        <li>
                                            <a href="<?php echo base_url(); ?>vouchers/journal_voucher_edit/<?php echo $row['journal_voucher_id']; ?>">
                                                <i class="entypo-pencil"></i>
                                                <?php echo get_phrase('edit'); ?>
                                            </a>
                                        </li>
                                        <?php
                                    }
                                    if ($status!='Posted')
                                    {
                                        ?>
                                        <li class="divider"></li>
                                        <li>
                                            <a href="<?php echo base_url(); ?>vouchers/journal_voucher_delete/<?php echo $row['journal_voucher_id'];?>">
                                                <i class="entypo-trash"></i>
                                                <?php echo get_phrase('delete'); ?>
                                            </a>
                                        </li>
                                        <?php
                                        /*
                                        onclick="confirm_modal('<?php echo base_url(); ?>vouchers/bank_receipt_voucher_delete/<?php echo $row['bank_receipt_id']; ?>/<?php echo $row['   attachment']; ?>');"
                                        */
                                        ?>

                                    <?php } ?>

                                </ul>
                            </div>
                        <?php } ?>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>



<script>

    var datatable_btn_url = '<?php echo base_url(); ?>vouchers/journal_voucher';
    var datatable_btn     = "<a href="+datatable_btn_url+" data-step='1' data-position='left' data-intro='Press this button to add voucher details' class='modal_open_btn'><i class='entypo-plus-circled'></i><?php echo get_phrase('add_voucher');?></a>";    

</script>

<!--//***********************Date filter validation***********************-->
<script>
    $("#start_date").change(function () {
        var startDate = s_d($("#start_date").val());
        var endDate = s_d($("#end_date").val());
       
        if ((Date.parse(endDate) < Date.parse(startDate)))
        {
            Command: toastr["warning"]("<?php echo get_phrase('start_date_should_be_less_then_end_date');?>", "Alert")
            toastr.options.positionClass = 'toast-bottom-right';
            document.getElementById("start_date").value = "";
        }
        // else if ((Date.parse(startDate) < Date.parse("<?php echo $_SESSION['session_start_date']; ?>"))) 
        // {
        //     Command: toastr["warning"]("<?php echo get_phrase('please_select_start_date_within_academic_session');?>", "Alert")
        toastr.options.positionClass = 'toast-bottom-right';
        //     document.getElementById("start_date").value = "";      
        // }
    });
    
    $("#end_date").change(function () {
        var startDate = s_d($("#start_date").val());
        var endDate = s_d($("#end_date").val());
        if ((Date.parse(startDate) > Date.parse(endDate))) {
            
            Command: toastr["warning"]("<?php echo get_phrase('end_date_should_be_greater_than_start_date');?>", "Alert")
            toastr.options.positionClass = 'toast-bottom-right';
             document.getElementById("end_date").value = "";      
        }
        else if ((Date.parse(endDate) > Date.parse("<?php echo $_SESSION['session_end_date']; ?>"))) {
            Command: toastr["warning"]("<?php echo get_phrase('please_select_end_date_within_academic_session');?>", "Alert")
            toastr.options.positionClass = 'toast-bottom-right';
            document.getElementById("end_date").value = "";    
        }
    });

    function s_d(date){
      var date_ary=date.split("/");
      return date_ary[2]+"-"+date_ary[1]+'-'+date_ary[0]; 
    }
</script>
<!--//********************************************************************-->