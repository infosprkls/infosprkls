<?php

namespace App\Repositories;


use App\Company;
use Illuminate\Support\Facades\DB;

class CompanyRepository implements RepositoryInterface
{

    /**
     * Get's a post by it's ID
     *
     * @param int
     * @return mixed
     */
    public function get($id)
    {
        try{
            return Company::find($id);
        }catch (\Exception $exception){
            return false;
        }
    }

    /**
     * Get's all posts.
     *
     * @return mixed
     */
    public function all()
    {
        return Company::all();
    }

    /**
     * Deletes a post.
     *
     * @param int
     * @return bool
     */
    public function delete($id)
    {
        try {
            Company::find($id)->delete();
        } catch (\Exception $e) {
            return false;
        }
    }

    /**
     * Updates a post.
     *
     * @param $id
     * @param array $post_data
     * @return bool
     */
    public function update($id, array $post_data)
    {
        try{
            $company = Company::find($id);
            $company->update($post_data);
            return true;
        }catch (\Exception $e){
            return false;
        }
    }

    /**
     * @param $data
     * @return bool
     */
    public function create($data)
    {
        
        try {
            return Company::create($data);
        } catch (\Exception $e) {
            return false;
        }
    }

    /**
     *
     */

    public function paginate($numPerPage,$whereName=NULL){
        try{
            if($whereName){
                return Company::where('name' , 'LIKE' , $whereName.'%')->orderBy('id', 'DESC')->paginate($numPerPage);
            }else{
                return Company::orderBy('id', 'DESC')->paginate($numPerPage);
            }
            
        }catch (\Exception $exception){
            return false;
        }
    }

    
    public function createOneLongWay($data){
        $company = new Company();
        $company->name = $data['name'];
        $company->contact_user_id = $data['contact_user_id'];
        $company->logo = $data['logo'];
        $company->status = 1;
        $company->created_by_user_id = auth()->id();
        $company->save();
    }

    public function check_subscription_users($company_id){
        return $users = DB::table('user_subscriptions')
        ->where('company_id', $company_id)
        ->count();

    }
    public function count_subscription_users($company_id){
        return $users = DB::table('user_subscriptions')
        ->where('company_id', $company_id)
        /*->where('status', 'Active')*/
        ->sum('total_users');
    }

    public function save_subscription(){
                
    }
}
