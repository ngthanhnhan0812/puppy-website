<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/* use */
use App\Models\cate_breed;
use App\Models\cate_barking;
use App\Models\cate_characteristics;
use App\Models\cate_coat;
use App\Models\cate_group;
use App\Models\cate_activity_lv;
use App\Models\cate_national;
use App\Models\cate_shedding;
use App\Models\cate_size;
use App\Models\cate_trainability;
use App\Models\cate_dogname;

use Illuminate\Support\Facades\DB;

class DetailCategoryController extends Controller
{
    //
    public $data = [];
    /*dog name cate */
    public function save_dog_name(Request $request)
    {
        $request->validate([
            'dog_names' => 'required|max:30:cate_dog_name,dog_name'
        ], [
            'dog_names.required' => 'required to enter!',
            'dog_names.max' => ':max characters limit!',

        ]);
        $data = $request->all();
        $cate_dog = new cate_dogname();
        $cate_dog->dog_name = $data['dog_names'];
        $cate_dog->save();
        return redirect()->route('create_category')->with('msg', 'Success create');
    }

    public function edit_dog_name($dog_id)
    {
        $title = 'Page Edit Dog Name';
        $edit_dog_name = DB::table('cate_dog_name')->where('dog_name_id', $dog_id)->get();
        $manager = view('Dashboard.EditCategory.dog_name', compact('title'))->with('edit_dog_name', $edit_dog_name);
        return $manager;
    }
    public function delete_dog_name($dog_id)
    {
        DB::table('cate_dog_name')->where('dog_name_id', $dog_id)->delete();
        return redirect()->route('show_detail_category')->with('msg', 'Success Delete!');
    }
    /* breed cate */
    public function save_breed(Request $request)
    {
        $request->validate([
            'breed' => 'required|max:30'
        ], [
            'breed.required' => 'required to enter!',
            'breed.max' => ':max  characters limit!',
        ]);

        $data = $request->all();
        $cate_bre = new cate_breed();
        $cate_bre->dog_breed = $data['breed'];
        $cate_bre->save();
        return redirect()->route('create_category')->with('msg', 'Success create');
    }

    public function edit_breed($bre_id)
    {
        $title = 'Page Edit Breed';
        $edit_bre = DB::table('cate_breed_p')->where('breed_id', $bre_id)->get();
        $manager = view('Dashboard.EditCategory.dog_name', compact('title'))->with('edit_bre', $edit_bre);
        return $manager;
    }
    public function delete_breed($bre_id)
    {
        DB::table('cate_breed_p')->where('breed_id', $bre_id)->delete();
        return redirect()->route('show_detail_category')->with('msg', 'Success Delete!');
    }
    /* national cate */
    public function add_national()
    {
        $title = 'Page Add National';
        return view('Dashboard.CategoryDetail.add_category_detail', compact('title'));
    }
    public function save_national(Request $request)
    {
        $request->validate([
            'national' => 'required|max:30'
        ], [
            'national.required' => 'required to enter!',
            'national.max' => ':max characters limit!'
        ]);

        $data = $request->all();
        $cate_nat = new cate_national();
        $cate_nat->national = $data['national'];
        $cate_nat->save();
        return redirect()->route('create_category')->with('msg', 'Success create');
    }

    public function edit_national($nat_id)
    {
        $title = 'Page Edit National';
        $edit_nat = DB::table('cate_national_p')->where('national_id', $nat_id)->get();
        $manager = view('Dashboard.Edit.dog_name', compact('title'))->with('edit_nat', $edit_nat);
        return $manager;
    }
    public function delete_national($nat_id)
    {
        DB::table('cate_national_p')->where('national_id', $nat_id)->delete();
        return redirect()->route('show_detail_category')->with('msg', 'Success Delete!');
    }
    /* group cate */
    public function save_group(Request $request)
    {
        $request->validate([
            'groupp' => 'required|max:30'
        ], [
            'groupp.required' => 'required to enter!',
            'groupp.max' => ':max characters limit!'
        ]);

        $data = $request->all();
        $cate_gro = new cate_group();
        $cate_gro->group_p = $data['groupp'];
        $cate_gro->save();
        return redirect()->route('create_category')->with('msg', 'Success create');
    }

    /* public function save_group(Request $request)
    {
        $request->validate([
            'group_p' => 'required|max:30'
        ], [
            'group_p.required' => 'required to enter!',
            'group_p.max' => ':max characters limit!'
        ]);
        $data = $request->all();
        $cate_gro = new cate_group();
        $cate_gro->group_p = $data['group'];
        $cate_gro->save();
        return redirect()->route('create_category')->with('msg', 'Success create');
    } */

    public function edit_group($gro_id)
    {
        $title = 'Page Edit Group';
        $edit_gro = DB::table('cate_group_p')->where('group_id', $gro_id)->get();
        $manager = view('Dashboard.EditCategory.dog_name', compact('title'))->with('edit_gro', $edit_gro);
        return $manager;
    }
    public function delete_group($gro_id)
    {
        DB::table('cate_dog_name')->where('dog_name_id', $gro_id)->delete();
        return redirect()->route('show_detail_category')->with('msg', 'Success Delete!');
    }
    /* activity group  */
    public function save_activity_lv(Request $request)
    {
        $request->validate([
            'activity_lv' => 'required|max:30'
        ], [
            'activity_lv.required' => 'required to enter!',
            'activity_lv.max' => ':max characters limit!'
        ]);
        $data = $request->all();
        $cate_act = new cate_activity_lv();
        $cate_act->activity_lv = $data['activity_lv'];
        $cate_act->save();
        return redirect()->route('create_category')->with('msg', 'Success create');
    }

    public function edit_activity_lv($act_id)
    {
        $title = 'Page Edit Activity Level';
        $edit_act = DB::table('cate_activity_lv_p')->where('activity_id', $act_id)->get();
        $manager = view('Dashboard.EditCategory.dog_name', compact('title'))->with('edit_act', $edit_act);
        return $manager;
    }
    public function delete_activity_lv($act_id)
    {
        DB::table('cate_activity_lv_p')->where('dog_name_id', $act_id)->delete();
        return redirect()->route('show_detail_category')->with('msg', 'Success Delete!');
    }
    /* barking cate*/
    public function save_barking_lv(Request $request)
    {
        $request->validate([
            'barking_lv' => 'required|max:30'
        ], [
            'barking_lv.required' => 'required to enter!',
            'barking_lv.max' => ':max characters limit!'
        ]);
        $data = $request->all();
        $cate_bra = new cate_barking();
        $cate_bra->barking_lv = $data['barking_lv'];
        $cate_bra->save();
        return redirect()->route('create_category')->with('msg', 'Success create');
    }

    public function edit_barking($bar_id)
    {
        $title = 'Page Edit Barking';
        $edit_bar = DB::table('cate_barking_lv_p')->where('barking_id', $bar_id)->get();
        $manager = view('Dashboard.EditCategory.dog_name', compact('title'))->with('edit_bar', $edit_bar);
        return $manager;
    }
    public function delete_barking($bar_id)
    {
        DB::table('cate_barking_p')->where('dog_name_id', $bar_id)->delete();
        return redirect()->route('show_detail_category')->with('msg', 'Success Delete!');
    }
    /* characteristics cate */
    public function save_characteristic(Request $request)
    {
        $request->validate([
            'characteristics' => 'required|max:30'
        ], [
            'characteristics.required' => 'required to enter!',
            'characteristics_name.max' => ':max characters limit!'
        ]);
        $data = $request->all();
        $cate_cha = new cate_characteristics();
        $cate_cha->characteristics = $data['characteristics'];
        $cate_cha->save();
        return redirect()->route('create_category')->with('msg', 'Success create');
    }

    public function edit_characteristics($cha_id)
    {
        $title = 'Page Edit Characteristics';
        $edit_cha = DB::table('cate_characteristics_p')->where('characteristics_id', $cha_id)->get();
        $manager = view('Dashboard.EditCategory.dog_name', compact('title'))->with('edit_cha', $edit_cha);
        return $manager;
    }
    public function delete_characteristics($cha_id)
    {
        DB::table('cate_characteristics_p')->where('characteristic_id', $cha_id)->delete();
        return redirect()->route('show_detail_category')->with('msg', ' Success Delete!');
    }
    /* coat cate */
    public function save_coat_type(Request $request)
    {
        $request->validate([
            'coat_type' => 'required|max:30'
        ], [
            'coat_type.required' => 'required to enter!',
            'coat_type.max' => ':max characters limit!'
        ]);
        $data = $request->all();
        $cate_coa = new cate_coat();
        $cate_coa->coat_type = $data['coat_type'];
        $cate_coa->save();
        return redirect()->route('create_category')->with('msg', 'Success create');
    }

    public function edit_coat_type($coa_id)
    {
        $title = 'Page Edit Coat Type';
        $edit_coa = DB::table('cate_coat_type_p')->where('coat_id', $coa_id)->get();
        $manager = view('Dashboard.EditCategory.dog_name', compact('title'))->with('edit_coa', $edit_coa);
        return $manager;
    }
    public function delete_coat_type($coa_id)
    {
        DB::table('cate_coat_type_p')->where('coat_id', $coa_id)->delete();
        return redirect()->route('show_detail_category')->with('msg', ' Success Delete!');
    }
    /* shedding cate */
    /* public function add_shedding(){
        $title='Trang them category details';
        return view();
    } */
    public function save_shedding(Request $request)
    {
        $request->validate([
            'shedding' => 'required|max:30'
        ], [
            'shedding.required' => 'required to enter!',
            'shedding.max' => ':max characters limit!'
        ]);
        $data = $request->all();
        $cate_she = new cate_shedding();
        $cate_she->shedding = $data['shedding'];
        $cate_she->save();
        return redirect()->route('create_category')->with('msg', 'Success create');
    }
    public function edit_shedding($she_id)
    {
        $title = 'Page Edit Shedding Type';
        $edit_she = DB::table('cate_shedding_p')->where('shedding_id', $she_id)->get();
        $manager = view('Dashboard.EditCategory.shedding', compact('title'))->with('edit_she', $edit_she);
        return $manager;
    }

    public function delete_shedding($she_id)
    {
        DB::table('cate_shedding_p')->where('shedding_id', $she_id)->delete();
        return redirect()->route('show_detail_category')->with('msg', ' Success Delete!');
    }
    /* size cate */
    /* public function add_size(){
        $title='Trang them category details';
        return view();
    } */
    public function save_size(Request $request)
    {
        $request->validate([
            'size' => 'required|max:30'
        ], [
            'size.required' => 'required to enter!',
            'size.max' => ':max characters limit!'
        ]);
        $data = $request->all();
        $cate_siz = new cate_size();
        $cate_siz->size = $data['size'];
        $cate_siz->save();
        return redirect()->route('create_category')->with('msg', 'Success create');
    }

    public function edit_size($siz_id)
    {
        $title = 'trang edit size';
        $edit_siz = DB::table('cate_size_p')->where('size_id', $siz_id)->get();
        $manager = view('Dashboard.EditCategory.dog_name', compact('title'))->with('edit_siz', $edit_siz);
        return $manager;
    }
    public function delete_size($siz_id)
    {
        DB::table('cate_size_p')->where('size_id', $siz_id)->delete();
        return redirect()->route('show_detail_category')->with('msg', ' Success Delete!');
    }
    /* traninability cate */
    public function save_trainability(Request $request)
    {
        $request->validate([
            'trainability' => 'required|max:30'
        ], [
            'trainability.required' => 'required to enter!',
            'trainability.max' => ':max characters limit!'
        ]);
        $data = $request->all();
        $cate_tra = new cate_trainability();
        $cate_tra->trainability = $data['trainability'];
        $cate_tra->save();
        return redirect()->route('create_category')->with('msg', 'Success create');
    }
    public function edit_trainability($tra_id)
    {
        $title = 'Page Edit Trainability';
        $edit_tra = DB::table('cate_trainability_p')->where('trainability_id', $tra_id)->get();
        $manager = view('Dashboard.Edit.trainability', compact('title'))->with('edit_tra', $edit_tra);
        return $manager;
    }
    public function delete_trainability($tra_id)
    {
        DB::table('cate_dog_name')->where('dog_name_id', $tra_id)->delete();
        return redirect()->route('show_detail_category')->with('msg', 'Success Delete!');
    }
    /* show category*/

    public function createCategory()
    {
        $title = 'Show Category Detail';
        return view('Dashboard.CategoryDetail.add_category_detail', compact('title'));
    }

    public function show_detail_category()
    {
        $title = 'Page Edit Category';
        $all_cate_activity = DB::table('cate_activity_lv_p')->get();
        $all_cate_barking = DB::table('cate_barking_lv_p')->get();
        $all_cate_breed = DB::table('cate_breed_p')->get();
        $all_cate_characteristics = DB::table('cate_characteristics_p')->get();
        $all_cate_coat = DB::table('cate_coat_type_p')->get();
        $all_cate_group = DB::table('cate_group_p')->get();
        $all_cate_national = DB::table('cate_national_p')->get();
        $all_cate_shedding = DB::table('cate_shedding_p')->get();
        $all_cate_size = DB::table('cate_size_p')->get();
        $all_cate_trainability = DB::table('cate_trainability_p')->get();
        $all_cate_dog_name = DB::table('cate_dog_name')->get();
        return  view('Dashboard.CategoryDetail.show_category_detail', compact('title'))
            ->with('all_cate_activity', $all_cate_activity)
            ->with('all_cate_barking', $all_cate_barking)
            ->with('all_cate_breed', $all_cate_breed)
            ->with('all_cate_characteristics', $all_cate_characteristics)
            ->with('all_cate_coat', $all_cate_coat)
            ->with('all_cate_group', $all_cate_group)
            ->with('all_cate_national', $all_cate_national)
            ->with('all_cate_shedding', $all_cate_shedding)
            ->with('all_cate_size', $all_cate_size)
            ->with('all_cate_trainability', $all_cate_trainability)
            ->with('all_cate_dog_name', $all_cate_dog_name);
    }
}
