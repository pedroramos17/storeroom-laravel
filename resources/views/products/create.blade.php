<x-app-layout>
    <x-slot name="header">
        <h2 class="header">
            {{ __('Novo item') }}
        </h2>
    </x-slot>

    <div class="py-6">
      <div class="mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
          <div class="title-card-parent max-md:grid max-md:justify-center max-md:gap-4">
            <h1 class="text-white font-regular text-3xl text-center">Cadastro do item</h1>
            @if(isset($errors) && count($errors) > 0)
              <div class="text-center p-4">
                @foreach($errors as $error)
                  <div class="text-red-500">{{$error}}</div>
                @endforeach
              </div>
            @endif
            <div class="space-x-4  text-white">
              <form name="formCad" id="formCad" action="{{ route('products.store') }}" method="POST" autocomplete="off">
                @csrf
                @method('POST')
                  <button class="btn-cancel" type="reset">Limpar</button>
            </div>
          </div>
            <div class="m-4 cardsBox">
                
                <div class="bg-primaryCard card">
                  <h2 class="titleCard">Informações principais</h2>
                  <div class="inputBox">
                    <input type="text" id="name" name="name" placeholder=" " class="textfield" required autofocus>
                    <label for="name">Nome*</label>
                  </div>
                  <div class="inputBox">
                    <input type="text" id="description" name="description" placeholder=" " class="textfield">
                    <label for="description">Descrição</label>
                  </div>
                  <div class="inputBox">
                    <input type="text" id="location" name="location" placeholder=" " class="textfield">
                    <label for="location">Localização</label>
                  </div>
                </div>

        
                <div class="bg-secondaryCard card">
                  <h2 class="titleCard">Status</h2>
                  <div class="space-x-6 check">
                    <fieldset>
                      <label><input type="radio" name="stored" value="1" checked><span>Entrada</span></label>
                      <label><input type="radio" name="stored" value="0"><span>Saída</span></label>
                    </fieldset>
                  </div>
                  <input type="text" id="created_at" name="created_at" placeholder="Criado em" disabled class="textfield disabledField">
                  <input type="text" id="updated_at" name="updated_at" placeholder="Última atualização" disabled class="textfield disabledField">
                  <div class="inputBox">
                    <input type="text" id="hold_reason" name="hold_reason" placeholder=" " class="textfield">
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
                    <input type="text" id="code" name="code" placeholder=" " class="textfield" required>
                    <label for="code">Código*</label>
                  </div>
                </div>
                <div class="bg-tertiaryCard card">
                  <h2 class="titleCard">Detalhes</h2>
                  <div class="inputBox">
                    <input type="text" id="image" name="image" placeholder=" " class="textfield">
                    <label for="image">Link da Imagem</label>
                  </div>
                  <div class="inputBox">
                    <input type="text" id="storage_time" name="storage_time" placeholder=" " class="textfield" required>
                    <label for="storage_time">Prazo de guarda*</label>
                  </div>
                  <div class="inputBox">
                    <input type="text" id="priority" name="priority" placeholder=" " class="textfield">
                    <label for="priority">Prioridade</label>
                  </div>
                </div>
                <div class="bg-primaryCard card">
                  <h2 class="titleCard">Aquisição</h2>
                  <div class="inputBox">
                    <input type="text" id="acquired_from" name="acquired_from" placeholder=" " class="textfield">
                    <label for="acquired_from">Adquirido em</label>
                  </div>
                  <div class="inputBox">
                    <input type="text" id="acquire_date" name="acquire_date" placeholder=" " class="textfield">
                    <label for="acquire_date">Data de Aquisição</label>
                  </div>
                  <div class="inputBox">
                    <input type="text" id="warranty_term" name="warranty_term" placeholder=" " class="textfield">
                    <label for="warranty_term">Termo de garantia</label>
                  </div>
                  <div class="inputBox">
                    <input type="text" id="receipt_link" name="receipt_link" placeholder=" " class="textfield">
                    <label for="receipt_link">Link do recibo</label>
                  </div>
                </div>
                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                <div class="flex justify-end">
                  <button class="btn-save" type="submit">Salvar</button>
                </div>
              </form>
            </div>
          </div>
        </div>
    </div>
</x-app-layout>
