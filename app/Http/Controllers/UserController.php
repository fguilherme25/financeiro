<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
/**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::where('status', 1)
            ->orderBy('name')
            ->paginate(20);

        return \view('users.index',[
            'menu' => 'users',
            'users' => $users
            ]);
    }

        /**
     * Display the specified resource.
     */
    public function show(User $user)
    {

        return \view('users.show', [
            'menu' => 'users',
            'user' => $user
            ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return \view('users.edit', [
            'menu' => 'users',
            'user' => $user
            ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserRequest $request, User $user)
    {
        $request->validated();

        DB::beginTransaction();

        try{

            $user->update([
                'name' => $request->name,
                'email' => $request->email,
            ]);

            DB::commit();

            return \redirect()
                        ->route('user.index')
                        ->with('success', 'Usuário alterado com sucesso!');
        } catch (Exception $e){

            DB::rollBack();

            return \redirect()
                        ->route('user.index')
                        ->with('error', 'Erro ao tentar alterar o Usuário!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        return \view('users.destroy', [
            'menu' => 'users',
            'user' => $user
            ]);
    }

    public function disable(User $user)
    {

        DB::beginTransaction();

        try{
            $user->update([
                'status' => 0,
            ]);

            DB::commit();

            return \redirect()
                        ->route('user.index')
                        ->with('success', 'Usuário excluído com sucesso!');

        } catch (Exception $e){
            DB::rollBack();

            return \redirect()
                        ->route('user.index')
                        ->with('error', 'Erro ao tentar excluir o Usuário!');
        }
    }
}
