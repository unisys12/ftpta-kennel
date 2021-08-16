<?php

namespace App\Http\Livewire;

use App\Models\Role;
use Carbon\Carbon;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use PowerComponents\LivewirePowerGrid\Button;
use PowerComponents\LivewirePowerGrid\Column;
use PowerComponents\LivewirePowerGrid\PowerGrid;
use PowerComponents\LivewirePowerGrid\PowerGridEloquent;
use PowerComponents\LivewirePowerGrid\PowerGridComponent;
use PowerComponents\LivewirePowerGrid\Traits\ActionButton;

class UsersTable extends PowerGridComponent
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

    public function dataSource(): ?Builder
    {
        return User::query()->with('roles');
    }

    public function relationSearch(): array
    {
        return [
            'roles' => ['name']
        ];
    }

    public function addColumns(): ?PowerGridEloquent
    {
        return PowerGrid::eloquent()
            ->addColumn('id')
            ->addColumn('name')
            ->addColumn('email')
            ->addColumn('address')
            ->addColumn('city')
            ->addColumn('state')
            ->addColumn('zip')
            ->addColumn('roles', function (User $user) {

                foreach ($user->roles as $role) {
                    return $role->name;
                }
            })
            ->addColumn('created_at_formatted', function (User $model) {
                return Carbon::parse($model->created_at)->format('d/m/Y H:i:s');
            });
    }

    public function columns(): array
    {
        return [
            Column::add()
                ->title(__('ID'))
                ->field('id')
                ->sortable()
                ->searchable(),

            Column::add()
                ->title(__('NAME'))
                ->field('name')
                ->sortable()
                ->searchable(),

            Column::add()
                ->title(__('EMAIL'))
                ->field('email')
                ->searchable(),

            Column::add()
                ->title(__('ADDRESS'))
                ->field('address')
                ->searchable(),

            Column::add()
                ->title(__('CITY'))
                ->field('city')
                ->sortable()
                ->searchable(),

            Column::add()
                ->title(__('STATE'))
                ->field('state')
                ->sortable()
                ->searchable(),

            Column::add()
                ->title(__('ZIP'))
                ->field('zip')
                ->sortable()
                ->searchable(),

            Column::add()
                ->title(__('ROLES'))
                ->field('roles')
                ->sortable()
                ->searchable(),

            Column::add()
                ->title(__('CREATED AT'))
                ->field('created_at_formatted')
                ->searchable()
                ->sortable()
                ->makeInputDatePicker('created_at'),

            // Column::add()
            //     ->title(__('UPDATED AT'))
            //     ->field('updated_at_formatted')
            //     ->searchable()
            //     ->sortable()
            //     ->makeInputDatePicker('updated_at'),

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
                ->class('bg-indigo-500 hover:bg-indigo-600 text-gray-100 hover:text-white transition rounded p-2 mr-2')
                ->route('users.edit', ['user' => 'id']),

            Button::add('destroy')
                ->caption(__('Delete'))
                ->class('bg-red-500 hover:bg-red-600 text-gray-100 hover:text-white transition rounded p-2')
                ->route('users.destroy', ['user' => 'id'])
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
       try {
           $updated = User::query()->find($data['id'])->update([
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
