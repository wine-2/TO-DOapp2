<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class historyController extends Controller
{
    public function index()
        {
        $completedtasks = Task::where('status',true )->get();
 
        return view('tasks.history', compact('completedtasks'));
        }
    public function update(Request $request, $id)
    
    {
       //「戻す」ボタンを押したとき
       dd($request->status);

        //該当のタスクを検索
        $completedtask = Task::find($id);
        
       //モデル->カラム名 = 値 で、データを割り当てる
        $completedtask->status = false; //true:完了、false:未完了
        
        //データベースに保存
        $completedtask->save();
        //リダイレクト
        return redirect('/history');
    }

    


}