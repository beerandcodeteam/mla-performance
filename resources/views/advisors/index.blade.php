<x-app
    title="Users"
>
    <x-table
        :columns="[ ['label' => 'name', 'key' => 'name'], ['label' => 'Advisor', 'key' => 'advisor.name'], ['label' => 'edit', 'key' => 'edit']]"
        :items="$users"
    />
</x-app>
