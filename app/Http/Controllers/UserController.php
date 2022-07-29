<?php

namespace App\Http\Controllers;

use App\Exceptions\UserControllerException;
use App\Http\Middleware\RedirectIfAuthenticated;
use App\Http\Requests\StoreUpdateUserFormRequest;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function __construct(User $user)
    {
        $this->model = $user;
    }

    public function index(Request $request)
    {
        $users = $this->model->getUsers(
            $request->search ?? ''
        );

        return view('users.index', compact('users'));
    }

    public function show($id)
    {
        $user = User::find($id);

        if($user){
            return view('users.show', compact('user'));
        } else {
            throw new UserControllerException('Usuário não encontrado');
        }
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(StoreUpdateUserFormRequest $request)
    {
        $data = $request->all();
        $data['password'] = bcrypt($request->password);

        if ($request->image) {
            $file = $request['image'];
            $path = $file->store('profile', 'public');
            $data['image'] = $path;
        }

        $this->model->create($data);

        return redirect()->route('users.index')->with('create', 'O Usuário foi criado com sucesso! ;)');
    }

    public function edit($id)
    {
        if (!$user = $this->model->find($id))
            return redirect()->route('users.index');
        return view('users.edit', compact('user'));
    }

    public function update(StoreUpdateUserFormRequest $request, $id)
    {
        if (!$user = $this->model->find($id))
            return redirect()->route('users.index');

        $data = $request->only('name', 'email', 'birthday', 'address', 'phone', 'occupation', 'cpf', 'is_admin');
        if ($request->password)
            $data['password'] = bcrypt($request->password);

        if ($request->image) {
            $file = $request['image'];
            $path = $file->store('profile', 'public');
            $data['image'] = $path;
        }

        $data['is_admin'] = $request->is_admin ? 1 : 0;

        $user->update($data);

        return redirect()->route('users.index')->with('edit', 'O usuário foi atualizado com sucesso! ;)');
    }

    public function destroy($id)
    {
        if (!$user = $this->model->find($id))
            return redirect()->route('users.index');

        $user->delete();

        return redirect()->route('users.index')->with('destroy', 'Usuário foi deletado com sucesso!');
    }

    public function admin()
    {
        return view('admin.index');
    }
}
