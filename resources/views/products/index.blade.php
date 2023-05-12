<x-app-layout>
  <x-slot name="header">
    <h2 class="header">
      {{ __('Lista de itens') }}
    </h2>
  </x-slot>

  <div class="py-6">
    <div class="mx-auto sm:px-6 lg:px-8">
      <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg">
        <div class="flex justify-between mt-4">
          <div class="space-y-4 mx-4">
            <div class="title-card-parent mx-0">
              <h1 class="text-white font-regular text-3xl">Lista de itens</h1>
            </div>
            <div class="overflow-x-auto w-full bg-darkPrimary text-white text-center">
              <table class="w-[200%]">
                <thead class="sticky top-0 z-10 h-16 border-b border-[#606060]">
                  <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Descrição</th>
                    <th>Local</th>
                    <th>Status</th>
                    <th>Criado em</th>
                    <th>Última atualização</th>
                    <th>Razão de guarda</th>
                    <th>Tags</th>
                    <th>Link da Imagem</th>
                    <th>Código</th>
                    <th>Prazo de guarda</th>
                    <th>Prioridade</th>
                    <th>Adquirido em</th>
                    <th>Data de aquisição</th>
                    <th>Termo de garantia</th>
                    <th>Link do recibo</th>
                    <th>Usuário</th>
                  </tr>
                </thead>
                </div>
                <tbody>
                  @foreach($products as $product)
                      @php
                        $user = $product->find($product->id)->relUsers;
                        $tags = $product->relTags;
                      @endphp
                        <tr class="hover:bg-[#919191] cursor-pointer" onclick="window.location='{{ route('product.show', $product) }}'">
                          <td>{{$product->id}}</td>
                          <td>{{$product->name}}</td>
                          <td>{{$product->description}}</td>
                          <td>{{$product->location}}</td>
                          <td>{{$product->check}}</td>
                          <td>{{$product->created_at}}</td>
                          <td>{{$product->update_at}}</td>
                          <td>{{$product->hold_reason}}</td>
                          <td class="tags">
                            @foreach ($tags as $tag)
                            <span class="tag">{{$tag->name}}</span>
                            @endforeach
                          </td>
                          <td>{{$product->code}}</td>
                          <td>{{$product->image}}</td>
                          <td>{{$product->storage_time}}</td>
                          <td>{{$product->priority}}</td>
                          <td>{{$product->acquired_from}}</td>
                          <td>{{$product->acquire_date}}</td>
                          <td>{{$product->warranty_term}}</td>
                          <td>{{$product->receipt_link}}</td>
                          <td>{{$user->name}}</td>
                        </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  </x-app-layout>