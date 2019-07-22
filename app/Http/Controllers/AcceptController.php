<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Invitation;
use Carbon\Carbon;
class AcceptController extends Controller
{
    public function accept($invitation_id,$action){
        $now=Carbon::now();
        $invitation=Invitation::find($invitation_id);
        if(!in_array($action,['accept','reject'])){
            abort(404);
        }


        if($action == 'accept'){
            $invitation->update(['accepted_at'=>Carbon::now()]);
        }

        if($action == 'reject'){
            if($invitation->accepted_at != ''){
            $invitation->update(['rejected_at'=>Carbon::now()]);
            }else{
                $invitation->update(['rejected_at'=>'']);
            }
        }
    }
}
