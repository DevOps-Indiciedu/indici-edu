<?php  
    if($this->session->flashdata('club_updated')){
    echo '<div align="center">
     <div class="alert alert-success alert-dismissable">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">�</button>
      '.$this->session->flashdata('club_updated').'
     </div> 
    </div>';
  }
  ?>
<script>
$(window).on("load",function() {
    setTimeout(function() {
        $('.alert').fadeOut();
    }, 3000);
});
</script>


<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 myt topbar">
        <a style="float:right;color:blue;font-size: 15px;" href="javascript:void(0);" id="chalan_tour" onclick="javascript:introJs().start();">
            <b><i class="fas fa-info-circle"></i> Interactive Tutorial</b>
        </a>
        <h3 class="system_name inline">
               <?php echo get_phrase('invoice_details'); ?>
        </h3>
    </div>
</div>
<div class="col-lg-12 col-md-12">
    <table class="table table-bordered table_export" data-step="2" data-position='top' data-intro="discount types records">
    	<thead>
    		<tr>
        		<th><div><?php echo get_phrase('#');?></div></th>
        		<th><div><?php echo get_phrase('challan_no');?></div></th>
        		<th><div><?php echo get_phrase('challan_amount');?></div></th>
			</tr>
		</thead>
        <tbody>
        	<?php $total_amount = 0; $i = 1; foreach($invoice_details as $row):?>
            <tr>
				<td><?php $i++ ?></td>
				<td><?php $data['chalan_form_number'];?></td>
				<td>RS <?php number_format($data['actual_amount'],2);?></td>
                <?php $total_amount += $data['actual_amount']; ?>                            
            </tr>
            <?php endforeach;?>
            <tfoot class="text-center">
                <th colspan="3" style="text-align: end;">
                    <h4><b>Total Amount: RS <?= number_format($total_amount,2) ?></b></h4>
                </th>
            </tfoot>
        </tbody>
    </table>
</div>

