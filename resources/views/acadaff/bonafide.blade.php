@extends('layout');

@section('acad_content')


	<div class="navbar">
        <nav>
          <div class="nav-wrapper">
            <a href="#!" class="right brand-logo">Academic Affairs</a>
            <ul class="hide-on-med-and-down"><center>
              <li><a href="./students">Students</a></li>
              <li><a href='./academic'>Academic Person</a></li>
              <li><a href="./faculty">Faculty</a></li>
                </center>
            </ul>
          </div>
        </nav>
    </div>
    

<div class="container row">  


        <br>
       <h7>
           Please fill out the details:-
    </h7>
<form class="myForm" method="get" enctype="application/x-www-form-urlencoded" action="/html/codes/html_form_handler.cfm">

<p>
<label>Name
<input type="text" name="customer_name" required>
</label> 
</p>

    
    <p>
<label>Roll no
<input type="tel" name="phone_number">
</label>
</p>
<p>
<label>Phone 
<input type="tel" name="phone_number">
</label>
</p>

<p>
<label>Email 
<input type="email" name="email_address">
</label>
</p>

    
    <p>
<label>Discipline
<input type="text" name="customer_name" required>
</label>
</p>
    <p>
<label>Programme 
<input type="text" name="customer_name" required>
</label>
</p>
    
<p>
<label>From:
<input type="datetime-local" required>
</label>
</p>
	
<p>
<label>To:
<input type="datetime-local" required>
</label>

</p>


<p>
<label>Purpose
<textarea name="comments" maxlength="500"></textarea>
</label>
</p>

<p><button>Submit </button></p>

</form>










</div>

                       


@stop