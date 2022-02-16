<?php

namespace App\Service;


use App\Models\Developer;
use App\Models\Todo;

class TodoService
{

    public function taskList(): array
    {
        $list = Todo::orderBy('level', 'desc')
                    ->orderBy('estimated_duration', 'desc')
                    ->get();

        $developers = Developer::orderByDesc('level')
                               ->get();


        $week = 1;
        while (true) {

            $dev = [];

            foreach ($developers as $developer) {
                $dev = array_merge($dev, $this->assign($list, $developer->level, $developer->name));
            }

            $task[] = [
                'period'     => $week . "week",
                'developers' => $dev,
            ];
            $week   += 1;


            if ($list->count() == 0) {
                break;
            }

        }

        return $task;


    }


    public function assign(&$list, $level, $dev): array
    {
        $assign = [];

        $weekly_duration = 0;
        $assignTotal     = 0;
        $tasks           = $list->where('level', '<=', $level)
                                ->toArray();


        $assign[$dev]['info']['totalTask'] = 0;
        $assign[$dev]['planning']          = [];
        foreach ($tasks as $key => $task) {
            //45 <36+1
            //0 <=0+11
            $total = ((int)$assignTotal ?? 0) + (int)$task['estimated_duration'];

            if ($total > 45) {
                continue;
            }

            $weekly_duration += $task['estimated_duration'];

            if ($weekly_duration <= 45) {

                $assign[$dev]['info']['totalTask'] += 1;
                $assignTotal                       = $assign[$dev]['info']['totalHour'] = $weekly_duration;


                $assign[$dev]['planning'][] = [
                    'id'                 => $task['id'],
                    'level'              => $task['level'],
                    'estimated_duration' => $task['estimated_duration'],
                    'name'               => $task['name'],
                ];


                unset($list[$key]);

            }

        }


        return $assign;
    }
}
