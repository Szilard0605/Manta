<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Group;
class GroupsController extends Controller
{
    public function ListGroups()
    {
        /* FIXME: a jövőben.. csak egy bizonyos mennyiségű csoportot kell listázni, ne az összeset,
                  offsetelve, oldalakra bontva.*/
        $groups = Group::all();
        return view('groups', ['groups' => $groups]);
    }

    public function CreateGroup(Request $request)
    {
        $request->validate([
            'name' => 'string|max:255',
        ]);

        if(Group::where('name', $request->input('name'))->exists()) 
        {
            return redirect()->route('groups')->with('error', 'A csoport név már létezik: ' . $request->input('name'));
        }

        $group = new Group();
        $group->name = $request->input('name');

        $group->save();

        return redirect()->route('groups')->with('success', 'Csoport sikeresen létrehozva: ' . $group->name . ' (ID: ' . $group->id . ')');
    }

    public function DeleteGroup(Group $group)
    {
        $group->delete();
        return redirect()->route('groups')->with('success', 'Csoport sikeresen törölve.');
    }
}
