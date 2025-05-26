<?php

use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;


Route::get('/', function () {
    return view('welcome');
});


Route::get('/auth/github/redirect', function () {
    return Socialite::driver('github')->redirect();
});

Route::get('/auth/github/callback', function () {
    $githubUser = Socialite::driver('github')->user();

    // Aqui você pode criar ou autenticar o usuário
    // Exemplo:
    $user = App\Models\User::firstOrCreate(
        ['github_id' => $githubUser->getId()],
        [
            'name' => $githubUser->getName() ?? $githubUser->getNickname(),
            'email' => $githubUser->getEmail(),
            'avatar' => $githubUser->getAvatar(),
        ]
    );

    // Gera um token JWT ou Sanctum, ou redireciona com dados
    $token = $user->createToken('flutter')->plainTextToken;

    // Redirecionar com dados ou exibir para capturar no Flutter
    return redirect("com.meuapp://callback?token=$token");
});
