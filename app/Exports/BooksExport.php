<?php

namespace App\Exports;

use App\Models\Book;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class BooksExport implements FromArray, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function array(): array
    {
        return [
            $books = Book::all();
            $books_filter =[];
            foreach($books as $key => $book){
                $books_filter[$key]['no'] = $key+1;
                $books_filter[$key]['judul'] = $book['title'];
                $books_filter[$key]['penulis'] = $book['author'];
                $books_filter[$key]['penerbit'] = $book['publisher'];
                $books_filter[$key]['tahun'] = $book['year'];
                $books_filter[$key]['rak'] = $book['bookshelf']->name;
            }
        ];
    }
    
    public function headings(): array{
        return[
            'no',
            'judul',
            'penulis',
            'penerbit',
            'tahun_terbit',
            'rak',
        ];
    }
}
