<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/


Route::get('/', function () {
	return view('welcome');
});

Route::post('/login','dashboardController@login_check');

Route::post('/signup','dashboardController@signup');

Route::group(['middleware' => ['auth']], function () {

	Route::get('/dashboard','dashboardController@dashboard');
	Route::get('/logout','dashboardController@logout');

	//Function to attach role
	Route::get('/attachRole/{role}','dashboardController@attachRole');

    Route::get('/adminPanel','dashboardController@adminPanel');

    Route::get('/admin/verify','dashboardController@verifyUsers');
    Route::get('/admin/assign','dashboardController@assignRole');

    Route::post('/admin/approveStudents','dashboardController@approveStudents');
    Route::post('/admin/approveFaculties','dashboardController@approveFaculties');
    Route::post('/admin/approveStaff','dashboardController@approveStaff');

    Route::post('/student_signup','dashboardController@student_signup');
    Route::post('/faculty_signup','dashboardController@faculty_signup');
    Route::post('/staff_signup','dashboardController@staff_signup');


//---------------------------1)Routes for VH-Booking----------------------------------------
    Route::get('/vhbooking','vhbooking\VH_PagesController@portalCheck');
    Route::get('vhbooking/stakeholder','vhbooking\VH_PagesController@stakeholder');    
	Route::get('vhbooking/caretaker','vhbooking\VH_PagesController@caretaker');
	Route::get('vhbooking/incharge','vhbooking\VH_PagesController@incharge');
	Route::get('/vhbooking/bookingHistory','vhbooking\VH_PagesController@bookingHistory');
	Route::get('/vhbooking/rules','vhbooking\VH_PagesController@rules');
	Route::get('/vhbooking/complaintStatus','vhbooking\VH_PagesController@complaintStatus');
	Route::get('/vhbooking/requestForm','vhbooking\VH_PagesController@requestForm');
	Route::get('/vhbooking/complaintForm','vhbooking\VH_PagesController@complaintForm');
	Route::get('/vhbooking/respond_to_complaint','vhbooking\VH_PagesController@respond');
	//Route::get('respond_to_complaint','VH_PagesController@respond');
	Route::get('/vhbooking/bookingRequest','vhbooking\VH_PagesController@bookingRequest');
	Route::get('/vhbooking/bookingDetails','vhbooking\VH_PagesController@bookingDetails');
	Route::get('/vhbooking/roomDetailsCT','vhbooking\VH_PagesController@roomDetailsCT');
	Route::get('/vhbooking/roomDetailsVH','vhbooking\VH_PagesController@roomDetailsVH');
	Route::get('/vhbooking/approvedRooms','vhbooking\VH_PagesController@approvedRooms');
	Route::get('/vhbooking/cancelRoom','vhbooking\VH_PagesController@cancelRoom');	
	Route::get('/{id}/change','vhbooking\VH_PagesController@change');
	//Route::get('/vhbooking/changeAvailabilityCT','VH_PagesController@changeAvailabilityCT');
	
	Route::post('/addComplaint','vhbooking\VH_PagesController@addComplaint');
	Route::post('/{complaint}/addFine','vhbooking\VH_PagesController@addFine');
	Route::post('/addRequest','vhbooking\VH_FormController@store');
	Route::post('/{id}/view','vhbooking\VH_PagesController@viewVH');
	Route::post('/{id}/viewCT','vhbooking\VH_PagesController@viewCT');
	Route::post('/{id}/viewStake','vhbooking\VH_PagesController@viewStake');
	Route::post('/{id}/assignRoom','vhbooking\VH_PagesController@assignRoom');
	Route::post('/{id}/approve','vhbooking\VH_PagesController@approve');
	Route::post('/{id}/approveNot','vhbooking\VH_PagesController@approveNot');
	Route::post('/{id}/assign','vhbooking\VH_PagesController@assign');
	Route::post('/cancel','vhbooking\VH_PagesController@cancel');
	Route::post('/vhbooking/checkAvailabilityCT','vhbooking\VH_PagesController@availabilityCT');
	Route::post('/vhbooking/checkAvailabilityVH','vhbooking\VH_PagesController@availabilityVH');
//---------------------------Routes for VH-Booking end here---------------------------------

//---------------------------2)Routes for Time Table Management-----------------------------
	//Routes for Time Table module
	Route::get('/time_table_management', 'time_table_management\PagesController@index');
	
	// Related to Scheduling
	Route::get('/time_table_management/scheduleanextraclass', 'time_table_management\PagesController@scheduleanextraclass');
	Route::get('/time_table_management/scheduleanextraclass/schedule','time_table_management\PagesController@schedule');
	Route::get('/time_table_management/get_slots', 'time_table_management\AjaxController@get_slots');

	// Related to Requests
	Route::get('/time_table_management/viewmyrequests', 'time_table_management\PagesController@viewmyrequests');
	Route::get('/time_table_management/viewallrequests', 'time_table_management\PagesController@viewallrequests');
	Route::get('/time_table_management/db_update','time_table_management\AjaxController@allot_room');

	// Related to Creation, Modification and Viewing of Time Table
	Route::get('/time_table_management/creatett','time_table_management\PagesController@creatett');
	Route::get('/time_table_management/post_tt','time_table_management\PagesController@create_tt');

	Route::get('/time_table_management/view_tt', 'time_table_management\PagesController@view_tt');
	Route::get('/time_table_management/change_tt', 'time_table_management\AjaxController@change_tt');

	Route::get('/time_table_management/modify_tt', 'time_table_management\PagesController@modify_tt');

	// Related to Extra Classes
	Route::get('time_table_management/extra_classes', 'time_table_management\PagesController@extra_classes');
	Route::get('time_table_management/quizzes', 'time_table_management\PagesController@quizzes');
//---------------------------Routes for Time Table Management end here----------------------

//---------------------------3)Routes for TA Management begin here--------------------------
	Route::get('TA/','TA\CardsController@index');///Main Page -- will automatically redirect to student, Faculty or HOD.
	Route::get('TA/wele', 'dashboardController@dashboard');
	Route::get('TA/attendance','TA\CardsController@attendance');//faculty attendance page
	Route::get('TA/attendance_student','TA\CardsController@attendance_student');//student attendance page
	Route::get('TA/faculty','TA\CardsController@about');//Faculty Main Page
	Route::get('TA/taapplication','TA\CardsController@taapplication');//Student page -- Apply for TA Post Openings
	//ta application store
	Route::post('TA/store_tapplication','TA\CardsController@store_tapplication');//Post method.
	Route::post('TA/attendance_store_faculty','TA\CardsController@attendance_store_faculty');//POST method 
	Route::post('TA/store_post_opening','TA\CardsController@store_post_opening');//POST method.
	Route::get('TA/post_opening','TA\CardsController@post_opening');//Admin page-- createpost openings
	Route::get('TA/claims', 'TA\TAMainController@viewclaims');//claims of the TA
	Route::get('TA/claimform', 'TA\TAMainController@claimform');//display claim form
	Route::post('TA/addclaim','TA\TAMainController@addclaim');//save_claims 
	Route::get('TA/show_claims','TA\SupervisorController@show_claims');//show ta claims-- Faculty page
	Route::post('TA/forward_claim','TA\SupervisorController@forward_claim');//forward claim post method. -- Fcaulty page
	Route::get('TA/mnl_batch_assgn','TA\SupervisorController@mnl_batch_assgn');//Assign Batches --- Faculty page.
	Route::post('TA/save_batches','TA\SupervisorController@save_batches');//save batches -- post method
	Route::get('TA/show_batches','TA\SupervisorController@show_batches');	//show assigned batches faculty batches
	Route::get('TA/feedback','TA\SupervisorController@feedback');//show feedback page 
	Route::post('TA/save_feedback','TA\SupervisorController@save_feedback');//savefeedback post method.
	Route::get('TA/approve_claims','TA\AdminController@approve_claims');//approve claims admin hod page
	Route::post('TA/approve','TA\AdminController@approve');//post method 
	Route::get('TA/finalize-selection','TA\AdminController@finalize');//finalize seletion of ta's who have applied for the TA post
	Route::get('TA/show-tas','TA\AdminController@show_tas');//show the ta selected after the finalize selection process.
	Route::get('TA/mail','TA\TAMainController@mail');//mail system common for ta and faculty
	Route::post('TA/sendmail','TA\TAMainController@sendmail');//post method
	Route::get('TA/attendance_view','TA\CardsController@attendance_view');//view attendance 
	Route::get('TA/view_feedback','TA\AdminController@view_feedback');//view feedback admin page.
//---------------------------Routes for TA Management end here------------------------------

//---------------------------4)Routes for Hostel Complaints begin here----------------------
	Route::get('/hostelComplaints','ComplaintsController@display');
	Route::post('/hostelComplaints','ComplaintsController@store');
	Route::post('/hostelComplaints/{complaint}','ComplaintsController@update');	  
	Route::post('/Complaints','ComplaintsController@show');
//---------------------------Routes for Hostel Complaints end here--------------------------

//---------------------------5)Routes for CC Complaints begin here--------------------------
	Route::get('cc-complaint/', 'cc\PagesController@index');
	Route::post('cc-complaint/create', 'cc\CreateController@insert');
	Route::post('cc-complaint/updateAll', 'cc\UpdateAllController@updateAll');
	//Route::post('/updateFaculty', 'UpdateFacultyController@updateFaculty');
	//Route::post('/updateStaff', 'UpdateStaffController@updateStaff');
	//Route::post('/updateStudent', 'UpdateStudentController@updateStudent');
	Route::post('cc-complaint/sort', 'cc\SortController@sort');
//---------------------------Routes for CC Complaints end here------------------------------

//---------------------------6)Assignments_and_Course_Documentation Routes------------------
   Route::get('/Assignments_and_Course_Documentation', 'Assignments_and_Course_Documentations\Student@check');
   Route::get('/Assignments_and_Course_Documentation/student', 'Assignments_and_Course_Documentations\Student@home');
   Route::get('/Assignments_and_Course_Documentation/student/{course}','Assignments_and_Course_Documentations\Student@selected_course');
   Route::get('/Assignments_and_Course_Documentation/student/{course}/solve_assignment','Assignments_and_Course_Documentations\Student@solve_assignment');
   Route::get('/Assignments_and_Course_Documentation/faculty/{course}/assess_assignments', 'Assignments_and_Course_Documentations\Faculty@assess_assignment');
   Route::get('/Assignments_and_Course_Documentation/student/{course}/course_documents', 'Assignments_and_Course_Documentations\Student@course_documents');
   Route::get('/Assignments_and_Course_Documentation/faculty', 'Assignments_and_Course_Documentations\Faculty@home');
   Route::get('/Assignments_and_Course_Documentation/faculty/{course}', 'Assignments_and_Course_Documentations\Faculty@selected_course2');
   Route::get('/Assignments_and_Course_Documentation/faculty/{course}/Documents2', 'Assignments_and_Course_Documentations\Faculty@Documents2');
   Route::get('/Assignments_and_Course_Documentation/faculty/{course}/Documents2/delete', 'Assignments_and_Course_Documentations\Faculty@delete');
   Route::post('/Assignments_and_Course_Documentation/document', 'Assignments_and_Course_Documentations\Faculty@store');
   Route::post('/Assignments_and_Course_Documentation/assignment', 'Assignments_and_Course_Documentations\Faculty@store1');
   Route::post('/Assignments_and_Course_Documentation/assess_assignment', 'Assignments_and_Course_Documentations\Faculty@store2');
   Route::post('/Assignments_and_Course_Documentation/solve_assignment','Assignments_and_Course_Documentations\Student@store');
//---------------------------Assignments_and_Course_Documentation Routes End here-----------

//---------------------------7)PBI Routes Begin here----------------------------------------
    Route::get('/PBI/', function(){
    	if(Auth::user()->user_type=='student')
            return Redirect::to('/PBI/welcome_student')->with('alert','Login Successful for '.Auth::user());
        else if(Auth::user()->user_type=='faculty')
             return Redirect::to('/PBI/welcome_faculty')->with('alert','Login Successful for '.Auth::user());
        else if(Auth::user()->user_type=='others')
             return Redirect::to('/PBI/welcome_chairman')->with('alert','Login Successful for '.Auth::user());
    });
	Route::get('/PBI/welcome_student','PBI\ApplyController@index');
	Route::get('/PBI/feedback','PBI\ApplyController@index7');
	Route::get('/PBI/studentguidelines','PBI\ApplyController@studentguidelines');
	Route::get('/PBI/facultyguidelines','PBI\ApplyController@facultyguidelines');
	Route::get('/PBI/chairmanguidelines','PBI\ApplyController@chairmanguidelines');
	Route::get('/PBI/reports','PBI\ApplyController@index5');
	Route::get('/PBI/Home','PBI\ApplyController@index');
	Route::get('/PBI/uploadtopic1','PBI\ApplyController@topicupload');
	Route::get('/PBI/grades','PBI\gradesController@grades');
	Route::get('/PBI/marks','PBI\marksController@marks');
	Route::get('/PBI/apply','PBI\ApplyController@apply');
	Route::get('/PBI/change','PBI\ApplyController@change');
	Route::get('/PBI/feedback','PBI\ApplyController@index7');
	Route::get('/PBI/feedbackchairman','PBI\ApplyController@feedbackchairman');
	Route::get('/PBI/feedbackfaculty','PBI\ApplyController@feedbackfaculty');
	Route::get('/PBI/view_requests','PBI\ApplyController@view_requests');

	Route::post('/PBI/apply_pbi','PBI\ApplyController@apply_pbi');
	Route::post('/PBI/changepbi','PBI\ApplyController@changepbi');
	Route::post('/PBI/feedbackform','PBI\ApplyController@feedbackform');
	Route::post('/PBI/uploadreport','PBI\ApplyController@upload_report');
	Route::post('/PBI/uploadgrades','PBI\ApplyController@uploadgrades');
	Route::post('/PBI/uploadmarks','PBI\ApplyController@uploadmarks');
	Route::post('/PBI/upload_topic','PBI\ApplyController@submit_topic');

	Route::get('/PBI/welcome_chairman','PBI\ApplyController@welcome_chairman');
	Route::get('/PBI/welcome_faculty','PBI\ApplyController@welcome_faculty');
	Route::get('/PBI/grades','PBI\ApplyController@grades');
	Route::get('/PBI/marks','PBI\ApplyController@marks');
	Route::get('/PBI/pbi_topics','PBI\ApplyController@pbi_topics');
	Route::get('/PBI/faculty_list','PBI\ApplyController@faculty_list');
	Route::get('/PBI/student_list','PBI\ApplyController@student_list');
	Route::get('/PBI/viewreport','PBI\ApplyController@viewreport');
	Route::get('/PBI/viewreport_chair','PBI\ApplyController@viewreport_chair');
	Route::get('/PBI/cse_committee','PBI\ApplyController@cse_committee');
	Route::get('/PBI/ece_committee','PBI\ApplyController@ece_committee');
	Route::get('/PBI/mech_committee','PBI\ApplyController@mech_committee');
	Route::get('/PBI/viewgrades','PBI\ApplyController@viewgrades');
	Route::get('/PBI/view_marks','PBI\ApplyController@viewmarks');
	Route::get('/PBI/view_marks_chair','PBI\ApplyController@viewmarks_chair');
	Route::get('/PBI/viewgrades_chair','PBI\ApplyController@viewgrades_chair');
	Route::get('/PBI/view_requests/{parameter}','PBI\ApplyController@details');
	Route::post('/PBI/Accept/{parameter}','PBI\ApplyController@accept');
	Route::post('/PBI/Decline/{parameter}','PBI\ApplyController@decline');
	Route::get('/PBI/schedule','PBI\ApplyController@schedule');
	Route::post('/PBI/post_schedule','PBI\ApplyController@uploadschedule');
	Route::post('/PBI/review','PBI\ApplyController@review');
	Route::get('/PBI/viewschedule','PBI\ApplyController@viewschedule');
	Route::get('/PBI/apply1','PBI\ApplyController@apply1');
	Route::get('/PBI/view_faculty_topic/{parameter}','PBI\ApplyController@view_faculty_topic');
//---------------------------PBI Routes End here--------------------------------------------

//---------------------------8)SPACS Routes Begin here--------------------------------------
	Route::get('/SPACS/', function(){
		if(Auth::user()->user_type=="student"){
	    	return view('SPACS.user.user_home');
		} 
	    else if(Auth::user()->hasRole('spacs_convener')){
			return view('SPACS.spacs.spacs_home');
		}
		if(Auth::user()->hasRole('spacscom_dir_gm')){
			return view('SPACS.spacscom_dir_gm.spacscom_dir_gm_home');
		}
		if(Auth::user()->hasRole('spacscom_dir_sc')){
			return view('SPACS.spacscom_dir_silver_cultural.spacscom_dir_silver_cultural_home');
		}
		if(Auth::user()->hasRole('spacscom_dir_sg')){
			return view('SPACS.spacscom_dir_silver_games.spacs_dir_silver_games_home');
		}
		if(Auth::user()->hasRole('spacscom_dm_gm')){
			return view('SPACS.spacscom_dm_prof_gm.spacscom_dm_prof_gm_home');
		}
		if(Auth::user()->hasRole('spacscom_iiitdmj_prof')){
			return view('SPACS.spacscom_iiitdmj_prof.spacscom_iiitdmj_prof_home');
		}
		
		if(Auth::user()->hasRole('awards_staff')){
			return view('SPACS.staff.staff_home');
		}
	});

	Route::get('/SPACS/spacs_mcm_results', function () {
	    return view('SPACS.spacs.spacs_mcm_results');
	});


	Route::get('/SPACS/spacs_medals',function(){
	    return view('SPACS.spacs.spacs_medals');
	});

	Route::get('/SPACS/spacs_home',function(){
	    return view('SPACS.spacs.spacs_home');
	});
	Route::get('/SPACS/staff_home', function () {
	    return view('SPACS.staff.staff_home');
	});
	Route::get('/SPACS/staff_mcm', function () {
	    return view('SPACS.staff.staff_mcm');
	});
	Route::get('/SPACS/staff_verify_form', function () {
	    return view('SPACS.staff.staff_verify_form');
	});

	Route::get('/SPACS/user_home', function () {
	    return view('SPACS.user.user_home');
	});
	Route::get('/SPACS/spacs_not_fir_winners/{student_id}/{id}','SPACS\spacs_usermedalnameController@spacs_not_fir_winners');
	Route::get('/SPACS/spacs_not_sec_thir_winners/{student_id}/{id}','SPACS\spacs_usermedalnameController@spacs_not_sec_thir_winners');
	Route::get('/SPACS/spacs_mcm_sort','SPACS\spacs_usermedalnameController@spacs_mcm_sort');
	Route::get('/SPACS/user_medals','SPACS\spacs_usermedalnameController@user_medals');
	Route::get('/SPACS/user_spacs','SPACS\spacs_usermedalnameController@user_spacs');
	Route::get('/SPACS/user_scholarship','SPACS\spacs_usermedalnameController@user_scholarship');
	Route::get('/SPACS/spacs_scholarships','SPACS\spacs_usermedalnameController@spacs_scholarships');
	Route::get('/SPACS/user_staffmember','SPACS\spacs_usermedalnameController@user_staffmember');
	Route::get('/SPACS/user_winner_result','SPACS\spacs_usermedalnameController@user_winner_result');
	Route::post('/SPACS/dir_gm_form/{scholarship_id}/{student_id}','SPACS\spacs_usermedalnameController@dir_gm_form');
	Route::post('/SPACS/dm_prof_gm_form/{scholarship_id}/{student_id}','SPACS\spacs_usermedalnameController@dm_prof_gm_form');
	Route::post('/SPACS/iiitdmj_prof_form/{scholarship_id}/{student_id}','SPACS\spacs_usermedalnameController@iiitdmj_prof_form');

	Route::get('/SPACS/spacscom_dir_gm_form','SPACS\spacs_usermedalnameController@spacscom_dir_gm_form');
	Route::get('/SPACS/spacscom_dir_gm_docs','SPACS\spacs_usermedalnameController@spacscom_dir_gm_docs');
	//--------------------------------------dir silver cultural---------------------------------------
	Route::get('/SPACS/spacscom_dir_silver_cultural_docs','SPACS\spacs_usermedalnameController@spacscom_dir_silver_cultural_docs');
	Route::get('/SPACS/spacscom_dir_silver_cultural_form','SPACS\spacs_usermedalnameController@spacscom_dir_silver_cultural_form');
	//-------------------------------------silver games---------------------------------------------
	Route::get('/SPACS/spacscom_dir_silver_games_docs','SPACS\spacs_usermedalnameController@spacscom_dir_silver_games_docs');
	Route::get('/SPACS/spacscom_dir_silver_games_form','SPACS\spacs_usermedalnameController@spacscom_dir_silver_games_form');

	//------------------------------------dm proficiency gold medal---------------------------------------
	Route::get('/SPACS/spacscom_dm_prof_gm_docs','SPACS\spacs_usermedalnameController@spacscom_dm_prof_gm_docs');
	Route::get('/SPACS/spacscom_dm_prof_gm_form','SPACS\spacs_usermedalnameController@spacscom_dm_prof_gm_form');

	//-----------------------iiitdmj proficiency ---------------------------------------
	Route::get('/SPACS/spacscom_iiitdmj_prof_docs','SPACS\spacs_usermedalnameController@spacscom_iiitdmj_prof_docs');
	Route::get('/SPACS/spacscom_iiitdmj_prof_form','SPACS\spacs_usermedalnameController@spacscom_iiitdmj_prof_form');


	Route::post('/SPACS/dir_sil_cul_form/{scholarship_id}/{student_id}','SPACS\spacs_usermedalnameController@dir_sil_cul_form');
	Route::post('/SPACS/dir_sil_gam_form/{scholarship_id}/{student_id}','SPACS\spacs_usermedalnameController@dir_sil_gam_form');
	Route::post('/SPACS/mcm_announce/{scholarship_id}/{student_id}','SPACS\spacs_usermedalnameController@mcm_announce');
	Route::post('/SPACS/chair_announce/{scholarship_id}/{student_id}','SPACS\spacs_usermedalnameController@chair_announce');
	Route::post('/SPACS/acad_announce/{scholarship_id}/{student_id}','SPACS\spacs_usermedalnameController@acad_announce');
	//-----------Chairman------------------------------
	Route::get('/SPACS/spacs_chairman_gm','SPACS\spacs_usermedalnameController@spacs_view_chairman');

	//-----------academic------------------------------
	Route::get('/SPACS/spacs_academic','SPACS\spacs_usermedalnameController@spacs_view_academic');

	//-----------notional-----------------------------
	Route::get('/SPACS/spacs_notional_first','SPACS\spacs_usermedalnameController@spacs_view_notional_first');
	Route::get('/SPACS/spacs_notional_second_third','SPACS\spacs_usermedalnameController@spacs_view_notional_second_third');
	Route::post('/SPACS/mcm_form/{scholarship_id}/{student_id}','SPACS\spacs_usermedalnameController@mcm_form');
	Route::post('/SPACS/dir_gm_m/{scholarship_id}/{student_id}','SPACS\spacs_usermedalnameController@dir_gm_m');
	Route::post('/SPACS/dir_sil_gam_m/{scholarship_id}/{student_id}','SPACS\spacs_usermedalnameController@dir_gm_m');
	Route::post('/SPACS/dir_sil_cul_m/{scholarship_id}/{student_id}','SPACS\spacs_usermedalnameController@dir_gm_m');
	Route::post('/SPACS/dm_prof_gm_m/{scholarship_id}/{student_id}','SPACS\spacs_usermedalnameController@dir_gm_m');
	Route::post('/SPACS/iiitdmj_prof_m/{scholarship_id}/{student_id}','SPACS\spacs_usermedalnameController@dir_gm_m');
	Route::post('/SPACS/dir_gm_a/{scholarship_id}/{student_id}','SPACS\spacs_usermedalnameController@dir_gm_a');
	Route::post('/SPACS/dir_sil_gam_a/{scholarship_id}/{student_id}','SPACS\spacs_usermedalnameController@dir_gm_a');
	Route::post('/SPACS/dir_sil_cul_a/{scholarship_id}/{student_id}','SPACS\spacs_usermedalnameController@dir_gm_a');
	Route::post('/SPACS/dm_prof_gm_a/{scholarship_id}/{student_id}','SPACS\spacs_usermedalnameController@dir_gm_a');
	Route::post('/SPACS/iiitdmj_prof_a/{scholarship_id}/{student_id}','SPACS\spacs_usermedalnameController@dir_gm_a');
	Route::post('/SPACS/spacs_create_sch','SPACS\spacs_usermedalnameController@spacs_create_sch');
	Route::get('/SPACS/user_winners',function(){
	    return view('SPACS.user.user_winners');
	});
	Route::get('/SPACS/spacs_scholarship_create',function(){
	    return view('SPACS.spacs.spacs_scholarship_create');
	});
	Route::get('/SPACS/spacs_medal_create',function(){
	    return view('SPACS.spacs.spacs_medal_create');
	});
	Route::get('/SPACS/user_summarycurrent','SPACS\spacs_usermedalnameController@user_summarycurrent');
	Route::get('/SPACS/user_summaryprevious','SPACS\spacs_usermedalnameController@user_summaryprevious');
	Route::get('/SPACS/user_mcmform',function(){
	    return view('SPACS.user.user_mcmform');
	});
	Route::get('/SPACS/user_dir_gm', function () {
	    return view('SPACS.user.user_dir_gm');
	});
	Route::get('/SPACS/user_dm_prof_gm', function () {
	    return view('SPACS.user.user_dm_prof_gm');
	});
	Route::get('/SPACS/user_dir_silver_cultural', function () {
	    return view('SPACS.user.user_dir_silver_cultural');
	});
	Route::get('/SPACS/user_dir_silver_games', function () {
	    return view('SPACS.user.user_dir_silver_games');
	});
	Route::get('/SPACS/user_iiitdmj_prof', function () {
	    return view('SPACS.user.user_iiitdmj_prof');
	});
	Route::get('/SPACS/spacscom_dir_gm_home', function () {
	    return view('SPACS.spacscom_dir_gm.spacscom_dir_gm_home');
	});
	Route::get('/SPACS/spacscom_dir_silver_cultural_home', function () {
	    return view('SPACS.spacscom_dir_silver_cultural.spacscom_dir_silver_cultural_home');
	});
	Route::get('/SPACS/spacscom_dir_silver_games_home', function () {
	    return view('SPACS.spacscom_dir_silver_games.spacs_dir_silver_games_home');
	});
	Route::get('/SPACS/spacscom_dm_prof_gm_home', function () {
	    return view('SPACS.spacscom_dm_prof_gm.spacscom_dm_prof_gm_home');
	});
	Route::get('/SPACS/spacscom_iiitdmj_prof_home', function () {
	    return view('SPACS.spacscom_iiitdmj_prof.spacscom_iiitdmj_prof_home');
	});
	Route::get('/SPACS/spacscom_dir_gm_results','SPACS\spacs_usermedalnameController@spacscom_dir_gm_results');
	Route::post('/SPACS/staff_verify/{student_id}/{scholarship_id}','SPACS\spacs_usermedalnameController@staff_verify');
	Route::get('/SPACS/staff_view_form','SPACS\spacs_usermedalnameController@staff_view_form');
	Route::get('/SPACS/spacscom_dir_silver_cultural_results','SPACS\spacs_usermedalnameController@spacscom_dir_silver_cultural_results');
	Route::get('/SPACS/spacs_dir_silver_games_results','SPACS\spacs_usermedalnameController@spacs_dir_silver_games_results');
	Route::get('/SPACS/spacscom_dm_prof_gm_results','SPACS\spacs_usermedalnameController@spacscom_dm_prof_gm_results');
	Route::get('/SPACS/spacscom_iiitdmj_prof_results','SPACS\spacs_usermedalnameController@spacscom_iiitdmj_prof_results');
//---------------------------SPACS Routes End here------------------------------------------

//---------------------------9)Mess Management Routes Begin here----------------------------

	Route::get('/mess_management','mess_management\messcontroller@index');
	Route::get('/mess_management/Student', 'mess_management\messcontroller@student');
	Route::get('/mess_management/Register', function () {
	    return view('/mess_management/Register');
	});
	Route::get('/mess_management/Committee','mess_management\messcontroller@committee' );
	Route::get('/mess_management/Faculty','mess_management\messcontroller@faculty');


	Route::get('/mess_management/CLeave',function(){
		return view('/mess_management/CLeave');
	});
	Route::get('/mess_management/SLeave',function(){
		return view('/mess_management/SLeave');
	});
	Route::get('/mess_management/CContact',function(){
		return view('mess_management/CContact');
	});
	Route::get('/mess_management/SContact',function(){
		return view('/mess_management/SContact');
	});
	Route::get('/mess_management/AContact',function(){
		return view('/mess_management/AContact');
	});
	Route::get('/mess_management/Admin','mess_management\messcontroller@admin');
	Route::get('/mess_management/Acommittee1',function(){
		return view('/mess_management/Acommittee1');
	});
	Route::get('/mess_management/Acommittee2',function(){
		return view('/mess_management/Acommittee2');
	});
	Route::get('/mess_management/Login',function(){
	return view('/mess_management/Login');
	});
	Route::get('/mess_management/Abillform',function(){
	return view('/mess_management/Abillform');
	});
	Route::post('/mess_management/committee1','mess_management\messcontroller@committee1');
	Route::post('/mess_management/committee2','mess_management\messcontroller@committee2');
	Route::post('/mess_management/reset','mess_management\messcontroller@reset');

	Route::post('/mess_management/updatemenu','mess_management\messcontroller@updatemenu');
	Route::post('/mess_management/register','mess_management\messcontroller@register');
	Route::post('/mess_management/billform','mess_management\messcontroller@billform');
	Route::post('/mess_management/login','mess_management\homecontroller@login');
	Route::get('/mess_management/modal1','mess_management\messcontroller@menu1');
	Route::get('/mess_management/modal2','mess_management\messcontroller@menu2');
	Route::get('/mess_management/Sviewbill','mess_management\messcontroller@sviewbill');
	Route::get('/mess_management/Cviewbill','mess_management\messcontroller@cviewbill');
	Route::get('/mess_management/Leave','mess_management\messcontroller@leave');
	Route::post('/mess_management/leaveform','mess_management\messcontroller@leaveform');
	Route::get('/mess_management/Viewleave','mess_management\messcontroller@viewleave');
	Route::get('/mess_management/SFeedback','mess_management\messcontroller@sfeedback');
	Route::get('/mess_management/CFeedback','mess_management\messcontroller@cfeedback');
	Route::get('/mess_management/Sviewfeedback','mess_management\messcontroller@sviewfeedback');
	Route::get('/mess_management/Aviewfeedback','mess_management\messcontroller@aviewfeedback');
	Route::get('/mess_management/Cviewfeedback','mess_management\messcontroller@cviewfeedback');
	Route::post('/mess_management/sfeedbackform','mess_management\messcontroller@sfeedbackform');
	Route::post('/mess_management/cfeedbackform','mess_management\messcontroller@cfeedbackform');
	Route::post('/mess_management/corderform','mess_management\messcontroller@corderform');
	Route::get('/mess_management/Cvieworder','mess_management\messcontroller@cvieworder');
	Route::get('/mess_management/Svieworder','mess_management\messcontroller@svieworder');
	Route::get('/mess_management/Avieworder','mess_management\messcontroller@avieworder');
	Route::get('/mess_management/COrder','mess_management\messcontroller@giveorder');
	Route::get('/mess_management/viewfeedback','mess_management\messcontroller@viewfeedback');

	Route::post('/mess_management/orderform','mess_management\messcontroller@placeorder');
//---------------------------Mess Management Routes End here--------------------------------

//---------------------------10)Academic Affairs Routes Begin here--------------------------
	Route::get('/acadaff/', function(){
		return redirect('acadaff/index');
	});
	
	Route::get('acadaff/students','acadaff\cardsController@first');
	Route::post('acadaff/bonafide','acadaff\cardsController@bonafide');
	Route::post('acadaff/semirr','acadaff\cardsController@s');
	Route::post('acadaff/semirr2','acadaff\cardsController@s2');
	Route::get('acadaff/ug_student','acadaff\cardsController@ug');


	Route::post('acadaff/cec','acadaff\cardsController@cec');
	Route::post('acadaff/seminar_committee','acadaff\cardsController@seminar_committee');
	Route::post('acadaff/seminar_report','acadaff\cardsController@seminar_report');
	Route::post('acadaff/supervisor','acadaff\cardsController@supervisor');
	Route::post('acadaff/leave','acadaff\cardsController@leave');

	Route::get('acadaff/academic','acadaff\cardsController@academic');
	Route::get('acadaff/faculty','acadaff\cardsController@faculty');
	Route::get('acadaff/submission','acadaff\cardsController@submission');

	Route::get('acadaff/ug_student_show','acadaff\cardsController@submission2');
	Route::post('acadaff/branch_change','acadaff\cardsController@branch_change');
	Route::post('acadaff/seminarrequest','acadaff\cardsController@seminarnext');
	Route::post('acadaff/seminarrequest2','acadaff\cardsController@seminarnext2');

	Route::post('acadaff/cec','acadaff\cardsController@cec');
	Route::post('acadaff/cerequest','acadaff\cardsController@cenext');
	Route::post('acadaff/cerequest2','acadaff\cardsController@cenext2');

	Route::post('acadaff/bonafidenext','acadaff\cardsController@bonafidenext');
	Route::post('acadaff/leaverequest','acadaff\cardsController@leavenext');
	Route::post('acadaff/supervisorrequest','acadaff\cardsController@supervisornext');
	Route::post('acadaff/branch_next','acadaff\cardsController@branch_next');
	Route::get('acadaff/student_show','acadaff\cardsController@show');

	Route::get('acadaff/about',function(){
		return view('acadaff/pages.about');
	});

	Route::get('acadaff/admin','acadaff\cardsController@admin');
	Route::post('acadaff/supervisornext2','acadaff\cardsController@supervisornext2');
	Route::get('acadaff/index','acadaff\cardsController@index');
//---------------------------Academic Affairs Routes End here-------------------------------

//---------------------------11)Event Organizing Routes Begin here--------------------------
	Route::get('/event_organizing','event_organizing_Controllers\EventController@index');
	Route::get('/event_organizing/acad','event_organizing_Controllers\EventController@acad');
	Route::post('/event_organizing/acad/eventcreated','event_organizing_Controllers\EventCreateController@store');
	Route::post('/event_organizing/acad/eventcanceled/{id}','event_organizing_Controllers\EventCreateController@destroy');
	Route::get('/event_organizing/clubs','event_organizing_Controllers\EventController@clubpages');
	Route::get('/event_organizing/clubadmin/{clubname}','event_organizing_Controllers\EventController@club');
	Route::post('/event_organizing/{clubname}/clubeventcreated','event_organizing_Controllers\ClubEventCreateController@store');
	Route::post('/event_organizing/{clubname}/clubeventresults/{id}','event_organizing_Controllers\ClubEventCreateController@update');
	Route::post('/event_organizing/{clubname}/clubeventcanceled/{id}','event_organizing_Controllers\ClubEventCreateController@destroy');
	Route::get('/event_organizing/clubmember/{clubname}','event_organizing_Controllers\EventController@clubmembers');
	Route::post('/event_organizing/getrooms','event_organizing_Controllers\AjaxCallsController@index');
	Route::post('/event_organizing/{clubname}/event_review/{id}','event_organizing_Controllers\EventController@review');
//---------------------------Event Organizing Routes End here-------------------------------

//---------------------------12)Bus Management Routes Begin here----------------------------
    Route::get('/bus_management', 'Bus_management\bus_management@index');

	Route::get('bus_management/home','Bus_management\HomeController@home');
	Route::get('bus_management/schedule','Bus_management\PagesController@schedule');
	Route::post('bus_management/schedule/achadd', 'Bus_management\PagesController@feed_store');
	Route::get('bus_management/admin','Bus_management\AdminController@admin');
	Route::get('bus_management/booknow','Bus_management\BookController@booknow');
	Route::get('bus_management/admin_form','Bus_management\AdminformController@admin_form');
	Route::get('bus_management/employee_form','Bus_management\EmpformController@employee_form');

	Route::post('/bus_management/payment',[
	 	'uses'=>'Bus_management\PaymentController@payment',
	 	'as'=>'payment'
	 	]);

	Route::get('/bus_management/reset',[
		'uses'=>'Bus_management\AdminController@reset', 
		'as'=>'reset'
		]);

	Route::get('/bus_management/delete',[
		'uses'=>'Bus_management\AdminController@fdelete',
		'as'=>'delete'
		]);

	Route::get('/bus_management/addsp',[
		'uses'=>'Bus_management\AdminController@addsp',
		'as'=>'addsp'
		]);

	Route::get('/bus_management/delsp',[
		'uses'=>'Bus_management\AdminController@delsp',
		'as'=>'delsp'
		]);

	Route::post('/bus_management/adding',[
		'uses'=>'Bus_management\AdminController@adddd',
		'as'=>'adding'
		]);

	Route::post('/bus_management/delll',[
		'uses'=>'Bus_management\AdminController@delete',
		'as'=>'delll'
		]);

	Route::post('/bus_management/post_not',[
		'uses'=>'Bus_management\AdminController@post_not',
		'as'=>'post_not'
		]);
//---------------------------Bus Manaegement Routes End here--------------------------------

//---------------------------13)Class Attendance Routes Begin here--------------------------
	Route::get('/CAMS/', 'ClassAttendance\ClassAttendanceController@index');
	Route::get('/CAMS/faculty','ClassAttendance\HomePageController@facHome');
	Route::get('/CAMS/student','ClassAttendance\HomePageController@stuHome');
	Route::post('/CAMS/choose_date/{coursename}','ClassAttendance\ViewAttendanceController@student_status');	
	Route::get('/CAMS/faculty/{course}','ClassAttendance\FacultyCoursePageController@view_course');
	Route::get('/CAMS/student/course/{course_name}','ClassAttendance\StudentCoursePageController@student_course');
	Route::get('/CAMS/take-attendance/{coursename}','ClassAttendance\TakeAttendanceController@take_attendance');
	Route::post('/CAMS/store-attendance_offline/{coursename}','ClassAttendance\TakeAttendanceController@store_attendance_offline');
	Route::post('/CAMS/store-attendance_online/{coursename}','ClassAttendance\TakeAttendanceController@store_attendance_online');
	Route::post('/CAMS/send-notification/{coursename}','ClassAttendance\SendMessageController@send');
	Route::get('/CAMS/fill_leave-form/{coursename}','ClassAttendance\LeaveFormController@fill_leaveform');
	Route::post('/CAMS/leave_form/{coursename}','ClassAttendance\LeaveFormController@store_leaveform');
	Route::get('/CAMS/take-attendance/online/{coursename}','ClassAttendance\TakeAttendanceController@online_mode');
	Route::get('/CAMS/take-attendance/offline/{coursename}','ClassAttendance\TakeAttendanceController@offline_mode');
//---------------------------Class Attendance Routes End here-------------------------------

//---------------------------14)Counselling Cell Routes Begin here--------------------------
	Route::get('/counselling_cell/','counsellingcontroller@main');
	Route::get('/counselling_cell/student_guide_form',function(){
		return view('/cou/Student_guide_form');
		});
	Route::get('/counselling_cell/assign_guides',function(){
		return view('/cou/assign_sg');
		});
	Route::get('/counselling_cell/assign_assistant',function(){
		return view('/cou/assign_asc');
		});
	//assistant coordinator form
	Route::get('/counselling_cell/assistant_coordinator_form',function(){
	return view('/cou/Asst_Coord_form');
		});
	Route::post('/counselling_cell/studymaterial', 'counsellingcontroller@studymaterial');//post study material 
	Route::post('/counselling_cell/form_asstcoor', 'counsellingcontroller@asst_coor_form'); //assistant_coordinator form
	Route::post('/counselling_cell/form_stu_guide', 'counsellingcontroller@stu_guide_form'); //assistant_coordinator form
	Route::get('/counselling_cell/study_material', 'counsellingcontroller@studyymaterial');//study portal view
	// problem portal
	Route::get('/counselling_cell/problemportal','counsellingcontroller@problemmportal');//problem portal view
	Route::post('/counselling_cell/{cc}/answer', 'counsellingcontroller@answers'); //assistant_coordinator form
	Route::post('/counselling_cell/question', 'counsellingcontroller@problem'); //assistant_coordinator form
	Route::get('/counselling_cell/student_guides_list','counsellingcontroller@stuguide');//view student guide list
	Route::get('/counselling_cell/assistant_coordinator_list','counsellingcontroller@assistcoord');//assistant_coordinator list
	Route::get('/counselling_cell/student_guides_application','counsellingcontroller@stuguideapp');//application of assistant_coordinator list
	Route::get('/counselling_cell/assistant_coordinator_application','counsellingcontroller@assistcoordapp');//application of stu_guide_form
	Route::get('/counselling_cell/privateportal','counsellingcontroller@privateportal');//private portal view
	Route::post('/counselling_cell/privatequestion', 'counsellingcontroller@privatequestion'); //private problem post
	Route::post('/counselling_cell/{cc}/privateanswer', 'counsellingcontroller@privateanswer'); //private answer post
	Route::get('/counselling_cell/faculty_access','counsellingcontroller@adminportal');//faculty admin access portal
	// application page where links to the forms of student guide and assistant coordinators are present
	Route::get('/counselling_cell/formfill',function(){
		return view('/cou/applications'); 
	});
//---------------------------Counselling Cell Routes End here-------------------------------

//---------------------------15)Course Management Routes Begin here----------------------------

	Route::get('course_management/', function(){
		if(Auth::user()->user_type == 'faculty'){
				$faculty = DB::table('faculty')->where('faculty_id','=',Auth::user()->username)->get()->first();
				return view('cms.html.index',compact('faculty'));
			}
			else if(Auth::user()->user_type == 'student'){
				$student = DB::table('student')->where('student_id','=',Auth::user()->username)->get()->first();
				return view('cms.html.student',compact('student'));
			}
			else if(Auth::user()->user_type == 'others' && Auth::user()->hasRole('Acad_staff')){
					return view('cms.html.students');
			}
	    });
	
	Route::get('cms/faculty/{id}',[
		'uses' => 'cms@home',
		'as' => 'home'
	]);
	Route::post('cms/students/del',[
		'uses' => 'cms@delStudent',
		'as' => 'delStudent'
	]);
	Route::post('cms/students/add',[
		'uses' => 'cms@addStudent',
		'as' => 'addStudent'
	]);
	Route::post('cms/faculty/del',[
		'uses' => 'cms@delFaculty',
		'as' => 'delFaculty'
	]);
	Route::post('cms/faculty/add',[
		'uses' => 'cms@addFaculty',
		'as' => 'addFaculty'
	]);
	Route::get('cms/{id}/courses',[
			'uses' => 'cms@getCourses',
			'as' => 'courses'
		]);
	Route::get('cms/{fid}/course1/{id}',[
		'uses' => 'cms@getCourse',
		'as' => 'course1'
	]);
	Route::get('cms/students',[
		'uses' => 'cms@manageStudent',
		'as' => 'student'
	]);
	Route::get('cms/faculty1',[
		'uses' => 'cms@manageFaculty',
		'as' => 'faculty'
	]);
	Route::get('cms/', function () {
	    return view('cms.threads.onethread');

	});
	Route::post('cms/forum/addthread/faculty/{fid}',[
				'uses' => 'cms@addthread',
				'as' => 'addthread'
			]);
	Route::post('cms/forum/addthread/student/{sid}',[
				'uses' => 'cms@addthreadstudent',
				'as' => 'addthreadstudent'
			]);
	Route::post('cms/forum/faculty/{fid}/{tid}',[
				'uses' => 'cms@addanswer',
				'as' => 'addanswer1'
			]);
	Route::post('cms/forum/student/{fid}/{tid}',[
				'uses' => 'cms@addanswerstudent',
				'as' => 'addanswer1student'
			]);
	Route::get('cms/forum/faculty/{fid}',[
				'uses' => 'cms@getforum',
				'as' => 'forum'
			]);
	Route::get('cms/forum/student/{sid}',[
			'uses' => 'cms@getforumstudent',
			'as' => 'forumstudent'
		]);
	Route::get('cms/forum/faculty/{fid}/one/{tid}',[
			'uses' => 'cms@getthread',
			'as' => 'onethread'
		]);
	Route::get('cms/forum/student/{sid}/one/{tid}',[
			'uses' => 'cms@getthreadstudent',
			'as' => 'onethreadstudent'
		]);
	Route::get('cms/forum/faculty/{fid}/one/{tid}/delete',[
			'uses' => 'cms@deletethread',
			'as' => 'deletethread'
		]);
	Route::get('cms/forum/faculty/{fid}/one/{tid}/edit',[
			'uses' => 'cms@editthread',
			'as' => 'editthread'
		]);
	Route::get('cms/forum/student/{sid}/one/{tid}/edit',[
			'uses' => 'cms@editstudentthread',
			'as' => 'editstudentthread'
		]);
	Route::get('cms/forum/faculty/{fid}/new',[
			'uses' => 'cms@newthread',
			'as' => 'newthread'
		]);
	Route::get('cms/forum/student/{sid}/new',[
			'uses' => 'cms@newthreadstudent',
			'as' => 'newthreadstudent'
		]);
	Route::post('cms/forum/student/{sid}/one/{tid}',[
			'uses' => 'cms@changestudentthread',
			'as' => 'changestudentthread'
		]);
	Route::post('cms/forum/faculty/{fid}/one/{tid}',[
			'uses' => 'cms@changethread',
			'as' => 'changethread'
		]);
	Route::get('cms/threads','ThreadsController@index');
	Route::get('cms/threads/new','ThreadsController@create');

//---------------------------Course Management Routes End here------------------------------

//---------------------------16)Employee Leave System Routes Begin here------------------------

	Route::get('/ELMS', 'leaveController@display');

	//Routes for Staff
	Route::get('/ELMS/homeStaff','leaveControllerStaff@homeStaff');
	Route::get('/ELMS/leaveApplicationStaff','leaveControllerStaff@apply');
	Route::post('/ELMS/leave1','leaveControllerStaff@insert');
	Route::get('/ELMS/statusStaff', 'leaveControllerStaff@status');
	Route::get('/ELMS/historyStaff', 'leaveControllerStaff@history');

	//Routes for Staff acting as Leave Granting Officer
	Route::get('/ELMS/homeStaffLGO', 'leaveControllerStaff1@homeStaff');
	Route::get('/ELMS/leaveApplicationStaffLGO','leaveControllerStaff1@apply');
	Route::post('/ELMS/leave1LGO','leaveControllerStaff1@insert');
	Route::get('/ELMS/statusStaffLGO', 'leaveControllerStaff1@status');
	Route::get('/ELMS/historyStaffLGO', 'leaveControllerStaff1@history');
	Route::get('/ELMS/requestsStaffLGO', 'leaveControllerStaff1@req');
	Route::post('/ELMS/grantingStaff/{app_id}', 'leaveControllerStaff1@grant');

	//Routes for Faculty
	Route::get('/ELMS/homeFaculty', 'leaveControllerFaculty@homeFaculty');
	Route::get('/ELMS/leaveApplicationFaculty','leaveControllerFaculty@apply');
	Route::post('/ELMS/leave','leaveControllerFaculty@insert');
	Route::get('/ELMS/statusFaculty', 'leaveControllerFaculty@status');
	Route::get('/ELMS/historyFaculty', 'leaveControllerFaculty@history');

	//Routes for Faculty acting as Leave Granting Officers
	Route::get('/ELMS/homeFacultyLGO', 'leaveControllerFaculty1@homeFaculty');
	Route::get('/ELMS/leaveApplicationFacultyLGO', 'leaveControllerFaculty1@apply');
	Route::post('/ELMS/leaveLGO', 'leaveControllerFaculty1@insert');
	Route::get('/ELMS/statusFacultyLGO', 'leaveControllerFaculty1@status');
	Route::get('/ELMS/historyFacultyLGO', 'leaveControllerFaculty1@history');
	Route::get('/ELMS/requestsFacultyLGO', 'leaveControllerFaculty1@req');
	Route::post('/ELMS/grantingFaculty/{app_id}', 'leaveControllerFaculty1@grant');

//---------------------------Employee Leave System Routes End here--------------------------

//---------------------------17)Health Center Routes Begin here--------------------------------

	Route::get('/health-centre', 'healthcentre\PageController@getIndex');
	Route::get('/health-centre/gallery','healthcentre\PageController@getGallery');
	Route::resource('health-centre/appointment','healthcentre\AppointmentController');
	Route::resource('health-centre/doctor','healthcentre\DoctorController');
	Route::resource('health-centre/doctorprofile','healthcentre\DoctorProfileController');
	Route::resource('health-centre/appointmentpatient','healthcentre\AppointmentDoctor');
	Route::resource('health-centre/prescribe','healthcentre\PrescribeController');
	Route::get('health-centre/upcoming-appointment',['uses'=> 'healthcentre\AppointmentController@next','as' => 'appointment.next']);
	Route::get('health-centre/upcoming-appointments',['uses'=> 'healthcentre\AppointmentDoctor@next','as' => 'appointmentdoctor.next']);
	Route::get('health-centre/previous-appointment',['uses'=> 'healthcentre\AppointmentDoctor@previous','as' => 'appointmentdoctor.previous']);

//---------------------------Health Center Routes End here----------------------------------

//---------------------------18)Training & Placement Cell Routes Begin here--------------------

	Route::get('/training_and_placement_cell', 'Training_and_Placement_Cell\PagesController@index');


	Route::get('/training_and_placement_cell/student', 'Training_and_Placement_Cell\PagesController@home');

	Route::get('/training_and_placement_cell/tpo/page', 'Training_and_Placement_Cell\TPOPagesController@tpo');

	// Route::get('student', 'StudentResumeController@index');

	// Route::get('{student_id}/student', 'StudentResumeController@show');
	Route::get('/training_and_placement_cell/htmltopdfview/student/{student_id}',array('as'=>'htmltopdfview','uses'=>'Training_and_Placement_Cell\ProductController@htmltopdfview'));

	Route::get('/training_and_placement_cell/student/profile/company/{company_id}', 'Training_and_Placement_Cell\CompanyProfileController@index');

	Route::post('/training_and_placement_cell/profile/company/', ['as' => 'company_store', 'uses' => 'Training_and_Placement_Cell\CompanyProfileController@store']);

	Route::get('/training_and_placement_cell/form/studentForm/student', ['as' => 'studentForm', 'uses' => 'Training_and_Placement_Cell\StudentFormController@create']);

	Route::post('/training_and_placement_cell/form/studentForm', ['as' => 'studentForm_store', 'uses' => 'Training_and_Placement_Cell\StudentFormController@store']);

	// Route::get('/training_and_placement_cell/tpo/profile/student1/{student_id}', 'Training_and_Placement_Cell\StudentProfileController@show');

	Route::get('/training_and_placement_cell/profile/student/student', 'Training_and_Placement_Cell\StudentProfileController@show');

	Route::get('/training_and_placement_cell/tpo/profile/student/{student_id}', 'Training_and_Placement_Cell\StudentProfileController@showTpo');

	Route::get('/training_and_placement_cell/tpo/studentList1', 'Training_and_Placement_Cell\StudentListController@show');

	Route::post('/training_and_placement_cell/tpo/studentList1', ['as' => 'studentList_store', 'uses' => 'Training_and_Placement_Cell\StudentListController@store']);

	Route::post('/training_and_placement_cell/companyStudent', ['as' => 'companyStudent_store', 'uses' => 'Training_and_Placement_Cell\CompanyStudentController@store']);

	Route::get('/training_and_placement_cell/tpo/companyStudent/{company_id}', 'Training_and_Placement_Cell\CompanyStudentController@index');

	Route::get('/training_and_placement_cell/student/companyList', 'Training_and_Placement_Cell\CompanyListController@show');

	Route::get('/training_and_placement_cell/tpo/form/companyForm', ['as' => 'companyForm', 'uses' => 'Training_and_Placement_Cell\CompanyFormController@create']);

	Route::post('/training_and_placement_cell/tpo/form/companyForm', ['as' => 'companyForm_store', 'uses' => 'Training_and_Placement_Cell\CompanyFormController@store']);


	Route::get('/training_and_placement_cell/tpo/form/companyForm/{company_id}', ['as' => 'companyForm1', 'uses' => 'Training_and_Placement_Cell\CompanyFormController@create1']);

	Route::post('/training_and_placement_cell/tpo/form/companyForm/company_id', ['as' => 'companyForm_store1', 'uses' => 'Training_and_Placement_Cell\CompanyFormController@store1']);


	Route::get('/training_and_placement_cell/tpo/selectedStudent', 'Training_and_Placement_Cell\SelectedStudentController@showTpo');

	Route::get('/training_and_placement_cell/student/selectedStudent', 'Training_and_Placement_Cell\SelectedStudentController@show');

	Route::get('/training_and_placement_cell/tpo/profile/company1/{company_id}', 'Training_and_Placement_Cell\CompanyProfileTPOController@index');

	Route::get('/training_and_placement_cell/tpo/companyList1', 'Training_and_Placement_Cell\CompanyListController@showTpo');

//---------------------------Training & Placement Cell Routes End here----------------------

//---------------------------19)Online Quizzing Routes Begin here------------------------------

	Route::get('/online_quizzing/quiz','QuizController@show');

	Route::get('/online_quizzing/quiz/{quiz}','QuizController@edit');

	Route::get('/online_quizzing/question/{question}','QuizController@question');

	Route::get('/online_quizzing/addquestion','QuizController@addquestion');

	Route::post('/online_quizzing/savequestion','QuizController@savequestion');

	Route::get('/online_quizzing/quiz_questions',function()
		{
			return view('online_quiz.quiz_questions');
		});

	Route::get('/online_quizzing/give_quiz/{quiz}/{student_id}','QuizController@give_quiz');

	Route::get('/online_quizzing/answer_question/{ques}/{student_id}','QuizController@answer_question');

	Route::post('/online_quizzing/save_answer','QuizController@save_answer');

	Route::get('/online_quizzing/faculty/{faculty_id}','QuizController@facultyhome');

	Route::get('/online_quizzing/faculty_quiz/{faculty_id}','QuizController@faculty_quiz');

	Route::get('/online_quizzing/phostquiz','QuizController@hostquiz');

	Route::get('/online_quizzing/submit_quiz/{student_id}/{quiz}','QuizController@submit_quiz');

	Route::get('/online_quizzing/view_profile/{student_id}','QuizController@view_profile');

	Route::get('/online_quizzing/student/{student_id}','QuizController@studenthome');

	Route::get('/online_quizzing/student_quiz/{student_id}','QuizController@student_quiz');

	Route::get('/online_quizzing/view_result/{quiz}','QuizController@view_result');

	Route::post('/online_quizzing/add_quiz','QuizController@add_quiz');

//---------------------------Online Quizzing Routes End here--------------------------------

//---------------------------20)Employee Information System Routes Begin here------------------

	Route::get('fac', 'fac\QualController@index');
	Route::post('fac/add', 'fac\QualController@store');
	Route::get('del/{id}',['as' => 'del', 'uses' => 'fac\QualController@destroy']);
	Route::post('addexp','fac\expcontroller@addexperience');
	Route::get('del/{id}',['as' => 'del', 'uses' => 'fac\expController@destroy']);
	Route::post('fac/achadd', 'fac\achcontroller@ach_store');
	Route::get('acdel/{id}',['as' => 'acdel', 'uses' => 'fac\achController@destroy']);
	Route::post('fac/rpdd', 'fac\reprojcontroller@rp_store');
	Route::get('rpdel/{id}',['as' => 'rpdel', 'uses' => 'fac\reprojcontroller@destroy']);
	Route::post('fac/rjadd', 'fac\rejourcontroller@rj_store');
	Route::get('rjdel/{id}',['as' => 'rjdel', 'uses' => 'fac\rejourcontroller@destroy']);
	Route::post('fac/cadd', 'fac\consulcontroller@c_store');
	Route::post('/document', 'fac\rejourcontroller@rj_store');
	Route::get('cdel/{id}',['as' => 'cdel', 'uses' => 'fac\consulcontroller@destroy']);
	Route::post('fac/padd', 'fac\patcontroller@p_store');
	Route::get('pdel/{id}',['as' => 'pdel', 'uses' => 'fac\patcontroller@destroy']);
	Route::post('fac/pubadd', 'fac\pubcontroller@pu_store');
	Route::get('pubdel/{id}',['as' => 'pubdel', 'uses' => 'fac\pubcontroller@destroy']);
	Route::post('fac/theadd', 'fac\thecontroller@t_store');
	Route::get('thedel/{id}',['as' => 'thedel', 'uses' => 'fac\thecontroller@destroy']);
	Route::post('fac/lecadd', 'fac\leccontroller@l_store');
	Route::get('lecdel/{id}',['as' => 'lecdel', 'uses' => 'fac\leccontroller@destroy']);
	Route::post('fac/vadd', 'fac\viscontroller@v_store');
	Route::get('vdel/{id}',['as' => 'vdel', 'uses' => 'fac\viscontroller@destroy']);


	Route::post('fac/up', 'fac\QualController@update');

	Route::get('upd/{id}','fac\QualController@update');

	Route::get('/getPDF','fac\PDFController@getPDF');
	
	Route::post('/fac/upd', 'fac\faculty@update');
	
	Route::post('/image_upload', 'fac\faculty@img');

//---------------------------Employee Information System Routes End here--------------------

//---------------------------21)Stock Management Routes Begin here--------------------------

	Route::get('/stock_management/', [
    'uses'=>'stock@stockhome',
]);

	Route::get('/stock_management/requests',[
		'uses'=>'stock@reqhome',
		'as'=>'requests'
		]);

	Route::get('/stock_management/stock', function () {
	    return view('stock');
	});

	Route::get('/stock_management/view', [
		'uses'=>'stock@viewstock'
		]);

	Route::get('/stock_management/new',[
		'uses'=>'stock@newpage'
		]);

	Route::get('/stock_management/existing',[
		'uses'=>'stock@existing'
		]);

	Route::post('/stock_management/additem',[
		'uses'=>'stock@additem',
		'as'=>'additem'
		]);

	Route::post('/stock_management/exist',[
		'uses'=>'stock@addexist',
		'as'=>'exist'
		]);

	Route::post('/stock_management/addreq',[
		'uses'=>'stock@addreq',
		'as'=>'addreq'
		]);

	Route::get('/stock_management/checkreq',[
		'uses'=>'stock@chrhome',
		'as'=>'checkreq'
		]);

	Route::get('/stock_management/status{req}',[
			'uses'=>'stock@status',
			'as'=>'/status{req}'
		]);

	Route::post('/stock_management/confirm',[
		'uses'=>'stock@statconf',
		'as'=>'confirm'
		]);
//---------------------------Stock Management Routes End here-------------------------------

});
