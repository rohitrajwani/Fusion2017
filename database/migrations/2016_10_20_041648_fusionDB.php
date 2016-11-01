<?php

// create database name 'IIITDMJFUSION'

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class FusionDB extends Migration

{
  

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
            
            //$table->foreign('username')->references('student_id')->on('Student')->onDelete('cascade')->onUpdate('cascade');
            //$table->foreign('username')->references('faculty_id')->on('Faculty')->onDelete('cascade')->onUpdate('cascade');
            //$table->foreign('username')->references('staff_id')->on('Staff')->onDelete('cascade')->onUpdate('cascade');
            //$table->foreign('username')->references('admin_id')->on('Administrators')->onDelete('cascade')->onUpdate('cascade');

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

		
		
        Schema::create('qual', function (Blueprint $table) {
            $table->increments('id');
            $table->string('faculty_id', 50);
            $table->string('course');
            $table->string('institute')->nullable();
            $table->integer('year')->nullable();
            $table->float('cgpa')->nullable();
            $table->timestamps();
            $table->foreign('faculty_id')->references('faculty_id')->on('Faculty');
		 });
		
		Schema::create('experience', function (Blueprint $table) {
			$table->increments('id');
			$table->string('faculty_id', 50);
            $table->string('details');
            $table->timestamps();
            $table->foreign('faculty_id')->references('faculty_id')->on('Faculty');
         });
		
		Schema::create('dependent', function (Blueprint $table) {
            $table->increments('id');
            $table->string('faculty_id', 50);
            $table->string('d_name');
            $table->date('d_dob')->nullable();
            $table->integer('d_age')->nullable();
            $table->string('d_relation')->nullable();
            $table->string('d_marital')->nullable();
            $table->string('d_pwd')->nullable();
            $table->timestamps();
            $table->foreign('faculty_id')->references('faculty_id')->on('Faculty');
         });
		
		Schema::create('achievements', function (Blueprint $table) {
            $table->increments('id');
            $table->string('faculty_id', 50);
            $table->string('achievement');
            $table->string('a_details')->nullable();
            $table->date('dated')->nullable();
            $table->timestamps();
            $table->foreign('faculty_id')->references('faculty_id')->on('Faculty');
         });
		
		Schema::create('research_proj', function (Blueprint $table) {
            $table->increments('id');
            $table->string('faculty_id', 50);
            $table->integer('p_id');
            $table->string('p_title');
            $table->string('f_agency')->nullable();
            $table->string('p_details')->nullable();
            $table->string('status')->nullable();
            $table->timestamps();
            $table->foreign('faculty_id')->references('faculty_id')->on('Faculty');
        });
		
		
		Schema::create('research_jour', function (Blueprint $table) {
            $table->increments('id');
            $table->string('faculty_id', 50);
            $table->string('author')->nullable();
            $table->string('title')->nullable();
            $table->string('journal_name')->nullable();
            $table->string('j_publisher')->nullable();
			$table->date('pub_date')->nullable();
            $table->timestamps();
            $table->foreign('faculty_id')->references('faculty_id')->on('Faculty');
        });
		
		
		Schema::create('cons_proj', function (Blueprint $table) {
            $table->increments('id');
            $table->string('faculty_id', 50);
            $table->string('consultant');
            $table->string('c_title');
            $table->string('client')->nullable();
            $table->integer('financial_outlay')->nullable();
			$table->string('duration')->nullable();
            $table->timestamps();
            $table->foreign('faculty_id')->references('faculty_id')->on('Faculty');
        });
		
		
		Schema::create('patents', function (Blueprint $table) {
            $table->increments('id');
            $table->string('faculty_id', 50);
            $table->integer('p_no');
            $table->string('pt_title');
            $table->string('earnings')->nullable();
            $table->string('pt_status')->nullable();
			$table->integer('pt_year')->nullable();
            $table->timestamps();
            $table->foreign('faculty_id')->references('faculty_id')->on('Faculty');
        });
		
		
		Schema::create('publications', function (Blueprint $table) {
            $table->increments('id');
            $table->string('faculty_id', 50);
            $table->string('pub_title');
            $table->string('pub_publisher')->nullable();
            $table->string('pub_copublisher')->nullable();
            $table->integer('pub_year')->nullable();
			
            $table->timestamps();
            $table->foreign('faculty_id')->references('faculty_id')->on('Faculty');
        });
		
		
		Schema::create('thesis', function (Blueprint $table) {
            $table->increments('id');
            $table->string('faculty_id', 50);
            $table->string('t_title');
            $table->string('stu1_name');
           
            $table->string('t_supervisors');
			$table->integer('t_year');
            $table->timestamps();
            $table->foreign('faculty_id')->references('faculty_id')->on('Faculty');
        });


		Schema::create('conferences', function (Blueprint $table) {
            $table->increments('id');
            $table->string('faculty_id', 50);
            $table->string('c_author');
            $table->string('c_title');
            $table->string('c_details')->nullable();
			$table->string('c_place')->nullable();
			$table->integer('c_year')->nullable();
            $table->timestamps();
            $table->foreign('faculty_id')->references('faculty_id')->on('Faculty');
        });
		
		
		Schema::create('lectures', function (Blueprint $table) {
            $table->increments('id');
            $table->string('faculty_id', 50);
            $table->string('l_title');
            $table->string('l_place')->nullable();
			$table->integer('l_year')->nullable();
            $table->timestamps();
            $table->foreign('faculty_id')->references('faculty_id')->on('Faculty');
        });
		
		
		
		
	
		
		
		Schema::create('foreign_visits', function (Blueprint $table) {
            $table->increments('id');
            $table->string('faculty_id', 50);
			$table->string('fv_country');
            $table->string('fv_purpose');
            $table->string('fv_place');
			$table->date('fv_date');
            $table->timestamps();
            $table->foreign('faculty_id')->references('faculty_id')->on('Faculty');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('qual');
    }
}
