<div>
    <div class="border-b border-gray-200 pb-3 mb-3">
        <label for="roleSelect" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select an option</label>
        <select wire:model="selectedRole" id="roleSelect" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
            <option value="">Select a Role Group</option>
            @foreach ($roleGroups as $role)
                <option value="{{ $role->id }}">{{ $role->name }}</option>
            @endforeach
        </select>
    </div>
    @if ($selectedRole && $users)
 
    <h2 class="text-baseline font-semibold leading-7 text-gray-900 mb-1">Add user to <span class="text-red-700">{{ $roleGroups->find($selectedRole)->name }}</span> role group:</h2>
   
    <div class="flex mb-3">
        <select wire:model="userToAdd" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 flex-grow-0 w-48 p-2.5">
            <option value="">Select a User</option>
            @foreach ($allUsers as $user)
                <option value="{{ $user->id }}">{{ $user->name }}</option>
            @endforeach
        </select>
        <button class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 text-center ml-2" wire:click="addUserToRole" wire:loading.attr="disabled">Add User</button>
    </div>
    
    <table class="table-auto w-full">
        @foreach ($users as $user)
            <tr class="p-3 border-b">
                <td class="align-middle">
                    <div class="flex items-center gap-x-4">
                        <img class="h-12 w-12 flex-none rounded-full bg-gray-50 my-2" src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                        <div class="min-w-0">
                            <p class="text-sm font-semibold leading-6 text-gray-900">{{ $user->name }}</p>
                        </div>
                    </div>
                </td>
                <td class="text-end px-3">
                    <button wire:click="removeUserFromRole('{{ $user->id }}')" class="text-red-700 hover:text-black">Remove</button>
                </td>
            </tr>
        @endforeach
    </table>
    
    @else
        <p class="mb-4">No users found.</p>
    @endif
     
</div>
