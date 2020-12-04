<?php

namespace Database\Seeders;

use App\Models\ItemManagement;
use Illuminate\Database\Seeder;
use App\Models\State;
use App\Http\Controllers\Traits\MediaUploadingTrait;

class ItemManagementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $item = [
            [
                'title' => 'gg',
                'price' => 2,
            ]
        ];


        $file = file('https://source.unsplash.com/random');
        return $file;
        $itemManagement = ItemManagement::insert($item);
       
        $itemManagement->addMedia($file)->toMediaCollection('image');
    }
}
