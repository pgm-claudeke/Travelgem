<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class AdminController extends Controller {
    public function __constructor() {
        $this->middleware('auth');
    }
}