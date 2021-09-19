<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Category;
class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
      $data = \Config::get('constant.category');
      $this->_insertAllCategory($data);
      
    }

    public function _insertAllCategory($lists, $id = null) {
      foreach($lists as $key => $value) {
        $category = new Category;
        if(is_array($value)) {
          $category->name = $key;
        } else {
          $category->name = $value;
        }
        if($id) {
          $category->category_id = $id;
        }
        $category->save();
        if(is_array($value)) {
          $this->_insertAllCategory($value, $category->id);
        }
      }
    }
}
