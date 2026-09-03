<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Critic;
class CriticController extends Controller
{
    public function destroy(string $id)
    {
    $critic = Critic::find($id);

    $critic->delete();

    return response()->noContent();
    }
}
