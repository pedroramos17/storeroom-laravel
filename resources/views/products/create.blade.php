<x-app-layout>
    <x-slot name="header">
        <h2 class="header">
          @if(isset($product))
            {{ __('Editar item') }}
          @else
            {{ __('Novo item') }}
          @endif
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="mx-auto sm:px-6 lg:px-8">
          <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="title-card-parent max-md:grid max-md:justify-center max-md:gap-4">
              <h1 class="text-white font-regular text-3xl text-center">@if(isset($product)) Editor do item @else Cadastro do item @endif</h1>
              @if(isset($errors) && count($errors) > 0)
                <div class="text-center p-4">
                  @foreach($errors as $error)
                    <div class="text-red-500">{{$error}}</div>
                  @endforeach
                </div>
              @endif
              <div class="space-x-4  text-white">
                <div class="group-btn-form">
                  @if(isset($product))
                    <form action="{{ route('product.destroy', $product) }}" method="POST"></form>
                      @csrf
                      @method('DELETE')
                      <button class="btn-cancel order-last" type="submit">Deletar</button>
                    </form>
                  @endif
                @if(isset($product))
                  <form name="formEdit" id="formEdit" action="{{ route('product.update', $product) }}" method="POST" autocomplete="off">
                    @csrf
                    @method('PUT')
                      <button class="btn-save " type="submit">Atualizar</button>
                </div>
                @else
                  <form name="formCad" id="formCad" action="{{ route('product.store') }}" method="POST" autocomplete="off">
                  @csrf
                  @method('POST')
                  <div class="group-btn-form">
                    <button class="btn-save" type="submit">Salvar</button>
                    <button class="btn-cancel" type="reset">Limpar</button>
                  </div>
                @endif
              </div>
            </div>
            </div>
            <div class="m-4 cardsBox">
                
                <div class="bg-primaryCard card">
                  <h2 class="titleCard">Informações principais</h2>
                  <div class="inputBox">
                    <input type="text" id="id" name="id" placeholder=" " class="textfield disabledField" value="{{$product->id ?? ''}}" disabled>
                    <label for="id" class="disabledText">ID</label>
                  </div>
                  <div class="inputBox">
                    <input type="text" id="name" name="name" placeholder=" " class="textfield" value="{{$product->name ?? ''}}" required>
                    <label for="name">Nome</label>
                  </div>
                  <div class="inputBox">
                    <input type="text" id="description" name="description" placeholder=" " class="textfield" value="{{$product->description ?? ''}}">
                    <label for="description">Descrição</label>
                  </div>
                  <div class="inputBox">
                    <input type="text" id="location" name="location" placeholder=" " class="textfield" value="{{$product->location ?? ''}}">
                    <label for="location">Localização</label>
                  </div>
                </div>

        
                <div class="bg-secondaryCard card">
                  <h2 class="titleCard">Status</h2>
                  <div class="space-x-6 check">
                    <fieldset value="{{$product->check ?? ''}}">
                      <label><input type="radio" name="check" value="Entrada" checked><span>Entrada</span></label>
                      <label><input type="radio" name="check" value="Saída"><span>Saída</span></label>
                    </fieldset>
                  </div>
                  <input type="text" id="created_at" name="created_at" placeholder="Criado em" disabled class="textfield disabledField" value="{{$product->created_at ?? ''}}">
                  <input type="text" id="updated_at" name="updated_at" placeholder="Última atualização" disabled class="textfield disabledField" value="{{$product->updated_at ?? ''}}">
                  <div class="inputBox">
                    <input type="text" id="hold_reason" name="hold_reason" placeholder=" " class="textfield" value="{{$product->hold_reason ?? ''}}">
                    <label for="hold_reason">Razão de guarda</label>
                  </div>
                </div>
                <div class="bg-quaternaryCard card">
                  <h2 class="titleCard">Meta dados</h2>
                  <div class="inputBox">
                      <input type="text" id="tags" name="tags" placeholder=" " class="textfield" value="">
                    <label for="tags">Tags</label>
                  </div>
                  <div class="inputBox">
                    <input type="text" id="code" name="code" placeholder=" " class="textfield" value="{{$product->code ?? ''}}" required>
                    <label for="code">Código</label>
                  </div>
                </div>
                <div class="bg-tertiaryCard card">
                  <h2 class="titleCard">Detalhes</h2>
                  <div class="inputBox">
                    <input type="text" id="image" name="image" placeholder=" " class="textfield" value="{{$product->image ?? ''}}">
                    <label for="image">Link da Imagem</label>
                  </div>
                  <div class="inputBox">
                    <input type="text" id="storage_time" name="storage_time" placeholder=" " class="textfield" value="{{$product->storage_time ?? ''}}" required>
                    <label for="storage_time">Prazo de guarda</label>
                  </div>
                  <div class="inputBox">
                    <input type="text" id="priority" name="priority" placeholder=" " class="textfield" value="{{$product->priority ?? ''}}">
                    <label for="priority">Prioridade</label>
                  </div>
                </div>
                <div class="bg-tertiaryCard card">
                  <h2 class="titleCard">Aquisição</h2>
                  <div class="inputBox">
                    <input type="text" id="acquired_from" name="acquired_from" placeholder=" " class="textfield" value="{{$product->acquired_from ?? ''}}">
                    <label for="acquired_from">Adquirido em</label>
                  </div>
                  <div class="inputBox">
                    <input type="text" id="acquire_date" name="acquire_date" placeholder=" " class="textfield" value="{{$product->acquire_date ?? ''}}">
                    <label for="acquire_date">Data de Aquisição</label>
                  </div>
                  <div class="inputBox">
                    <input type="text" id="warranty_term" name="warranty_term" placeholder=" " class="textfield" value="{{$product->warranty_term ?? ''}}">
                    <label for="warranty_term">Termo de garantia</label>
                  </div>
                  <div class="inputBox">
                    <input type="text" id="receipt_link" name="receipt_link" placeholder=" " class="textfield" value="{{$product->receipt_link ?? ''}}">
                    <label for="receipt_link">Link do recibo</label>
                  </div>
                </div>
                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
              </form>
            </div>
          </div>
        </div>
    </div>
</x-app-layout>
