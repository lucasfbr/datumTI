<?php

namespace App\Http\Controllers;

use App\Banner;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;

class BannerController extends Controller
{
    private $banner;
    private $extensoes = ['jpg','jpeg', 'png'];
    private $caminhoImg = 'img/banners/';

    public function __construct(Banner $banner)
    {
        $this->banner = $banner;
    }

    public function index(){

        $banners =  $this->banner->all();

        if(count($banners) == 0)
            $banners = false;

        return view('banner.index', compact('banners'));

    }

    public function search(Request $request){

        $input = $request->all();

        $banners = Banner::where('nome', 'like', '%'.$input['search'].'%')->get();

        return view('banner.index', compact('banners'));

    }

    public function show($id){

        $banner = $this->banner->find($id);

        return view('banner.show', compact('banner'));

    }

    public function create(){

        return view('banner.create');

    }

    public function store(Request $request){

        $this->validate($request, [
            'nome' => 'required',
            'descricao' => 'required',
            'banner' => 'required',
        ]);

        $input = $request->all();

        //verifica se foi enviada alguma imagem com o formulário
        if(!empty($request->file('banner'))){
            //armazena a imagem enviada pelo form
            $image = $request->file('banner');
            //pega a extensao da imagem
            $extensao = $image->getClientOriginalExtension();
            //recebe o nome da imagem que foi movida para a pasta de destino
            $input['banner'] = $this->moverImagem($image, $extensao);
        }

        $banner =  $this->banner->create($input);

        if($banner){
            return redirect('/')->with('sucesso', 'Banner cadastrado com sucesso!');
        }else{
            return redirect('/create')->with('erro', 'Erro ao cadastrar o banner, tente novamente mais tarde!');
        }

    }

    public function edit($id)
    {
        $banner = $this->banner->find($id);

        return view('banner.edit', compact('banner'));

    }

    public function update(Request $request, $id){

        $this->validate($request, [
            'nome' => 'required',
            'descricao' => 'required',

        ]);

        $banner = $this->banner->find($id);

        $input = $request->all();

        //verifica se foi enviada alguma imagem com o formulário
        if(!empty($request->file('banner'))){
            //armazena a imagem enviada pelo form
            $image = $request->file('banner');
            //pega a extensao da imagem
            $extensao = $image->getClientOriginalExtension();
            //recebe o nome da imagem que foi movida para a pasta de destino
            $input['banner'] = $this->moverImagem($image, $extensao, $banner['banner']);
        }

        $update = $banner->fill($input);

        if($update->save()){
            return redirect('/')->with('sucesso', 'Banner editado com sucesso!');
        }else{
            return redirect('/edit')->with('erro', 'Erro ao editar o banner, tente novamente mais tarde!');
        }

    }

    public function delete($id){


        $banner = $this->banner->find($id);

        $this->removeImagemDir($banner['banner']);

        if($banner->delete()){
            return redirect('/')->with('sucesso', 'Banner deletado com sucesso!');
        }else{
            return redirect('/edit')->with('erro', 'Erro ao deletar o banner, tente novamente mais tarde!');
        }

    }

    public function moverImagem($image, $extensao, $bannerAntigo = false)
    {

        if($bannerAntigo){
            $this->removeImagemDir($bannerAntigo);
        }

        if(!in_array($extensao, $this->extensoes)) {
            return back()->with('erro', 'Erro ao fazer upload de imagem! Formatos aceitos: jpg, jpeg e png');
        } else {
            $filename = 'banners' . time() . '.' . $extensao;
            $path = public_path($this->caminhoImg . $filename);
            Image::make($image->getRealPath())->resize(1440,450)->save($path);
            return $this->caminhoImg . $filename;
        }
    }
    /*
   * Metodo responsavel por verificar se a imagem existe no diretorio e remove-lá
   */
    public function removeImagemDir($imagem){
        //verifica se a foto antiga existe no diretorio
        if(File::exists($imagem)) {
            //remove a foto do diretorio
            File::delete($imagem);
        }
    }


}
