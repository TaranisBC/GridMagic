<?php

use App\Http\Controllers\CoursController;
use App\Http\Controllers\CritereController;
use App\Http\Controllers\EvaluationController;
use App\Http\Controllers\ResultatController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::apiResource('cours', CoursController::class)
    ->parameters([
        'cours' => 'cours',
    ]);
Route::patch('cours/{cours}/archiver', [CoursController::class, 'archiverCours']);
Route::patch('cours/{cours}/restaurer', [CoursController::class, 'restaurerCours']);

Route::delete('cours/{cours}/etudiants/{etudiant}', [CoursController::class, 'retirerEtudiant']);
Route::post('cours/{cours}/ajouter-etudiant/', [CoursController::class, 'ajouterEtudiant']);
Route::post('cours/{cours}/etudiants/import', [CoursController::class, 'import']);

Route::apiResource('evaluation', EvaluationController::class);
Route::apiResource('criteres', CritereController::class);
Route::apiResource('resultats', ResultatController::class);
Route::get('resultats/etudiant' , [ResultatController::class, 'resultatsEtuEval']);

