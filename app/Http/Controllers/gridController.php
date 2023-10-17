<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Amount;
use App\Models\Army;
use App\Models\Data;
use App\Models\Tile;
use App\Models\Faction;

class gridController extends Controller
{
    public function drawGrid() {
        $amount = Amount::first();
        $allArmies = Army::all();
        $tiles = 0;

        $hexHeight = $amount->radius * 1.15;

        $gridWidth = $amount->collums * $amount->radius * sqrt(3);
        $gridWidth = round($gridWidth);
        $gridHeight = $amount->rows * $hexHeight * 1.5;
        $gridHeight = round($gridHeight);

        $startX = ($amount->width - $gridWidth) / 2;
        $startY = ($amount->height - $gridHeight) / 2;

        $changeX = $amount->radius * 1.5; //radius * 1.5
        $currentX = $startX;

        $changeY = $amount->radius * 1.725; //radius * 1.725
        $currentY = $startY;

        Tile::truncate();

        for($y = 0; $y < $amount->rows; $y++) {
            if($y > 0) {
                $currentY = $currentY + $changeY;
            } else if($y === 0) {
                $currentY = $startY;
            }
            for($x = 0; $x < $amount->collums; $x++) {
                if($x > 0) {
                    $currentX = $currentX + $changeX;
                } else if($x === 0) {
                    $currentX = $startX;
                }
                $tile = new Tile();
                $tile->x = $currentX;
                $tile->y = $currentY;
                $tile->save();
                $tiles++;
                // dump("x: " . $currentX . " y: " . $currentY);
            }
        }
        $armies = array();
        $itemCount = 0;
        foreach($allArmies as $army) {
            $armyTile = Tile::where('id' , $army->tile_id)->first();
            $faction = Faction::where('id' , $army->faction_id)->first();
            $itemCount++;
            $item = new Army();
            $item->id = $army->id;
            $item->x = $armyTile->x;
            $item->y = $armyTile->y;
            $item->xId = $army->id . "x";
            $item->yId = $army->id . "y";
            $item->count = $itemCount;
            $item->tile_id = $armyTile->id;
            $item->tileId_id = $army->id . $armyTile->id;
            $item->factionColour = $faction->colour;
            array_push($armies , $item);
        }

        $data = [
            $amount,
        ];
        array_push($data, $armies);

        // dd($data);
        return view('home')->with(['data' => $data]);
    }
}
