<?php $assessment_row = get_assessment_row($assessments[0]['assessment_id']); ?>
<script src="https://cdn.ckeditor.com/4.14.1/standard-all/ckeditor.js"></script>
<script src="https://www.wiris.net/demo/plugins/app/WIRISplugins.js?viewer=image"></script>
<style>
    body{font-family:ABeeZee}.page-container .main-content{background:#dee2e6!important}
    .self-text{float:right;color:#fff;margin-right:10px;margin-top:-15px}.joined{margin:50px}
    .container_self{width:95%;margin-top:30px}.panel_heading_self{height:50px;padding:10px 0 5px 10px;font-size:18px}
    .panel_self{color:#000}.timer_heading{font-size:30px!important;font-weight:600;letter-spacing:6px}#demo{font-size:60px!important;color:#000;font-variant:petite-caps;font-weight:900}
    .card{box-shadow:0 4px 8px 0 rgba(0,0,0,.2);transition:.3s;width:100%}.card:hover{box-shadow:0 8px 16px 0 rgba(0,0,0,.2)}
    .container_after_timer{padding:2px 16px}.detail_card_p{font-size:14px!important;margin:0 0 0 .5px}#sidebars{position:fixed;margin:3px 0 0 10px;box-shadow:1px 2px 4px 2px #cccccc94}.sidenav_assessment{z-index:1;top:4%;left:65%;background:#eee;overflow-x:hidden;padding:15px 15px}
    .header_assess{padding:20px;text-align:center;background:#139bda;color:#fff;margin:-5px;font-size:30px}
    .Q{font-size:20px}.panel{border:3px solid transparent;box-shadow:1px 2px 10px 1px #ccc}
    .panel-info{border-color:#000}#zwibbler_11{width:100%!important}.times{background:#000;color:#fff;width:119px!important;border-radius:10px;font-size:80px!important;text-align:-webkit-center;padding:7px;font-family:'Allerta Stencil'}.times_text{font-size:18px!important;position:relative;top:0;text-align:-webkit-center;font-family:Orbitron}.voice_over{width:50px;height:50px;border-radius:30px;background:#f44336;border:1px solid red;color:#fff;font-size:20px;text-align:center;outline:0;float:left;position:absolute;left:-24px;top:-18px;border:8px solid #fff}
    .voice_over:focus{outline:0}.wrs_tickContainer{display:none}.wrs_modal_dialogContainer{z-index:999999999!important;top:30%;left:35%}zwibbler{position:absolute;left:0;right:0;top:0;bottom:0;display:flex;flex-flow:row nowrap}.tools{background:#f5f5f5;flex:0 0 203px;display:flex;flex-flow:column nowrap;overflow-y:scroll;padding:10px;font-family:Ubuntu}[z-canvas]{flex:1 1 auto}.tools button{font-family:inherit;font-size:100%;padding:5px;display:block;background-color:#fff;border:none;border-radius:2px;border-bottom:2px solid #ddd;width:100%}.tools button[tool]{display:inline-block;width:60px;height:60px;font-size:30px}.tools button.option{border:0;padding:10px;border-radius:3px;background:0 0;text-align:left}
    .tools button.selected{background:#dbe6d7}.tools button.hover{background:#ddd}.tools hr{border:none;border-top:1px solid #ccc}.tools select{width:100%}[swatch]{border:1px solid #000;display:inline-block;height:2em;width:4em;vertical-align:middle;margin-right:10px}.colour-picker{padding:10px 0}.pages{flex:0 0 100px;background:#ccc;display:flex;flex-flow:row nowrap;overflow-x:scroll;overflow-y:hidden;align-items:center}.page{border:3px solid transparent;margin:5px;display:inline-block;box-shadow:2px 2px 2px rgba(0,0,0,.2)}.page.selected{border:3px solid orange}[z-popup]{background:#ccc;padding:10px;box-shadow:2px 2px 2px rgba(0,0,.2)}.panel-title>p{display:inline-block}.panel-body{padding:5px!important}
    .badge_ui{float:right;position:relative;top:-28px}
    
</style>

<div class="header_assess">
  <h1 style="color:white !important;"><?php echo $assessment_row->assessment_title; ?></h1>
</div>
<div class="container container_self">
    <div class="panel panel-info panel_self">
        <div class="panel-group joined" id="accordion-test-2">
            <div class="">    
                <?php
                $i = 0;
                if(count($assessments) > 0){
                foreach($assessments as $row)
                {
                    $i++;
                ?>
                <!--<div class="panel-heading">-->
                      <h4 class="panel-title"> 
                          <a>
                            <b><?php echo "Q # ".$i.": ".$row['question_text']; ?></b>
                          </a>
                      </h4>
                      <?php echo "<span class='badge badge-primary badge_ui'>Total Marks : ".$row['question_total_marks']. "</span>"; ?>
                <!--</div>-->
                <!--<div id="collapse-<?php echo $i; ?>" class="panel-collapse " aria-expanded="true" style="height: auto;"> -->
                <div class="panel-body">
                    <p>
                        <?php 
                       
                       if($row['question_type_id'] == 1)
                       {
                            $question_options = get_question_options($row['question_id']);
                            $j = 0;
                            foreach($question_options as $options)
                            {
                            $j++;
                        ?>
                            <label class="radio-inline">
                            <input type="radio" id="answer_<?php echo $count.'_'.$j ?>" value="<?php echo $options['option_number']?>" name="answer_<?php echo $count; ?>"><?php echo $options['option_text']; ?>
                            </label>
                        <?php
                            }
                            
                       }elseif($row['question_type_id'] == 2){
                        ?>
                            <label class="radio-inline">
                            <input type="radio" id="answer_<?php echo $count.'_'.$j ?>" value="true" name="answer_<?php echo $count; ?>">True
                            </label>
                            
                            <label class="radio-inline">
                            <input type="radio" id="answer_<?php echo $count.'_'.$j ?>" value="false" name="answer_<?php echo $count; ?>">False
                            </label>
                        <?php
                       }elseif($row['question_type_id'] == 6){
                           $img_url = get_question_img_url($row['question_id']);
                           //$img_link = base_url()."uploads/".$_SESSION['folder_name']."/pictorial_question/".$img_url;
                           echo  "<img height='350' width='350' src='".base_url()."uploads/".$_SESSION['folder_name']."/pictorial_question/".$img_url."'/>";
                           
                        }
                       ?>
                    </p>
                </div>
                <!--</div>-->
                <hr>
                <?php } }else{ ?>
                    <div class="text-center p-4">
                        <i class="fas fa-poll-h" style="font-size:250px;color:#0073b7;text-shadow:2px 11px 8px #ccc;"></i>
                        <h2><b>No Result Found</b></h2>
                        <a href="https://indiciedu.com.pk/student/assessment/assessment_result" style="color:blue;"> <b>Go To Results Page <i class="fas fa-long-arrow-alt-right"></i></b></a>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>