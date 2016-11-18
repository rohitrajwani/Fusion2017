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


//---------------------------------Routes for VH-Booking----------------------------------------
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

//--------------------Routes for VH-Booking end here---------------------------------------------

//-------------------------------Routes for Time Table Management--------------------------------
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

//---------------------------Routes for Time Table Management end here----------------------------


//---------------------------Routes for TA Management begin here----------------------------
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
	
//---------------------------Routes for TA Management end here----------------------------

//---------------------------Routes for Hostel Complaints begin here----------------------------
	Route::get('/hostelComplaints','ComplaintsController@display');
	Route::post('/hostelComplaints','ComplaintsController@store');
	Route::post('/hostelComplaints/{complaint}','ComplaintsController@update');	  
	Route::post('/Complaints','ComplaintsController@show');
//---------------------------Routes for Hostel Complaints end here----------------------------

//---------------------------Routes for CC Complaints begin here----------------------------
	Route::get('cc-complaint/', 'cc\PagesController@index');
	Route::post('cc-complaint/create', 'cc\CreateController@insert');
	Route::post('cc-complaint/updateAll', 'cc\UpdateAllController@updateAll');
	//Route::post('/updateFaculty', 'UpdateFacultyController@updateFaculty');
	//Route::post('/updateStaff', 'UpdateStaffController@updateStaff');
	//Route::post('/updateStudent', 'UpdateStudentController@updateStudent');
	Route::post('cc-complaint/sort', 'cc\SortController@sort');
//---------------------------Routes for CC Complaints end here----------------------------

//-----------------------Assignments_and_Course_Documentation Routes-----------------------------------
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
//-----------------------Assignments_and_Course_Documentation Routes End here-----------------------------------

//-----------------------PBI Routes Begin here------------------------------------------------------------------
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
//-----------------------PBI Routes End here----------------------------------------------------

});
