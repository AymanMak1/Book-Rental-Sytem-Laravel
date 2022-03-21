@extends('layouts.base')

@section('content')
<div class="max-w-screen-xl px-4 pb-8 mx-auto">
    <div class="book-details border-b  border-gray-800">
        <div class="container mx-auto px-4 py-16 flex flex-col md:flex-row">
            <img src="/imgs/book.jpg" alt="" class="w-96"> <br>
            <div class="md:ml-24">
                <h1 class="text-3xl font-semibold">The Secret</h1>
                <table class="mt-4">
                    <tr class="font-extrabold">
                        <td class="text-gray-400 pb-2">Author</td>
                        <td class="pb-2">: Rhonda Byrne</td>
                    </tr>
                    <tr class="font-extrabold">
                        <td class="text-gray-400 pb-2">Data of publish</td>
                        <td class="pb-2">: Mar 20, 2003</td>
                    </tr>
                    <tr class="font-extrabold">
                        <td class="text-gray-400 pb-2">Pages</td>
                        <td class="pb-2">: 198</td>
                    </tr>
                    <tr class="font-extrabold">
                        <td class="text-gray-400 pb-2">Language</td>
                        <td class="pb-2">: HU</td>
                    </tr>
                    <tr class="font-extrabold">
                        <td class="text-gray-400 pb-2">ISBN Number</td>
                        <td class="pb-2">: 1582701709 </td>
                    </tr>
                    <tr class="font-extrabold">
                        <td class="text-gray-400 pb-2">Number of this book in the library</td>
                        <td class="pb-2">: 220 </td>
                    </tr>
                    <tr class="font-extrabold">
                        <td class="text-gray-400 pb-2">Number of available books</td>
                        <td class="pb-2">: 56 </td>
                    </tr>
                    <tr  class="font-extrabold">
                        <td colspan="3" class="pb-2 pt-4">
                            The Secret is a self-help book by Rhonda Byrne that explains how the law of attraction, which states
                            that positive energy attracts positive things into your life, governs your thinking and actions,
                            and how you can use the power of positive thinking to achieve anything you can imagine.
                        </td>
                    </tr>
                </table>

                <div class="genre bg-amber-400 p-2 font-extrabold text-center rounded-lg mt-4 text-white">
                    Psychology
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
