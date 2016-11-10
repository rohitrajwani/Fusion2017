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

	for($i=0; $i<15; $i+=3){
		$tt[$i][0] = $rooms[0]->room_id;
		$tt[$i+1][0] = $rooms[1]->room_id;

		if(count($rooms) > 2)
			$tt[$i+2][0] = $rooms[2]->room_id;
	}
	
	for($i=0, $a=0, $b=1, $c=2; $i<count($days); $i++, $a+=3, $b+=3, $c+=3){
		for($k=0; $k<count($crslots); $k++){
			$ftime = $crslots[$k]->from_time;
			$to_time = $crslots[$k]->to_time;
			$hrs = floor((strtotime($crslots[$k]->to_time)-strtotime($crslots[$k]->from_time))/3600) + 1;

			if($crslots[$k]->day == $days[$i]){
				if($crslots[$k]->room_id == $tt[$a][0]){
					$j = array_search($ftime, $times);
					if($j>=0){
						$tt[$a][$j+1] = $crslots[$k]->course_id;
						if($hrs>1)
							$tt[$a][$j+1]= $tt[$a][$j+1].$hrs;
					}
				}
				else if($crslots[$k]->room_id == $tt[$b][0]){
					$j = array_search($ftime, $times);
					if($j>=0){
						$tt[$b][$j+1] = $crslots[$k]->course_id;
						if($hrs>1)
							$tt[$b][$j+1]= $tt[$b][$j+1].$hrs;
					}
				}
				else if($crslots[$k]->room_id == $tt[$c][0]){
					$j = array_search($ftime, $times);
					if($j>=0){
						$tt[$c][$j+1] = $crslots[$k]->course_id;
						if($hrs>1)
							$tt[$c][$j+1]= $tt[$c][$j+1].$hrs;
					}
				}
			}
		}
	}
	echo json_encode($tt);
?>
