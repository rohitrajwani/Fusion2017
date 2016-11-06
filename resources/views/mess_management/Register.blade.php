
@extends('layout')
@section('content')
        
        <div class="main-container row">
            <h4 class="col s12 m4 offset-m4"><b>CENTRAL MESS</b></h4>
                            
                
            
                
                    
        
                <div class="section col s12">
                    
                    
                    

					<div class="section col s12">
                    <br>
                    <h4 class="custom col s12">Registration form</h4><br>
					
					 <form method="POST" action="/mess_management/register">
					 <input type="hidden" name="_token" value="{{ csrf_token()}}">
                    <br><h5 class="custom col s12">Roll No.</h5>
                    <div class="input-field col s6">
                          <input id="last_name" type="text" value="{{Auth::user()->username}}" class="validate">
                          <label for="last_name">Roll No.</label>
                    </div></br>
                          
                    </div></br>
					
					<h5 class="custom col s12">Choose Mess Option</h5>
                    <div class="col s12">
                    <p>
                        <input name="group1" type="radio" id="test1" value="1"/>
                        <label for="test1">Mess-I</label>
                    </p>
                    <p>
                        <input name="group1" type="radio" id="test2" value="2"/>
                        <label for="test2">Mess-II</label>
                    </p>
                    
                    </div>
                    </div></br>
					
                    <div class="section col s12">
                    
                    
                     <button type="submit" class="waves-effect btn col" name="register">REGISTER</button>
					
                    
                </div>
				</form>
                    
                    
                   
					</div>
					
                    
                    
                    
                    
        
        
        <script>
            $(document).ready(function() {
                $('select').material_select();
              });
        </script>
  @stop