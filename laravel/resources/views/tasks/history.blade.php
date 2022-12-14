<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Todo</title>
</head>

<body>
    <header>
        <div class=title>
            <div>
                <p>Todoアプリ-完了済みタスク表</p>
            </div>
        </div>
    </header>
    @if ($completedtasks->isNotEmpty())
    <main>
        <div class="max-w-7xl mx-auto mt-20">
            <div class="inline-block min-w-full py-2 align-middle">
                <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-300">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900">
                                    完了済みタスク</th>
                                <th scope="co1" class="categoryviews2">
                                カテゴリ</th>    
                                <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6">
                                    <span class="sr-only">Actions</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 bg-white">
                            @foreach ($completedtasks as $item)
                            <tr>
                                <td class="px-3 py-4 text-sm text-gray-500">
                                    <div>
                                        {{ $item->name }}
                                    </div>
                                </td>
                                <td class="categoryname">
                                        <div>
                                        {{ $item->category}}
                                        </div>  
                                    </td>       
                                <td class="p-0 text-right text-sm font-medium">
                                    <div class="flex justify-end">
                                        <div>
                                            <form action="/history/{{ $item->id }}" method="post"
                                                class="inline-block text-gray-500 font-medium" role="menuitem"
                                                tabindex="-1">
                                                @csrf
                                                @method('PUT')
                                                <input type="hidden" name="status" value="{{$item->status}}">
                                                <button type="submit" class="botan">未完了に戻す</button>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                
            </div>
        </div>
        @endif
        <div class="mt-8 w-full flex items-center justify-center gap-10">
                    <a href="/tasks" class="block shrink-0 underline underline-offset-2">
                        戻る
                    </a>
            </div>



    </main>
</body>