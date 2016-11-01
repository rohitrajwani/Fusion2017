<?php
	$course_ids = array();

	foreach($courses as $course){
		$course_ids[] = $course->course_id;
	}

	$crslots = array();

	foreach($slots as $slot) {
		for($i=0; $i<count($course_ids); $i++){
			if($slot->course_id == $course_ids[$i]){
				$crslots[] = $slot;
			}
		}
	}

	$days = array("Monday", "Tuesday", "Wednesday", "Thursday", "Friday");
	$times = array('09:00:00', '10:00:00', '11:00:00', '12:00:00', '02:30:00', '03:30:00', '04:30:00');

	$tt = array();

	for($i=0,$l=0,$m=1,$n=2; $i<count($days); $i++,$l+=3,$m+=3,$n+=3)
		for($j=0; $j<count($times)+1; $j++){
			$tt[$l][$j] = '';
			$tt[$n][$j] = '';
			$tt[$m][$j] = '';
		}

	for($i=0,$l=0,$m=1,$n=2; $i<count($days); $i++,$l+=3,$m+=3,$n+=3){
		$tt[$l][0] = '';
		$tt[$m][0] = '';
		$tt[$n][0] = '';
		for($k=1; $k<count($times)+1; $k++){
			for($j=0; $j<count($crslots); $j++){
				if(strcmp($crslots[$j]->day, $days[$i])==0 && strcmp($crslots[$j]->from_time,$times[$k-1])==0){
					if (!empty($tt[$m][$k]) || (!empty($tt[$m][0]) && $crslots[$j]->room_id != $tt[$m][0] && $crslots[$j]->room_id != $tt[$l][0])){
						
						if(empty($tt[$n][0]))
							$tt[$n][0] = $crslots[$j]->room_id;

						$tt[$n][$k] = $crslots[$j]->course_id;

						if($tt[$n][$k][strlen($tt[$n][$k])-1] == 'L'){
							$hrs = floor((strtotime($crslots[$j]->to_time)-strtotime($crslots[$j]->from_time))/3600) + 1;
							$tt[$n][$k] = $tt[$n][$k].$hrs;
						}

						if(empty($tt[$m][$k])){
							$tt[$m][$k] = '';
						}
						if(empty($tt[$l][$k])){
							$tt[$l][$k] = '';
						}
					}
					else if (!empty($tt[$l][$k]) || (!empty($tt[$l][0]) && $crslots[$j]->room_id != $tt[$l][0])){
						
						if(empty($tt[$m][0]))
							$tt[$m][0] = $crslots[$j]->room_id;
						
						$tt[$m][$k] = $crslots[$j]->course_id;

						if($tt[$m][$k][strlen($tt[$m][$k])-1] == 'L'){
							$hrs = floor((strtotime($crslots[$j]->to_time)-strtotime($crslots[$j]->from_time))/3600) + 1;
							$tt[$m][$k] = $tt[$m][$k].$hrs;
						}

						if(empty($tt[$l][$k]))
							$tt[$l][$k] = '';
						if(empty($tt[$n][$k]))
							$tt[$n][$k] = '';
					}
					else{
						if(empty($tt[$l][0]))
							$tt[$l][0] = $crslots[$j]->room_id;
						$tt[$l][$k] = $crslots[$j]->course_id;


						if($tt[$l][$k][strlen($tt[$l][$k])-1] == 'L'){
							$hrs = floor((strtotime($crslots[$j]->to_time)-strtotime($crslots[$j]->from_time))/3600) + 1;
							$tt[$l][$k] = $tt[$l][$k].$hrs;
						}

						if(empty($tt[$m][$k]))
							$tt[$m][$k] = '';
						if(empty($tt[$n][$k]))
							$tt[$n][$k] = '';
					}
					
				}
				else{
					if(empty($tt[$l][$k]))
						$tt[$l][$k] = '';
					if(empty($tt[$m][$k]))
						$tt[$m][$k] = '';
					if(empty($tt[$n][$k]))
						$tt[$n][$k] = '';
				}
			}
		}
	}

	echo json_encode($tt);
?>
