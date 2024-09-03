<x-app-layout>
  <x-slot name="header">
    <h2 class="header">
      {{ __('Lista de produtos') }}
    </h2>
  </x-slot>

  <div class="py-6">
    <div class="mx-auto sm:px-6 lg:px-8">
      <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg">
        <div class="mt-4">
          <div class="space-y-4 mx-4">
            <div class="title-card-parent mx-0">
              <h1 class="mt-2 text-white font-regular text-2xl font-bold">Lista de produtos</h1>
              <a href='{{ route('products.create')}}'><div class="add-icon mt-4 mr-2"></div></a>
            </div>
            <div class="relative min-w-full overflow-auto py-4 bg-darkPrimary text-white">
              <table class="table-auto w-[200%]">
                <thead>
                  <tr class="divide-x-2 divide-[#2a3647] font-medium text-base">
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Descrição</th>
                    <th>Local</th>
                    <th>Status</th>
                    <th>Criado em</th>
                    <th>Última atualização</th>
                    <th>Razão de guarda</th>
                    <th>Tags</th>
                    <th>Código</th>
                    <th>Link da Imagem</th>
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
                        <tr class="hover:bg-[#3d4653] cursor-pointer h-12" onclick="window.location='{{ route('products.update', $product) }}'">
                          <td>{{$product->id}}</td>
                          <td>{{$product->name}}</td>
                          <td>{{$product->description}}</td>
                          <td>{{$product->location}}</td>
                          <td>{{$product->stored ? 'Guardado' : 'Retirado'}}</td>
                          <td>{{$product->created_at}}</td>
                          <td>{{$product->updated_at}}</td>
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