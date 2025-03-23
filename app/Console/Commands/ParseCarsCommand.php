<?php

namespace App\Console\Commands;

use App\Models\Car;
use DiDom\Document;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class ParseCarsCommand extends Command
{
    protected $signature = 'cars:parse';

    protected $description = 'Команда парсинга с сайта https://codd15.ru/ticket.html';

    public function handle(): void
    {
        $this->update($this->parse());

        $this->info('Данные очереди успешно обновлены');
    }

    private function update(array $data): void
    {
        DB::transaction(function () use ($data) {
            Car::upsert($data, 'number', ['position', 'lang', 'model', 'registered_at']);

            $numbers = array_column($data, 'number');

            Car::whereNotIn('number', $numbers)->delete();
        });
    }

    private function parse()
    {
        $document = new Document();
        $document->loadHtmlFile('https://codd15.ru/ticket.html');
        $items = $document->find('table > tr');

        return collect($items)
            ->map(function ($item) {
                $row = $item->find('td');

                return [
                    'position' => $row[0]->text(),
                    'lang' => $row[1]->text(),
                    'number' => $row[2]->text(),
                    'model' => $row[3]->text(),
                    'registered_at' => $row[4]->text(),
                ];
            })->toArray();
    }
}
