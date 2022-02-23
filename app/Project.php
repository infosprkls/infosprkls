<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use DateTime;
class Project extends Model
{
    //use SoftDeletes;
	
	protected $guarded = [];

	public function getDescriptionAttribute($value){
		if(strlen($value) <= 275)
			return $value;
		else
			return substr($value,0,275) . "...";
	}

    public function createdBy(){
        return $this->belongsTo('App\User', 'created_by_user_id');
    }

    public function responsibleUser(){
        return $this->belongsTo('App\User', 'responsible_user_id');
    }

    public function hoursBooked(){
        return $this->hasMany('App\Hour');
    }

    public function company(){
        return $this->belongsTo('App\Company');
    }
	
	public function months(){
		return $this->hasMany('App\Month');
	}

    public function categories(){
        return $this->belongsToMany('App\Category')->withTimestamps();
    }

    public function getCardHeaderAttribute(){
        if($this->status == 'NOT STARTED YET'){
            return  'warning';
        }elseif ($this->status == 'OUT OF DEADLINE'){
            return 'danger';
        }elseif ($this->status == 'IN PROGRESS'){
            return 'success';
        }elseif ($this->status == 'COMPLETED'){
            return 'primary';
        }else{
			return 'secondary';
		}
    }
	
	public function getDeadlineAttribute($value){
		return substr($value, 0, 10);
	}
	public function getStartedAtAttribute($value){
		return substr($value, 0, 10);
	}
	
	public function getHoursAttribute(){
		$ret = 0;
		$months = $this->months;
		foreach($months as $eachMonth)
			if(auth()->user()->hasRole('user')){
				if($eachMonth->user_id==auth()->user()->id){
					foreach($eachMonth->days->months as $month => $monthData)
					foreach($monthData->tasks as $task)
						foreach($task->days as $day)
							$ret += $day;
				}
			}else{
				foreach($eachMonth->days->months as $month => $monthData)
					foreach($monthData->tasks as $task)
						foreach($task->days as $day)
							$ret += $day;
			}
		
		return $ret;
	}

	
	public function getTasksAttribute(){
		$tasks = [];
		$months = $this->months;
		foreach($months as $eachMonth){
			foreach($eachMonth->days->months as $month => $monthData){
				$taskArray= [];
				foreach($monthData->tasks as $key => $task){
					$monthNum  = explode('/', $month);
					$dateObj   = DateTime::createFromFormat('!m', $monthNum[0]);
					$monthName = $dateObj->format('M');
					$date = $monthName.', '.$monthNum[1];
					$task->date= $month;
					$task->dateformat= $date;
					$taskArray=$task;
					array_push($tasks, $taskArray);
				}
				
			}
		}
		return $tasks;
	}


}
