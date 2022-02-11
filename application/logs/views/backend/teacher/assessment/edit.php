<style type="text/css">
    input::-webkit-inner-spin-button,input::-webkit-outer-spin-button{-webkit-appearance:none;margin:0}input[type=number]{-moz-appearance:textfield}.redEsteric{color:red}
</style>


<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 myt topbar">
        <a style="float:right;color:blue;font-size: 15px;" href="javascript:void(0);" id="chalan_tour" onclick="javascript:introJs().start();">
            <b><i class="fas fa-info-circle"></i> Interactive tutorial</b>
        </a>
        <h3 class="system_name inline">
            <?php echo get_phrase('assessments');?>
        </h3>   
    </div> 
</div>

<div class="col-md-12">
        
        <div class="panel panel-primary" style="margin-bottom: 0;">
             
            <div class="panel-header bg-primary text-white" style="padding: 10px;font-weight: bold;"><b>Update Assessment</b></div>
             
            <div class="panel-body">
   
                <form id="assessment_form" action="<?php echo base_url(); ?>assessment/update_assessment" method="POST"> 
                        <div class="row col-lg-12 col-l=md-12 col-sm-12 col-xs-12" data-step="1" data-position='top' data-intro="enter assessment title">
                          <label for="assessment_title">Assessment Title</label><span class="redEsteric">*</span>
                          <span style="color:red;float: right;" id="assessment_title_span"></span>
                          <input type="text" class="form-control" name="assessment_title" id="assessment_title" value="<?php echo $assessment_details->assessment_title; ?>" required>
                        </div> 
                        <div class="col-lg-12 row pl-4 pr-4">
                            <?php /* ?>
                            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12" data-step="2" data-position='top' data-intro="select assessment yearly term">
                              <label for="yearly_term_id">Select Class</label><span class="redEsteric">*</span>
                              <span style="color:red;float: right;" id="system_class"></span>
                                 <?php echo get_system_classes_list($assessment_details->system_class); ?>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12" data-step="3" data-position='top' data-intro="select assessment yearly term">
                              <label for="yearly_term_id">Select Subject</label><span class="redEsteric">*</span>
                              <span style="color:red;float: right;" id="system_subject"></span>
                              <?php echo get_system_subjects_list($assessment_details->system_subject); ?>
                            </div>
                            <?php */ ?>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" data-step="4" data-position='top' data-intro="select assessment yearly term">
                              <label for="yearly_term_id">Select Yearly Term</label><span class="redEsteric">*</span>
                              <span style="color:red;float: right;" id="yearly_term_id_span"></span>
                              <select  class="form-control" name="yearly_term_id" id = "yearly_term_id" required>
                                 <?php echo yearly_terms_option_list($_SESSION['academic_year_id'] , $_SESSION['yearly_term_id'] , $assessment_details->yearly_term_id); ?>
                              </select>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" data-step="5" data-position='top' data-intro="enter no of attempts">
                              <label for="total_attempts">Allowed No Of Attempts</label><span class="redEsteric">*</span>
                              <input type="number" class="form-control" name="total_attempts" id="total_attempts" value="<?php echo $assessment_details->total_attempts; ?>" required>
                                <span style="color:red;float: right;" id="total_attempts_span"></span>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12" data-step="6" data-position='top' data-intro="enter total marks">
                              <label for="total_marks">Total Marks</label><span class="redEsteric">*</span>
                              <span style="color:red;float: right;" id="total_marks_span"></span>
                              <input type="number" class="form-control" name="total_marks" id="total_marks" value="<?php echo $assessment_details->total_marks; ?>" required>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12" data-step="7" data-position='top' data-intro="enter no of MCQS">
                              <label for="mcq_questions">No of MCQ's </label>
                              <span style="color:red;float: right;" id="mcq_questions_span"></span>
                              <input type="number" class="form-control check" name="mcq_questions" id="mcq_questions" value="<?php echo $assessment_details->mcq_questions; ?>">
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12" data-step="8" data-position='top' data-intro="enter no of True/False">
                              <label for="true_false_questions">No of True/false</label>
                              <input type="number" class="form-control check" name="true_false_questions" id="true_false_questions" value="<?php echo $assessment_details->true_false_questions; ?>">
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12" data-step="9" data-position='top' data-intro="enter no of Fill in the Blanks">
                              <label for="fill_in_the_blanks_questions">No of blanks</label>
                              <input type="number" class="form-control check" name="fill_in_the_blanks_questions" id="fill_in_the_blanks_questions" value="<?php echo $assessment_details->fill_in_the_blanks_questions; ?>">
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12" data-step="10" data-position='top' data-intro="enter no of shot questions">
                              <label for="short_questions">No of Short Questions</label>
                              <input type="number" class="form-control check" name="short_questions" id="short_questions" value="<?php echo $assessment_details->short_questions; ?>">
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12" data-step="11" data-position='top' data-intro="enter no of long questions">
                              <label for="long_questions">No of Long Questions</label>
                              <input type="number" class="form-control check" name="long_questions" id="long_questions" value="<?php echo $assessment_details->long_questions; ?>">
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12" data-step="12" data-position='top' data-intro="enter no of Pictorial questions">
                              <label for="pictorial_questions">No of Pictorial Questions</label>
                              <input type="number" class="form-control check" name="pictorial_questions" id="pictorial_questions" value="<?php echo $assessment_details->pictorial_questions; ?>">
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12" data-step="13" data-position='top' data-intro="enter no of column matching questions">
                              <label for="match_questions">No of Column Matching Questions</label>
                              <input type="number" class="form-control check" name="match_questions" id="match_questions" value="<?php echo $assessment_details->match_questions; ?>">
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12" data-step="14" data-position='top' data-intro="enter no of drawing questions">
                              <label for="drawing_questions">No of Drawing Questions</label>
                              <input type="number" class="form-control check" name="drawing_questions" id="drawing_questions" value="<?php echo $assessment_details->drawing_questions; ?>">
                            </div>
                        </div>
                        
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" data-step="15" data-position='top' data-intro="enter remarks">
                          <label for="remarks">Remarks</label>
                          <textarea class="form-control" name="remarks" id="remarks" rows="4" cols="50"><?php echo $assessment_details->remarks; ?></textarea>
                        </div> 
                     
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-right">

                               <input type="hidden" id="assessment_id" name="assessment_id" value="<?php echo $assessment_details->assessment_id; ?>">
                               <button data-step="16" data-position='top' data-intro="press this button to update assessment details" 
                               style="margin-top:20px !important;" type="submit" id="submit" class="btn btn-default submit_btn"> 
                               Update Assessment</button>
                        </div>
                </form>
            </div>
        </div>
    
    </div>

<script>
    
    $(document).ready(function(){
       
       var subject_id = "<?php echo $assessment_details->system_subject; ?>";
       var class_id   = "<?php echo $assessment_details->system_class; ?>";
       
       if(subject_id > 0)
       {
           $('#subject_id').val(subject_id);
       }
       if(class_id > 0)
       {
           $('#class_id').val(class_id);
       }
       
    });
    
    
    $('#submit').on('click' , function(){
	   // e.preventDefault();
        
        var proceed = true;
        
        if($('#assessment_title').val() == ""){
            $('#assessment_title_span').html('Assessment Title is mandatory field');
            proceed = false;
        }else{
            $('#assessment_title_span').html('');
        }
        
        if($('#yearly_term_id').val() == ""){
            $('#yearly_term_id_span').html('Term is mandatory field');
            proceed = false;
        }else{
            $('#yearly_term_id_span').html('');
        }
        
        if($('#total_marks').val() == ""){
            $('#total_marks_span').html('Total Marks is mandatory field');
            proceed = false;
        }else{
            $('#total_marks_span').html('');
        }
        
        if($('#total_attempts').val() == ""){
            $('#total_attempts_span').html('Total Attempts is mandatory field');
            proceed = false;
        }else{
            $('#total_attempts_span').html('');
        }
        
        if ($('#mcq_questions').val() == "" 
            && $('#true_false_questions').val() == "" 
            && $('#fill_in_the_blanks_questions').val() == "" 
            && $('#short_questions').val() == "" 
            && $('#long_questions').val() == "" 
            && $('#pictorial_questions').val() == ""
            && $('#match_questions').val() == ""
            && $('#drawing_questions').val() == "") {
                $('#mcq_questions_span').html('atleast 1 no of question type is mandatory');
                proceed = false;
        }else{
            $('#mcq_questions_span').html('');
        }
        
        return proceed;
    
    });
</script>