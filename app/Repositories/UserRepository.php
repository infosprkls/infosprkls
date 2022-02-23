<?php

namespace App\Repositories;


use App\Company;
use App\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\DB;

class UserRepository implements RepositoryInterface
{

    /**
     * Get's a post by it's ID
     *
     * @param int
     * @return User
     */
    public function get($user_id)
    {
        
        return User::find($user_id);
    }

    /**
     * Get's all posts.
     *
     * @return mixed
     */
    public function all()
    {
        return User::all();
    }

    /**
     * Deletes a post.
     *
     * @param int
     */
    public function delete($user_id)
    {
        User::find($user_id)->first()->delete();
    }

    /**
     * Updates a post.
     *
     * @param int
     * @param array
     */
    public function update($user, array $user_data)
    {
        if(isset($user_data['role']) && $user_data['role']=='super admin'){
            $user_data['company_id']=0;
        }
        //TODO add user role if provided
        if(isset($user_data['role']) && !$user->hasRole($user_data['role'])){
            DB::table('model_has_roles')->where('model_id', $user->id)->where('model_type', 'App\User')->delete();
            $newRole = $user_data['role'];
            $newRole = Role::where('name',$newRole)->first();
            $user->roles()->attach($newRole);
        }

        if($user_data['email'] !== $user->email){
            /*$user->email = $user_data['email'];
            $user->sendEmailVerificationNotification();
            $user->email_verified_at = null;
			*/
			$user_data['email'] = $user->email;
        }

        $user->update($user_data);
    }

    /**
     * Gets all users and paginates the collection
     * @param $usersPerPage
     * @return mixed
     */
    public function paginateAll($usersPerPage,$userSearch=NULL,$userCompany=NULL){
        //$query = User::orderBy('id' , 'DESC');
        $query = DB::table('users')
            ->select('users.*','companies.id as cid','companies.name as company','model_has_roles.role_id','model_has_roles.model_id')
            ->join('companies', 'companies.id', '=', 'users.company_id')
            ->join('model_has_roles', 'model_has_roles.model_id', '=', 'users.id')
            ->where('model_has_roles.role_id','!=',1)
            ->orderByDesc('users.id');
            
        if($userSearch){
            $query->where(function($subQuery) use($userSearch)  {
                    $subQuery->where(DB::raw('CONCAT(firstname," ",lastname)'), 'like', "%".$userSearch."%")
                        ->orWhere('email', 'like', "%".$userSearch."%");
                });
        }


        if($userCompany){
            $query->where('company_id', $userCompany);
        }
        
        return $query->paginate($usersPerPage);
    }

    public function create($user_data)
    {
		if(!isset($user_data['company_id'])){
			$user_data['company_id'] = auth()->user()->company->id;
		}
		if(!isset($user_data['role']))
			$user_data['role'] = 'user';
		if($user_data['role']=='super admin'){
            $user_data['company_id'] =0;
        }
		$user_data['email_verified_at'] = date('Y-m-d H:i:s');


        if(auth()->user() && auth()->user()->hasRole('super admin')==false){
            $user_data['company_id'] = auth()->user()->company->id;
        }


        $user = User::create($user_data);
        $user->assignRole($user_data['role']);
        

        // (isset($user_data['role']) && ($user_data['role']=='super user' || $user_data['role']=='user') && $user_data['role']=='super user')

        //$user->sendEmailVerificationNotification();
        if(isset($user_data['role']) && ($user_data['role']=='super user' || $user_data['role']=='user')){
            if(!DB::table('user_subscriptions')->where('company_id' , $user_data['company_id'])->first()){
                $this->add_user_batch($user->id,$user->company->id,4,7);
            }
            
        }

       /* if(auth()->user()->hasRole('super user')){
            $batch=$this->current_batch(auth()->user()->company->id);
            $this->add_user_logs($user->id,$user->company->id,$batch[0]->batch_id);
        }*/
        return $user;
    }

    public function getUsersForCompany($id){
        $company = Company::find($id);
        return $company->users;
    }

    public function add_user_batch($user_id,$company_id,$total_users=4,$sub_id=7){
        DB::table('user_subscriptions')->insert(
            ['user_id' => $user_id, 'company_id' => $company_id, 'sub_id' => $sub_id, 'total_users' => $total_users]
        );
        $id = DB::getPdo()->lastInsertId();
        //$this->add_user_batch_log($user_id,$company_id,$id,$total_users);
    }

    public function add_user_batch_log($user_id,$company_id,$batch_id,$total_users){
        $detail=$total_users." users selected";
        DB::table('user_subscriptions_logs')->insert(
            ['user_id' => $user_id, 'company_id' => $company_id,'user_sub_id' => $batch_id, 'detail'=>$detail]
        );
    }

    public function add_user_logs($user_id,$company_id,$batch_id){
        DB::table('users_logs')->insert(
            ['user_id' => $user_id, 'company_id' => $company_id, 'user_sub_id' => $batch_id]
        );
    }


    public function current_batch($company_id){
        return $users = DB::table('users')
            ->select('users.*','user_subscriptions.total_users','user_subscriptions.id as batch_id', 'user_subscriptions.company_id')
            ->join('user_subscriptions', 'user_subscriptions.company_id', '=', 'users.company_id')
            ->where('users.company_id', $company_id)
            ->get();
    }

    public function current_batch_users($batch_id){
        return $users = DB::table('users_logs')
            ->select('id')
            ->where('user_sub_id', $batch_id)
            ->count();
    }

    public function previous_batch_update($company_id){
        DB::table('user_subscriptions')
              ->where('company_id', $company_id)
              ->update(['status' => 'Inactive']);
    }

    public function all_subscriptions($id=null){
        
        $query = $subscriptions = DB::table('subscriptions')
            ->select('subscriptions.*')
            ->where('status','!=' ,'free');
        if($id){
            $query->where('id',$id);
        }
        
        return $query->get();
    }

    public function not_super_admin_user($userSearch=NULL,$pagination_select=10){
        $users = DB::table('users')
            ->select('users.*','companies.id as cid','companies.name as company','model_has_roles.role_id','model_has_roles.model_id')
            ->join('companies', 'companies.id', '=', 'users.company_id')
            ->join('model_has_roles', 'model_has_roles.model_id', '=', 'users.id')
            ->where('companies.id', auth()->user()->company->id)
            ->where('model_has_roles.role_id','!=',1)
            ->where('users.deleted_at','=',NULL);


        if($userSearch){
            $users->where(function($subQuery) use($userSearch)  {
                    $subQuery->where(DB::raw('CONCAT(users.firstname," ",users.lastname)'), 'like', "%".$userSearch."%")
                        ->orWhere('email', 'like', "%".$userSearch."%");
                });
        }


        $users->orderBy('users.id', 'DESC');
        $users = $users->paginate($pagination_select);
        return $users;
    }

    public function super_users($companyId){
        return $users = DB::table('users')
            ->select('users.*','companies.id as cid','companies.name as company','model_has_roles.role_id','model_has_roles.model_id')
            ->join('companies', 'companies.id', '=', 'users.company_id')
            ->join('model_has_roles', 'model_has_roles.model_id', '=', 'users.id')
            ->where('companies.id', $companyId)
            ->where('model_has_roles.role_id',3)
            ->where('users.deleted_at','=',NULL)
            ->get();
    }

    public function current_company_users_count($company_id){
        return $users = DB::table('users')
            ->select('id')
            ->where('company_id', $company_id)
            ->where('deleted_at', NULL)
            ->count();
    }

    public function check_company_status($company_id){
        return $users = DB::table('companies')
            ->select('status')
            ->where('id', $company_id)
            ->first();
    }

    public function user_child_record($id){
        DB::table('hours')->where('user_id', $id)->delete();
        DB::table('attachments')->where('user_id', $id)->delete();
        DB::table('months')->where('user_id', $id)->delete();
        DB::table('tasks')->where('created_by_user_id', $id)->delete();
        DB::table('user_subscriptions')->where('user_id', $id)->delete();
        // DB::table('projects')->where('created_by_user_id', $id)->delete(); 
    }
    
}
