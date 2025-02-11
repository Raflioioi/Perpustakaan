<?php

namespace App\Controllers;

use App\Models\BookModel;

class BookController extends BaseController
{
    public function index()
    {

        return view('book/index');
    }

    public function create()
    {
        $model = new BookModel();
        $data['books'] = $model->findAll();
        return view('book/create', $data);
    }

    public function store()
    {
        $model = new BookModel();
        $model->save([
            'title' => $this->request->getPost('title'),
            'author' => $this->request->getPost('author'),
            'published_year' => $this->request->getPost('published_year')
        ]);
        return redirect()->to('/book/create');
    }

    public function edit($id)
    {
        $model = new BookModel();
        $data['book'] = $model->find($id);
        return view('book/edit', $data);
    }

    public function update($id)
    {
        $model = new BookModel();
        $model->update($id, [
            'title' => $this->request->getPost('title'),
            'author' => $this->request->getPost('author'),
            'published_year' => $this->request->getPost('published_year')
        ]);
        return redirect()->to('/book');
    }

    public function delete($id)
    {  
        $model = new BookModel();
        $model->delete($id);
        return redirect()->to('/book');
    }
}
