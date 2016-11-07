<?php

// create database name 'IIITDMJFUSION'

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class FusionDB extends Migration

{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        

        Schema::create('All_Student',function (Blueprint $table)
        {
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
            $table->string('blood_group', 5)->nullable();
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
        Schema::create('Student',function (Blueprint $table)
        {
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
            $table->string('blood_group', 5)->nullable();
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
        
        Schema::create('Login',function (Blueprint $table)
        {
            $table->string('username', 100);
            $table->string('user_type', 100);
            $table->string('password', 100);
            $table->rememberToken();
            $table->primary('username');
            
           
            $table->timestamps();
        });

        Schema::create('Administrators',function (Blueprint $table)
        {
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

        Schema::create('Faculty',function (Blueprint $table)
        {
            $table->string('faculty_id', 50);
            $table->primary('faculty_id');
            $table->string('name');
            $table->string('sex', 5);
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

        Schema::create('Staff',function (Blueprint $table)
        {
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

        
        Schema::create('Bus',function (Blueprint $table)
        {
            $table->integer('bus_id');
            $table->integer('status');
            $table->integer('capacity');
            $table->integer('ticket_price');
            $table->primary('bus_id');
            $table->timestamps();
        });

        Schema::create('Bus_Booking',function (Blueprint $table)
        {
            $table->increments('booking_id');
            $table->integer('bus_id');
            $table->string('user_id', Auth::user()->username);
            $table->string('user_type', 100);
            $table->timestamp('timestamp');
            $table->unique(array(
                'bus_id',
                'user_id',
                'user_type',
                'timestamp'
            ));
            $table->foreign('bus_id')->references('bus_id')->on('Bus')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
        Schema::create('Bus_Feedback',function (Blueprint $table)
        {
            $table->increments('feedback_id');
            $table->string('description', 1000);
            $table->timestamps();
        });
        Schema::create('Bus_Schedule',function (Blueprint $table)
        {
            $table->time('timestamp');
            $table->string('source', 300);
            $table->string('destination', 300);
            $table->integer('bus_id');
            $table->primary(['bus_id', 'timestamp']);
            $table->foreign('bus_id')->references('bus_id')->on('Bus')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });

        Schema::create('Notification',function (Blueprint $table)
        {
            $table->string('user_id', 100)->default('');
            $table->string('user_type', 100)->default('');
            $table->string('notification', 1000);
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the
     
      migrations.
     *
     * @return void
     */
    public function down()
    {

        //

        //Schema::drop('Academic_Events');
        //Schema::drop('Academic_Result');
        //Schema::drop('Activity_Description');
        Schema::drop('Administrators');
        //Schema::drop('Answer');
        //Schema::drop('Application_Counselling');
        //Schema::drop('Application_documents');
       // Schema::drop('Application_Student_Guide');
       // Schema::drop('Applied_For_Company');
        //Schema::drop('Applied_For_TA');
        //Schema::drop('Appointment_Doctor');
        //Schema::drop('Assistant_Coordinator');
        //Schema::drop('Awards_Applications');
        //Schema::drop('Achievements');
        //Schema::drop('Awards_Achievement');
        //Schema::drop('Balance_leaves');
        //Schema::drop('Bonafide');
        //Schema::drop('Booking');
        Schema::drop('Bus');
        Schema::drop('Bus_Booking');
        Schema::drop('Bus_Feedback');
        Schema::drop('Bus_Schedule');
        //Schema::drop('Candidate_Witness');
        //Schema::drop('CC_Complaint');
        //Schema::drop('Classroom_Slots');
        //Schema::drop('Class_Rooms');
        //Schema::drop('Club_Members');
        //Schema::drop('Company');
        //Schema::drop('Course');
        //Schema::drop('Course_Taken_By');
        //Schema::drop('Doctor');
        //Schema::drop('Employee_Approve_Reimb');
        //Schema::drop('Employee_Leave');
        //Schema::drop('Employee_request_reimb');
        //Schema::drop('Evaluation_Of_Phd');
        Schema::drop('Faculty');
        //Schema::drop('Faculty_Phone_No');
        //Schema::drop('Faculty_Roles');
        //Schema::drop('Faculty_Takes_Course');
        //Schema::drop('Gymkhana_Club_Cocoordinator');
        //Schema::drop('Gymkhana_Club_Coordinator');
        //Schema::drop('Hostel_Complaint');
        //Schema::drop('Inventory');
        //Schema::drop('Medals_Awards_Scholarship');
        //Schema::drop('Menu');
        //Schema::drop('Mess_Committee');
        //Schema::drop('Mess_Feedback');
        //Schema::drop('Mess_Order');
        //Schema::drop('Mess_Leave_Application');
        //Schema::drop('Mess_Registration');
        //Schema::drop('Non_Academic_Events');
        Schema::drop('Notification');
        //Schema::drop('Patient');

        // Schema::drop('Polling');

        //Schema::drop('Problem');
        //Schema::drop('Project_by_Gymkhana');

        // Schema::drop('Proposed_Events');

        
        //Schema::drop('Question');
        //Schema::drop('Question_Of_Semester_Feedback');
        //Schema::drop('Record_Hospital');
        //Schema::drop('Register_Course');

        // Schema::drop('Requested_Events');

        //Schema::drop('Review');
        //Schema::drop('Room_Booking_Request');
        //Schema::drop('Salary');
        //Schema::drop('Scheduled_Activity');
        //Schema::drop('Semester_Feedback');
        //Schema::drop('Senate_Meeting');
        //Schema::drop('Senate_Member');
        //Schema::drop('Other_Venues');
        Schema::drop('Staff');
        //Schema::drop('Staff_Phone_No');
        Schema::drop('Student');
       // Schema::drop('Student_Attendance');
        //Schema::drop('Student_Committee');
        //Schema::drop('Student_Committee_Members');
        //Schema::drop('Student_Counselling');
        //Schema::drop('Student_Guide_Assign');
        //Schema::drop('Student_Leave_Application');
        //Schema::drop('Study_Material');
        //Schema::drop('Suggestions_By_Students');
        //Schema::drop('Supplier_Info');
        //Schema::drop('Ta');
        //Schema::drop('Ta_Attendance');
        //Schema::drop('Ta_Attendance_Sheet');
        //Schema::drop('Ta_Claim');
        //Schema::drop('Ta_Post_Openings');
        //Schema::drop('Teaching_Credit');
        //Schema::drop('VH_Rooms');
        //Schema::drop('Visitors_Complaint');
        //Schema::drop('Ward');
        //Schema::drop('Pbi');
        //Schema::drop('Pbi_Reports');
        //Schema::drop('Pbi_Applied_For');
        //Schema::drop('Assignment');
        //Schema::drop('Solves_Assignment');
       // Schema::drop('Rules_and_Reg');
        //Schema::drop('Spi');
    }
}
