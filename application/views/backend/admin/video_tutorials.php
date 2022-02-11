<style>
.myerror {
    color: red !important;
}
.expended{
    line-height:2.428571;
    background:#00bee7;
    box-shadow: 2px 1px 9px 2px
}
</style>
    <?php
        if ( $this->session->flashdata( 'club_updated' ) ) {
        echo '<div align="center">
	<div class="alert alert-success alert-dismissable">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
	' . $this->session->flashdata( 'club_updated' ) . '
	</div> 
	</div>';
    }
        if ( $this->session->flashdata( 'error_msg' ) ) {
	echo '<div align="center">
	<div class="alert alert-danger alert-dismissable">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
	' . $this->session->flashdata( 'error_msg' ) . '
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
                 <?php echo get_phrase('video_tutorials');?>
            </h3>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tabs-vertical-env">
                <ul class="nav tabs-vertical" data-step="1" data-position="top" data-intro="choose portal, then you see their modules">
                    <li class="expended active">
                        <a href="#v-admin" data-toggle="tab" aria-expanded="true"><h4>Admin Panel</h4></a>
                    </li>
                    <li class="expended">
                        <a href="#v-teacher" data-toggle="tab" aria-expanded="false"><h4>Teacher Panel</h4></a>
                    </li>
                    <li class="expended">
                        <a href="#v-student" data-toggle="tab" aria-expanded="false"><h4>Student Panel</h4></a>
                    </li>
                    <li class="expended">
                        <a href="#v-parent" data-toggle="tab" aria-expanded="false"><h4>Parent Parent</h4></a>
                    </li>
                </ul>
                <div class="tab-content">
                <div class="tab-pane active" id="v-admin">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel-group" id="accordion-test"> 
                                <div class="panel panel-default" data-step="2" data-position="top" data-intro="collapse this option then you can see their sub menus">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion-test" href="#school_managment" aria-expanded="false" class="collapsed">
                                                <i class="entypo-down-open"></i>
                                                School Management
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="school_managment" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                                        <div class="panel-body">
                                            <div id="list-1" class="nested-list dd with-margins">
                                                <ul class="dd-list">
                                                    <li class="dd-item">
                                                        <div class="dd-handle">
                                                            1. <a class="openpop" data-toggle="modal" data-target="#exampleModal" href="https://screencast-o-matic.com/watch/cri26tViIpE">School Configuration</a>
                                                        </div>
                                                    </li>
                                                    <li class="dd-item">
                                                        <div class="dd-handle">
                                                            2. <a class="openpop" data-toggle="modal" data-target="#exampleModal" href="https://screencast-o-matic.com/watch/cri2XRViI8c">Landing Page</a>
                                                        </div>
                                                    </li>
                                                    <li class="dd-item">
                                                        <div class="dd-handle">
                                                            3. <a href="" target="_blank">Import Data</a>
                                                        </div>
                                                    </li>
                                                    <li class="dd-item">
                                                        <div class="dd-handle">
                                                            4. <a class="openpop" data-toggle="modal" data-target="#exampleModal" href="https://screencast-o-matic.com/watch/cri2QyViI4N">City Locations</a>
                                                        </div>
                                                    </li>
                                                    <li class="dd-item">
                                                        <div class="dd-handle">
                                                            5. <a class="openpop" data-toggle="modal" data-target="#exampleModal" href="https://screencast-o-matic.com/watch/criofXViDjM">School Policies</a>
                                                        </div>
                                                    </li>
                                                    <li class="dd-item">
                                                        <div class="dd-handle">
                                                            6. <a class="openpop" data-toggle="modal" data-target="#exampleModal" href="">Events Announcement</a>
                                                        </div>
                                                    </li>
                                                    <li class="dd-item">
                                                        <div class="dd-handle">
                                                            7. <a class="openpop" data-toggle="modal" data-target="#exampleModal" href="">Academic Year & Terms</a>
                                                        </div>
                                                    </li>
                                                    <li class="dd-item">
                                                        <div class="dd-handle">
                                                            8. <a class="openpop" data-toggle="modal" data-target="#exampleModal" href="https://screencast-o-matic.com/watch/cri2QUViI4I">School Vacations</a>
                                                        </div>
                                                    </li>
                                                    <li class="dd-item">
                                                        <div class="dd-handle">
                                                            9. <a class="openpop" data-toggle="modal" data-target="#exampleModal" href="https://screencast-o-matic.com/watch/cri210ViI6k">Leave Categories</a>
                                                        </div>
                                                    </li>
                                                    <li class="dd-item">
                                                        <div class="dd-handle">
                                                            10. <a class="openpop" data-toggle="modal" data-target="#exampleModal" href="https://screencast-o-matic.com/watch/cri21qViI6I">Departments</a>
                                                        </div>
                                                    </li>
                                                    <li class="dd-item">
                                                        <div class="dd-handle">
                                                            11. <a class="openpop" data-toggle="modal" data-target="#exampleModal" href="https://screencast-o-matic.com/watch/cri21xViIXu">Classes</a>
                                                        </div>
                                                    </li>
                                                    <li class="dd-item">
                                                        <div class="dd-handle">
                                                            12. <a class="openpop" data-toggle="modal" data-target="#exampleModal" href="https://screencast-o-matic.com/watch/cri2iqViIb3">Sections</a>
                                                        </div>
                                                    </li>
                                                    <li class="dd-item">
                                                        <div class="dd-handle">
                                                            13. <a class="openpop" data-toggle="modal" data-target="#exampleModal" href="https://screencast-o-matic.com/watch/cri2itViIFU">Student Category</a>
                                                        </div>
                                                    </li>
                                                    <li class="dd-item">
                                                        <div class="dd-handle">
                                                            14. <a class="openpop" data-toggle="modal" data-target="#exampleModal" href="">Subjects</a>
                                                        </div>
                                                    </li>
                                                    <li class="dd-item">
                                                        <div class="dd-handle">
                                                            15. <a class="openpop" data-toggle="modal" data-target="#exampleModal" href="">Manage Time Table</a>
                                                        </div>
                                                    </li>
                                                    <li class="dd-item">
                                                        <div class="dd-handle">
                                                            16. <a class="openpop" data-toggle="modal" data-target="#exampleModal" href="">Assign Substitute Teacher</a>
                                                        </div>
                                                    </li>
                                                    <li class="dd-item">
                                                        <div class="dd-handle">
                                                            17. <a class="openpop" data-toggle="modal" data-target="#exampleModal" href="">Teacher Class Swapping</a>
                                                        </div>
                                                    </li>
                                                    <li class="dd-item">
                                                        <div class="dd-handle">
                                                            18. <a class="openpop" data-toggle="modal" data-target="#exampleModal" href="">Student Evaluation Settings</a>
                                                        </div>
                                                    </li>
                                                    <li class="dd-item">
                                                        <div class="dd-handle">
                                                            19. <a class="openpop" data-toggle="modal" data-target="#exampleModal" href="">Staff Evaluation Settings</a>
                                                        </div>
                                                    </li>
                                                    <li class="dd-item">
                                                        <div class="dd-handle">
                                                            20. <a class="openpop" data-toggle="modal" data-target="#exampleModal" href="https://screencast-o-matic.com/watch/cri2QKViIzS">Preferences</a>
                                                        </div>
                                                    </li>
                                                    <li class="dd-item">
                                                        <div class="dd-handle">
                                                            21. <a class="openpop" data-toggle="modal" data-target="#exampleModal" href="https://youtu.be/ngI-THGMD3A">General Inquiries</a>
                                                        </div>
                                                    </li>
                                                    <li class="dd-item">
                                                        <div class="dd-handle">
                                                            22. <a class="openpop" data-toggle="modal" data-target="#exampleModal" href="">Admission Inquiries</a>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion-test" href="#account_managment" class="collapsed" aria-expanded="false">
                                                <i class="entypo-down-open"></i>
                                                Account Management
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="account_managment" class="panel-collapse collapse" aria-expanded="false">
                                        <div class="panel-body">
                                             <div id="list-1" class="nested-list dd with-margins">
                                                <ul class="dd-list">
                                                    <li class="dd-item">
                                                        <div class="dd-handle">
                                                            1. <a class="openpop" data-toggle="modal" data-target="#exampleModal" href="">Chart Of Accounts</a>
                                                        </div>
                                                    </li>
                                                    <li class="dd-item">
                                                        <div class="dd-handle">
                                                            2. <a class="openpop" data-toggle="modal" data-target="#exampleModal" href="">Bank Accounts</a>
                                                        </div>
                                                    </li>
                                                    <li class="dd-item">
                                                        <div class="dd-handle">
                                                            3. <a class="openpop" data-toggle="modal" data-target="#exampleModal" href="https://www.youtube.com/watch?v=ngI-THGMD3A">Depositor</a>
                                                        </div>
                                                    </li>
                                                    <li class="dd-item">
                                                        <div class="dd-handle">
                                                            4. <a class="openpop" data-toggle="modal" data-target="#exampleModal" href="">Supplier</a>
                                                        </div>
                                                    </li>
                                                    <li class="dd-item">
                                                        <div class="dd-handle">
                                                            5. <a class="openpop" data-toggle="modal" data-target="#exampleModal" href="">Vouchers</a>
                                                        </div>
                                                    </li>
                                                    <li class="dd-item">
                                                        <div class="dd-handle">
                                                            6. <a class="openpop" data-toggle="modal" data-target="#exampleModal" href="">Miscellaneous settings</a>
                                                        </div>
                                                    </li>
                                                    <li class="dd-item">
                                                        <div class="dd-handle">
                                                            7. <a class="openpop" data-toggle="modal" data-target="#exampleModal" href="">Financial Report Settings </a>
                                                        </div>
                                                    </li>
                                                    <li class="dd-item">
                                                        <div class="dd-handle">
                                                            8. <a class="openpop" data-toggle="modal" data-target="#exampleModal" href="">Fee Types</a>
                                                        </div>
                                                    </li>
                                                    <li class="dd-item">
                                                        <div class="dd-handle">
                                                            9. <a class="openpop" data-toggle="modal" data-target="#exampleModal" href="">Discount Types</a>
                                                        </div>
                                                    </li>
                                                    <li class="dd-item">
                                                        <div class="dd-handle">
                                                            10. <a class="openpop" data-toggle="modal" data-target="#exampleModal" href="">Challan Form Layout</a>
                                                        </div>
                                                    </li>
                                                    <li class="dd-item">
                                                        <div class="dd-handle">
                                                            11. <a class="openpop" data-toggle="modal" data-target="#exampleModal" href="">Manage Challan Form</a>
                                                        </div>
                                                    </li>
                                                    <li class="dd-item">
                                                        <div class="dd-handle">
                                                            12. <a class="openpop" data-toggle="modal" data-target="#exampleModal" href="">Ledger</a>
                                                        </div>
                                                    </li>
                                                    <li class="dd-item">
                                                        <div class="dd-handle">
                                                            13. <a class="openpop" data-toggle="modal" data-target="#exampleModal" href="">Trial Balance</a>
                                                        </div>
                                                    </li>
                                                    <li class="dd-item">
                                                        <div class="dd-handle">
                                                            14. <a class="openpop" data-toggle="modal" data-target="#exampleModal" href="">Income Statement</a>
                                                        </div>
                                                    </li>
                                                    <li class="dd-item">
                                                        <div class="dd-handle">
                                                            15. <a class="openpop" data-toggle="modal" data-target="#exampleModal" href="">Balance Sheet</a>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion-test" href="#staff_managment" class="collapsed" aria-expanded="false">
                                                <i class="entypo-down-open"></i>
                                                Staff Management
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="staff_managment" class="panel-collapse collapse" aria-expanded="false">
                                        <div class="panel-body">
                                            <div id="list-1" class="nested-list dd with-margins">
                                                <ul class="dd-list">
                                                    
                                                    <li class="dd-item">
                                                        <div class="dd-handle">
                                                            1. <a class="openpop" data-toggle="modal" data-target="#exampleModal" href="https://screencast-o-matic.com/watch/criI1AVi6iY">Designations</a>
                                                        </div>
                                                    </li>
                                                    
                                                    <li class="dd-item">
                                                        <div class="dd-handle">
                                                            2. <a class="openpop" data-toggle="modal" data-target="#exampleModal" href="https://screencast-o-matic.com/watch/criIleVi6Jy">Staff</a>
                                                        </div>
                                                    </li>
                                                    
                                                    <li class="dd-item">
                                                        <div class="dd-handle">
                                                            3. <a class="openpop" data-toggle="modal" data-target="#exampleModal" href="https://screencast-o-matic.com/watch/cri2fvVilWb">Teachers</a>
                                                        </div>
                                                    </li>
                                                    
                                                    <li class="dd-item">
                                                        <div class="dd-handle">
                                                            4. <a class="openpop" data-toggle="modal" data-target="#exampleModal" href="https://screencast-o-matic.com/watch/criI1CVi6iP">Mark Staff Attendance</a>
                                                        </div>
                                                    </li>
                                                    
                                                    <li class="dd-item">
                                                        <div class="dd-handle">
                                                            5. <a class="openpop" data-toggle="modal" data-target="#exampleModal" href="https://screencast-o-matic.com/watch/criIifVi66Y">View Staff Attendance</a>
                                                        </div>
                                                    </li>
                                                    
                                                    <li class="dd-item">
                                                        <div class="dd-handle">
                                                            6. <a class="openpop" data-toggle="modal" data-target="#exampleModal" href="https://screencast-o-matic.com/watch/criI1PVi6QU">Attendance Summary</a>
                                                        </div>
                                                    </li>
                                                    
                                                    <li class="dd-item">
                                                        <div class="dd-handle">
                                                            7. <a class="openpop" data-toggle="modal" data-target="#exampleModal" href="https://screencast-o-matic.com/watch/criI1wVi61B">Staff Leaves</a>
                                                        </div>
                                                    </li>
                                                    
                                                    <li class="dd-item">
                                                        <div class="dd-handle">
                                                            8. <a class="openpop" data-toggle="modal" data-target="#exampleModal" href="#">Staff Evaluation</a>
                                                        </div>
                                                    </li>
                                                    
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion-test" href="#student_managment" class="collapsed" aria-expanded="false">
                                                <i class="entypo-down-open"></i>
                                                Student Management
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="student_managment" class="panel-collapse collapse" aria-expanded="false">
                                        <div class="panel-body">
                                            <div id="list-1" class="nested-list dd with-margins">
                                                <ul class="dd-list">
                                                    
                                                    <li class="dd-item">
                                                        <div class="dd-handle">
                                                            1. <a class="openpop" data-toggle="modal" data-target="#exampleModal" href="https://screencast-o-matic.com/watch/cri11mV1N1m">New Admission</a>
                                                        </div>
                                                    </li>
                                                    
                                                    <li class="dd-item">
                                                        <div class="dd-handle">
                                                            2. <a class="openpop" data-toggle="modal" data-target="#exampleModal" href="https://screencast-o-matic.com/watch/criiltV19xe">Candidates</a>
                                                        </div>
                                                    </li>
                                                    
                                                    <li class="dd-item">
                                                        <div class="dd-handle">
                                                            3. <a class="openpop" data-toggle="modal" data-target="#exampleModal" href="https://screencast-o-matic.com/watch/criQlfVinDB">Students</a>
                                                        </div>
                                                    </li>
                                                    
                                                    <li class="dd-item">
                                                        <div class="dd-handle">
                                                            4. <a class="openpop" data-toggle="modal" data-target="#exampleModal" href="https://screencast-o-matic.com/watch/cr1r63V1Fqm">Monthly Challans</a>
                                                        </div>
                                                    </li>
                                                    
                                                    <li class="dd-item">
                                                        <div class="dd-handle">
                                                            5. <a class="openpop" data-toggle="modal" data-target="#exampleModal" href="#">Class Promotions</a>
                                                        </div>
                                                    </li>
                                                    
                                                    <li class="dd-item">
                                                        <div class="dd-handle">
                                                            6. <a class="openpop" data-toggle="modal" data-target="#exampleModal" href="#">Withdrawls List</a>
                                                        </div>
                                                    </li>
                                                    
                                                    <li class="dd-item">
                                                        <div class="dd-handle">
                                                            7. <a class="openpop" data-toggle="modal" data-target="#exampleModal" href="#">Transfer Requests</a>
                                                        </div>
                                                    </li>
                                                    
                                                    <li class="dd-item">
                                                        <div class="dd-handle">
                                                            8. <a class="openpop" data-toggle="modal" data-target="#exampleModal" href="#">Admin Transfer Approval</a>
                                                        </div>
                                                    </li>
                                                    
                                                    <li class="dd-item">
                                                        <div class="dd-handle">
                                                            9. <a class="openpop" data-toggle="modal" data-target="#exampleModal" href="#">Receiving Transfer List</a>
                                                        </div>
                                                    </li>
                                                    
                                                    <li class="dd-item">
                                                        <div class="dd-handle">
                                                            10. <a class="openpop" data-toggle="modal" data-target="#exampleModal" href="https://screencast-o-matic.com/watch/cri1QCV1NZT">Manage Student Attendance</a>
                                                        </div>
                                                    </li>
                                                    
                                                    <li class="dd-item">
                                                        <div class="dd-handle">
                                                            11. <a class="openpop" data-toggle="modal" data-target="#exampleModal" href="https://screencast-o-matic.com/watch/criihCV1PKa">SubjectWise Student Attendance</a>
                                                        </div>
                                                    </li>
                                                    
                                                    <li class="dd-item">
                                                        <div class="dd-handle">
                                                            12. <a class="openpop" data-toggle="modal" data-target="#exampleModal" href="https://screencast-o-matic.com/watch/criihzV1PdW">View Student Attendance</a>
                                                        </div>
                                                    </li>
                                                    
                                                    <li class="dd-item">
                                                        <div class="dd-handle">
                                                            13. <a class="openpop" data-toggle="modal" data-target="#exampleModal" href="https://screencast-o-matic.com/watch/criihtV1Pdj">View Attendance Summary</a>
                                                        </div>
                                                    </li>
                                                    
                                                    <li class="dd-item">
                                                        <div class="dd-handle">
                                                            14. <a class="openpop" data-toggle="modal" data-target="#exampleModal" href="https://screencast-o-matic.com/watch/criihwV1Pdv">DateWise Attendance Summary</a>
                                                        </div>
                                                    </li>
                                                    
                                                    <li class="dd-item">
                                                        <div class="dd-handle">
                                                            15. <a class="openpop" data-toggle="modal" data-target="#exampleModal" href="https://screencast-o-matic.com/watch/criif4V1PE9">Manage Student Leave</a>
                                                        </div>
                                                    </li>
                                                    
                                                    <li class="dd-item">
                                                        <div class="dd-handle">
                                                            16. <a class="openpop" data-toggle="modal" data-target="#exampleModal" href="https://screencast-o-matic.com/watch/criiXnV19ru">Exams List</a>
                                                        </div>
                                                    </li>
                                                    
                                                    <li class="dd-item">
                                                        <div class="dd-handle">
                                                            17. <a class="openpop" data-toggle="modal" data-target="#exampleModal" href="https://screencast-o-matic.com/watch/criiXiV193c">Manage Date Sheet</a>
                                                        </div>
                                                    </li>
                                                    
                                                    <li class="dd-item">
                                                        <div class="dd-handle">
                                                            18. <a class="openpop" data-toggle="modal" data-target="#exampleModal" href="https://screencast-o-matic.com/watch/criiXoV1939">Exam Grades</a>
                                                        </div>
                                                    </li>
                                                    
                                                    <li class="dd-item">
                                                        <div class="dd-handle">
                                                            19. <a class="openpop" data-toggle="modal" data-target="#exampleModal" href="https://screencast-o-matic.com/watch/criQfzViVxJ">Manage Marks</a>
                                                        </div>
                                                    </li>
                                                    
                                                    <li class="dd-item">
                                                        <div class="dd-handle">
                                                            20. <a class="openpop" data-toggle="modal" data-target="#exampleModal" href="https://screencast-o-matic.com/watch/criQfuViVxl">Exam Results</a>
                                                        </div>
                                                    </li>
                                                    
                                                    <li class="dd-item">
                                                        <div class="dd-handle">
                                                            21. <a class="openpop" data-toggle="modal" data-target="#exampleModal" href="https://screencast-o-matic.com/watch/criiQ3V19Qq">View Assessments</a>
                                                        </div>
                                                    </li>
                                                    
                                                    <li class="dd-item">
                                                        <div class="dd-handle">
                                                            22. <a class="openpop" data-toggle="modal" data-target="#exampleModal" href="https://screencast-o-matic.com/watch/criif2V1P56">Exam & Assessment Weightage</a>
                                                        </div>
                                                    </li>
                                                    
                                                    <li class="dd-item">
                                                        <div class="dd-handle">
                                                            23. <a class="openpop" data-toggle="modal" data-target="#exampleModal" href="#">Student Evaluation</a>
                                                        </div>
                                                    </li>
                                                    
                                                    <li class="dd-item">
                                                        <div class="dd-handle">
                                                            24. <a class="openpop" data-toggle="modal" data-target="#exampleModal" href="https://screencast-o-matic.com/watch/criilJV194s">Student Credentials</a>
                                                        </div>
                                                    </li>
                                                    
                                                    <li class="dd-item">
                                                        <div class="dd-handle">
                                                            25. <a class="openpop" data-toggle="modal" data-target="#exampleModal" href="https://screencast-o-matic.com/watch/criihdV1P7V">Admission Status Report</a>
                                                        </div>
                                                    </li>
                                                    
                                                    <li class="dd-item">
                                                        <div class="dd-handle">
                                                            26. <a class="openpop" data-toggle="modal" data-target="#exampleModal" href="https://screencast-o-matic.com/watch/criihiV1PHT">Class Leave</a>
                                                        </div>
                                                    </li>
                                                    
                                                    <li class="dd-item">
                                                        <div class="dd-handle">
                                                            27. <a class="openpop" data-toggle="modal" data-target="#exampleModal" href="https://screencast-o-matic.com/watch/cr1uiFV1a8K">Student Fee Setting(Discount/Custom Fee)</a>
                                                        </div>
                                                    </li>
                                                    
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion-test" href="#virtual_classes" class="collapsed" aria-expanded="false">
                                                <i class="entypo-down-open"></i>
                                                Virtual Class
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="virtual_classes" class="panel-collapse collapse" aria-expanded="false">
                                        <div class="panel-body">
                                            <div id="list-1" class="nested-list dd with-margins">
                                                <ul class="dd-list">
                                                    <li class="dd-item">
                                                        <div class="dd-handle">
                                                            1. <a class="openpop" data-toggle="modal" data-target="#exampleModal" href="">Create Virtual Class</a>
                                                        </div>
                                                    </li>
                                                    <li class="dd-item">
                                                        <div class="dd-handle">
                                                            2. <a class="openpop" data-toggle="modal" data-target="#exampleModal" href="">Join Virtual Class</a>
                                                        </div>
                                                    </li>
                                                    <li class="dd-item">
                                                        <div class="dd-handle">
                                                            3. <a class="openpop" data-toggle="modal" data-target="#exampleModal" href="">Current Classes</a>
                                                        </div>
                                                    </li>
                                                    <li class="dd-item">
                                                        <div class="dd-handle">
                                                            4. <a class="openpop" data-toggle="modal" data-target="#exampleModal" href="">Complete Classes</a>
                                                        </div>
                                                    </li>
                                                    <li class="dd-item">
                                                        <div class="dd-handle">
                                                            5. <a class="openpop" data-toggle="modal" data-target="#exampleModal" href="">Virtual Class Recording</a>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion-test" href="#others" class="collapsed" aria-expanded="false">
                                                <i class="entypo-down-open"></i>
                                                Others
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="others" class="panel-collapse collapse" aria-expanded="false">
                                        <div class="panel-body">
                                            <div id="list-1" class="nested-list dd with-margins">
                                                <ul class="dd-list">
                                                    <li class="dd-item">
                                                        <div class="dd-handle">
                                                            1. <a class="openpop" data-toggle="modal" data-target="#exampleModal" href="">Notices And Circulars</a>
                                                        </div>
                                                    </li>
                                                    <li class="dd-item">
                                                        <div class="dd-handle">
                                                            2. <a class="openpop" data-toggle="modal" data-target="#exampleModal" href="">My Profile</a>
                                                        </div>
                                                    </li>
                                                    <li class="dd-item">
                                                        <div class="dd-handle">
                                                            3. <a class="openpop" data-toggle="modal" data-target="#exampleModal" href="">Branches</a>
                                                        </div>
                                                    </li>
                                                    <li class="dd-item">
                                                        <div class="dd-handle">
                                                            4. <a class="openpop" data-toggle="modal" data-target="#exampleModal" href="">Messages</a>
                                                        </div>
                                                    </li>
                                                    <li class="dd-item">
                                                        <div class="dd-handle">
                                                            5. <a class="openpop" data-toggle="modal" data-target="#exampleModal" href="">Backup</a>
                                                        </div>
                                                    </li>
                                                    <li class="dd-item">
                                                        <div class="dd-handle">
                                                            6. <a class="openpop" data-toggle="modal" data-target="#exampleModal" href="">Manage System Support</a>
                                                        </div>
                                                    </li>
                                                    <li class="dd-item">
                                                        <div class="dd-handle">
                                                            7. <a class="openpop" data-toggle="modal" data-target="#exampleModal" href="">System Administration</a>
                                                        </div>
                                                    </li>
                                                    <li class="dd-item">
                                                        <div class="dd-handle">
                                                            8. <a class="openpop" data-toggle="modal" data-target="#exampleModal" href="">Reports</a>
                                                        </div>
                                                    </li>
                                                    <li class="dd-item">
                                                        <div class="dd-handle">
                                                            9. <a class="openpop" data-toggle="modal" data-target="#exampleModal" href="">Branch Reports</a>
                                                        </div>
                                                    </li>
                                                    
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="v-teacher"> 
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel-group" id="accordion-teacher">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion-teacher" href="#teacher" aria-expanded="false" class="collapsed">
                                                <i class="entypo-down-open"></i>
                                                Teacher Portal
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="teacher" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                                        <div class="panel-body">
                                            <div id="list-1" class="nested-list dd with-margins">
                                                <ul class="dd-list">
                                                    <li class="dd-item">
                                                        <div class="dd-handle">
                                                            1. <a class="openpop" data-toggle="modal" data-target="#exampleModal" href="">Dashboard</a>
                                                        </div>
                                                    </li>
                                                    <li class="dd-item">
                                                        <div class="dd-handle">
                                                            2. <a class="openpop" data-toggle="modal" data-target="#exampleModal" href="">School Policies</a>
                                                        </div>
                                                    </li>
                                                    <li class="dd-item">
                                                        <div class="dd-handle">
                                                            3. <a href="" target="_blank">Timetable</a>
                                                        </div>
                                                    </li>
                                                    <li class="dd-item">
                                                        <div class="dd-handle">
                                                            4. <a class="openpop" data-toggle="modal" data-target="#exampleModal" href="">Attendance</a>
                                                        </div>
                                                    </li>
                                                    <li class="dd-item">
                                                        <div class="dd-handle">
                                                            5. <a class="openpop" data-toggle="modal" data-target="#exampleModal" href="">Manage Diary</a>
                                                        </div>
                                                    </li>
                                                    <li class="dd-item">
                                                        <div class="dd-handle">
                                                            6. <a class="openpop" data-toggle="modal" data-target="#exampleModal" href="">Academic Planner</a>
                                                        </div>
                                                    </li>
                                                    <li class="dd-item">
                                                        <div class="dd-handle">
                                                            7. <a class="openpop" data-toggle="modal" data-target="#exampleModal" href="">Leave Request</a>
                                                        </div>
                                                    </li>
                                                    <li class="dd-item">
                                                        <div class="dd-handle">
                                                            8. <a class="openpop" data-toggle="modal" data-target="#exampleModal" href="">Exams</a>
                                                        </div>
                                                    </li>
                                                    <li class="dd-item">
                                                        <div class="dd-handle">
                                                            9. <a class="openpop" data-toggle="modal" data-target="#exampleModal" href="">Manage Assessments</a>
                                                        </div>
                                                    </li>
                                                    <li class="dd-item">
                                                        <div class="dd-handle">
                                                            10. <a class="openpop" data-toggle="modal" data-target="#exampleModal" href="">Notices & Circulars</a>
                                                        </div>
                                                    </li>
                                                    <li class="dd-item">
                                                        <div class="dd-handle">
                                                            11. <a class="openpop" data-toggle="modal" data-target="#exampleModal" href="">View / Sens Message</a>
                                                        </div>
                                                    </li>
                                                    <li class="dd-item">
                                                        <div class="dd-handle">
                                                            12. <a class="openpop" data-toggle="modal" data-target="#exampleModal" href="">My Profile</a>
                                                        </div>
                                                    </li>
                                                    
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="v-student">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel-group" id="accordion-student">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion-student" href="#student" aria-expanded="false" class="collapsed">
                                                <i class="entypo-down-open"></i>
                                                Student Portal
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="student" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                                        <div class="panel-body">
                                            <div id="list-1" class="nested-list dd with-margins">
                                                <ul class="dd-list">
                                                    <li class="dd-item">
                                                        <div class="dd-handle">
                                                            1. <a class="openpop" data-toggle="modal" data-target="#exampleModal" href="">Dashboard</a>
                                                        </div>
                                                    </li>
                                                    <li class="dd-item">
                                                        <div class="dd-handle">
                                                            2. <a class="openpop" data-toggle="modal" data-target="#exampleModal" href="">School Policies</a>
                                                        </div>
                                                    </li>
                                                    <li class="dd-item">
                                                        <div class="dd-handle">
                                                            3. <a href="" target="_blank">Class Diary</a>
                                                        </div>
                                                    </li>
                                                    <li class="dd-item">
                                                        <div class="dd-handle">
                                                            4. <a class="openpop" data-toggle="modal" data-target="#exampleModal" href="">Notices & Circulars</a>
                                                        </div>
                                                    </li>
                                                    <li class="dd-item">
                                                        <div class="dd-handle">
                                                            5. <a class="openpop" data-toggle="modal" data-target="#exampleModal" href="">Attendance</a>
                                                        </div>
                                                    </li>
                                                    <li class="dd-item">
                                                        <div class="dd-handle">
                                                            6. <a class="openpop" data-toggle="modal" data-target="#exampleModal" href="">Timetable</a>
                                                        </div>
                                                    </li>
                                                    <li class="dd-item">
                                                        <div class="dd-handle">
                                                            7. <a class="openpop" data-toggle="modal" data-target="#exampleModal" href="">Exams</a>
                                                        </div>
                                                    </li>
                                                    <li class="dd-item">
                                                        <div class="dd-handle">
                                                            8. <a class="openpop" data-toggle="modal" data-target="#exampleModal" href="">Manage Assessments</a>
                                                        </div>
                                                    </li>
                                                    <li class="dd-item">
                                                        <div class="dd-handle">
                                                            9. <a class="openpop" data-toggle="modal" data-target="#exampleModal" href="">Virtual Class Recordings</a>
                                                        </div>
                                                    </li>
                                                    <li class="dd-item">
                                                        <div class="dd-handle">
                                                            10. <a class="openpop" data-toggle="modal" data-target="#exampleModal" href="">My Profile</a>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="v-parent"> 
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel-group" id="accordion-parent">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion-parent" href="#parent" aria-expanded="false" class="collapsed">
                                                <i class="entypo-down-open"></i>
                                                Parent Portal
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="parent" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                                        <div class="panel-body">
                                            <div id="list-1" class="nested-list dd with-margins">
                                                <ul class="dd-list">
                                                    <li class="dd-item">
                                                        <div class="dd-handle">
                                                            1. <a class="openpop" data-toggle="modal" data-target="#exampleModal" href="">Dashboard</a>
                                                        </div>
                                                    </li>
                                                    <li class="dd-item">
                                                        <div class="dd-handle">
                                                            2. <a class="openpop" data-toggle="modal" data-target="#exampleModal" href="">School Policies</a>
                                                        </div>
                                                    </li>
                                                    <li class="dd-item">
                                                        <div class="dd-handle">
                                                            3. <a href="" target="_blank">Class Diary</a>
                                                        </div>
                                                    </li>
                                                    <li class="dd-item">
                                                        <div class="dd-handle">
                                                            4. <a class="openpop" data-toggle="modal" data-target="#exampleModal" href="">Notices & Circulars</a>
                                                        </div>
                                                    </li>
                                                    <li class="dd-item">
                                                        <div class="dd-handle">
                                                            5. <a class="openpop" data-toggle="modal" data-target="#exampleModal" href="">Attendance</a>
                                                        </div>
                                                    </li>
                                                    <li class="dd-item">
                                                        <div class="dd-handle">
                                                            6. <a class="openpop" data-toggle="modal" data-target="#exampleModal" href="">Timetable</a>
                                                        </div>
                                                    </li>
                                                    <li class="dd-item">
                                                        <div class="dd-handle">
                                                            7. <a class="openpop" data-toggle="modal" data-target="#exampleModal" href="">Message</a>
                                                        </div>
                                                    </li>
                                                    <li class="dd-item">
                                                        <div class="dd-handle">
                                                            8. <a class="openpop" data-toggle="modal" data-target="#exampleModal" href="">Payment</a>
                                                        </div>
                                                    </li>
                                                    <li class="dd-item">
                                                        <div class="dd-handle">
                                                            9. <a class="openpop" data-toggle="modal" data-target="#exampleModal" href="">Exams</a>
                                                        </div>
                                                    </li>
                                                    <li class="dd-item">
                                                        <div class="dd-handle">
                                                            10. <a class="openpop" data-toggle="modal" data-target="#exampleModal" href="">Manage Assessments</a>
                                                        </div>
                                                    </li>
                                                    <li class="dd-item">
                                                        <div class="dd-handle">
                                                            10. <a class="openpop" data-toggle="modal" data-target="#exampleModal" href="">Leave Request</a>
                                                        </div>
                                                    </li>
                                                    <li class="dd-item">
                                                        <div class="dd-handle">
                                                            10. <a class="openpop" data-toggle="modal" data-target="#exampleModal" href="">Update Password</a>
                                                        </div>
                                                    </li>
                                                    <li class="dd-item">
                                                        <div class="dd-handle">
                                                            10. <a class="openpop" data-toggle="modal" data-target="#exampleModal" href="">My Profile</a>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
    
    
    <!-- Modal -->
    <!-- The Modal -->
<div class="modal" id="exampleModal">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Video Tutorials By Indici-Edu</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <div class="popup">
            <iframe src="" style="height:350px; width:100%;">
                <p>Your browser does not support iframes.</p>
            </iframe>
            <span id="framspan"></span>
        </div>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>
    <script>
        $(document).ready(function () {
            $(".popup").hide();
            $(".openpop").click(function (e) {
                e.preventDefault();
                $("iframe").attr("src",  $(this).attr('href'));
                $(".popup").fadeIn('slow');
            });
        
            $(".close").click(function () {
                $(this).parent().fadeOut("slow");
            });
        });
    </script>