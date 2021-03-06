<?php
/**
  * RockHopSoftComAdmin extends the Survloop admin umbrella.
  *
  * Survloop.org
  * @package  rockhopsoft/rockhopsoftcom
  * @author  Morgan Lesko <rockhoppers@runbox.com>
  * @since 0.0
  */
namespace RockHopSoft\RockHopSoftCom\Controllers;

use DB;
use Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\SLDefinitions;
use RockHopSoftCom\Controllers\RockHopSoftCom;
use RockHopSoft\Survloop\Controllers\Admin\AdminSubsController;

class RockHopSoftComAdmin extends AdminSubsController
{
    public $classExtension     = 'RockHopSoftComAdmin';
    public $treeID             = 1;
    
    public function initPowerUser($uID = -3)
    {
        if ($this->v["uID"] <= 0 
            || !$this->v["user"]->hasRole('administrator|staff|databaser|brancher|volunteer')) {
            return redirect('/');
        }
        return [];
    }
    
    protected function initExtra(Request $request)
    {
        $this->custReport = new RockHopSoftCom($request);
        
        if (!isset($this->v["currPage"])) {
            $this->v["currPage"] = ['/dashboard', ''];
        }
        if (trim($this->v["currPage"][0]) == '') {
            $this->v["currPage"][0] = '/dashboard';
        }
        $this->v["allowEdits"] = ($this->v["user"]->hasRole('administrator|staff'));
        
        $this->loadSysSettings();
        
        $this->v["management"] = ($this->v["user"]->hasRole('administrator|staff'));
        $this->v["volunOpts"] = 1;
        if ($this->REQ->session()->has('volunOpts')) {
            $this->v["volunOpts"] = $this->REQ->session()->get('volunOpts');
        }
        
        return true;
    }
    
    public function dashboardDefault(Request $request)
    {
        $user = Auth::user();
        if (!$user->hasRole('administrator|staff|databaser|brancher')) {
            if ($user->hasRole('volunteer')) {
                return redirect('/volunteer');
            }
            return redirect('/');
        }
        return redirect( '/dash/all-submissions' );
    }
    
    protected function loadSearchSuggestions()
    {    
        $this->v["searchSuggest"] = [];
        return true;
    }
    
}
