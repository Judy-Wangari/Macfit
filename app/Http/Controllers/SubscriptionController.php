<?php

namespace App\Http\Controllers;

use App\Models\Subscription;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
     public function createSubscription(Request $request){
       $validated = $request->validate([
        'user_id'=>'integer|exists:categories,id',
        'bundle_id'=>'integer|exists:categories,id'
       ]);

       $subscription = new Subscription();
       $subscription->user_id = $validated['user_id'];
       $subscription->bundle_id = $validated['bundle_id'];


        try{
             $subscription->save();
             return response()->json($subscription);
        }
        catch(\Exception $exception){
            return response()->json([
                'error'=>'Failed to save Subscription',
                'message'=>$exception->getMessage()
            ]);
        }
    }

    public function readAllSubscriptions(){
        try{
            // $subscriptions =Subscription::all();
            $subscriptions = Subscription::join('users', 'subscriptions.user_id','=', 'users.id')
                             ->join('bundles', 'subscriptions.bundle_id','=', 'bundles.id')
                             ->select('subscriptions.*', 
                             'users.name as user_name',
                             'bundles.name as bundle_name') 
                             ->get();

            return response()->json($subscriptions);
        }
        catch(\Exception $exception){
            return response()->json([
                'error'=>'Failed to fetch Subscriptions.',
                'message'=>$exception->getMessage()
            ]);
        }
    }
public function readSubscription($id){
    try{
        // $subscription = Subscription::findOrFail($id);
          $subscription =  Subscription::join('users', 'subscriptions.user_id','=', 'users.id')
                             ->join('bundles', 'subscriptions.bundle_id','=', 'bundles.id')
                             ->select('subscriptions.*', 
                             'users.name as user_name',
                             'bundles.name as bundle_name')  
                             ->where('subscriptions.id', $id)
                             ->first();
       if (!$subscription){
        return response()->json(['message'=> 'subscription not found'], 404);
       }
       
        return response()->json($subscription);
    }
     catch(\Exception $exception){
            return response()->json([
                'error'=>'Failed to fetch the subscription.',
                'message'=>$exception->getMessage()
            ]);
        }
}

public function updateSubscription(Request $request, $id){
      $validated = $request->validate([
        'user_id'=>'integer|exists:categories,id',
        'bundle_id'=>'integer|exists:categories,id'
       ]);


    try{
         $subscription = Subscription::findOrFail($id);
         $subscription->user_id = $validated['user_id'];
         $subscription->bundle_id = $validated['bundle_id'];
         $subscription->save();
        return response()->json($subscription);
        }
        catch(\Exception $exception){
            return response()->json([
                'error'=>'Failed to save Subscription',
                'message'=>$exception->getMessage()
            ]);
        }

    }


    public function deleteSubscription($id){
        try{
            $subscription = Subscription::findOrFail($id);
            $subscription->delete();
            return response("Subscription deleted successfully");
        }
         catch(\Exception $exception){
            return response()->json([
                'error'=>'Failed to delete the Subscription',
                'message'=>$exception->getMessage()
            ]);
        }

    }
}

