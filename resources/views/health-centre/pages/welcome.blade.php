@extends('health-centre/main')
@section('title','Primary Medical Care - PDPM IIITDM Jabalpur')

@section('content')
  <?php 
    use Html;
  ?>
  <div class="mar">
  <div id="id" class="section ">
    <h2 class="primary-text center-align">About Us</h2>
    <center><div class="line secondary secondary-text"></div></center>
    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
  </div>
  <div id="timetable" class="section">
    <h2 class="primary-text center-align mar-top">Time Table</h2>
    <center><div class="line secondary secondary-text"></div></center>

<table class="bordered highlight centered">
    <thead>
      <tr>
          <th>#</th>
          <th>Doctor Name</th>
          <th>Department</th>
          <th></th>
      </tr>
    </thead>
    <tbody>
      @foreach ($staff as $doc)
        <tr>
          <td>{{ $doc->staff_id }}</td>
          <td>Dr. {{ $doc->name }}</td>
          <td>{{ $doc->doctor->specialization }}</td>
            <td>{!! Form::open(array('route' => 'appointment.create', 'data-parsley-validate' => '','method' => 'GET')) !!}
            <input type="text" style="display:none" name="staff_id" value="{{ $doc->staff_id }}">
            {{ Form::submit('Book',array('class'=>'waves-effect btn')) }}
            {!! Form::close() !!}
            </td>
            {{-- <td>{{ Html::linkRoute('appointment.create', 'Appointment', $doc->staff_id, array('class' => 'waves-effect btn','style' => 'font-size:12px;')) }}</td> --}}
          {{-- <td><a href="{{ route('appointment.create',$doc->staff_id) }}" class="waves-effect btn">Book</a></td> --}}
        </tr>
      @endforeach
    </tbody>
</table>
</div>
  <div id="contact" class="section">
    <h2 class="primary-text center-align mar-top">Contact</h2>
    <center><div class="line secondary secondary-text"></div></center>
    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
  </div>
</div>
@stop
