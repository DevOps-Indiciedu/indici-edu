<?php 
if (right_granted(array('managedatesheet_manage')))
{
$resArr='';
$dept_id='';
$class_id='';
$section_id='';
$year='';
$term='';
$urlArr=explode('/',$_SERVER['REQUEST_URI']);
$resArr=explode('-',end($urlArr));

if(sizeof($resArr)>1){
	$dept_id=$resArr[0];
	$class_id=$resArr[1];
	$section_id=$resArr[2];
	$year=$resArr[3];
	$term=$resArr[4];
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
            <b><i class="fas fa-info-circle"></i> Interactive tutorial</b>
        </a>
        <h3 class="system_name inline">
            <?php echo get_phrase('manage_datesheet'); ?>
        </h3>
        <?php if(right_granted('managedatesheet_add')){?>
        <!--<a  href="#" id="add-link" onclick="showAjaxModal('<?php echo base_url();?>modal/popup/modal_add_exam_routine');" class="btn btn-primary pull-right">
			<i class="entypo-plus-circled"></i>
			<?php echo get_phrase('Add exam Schedule');?>
		</a>
-->
        <?php }?>
    </div>
</div>
<div>
    <form name="marksfilter" id="marksfilter" method="post" class="form-horizontal  validate">
        <div class="row filterContainer" data-step="1" data-position="top" data-intro="Please select filters and press filter button to get specific records">
            <div class="col-md-6 col-lg-6 col-sm-6 ">
                <label id="exams_filter_selection"></label>                            
                <select id="exams_filter" name="yearly_terms1" class="selectpicker form-control" data-validate="required" data-message-required="Value Required">	                                              
                <?php
                    $select_year=array(3);
                    echo yearly_term_selector_exam('',$select_year); 
                ?> 
                </select>
            </div>
            <div class="col-md-6 col-lg-6 col-sm-6 ">
                <label id="section_id1_selection"></label>
                <select id="section_id1" class="selectpicker form-control" name="section_id" data-validate="required" data-message-required="Value Required">                          	
                    <?php echo section_selector();?>                            
                </select>
            </div>
            <div class="col-md-12 col-lg-12 col-sm-12 mt-3">
                <button type="submit" id="select" class="modal_save_btn"><?php echo get_phrase('filter'); ?></button>
                <a href="<?php echo base_url(); ?>exams/exam_routine" style="display: none;" class="modal_cancel_btn" id="btn_remove"> <i class="fa fa-remove"></i><?php echo get_phrase('remove_filter'); ?></a>
            </div>
        </div>
<div id="session" style="display:none">
    <?php

   echo '<div align="center">
     <div class="alert alert-success alert-dismissable">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
      Record Saved
     </div> 
    </div>';

  ?></div>
  <div class="col-lg-12 col-sm-12 mt-4">
      <div id="exam-routine"></div>
  </div>

<script type="text/javascript">
$(document).ready(function() {
    $('.selectpicker').on('change', function (){
		var id=$(this).attr('id');
		var selected = $('#'+ id +' :selected');
		var group = selected.parent().attr('label');
		$('#'+ id + '_selection').text(group);
    });

    document.getElementById('marksfilter').onsubmit = function() {
        return false;
    };
    url = '<?php echo base_url()?>exams/exam_routine';
    var dep = '<?php echo $dept_id;?>';
    var clas = '<?php echo $class_id;?>';
    var sec = '<?php echo $section_id;?>';
    var year = '<?php echo $year;?>';
    var term = '<?php echo $term;?>';
    var values = dep + '-' + clas + '-' + sec + '-' + year + '-' + term;
    if (dep != '' && clas != '' && sec != '') {


        $.ajax({
            type: 'POST',
            data: {
                departments_id: dep,
                class_id: clas,
                section_id: sec,
                academic_year: year,
                yearly_term: term
            },
            url: "<?php echo base_url();?>exams/get_routine",
            dataType: "html",
            success: function(response) {

                $("#exam-routine").html(response);
                $('a#add-link').attr('onclick', "showAjaxModal('<?php echo base_url();?>modal/popup/modal_add_exam_routine/" + values + "');");

            }
        });
    }
    $("#departments_id").change(function() {

        var dep_id = $(this).val();
        $("#icon").remove();

        $(this).after('<span id="icon" class="glyphicon glyphicon-refresh glyphicon-refresh-animate"></span>');

        $.ajax({
            type: 'POST',
            data: {
                department_id: dep_id
            },
            url: "<?php echo base_url();?>exams/get_class",
            dataType: "html",
            success: function(response) {
                $("#icon").remove();
                $("#class_id").html(response);
                $("#section_id").html('<select><option><?php echo get_phrase('select_section'); ?></option></select>');
            }
        });

    });

    $("#class_id").change(function() {
        var class_id = $(this).val();
        $("#icon").remove();
        $(this).after('<span id="icon" class="glyphicon glyphicon-refresh glyphicon-refresh-animate"></span>');
        $.ajax({
            type: 'POST',
            data: {
                class_id: class_id
            },
            url: "<?php echo base_url();?>exams/get_class_section",
            dataType: "html",
            success: function(response) {
                $("#icon").remove();
                $("#section_id").html(response);
            }
        });
    });
    $('#academic_year').on('change', function() {

        var academic_year = $(this).val();
        if (academic_year == '') {
            $('#yearly_term').html('<select><option><?php echo get_phrase('select_term'); ?></option></select>');
        } else {


            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>exams/get_terms",

                data: ({
                    academic_year: academic_year,
                    status: 1
                }),
                dataType: "html",
                success: function(html) {
                    if (html != '') {
                        $('#yearly_term').html(html);


                    }

                }


            });
        }

    });
    $('#yearly_term').on('change', function() {
        var yearly_term = $(this).val();
        $('#subject_id').html('<select><option><?php echo get_phrase('select_subject'); ?></option></select>');
        $('#exam_id').html('<select><option>Select Exam</option></select>');
        if (yearly_term != '') {
            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>exams/get_exam_type",
                data: ({
                    yearly_term: yearly_term
                }),
                dataType: "html",
                success: function(html) {
                    if (html != '') {
                        $('#exam_id').html(html);
                    }
                }
            });
        }

    });
    $("#select").click(function() {
        if ($("#exams_filter").val() !== "" && $("#section_id1").val() !== "") {
            $('#btn_remove').show();
        }
       
        var exam_id = $("#exams_filter").val();
        var section_id=$("#section_id1").val();
        var values = $('#exams_filter').val() + '-' + $('#section_id1').val();
        
        $('a#add-link').attr('onclick', "showAjaxModal('<?php echo base_url();?>modal/popup/modal_add_exam_routine/" + values + "');");
        if (exam_id != '' && section_id != '') {


            $("#exam-routine").html("<div id='loading' class='loader'></div>");

            $.ajax({
                type: 'POST',
                data: {
                    section_id: section_id,
                    exam_id: exam_id
                },
                url: "<?php echo base_url();?>exams/get_routine",
                dataType: "html",
                success: function(response) {
                    $("#loading").remove();
                    $("#exam-routine").html(response);
                    //window.location.replace(url+'/'+values);
                }
            });
        }
    });
});

function downloadpdf()
{
    $('#pdfaction').hide();
    var doc = new jsPDF('p', 'pt', 'letter');  
    var htmlstring = '';  
    var tempVarToCheckPageHeight = 0;  
    var pageHeight = 0;  
    pageHeight = doc.internal.pageSize.height;  
    specialElementHandlers = {  
        // element with id of "bypass" - jQuery style selector  
        '#bypassme': function(element, renderer) {  
            // true = "handled elsewhere, bypass text extraction"  
            return true  
        }  
    };  
    margins = {  
        top: 150,  
        bottom: 60,  
        left: 40,  
        right: 40,  
        width: 600  
    };  
    var y = 20;  
    doc.setLineWidth(2);  
    doc.setFontSize(14);
    doc.text(50, 20, '<?php echo $_SESSION['school_name'];?>'+ $('#pdftitle').text());  
    doc.autoTable({  
        html: '#Mypdf',  
        startY: 70,  
        theme: 'grid',  
        columnStyles: {  
            0: {  
                cellWidth: 180,  
            },  
            1: {  
                cellWidth: 180,  
            },  
            2: {  
                cellWidth: 180,  
            }
            
        },  
        styles: {  
            minCellHeight: 40  
        }  
    })  
    doc.save('Mid Term '+ $('#pdftitle').text()+'.pdf');
     $('#pdfaction').show();
}
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.min.js"></script>  
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.6/jspdf.plugin.autotable.min.js"></script>  

<?php } ?>