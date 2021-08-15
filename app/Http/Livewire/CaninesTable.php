<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Canine;
use Illuminate\Database\Eloquent\Builder;
use PowerComponents\LivewirePowerGrid\Button;
use PowerComponents\LivewirePowerGrid\Column;
use PowerComponents\LivewirePowerGrid\PowerGrid;
use PowerComponents\LivewirePowerGrid\PowerGridEloquent;
use PowerComponents\LivewirePowerGrid\PowerGridComponent;
use PowerComponents\LivewirePowerGrid\Traits\ActionButton;

class CaninesTable extends PowerGridComponent
{
    use ActionButton;

    public function setUp()
    {
        $this->showCheckBox()
            ->showPerPage()
            ->showExportOption('download', ['excel', 'csv'])
            ->showSearchInput();
    }

    public function template(): ?string
    {
        return null;
    }

    public function relationSearch(): array
    {
        return [];
    }

    public function dataSource(): ?Builder
    {
        return Canine::query();
    }

    public function addColumns(): ?PowerGridEloquent
    {
        return PowerGrid::eloquent()
            ->addColumn('id')
            ->addColumn('name')
            ->addColumn('breed')
            ->addColumn('gender', function (Canine $canine) {
                return $canine->gender . "<span class='text-2xl pl-1'>&$canine->gender;</span>";
            })
            ->addColumn('mixed', function (Canine $canine) {
                return $canine->mixed == 0 ? "<span>&cross;</span>" : "<span>&check;</span>";
            })
            ->addColumn('active', function (Canine $canine) {
                return $canine->active == 0 ? "<span>&cross;</span>" : "<span>&check;</span>";
            })
            ->addColumn('user_id', function (Canine $canine) {
                return $canine->user->name;
            })
            ->addColumn('created_at')
            ->addColumn('created_at_formatted', function (Canine $model) {
                return Carbon::parse($model->created_at)->format('d/m/Y H:i:s');
            });
    }

    public function columns(): array
    {
        return [
            Column::add()
                ->title(__('ID'))
                ->field('id')
                ->searchable()
                ->sortable(),

            Column::add()
                ->title(__('Name'))
                ->field('name')
                ->searchable()
                ->makeInputText('name')
                ->sortable(),

            Column::add()
                ->title(__('Breed'))
                ->field('breed')
                ->searchable()
                ->sortable(),

            Column::add()
                ->title(__('Gender'))
                ->field('gender')
                ->searchable()
                ->sortable(),

            Column::add()
                ->title(__('Mixed'))
                ->field('mixed')
                ->searchable()
                ->sortable(),

            Column::add()
                ->title(__('Active'))
                ->field('active')
                ->searchable()
                ->sortable(),

            Column::add()
                ->title(__('Owner'))
                ->field('user_id')
                ->searchable()
                ->sortable(),

            Column::add()
                ->title(__('Created at'))
                ->field('created_at')
                ->hidden(),

            Column::add()
                ->title(__('Created at'))
                ->field('created_at_formatted')
                ->makeInputDatePicker('created_at')
                ->searchable()
        ];
    }

    /*
    |--------------------------------------------------------------------------
    | Actions Method
    |--------------------------------------------------------------------------
    | Enable this section only when you have defined routes for these actions.
    |
    */

    public function actions(): array
    {
        return [
            Button::add('edit')
                ->caption(__('Edit'))
                ->class('bg-indigo-500 hover:bg-indigo-600 text-gray-100 hover:text-white transition rounded p-2')
                ->route('canines.edit', ['canine' => 'id']),

            Button::add('destroy')
                ->caption(__('Delete'))
                ->class('bg-red-500 hover:bg-red-600 text-gray-100 hover:text-white transition rounded p-2')
                ->route('canines.destroy', ['canine' => 'id'])
                ->method('delete')
        ];
    }

    /*
    |--------------------------------------------------------------------------
    | Edit Method
    |--------------------------------------------------------------------------
    | Enable this section to use editOnClick() or toggleable() methods
    |
    */

    /*
    public function update(array $data ): bool
    {
       // filter example with symbols
       // if ($data['field'] == 'price_BRL') {
       //       $data['field'] = 'price';
       //       $data['value'] = Str::of($data['value'])
       //           ->replace('.', '')
       //           ->replace(',', '.')
       //           ->replaceMatches('/[^Z0-9\.]/', '');
       //}

       try {
           $updated = Canine::query()->find($data['id'])->update([
                $data['field'] => $data['value']
           ]);
       } catch (QueryException $exception) {
           $updated = false;
       }
       return $updated;
    }

    public function updateMessages(string $status, string $field = '_default_message'): string
    {
        $updateMessages = [
            'success'   => [
                '_default_message' => __('Data has been updated successfully!'),
                //'custom_field' => __('Custom Field updated successfully!'),
            ],
            "error" => [
                '_default_message' => __('Error updating the data.'),
                //'custom_field' => __('Error updating custom field.'),
            ]
        ];

        return ($updateMessages[$status][$field] ?? $updateMessages[$status]['_default_message']);
    }
    */
}
