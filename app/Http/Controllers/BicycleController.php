<?php

namespace App\Http\Controllers;

use App\Enums\Direction;
use App\Models\Bicycle;
use Illuminate\Http\Request;

class BicycleController extends Controller
{
    /**
     * Initial load of bicycle ride page.
     *
     * @param Request $request
     * @return View
     */
    public function index(Request $request)
    {
        $bicycle = new Bicycle($request->session()->get('direction', Direction::N), $request->session()->get('speed', 0));

        return view('bicycle', ['direction' => $bicycle->getDirection(), 'speed' => $bicycle->getSpeed()]);
    }

    /**
     * Handle multiple actions from the ride page.
     *
     * @param Request $request
     * @return View
     */
    public function ride(Request $request)
    {
        // instance bicycle with previous session data if exists
        $bicycle = new Bicycle($request->session()->get('direction', Direction::N), $request->session()->get('speed', 0));

        switch ($request->action)
        {
            case 'left':
                $bicycle->turnLeft();
                break;
            case 'right':
                $bicycle->turnRight();
                break;
            case 'pedal':
                $bicycle->pedal();
                break;
            case 'brake':
                $bicycle->brake();
                break;
            default:
                return back()->withError('Invalid bicycle action')->withInput();
        }

        // save bicycle state to session
        $request->session()->put('direction', $bicycle->getDirection());
        $request->session()->put('speed', $bicycle->getSpeed());

        return view('bicycle', ['direction' => $bicycle->getDirection(), 'speed' => $bicycle->getSpeed()]);
    }
}
