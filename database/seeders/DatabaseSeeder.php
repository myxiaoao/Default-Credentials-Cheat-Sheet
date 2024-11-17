<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Credential;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Credential::query()->truncate();

        $file = resource_path('DefaultCreds-Cheat-Sheet.csv');
        $handle = fopen($file, 'rb');
        while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
            if ($data[0] === 'productvendor' && $data[1] === 'username' && $data[2] === 'password') {
                continue;
            }

            Credential::query()->create([
                'product_vendor' => $data[0],
                'username' => $data[1],
                'password' => $data[2],
            ]);
        }
        fclose($handle);
    }
}
