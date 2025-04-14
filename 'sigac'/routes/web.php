<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlunoController;
use App\Http\Controllers\CursoController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ComprovanteController;
use App\Http\Controllers\DeclaracaoController;
use App\Http\Controllers\DocumentoController;
use App\Http\Controllers\NivelController;
use App\Http\Controllers\TurmaController;
/*Rotas Públicas*/
Route::get('/', function () {
    return view('welcome');
});
/*Rotas de Autenticação*/
Auth::routes();
/*Rotas Protegidas (requerem autenticação)*/
Route::middleware(['auth'])->group(function () {
/*Dashboard*/
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
/*CRUDs Principais */
    Route::resource('alunos', AlunoController::class);
    Route::resource('cursos', CursoController::class);
    Route::resource('categorias', CategoriaController::class);
    Route::resource('comprovantes', ComprovanteController::class);
    Route::resource('declaracoes', DeclaracaoController::class);
    Route::resource('documentos', DocumentoController::class);
    Route::resource('niveis', NivelController::class);
    Route::resource('turmas', TurmaController::class);
    /*Rotas Customizadas para Alunos  */
    Route::prefix('alunos')->group(function () {
        // Relatório de alunos por curso
        Route::get('/relatorio/por-curso', [AlunoController::class, 'relatorioPorCurso'])
            ->name('alunos.relatorio.curso');
        // Exportar alunos para Excel
        Route::get('/exportar', [AlunoController::class, 'exportar'])
            ->name('alunos.exportar');
    });
    /*Rotas Customizadas para Cursos*/
    Route::prefix('cursos')->group(function () {
        // Cursos com vagas disponíveis
        Route::get('/com-vagas', [CursoController::class, 'comVagas'])
            ->name('cursos.com-vagas');
        // Matriz curricular
        Route::get('/{curso}/matriz', [CursoController::class, 'matrizCurricular'])
            ->name('cursos.matriz');
    });
    /*Rotas para Comprovantes*/
    Route::prefix('comprovantes')->group(function () {
        // Aprovar comprovante
        Route::patch('/{comprovante}/aprovar', [ComprovanteController::class, 'aprovar'])
            ->name('comprovantes.aprovar');           
        // Rejeitar comprovante
        Route::patch('/{comprovante}/rejeitar', [ComprovanteController::class, 'rejeitar'])
            ->name('comprovantes.rejeitar');
    });
/*Rotas para Documentos */
    Route::prefix('documentos')->group(function () {
        // Download de documento
        Route::get('/{documento}/download', [DocumentoController::class, 'download'])
            ->name('documentos.download');
    });
    /*Rotas para Relatórios   */
    Route::prefix('relatorios')->group(function () {
        // Relatório de atividades complementares
        Route::get('/atividades-complementares', [AlunoController::class, 'relatorioAtividades'])
            ->name('relatorios.atividades');            
        // Relatório de desempenho
        Route::get('/desempenho', [AlunoController::class, 'relatorioDesempenho'])
            ->name('relatorios.desempenho');
    });
});
/*Rotas da API (opcional)*/
Route::prefix('api')->group(function () {
    Route::get('/alunos', [AlunoController::class, 'apiIndex']);
    Route::get('/cursos', [CursoController::class, 'apiIndex']);
});
Route::fallback(function () {
    return view('errors.404');
});