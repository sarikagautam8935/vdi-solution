<x-admin.wrapper>
    <x-slot name="title">
        {{ __('User Models') }}
    </x-slot>

    @can('adminCreate', \BalajiDharma\LaravelMenu\Models\Menu::class)
    <x-admin.add-link href="{{ route('admin.menu.create') }}">
        {{ __('Add Menu') }}
    </x-admin.add-link>
    @endcan

    <div class="py-2">
        <div class="min-w-full  border-base-200 shadow overflow-x-auto">
            <x-admin.grid.search action="{{ route('admin.menu.index') }}" />
            <x-admin.grid.table>
                <x-slot name="head">
                    <tr class="bg-base-200">
                        <x-admin.grid.th>
                            @include('admin.includes.sort-link', ['label' => 'Name', 'attribute' => 'name'])
                        </x-admin.grid.th>
                        <x-admin.grid.th>
                            {{ __('Owner') }}
                        </x-admin.grid.th>
                        <x-admin.grid.th>
                            {{ __('Permission') }}
                        </x-admin.grid.th>
                        
                    </tr>
                </x-slot>
                <x-slot name="body">
                @foreach($menus as $menu)
                    <tr>
                        <x-admin.grid.td>
                            {{ $menu->name }}
                        </x-admin.grid.td>
                        <x-admin.grid.td>
                            {{ $menu->description }}
                        </x-admin.grid.td>
                        <x-admin.grid.td>
                            {{ $menu->machine_name }}
                        </x-admin.grid.td>

                    </tr>
                    @endforeach
                    @if($menus->isEmpty())
                        <tr>
                            <td colspan="2">
                                <div class="flex flex-col justify-center items-center py-4 text-lg">
                                    {{ __('No Result Found') }}
                                </div>
                            </td>
                        </tr>
                    @endif
                </x-slot>
            </x-admin.grid.table>
        </div>
        <div class="py-8">
            {{ $menus->appends(request()->query())->links() }}
        </div>
    </div>
</x-admin.wrapper>
