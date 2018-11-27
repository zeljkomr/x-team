<?php

namespace App\Containers\User\Data\Seeders;

use Apiato\Core\Foundation\Facades\Apiato;
use App\Containers\User\Models\User;
use App\Ship\Parents\Seeders\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    public function run()
    {
//        $oldUsers = DB::connection('crew')->table('cn_main')->limit(10)->get();
//
//        foreach ($oldUsers as $oldUser) {
//            $userExists = DB::table('users')->where('first_name', $oldUser->name)->first();
//
//            if (!$userExists) {
//                $userId = User::create([
//                    'first_name' => $oldUser->name,
//                ])->assignRole(Apiato::call('Authorization@FindRoleTask', ['freelancer']));
//
//                $oldData = DB::connection('crew')->table('users')->where('crew_id', $oldUser->crewId)->first();
//
//                $exists = DB::table('profiles')->where('user_id', $userId->id)->first();
//
////                if ($exists == null) {
//                    DB::table('profiles')->insert([
//                        'user_id' => $userId->id,
//                        'freelancer' => $oldUser->freelancer,
//                        'freelancer_comment' => $oldUser->freelancer_comment,
//                        'manager_rating' => $oldUser->managerRating,
//                        'hourly_min_rate' => $oldUser->hourlyRateMin,
//                        'hourly_max_rate' => $oldUser->hourlyRateMax,
//                        'currency' => $oldUser->currency,
//                        'rate_description' => $oldUser->rateDescription,
//                        'cost_first' => $oldUser->costFirst,
//                        'hrs_first' => $oldUser->hrsFirst ? $oldUser->hrsFirst : null,
//                        'awarded' => $oldUser->awarded,
//                        'description' => $oldUser->description,
//                        'mobile' => $oldData->mobile ? $oldData->mobile : null,
//                        'landline' => $oldData->landline,
//                        'website' => $oldData->website,
//                        'city' => $oldData->city_region,
//                        'street_address' => $oldData->street_address,
//                        'postal_code' => $oldData->postcode,
//                        'birth' => $oldData->date_of_birth,
//                        'skype' => $oldData->skype
//                    ]);
////                }
//            }
//        }
    }
}
