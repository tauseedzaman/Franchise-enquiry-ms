<?php

namespace Database\Seeders;

use App\Models\role;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class rolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $roles = [
        'Submit-URL-Approved',        //1
       'Payment-Approved',           //2
       'Support-ticket-Relpy',      //3
       'Pakage-Add',                //4
       'Create-My-Work-Mattor',     //5
       'Classified-Website-Add',     //6
       'User-Verification',          //7
       'Create-Franchise',          //8
    ];

    if (role::count() === 0) {
            $now = Carbon::now();
        foreach ($roles as $role) {
        role::create([
            'name' => $role,
            'created_at' => $now,
            'updated_at' => $now,
        ]);
        }
    }
}
}
