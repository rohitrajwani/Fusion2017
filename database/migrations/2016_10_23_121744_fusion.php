<?php
//create database name 'IIITDMJFUSION'
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Fusion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //NAMAN LAL
        Schema::create('All_Student', function(Blueprint $table) {
			
			$table->string('student_id', 100);
			$table->primary('student_id');
			$table->string('avatar');
			$table->integer('roll_no');
			$table->string('email', 100);
			$table->string('name', 100);
			$table->date('DOB');
			$table->string('fathers_name', 100);
			$table->string('mothers_name', 100);
			$table->string('permanent_address', 500);
			$table->string('hometown', 50);
			$table->string('state', 50);
			$table->string('correspondence_address', 500);
			$table->string('sex', 10);
			$table->string('category', 10);
			$table->string('blood_group',5)->nullable();
			$table->string('health_insurance_id', 100)->nullable();
			$table->string('guardian', 100);
			$table->bigInteger('student_phone_no');
			$table->bigInteger('fathers_phone_no');
			$table->bigInteger('guardian_phone_no');
			$table->integer('batch');
			$table->string('programme');
			$table->string('branch', 50);
			$table->integer('semester');
			$table->double('cpi');
			$table->string('room_no', 10);
			$table->string('hall_no', 5);
			$table->string('fathers_email_id', 50);
		    $table->bigInteger('allah_account_no')->nullable();
		    
			$table->timestamps();
		});
		
		Schema::create('Student', function(Blueprint $table) {
            $table->string('student_id', 100);
            
			$table->primary('student_id');
			$table->string('avatar');
			$table->integer('roll_no');
			$table->string('email', 100);
			$table->string('name', 100);
			$table->date('DOB');
            
			$table->string('fathers_name', 100);
			$table->string('mothers_name', 100);
			$table->string('permanent_address', 500);
			$table->string('hometown', 50);
			$table->string('state', 50);
			$table->string('correspondence_address', 500);
			$table->string('sex', 10);
			$table->string('category', 10);
			$table->string('blood_group',5)->nullable();
			$table->string('health_insurance_id', 100)->nullable();
			$table->string('guardian', 100);
			$table->bigInteger('student_phone_no');
			$table->bigInteger('fathers_phone_no');
			$table->bigInteger('guardian_phone_no');
			$table->integer('batch');
			$table->string('programme');
			$table->string('branch', 50);
			$table->integer('semester');
			$table->double('cpi');
			$table->string('room_no', 10);
			$table->string('hall_no', 5);
			$table->string('fathers_email_id', 50);
		    $table->bigInteger('allah_account_no')->nullable();
            $table->timestamps();
        });
        
        Schema::create('Faculty', function(Blueprint $table) {
            $table->string('faculty_id',50);
            $table->primary('faculty_id');
            
            $table->string('name');
            $table->string('sex',5);
            $table->string('address', 500);
            $table->string('email', 100);
            $table->string('department');
            $table->bigInteger('mobile_no');
            $table->date('DOB');
            $table->string('blood_group');
            $table->string('alternate_email'); //Other than college mail or personal email-Id
            $table->string('photo_url');
            $table->string('signature_url');
            $table->string('designation');
            $table->string('about_me');
            $table->date('start_date');
            $table->date('end_date');
            $table->timestamps();
        });
		Schema::create('Course', function(Blueprint $table) {
            

            $table->string('course_id', 50);
            $table->string('department', 100);
            $table->string('course_name', 200);
            $table->integer('sem');
            $table->integer('credits');
            $table->string('programme', 50);
            $table->string('syllabus_url', 500);
            $table->integer('total_classes');
            $table->timestamps();

            $table->primary('course_id');
        });
		
		Schema::create('Medals_Awards_Scholarship', function(Blueprint $table) {
            
        	
            $table->string('scholarship_id', 100);
            $table->string('title', 100);
			$table->string('type' , 50);
            $table->string('description' , 100);
            $table->date('start_date');
            $table->date('end_date');
        	$table->primary('scholarship_id');
        
            $table->timestamps();
        });
		
				Schema::create('Non_Academic_Events', function(Blueprint $table) {
            
            
            $table->string('event_id', 100);
            $table->string('event_name', 100);
            $table->string('description', 500);
            $table->string('result', 100);
            $table->integer('club_name');
            $table->integer('capacity');
            $table->primary('event_id');
        
            $table->timestamps();
        });
        Schema::create('Menu', function(Blueprint $table) {
            
        
            $table->string('mess_id', 20);
            $table->string('day', 20);
            $table->string('meal', 100);
            $table->string('item_name', 100);
        	$table->primary(['mess_id','day','meal','item_name']);
        	$table->date('effective_from');
            $table->timestamps();
        });

		Schema::create('Inventory', function(Blueprint $table) {
            
        
            $table->integer('item_id');
            $table->integer('item_category');
            $table->string('item_name', 100);
            $table->string('item_description', 100);
            $table->string('supplier_id', 100);
            $table->integer('cost_price');
            $table->integer('sale_price');
            $table->integer('purchase_rate');
            $table->integer('items_consumed');
            $table->integer('item_in_hand');
        	$table->primary('item_id');
        
            $table->timestamps();
        });
		Schema::create('Faculty_Roles', function(Blueprint $table) {
            

            $table->string('faculty_id', 100);
            $table->string('roles', 100);
            $table->timestamps();

            $table->primary('faculty_id');            
        });
        Schema::create('Employee_Approve_Reimb', function(Blueprint $table) {
            

            $table->string('emp_id', 100);
            $table->string('emp_type', 100);
            $table->integer('approve_amt');
            $table->timestamps();

            $table->primary(['emp_id','emp_type']);
        });

        Schema::create('Employee_Leave', function(Blueprint $table) {
            

            $table->string('user_id', 100);
            $table->string('user_type', 100);
            $table->integer('app_id');
            $table->integer('status');
            $table->string('leave_type', 100);
            $table->date('from');
            $table->date('to');
            $table->string('purpose', 100);
            $table->string('comments', 100);
            $table->string('leave_granting_officer', 100);
            $table->timestamps();

            $table->primary(['user_id','user_type','leave_type','from','to']);
        });

        Schema::create('Employee_request_reimb', function(Blueprint $table) {
            

            $table->string('emp_id', 100);
            $table->string('docs_url', 100);
            $table->string('emp_type', 100);
            $table->timestamps();

            $table->primary(['emp_id','emp_type']);
        });
        Schema::create('Class_Rooms', function(Blueprint $table) {
			$table->string('room_id', 100);
			$table->integer('strength');
			$table->string('room_type', 100);
			$table->primary('room_id');
			
			$table->timestamps();
		});
		Schema::create('CC_Complaint', function(Blueprint $table) {
            
        
            $table->string('complaint_id', 100);
            $table->string('user_id', 100);
            $table->string('user_type', 100);
            $table->string('category', 100);
            $table->string('sud_category', 100);
            $table->string('pc_no', 100);
            $table->integer('status');
            $table->integer('cc_no');
            $table->primary('complaint_id');
        
            $table->timestamps();
        });
        Schema::create('Booking', function(Blueprint $table) {
            
        
            $table->increments('id');
            $table->string('room_no', 100);
            $table->string('bookers_id', 100);
            $table->string('category', 5);
 	    $table->date('arrival_date');
	    $table->date('departure_date');
	    $table->time('departure_time');
            $table->time('arrival_time');
	    $table->string('name',50);
	    $table->string('address',100);
	    $table->string('organisation',50);
	    $table->string('nationality',50);   
	    $table->string('purpose_of_visit',50);
	    $table->string('email_id',50);
	    $table->boolean('food');
	    $table->integer('no_of_rooms');
	    $table->biginteger('phone_no'); 
            $table->double('fine');
            $table->double('bill');     
            $table->timestamps();
        });

        Schema::create('Bus', function(Blueprint $table) {
            
        
            $table->integer('bus_id');
            $table->integer('status');
            $table->integer('capacity');
            $table->integer('ticket_price');
            $table->primary('bus_id');
        
            $table->timestamps();
        });
        Schema::create('Appointment_Doctor', function(Blueprint $table) {
            
        
            $table->integer('appointment_id')->unique();
            $table->string('user_id', 100);
            $table->string('user_type', 100);
            $table->string('date', 100);
            $table->string('doctor_id', 100);
            $table->primary(['user_id','user_type','date','doctor_id']);
        
            $table->timestamps();
        });
        Schema::create('Activity_Description', function(Blueprint $table) {
            
           
            $table->string('activity_name', 100);
            $table->string('description', 500);
            $table->string('doc_url', 100);
            $table->date('tentative_date');
            $table->date('actual_date');
            $table->primary(['activity_name','tentative_date']);
            $table->timestamps();
        });

        Schema::create('Administrators', function(Blueprint $table) {
            
            
            $table->string('admin_id', 100);
            $table->string('email', 100);
            $table->string('password', 100);
            $table->string('name', 100);
            $table->string('department', 100);
            $table->string('sub_department', 100);
            $table->string('post', 100);
            $table->primary('admin_id');
        
            $table->timestamps();
        });

        Schema::create('Answer', function(Blueprint $table) {
            
            $table->increments('id');
            $table->string('question_id', 100);
            $table->string('answer_user_id', 500);
            $table->string('answer_user_type', 10);
            $table->string('answer', 500);
            
            
            $table->timestamps();
        });
        Schema::create('Company', function(Blueprint $table) {
            

            $table->string('company_id', 100)->unique();
            $table->string('name', 100);
            $table->string('min_qualification', 100);
            $table->string('eligibility_criteria', 100);
            $table->string('company_type', 10);
            $table->float('package',10,2);
            $table->date('arrival_date');
            $table->timestamps();

            $table->primary('company_id');
        });
		
        Schema::create('Academic_Events', function(Blueprint $table) {
            
			
            $table->string('event_id', 100);
            $table->string('event_name', 50);
            $table->string('description', 500);
            $table->string('booked_by', 100);
            $table->integer('capacity');
			$table->timestamp('timestamp');
			$table->primary('event_id');
            
            $table->timestamps();
        });
		
 		Schema::create('Balance_leaves', function(Blueprint $table) {
            
        
            $table->string('user_id', 100);
            $table->string('user_type', 100);
            $table->integer('casual');
            $table->integer('special_casual');
            $table->integer('half_pay');
            $table->integer('commuted');
            $table->integer('earned');
            $table->integer('maternity');
            $table->integer('paternity');
            $table->integer('study');
            $table->integer('sabbatical');
            $table->integer('leave_not_due');
            $table->integer('foreign_service_short');
            $table->integer('foreign_service_long');
            $table->primary(['user_id','user_type']);
        
            $table->timestamps();
        });
		Schema::create('Staff', function(Blueprint $table) {
			
			$table->string('staff_id', 100);
			$table->string('password', 100);
			$table->string('name', 100);
			$table->string('email', 100);
			$table->string('address', 500);
			$table->string('department', 100);
			$table->string('sub_department', 100);
			$table->string('post', 100);
			$table->primary('staff_id');
		
			$table->timestamps();
		});
		
		
		Schema::create('Room_Booking_Request', function(Blueprint $table) {
            
        
            $table->increments('req_id', 100);
            $table->string('room_id', 100);
            $table->string('requester_id', 100);
            $table->string('requester_type', 100);
            $table->integer('status');
            $table->string('purpose', 1000);
            $table->integer('expected_no_of_students');
            $table->date('date');
            $table->time('start_time');
	    $table->time('end_time');
            $table->timestamps();
        });

        Schema::create('Salary', function(Blueprint $table) {
            
        
            $table->string('emp_id', 100);
            $table->string('emp_type', 100);
            $table->integer('sal_amount');
            $table->integer('allowances');
            $table->integer('bonuses');
        
           $table->primary(['emp_id','emp_type']);
            
            $table->timestamps();
        });

        Schema::create('Scheduled_Activity', function(Blueprint $table) {
            
        
            $table->string('activity_name', 100)->default('');
            $table->string('club_name', 100);
        
            $table->primary('activity_name');
            
            $table->timestamps();
        });
        
        Schema::create('Question', function(Blueprint $table) {
            
        
            $table->string('user_id', 100);
            $table->string('question_id', 100);
            $table->string('course_id', 100);
            $table->string('question', 500);
            $table->date('timestamp');
        
            $table->primary('question_id');
            
            $table->timestamps();
        });

		Schema::create('Project_by_Gymkhana', function(Blueprint $table) {
            
            
            
            $table->string('project_name', 100);
            $table->string('project_description', 100);
            $table->string('proposed_by', 100);
            $table->date('date_of_proposal');
        
            $table->primary('project_name');
            
            $table->timestamps();
        });

        Schema::create('Proposed_Events', function(Blueprint $table) {
            
        
            $table->string('event_id', 100);
            $table->string('description', 500);
            $table->string('club_name', 100);
        
            $table->primary('event_id');
            
            $table->timestamps();
        });
        
        Schema::create('Question_Of_Semester_Feedback', function(Blueprint $table) {
            
        
            $table->integer('question_id');
            $table->string('question', 500);
        
            $table->primary('question_id');
            
            $table->timestamps();
        });

        Schema::create('Record_Hospital', function(Blueprint $table) {
            
        
            $table->integer('appointment_id');
            $table->string('prescription', 500);
        
            $table->primary('appointment_id');
            
            $table->timestamps();
        });
        
		Schema::create('Requested_Events', function(Blueprint $table) {
            
        
            $table->string('event_id', 100);
            $table->string('club_name', 100);
            $table->string('description', 500);
            $table->integer('status');
            $table->string('student_id', 100);
        
            $table->primary('event_id');
            
            $table->timestamps();
        });
        Schema::create('Semester_Feedback', function(Blueprint $table) {
            
        
            $table->string('faculty_id', 100);
            $table->string('course_id', 100);
            $table->integer('question_id');
            $table->integer('excellent');
            $table->integer('good');
            $table->integer('average');
            $table->integer('poor');
            
            $table->primary(['faculty_id','course_id','question_id']);

            $table->timestamps();
        });

        Schema::create('Senate_Meeting', function(Blueprint $table) {
            
        
            $table->string('agenda', 100);
            $table->string('minutes', 100);
            $table->timestamp('timestamp');
            
            $table->primary('timestamp');
        
            $table->timestamps();
        });
		Schema::create('Student_Committee', function(Blueprint $table) {
			
			$table->string('committee_name', 100);
			$table->bigInteger('budget');
			$table->string('description', 100);
			$table->primary('committee_name');
		
			$table->timestamps();
		});
		Schema::create('Supplier_Info', function(Blueprint $table) {
			
			$table->string('supplier_id', 100);
			$table->string('name', 100);
			$table->string('company', 100);
			$table->bigInteger('contact');
			$table->string('address', 100);
		
			$table->primary('supplier_id');
			$table->timestamps();
		});
		Schema::create('VH_Rooms', function(Blueprint $table) {
			
			$table->string('room_no', 20);
			$table->string('room_type', 20);
			$table->boolean('checked_in');
			$table->boolean('availability');
			$table->primary('room_no');
			$table->timestamps();
		});

		Schema::create('Visitors_Complaint', function(Blueprint $table) {
			
			$table->integer('complaint_no');
			$table->integer('booking_id');
			$table->integer('fine');
			$table->string('description', 500);
			$table->primary('complaint_no');
		
			$table->timestamps();
		});

		Schema::create('Ward', function(Blueprint $table) {
			
			$table->string('ward_id', 100);
			$table->string('bed_id', 100);
			$table->integer('status');
			$table->primary(['ward_id','bed_id']);
		
			$table->timestamps();
		});
		Schema::create('Indenter', function(Blueprint $table) {
            
            $table->bigInteger('i_phoneno');
			$table->string('i_emailid',100);
			$table->string('i_name',100);
            $table->primary('i_phoneno');
            $table->timestamps();
        });
        
        Schema::create('Supplier', function(Blueprint $table) {
            
            $table->bigInteger('s_phoneno');
			$table->string('s_emailid',100);
			$table->string('s_name',100);
            $table->primary('s_phoneno');
            $table->timestamps();
        });
        
        Schema::create('Invoice', function(Blueprint $table) {
            
            
			$table->string('invoice_id',100);
			$table->bigInteger('s_phoneno');
            $table->primary('invoice_id');
            $table->timestamps();
        });
        
        Schema::create('Procurement', function(Blueprint $table) {
            
            
			$table->string('p_id',100);
			$table->string('p_name',100);
            $table->primary('p_id');
            $table->timestamps();
        });
        
        Schema::create('Advertisement', function(Blueprint $table) {
            
            
			$table->string('a_id',100);
			$table->string('n_name',100);
			$table->string('n_pgno',100);
            $table->primary('a_id');
            $table->timestamps();
        });
       
		Schema::create('Order', function(Blueprint $table) {
            
			$table->string('o_id',100);
			$table->bigInteger('i_phoneno');
			$table->bigInteger('s_phoneno');
			$table->integer('Quantity');
			$table->integer('penalty');
			$table->date('o_deadline');
			$table->float('payment_amt');
			$table->date('o_date');
			$table->primary('o_id');
			
            $table->timestamps();
        });
         Schema::create('Patient', function(Blueprint $table) {
            
            
            $table->string('patient_id', 100);
            $table->string('patient_type', 100);
            $table->string('category', 100);
            $table->string('ward_id', 100);
            $table->string('bed_id', 100);
            $table->primary(['patient_id','patient_type']);
        
            $table->timestamps();
        });
        Schema::create('Academic_Result', function(Blueprint $table) {
            
             
            $table->string('student_id', 100);
            $table->string('course_id', 100);
            $table->string('grade', 5);
            $table->integer('semester');
			$table->primary(['student_id','course_id']);
			$table->foreign('student_id')->references('student_id')->on('Student');
            $table->foreign('course_id')->references('course_id')->on('Course');
            $table->timestamps();
        });

        

        Schema::create('Application_Counselling', function(Blueprint $table) {
            
          
            $table->string('student_id', 100);
            $table->primary('student_id');
            $table->foreign('student_id')->references('student_id')->on('Student');
            $table->timestamps();
        });

        Schema::create('Application_documents', function(Blueprint $table) {
            
        
            $table->string('scholarship_id', 100);
            $table->string('student_id', 100);
            $table->string('docs_url', 100);
            $table->primary(['scholarship_id','student_id']); $table->foreign('scholarship_id')->references('scholarship_id')->on('Medals_Awards_Scholarship');
            $table->foreign('student_id')->references('student_id')->on('Student');
            $table->timestamps();
        });

        Schema::create('Application_Student_Guide', function(Blueprint $table) {
            
        
            $table->string('student_id', 100);
            $table->string('reason', 100);
            $table->primary('student_id');
            $table->foreign('student_id')->references('student_id')->on('Student');
        
            $table->timestamps();
        });

        Schema::create('Applied_For_Company', function(Blueprint $table) {
            
        
            $table->string('student_id', 100);
            $table->string('company_id', 100);
            $table->integer('status_of_placement');
            $table->integer('test_result');
            $table->primary(['student_id','company_id']);
            $table->foreign('student_id')->references('student_id')->on('Student');
            $table->foreign('company_id')->references('company_id')->on('Company');
            $table->timestamps();
        });

        Schema::create('Applied_For_TA', function(Blueprint $table) {
            
        
            $table->string('student_id', 100);
            $table->string('course_id', 100);
            $table->integer('preference_no');
            $table->primary(['student_id','course_id']);
            $table->foreign('student_id')->references('student_id')->on('Student');
            $table->foreign('course_id')->references('course_id')->on('Course');
            
            $table->timestamps();
        });

        

        Schema::create('Assistant_Coordinator', function(Blueprint $table) {
            
        
            $table->string('stuguide_id', 100);
            $table->string('assist_id', 100);
            $table->primary('stuguide_id');
            $table->foreign('stuguide_id')->references('student_id')->on('Student');
            $table->foreign('assist_id')->references('student_id')->on('Student');
            $table->timestamps();
        });

        Schema::create('Awards_Applications', function(Blueprint $table) {
            
        
            $table->string('scholarship_id', 100);
            $table->string('student_id', 100);
            $table->timestamp('submitted_timestamp');
			$table->double('tot_an_inc_p',8,2);
			$table->string('brother_name',50);
			$table->string('sister_name',50);
			$table->string('p_occupation',100);
			$table->string('b_occupation',100);
			$table->string('s_occupation',100);
			$table->string('service_type',100);
			$table->string('firm_name',100);
			$table->string('firm_address',200);
			$table->string('nature_of_business',100);
			$table->string('registration_no',100);
			$table->string('tax_reg_no',100);
            $table->integer('status');
            $table->primary(['student_id','scholarship_id']);
            $table->foreign('student_id')->references('student_id')->on('Student');
            $table->foreign('scholarship_id')->references('scholarship_id')->on('Medals_Awards_Scholarship');
            $table->timestamps();
        });
		Schema::create('Awards_Achievement',function(Blueprint $table)
		{
			
			$table->increments('sa_id');
			$table->string('student_id',100);
			$table->string('name',100);
			$table->string('awardiing_authority',100);
			$table->string('p_time_period',100);
			$table->bigInteger('amount');
			$table->string('doc-url',100);
			$table->timestamps();
		});
        

        Schema::create('Bonafide', function(Blueprint $table) {
            
            
            $table->string('student_id', 100);
            $table->string('receipt_no', 100);
            $table->string('purpose', 500);
            $table->integer('status');
            $table->primary(['student_id','receipt_no']);
            $table->foreign('student_id')->references('student_id')->on('Student');
        
            $table->timestamps();
        });

        Schema::create('Achievements', function(Blueprint $table) {
            
        
            $table->string('student_id', 100);
			$table->string('ach_type',100);
			$table->string('description',500);
			$table->string('docs_url',100);
            $table->primary(['student_id','ach_type']);
            $table->foreign('student_id')->references('student_id')->on('Student');
            $table->timestamps();
        });
		
        Schema::create('Bus_Booking', function(Blueprint $table) {
            
        
            $table->integer('booking_id');
            $table->integer('bus_id');
            $table->string('user_id', 100);
            $table->string('user_type', 100);
            $table->timestamp('timestamp');
            $table->primary(['bus_id','user_id','user_type','timestamp']);
           
            $table->foreign('bus_id')->references('bus_id')->on('Bus');
            $table->timestamps();
        });

        Schema::create('Bus_Feedback', function(Blueprint $table) {
            
        
            $table->increments('feedback_id');
            $table->string('description', 1000);
            
            $table->timestamps();
        });

        Schema::create('Bus_Schedule', function(Blueprint $table) {
            
        
            $table->timestamp('timestamp');
            $table->string('source', 300);
            $table->string('destination', 300);
            $table->integer('bus_id');
            $table->primary(['bus_id','timestamp']);
           
            $table->foreign('bus_id')->references('bus_id')->on('Bus');
            $table->timestamps();
        });

        Schema::create('Candidate_Witness', function(Blueprint $table) {
            
        
            $table->string('student_id', 100);
            $table->string('witness_student_id', 100);
            $table->primary(['student_id','witness_student_id']);
            $table->foreign('student_id')->references('student_id')->on('Student');
           $table->foreign('witness_student_id')->references('student_id')->on('Student');
            $table->timestamps();
        });

        
        Schema::create('Classroom_Slots', function(Blueprint $table) {
			$table->string('room_id', 100);
			$table->string('course_id', 100);
			$table->string('day', 20);
			$table->time('from_time');
			$table->time('to_time');
		  	$table->primary(['room_id','course_id','day']);
		  	$table->timestamps();
			$table->foreign('course_id')->references('course_id')->on('Course');
			$table->foreign('room_id')->references('room_id')->on('Class_Rooms');
		});

		
        //ROHIT RAJWANI
        Schema::create('Gymkhana_Club_Cocoordinator', function(Blueprint $table) {
            

            $table->string('club_name', 100);
            $table->string('coco_student_id', 100);
            $table->timestamps();

            $table->primary(['club_name','coco_student_id']);

            $table->foreign('coco_student_id')->references('student_id')->on('Student');
        });

        Schema::create('Gymkhana_Club_Coordinator', function(Blueprint $table) {
            

            $table->string('club_name', 100);
            $table->string('coordinator_student_id', 100);
            $table->integer('budget');
            $table->timestamps();

            $table->primary('club_name');

            $table->foreign('coordinator_student_id')->references('student_id')->on('Student'); 
        });
        Schema::create('Club_Members', function(Blueprint $table) {
            

            $table->string('club_name', 100);
            $table->string('student_id', 100);
            
			$table->primary(['club_name','student_id']);
            
            $table->foreign('club_name')->references('club_name')->on('Gymkhana_Club_Coordinator');
            $table->foreign('student_id')->references('student_id')->on('Student');
        	$table->timestamps();
            
        });

        

        

        Schema::create('Course_Taken_By', function(Blueprint $table) {

            $table->string('course_id', 100);
            $table->string('faculty_id', 100);
            $table->timestamps();

            $table->primary(['course_id','faculty_id']);

            $table->foreign('faculty_id')->references('faculty_id')->on('Faculty');
            $table->foreign('course_id')->references('course_id')->on('Course');
        });

        Schema::create('Doctor', function(Blueprint $table) {
            

            $table->string('staff_id', 100);
            $table->string('specialization', 500);
            $table->timestamps();

            $table->primary('staff_id');

            $table->foreign('staff_id')->references('staff_id')->on('Staff');
        });



        Schema::create('Evaluation_Of_Phd', function(Blueprint $table) {
            

            $table->string('student_id', 100);
            $table->string('phd_roll_no', 20);
            $table->string('course_id', 50);
            $table->string('grade', 5);        
            $table->timestamps();

            $table->primary(['student_id','phd_roll_no','course_id']);

            $table->foreign('course_id')->references('course_id')->on('Course');
            $table->foreign('student_id')->references('student_id')->on('Student');
            $table->foreign('phd_roll_no')->references('student_id')->on('Student');

        });

        

        Schema::create('Faculty_Phone_No', function(Blueprint $table) {
            

            $table->string('faculty_id', 100);
            $table->integer('faculty_phone_no');
            $table->timestamps();

            $table->primary(['faculty_id','faculty_phone_no']);

            $table->foreign('faculty_id')->references('faculty_id')->on('Faculty');
        });

        
        Schema::create('Faculty_Takes_Course', function(Blueprint $table) {
            

            $table->string('course_id', 100);
            $table->string('faculty_id', 100);
            $table->timestamps();

            $table->primary(['course_id','faculty_id']);

            $table->foreign('course_id')->references('course_id')->on('Course');
            $table->foreign('faculty_id')->references('faculty_id')->on('Faculty');
        });

        

        Schema::create('Hostel_Complaint', function(Blueprint $table) {
            

            $table->string('complaint_id', 100);
            $table->string('category', 50);
            $table->string('sub_category', 50);
            $table->string('student_id', 100);
            $table->string('room_no', 20);
            $table->integer('hall_no');
            $table->string('description', 500);
            $table->string('status',10);
            $table->timestamps();

            $table->primary('complaint_id');

            $table->foreign('student_id')->references('student_id')->on('Student');
        });

        
        

        
        Schema::create('Mess_Committee', function(Blueprint $table) {
            
        
            $table->string('student_id', 100);
            $table->string('mess_id', 20);
        	$table->primary('student_id');
        	$table->foreign('student_id')->references('student_id')->on('Student');

            $table->timestamps();
        });

        Schema::create('Mess_Feedback', function(Blueprint $table) {
            
        
            $table->string('student_id', 100);
            $table->increments('feedback_id');
            $table->string('description', 200);
            $table->timestamp('timestamp');
            $table->string('cleanliness',10);
            $table->string('service',10);
            $table->string('behaviour',10);
            $table->string('food_quality',10);
        	$table->foreign('student_id')->references('student_id')->on('Student');

        
            $table->timestamps();
        });
      Schema::create('Mess_Order', function(Blueprint $table) {
            
        
            $table->increments('order_id', 100); 
            $table->string('student_id', 100); 
            $table->string('lunch',10);
            $table->string('breakfast',10);
            $table->string('dinner',10);
            $table->date('begin_date');
	    $table->date('end_date');
            $table->foreign('student_id')->references('student_id')->on('Mess_Committee');
            $table->timestamps();
        });

        Schema::create('Mess_Leave_Application', function(Blueprint $table) {
            
        
            $table->integer('application_no');
            $table->string('student_id', 100);
            $table->date('from_date');
            $table->date('till_date');
            $table->string('reason', 500);
        	$table->foreign('student_id')->references('student_id')->on('Student');

        
            $table->timestamps();
        });
        //GAURAV
         Schema::create('Mess_Registration', function(Blueprint $table) {
            
             
            $table->string('student_id', 100);
            $table->string('mess_id', 20);
             $table->foreign('student_id')->references('student_id')->on('Student');
             
        
        
            $table->timestamps();
        });

        

        Schema::create('Notification', function(Blueprint $table) {
            
          
            $table->string('user_id', 100)->default('');
            $table->string('user_type', 100)->default('');
            $table->string('notification', 1000);
        
        
            $table->timestamps();
        });

       

        Schema::create('Polling', function(Blueprint $table) {
            
            
            
            $table->string('event_id', 100);
            $table->string('student_id', 100);
            $table->string('opinion', 100);
            
            $table->primary(['event_id','student_id']);
            $table->foreign('student_id')->references('student_id')->on('Student');
            
            $table->timestamps();
        });

		Schema::create('Student_Guide_Assign', function(Blueprint $table) {
			
			$table->string('student_id', 100);
			$table->string('stuguide_id', 100);
			$table->primary(['student_id','stuguide_id']);
			$table->foreign('student_id')->references('student_id')->on('Student');
			$table->foreign('stuguide_id')->references('student_id')->on('Student');
			$table->timestamps();
		});
        Schema::create('Problem', function(Blueprint $table) {
            
            
            
            $table->string('prob_id', 100)->unique();
            $table->string('student_id', 100);
            $table->string('stuguide_id', 100);
            $table->integer('frwd_prob');
            $table->string('description', 500);
            $table->string('solution', 500);
            $table->primary('prob_id');
            $table->foreign('student_id')->references('student_id')->on('Student');
            $table->foreign('stuguide_id')->references('stuguide_id')->on('Student_Guide_Assign');

            
            $table->timestamps();
        });

        

        Schema::create('Public_Post', function(Blueprint $table) {
            
        	$table->increments('id');
            $table->string('student_id', 100);
            $table->string('description', 500);
            
            $table->foreign('student_id')->references('student_id')->on('Student');
            
            $table->timestamps();
            
        });

        

        Schema::create('Register_Course', function(Blueprint $table) {
            
        
            $table->string('course_id', 100);
            $table->string('student_id', 100);
        
            $table->primary(['course_id','student_id']);
            $table->foreign('student_id')->references('student_id')->on('Student');
        
            $table->timestamps();
        });

        

        Schema::create('Review', function(Blueprint $table) {
            
        
            $table->string('event_id', 100);
            $table->string('student_id', 100);
            $table->string('description', 500);
            
            $table->primary(['event_id','student_id']);
            $table->foreign('student_id')->references('student_id')->on('Student');
        
            $table->timestamps();
        });

        
        //SAURABH
		Schema::create('Senate_Member', function(Blueprint $table) {
			
			$table->string('student_id', 100);
			$table->string('responsibility', 100);
			$table->primary('student_id');
			$table->foreign('student_id')->references('student_id')->on('Student');
			$table->timestamps();
		});

		

		Schema::create('Staff_Phone_No', function(Blueprint $table) {
			
			$table->string('staff_id', 100);
			$table->bigInteger('staff_phone_no');
			$table->primary(['staff_id','staff_phone_no']);
			$table->foreign('staff_id')->references('staff_id')->on('Staff');
		
			$table->timestamps();
		});

		

		Schema::create('Student_Attendance', function(Blueprint $table) {
			
			$table->string('student_id', 100);
			$table->string('course_id', 100);
			$table->date('date');
			$table->integer('status');
			$table->primary(['student_id','course_id','date']);
			$table->foreign('student_id')->references('student_id')->on('Student');
			
			$table->timestamps();
		});

		

		Schema::create('Student_Committee_Members', function(Blueprint $table) {
			
			$table->string('committee_name', 100);
			$table->string('student_id', 100);
			$table->primary(['committee_name','student_id']);
			$table->foreign('student_id')->references('student_id')->on('Student');
		
			$table->timestamps();
		});

		Schema::create('Student_Counselling', function(Blueprint $table) {
			
			$table->string('student_id', 100);
			
			$table->string('responsibility', 100);
			$table->foreign('student_id')->references('student_id')->on('Student');
			$table->timestamps();
		});

		

		Schema::create('Student_Leave_Application', function(Blueprint $table) {
			
			$table->string('leave_app_id', 100);
			$table->string('student_id', 100);
			$table->date('from_date');
			$table->date('till_date');
			$table->string('subject', 500);
			$table->integer('status');
			$table->primary(['leave_app_id','student_id']);
			$table->foreign('student_id')->references('student_id')->on('Student');
			$table->timestamps();
		});

		Schema::create('Study_Material', function(Blueprint $table) {
			
			$table->string('student_id', 100);
			$table->string('course_id', 100);
			$table->string('description', 500);
			$table->string('url', 500);
			$table->foreign('student_id')->references('student_id')->on('Student');
			$table->foreign('course_id')->references('course_id')->on('Course');
			$table->timestamps();
		});

		Schema::create('Suggestions_By_Students', function(Blueprint $table) {
			
			$table->string('faculty_id', 100);
			$table->string('course_id', 100);
			$table->string('suggestion', 500);
			$table->foreign('course_id')->references('course_id')->on('Course');
			$table->primary(['faculty_id','course_id']);
			$table->timestamps();
		});

		

		Schema::create('Ta', function(Blueprint $table) {
			
			$table->string('student_id', 100);
			$table->string('course_id', 100);
			$table->string('batch', 15);
			$table->bigInteger('default_stipend');
			$table->foreign('student_id')->references('student_id')->on('Student');           
			$table->foreign('course_id')->references('course_id')->on('Course');           	
			$table->primary(['student_id','course_id']);
			$table->timestamps();
		});
		

		Schema::create('Ta_Attendance', function(Blueprint $table) {
			
			
			$table->string('student_id', 100);
			$table->date('date');
			$table->integer('attendance_status');
			$table->primary(['student_id','date']);
			$table->foreign('student_id')->references('student_id')->on('Student');
			$table->timestamps();
		});

		
		Schema::create('Ta_Claim', function(Blueprint $table) {
			
			$table->string('student_id', 100);
			
			$table->integer('month');
			$table->bigInteger('bank_acc_no');
			$table->integer('applicability');
			$table->integer('status');
			$table->string('ta_sup_comment',100);
			$table->bigInteger('stipend');
			$table->primary('student_id');
			$table->foreign('student_id')->references('student_id')->on('Student');
			$table->timestamps();
		});

		Schema::create('Ta_Post_Openings', function(Blueprint $table) {
			
			$table->string('course_id', 100);
			$table->integer('no_of_openings');
			$table->integer('no_of_batches');
			$table->primary('course_id');
			$table->foreign('course_id')->references('course_id')->on('Course');
			
			$table->timestamps();
		});
		Schema::create('Ta_feedback', function(Blueprint $table) {
			
			$table->string('student_id', 100);
			$table->integer('description');
			$table->integer('rating');
			$table->primary('student_id');
			$table->foreign('student_id')->references('student_id')->on('Student');
			
			$table->timestamps();
		});

		Schema::create('Teaching_Credit', function(Blueprint $table) {
			
			$table->string('phd_roll_no', 100);
			$table->string('course_id', 100);
			$table->integer('classes_taken');

			$table->primary(['phd_roll_no','course_id']);
			$table->foreign('course_id')->references('course_id')->on('Course');
		    $table->foreign('phd_roll_no')->references('student_id')->on('Student');
		
			$table->timestamps();
		});

		
		
		Schema::create('Pbi', function(Blueprint $table) {
            
			
            $table->string('pbi_id', 100);
            $table->string('type', 50);
            $table->string('fa_id', 100);
            $table->string('student_id',100);
            $table->string('topic_name',500);
			$table->string('reference',600);
			$table->primary('pbi_id');
            $table->foreign('student_id')->references('student_id')->on('Student');
            $table->foreign('fa_id')->references('faculty_id')->on('Faculty');
        
            $table->timestamps();
        });
		
		Schema::create('Pbi_Reports', function(Blueprint $table) {
            
			
            $table->string('report_id', 100);
            $table->string('student_id',100);
            $table->string('type',50);
			$table->string('pbi_id',100);
			$table->primary('report_id');
            $table->foreign('student_id')->references('student_id')->on('Student');
            $table->foreign('pbi_id')->references('pbi_id')->on('Pbi');
        
            $table->timestamps();
        });
        
        Schema::create('Pbi_Applied_For', function(Blueprint $table) {
            
            $table->string('student_id',100);
            $table->string('pbi_id',100);
	    	$table->foreign('student_id')->references('student_id')->on('Student');
            $table->foreign('pbi_id')->references('pbi_id')->on('Pbi');
        	$table->timestamps();
        });
        
        
        
        Schema::create('Tender', function(Blueprint $table) {
            
			$table->string('t_id',100);
			$table->string('p_id',100);
			$table->string('t_name',100);
            $table->date('closing_date');
            $table->string('cost_type',100);
            $table->string('item_type',100);
            $table->date('posting_date');
            $table->bigInteger('i_phoneno');
            $table->primary(['t_id','p_id']);
            $table->foreign('p_id')->references('p_id')->on('Procurement');
            $table->timestamps();
        });
        
        Schema::create('Evaluates', function(Blueprint $table) {
            
            $table->bigInteger('i_phoneno');
			$table->string('invoice_id',100);
			$table->primary(['i_phoneno','invoice_id']);
            $table->foreign('i_phoneno')->references('i_phoneno')->on('Indenter');
            $table->foreign('invoice_id')->references('invoice_id')->on('Invoice');
        	$table->timestamps();
        });
        
        
        
        Schema::create('Responds', function(Blueprint $table) {
            
            
			$table->string('t_id',100);
			$table->bigInteger('s_phoneno');
			$table->primary(['t_id','s_phoneno']);
            $table->foreign('t_id')->references('t_id')->on('Tender');
            $table->timestamps();
        });
        
        Schema::create('Advertise', function(Blueprint $table) {
            
            
			$table->string('a_id',100);
			$table->string('t_id',100);
			$table->primary(['a_id','t_id']);
            $table->foreign('a_id')->references('a_id')->on('Advertisement');
            $table->foreign('t_id')->references('t_id')->on('Tender');
        	$table->timestamps();
        });
        Schema::create('Assignment', function(Blueprint $table) {
            
            
			$table->increments('assign_id');
			$table->string('course_id',100);
			$table->timestamp('upload_time');
			$table->date('deadline');
			$table->string('url_assign',100);
            $table->foreign('course_id')->references('course_id')->on('Course');
        	$table->timestamps();
        });
Schema::create('Solves_Assignment', function(Blueprint $table) {
            
            
			$table->integer('assign_id')->unsigned();
			$table->string('student_id',100);
			$table->string('course_id',100);
			$table->date('deadline');
			$table->string('url_sol',100);
			$table->primary(['assign_id','student_id','course_id']);
            $table->foreign('assign_id')->references('assign_id')->on('Assignment');
            $table->foreign('student_id')->references('student_id')->on('Student');
            $table->foreign('course_id')->references('course_id')->on('Course');
        	$table->timestamps();
        });
    
    Schema::create('Mess_Bill', function(Blueprint $table) {
            
            
		
			$table->string('student_id',100);
			$table->string('month',15);
 			$table->bigInteger('amount');
			
			$table->primary(['month','student_id']);
       
            $table->foreign('student_id')->references('student_id')->on('Student');
        
        	$table->timestamps();
        });
    Schema::create('Application_Assistant_Coordinator', function (Blueprint $table) {
            $table->string('student_id', 100);
            $table->string('reason', 100);
            $table->primary('student_id');
            $table->foreign('student_id')->references('student_id')->on('Student');
	    $table->timestamps();
	});
      Schema::create('Rules_and_Reg', function (Blueprint $table) {
            $table->increments('id');
            $table->string('rule', 100);
	    $table->timestamps();
	});
      Schema::create('Assessment', function (Blueprint $table) {
            $table->integer('assign_id')->unsigned();
            $table->string('student_id', 100);
			//$table->string('student_id1', 100)->default(null)->nullable();
			$table->float('marks',8,2)->default(null)->nullable();
			//$table->string('student_id2', 100)->default(null)->nullable();
			//$table->float('marks2',8,2)->default(null)->nullable();
			//$table->string('student_id3', 100)->default(null)->nullable();
			//$table->float('marks3',8,2)->default(null)->nullable();
			//$table->float('average',8,2)->default(null)->nullable();
			$table->primary(['assign_id','student_id']);
			$table->foreign('student_id')->references('student_id')->on('Student');
			//$table->foreign('student_id1')->references('student_id')->on('Student');
			//$table->foreign('student_id2')->references('student_id')->on('Student');
            $table->foreign('assign_id')->references('assign_id')->on('Assignment');
					
	    $table->timestamps();
	});	
       Schema::create('Document', function (Blueprint $table) {
            $table->increments('doc_id');
            $table->string('doc_url', 20);
			$table->timestamp('upload_time');
			$table->string('course_id',50);
		
			$table->foreign('course_id')->references('course_id')->on('Course');
	    $table->timestamps();
	});

	Schema::create('Login',function (Blueprint $table)
        {
            $table->string('username', 100);
            $table->string('user_type', 100);
            $table->string('password', 100);
            $table->rememberToken();
            $table->primary('username');

            /*$table->foreign('username')->references('student_id')->on('Student')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('username')->references('faculty_id')->on('Faculty')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('username')->references('staff_id')->on('Staff')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('username')->references('admin_id')->on('Administrators')->onDelete('cascade')->onUpdate('cascade');*/

            $table->timestamps();
        });	
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::drop('Academic_Events');
		Schema::drop('Academic_Result');
		Schema::drop('Activity_Description');
		Schema::drop('Administrators');
		Schema::drop('Answer');
		Schema::drop('Application_Counselling');
		Schema::drop('Application_documents');
		Schema::drop('Application_Student_Guide');
		Schema::drop('Applied_For_Company');
		Schema::drop('Applied_For_TA');
		Schema::drop('Appointment_Doctor');
		Schema::drop('Assistant_Coordinator');
		Schema::drop('Awards_Applications');
		Schema::drop('Achievements');
		Schema::drop('Awards_Achievement');
		Schema::drop('Balance_leaves');
		Schema::drop('Bonafide');
		Schema::drop('Booking');
		Schema::drop('Bus');
		Schema::drop('Bus_Booking');
		Schema::drop('Bus_Feedback');
		Schema::drop('Bus_Schedule');
		Schema::drop('Candidate_Witness');
		Schema::drop('CC_Complaint');
		Schema::drop('Classroom_Slots');
		Schema::drop('Class_Rooms');
		Schema::drop('Club_Members');
		Schema::drop('Company');
		Schema::drop('Course');
		Schema::drop('Course_Taken_By');
		Schema::drop('Doctor');
		Schema::drop('Employee_Approve_Reimb');
		Schema::drop('Employee_Leave');
		Schema::drop('Employee_request_reimb');
		Schema::drop('Evaluation_Of_Phd');
		Schema::drop('Faculty');
		Schema::drop('Faculty_Phone_No');
		Schema::drop('Faculty_Roles');
		Schema::drop('Faculty_Takes_Course');
		Schema::drop('Gymkhana_Club_Cocoordinator');
		Schema::drop('Gymkhana_Club_Coordinator');
		Schema::drop('Hostel_Complaint');
		Schema::drop('Inventory');
		Schema::drop('Medals_Awards_Scholarship');
		Schema::drop('Menu');
		Schema::drop('Mess_Committee');
		Schema::drop('Mess_Feedback');
		Schema::drop('Mess_Order');
		Schema::drop('Mess_Leave_Application');
		Schema::drop('Mess_Registration');
		Schema::drop('Non_Academic_Events');
		Schema::drop('Notification');
		Schema::drop('Patient');
		Schema::drop('Polling');
		Schema::drop('Problem');
		Schema::drop('Project_by_Gymkhana');
		Schema::drop('Proposed_Events');
		Schema::drop('Public_Post');
		Schema::drop('Question');
		Schema::drop('Question_Of_Semester_Feedback');
		Schema::drop('Record_Hospital');
		Schema::drop('Register_Course');
		Schema::drop('Requested_Events');
		Schema::drop('Review');
		Schema::drop('Room_Booking_Request');
		Schema::drop('Salary');
		Schema::drop('Scheduled_Activity');
		Schema::drop('Semester_Feedback');
		Schema::drop('Senate_Meeting');
		Schema::drop('Senate_Member');
		Schema::drop('Staff');
		Schema::drop('Staff_Phone_No');
		Schema::drop('Student');
		Schema::drop('Student_Attendance');
		Schema::drop('Student_Committee');
		Schema::drop('Student_Committee_Members');
		Schema::drop('Student_Counselling');
		Schema::drop('Student_Guide_Assign');
		Schema::drop('Student_Leave_Application');
		Schema::drop('Study_Material');
		Schema::drop('Suggestions_By_Students');
		Schema::drop('Supplier_Info');
		Schema::drop('Ta');
		Schema::drop('Ta_Attendance');
		Schema::drop('Ta_Attendance_Sheet');
		Schema::drop('Ta_Claim');
		Schema::drop('Ta_Post_Openings');
		Schema::drop('Teaching_Credit');
		Schema::drop('VH_Rooms');
		Schema::drop('Visitors_Complaint');
		Schema::drop('Ward');
		Schema::drop('Pbi');
		Schema::drop('Pbi_Reports');
		Schema::drop('Pbi_Applied_For');
		Schema::drop('Assignment');
 		Schema::drop('Solves_Assignment');
		Schema::drop('Document');
		Schema::drop('Assessment');
    }
}
